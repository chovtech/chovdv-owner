<?php
    include('controller/config/config.php');
    
    // include('controller/scripts/owner/messaging/whatsapp/send_whatapp_msg.php');
    
    // $abba_institution_id = 0;
    // $number = '+2348127121186,+2349035315300,+2348082515409';
    // $msg = 'abba,ortsy,chimokoro';
    // $file = 'https://edumess-v2.edumess.com/assets/images/bgImg/bg5.jpg,https://edumess-v2.edumess.com/assets/images/bgImg/bg5.jpg,https://edumess-v2.edumess.com/assets/images/bgImg/bg5.jpg';
    
    
    // send_whatsapp_msg($abba_institution_id, $number, $msg, $file);

    // $postData = file_get_contents("php://input");

    // $abba_sql_insert_tbl_abba_tester = ("INSERT INTO `tbl_abba_tester`(`id`, `reference`, `amountPaid`, `paidOn`) 
    // VALUES (NULL,'$postData','working','1')");
    // $abba_result_insert_tbl_abba_tester = mysqli_query($link, $abba_sql_insert_tbl_abba_tester);
    // $maintoken = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOlsibW9ubmlmeS12YWx1ZS1hZGRlZC1zZXJ2aWNlIiwibW9ubmlmeS1wYXltZW50LWVuZ2luZSIsIm1vbm5pZnktZGlzYnVyc2VtZW50LXNlcnZpY2UiLCJtb25uaWZ5LW9mZmxpbmUtcGF5bWVudC1zZXJ2aWNlIl0sInNjb3BlIjpbInByb2ZpbGUiXSwiZXhwIjoxNjk3NzcwMDMzLCJhdXRob3JpdGllcyI6WyJNUEVfTUFOQUdFX0xJTUlUX1BST0ZJTEUiLCJNUEVfVVBEQVRFX1JFU0VSVkVEX0FDQ09VTlQiLCJNUEVfSU5JVElBTElaRV9QQVlNRU5UIiwiTVBFX1JFU0VSVkVfQUNDT1VOVCIsIk1QRV9DQU5fUkVUUklFVkVfVFJBTlNBQ1RJT04iLCJNUEVfUkVUUklFVkVfUkVTRVJWRURfQUNDT1VOVCIsIk1QRV9ERUxFVEVfUkVTRVJWRURfQUNDT1VOVCIsIk1QRV9SRVRSSUVWRV9SRVNFUlZFRF9BQ0NPVU5UX1RSQU5TQUNUSU9OUyJdLCJqdGkiOiJkMGE5MWZjNS03MDE0LTRlZWYtYjc0MC1mMTk5ZmFkZjg1M2MiLCJjbGllbnRfaWQiOiJNS19QUk9EX1o5ODBHRzRQWUEifQ.T8vR4lJd-ADudngRe6_VvU-mvA9OCvNzrXPaJxZDX4Tc1CD-_VPPOaT280mTI-oNoEl1yLUmcKcckN0cfCXHtnsmjI3rOjMMvViO3T4nRySe_ewDVFyQ_-qzBMQwGTgFH6urldO1ngqNgky2o6GmJlpgNn1yWTFVG_dcTdC2-MqRZ3pj4Ax3h3Mxceq3tsmH4WCb7-QPF7-QNjS-_MKq1lEpygLZonawYw3IxwqGrdHN4WRq4aWV9_ozefbIciNEPSnVJTepXWebdY4pKVHPFQ5IfsrehBHZOYTP8MW-CVtqHXwEys9XSgqSejPG7IInE80hb_2i4_aoGGHogXf-3g';
    // $ownerid = 236;
    //school owner insert sqli
    
    // $referencenumber = "RX-" .$ownerid."owner";
    
    // $reservedemail = 'sunnyogaje@gmail.com';
    
    // $FName = 'Sunday';
    
    // $lastName = 'Ogaje';
    
    // $ch = curl_init();

    // curl_setopt($ch, CURLOPT_URL, "https://api.monnify.com/api/v1/bank-transfer/reserved-accounts");
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    // curl_setopt($ch, CURLOPT_HEADER, FALSE);

    // curl_setopt($ch, CURLOPT_POST, TRUE);

    // curl_setopt($ch, CURLOPT_POSTFIELDS, "{
    //     \"accountName\": \"$FName.$lastName\",
    //     \"accountReference\": \"$referencenumber\",
    //     \"currencyCode\": \"NGN\",
    //     \"contractCode\": \"779688215159\",
    //     \"customerName\": \"$FName.$lastName\",
    //     \"customerEmail\": \"$reservedemail\"
    // }");

    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     "Content-Type: application/json",
    //     "Authorization: Bearer $maintoken"
    // ));

    // $response = curl_exec($ch);
    // curl_close($ch);

    // var_dump($response);
    // $object = json_decode($response, true);
    // $accountname =  $object["responseBody"]["accountName"];
    // $accountnumber = $object["responseBody"]["accountNumber"];
    // $bankname = $object["responseBody"]["bankName"];
    // $bankcode = $object["responseBody"]["bankCode"];
    // $reservationReference = $object["responseBody"]["reservationReference"];
    // $responsemain = $object['requestSuccessful'];
    // $accountReference = $object["responseBody"]["accountReference"];

    // $sqlinsertaccountdetailsUPDATE = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `WalletBank`='$bankname',`WalletAccountName`='$accountname',`WalletAccountNumber`='$accountnumber',`WalletAccountReference`='$accountReference' WHERE `AgencyOrSchoolOwnerID` = '$ownerid'");

