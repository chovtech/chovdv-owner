<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');


$studentIDnew = $_POST["studentIDnew"];

$studentcampus = $_POST["studentcampus"];
$userid = $_POST["userid"];
$usertype = $_POST["usertype"];
date_default_timezone_set("Africa/Lagos");
$dateAndTime = date("Y/m/d H:i:s");
$desripction = "Reset Assignment";

$assignmentid = $_POST["assignmentid"];
$studentIDnew = explode(',', $studentIDnew);
// $ObjectAnswer = explode(',', $ObjectAnswer);

foreach($studentIDnew as $student)
{

    $resetassignment = mysqli_query($link, "UPDATE  `assignmentanswer` SET `resetstatus`= 1,
    `publishstatus`= 0,`submitstatus`= 0 WHERE `CampusID`= '$studentcampus' AND `AssignmentSettingsID` = '$assignmentid' AND `StudentID` = '$student'");
       
}


 

if($resetassignment == true)
{
    echo 'success';


    $insert_into_activitylog = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`)
    VALUES ('$studentcampus','$userid','$usertype','0','0','0','0','$desripction','$dateAndTime')";
    
    $select_import_question = mysqli_query($link, $insert_into_activitylog);

       
}else
{
    echo 'failed';
}



?>