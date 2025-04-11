<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');


$campusid = $_POST['campusid'];
$class_id = $_POST['class_id'];
$assignmentid = $_POST['assignmentid'];


$textareaquestionobjective = $_POST['textareaquestionobjective'];

 $optionA = $_POST[ 'optionA'];
$optionB = $_POST[ 'optionB'];
$optionC = $_POST[ 'optionC'];
$optionD = $_POST[ 'optionD'];

 $Answer = $_POST[ 'Answer'];

$ekene_subject = $_POST['ekene_subject'];
$usertype = $_POST[ 'usertype'];

$userid = $_POST[ 'userid'];


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

$failed = 0;
$success = 0;




date_default_timezone_set("Africa/Lagos");
$dateAndTime = date("Y/m/d H:i:s");
$desripction = "set assignment";

// Explode each variable and count the maximum length
$textareaquestionobjectiveexplode = explode('###||', $textareaquestionobjective);

$optionAexplode = explode('###||', $optionA);
$optionBexplode = explode('###||', $optionB );
$optionCexplode = explode('###||', $optionC);
$optionDexplode = explode('###||', $optionD);
$Answerexplode = explode(',', $Answer);


$maxArrayLength = max(
  count($textareaquestionobjectiveexplode),

  count($optionAexplode),
  count($optionBexplode),
  count($optionCexplode),
  count($optionDexplode),
  count($Answerexplode)
);



// Add empty values to each array to make them equal in length
$lengthDifference = $maxArrayLength - count($textareaquestionobjectiveexplode);
for ($i = 0; $i < $lengthDifference; $i++) {
  $textareaquestionobjectiveexplode[] = '';
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


    $ekene_update_asignmentold = "DELETE FROM `assignmentquestion` WHERE `AssignmentSettingsID` = '$assignmentid' AND `AssignmentCategory` = 'Objective'
    ";

    $ekene_update_asignmentold = mysqli_query($link, $ekene_update_asignmentold);

    

for ( $i = 0; $i < count($textareaquestionobjectiveexplode);
$i++ ) {

               $objectivequestion = mysqli_real_escape_string($link, $textareaquestionobjectiveexplode[$i]);
                    
              

                $optionA = mysqli_real_escape_string($link, $optionAexplode[$i]);
                $optionB = mysqli_real_escape_string($link, $optionBexplode[$i]);
                $optionC = mysqli_real_escape_string($link, $optionCexplode[$i]);
                $optionD = mysqli_real_escape_string($link, $optionDexplode[$i]);
                $Answer = mysqli_real_escape_string($link, $Answerexplode[$i]);
      
                  if(!empty($objectivequestion))
                  {



                    
                  
                        $ekene_insert_assignment = "INSERT INTO `assignmentquestion` 
                        (`AssignmentSettingsID`, `CampusID`, `CourseOrSubjectTeacherUserID`, `UserType`, `sessionID`, `TermOrSemesterID`,
                        `ClassOrDepartmentID`, `SubjectOrCourseID`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, 
                        `AssignmentCategory`, `answer`, `date/time`) 
                        VALUES ('$assignmentid', '$campusid', '$userid', '$usertype', '$ekene_session_name',
                        '$ekene_term', '$class_id', '$ekene_subject', '$objectivequestion', '$optionA', '$optionB', '$optionC', '$optionD',
                        'Objective', '$Answer', '$dateAndTime')";
                    
                        $ekene_update_asignmentnew = mysqli_query($link, $ekene_insert_assignment);



                      
                        
                        if($ekene_update_asignmentnew == true)
                        {
                            $success+=+1;  

                        }else
                        {
                            $failed+=+1;
                        }


                        
                    }


          } 


            if($success != '0'){

                echo "1";
            }
            else
            {
                   echo "4";
            }


    
?>