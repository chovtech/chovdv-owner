<?php
    include('../../../config/config.php');

    $userID = trim($_POST['userID']);
     
    $campus_id = trim($_POST['campus_id']);
    $session = trim($_POST['session']);
    $sectionID = trim($_POST['sectionID']);
    $term = trim($_POST['term']);
    $topic = trim($_POST['topic']);
    $subjectID = trim($_POST['subjectID']);
    $sub_topic = trim($_POST['sub_topic']);
    $class_id = $_POST['class_id'];
    $class_idmain = $_POST['class_idmain'];



    if( $topic  == 'NULL')
    {  
        $newtopic = 0;
    }else{
        $newtopic = $topic;
    }

    if( $topic  == 'NULL')
    {  
        $newsub_topic = 0;
    }else{
        $newsub_topic = $sub_topic;
    }

    
    if($topic == 'NULL')
    {
        $topicnew = '0';
    }else
    {
        $topicnew = $topic;
    }


    
    if($sub_topic  == 'NULL')
    {
        $sub_topicnew  = '0';
    }else
    {
         $sub_topicnew  =  $sub_topic ;
    }

  

  
    
    $category = trim($_POST['category']);

    $automatic = trim($_POST['automatic']);
    $shuffle = trim($_POST['shuffle']);
    $date = trim($_POST['date']);
    $title = trim($_POST['title']);
    $type = trim($_POST['type']);
    $timeIN = trim($_POST['timeIN']);
    $timeOUT = trim($_POST['timeOUT']);
    $questionNumber = trim($_POST['questionNumber']);


    $pros_settingspurpose = trim($_POST['pros_settingspurpose']);
    $campustoimported = trim($_POST['campustoimported']);

    // Set the timezone to Nigeria.
    date_default_timezone_set('Africa/Lagos');

    $currentDate = date('Y-m-d H:i:s');

    // print_r($questionsAns);


    if($type == 'Admission')
    {



                                                                                  
                        if($category == 'Objective'){

                            $questions = $_POST['questions'];
                            $que = implode(',', $questions);

                            $questionsAns = $_POST['questionsAns'];
                            $queAns = implode(',', $questionsAns);

                           

                                 $key = $class_id [0];
                                
                                
                                
                                $prosselect_question = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` WHERE `CampusID`='$campus_id' AND `SubjectOrCourseID`='$subjectID' AND `ClassOrDepartmentID`='$key' 
                                AND `TermOrSemesterID`='$term' AND `AssesementTitle`='$title' 
                                AND `AssesementDate`='$date' AND `AssesementStartTime`='$timeIN'
                                AND `AssesementEndTime`='$timeOUT'");
                                
                                $prosselect_question_cnt = mysqli_num_rows($prosselect_question);
                                
                                
                                
                                if($prosselect_question_cnt > 0)
                                {
                                    
                                }else
                                {
                                    
                
                                    $inserQuestionSettingsOnly = mysqli_query($link, "INSERT INTO `cbtsetquestionssettings` 
                                    (`CampusID`,`CourseOrSubjectTeacherUserID`,`SectionID`,`sessionID`,
                                    `TermOrSemesterID`,`SubjectOrCourseID`,`ClassOrDepartmentID`,`CurriculumTopicID`,
                                    `CurriculumSubTopicID`,`AssesementTitle`,`AssesementType`,`AssesementCategory`,
                                    `AssesementDate`,`AssesementStartTime`,`AssesementEndTime`,
                                    `question`,`answer`,`ShuffleOption`,`DateCreated`) 
                    
                                      VALUES('$campus_id','$userID','$sectionID','$session','$term',
                                        '$subjectID','$key','$topicnew','$sub_topicnew',
                                        '$title','$type','$category','$date',
                                        '$timeIN','$timeOUT','$que','$queAns','$shuffle','$currentDate')");  
                                }


                                
                                    if($inserQuestionSettingsOnly){
                                        echo  'Yes';
                            
                                    }else{
                            
                                        echo  'No';
                            
                                    }
                                
                                
                                
                           


                            // echo " " . mysqli_error($link);

                        }elseif($category == 'Theory'){

                            $questions = $_POST['questions2'];
                            $que = implode(',', $questions);

                            $key = $class_id [0];
                                
                                
                                
                                
                                
                            
                                        
                                $prosselect_question = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` WHERE `CampusID`='$campus_id' AND `SubjectOrCourseID`='$subjectID' AND `ClassOrDepartmentID`='$key' 
                                AND `TermOrSemesterID`='$term' AND `AssesementTitle`='$title' 
                                AND `AssesementDate`='$date' AND `AssesementStartTime`='$timeIN'
                                AND `AssesementEndTime`='$timeOUT'");
                                
                                $prosselect_question_cnt = mysqli_num_rows($prosselect_question);
                                
                                
                                if($prosselect_question_cnt > 0)
                                {
                                    
                                    
                                    
                                    
                                                    
                                    
                                }else
                                {
                                    
                                    
                        
                                        $inserQuestionSettingsOnly = mysqli_query($link, "INSERT INTO `cbtsetquestionssettings` 
                                        (`CampusID`,`CourseOrSubjectTeacherUserID`,`SectionID`,`sessionID`,
                                        `TermOrSemesterID`,`SubjectOrCourseID`,`ClassOrDepartmentID`,`CurriculumTopicID`,
                                        `CurriculumSubTopicID`,`AssesementTitle`,`AssesementType`,`AssesementCategory`,
                                        `AssesementDate`,`AssesementStartTime`,`AssesementEndTime`,
                                        `TheoryQuestion`,`ShuffleOption`,`DateCreated`) 
                            
                                    VALUES('$campus_id','$userID','$sectionID','$session','$term',
                                            '$subjectID','$key','$newtopic','$newsub_topic',
                                            '$title','$type','$category','$date',
                                            '$timeIN','$timeOUT','$que','$shuffle','$currentDate')"); 
                        
                                    
                                    
                                    
                                }
                                
                                    
                                
                                
                                
                            

                            if($inserQuestionSettingsOnly){
                                echo   'Yes';


                            }else{

                                echo 'No';

                            }


                            echo mysqli_error($link);
                        }elseif($category == 'Both'){

                            $questions = $_POST['questions'];
                            $que = implode(',', $questions);

                            $questions2 = $_POST['questions2'];
                            $que2 = implode(',', $questions2);

                            $questionsAns = $_POST['questionsAns'];
                            $queAns = implode(',', $questionsAns);


                               $key = $class_id [0];
                                
                                
                                
                                $prosselect_question = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` WHERE `CampusID`='$campus_id' AND `SubjectOrCourseID`='$subjectID' AND `ClassOrDepartmentID`='$key' 
                                AND `TermOrSemesterID`='$term' AND `AssesementTitle`='$title' 
                                AND `AssesementDate`='$date' AND `AssesementStartTime`='$timeIN'
                                AND `AssesementEndTime`='$timeOUT'");
                                
                                $prosselect_question_cnt = mysqli_num_rows($prosselect_question);
                                
                                
                                if($prosselect_question_cnt > 0)
                                {
                                    
                                }else
                                {
                                    
                                    
                                    
                                             $inserQuestionSettingsOnly = mysqli_query($link, "INSERT INTO `cbtsetquestionssettings` 
                                            (`CampusID`,`CourseOrSubjectTeacherUserID`,`SectionID`,`sessionID`,
                                            `TermOrSemesterID`,`SubjectOrCourseID`,`ClassOrDepartmentID`,`CurriculumTopicID`,
                                            `CurriculumSubTopicID`,`AssesementTitle`,`AssesementType`,`AssesementCategory`,
                                            `AssesementDate`,`AssesementStartTime`,`AssesementEndTime`,
                                            `question`,`answer`,`TheoryQuestion`, `ShuffleOption`,`DateCreated`) 

                                        VALUES('$campus_id','$userID','$sectionID','$session','$term',
                                                '$subjectID','$key','$topic','$sub_topic',
                                                '$title','$type','$category','$date',
                                                '$timeIN','$timeOUT','$que','$queAns','$que2','$shuffle','$currentDate')");
                                    
                                }
                                
                                
                                
                                
                            

                                
                           

                            if($inserQuestionSettingsOnly){
                                echo  'Yes';

                            }else{

                                echo  'No';

                            }




                        }else{
                            echo 'Error';
                        }




    }else
    {



                                                                
                        if($category == 'Objective'){

                            $questions = $_POST['questions'];
                            $que = implode(',', $questions);

                            $questionsAns = $_POST['questionsAns'];
                            $queAns = implode(',', $questionsAns);

                            foreach($class_idmain as $key)
                            {
                        
                                $key;
                                
                                
                                
                                $prosselect_question = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` WHERE `CampusID`='$campus_id' AND `SubjectOrCourseID`='$subjectID' AND `ClassOrDepartmentID`='$key' 
                                AND `TermOrSemesterID`='$term' AND `AssesementTitle`='$title' 
                                AND `AssesementDate`='$date' AND `AssesementStartTime`='$timeIN'
                                AND `AssesementEndTime`='$timeOUT'");
                                
                                $prosselect_question_cnt = mysqli_num_rows($prosselect_question);
                                
                                
                                
                                if($prosselect_question_cnt > 0)
                                {
                                    
                                }else
                                {
                                    
                                    
                                                            $inserQuestionSettingsOnly = mysqli_query($link, "INSERT INTO `cbtsetquestionssettings` 
                                                        (`CampusID`,`CourseOrSubjectTeacherUserID`,`SectionID`,`sessionID`,
                                                        `TermOrSemesterID`,`SubjectOrCourseID`,`ClassOrDepartmentID`,`CurriculumTopicID`,
                                                        `CurriculumSubTopicID`,`AssesementTitle`,`AssesementType`,`AssesementCategory`,
                                                        `AssesementDate`,`AssesementStartTime`,`AssesementEndTime`,
                                                        `question`,`answer`,`ShuffleOption`,`DateCreated`) 
                                        
                                                    VALUES('$campus_id','$userID','$sectionID','$session','$term',
                                                            '$subjectID','$key','$topicnew','$sub_topicnew',
                                                            '$title','$type','$category','$date',
                                                            '$timeIN','$timeOUT','$que','$queAns','$shuffle','$currentDate')");  
                                                            
                                                            
                                                    
                                                        
                                }
                                
                                    if($inserQuestionSettingsOnly){
                                        echo  'Yes';
                            
                                    }else{
                            
                                        echo  'No';
                            
                                    }
                                
                                
                                
                            }


                            // echo " " . mysqli_error($link);

                        }elseif($category == 'Theory'){

                            $questions = $_POST['questions2'];
                            $que = implode(',', $questions);

                            foreach($class_idmain as  $key)
                            {
                            $key;
                                
                                
                                
                                
                                
                            
                                        
                                $prosselect_question = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` WHERE `CampusID`='$campus_id' AND `SubjectOrCourseID`='$subjectID' AND `ClassOrDepartmentID`='$key' 
                                AND `TermOrSemesterID`='$term' AND `AssesementTitle`='$title' 
                                AND `AssesementDate`='$date' AND `AssesementStartTime`='$timeIN'
                                AND `AssesementEndTime`='$timeOUT'");
                                
                                $prosselect_question_cnt = mysqli_num_rows($prosselect_question);
                                
                                
                                if($prosselect_question_cnt > 0)
                                {
                                    
                                    
                                    
                                    
                                                    
                                    
                                }else
                                {
                                    
                                    
                                    
                                                    $inserQuestionSettingsOnly = mysqli_query($link, "INSERT INTO `cbtsetquestionssettings` 
                                                    (`CampusID`,`CourseOrSubjectTeacherUserID`,`SectionID`,`sessionID`,
                                                    `TermOrSemesterID`,`SubjectOrCourseID`,`ClassOrDepartmentID`,`CurriculumTopicID`,
                                                    `CurriculumSubTopicID`,`AssesementTitle`,`AssesementType`,`AssesementCategory`,
                                                    `AssesementDate`,`AssesementStartTime`,`AssesementEndTime`,
                                                    `TheoryQuestion`,`ShuffleOption`,`DateCreated`) 
                                        
                                                VALUES('$campus_id','$userID','$sectionID','$session','$term',
                                                        '$subjectID','$key','$newtopic','$newsub_topic',
                                                        '$title','$type','$category','$date',
                                                        '$timeIN','$timeOUT','$que','$shuffle','$currentDate')"); 
                                    
                                    
                                    
                                    
                                }
                                
                                    
                                
                                
                                
                            }

                            if($inserQuestionSettingsOnly){
                                echo   'Yes';


                            }else{

                                echo 'No';

                            }


                            echo mysqli_error($link);
                        }elseif($category == 'Both'){

                            $questions = $_POST['questions'];
                            $que = implode(',', $questions);

                            $questions2 = $_POST['questions2'];
                            $que2 = implode(',', $questions2);

                            $questionsAns = $_POST['questionsAns'];
                            $queAns = implode(',', $questionsAns);


                            foreach($class_idmain as $key)
                            {
                        
                                $key;
                                
                                
                                
                                $prosselect_question = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` WHERE `CampusID`='$campus_id' AND `SubjectOrCourseID`='$subjectID' AND `ClassOrDepartmentID`='$key' 
                                AND `TermOrSemesterID`='$term' AND `AssesementTitle`='$title' 
                                AND `AssesementDate`='$date' AND `AssesementStartTime`='$timeIN'
                                AND `AssesementEndTime`='$timeOUT'");
                                
                                $prosselect_question_cnt = mysqli_num_rows($prosselect_question);
                                
                                
                                if($prosselect_question_cnt > 0)
                                {
                                    
                                }else
                                {
                                    
                                    
                                    
                                                        $inserQuestionSettingsOnly = mysqli_query($link, "INSERT INTO `cbtsetquestionssettings` 
                                                                        (`CampusID`,`CourseOrSubjectTeacherUserID`,`SectionID`,`sessionID`,
                                                                        `TermOrSemesterID`,`SubjectOrCourseID`,`ClassOrDepartmentID`,`CurriculumTopicID`,
                                                                        `CurriculumSubTopicID`,`AssesementTitle`,`AssesementType`,`AssesementCategory`,
                                                                        `AssesementDate`,`AssesementStartTime`,`AssesementEndTime`,
                                                                        `question`,`answer`,`TheoryQuestion`, `ShuffleOption`,`DateCreated`) 
                        
                                                                    VALUES('$campus_id','$userID','$sectionID','$session','$term',
                                                                            '$subjectID','$key','$topic','$sub_topic',
                                                                            '$title','$type','$category','$date',
                                                                            '$timeIN','$timeOUT','$que','$queAns','$que2','$shuffle','$currentDate')");
                                    
                                }
                                
                                
                                
                                
                            

                                
                            }

                            if($inserQuestionSettingsOnly){
                                echo  'Yes';

                            }else{

                                echo  'No';

                            }




                        }else{
                            echo 'Error';
                        }




    }


   


    


?>