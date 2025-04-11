<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');


$campusid = $_POST['campusid'];
$assignmentsettingsid = $_POST['assignmentsettingsid'];
$instutition = $_POST['instutition'];

$ekene_subject = $_POST['ekene_subject'];

$class_id = $_POST['class_id'];



$ekene_select_instution = "SELECT * FROM `institution` WHERE `InstitutionID` = '$instutition'";
$ekene_query_instution = mysqli_query($link, $ekene_select_instution);
$ekene_get_import_details = mysqli_fetch_assoc($ekene_query_instution);
$ekene_instution_row_cnt = mysqli_num_rows($ekene_query_instution);
if($ekene_instution_row_cnt > 0)
{
    $InstitutionGeneralName = $ekene_get_import_details['InstitutionGeneralName']; 
    $InstitutionLogo = $ekene_get_import_details['InstitutionLogo'];
    $InstitutionMotto = $ekene_get_import_details['InstitutionMotto'];
//     $ekene_questionbankoptionA = $ekene_get_import_details['optionA'];
//     $ekene_questionbankoptionB = $ekene_get_import_details['optionB'];
 }
 

 
 $ekene_select_class = "SELECT * FROM `classordepartment` WHERE `CampusID`= '$campusid' AND `ClassOrDepartmentID` = '$class_id'";

$ekene_query_link_class = mysqli_query($link, $ekene_select_class);
$ekene_get_details_class = mysqli_fetch_assoc($ekene_query_link_class);
$ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);



if($ekene_row_cnt_ekene > 0)
{

        $ekene_class = $ekene_get_details_class['ClassOrDepartmentName']; 
}
else{

}


// $session = "SELECT * FROM `session` WHERE `sessionStatus` = 1";

// $ekeneselect = mysqli_query($link, $session);
// $ekene_get_select_details = mysqli_fetch_assoc($ekeneselect);
// $ekene_row_select = mysqli_num_rows($ekeneselect);

// $ekene_session_name = $ekene_get_select_details['sessionName'];


$term = "SELECT * FROM `termalias` WHERE `CampusID` = '$campusid' And `TermOrSemesterID` = 1";
$ekeneterm = mysqli_query($link, $term);
$ekene_get_term_details = mysqli_fetch_assoc($ekeneterm);
$ekene_row_term = mysqli_num_rows($ekeneterm);
     if ($ekene_row_term > 0)
     {
        $ekene_term = $ekene_get_term_details['TermAliasName'];
     }




    
    $select_subject = "SELECT * FROM `subjectorcourse` WHERE SubjectOrCourseID = '$ekene_subject'";
    
    $ekensubject= mysqli_query($link, $select_subject);
    $ekene_get_subject = mysqli_fetch_assoc($ekensubject);
     $ekene_row_subject = mysqli_num_rows($ekensubject);

    if($ekene_row_subject > 0)
    {
     
           $ekene_subjectname = $ekene_get_subject['SubjectOrCourseTitle'];
    }else
    {
       
       $ekene_subjectname = ''; 
    }



$select_campus = "SELECT * FROM `campus` WHERE CampusID = '$campusid'";

$ekencampus= mysqli_query($link, $select_campus);
$ekene_get_campus = mysqli_fetch_assoc($ekencampus);
$ekene_row_campus = mysqli_num_rows($ekencampus);

if ($ekene_row_campus > 0)
{
   $ekene_campusname= $ekene_get_campus['CampusName'];
   $CampusAddress = $ekene_get_campus['CampusAddress'];
   
}

$select_assignment = "SELECT * FROM `assignmentsettings` WHERE `AssignmentSettingsID` = '$assignmentsettingsid'";
$ekenassgnment= mysqli_query($link, $select_assignment);
$ekene_get_assignmentekeneassignmentsettings = mysqli_fetch_assoc($ekenassgnment);
$ekene_row_assignment = mysqli_num_rows($ekenassgnment);

