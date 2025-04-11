<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');

$usertype = $_POST["usertypes"];
$instutition = $_POST['instutition'];
$campus = $_POST["campus"];
$titlename = $_POST["titlename"];
$description = $_POST["description"];
$committee = $_POST["committee"];

if (isset($_POST["ekeneuserid"])) {
    // It's set, use its value
    $ekeneuserid = $_POST["ekeneuserid"];
}else{
    // It's not set, set $ekeneuserid to zero
    $ekeneuserid = 0;
}


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

      
  $fullallmessagearr= array();
  $fullallnumarr = array();
  $fullallfilearr = array();
  $fullallinstit = array();
  $apikeyallnecont = array();
  
  $select_institution =  "SELECT * FROM `institution` WHERE  InstitutionID = '$instutition'";
  $ekene_selectinsttution = mysqli_query($link, $select_institution);
  $ekene_get_institution_details = mysqli_fetch_assoc($ekene_selectinsttution);
  $ekene_row_institution = mysqli_num_rows($ekene_selectinsttution);
  
    if ($ekene_row_institution > 0){
        $InstitutionGeneralName =  $ekene_get_institution_details['InstitutionGeneralName'];
        $InstitutionEmail =  $ekene_get_institution_details['InstitutionEmail'];

        if ($InstitutionEmail == ''){
            $InstitutionEmailnew = "Hello.edumess.com";
        }else{
            $InstitutionEmailnew = $InstitutionEmail;
        }
    }

date_default_timezone_set("Africa/Lagos");
$dateAndTime = date("Y/m/d H:i:s");

if (empty($ekeneuserid)) {
    // If it's empty, set $ekeneuserid to [0]
    $ekeneuserid = [0];
}

// Now you can implode the array
$ekeneuseridexplode = implode(',', $ekeneuserid);
$ekeneuseridexplode;

$titlenamequestion = mysqli_real_escape_string($link, $titlename);
$descriptionnew = mysqli_real_escape_string($link, $description);

$select_all_committee = " SELECT * FROM `boardmember` WHERE `CampusID` IN (0, $campus) AND DeleteStatus = 0";
$ekene_query_link_class = mysqli_query($link, $select_all_committee);
$ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
$ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);

if ($ekene_row_cnt_ekene > 0){

    $Committeename = $ekene_get_details_subject['Committeename'];

    $Datecreated = $ekene_get_details_subject['Datecreated'];

    $CommitteeID = $ekene_get_details_subject['CommitteeID'];
}

