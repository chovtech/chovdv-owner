<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 	include('../../../config/config.php');

	$ekene_p = $_POST["ekene_p"];
	$positionid = $_POST["positionid"];
	$userid = $_POST["useride"];
	$committeeid = $_POST['committeeid'];
	$campus = $_POST['campus'];

   $positionname = mysqli_real_escape_string($link, $_POST["positionname"]);

  	$ekene_updateassignment = "UPDATE `member` SET `PositionID`= '$ekene_p' WHERE `UserID` = '$userid' AND `CommitteeID` = '$committeeid' ";
  
	$query_updated = mysqli_query($link, $ekene_updateassignment);

	if ($query_updated == true)
	{
	echo "2";

	$activity_log_inst_camp_id = $campus;
   $activity_log_userid = $_POST['userid'];
   $activity_log_usertype = $_POST['usertype'];
   $activity_log_description = 'Edited Member Position';
   $activity_log_longitude = $_POST['longitude'];
   $activity_log_latitude = $_POST['latitude'];

   insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
	}
	else
	{
	echo "4";
	}

  ?>