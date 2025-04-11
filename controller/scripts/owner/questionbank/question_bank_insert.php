<?php 

    include ('../../../config/config.php');

        $pros_get_stored_instituion_id = $_POST['tari_get_stored_instituion_id'];
        $ownerID = $_POST['ownerID'];
        $campus_id = $_POST['campus_id'];
        $subject_id = $_POST['subject_id'];
        $class_id = $_POST['class_id'];
        $term = $_POST['term'];
        $topic = $_POST['topic'];
        $sub_topic = $_POST['sub_topic'];
        $types = $_POST['types'];
        $category = $_POST['category'];
        $section_id = $_POST['section_id'];
        $userType = $_POST['userType'];
        $questionNumber = $_POST['question_card'];


        $class = explode("||##,",$_POST['question']);
        $text = $_POST['question'];
        $textareaVal = explode("||##,",$text);
        $arrclasslength = sizeof($class);



        // PROS GET CURRENT SESSION HERE

        $select_session = mysqli_query($link,"SELECT * FROM `session` WHERE `sessionStatus`='1'");
        $seleactsessioncntrow = mysqli_fetch_assoc($select_session);
        $seleactsessioncntrowcnt = mysqli_num_rows($select_session);


        if($seleactsessioncntrowcnt > 0 )
        {

            $sessioncreated =  $seleactsessioncntrow ['sessionName'];

        }else
        {
                $sessioncreated =  '';

        }


       

        if($types == 'Objective'){
          
            $optionAVal = $_POST['optionA'];
            $optionAVal = $_POST['optionA'];
            $optionBVal = $_POST['optionB'];
            $optionCVal = $_POST['optionC'];
            $optionDVal = $_POST['optionD'];
            $selectVal = $_POST['select'];
            $date = date("m-d-y");


            $countexist = 0;   
            $countinsert = 0;  
        
            $countexistarray =  array();   
            $countinsertarray = array();



            for($i=0; $i < $arrclasslength; $i++){
                
                $classarr = $class[$i];

                    $textareaValarr = $textareaVal[$i];
                    $optionAValarr = explode("||##,",$optionAVal)[$i];
                    $optionBValarr = explode("||##,",$optionBVal)[$i];
                    $optionCValarr = explode("||##,",$optionCVal)[$i];
                    $optionDValarr = explode("||##,",$optionDVal)[$i];
                    $selectValarr = explode(",",$selectVal)[$i];
                    
                    $question =  mysqli_real_escape_string($link,str_replace('||##','',$textareaValarr));
                    $optionA =  mysqli_real_escape_string($link,str_replace('||##','',$optionAValarr));
                    $optionB =  mysqli_real_escape_string($link,str_replace('||##','',$optionBValarr));
                    $optionC =  mysqli_real_escape_string($link,str_replace('||##','',$optionCValarr));
                    $optionD =  mysqli_real_escape_string($link,str_replace('||##','',$optionDValarr));


                    $checkQuestions =  mysqli_query($link,"SELECT * FROM `questionbank` WHERE `question` = '$question' AND
                                                           `CampusID` = '$campus_id'
                                                            AND `optionA` = '$optionA'
                                                            AND `optionB` = '$optionB'
                                                            AND `optionC` = '$optionC'
                                                            AND `optionD` = '$optionD' AND `ClassOrDepartmentID`='$class_id' AND `SubjectOrCourseID`='$subject_id' AND `TermOrSemesterID`='$term'");
                    $checkfetchQuestion = mysqli_fetch_assoc($checkQuestions);
                    $checkrowQuestion = mysqli_num_rows($checkQuestions);

                    if($checkrowQuestion > 0){

                        $countexist++;
                        $countexistarray[] = $classarr; 

                    }else{
                    
                        $countinsert++;  
                        $countinsertarray [] = $classarr;

                        $insert = "INSERT INTO `questionbank`(`InstitutionID`, `CampusID`,`CourseOrSubjectTeacherUserID`,`UserType`, `sessionID`, `TermOrSemesterID`,`SectionID`,`ClassOrDepartmentID`, `SubjectOrCourseID`, `CurriculumTopicID`, `CurriculumSubTopic`, `QuestionType`,`QuestionCategory`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `answer`,`DateCreated`)
                                    VALUES ('$pros_get_stored_instituion_id','$campus_id','$ownerID','$userType', '$sessioncreated', '$term','$section_id','$class_id','$subject_id','$topic','$sub_topic', '$types', '$category','$question','$optionA','$optionB','$optionC','$optionD','$selectValarr','$date')";
                        $insertQuery = mysqli_query($link,$insert);

                    }

                
            }

         


        }elseif($types == 'Theory'){



            $date = date("m-d-y");

            $countexist = 0;   
            $countinsert = 0;  
        
            $countexistarray =  array();   
            $countinsertarray = array();


            for($i=0; $i < $arrclasslength; $i++){
                                    
                    $classarr = $class[$i];
                    
                    $textareaValarr = $textareaVal[$i];
                    $question =   mysqli_real_escape_string($link,str_replace('||##','',$textareaValarr));

                    $checkQuestions =  mysqli_query($link,"SELECT * FROM `questionbank` WHERE `question` = '$question' AND CampusID = '$campus_id' AND `ClassOrDepartmentID`='$class_id' AND `SubjectOrCourseID`='$subject_id' AND `TermOrSemesterID`='$term'");
                    $checkfetchQuestion = mysqli_fetch_assoc($checkQuestions);
                    $checkrowQuestion = mysqli_num_rows($checkQuestions);

                   if($checkrowQuestion > 0){
                        $countexist++;
                        $countexistarray[] = $classarr; 

                   }else{

                    $countinsert++;  
                    $countinsertarray [] = $classarr;
                    
                    $insert = "INSERT INTO `questionbank`(`InstitutionID`, `CampusID`,`CourseOrSubjectTeacherUserID`,`UserType`, `sessionID`, `TermOrSemesterID`,`SectionID`,`ClassOrDepartmentID`,`SubjectOrCourseID`,`CurriculumTopicID`,`CurriculumSubTopic`,`QuestionType`,`QuestionCategory`,`question`,`DateCreated`)
                                            VALUES ('$pros_get_stored_instituion_id','$campus_id','$ownerID','$userType','$sessioncreated', '$term','$section_id','$class_id','$subject_id','$topic','$sub_topic', '$types', '$category','$question','$date')";
                    $insertQuery = mysqli_query($link,$insert);

                   }

                
            }


            
        }


        
        if($countexist > 0 &&   $countinsert == '0'){

            echo '1';
        }else if($countexist > 0 &&   $countinsert > 0)
        
        {
            echo '2';

        }else if($countinsert > 0 && $countexist  == '0')
        {
                    echo '3';
        }else
        {
            echo '4';
        }
        
       


       

?>