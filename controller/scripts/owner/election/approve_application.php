<?php

    include('../../../config/config.php');

    $get_data_id = $_POST['get_data_id'];
    $get_campus_id = $_POST['get_campus_id'];
    $get_student_id = $_POST['get_student_id'];

    $approve_update = "UPDATE `electionapplicants` SET `Status`= 1 WHERE `ElectionApplicantsID`='$get_data_id' AND `CampusID`='$get_campus_id' AND `StudentID`='$get_student_id' ";
    $approve_update_query = mysqli_query($link, $approve_update);

    if($approve_update_query == true){
        echo 1;

    $activity_log_inst_camp_id = $get_campus_id;
    $activity_log_userid = $_POST['userid'];
    $activity_log_usertype = $_POST['usertype'];
    $activity_log_description = 'Approve Election Application';
    $activity_log_longitude = $_POST['longitude'];
    $activity_log_latitude = $_POST['latitude'];

    insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
    }else{
        echo 2;
    }

?>