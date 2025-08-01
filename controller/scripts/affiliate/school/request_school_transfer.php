<?php
// Enable error reporting and logging for debugging
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

include('../../../config/config.php');
include('../../email-pack/my-send-mail.php');

// Add PHPMailer use statements at the top
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Sanitize inputs
$AgencyOrSchoolOwnerID = mysqli_real_escape_string($link, $_POST['AgencyOrSchoolOwnerID']);
$new_affiliate_id = mysqli_real_escape_string($link, $_POST['new_affiliate_id']);
$school_name = mysqli_real_escape_string($link, $_POST['school_name']);
$transfer_reason = mysqli_real_escape_string($link, $_POST['transfer_reason']);
$user_id = mysqli_real_escape_string($link, $_POST['user_id']);
$user_type = mysqli_real_escape_string($link, $_POST['user_type']);
$is_return_transfer = isset($_POST['is_return_transfer']) ? $_POST['is_return_transfer'] : false;

// For return transfers, we don't need percentages
if (!$is_return_transfer) {
    $from_percentage = mysqli_real_escape_string($link, $_POST['from_percentage']);
    $to_percentage = mysqli_real_escape_string($link, $_POST['to_percentage']);
} else {
    // For return transfers, set percentages to 100% for original owner and 0% for current user
    $from_percentage = 0; // Current user gets 0%
    $to_percentage = 100; // Original owner gets 100%
}

// Validate inputs
if (empty($AgencyOrSchoolOwnerID) || empty($new_affiliate_id) || empty($school_name)) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "failed",
        "responseDescription" => "Missing required data",
        "responseBody" => array()
    );
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit;
}

// Validate percentages only for normal transfers
if (!$is_return_transfer) {
    if (!is_numeric($from_percentage) || !is_numeric($to_percentage) || 
        $from_percentage < 0 || $from_percentage > 100 || 
        $to_percentage < 0 || $to_percentage > 100 || 
        ($from_percentage + $to_percentage) != 100) {
        $response = array(
            "requestSuccessful" => false,
            "responseMessage" => "failed",
            "responseDescription" => "Invalid percentage values. Total must equal 100%.",
            "responseBody" => array()
        );
        
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit;
    }
}

// Check if transfer already exists
$pros_check_transfer_sql = "SELECT id FROM affiliate_transfer_history 
                           WHERE AgencyOrSchoolOwnerID = '$AgencyOrSchoolOwnerID' AND Status = 'pending'";
$pros_check_transfer_result = mysqli_query($link, $pros_check_transfer_sql);
$pros_check_transfer_count = mysqli_num_rows($pros_check_transfer_result);

if ($pros_check_transfer_count > 0) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "failed",
        "responseDescription" => "Transfer request already pending for this school",
        "responseBody" => array()
    );
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit;
}

// Check if this school was transferred to the current user
$check_transferred_school_sql = "SELECT from_affilliate_id, to_affilliate_id, Status 
                                FROM affiliate_transfer_history 
                                WHERE AgencyOrSchoolOwnerID = '$AgencyOrSchoolOwnerID' 
                                AND to_affilliate_id = '$user_id' 
                                AND Status = 'approved'
                                ORDER BY request_date DESC 
                                LIMIT 1";
$check_transferred_school_result = mysqli_query($link, $check_transferred_school_sql);
$transferred_school = mysqli_fetch_assoc($check_transferred_school_result);

if ($transferred_school) {
    // School was transferred to current user - can only transfer back to original owner
    $original_owner_id = $transferred_school['from_affilliate_id'];
    
    if ($new_affiliate_id != $original_owner_id) {
        $response = array(
            "requestSuccessful" => false,
            "responseMessage" => "failed",
            "responseDescription" => "This school was transferred to you. You can only transfer it back to the original owner.",
            "responseBody" => array()
        );
        
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit;
    }
}

// Get current affiliate info
$pros_current_affiliate_sql = "SELECT AffiliateFName, AffiliateLName, Email 
                              FROM affiliate WHERE AffiliateID = '$user_id'";
$pros_current_affiliate_result = mysqli_query($link, $pros_current_affiliate_sql);
$pros_current_affiliate_row = mysqli_fetch_assoc($pros_current_affiliate_result);

// Get new affiliate info
$pros_new_affiliate_sql = "SELECT AffiliateFName, AffiliateLName, Email, Phone, Country 
                          FROM affiliate WHERE AffiliateID = '$new_affiliate_id'";
$pros_new_affiliate_result = mysqli_query($link, $pros_new_affiliate_sql);
$pros_new_affiliate_row = mysqli_fetch_assoc($pros_new_affiliate_result);

if (!$pros_new_affiliate_row) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "failed",
        "responseDescription" => "Invalid affiliate selected",
        "responseBody" => array()
    );
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit;
}

