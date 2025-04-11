<?php
include("../../../config/config.php");


$assignmentquestionid = $_POST["assignmentquestionid"];
$campusid = $_POST["campusid"];



date_default_timezone_set( 'Africa/Lagos');
$today = date( 'd/m/Y' );
$currentTime = date( 'H:i:s' );
$currenttime_date = date( 'Y-m-d' );
$currentDateTime = date('Y-m-d H:i:s');
$Description = "Deleted assignmentquestion";


$updateassignment = "UPDATE `assignmentquestion` SET `deletestatus`= 1 WHERE `AssignmentQuestionID`='$assignmentquestionid' AND `CampusID`= '$campusid'";

if(mysqli_query($link, $updateassignment)){
     

    echo '1';
} else{
    echo '2';
}

?>