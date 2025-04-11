<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 
 $campusid = $_POST["campusid"];

 $studentid = $_POST["studentid"];
 $assignmentid = $_POST["assignmentid"];




       $select_fromanswertable = "SELECT * FROM `assignmentanswer` WHERE `AssignmentSettingsID` = '$assignmentid' AND `StudentID`= '$studentid' AND `CampusID` = '$campusid'";
       
        $ekene_mysqli_query = mysqli_query($link, $select_fromanswertable);
        $ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_query);
        $ekene_row_cnt_ekene = mysqli_num_rows($ekene_mysqli_query);
        
        if($ekene_row_cnt_ekene > 0)
        {

              $num= 0;
         
            do{


                $ObjectiveQuestion = $ekene_get_details['ObjectiveQuestion'];
                $ObjectAnswer = $ekene_get_details['ObjectAnswer'];

                $ObjectiveQuestion = explode(',', $ObjectiveQuestion);
                $ObjectAnswer = explode(',', $ObjectAnswer);


                foreach ($ObjectiveQuestion as $key =>  $question) {

                    $curretnobjective = $ObjectAnswer[$key];

                    $select_fromquestiontable = mysqli_query($link,"SELECT * FROM `assignmentquestion` WHERE `AssignmentQuestionID` = '$question'");
                    $ekene_get_detailsquestiontable = mysqli_fetch_assoc($select_fromquestiontable);
                    $ekene_row_cnt_ekenequestion = mysqli_num_rows($select_fromquestiontable);

                 

                    if( $ekene_row_cnt_ekenequestion > 0)
                    {

                        

                          do{

                            $question = $ekene_get_detailsquestiontable['question'];
                            $optionA = $ekene_get_detailsquestiontable['optionA'];
                            $optionB = $ekene_get_detailsquestiontable['optionB'];
                            $optionC = $ekene_get_detailsquestiontable['optionC'];
                            $optionD = $ekene_get_detailsquestiontable['optionD'];
                            $answer = $ekene_get_detailsquestiontable['answer'];

                             $num++;
                           



                                echo '<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <p class="fw-bold" style="font-size:16px;">Question '.$num.' </p>
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
                                            <p class="answer"><b>Student Answer:</b> '.$curretnobjective.'</p>
                                            <p class="answer"><b>Correct Answer:</b> '.$answer.'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
               


                      


                          }while($ekene_get_detailsquestiontable = mysqli_fetch_assoc($select_fromquestiontable));
                                    
                  

                    }

                }
                



            } while($ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_query));

        
        }

?>