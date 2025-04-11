<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	include('../../../config/config.php');

	$usertype = $_POST["usertypes"];
	$ekenecommitee = $_POST["ekenecommitee"];
	$ekeneuserid = $_POST["ekeneuserid"];
	$campus = $_POST["campus"];
	$instutition = $_POST["instutition"];

	date_default_timezone_set("Africa/Lagos");
	$date= date("Y/m/d");
	$success = 0;

	function formatPhoneNumber($phoneNumber) {
		// Remove non-numeric characters
		$numericPhoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

		// Check if the number starts with '0' and add '234' in that case
		if (substr($numericPhoneNumber, 0, 1) === '0') {
			return '234' . substr($numericPhoneNumber, 1);
		} else {
			// Check if the number starts with '+', if yes, remove the '+'
			if (substr($numericPhoneNumber, 0, 1) === '+') {
			$numericPhoneNumber = substr($numericPhoneNumber, 1);
			}
			// Return the numeric phone number
			return $numericPhoneNumber;
		}
	}

	$studentmessagearr = array();
	$studentnumarr= array();
	$studentfilearr= array();
	$studentinstit= array();
	$apikeynecont = array();

	$fullparentmessagearr = array();
	$fullparentnumarr= array();
	$fullparentfilearr= array();
	$fullparentinstit= array();
	$apikeyparentnecont = array();

	$fullstaffmessagearr = array();
	$fullstaffnumarr= array();
	$fullstafffilearr= array();
	$fullstaffinstit= array();
	$apikeystaffnecont = array();

