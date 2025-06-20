<?php

include('../../../config/config.php');

$pros_instituion_id = $_POST['pros_instituion_id'] ?? null;

if (!$pros_instituion_id) {
    echo '<option value="NULL">Invalid institution ID</option>';
    exit;
}




    // PROS LOAD INSTITUTION CONTENT HERE

    $getinstitutionforsub_genearal = "SELECT * FROM `institution` WHERE InstitutionID='$pros_instituion_id'
    ORDER BY InstitutionGeneralName ASC";

    $getinstitutionforsub_res_genearal = mysqli_query($link, $getinstitutionforsub_genearal);
    $getinstitutionforsub_res_cnt_genearal = mysqli_num_rows($getinstitutionforsub_res_genearal);
    $getinstitutionforsub_res_cnt_row_genearal = mysqli_fetch_assoc($getinstitutionforsub_res_genearal);

    // $InstitutionIDgeneral = $getinstitutionforsub_res_cnt_row_genearal['InstitutionID'];
    $planid = $getinstitutionforsub_res_cnt_row_genearal['ActualPlan'];

    $planamount_set = $getinstitutionforsub_res_cnt_row_genearal['PlanAmount'];
    $planpercentage = $getinstitutionforsub_res_cnt_row_genearal['PlanPercentage'];


    // PROS GET PLAN DETAILS HERE
     $pros_get_plansubscription = mysqli_query($link,"SELECT * FROM `edumesplan` WHERE `PlanID`='$planid'");
     $pros_get_plansubscription_cnt = mysqli_num_rows($pros_get_plansubscription);

      $amount_per_student = 0;

     if($pros_get_plansubscription > 0):
        $pros_get_plansubscription_row = mysqli_fetch_assoc($pros_get_plansubscription);
        $amount_per_student = intval($pros_get_plansubscription_row['Amount']);
     endif;




    

    // Get campuses for the institution
    $pros_sql_campus = "SELECT * FROM campus WHERE InstitutionID = '$pros_instituion_id' ORDER BY CampusName ASC";
    $pros_query_link_campus = mysqli_query($link, $pros_sql_campus);

if (!$pros_query_link_campus || mysqli_num_rows($pros_query_link_campus) === 0) {
    echo '<option value="NULL" data-planid="'.$planid.'" data-planprice="'.$amount_per_student.'">No Records Found</option>';
    exit;
}

// Get current active session
$pros_get_current_term = mysqli_query($link, "SELECT * FROM session WHERE sessionStatus = '1'");
$pros_get_current_term_fetch = mysqli_fetch_assoc($pros_get_current_term);
$pros_session = $pros_get_current_term_fetch['sessionName'] ?? '';


if (mysqli_num_rows($pros_query_link_campus) > 1):
    echo '<option value="NULL" data-planid="'.$planid.'" data-planprice="'.$amount_per_student.'">Select Campus</option>';
endif;



while ($pros_get_details_campus = mysqli_fetch_assoc($pros_query_link_campus)) {
    $pros_campus_id = $pros_get_details_campus['CampusID'];
    $pros_campus_name = $pros_get_details_campus['CampusName'];

    // Get current term for this campus
    $select_term = mysqli_query($link, "SELECT termorsemester.TermOrSemesterID 
        FROM termorsemester
        INNER JOIN termalias ON termorsemester.TermOrSemesterID = termalias.TermOrSemesterID
        WHERE termalias.CampusID = '$pros_campus_id' AND  termorsemester.status=1");

    $getterm = mysqli_fetch_assoc($select_term);
    $TermOrSemesterID = $getterm['TermOrSemesterID'] ?? 'NULL';

    // Get active students count
    $pros_sql_active = "
        SELECT COUNT(DISTINCT student.StudentID) AS totalstud
        FROM campus
        INNER JOIN student ON campus.CampusID = student.CampusID
        INNER JOIN classordepartmentstudentallocation ON student.StudentID = classordepartmentstudentallocation.StudentID
        INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID = classordepartment.ClassOrDepartmentID
        WHERE campus.InstitutionID = '$pros_instituion_id'
          AND (campus.CampusID = '$pros_campus_id' OR '$pros_campus_id' IS NULL)
          AND (student.CampusID = '$pros_campus_id' OR '$pros_campus_id' IS NULL)
          AND (classordepartmentstudentallocation.CampusID = '$pros_campus_id' OR '$pros_campus_id' IS NULL)
          AND classordepartmentstudentallocation.Session = '$pros_session'
          AND (classordepartment.CampusID = '$pros_campus_id' OR '$pros_campus_id' IS NULL)
          AND student.StudentTrashStatus = 0
          AND student.StudentID NOT IN (
              SELECT UserID FROM deactivateuser
              WHERE UserType = 'student'
                AND sessionName = '$pros_session'
                AND (TermOrSemesterName = '$TermOrSemesterID' OR '$TermOrSemesterID' IS NULL)
                AND Status = 0
          )
    ";

    $pros_query_active = mysqli_query($link, $pros_sql_active);
    $total_student = 0;

    if ($pros_query_active && mysqli_num_rows($pros_query_active) > 0) {
        $result = mysqli_fetch_assoc($pros_query_active);
        $total_student = $result['totalstud'];
    }

    echo '<option data-planid="'.$planid.'" value="' . $pros_campus_id . '" data-planprice="'.$amount_per_student.'" data-numstudent="' . $total_student . '">' . $pros_campus_name . '</option>';
}
?>
