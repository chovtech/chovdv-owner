<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');

$classid = $_POST["class_id"];
$campus = $_POST["campus"];
$term = $_POST["termid"];



$select_progess_report = " SELECT * FROM `progressreport` WHERE  `CampusID`= '$campus'
AND `ClassOrDepartmentID` = '$classid' AND  `TermOrSemesterName`= '$term'";
 $ekene_query_link_progress = mysqli_query($link, $select_progess_report);
 $ekene_get_details_progress = mysqli_fetch_assoc($ekene_query_link_progress);
 echo $ekene_row_cnt_progress = mysqli_num_rows($ekene_query_link_progress);


?>