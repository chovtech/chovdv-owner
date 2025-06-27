<?php
include('../../../config/config.php');
ini_set('error_log', __DIR__ . '/php-error.log');
date_default_timezone_set("Africa/Lagos");

function sanitize($link, $key, $default = '') {
    return isset($_POST[$key]) ? mysqli_real_escape_string($link, $_POST[$key]) : $default;
}

try {
    $campusID      = sanitize($link, 'campusID');
    $session       = sanitize($link, 'session');
    $term          = sanitize($link, 'term');
    $class         = sanitize($link, 'class');
    $userID        = sanitize($link, 'userID');
    $usertype      = sanitize($link, 'usertype');
    $institutionID = sanitize($link, 'institutionID');

    if (!$campusID || $campusID === 'NULL') {
        echo json_encode(['success' => false, 'message' => 'Campus is required.']);
        exit;
    }

    $query = "
        SELECT 
            a.id AS AllocationID,
            a.Session,
            a.Term,
            a.Date AS AllocationDate,
            s.StudentID,
            s.StudentFirstName,
            s.StudentLastName,
            s.StudentGender,
            s.StudentPhoto,
            c.CampusName,
            t.TermOrSemesterName,
            cls.ClassOrDepartmentName,
            cls.ClassOrDepartmentID
        FROM student_subscription_allocation a
        LEFT JOIN student s ON a.StudentID = s.StudentID
        LEFT JOIN campus c ON a.CampusID = c.CampusID
        LEFT JOIN termorsemester t ON a.Term = t.TermOrSemesterID
        LEFT JOIN classordepartmentstudentallocation cas 
            ON a.StudentID = cas.StudentID 
            AND a.CampusID = cas.CampusID 
            AND a.Session = cas.Session 
           
        LEFT JOIN classordepartment cls ON cas.ClassOrDepartmentID = cls.ClassOrDepartmentID
        WHERE a.CampusID = '$campusID'
    ";

    if ($session && $session !== 'NULL') {
        $query .= " AND a.Session = '$session'";
    }

    if ($term && $term !== 'NULL') {
        $query .= " AND a.Term = '$term'";
    }

    if ($class && $class !== 'NULL') {
        $query .= " AND cls.ClassOrDepartmentID = '$class'";
    }

    $query .= " ORDER BY a.id DESC";

    $result = mysqli_query($link, $query);

    if (!$result) {
        error_log("SQL:\n" . $query);
        error_log("ERROR: Query Failed: " . mysqli_error($link));
        echo json_encode(['success' => false, 'message' => 'Query failed.']);
        exit;
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode(['success' => true, 'data' => $data]);
    exit;

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
    exit;
}
