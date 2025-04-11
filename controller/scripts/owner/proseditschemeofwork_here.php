<?php

        include('../../config/config.php');


        $campusID = $_POST['campusID'];
        $topicname = mysqli_real_escape_string($link,$_POST['topicname']);
        $Term = $_POST['Term'];
        $topicID = $_POST['prosedittopicID'];


        $subtopicedit = $_POST['subtopicedit'];
        $subtopiceditID = $_POST['subtopiceditID'];

        $subtopiceditarr = explode(',', $subtopicedit);
        
        $subtopiceditIDrarr = explode(',', $subtopiceditID);


       

            $udatetopic =  mysqli_query($link,"UPDATE `curriculumtopic` SET TopicName='$topicname' 
            WHERE CurriculumTopicID='$topicID' AND CampusID='$campusID' AND TermOrSemesterName='$Term'");

            if( $subtopiceditID  == '')
            {

                        foreach($subtopiceditarr as $subtopiceditarnew)
                        {
                            
                            $subtopiceditarnew;

                            $selectsubtopicverify = mysqli_query($link,"SELECT * FROM `curriculumsubtopic` WHERE CurriculumTopicID='$topicID' AND CampusID='$campusID'
                            AND SubTopicName='$subtopiceditarnew'");

                            $selectsubtopicverifycnt = mysqli_num_rows($selectsubtopicverify);

                            if($selectsubtopicverifycnt > 0)
                            {

                            }else
                            {
                                        $insertsubtopichere = mysqli_query($link,"INSERT INTO `curriculumsubtopic`(`CampusID`, `CurriculumTopicID`, `SubTopicName`) 
                                        VALUES ('$campusID','$topicID','$subtopiceditarnew')");
                            }
                        }

            }else
            {
                        foreach($subtopiceditarr as $key => $subtopiceditarnew)
                        {
                            $subtopiceditarnew;
                            $subtopicID = $subtopiceditIDrarr[$key];
                            
                            if($subtopicID == '')
                            {
                                         $insertsubtopichere = mysqli_query($link,"INSERT INTO `curriculumsubtopic`(`CampusID`, `CurriculumTopicID`, `SubTopicName`) 
                                         VALUES ('$campusID','$topicID','$subtopiceditarnew')");
                            }else
                            {
                               $insertsubtopichere = mysqli_query($link,"UPDATE `curriculumsubtopic` SET `SubTopicName`='$subtopiceditarnew' WHERE `CurriculumSubTopic`='$subtopicID' AND CampusID='$campusID'");  
                            }
                            
                           

                        }
            }

            

            if($udatetopic == true)
            {
                    echo 'success';
            }else
            {
                    echo 'failed';
            }




      

      


    ?>