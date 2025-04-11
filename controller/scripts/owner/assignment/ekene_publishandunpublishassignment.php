<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');


 $publishassignmentid = $_POST["publishassignmentid"];

 $studentcampus = $_POST["studentcampus"];

 $ekene_secondassignment = " SELECT * FROM `assignmentanswer` WHERE `CampusID` = '$studentcampus' AND `AssignmentSettingsID` = '$publishassignmentid'";
 $ekene_mysqli_query = mysqli_query($link, $ekene_secondassignment);
 $ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_query);
 $ekene_row_cnt_ekene = mysqli_num_rows($ekene_mysqli_query);
 if ($ekene_row_cnt_ekene > 0)
 {
    $publishstatus = $ekene_get_details["publishstatus"];
 }

// if ($publishstatus == 1)
// {
//     echo '<strong style="color: red;">Alert!!!<strong><p style="color: red;">Please note that unpublishing this assignment will hide the scores from students.</p>';
// }
// else
// {
    echo '<strong style="color: red;">Alert!!!<strong><p style="color: red;">Publishing this assignment will make the scores visible to students.
    </p>';
// }


 ?>