<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Include the PHPMailer files using relative paths
    require '../../PHPMailer-master/Exception.php';
    require '../../PHPMailer-master/PHPMailer.php';
    require '../../PHPMailer-master/SMTP.php';


    // Function to send an email
    function sendEmail($htmlContent, $subject, $recipientEmail, $senderEmail)
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0; // Set to 0 for no debugging, 2 for verbose debug output
            $mail->isSMTP();
            $mail->Host = 'edumess.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'verify@edumess.com';
            $mail->Password = 'Year@2025$$';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom($senderEmail, 'EduMESS');
            $mail->addAddress($recipientEmail);
            $mail->addBCC($senderEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $htmlContent;
            $mail->AltBody = strip_tags($htmlContent);

            // Attempt to send the email
            if ($mail->send()) {
                // echo "1";
            } else {
                // echo "0";
            }
        } catch (Exception $e) {
            //echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";

            // echo 0;
        }
    }
?>
