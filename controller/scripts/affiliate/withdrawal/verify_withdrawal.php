<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    //include('../../email-pack/my-send-mail.php');

    $withdraw_amt  = $_POST['withdraw_amt'];
    $wallet_bal  = $_POST['wallet_bal'];
    $session  = $_POST['session'];
    $term  = $_POST['term'];
    $user_id  = $_POST['user_id'];

    $verification_code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

    $sql_affiliate = mysqli_query($link, "UPDATE `affiliate` SET `verification_code`='$verification_code' WHERE `AffiliateID` = '$user_id'");

    $data = [
        'ver_code' => $verification_code,
        'status' => 1
    ];

    echo json_encode($data);
    //include('../../email-pack/verification-email.php');
    //sendEmail($htmlContent, $subject, $recipientEmail, $senderEmail);

?>