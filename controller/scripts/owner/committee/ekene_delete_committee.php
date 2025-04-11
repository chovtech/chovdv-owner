<?php
include("../../../config/config.php");

$committeeid = $_POST["committeeid"];
$campus = $_POST["campus"];

date_default_timezone_set( 'Africa/Lagos');
$today = date( 'd/m/Y' );
$currentTime = date( 'H:i:s' );
$currenttime_date = date('Y-m-d');
// $currentDateTime = date('Y-m-d H:i:s');
// // $Description = "Deleted assignmentquestion";


$updateassignment = " UPDATE `boardmember` SET `DeleteStatus`= 1, `Deletedate` = '$currenttime_date'  WHERE `CommitteeID`= '$committeeid' AND `CampusID`= '$campus'";
$query_updated = mysqli_query($link, $updateassignment);

if ($query_updated == true)
{
   echo "2";

   $activity_log_inst_camp_id = $campus;
   $activity_log_userid = $_POST['userid'];
   $activity_log_usertype = $_POST['usertype'];
   $activity_log_description = 'Deleted Commitee';
   $activity_log_longitude = $_POST['longitude'];
   $activity_log_latitude = $_POST['latitude'];

   insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
}
else
{
   echo "4";
}

?>