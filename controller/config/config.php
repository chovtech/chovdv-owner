<?php
	//==================DB Connection Parameters=============================================================

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'triomind_edumessversiontwo_dev';

	$link = mysqli_connect($server, $username, $password, $database);
	// mysql_set_charset($link, "utf8");

	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$connection = new PDO('mysql:host=localhost;dbname=triomind_edumessversiontwo_dev', $username, $password);

	//==================set pin characters=============================================================
	//note the number of pin entered here is multiplied by times 2 before pin is generated
	$numofcharstobegenerated = 6;

	//================Get the unique Information for page customization=======================================
	$defaultUrl = "https://dev.edumess.com/";
	
    $appUrl = "https://dev.edumess.com/";

	// $selectserveretails = mysqli_query($link,"SELECT * FROM `serverpassword`");
    // $selectserveretailscnt = mysqli_fetch_assoc($selectserveretails);
  
    // $servername = $selectserveretailscnt['ServerName'];
    // $serverpwd = $selectserveretailscnt['ServerPassword'];
    
	$MonnifyLivePaymentApi = 'MK_PROD_Z980GG4PYA';
	$MonnifyTestPaymentApi = 'MK_TEST_WP7BY1ZC3Y';
	
	$MonnifyLiveContractCode = '779688215159';
	$MonnifyTestContractCode = '6890822651';

	$EduMESS_Wallet_Number = '8018133138';

	$sql_edumesspaymentcharges = ("SELECT * FROM `edumesspaymentcharges`");
    $result_edumesspaymentcharges = mysqli_query($link, $sql_edumesspaymentcharges);
    $row_edumesspaymentcharges = mysqli_fetch_assoc($result_edumesspaymentcharges);

    $charge = floatval($row_edumesspaymentcharges['ChargeAmount']);
	$Cap = floatval($row_edumesspaymentcharges['Cap']);
	$StampDuty = floatval($row_edumesspaymentcharges['StampDuty']);
	
	
	function getClientIp() {
		$ipAddress = '';

		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ipAddress = $_SERVER['HTTP_CLIENT_IP'];
		} else {
			$ipAddress = $_SERVER['REMOTE_ADDR'];
		}

		return $ipAddress;
	}

	$ipAddress = getClientIp();


	function insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link, $ipAddress){

		date_default_timezone_set("Africa/Lagos");
		$DateCreated = date('Y-m-d H:i:s');

		$sql_activity_log = mysqli_query($link, "INSERT INTO `activitylog`(`ActitvityLogID`, `InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) VALUES (NULL,'$activity_log_inst_camp_id','$activity_log_userid','$activity_log_usertype','$ipAddress','0','$activity_log_longitude','$activity_log_latitude','$activity_log_description','$DateCreated')");

	}

	mysqli_set_charset($link, 'utf8');
	
?>