// one 
	$select_institution =  "SELECT * FROM `institution` WHERE  InstitutionID = '$instutition'";
	$ekene_selectinsttution = mysqli_query($link, $select_institution);
	$ekene_get_institution_details = mysqli_fetch_assoc($ekene_selectinsttution);
	$ekene_row_institution = mysqli_num_rows($ekene_selectinsttution);

	if ($ekene_row_institution > 0){

		$InstitutionGeneralName =  $ekene_get_institution_details['InstitutionGeneralName'];
		$InstitutionEmail =  $ekene_get_institution_details['InstitutionEmail'];
		if ($InstitutionEmail == ''){

			$InstitutionEmailnew = "hello@edumess.com";

		}else{

		$InstitutionEmailnew = $InstitutionEmail;

		}

	}


	$select_all_committee = " SELECT * FROM `boardmember` WHERE `CampusID` IN (0, $campus) AND DeleteStatus = 0";
	$ekene_query_link_class = mysqli_query($link, $select_all_committee);
	$ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
	$ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);

	if ($ekene_row_cnt_ekene > 0){

		$Committeename = $ekene_get_details_subject['Committeename'];

		$Datecreated = $ekene_get_details_subject['Datecreated'];

		$CommitteeID = $ekene_get_details_subject['CommitteeID'];
	}else{
		
	}

	$ekeneuseridexplode = explode(',', $ekeneuserid);

	$count = count($ekeneuseridexplode);
		

	for ($i = 0; $i < $count; $i++) {

		$send_whatapp = array();
			$ekeneuseridnew = $ekeneuseridexplode[$i];

					if ($usertype == "student")
					{
							$insert_member = "INSERT INTO `member`( `UserID`, `Usertype`, `InstitutionorCampusID`, `CommitteeID`, `PositionID`, `DateIn`)
						VALUES ('$ekeneuseridnew','$usertype','$campus','$ekenecommitee','22','$date')";


								$slect_all_student  = "SELECT * FROM `student` WHERE  CampusID = '$campus' AND `StudentID` = '$ekeneuseridnew'";
								$ekene_query_link_student = mysqli_query($link, $slect_all_student);
								$ekene_get_details_student = mysqli_fetch_assoc($ekene_query_link_student);
								$ekene_row_cnt_ekenestudent = mysqli_num_rows($ekene_query_link_student);


								if($ekene_row_cnt_ekenestudent > 0)
								{
								
									$StudentFirstName = $ekene_get_details_student['StudentFirstName'];
									$StudentMiddleName = $ekene_get_details_student['StudentMiddleName'];
									$StudentLastName = $ekene_get_details_student['StudentLastName'];
									$StudentPhone = $ekene_get_details_student['StudentPhone'];
									
									if($StudentPhone == '')
									{
										$StudentPhonereal = $StudentPhone;
									}else{


										$StudentPhonereal = $StudentPhone;
									}



									if($StudentPhonereal != '')
									{
										$formattedStudentPhonereal = formatPhoneNumber($StudentPhonereal);

										$committeeMessagestudent = rawurlencode("Hi $StudentFirstName,\n\n" .
										"I am writing to inform you that you have been added as a member of the committee.\n" .
										"Committee Details:\n" .
										" - Title: $Committeename\n" .
										"- school name : $InstitutionGeneralName".
								
										"Thank you!");

									//   $messageemail = <<<EOT
									//   * Hi $ParentFirstName *
									//   I am writing to inform you that your child.$StudentFirstName $StudentLastName
									//   has successfully completed the recent assignment given in :
									//  class: $ekene_subject
									//  subject: $ekene_subjectname
									//   Thank you!
									//   EOT;
									//   $assignmenttitle = "Assignment Notification";

										$filniialize = '';
										$institutioninition = $instutition;
// two 
										$pros_selectappi_details = mysqli_query($link,"SELECT * FROM whatsappapikey WHERE InstitutionID='$instutition' AND Purpose='adminstration'");
										$pros_selectappi_detailscnt = mysqli_num_rows($pros_selectappi_details);
										$pros_selectappi_detailscnt_rows = mysqli_fetch_assoc($pros_selectappi_details);


										if($pros_selectappi_detailscnt > 0)
										{
											
										$apikey =  $pros_selectappi_detailscnt_rows['ApiKey'];
											
										}else
										{
											
											$pros_selectappi_details_default = mysqli_query($link,"SELECT * FROM whatsappapikey WHERE InstitutionID='0' AND Purpose='Default'");
										$pros_selectappi_detailscnt_default = mysqli_num_rows($pros_selectappi_details_default);
										$pros_selectappi_detailscnt_rows_default = mysqli_fetch_assoc($pros_selectappi_details_default);
										
										$apikey  = $pros_selectappi_detailscnt_rows_default['ApiKey'];
											
										}
									

										$studentmessagearr[] = $committeeMessagestudent;
										$studentnumarr[] = $formattedStudentPhonereal;
										$studentfilearr[] = $filniialize;
										$studentinstit[] =  $institutioninition;
										$apikeynecont[] =  $apikey;
										// $fullInstitutionEmail[] = $InstitutionEmailnew;
										// $fullparentemail[] = $ParentEmail;
										// $fullemailmeeasge[] = $messageemail;
										// $assignmenttitlearray[] = $assignmenttitle;
										
									}
									else
									{

									}
								}

								$successnew = 4;
								$msgstudent = implode(",", $studentmessagearr);
								$numberstudent = implode(",",  $studentnumarr);
								$filestudent = implode(",",  $studentfilearr);
								$instutitionstudent = implode(",", $studentinstit);
								$apikey = implode(",", $apikeynecont);

					}
					else
					{

						$insert_member = "INSERT INTO `member`( `UserID`, `Usertype`, `InstitutionorCampusID`, `CommitteeID`, `PositionID`, `DateIn`) 
						VALUES ('$ekeneuseridnew','$usertype','$instutition','$ekenecommitee','22','$date')";

										
								if ($usertype == "parent")
								{

									$slect_all_parent  = "SELECT * FROM `parent` WHERE `InstitutionID` = '$instutition'  AND  `ParentID` = '$ekeneuseridnew' ORDER BY `ParentLastName` ASC";
									$ekene_query_link_parent = mysqli_query($link, $slect_all_parent);
									$ekene_get_details_parent = mysqli_fetch_assoc($ekene_query_link_parent);
									 $ekene_row_cnt_ekeneparent = mysqli_num_rows($ekene_query_link_parent);



									if($ekene_row_cnt_ekeneparent > 0)
									{
									

											$ParentFirstName = $ekene_get_details_parent['ParentFirstName'];
											$ParentMiddleName = $ekene_get_details_parent['ParentMiddleName'];
											$ParentLastName = $ekene_get_details_parent['ParentLastName'];
											$ParentWhatsappNumber =  $ekene_get_details_parent['ParentWhatsappNumber'];
											$ParentMainPhoneNumber =  $ekene_get_details_parent['ParentMainPhoneNumber'];

											
										if($ParentWhatsappNumber == '')
										{
											$parentnumber = $ParentMainPhoneNumber;
										}else{


											$parentnumber = $ParentWhatsappNumber;
										}

										if($parentnumber != '')
										{
											$formattedParentNumber = formatPhoneNumber($parentnumber);

											$parentMessage = rawurlencode("Hi $ParentFirstName,\n\n" .
											"I am writing to inform you that you have been added as a member of the committee.\n" .
											"Committee Details:\n" .
											" - Title: $Committeename\n" .
											" - School name: $InstitutionGeneralName\n" .
											
											
											"Thank you!");

										//   $messageemail = <<<EOT
										//   * Hi $ParentFirstName *
										//   I am writing to inform you that your child.$StudentFirstName $StudentLastName
										//   has successfully completed the recent assignment given in :
										//  class: $ekene_subject
										//  subject: $ekene_subjectname
										//   Thank you!
										//   EOT;
										//   $assignmenttitle = "Assignment Notification";

											$filniialize = '';
											$institutioninition = $instutition;

											$pros_selectappi_details = mysqli_query($link,"SELECT * FROM whatsappapikey WHERE InstitutionID='$instutition' AND Purpose='adminstration'");
											$pros_selectappi_detailscnt = mysqli_num_rows($pros_selectappi_details);
											$pros_selectappi_detailscnt_rows = mysqli_fetch_assoc($pros_selectappi_details);


											if($pros_selectappi_detailscnt > 0)
											{
												
											$apikey =  $pros_selectappi_detailscnt_rows['ApiKey'];
												
											}else
											{
												
												$pros_selectappi_details_default = mysqli_query($link,"SELECT * FROM whatsappapikey WHERE InstitutionID='0' AND Purpose='Default'");
											$pros_selectappi_detailscnt_default = mysqli_num_rows($pros_selectappi_details_default);
											$pros_selectappi_detailscnt_rows_default = mysqli_fetch_assoc($pros_selectappi_details_default);
											
											$apikey  = $pros_selectappi_detailscnt_rows_default['ApiKey'];
												
											}

											


											$fullparentmessagearr[] = $parentMessage;
											$fullparentnumarr[] = $formattedParentNumber;
											$fullparentfilearr[] = $filniialize;
											$fullparentinstit[] =  $institutioninition;
											$apikeynecont[] =  $apikey;
											// $fullInstitutionEmail[] = $InstitutionEmailnew;
											// $fullparentemail[] = $ParentEmail;
											// $fullemailmeeasge[] = $messageemail;
											// $assignmenttitlearray[] = $assignmenttitle;
											
										}
										else
										{

										}

									}

									
									$successnew = 4;
									$msgstudent = implode(",", $fullparentmessagearr);
									$numberstudent = implode(",",  $fullparentnumarr);
									$filestudent = implode(",",  $fullparentfilearr);
									$instutitionstudent = implode(",", $fullparentinstit);
									$apikey = implode(",", $apikeynecont);

								}
								else
								{

									$selectstaffid = mysqli_query($link,"SELECT * FROM `staff` WHERE StaffID = '$ekeneuseridnew' AND `InstitutionID` = '$instutition'");
									$ekene_send_staff_rowscnt = mysqli_num_rows($selectstaffid);
									$ekene_send_staffdetailcnt_rows = mysqli_fetch_assoc($selectstaffid);
									if($ekene_send_staff_rowscnt > 0)
									{
		
										$StaffWhatsappNumber =  $ekene_send_staffdetailcnt_rows['StaffWhatsappNumber'];
										$StaffMainNumber =  $ekene_send_staffdetailcnt_rows['StaffMainNumber'];
										$StaffFirstName=  $ekene_send_staffdetailcnt_rows['StaffFirstName'];
		
		
				
											if($StaffWhatsappNumber == '')
											{
												$staffnumber = $StaffMainNumber;
				
											}else{
				
				
												$staffnumber = $StaffWhatsappNumber;
											}
		
		
											if($staffnumber != '')
											{

													$formattedstaffnumber = formatPhoneNumber($staffnumber);
						
													$committeeMessagestaff = rawurlencode("Hi $StaffFirstName,\n\n" .
													"I am writing to inform you that you have been added as a member of the committee.\n" .
													"Committee Details:\n" .
													" - Title: $Committeename\n" .
													" - School Name: $InstitutionGeneralName\n" .
													
						
													"Thank you!");
				
										
						
													$filniialize = '';
													$institutioninition = $instutition;
						
													$pros_selectappi_details = mysqli_query($link,"SELECT * FROM whatsappapikey WHERE InstitutionID='$instutition' AND Purpose='adminstration'");
													$pros_selectappi_detailscnt = mysqli_num_rows($pros_selectappi_details);
													$pros_selectappi_detailscnt_rows = mysqli_fetch_assoc($pros_selectappi_details);
						
						
													if($pros_selectappi_detailscnt > 0)
													{
														
														$apikey =  $pros_selectappi_detailscnt_rows['ApiKey'];
														
													}else
													{
														
														$pros_selectappi_details_default = mysqli_query($link,"SELECT * FROM whatsappapikey WHERE InstitutionID='0' AND Purpose='Default'");
														$pros_selectappi_detailscnt_default = mysqli_num_rows($pros_selectappi_details_default);
														$pros_selectappi_detailscnt_rows_default = mysqli_fetch_assoc($pros_selectappi_details_default);
														
														$apikey  = $pros_selectappi_detailscnt_rows_default['ApiKey'];
															
													}
						
													$fullstaffmessagearr[] = $committeeMessagestaff;
													$fullstaffnumarr[] = $formattedstaffnumber;
													$fullstafffilearr[] = $filniialize;
													$fullstaffinstit[] =  $institutioninition;
													$apikeystaffnecont[] =  $apikey;
											
												}

											}

									$successnew = 4;
									$msgstudent = implode(",", $fullstaffmessagearr);
									$numberstudent = implode(",",  $fullstaffnumarr);
									$filestudent = implode(",",  $fullstafffilearr);
									$instutitionstudent = implode(",", $fullstaffinstit);
									$apikey = implode(",", $apikeystaffnecont);
								}
					}


					$select_import_question = mysqli_query($link, $insert_member);
					echo mysqli_error($link);


					if($select_import_question == true)
					{
				     	$success++;
					}else{

						
					}
	}

    if($success == 0){
        echo  "2";
    }else{

        $send_whatapp[] = array(

            'WhatsappNumber' => $numberstudent,
            'message' =>$msgstudent,
            'filniialize' =>$filestudent,
            
            // 'assignmentmessage' => $assignment,
            // 'InstitutionEmail' =>$Institutionmail,
            // 'ParentEmail' =>$Parentmail,
            // 'messageemail' =>$messagemail,
  
            'institutioninition' =>$instutitionstudent,
            'successnew' =>$successnew,
            'apikey' =>$apikey,
		);
  
         $json_data = json_encode($send_whatapp, JSON_PRETTY_PRINT);
         echo $json_data;

		$activity_log_inst_camp_id = $campus;
		$activity_log_userid = $_POST['userid'];
		$activity_log_usertype = $_POST['usertype'];
		$activity_log_description = 'Deleted Member';
		$activity_log_longitude = $_POST['longitude'];
		$activity_log_latitude = $_POST['latitude'];

		insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
  }
  ?>