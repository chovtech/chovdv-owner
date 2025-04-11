<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');


$campusid = $_POST["campusid"];

$studentid = $_POST["studentid"];
$correctionarray = $_POST["correctionarray"];

$theoryquestionarray = $_POST["theoryquestionarray"];

$assignmentid = $_POST["assignmentid"];

$implodedCorrection = implode(', ', $correctionarray);
 $implodedTheoryQuestion = implode(',', $theoryquestionarray);

 $sum = array_sum($theoryquestionarray);


$select_fromassignmentsetting = "SELECT * FROM `assignmentsettings` WHERE AssignmentSettingsID = '$assignmentid'"; 
$ekene_mysqli = mysqli_query($link, $select_fromassignmentsetting);
$ekene_get_detailsoverallscore = mysqli_fetch_assoc($ekene_mysqli);
$ekene_row = mysqli_num_rows($ekene_mysqli);
if($ekene_row > 0)
{
    $Overallscore = $ekene_get_detailsoverallscore['Overallscore'];
}

if ($sum > $Overallscore)
{
    echo "40";
}
else
{
    // foreach ($theoryquestionarray as $key =>  $question) {

    //     $implodedCorrectioncurrent = $correctionarray[$key];
        

        $update_table = "UPDATE `assignmentanswer` SET `TheoryScore`= '$implodedTheoryQuestion', `Correction` = '$implodedCorrection' WHERE 
        `AssignmentSettingsID`= '$assignmentid' AND `StudentID`='$studentid' AND `CampusID`= '$campusid'";
    
        
        $query_updated = mysqli_query($link, $update_table);
        echo "20";

    // }
  
}


?>