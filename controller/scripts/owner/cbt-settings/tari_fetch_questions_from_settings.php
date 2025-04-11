<?php

    include('../../../config/config.php');

    $settingsID = trim($_POST['settingsID']);

    $campusID = trim($_POST['campusID']);
    $subjectID = trim($_POST['subjectID']);
    $classID = trim($_POST['classID']);
    $termID = trim($_POST['termID']);
    $category = trim($_POST['category']);
    


    
    $prosloadquestion = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` WHERE cbtsetquestionssettingsID='$settingsID' AND CampusID='$campusID'");
    $prosloadquestion_cnt = mysqli_num_rows($prosloadquestion);

    $prosloadquestion_cntrow = mysqli_fetch_assoc($prosloadquestion);



    $AssesementTitlenew = $prosloadquestion_cntrow['AssesementType'];
   


       if($AssesementTitlenew === 'Admission')
       {

            $ClassTemplateID = $classID;
      


       }else
       {


                $pros_select_class = mysqli_query($link, "SELECT * FROM `classordepartment` WHERE ClassOrDepartmentID='$classID' AND CampusID='$campusID'");
                $pros_select_class_cnt = mysqli_num_rows($pros_select_class);
                $pros_select_class_cnt_row = mysqli_fetch_assoc($pros_select_class);
            
                $ClassTemplateID = $pros_select_class_cnt_row['ClassTemplateID'];
      

       }



       

    if($category == 'Objective'){

        $fetch = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` 
                                WHERE `cbtsetquestionssettingsID` =  '$settingsID'
                                AND   `CampusID` =  '$campusID'
                                ORDER BY `cbtsetquestionssettings`.`cbtsetquestionssettingsID` DESC");

        $num_row = mysqli_num_rows($fetch);
        $fetch_row = mysqli_fetch_assoc($fetch);

        if($num_row > 0){



             $questionID = $fetch_row['question'];
            $AssesementCategory = $fetch_row['AssesementCategory'];

            $num=1;

            // Get Selected Questions
            $fetchQ = mysqli_query($link,"SELECT * FROM `questionbank` 
                    WHERE  `QuestionBankID` IN ($questionID)
                    AND    `CampusID` =  '$campusID'
                    AND    `SubjectOrCourseID` =  '$subjectID'
                    AND     `ClassOrDepartmentID` =  '$ClassTemplateID'
                    AND    `TermOrSemesterID` =  '$termID'
                    AND    `QuestionType` =  '$AssesementCategory'");

             $num_rowQ = mysqli_num_rows($fetchQ);
             $fetch_rowQ = mysqli_fetch_assoc($fetchQ); 

            if($num_rowQ > 0){

                do{

                    $QuestionBankID = $fetch_rowQ['QuestionBankID'];

                    $question = $fetch_rowQ['question'];
                    $optionA = $fetch_rowQ['optionA'];
                    $optionB = $fetch_rowQ['optionB'];
                    $optionC = $fetch_rowQ['optionC'];
                    $optionD = $fetch_rowQ['optionD'];
                    $answer = $fetch_rowQ['answer'];

                    $selected  = 'selected';

                        echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                        <div class="card question_card2 '.$selected.'"  data-count="" data-ans="'.$answer.'" data-id="'.$QuestionBankID.'">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="fw-bold">Question '.$num++.'</h5>
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

                }while($fetch_rowQ = mysqli_fetch_assoc($fetchQ));

            }

            // Get NON Selected Questions
            $fetchQ1 = mysqli_query($link,"SELECT * FROM `questionbank` 
                    WHERE   `QuestionBankID` NOT IN ($questionID)
                    AND     `CampusID` =  '$campusID'
                    AND     `SubjectOrCourseID` =  '$subjectID'
                    AND    `ClassOrDepartmentID` =  '$ClassTemplateID'
                    AND    `TermOrSemesterID` =  '$termID'
                    AND    `QuestionType` =  '$AssesementCategory'");

            $num_rowQ1 = mysqli_num_rows($fetchQ1);
            $fetch_rowQ1 = mysqli_fetch_assoc($fetchQ1); 

            if($num_rowQ1 > 0){

                do{
                    $QuestionBankID1 = $fetch_rowQ1['QuestionBankID'];

                    $question1 = $fetch_rowQ1['question'];
                    $optionA1 = $fetch_rowQ1['optionA'];
                    $optionB1 = $fetch_rowQ1['optionB'];
                    $optionC1 = $fetch_rowQ1['optionC'];
                    $optionD1 = $fetch_rowQ1['optionD'];
                    $answer1 = $fetch_rowQ1['answer'];



                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                    <div class="card question_card2"  data-ans="'.$answer1.'" data-id="'.$QuestionBankID1.'">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="fw-bold">Question '.$num++.'</h5>
                        </div>
                        <div class="card-text">
                            <p class="fw-light-bold">'.$question1.'</p>
                        </div>
                        <div class="card-text">
                            <form class="question_option">
                                <label class="mx-auto">
                                    <p class="me-2">A.</p>'.$optionA1.'
                                </label>
                                <label class="mx-auto">
                                    <p class="me-2">B.</p> '.$optionB1.'
                                </label>
                                <label class="mx-auto">
                                    <p class="me-2">C.</p>'.$optionC1.' 
                                </label>
                                <label class="mx-auto">
                                    <p class="me-2">D.</p>'.$optionD1.'
                                </label>
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>';

                }while($fetch_rowQ1 = mysqli_fetch_assoc($fetchQ1));

            }

            

        }

    }
    elseif($category == 'Theory'){

        $fetch = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` 
                                    WHERE `cbtsetquestionssettingsID` =  '$settingsID'
                                    AND  CampusID =  '$campusID'
                                    ORDER BY `cbtsetquestionssettingsID` DESC");

        $num_row = mysqli_num_rows($fetch);
        $fetch_row = mysqli_fetch_assoc($fetch);

        if($num_row > 0){

            $num=1;

            $AssesementCategory = $fetch_row['AssesementCategory'];
            $TheoryQuestionID = $fetch_row['TheoryQuestion'];


            // Get Selected Questions
            $fetchQ = mysqli_query($link,"SELECT * FROM `questionbank` 
                                        WHERE   `QuestionBankID` IN ($TheoryQuestionID)
                                        AND     `CampusID` =  '$campusID'
                                        AND     `SubjectOrCourseID` =  '$subjectID'
                                        AND    `ClassOrDepartmentID` =  '$ClassTemplateID'
                                        AND     `TermOrSemesterID` =  '$termID'
                                        AND    `QuestionType` =  '$AssesementCategory'");

            $num_rowQ = mysqli_num_rows($fetchQ);
            $fetch_rowQ = mysqli_fetch_assoc($fetchQ); 

            if($num_rowQ > 0){

                do{

                    $QuestionBankID = $fetch_rowQ['QuestionBankID'];
                    $question = $fetch_rowQ['question'];

                    $selected  = 'selected2';

                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                            <div class="card question_card3 '.$selected.'"  data-id="'.$QuestionBankID.'">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5 class="fw-bold">Question '.$num++.'</h5>
                                    </div>
                                    <div class="card-text">
                                        <p class="fw-light-bold">'.$question.'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';

                }while($fetch_rowQ = mysqli_fetch_assoc($fetchQ));

            }

            // Get NON Selected Questions
            $fetchQ1 = mysqli_query($link,"SELECT * FROM `questionbank` 
                                        WHERE    `QuestionBankID` NOT IN ($TheoryQuestionID)
                                        AND     `CampusID` =  '$campusID'
                                        AND    `SubjectOrCourseID` =  '$subjectID'
                                        AND   `ClassOrDepartmentID` =  '$ClassTemplateID'
                                        AND     `TermOrSemesterID` =  '$termID'
                                        AND    `QuestionType` =  '$AssesementCategory'");

            $num_rowQ1 = mysqli_num_rows($fetchQ1);
            $fetch_rowQ1 = mysqli_fetch_assoc($fetchQ1); 

            if($num_rowQ1 > 0){

                do{
                    $QuestionBankID1 = $fetch_rowQ1['QuestionBankID'];
                    $question1 = $fetch_rowQ1['question'];
                    

                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                            <div class="card question_card3"  data-count="" data-id="'.$QuestionBankID1.'">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5 class="fw-bold">Question '.$num++.'</h5>
                                    </div>
                                    <div class="card-text">
                                        <p class="fw-light-bold">'.$question1.'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';

                }while($fetch_rowQ1 = mysqli_fetch_assoc($fetchQ1));

            }
        }

    }
    elseif($category == 'Both'){
        
        $fetch = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` 
                                    WHERE `cbtsetquestionssettingsID` =  '$settingsID'
                                    AND   `CampusID` =  '$campusID'
                                    ORDER BY `cbtsetquestionssettings`.`cbtsetquestionssettingsID` DESC");

        $num_row = mysqli_num_rows($fetch);
        $fetch_row = mysqli_fetch_assoc($fetch);


        $num=1;

        // GET OBJECTIVE QUESTIONS
        if($num_row > 0){

            $questionID = $fetch_row['question'];
            $questionCategory = 'Objective';

            // Get Selected Objective Questions
            $fetchQ = mysqli_query($link,"SELECT * FROM `questionbank` 
                                            WHERE   `QuestionBankID` IN ($questionID)
                                            AND     `CampusID` =  '$campusID'
                                            AND    `SubjectOrCourseID` =  '$subjectID'
                                            AND     `ClassOrDepartmentID` =  '$ClassTemplateID'
                                            AND    `TermOrSemesterID` =  '$termID'
                                            AND     `QuestionType` = '$questionCategory'");

            $num_rowQ = mysqli_num_rows($fetchQ);
            $fetch_rowQ = mysqli_fetch_assoc($fetchQ); 

            if($num_rowQ > 0){

                do{

                    $QuestionBankID = $fetch_rowQ['QuestionBankID'];
                    

                    $question = $fetch_rowQ['question'];
                    $optionA = $fetch_rowQ['optionA'];
                    $optionB = $fetch_rowQ['optionB'];
                    $optionC = $fetch_rowQ['optionC'];
                    $optionD = $fetch_rowQ['optionD'];
                    $answer = $fetch_rowQ['answer'];

                    $selected  = 'selected';

                        echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                        <div class="card question_card2 '.$selected.'"  data-count="" data-ans="'.$answer.'" data-id="'.$QuestionBankID.'">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="fw-bold">Question '.$num++.'</h5>
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

                }while($fetch_rowQ = mysqli_fetch_assoc($fetchQ));

            }

            // Get NON Selected Objective Questions
            $fetchQ1 = mysqli_query($link,"SELECT * FROM `questionbank` 
                    WHERE    `QuestionBankID` NOT IN ($questionID)
                    AND     `CampusID` =  '$campusID'
                    AND    `SubjectOrCourseID` =  '$subjectID'
                    AND     `ClassOrDepartmentID` =  '$ClassTemplateID'
                    AND    `TermOrSemesterID` =  '$termID'
                    AND     `QuestionType` = '$questionCategory'");

            $num_rowQ1 = mysqli_num_rows($fetchQ1);
            $fetch_rowQ1 = mysqli_fetch_assoc($fetchQ1); 

            if($num_rowQ1 > 0){

                do{
                    $QuestionBankID1 = $fetch_rowQ1['QuestionBankID'];

                    $question1 = $fetch_rowQ1['question'];
                    $optionA1 = $fetch_rowQ1['optionA'];
                    $optionB1 = $fetch_rowQ1['optionB'];
                    $optionC1 = $fetch_rowQ1['optionC'];
                    $optionD1 = $fetch_rowQ1['optionD'];
                    $answer1 = $fetch_rowQ1['answer'];



                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                    <div class="card question_card2"  data-ans="'.$answer1.'" data-id="'.$QuestionBankID1.'">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="fw-bold">Question '.$num++.'</h5>
                        </div>
                        <div class="card-text">
                            <p class="fw-light-bold">'.$question1.'</p>
                        </div>
                        <div class="card-text">
                            <form class="question_option">
                                <label class="mx-auto">
                                    <p class="me-2">A.</p>'.$optionA1.'
                                </label>
                                <label class="mx-auto">
                                    <p class="me-2">B.</p> '.$optionB1.'
                                </label>
                                <label class="mx-auto">
                                    <p class="me-2">C.</p>'.$optionC1.' 
                                </label>
                                <label class="mx-auto">
                                    <p class="me-2">D.</p>'.$optionD1.'
                                </label>
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>';

                }while($fetch_rowQ1 = mysqli_fetch_assoc($fetchQ1));

            }

            

        }

        // GET THEORY QUESTIONS
        if($num_row > 0){

            $TheoryQuestionID = $fetch_row['TheoryQuestion'];
            $questionCategory = 'Theory';

             // Get Selected Theory Questions
            $fetchQ = mysqli_query($link,"SELECT * FROM `questionbank` 
                                        WHERE   `QuestionBankID` IN ($TheoryQuestionID)
                                        AND     `CampusID` =  '$campusID'
                                        AND    `SubjectOrCourseID` =  '$subjectID'
                                        AND    `ClassOrDepartmentID` =  '$ClassTemplateID'
                                        AND    `TermOrSemesterID` =  '$termID'
                                        AND     `QuestionType` = '$questionCategory'");

            $num_rowQ = mysqli_num_rows($fetchQ);
            $fetch_rowQ = mysqli_fetch_assoc($fetchQ); 

            if($num_rowQ > 0){

                do{

                    $QuestionBankID = $fetch_rowQ['QuestionBankID'];
                    $question = $fetch_rowQ['question'];

                    $selected2  = "selected2";

                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                    <div class="card question_card3 '.$selected2.'" data-id="'.$QuestionBankID.'">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="fw-bold">Question '.$num++.'</h5>
                            </div>
                            <div class="card-text">
                                <p class="fw-light-bold">'.$question.'</p>
                            </div>
                        </div>
                    </div>
                    </div>';

                }while($fetch_rowQ = mysqli_fetch_assoc($fetchQ));

            }

            // Get NON Selected Theory Questions
            $fetchQ1 = mysqli_query($link,"SELECT * FROM `questionbank` 
                        WHERE    `QuestionBankID` NOT IN ($TheoryQuestionID)
                        AND     `CampusID` =  '$campusID'
                        AND     `SubjectOrCourseID` =  '$subjectID'
                        AND    `ClassOrDepartmentID` =  '$ClassTemplateID'
                        AND     `TermOrSemesterID` =  '$termID'
                        AND    `QuestionType` = '$questionCategory'");

            $num_rowQ1 = mysqli_num_rows($fetchQ1);
            $fetch_rowQ1 = mysqli_fetch_assoc($fetchQ1); 

            if($num_rowQ1 > 0){

                do{

                $QuestionBankID1 = $fetch_rowQ1['QuestionBankID'];
                $question1 = $fetch_rowQ1['question'];


                echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 queque">
                <div class="card question_card3"  data-id="'.$QuestionBankID1.'">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="fw-bold">Question '.$num++.'</h5>
                        </div>
                        <div class="card-text">
                            <p class="fw-light-bold">'.$question1.'</p>
                        </div>
                    </div>
                </div>
                </div>';

                }while($fetch_rowQ1 = mysqli_fetch_assoc($fetchQ1));

            }
        }
        
        
    }



    

    

?>
