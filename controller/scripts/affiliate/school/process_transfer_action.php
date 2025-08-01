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
if (!isset($_POST['transfer_id']) || !isset($_POST['action']) || !isset($_POST['user_id'])) {
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
$action = $_POST['action']; // 'approve' or 'reject'
$user_id = $_POST['user_id'];

// Validate action
if (!in_array($action, ['approve', 'reject'])) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Invalid action specified",
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

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

// Get all required data in a single optimized query
$pros_get_transfer_sql = "SELECT 
                            st.*,
                            CONCAT(a.AffiliateFName, ' ', a.AffiliateLName) as from_affiliate_name,
                            a.Email as from_affiliate_email,
                            a.Phone as from_affiliate_phone,
                            CONCAT(b.AffiliateFName, ' ', b.AffiliateLName) as to_affiliate_name,
                            i.InstitutionGeneralName as school_name
                         FROM affiliate_transfer_history st
                         INNER JOIN affiliate a ON st.from_affilliate_id = a.AffiliateID
                         INNER JOIN affiliate b ON st.to_affilliate_id = b.AffiliateID
                         INNER JOIN institution i ON st.AgencyOrSchoolOwnerID = i.AgencyOrSchoolOwnerID
                         WHERE st.id = '$transfer_id' 
                         AND st.Status = 'pending'";

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
        "responseDescription" => "Transfer request not found or already processed",
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

// Check if current user is the target affiliate
if ($pros_get_transfer_row['to_affilliate_id'] != $user_id) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Unauthorized access",
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

// Start transaction
mysqli_begin_transaction($link);

try {
    if ($action == 'approve') {
        // Check if this is a transfer back to the original owner
        $check_original_owner_sql = "SELECT from_affilliate_id, to_affilliate_id 
                                    FROM affiliate_transfer_history 
                                    WHERE AgencyOrSchoolOwnerID = '" . $pros_get_transfer_row['AgencyOrSchoolOwnerID'] . "' 
                                    AND to_affilliate_id = '" . $pros_get_transfer_row['from_affilliate_id'] . "' 
                                    AND Status = 'approved'
                                    ORDER BY request_date DESC 
                                    LIMIT 1";
        $check_original_owner_result = mysqli_query($link, $check_original_owner_sql);
        $is_transfer_back = mysqli_fetch_assoc($check_original_owner_result);
        
        // Update transfer status to approved
        $pros_update_transfer_sql = "UPDATE affiliate_transfer_history 
                                    SET Status = 'approved', response_date = NOW() 
                                    WHERE id = '$transfer_id'";
        
        if (!mysqli_query($link, $pros_update_transfer_sql)) {
            throw new Exception("Failed to update transfer status: " . mysqli_error($link));
        }
        
        // Update the school owner's affiliate ID
        $pros_update_school_sql = "UPDATE agencyorschoolowner 
                                  SET AffiliateID = '" . $pros_get_transfer_row['to_affilliate_id'] . "',
                                   prev_support_person=''
                                  WHERE AgencyOrSchoolOwnerID = '" . $pros_get_transfer_row['AgencyOrSchoolOwnerID'] . "'";
        
        if (!mysqli_query($link, $pros_update_school_sql)) {
            throw new Exception("Failed to update school owner: " . mysqli_error($link));
        }
        
        // If this is a transfer back to the original owner, clear all transfer records for this school
        if ($is_transfer_back) {
            $clear_transfer_records_sql = "DELETE FROM affiliate_transfer_history 
                                         WHERE AgencyOrSchoolOwnerID = '" . $pros_get_transfer_row['AgencyOrSchoolOwnerID'] . "'";
            
            if (!mysqli_query($link, $clear_transfer_records_sql)) {
                throw new Exception("Failed to clear transfer records: " . mysqli_error($link));
            }
            
            $response = array(
                "requestSuccessful" => true,
                "responseMessage" => "success",
                "responseDescription" => "Transfer approved successfully. School has been returned to the original owner. All transfer records have been cleared.",
                "responseBody" => array(
                    "school_name" => $pros_get_transfer_row['school_name'],
                    "from_affiliate" => $pros_get_transfer_row['from_affiliate_name'],
                    "transfer_cleared" => true
                )
            );
        } else {
            $response = array(
                "requestSuccessful" => true,
                "responseMessage" => "success",
                "responseDescription" => "Transfer approved successfully. School has been transferred to your account.",
                "responseBody" => array(
                    "school_name" => $pros_get_transfer_row['school_name'],
                    "from_affiliate" => $pros_get_transfer_row['from_affiliate_name']
                )
            );
        }
        
    } else if ($action == 'reject') {
        // Update transfer status to rejected
        $pros_update_transfer_sql = "UPDATE affiliate_transfer_history 
                                    SET Status = 'rejected', response_date = NOW() 
                                    WHERE id = '$transfer_id'";
        
        if (!mysqli_query($link, $pros_update_transfer_sql)) {
            throw new Exception("Failed to update transfer status: " . mysqli_error($link));
        }
        
        $response = array(
            "requestSuccessful" => true,
            "responseMessage" => "success",
            "responseDescription" => "Transfer rejected successfully.",
            "responseBody" => array(
                "school_name" => $pros_get_transfer_row['school_name'],
                "from_affiliate" => $pros_get_transfer_row['from_affiliate_name']
            )
        );
    }
    
    // Commit transaction immediately
    mysqli_commit($link);
    
    // Send response immediately for fast user feedback
    echo json_encode($response);
    
    // Send notifications asynchronously (non-blocking)
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request(); // Flush response to client
    }
    
    // Insert notifications for transfer approval/rejection
   
    if ($action == 'approve') {
        $notif_msg = "Your transfer request for '" . $pros_get_transfer_row['school_name'] . "' has been approved.";
        insert_notifications(0, $pros_get_transfer_row['from_affilliate_id'], 'affiliate', $notif_msg);
    } else if ($action == 'reject') {
        $notif_msg = "Your transfer request for '" . $pros_get_transfer_row['school_name'] . "' has been rejected.";
        insert_notifications(0, $pros_get_transfer_row['from_affilliate_id'], 'affiliate', $notif_msg);
    }
    
    // Send notifications in background
    sendNotificationsAsync($pros_get_transfer_row, $action);
    
} catch (Exception $e) {
    // Rollback transaction
    mysqli_rollback($link);
    
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Failed to process transfer: " . $e->getMessage(),
        "responseBody" => array()
    );
    echo json_encode($response);
}

