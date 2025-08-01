<?php
header('Content-Type: application/json');
require_once('../../../config/config.php');

function sanitize($link, $key, $default = '') {
    return isset($_POST[$key]) ? mysqli_real_escape_string($link, $_POST[$key]) : $default;
}

$userID = sanitize($link, 'userID');
$userType = sanitize($link, 'userType');

$response = ['success' => false, 'count' => 0];

if (!$userID || !$userType) {
    echo json_encode($response);
    exit;
}

$sql = "SELECT COUNT(*) as cnt FROM notifications WHERE UserID = '$userID' AND UserType = '$userType' AND ViewStatus = 0";
$result = mysqli_query($link, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $response['success'] = true;
    $response['count'] = (int)$row['cnt'];
}
echo json_encode($response); 