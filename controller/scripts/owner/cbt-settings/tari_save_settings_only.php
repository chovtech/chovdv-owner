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
        $mainclassID = $_POST['mainclassID'];

        
        $category = trim($_POST['category']);

        $automatic = trim($_POST['automatic']);
        $shuffle = trim($_POST['shuffle']);
        $date = trim($_POST['date']);
        $title = mysqli_real_escape_string($link,trim($_POST['title']));
        $type = trim($_POST['type']);
        $timeIN = trim($_POST['timeIN']);
        $timeOUT = trim($_POST['timeOUT']);
        $questionNumber = trim($_POST['questionNumber']);

        $campustoimported = $_POST['campustoimported'];
        $pros_settingspurpose = $_POST['pros_settingspurpose'];
        $InstitutionID = $_POST['tari_get_stored_instituion_id'];
 

        
        // Set the timezone to Nigeria.
        date_default_timezone_set('Africa/Lagos');

        $currentDate = date('Y-m-d H:i:s');

       


        if($type == 'Admission')
        {


                      $newclassid =     $class_id[0];


                      $prosselect_question = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` WHERE `CampusID`='$campus_id' AND `SubjectOrCourseID`='$subjectID' AND `ClassOrDepartmentID`='$newclassid' 
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
                                `AssesementDate`,`AssesementStartTime`,`AssesementEndTime`,`ShuffleOption`,`DateCreated`) 
                    
                                VALUES('$campus_id','$userID','$sectionID','$session','$term',
                                '$subjectID','$newclassid','$topic','$sub_topic',
                                '$title','$type','$category','$date',
                                '$timeIN','$timeOUT','$shuffle','$currentDate')");


                                    if($inserQuestionSettingsOnly){
                                        echo 'true';
                                    }else{
                                        echo 'false';
                                    }

                      }
            
                      
                   
                


        }else
        {




                    foreach($mainclassID  as  $key)
                    {





                                    
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
                                    `AssesementDate`,`AssesementStartTime`,`AssesementEndTime`,`ShuffleOption`,`DateCreated`) 
                        
                                    VALUES('$campus_id','$userID','$sectionID','$session','$term',
                                    '$subjectID','$key','$topic','$sub_topic',
                                    '$title','$type','$category','$date',
                                    '$timeIN','$timeOUT','$shuffle','$currentDate')");


                      }
                 

            
                       
                    }


                    
                    if($inserQuestionSettingsOnly){
                        echo 'true';
                    }else{
                        echo 'false';
                    }

        }

      








?>