<?php
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// ini_set('error_log', __DIR__ . '/php-error.log');
header('Content-Type: application/json');
require_once('../../../config/config.php');

// // Performance optimization for live hosting
// ini_set('max_execution_time', 30);
// ini_set('memory_limit', '256M');
// ignore_user_abort(true);

// // Configuration for performance and notifications
// $PERFORMANCE_CONFIG = [
//     'send_emails' => true,           // Set to false to disable emails for speed
//     'send_whatsapp' => true,         // Set to false to disable WhatsApp for speed
//     'email_timeout' => 5,            // Email timeout in seconds
//     'performance_logging' => false,  // Set to true to log performance metrics
//     'log_errors' => true,            // Log errors for debugging
//     'connection_pooling' => true,    // Enable database connection optimizations
//     'batch_operations' => true       // Use batch database operations
// ];

// Include PHPMailer for email notifications
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../../PHPMailer-master/Exception.php');
require_once('../../PHPMailer-master/PHPMailer.php');
require_once('../../PHPMailer-master/SMTP.php');

function generateRefID($prefix = 'CREDIT-') {
    return $prefix . date("YmdHis") . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));
}

function creditWallet($link, $affiliate_id, $amount) {
    mysqli_query($link, "UPDATE affiliate SET WalletBal = WalletBal + $amount WHERE AffiliateID = '$affiliate_id'");
}

// Email sending function
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
        $mail->Timeout = 5;
        $mail->SMTPKeepAlive = false;
        
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

