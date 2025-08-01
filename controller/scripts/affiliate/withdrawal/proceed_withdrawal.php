<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $withdraw_amt  = $_POST['withdraw_amt'];
    $wallet_bal  = $_POST['wallet_bal'];
    $session  = $_POST['session'];
    $term  = $_POST['term'];
    $user_id  = $_POST['user_id'];
    $BankAccName  = $_POST['BankAccName'];
    $BankAccNo  = $_POST['BankAccNo'];
    $BankCode  = $_POST['BankCode'];
    $transfer_fee_final  = $_POST['transfer_fee_final'];
    
    
    $ch_access = curl_init();

    // Concatenate "ApiKey" + ":" +  "SecretKey", then Base 64 encode the string and prefix with the word "Basic". See in next line
    $headers_access = array(
        'Content-Type:application/json',
        'Authorization: Basic '.$Monnifybase_64 // <---
    );
    curl_setopt($ch_access, CURLOPT_HTTPHEADER, $headers_access);
    curl_setopt($ch_access, CURLOPT_URL,"https://sandbox.monnify.com/api/v1/auth/login");
    curl_setopt($ch_access, CURLOPT_POST, 1);
    curl_setopt($ch_access, CURLOPT_RETURNTRANSFER, true);
    
    $output_access = curl_exec($ch_access);
    
    curl_close($ch_access);
    
    $json_access = json_decode($output_access, true);
    // print_r($json);
    
    $storedtoken = $json_access['responseBody']['accessToken'];
    // $storedtoken  = $_POST['storedtoken'];
    
    
    $ver_code_entered  = $_POST['ver_code_entered'];
    $narration = 'Affiliate Withdrawal';

    date_default_timezone_set("Africa/Lagos");
    $date = date("Y-m-d");
    $time = date("h:i:s");

    $date_time = $date.' '.$time;

    function generateRefID() {
        $prefix = "DEBIT-";
        $date = date("YmdHis"); // Adds time: YearMonthDayHourMinuteSecond (e.g., 20250425143255)
        $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));
        return $prefix . $date . '-' . $random;

    }

    $ref_id = generateRefID();

    $select_affiliate = mysqli_query($link, "SELECT * FROM `affiliate` WHERE AffiliateID='$user_id'
    AND TokenID ='$ver_code_entered'");
    $select_affiliate_rowsel = mysqli_fetch_assoc($select_affiliate);
    $select_affiliate_row = mysqli_num_rows($select_affiliate);

    if ($select_affiliate_row > 0)
    {
        
        
       $dateString = $select_affiliate_rowsel['TokenDuration'];

        $date_check = new DateTime($dateString);
        $date_check->modify('+5 minutes');
        
        $newDateString = $date_check->format('Y-m-d H:i:s').'-';
        
        $now = date('Y-m-d H:i:s');
        // Compare
        if ($now > $newDateString) 
        {
            echo 4;
        } 
        else 
        {
            $WalletBalance = $select_affiliate_rowsel['WalletBal'];
    
            if($WalletBalance >= $withdraw_amt + $transfer_fee_final)
            {
                $ch = curl_init();
    
                curl_setopt($ch, CURLOPT_URL, "https://api.monnify.com/api/v2/disbursements/single");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
    
                curl_setopt($ch, CURLOPT_POST, TRUE);
    
                curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                    \"amount\": \"$withdraw_amt\",
                    \"reference\": \"$ref_id\",
                    \"narration\": \"$narration\",
                    \"destinationBankCode\": \"$BankCode\",
                    \"destinationAccountNumber\": \"$BankAccNo\",
                    \"currency\": \"NGN\",
                    \"sourceAccountNumber\": \"$EduMESS_Wallet_Number\",
                    \"destinationAccountName\": \"$BankAccName\",
                    \"async\":\"true\"
                }");
    
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-Type: application/json",
                    "Authorization: Bearer $storedtoken"
                ));
    
                $response = curl_exec($ch);
                curl_close($ch);
    
                // var_dump($response);
                $object = json_decode($response, true);
                $responsemain = $object['requestSuccessful'];
                $responseMessage = $object['responseMessage'];
    
                if($responseMessage == 'success')
                {
                    
                    //   $total_amount = $withdraw_amt + $transfer_fee_final;
    
                             $select_transactions = mysqli_query($link, "
                            INSERT INTO `affiliate_earning`(
                                `id`, `affiliate_id`, `sub_affiliate_id`, `earning_type`, `earning_level`, 
                                `is_transfered`, `InstitutionID`, `affiliate_percentage`, `amount`, `fee`, `date`, 
                                `Session`, `Term`, `transaction_type`, `status`, `ref_number`
                            ) VALUES (
                                NULL, '$user_id', '0', 'debit', '0',
                                '0', NULL, '0', '$withdraw_amt','$transfer_fee_final', NOW(),
                                '$session', '$term', 'debit', 'paid', '$ref_id'
                            )
                            ");
                            

                      $abba_Wallet_Balance = $WalletBalance - $withdraw_amt - $transfer_fee_final;
                    
                    // SELECT `id`, `affiliate_id`, `sub_affiliate_id`, `earning_type`, `earning_level`, `is_transfered`, 
                    // `InstitutionID`, `affiliate_percentage`, `amount`, `date`, `Session`, `Term`, `transaction_type`, `status`, `ref_number` FROM `affiliate_earning` WHERE 1
    
                    $sql_update_aff = mysqli_query($link, "UPDATE `affiliate` SET `WalletBal`='$abba_Wallet_Balance ' WHERE `AffiliateID` = '$user_id'");
    
                    echo 1;
    
                }
                else{
                    echo 2;
                }
    
            }
            else
            {
                echo '3';
            }
        }
        
        
    }
    else
    {
        echo 4;
    }

?>