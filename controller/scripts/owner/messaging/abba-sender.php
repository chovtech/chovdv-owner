<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer files using relative paths
require '../PHPMailer-master/Exception.php';
require '../PHPMailer-master/PHPMailer.php';
require '../PHPMailer-master/SMTP.php';


// Function to send an email
function sendEmail($email_content, $subject, $recipientEmail, $senderEmail)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; 
        $mail->isSMTP(); 
        $mail->Host = 'chovgroup.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'chovmxyy'; 
        $mail->Password = 'r8g{+Tu6OS)R'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465; 

        // Recipients
        $mail->setFrom($senderEmail, '4nzpots'); 
        $mail->addAddress($recipientEmail); 

        // Content
        $mail->isHTML(true); 
        $mail->Subject = $subject;
        $mail->Body = $email_content;
        $mail->AltBody = $email_content;

        $mail->send();
    } catch (Exception $e) {
        // Handle exception if needed
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>