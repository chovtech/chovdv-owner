<?php
include('../../../config/config.php');

// Include PHPMailer for email notifications
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../../PHPMailer-master/Exception.php');
require_once('../../PHPMailer-master/PHPMailer.php');
require_once('../../PHPMailer-master/SMTP.php');

// Include WhatsApp messaging
require_once('../../owner/messaging/wametor/send_wa_msg.php');

// Check if POST data exists
if (!isset($_POST['transfer_id']) || !isset($_POST['user_id'])) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Missing required parameters",
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

$transfer_id = $_POST['transfer_id'];
$user_id = $_POST['user_id'];

// Validate database connection
if (!$link) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Database connection failed",
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

// Get transfer details and verify ownership
$pros_get_transfer_sql = "SELECT 
                            st.*,
                            CONCAT(a.AffiliateFName, ' ', a.AffiliateLName) as from_affiliate_name,
                            a.Email as from_affiliate_email,
                            a.Phone as from_affiliate_phone,
                            CONCAT(b.AffiliateFName, ' ', b.AffiliateLName) as to_affiliate_name,
                            b.Email as to_affiliate_email,
                            b.Phone as to_affiliate_phone,
                            i.InstitutionGeneralName as school_name
                         FROM affiliate_transfer_history st
                         INNER JOIN affiliate a ON st.from_affilliate_id = a.AffiliateID
                         INNER JOIN affiliate b ON st.to_affilliate_id = b.AffiliateID
                         INNER JOIN institution i ON st.AgencyOrSchoolOwnerID = i.AgencyOrSchoolOwnerID
                         WHERE st.id = '$transfer_id' 
                         AND (st.Status = 'pending' OR st.Status = 'rejected')";

$pros_get_transfer_result = mysqli_query($link, $pros_get_transfer_sql);

if (!$pros_get_transfer_result) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Database query failed: " . mysqli_error($link),
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

$pros_get_transfer_row = mysqli_fetch_assoc($pros_get_transfer_result);

if (!$pros_get_transfer_row) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Transfer request not found or cannot be cancelled",
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

// Check if current user is the original affiliate (from person)
if ($pros_get_transfer_row['from_affilliate_id'] != $user_id) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Unauthorized access - only the original affiliate can cancel this request",
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

// Start transaction
mysqli_begin_transaction($link);

try {
    // Delete the transfer request from affiliate_transfer_history
    $pros_delete_transfer_sql = "DELETE FROM affiliate_transfer_history WHERE id = '$transfer_id'";
    
    if (!mysqli_query($link, $pros_delete_transfer_sql)) {
        throw new Exception("Failed to delete transfer request: " . mysqli_error($link));
    }
    
    // Check if any rows were affected
    if (mysqli_affected_rows($link) == 0) {
        throw new Exception("No transfer request found to delete");
    }
    
    $response = array(
        "requestSuccessful" => true,
        "responseMessage" => "success",
        "responseDescription" => "Transfer request deleted successfully.",
        "responseBody" => array(
            "school_name" => $pros_get_transfer_row['school_name'],
            "to_affiliate" => $pros_get_transfer_row['to_affiliate_name']
        )
    );
    
    // Commit transaction immediately
    mysqli_commit($link);
    
    // Send response immediately for fast user feedback
    echo json_encode($response);
    
    // Send notifications asynchronously (non-blocking)
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request(); // Flush response to client
    }
    
   
    $notif_msg = "A school transfer request for 
    '" . $pros_get_transfer_row['school_name'] . "' 
    
    has been cancelled by '" . $pros_get_transfer_row['from_affiliate_name'] . "'.";
    insert_notifications(0, 
    $pros_get_transfer_row['to_affilliate_id'], 
    'affiliate', $notif_msg);

    // Send notifications in background
    sendCancellationNotifications($pros_get_transfer_row);
    
} catch (Exception $e) {
    // Rollback transaction
    mysqli_rollback($link);
    
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Failed to delete transfer: " . $e->getMessage(),
        "responseBody" => array()
    );
    echo json_encode($response);
}

