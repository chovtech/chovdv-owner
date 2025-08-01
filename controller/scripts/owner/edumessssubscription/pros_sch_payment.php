<?php

header('Content-Type: application/json');
include('../../../config/config.php');
date_default_timezone_set("Africa/Lagos");

// Include PHPMailer for email notifications
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../../PHPMailer-master/Exception.php');
require_once('../../PHPMailer-master/PHPMailer.php');
require_once('../../PHPMailer-master/SMTP.php');

// Helper functions
function sanitize($link, $key, $default = '') {
    return isset($_POST[$key]) ? mysqli_real_escape_string($link, $_POST[$key]) : $default;
}

function generateRefID($prefix = 'CREDIT-') {
    return $prefix . date("YmdHis") . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));
}

function creditWallet($link, $affiliateID, $amount) {
    $amount = floatval($amount);
    mysqli_query($link, "UPDATE affiliate SET WalletBal = WalletBal + $amount WHERE AffiliateID = '$affiliateID'");
}

// Email sending function - optimized for speed
function sendEmail($link, $to_email, $to_name, $subject, $html_content) {
    try {
        $selectserveretails = mysqli_query($link, "SELECT * FROM `serverpassword`");
        $selectserveretailscnt = mysqli_fetch_assoc($selectserveretails);

        $servername = $selectserveretailscnt['ServerName'];
        $serverpwd = $selectserveretailscnt['ServerPassword'];
        $Host = $selectserveretailscnt['Host'];

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = $Host;
        $mail->SMTPAuth = true;
        $mail->Username = $servername;
        $mail->Password = $serverpwd;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->Timeout = 5; // Reduced timeout for faster processing
        $mail->SMTPKeepAlive = false; // Don't keep connection alive
        
        $mail->setFrom('verify@edumess.com', 'EduMESS');
        $mail->addAddress($to_email, $to_name);
        
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $html_content;
        $mail->AltBody = strip_tags($html_content);
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Email sending failed: " . $e->getMessage());
        return false;
    }
}

// Generate email HTML template
function generateAffiliateEarningEmail($name, $amount, $school_name, $ref_number, $session, $term) {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Earning Notification</title>
    </head>
    <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
            <div style='background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;'>
                <h2 style='color: #28a745; margin-bottom: 20px;'>💰 Earning Notification</h2>
                <p>Dear <strong>$name</strong>,</p>
                <p>Congratulations! You've just earned a commission from a new school subscription.</p>
            </div>
            
            <div style='background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #dee2e6;'>
                <h3 style='color: #495057; border-bottom: 2px solid #28a745; padding-bottom: 10px;'>Earning Details</h3>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Amount Earned:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>₦" . number_format($amount, 2) . "</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>School:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$school_name</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Reference:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$ref_number</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Session:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$session</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Term:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$term</td>
                    </tr>
                </table>
            </div>
            
            <div style='background: #e8f5e8; padding: 15px; border-radius: 10px; margin-top: 20px; border-left: 4px solid #28a745;'>
                <p style='margin: 0; color: #155724;'><strong>Note:</strong> The amount has been credited to your wallet. Keep up the great work promoting our platform!</p>
            </div>
            
            <div style='text-align: center; margin-top: 30px; color: #6c757d; font-size: 14px;'>
                <p>Best regards,<br><strong>EduMESS Team</strong></p>
            </div>
        </div>
    </body>
    </html>";
}

