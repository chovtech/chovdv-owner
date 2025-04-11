<?php

            include('../../../config/config.php');

    $QuestionID = $_POST['cards'];
    $QuestionNum= $_POST['nums'];

    // $break = implode(",",$QuestionID);
    // $break2 = explode(",",$break);

    // $breakNum = implode(",",$QuestionNum);
    // $breakNum2 = explode(",",$breakNum);

    // print_r($break2); 
        
        foreach($QuestionID as $i => $key)
        {
            $num = $QuestionNum[$i];
            $key;
            $getQuestions =  mysqli_query($link,"SELECT * FROM edumessquestionbank WHERE edumessquestionbank.QuestionBankID = '$key'");
            $fetchQuestion = mysqli_fetch_assoc($getQuestions);
            $rowQuestion = mysqli_num_rows($getQuestions);

             

            if($rowQuestion > 0){

                $QuestionBankID = $fetchQuestion['QuestionBankID'];
                $Question_type = $fetchQuestion['Question_type'];

                if($Question_type == 'Objective'){

                    $question = $fetchQuestion['Question'];
                    $optionA = $fetchQuestion['optionA'];
                    $optionB = $fetchQuestion['optionB'];
                    $optionC = $fetchQuestion['optionC'];
                    $optionD = $fetchQuestion['optionD'];

                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <div class="card question_card" data-count="'.$num.'" data-id="'.$QuestionBankID.'">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5>Question '.$num.'</h5>
                                    </div>
                                    <div class="card-text">
                                        <p> '.$question.'</p>
                                    </div>
                                    <div class="card-text">
                                        <form class="question_option">
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
                            </div>
                        </div>';
                       
                }
                elseif($Question_type == 'Theory'){

                    $question2 = $fetchQuestion['Question'];
                    $QuestionBankID2 = $fetchQuestion['QuestionBankID'];
            
                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-1">
                        <div class="card question_card" data-count="'.$num.'" data-id="'.$QuestionBankID2.'">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Question '.$num.'</h5>
                            </div>
                            <div class="card-text">
                                <p> '.$question2.'</p>
                            </div>
                        </div>
                    </div>
                </div>';
                } 
            }else{
                echo 'error';
            }

            }
    
?>