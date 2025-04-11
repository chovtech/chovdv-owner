



<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');

$assignmentsettingsid = $_POST['assignmentsettingsid'];

$campusid = $_POST['campusid'];



$select_image = "SELECT * FROM `defaultimages` WHERE BaseSixtyFour = 'abba_profile_dummy_image'";

$ekene_mysqli_query = mysqli_query($link, $select_image);
$ekene_get_details_image = mysqli_fetch_assoc($ekene_mysqli_query);
$ekene_row_cnt_ekeneimage = mysqli_num_rows($ekene_mysqli_query);

if($ekene_row_cnt_ekeneimage > 0)
{
    $basesixfour = $ekene_get_details_image['BaseSixtyFour'];
}

$select_assignmentanswer = "SELECT * FROM `assignmentanswer` INNER JOIN `student` ON `assignmentanswer`.StudentID = `student`.StudentID  WHERE `assignmentanswer`.`CampusID` = '$campusid' AND `assignmentanswer`.`AssignmentSettingsID`= '$assignmentsettingsid'";

$ekene_mysqli_queryassignmentasnwer = mysqli_query($link, $select_assignmentanswer);
$ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_queryassignmentasnwer);
$ekene_row_cnt_ekene = mysqli_num_rows($ekene_mysqli_queryassignmentasnwer);