function generateSchoolPaymentEmail($school_name, $amount, $ref_number, $session, $term) {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Payment Confirmation</title>
    </head>
    <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
            <div style='background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;'>
                <h2 style='color: #28a745; margin-bottom: 20px;'>✅ Payment Confirmation</h2>
                <p>Dear <strong>$school_name</strong>,</p>
                <p>Your subscription payment has been received successfully!</p>
            </div>
            
            <div style='background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #dee2e6;'>
                <h3 style='color: #495057; border-bottom: 2px solid #28a745; padding-bottom: 10px;'>Payment Details</h3>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Amount Paid:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>₦" . number_format($amount, 2) . "</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Reference:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$ref_number</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Session:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$session</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Term:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$term</td>
                    </tr>
                </table>
            </div>
            
            <div style='background: #e8f5e8; padding: 15px; border-radius: 10px; margin-top: 20px; border-left: 4px solid #28a745;'>
                <p style='margin: 0; color: #155724;'><strong>Note:</strong> Your account has been updated accordingly. Thank you for using our platform!</p>
            </div>
            
            <div style='text-align: center; margin-top: 30px; color: #6c757d; font-size: 14px;'>
                <p>Best regards,<br><strong>EduMESS Team</strong></p>
            </div>
        </div>
    </body>
    </html>";
}

function generateAdminNotificationEmail($school_name, $amount, $company_share, $ref_number, $session, $term) {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>New Subscription Notification</title>
    </head>
    <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
            <div style='background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;'>
                <h2 style='color: #007bff; margin-bottom: 20px;'>📊 New Subscription Received</h2>
                <p>A new school subscription payment has been processed.</p>
            </div>
            
            <div style='background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #dee2e6;'>
                <h3 style='color: #495057; border-bottom: 2px solid #007bff; padding-bottom: 10px;'>Transaction Details</h3>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>School:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$school_name</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Total Amount:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>NGN" . number_format($amount, 2) . "</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Company Share:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>NGN" . number_format($company_share, 2) . "</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Reference:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$ref_number</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Session:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$session</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Term:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$term</td>
                    </tr>
                </table>
            </div>
            
            <div style='text-align: center; margin-top: 30px; color: #6c757d; font-size: 14px;'>
                <p>Best regards,<br><strong>EduMESS System</strong></p>
            </div>
        </div>
    </body>
    </html>";
}

require_once('../messaging/wametor/send_wa_msg.php');
// function sendMessage($name, $phone, $message) {
    // Replace this with your real SMS or Email function
    // This is just logging for now
    // echo "Message to $name ($phone): $message\n";
// }

// Input data
$userID = sanitize($link, 'userID');
$usertype = sanitize($link, 'usertype');
$campusID = sanitize($link, 'campus_id');
$institutionID = sanitize($link, 'institutionID');
$total_payment = isset($_POST['total_payment']) ? floatval($_POST['total_payment']) : 0;
$session = sanitize($link, 'session');
$term = sanitize($link, 'term');
$num_student = isset($_POST['num_student']) ? intval($_POST['num_student']) : 0;
$transaction_method = sanitize($link, 'transaction_method', 'default');
$plan_id = isset($_POST['plan_id']) ? intval($_POST['plan_id']) : 0;
$discount = isset($_POST['discount']) ? floatval($_POST['discount']) : 0;

$date = date('Y-m-d');
$time = date("H:i:s");
$date_time = "$date $time";
$transaction_type = 'credit';
$status = 'paid';

if (
    empty($userID) || empty($usertype) || empty($campusID) || empty($institutionID) ||
    $total_payment <= 0 || empty($session) || empty($term) || $num_student <= 0
) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input data']);
    exit;
}

$ref_number_subs = generateRefID('SUBS-');

mysqli_begin_transaction($link);

