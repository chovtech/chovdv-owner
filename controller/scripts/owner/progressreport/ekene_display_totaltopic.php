<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $classid = $_POST["class_id"];
 $campus = $_POST["campus"];
 $term = $_POST["termid"];


 $slect_topic_ekene = " SELECT * FROM `curriculumtopic` WHERE `CampusID` = '$campus' AND `ClassOrDepartmentID` = '$classid' AND `TermOrSemesterName` = '$term'";
 $ekene_query_link_class = mysqli_query($link, $slect_topic_ekene);
 $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
 echo  $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);
 ?>