if ($ekene_row_assignment > 0)
{
    $sessionID= $ekene_get_assignmentekeneassignmentsettings['sessionID'];
    $AssignmentTitle= $ekene_get_assignmentekeneassignmentsettings['AssignmentTitle'];
    $Instruction= $ekene_get_assignmentekeneassignmentsettings['Instruction'];
    $DateCreated= $ekene_get_assignmentekeneassignmentsettings['DateCreated'];
}







    echo '<div class="tari_page " size="A4" id="prosloadcbtquestionforview_print">
    <div class="row m-0 text-center">
        <div class="col-lg-12">
            <figure class="figure">
                <img src="'.$InstitutionLogo.'" width="65" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption text-end fs-5 fw-bold text-center">'.$ekene_campusname.'</figcaption>
                <figcaption class="figure-caption text-end fs-6 text-center"><span class="fw-bold ms-2">Motto:</span> '.$InstitutionMotto.'.<span class="fw-bold ms-2">Address:</span> '.$CampusAddress.' </figcaption>
            </figure>
            <br>
            <figure class="figure">
                <figcaption class="figure-caption text-end fw-bold text-center" style="font-size:14px;">
                    Class: <span class="fw-normal me-2">'.$ekene_class.'</span>  
                    Subject: <span class="fw-normal me-2">'.$ekene_subjectname.'</span>
                    Date: <span class="fw-normal me-2">'.$DateCreated.'</span>
                   
                </figcaption>
            </figure>
        </div>
    </div>

      <div class="row" id="no_print">
          <div class="col-lg-12">
              <a class="btn btn-sm btn-primary proloadshowanserbtnforview" style="font-size:12px;" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Show Answer
                </a>
          </div>
      </div>';

      // Time Duration: <span class="fw-normal me-2"></span>
  


  $select_assignmentquestion = "SELECT * FROM `assignmentquestion` WHERE `AssignmentSettingsID` = '$assignmentsettingsid'";
$ekeneassignmentquestion= mysqli_query($link, $select_assignmentquestion);
$ekene_get_assignment = mysqli_fetch_assoc($ekeneassignmentquestion);
 $ekene_row_assignmentquestion = mysqli_num_rows($ekeneassignmentquestion);

$cnt = 0;
if ($ekene_row_assignmentquestion > 0)
{







    do{
        $cnt++;
        $question= $ekene_get_assignment['question'];
        $optionA= $ekene_get_assignment['optionA'];
        $optionB= $ekene_get_assignment['optionB'];
        $optionC= $ekene_get_assignment['optionC'];
    
        $optionD= $ekene_get_assignment['optionD'];
        $answer= $ekene_get_assignment['answer'];
        $AssignmentCategory= $ekene_get_assignment['AssignmentCategory'];



        if($AssignmentCategory == "Objective")
        {
          
                    





                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="card-title">
                                <p class="fw-bold" style="font-size:16px;">Question '.$cnt.' ('.$AssignmentCategory.')</p>
                            </div>
                            <div class="row mt-0">
                                <div class="card-text">
                                    <p>'.$question.'</p>
                                </div>
                                <form class="question_option">
                                    <label class="m-0">
                                        <p class="me-2">A.</p>'.$optionA.'
                                    </label>
                                    <label class="m-0">
                                        <p class="me-2">B.</p>'.$optionB.'
                                    </label>
                                    <label class="m-0">
                                        <p class="me-2">C.</p>'.$optionC.' 
                                    </label>
                                    <label class="m-0">
                                        <p class="me-2">D.</p>'.$optionD.'
                                    </label>
                                </form>
                                <div class="collapse" id="collapseExample">
                                    <div class="card border-0 card-body">
                                        <p><span style="color:blue;">Answer: '.$answer.'</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';







        }
     
        else
        {
 



                echo '<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="card-title">
                            <p class="fw-bold" style="font-size:16px;">Question '.$cnt.' ('.$AssignmentCategory.')</p>
                        </div>
                        <div class="row mt-0">
                            <div class="card-text">
                                <p>'.$question.'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


       
      }
        

  


    }while($ekene_get_assignment= mysqli_fetch_assoc($ekeneassignmentquestion));
    echo '</div>
 
    
    ';
}



?>
