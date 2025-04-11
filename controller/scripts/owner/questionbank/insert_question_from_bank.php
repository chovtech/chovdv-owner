<?php
include('../../../config/config.php');

    $QuestionID = $_POST['cards'];
    $QuestionNum = $_POST['nums'];

    // print_r($QuestionID);


    $pros_get_stored_instituion_id = $_POST['tari_get_stored_instituion_id'];
    $campus_id = $_POST['campus_id'];
    $class_id = $_POST['class_id'];
    $subject_id = $_POST['subject_id'];
    $term = $_POST['term'];
    $topic = $_POST['topic'];
    $sub_topic = $_POST['sub_topic'];
    $questionType = $_POST['questionType'];
    $questionCategory = $_POST['questionCategory'];
     $section_id = $_POST['section_id'];
    
    $userType = $_POST['userType'];

    // print_r($breakNum2);



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



    $countexist = 0;   
    $countinsert = 0;  
    $failedstatus = 0;  

    $countexistarray =  array();   
    $countinsertarray = array();
    
        foreach($QuestionID as $i => $key)
        {
            $key;
            $num = $QuestionNum[$i];

            $getQuestions =  mysqli_query($link,"SELECT * FROM edumessquestionbank WHERE QuestionBankID = '$key'");
            $fetchQuestion = mysqli_fetch_assoc($getQuestions);
            $rowQuestion = mysqli_num_rows($getQuestions);

            $QuestionBankID = $fetchQuestion['QuestionBankID'];
             $Question_type = $fetchQuestion['Question_type'];

           $Question = mysqli_real_escape_string($link,$fetchQuestion['Question']);
            $optionA = mysqli_real_escape_string($link,$fetchQuestion['optionA']);
            $optionB = mysqli_real_escape_string($link,$fetchQuestion['optionB']);
            $optionC = mysqli_real_escape_string($link,$fetchQuestion['optionC']);
            $optionD = mysqli_real_escape_string($link,$fetchQuestion['optionD']);
            $answer = mysqli_real_escape_string($link,$fetchQuestion['answer']);

             $currentDate = date('Y-m-d');

                if($Question_type == 'Objective'){

                    $checkQuestions =  mysqli_query($link,"SELECT * FROM `questionbank` WHERE `question` = '$Question' AND  `CampusID` = '$campus_id'  AND `optionA` = '$optionA' AND `ClassOrDepartmentID`='$class_id' AND `SubjectOrCourseID`='$subject_id' AND `TermOrSemesterID`='$term'");
                                                           
                                                           
                    $checkfetchQuestion = mysqli_fetch_assoc($checkQuestions);
                    $checkrowQuestion = mysqli_num_rows($checkQuestions);

                   if($checkrowQuestion > 0){


                        $countexist++;
                        $countexistarray[] = $num; 



                   }else{



                            $countinsert++;  
                            $countinsertarray[] = $num;


                            $inserQuestion = mysqli_query($link, "INSERT INTO `questionbank` 
                            (`InstitutionID`, `CampusID`, `CourseOrSubjectTeacherUserID`, `UserType`, `sessionID`,
                            `TermOrSemesterID`, `SectionID`, `ClassOrDepartmentID`, `SubjectOrCourseID`, `CurriculumTopicID`, `CurriculumSubTopic`, `QuestionType`, `QuestionCategory`,
                            `question`, `optionA`, `optionB`, `optionC`, `optionD`, `answer`, `DateCreated`) 
                            VALUES ('$pros_get_stored_instituion_id', '$campus_id', '$subject_id', '$userType', '$sessioncreated',
                            '$term', '$section_id', '$class_id', '$subject_id', '$topic', '$sub_topic', '$questionType', '$questionCategory',
                            '$Question', '$optionA', '$optionB', '$optionC', '$optionD', '$answer', '$currentDate')");


                            if($inserQuestion == true)
                            {
                  
                            }else
                            {
                                $failedstatus ++;
                            }
                
                   }
        

                }elseif($Question_type == 'Theory'){



                    $checkQuestions =  mysqli_query($link,"SELECT * FROM `questionbank` WHERE `question` = '$Question' AND `ClassOrDepartmentID`='$class_id' AND `SubjectOrCourseID`='$subject_id' AND `TermOrSemesterID`='$term' ");
                    $checkfetchQuestion = mysqli_fetch_assoc($checkQuestions);
                    $checkrowQuestion = mysqli_num_rows($checkQuestions);

                   if($checkrowQuestion > 0){

                        $countexist++;
                        $countexistarray[] = $num; 

                   }else{




                            $countinsert++;  
                            $countinsertarray [] = $num;


                            $inserQuestion = mysqli_query($link, "INSERT INTO `questionbank` (`InstitutionID`,`CampusID`,`CourseOrSubjectTeacherUserID`,`UserType`,
                                                        `TermOrSemesterID`,`SectionID`,`ClassOrDepartmentID`,`SubjectOrCourseID`,`CurriculumTopicID`,`CurriculumSubTopic`,`QuestionType`,`QuestionCategory`,
                                                        `question`,`DateCreated`) 
                            VALUES('$pros_get_stored_instituion_id','$campus_id','$subject_id','$userType','$term','$section_id','$class_id','$subject_id','$topic','$sub_topic', '$questionType','$questionCategory',
                                   '$Question','$currentDate')");



                           if($inserQuestion == true)
                            {
                  
                            }else
                            {
                                $failedstatus ++;
                            }
                }


                }
        }
        

        //   if( $inserQuestion  == true)
      
        //   if (!$inserQuestion ) {
        //     die('Error: ' . mysqli_error($link));
        // }

     


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