// Function to send notifications asynchronously
function sendNotificationsAsync($transfer_data, $action) {
    // Send email notification
    if (!empty($transfer_data['from_affiliate_email'])) {
        sendEmailNotification($transfer_data, $action);
    }
    
    // Send WhatsApp notification
    if (!empty($transfer_data['from_affiliate_phone'])) {
        sendWhatsAppNotification($transfer_data, $action);
    }
}

// Function to send email notification
function sendEmailNotification($transfer_data, $action) {
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
        $mail->Timeout = 10; // Reduce timeout for faster processing
        
        $mail->setFrom('verify@edumess.com', 'EduMESS');
        $mail->addAddress($transfer_data['from_affiliate_email']);
        
        $mail->isHTML(true);
        
        if ($action == 'approve') {
            $mail->Subject = "Transfer Approved - School Transfer";
            $mail->Body = generateApprovedEmailHTML($transfer_data);
        } else {
            $mail->Subject = "Transfer Rejected - School Transfer";
            $mail->Body = generateRejectedEmailHTML($transfer_data);
        }
        
        $mail->AltBody = strip_tags($mail->Body);
        $mail->send();
        
    } catch (Exception $e) {
        error_log("Email sending failed: " . $e->getMessage());
    }
}

// Function to send WhatsApp notification
function sendWhatsAppNotification($transfer_data, $action) {
    try {
        // Get WhatsApp API credentials
        global $link;
        $wamentorData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM whatsappapikey WHERE Purpose='Default' AND Api_source='wamentor'"));
        $wamentor_key = $wamentorData['ApiKey'] ?? '';
         $wamentor_userid = isset($wamentorData['Api_userid']) ? (int)$wamentorData['Api_userid'] : 0;
        
        if (empty($wamentor_key)) return;
        
        // Check if this is a return transfer
        $is_return_transfer = ($transfer_data['from_percentage'] == 0 && $transfer_data['to_percentage'] == 100);
        
        if ($action == 'approve') {
            if ($is_return_transfer) {
                sendWhatsAppMsg([
                    "user_id" => $wamentor_userid,
                    "template_id" => "return-transfer-approved",
                    "message" => "Hi {{name}}, your school return request has been APPROVED!\n\nSchool: {{school}}\nReturned to: {{returned_to}}\nReturn Date: {{return_date}}\n\nThe school has been successfully returned to the original owner.",
                    "contacts" => [
                        [
                            "number" => $transfer_data['from_affiliate_phone'],
                            "name" => $transfer_data['from_affiliate_name'],
                            "school" => $transfer_data['school_name'],
                            "returned_to" => $transfer_data['to_affiliate_name'],
                            "return_date" => date('F j, Y g:i A')
                        ]
                    ]
                ], $wamentor_key);
            } else {
                sendWhatsAppMsg([
                    "user_id" => $wamentor_userid,
                    "template_id" => "transfer-approved",
                    "message" => "Hi {{name}}, your school transfer request has been APPROVED!\n\nSchool: {{school}}\nApproved by: {{approved_by}}\nYour Share: {{your_share}}%\nNew Affiliate Share: {{new_share}}%\n\nTransfer Date: {{transfer_date}}\n\nThe school has been successfully transferred.",
                    "contacts" => [
                        [
                            "number" => $transfer_data['from_affiliate_phone'],
                            "name" => $transfer_data['from_affiliate_name'],
                            "school" => $transfer_data['school_name'],
                            "approved_by" => $transfer_data['to_affiliate_name'],
                            "your_share" => $transfer_data['from_percentage'],
                            "new_share" => $transfer_data['to_percentage'],
                            "transfer_date" => date('F j, Y g:i A')
                        ]
                    ]
                ], $wamentor_key);
            }
        } else {
            sendWhatsAppMsg([
                "user_id" => $wamentor_userid,
                "template_id" => "transfer-rejected",
                "message" => "Hi {{name}}, your school transfer request has been REJECTED.\n\nSchool: {{school}}\nRejected by: {{rejected_by}}\nRejection Date: {{rejection_date}}\n\nThe school remains under your management. You can continue to manage it or initiate a new transfer request.",
                "contacts" => [
                    [
                        "number" => $transfer_data['from_affiliate_phone'],
                        "name" => $transfer_data['from_affiliate_name'],
                        "school" => $transfer_data['school_name'],
                        "rejected_by" => $transfer_data['to_affiliate_name'],
                        "rejection_date" => date('F j, Y g:i A')
                    ]
                ]
            ], $wamentor_key);
        }
    } catch (Exception $e) {
        error_log("WhatsApp sending failed: " . $e->getMessage());
    }
}