try {

    $wamentorData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM whatsappapikey WHERE Purpose='Default' AND Api_source='wamentor'"));
    $wamentor_key = $wamentorData['ApiKey'] ?? '';
   $wamentor_userid = isset($wamentorData['Api_userid']) ? (int)$wamentorData['Api_userid'] : 0;


    $termRow = mysqli_fetch_assoc(mysqli_query($link, 
    "SELECT termorsemester.TermOrSemesterID, termalias.TermAliasName
        FROM termorsemester
        INNER JOIN termalias ON termorsemester.TermOrSemesterID = termalias.TermOrSemesterID
        WHERE termalias.CampusID = '$campusID' AND  termorsemester.TermOrSemesterID='$term'"));
        $termaneme = $termRow['TermAliasName'] ?? '';

   
   
    // 1. Insert plan transaction
    $insert = mysqli_query($link, "INSERT INTO `plantransaction`(`CampusID`, `PlanID`, `SessionName`, 
    `TermOrSemesterName`, `ActualAmount`, `DiscountedAmount`, `DatePaid`, `ref_number`,
     `transaction_type`,`transaction_method`, `num_of_student`) 
        VALUES ('$campusID', '$plan_id', '$session', '$term',
         '$total_payment', '$discount', '$date_time', 
         '$ref_number_subs', 'normal', '$transaction_method', '$num_student')");
    if (!$insert) throw new Exception('Failed to insert plan transaction.');


    if($transaction_method == 'transfer')
    {

    }else{
        $updateownerwallet_bal = mysqli_query($link, "UPDATE agencyorschoolowner
        SET WalletBalance = WalletBalance - $total_payment WHERE AgencyOrSchoolOwnerID = '$userID'");
    }

  $updateinstitution = mysqli_query($link,"UPDATE `institution` SET SubscriptionStatus='premium' WHERE InstitutionID='$institutionID'");

    $des = "Payment Confirmation - NGN " . number_format($total_payment, 2) .
        " for school subscription(EduMESS)";
    insert_notifications(0, $userID, $usertype, $des);



    $getcam = mysqli_query($link, "SELECT * FROM `institution` 
     INNER JOIN `campus` ON `institution`.`InstitutionID`
         = `campus`.`InstitutionID` WHERE `campus`.`CampusID`='$campusID'");
     $getcam_row = mysqli_fetch_assoc($getcam);//get campus details
    
    // 2. Get affiliate payment structure
    $structure = mysqli_query($link, "SELECT * FROM affiliate_payment_structure");
    $lead_percentage = $dir_percentage = $lv1_percentage = $lv2_percentage = $company_percentage = 0;
    while ($row = mysqli_fetch_assoc($structure)) {
        switch (strtolower($row['level'])) {
            case 'lead': $lead_percentage = $row['percentage']; break;
            case 'direct': $dir_percentage = $row['percentage']; break;
            case 'level 1': $lv1_percentage = $row['percentage']; break;
            case 'level 2': $lv2_percentage = $row['percentage']; break;
            case 'company': $company_percentage = $row['percentage']; break;
        }
    }

    $company_share = ($total_payment * $company_percentage) / 100;
    $affiliate_share = ($total_payment * $dir_percentage) / 100;

    // 3. Get affiliate IDs
    $result = mysqli_query($link, "SELECT agencyorschoolowner.prev_support_person, affiliate.AffiliateID, agencyorschoolowner.affiliate_lead, affiliate.affiliate_l1, affiliate.affiliate_l2 
        FROM agencyorschoolowner 
        INNER JOIN affiliate ON agencyorschoolowner.AffiliateID = affiliate.AffiliateID 
        WHERE agencyorschoolowner.AgencyOrSchoolOwnerID = '$userID'");
    $affiliate = mysqli_fetch_assoc($result);

    $main_affiliate_id = $affiliate['AffiliateID'];
    $lead_affiliate_id = $affiliate['affiliate_lead'];
    $transfer_affiliate_id = $affiliate['prev_support_person'];
    $level1_affiliate_id = $affiliate['affiliate_l1'];
    $level2_affiliate_id = $affiliate['affiliate_l2'];

    $has_lead = $lead_affiliate_id != 0;
    $has_transfer_affiliate = $transfer_affiliate_id != 0;
    $has_level_1 = $level1_affiliate_id != 0;
    $has_level_2 = $level2_affiliate_id != 0;

    // 4. Split logic (transfer vs main)
    $transfer_percent = 0;
    $main_percent = 100;

    if ($has_transfer_affiliate) {
        $split_query = mysqli_query($link, "SELECT * FROM affiliate_transfer_history 
            WHERE AgencyOrSchoolOwnerID = '$userID' 
              AND from_affilliate_id = '$transfer_affiliate_id' 
              AND to_affilliate_id = '$main_affiliate_id' AND Status='Status'");
        if ($split_row = mysqli_fetch_assoc($split_query)) {
            $main_percent = $split_row['to_percentage'];
            $transfer_percent = $split_row['from_percentage'];
        }
    }

    $ref_number = generateRefID();

    // 5. Insert company earning
    mysqli_query($link, "INSERT INTO company_earning (InstitutionID,
     total_payment, affiliate_share, company_percentage, company_amount, has_level_1, has_level_2, ref_number, Session, Term, date) 
        VALUES ('$institutionID', '$total_payment', '$affiliate_share', '$company_percentage', '$company_share', '$has_level_1', '$has_level_2', '$ref_number', '$session', '$term', '$date')");

    // 6. Affiliate Earnings + Messages
    $messages = [];

    // Level 1
    if ($has_level_1) {
        $level_1_amount = round(($company_share * $lv1_percentage) / 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, sub_affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$level1_affiliate_id', '$main_affiliate_id', 'level_1', 1, 0, '$institutionID', '$lv1_percentage', '$level_1_amount', '$session', '$term', '$transaction_type', '$status', '$ref_number', '$date')");
       
       creditWallet($link, $level1_affiliate_id, $level_1_amount);
        $des = "Congratulations! You have earned ₦" 
        . number_format($level_1_amount, 2) . 
        " as a Level 1 commission from a new school subscription" . '(' . $getcam_row['InstitutionGeneralName'] . ')';

        insert_notifications(0, $level1_affiliate_id, 'affiliate', $des);

        $level1_query = mysqli_query($link, "SELECT AffiliateFName, Phone, Email FROM affiliate WHERE AffiliateID='$level1_affiliate_id'");
        if ($level1_query && $row = mysqli_fetch_assoc($level1_query)) {
            $messages[] = ['name' => $row['AffiliateFName'],
             'phone' => $row['Phone'], 
             'email' => $row['Email'], 'amount' => $level_1_amount];
        }
    }

    // Level 2
    if ($has_level_2) {
        $level_2_amount = round(($company_share * $lv2_percentage) / 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, sub_affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$level2_affiliate_id', '$main_affiliate_id', 'level_2', 2, 0, '$institutionID', '$lv2_percentage', '$level_2_amount', '$session', '$term', '$transaction_type', '$status', '$ref_number', '$date')");
        creditWallet($link, $level2_affiliate_id, $level_2_amount);


        $des = "Great news! You have earned ₦" . number_format($level_2_amount, 2) . " as a Level 2 
        commission from a new school subscription" . '(' . $getcam_row['InstitutionGeneralName'] . ')';

        insert_notifications(0, $level2_affiliate_id, 'affiliate', $des);
        $level2_query = mysqli_query($link, "SELECT AffiliateFName, Phone, Email FROM affiliate WHERE AffiliateID='$level2_affiliate_id'");
        if ($level2_query && $row = mysqli_fetch_assoc($level2_query)) {
            $messages[] = ['name' => $row['AffiliateFName'], 'phone' => $row['Phone'], 'email' => $row['Email'], 'amount' => $level_2_amount];
        }
    }

    // Lead
    $remaining_affiliate_amount = $affiliate_share;
    $remaining_affiliate_percent = $dir_percentage;

    if ($has_lead) {
        $lead_amount = round(($affiliate_share * $lead_percentage) / 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$lead_affiliate_id', 'lead', 0, 0, '$institutionID', '$lead_percentage', '$lead_amount', '$session', '$term', '$transaction_type', '$status', '$ref_number', '$date')");
        creditWallet($link, $lead_affiliate_id, $lead_amount);


        $des = "Awesome! You have earned ₦" . number_format($lead_amount, 2) .
         " as a Lead commission from a new school subscription" . '(' . $getcam_row['InstitutionGeneralName'] . ')';
        insert_notifications(0, $lead_affiliate_id, 'affiliate', $des);

        $lead_query = mysqli_query($link, "SELECT AffiliateFName, Phone, Email FROM affiliate WHERE AffiliateID='$lead_affiliate_id'");
        if ($lead_query && $row = mysqli_fetch_assoc($lead_query)) {
            $messages[] = ['name' => $row['AffiliateFName'], 'phone' => $row['Phone'], 'email' => $row['Email'], 'amount' => $lead_amount];
        }

        $remaining_affiliate_amount -= $lead_amount;
        $remaining_affiliate_percent -= $lead_percentage;
    }

    // Main & Transfer
    $main_amount = round(($remaining_affiliate_amount * $main_percent) / 100, 2);
    $transfer_amount = round(($remaining_affiliate_amount * $transfer_percent) / 100, 2);

    $mainnew_percentage = round(($main_amount / $total_payment) * 100, 2);
    $transnew_percentage = round(($transfer_amount / $total_payment) * 100, 2);

    mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
    VALUES ('$main_affiliate_id', 'main', 0, 0, '$institutionID', '$mainnew_percentage', '$main_amount', '$session', '$term', '$transaction_type', '$status', '$ref_number', '$date')");
    $des = "You have received ₦" . number_format($main_amount, 2) .
     " as your main affiliate commission from a new school subscription " . '(' . $getcam_row['InstitutionGeneralName'] . ')';
    insert_notifications(0, $main_affiliate_id, 'affiliate', $des);

    creditWallet($link, $main_affiliate_id, $main_amount);
    $main_query = mysqli_query($link, "SELECT AffiliateFName, Phone, Email FROM affiliate WHERE AffiliateID='$main_affiliate_id'");
    if ($main_query && $row = mysqli_fetch_assoc($main_query)) {
        $messages[] = ['name' => $row['AffiliateFName'], 'phone' => $row['Phone'], 'email' => $row['Email'], 'amount' => $main_amount];
    }

    if ($has_transfer_affiliate && $main_affiliate_id != $transfer_affiliate_id) {
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$transfer_affiliate_id', 'transfer', 0, 1, '$institutionID', '$transnew_percentage', '$transfer_amount', '$session', '$term', '$transaction_type', '$status', '$ref_number', '$date')");
        creditWallet($link, $transfer_affiliate_id, $transfer_amount);

        $des = "You have received ₦" . number_format($transfer_amount, 2) . 
        " as a transfer commission from a new school subscription".'('. $getcam_row['InstitutionGeneralName'].')';
        insert_notifications(0, $transfer_affiliate_id, 'affiliate', $des);

        $transfer_query = mysqli_query($link, "SELECT AffiliateFName, Phone, Email FROM affiliate WHERE AffiliateID='$transfer_affiliate_id'");
        if ($transfer_query && $row = mysqli_fetch_assoc($transfer_query)) {
            $messages[] = ['name' => $row['AffiliateFName'], 'phone' => $row['Phone'], 'email' => $row['Email'], 'amount' => $transfer_amount];
        }
    }

    // Get school details for notifications
    $schoolQuery = mysqli_query($link, "SELECT AgencyOrSchoolOwnerName, AgencyOrSchoolOwnerMainPhone, AgencyOrSchoolOwnerEmail FROM agencyorschoolowner WHERE AgencyOrSchoolOwnerID='$userID'");
    $school = ($schoolQuery) ? mysqli_fetch_assoc($schoolQuery) : null;

    // COMMIT TRANSACTION
    mysqli_commit($link);

    // Send immediate response for fast user feedback
    echo json_encode(['status' => 'success', 'message' => 'Transaction successful .', 'ref_number' => $ref_number]);
    
    // Process notifications asynchronously (non-blocking)
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request(); // Flush response to client
    }
    
    // Send notifications in background
    sendNotificationsAsync($link, $messages, $getcam_row, $school, $total_payment, $company_share, $ref_number, $session, $termaneme, $wamentor_userid, $wamentor_key);

} catch (Exception $e) {
    mysqli_rollback($link);
    echo json_encode(['status' => 'error', 'message' => 'Transaction failed: ' . $e->getMessage()]);
}

// Function to send notifications asynchronously
function sendNotificationsAsync($link, $messages, $getcam_row, $school, 
$total_payment, $company_share, $ref_number, $session,
    $termaneme, $wamentor_userid, $wamentor_key) {
    
    try {
        // Validate required parameters
        if (!$link || !$messages || !$getcam_row || !$wamentor_userid || !$wamentor_key) {
            error_log("sendNotificationsAsync: Missing required parameters");
            return;
        }
        
        // Send affiliate emails and WhatsApp messages
        foreach ($messages as $msg) {
            // Validate message data
            if (!isset($msg['name']) || !isset($msg['amount'])) {
                continue; // Skip invalid message
            }
            
            // Send email to affiliate if email exists
            if (!empty($msg['email'])) {
                $email_content = generateAffiliateEarningEmail($msg['name'], $msg['amount'], 
                $getcam_row['InstitutionGeneralName'], $ref_number, $session,
                    $termaneme);
                sendEmail($link, $msg['email'], $msg['name'], "Earning Notification - NGN " . number_format($msg['amount'], 2), $email_content);
            }
        }
        
        // Send WhatsApp messages to affiliates
        $affPayload = [
            "user_id" => $wamentor_userid,
            "template_id" => "plan-notify",
            "message" => "Hi {{name}}, you've just earned NGN {{amount}} from {{school}} subscription.",
            "contacts" => []
        ];
        
        foreach ($messages as $msg) {
            if (isset($msg['phone']) && isset($msg['name']) && isset($msg['amount'])) {
                $affPayload['contacts'][] = [
                    "number" => $msg['phone'],
                    "name" => $msg['name'],
                    "amount" => number_format($msg['amount'], 2),
                    "school" => $getcam_row['InstitutionGeneralName']
                ];
            }
        }
        
        if (!empty($affPayload['contacts'])) {
            sendWhatsAppMsg($affPayload, $wamentor_key);
        }
        
        // Send email to school
        if ($school && !empty($school['AgencyOrSchoolOwnerEmail']) && !empty($school['AgencyOrSchoolOwnerName'])) {
            $school_email_content = generateSchoolPaymentEmail($school['AgencyOrSchoolOwnerName'], $total_payment, $ref_number, $session, $termaneme);
            sendEmail($link, $school['AgencyOrSchoolOwnerEmail'], $school['AgencyOrSchoolOwnerName'],
            
            "Payment Confirmation - NGN " . number_format($total_payment, 2), $school_email_content);

          
           
            
            // Send WhatsApp to school
            if (!empty($school['AgencyOrSchoolOwnerMainPhone'])) {
                sendWhatsAppMsg([
                    "user_id" => $wamentor_userid,
                    "template_id" => "admin-notify",
                    "message" => "Dear {{name}},\n\nYour subscription payment of NGN {{amount}} for {{school}} was received successfully.\n\nReference: {{ref}}\nTerm: {{term}}\nSession: {{session}}\n\nThank you for using EduMESS!",
                    "contacts" => [[
                        "number" => $school['AgencyOrSchoolOwnerMainPhone'],
                        "name" => $school['AgencyOrSchoolOwnerName'],
                        "amount" => number_format($total_payment, 2),
                        "school" => $getcam_row['InstitutionGeneralName'],
                        "ref" =>  $ref_number,
                        "term" => $termaneme,
                        "session" => $session
                    ]]
                ], $wamentor_key);
            }
        }
        
        // Send admin notification email - with hardcoded admin email
        $admin_email = 'finance@edumess.com';
        
        if (!empty($admin_email)) {
            $admin_email_content = generateAdminNotificationEmail($getcam_row['InstitutionGeneralName'], $total_payment, $company_share, $ref_number, $session, $termaneme);
            sendEmail($link, $admin_email, 'EduMESS Admin', "New Subscription - NGN " . number_format($total_payment, 2), $admin_email_content);
        }
        
    } catch (Exception $e) {
        // Log the error but don't break the main transaction
        error_log("Notification sending failed: " . $e->getMessage());
    }
}
?>
