<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../../config/config.php');

    $account_number = $_POST['account_number'];
    $bank_code = $_POST['bank_code'];
    $account_name = $_POST['account_name'];
    $transfer_amt = $_POST['transfer_amt'];
    $maintoken = $_POST['storedtoken'];
    $narration = $_POST['narration'];

    $user_id = $_POST['UserID'];

    $UserType = $_POST['UserType'];

    date_default_timezone_set("Africa/Lagos");
    $date = str_replace('-','',date("Y-m-d"));
    $time = str_replace(':','',date("h:i:s"));

    $referencenumber = "TF" . $date . $time;

    $select_agency = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$user_id' AND TransactionPin != 0");
    $select_agency_rowsel = mysqli_fetch_assoc($select_agency);
    $select_agency_row = mysqli_num_rows($select_agency);

    if ($select_agency_row > 0) 
    {
        
        $WalletBalance = $select_agency_rowsel['WalletBalance'];
        
        if($WalletBalance >= $transfer_amt)
        {
            $ch = curl_init();  

            curl_setopt($ch, CURLOPT_URL, "https://api.monnify.com/api/v2/disbursements/single");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
    
            curl_setopt($ch, CURLOPT_POST, TRUE);
    
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                                    \"amount\": \"$transfer_amt\",
                                    \"reference\": \"$referencenumber\",
                                    \"narration\": \"$narration\",
                                    \"destinationBankCode\": \"$bank_code\",
                                    \"destinationAccountNumber\": \"$account_number\",
                                    \"currency\": \"NGN\",
                                    \"sourceAccountNumber\": \"$EduMESS_Wallet_Number\",
                                    \"destinationAccountName\": \"$account_name\",
                                    \"async\":\"true\"
                                }");
    
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Authorization: Bearer $maintoken"
            ));
    
            $response = curl_exec($ch);
            curl_close($ch);
    
            //var_dump($response);
            $object = json_decode($response, true);
            $responsemain = $object['requestSuccessful'];
            echo $responseMessage = $object['responseMessage'];
    
            if($responseMessage == 'success')
            {


                $select_wallettransactions = mysqli_query($link, "INSERT INTO `wallettransactions`(`WalletTransactionID`, `UserID`, `UserType`, `TransactionType`, `Amount`, `TransactionFee`, `Reference`, `Date`, `Time`) 
                VALUES (NULL,'$user_id','$UserType','Debit','$transfer_amt','0','$referencenumber','$date','$time')");

                $select_agency = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$user_id'");
                $select_agency_rowsel = mysqli_fetch_assoc($select_agency);
                $select_agency_row = mysqli_num_rows($select_agency);
            
                if ($select_agency_row > 0) 
                {
                    $abba_Wallet_Balance = $select_agency_rowsel['WalletBalance'] - $transfer_amt;
            
                    $sqlinsertaccountdetailsUPDATE = mysqli_query($link, "UPDATE `agencyorschoolowner` SET `WalletBalance`='$abba_Wallet_Balance' WHERE `AgencyOrSchoolOwnerID` = '$user_id'");
                }
                else
                {
                }

            }
            else{
    
            }

        }
        else
        {
            echo 'Insufficient funds';
        }
        
        
    }
    else
    {
        echo 1;
    }
    
?>