<?php


            include('../../config/config.php');

            $abba_instituion_id = $_POST['abba_instituion_id'];
            $campusID = $_POST['campus_id'];
            $sectionID = $_POST['sectionID'];

            $subjectID = $_POST['subjectID'];

            $termsemmester = $_POST['termsemmester'];

            $classID = explode(',',$_POST['classID']);

            $topicobjectgotten = $_POST['topicobjectgotten'];

            $prosmain_mainarr = json_decode($topicobjectgotten, true);


            foreach($classID as $classnewarr)
            {
                    $classnewarr;

                   
           


            // Loop through the array and manipulate the data
            foreach ($prosmain_mainarr as $topicData) {

                $topic = $topicData['topic'];

                $verify_pros_topic = mysqli_query($link,"SELECT * FROM `curriculumtopic` WHERE `CampusID`='$campusID' AND  `SubjectOrCourseID`='$subjectID' AND `ClassOrDepartmentID`='$classnewarr' AND `SectionID`='$sectionID' AND `TermOrSemesterName`='$termsemmester' AND `TopicName`='$topic'");
                $verify_pros_topiccnt =mysqli_num_rows($verify_pros_topic);

                if($verify_pros_topiccnt > 0)
                {

                }else
                {


                        $insert_topic = mysqli_query($link,"INSERT INTO `curriculumtopic` (`CampusID`, `SubjectOrCourseID`,`ClassOrDepartmentID`, `SectionID`,`TermOrSemesterName`, `TopicName`) 
                        VALUES ('$campusID','$subjectID','$classnewarr','$sectionID', '$termsemmester','$topic')");

                        $lastInsertedIdtopic = mysqli_insert_id($link);

                           
                         $subtopics = $topicData['subtopics'];

                        // Loop through subtopics for each topic
                        foreach ($subtopics as $subtopicData) {

                            $subtopic = $subtopicData['prossubmenutopic'];

                            if($subtopic == '')
                            {

                            }else
                            {
                                $insert_subtopic = mysqli_query($link,"INSERT INTO `curriculumsubtopic`(`CampusID`,
                                `CurriculumTopicID`,`SubTopicName`)  VALUES ('$campusID','$lastInsertedIdtopic','$subtopic')");
                            }
                        }

                        


                }

              
            }
        }

            if($insert_topic == true)
            {
                echo 'success';

            }else
            {
                    echo 'failed';
            }



?>