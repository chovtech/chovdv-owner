<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../controller/config/config.php');
    
    include('../../../controller/config/config2.php');

    /* Getting file name */
    if (!empty($_FILES['file']['name'])) 
    {
         $abba_campus = $_POST['abba_campus'];
         $abba_term = $_POST['abba_term'];
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
                
                 
                
              
                
                $sql_get_questionfrombank_old = "SELECT * FROM `questionbank` WHERE  `InstitutionID`='$abba_campus' AND `ClassOrDepartmentID`='$Class_Id' AND `SubjectOrCourseID`='$Old_Subject_Id'";
                $query_get_questionfrombank_old = mysqli_query($link_abba, $sql_get_questionfrombank_old);
                $row_get_questionfrombank_old = mysqli_fetch_assoc($query_get_questionfrombank_old);
                $count_get_questionfrombank_old = mysqli_num_rows($query_get_questionfrombank_old);
                
                if($count_get_questionfrombank_old > 0)
                {
                    
                    
                    do{
                        
                    
                  
                    
                            $campus_id = $row_get_questionfrombank_old['InstitutionID'];
                            $new_class_id = $row_get_questionfrombank_old['ClassOrDepartmentID'];
                            $Subject_Id = $row_get_questionfrombank_old['SubjectOrCourseID'];
                            $teacher_Id = $row_get_questionfrombank_old['CourseOrSubjectTeacherUserID'];
                            $usertype_old = $row_get_questionfrombank_old['UserType'];
                            $sessionID_old = $row_get_questionfrombank_old['sessionID'];
                            $TermOrSemesterID_old = $row_get_questionfrombank_old['TermOrSemesterID'];
                            $FacultyOrSchoolID_old = $row_get_questionfrombank_old['FacultyOrSchoolID'];
                            $CurriculumTopicID_old = $row_get_questionfrombank_old['CurriculumTopicID'];
                            $CurriculumSubTopic_old = $row_get_questionfrombank_old['CurriculumSubTopic'];
                            $QuestionType = $row_get_questionfrombank_old['QuestionType'];
                            $QuestionCategory = $row_get_questionfrombank_old['QuestionCategory'];
                            $question = $row_get_questionfrombank_old['question'];
                            $optionA = $row_get_questionfrombank_old['optionA'];
                            $optionB = $row_get_questionfrombank_old['optionB'];
                            $optionC = $row_get_questionfrombank_old['optionC'];
                            $optionD = $row_get_questionfrombank_old['optionD'];
                            $answer = $row_get_questionfrombank_old['answer'];
                            $NumberOfTimeUsed = $row_get_questionfrombank_old['NumberOfTimeUsed'];
                            $images = $row_get_questionfrombank_old['images'];
                            $DateCreated = $row_get_questionfrombank_old['DateCreated'];
                            $Status = $row_get_questionfrombank_old['Status'];
                            $QuestionBankID = $row_get_questionfrombank_old['QuestionBankID'];
                            
                            
                            
                            
                            
                            $prosgetclassnew = mysqli_query($link, "SELECT * FROM `classordepartment` WHERE CampusID='$campus_id' AND ClassOrDepartmentID='$new_class_id'"); 
                            
                            
                            
                            $prosgetclassnew_fetch = mysqli_fetch_assoc($prosgetclassnew);
                            $prosgetclassnew_cnt = mysqli_num_rows($prosgetclassnew);
                            
                            $ClassTemplateIDnew = $prosgetclassnew_fetch['ClassTemplateID'];
                            
                            
                            // ClassTemplateID
                            
                   
                    
                    
                    
                    
                            // prosget institutution institution for campus selected 
                    
                    
                            $sql_get_getcampusinstitution_old = "SELECT * FROM `campus` WHERE  `CampusID`='$campus_id'";
                            $query_get_getcampusinstitution_old = mysqli_query($link, $sql_get_getcampusinstitution_old);
                            $row_get_getcampusinstitution_old = mysqli_fetch_assoc($query_get_getcampusinstitution_old);
                            $count_get_getcampusinstitution_old = mysqli_num_rows($query_get_getcampusinstitution_old);
                            
                            
                            
                            $InstitutionID =  $row_get_getcampusinstitution_old['InstitutionID'];
                                
                                
                    
                           // prosget institutution institution for campus selected 
                    
                    
                       if($TermOrSemesterID_old  == 'First')
                        {
                            
                              $prosnetergotenn = 1;
                            
                        }else if($TermOrSemesterID_old  == 'Second')
                        {
                             $prosnetergotenn = 2;
                            
                        }else if($TermOrSemesterID_old  == 'Third')
                        {
                              $prosnetergotenn = 3;
                        }
                    
                    
                    
                        if($usertype_old == 'Institution')
                        {
                           $newusertype = 'admin';
                           
                        }else
                        {
                            $newusertype = $usertype_old;
                        }
                    
                   
                    
                            $sql_get_questionfrombank_new = "SELECT * FROM `questionbank` WHERE  `QuestionBankID`='$QuestionBankID' AND  `CampusID`='$campus_id' AND `CourseOrSubjectTeacherUserID`='$teacher_Id'
                            AND `UserType`='$newusertype' AND  sessionID='$sessionID_old' AND 
                            TermOrSemesterID='$prosnetergotenn' AND SectionID='$FacultyOrSchoolID_old' AND
                            ClassOrDepartmentID='$ClassTemplateIDnew' AND SubjectOrCourseID='$New_Subject_Id' 
                            AND `question`='$question' AND `optionA`='$optionA' AND optionB='$optionB' 
                            AND optionC='$optionC' AND optionD='$optionD'  AND answer='$answer'";
                            
                            $query_get_questionfrombank_new = mysqli_query($link, $sql_get_questionfrombank_new);
                            $row_get_questionfrombank_new = mysqli_fetch_assoc($query_get_questionfrombank_new);
                            $count_get_questionfrombank_new = mysqli_num_rows($query_get_questionfrombank_new);
                            
                            if($count_get_questionfrombank_new > 0)
                            {
                                echo 'exist questions <br>';
                            }
                            else
                            {
                                
                                   
                               
                                
                                                $sql_insert_questionfrombank_new = "INSERT INTO `questionbank`
                                                (`QuestionBankID`,`InstitutionID`, `CampusID`, 
                                                `CourseOrSubjectTeacherUserID`, `UserType`, `sessionID`,
                                                `TermOrSemesterID`, `SectionID`, `ClassOrDepartmentID`, `SubjectOrCourseID`,
                                                `CurriculumTopicID`, `CurriculumSubTopic`, `QuestionType`, `QuestionCategory`, `question`,
                                                `optionA`, `optionB`, `optionC`, `optionD`, `answer`, `NumberOfTimeUsed`,
                                                `LastTimeSet`, `images`, `DateCreated`, `Status`)
                                                
                                                VALUES ('$QuestionBankID','$InstitutionID','$campus_id','$teacher_Id','$newusertype',
                                                '$sessionID_old', '$prosnetergotenn', 
                                                '$FacultyOrSchoolID_old','$ClassTemplateIDnew','$New_Subject_Id', 
                                                '$CurriculumTopicID_old',
                                                '$CurriculumSubTopic_old',
                                                '$QuestionCategory','$QuestionType',
                                                '$question','$optionA','$optionB','$optionC','$optionD','$answer','$NumberOfTimeUsed','','$images','$DateCreated','$Status')";
                                                
                                                
                                        $query_insert_questionfrombank_new = mysqli_query($link, $sql_insert_questionfrombank_new);
                                        
                                        $prosquestion_last_inserted_gotten_ID = mysqli_insert_id($link);
                                        
                                        if($query_insert_questionfrombank_new == true)
                                        {
                                            
                                            
                                            
                                                     echo 'inserted questions<br>';
                                            
                                            
                                            
                                                
                                            
                                            
                                                       
                                                        
                                        }
                                        
                                        else
                                        {
                                            echo 'not inserted question<br>';
                                        }
                                        
                            }
                    
                    }while($row_get_questionfrombank_old = mysqli_fetch_assoc($query_get_questionfrombank_old));
                }
                else
                {
                    echo 'not exist<br>';
                }
                
                
                
                
                
                
                 $prosverifycbt_content = mysqli_query($link_abba, "SELECT * FROM `cbtsettings` INNER JOIN `cbtsetquestionssettings`
                                                        ON `cbtsettings`.`cbtsettingsID` = `cbtsetquestionssettings`.`cbtsettingsID`
                                                        WHERE `cbtsettings`.InstitutionID='$abba_campus' AND `cbtsettings`.ClassOrDepartmentID='$Class_Id' AND `cbtsettings`.SubjectOrCourseID='$Old_Subject_Id'"); 
                                                        
                                                        
                                                        
                       $prosverifycbt_content_fetch = mysqli_fetch_assoc($prosverifycbt_content);
                       $prosverifycbt_contentcnt = mysqli_num_rows($prosverifycbt_content);
                       
                       
                       
                       if( $prosverifycbt_contentcnt > 0)
                       {
                           
                              do{
                                  
                                  
                                  
                                  
                                          $cbtsettingsID_Old = $prosverifycbt_content_fetch['cbtsettingsID'];
                                          $InstitutionID_Old = $prosverifycbt_content_fetch['InstitutionID'];
                                          $CourseOrSubjectTeacherUserID_Old = $prosverifycbt_content_fetch['CourseOrSubjectTeacherUserID'];
                                          $UserType_Old = $prosverifycbt_content_fetch['UserType'];
                                          $SessionName_Old = $prosverifycbt_content_fetch['SessionName'];
                                          $TermOrSemesterName_Oldcount = $prosverifycbt_content_fetch['TermOrSemesterName'];
                                          $ClassOrDepartmentID_Old = $prosverifycbt_content_fetch['ClassOrDepartmentID'];
                                          $SubjectOrCourseID_Old = $prosverifycbt_content_fetch['SubjectOrCourseID'];
                                          $quizTitle_Old = $prosverifycbt_content_fetch['quizTitle'];
                                          $startDate_Old = $prosverifycbt_content_fetch['startDate'];
                                          $startTime_Old = $prosverifycbt_content_fetch['startTime'];
                                          $endTime_Old = $prosverifycbt_content_fetch['endTime'];
                                          $QuestiontypeStatus_Old = $prosverifycbt_content_fetch['QuestiontypeStatus'];
                                          $TheoryMaxScore_Old = $prosverifycbt_content_fetch['TheoryMaxScore'];
                                          $question_Old = $prosverifycbt_content_fetch['question'];
                                          $answer_Old = $prosverifycbt_content_fetch['answer'];
                                          $ShuffleOption_Old = $prosverifycbt_content_fetch['ShuffleOption'];
                                          
                                          
                                            
                            $prosgetclassnewsection = mysqli_query($link, "SELECT * FROM `classordepartment` WHERE CampusID='$InstitutionID_Old' AND ClassOrDepartmentID='$ClassOrDepartmentID_Old'"); 
                            
                            
                            
                            $prosgetclassnew_fetchsection = mysqli_fetch_assoc($prosgetclassnewsection);
                            $prosgetclassnew_cntsection = mysqli_num_rows($prosgetclassnewsection);
                            
                            $SectionIDnewhere = $prosgetclassnew_fetchsection['SectionID'];
                                          
                                         
                                          
                                      
                                         
                                             
                                          
                                          
                                           if($TermOrSemesterName_Oldcount  == 'First')
                                            {
                                                
                                                  $prosnetergotennsettings = 1;
                                                
                                            }else if($TermOrSemesterName_Oldcount  == 'Second')
                                            {
                                                 $prosnetergotennsettings = 2;
                                                
                                            }else if($TermOrSemesterName_Oldcount  == 'Third')
                                            {
                                                  $prosnetergotennsettings = 3;
                                            }
                                            
                                            
                                              
                                            
                                            
                                            if($SubjectOrCourseID_Old == $Old_Subject_Id)
                                            {
                                                
                                                
                                                
                                               $New_Subject_Idgottencbt = $New_Subject_Id;
                                               
                                               
                                               
                                               
                                                         
                                                            
                                                                                                                                               
                                               
                                               
                                                
                                         
                                          
                                          
                                                          
                                          
                                          
                                                          $prosverifyquestion_question = mysqli_query($link, "SELECT * FROM `cbtsetquestionssettings` 
                                                          WHERE `CourseOrSubjectTeacherUserID`='$CourseOrSubjectTeacherUserID_Old' AND `CampusID`='$InstitutionID_Old'
                                                          AND `SectionID`='$SectionIDnewhere' AND `TermOrSemesterID`='$prosnetergotennsettings' AND `SubjectOrCourseID`='$New_Subject_Idgottencbt' 
                                                          AND `ClassOrDepartmentID`='$ClassOrDepartmentID_Old'
                                                          AND `CurriculumTopicID`='' AND `CurriculumSubTopicID`='' AND `AssesementTitle`='$quizTitle_Old'
                                                          AND `AssesementType`='Assesement' AND `AssesementCategory`='Objective' AND `AssesementDate`='$startDate_Old' AND 
                                                          `AssesementStartTime`='$startTime_Old' AND `AssesementEndTime`='$endTime_Old' AND `question`='$question_Old' 
                                                          AND  `answer`='$answer_Old'
                                                          AND `TheoryQuestion`='' AND `ShuffleOption`='$ShuffleOption_Old' AND  `DateCreated`=''");
                                                          
                                                          $prosverifyquestion_questionrow = mysqli_num_rows($prosverifyquestion_question);
                                                          
                                                          
                                                          if($prosverifyquestion_questionrow > 0)
                                                          {
                                                              
                                                                
                                                              
                                                          }else
                                                          {
                                                              
                                                              
                                                                        $proinsertasessment = mysqli_query($link, "INSERT INTO `cbtsetquestionssettings`(`cbtsetquestionssettingsID`, `CourseOrSubjectTeacherUserID`, 
                                                                        `CampusID`, `SectionID`, `sessionID`, `TermOrSemesterID`, `SubjectOrCourseID`, `ClassOrDepartmentID`, `CurriculumTopicID`,
                                                                        `CurriculumSubTopicID`, `AssesementTitle`, 
                                                                        `AssesementType`, `AssesementCategory`, `AssesementDate`, `AssesementStartTime`, `AssesementEndTime`,
                                                                        `question`, `answer`, `TheoryQuestion`, `ShuffleOption`, `DateCreated`, `DateDeleted`, `DeleteStatus`)
                                                                        VALUES ('$cbtsettingsID_Old', '$CourseOrSubjectTeacherUserID_Old','$InstitutionID_Old',
                                                                        '$SectionIDnewhere','$SessionName_Old','$prosnetergotennsettings','$New_Subject_Idgottencbt','$ClassOrDepartmentID_Old','','','$quizTitle_Old',
                                                                        'Assesement','Objective','$startDate_Old','$startTime_Old','$endTime_Old','$question_Old','$answer_Old', '', '$ShuffleOption_Old','','','')");
                                                              
                                                              
                                                              
                                                              
                                                                        if($proinsertasessment == true)
                                                                        {
                                                                            
                                                                            
                                                                             echo 'CBT SETTINGS WAS INSERTED SUCCESSFULLY';
                                                                             
                                                                        }else
                                                                        {
                                                                            
                                                                            echo 'CBT SETTINGS FAILED TO BE INSERTED';
                                                                            
                                                                        }
                                                              
                                                              
                                                              
                                                              
                                                              
                                                                  
                                           
                                                          }
                                                          
                                          
                                                
                                                
                                            }else
                                            {
                                                
                                            }
                                            
                                            
                                         

                                  
                              }while($prosverifycbt_content_fetch = mysqli_fetch_assoc($prosverifycbt_content));
                           
                       }else
                       {
                           
                       }
                       
                       
                                                           
                                                           
                                                           //PROSCESS STUDENT INSERTED ANSWER HERE
                                                           
                                                               $select_student_answer = mysqli_query($link_abba,"SELECT * FROM `cbtquestionsanswers` WHERE InstitutionID='$abba_campus' AND ClassOrDepartmentID='$Class_Id' AND SubjectOrCourseID='$Old_Subject_Id'");       
                                                           
                                                               
                                                               $select_student_answer_cnt = mysqli_num_rows($select_student_answer);
                                                               $select_student_answer_row = mysqli_fetch_assoc($select_student_answer);
                                                               
                                                               
                                                               if($select_student_answer_cnt > 0)
                                                               {
                                                                   
                                                                   
                                                                     do{
                                                                         
                                                                         
                                                                         
                                                                            $cbtsettingsID_anser =  $select_student_answer_row['cbtsettingsID'];
                                                                            $StudentID_anser =  $select_student_answer_row['StudentID'];
                                                                            $InstitutionID_anser =  $select_student_answer_row['InstitutionID'];
                                                                            $CourseOrSubjectTeacherUserID_anser =  $select_student_answer_row['CourseOrSubjectTeacherUserID'];
                                                                            $sessionID_anser =  $select_student_answer_row['sessionID'];
                                                                            $TermOrSemesterID_anser =  $select_student_answer_row['TermOrSemesterID'];
                                                                             $ClassOrDepartmentID_anser =  $select_student_answer_row['ClassOrDepartmentID'];
                                                                              $SubjectOrCourseID_anser =  $select_student_answer_row['SubjectOrCourseID'];
                                                                              $question_anser =  $select_student_answer_row['question'];
                                                                              $Answer_anser =  $select_student_answer_row['Answer'];
                                                                               $studentAnswer_anser =  $select_student_answer_row['studentAnswer'];
                                                                               $TheoryQuestion_anser =  $select_student_answer_row['TheoryQuestion'];
                                                                               $TheoryScore_anser =  $select_student_answer_row['TheoryScore'];
                                                                               $TotalScore_anser =  $select_student_answer_row['TotalScore'];
                                                                               $remark_anser =  $select_student_answer_row['remark'];
                                                                                $status_anser =  $select_student_answer_row['status'];
                                                                                $ResultStatus_anser =  $select_student_answer_row['ResultStatus'];
                                                                                
                                                                                
                                                                                   if($TermOrSemesterID_anser  == 'First')
                                                                                    {
                                                                                        
                                                                                          $prosnetergotenanswer = 1;
                                                                                        
                                                                                    }else if($TermOrSemesterID_anser  == 'Second')
                                                                                    {
                                                                                         $prosnetergotenanswer = 2;
                                                                                        
                                                                                    }else if($TermOrSemesterID_anser  == 'Third')
                                                                                    {
                                                                                          $prosnetergotenanswer = 3;
                                                                                    }
                                                                                
                                                                                
                                                                                
                                                                                    
                                                                                    
                                                                                    
                                                                                     if($SubjectOrCourseID_anser == $Old_Subject_Id)
                                                                                     {
                                                                                        
                                                                                        
                                                                                                 $New_Subject_Id_foranswer = $New_Subject_Id;
                                                                                         
                                                                                         
                                                                                         
                                                                                        
                                                                                                       $prosverify_cbtquestion_answer = mysqli_query($link, "SELECT * FROM `cbtquestionsanswers` WHERE  `cbtsetquestionssettingsID`='$cbtsettingsID_anser' AND `StudentID`='$StudentID_anser' AND `CampusID`='$InstitutionID_anser' 
                                                                                                         AND `CourseOrSubjectTeacherUserID`='$CourseOrSubjectTeacherUserID_anser'
                                                                                                        AND `sessionID`='$sessionID_anser' AND `TermOrSemesterID`='$prosnetergotenanswer' AND `ClassOrDepartmentID`='$ClassOrDepartmentID_anser' AND `SubjectOrCourseID`='$New_Subject_Id_foranswer' AND `question`='$question_anser' 
                                                                                                        AND `Answer`='$Answer_anser' AND
                                                                                                        `studentAnswer`='$studentAnswer_anser'  AND  `TheoryScore`='$TheoryScore_anser' AND `TotalScore`='' AND `remark`='$remark_anser' AND `objective_status`='$status_anser'
                                                                                                        AND `theory_status`='$status_anser' AND `ResultStatus`='$ResultStatus_anser'");
                                                                                                        
                                                                                                        
                                                                                                         $prosverify_cbtquestion_answer_cnt = mysqli_num_rows($prosverify_cbtquestion_answer); 
                                                                                                         
                                                                                                         if($prosverify_cbtquestion_answer_cnt > 0)
                                                                                                         {
                                                                                                             
                                                                                                         }else
                                                                                                         {
                                                                                                             
                                                                                                                   
                                                                                                                    $pros_insert_answer = mysqli_query($link, "
                                                                                                                        INSERT INTO `cbtquestionsanswers`
                                                                                                                        (
                                                                                                                            `cbtsetquestionssettingsID`, `StudentID`, `CampusID`, `CourseOrSubjectTeacherUserID`,
                                                                                                                            `sessionID`, `TermOrSemesterID`, `ClassOrDepartmentID`, `SubjectOrCourseID`, `question`,
                                                                                                                            `Answer`, `studentAnswer`, `TheoryQuestion`, `studentTheoryAnswer`, `TheoryScore`, `TotalScore`, 
                                                                                                                            `remark`, `objective_status`, `theory_status`, `ResultStatus`
                                                                                                                        )
                                                                                                                        VALUES
                                                                                                                        (
                                                                                                                            '$cbtsettingsID_anser', '$StudentID_anser', '$InstitutionID_anser', '$CourseOrSubjectTeacherUserID_anser',
                                                                                                                            '$sessionID_anser', '$prosnetergotenanswer', '$ClassOrDepartmentID_anser', '$New_Subject_Id_foranswer', '$question_anser',
                                                                                                                            '$Answer_anser', '$studentAnswer_anser', '', '', '$TheoryScore_anser', '', '$remark_anser', '$status_anser', '$status_anser', '$ResultStatus_anser'
                                                                                                                        )
                                                                                                                    ");
                                                                                                                    
                                                                                                                    if($pros_insert_answer == true) {
                                                                                                                        echo 'Student answer inserted successfully';
                                                                                                                    } else {
                                                                                                                        echo 'Failed to insert student answer';
                                                                                                                    }

                                                                                                             
                                                                                                             
                                                                                                         }
                                                                                                                  
                                                                                         
                                                                                         
                                                                                    }else
                                                                                    {
                                                                                        
                                                                                    }
                                                                                        
                                                                                    
                                                                                    
                                                                                  
                                                                                   
                                                                                                                                    
                                                                                 
                                                                                
                                                                                
                                                                                
                                                                                
                                                                         
                                                                         
                                                                         
                                                                       
                                                                         
                                                                         
                                                                     }while($select_student_answer_cnt = mysqli_fetch_assoc($select_student_answer));
                                                                     
                                                               }else
                                                               {
                                                                   
                                                               }
                                                           
                                                           //PROSCESS STUDENT INSERTED ANSWER HERE
                
                
                
                
                
                // topic here
                $update_prosgetcorriculorm = mysqli_query($link_abba, "SELECT * FROM `curriculumtopic` WHERE InstitutionID='$abba_campus' AND SubjectOrCourseID='$Old_Subject_Id'"); 
                $update_prosgetcorriculorm_cnt = mysqli_num_rows($update_prosgetcorriculorm);
                $update_prosgetcorriculorm_cnt_row = mysqli_fetch_assoc($update_prosgetcorriculorm);
                
                if($update_prosgetcorriculorm_cnt > 0)
                {
                    
                    
                       do{
                           
                           
                           
                                       
                                      $CurriculumTopicID_old =  $update_prosgetcorriculorm_cnt_row['CurriculumTopicID'];
                                      $campusID_old =  $update_prosgetcorriculorm_cnt_row['InstitutionID'];
                                      $FacultyOrSchoolID_old_corr =  $update_prosgetcorriculorm_cnt_row['FacultyOrSchoolID'];
                                      $TermOrSemesterName_old_corr =  $update_prosgetcorriculorm_cnt_row['TermOrSemesterName'];
                                      $TopicName_old_corr =  $update_prosgetcorriculorm_cnt_row['TopicName'];
                                      
                                      
                                      
                                        if($TermOrSemesterName_old_corr  == 'First')
                                        {
                                            
                                              $pros_curiterm = 1;
                                            
                                        }else if($TermOrSemesterName_old_corr  == 'Second')
                                        {
                                             $pros_curiterm = 2;
                                            
                                        }else if($TermOrSemesterName_old_corr  == 'Third')
                                        {
                                              $pros_curiterm = 3;
                                        }
                                      
                                      
                                          $insert_topic_query = mysqli_query($link, "SELECT * FROM `curriculumtopic` WHERE
                                          `CampusID`='$campusID_old' AND `SubjectOrCourseID`='$New_Subject_Id' AND 
                                          `ClassOrDepartmentID`='$Class_Id' AND `SectionID`='$FacultyOrSchoolID_old_corr' 
                                          AND `TermOrSemesterName`='$pros_curiterm' AND `TopicName`='$TopicName_old_corr'");
                                          
                                           $insert_topic_query_cnt = mysqli_num_rows($insert_topic_query);
                                       
                                       if($insert_topic_query_cnt > 0)
                                       {
                                        
                                           
                                       }else
                                       {
                                           
                                           
                                               $prosinserttopic = mysqli_query($link, "INSERT INTO `curriculumtopic`(`CurriculumTopicID`, `CampusID`, 
                                               `SubjectOrCourseID`, `ClassOrDepartmentID`, `SectionID`, `TermOrSemesterName`, `TopicName`) 
                                               VALUES ('$CurriculumTopicID_old','$campusID_old','$New_Subject_Id','$Class_Id','$FacultyOrSchoolID_old_corr','$pros_curiterm','$TopicName_old_corr')");
                                               
                                               
                                               
                                               if($prosinserttopic == true)
                                               {
                                                   
                                                   
                                                       echo 'curriculum inserted successfully';
                                               }else
                                               {
                                                   echo 'curriculum failed to be inserted';
                                               }
                                           
                                           
                                       }
                                      
                                       
                                      
                          
                           
                           
                          
                           
                       }while($update_prosgetcorriculorm_cnt_row = mysqli_fetch_assoc($update_prosgetcorriculorm));
                    
                }else
                {
                    
                }
            
               // topic here
               
               
              //   sub topic content here 
            
            
            
                             $prosloadschemeofwork = mysqli_query($link_abba, "SELECT * FROM `curriculumsubtopic` WHERE  InstitutionID='$abba_campus'");
                             $prosloadschemeofwork_cnt = mysqli_num_rows($prosloadschemeofwork);
                             $update_prosgetcorriculorm_cnt_row = mysqli_fetch_assoc($prosloadschemeofwork);
                             
                             if($prosloadschemeofwork_cnt > 0)
                             {
                                 
                                    do{
                                        
                                        
                                        
                                        
                                        
                                           $InstitutionID_sub = $update_prosgetcorriculorm_cnt_row['InstitutionID'];
                                           $CurriculumTopicID = $update_prosgetcorriculorm_cnt_row['CurriculumTopicID'];
                                           $CurriculumSubTopic = $update_prosgetcorriculorm_cnt_row['CurriculumSubTopic'];
                                           $SubTopicName =  $update_prosgetcorriculorm_cnt_row['SubTopicName'];
                                           
                                           
                                           $verifysubhere = mysqli_query($link, "SELECT * FROM `curriculumsubtopic` WHERE CurriculumSubTopic='$CurriculumSubTopic' 
                                           AND CampusID='$InstitutionID_sub' AND CurriculumTopicID='$CurriculumTopicID' AND SubTopicName='$SubTopicName'");
                                           
                                           
                                             $verifysubhere_cnt = mysqli_num_rows($verifysubhere);
                                            
                                            
                                            if($verifysubhere_cnt > 0)
                                            {
                                                
                                                
                                            
                                                
                                            }else
                                            {
                                                
                                                
                                                $insert_cubtopic = mysqli_query($link, "INSERT INTO 
                                                `curriculumsubtopic`(`CurriculumSubTopic`, `CampusID`, `CurriculumTopicID`, `SubTopicName`)
                                                VALUES ('$CurriculumSubTopic','$InstitutionID_sub','$CurriculumTopicID','$SubTopicName')");
                                                
                                                
                                                if($insert_cubtopic == true)
                                                {
                                                    echo 'sub topic inserted successfuly';
                                                }else
                                                {
                                                       echo 'sub topic fialed';
                                                }
                                                
                                            }
                                           
                                        
                                    }while($update_prosgetcorriculorm_cnt_row = mysqli_fetch_assoc($prosloadschemeofwork));
                                 
                             }else
                             {
                                 
                             }
                             
                             
                            
                            
              //   sub topic content here 
            
            
               
               
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