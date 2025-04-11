<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $abba_institution_id = $_POST['abba_institution_id'];
  $number = $_POST['number'];
$msg = $_POST['msg'];
$file = $_POST['file'];
$apikey = $_POST['apikey'];

// $senderEmail = $_POST['senderEmail'];
// $recipientEmail = $_POST['recipientEmail'];
// $email_content = $_POST['email_content'];
// $subject = $_POST['subject'];


// include('../messaging/email/abba-sender.php');
// include('../messaging/email/school_email_content.php');
// sendEmail($htmlContent, $subject, $recipientEmail, $senderEmail);

 include('../messaging/whatsapp/send_whatapp_msg.php');
   send_whatsapp_msg($abba_institution_id,$number,$apikey, $msg, $file);

 ?>