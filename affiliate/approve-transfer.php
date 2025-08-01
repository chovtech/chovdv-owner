<?php
// session_start();
include_once '../controller/config/config.php';

// Check if user is logged in
// if (!isset($_SESSION['user_id'])) {
//     die("Not authenticated");
// }

$transfer_id = $_GET['id'];
$action = $_GET['action']; // 'approve' or 'reject'

if (empty($transfer_id) || !in_array($action, ['approve', 'reject'])) {
    die("Invalid request");
}

// Get transfer details
$pros_get_transfer_sql = "SELECT * FROM school_transfers WHERE id = '$transfer_id' AND status = 'pending'";
$pros_get_transfer_result = mysqli_query($link, $pros_get_transfer_sql);
$pros_get_transfer_row = mysqli_fetch_assoc($pros_get_transfer_result);

if (!$pros_get_transfer_row) {
    die("Transfer request not found or already processed");
}

// Check if current user is the target affiliate
if ($pros_get_transfer_row['to_affiliate_id'] != $_SESSION['user_id']) {
    die("Unauthorized access");
}

if ($action == 'approve') {
    // Update transfer status to approved
    $pros_update_transfer_sql = "UPDATE affiliate_transfer_history SET Status = 'approved', response_date = NOW() WHERE id = '$transfer_id'";
    
    if (mysqli_query($link, $pros_update_transfer_sql)) {
        // Insert into affiliate_transfer_history
      
        
        // Update the school owner's affiliate ID
        $pros_update_school_sql = "UPDATE agencyorschoolowner 
                                  SET AffiliateID = '" . $pros_get_transfer_row['to_affiliate_id'] . "' 
                                  WHERE AgencyOrSchoolOwnerID = '" . $pros_get_transfer_row['AgencyOrSchoolOwnerID'] . "'";
        
        mysqli_query($link, $pros_update_school_sql);
        
        // Send confirmation email to original affiliate
        $pros_get_original_affiliate_sql = "SELECT AffiliateFName, AffiliateLName, Email 
                                          FROM affiliate WHERE AffiliateID = '" . $pros_get_transfer_row['from_affiliate_id'] . "'";
        $pros_get_original_affiliate_result = mysqli_query($link, $pros_get_original_affiliate_sql);
        $pros_get_original_affiliate_row = mysqli_fetch_assoc($pros_get_original_affiliate_result);
        
        $subject = "Transfer Approved - School Transfer";
        $message = "
        Dear " . $pros_get_original_affiliate_row['AffiliateFName'] . " " . $pros_get_original_affiliate_row['AffiliateLName'] . ",
        
        Your transfer request has been approved. The school has been successfully transferred.
        
        Revenue Sharing Agreement:
        - You: " . $pros_get_transfer_row['from_percentage'] . "%
        - New Affiliate: " . $pros_get_transfer_row['to_percentage'] . "%
        
        Best regards,
        EduMESS Team";
        
        $headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        mail($pros_get_original_affiliate_row['Email'], $subject, $message, $headers);
        
        $message = "Transfer approved successfully!";
        $status = "success";
        
    } else {
        $message = "Failed to approve transfer";
        $status = "error";
    }
    
} else { // reject
    // Update transfer status to rejected
    $pros_update_transfer_sql = "UPDATE school_transfers SET status = 'rejected', response_date = NOW() WHERE id = '$transfer_id'";
    
    if (mysqli_query($link, $pros_update_transfer_sql)) {
        // Send rejection email to original affiliate
        $pros_get_original_affiliate_sql = "SELECT AffiliateFName, AffiliateLName, AffiliateEmail 
                                          FROM affiliate WHERE AffiliateID = '" . $pros_get_transfer_row['from_affiliate_id'] . "'";
        $pros_get_original_affiliate_result = mysqli_query($link, $pros_get_original_affiliate_sql);
        $pros_get_original_affiliate_row = mysqli_fetch_assoc($pros_get_original_affiliate_result);
        
        $subject = "Transfer Rejected - School Transfer";
        $message = "
        Dear " . $pros_get_original_affiliate_row['AffiliateFName'] . " " . $pros_get_original_affiliate_row['AffiliateLName'] . ",
        
        Your transfer request has been rejected by the target affiliate.
        
        Best regards,
        " . $_SERVER['HTTP_HOST'] . " Team";
        
        $headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        mail($pros_get_original_affiliate_row['AffiliateEmail'], $subject, $message, $headers);
        
        $message = "Transfer rejected successfully!";
        $status = "success";
        
    } else {
        $message = "Failed to reject transfer";
        $status = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer <?php echo ucfirst($action); ?>d</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .result-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 90%;
        }
        .icon-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2rem;
        }
        .success-bg {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }
        .error-bg {
            background: linear-gradient(135deg, #dc3545, #fd7e14);
            color: white;
        }
    </style>
</head>
<body>
    <div class="result-card">
        <div class="icon-circle <?php echo $status == 'success' ? 'success-bg' : 'error-bg'; ?>">
            <i class="fas <?php echo $status == 'success' ? 'fa-check' : 'fa-times'; ?>"></i>
        </div>
        <h3 class="mb-3">Transfer <?php echo ucfirst($action); ?>d</h3>
        <p class="text-muted mb-4"><?php echo $message; ?></p>
        <a href="/affiliate/schools/" class="btn btn-primary">
            <i class="fas fa-arrow-left me-2"></i>Back to Schools
        </a>
    </div>
</body>
</html> 