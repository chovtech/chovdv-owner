<?php


             include('../../config/config.php');
            $campusID = $_POST['campusID'];
            $subtopicID = $_POST['subtopicID'];
            
            
            $deleteSubtopichere = mysqli_query($link,"DELETE FROM `curriculumsubtopic` WHERE CampusID='$campusID' AND CurriculumSubTopic='$subtopicID'");
            
            if($deleteSubtopichere == true)
            {
                echo 'success';
                
            }else
            {
               echo 'failed'; 
               
            }

 
?>