if ($ekene_row_cnt_ekene > 0)
{
  
    $termid = $ekene_get_details["TermOrSemesterID"];
    $sessionID = $ekene_get_details["sessionID"];

                echo ' <div class="col-sm-12 col-md-12 col-lg-12">
                <span id="abba_stud_stat_span">
                    <div class="d-flex">

                        <button type="button" class="btn btn-sm bg-light text-primary rounded-3 btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> <input  type="checkbox" id="inlineCheckbox2" value="option1" style="height: 20px; width: 20px;"> Check all</button>

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <div class="d-flex">
                                <span class="abba_tooltip">
                                <span class="abba_tooltiptext">convert assignment</span>
                                <i class="fa fa-sync" id="ekeneconverttoca" style="color: blue;"  data-status="bulk" style="color: red;"  data-id="'.$assignmentsettingsid.'"   data-cam="'.$campusid.'"></i>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="abba_tooltip">
                                <span class="abba_tooltiptext">publish assignment</span>
                                <i class="fas fa-cloud-upload-alt" id="ekenepublishassignment" data-status="bulk" style="color: green;" data-status="bulk" style="color: red;"  data-id="'.$assignmentsettingsid.'"   data-cam="'.$campusid.'"></i>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="abba_tooltip">
                                <span class="abba_tooltiptext">Reset assignment</span>
                                <i class="fas fa-undo resetassignment"  data-status="bulk" style="color: red;"  data-id="'.$assignmentsettingsid.'"   data-cam="'.$campusid.'" ></i>
                            
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </span>
            </div>';

            echo '<div class="row g-4 mt-1 maincard selectBox-cont">';

                do {

                    $student_id = $ekene_get_details['StudentID'];
                    $CampusInew = $ekene_get_details['CampusID'];

                    $publishstatus = $ekene_get_details['publishstatus'];


                    $studentnamefirst = $ekene_get_details['StudentFirstName'];
                    $studentnamelast = $ekene_get_details['StudentLastName'];

                    
                    $ObjectiveQuestion = $ekene_get_details['ObjectiveQuestion'];
                    $ObjectAnswer = $ekene_get_details['ObjectAnswer'];

                    
                    $TheoryQuestion = $ekene_get_details['TheoryQuestion'];
                    $TheoryAnswer = $ekene_get_details['TheoryAnswer'];

                    $TheoryScore = $ekene_get_details['TheoryScore'];

                    $StudentPhoto = $ekene_get_details['StudentPhoto'];
                    $publishstatusnew = $ekene_get_details['publishstatus'];


                    // if($publishstatus == 1)
                    // {
                    //     $tooltip = "Unpublish assignment";
                    //     $publisheye = "fa fa-eye";
                    // }
                    // else
                    // {
                    //     $tooltip = "publish assignment";
                    //     $publisheye = "fas fa-eye-slash";
                    // }
                    $TheoryScore = explode(',', $TheoryScore);
                    $sum = array_sum($TheoryScore);
                    $ObjectiveQuestion = explode(',', $ObjectiveQuestion);
                    $ObjectAnswer = explode(',', $ObjectAnswer);
                    $TheoryQuestion = explode(',', $TheoryQuestion);
                    $TheoryAnswer = explode('###||', $TheoryAnswer);

                    $totalstudentscore_obj = 0;
                    $overallobject = count($ObjectiveQuestion);



                            foreach ($ObjectiveQuestion as $key =>  $question) {


                                $curretnobjective = $ObjectAnswer[$key];
                            

                            
                                $select_fromquestiontable = mysqli_query($link,"SELECT * FROM `assignmentquestion` WHERE `AssignmentQuestionID` = '$question'");
                                $ekene_get_detailsquestiontable = mysqli_fetch_assoc($select_fromquestiontable);
                                $ekene_row_cnt_ekenequestion = mysqli_num_rows($select_fromquestiontable);


                                    if( $ekene_row_cnt_ekenequestion > 0)
                                    {
                                        

                                                    
                                        $answer = $ekene_get_detailsquestiontable['answer'];

                                    

                                        if ($curretnobjective == $answer)
                                        {
                                            $totalstudentscore_obj+=+1;
                                        }

                                    }else
                                    {

                                    }


                        }
                        $select_fromassignmentsetting = "SELECT * FROM `assignmentsettings` WHERE AssignmentSettingsID = '$assignmentsettingsid'"; 
                        $ekene_mysqli = mysqli_query($link, $select_fromassignmentsetting);
                        $ekene_get_details = mysqli_fetch_assoc($ekene_mysqli);
                        $ekene_row = mysqli_num_rows($ekene_mysqli);

                        if($ekene_row > 0)
                        {
                            $Overallscore = $ekene_get_details['Overallscore'];
                        }

                      $totalquestionscore = $overallobject + $Overallscore;

                    $totalscore = $sum + $totalstudentscore_obj;

                    $select_answerreset = " SELECT * FROM `assignmentanswer` WHERE `AssignmentSettingsID` = '$assignmentsettingsid' AND `StudentID` = '$student_id' AND `CampusID` = '$CampusInew' AND `resetstatus` = 1"; 
                    $ekene_mysqlireset = mysqli_query($link, $select_answerreset);
                    $ekene_get_detailsreset = mysqli_fetch_assoc($ekene_mysqlireset);
                    $ekene_rowreset = mysqli_num_rows($ekene_mysqlireset);

                    if($ekene_rowreset > 0)
                    {
                       
                       $resetstatus = "4";
                    }
                    else
                    {
                        $resetstatus = "6";
                      
                    }





                    if($StudentPhoto == '')
                    {
                        $StudentPhoto_final =  $basesixfour;
                    }else
                    {


                        $StudentPhoto_final =  $StudentPhoto;
                    }
                   
 

                  



                  
            

                    echo ' <div class="col-sm-3 col-md-6 col-lg-3 carditems">
                        <div class="topSecCards" style="width: 100%; box-shadow: #97979733 0px 8px 24px; border-radius: 8px; background: #f7fff7;">

                                <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                            <input class="form-check-input eachcheckbox" type="checkbox"  data-cam="'.$campusid.'"  data-mytotalscore="'.$totalscore.'" data-maxscore="'.$totalquestionscore.'"  id="inlineCheckbox1" data-id="'.$assignmentsettingsid.'" data-stud="'.$student_id.'" data-publish="'.$publishstatus.'" value="option1" style="height: 20px; width: 20px;">
                                </div>';



                                    if($publishstatusnew == '1')
                                    {



                                      

                                        echo '<button type="button" class="btn chiActive  mr-3 proschangepublishstatus proschangestudentstatus'.$student_id.'" style="margin-right:18px;font-size:10px;"   data-id="'.$assignmentsettingsid.'" data-status="1" data-stud="'.$student_id.'" ><i class="fas fa-cloud-upload-alt"></i> Publish </button>';


                                      
                                        
                                    }else
                                    {
                                      

                                        echo '<button type="button" class="btn chiBlock proschangepublishstatus  mr-3 proschangestudentstatus'.$student_id.'" style="margin-right:18px; font-size:10px;"  data-id="'.$assignmentsettingsid.'" data-status="0" data-stud="'.$student_id.'"><i class="fas fa-cloud-upload-alt" ></i> Unpubli..</button>';

                                    }

                                       



                           echo '<div align="center" style="margin-top: 18px;">
                            <img src="'.$StudentPhoto_final.'" style="width: 30%; border-radius: 50%;">
                            
                                <p style="font-weight: bold; color:black;">'.$studentnamefirst.' : '.$studentnamelast.'</p>
                                <div class="row">
                                    <div class="col-6">
                                    Objective: '.$totalstudentscore_obj.'/ '. $overallobject.'
                                    </div>
                                    <div class="col-6">
                                    Theory: <span class="thoeryscore'.$student_id.'">'.$sum.' </span> /'.$Overallscore.'
                                    </div>
                                </div>
                                
                                <div class="mt-2" align="center">
                                Total score:'.$totalscore.'/'.$totalquestionscore.'
                                </div>
                                
                                
                            </div>


                            <div style="padding: 7px;">
                                <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">';


                                
                                
                                    
                                echo    '<div style="padding: 5px;" align="center">
                                        <span class="abba_tooltip">
                                        <span class="abba_tooltiptext">Mark assignment</span>
                                        <i class="fa fa-check" style="color: green;" id="ekene_markmainassignmenticon" data-id="'.$assignmentsettingsid.'" data-cam="'.$campusid.'" data-stud="'.$student_id.'"></i>
                                        
                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="abba_tooltip">
                                        <span class="abba_tooltiptext">convert assignment</span>
                                        <i class="fa fa-sync" data-term="'.$termid.'" data-session="'.$sessionID.'" data-mytotalscore="'.$totalscore.'" data-maxscore="'.$totalquestionscore.'"   data-status="single" id="ekeneconverttoca" data-id="'.$assignmentsettingsid.'" data-cam="'.$campusid.'" data-stud="'.$student_id.'"  style="color: blue;"></i>
                                        </span>
                                        
               
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="abba_tooltip">
                                        <span class="abba_tooltiptext" >Reset assignment</span>
                                        <i class="fas fa-undo resetassignment"  data-status="single" data-id="'.$assignmentsettingsid.'"  data-reset="'.$resetstatus.'"   data-cam="'.$campusid.'" data-stud="'.$student_id.'"   style="color: red;"></i>
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


            ';

                }
                while($ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_queryassignmentasnwer));



                echo '</div>';
}
else
{
    $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
    $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
    $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

    if ($pros_select_record_not_found_count > 0) {
        $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
        echo '<center><img class="mb-1" src="' . $pros_general_no_record . '" width="100" alt="">
            <p>No record found.</p></center>';
    }

}

?>