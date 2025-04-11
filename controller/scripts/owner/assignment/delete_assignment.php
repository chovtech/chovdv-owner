<?php
include("../../../config/config.php");


$deleteid = $_POST["deleteid"];
$deletecam = $_POST["deletecam"];

$userID = $_POST["userID"];
$usertype = $_POST["usertype"];

date_default_timezone_set( 'Africa/Lagos');
$today = date( 'd/m/Y' );
$currentTime = date( 'H:i:s' );
$currenttime_date = date( 'Y-m-d' );
$currentDateTime = date('Y-m-d H:i:s');
$Description = "Deleted  assignment";


$updateassignment = "UPDATE `assignmentsettings` SET `deletestatus`= 1 WHERE `AssignmentSettingsID`='$deleteid' AND `CampusID`= '$deletecam'";

if(mysqli_query($link, $updateassignment)){
        $insert2 = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`,
        `Latitude`, `Description`, `Date/Time`) VALUES ('$deletecam','$userID','$usertype',
        '0','0','0','0','$Description','$currentDateTime')";
        $insert2sl = mysqli_query($link, $insert2);

    echo '1';
} else{
    echo '2';
}

?>