<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

	//==================DB Connection Parameters=============================================================
// edumplvx_edumessversiontwo_dev
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'edumplvx_edumessversiontwo_dev';
	
// 	J1H)92v^Fd81

	$link = mysqli_connect($server, $username, $password, $database);
	// mysql_set_charset($link, "utf8");

	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$connection = new PDO('mysql:host=localhost;dbname=edumplvx_edumessversiontwo_dev', $username, $password);

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

	$EduMESS_verify_email = 'verify@edumess.com	';

	$sql_edumesspaymentcharges = ("SELECT * FROM `edumesspaymentcharges`");
    $result_edumesspaymentcharges = mysqli_query($link, $sql_edumesspaymentcharges);
    $row_edumesspaymentcharges = mysqli_fetch_assoc($result_edumesspaymentcharges);
    $row_edumesspaymentcharges_ctn = mysqli_num_rows($result_edumesspaymentcharges);

    if($row_edumesspaymentcharges_ctn > 0)
    {
        $charge = floatval($row_edumesspaymentcharges['ChargeAmount']);
        $Cap = floatval($row_edumesspaymentcharges['Cap']);
        $StampDuty = floatval($row_edumesspaymentcharges['StampDuty']);

    }
    else{
        $charge = 0;
        $Cap = 0;
        $StampDuty = 0;

    }

	
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