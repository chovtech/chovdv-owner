<?php


        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include('../../../config/config.php');

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


      $fullmessagearr = array();
      $fullnumarr= array();
      $fullfilearr= array();
      $fullinstit= array();
      $apikeynecont = array();

      $fullInstitutionEmail= array();
      $fullparentemail = array();
      $fullemailmeeasge = array();
      $assignmenttitlearray = array();
      

    $ekene_import_campus = $_POST['ekene_import_campus'];
    $abba_institution_id = $_POST['instutition'];
    $userID = $_POST['userID'];
    $diplay_class = $_POST['diplay_class'];
    $usertype = $_POST['usertype'];
    $ekene_import_subject = $_POST['ekene_import_subject'];

    $prosloadcbtorexamsettingstype = $_POST['prosloadcbtorexamsettingstype'];


    
    // Assuming $link is your database connection

    $ekene_select_class = "SELECT * FROM `classordepartment` WHERE `CampusID`= '$ekene_import_campus' AND `ClassOrDepartmentID` = '$diplay_class'";

    $ekene_query_link_class = mysqli_query($link, $ekene_select_class);
    $ekene_get_details_class = mysqli_fetch_assoc($ekene_query_link_class);
    $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);


    if($ekene_row_cnt_ekene > 0)
    {

      $ekene_subject = $ekene_get_details_class['ClassOrDepartmentName'];
      $SectionID = $ekene_get_details_class['SectionID'];

    }


    $ekene_select_subject = "SELECT * FROM `subjectorcourse` WHERE `SubjectOrCourseID` = '$ekene_import_subject'";

    $ekene_query_link_subject = mysqli_query($link, $ekene_select_subject);
    $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_subject);
    $ekene_row_cnt_ekenesubject = mysqli_num_rows($ekene_query_link_subject);


    if($ekene_row_cnt_ekenesubject > 0)
    {

      $ekene_subjectname  = $ekene_get_details_subject['SubjectOrCourseTitle'];

    }



    $ekene_import_title = isset($_POST['ekene_import_title']) ? mysqli_real_escape_string($link, $_POST['ekene_import_title']) : '';

    // Now you can use $ekene_import_title in your database query safely

    $ctbornot = $_POST['ctbornot'];
    $hidden_date = $_POST['hidden_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $submission = $_POST['submission'];
    $startdate = $_POST['startdate'];
    $ekene_overall_score = $_POST['ekene_overall_score'];


    $timeIN = $_POST['timeIN'];
    $timeOUT = $_POST['timeOUT'];


    

    

    $assignmenttype = explode(',', $_POST[ 'assignmenttype' ]);

    // Assuming $link is your database connection

    $ekeneinstrution = isset($_POST['ekeneinstrution']) ? mysqli_real_escape_string($link, $_POST['ekeneinstrution']) : '';

    // Now you can use $ekeneinstrution in your database query safely

    $textareaquestiontheory = trim($_POST['textareaquestiontheory']);
    $textareaquestion =trim($_POST['textareaquestion']);
    $optionA =trim($_POST['optionA']);
    $optionB = trim($_POST['optionB']);
    $optionC = trim($_POST['optionC']);
    $optionD = trim($_POST['optionD']);

    $Answer = $_POST['Answer'];


    date_default_timezone_set("Africa/Lagos");
    $dateAndTime = date("Y/m/d H:i:s");
    $desripction = "set assignment";

    // Explode each variable and count the maximum length
    $questionnewexplode = explode('###||', $textareaquestion);
    $textareaquestiontheoryexplode = explode('###||', $textareaquestiontheory);
    $optionAexplode = explode('###||', $optionA);
    $optionBexplode = explode('###||', $optionB );
    $optionCexplode = explode('###||', $optionC);
    $optionDexplode = explode('###||', $optionD);
    $Answerexplode = explode(',', $Answer);

    $maxArrayLength = max(
      count($questionnewexplode),
      count($textareaquestiontheoryexplode),
      count($optionAexplode),
      count($optionBexplode),
      count($optionCexplode),
      count($optionDexplode),
      count($Answerexplode)
    );

    // Add empty values to each array to make them equal in length
    $lengthDifference = $maxArrayLength - count($questionnewexplode);
    for ($i = 0; $i < $lengthDifference; $i++) {
      $questionnewexplode[] = '';
    }

    $lengthDifference = $maxArrayLength - count($textareaquestiontheoryexplode);
    for ($i = 0; $i < $lengthDifference; $i++) {
      $textareaquestiontheoryexplode[] = '';
    }

    $lengthDifference = $maxArrayLength - count($optionAexplode);
    for ($i = 0; $i < $lengthDifference; $i++) {
      $optionAexplode[] = '';
    }

    $lengthDifference = $maxArrayLength - count($optionBexplode);
    for ($i = 0; $i < $lengthDifference; $i++) {
      $optionBexplode[] = '';
    }

    $lengthDifference = $maxArrayLength - count($optionCexplode);
    for ($i = 0; $i < $lengthDifference; $i++) {
      $optionCexplode[] = '';
    }

    $lengthDifference = $maxArrayLength - count($optionDexplode);
    for ($i = 0; $i < $lengthDifference; $i++) {
      $optionDexplode[] = '';
    }

    $lengthDifference = $maxArrayLength - count($Answerexplode);
    for ($i = 0; $i < $lengthDifference; $i++) {
      $Answerexplode[] = '';
    }




      $session = "SELECT * FROM `session` WHERE `sessionStatus` = 1";

      $ekeneselect = mysqli_query($link, $session);
      $ekene_get_select_details = mysqli_fetch_assoc($ekeneselect);
      $ekene_row_select = mysqli_num_rows($ekeneselect);

      $ekene_session_name = $ekene_get_select_details['sessionName'];


      $term = "SELECT * FROM `termorsemester` WHERE `status` = 1";
      $ekeneterm = mysqli_query($link, $term);
      $ekene_get_term_details = mysqli_fetch_assoc($ekeneterm);
      $ekene_row_term = mysqli_num_rows($ekeneterm);
          
      $ekene_term = $ekene_get_term_details['TermOrSemesterID'];
     $select_institution =  "SELECT * FROM `institution` WHERE  InstitutionID = '$abba_institution_id'";
      $ekene_selectinsttution = mysqli_query($link, $select_institution);
      $ekene_get_institution_details = mysqli_fetch_assoc($ekene_selectinsttution);
      $ekene_row_institution = mysqli_num_rows($ekene_selectinsttution);

      if ($ekene_row_institution > 0)
    {
      $InstitutionGeneralName =  $ekene_get_institution_details['InstitutionGeneralName'];
      $InstitutionEmail =  $ekene_get_institution_details['InstitutionEmail'];
      if ($InstitutionEmail == '')
      {
        $InstitutionEmailnew = "Hello.edumess.com";
      }
      else
      {
        $InstitutionEmailnew = $InstitutionEmail;
      }
      
    }

  $ekene_select_fromassignmentsetting = "SELECT *
  FROM `assignmentsettings`
  WHERE `CampusID`= '$ekene_import_campus' AND `UserType`= '$usertype' AND `AssignmentTitle` = '$ekene_import_title' AND `AssignmentCategory`='$prosloadcbtorexamsettingstype'";


  $ekene_setassign = mysqli_query($link, $ekene_select_fromassignmentsetting);
  $ekene_get_import_details = mysqli_fetch_assoc($ekene_setassign);
  $ekene_row_setassignmentt = mysqli_num_rows($ekene_setassign);
  $success = 0;


if ($ekene_row_setassignmentt > 0)
 {
    echo '1';
} else {

 
   
    $ekene_insert_assignmentsetting = "INSERT INTO `assignmentsettings` (
          `CourseOrSubjectTeacherUserID`,
          `UserType`,
          `CampusID`,
          `SectionID`,
          `sessionID`,
          `TermOrSemesterID`,
          `SubjectOrCourseID`,
          `ClassOrDepartmentID`,
          `AssignmentTitle`,
          `AssignmentDate`,
          `AssignmentStartTime`,
          `AssignmentEndTime`,
          `Startdate`,
          `submissiondate`,
          `Instruction`,
          `Overallscore`,
          `AssignmentType`,
          `AssignmentCategory`, 
          `deletestatus`,
          `DateCreated`
      ) VALUES (
          '$userID',
          '$usertype',
          '$ekene_import_campus',
          '$SectionID', 
          '$ekene_session_name',
          '$ekene_term',
          '$ekene_import_subject',
          '$diplay_class',
          '$ekene_import_title',
          '$hidden_date',
          '$timeIN',
          '$timeOUT',
          '$startdate',
          '$submission',
          '$ekeneinstrution', 
          '$ekene_overall_score', 
          '$ctbornot',  
          '$prosloadcbtorexamsettingstype',
          '0', 
          '$dateAndTime'
  )";




      $ekene_mysqli_query_assignmentsetting = mysqli_query( $link, $ekene_insert_assignmentsetting);

 

    if ($ekene_mysqli_query_assignmentsetting == true) {
             
       $lastInsertedID = mysqli_insert_id($link);




       if($textareaquestiontheory == '')
       {

       }else
       {

        for ($x = 0; $x < count($textareaquestiontheoryexplode); $x++ ) {
      

       
          $theoryquestion = mysqli_real_escape_string($link, $textareaquestiontheoryexplode[$x]);
                  if(!empty($theoryquestion))
                  {

                    $insert_import_question = "INSERT INTO `assignmentquestion`( `AssignmentSettingsID`, `CampusID`, `CourseOrSubjectTeacherUserID`, `UserType`, `sessionID`, `TermOrSemesterID`,
                    `ClassOrDepartmentID`, `SubjectOrCourseID`,`question`, `AssignmentCategory`,`date/time`) VALUES ('$lastInsertedID','$ekene_import_campus','$userID',
                    '$usertype','$ekene_session_name',
                    '$ekene_term','$diplay_class','$ekene_import_subject','$theoryquestion','Theory','$dateAndTime')";
                
                    $select_import_question = mysqli_query($link, $insert_import_question);
                    $success++;
                  echo  mysqli_error($link);
                
                  }
        
            }

       }
      

        if($textareaquestion == '')
        {

        }else{


        for ( $i = 0; $i < count($questionnewexplode); $i++ ) {
    

            $objectivequestion = mysqli_real_escape_string($link, $questionnewexplode[$i]);
          
            //  $validatequestion = trim(strip_tags(html_entity_decode($objectivequestion)));
            // Assuming $link is your database connection

              $optionA = mysqli_real_escape_string($link, $optionAexplode[$i]);
              $optionB = mysqli_real_escape_string($link, $optionBexplode[$i]);
              $optionC = mysqli_real_escape_string($link, $optionCexplode[$i]);
              $optionD = mysqli_real_escape_string($link, $optionDexplode[$i]);
              $Answer = mysqli_real_escape_string($link, $Answerexplode[$i]);


                    if(!empty($objectivequestion))
                    {
          
                            $insert_import_question = "INSERT INTO  `assignmentquestion`( `AssignmentSettingsID`, `CampusID`, `CourseOrSubjectTeacherUserID`, `UserType`, `sessionID`, `TermOrSemesterID`,
                            `ClassOrDepartmentID`, `SubjectOrCourseID`,`question`, `optionA`, `optionB`, `optionC`, `optionD`, `AssignmentCategory`, `answer`, `deletestatus`, `date/time`) VALUES ('$lastInsertedID','$ekene_import_campus','$userID',
                            '$usertype','$ekene_session_name',
                          '$ekene_term','$diplay_class','$ekene_import_subject','$objectivequestion','$optionA','$optionB','$optionC','$optionD','Objective','$Answer', '0','$dateAndTime'
                            )";
                        
                            $select_import_question = mysqli_query($link, $insert_import_question);
                            $success++;


                      }
    
                }

               

        }

      
       

          $insert_into_activitylog = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`)
          VALUES ('$ekene_import_campus','$userID','$usertype','0','0','0','0','$desripction','$dateAndTime')";
          
          $select_import_question = mysqli_query($link, $insert_into_activitylog);

    } else {
        echo '7';
    }

    if($success == 0)
    {
        echo "9";
    }
    else
    {

        // echo "10";
          $send_whatapp = array();

        
          $ekene_send_meeage = mysqli_query($link, "SELECT DISTINCT `parent`.ParentID, `parent`.ParentWhatsappNumber, `parent`.ParentMainPhoneNumber,`parent`.ParentFirstName,`parent`.ParentLastName,`parent`.ParentEmail FROM classordepartmentstudentallocation
         INNER JOIN student ON `classordepartmentstudentallocation`.StudentID = `student`.StudentID
          INNER JOIN parent ON `student`.ParentID = `parent`.ParentID
          WHERE `classordepartmentstudentallocation`.ClassOrDepartmentID = '$diplay_class' AND `classordepartmentstudentallocation`.`Session` = '$ekene_session_name'");


          $ekene_send_meeage_rowscnt = mysqli_num_rows($ekene_send_meeage);
          $ekene_send_meeagedetailcnt_rows = mysqli_fetch_assoc($ekene_send_meeage);

          if($ekene_send_meeage_rowscnt > 0)
          {


            do{



              $ParentWhatsappNumber =  $ekene_send_meeagedetailcnt_rows['ParentWhatsappNumber'];
              $ParentMainPhoneNumber =  $ekene_send_meeagedetailcnt_rows['ParentMainPhoneNumber'];
              $ParentFirstName=  $ekene_send_meeagedetailcnt_rows['ParentFirstName'];
              $ParentLastName=  $ekene_send_meeagedetailcnt_rows['ParentLastName'];
              $ParentEmail=  $ekene_send_meeagedetailcnt_rows['ParentEmail']; 

                if($ParentWhatsappNumber == '')
                {
                    $parentnumber = $ParentMainPhoneNumber;
                }else{


                    $parentnumber = $ParentWhatsappNumber;
                }
                
                if($parentnumber != '')
                {
                  $formattedParentNumber = formatPhoneNumber($parentnumber);

                  $message = rawurlencode("* Hi ".$ParentFirstName."* \n\n" .
                  " An assignment has been set for your child at ".$InstitutionGeneralName.".\n\n" .
                  "Please check and ensure they complete it on time.\n" .
                  "Class: $ekene_subject\n" .

                  "Subject: $ekene_subjectname\n\n" .
                  
                  "Startdate: $startdate\n\n" .

                  "Deadline: $submission\n\n" .
                  "Thank you! ");


                  $filniialize = '';
                  $institutioninition = $abba_institution_id;

                  $pros_selectappi_details = mysqli_query($link,"SELECT * FROM whatsappapikey WHERE InstitutionID='$abba_institution_id' AND Purpose='adminstration'");
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

                  $fullmessagearr[] = $message;
                  $fullnumarr[] = $formattedParentNumber;
                  $fullfilearr[] = $filniialize;
                  $fullinstit[] =  $institutioninition;
                  $apikeynecont[] =  $apikey;
                  // $fullInstitutionEmail[] = $InstitutionEmailnew;
                  // $fullparentemail[] = $ParentEmail;
                  // $fullemailmeeasge[] = $messageemail;
                  // $assignmenttitlearray[] = $assignmenttitle;
                  
                }
                else
                {

                }

              

            }while($ekene_send_meeagedetailcnt_rows = mysqli_fetch_assoc($ekene_send_meeage));


             $successnew = 10;
             
            $msg = implode(",", $fullmessagearr);
            $number = implode(",",  $fullnumarr);
            $file = implode(",",  $fullfilearr);
            $abba_institution_id = implode(",", $fullinstit);
            $apikey = implode(",", $apikeynecont);


            // $Institutionmail = implode(",",  $fullInstitutionEmail);
            // $Parentmail = implode(",", $fullparentemail);
            // $messagemail = implode(",", $fullemailmeeasge);
            // $assignment = implode(",", $assignmenttitlearray);
            
            $send_whatapp[] = array(

              'ParentWhatsappNumber' => $number,
              // 'ParentEmail' => $ekene_send_meeagedetailcnt_rows['ParentEmail'],
              'message' =>$msg,
              'filniialize' =>$file,
              
              'institutioninition' =>$abba_institution_id,
              'successnew' =>$successnew,
              'apikey' =>$apikey
              
      
           );
           $json_data = json_encode($send_whatapp, JSON_PRETTY_PRINT);
           echo $json_data;

            
            // include('../messaging/whatsapp/send_whatapp_msg.php');
            // send_whatsapp_msg($abba_institution_id,$number,$apikey, $msg, $file);
          }
           
    }
  }

?>