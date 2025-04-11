<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $student_id = $_POST['student_id'];

    $abba_sql_status = ("UPDATE `student` SET `ParentID`='0' WHERE `StudentID` = '$student_id'");
    $abba_result_status = mysqli_query($link, $abba_sql_status);

?>
