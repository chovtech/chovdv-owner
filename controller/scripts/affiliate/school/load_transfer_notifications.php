<?php
include('../../../config/config.php');
header('Content-Type: application/json; charset=utf-8');

$user_id = isset($_POST['user_id']) ? mysqli_real_escape_string($link, $_POST['user_id']) : '';

$response = [
    'success' => false,
    'schools' => []
];

if (!$user_id) {
    echo json_encode($response);
    exit;
}

// Fetch schools with pending transfer to this user (awaiting their approval)
$sql = "SELECT h.id, h.AgencyOrSchoolOwnerID, i.InstitutionGeneralName, h.request_date
        FROM affiliate_transfer_history h
        INNER JOIN institution i ON h.AgencyOrSchoolOwnerID = i.AgencyOrSchoolOwnerID
        WHERE h.to_affilliate_id = '$user_id'
          AND h.Status = 'pending'
        ORDER BY h.request_date DESC
        LIMIT 5";
$res = mysqli_query($link, $sql);
if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $response['schools'][] = [
            'id' => $row['id'],
            'school_name' => $row['InstitutionGeneralName'],
            'request_date' => $row['request_date']
        ];
    }
    $response['success'] = true;
}

echo json_encode($response, JSON_UNESCAPED_UNICODE); 