$success = 0;

    if ($usertype == 'student'){

        $insert_task = "INSERT INTO `task`( `Usertype`, `CommitteeID`, `InstitutionorCampusID`, `UserID`, `Title`, `Description`, `Datecreated`) 
        VALUES ('$usertype', '$committee','$campus','$ekeneuseridexplode','$titlenamequestion','$descriptionnew', '$dateAndTime')";
        
        $select_import_question = mysqli_query($link, $insert_task);
        if($select_import_question == true){
            $success++;
        }else{

        }

    }else{

        $insert_task = "INSERT INTO `task`( `Usertype`, `CommitteeID`, `InstitutionorCampusID`, `UserID`, `Title`, `Description`, `Datecreated`) 
        VALUES ('$usertype', '$committee','$instutition','$ekeneuseridexplode','$titlenamequestion','$descriptionnew', '$dateAndTime')";

        $select_import_question = mysqli_query($link, $insert_task);
        if($select_import_question == true){
            $success++;
        }else{

        }
    }

    if ($success == 0){
        echo "3";
    }else{
        $send_whatapp = array();
        $select_from_memeber = "SELECT * FROM `member` WHERE `CommitteeID` = '$committee' AND `Deletestatus` = 0";
        $ekene_query_link_class = mysqli_query($link, $select_from_memeber);
        $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
        $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);
         if ($ekene_row_cnt_ekene  > 0)
         {
            do{
            
                $UserID = $ekene_get_details_subject['UserID'];

                $Usertype = $ekene_get_details_subject['Usertype'];
                $CommitteeID = $ekene_get_details_subject['CommitteeID'];
                      

                if ($usertype == "student")
                {
                    

                            $slect_all_student  = "SELECT * FROM `student` WHERE  CampusID = '$campus' AND `StudentID` = '$UserID'";
                            $ekene_query_link_student = mysqli_query($link, $slect_all_student);
                            $ekene_get_details_student = mysqli_fetch_assoc($ekene_query_link_student);
                            $ekene_row_cnt_ekenestudent = mysqli_num_rows($ekene_query_link_student);



                            if($ekene_row_cnt_ekenestudent > 0)
                            {


                                do{

                                    $StudentFirstName = $ekene_get_details_student['StudentFirstName'];
                                    $StudentMiddleName = $ekene_get_details_student['StudentMiddleName'];
                                    $StudentLastName = $ekene_get_details_student['StudentLastName'];
                                    $StudentPhone = $ekene_get_details_student['StudentPhone'];
                                    $ParentID = $ekene_get_details_student['ParentID'];

                                    $slect_all_parent1  = "SELECT * FROM `parent` WHERE `ParentID` = '$ParentID'";
                                    $ekene_query_link_parent1 = mysqli_query($link, $slect_all_parent1);
                                    $ekene_get_details_parent1 = mysqli_fetch_assoc($ekene_query_link_parent1);
                                    $ekene_row_cnt_ekeneparent1 = mysqli_num_rows($ekene_query_link_parent1);
                                    if ($ekene_row_cnt_ekeneparent1 > 0)
                                    {
                                        do{
                                            $ParentWhatsappNumber =  $ekene_get_details_parent1['ParentWhatsappNumber'];
                                            $ParentMainPhoneNumber =  $ekene_get_details_parent1['ParentMainPhoneNumber'];

                                         }while($ekene_get_details_parent1 = mysqli_fetch_assoc($ekene_query_link_parent1));
                                    }

                                    if($StudentPhone == '')
                                    {
                                        $StudentPhonereal = $StudentPhone;
                                    }else{


                                        $StudentPhonereal = $ParentWhatsappNumber;
                                    }


                                    if($StudentPhonereal != '')
                                    {
                                      $formattedStudentPhonereal = formatPhoneNumber($StudentPhonereal);
                                      $committeeMessagestudent = rawurlencode(
                                        "Hi $StudentFirstName,\n\n" .
                                        "I am writing to inform you that a task has been assigned to your committee.\n" .
                                        "Please ensure that you guy follow up on it please.\n" .
                                        "Committee Details:\n" .
                                        " - Title: $Committeename\n" .
                                        " - School Name: $InstitutionGeneralName\n" .
                                        "Thank you!"
                                    );
                                    

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
                                    

                                      $fullallmessagearr[] = $committeeMessagestudent;
                                      $fullallnumarr[] = $formattedStudentPhonereal;
                                      $fullallfilearr[] = $filniialize;
                                      $fullallinstit[] =  $institutioninition;
                                      $apikeyallnecont[] =  $apikey;
                                      // $fullInstitutionEmail[] = $InstitutionEmailnew;
                                      // $fullparentemail[] = $ParentEmail;
                                      // $fullemailmeeasge[] = $messageemail;
                                      // $assignmenttitlearray[] = $assignmenttitle;
                                  
                                      
                                    }
                                    else
                                    {

                                    }


                                }while($ekene_get_details_student = mysqli_fetch_assoc($ekene_query_link_student));
                            }

                            // $successnew = 4;
                            // $msgstudent = implode(",", $studentmessagearr);
                            // $numberstudent = implode(",",  $studentnumarr);
                            // $filestudent = implode(",",  $studentfilearr);
                            // $instutitionstudent = implode(",", $studentinstit);
                            // $apikey = implode(",", $apikeynecont);

                }
                else if ($usertype == "parent")
                {

                  
                    $slect_all_parent  = "SELECT * FROM `parent` WHERE `InstitutionID` = '$instutition'  AND  `ParentID` = '$UserID' ORDER BY `ParentLastName` ASC";
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

                                $parentMessage = rawurlencode(
                                    "Hi $ParentFirstName,\n\n" .
                                    "I am writing to inform you that a task has been assigned to your committee.\n" .
                                    "Please ensure that you guy follow up on it please.\n" .
                                    "Committee Details:\n" .
                                    " - Title: $Committeename\n" .
                                    " - School Name: $InstitutionGeneralName\n" .
                                    "Thank you!"
                                );
                                

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

                                


                                $fullallmessagearr[] = $parentMessage;
                                $fullallnumarr[] = $formattedParentNumber;
                                $fullallfilearr[] = $filniialize;
                                $fullallinstit[] =  $institutioninition;
                                $apikeyallnecont[] =  $apikey;
                                // $fullInstitutionEmail[] = $InstitutionEmailnew;
                                // $fullparentemail[] = $ParentEmail;
                                // $fullemailmeeasge[] = $messageemail;
                                // $assignmenttitlearray[] = $assignmenttitle;
                              
                                
                            }
                            else
                            {

                            }

                        

                        
                        // $successnew = 4;
                        // $msgstudent = implode(",", $fullparentmessagearr);
                        // $numberstudent = implode(",",  $fullparentnumarr);
                        // $filestudent = implode(",",  $fullparentfilearr);
                        // $instutitionstudent = implode(",", $fullparentinstit);
                        // $apikey = implode(",", $apikeynecont);

                    }
                }
                else
                {
                    $select_staff = "SELECT * FROM `staff` WHERE StaffID = '$UserID' AND `InstitutionID` = '$instutition'";
                    $selectstaff_query = mysqli_query($link, $select_staff);
                    $select_staff_fetch = mysqli_fetch_assoc($selectstaff_query);
                    $select_staff_rows = mysqli_num_rows($selectstaff_query);
                    
                    if($select_staff_rows > 0){
                            
                    $StaffWhatsappNumber =  $select_staff_fetch['StaffWhatsappNumber'];
                    $StaffMainNumber =  $select_staff_fetch['StaffMainNumber'];
                    $StaffFirstName=  $select_staff_fetch['StaffFirstName'];

                    if($StaffWhatsappNumber == '')
                    {
                        $staffnumber = $StaffMainNumber;
                    }else{
                        $staffnumber = $StaffWhatsappNumber;
                    }

                    if($staffnumber != '')
                    {
                        $formattedstaffnumber = formatPhoneNumber($staffnumber);

                        $committeeMessagestaff = rawurlencode(
                        "Hi $StaffFirstName,\n\n" .
                        "I am writing to inform you that a task has been assigned to your committee.\n" .
                        "Please ensure that you guy follow up on it please.\n" .
                        "Committee Details:\n" .
                        " - Title: $Committeename\n" .
                        " - School Name: $InstitutionGeneralName\n" .
                        "Thank you!"
                    );

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

                        $fullallmessagearr[] = $committeeMessagestaff;
                        $fullallnumarr[] = $formattedstaffnumber;
                        $fullallfilearr[] = $filniialize;
                        $fullallinstit[] =  $institutioninition;
                        $apikeyallnecont[] =  $apikey;
                        // $fullInstitutionEmail[] = $InstitutionEmailnew;
                        // $fullparentemail[] = $ParentEmail;
                        // $fullemailmeeasge[] = $messageemail;
                        // $assignmenttitlearray[] = $assignmenttitle;
                        
                    }
                    // $successnew = 4;
                    // $msgstudent = implode(",", $fullstaffmessagearr);
                    // $numberstudent = implode(",",  $fullstaffnumarr);
                    // $filestudent = implode(",",  $fullstafffilearr);
                    // $instutitionstudent = implode(",", $fullstaffinstit);
                    // $apikey = implode(",", $apikeystaffnecont);
                    }
                }
            }while($ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class));

            
            $successnew = 10;
            $msg = implode(",", $fullallmessagearr);
            $number = implode(",",  $fullallnumarr);
            $file = implode(",",  $fullallfilearr);
            $abba_institution_id = implode(",", $fullallinstit);
            $apikey = implode(",", $apikeyallnecont);

            // $Institutionmail = implode(",",  $fullInstitutionEmail);
            // $Parentmail = implode(",", $fullparentemail);
            // $messagemail = implode(",", $fullemailmeeasge);
            // $assignment = implode(",", $assignmenttitlearray);
            
            $send_whatapp[] = array(

              'WhatsappNumber' => $number,
              // 'ParentEmail' => $ekene_send_meeagedetailcnt_rows['ParentEmail'],
              'message' =>$msg,
              'filniialize' =>$file,
              // 'assignmentmessage' => $assignment,
              // 'InstitutionEmail' =>$Institutionmail,
              // 'ParentEmail' =>$Parentmail,
              // 'messageemail' =>$messagemail,

              'institution' =>$abba_institution_id,
              'successnew' =>$successnew,
              'apikey' =>$apikey
        );
            $json_data = json_encode($send_whatapp, JSON_PRETTY_PRINT);
            echo $json_data;

            $activity_log_inst_camp_id = $campus;
            $activity_log_userid = $_POST['userid'];
            $activity_log_usertype = $_POST['usertype'];
            $activity_log_description = 'Create Task';
            $activity_log_longitude = $_POST['longitude'];
            $activity_log_latitude = $_POST['latitude'];
    
            insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);

        }
    }
?>