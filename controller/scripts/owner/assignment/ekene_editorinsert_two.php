<?php


            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            include('../../../config/config.php');


            $campusid = $_POST['campusid'];
            $class_id = $_POST['class_id'];
            $assignmentid = $_POST['assignmentid'];


            $textareaquestiontheory = $_POST['textareaquestiontheory'];


            $ekene_subject = $_POST['ekene_subject'];
            $usertype = $_POST[ 'usertype'];

            $userid = $_POST[ 'userid'];


            $session = "SELECT * FROM `session` WHERE `sessionStatus` = 1";

            $ekeneselect = mysqli_query($link, $session);
            $ekene_get_select_details = mysqli_fetch_assoc($ekeneselect);
            $ekene_row_select = mysqli_num_rows($ekeneselect);

            $ekene_session_name = $ekene_get_select_details['sessionName'];


            $term = "SELECT * FROM `termorsemester` WHERE `status` = 1";
            $ekeneterm = mysqli_query($link, $term);
            $ekene_get_term_details = mysqli_fetch_assoc($ekeneterm);
            $ekene_row_term = mysqli_num_rows($ekeneterm);
                
            $ekene_term = $ekene_get_term_details['TermOrSemesterID'];

            $failed = 0;
            $success = 0;




            date_default_timezone_set("Africa/Lagos");
            $dateAndTime = date("Y/m/d H:i:s");
            $desripction = "set assignment";

            // Explode each variable and count the maximum length
            $textareaquestiontheoryexplode = explode('###||', $textareaquestiontheory);







                $ekene_update_asignmentold = "DELETE FROM `assignmentquestion` WHERE `AssignmentSettingsID` = '$assignmentid' AND `AssignmentCategory` = 'Theory'
                ";

                $ekene_update_asignmentold = mysqli_query($link, $ekene_update_asignmentold);

                

            for ( $i = 0; $i < count($textareaquestiontheoryexplode);
            $i++ ) {

                $theoryquestion = mysqli_real_escape_string($link, $textareaquestiontheoryexplode[$i]);
                

                
                if(!empty($theoryquestion))
                {


                  

                            $ekene_insert_assignment = "INSERT INTO `assignmentquestion` 
                            (`AssignmentSettingsID`, `CampusID`, `CourseOrSubjectTeacherUserID`, `UserType`, `sessionID`, `TermOrSemesterID`,
                            `ClassOrDepartmentID`, `SubjectOrCourseID`, `question`, `AssignmentCategory`, `date/time`) 
                            VALUES ('$assignmentid', '$campusid', '$userid', '$usertype', '$ekene_session_name',
                            '$ekene_term', '$class_id', '$ekene_subject', '$theoryquestion',
                            'Theory', '$dateAndTime')";

                    
                        $ekene_update_asignmentnew = mysqli_query($link, $ekene_insert_assignment);

                        
                        if($ekene_update_asignmentnew == true)
                        {
                            $success+=+1;  

                        }else
                        {
                            $failed+=+1;
                        }

                    }
                        

                    }
                        if($success != '0'){

                            echo "1";
                        }
                        else
                        {
                            echo "4";
                        }


    
?>