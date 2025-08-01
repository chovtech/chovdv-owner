<?php
header('Content-Type: application/json');
require_once('../../../config/config.php');

function sanitize($link, $key, $default = '') {
    return isset($_POST[$key]) ? mysqli_real_escape_string($link, $_POST[$key]) : $default;
}

$userID = sanitize($link, 'userID');
$userType = sanitize($link, 'userType');

$response = ['success' => false, 'notifications' => []];

if (!$userID || !$userType) {
    $response['message'] = 'Missing user information.';
    echo json_encode($response);
    exit;
}

$sql = "SELECT NotificationID, Description, ViewStatus, DateandTime FROM notifications WHERE UserID = '$userID' AND UserType = '$userType' ORDER BY DateandTime DESC LIMIT 5";
$result = mysqli_query($link, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response['notifications'][] = $row;
    }
    $response['success'] = true;
} else {
    $response['message'] = 'Query failed: ' . mysqli_error($link);
}

echo json_encode($response); 