<?php
include('../../../config/config.php');

// Sanitize input
$user_id = mysqli_real_escape_string($link, $_POST['user_id']);
$user_type = mysqli_real_escape_string($link, $_POST['user_type']);
$session = mysqli_real_escape_string($link, $_POST['session']);
$term = mysqli_real_escape_string($link, $_POST['term']);

$total_campus = 0;
$total_student = 0;



// get owner
$pros_sql_owner = ("SELECT * FROM `agencyorschoolowner` WHERE `AffiliateID`='$user_id' 
ORDER BY AgencyOrSchoolOwnerName ASC");
$pros_result_owner = mysqli_query($link, $pros_sql_owner);
// $pros_row_owner = mysqli_fetch_assoc($pros_result_owner);
$pros_row_cnt_owner = mysqli_num_rows($pros_result_owner);

// Get all institutions under the affiliate
$institution_sql = "
    SELECT institution.InstitutionID, institution.InstitutionGeneralName 
    FROM institution
    INNER JOIN agencyorschoolowner 
    ON institution.AgencyOrSchoolOwnerID = agencyorschoolowner.AgencyOrSchoolOwnerID
    WHERE agencyorschoolowner.AffiliateID = '$user_id'
";
$institution_result = mysqli_query($link, $institution_sql);

if ($institution_result && mysqli_num_rows($institution_result) > 0) {
    while ($institution = mysqli_fetch_assoc($institution_result)) {
        $institution_id = $institution['InstitutionID'];

        // Get campuses for this institution
        $campus_sql = "SELECT CampusID, CampusName FROM campus WHERE InstitutionID = '$institution_id'";
        $campus_result = mysqli_query($link, $campus_sql);
        $campus_count = mysqli_num_rows($campus_result);
        $total_campus += $campus_count;

        if ($campus_result && $campus_count > 0) {
            while ($campus = mysqli_fetch_assoc($campus_result)) {
                $campus_id = $campus['CampusID'];

                // Count students in this campus
                $student_sql = "
                    SELECT COUNT(*) AS student_count 
                    FROM student
                    INNER JOIN classordepartmentstudentallocation 
                    ON student.StudentID = classordepartmentstudentallocation.StudentID
                    WHERE student.CampusID = '$campus_id' AND `classordepartmentstudentallocation`.`Session` = '$session' ";
               
                $student_result = mysqli_query($link, $student_sql);
                $student_data = mysqli_fetch_assoc($student_result);
                $total_student += (int)$student_data['student_count'];
            }
        }
    }
}


$response =  [
    'total_institutions' => mysqli_num_rows($institution_result),
    'total_campuses' => $total_campus,
    'total_students' => $total_student,
    'owner_cont' => $pros_row_cnt_owner
    
];

$utf8_string = mb_convert_encoding($response, 'UTF-8', 'UTF-8');
    
  
    
$json_response = json_encode($utf8_string, JSON_UNESCAPED_UNICODE);

// Output the JSON response
echo $json_response;
