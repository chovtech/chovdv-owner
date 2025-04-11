<?php
    include('../../../config/config.php');

    $campus_id = trim($_POST['campus_id']);
    $sectionID = trim($_POST['sectionID']);
    $term = trim($_POST['term']);
    $topic = trim($_POST['topic']);
    $subjectID = trim($_POST['subjectID']);
    $sub_topic = trim($_POST['sub_topic']);
    $class_id = $_POST['class_id'];
    $category = trim($_POST['category']);
    $questionNumber = $_POST['questionNumber'];



    $campustoimported = $_POST['campustoimported'];
    $pros_settingspurpose = $_POST['pros_settingspurpose'];
    $InstitutionID = $_POST['tari_get_stored_instituion_id'];


  

     $new_class = implode(',',$class_id);

   


        if($category == 'Objective'){



                 if($campustoimported == 'all')
                 {


                    $check_Question = "SELECT *
                    FROM    `questionbank` 
                    WHERE   InstitutionID = '$InstitutionID' 
                    AND     SectionID = '$sectionID'
                    AND     ClassOrDepartmentID IN ($new_class)
                    AND     TermOrSemesterID = '$term' 
                    AND     SubjectOrCourseID = '$subjectID'
                    AND     QuestionType = '$category'
                    AND     (CurriculumTopicID = '$topic' OR $topic IS NULL)
                    AND     (CurriculumSubTopic = $sub_topic OR $sub_topic IS NULL)
                    ORDER BY RAND()";

                 }else
                 {

                        $check_Question = "SELECT *
                        FROM    `questionbank` 
                        WHERE   CampusID = '$campustoimported' 
                        AND     SectionID = '$sectionID'
                        AND     ClassOrDepartmentID IN ($new_class)
                        AND     TermOrSemesterID = '$term' 
                        AND     SubjectOrCourseID = '$subjectID'
                        AND     QuestionType = '$category'
                        AND     (CurriculumTopicID = '$topic' OR $topic IS NULL)
                        AND     (CurriculumSubTopic = $sub_topic OR $sub_topic IS NULL)
                        ORDER BY RAND()";

                 }

         

            $query_question = mysqli_query($link,$check_Question);
            $row_question = mysqli_num_rows($query_question);
            $fetch_question = mysqli_fetch_assoc($query_question);

            $QuestionCategory =  $fetch_question['QuestionCategory'];

            $num=1;
            $count=1;
            $nummmm=1;


            if($fetch_question > 0)
            {

                do{

                    $question =  $fetch_question['question'];
                    $questionID = $fetch_question['QuestionBankID'];

                    $optionA =  $fetch_question['optionA'];
                    $optionB =  $fetch_question['optionB'];
                    $optionC =  $fetch_question['optionC'];
                    $optionD =  $fetch_question['optionD'];
                    $answer =   $fetch_question['answer'];

                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                                    <div class="card question_card2 tari_quescheck'.$nummmm++.'"  data-count="'.$num++.'" data-ans="'.$answer.'" data-id="'.$questionID.'">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h5 class="fw-bold">Question '.$count++.'</h5>
                                        </div>
                                        <div class="card-text">
                                            <p class="fw-light-bold">'.$question.'</p>
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

                }while($fetch_question = mysqli_fetch_assoc($query_question));
            }

        }elseif($category == 'Theory'){






            if($campustoimported == 'all')
            {


                $check_Question = "SELECT *
                FROM    `questionbank` 
                WHERE    InstitutionID = '$InstitutionID' 
                AND     SectionID = '$sectionID'
                AND     ClassOrDepartmentID IN ($new_class)
                AND     TermOrSemesterID = '$term' 
                AND     SubjectOrCourseID = '$subjectID'
                AND     QuestionType = '$category'
                AND     (CurriculumTopicID = '$topic' OR $topic IS NULL)
                AND     (CurriculumSubTopic = $sub_topic OR $sub_topic IS NULL)
                ORDER BY RAND()";


            }else
            {


                $check_Question = "SELECT *
                FROM    `questionbank` 
                WHERE   CampusID = '$campustoimported' 
                AND     SectionID = '$sectionID'
                AND     ClassOrDepartmentID IN ($new_class)
                AND     TermOrSemesterID = '$term' 
                AND     SubjectOrCourseID = '$subjectID'
                AND     QuestionType = '$category'
                AND     (CurriculumTopicID = '$topic' OR $topic IS NULL)
                AND     (CurriculumSubTopic = $sub_topic OR $sub_topic IS NULL)
                ORDER BY RAND()";

            }



          

            $query_question = mysqli_query($link,$check_Question);
            $row_question = mysqli_num_rows($query_question);
            $fetch_question = mysqli_fetch_assoc($query_question);

            $QuestionCategory =  $fetch_question['QuestionCategory'];

            $num=1;
            $count=1;
            $nummmm=1;


            do{

                $question2 =  $fetch_question['question'];
                $questionID2 = $fetch_question['QuestionBankID'];

                echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-1">
                    <div class="card question_card3 tari_quescheck'.$nummmm++.'"  data-count="'.$num++.'" data-id="'.$questionID2.'">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Question '.$count++.'</h5>
                        </div>
                        <div class="card-text">
                            <p>'.$question2.'</p>
                        </div>
                    </div>
                </div>
            </div>';

            }while($fetch_question = mysqli_fetch_assoc($query_question));
            
        }elseif($category == 'Both'){





            if($campustoimported == 'all')
            {


                    $check_Question = "SELECT *
                    FROM    `questionbank` 
                    WHERE   InstitutionID = '$InstitutionID' 
                    AND     SectionID = '$sectionID'
                    AND     ClassOrDepartmentID IN ($new_class)
                    AND     TermOrSemesterID = '$term' 
                    AND     SubjectOrCourseID = '$subjectID'
                    AND     (CurriculumTopicID = '$topic' OR $topic IS NULL)
                    AND     (CurriculumSubTopic = $sub_topic OR $sub_topic IS NULL)
                    ORDER BY `QuestionBankID` ASC, RAND()";


            }else
            {

                        $check_Question = "SELECT *
                        FROM    `questionbank` 
                        WHERE   CampusID = '$campustoimported' 
                        AND     SectionID = '$sectionID'
                        AND     ClassOrDepartmentID IN ($new_class)
                        AND     TermOrSemesterID = '$term' 
                        AND     SubjectOrCourseID = '$subjectID'
                        AND     (CurriculumTopicID = '$topic' OR $topic IS NULL)
                        AND     (CurriculumSubTopic = $sub_topic OR $sub_topic IS NULL)
                        ORDER BY `QuestionBankID` ASC, RAND()";



            }
         

            $query_question = mysqli_query($link,$check_Question);
            $row_question = mysqli_num_rows($query_question);
            $fetch_question = mysqli_fetch_assoc($query_question);

            $num=1;
            $count=1;
            $nummmm=1;

            if($fetch_question > 0)
            {

                do{

                $QuestionCategory =  $fetch_question['QuestionType'];

                if( $QuestionCategory == 'Objective'){

                    

                        $question =  $fetch_question['question'];
                        $questionID = $fetch_question['QuestionBankID'];
            
                        $optionA =  $fetch_question['optionA'];
                        $optionB =  $fetch_question['optionB'];
                        $optionC =  $fetch_question['optionC'];
                        $optionD =  $fetch_question['optionD'];
                        $answer =   $fetch_question['answer'];

                        echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                                        <div class="card question_card2 tari_quescheck'.$nummmm++.'"  data-count="'.$num++.'" data-ans="'.$answer.'" data-id="'.$questionID.'">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h5 class="fw-bold">Question '.$count++.'</h5>
                                            </div>
                                            <div class="card-text">
                                                <p class="fw-light-bold">'.$question.'</p>
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

                    }

                if($QuestionCategory == 'Theory'){

                    $question2 =  $fetch_question['question'];
                    $questionID2 = $fetch_question['QuestionBankID'];

                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-1">
                        <div class="card question_card3 tari_quescheck'.$nummmm++.'"  data-count="'.$num++.'" data-id="'.$questionID2.'">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Question '.$count++.'</h5>
                            </div>
                            <div class="card-text">
                                <p>'.$question2.'</p>
                            </div>
                        </div>
                    </div>
                </div>';

                }
            }while($fetch_question = mysqli_fetch_assoc($query_question));
        }

    }else{
        echo 'No';
    }
    
?>
