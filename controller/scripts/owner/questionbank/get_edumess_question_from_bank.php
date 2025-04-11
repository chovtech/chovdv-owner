<?php

include('../../../config/config.php');

    $filter_classID = $_POST['filter_classID'];
    $filter_subject = $_POST['filter_subject'];
    $filter_region = $_POST['filter_region'];
    $filter_topic = $_POST['filter_topic'];
    $filter_sub_topic = $_POST['filter_sub_topic'];
    $questionCategory = $_POST['questionCategory'];

    $queryQuestion = mysqli_query($link, "SELECT * FROM edumessquestionbank
                                        WHERE edumessquestionbank.ClassTemplateID = '$filter_classID'
                                        AND edumessquestionbank.SubjectOrCourseID = '$filter_subject'
                                        AND edumessquestionbank.Question_type = '$questionCategory'
                                        AND (edumessquestionbank.schemeofworkregionID = '$filter_region' OR $filter_region IS NULL)
                                        AND (edumessquestionbank.CurriculumSubTopic = '$filter_sub_topic' OR $filter_sub_topic IS NULL)
                                        AND (edumessquestionbank.CurriculumTopicID = '$filter_topic' OR $filter_topic IS NULL)
                                        ORDER BY QuestionBankID ASC");

    $fetchQuestion = mysqli_fetch_assoc($queryQuestion);
    $rowQuestion = mysqli_num_rows($queryQuestion);

    if($rowQuestion > 0){

        $questiontype = $fetchQuestion['Question_type'];

        if($questiontype == 'Objective'){

            echo '<div class="row">';

            $count = 1;
            $num = 1;

            do{

                $QuestionBankID = $fetchQuestion['QuestionBankID'];
                $question = $fetchQuestion['Question'];
                $optionA = $fetchQuestion['optionA'];
                $optionB = $fetchQuestion['optionB'];
                $optionC = $fetchQuestion['optionC'];
                $optionD = $fetchQuestion['optionD'];

                echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <div class="card question_card" data-count="'.$num++.'" data-id="'.$QuestionBankID.'">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Question '.$count++.'</h5>
                            </div>
                            <div class="card-text">
                                <p>'.$question.'</p>
                            </div>
                            <div class="card-text">
                                <form class="question_option">
                                    <label class="mx-auto">
                                        <p class="me-2">A.</p>'.$optionA.'
                                    </label>
                                    <label class="mx-auto">
                                        <p class="me-2">B.</p> '.$optionB.'
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

            }while($fetchQuestion = mysqli_fetch_assoc($queryQuestion));
            echo '</div>';
        }elseif($questiontype == 'Theory'){

            echo '<div class="row">';

            $count2 = 1;
            $num2 = 1;
           
            do{

                $question2 = $fetchQuestion['Question'];
                $QuestionBankID2 = $fetchQuestion['QuestionBankID'];

                echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-1">
                        <div class="card question_card" data-count="'.$num2++.'" data-id="'.$QuestionBankID2.'">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Question '.$count2 ++.'</h5>
                            </div>
                            <div class="card-text">
                                <p>'.$question2.'</p>
                            </div>
                        </div>
                    </div>
                </div>';

            }while($fetchQuestion = mysqli_fetch_assoc($queryQuestion));
            echo '</div>';
        }else{
            echo 'Others';
        }

    }else{
        echo '<img src="error.png" class="img-fluid mx-auto d-block" alt="...">
        <figure class="text-center">
            <blockquote class="blockquote">
            <p>Opps, No Question AVailable for this Class and Subject.</p>
            </blockquote>
        </figure>'; 
    }

?>