?>

<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    // include('../../../config/config.php');

    $account_number = 8127121186;
    $bank_code = 100004;
    $account_name = 'Sunday Abba Ogaje';
    $transfer_amt = 100;
    $maintoken = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOlsibW9ubmlmeS12YWx1ZS1hZGRlZC1zZXJ2aWNlIiwibW9ubmlmeS1wYXltZW50LWVuZ2luZSIsIm1vbm5pZnktZGlzYnVyc2VtZW50LXNlcnZpY2UiLCJtb25uaWZ5LW9mZmxpbmUtcGF5bWVudC1zZXJ2aWNlIl0sInNjb3BlIjpbInByb2ZpbGUiXSwiZXhwIjoxNjk4NDIyMTE4LCJhdXRob3JpdGllcyI6WyJNUEVfTUFOQUdFX0xJTUlUX1BST0ZJTEUiLCJNUEVfVVBEQVRFX1JFU0VSVkVEX0FDQ09VTlQiLCJNUEVfSU5JVElBTElaRV9QQVlNRU5UIiwiTVBFX1JFU0VSVkVfQUNDT1VOVCIsIk1QRV9DQU5fUkVUUklFVkVfVFJBTlNBQ1RJT04iLCJNUEVfUkVUUklFVkVfUkVTRVJWRURfQUNDT1VOVCIsIk1QRV9ERUxFVEVfUkVTRVJWRURfQUNDT1VOVCIsIk1QRV9SRVRSSUVWRV9SRVNFUlZFRF9BQ0NPVU5UX1RSQU5TQUNUSU9OUyJdLCJqdGkiOiI5ODJmNWE3OS1iNDEzLTQ1ZTgtOTQ3ZS00YmM2NDZjODI5YjMiLCJjbGllbnRfaWQiOiJNS19QUk9EX1o5ODBHRzRQWUEifQ.bBx9QLEm-yiXeuCMenrGckQ6u4uWSNBnLG9gE3mZhs2-Y-uXnUYk_4sUNKbWbP3i0BgdJd0DSBnGteLiroSlfSN2GSctPFZbciH2z7_gE7WeAfzVuvKYFVlbLL8ReRuczDpkqKEhWuuTII3DToNpQwCdXOVYaxlvZwC0J7oDWn8S97TGocX1lFlPBKF2WlUViuwHnlOuTzujdM3NRIoVx_YDi4Bj5zAKPIrnGq4qpX05jXyqAyJ7DXzmLBOxiaa3ehRH3vb1KNdrPhluNOKYw5LTTzoxCDpM4usfFEdNJInnxonDqtNbyzp9wbOf5rf2M16qF8YfHpl_M1Nrt8tuYg';
    $EduMESS_Wallet_Number = 8018133138;
    
    $narration = 'From - Sunday Abba Ogaje';
    
    date_default_timezone_set("Africa/Lagos");
    $date = str_replace('-','',date("Y-m-d"));
    $time = str_replace(':','',date("h:i:s"));

    echo $referencenumber = "TF" . $date . $time;

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
        )
    );

    $response = curl_exec($ch);
    curl_close($ch);

    //var_dump($response);
    $object = json_decode($response, true);
    $responsemain = $object['requestSuccessful'];
    echo $responseMessage = $object['responseMessage'];

    if($responseMessage == 'success')
    {
        echo 1;
    } else{
        echo 2;
    }
    
?>