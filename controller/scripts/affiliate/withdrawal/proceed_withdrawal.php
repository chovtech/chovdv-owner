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
    $storedtoken  = $_POST['storedtoken'];
    $ver_code_entered  = $_POST['ver_code_entered'];
    $narration = 'Affiliate Withdrawal';

    date_default_timezone_set("Africa/Lagos");
    $date = str_replace('-','',date("Y-m-d"));
    $time = str_replace(':','',date("h:i:s"));

    $date_time = $date.' '.$time;

    function generateRefID() {
        $prefix = "DEBIT-";
        $date = date("Ymd"); // Example: 20250425
        $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));
        return $prefix . $date . '-' . $random;
    }

    $ref_id = generateRefID();

    $select_affiliate = mysqli_query($link, "SELECT * FROM `affiliate` WHERE AffiliateID='$user_id' AND verification_code ='$ver_code_entered'");
    $select_affiliate_rowsel = mysqli_fetch_assoc($select_affiliate);
    $select_affiliate_row = mysqli_num_rows($select_affiliate);

    if ($select_affiliate_row > 0)
    {

        $WalletBalance = $select_affiliate_rowsel['WalletBal'];

        if($WalletBalance >= $withdraw_amt)
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

            //var_dump($response);
            $object = json_decode($response, true);
            $responsemain = $object['requestSuccessful'];
            $responseMessage = $object['responseMessage'];

            if($responseMessage == 'success')
            {

                $select_transactions = mysqli_query($link, "INSERT INTO `affiliate_earning`(`id`, `affiliate_id`, `sub_affiliate_id`, `earning_level`, `amount`, `Session`, `Term`, `status`, `ref_number`, `date`)
                VALUES (NULL,'$user_id','0','0','$withdraw_amt','$session','$term','debit','$ref_id','$date_time')");

                $abba_Wallet_Balance = $WalletBalance - $withdraw_amt;

                $sql_update_aff = mysqli_query($link, "UPDATE `affiliate` SET `WalletBal`='$abba_Wallet_Balance' WHERE `AffiliateID` = '$user_id'");

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
    else
    {
        echo 4;
    }

?>