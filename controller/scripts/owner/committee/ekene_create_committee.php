<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	include('../../../config/config.php');

	$campus = $_POST["campus"];
	$committeename = $_POST["committeename"];

	date_default_timezone_set("Africa/Lagos");
	$dateAndTime = date("Y/m/d");

	$slect_all_committee = " SELECT * FROM `boardmember` WHERE `CampusID` = '$campus' AND `Committeename` = '$committeename' AND `DeleteStatus` = 0 ";
	$ekene_query_link_class = mysqli_query($link, $slect_all_committee);
	$ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
	$ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);
	$success = 0;

	if ($ekene_row_cnt_ekene > 0){
		echo "exist";
	}else{

		$escaped_committeename = mysqli_real_escape_string($link, $committeename);

		$insert_committee ="INSERT INTO `boardmember`(`Committeename`, `CampusID`, `Datecreated`, `DeleteStatus`) VALUES ('$escaped_committeename','$campus', '$dateAndTime', 0)";
		$select_import_question = mysqli_query($link, $insert_committee);
		$success++;

	}

   if ($success == 0){

    echo "1";

	$activity_log_inst_camp_id = $campus;
	$activity_log_userid = $_POST['userid'];
	$activity_log_usertype = $_POST['usertype'];
	$activity_log_description = 'Created Commitee';
	$activity_log_longitude = $_POST['longitude'];
	$activity_log_latitude = $_POST['latitude'];

	insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);

   }else{

   echo "2";

   }

 ?>