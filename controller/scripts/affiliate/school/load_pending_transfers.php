<?php
include('../../../config/config.php');

// Enhanced logging functions
// function log_info($message) {
//     error_log("[INFO " . date("Y-m-d H:i:s") . "] " . $message . "\n", 3, __DIR__ . "/slot_log.log");
// }

// function log_error($message) {
//     error_log("[ERROR " . date("Y-m-d H:i:s") . "] " . $message . "\n", 3, __DIR__ . "/slot_log.log");
// }

// function log_debug($message) {
//     error_log("[DEBUG " . date("Y-m-d H:i:s") . "] " . $message . "\n", 3, __DIR__ . "/slot_log.log");
// }

// Log script start
// log_info("Script started - load_pending_transfers.php");

// Check if POST data exists
if (!isset($_POST['user_id']) || !isset($_POST['user_type'])) {
    // log_error("Missing required POST parameters: user_id or user_type");
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Missing required parameters",
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

$user_id = $_POST['user_id'];
$user_type = $_POST['user_type'];

// log_info("Processing request for user_id: $user_id, user_type: $user_type");

// Validate database connection
if (!$link) {
    // log_error("Database connection failed: " . mysqli_connect_error());
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Database connection failed",
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

// log_info("Database connection successful");

// Get pending transfers where current user is the target affiliate
$pros_sql_pending = "SELECT 
                        st.id,
                        st.AgencyOrSchoolOwnerID,
                        st.from_affilliate_id,
                        st.to_affilliate_id,
                        st.from_percentage,
                        st.to_percentage,
                        st.Reason,
                        st.request_date,
                        CONCAT(a.AffiliateFName, ' ', a.AffiliateLName) as from_affiliate_name,
                        i.InstitutionGeneralName as school_name
                    FROM affiliate_transfer_history st
                    INNER JOIN affiliate a ON st.from_affilliate_id = a.AffiliateID
                    INNER JOIN institution i ON st.AgencyOrSchoolOwnerID = i.AgencyOrSchoolOwnerID
                    WHERE st.to_affilliate_id = '$user_id' 
                    AND st.Status = 'pending'
                    ORDER BY st.request_date DESC";

// log_debug("SQL Query: " . $pros_sql_pending);

$pros_result_pending = mysqli_query($link, $pros_sql_pending);

if (!$pros_result_pending) {
    // log_error("Query failed: " . mysqli_error($link));
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Database query failed: " . mysqli_error($link),
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

$pros_row_cnt_pending = mysqli_num_rows($pros_result_pending);
// log_info("Query executed successfully. Found $pros_row_cnt_pending pending transfers");

if ($pros_row_cnt_pending > 0) {
    $pending_transfers = array();

    while ($pros_row_pending = mysqli_fetch_assoc($pros_result_pending)) {
        // log_debug("Processing transfer ID: " . $pros_row_pending['id']);
        
        $pending_transfers[] = array(
            'id' => $pros_row_pending['id'],
            'AgencyOrSchoolOwnerID' => $pros_row_pending['AgencyOrSchoolOwnerID'],
            'from_affiliate_id' => $pros_row_pending['from_affilliate_id'],
            'to_affiliate_id' => $pros_row_pending['to_affilliate_id'],
            'from_percentage' => $pros_row_pending['from_percentage'],
            'to_percentage' => $pros_row_pending['to_percentage'],
            'transfer_reason' => $pros_row_pending['Reason'],
            'request_date' => $pros_row_pending['request_date'],
            'from_affiliate_name' => $pros_row_pending['from_affiliate_name'],
            'school_name' => $pros_row_pending['school_name']
        );
    }

    // log_info("Successfully processed " . count($pending_transfers) . " pending transfers");

    $response = array(
        "requestSuccessful" => true,
        "responseMessage" => "success",
        "responseDescription" => "pending transfers found",
        "responseBody" => $pending_transfers
    );

} else {
    // log_info("No pending transfers found for user_id: $user_id");
    
    $response = array(
        "requestSuccessful" => true,
        "responseMessage" => "failed",
        "responseDescription" => "no pending transfers found",
        "responseBody" => array()
    );
}

// Log response before encoding
// log_debug("Response prepared: " . json_encode($response));

try {
    $utf8_string = mb_convert_encoding($response, 'UTF-8', 'UTF-8');
    $json_response = json_encode($utf8_string, JSON_UNESCAPED_UNICODE);
    
    if ($json_response === false) {
        // log_error("JSON encoding failed: " . json_last_error_msg());
        $response = array(
            "requestSuccessful" => false,
            "responseMessage" => "error",
            "responseDescription" => "JSON encoding failed",
            "responseBody" => array()
        );
        echo json_encode($response);
    } else {
        // log_info("Script completed successfully");
        echo $json_response;
    }
} catch (Exception $e) {
    // log_error("Exception occurred: " . $e->getMessage());
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Exception occurred: " . $e->getMessage(),
        "responseBody" => array()
    );
    echo json_encode($response);
}
?> 