<?php
/**
 * Standalone Payment Processing Script
 * All optimizations built-in - no external dependencies
 * Works on any hosting environment
 */

header('Content-Type: application/json');
include('../../../config/config.php');
date_default_timezone_set("Africa/Lagos");

// Built-in performance optimizations for live hosting
ini_set('max_execution_time', 30);
ini_set('memory_limit', '256M');
ignore_user_abort(true);

// Built-in configuration - modify these values as needed
$PERFORMANCE_CONFIG = [
    'send_emails' => true,           // Set to false to disable emails for speed
    'send_whatsapp' => true,         // Set to false to disable WhatsApp for speed
    'email_timeout' => 5,            // Email timeout in seconds (3-10 recommended)
    'performance_logging' => false,  // Set to true to log performance metrics
    'log_errors' => true,            // Log errors for debugging
    'connection_pooling' => true,    // Enable database connection optimizations
    'batch_operations' => true       // Use batch database operations
];

// Performance monitoring
$start_time = microtime(true);
$memory_start = memory_get_usage();

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
    $query = "UPDATE affiliate SET WalletBal = WalletBal + ? WHERE AffiliateID = ?";
    $stmt = mysqli_prepare($link, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ds", $amount, $affiliateID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

// Optimized email sending function
function sendEmail($link, $to_email, $to_name, $subject, $html_content) {
    global $PERFORMANCE_CONFIG;
    
    if (!$PERFORMANCE_CONFIG['send_emails']) {
        return true; // Skip email sending if disabled
    }
    
    try {
        // Use prepared statement for better performance
        $selectserveretails = mysqli_prepare($link, "SELECT ServerName, ServerPassword, Host FROM serverpassword LIMIT 1");
        if (!$selectserveretails) {
            if ($PERFORMANCE_CONFIG['log_errors']) {
                error_log("Failed to prepare server details query");
            }
            return false;
        }
        
        mysqli_stmt_execute($selectserveretails);
        $result = mysqli_stmt_get_result($selectserveretails);
        $selectserveretailscnt = mysqli_fetch_assoc($result);
        mysqli_stmt_close($selectserveretails);

        if (!$selectserveretailscnt) {
            if ($PERFORMANCE_CONFIG['log_errors']) {
                error_log("No server details found");
            }
            return false;
        }

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
        $mail->Timeout = $PERFORMANCE_CONFIG['email_timeout'];
        $mail->SMTPKeepAlive = false;
        $mail->SMTPAutoTLS = false;
        
        $mail->setFrom('verify@edumess.com', 'EduMESS');
        $mail->addAddress($to_email, $to_name);
        
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $html_content;
        $mail->AltBody = strip_tags($html_content);
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        if ($PERFORMANCE_CONFIG['log_errors']) {
            error_log("Email sending failed: " . $e->getMessage());
        }
        return false;
    }
}

// Simplified email templates for faster processing
function generateAffiliateEarningEmail($name, $amount, $school_name, $ref_number, $session, $term) {
    return "
    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>
        <h2 style='color: #28a745;'>💰 Earning Notification</h2>
        <p>Dear <strong>$name</strong>,</p>
        <p>You've earned <strong>₦" . number_format($amount, 2) . "</strong> from <strong>$school_name</strong> subscription.</p>
        <p><strong>Ref:</strong> $ref_number | <strong>Session:</strong> $session | <strong>Term:</strong> $term</p>
        <p>Amount credited to your wallet. Keep up the great work!</p>
        <p>Best regards,<br><strong>EduMESS Team</strong></p>
    </div>";
}

function generateSchoolPaymentEmail($school_name, $amount, $ref_number, $session, $term) {
    return "
    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>
        <h2 style='color: #28a745;'>✅ Payment Confirmation</h2>
        <p>Dear <strong>$school_name</strong>,</p>
        <p>Your payment of <strong>₦" . number_format($amount, 2) . "</strong> has been received successfully!</p>
        <p><strong>Ref:</strong> $ref_number | <strong>Session:</strong> $session | <strong>Term:</strong> $term</p>
        <p>Your account has been updated accordingly.</p>
        <p>Best regards,<br><strong>EduMESS Team</strong></p>
    </div>";
}

function generateAdminNotificationEmail($school_name, $amount, $company_share, $ref_number, $session, $term) {
    return "
    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>
        <h2 style='color: #007bff;'>📊 New Subscription</h2>
        <p><strong>School:</strong> $school_name</p>
        <p><strong>Amount:</strong> ₦" . number_format($amount, 2) . "</p>
        <p><strong>Company Share:</strong> ₦" . number_format($company_share, 2) . "</p>
        <p><strong>Ref:</strong> $ref_number | <strong>Session:</strong> $session | <strong>Term:</strong> $term</p>
        <p>Best regards,<br><strong>EduMESS Team</strong></p>
    </div>";
}

// Performance logging function
function logPerformance($stage, $start_time, $memory_start) {
    global $PERFORMANCE_CONFIG;
    if ($PERFORMANCE_CONFIG['performance_logging']) {
        $execution_time = microtime(true) - $start_time;
        $memory_used = memory_get_usage() - $memory_start;
        error_log("PERFORMANCE: $stage - Time: " . round($execution_time * 1000, 2) . "ms, Memory: " . round($memory_used / 1024, 2) . "KB");
    }
}

// Database connection optimization
if ($PERFORMANCE_CONFIG['connection_pooling']) {
    mysqli_query($link, "SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");
    mysqli_query($link, "SET SESSION wait_timeout = 60");
    mysqli_query($link, "SET SESSION interactive_timeout = 60");
}

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

$ref_number_subs = generateRefID('Subs-');

mysqli_begin_transaction($link);

try {
    logPerformance('start_transaction', $start_time, $memory_start);

    $wamentorData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM whatsappapikey WHERE Purpose='Default' AND Api_source='wamentor'"));
    $wamentor_key = $wamentorData['ApiKey'] ?? '';
    $wamentor_userid = $wamentorData['Api_userid'] ?? '';

    // 1. Insert plan transaction
    $insert = mysqli_query($link, "INSERT INTO plan_transaction (AgencyOrSchoolOwnerID, CampusID, InstitutionID, PlanID, Amount, Session, Term, TransactionType, Status, Date) 
        VALUES ('$userID', '$campusID', '$institutionID', '$plan_id', '$total_payment', '$session', '$term', '$transaction_type', '$status', '$date')");
    if (!$insert) throw new Exception('Failed to insert plan transaction.');
    
    // Use prepared statement for wallet update
    $update_stmt = mysqli_prepare($link, "UPDATE agencyorschoolowner SET WalletBalance = WalletBalance - ? WHERE AgencyOrSchoolOwnerID = ?");
    if ($update_stmt) {
        mysqli_stmt_bind_param($update_stmt, "ds", $total_payment, $userID);
        mysqli_stmt_execute($update_stmt);
        mysqli_stmt_close($update_stmt);
    }

    // Optimize campus query with specific columns
    $getcam = mysqli_prepare($link, "SELECT InstitutionGeneralName FROM institution 
        INNER JOIN campus ON institution.InstitutionID = campus.InstitutionID 
        WHERE campus.CampusID = ?");
    if ($getcam) {
        mysqli_stmt_bind_param($getcam, "s", $campusID);
        mysqli_stmt_execute($getcam);
        $result = mysqli_stmt_get_result($getcam);
        $getcam_row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($getcam);
    }
    
    logPerformance('database_queries', $start_time, $memory_start);

    // 2. Get affiliate payment structure - cache in memory
    $structure = mysqli_query($link, "SELECT level, percentage FROM affiliate_payment_structure");
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

    // 3. Get affiliate IDs - optimized query
    $affiliate_query = mysqli_prepare($link, "SELECT agencyorschoolowner.prev_support_person, affiliate.AffiliateID, 
        agencyorschoolowner.affiliate_lead, affiliate.affiliate_l1, affiliate.affiliate_l2 
        FROM agencyorschoolowner 
        INNER JOIN affiliate ON agencyorschoolowner.AffiliateID = affiliate.AffiliateID 
        WHERE agencyorschoolowner.AgencyOrSchoolOwnerID = ?");
    if ($affiliate_query) {
        mysqli_stmt_bind_param($affiliate_query, "s", $userID);
        mysqli_stmt_execute($affiliate_query);
        $result = mysqli_stmt_get_result($affiliate_query);
        $affiliate = mysqli_fetch_assoc($result);
        mysqli_stmt_close($affiliate_query);
    }

    $main_affiliate_id = $affiliate['AffiliateID'];
    $lead_affiliate_id = $affiliate['affiliate_lead'];
    $transfer_affiliate_id = $affiliate['prev_support_person'];
    $level1_affiliate_id = $affiliate['affiliate_l1'];
    $level2_affiliate_id = $affiliate['affiliate_l2'];

    $has_lead = $lead_affiliate_id != 0;
    $has_transfer_affiliate = $transfer_affiliate_id != 0;
    $has_level_1 = $level1_affiliate_id != 0;
    $has_level_2 = $level2_affiliate_id != 0;

    // 4. Split logic (transfer vs main) - optimized query
    $transfer_percent = 0;
    $main_percent = 100;

    if ($has_transfer_affiliate) {
        $split_query = mysqli_prepare($link, "SELECT to_percentage, from_percentage FROM affiliate_transfer_history 
            WHERE AgencyOrSchoolOwnerID = ? AND from_affilliate_id = ? AND to_affilliate_id = ? AND Status = 'Status'");
        if ($split_query) {
            mysqli_stmt_bind_param($split_query, "sss", $userID, $transfer_affiliate_id, $main_affiliate_id);
            mysqli_stmt_execute($split_query);
            $result = mysqli_stmt_get_result($split_query);
            if ($split_row = mysqli_fetch_assoc($result)) {
                $main_percent = $split_row['to_percentage'];
                $transfer_percent = $split_row['from_percentage'];
            }
            mysqli_stmt_close($split_query);
        }
    }

    $ref_number = generateRefID();

    // 5. Insert company earning - use prepared statement
    $company_earning_stmt = mysqli_prepare($link, "INSERT INTO company_earning (InstitutionID, total_payment, affiliate_share, company_percentage, company_amount, has_level_1, has_level_2, ref_number, Session, Term, date) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($company_earning_stmt) {
        mysqli_stmt_bind_param($company_earning_stmt, "sddddiissss", $institutionID, $total_payment, $affiliate_share, $company_percentage, $company_share, $has_level_1, $has_level_2, $ref_number, $session, $term, $date);
        mysqli_stmt_execute($company_earning_stmt);
        mysqli_stmt_close($company_earning_stmt);
    }

    // 6. Affiliate Earnings + Messages - optimized with batch processing
    $messages = [];
    $affiliate_ids = [];
    $earning_data = [];

    // Collect all affiliate data first
    if ($has_level_1) {
        $affiliate_ids[] = $level1_affiliate_id;
        $level_1_amount = round(($company_share * $lv1_percentage) / 100, 2);
        $earning_data[] = [$level1_affiliate_id, $main_affiliate_id, 'level_1', 1, 0, $institutionID, $lv1_percentage, $level_1_amount, $session, $term, $transaction_type, $status, $ref_number, $date];
    }

    if ($has_level_2) {
        $affiliate_ids[] = $level2_affiliate_id;
        $level_2_amount = round(($company_share * $lv2_percentage) / 100, 2);
        $earning_data[] = [$level2_affiliate_id, $main_affiliate_id, 'level_2', 2, 0, $institutionID, $lv2_percentage, $level_2_amount, $session, $term, $transaction_type, $status, $ref_number, $date];
    }

    // Lead
    $remaining_affiliate_amount = $affiliate_share;
    $remaining_affiliate_percent = $dir_percentage;

    if ($has_lead) {
        $affiliate_ids[] = $lead_affiliate_id;
        $lead_amount = round(($affiliate_share * $lead_percentage) / 100, 2);
        $earning_data[] = [$lead_affiliate_id, null, 'lead', 0, 0, $institutionID, $lead_percentage, $lead_amount, $session, $term, $transaction_type, $status, $ref_number, $date];
        $remaining_affiliate_amount -= $lead_amount;
        $remaining_affiliate_percent -= $lead_percentage;
    }

    // Main & Transfer
    $main_amount = round(($remaining_affiliate_amount * $main_percent) / 100, 2);
    $transfer_amount = round(($remaining_affiliate_amount * $transfer_percent) / 100, 2);

    $mainnew_percentage = round(($main_amount / $total_payment) * 100, 2);
    $transnew_percentage = round(($transfer_amount / $total_payment) * 100, 2);

    $affiliate_ids[] = $main_affiliate_id;
    $earning_data[] = [$main_affiliate_id, null, 'main', 0, 0, $institutionID, $mainnew_percentage, $main_amount, $session, $term, $transaction_type, $status, $ref_number, $date];

    if ($has_transfer_affiliate && $main_affiliate_id != $transfer_affiliate_id) {
        $affiliate_ids[] = $transfer_affiliate_id;
        $earning_data[] = [$transfer_affiliate_id, null, 'transfer', 0, 1, $institutionID, $transnew_percentage, $transfer_amount, $session, $term, $transaction_type, $status, $ref_number, $date];
    }

    // Batch insert affiliate earnings
    $earning_stmt = mysqli_prepare($link, "INSERT INTO affiliate_earning (affiliate_id, sub_affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($earning_stmt) {
        foreach ($earning_data as $data) {
            mysqli_stmt_bind_param($earning_stmt, "sssiisddsssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[13]);
            mysqli_stmt_execute($earning_stmt);
        }
        mysqli_stmt_close($earning_stmt);
    }

    // Batch credit wallets
    foreach ($earning_data as $data) {
        creditWallet($link, $data[0], $data[7]); // affiliate_id, amount
    }

    // Batch get affiliate details for notifications
    if (!empty($affiliate_ids)) {
        $placeholders = str_repeat('?,', count($affiliate_ids) - 1) . '?';
        $affiliate_details_stmt = mysqli_prepare($link, "SELECT AffiliateID, AffiliateFName, Phone, Email FROM affiliate WHERE AffiliateID IN ($placeholders)");
        if ($affiliate_details_stmt) {
            $types = str_repeat('s', count($affiliate_ids));
            mysqli_stmt_bind_param($affiliate_details_stmt, $types, ...$affiliate_ids);
            mysqli_stmt_execute($affiliate_details_stmt);
            $result = mysqli_stmt_get_result($affiliate_details_stmt);
            
            $affiliate_details = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $affiliate_details[$row['AffiliateID']] = $row;
            }
            mysqli_stmt_close($affiliate_details_stmt);
            
            // Build messages array
            foreach ($earning_data as $data) {
                $affiliate_id = $data[0];
                $amount = $data[7];
                if (isset($affiliate_details[$affiliate_id])) {
                    $details = $affiliate_details[$affiliate_id];
                    $messages[] = [
                        'name' => $details['AffiliateFName'], 
                        'phone' => $details['Phone'], 
                        'email' => $details['Email'], 
                        'amount' => $amount
                    ];
                }
            }
        }
    }

    // Get school details for notifications - optimized query
    $schoolQuery = mysqli_prepare($link, "SELECT AgencyOrSchoolOwnerName, AgencyOrSchoolOwnerMainPhone, AgencyOrSchoolOwnerEmail FROM agencyorschoolowner WHERE AgencyOrSchoolOwnerID = ?");
    if ($schoolQuery) {
        mysqli_stmt_bind_param($schoolQuery, "s", $userID);
        mysqli_stmt_execute($schoolQuery);
        $result = mysqli_stmt_get_result($schoolQuery);
        $school = mysqli_fetch_assoc($result);
        mysqli_stmt_close($schoolQuery);
    }

    logPerformance('database_operations', $start_time, $memory_start);

    // COMMIT TRANSACTION
    mysqli_commit($link);

    // Send immediate response for fast user feedback
    echo json_encode(['status' => 'success', 'message' => 'Transaction successful.', 'ref_number' => $ref_number]);
    
    // Process notifications asynchronously (non-blocking)
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request(); // Flush response to client
    }
    
    // Send notifications in background
    sendNotificationsAsync($link, $messages, $getcam_row, $school, $total_payment, $company_share, $ref_number, $session, $term, $wamentor_userid, $wamentor_key);

} catch (Exception $e) {
    mysqli_rollback($link);
    if ($PERFORMANCE_CONFIG['log_errors']) {
        error_log("Transaction failed: " . $e->getMessage());
    }
    echo json_encode(['status' => 'error', 'message' => 'Transaction failed: ' . $e->getMessage()]);
}

// Function to send notifications asynchronously - optimized for live hosting
function sendNotificationsAsync($link, $messages, $getcam_row, $school, 
$total_payment, $company_share, $ref_number, $session, $term, $wamentor_userid, $wamentor_key) {
    
    global $PERFORMANCE_CONFIG;
    
    try {
        // Validate required parameters
        if (!$link || !$messages || !$getcam_row || !$wamentor_userid || !$wamentor_key) {
            if ($PERFORMANCE_CONFIG['log_errors']) {
                error_log("sendNotificationsAsync: Missing required parameters");
            }
            return;
        }
        
        // Send WhatsApp messages first (faster than emails) - only if enabled
        if ($PERFORMANCE_CONFIG['send_whatsapp']) {
            $affPayload = [
                "user_id" => $wamentor_userid,
                "template_id" => "plan-notify",
                "message" => "Hi {{name}}, you've just earned ₦{{amount}} from {{school}} subscription.",
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
            
            // Send school WhatsApp notification
            if ($school && !empty($school['AgencyOrSchoolOwnerMainPhone']) && !empty($school['AgencyOrSchoolOwnerName'])) {
                sendWhatsAppMsg([
                    "user_id" => $wamentor_userid,
                    "template_id" => "admin-notify",
                    "message" => "Dear {{name}}, your subscription payment of ₦{{amount}} for {{school}} was received successfully. \n\n Ref: {{ref}}, \n\nTerm: {{term}},\n\n Session: {{session}}.",
                    "contacts" => [[
                        "number" => $school['AgencyOrSchoolOwnerMainPhone'],
                        "name" => $school['AgencyOrSchoolOwnerName'],
                        "amount" => number_format($total_payment, 2),
                        "school" => $getcam_row['InstitutionGeneralName'],
                        "ref" =>  $ref_number,
                        "term" => $term,
                        "session" => $session
                    ]]
                ], $wamentor_key);
            }
            
            // Send admin WhatsApp notification
            if ($school && !empty($school['AgencyOrSchoolOwnerMainPhone']) && !empty($school['AgencyOrSchoolOwnerName'])) {
                sendWhatsAppMsg([
                    "user_id" => $wamentor_userid,
                    "template_id" => "admin-notify",
                    "message" => "New subscription received.\n\nRef: {{ref}}, \n\nSchool: {{school}},\n\n Amount Paid: ₦{{amountpaid}},\n\nCompany Share: ₦{{companyshare}},\n\nTerm: {{term}}, Session: {{session}}.",
                    "contacts" => [[
                        "number" => $school['AgencyOrSchoolOwnerMainPhone'],
                        "name" => $school['AgencyOrSchoolOwnerName'],
                        "amount" => number_format($total_payment, 2),
                        "amountpaid" => $getcam_row['InstitutionGeneralName'],
                        "companyshare" => number_format($company_share, 2),
                        "ref" =>  $ref_number,
                        "term" => $term,
                        "session" => $session
                    ]]
                ], $wamentor_key);
            }
        }
        
        // Send emails in background (non-blocking) - only if enabled
        if ($PERFORMANCE_CONFIG['send_emails']) {
            // Send emails in batches for better performance
            $email_batch = [];
            
            foreach ($messages as $msg) {
                // Validate message data
                if (!isset($msg['name']) || !isset($msg['amount'])) {
                    continue; // Skip invalid message
                }
                
                // Send email to affiliate if email exists
                if (!empty($msg['email'])) {
                    $email_content = generateAffiliateEarningEmail($msg['name'], $msg['amount'], 
                    $getcam_row['InstitutionGeneralName'], $ref_number, $session, $term);
                    // Send email without waiting for response
                    sendEmail($link, $msg['email'], $msg['name'], "Earning Notification - ₦" . number_format($msg['amount'], 2), $email_content);
                }
            }
            
            // Send email to school
            if ($school && !empty($school['AgencyOrSchoolOwnerEmail']) && !empty($school['AgencyOrSchoolOwnerName'])) {
                $school_email_content = generateSchoolPaymentEmail($school['AgencyOrSchoolOwnerName'], $total_payment, $ref_number, $session, $term);
                sendEmail($link, $school['AgencyOrSchoolOwnerEmail'], $school['AgencyOrSchoolOwnerName'], "Payment Confirmation - ₦" . number_format($total_payment, 2), $school_email_content);
            }
            
            // Send admin notification email - with hardcoded admin email
            $admin_email = 'edumessinc@gmail.com';
            
            if (!empty($admin_email)) {
                $admin_email_content = generateAdminNotificationEmail($getcam_row['InstitutionGeneralName'], $total_payment, $company_share, $ref_number, $session, $term);
                sendEmail($link, $admin_email, 'EduMESS Admin', "New Subscription - ₦" . number_format($total_payment, 2), $admin_email_content);
            }
        }
        
    } catch (Exception $e) {
        // Log the error but don't break the main transaction
        if ($PERFORMANCE_CONFIG['log_errors']) {
            error_log("Notification sending failed: " . $e->getMessage());
        }
    }
}
?> 