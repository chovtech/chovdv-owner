<?php

include("../../../config/config.php");

$Userid = $_POST["User"];
$committeeid = $_POST['committeeid'];
$campus = $_POST['campusid'];

$updateassignment = "UPDATE `member` SET `Deletestatus` = 1 WHERE `UserID` = '$Userid' AND `CommitteeID` = '$committeeid' ";
$query_updated = mysqli_query($link, $updateassignment);


if ($query_updated == true){
   echo "2";
   
   $activity_log_inst_camp_id = $campus;
   $activity_log_userid = $_POST['userid'];
   $activity_log_usertype = $_POST['usertype'];
   $activity_log_description = 'Deleted Member';
   $activity_log_longitude = $_POST['longitude'];
   $activity_log_latitude = $_POST['latitude'];

   insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
}else{
   echo "4";
}

?>