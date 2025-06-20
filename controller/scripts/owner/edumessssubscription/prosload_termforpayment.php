<?php
ob_start();
include('../../../config/config.php');

// Sanitize input
function sanitize($link, $key, $default = '') {
    return isset($_POST[$key]) ? mysqli_real_escape_string($link, $_POST[$key]) : $default;
}

$userID = sanitize($link, 'userID');
$usertype = sanitize($link, 'usertype');
$institutionID = sanitize($link, 'instutitionID');
$campusID = sanitize($link, 'campusID');

// Get current active session
$pros_get_current_term = mysqli_query($link, "SELECT * FROM session WHERE sessionStatus = '1'");
$pros_get_current_term_fetch = mysqli_fetch_assoc($pros_get_current_term);
$pros_session = $pros_get_current_term_fetch['sessionName'] ?? '';

// Fetch terms
$get_select_term = "
    SELECT *
    FROM termorsemester
    INNER JOIN termalias ON termorsemester.TermOrSemesterID = termalias.TermOrSemesterID
    WHERE termalias.CampusID = '$campusID'
";
$get_query_link_term = mysqli_query($link, $get_select_term);
$get_get_details_term = mysqli_fetch_assoc($get_query_link_term);
$get_row_cnt_get = mysqli_num_rows($get_query_link_term);

if ($get_row_cnt_get > 0) {
    do {
        $termid = $get_get_details_term['TermOrSemesterID'];

        // Get total active students
        $pros_sql_active = "
            SELECT COUNT(DISTINCT student.StudentID) AS totalstud
            FROM campus
            INNER JOIN student ON campus.CampusID = student.CampusID
            INNER JOIN classordepartmentstudentallocation ON student.StudentID = classordepartmentstudentallocation.StudentID
            INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID = classordepartment.ClassOrDepartmentID
            WHERE campus.InstitutionID = '$institutionID'
            AND (campus.CampusID = '$campusID' OR '$campusID' IS NULL)
            AND (student.CampusID = '$campusID' OR '$campusID' IS NULL)
            AND (classordepartmentstudentallocation.CampusID = '$campusID' OR '$campusID' IS NULL)
            AND classordepartmentstudentallocation.Session = '$pros_session'
            AND (classordepartment.CampusID = '$campusID' OR '$campusID' IS NULL)
            AND student.StudentTrashStatus = 0
            AND student.StudentID NOT IN (
                SELECT UserID FROM deactivateuser
                WHERE UserType = 'student'
                AND sessionName = '$pros_session'
                AND (TermOrSemesterName = '$termid' OR '$termid' IS NULL)
                AND Status = 0
            )
        ";
        $pros_query_active = mysqli_query($link, $pros_sql_active);
        $total_student = 0;

        if ($pros_query_active && mysqli_num_rows($pros_query_active) > 0) {
            $result = mysqli_fetch_assoc($pros_query_active);
            $total_student = (int)($result['totalstud'] ?? 0);
        }

        // Get number of students paid for this term
        $student_payment_query = "
            SELECT SUM(num_of_student) AS student_paid_for
            FROM plantransaction 
            WHERE CampusID = '$campusID' 
            AND TermOrSemesterName = '$termid' 
            AND SessionName = '$pros_session'
        ";
        $student_payment_result = mysqli_query($link, $student_payment_query);
        $student_payment_row = mysqli_fetch_assoc($student_payment_result);
        $student_paid = (int)($student_payment_row['student_paid_for'] ?? 0);
        
        $student_remaining = max($total_student - $student_paid, 0);

        // Prepare option data
        $get_termname = $get_get_details_term['TermAliasName'];
        $status = $get_get_details_term['status'];
        $get_selected_term = ($status === '1') ? 'selected' : '';

        // Output the option with data-paid and data-remaining
        echo '<option value="' . $termid . '" 
                data-paid="' . $student_paid . '" 
                data-rem="' .$student_remaining . '" 
                ' . $get_selected_term . '>' . $get_termname . '</option>';

    } while ($get_get_details_term = mysqli_fetch_assoc($get_query_link_term));
} else {
    echo '<option value="NULL">No term found</option>';
}
?>
