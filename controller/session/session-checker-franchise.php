<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	ob_start();
	session_start();

	include('../../controller/config/config.php');

	if (!isset($_SESSION['spgaffiliate']) && empty($_SESSION['spgaffiliate'])) {
		header("Location: ../../session-expire/");
	}

	$UserRegNumberOrUsername = $_SESSION['spgaffiliate'];
	$UType = $_SESSION['spgUserType'];

	$sqlfromsession = ("SELECT * FROM `userlogin` WHERE UserRegNumberOrUsername='$UserRegNumberOrUsername' AND UserType='$UType'");
	$resultfromsession = mysqli_query($link, $sqlfromsession);
	$rowfromsession = mysqli_fetch_assoc($resultfromsession);
	$row_cntfromsession = mysqli_num_rows($resultfromsession);

	$passworddb = $rowfromsession['UserPassword'];
	$UserID = $rowfromsession['UserID'];
	$UserLoginID = $rowfromsession['UserLoginID'];

	$sqlGetUserDetails = ("SELECT * FROM `affiliate` WHERE AffiliateID = '$UserID'");
	$resultGetUserDetails = mysqli_query($link, $sqlGetUserDetails);
	$rowGetUserDetails = mysqli_fetch_assoc($resultGetUserDetails);
	$row_cntGetUserDetails = mysqli_num_rows($resultGetUserDetails);

	$AffiliateID = $rowGetUserDetails['AffiliateID'];
	$WalletBal = $rowGetUserDetails['WalletBal'];

	
	$PrimaryName = $rowGetUserDetails['AffiliateFName'];
	$SecondaryName = $rowGetUserDetails['AffiliateLName'];


	$Address = $rowGetUserDetails['Address'];
	$Country = $rowGetUserDetails['Country'];
	$State = $rowGetUserDetails['State'];
	$LGA = $rowGetUserDetails['LGA'];
	// $City = $rowGetUserDetails['AgencyOrSchoolOwnerCity'];
	$Phone = $rowGetUserDetails['Phone'];
	$Whatsappno = $rowGetUserDetails['Phone'];
	$Email = $rowGetUserDetails['Email'];

    $BankAccName = $rowGetUserDetails['BankAccName'];
    $BankAccNo = $rowGetUserDetails['BankAccNo'];
    $Bank = $rowGetUserDetails['Bank'];
    $BankCode = $rowGetUserDetails['BankCode'];
    $referral_code = $rowGetUserDetails['referral_code'];
    
    
    
    $referral_link = $defaultUrl.'affiliate?ref='.$referral_code;

    $ApproveStatus = $rowGetUserDetails['ApproveStatus'];

// 	$tagstate = $rowGetUserDetails['TagState'];
// 	$DefaultLanguage = $rowGetUserDetails['DefaultLanguage'];


	$fullname = $PrimaryName . ' ' . $SecondaryName;
	$userType = 'Affiliate';
	
	$userPicturechecker = $rowGetUserDetails['Photo'];
	
	if($userPicturechecker === '' || $userPicturechecker === '0')
	{
	   
	   
	    $userPicture = '../../assets/images/adminImg/default-img.png';
	}
	else
	{
	    $userPicture = $rowGetUserDetails['Photo'];
	}
	

?>