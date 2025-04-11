<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../controller/config/config.php');
    
    include('../../../controller/config/config2.php');

    /* Getting file name */
    if (!empty($_FILES['file']['name'])) 
    {
         $abba_campus = $_POST['abba_campus'];
         echo $abba_term = $_POST['abba_term'];
        $abba_session = $_POST['abba_session'];

        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        // Validate whether selected file is part of the group of CSV file above, if it is, then upload
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) 
        {
            $filename = $_FILES['file']['name'];
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);
            //echo count($linecount);
            while (($line = fgetcsv($csvFile)) !== FALSE) 
            {
                
                $Old_Subject_Id = $line[0];
                $New_Subject_Id_old = $line[2];
                $New_Subject_Title = $line[3];
                $class_temp_id = $line[5];
                $Class_Id = $line[6];
                
                $sql_get_subjectorcourse_ab = "SELECT * FROM `subjectorcourse` WHERE `ClassTemplateID` = '$class_temp_id' AND `SubjectOrCourseTitle` = '$New_Subject_Title'";
                $query_get_subjectorcourse_ab = mysqli_query($link, $sql_get_subjectorcourse_ab);
                $row_get_subjectorcourse_ab = mysqli_fetch_assoc($query_get_subjectorcourse_ab);
                $count_get_subjectorcourse_ab = mysqli_num_rows($query_get_subjectorcourse_ab);
                
                if($count_get_subjectorcourse_ab > 0)
                {
                    $New_Subject_Id = $row_get_subjectorcourse_ab['SubjectOrCourseID'];
                }
                else
                {
                    $sql_insert_subjectorcourse_new = "INSERT INTO `subjectorcourse`(`SubjectOrCourseID`, `ClassTemplateID`, `SubjectOrCourseTitle`) 
                    VALUES ('$New_Subject_Id','$class_temp_id','$New_Subject_Title')";
                    $query_insert_subjectorcourse_new = mysqli_query($link, $sql_insert_subjectorcourse_new);
                    
                    if($query_insert_subjectorcourse_new == true)
                    {
                        echo 'inserted<br>';
                        
                        $New_Subject_Id = mysqli_insert_id($link);
                    }
                    else
                    {
                        echo 'not inserted<br>';
                        
                        $New_Subject_Id = 0;
                    }
                }
                
                $sql_get_courseorsubjectallocation_old = "SELECT * FROM `courseorsubjectallocation` WHERE InstitutionID='$abba_campus' AND ClassOrDepartmentID = '$Class_Id' AND SubjectOrCourseID = '$Old_Subject_Id'";
                $query_get_courseorsubjectallocation_old = mysqli_query($link_abba, $sql_get_courseorsubjectallocation_old);
                $row_get_courseorsubjectallocation_old = mysqli_fetch_assoc($query_get_courseorsubjectallocation_old);
                $count_get_courseorsubjectallocation_old = mysqli_num_rows($query_get_courseorsubjectallocation_old);
                
                if($count_get_courseorsubjectallocation_old > 0)
                {
                    $campus_id = $row_get_courseorsubjectallocation_old['InstitutionID'];
                    $new_class_id = $row_get_courseorsubjectallocation_old['ClassOrDepartmentID'];
                    $Subject_Id = $row_get_courseorsubjectallocation_old['SubjectOrCourseID'];
                    $teacher_Id = $row_get_courseorsubjectallocation_old['CourseOrSubjectTeacherUserID'];
                    
                    $sql_get_courseorsubjectallocation_new = "SELECT * FROM `courseorsubjectallocation` WHERE CampusID='$abba_campus' AND ClassOrDepartmentID = '$Class_Id' AND SubjectOrCourseID = '$New_Subject_Id'";
                    $query_get_courseorsubjectallocation_new = mysqli_query($link, $sql_get_courseorsubjectallocation_new);
                    $row_get_courseorsubjectallocation_new = mysqli_fetch_assoc($query_get_courseorsubjectallocation_new);
                    $count_get_courseorsubjectallocation_new = mysqli_num_rows($query_get_courseorsubjectallocation_new);
                    
                    if($count_get_courseorsubjectallocation_new > 0)
                    {
                        echo 'exist<br>';
                    }
                    else
                    {
                        $sql_insert_courseorsubjectallocation_new = "INSERT INTO `courseorsubjectallocation`(`CourseOrSubjectAllocationID`, `CampusID`, `ClassOrDepartmentID`, `SubjectOrCourseID`, `CourseOrSubjectTeacherUserID`) 
                        VALUES (NULL,'$campus_id','$new_class_id','$New_Subject_Id','$teacher_Id')";
                        $query_insert_courseorsubjectallocation_new = mysqli_query($link, $sql_insert_courseorsubjectallocation_new);
                        
                        if($query_insert_courseorsubjectallocation_new == true)
                        {
                            echo 'inserted<br>';
                        }
                        else
                        {
                            echo 'not inserted<br>';
                        }
                    }
                }
                else
                {
                    echo 'not exist<br>';
                }
                
                $sql_get_score = "SELECT * FROM `score` WHERE `InstitutionID` = '$abba_campus' AND `ClassOrDepartmentID` = '$Class_Id' AND `CourseOrSubjectID` = '$Old_Subject_Id' AND `Session` = '$abba_session' AND `TermOrSemester` = '$abba_term'";
                $query_get_score = mysqli_query($link_abba, $sql_get_score);
                $row_get_score = mysqli_fetch_assoc($query_get_score);
                $count_get_score = mysqli_num_rows($query_get_score);
                
                if($count_get_score > 0)
                {
                    do{
                        
                         $Student_Reg = $row_get_score['UserRegNumberOrUsername'];
                        
                        $abba_sql_check_userlogin = "SELECT * FROM userlogin WHERE InstitutionIDOrCampusID = '$abba_campus' AND UserRegNumberOrUsername = '$Student_Reg' AND UserType = 'student'";
                        $abba_result_check_userlogin = mysqli_query($link, $abba_sql_check_userlogin);
                        $abba_row_check_userlogin = mysqli_fetch_assoc($abba_result_check_userlogin);
                        $abba_row_cnt_check_userlogin = mysqli_num_rows($abba_result_check_userlogin);
                        
                        if($abba_row_cnt_check_userlogin > 0)
                        {
                            $Student_id = $abba_row_check_userlogin['UserID'];
                            
                            $Exam = $row_get_score['Exam'];
                            $CA1 = $row_get_score['CA1'];
                            $CA2 = $row_get_score['CA2'];
                            $CA3 = $row_get_score['CA3'];
                            $CA4 = $row_get_score['CA4'];
                            $CA5 = $row_get_score['CA5'];
                            $CA6 = $row_get_score['CA6'];
                            $CA7 = $row_get_score['CA7'];
                            $CA8 = $row_get_score['CA8'];
                            $CA9 = $row_get_score['CA9'];
                            $CA10 = $row_get_score['CA10'];
                            
                            $sql_get_score_new = "SELECT * FROM `score` WHERE CampusID='$abba_campus' AND StudentID = '$Student_id' AND ClassOrDepartmentID = '$Class_Id' AND CourseOrSubjectID = '$New_Subject_Id' AND `Session` = '$abba_session' AND `TermOrSemester` = '$abba_term'";
                            $query_get_score_new = mysqli_query($link, $sql_get_score_new);
                            $row_get_score_new = mysqli_fetch_assoc($query_get_score_new);
                            $count_get_score_new = mysqli_num_rows($query_get_score_new);
                            
                            if($count_get_score_new > 0)
                            {
                                echo 'exist';
                            }
                            else
                            {
                                $sql_insert_score_new = "INSERT INTO `score`(`ScoreID`, `CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) 
                                VALUES (NULL,'$abba_campus','$Student_id','$Class_Id','$New_Subject_Id','$abba_session','$abba_term','$Exam','$CA1','$CA2','$CA3','$CA4','$CA5','$CA6','$CA7','$CA8','$CA9','$CA10')";
                                $query_insert_score_new = mysqli_query($link, $sql_insert_score_new);
                                
                                if($query_insert_score_new == true)
                                {
                                    echo 'inserted<br>';
                                }
                                else
                                {
                                    echo 'not inserted<br>';
                                }
                            }
                        }
                        else
                        {
                            echo 'no student<br>';
                        }
                        
                    }while($row_get_score = mysqli_fetch_assoc($query_get_score));
                }
                else
                {
                    echo 'not exist<br>';
                }
            }
            
        }
        else
        {
            echo 'nothing found<br>';
        }
    } 
    else 
    {
        echo 'nothing found<br>';

    }
?>