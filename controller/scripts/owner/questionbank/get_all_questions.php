<?php

            include('../../../config/config.php');

            $prosloadinstitutionid = $_POST['prosloadinstitutionid'];
            $prosloadsession = $_POST['prosloadsession'];
            $prosloadterm = $_POST['prosloadterm'];
            $campusID = $_POST['campusID'];

            $ClassID = $_POST['ClassID'];
            $sectionID = $_POST['sectionID'];
            $prosloadquestiontype = $_POST['prosloadquestiontype'];


            $num = 1;



                 $fetch = "SELECT * FROM `questionbank`  WHERE `InstitutionID` ='$prosloadinstitutionid'
                 AND `sessionID`='$prosloadsession' AND  `Status`='0'";
               
                                            
               
                  if ($campusID != 'NULL') {
                          $fetch .= " AND `CampusID`='$campusID'";
                    }else
                    {
                        
                    }


                  if ($prosloadterm != 'NULL') {

                        $fetch .= "AND `TermOrSemesterID`='$prosloadterm'";
                  }else
                  {
                      
                  }

                if ($sectionID != 'NULL') {

                    $fetch .= "AND `SectionID`='$sectionID'";

                }else
                {
                    
                }


                if ($ClassID != 'NULL') {

                      $fetch .= "AND `ClassOrDepartmentID`='$ClassID'";

                }else
                {
                    
                }

                if ($prosloadquestiontype != 'NULL') {

                       $fetch .= "AND `QuestionType`='$prosloadquestiontype'";

                }else
                {
                    
                }


                $fetch .= "ORDER BY QuestionBankID DESC";

                $prosquery = mysqli_query($link, $fetch);
                    

                $num_row = mysqli_num_rows($prosquery);
                $fetch_row = mysqli_fetch_assoc($prosquery);

                if($num_row > 0){


                   echo '<div class="row prosloadfullquetionforquestion" >'; 


                  

                      

                                  echo ' <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-check" style="margin-left: 20px;">
                                            <input class="form-check-input" style="font-size: 20px;" type="checkbox" id="pros_select_all_question">
                                            <label for="pros_select_all_question" class="mt-1">Select All</label> <span id="pros_question_total_selected"  data-bs-toggle="modal" data-bs-target="#delete_question_directall" style="color:orangered;cursor:pointer;" ></span>
                                        </div>
                                    </div>';

                                    
                                        
                       
                    do{


                          $QuestionType =  $fetch_row['QuestionType'];
                          $CampusIDgotten =  $fetch_row['CampusID'];

                        if($QuestionType == 'Theory'){

                                $QuestionCategory =  $fetch_row['QuestionCategory'];

                                $question2 =  $fetch_row['question'];
                                $questionID2 = $fetch_row['QuestionBankID'];
                                
                                
                                
                                

                                if (strlen($question2) > 500) {
                                    // Shorten the string
                                    $shortened_stringquestion = substr($question2, 0, 100) . "..."; // Append ellipsis for 
                                   
                                } else {
                                    // If the string length is within the maximum length, no need to shorten
                                    $shortened_stringquestion  = $question2;
                                }

        
                                echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-1 prosloadcardinforquestion" id="prosloadquestioncontent'.$questionID2.'">
                                            <div class="card question_card2  " data-id="'.$questionID2.'">
                                                <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                                    <input class="form-check-input prosloadquestioncheckbox" style="font-size: 20px;" name="abba_get_multi_student_id" type="checkbox" value="'.$questionID2.'"  data-camp="'.$CampusIDgotten.'">
                                                    <p class="float-end me-3">'.$QuestionType .'</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h5>Question '.$num++.'</h5>
                                                    </div>
                                                    <div class="card-text updated_question'.$questionID2.'">
                                                        <p>'.$shortened_stringquestion.'</p>
                                                    </div>
                                                    <div class="card-text">
                                                        <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-primary mb-2" 
                                                        data-bs-toggle="modal" data-bs-target="#edit_question_direct" id="edit_question" style="font-size:11px;"
                                                        data-id="'.$questionID2.'" data-cat="'.$QuestionCategory.'"><i class="fas fa-edit"></i></button>
            
                                                        <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-danger mb-2" 
                                                        data-bs-toggle="modal" data-bs-target="#delete_question_direct" id="delete_question" style="font-size:11px;"
                                                        data-id="'.$questionID2.'" data-cat="'.$QuestionCategory.'" data-camp="'.$CampusIDgotten.'"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>';

                        

                        }elseif($QuestionType == 'Objective'){

                                    $QuestionCategory =  $fetch_row['QuestionCategory'];

                                    $question =  $fetch_row['question'];
                                    $questionID = $fetch_row['QuestionBankID'];
                        
                                    $optionA =  $fetch_row['optionA'];
                                    $optionB =  $fetch_row['optionB'];
                                    $optionC =  $fetch_row['optionC'];
                                    $optionD =  $fetch_row['optionD'];
                                    
                                    
                                    
                                      if (strlen($question) > 500) {
                                    // Shorten the string
                                       $shortened_stringquestionobj = substr($question, 0, 100) . "..."; // Append ellipsis for 
                                       
                                    } else {
                                        // If the string length is within the maximum length, no need to shorten
                                        $shortened_stringquestionobj  = $question;
                                    }
                                    
                                    
                                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 prosloadcardinforquestion" id="prosloadquestioncontent'.$questionID2.'">
                                            <div class="card shadow-sm question_card2 "   data-id="'.$questionID.'"  data-cat="'.$QuestionCategory.'">
                                                <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                                    <input class="form-check-input prosloadquestioncheckbox" style="font-size: 20px;" name="abba_get_multi_student_id" type="checkbox" value="'.$questionID.'"  data-camp="'.$CampusIDgotten.'" >
                                                    <p class="float-end me-3">'.$QuestionType .'</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h5>Question '.$num++.'</h5>
                                                    </div>
                                                    <div class="updated_question'.$questionID.'"">
                                                        <div class="card-text">
                                                            <p> '.$shortened_stringquestionobj.'</p>
                                                        </div>
                                                        <a class="collapsed pt-2" style="font-size:12px;" data-bs-toggle="collapse" href="#collapseExample'.$questionID.'" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <span class="fa fa-eye text-primary if-collapsed fw-light"> view options</span> 
                                                            <span class="fa fa-eye-slash text-primary if-not-collapsed fw-light"> hide Options</span>
                                                        </a>
                                                        <div class="collapse" id="collapseExample'.$questionID.'">
                                                            <form class="question_option" >
                                                                <label class="mx-auto">
                                                                    <p class="me-2">A.</p>'.$optionA.'
                                                                </label>
                                                                <label class="mx-auto">
                                                                    <p class="me-2">B.</p>'.$optionB.'
                                                                </label>
                                                                <label class="mx-auto">
                                                                    <p class="me-2">C.</p>'.$optionC.' 
                                                                </label>
                                                                <label class="mx-auto">
                                                                    <p class="me-2">D.</p>'.$optionD.'
                                                                </label>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="card-text">
                                                        <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-primary mb-2" 
                                                        data-bs-toggle="modal" data-bs-target="#edit_question_direct" id="edit_question" style="font-size:11px;"
                                                        data-id="'.$questionID.'" data-cat="'.$QuestionCategory.'"><i class="fas fa-edit"></i></button>
                                
                                                        <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-danger mb-2" 
                                                        data-bs-toggle="modal" data-bs-target="#delete_question_direct" id="delete_question" style="font-size:11px;"
                                                        data-id="'.$questionID.'" data-cat="'.$QuestionCategory.'" data-camp="'.$CampusIDgotten.'"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';

                        }
                    



                    }while($fetch_row = mysqli_fetch_assoc($prosquery));

                   echo '</div>';
                }else
                {


                    echo '<center><img src="error.png" style="width:150px;" class="img-fluid mx-auto d-block" alt="">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                        <p>Opps, No Question in all Campus from the Bank.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                        Click here to Create Question
                        </figcaption>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createQuestionDirect" style="font-size:12px;">Create Question</button>
                    </figure></center>'; 


                }
              
               
           

       


    




?>