// Function to send cancellation notifications
function sendCancellationNotifications($transfer_data) {
    // Send email notification to target affiliate
    if (!empty($transfer_data['to_affiliate_email'])) {
        sendCancellationEmail($transfer_data);
    }
    
    // Send WhatsApp notification to target affiliate
    if (!empty($transfer_data['to_affiliate_phone'])) {
        sendCancellationWhatsApp($transfer_data);
    }
}

// Function to send cancellation email
function sendCancellationEmail($transfer_data) {
    try {
        global $link;

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
        $mail->Timeout = 10;
        
        $mail->setFrom($servername, 'EduMESS');
        $mail->addAddress($transfer_data['to_affiliate_email']);
        
        $mail->isHTML(true);
        $mail->Subject = "Transfer Request Cancelled - School Transfer";
        $mail->Body = generateCancellationEmailHTML($transfer_data);
        $mail->AltBody = strip_tags($mail->Body);
        
        $mail->send();
        
    } catch (Exception $e) {
        error_log("Cancellation email sending failed: " . $e->getMessage());
    }
}

// Function to send cancellation WhatsApp
function sendCancellationWhatsApp($transfer_data) {
    try {
        global $link;
        $wamentorData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM whatsappapikey WHERE Purpose='Default' AND Api_source='wamentor'"));
        $wamentor_key = $wamentorData['ApiKey'] ?? '';
         $wamentor_userid = isset($wamentorData['Api_userid']) ? (int)$wamentorData['Api_userid'] : 0;
        
        if (empty($wamentor_key)) return;
        
        sendWhatsAppMsg([
            "user_id" => $wamentor_userid,
            "template_id" => "transfer-cancelled",
            "message" => "Hi {{name}}, a school transfer request has been CANCELLED.\n\nSchool: {{school}}\nCancelled by: {{cancelled_by}}\nCancellation Date: {{cancellation_date}}\n\nYou no longer need to take any action on this transfer request.",
            "contacts" => [
                [
                    "number" => $transfer_data['to_affiliate_phone'],
                    "name" => $transfer_data['to_affiliate_name'],
                    "school" => $transfer_data['school_name'],
                    "cancelled_by" => $transfer_data['from_affiliate_name'],
                    "cancellation_date" => date('F j, Y g:i A')
                ]
            ]
        ], $wamentor_key);
        
    } catch (Exception $e) {
        error_log("Cancellation WhatsApp sending failed: " . $e->getMessage());
    }
}

// Function to generate cancellation email HTML
function generateCancellationEmailHTML($transfer_data) {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Transfer Request Cancelled</title>
    </head>
    <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
            <div style='background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;'>
                <h2 style='color: #6c757d; margin-bottom: 20px;'>🚫 Transfer Request Cancelled</h2>
                <p>Dear <strong>{$transfer_data['to_affiliate_name']}</strong>,</p>
                <p>A transfer request has been <strong>cancelled</strong> by <strong>{$transfer_data['from_affiliate_name']}</strong>.</p>
            </div>
            
            <div style='background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #dee2e6;'>
                <h3 style='color: #495057; border-bottom: 2px solid #6c757d; padding-bottom: 10px;'>Transfer Details</h3>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>School:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>{$transfer_data['school_name']}</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Cancelled by:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>{$transfer_data['from_affiliate_name']}</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Cancellation Date:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>" . date('F j, Y g:i A') . "</td>
                    </tr>
                </table>
            </div>
            
            <div style='background: #e9ecef; padding: 15px; border-radius: 10px; margin-top: 20px; border-left: 4px solid #6c757d;'>
                <p style='margin: 0; color: #495057;'><strong>Note:</strong> You no longer need to take any action on this transfer request. The school remains under the original affiliate's management.</p>
            </div>
            
            <div style='text-align: center; margin-top: 30px; color: #6c757d; font-size: 14px;'>
                <p>Best regards,<br><strong>EduMESS Team</strong></p>
            </div>
        </div>
    </body>
    </html>";
}
?> 