// Insert transfer request
$pros_insert_transfer_sql = "INSERT INTO affiliate_transfer_history 
                            (`from_affilliate_id`, `to_affilliate_id`, 
                            `from_percentage`, `to_percentage`, 
                            `AgencyOrSchoolOwnerID`,
                            `request_date`,  `Reason`, `Status`) 
                            VALUES ('$user_id', '$new_affiliate_id', '$from_percentage', '$to_percentage', '$AgencyOrSchoolOwnerID', 
                            NOW(),  '$transfer_reason', 'pending')";

if (mysqli_query($link, $pros_insert_transfer_sql)) {
    $transfer_id = mysqli_insert_id($link);
    
    // Send immediate response first
    $subject = $is_return_transfer ? "School Return Request" : "School Transfer Request";
    $response = array(
        "requestSuccessful" => true,
        "responseMessage" => "success",
        "responseDescription" => "Transfer request sent successfully",
        "responseBody" => array(
            'transfer_id' => $transfer_id,
            'message' => 'Transfer request sent successfully. Waiting for approval.'
        )
    );
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    
    // Insert notifications for transfer request
    
    // Notify the new affiliate
    $notif_msg = "You have a new school transfer request for '$school_name'. Please review and approve or reject.";
    insert_notifications(0, $new_affiliate_id, 'affiliate', $notif_msg);
    // Notify the sender (confirmation)
    $notif_msg_sender = "Your transfer request for '$school_name' has been sent to the selected affiliate.";
    insert_notifications(0, $user_id, 'affiliate', $notif_msg_sender);
    
    // Process notifications asynchronously (after response is sent)
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
    }
    
    // Send email to new affiliate
    $recipientEmail = $pros_new_affiliate_row['Email'];
    $senderEmail = $pros_current_affiliate_row['Email'];

    require_once('../../PHPMailer-master/Exception.php');
    require_once('../../PHPMailer-master/PHPMailer.php');
    require_once('../../PHPMailer-master/SMTP.php');

    // Build HTML email body
    $emailBody = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>{$subject}</title>
    </head>
    <body style='font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; padding: 0;'>
        <div style='max-width: 600px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); overflow: hidden;'>
            <div style='background: #4F46E5; color: #fff; padding: 24px 32px; text-align: center;'>
                <h2 style='margin: 0; font-size: 1.7rem; font-weight: 700; letter-spacing: 1px;'>
                    " . ($is_return_transfer ? "School Return Request" : "School Transfer Request") . "
                </h2>
            </div>
            <div style='padding: 32px;'>
                <p style='font-size: 1.1rem; color: #333;'>
                    Dear <strong>{$pros_new_affiliate_row['AffiliateFName']} {$pros_new_affiliate_row['AffiliateLName']}</strong>,
                </p>
                <p style='color: #444;'>
                    You have received a " . ($is_return_transfer ? "school return" : "school transfer") . " request.
                </p>
                <table style='width: 100%; margin: 24px 0; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 8px 0; color: #555;'><strong>School Name:</strong></td>
                        <td style='padding: 8px 0; color: #222;'>{$school_name}</td>
                    </tr>
                    <tr>
                        <td style='padding: 8px 0; color: #555;'><strong>Current Owner:</strong></td>
                        <td style='padding: 8px 0; color: #222;'>{$pros_current_affiliate_row['AffiliateFName']} {$pros_current_affiliate_row['AffiliateLName']}</td>
                    </tr>
                    " . (!$is_return_transfer ? "
                    <tr>
                        <td style='padding: 8px 0; color: #555;'><strong>Revenue Sharing:</strong></td>
                        <td style='padding: 8px 0; color: #222;'>
                            {$pros_current_affiliate_row['AffiliateFName']} {$pros_current_affiliate_row['AffiliateLName']}: {$from_percentage}%<br>
                            You: {$to_percentage}%
                        </td>
                    </tr>
                    " : "") . "
                    " . (!empty($transfer_reason) ? "
                    <tr>
                        <td style='padding: 8px 0; color: #555;'><strong>Reason:</strong></td>
                        <td style='padding: 8px 0; color: #222;'>{$transfer_reason}</td>
                    </tr>
                    " : "") . "
                </table>
                <div style='background: #EEF2FF; padding: 18px; border-radius: 8px; color: #333; margin-bottom: 24px;'>
                    Please log in to your affiliate dashboard to approve or reject this request.<br>
                    <strong>This request will expire in 7 days.</strong>
                </div>
                <p style='color: #888; font-size: 0.97rem; margin-top: 32px;'>
                    Best regards,<br>
                    <strong>EduMESS Team</strong>
                </p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Fetch SMTP server details
    $selectserveretails = mysqli_query($link, "SELECT * FROM `serverpassword`");
    if (!$selectserveretails) {
        error_log('SMTP config query failed: ' . mysqli_error($link));
    }
    $selectserveretailscnt = mysqli_fetch_assoc($selectserveretails);
    $servername = $selectserveretailscnt['ServerName'] ?? '';
    $serverpwd = $selectserveretailscnt['ServerPassword'] ?? '';
    $Host = $selectserveretailscnt['Host'] ?? '';

    $mail = new PHPMailer(true);
    try {
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
        $mail->addAddress($recipientEmail);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $emailBody;
        $mail->AltBody = strip_tags($emailBody);
        $mail->send();
    } catch (Exception $e) {
        error_log('Transfer email could not be sent. PHPMailer Error: ' . $mail->ErrorInfo);
        // Optionally, for debugging, you can return this in the response (remove in production):
        // echo json_encode(['requestSuccessful' => false, 'responseMessage' => 'failed', 'responseDescription' => 'Email error: ' . $mail->ErrorInfo]);
    }
    // --- End PHPMailer email sending ---

    // Send WhatsApp notification
    require_once('../../owner/messaging/wametor/send_wa_msg.php');
    $wamentorData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM whatsappapikey WHERE Purpose='Default' AND Api_source='wamentor'"));
    $wamentor_key = $wamentorData['ApiKey'] ?? '';
     $wamentor_userid = isset($wamentorData['Api_userid']) ? (int)$wamentorData['Api_userid'] : 0;
    
    $new_affiliate_phone = $pros_new_affiliate_row['Phone'] ?? '';
    
    // Add country code if not present (dynamic based on affiliate's country)
    if (!empty($new_affiliate_phone)) {
        // Get affiliate's country
        $affiliate_country = $pros_new_affiliate_row['Country'] ?? 'NG'; // Default to Nigeria
        
        // Country code mapping
        $country_codes = [
            'NG' => '234', // Nigeria
            'GH' => '233', // Ghana
            'KE' => '254', // Kenya
            'UG' => '256', // Uganda
            'TZ' => '255', // Tanzania
            'ZA' => '27',  // South Africa
            'EG' => '20',  // Egypt
            'MA' => '212', // Morocco
            'DZ' => '213', // Algeria
            'TN' => '216', // Tunisia
            'LY' => '218', // Libya
            'SD' => '249', // Sudan
            'ET' => '251', // Ethiopia
            'SO' => '252', // Somalia
            'DJ' => '253', // Djibouti
            'ER' => '291', // Eritrea
            'SS' => '211', // South Sudan
            'CF' => '236', // Central African Republic
            'TD' => '235', // Chad
            'CM' => '237', // Cameroon
            'CG' => '242', // Republic of the Congo
            'CD' => '243', // Democratic Republic of the Congo
            'AO' => '244', // Angola
            'GW' => '245', // Guinea-Bissau
            'IO' => '246', // British Indian Ocean Territory
            'AC' => '247', // Ascension Island
            'SC' => '248', // Seychelles
            'ST' => '239', // São Tomé and Príncipe
            'GQ' => '240', // Equatorial Guinea
            'GA' => '241', // Gabon
            'ZR' => '243', // Zaire (now DRC)
            'BI' => '257', // Burundi
            'RW' => '250', // Rwanda
            'MZ' => '258', // Mozambique
            'ZW' => '263', // Zimbabwe
            'NA' => '264', // Namibia
            'MW' => '265', // Malawi
            'LS' => '266', // Lesotho
            'BW' => '267', // Botswana
            'SZ' => '268', // Eswatini
            'KM' => '269', // Comoros
            'YT' => '262', // Mayotte
            'RE' => '262', // Réunion
            'MU' => '230', // Mauritius
            'MG' => '261', // Madagascar
            'CV' => '238', // Cape Verde
            'GM' => '220', // Gambia
            'GN' => '224', // Guinea
            'SL' => '232', // Sierra Leone
            'LR' => '231', // Liberia
            'CI' => '225', // Ivory Coast
            'BF' => '226', // Burkina Faso
            'NE' => '227', // Niger
            'TG' => '228', // Togo
            'BJ' => '229', // Benin
            'ML' => '223', // Mali
            'SN' => '221', // Senegal
            'MR' => '222', // Mauritania
            'TD' => '235', // Chad
            'CF' => '236', // Central African Republic
            'CM' => '237', // Cameroon
            'CV' => '238', // Cape Verde
            'ST' => '239', // São Tomé and Príncipe
            'GQ' => '240', // Equatorial Guinea
            'GA' => '241', // Gabon
            'CG' => '242', // Republic of the Congo
            'CD' => '243', // Democratic Republic of the Congo
            'AO' => '244', // Angola
            'GW' => '245', // Guinea-Bissau
            'IO' => '246', // British Indian Ocean Territory
            'AC' => '247', // Ascension Island
            'SC' => '248', // Seychelles
            'SD' => '249', // Sudan
            'RW' => '250', // Rwanda
            'ET' => '251', // Ethiopia
            'SO' => '252', // Somalia
            'DJ' => '253', // Djibouti
            'KE' => '254', // Kenya
            'TZ' => '255', // Tanzania
            'UG' => '256', // Uganda
            'BI' => '257', // Burundi
            'MZ' => '258', // Mozambique
            'ZM' => '260', // Zambia
            'MG' => '261', // Madagascar
            'RE' => '262', // Réunion
            'ZW' => '263', // Zimbabwe
            'NA' => '264', // Namibia
            'MW' => '265', // Malawi
            'LS' => '266', // Lesotho
            'BW' => '267', // Botswana
            'SZ' => '268', // Eswatini
            'KM' => '269', // Comoros
            'YT' => '262', // Mayotte
            'MU' => '230', // Mauritius
            'CV' => '238', // Cape Verde
            'GM' => '220', // Gambia
            'GN' => '224', // Guinea
            'SL' => '232', // Sierra Leone
            'LR' => '231', // Liberia
            'CI' => '225', // Ivory Coast
            'BF' => '226', // Burkina Faso
            'NE' => '227', // Niger
            'TG' => '228', // Togo
            'BJ' => '229', // Benin
            'ML' => '223', // Mali
            'SN' => '221', // Senegal
            'MR' => '222', // Mauritania
        ];
        
        // Get country code, default to Nigeria if not found
        $country_code = $country_codes[$affiliate_country] ?? '234';
        
        // Remove any existing + or 00 prefix
        $clean_phone = preg_replace('/^(\+|00)/', '', $new_affiliate_phone);
        
        // If number doesn't start with country code, add it
        if (!preg_match('/^' . $country_code . '/', $clean_phone)) {
            // Remove leading 0 if present
            $clean_phone = ltrim($clean_phone, '0');
            $new_affiliate_phone = '+' . $country_code . $clean_phone;
        } else {
            $new_affiliate_phone = '+' . $clean_phone;
        }
    }
    
    if (!empty($new_affiliate_phone) && !empty($wamentor_key)) {
        if ($is_return_transfer) {
            sendWhatsAppMsg([
                "user_id" => $wamentor_userid,
                "template_id" => "return-transfer-request",
                "message" => "Hi {{name}}, you have received a school return request.\n\nSchool: {{school}}\nFrom: {{from_affiliate}}\n\nThis is a return transfer request. The school will be returned to you as the original owner.\n\nPlease login to approve or reject this return request.",
                "contacts" => [
                    [
                        "number" => $new_affiliate_phone,
                        "name" => $pros_new_affiliate_row['AffiliateFName'] . ' ' . $pros_new_affiliate_row['AffiliateLName'],
                        "school" => $school_name,
                        "from_affiliate" => $pros_current_affiliate_row['AffiliateFName'] . ' ' . $pros_current_affiliate_row['AffiliateLName']
                    ]
                ]
            ], $wamentor_key);
        } else {
            sendWhatsAppMsg([
                "user_id" => $wamentor_userid,
                "template_id" => "transfer-request",
                "message" => "Hi {{name}}, you have received a school transfer request.\n\nSchool: {{school}}\nFrom: {{from_affiliate}}\nYour Share: {{your_share}}%\nFrom Share: {{from_share}}%\n\nPlease login to approve or reject this transfer.",
                "contacts" => [
                    [
                        "number" => $new_affiliate_phone,
                        "name" => $pros_new_affiliate_row['AffiliateFName'] . ' ' . $pros_new_affiliate_row['AffiliateLName'],
                        "school" => $school_name,
                        "from_affiliate" => $pros_current_affiliate_row['AffiliateFName'] . ' ' . $pros_current_affiliate_row['AffiliateLName'],
                        "your_share" => $to_percentage,
                        "from_share" => $from_percentage
                    ]
                ]
            ], $wamentor_key);
        }
    }
    
} else {
    // Debug: Get the exact MySQL error
    $mysql_error = mysqli_error($link);
    error_log("DB Insert Error: $mysql_error | SQL: $pros_insert_transfer_sql");
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "failed",
        "responseDescription" => "Failed to create transfer request. Error: " . $mysql_error,
        "responseBody" => array(
            'error' => $mysql_error,
            'sql' => $pros_insert_transfer_sql
        )
    );
    // Debug log for frontend
    error_log("Transfer request failed: " . json_encode($response));
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

?> 