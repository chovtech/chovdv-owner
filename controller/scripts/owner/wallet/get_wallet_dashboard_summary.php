<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../../config/config.php');

    $user_id = $_POST['user_id'];
    
    $NIN = $_POST['NIN'];
    
    $BVN = $_POST['BVN'];

    $maintoken = $_POST['storedtoken'];

    $select_agency = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$user_id'");
    $select_agency_rowsel = mysqli_fetch_assoc($select_agency);
    $select_agency_row = mysqli_num_rows($select_agency);

    if ($select_agency_row > 0) {

        if (intval($select_agency_rowsel['ReservedAccountStatus']) === 0) {

            $fname = $select_agency_rowsel['AgencyOrSchoolOwnerName'];
            $lpName = $select_agency_rowsel['AgencyOrSchoolOwnerNameTwo'];
            $email = $select_agency_rowsel['AgencyOrSchoolOwnerEmail'];
            
            date_default_timezone_set("Africa/Lagos");

            $d = str_replace('-', '', date("Y-m-d"));
            $n = str_replace(':', '',date("h:i:s"));
            $p = rand();

            $referencenumber = "RX" . $d . $n . $p . "-" . $user_id;

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://api.monnify.com/api/v1/bank-transfer/reserved-accounts");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);

            curl_setopt($ch, CURLOPT_POST, TRUE);

            curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                                    \"accountName\": \"$fname.$lpName\",
                                    \"accountReference\": \"$referencenumber\",
                                    \"currencyCode\": \"NGN\",
                                    \"contractCode\": \"779688215159\",
                                    \"customerName\": \"$fname.$lpName\",
                                    \"customerEmail\": \"$email\",
                                    \"bvn\": \"$BVN\",
                                    \"nin\": \"$NIN\"
                                }");

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Authorization: Bearer $maintoken"
            )
            );

            $response = curl_exec($ch);
            curl_close($ch);

            //var_dump($response);
            print_r($object = json_decode($response, true));
            
            @$responseMessage = $object["responseMessage"];
            
            if($responseMessage == 'success')
            {
                $accountname = $object["responseBody"]["accountName"];
                $accountnumber = $object["responseBody"]["accountNumber"];
                $bankname = $object["responseBody"]["bankName"];
                $bankcode = $object["responseBody"]["bankCode"];
                $reservationReference = $object["responseBody"]["reservationReference"];
                $responsemain = $object['requestSuccessful'];
                $accountReference = $object["responseBody"]["accountReference"];
                $abba_bank_name = $bankname;
            
                $abba_account_number = $accountnumber;
    
                $abba_account_name = $accountname;
    
                $abba_Wallet_Balance = 0;
    
                $abba_Pending_Withdrawal = 0;
    
                $abba_Amount_Withdrawn = 0;
                
                $abba_wallet_checker = 0;
    
                $sqlinsertaccountdetailsUPDATE = mysqli_query($link, "UPDATE `agencyorschoolowner` SET `ReservedAccountStatus`='1',`NIN`='$NIN',`BVN`='$BVN',`WalletBank`='$bankname',`WalletAccountName`='$accountname',`WalletAccountNumber`='$accountnumber',`WalletAccountReference`='$reservationReference',`WalletBalance`='0',`PendingWithdrawal`='0',`AmountWithdrawn`='0' WHERE `AgencyOrSchoolOwnerID` = '$user_id'");
    
            }
            else
            {
                
                $abba_Wallet_Balance = 0;

                $abba_Pending_Withdrawal = 0;
        
                $abba_Amount_Withdrawn = 0;
        
                $abba_bank_name = 'NIL';
        
                $abba_account_number = 'NIL';
        
                $abba_account_name = 'NIL';
                
                $abba_wallet_checker = 1;
    
            }
            
        } else {
            
            $abba_Wallet_Balance = $select_agency_rowsel['WalletBalance'];
        
            $abba_Pending_Withdrawal = $select_agency_rowsel['PendingWithdrawal'];
        
            $abba_Amount_Withdrawn = $select_agency_rowsel['AmountWithdrawn'];
            
            $abba_bank_name = $select_agency_rowsel['WalletBank'];

            $abba_account_number = $select_agency_rowsel['WalletAccountNumber'];

            $abba_account_name = $select_agency_rowsel['WalletAccountName'];
            
            $abba_wallet_checker = 0;
    
        }

    } 
    else {
        $abba_Wallet_Balance = 0;

        $abba_Pending_Withdrawal = 0;

        $abba_Amount_Withdrawn = 0;

        $abba_bank_name = 'NIL';

        $abba_account_number = 'NIL';

        $abba_account_name = 'NIL';
        
        $abba_wallet_checker = 1;
    
    }

    $abba_dashboard_content = (object) [
        'abba_bank_name' => $abba_bank_name,
        'abba_account_number' => $abba_account_number,
        'abba_account_name' => $abba_account_name,
        'wallet_balance' => '₦' . number_format($abba_Wallet_Balance),
        'pending_withdrawal' => '₦' . number_format($abba_Pending_Withdrawal),
        'amount_withdrawn' => '₦' . number_format($abba_Amount_Withdrawn),
        'abba_wallet_checker' => $abba_wallet_checker
    ];

    echo $abba_dashboard_content_json = json_encode($abba_dashboard_content);

?>