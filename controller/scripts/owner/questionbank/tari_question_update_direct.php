<?php

include('../../../config/config.php');

  $questionID = $_POST['questionID'];
  $questionCategory = $_POST['questionCategory'];

    if($questionCategory == 'Objective'){

        $question = mysqli_real_escape_string($link, $_POST['question']);
        $optionA = mysqli_real_escape_string($link, $_POST['optionA']);
        $optionB = mysqli_real_escape_string($link, $_POST['optionB']);
        $optionC = mysqli_real_escape_string($link,$_POST['optionC']);
        $optionD = mysqli_real_escape_string($link,$_POST['optionD']);
        $select = mysqli_real_escape_string($link, $_POST['select']);
        

        $update_question = mysqli_query($link, "UPDATE `questionbank` 
                                                SET     question = '$question',
                                                        optionA = '$optionA',
                                                        optionB = ' $optionB',
                                                        optionC = '$optionC',
                                                        optionD = ' $optionD',
                                                        answer = '$select'
                                                WHERE `QuestionBankID` = '$questionID'
                                        ");
        


        if($update_question){

            $fetch_question = mysqli_query($link,"SELECT * FROM `questionbank` WHERE `QuestionBankID` = '$questionID'");
            $num = mysqli_num_rows($fetch_question);
            $fetch = mysqli_fetch_assoc($fetch_question);


            $QuestionCategory = $fetch['QuestionCategory'];

            $Question = $fetch['question'];
            $OptionA = $fetch['optionA'];
            $OptionB = $fetch['optionB'];
            $OptionC = $fetch['optionC'];
            $OptionD = $fetch['optionD'];

            if($num > 0){

                echo ' <div class="card-text">
                        <p> '.$question.'</p>
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
                    </div>';

            }else{
                echo '0';
            }

           
        }else{
            echo '0';
        }


    }elseif($questionCategory == 'Theory'){

            $question = mysqli_real_escape_string($link, $_POST['question']);

            $update_question = mysqli_query($link, "UPDATE `questionbank` 
                                                    SET     question = '$question'
                                                    WHERE  `QuestionBankID` = '$questionID'");

            if($update_question){

                $fetch_question = mysqli_query($link,"SELECT * FROM `questionbank` WHERE `QuestionBankID` = '$questionID'");
                $num = mysqli_num_rows($fetch_question);
                $fetch = mysqli_fetch_assoc($fetch_question);

                $QuestionCategory = $fetch['QuestionType'];
                $Question = $fetch['question'];
                $QuestionID = $fetch['QuestionBankID'];

                if($num > 0){
                    echo '<div class="card-text">
                            <p>'.$Question.'</p>
                        </div>';
                }
            }else{
                echo '0';
            }


    }else{
        echo '0';
    }


    


?>