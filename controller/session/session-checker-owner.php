<?php

	ob_start();
	session_start();

	include('../../controller/config/config.php');

	if (!isset($_SESSION['spgowner']) && empty($_SESSION['spgowner'])) {
		header("Location: ../../session-expire/");
	}

	$UserRegNumberOrUsername = $_SESSION['spgowner'];
	$UType = $_SESSION['spgUserType'];

	$sqlfromsession = ("SELECT * FROM `userlogin` WHERE UserRegNumberOrUsername='$UserRegNumberOrUsername' AND UserType='$UType'");
	$resultfromsession = mysqli_query($link, $sqlfromsession);
	$rowfromsession = mysqli_fetch_assoc($resultfromsession);
	$row_cntfromsession = mysqli_num_rows($resultfromsession);

	$passworddb = $rowfromsession['UserPassword'];
	$UserID = $rowfromsession['UserID'];
	$UserLoginID = $rowfromsession['UserLoginID'];

	$sqlGetUserDetails = ("SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID = '$UserID'");
	$resultGetUserDetails = mysqli_query($link, $sqlGetUserDetails);
	$rowGetUserDetails = mysqli_fetch_assoc($resultGetUserDetails);
	$row_cntGetUserDetails = mysqli_num_rows($resultGetUserDetails);

	$AgencyOrSchoolOwnerID = $rowGetUserDetails['AgencyOrSchoolOwnerID'];

	$AffiliateID = $rowGetUserDetails['AffiliateID'];

	
	$PrimaryName = $rowGetUserDetails['AgencyOrSchoolOwnerName'];
	$SecondaryName = $rowGetUserDetails['AgencyOrSchoolOwnerNameTwo'];


	$Address = $rowGetUserDetails['AgencyOrSchoolOwnerAddress'];
	$Country = $rowGetUserDetails['AgencyOrSchoolOwnerCountry'];
	$State = $rowGetUserDetails['AgencyOrSchoolOwnerState'];
	$LGA = $rowGetUserDetails['AgencyOrSchoolOwnerLGA'];
	$City = $rowGetUserDetails['AgencyOrSchoolOwnerCity'];
	$Phone = $rowGetUserDetails['AgencyOrSchoolOwnerMainPhone'];
	$Whatsappno = $rowGetUserDetails['AgencyOrSchoolOwnerWhatsAppPhone'];
	$Email = $rowGetUserDetails['AgencyOrSchoolOwnerEmail'];
	
	$NIN = $rowGetUserDetails['NIN'];
	
	$BVN = $rowGetUserDetails['BVN'];
	
	$sqlGet_consultant_Details = ("SELECT * FROM `affiliate` WHERE AffiliateID = '$AffiliateID'");
	$resultGet_consultant_Details = mysqli_query($link, $sqlGet_consultant_Details);
	$rowGet_consultant_Details = mysqli_fetch_assoc($resultGet_consultant_Details);
	$row_cntGet_consultant_Details = mysqli_num_rows($resultGet_consultant_Details);
	
	$consultant_whats_appno = $rowGet_consultant_Details['Phone'];


	$tagstate = $rowGetUserDetails['TagState'];
	
	
	$TransactionPin= $rowGetUserDetails['TransactionPin'];

	// PROS GET DEFAULT LANGUAGE HERE
	$lang_id = $rowGetUserDetails['DefaultLanguage'];
	$get_lng_sql = mysqli_query($link, "SELECT * FROM `language` WHERE ID='$lang_id'");
	$get_lng_sql_fetch = mysqli_fetch_assoc($get_lng_sql);
	$get_lng_sql_rows = mysqli_num_rows($get_lng_sql);

	if($get_lng_sql_rows > 0)
	{
		$DefaultLanguage = $get_lng_sql_fetch['Language'];
	}else
	{
		$DefaultLanguage = '';
	}
	


	$fullname = $PrimaryName . ' ' . $SecondaryName;
	$userType = 'owner';
	
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