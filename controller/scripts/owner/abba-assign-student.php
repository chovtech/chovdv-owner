<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    
    $abba_campus_id = $_POST['abba_campus_id'];

    $student_id = explode(',',$_POST['abba_get_multi_student_id']);

    $parent_id = $_POST['parent_id'];

    foreach($student_id as $student_id_new)
    {

        $student_id_new;

        $abba_sql_status = ("UPDATE `student` SET `ParentID`='$parent_id' WHERE `StudentID` = '$student_id_new' AND CampusID = '$abba_campus_id'");
        $abba_result_status = mysqli_query($link, $abba_sql_status);
    
    }

?>
