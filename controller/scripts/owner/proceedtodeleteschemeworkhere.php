<?php


            include('../../config/config.php');


            $campusID = $_POST['campusID'];
            $Term = $_POST['Term'];
            $topicID = $_POST['prosedittopicID'];


            $delete_schemework = mysqli_query($link,"DELETE FROM `curriculumtopic`
             WHERE CampusID='$campusID' AND CurriculumTopicID='$topicID' AND TermOrSemesterName='$Term'");

             if($delete_schemework == true)
             {


                    echo 'success';

                    $verify_subtopic = mysqli_query($link,"SELECT * FROM `curriculumsubtopic` WHERE CampusID='$campusID' AND CurriculumTopicID='$topicID'");
                    $verify_subtopiccnt = mysqli_num_rows($verify_subtopic);

                    if($verify_subtopiccnt > 0)
                    {
                            $deletesubtopichere = mysqli_query($link,"DELETE FROM `curriculumsubtopic` WHERE CampusID='$campusID' AND CurriculumTopicID='$topicID'");
                    }


             }else
             {
                echo 'failed';
             }



          
?>