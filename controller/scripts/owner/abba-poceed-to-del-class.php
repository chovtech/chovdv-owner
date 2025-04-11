<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $campus_id = $_POST['abba_campus_id'];

    $class_id = $_POST['class_id'];

    // Section does not exist, insert the section and update the columns
    $abba_sql_classordepartment = "DELETE FROM `classordepartment` WHERE `ClassOrDepartmentID` = '$class_id' AND `CampusID` = '$campus_id'";
    $abba_result_classordepartment = mysqli_query($link, $abba_sql_classordepartment);

?>