<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $get_task_id = $_POST['get_task_id'];
    $get_task_title = mysqli_real_escape_string($link, $_POST['get_task_title']);
    $get_task_description = mysqli_real_escape_string($link, $_POST['get_task_description']);
    $campus = $_POST['campus'];

    
    $updateoredittask = "UPDATE `task` SET `Title` = '$get_task_title',`Description` = '$get_task_description' WHERE `TaskID` = '$get_task_id' AND `Deletestatus` = 0 ";

    $updateoredittask_query = mysqli_query($link, $updateoredittask);

    if ($updateoredittask_query == true){
        echo 2;

        $activity_log_inst_camp_id = $campus;
        $activity_log_userid = $_POST['userid'];
        $activity_log_usertype = $_POST['usertype'];
        $activity_log_description = 'Deleted Task';
        $activity_log_longitude = $_POST['longitude'];
        $activity_log_latitude = $_POST['latitude'];
  
        insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
    }else{
        echo 4;
    }

?>
