<?php


        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include('../../../config/config.php');

        
        $campusid = $_POST["campusid"];

        $studentid = $_POST["studentid"];
        $assignmentid = $_POST["assignmentid"];

        $select_fromassignmentsetting = "SELECT * FROM `assignmentsettings` WHERE AssignmentSettingsID = '$assignmentid'"; 
        $ekene_mysqli = mysqli_query($link, $select_fromassignmentsetting);
        $ekene_get_detailsoverallscore = mysqli_fetch_assoc($ekene_mysqli);
        $ekene_row = mysqli_num_rows($ekene_mysqli);

        if($ekene_row > 0)
        {
            $Overallscore = $ekene_get_detailsoverallscore['Overallscore'];
        }


            $select_fromanswertable = "SELECT * FROM `assignmentanswer` WHERE `AssignmentSettingsID` = '$assignmentid' AND `StudentID`= '$studentid' AND `CampusID` = '$campusid' AND `TheoryQuestion` != 'NULL' OR `TheoryQuestion` != ''";
            
                $ekene_mysqli_query = mysqli_query($link, $select_fromanswertable);
                $ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_query);
                $ekene_row_cnt_ekene = mysqli_num_rows($ekene_mysqli_query);
                
                if($ekene_row_cnt_ekene > 0)
                {


                   

                echo '<div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6 ">
                        <strong class="float-end"style="font-weight: bold;">Overall score: '.$Overallscore.'</strong>
                        </div>
                    </div>';
                
                    do{


                        $TheoryQuestion = $ekene_get_details['TheoryQuestion'];
                        $TheoryAnswer = $ekene_get_details['TheoryAnswer'];
                        $TheoryScore = $ekene_get_details['TheoryScore'];

                        $TheoryQuestion = explode(',', $TheoryQuestion);
                        $TheoryAnswer = explode('###||', $TheoryAnswer);

                        if($TheoryScore == '')
                        {



                                $theoryscorenew  = '';
                            

                        }else
                        {

                            $theoryscorenew  = explode(',', $TheoryScore);

                        }


                        foreach ($TheoryQuestion as $key =>  $question) {


                            $curretnobjective = $TheoryAnswer[$key];




                            if($TheoryScore == '')
                            {
            
            
            
                            
                                
            
                            }else
                            {
            
                            

                                $scorenew =  $theoryscorenew[$key];
            
                            }
            


                            // $theoryscorenew 
                            
                            $select_fromquestiontable = mysqli_query($link,"SELECT * FROM `assignmentquestion` WHERE `AssignmentQuestionID` = '$question'");
                            $ekene_get_detailsquestiontable = mysqli_fetch_assoc($select_fromquestiontable);
                            $ekene_row_cnt_ekenequestion = mysqli_num_rows($select_fromquestiontable);
                            
                            $cnt= 0;

                            if( $ekene_row_cnt_ekenequestion > 0)
                            {
                            
                            
                                do{

                                                
                                                $cnt++;
                                                $question = $ekene_get_detailsquestiontable['question'];
                                
                                
                                                    echo '  <strong style="font-weight: bold;">Q'.$cnt.': '.$question.'</strong>
                                                    <p class="answer"><b>Student Answer</b>: '.$curretnobjective.'</p>
                                                    <strong> <label>Score:</label></strong>
                                                    <input type="number" class="form-control ekenetheoryscoreid"  value="'.$scorenew.'" placeholder="Enter Score" aria-label="Username" style="width: 30%;" aria-describedby="basic-addon1">
                                                    </br>
                                                    </br>
                                                    <strong> <label>Correction:</label></strong>
                                                    <textarea type="text"  class="form-control ekenetheorycorrectionid" placeholder="correction (Optional)" aria-label="Username" style="width: 30%;" aria-describedby="basic-addon1"></textarea>
                                                    <br> ';

                            
                    


                                }while($ekene_get_detailsquestiontable = mysqli_fetch_assoc($select_fromquestiontable));
                                            
                        

                            }

                        }
                        



                    } while($ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_query));

                
                }
                else
                {
                
                
                
                            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
                            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);
                    
                
                            $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
                            echo '<center><img class="mb-1" src="' . $pros_general_no_record . '" width="100" alt="">
                                <p>No record found.</p></center>';
                
                }

?>