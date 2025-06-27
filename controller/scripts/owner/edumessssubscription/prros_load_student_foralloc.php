<?php
header('Content-Type: application/json');
include('../../../config/config.php');
ini_set('error_log', __DIR__ . '/php-error.log');
date_default_timezone_set("Africa/Lagos");

function sanitize($link, $key, $default = '') {
    return isset($_POST[$key]) ? mysqli_real_escape_string($link, $_POST[$key]) : $default;
}

try {
    $userID = sanitize($link, 'userID');
    $usertype = sanitize($link, 'usertype');
    $institutionID = sanitize($link, 'instutitionID');
    $class = sanitize($link, 'selectedClass');
    $campusID = sanitize($link, 'campus');

    if (empty($userID) || empty($usertype) || empty($institutionID) || empty($class) || empty($campusID)) {
        error_log("MISSING DATA: userID=$userID, usertype=$usertype, institutionID=$institutionID, class=$class, campusID=$campusID");
        throw new Exception("Invalid input data");
    }
    
    $students = [];

    $pros_get_current_term = mysqli_query($link, "SELECT * FROM session WHERE sessionStatus = '1'");
    $pros_session_data = mysqli_fetch_assoc($pros_get_current_term);
    $pros_session = $pros_session_data['sessionName'] ?? '';

    $get_term_sql = "
        SELECT *
        FROM termorsemester
        INNER JOIN termalias ON termorsemester.TermOrSemesterID = termalias.TermOrSemesterID
        WHERE termalias.CampusID = '$campusID' AND termorsemester.status='1'
    ";
    $term_result = mysqli_query($link, $get_term_sql);
    $term_data = mysqli_fetch_assoc($term_result);
    $termid = $term_data['TermOrSemesterID'] ?? null;

    $sql = "
        SELECT student.*,classordepartment.ClassOrDepartmentID,classordepartment.ClassOrDepartmentName
        FROM campus
        INNER JOIN student ON campus.CampusID = student.CampusID
        INNER JOIN classordepartmentstudentallocation ON student.StudentID = classordepartmentstudentallocation.StudentID
        INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID = classordepartment.ClassOrDepartmentID
        WHERE campus.InstitutionID = '$institutionID'
        AND campus.CampusID = '$campusID'
        AND student.CampusID = '$campusID'
        AND classordepartmentstudentallocation.CampusID = '$campusID'
        AND classordepartmentstudentallocation.Session = '$pros_session'
        AND classordepartment.CampusID = '$campusID'
        AND classordepartmentstudentallocation.ClassOrDepartmentID = '$class'
        AND classordepartment.ClassOrDepartmentID = '$class'
        AND student.StudentTrashStatus = 0
        AND student.StudentID NOT IN (
            SELECT UserID FROM deactivateuser
            WHERE UserType = 'student'
            AND sessionName = '$pros_session'
            AND (TermOrSemesterName = '$termid' OR '$termid' IS NULL)
            AND Status = 0
        )
        AND student.StudentID NOT IN (
            SELECT StudentID FROM student_subscription_allocation
            WHERE Session = '$pros_session'
            AND (Term = '$termid' OR '$termid' IS NULL)
        )
    ";

    $result = mysqli_query($link, $sql);
    if (!$result) throw new Exception("Query failed: " . mysqli_error($link));

    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }

    $response = [
        'success' => true,
        'data' => [
            'students' => $students
        ]
    ];
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ];
}

ob_clean();
echo json_encode($response);
ob_end_flush();
?>
