<?php
/**
 * Payment Debugging Script
 * Use this to identify issues with payment processing
 */

header('Content-Type: application/json');
include('../../../config/config.php');
date_default_timezone_set("Africa/Lagos");

// Enable error logging
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

function debugPaymentData() {
    global $link;
    
    $debug_info = [
        'post_data' => $_POST,
        'database_checks' => [],
        'table_structure' => [],
        'errors' => []
    ];
    
    // Check if plan_transaction table exists
    $table_check = mysqli_query($link, "SHOW TABLES LIKE 'plan_transaction'");
    if (mysqli_num_rows($table_check) == 0) {
        $debug_info['errors'][] = "plan_transaction table does not exist";
        return $debug_info;
    }
    
    // Get table structure
    $structure = mysqli_query($link, "DESCRIBE plan_transaction");
    while ($row = mysqli_fetch_assoc($structure)) {
        $debug_info['table_structure'][] = $row;
    }
    
    // Check input data
    $userID = isset($_POST['userID']) ? $_POST['userID'] : '';
    $campusID = isset($_POST['campus_id']) ? $_POST['campus_id'] : '';
    $institutionID = isset($_POST['institutionID']) ? $_POST['institutionID'] : '';
    $plan_id = isset($_POST['plan_id']) ? intval($_POST['plan_id']) : 0;
    $total_payment = isset($_POST['total_payment']) ? floatval($_POST['total_payment']) : 0;
    $session = isset($_POST['session']) ? $_POST['session'] : '';
    $term = isset($_POST['term']) ? $_POST['term'] : '';
    
    // Check if required data exists in related tables
    if (!empty($userID)) {
        $user_check = mysqli_query($link, "SELECT AgencyOrSchoolOwnerID FROM agencyorschoolowner WHERE AgencyOrSchoolOwnerID = '$userID'");
        $debug_info['database_checks']['user_exists'] = mysqli_num_rows($user_check) > 0;
        if (mysqli_num_rows($user_check) == 0) {
            $debug_info['errors'][] = "User ID '$userID' not found in agencyorschoolowner table";
        }
    }
    
    if (!empty($campusID)) {
        $campus_check = mysqli_query($link, "SELECT CampusID FROM campus WHERE CampusID = '$campusID'");
        $debug_info['database_checks']['campus_exists'] = mysqli_num_rows($campus_check) > 0;
        if (mysqli_num_rows($campus_check) == 0) {
            $debug_info['errors'][] = "Campus ID '$campusID' not found in campus table";
        }
    }
    
    if (!empty($institutionID)) {
        $institution_check = mysqli_query($link, "SELECT InstitutionID FROM institution WHERE InstitutionID = '$institutionID'");
        $debug_info['database_checks']['institution_exists'] = mysqli_num_rows($institution_check) > 0;
        if (mysqli_num_rows($institution_check) == 0) {
            $debug_info['errors'][] = "Institution ID '$institutionID' not found in institution table";
        }
    }
    
    if ($plan_id > 0) {
        $plan_check = mysqli_query($link, "SELECT PlanID FROM plans WHERE PlanID = $plan_id");
        $debug_info['database_checks']['plan_exists'] = mysqli_num_rows($plan_check) > 0;
        if (mysqli_num_rows($plan_check) == 0) {
            $debug_info['errors'][] = "Plan ID '$plan_id' not found in plans table";
        }
    }
    
    // Test the insert query
    if (empty($debug_info['errors'])) {
        $date = date('Y-m-d');
        $transaction_type = 'credit';
        $status = 'paid';
        
        $test_query = "INSERT INTO plan_transaction (AgencyOrSchoolOwnerID, CampusID, InstitutionID, PlanID, Amount, Session, Term, TransactionType, Status, Date) 
            VALUES ('$userID', '$campusID', '$institutionID', $plan_id, $total_payment, '$session', '$term', '$transaction_type', '$status', '$date')";
        
        $debug_info['test_query'] = $test_query;
        
        $result = mysqli_query($link, $test_query);
        if ($result) {
            $debug_info['database_checks']['insert_success'] = true;
            $debug_info['database_checks']['inserted_id'] = mysqli_insert_id($link);
            
            // Clean up test data
            mysqli_query($link, "DELETE FROM plan_transaction WHERE id = " . mysqli_insert_id($link));
        } else {
            $debug_info['database_checks']['insert_success'] = false;
            $debug_info['errors'][] = "Insert failed: " . mysqli_error($link);
        }
    }
    
    return $debug_info;
}

// Run debug if requested
if (isset($_GET['debug']) && $_GET['debug'] == 'true') {
    $debug_result = debugPaymentData();
    echo json_encode($debug_result, JSON_PRETTY_PRINT);
    exit;
}

// Show usage instructions
echo json_encode([
    'usage' => 'Add ?debug=true to URL to run diagnostics',
    'example' => 'debug_payment.php?debug=true',
    'what_it_checks' => [
        'POST data validation',
        'Database table existence',
        'Table structure',
        'Foreign key relationships',
        'Test insert query'
    ]
]);
?> 