// Function to generate approved email HTML
function generateApprovedEmailHTML($transfer_data) {
    // Check if this is a return transfer (from_percentage is 0 and to_percentage is 100)
    $is_return_transfer = ($transfer_data['from_percentage'] == 0 && $transfer_data['to_percentage'] == 100);
    
    if ($is_return_transfer) {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Return Transfer Approved</title>
        </head>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
                <div style='background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;'>
                    <h2 style='color: #28a745; margin-bottom: 20px;'>✅ Return Transfer Approved</h2>
                    <p>Dear <strong>{$transfer_data['from_affiliate_name']}</strong>,</p>
                    <p>Your request to return the school to the original owner has been <strong>approved</strong>.</p>
                </div>
                
                <div style='background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #dee2e6;'>
                    <h3 style='color: #495057; border-bottom: 2px solid #28a745; padding-bottom: 10px;'>Return Transfer Details</h3>
                    <table style='width: 100%; border-collapse: collapse;'>
                        <tr>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>School:</strong></td>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>{$transfer_data['school_name']}</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Returned to:</strong></td>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>{$transfer_data['to_affiliate_name']}</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Return Date:</strong></td>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>" . date('F j, Y g:i A') . "</td>
                        </tr>
                    </table>
                </div>
                
                <div style='background: #e8f5e8; padding: 15px; border-radius: 10px; margin-top: 20px; border-left: 4px solid #28a745;'>
                    <p style='margin: 0; color: #155724;'><strong>Note:</strong> The school has been successfully returned to the original owner. All transfer records have been cleared, and the school is now back under the original owner's management.</p>
                </div>
                
                <div style='text-align: center; margin-top: 30px; color: #6c757d; font-size: 14px;'>
                    <p>Best regards,<br><strong>EduMESS Team</strong></p>
                </div>
            </div>
        </body>
        </html>";
    } else {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Transfer Approved</title>
        </head>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
                <div style='background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;'>
                    <h2 style='color: #28a745; margin-bottom: 20px;'>✅ Transfer Approved</h2>
                    <p>Dear <strong>{$transfer_data['from_affiliate_name']}</strong>,</p>
                    <p>Your transfer request has been <strong>approved</strong> by <strong>{$transfer_data['to_affiliate_name']}</strong>.</p>
                </div>
                
                <div style='background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #dee2e6;'>
                    <h3 style='color: #495057; border-bottom: 2px solid #28a745; padding-bottom: 10px;'>Transfer Details</h3>
                    <table style='width: 100%; border-collapse: collapse;'>
                        <tr>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>School:</strong></td>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>{$transfer_data['school_name']}</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Your Revenue Share:</strong></td>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>{$transfer_data['from_percentage']}%</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>New Affiliate Share:</strong></td>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>{$transfer_data['to_percentage']}%</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Transfer Date:</strong></td>
                            <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>" . date('F j, Y g:i A') . "</td>
                        </tr>
                    </table>
                </div>
                
                <div style='background: #e8f5e8; padding: 15px; border-radius: 10px; margin-top: 20px; border-left: 4px solid #28a745;'>
                    <p style='margin: 0; color: #155724;'><strong>Note:</strong> The school has been successfully transferred to the new affiliate's account. You will continue to receive your share of revenue as per the agreement.</p>
                </div>
                
                <div style='text-align: center; margin-top: 30px; color: #6c757d; font-size: 14px;'>
                    <p>Best regards,<br><strong>EduMESS Team</strong></p>
                </div>
            </div>
        </body>
        </html>";
    }
}

