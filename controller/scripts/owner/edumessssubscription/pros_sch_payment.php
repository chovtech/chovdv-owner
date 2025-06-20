<?php

header('Content-Type: application/json');
include('../../../config/config.php');
date_default_timezone_set("Africa/Lagos");

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

function sendMessage($name, $phone, $message) {
    // Replace this with your real SMS or Email function
    // This is just logging for now
    echo "Message to $name ($phone): $message\n";
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
    // 1. Insert plan transaction
    $insert = mysqli_query($link, "INSERT INTO `plantransaction`(`CampusID`, `PlanID`, `SessionName`, `TermOrSemesterName`, `ActualAmount`, `DiscountedAmount`, `DatePaid`, `ref_number`, `transaction_type`, `num_of_student`) 
        VALUES ('$campusID', '$plan_id', '$session', '$term', '$total_payment', '$discount', '$date_time', '$ref_number_subs', '$transaction_method', '$num_student')");
    if (!$insert) throw new Exception('Failed to insert plan transaction.');
    $updateownerwallet_bal = mysqli_query($link, "UPDATE agencyorschoolowner SET WalletBalance = WalletBalance - $total_payment WHERE AgencyOrSchoolOwnerID = '$userID'");

    
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
              AND to_affilliate_id = '$main_affiliate_id'");
        if ($split_row = mysqli_fetch_assoc($split_query)) {
            $main_percent = $split_row['to_percentage'];
            $transfer_percent = $split_row['from_percentage'];
        }
    }

    $ref_number = generateRefID();

    // 5. Insert company earning
    mysqli_query($link, "INSERT INTO company_earning (InstitutionID, total_payment, affiliate_share, company_percentage, company_amount, has_level_1, has_level_2, ref_number, Session, Term, date) 
        VALUES ('$institutionID', '$total_payment', '$affiliate_share', '$company_percentage', '$company_share', '$has_level_1', '$has_level_2', '$ref_number', '$session', '$term', '$date')");

    // 6. Affiliate Earnings + Messages
    $messages = [];

    // Level 1
    if ($has_level_1) {
        $level_1_amount = round(($company_share * $lv1_percentage) / 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, sub_affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$level1_affiliate_id', '$main_affiliate_id', 'level_1', 1, 0, '$institutionID', '$lv1_percentage', '$level_1_amount', '$session', '$term', '$transaction_type', '$status', '$ref_number', '$date')");
        creditWallet($link, $level1_affiliate_id, $level_1_amount);

        $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone FROM affiliate WHERE AffiliateID='$level1_affiliate_id'"));
        $messages[] = ['name' => $row['AffiliateFName'], 'phone' => $row['Phone'], 'amount' => $level_1_amount];
    }

    // Level 2
    if ($has_level_2) {
        $level_2_amount = round(($company_share * $lv2_percentage) / 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, sub_affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$level2_affiliate_id', '$main_affiliate_id', 'level_2', 2, 0, '$institutionID', '$lv2_percentage', '$level_2_amount', '$session', '$term', '$transaction_type', '$status', '$ref_number', '$date')");
        creditWallet($link, $level2_affiliate_id, $level_2_amount);

        $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone FROM affiliate WHERE AffiliateID='$level2_affiliate_id'"));
        $messages[] = ['name' => $row['AffiliateFName'], 'phone' => $row['Phone'], 'amount' => $level_2_amount];
    }

    // Lead
    $remaining_affiliate_amount = $affiliate_share;
    $remaining_affiliate_percent = $dir_percentage;

    if ($has_lead) {
        $lead_amount = round(($affiliate_share * $lead_percentage) / 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$lead_affiliate_id', 'lead', 0, 0, '$institutionID', '$lead_percentage', '$lead_amount', '$session', '$term', '$transaction_type', '$status', '$ref_number', '$date')");
        creditWallet($link, $lead_affiliate_id, $lead_amount);

        $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone FROM affiliate WHERE AffiliateID='$lead_affiliate_id'"));
        $messages[] = ['name' => $row['AffiliateFName'], 'phone' => $row['Phone'], 'amount' => $lead_amount];

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


    creditWallet($link, $main_affiliate_id, $main_amount);
    $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone FROM affiliate WHERE AffiliateID='$main_affiliate_id'"));
    $messages[] = ['name' => $row['AffiliateFName'], 'phone' => $row['Phone'], 'amount' => $main_amount];

    if ($has_transfer_affiliate && $main_affiliate_id != $transfer_affiliate_id) {
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$transfer_affiliate_id', 'transfer', 0, 1, '$institutionID', '$transnew_percentage', '$transfer_amount', '$session', '$term', '$transaction_type', '$status', '$ref_number', '$date')");
        creditWallet($link, $transfer_affiliate_id, $transfer_amount);
        $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone FROM affiliate WHERE AffiliateID='$transfer_affiliate_id'"));
        $messages[] = ['name' => $row['AffiliateFName'], 'phone' => $row['Phone'], 'amount' => $transfer_amount];
    }

    // COMMIT TRANSACTION
    mysqli_commit($link);

          // Send all affiliate messages
        // foreach ($messages as $msg) {
        //       $messageText = "Hi {$msg['name']}, congratulations! 🎉 You’ve just earned ₦" . number_format($msg['amount'], 2) . " as part of a new school subscription payment. 
        //     Ref No: $ref_number
        //     Session: $session
        //     Term: $term
        //     Keep up the great work promoting our platform!";
              
        //       sendMessage($msg['name'], $msg['phone'], $messageText);
        // }

      // Notify the school
      // $schoolQuery = mysqli_query($link, "SELECT Name, Phone FROM agencyorschoolowner WHERE AgencyOrSchoolOwnerID='$userID'");
      // if ($school = mysqli_fetch_assoc($schoolQuery)) {
      //   $msg = "Dear {$school['Name']}, your subscription payment of ₦" . number_format($total_payment, 2) . " was received successfully. 
      // Ref No: $ref_number
      // Session: $session
      // Term: $term
      // Thank you for using our platform. Your account has been updated accordingly.";
        
      //   sendMessage($school['Name'], $school['Phone'], $msg);
      // }

      // Notify the company (admin)
      // $companyMsg = "New subscription received.
      // Ref No: $ref_number
      // School: {$school['Name']}
      // Amount Paid: ₦" . number_format($total_payment, 2) . "
      // Company Share: ₦" . number_format($company_share, 2) . "
      // Session: $session
      // Term: $term";

      // sendMessage("Company", "COMPANY_PHONE", $companyMsg);



      // POST https://whatsapp.chovtech.com/api/vendors/register
      // {
      //   "name": "EduMESS",
      //   "company_name": "EduMESS INC",
      //   "email": "edumessinc@gmail.com",
      //   "phone_number": "+2347045277801",
      //   "password": "TheCompany@2025"
      // }

    echo json_encode(['status' => 'success', 'message' => 'Transaction successful and messages sent.', 'ref_number' => $ref_number]);

} catch (Exception $e) {
    mysqli_rollback($link);
    echo json_encode(['status' => 'error', 'message' => 'Transaction failed: ' . $e->getMessage()]);
}
?>
