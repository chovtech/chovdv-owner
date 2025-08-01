<?php
header('Content-Type: application/json');
require_once('../../../config/config.php');

function sanitize($link, $key, $default = '') {
    return isset($_POST[$key]) ? mysqli_real_escape_string($link, $_POST[$key]) : $default;
}

$response = ['success' => false, 'message' => ''];

$studentID = sanitize($link, 'studentID');
$campusID = sanitize($link, 'campusID');
$session = sanitize($link, 'session');
$term = sanitize($link, 'term');

if (!$studentID || !$campusID || !$session || !$term) {
    $response['message'] = 'Missing required data.';
    echo json_encode($response);
    exit;
}

$delete_sql = "DELETE FROM student_subscription_allocation
 WHERE StudentID = '$studentID' AND
  CampusID = '$campusID' AND `Session` = '$session' 
  
  AND `Term` = '$term' LIMIT 1";




if (mysqli_query($link, $delete_sql)) {
    if (mysqli_affected_rows($link) > 0) {
        $response['success'] = true;
        $response['message'] = 'Student unsubscribed successfully.';
    } else {
        $response['message'] = 'No subscription found for this student.';
    }
} else {
    $response['message'] = 'Failed to unsubscribe student: ' . mysqli_error($link);
}

echo json_encode($response); 