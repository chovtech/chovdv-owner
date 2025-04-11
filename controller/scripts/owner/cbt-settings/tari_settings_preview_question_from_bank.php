<?php
include('../../../config/config.php');

      $category = $_POST['category'];

     if($category == 'Objective'){

        $QuestionID = $_POST['cards'];
        $QuestionNum= $_POST['nums'];
         
        // OBJ
        foreach($QuestionID as $i => $key)
        {
            $num = $QuestionNum[$i];
            $key;
            $getQuestions =  mysqli_query($link,"SELECT * FROM `questionbank` WHERE `QuestionBankID` = '$key'");
            $fetchQuestion = mysqli_fetch_assoc($getQuestions);
            $rowQuestion = mysqli_num_rows($getQuestions);

                

            if($rowQuestion > 0){

                $QuestionBankID = $fetchQuestion['QuestionBankID'];
                $Question_type = $fetchQuestion['QuestionType'];

                if($Question_type == 'Objective'){

                    $question = $fetchQuestion['question'];
                    $optionA = $fetchQuestion['optionA'];
                    $optionB = $fetchQuestion['optionB'];
                    $optionC = $fetchQuestion['optionC'];
                    $optionD = $fetchQuestion['optionD'];
                    $answer = $fetchQuestion['answer'];

                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <div class="card question_card2" data-count="'.$num.'" data-id="'.$QuestionBankID.'" data-ans="'.$answer.'">
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

            }else{
                echo '';
            }
        }

     }elseif($category == 'Theory'){

        $QuestionID3 = $_POST['cards2'];
        $QuestionNum4 = $_POST['nums2'];

        // THEORY
        foreach($QuestionID3 as $j => $key2)
        {
            $num2 = $QuestionNum4[$j];
            $key2;
            $getQuestions1 =  mysqli_query($link,"SELECT * FROM `questionbank` WHERE `QuestionBankID` = '$key2'");
            $fetchQuestion1 = mysqli_fetch_assoc($getQuestions1);
            $rowQuestion1 = mysqli_num_rows($getQuestions1);

                

            if($rowQuestion1 > 0){

                $QuestionBankID = $fetchQuestion1['QuestionBankID'];
                $Question_type = $fetchQuestion1['QuestionCategory'];

                if($Question_type == 'Theory'){

                    $question2 = $fetchQuestion1['question'];
                    $QuestionBankID2 = $fetchQuestion1['QuestionBankID'];
            
                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-1">
                        <div class="card question_card3" data-count="'.$num2.'" data-id="'.$QuestionBankID2.'">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Question '.$num2.'</h5>
                            </div>
                            <div class="card-text">
                                <p> '.$question2.'</p>
                            </div>
                        </div>
                    </div>
                </div>';

                
                } 
            }else{
                echo '';
            }

        }

     }elseif($category == 'Both'){

        $QuestionID = $_POST['cards'];
        $QuestionNum= $_POST['nums'];

        $QuestionID3 = $_POST['cards2'];
        $QuestionNum4 = $_POST['nums2'];

   
        // OBJ
        foreach($QuestionID as $i => $key)
        {
            $num = $QuestionNum[$i];
            $key;
            $getQuestions =  mysqli_query($link,"SELECT * FROM `questionbank` WHERE `QuestionBankID` = '$key'");
            $fetchQuestion = mysqli_fetch_assoc($getQuestions);
            $rowQuestion = mysqli_num_rows($getQuestions);

                

            if($rowQuestion > 0){

                $QuestionBankID = $fetchQuestion['QuestionBankID'];
                $Question_type = $fetchQuestion['QuestionCategory'];

                if($Question_type == 'Objective'){

                    $question = $fetchQuestion['question'];
                    $optionA = $fetchQuestion['optionA'];
                    $optionB = $fetchQuestion['optionB'];
                    $optionC = $fetchQuestion['optionC'];
                    $optionD = $fetchQuestion['optionD'];
                    $answer = $fetchQuestion['answer'];

                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                            <div class="card question_card2" data-count="'.$num.'" data-id="'.$QuestionBankID.'" data-ans="'.$answer.'">
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

            }else{
                echo '';
            }
        }

        // THEORY
        foreach($QuestionID3 as $j => $key2)
        {


            $num2 = $QuestionNum4[$j];
            $key2;
            $getQuestions1 =  mysqli_query($link,"SELECT * FROM `questionbank` WHERE `QuestionBankID` = '$key2'");
            $fetchQuestion1 = mysqli_fetch_assoc($getQuestions1);
            $rowQuestion1 = mysqli_num_rows($getQuestions1);

                

            if($rowQuestion1 > 0){

                        $QuestionBankID = $fetchQuestion1['QuestionBankID'];
                        $Question_type = $fetchQuestion1['QuestionCategory'];

                        if($Question_type == 'Theory'){

                            $question2 = $fetchQuestion1['question'];
                            $QuestionBankID2 = $fetchQuestion1['QuestionBankID'];
                    
                            echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-1">
                                <div class="card question_card3" data-count="'.$num2.'" data-id="'.$QuestionBankID2.'">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5>Question '.$num2.'</h5>
                                    </div>
                                    <div class="card-text">
                                        <p> '.$question2.'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';

                        
                } 
            }else{
                echo '';
            }

        }

     }

    
    
?>