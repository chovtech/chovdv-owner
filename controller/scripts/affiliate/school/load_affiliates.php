<?php
include('../../../config/config.php');

// Sanitize inputs
$user_id = mysqli_real_escape_string($link, $_POST['user_id']);
$user_type = mysqli_real_escape_string($link, $_POST['user_type']);
$original_owner_id = mysqli_real_escape_string($link, $_POST['original_owner_id'] ?? '');
$is_transferred = mysqli_real_escape_string($link, $_POST['is_transferred'] ?? '');

// Check if this is a transfer back scenario
if ($is_transferred && !empty($original_owner_id)) {
    // Only show the original owner
    $pros_sql_affiliate = "SELECT AffiliateID as affiliate_id, 
                          CONCAT(AffiliateFName, ' ', AffiliateLName) as affiliate_name
                          FROM affiliate 
                          WHERE AffiliateID = '$original_owner_id' 
                          AND AffiliateID != '$user_id'";
} else {
    // Show all affiliates except current user
    $pros_sql_affiliate = "SELECT AffiliateID as affiliate_id, 
                          CONCAT(AffiliateFName, ' ', AffiliateLName) as affiliate_name
                          FROM affiliate 
                          WHERE AffiliateID != '$user_id' 
                          ORDER BY AffiliateFName ASC";
}

$pros_result_affiliate_sql = mysqli_query($link, $pros_sql_affiliate);
$pros_row_cnt_affiliate_cont = mysqli_num_rows($pros_result_affiliate_sql);

if ($pros_row_cnt_affiliate_cont > 0) {
    $affiliatecontent = [];

    while ($pros_result_affiliate_cont_row = mysqli_fetch_assoc($pros_result_affiliate_sql)) {
        $affiliatecontent[] = [
            'affiliate_id' => $pros_result_affiliate_cont_row['affiliate_id'],
            'affiliate_name' => $pros_result_affiliate_cont_row['affiliate_name']
        ];
    }

    $response = [
        "requestSuccessful" => true,
        "responseMessage" => "success",
        "responseDescription" => "Affiliates loaded successfully",
        "responseBody" => $affiliatecontent
    ];
} else {
    $response = [
        "requestSuccessful" => true,
        "responseMessage" => "failed",
        "responseDescription" => "No affiliates found",
        "responseBody" => []
    ];
}

$utf8_string = mb_convert_encoding($response, 'UTF-8', 'UTF-8');
$json_response = json_encode($utf8_string, JSON_UNESCAPED_UNICODE);
echo $json_response;
?> 