// Function to generate rejected email HTML
function generateRejectedEmailHTML($transfer_data) {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Transfer Rejected</title>
    </head>
    <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
            <div style='background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;'>
                <h2 style='color: #dc3545; margin-bottom: 20px;'>❌ Transfer Rejected</h2>
                <p>Dear <strong>{$transfer_data['from_affiliate_name']}</strong>,</p>
                <p>Your transfer request has been <strong>rejected</strong> by <strong>{$transfer_data['to_affiliate_name']}</strong>.</p>
            </div>
            
            <div style='background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #dee2e6;'>
                <h3 style='color: #495057; border-bottom: 2px solid #dc3545; padding-bottom: 10px;'>Transfer Details</h3>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>School:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>{$transfer_data['school_name']}</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Rejected by:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>{$transfer_data['to_affiliate_name']}</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'><strong>Rejection Date:</strong></td>
                        <td style='padding: 10px; border-bottom: 1px solid #dee2e6;'>" . date('F j, Y g:i A') . "</td>
                    </tr>
                </table>
            </div>
            
            <div style='background: #f8d7da; padding: 15px; border-radius: 10px; margin-top: 20px; border-left: 4px solid #dc3545;'>
                <p style='margin: 0; color: #721c24;'><strong>Note:</strong> The school remains under your management. You can continue to manage it as before or initiate a new transfer request to a different affiliate.</p>
            </div>
            
            <div style='text-align: center; margin-top: 30px; color: #6c757d; font-size: 14px;'>
                <p>Best regards,<br><strong>EduMESS Team</strong></p>
            </div>
        </div>
    </body>
    </html>";
}
?> 