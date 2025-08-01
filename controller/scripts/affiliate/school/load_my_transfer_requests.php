<?php
include('../../../config/config.php');

// Check if POST data exists
if (!isset($_POST['user_id']) || !isset($_POST['user_type'])) {
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

// Get transfer requests initiated by current user
$pros_sql_my_transfers = "SELECT 
                            st.id,
                            st.AgencyOrSchoolOwnerID,
                            st.from_affilliate_id,
                            st.to_affilliate_id,
                            st.from_percentage,
                            st.to_percentage,
                            st.Reason,
                            st.request_date,
                            st.response_date,
                            st.Status,
                            CONCAT(a.AffiliateFName, ' ', a.AffiliateLName) as to_affiliate_name,
                            i.InstitutionGeneralName as school_name
                        FROM affiliate_transfer_history st
                        INNER JOIN affiliate a ON st.to_affilliate_id = a.AffiliateID
                        INNER JOIN institution i ON st.AgencyOrSchoolOwnerID = i.AgencyOrSchoolOwnerID
                        WHERE st.from_affilliate_id = '$user_id' 
                        AND st.Status != 'cancelled'
                        ORDER BY st.request_date DESC";

$pros_result_my_transfers = mysqli_query($link, $pros_sql_my_transfers);

if (!$pros_result_my_transfers) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Database query failed: " . mysqli_error($link),
        "responseBody" => array()
    );
    echo json_encode($response);
    exit;
}

$pros_row_cnt_my_transfers = mysqli_num_rows($pros_result_my_transfers);

if ($pros_row_cnt_my_transfers > 0) {
    $my_transfers = array();

    while ($pros_row_my_transfers = mysqli_fetch_assoc($pros_result_my_transfers)) {
        $my_transfers[] = array(
            'id' => $pros_row_my_transfers['id'],
            'AgencyOrSchoolOwnerID' => $pros_row_my_transfers['AgencyOrSchoolOwnerID'],
            'from_affiliate_id' => $pros_row_my_transfers['from_affilliate_id'],
            'to_affiliate_id' => $pros_row_my_transfers['to_affilliate_id'],
            'from_percentage' => $pros_row_my_transfers['from_percentage'],
            'to_percentage' => $pros_row_my_transfers['to_percentage'],
            'transfer_reason' => $pros_row_my_transfers['Reason'],
            'request_date' => $pros_row_my_transfers['request_date'],
            'response_date' => $pros_row_my_transfers['response_date'],
            'Status' => $pros_row_my_transfers['Status'],
            'to_affiliate_name' => $pros_row_my_transfers['to_affiliate_name'],
            'school_name' => $pros_row_my_transfers['school_name']
        );
    }

    $response = array(
        "requestSuccessful" => true,
        "responseMessage" => "success",
        "responseDescription" => "my transfer requests found",
        "responseBody" => $my_transfers
    );

} else {
    $response = array(
        "requestSuccessful" => true,
        "responseMessage" => "failed",
        "responseDescription" => "no transfer requests found",
        "responseBody" => array()
    );
}

try {
    $json_response = json_encode($response, JSON_UNESCAPED_UNICODE);
    
    if ($json_response === false) {
        $response = array(
            "requestSuccessful" => false,
            "responseMessage" => "error",
            "responseDescription" => "JSON encoding failed",
            "responseBody" => array()
        );
        echo json_encode($response);
    } else {
        echo $json_response;
    }
} catch (Exception $e) {
    $response = array(
        "requestSuccessful" => false,
        "responseMessage" => "error",
        "responseDescription" => "Exception occurred: " . $e->getMessage(),
        "responseBody" => array()
    );
    echo json_encode($response);
}
?> 