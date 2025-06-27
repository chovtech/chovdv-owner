<?php
header('Content-Type: application/json');
require_once('../../../config/config.php');

$studentIDs = $_POST['studentIDs'] ?? [];
$campusID = $_POST['campusID'] ?? null;

$response = ['success' => false, 'message' => ''];

if (empty($studentIDs) || !$campusID) {
    $response['message'] = 'Missing required data.';
    echo json_encode($response);
    exit;
}

//Get current session
$pros_get_current_term = mysqli_query($link, "SELECT * FROM session WHERE sessionStatus = '1'");
$pros_session_data = mysqli_fetch_assoc($pros_get_current_term);
$session = $pros_session_data['sessionName'] ?? '';

if (!$session) {
    $response['message'] = 'No active session found.';
    echo json_encode($response);
    exit;
}

//Get current term for campus
$get_term_sql = "
    SELECT *
    FROM termorsemester
    INNER JOIN termalias ON termorsemester.TermOrSemesterID = termalias.TermOrSemesterID
    WHERE termalias.CampusID = '$campusID' AND  termorsemester.status='1'
    
    LIMIT 1
";
$term_result = mysqli_query($link, $get_term_sql);
$term_data = mysqli_fetch_assoc($term_result);
$term = $term_data['TermOrSemesterID'] ?? '';
$term_name = $term_data['TermAliasName'] ?? '';
if (!$term) {
    $response['message'] = 'No term found for this campus.';
    echo json_encode($response);
    exit;
}

$inserted = 0;

foreach ($studentIDs as $studentID) {
    $studentID = (int) $studentID;

    // Check if already allocated
    $check_sql = "
        SELECT id 
        FROM student_subscription_allocation 
        WHERE StudentID = '$studentID' 
        AND CampusID = '$campusID' 
        AND Session = '$session' 
        AND Term = '$term'
        LIMIT 1
    ";
    $check_result = mysqli_query($link, $check_sql);

    if (mysqli_num_rows($check_result) === 0) {
        // Insert allocation
        $insert_sql = "
            INSERT INTO student_subscription_allocation (CampusID, StudentID, Session, Term, Date)
            VALUES ('$campusID', '$studentID', '$session', '$term', NOW())
        ";
        if (mysqli_query($link, $insert_sql)) {
            $inserted++;
        }
    }
}

$response['success'] = true;
$response['message'] = "$inserted student(s) allocated successfully for $session - $term_name.";
echo json_encode($response);
