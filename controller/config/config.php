<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

	//==================DB Connection Parameters=============================================================

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
	$defaultUrl = "http://localhost/chovdv-owner/";
	
    $appUrl = "http://localhost/chovdv-owner/";

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


	// pros lock menu oboarding process and subscription status
	function pros_locked_menu_onboarding($UserID) {
		global $link;
	
		// Initialize default return values
		$result = [
			'menu_class' => '',
			'lock_icon'  => '',
			'status'     => 'enabled',
			'dash_menu_class'  => '',
			'dash_lock_icon'  => '',
			'school_plan'  => '',
		];
	
		// Fetch institution and owner data
		$select_schoolowner = mysqli_query($link, "
			SELECT * FROM `institution` 
			INNER JOIN `agencyorschoolowner` 
			ON `institution`.`AgencyOrSchoolOwnerID` = `agencyorschoolowner`.`AgencyOrSchoolOwnerID` 
			WHERE `institution`.`AgencyOrSchoolOwnerID` = '$UserID'
		");
	
		if ($select_schoolowner && mysqli_num_rows($select_schoolowner) > 0) {
			$select_schoolowner_row = mysqli_fetch_assoc($select_schoolowner);
			$groupschoolID_new = $select_schoolowner_row['InstitutionID'];
			$tagstatenew = intval($select_schoolowner_row['TagState']);

			$ActualPlan = $select_schoolowner_row['ActualPlan'];
	
			// Fetch campus data
			$selectverify_campus = mysqli_query($link, "
				SELECT * FROM `campus` 
				WHERE InstitutionID = '$groupschoolID_new'
			");
	
			if ($selectverify_campus && mysqli_num_rows($selectverify_campus) > 0) {
				$campus_row = mysqli_fetch_assoc($selectverify_campus);
				$tagstatecampusmain = $campus_row['TagState'];
				$tagstatecampusmain = ($tagstatecampusmain === '') ? 0 : intval($tagstatecampusmain);
	
				// Check onboarding lock conditions
				if ($tagstatecampusmain < 27) {
					if ($tagstatenew < 16) {
						$result['menu_class'] = "pros-disabled-menu";
						$result['lock_icon'] = '<span style="float: right; margin-right: 5px;">
							<i class="bx bxs-lock prosremovealllock" style="font-size: 15px; font-weight: 600; color: #ffd700;"></i>
						</span>';
						$result['status'] = 'disabled';

						$result['dash_menu_class'] = "pros-disabled-menu";
						$result['dash_lock_icon'] = '<span style="float: right; margin-right: 5px;">
							<i class="bx bxs-lock prosremovealllock" style="font-size: 15px; font-weight: 600; color: #ffd700;"></i>
						</span>';

						$result['school_plan'] = $ActualPlan;

						


						
					}
				}else{



					// PROS CHECK SUBSCRIPTION STATUS HERE
					$prosselectschoolplanconetentnew = mysqli_query($link,"SELECT * FROM `institution` WHERE AgencyOrSchoolOwnerID='$UserID'");
					$prosselectschoolplanconetentcntrownew = mysqli_fetch_assoc($prosselectschoolplanconetentnew);
					$prosselectschoolplanconetentcntnew = mysqli_num_rows($prosselectschoolplanconetentnew);
					
					// $NoDaysToCountnew = $prosselectschoolplanconetentcntrownew['NoDaysToCount'];
					$SubscriptionStatusnew = $prosselectschoolplanconetentcntrownew['SubscriptionStatus'];
					
					// $StartCountDatenew = $prosselectschoolplanconetentcntrownew['StartCountDate'];
					// PROS CHECK SUBSCRIPTION STATUS HERE     
					
					//IMPLEMENT LOCK HERE
						if($SubscriptionStatusnew == 'free')
						{
							
							$result['menu_class'] = "pros-disabled-menu";
							$result['lock_icon'] = '<span style="float: right; margin-right: 5px;">
								<i class="bx bxs-lock prosremovealllock" style="font-size: 15px; font-weight: 600; color: #ffd700;"></i>
							</span>';
							$result['status'] = 'disabled';
							$result['school_plan'] = $ActualPlan;
							
						}else {
							$result['school_plan'] = $ActualPlan;
						}
					//IMPLEMENT LOCK HERE  




				}

				
			}
		}
	
		return $result;
	}

	function prosload_session()
	{
		global $link;

		$pros_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
		$pros_result_session = mysqli_query($link, $pros_sql_session);
		$pros_row_session = mysqli_fetch_assoc($pros_result_session);
		$pros_row_cnt_session = mysqli_num_rows($pros_result_session);

		$pros_session_content = "";
		if ($pros_row_cnt_session > 0) {
			do {
				if ($pros_row_session['sessionStatus'] == '1') {
					$pros_selected_session = 'selected';
				} else {
					$pros_selected_session = '';
				}
				$pros_session_content.= '<option value="' . $pros_row_session['sessionName'] . '" ' . $pros_selected_session . '>' . $pros_row_session['sessionName'] . '</option>';

			} while ($pros_row_session = mysqli_fetch_assoc($pros_result_session));
		} else {
			$pros_session_content.='<option value="0">No Records Found</option>';
		}
		return $pros_session_content;
		
	}


	// pros load institution content for subscription
			
	mysqli_set_charset($link, 'utf8');
	
?>

