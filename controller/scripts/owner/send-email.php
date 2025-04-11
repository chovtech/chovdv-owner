<?php

    include 'messaging/abba-sender.php';
    include 'messaging/email/edumess-email-content.php';
    
    // Usage example:
    $email_content = 'My Email';
    $subject = 'Account Verification';
    $recipientEmail = 'sunnyogaje@gmail.com';
    $senderEmail = 'verify@4nzpots.com';
    
    
    sendEmail($email_content, $subject, $recipientEmail, $senderEmail);

?>