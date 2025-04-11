<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $questionID = $_POST['questionID'];
    $questionCategory = $_POST['questionCategory'];

    $fetch = mysqli_query($link, "SELECT * FROM questionbank WHERE `QuestionBankID` = '$questionID'
                                    AND `QuestionCategory` = '$questionCategory'");
    $num_row = mysqli_num_rows($fetch);
    $fetch_row = mysqli_fetch_assoc($fetch);

        if($num_row > 0){

           $QuestionType = $fetch_row['QuestionType'];

           if($QuestionType == 'Objective'){

            $question = $fetch_row['question']; 
            $optionA = $fetch_row['optionA']; 
            $optionB = $fetch_row['optionB']; 
            $optionC = $fetch_row['optionC']; 
            $optionD = $fetch_row['optionD']; 
            $answer = $fetch_row['answer'];

            echo '<textarea class="form-control" id="qedit" hidden>'.$question.'</textarea>
                <textarea class="form-control" id="Aedit" hidden >'.$optionA.'</textarea>
                <textarea class="form-control" id="Bedit" hidden >'.$optionB.'</textarea>
                <textarea class="form-control" id="Cedit" hidden >'.$optionC.'</textarea>
                <textarea class="form-control"  id="Dedit" hidden >'.$optionD.'</textarea>
                <input type="text" id="ansedit" value="'.$answer.'" class="form-control" hidden>
                <input type="text" id="QuestionCategory" value="'.$QuestionType.'" class="form-control" hidden>
                <input type="text" id="questionID_edit" value="'.$questionID.'" class="form-control" hidden>';

           }elseif($QuestionType == 'Theory'){

                $question2 = $fetch_row['question']; 

                echo '<textarea class="form-control" id="qedit2" hidden>'.$question2.'</textarea>
                <input type="text" id="QuestionCategory" value="'.$QuestionType.'" class="form-control" hidden>
                <input type="text" id="questionID_edit" value="'.$questionID.'" class="form-control" hidden>';

           }
            
            

        }


?>

