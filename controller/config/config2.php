<?php
//==================DB Connection Parameters=============================================================

    $server = 'localhost';
	$username = 'triomind_spg';
	$password = 'Maranata247@';
	$database = 'triomind_schoolportalgenerator';

	$link_abba = mysqli_connect($server, $username, $password, $database);
	
	$LivePaymentApi = 'FLWPUBK-672fe31514b1203bbc69a3f8b2df2fe0-X';
	$TestPaymentApi = 'FLWPUBK_TEST-39273a4cb9c3b96a4307ffea31898b95-X';
	
	$MonnifyLivePaymentApi = 'MK_PROD_Z980GG4PYA';
	$MonnifyTestPaymentApi = 'MK_TEST_WP7BY1ZC3Y';
	
	$MonnifyLiveContractCode = '779688215159';
	$MonnifyTestContractCode = '6890822651';

	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$connection = new PDO( 'mysql:host=localhost;dbname=triomind_schoolportalgenerator', $username, $password );

    //==================set pin characters=============================================================
//note the number of pin entered here is multiplied by times 2 before pin is generated
$numofcharstobegenerated = 6;



//================Get the unique Information for page customization=======================================
	$defaultUrl = "https://www.edumess.com/";

	//Get the url and extract the username
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
			$url = "https://";   
		else  
			$url = "http://";   
		// Append the host(domain name, ip) to the URL.   
		$url.= $_SERVER['HTTP_HOST'];   
		
		// Append the requested resource location to the URL   
		$url.= $_SERVER['REQUEST_URI'];    
		
		$username = substr(strrchr($url, '?'), 1);

		$sqlGetLoginID = mysqli_query($link, "SELECT * FROM userlogin WHERE UserRegNumberOrUsername='$username' AND UserType IN ('institution','owner','company')");
		$rowGetLoginID = mysqli_fetch_assoc($sqlGetLoginID);
		$countLoginID = mysqli_num_rows($sqlGetLoginID);

		if($countLoginID > 0){
			$userID = $rowGetLoginID['UserID'];
            $usertype = $rowGetLoginID['UserType'];
			$InstitutionID = $rowGetLoginID['InstitutionID'];

			    if($usertype == 'company')
			    {

					$sqlGetUserDetails = ("SELECT * FROM `consultant` WHERE ConsultantID = '$userID'");
					$resultGetUserDetails = mysqli_query($link, $sqlGetUserDetails);
					$rowGetUserDetails = mysqli_fetch_assoc($resultGetUserDetails);
					$row_cntGetUserDetails = mysqli_num_rows($resultGetUserDetails);
					
					$IDforLogin = $userID;

					$PrimaryName = $rowGetUserDetails['ConsultantName'];
					$SecondaryName = $rowGetUserDetails['ConsultantNameTwo'];
					$PrimaryColor = $rowGetUserDetails['ConsultantPrimaryColor'];
					$SecondaryColor = $rowGetUserDetails['ConsultantSecondaryColor'];
					$LoginTitleColor = $rowGetUserDetails['ConsultantLoginTitleColor'];
					$Logo = $rowGetUserDetails['ConsultantLogo'];
					$LoginBgImage = $rowGetUserDetails['ConsultantLoginBgImage'];
					$Favicon = $rowGetUserDetails['ConsultantFavicon'];
					$Motto = $rowGetUserDetails['ConsultantMotto'];
					$Address = $rowGetUserDetails['ConsultantAddress'];
					$Country = $rowGetUserDetails['ConsultantCountry'];
					$State = $rowGetUserDetails['ConsultantState'];
					$LGA = $rowGetUserDetails['ConsultantLGA'];
					$City = $rowGetUserDetails['ConsultantCity'];
					$Phone = $rowGetUserDetails['ConsultantPhone'];
					$Email = $rowGetUserDetails['ConsultantEmail'];
					$Website = $rowGetUserDetails['ConsultantWebsite'];
					
					$ServiceProvidernameMain = $PrimaryName.''.$SecondaryName;
					$serviceProviderUrlMain = $Website;
		 			
				}
				elseif($usertype == 'superaffiliate')
				{

					$sqlGetUserDetails = ("SELECT * FROM `consultant` WHERE ConsultantID = '$userID'");
					$resultGetUserDetails = mysqli_query($link, $sqlGetUserDetails);
					$rowGetUserDetails = mysqli_fetch_assoc($resultGetUserDetails);
					$row_cntGetUserDetails = mysqli_num_rows($resultGetUserDetails);
					
					$IDforLogin = $userID;

					$PrimaryName = $rowGetUserDetails['ConsultantName'];
					$SecondaryName = $rowGetUserDetails['ConsultantNameTwo'];
					$PrimaryColor = $rowGetUserDetails['ConsultantPrimaryColor'];
					$SecondaryColor = $rowGetUserDetails['ConsultantSecondaryColor'];
					$LoginTitleColor = $rowGetUserDetails['ConsultantLoginTitleColor'];
					$Logo = $rowGetUserDetails['ConsultantLogo'];
					$LoginBgImage = $rowGetUserDetails['ConsultantLoginBgImage'];
					$Favicon = $rowGetUserDetails['ConsultantFavicon'];
					$Motto = $rowGetUserDetails['ConsultantMotto'];
					$Address = $rowGetUserDetails['ConsultantAddress'];
					$Country = $rowGetUserDetails['ConsultantCountry'];
					$State = $rowGetUserDetails['ConsultantState'];
					$LGA = $rowGetUserDetails['ConsultantLGA'];
					$City = $rowGetUserDetails['ConsultantCity'];
					$Phone = $rowGetUserDetails['ConsultantPhone'];
					$Email = $rowGetUserDetails['ConsultantEmail'];
					$Website = $rowGetUserDetails['ConsultantWebsite'];
					
					$ServiceProvidernameMain = $PrimaryName.''.$SecondaryName;
					$serviceProviderUrlMain = $Website;
					
				}
				elseif($usertype == 'owner')
				{

					$sqlGetUserDetails = ("SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID = '$userID'");
					$resultGetUserDetails = mysqli_query($link, $sqlGetUserDetails);
					$rowGetUserDetails = mysqli_fetch_assoc($resultGetUserDetails);
					$row_cntGetUserDetails = mysqli_num_rows($resultGetUserDetails);
					
					$IDforLogin = $userID;

					$PrimaryName = $rowGetUserDetails['AgencyOrSchoolOwnerName'];
					$SecondaryName = $rowGetUserDetails['AgencyOrSchoolOwnerNameTwo'];
					$PrimaryColor = $rowGetUserDetails['AgencyOrSchoolOwnerPrimaryColor'];
					$SecondaryColor = $rowGetUserDetails['AgencyOrSchoolOwnerSecondaryColor'];
					$LoginTitleColor = $rowGetUserDetails['AgencyOrSchoolOwnerLoginTitleColor'];
					$Logo = $rowGetUserDetails['AgencyOrSchoolOwnerLogo'];
					$LoginBgImage = $rowGetUserDetails['AgencyOrSchoolOwnerLoginBgImage'];
					$Favicon = $rowGetUserDetails['AgencyOrSchoolOwnerFavicon'];
					$Motto = $rowGetUserDetails['AgencyOrSchoolOwnerMotto'];
					$Address = $rowGetUserDetails['AgencyOrSchoolOwnerAddress'];
					$Country = $rowGetUserDetails['AgencyOrSchoolOwnerCountry'];
					$State = $rowGetUserDetails['AgencyOrSchoolOwnerState'];
					$LGA = $rowGetUserDetails['AgencyOrSchoolOwnerLGA'];
					$City = $rowGetUserDetails['AgencyOrSchoolOwnerCity'];
					$Phone = $rowGetUserDetails['AgencyOrSchoolOwnerPhone'];
					$Email = $rowGetUserDetails['AgencyOrSchoolOwnerEmail'];
					$Website = $rowGetUserDetails['AgencyOrSchoolOwnerWebsite'];
					
					$ConsultantID = $rowGetUserDetails['ConsultantID'];
					
					$sqlGetUserDetailsSP = ("SELECT * FROM `consultant` WHERE ConsultantID = '$ConsultantID'");
					$resultGetUserDetailsSP = mysqli_query($link, $sqlGetUserDetailsSP);
					$rowGetUserDetailsSP = mysqli_fetch_assoc($resultGetUserDetailsSP);
					$row_cntGetUserDetailsSP = mysqli_num_rows($resultGetUserDetailsSP);
					
					$conphonenumber = $rowGetUserDetailsSP['ConsultantMainPhone'];
					
					$PrimaryNameSP = $rowGetUserDetailsSP['ConsultantName'];
					$SecondaryNameSP = $rowGetUserDetailsSP['ConsultantNameTwo'];
					$WebsiteSP = $rowGetUserDetailsSP['ConsultantWebsite'];
					
					$ServiceProvidernameMain = $PrimaryNameSP.''.$SecondaryNameSP;
					$serviceProviderUrlMain = $WebsiteSP;
				}
				elseif($usertype == 'ambassador')
				{
					$sqlGetUserDetails = ("SELECT * FROM `ambassador` WHERE AmbassadorID = '$userID'");
					$resultGetUserDetails = mysqli_query($link, $sqlGetUserDetails);
					$rowGetUserDetails = mysqli_fetch_assoc($resultGetUserDetails);
					$row_cntGetUserDetails = mysqli_num_rows($resultGetUserDetails);
					
					$IDforLogin = $userID;


					$ConsultantID = $rowGetUserDetails['UserID'];
					
					$sqlGetUserDetailsSP = ("SELECT * FROM `consultant` WHERE ConsultantID = '$ConsultantID'");
					$resultGetUserDetailsSP = mysqli_query($link, $sqlGetUserDetailsSP);
					$rowGetUserDetailsSP = mysqli_fetch_assoc($resultGetUserDetailsSP);
					$row_cntGetUserDetailsSP = mysqli_num_rows($resultGetUserDetailsSP);
					
					$PrimaryName = $rowGetUserDetailsSP['ConsultantName'];
					$SecondaryName = $rowGetUserDetailsSP['ConsultantNameTwo'];
					$PrimaryColor = $rowGetUserDetailsSP['ConsultantPrimaryColor'];
					$SecondaryColor = $rowGetUserDetailsSP['ConsultantSecondaryColor'];
					$LoginTitleColor = $rowGetUserDetailsSP['ConsultantLoginTitleColor'];
					$Logo = $rowGetUserDetailsSP['ConsultantLogo'];
					$LoginBgImage = $rowGetUserDetailsSP['ConsultantLoginBgImage'];
					$Favicon = $rowGetUserDetailsSP['ConsultantFavicon'];
					$Motto = $rowGetUserDetailsSP['ConsultantMotto'];
					$Address = $rowGetUserDetailsSP['ConsultantAddress'];
					$Country = $rowGetUserDetailsSP['ConsultantCountry'];
					$State = $rowGetUserDetailsSP['ConsultantState'];
					$LGA = $rowGetUserDetailsSP['ConsultantLGA'];
					$City = $rowGetUserDetailsSP['ConsultantCity'];
					$Phone = $rowGetUserDetailsSP['ConsultantPhone'];
					$Email = $rowGetUserDetailsSP['ConsultantEmail'];
					$Website = $rowGetUserDetailsSP['ConsultantWebsite'];
					
					$ServiceProvidernameMain = $PrimaryName.''.$SecondaryName;
					$serviceProviderUrlMain = $Website;

				}
				else
				{

					$sqlGetUserDetails = ("SELECT * FROM `institution` WHERE InstitutionID = '$userID'");
					$resultGetUserDetails = mysqli_query($link, $sqlGetUserDetails);
					$rowGetUserDetails = mysqli_fetch_assoc($resultGetUserDetails);
					$row_cntGetUserDetails = mysqli_num_rows($resultGetUserDetails);
					
					$IDforLogin = $userID;

					$PrimaryName = $rowGetUserDetails['InstitutionName'];
					$SecondaryName = $rowGetUserDetails['InstitutionNameTwo'];
					$PrimaryColor = $rowGetUserDetails['InstitutionPrimaryColor'];
					$SecondaryColor = $rowGetUserDetails['InstitutionSecondaryColor'];
					$LoginTitleColor = $rowGetUserDetails['LoginTitleColor'];
					$Logo = $rowGetUserDetails['InstitutionLogo'];
					$LoginBgImage = $rowGetUserDetails['LoginBgImage'];
					$Favicon = $rowGetUserDetails['InstitutionFavicon'];
					$Motto = $rowGetUserDetails['InstitutionMotto'];
					$Address = $rowGetUserDetails['InstitutionAddress'];
					$Countryid = $rowGetUserDetails['InstitutionCountry'];
					$Stateid = $rowGetUserDetails['InstitutionState'];
					$LGAid = $rowGetUserDetails['InstitutionLGA'];
					$City = $rowGetUserDetails['InstitutionCity'];
					$Phone = $rowGetUserDetails['InstitutionPhone'];
					$Email = $rowGetUserDetails['InstitutionEmail'];
					$Website = $rowGetUserDetails['InstitutionWebsite'];
					
					$PinGenerationStat = $rowGetUserDetails['PinGenerationStat'];
					
					$AgencyOrSchoolOwnerID = $rowGetUserDetails['AgencyOrSchoolOwnerID'];
					
					$sqlGetownerDetails = ("SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID = '$AgencyOrSchoolOwnerID'");
					$resultGetownerDetails = mysqli_query($link, $sqlGetownerDetails);
					$rowGetownerDetails = mysqli_fetch_assoc($resultGetownerDetails);
					$row_cntGetownerDetails = mysqli_num_rows($resultGetownerDetails);
					
					$AgencyOrSchoolOwnerphonenumber = $rowGetownerDetails['AgencyOrSchoolOwnerMainPhone'];
					
					$AgencyOrSchoolOwnerWhatsAppPhone = $rowGetownerDetails['AgencyOrSchoolOwnerWhatsAppPhone'];
					
					$sqlGetUserDetailsSP = ("SELECT consultant.ConsultantName as SPFirstname, consultant.ConsultantNameTwo AS SPLastName, consultant.ConsultantWebsite 
					AS SPWebsite FROM `institution` INNER JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
					INNER JOIN consultant on consultant.ConsultantID=agencyorschoolowner.ConsultantID WHERE institution.InstitutionID='$userID'");
					$resultGetUserDetailsSP = mysqli_query($link, $sqlGetUserDetailsSP);
					$rowGetUserDetailsSP = mysqli_fetch_assoc($resultGetUserDetailsSP);
					$row_cntGetUserDetailsSP = mysqli_num_rows($resultGetUserDetailsSP);
					
					$PrimaryNameSP = $rowGetUserDetailsSP['SPFirstname'];
					$SecondaryNameSP = $rowGetUserDetailsSP['SPLastName'];
					$WebsiteSP = $rowGetUserDetailsSP['SPWebsite'];
					
					$ServiceProvidernameMain = $PrimaryNameSP.''.$SecondaryNameSP;
					$serviceProviderUrlMain = $WebsiteSP;
					
					if($row_cntGetUserDetails > 0)
					{
					    $sqlGetUsercountry = ("SELECT * FROM `countries` WHERE countryID = '$Countryid'");
    					$resultGetUsercountry = mysqli_query($link, $sqlGetUsercountry);
    					$rowGetUsercountry = mysqli_fetch_assoc($resultGetUsercountry);
    					$row_cntGetUsercountry = mysqli_num_rows($resultGetUsercountry);
    					
    					$Country = $rowGetUsercountry['CountryName'];
    					
    					$sqlGetUserstate = ("SELECT * FROM `states` WHERE StateID = '$Stateid'");
    					$resultGetUserstate = mysqli_query($link, $sqlGetUserstate);
    					$rowGetUserstate = mysqli_fetch_assoc($resultGetUserstate);
    					$row_cntGetUserstate = mysqli_num_rows($resultGetUserstate);
    					
    					$State = $rowGetUserstate['StateName'];
    					
    				// 	$sqlGetUsercity = ("SELECT * FROM `cities` WHERE CityID = '$Cityid'");
    				// 	$resultGetUsercity = mysqli_query($link, $sqlGetUsercity);
    				// 	$rowGetUsercity = mysqli_fetch_assoc($resultGetUsercity);
    				// 	$row_cntGetUsercity = mysqli_num_rows($resultGetUsercity);
    					
    				// 	$City = $rowGetUsercity['CityName'];
					}
					
					
				}
		}
		else
		{
					$PrimaryName = 'School';
					$SecondaryName = 'Portal Generator';
					$PrimaryColor = '#FE903E';
					$SecondaryColor = '#1B1817';
					$LoginTitleColor = '#FFFFFF';
					$Logo = 'default_logo.png';
					$LoginBgImage = 'default_bg.jpg';
					$Favicon = 'default_favicon.png';
					$Motto = '#1 School Portal Generator';
					$Address = '68 Kwameh Nkrumah Crescent';
					$Country = 'Nigeria';
					$State = 'FCT';
					$LGA = 'Abuja';
					$City = 'Asokoro';
					$Phone = '+2347063859559';
					$Email = 'info@edumes.net';
					$Website = 'www.edumes.net';
		}

        $edumesssupline = '2347045277801';
  mysqli_set_charset($link, 'utf8'); 
?>
