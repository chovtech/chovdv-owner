<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');
    
    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_section_id = $_POST['abba_section_id'];

    $abba_class_id = $_POST['abba_class_id'];

    $abba_student_id = explode(',', $_POST['abba_student_id']);

    $abba_session_id = $_POST['abba_session_id'];
    
    date_default_timezone_set("Africa/Lagos");
	$Date = date('Y-m-d H:i:s');
    
    foreach($abba_student_id as $abba_student_id_new)
    {
        $abba_student_id_new;
        
        $abba_sql_check_stud = ("SELECT * FROM `classordepartmentstudentallocation` WHERE CampusID = '$abba_campus_id' AND StudentID = '$abba_student_id_new' AND Session = '$abba_session_id'");
        $abba_result_check_stud = mysqli_query($link, $abba_sql_check_stud);
        $abba_row_check_stud = mysqli_fetch_assoc($abba_result_check_stud); 
        $abba_row_cnt_check_stud = mysqli_num_rows($abba_result_check_stud);
        
        if($abba_row_cnt_check_stud > 0)
        {
            $abba_sql_update_stud = ("UPDATE `classordepartmentstudentallocation` SET `ClassOrDepartmentID`='$abba_class_id', `Date`= '$Date' WHERE CampusID = '$abba_campus_id' AND StudentID = '$abba_student_id_new' AND Session = '$abba_session_id'");
            $abba_result_update_stud = mysqli_query($link, $abba_sql_update_stud);
        }
        else
        {
            $abba_sql_insert_stud = ("INSERT INTO `classordepartmentstudentallocation`(`ClassOrDepartmentStudentAllocationID`, `CampusID`, `ClassOrDepartmentID`, `Session`, `TermID`, `StudentID`, `Date`) VALUES (NULL,'$abba_campus_id','$abba_class_id','$abba_session_id','0','$abba_student_id_new','$Date')");
            $abba_result_insert_stud = mysqli_query($link, $abba_sql_insert_stud);
        }
        
        $abba_sql_get_stud = ("SELECT * FROM `student` WHERE CampusID = '$abba_campus_id' AND StudentID = '$abba_student_id_new'");
        $abba_result_get_stud = mysqli_query($link, $abba_sql_get_stud);
        $abba_row_get_stud = mysqli_fetch_assoc($abba_result_get_stud); 
        $abba_row_cnt_get_stud = mysqli_num_rows($abba_result_get_stud);
        
        $abba_sql_get_class = ("SELECT * FROM `classordepartment` WHERE CampusID = '$abba_campus_id' AND ClassOrDepartmentID = '$abba_class_id'");
        $abba_result_get_class = mysqli_query($link, $abba_sql_get_class);
        $abba_row_get_class = mysqli_fetch_assoc($abba_result_get_class); 
        $abba_row_cnt_get_class = mysqli_num_rows($abba_result_get_class);
        
        $abba_sql_get_owner = ("SELECT * FROM `campus` INNER JOIN `institution` ON `campus`.InstitutionID = `institution`.InstitutionID WHERE CampusID = '$abba_campus_id'");
        $abba_result_get_owner = mysqli_query($link, $abba_sql_get_owner);
        $abba_row_get_owner = mysqli_fetch_assoc($abba_result_get_owner); 
        $abba_row_cnt_get_owner = mysqli_num_rows($abba_result_get_owner);
        
        $activity_log_inst_camp_id = $abba_campus_id;
        $activity_log_userid = $abba_row_get_owner['AgencyOrSchoolOwnerID'];
        $activity_log_usertype = 'owner';
        $activity_log_description = 'Promoted '.$abba_row_get_stud['StudentFirstName'].' '.$abba_row_get_stud['StudentMiddleName'].' '.$abba_row_get_stud['StudentLastName'].' to '.$abba_row_get_class['ClassOrDepartmentName'].' on '.$Date;
        $activity_log_longitude = '0';
        $activity_log_latitude = '0';
        
        insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link, $ipAddress);
        
    }
    
    if(count($abba_student_id) > 1)
    {
        
        echo 'All Selected Students has been Promoted Successfully';
    
    }
    else
    {
        
        echo 'The Selected Student has been Promoted Successfully';
    
    }
?>