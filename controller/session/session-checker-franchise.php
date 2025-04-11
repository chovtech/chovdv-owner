<?php

	ob_start();
	session_start();

	include('../../controller/config/config.php');

	if (!isset($_SESSION['spgconsultant']) && empty($_SESSION['spgconsultant'])) {
		header("Location: ../../session-expire/");
	}

	$UserRegNumberOrUsername = $_SESSION['spgconsultant'];
	$UType = $_SESSION['spgUserType'];

	$sqlfromsession = ("SELECT * FROM `userlogin` WHERE UserRegNumberOrUsername='$UserRegNumberOrUsername' AND UserType='$UType'");
	$resultfromsession = mysqli_query($link, $sqlfromsession);
	$rowfromsession = mysqli_fetch_assoc($resultfromsession);
	$row_cntfromsession = mysqli_num_rows($resultfromsession);

	$passworddb = $rowfromsession['UserPassword'];
	$UserID = $rowfromsession['UserID'];
	$UserLoginID = $rowfromsession['UserLoginID'];

	$sqlGetUserDetails = ("SELECT * FROM `consultant` WHERE ConsultantID = '$UserID'");
	$resultGetUserDetails = mysqli_query($link, $sqlGetUserDetails);
	$rowGetUserDetails = mysqli_fetch_assoc($resultGetUserDetails);
	$row_cntGetUserDetails = mysqli_num_rows($resultGetUserDetails);

	$ConsultantID = $rowGetUserDetails['ConsultantID'];

	
	$PrimaryName = $rowGetUserDetails['ConsultantName'];
	$SecondaryName = $rowGetUserDetails['ConsultantNameTwo'];


// 	$Address = $rowGetUserDetails['AgencyOrSchoolOwnerAddress'];
// 	$Country = $rowGetUserDetails['AgencyOrSchoolOwnerCountry'];
// 	$State = $rowGetUserDetails['AgencyOrSchoolOwnerState'];
// 	$LGA = $rowGetUserDetails['AgencyOrSchoolOwnerLGA'];
// 	$City = $rowGetUserDetails['AgencyOrSchoolOwnerCity'];
// 	$Phone = $rowGetUserDetails['AgencyOrSchoolOwnerMainPhone'];
// 	$Whatsappno = $rowGetUserDetails['AgencyOrSchoolOwnerWhatsAppPhone'];
// 	$Email = $rowGetUserDetails['AgencyOrSchoolOwnerEmail'];


// 	$tagstate = $rowGetUserDetails['TagState'];
// 	$DefaultLanguage = $rowGetUserDetails['DefaultLanguage'];


// 	$fullname = $PrimaryName . ' ' . $SecondaryName;
// 	$userType = 'owner';
	
	$userPicturechecker = $rowGetUserDetails['photo'];
	
	if($userPicturechecker === '' || $userPicturechecker === '0')
	{
	    $userPicture = '../../assets/images/adminImg/default-img.png';
	}
	else
	{
	    $userPicture = $rowGetUserDetails['photo'];
	}
	

?>