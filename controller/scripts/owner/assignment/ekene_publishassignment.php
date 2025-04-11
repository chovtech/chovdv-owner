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

 $studentIDnew = $_POST["studentIDnew"];

 $ekenecampus = $_POST["ekenecampus"];
 $abba_institution_id = $_POST['instutition'];
 $assignmentid = $_POST["assignmentid"];
 $display_class = $_POST["display_class"];
 
 $ekene_import_subject = $_POST['ekene_import_subject'];
 $publishdata = explode(',',$_POST["publishdata"]);

$studentIDnew = explode(',', $studentIDnew);
// $ObjectAnswer = explode(',', $ObjectAnswer);

$ekene_select_class = "SELECT * FROM `classordepartment` WHERE `CampusID`= '$ekenecampus' AND `ClassOrDepartmentID` = '$display_class'";

$ekene_query_link_class = mysqli_query($link, $ekene_select_class);
$ekene_get_details_class = mysqli_fetch_assoc($ekene_query_link_class);
$ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);


if($ekene_row_cnt_ekene > 0)
{

  $ekene_subject = $ekene_get_details_class['ClassOrDepartmentName'];

}

$ekene_select_subject = "SELECT * FROM `subjectorcourse` WHERE `SubjectOrCourseID` = '$ekene_import_subject'";

$ekene_query_link_subject = mysqli_query($link, $ekene_select_subject);
$ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_subject);
$ekene_row_cnt_ekenesubject = mysqli_num_rows($ekene_query_link_subject);


if($ekene_row_cnt_ekenesubject > 0)
{

  $ekene_subjectname  = $ekene_get_details_subject['SubjectOrCourseTitle'];

}

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

   $publishstatus = 0;
   $unpublishstatus = 0;

    foreach($studentIDnew as $key => $student)
    {
    //     $status = $publishdata[$key];

     
    //    if ($status == 1)
    //     {


    //         $resetassignment = mysqli_query($link, "UPDATE `assignmentanswer` SET`publishstatus`= 0 WHERE `CampusID`= '$ekenecampus' AND `AssignmentSettingsID` = '$assignmentid' AND `StudentID` = '$student'");


    //         $publishstatus+=+1;

    //     }else
    //     {
            $resetassignment = mysqli_query($link, "UPDATE `assignmentanswer` SET`publishstatus`= 1 WHERE `CampusID`= '$ekenecampus' AND `AssignmentSettingsID` = '$assignmentid' AND `StudentID` = '$student'");

            $unpublishstatus+=+1;
        }
       
    
    // }
    
    // if($publishstatus > $unpublishstatus)
    // {
    //     echo '1';
    
     if($unpublishstatus == 0)
    {
         echo 'failed';

       
    }else{
        $send_whatapp = array();
        $ekene_send_meeage = mysqli_query($link, "SELECT 
         DISTINCT parent.ParentID, parent.ParentWhatsappNumber,parent.ParentMainPhoneNumber,parent.ParentFirstName,parent.ParentLastName,parent.ParentEmail FROM classordepartmentstudentallocation
        INNER JOIN student ON classordepartmentstudentallocation.StudentID = student.StudentID
        INNER JOIN parent ON student.ParentID = parent.ParentID
        WHERE classordepartmentstudentallocation.ClassOrDepartmentID = '$display_class' AND classordepartmentstudentallocation.Session = '$ekene_session_name'");
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
                    " Your childs assignment have been Publish at ".$InstitutionGeneralName.".\n\n" .
                    "You can login and see your childs Score.\n" .
                    "Class: $ekene_subject\n" .
                    "Subject: $ekene_subjectname\n\n" .
                    "Thank you! ");
  
                    // $messageemail = <<<EOT
                    // * Hi $ParentFirstName *
                    // Your childs assignment have been Publish at $InstitutionGeneralName.
                   
                    // Class: $ekene_subject
                    // Subject: $ekene_subjectname
                    
                    // Thank you!
                    // EOT;
                    // $assignmenttitle = "Assignment Notification";
  
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
  
  
               $successnew = 8;
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
                // 'assignmentmessage' => $assignment,
                // 'InstitutionEmail' =>$Institutionmail,
                // 'ParentEmail' =>$Parentmail,
                // 'messageemail' =>$messagemail,
  
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
    
  


?>