// Email templates
function generateAffiliateEarningEmail($name, $amount, $school_name, $ref_number, $session, $term, $plan_status) {
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
                <p>Congratulations! You've just earned a commission from a school plan $plan_status.</p>
            </div>
            
            <div style='background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #dee2e6;'>
                <h3 style='color: #495057; border-bottom: 2px solid #28a745; padding-bottom: 10px;'>Earning Details</h3>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Amount Earned:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>NGN " . number_format($amount, 2) . "</td>
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
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Plan Status:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$plan_status</td>
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

function generateSchoolPaymentEmail($school_name, $amount, $ref_number, $session, $term, $plan_status) {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Plan $plan_status Confirmation</title>
    </head>
    <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
            <div style='background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;'>
                <h2 style='color: #28a745; margin-bottom: 20px;'>✅ Plan $plan_status Confirmation</h2>
                <p>Dear <strong>$school_name</strong>,</p>
                <p>Your plan $plan_status payment has been received successfully!</p>
            </div>
            
            <div style='background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #dee2e6;'>
                <h3 style='color: #495057; border-bottom: 2px solid #28a745; padding-bottom: 10px;'>Payment Details</h3>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Amount Paid:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>NGN " . number_format($amount, 2) . "</td>
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
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Plan Status:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$plan_status</td>
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

function generateAdminNotificationEmail($school_name, $amount, $company_share, $ref_number, $session, $term, $plan_status) {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>New Plan $plan_status Notification</title>
    </head>
    <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
            <div style='background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;'>
                <h2 style='color: #007bff; margin-bottom: 20px;'>📊 New Plan $plan_status</h2>
                <p>A new school plan $plan_status payment has been processed.</p>
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
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>NGN " . number_format($amount, 2) . "</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Company Share:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>NGN " . number_format($company_share, 2) . "</td>
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
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Plan Status:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>$plan_status</td>
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

$input = json_decode(file_get_contents('php://input'), true);
$institutionId = (int)($input['institutionId'] ?? 0);
$UserID = (int)($input['UserID'] ?? 0);
$UserType = $input['UserType'] ?? '';
$current_plan_id = (int)($input['current_plan'] ?? 0);
$new_plan_id = (int)($input['choosed_plain'] ?? 0);
$transaction_method = $input['transaction_method'] ?? '';
$campuses = $input['campuses'] ?? [];

$currentPlan = mysqli_fetch_assoc(mysqli_query($link, "SELECT Amount FROM edumesplan WHERE PlanID = '$current_plan_id'"));
$newPlan = mysqli_fetch_assoc(mysqli_query($link, "SELECT Amount FROM edumesplan WHERE PlanID = '$new_plan_id'"));
$current_plan_amount = (float)($currentPlan['Amount'] ?? 0);
$new_plan_amount = (float)($newPlan['Amount'] ?? 0);

$wamentorData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM whatsappapikey WHERE Purpose='Default' AND Api_source='wamentor'"));
$wamentor_key = $wamentorData['ApiKey'] ?? '';
 $wamentor_userid = isset($wamentorData['Api_userid']) ? (int)$wamentorData['Api_userid'] : 0;
$session = mysqli_fetch_assoc(mysqli_query($link, "SELECT sessionName FROM session WHERE sessionStatus = '1'"))['sessionName'] ?? '';
$termRow = mysqli_fetch_assoc(mysqli_query($link, "SELECT TermOrSemesterName, TermOrSemesterID FROM termorsemester WHERE status = '1'"));
$term = $termRow['TermOrSemesterName'] ?? '';
$termID = $termRow['TermOrSemesterID'] ?? '';

$date = date("Y-m-d H:i:s");
$status = 'paid';

if (!$institutionId || !$UserID || !$current_plan_id || !$new_plan_id || !$session || !$termID) {
    echo json_encode(['success' => false, 'message' => 'Missing required parameters']);
    exit;
}

$insertedCampuses = [];
$total_payment = 0;
$transaction_type = ($new_plan_amount > $current_plan_amount) ? 'upgrade' : 'downgrade';

foreach ($campuses as $data) {
    $campusID = (int)$data['campusID'];
    $topUp = (float)$data['topUp'];
    if ($topUp <= 0) continue;

    $ref_number = generateRefID(strtoupper($transaction_type) . '-');
    $result = mysqli_query($link, "INSERT INTO plantransaction (
        CampusID, PlanID, SessionName, TermOrSemesterName,
        ActualAmount, DiscountedAmount, DatePaid,
        ref_number, transaction_type, transaction_method
    ) VALUES (
        '$campusID', '$new_plan_id', '$session', '$termID',
        '$topUp', 0, '$date',
        '$ref_number', '$transaction_type', '$transaction_method')");

    if (!$result) {
        echo json_encode(['success' => false, 'message' => "Insert failed for campus ID $campusID", 'error' => mysqli_error($link)]);
        exit;
    }
    $insertedCampuses[] = ['campusID' => $campusID, 'amount' => $topUp];
    $total_payment += $topUp;
}

if ($total_payment > 0) {
    mysqli_query($link, "UPDATE 
    institution SET ActualPlan='$new_plan_id' WHERE InstitutionID='$institutionId'");

    if($transaction_method =="wallet")
    {
        mysqli_query($link, "UPDATE
        agencyorschoolowner SET WalletBalance = WalletBalance - $total_payment WHERE AgencyOrSchoolOwnerID = '$UserID'");
    }
   

    // In-app notification for school owner
    $des = "Your payment of -NGN" . number_format($total_payment,
     2) . " for the school plan 
     $transaction_type was successful. Reference: $ref_number.
      Thank you for using EduMESS!";
    insert_notifications(0, $UserID, $UserType, $des);

    $schoolName = mysqli_fetch_assoc(mysqli_query($link, "SELECT InstitutionGeneralName FROM institution INNER JOIN campus ON institution.InstitutionID = campus.InstitutionID WHERE campus.CampusID = '{$campusID}'"))['InstitutionGeneralName'] ?? 'A School';

    $structure = mysqli_query($link, "SELECT level, percentage FROM affiliate_payment_structure");
    $percentages = array_fill_keys(['lead','direct','level 1','level 2','company'], 0);
    while ($row = mysqli_fetch_assoc($structure)) $percentages[strtolower($row['level'])] = $row['percentage'];

    $company_share = ($total_payment * $percentages['company']) / 100;
    $affiliate_share = ($total_payment * $percentages['direct']) / 100;

    $affiliate = mysqli_fetch_assoc(mysqli_query($link, "SELECT ao.prev_support_person, a.AffiliateID, ao.affiliate_lead, a.affiliate_l1, a.affiliate_l2 
        FROM agencyorschoolowner ao
        INNER JOIN affiliate a ON ao.AffiliateID = a.AffiliateID
        WHERE ao.AgencyOrSchoolOwnerID = '$UserID'"));

    $main_id = $affiliate['AffiliateID'];
    $lead_id = $affiliate['affiliate_lead'];
    $transfer_id = $affiliate['prev_support_person'];
    $lvl1_id = $affiliate['affiliate_l1'];
    $lvl2_id = $affiliate['affiliate_l2'];

    $has_transfer = $transfer_id != 0;
    [$main_pct, $transfer_pct] = [100, 0];
    if ($has_transfer) {
        $split = mysqli_fetch_assoc(mysqli_query($link, "SELECT to_percentage, from_percentage FROM affiliate_transfer_history WHERE AgencyOrSchoolOwnerID = '$UserID' AND from_affilliate_id = '$transfer_id' AND to_affilliate_id = '$main_id'"));
        if ($split) [$main_pct, $transfer_pct] = [$split['to_percentage'], $split['from_percentage']];
    }

    $ref = generateRefID();
    mysqli_query($link, "INSERT INTO company_earning (InstitutionID,
     total_payment, affiliate_share, company_percentage, company_amount, 
     has_level_1, has_level_2, ref_number, Session, Term, date) 
        VALUES ('$institutionId', '$total_payment', '$affiliate_share', 
        '{$percentages['company']}', '$company_share', 
        ".($lvl1_id != 0 ? 1 : 0).", ".($lvl2_id != 0 ? 1 : 0).", '$ref', '$session', '$termID', '$date')");

    $messages = [];
    foreach ([[$lvl1_id,'level_1',$percentages['level 1'],1], [$lvl2_id,'level_2',$percentages['level 2'],2]] as [$id,$type,$pct,$lvl]) {
        if ($id && $pct > 0) {
            $amt = round(($company_share * $pct) / 100, 2);
            mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
                VALUES ('$id','$type',$lvl,0,'$institutionId','$pct','$amt','$session','$termID','credit','$status','$ref','$date')");
            creditWallet($link, $id, $amt);
            $info = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone, Email FROM affiliate WHERE AffiliateID='$id'"));
            $messages[] = ['name'=>$info['AffiliateFName'],'phone'=>$info['Phone'],'email'=>$info['Email'],'amount'=>$amt];
            // In-app notification for Level 1 and Level 2
            if ($lvl === 1) {
                $des = "Congratulations! You have earned NGN" . number_format($amt, 2) . " as a Level 1 commission from a school plan $transaction_type.";
                insert_notifications(0, $id, 'affiliate', $des);
            } elseif ($lvl === 2) {
                $des = "Great news! You have earned NGN" .
                 number_format($amt, 2) . 
                 " as a Level 2 commission from a school plan
                  $transaction_type.";
                insert_notifications(0, $id, 'affiliate', $des);
            }
        }
    }

    if ($lead_id && $percentages['lead'] > 0) {
        $amt = round(($affiliate_share * $percentages['lead']) / 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date)
            VALUES ('$lead_id','lead',0,0,'$institutionId','{$percentages['lead']}','$amt','$session','$termID','credit','$status','$ref','$date')");
        creditWallet($link, $lead_id, $amt);
        $info = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone, Email FROM affiliate WHERE AffiliateID='$lead_id'"));
        $messages[] = ['name'=>$info['AffiliateFName'],'phone'=>$info['Phone'],'email'=>$info['Email'],'amount'=>$amt];
        $affiliate_share -= $amt;
        // In-app notification for Lead
        $des = "Awesome! You have earned NGN" . number_format($amt, 2) . " as a Lead commission from a school plan $transaction_type.";
        insert_notifications(0, $lead_id, 'affiliate', $des);
    }

    foreach ([[$main_id, $main_pct, 'main', 0], [$transfer_id, $transfer_pct, 'transfer', 1]] as [$id, $pct, $type, $is_transfer]) {
        if (!$id || ($type === 'transfer' && !$has_transfer) || ($type === 'transfer' && $main_id == $transfer_id)) continue;
        $amt = round(($affiliate_share * $pct) / 100, 2);
        $aff_pct = round(($amt / $total_payment) * 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$id','$type',0,$is_transfer,'$institutionId','$aff_pct','$amt','$session','$termID','credit','$status','$ref','$date')");
        creditWallet($link, $id, $amt);
        $info = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone, Email FROM affiliate WHERE AffiliateID='$id'"));
        $messages[] = ['name'=>$info['AffiliateFName'],'phone'=>$info['Phone'],'email'=>$info['Email'],'amount'=>$amt];
        // In-app notification for Main and Transfer
        if ($type === 'main') {
            $des = "You have received NGN" . number_format($amt, 2) . " as your main affiliate commission from a school plan $transaction_type.";
            insert_notifications(0, $id, 'affiliate', $des);
        } elseif ($type === 'transfer') {
            $des = "You have received NGN" . number_format($amt, 2) . " as a transfer commission from a school plan $transaction_type.";
            insert_notifications(0, $id, 'affiliate', $des);
        }
    }

    // Get school details for email notifications
    $school = mysqli_fetch_assoc(mysqli_query($link, "SELECT AgencyOrSchoolOwnerName, AgencyOrSchoolOwnerMainPhone, AgencyOrSchoolOwnerEmail FROM agencyorschoolowner WHERE AgencyOrSchoolOwnerID = '$UserID'"));

    // Return response to user BEFORE any messaging
    echo json_encode(['success' => true, 'inserted' => $insertedCampuses, 
    'message' => "Plan {$transaction_type} successful. Payments have been processed."]);

    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
    }

    // Now send WhatsApp and email notifications in the background
    if ($total_payment > 0) {
        // Send WhatsApp notifications
        sendWhatsAppMsg([
            "user_id" => $wamentor_userid,
            "template_id" => "admin-notify",
            "message" => "Hi {{number}}, NGN {{amount}} was earned from {{school}} ({{plan_status}}).\n\nReference: {{ref}}\nTerm: {{term}}\nSession: {{session}}\n\nThank you for using EduMESS!",
            "contacts" => [[
                "number" => "+2349035315300",
                "name" => "EduMESS",
                "amount" => number_format($company_share, 2),
                "school" => $schoolName,
                "plan_status" => $transaction_type,
                "ref" => $ref,
                "term" => $term,
                "session" => $session
            ]]
        ], $wamentor_key);

        $affPayload = [
            "user_id" => $wamentor_userid,
            "template_id" => "plan-notify",
            "message" => "Hi {{name}}, you've just earned NGN {{amount}} from {{school}} subscription ({{plan_status}}).",
            "contacts" => []
        ];

        foreach ($messages as $msg) {
            $affPayload['contacts'][] = [
                "number" => $msg['phone'],
                "name" => $msg['name'],
                "amount" => number_format($msg['amount'], 2),
                "school" => $schoolName,
                "plan_status" => $transaction_type
            ];
        }

        sendWhatsAppMsg($affPayload, $wamentor_key);

        // Send email notifications
        foreach ($messages as $msg) {
            if (!empty($msg['email'])) {
                $email_content = generateAffiliateEarningEmail($msg['name'], $msg['amount'], 
                $schoolName, $ref, $session, $term, $transaction_type);
                sendEmail($link, $msg['email'], $msg['name'], "Earning Notification - NGN " . number_format($msg['amount'], 2),
                 $email_content);
            }
        }
        
        // Send email to school
        if ($school && !empty($school['AgencyOrSchoolOwnerEmail']) && !empty($school['AgencyOrSchoolOwnerName'])) {

            $school_email_content = generateSchoolPaymentEmail($school['AgencyOrSchoolOwnerName'],
             $total_payment, $ref, $session, $term, $transaction_type);
            sendEmail($link, $school['AgencyOrSchoolOwnerEmail'], $school['AgencyOrSchoolOwnerName'], 
            "Plan $transaction_type Confirmation - NGN " . number_format($total_payment, 2), $school_email_content);

        }
        
        // Send admin notification email
        $admin_email = 'finance@edumess.com';
        if (!empty($admin_email)) {
            $admin_email_content = generateAdminNotificationEmail($schoolName, $total_payment, $company_share, $ref, $session, $term, $transaction_type);
            sendEmail($link, $admin_email, 'EduMESS Admin', "New Plan $transaction_type - NGN " . number_format($total_payment, 2), $admin_email_content);
        }
    }
}
?>
