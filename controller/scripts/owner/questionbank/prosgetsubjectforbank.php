

<?php


        include('../../../config/config.php');

        $campus_id = trim($_POST['campus_id']);
        $sectionID = trim($_POST['sectionID']);
        $classID = trim($_POST['classID']);
       



         // get subject
         $check_subject = "SELECT DISTINCT `subjectorcourse`.SubjectOrCourseID, `subjectorcourse`.SubjectOrCourseTitle  FROM `subjectorcourse` INNER JOIN `courseorsubjectallocation` ON `subjectorcourse`.SubjectOrCourseID = `courseorsubjectallocation`.SubjectOrCourseID  WHERE `subjectorcourse`.ClassTemplateID='$classID' AND `courseorsubjectallocation`.CampusID='$campus_id '  ORDER BY `subjectorcourse`.SubjectOrCourseTitle ASC";
   
        $query_subject = mysqli_query($link,$check_subject);
        $fetch_subject= mysqli_fetch_assoc($query_subject);
        $row_subject = mysqli_num_rows($query_subject);

      

        if($row_subject > 0)
        {

            echo '<option value="NULL">Select Subject</option>';

            do{


                $SubjectOrCourseTitle = $fetch_subject['SubjectOrCourseTitle'];
                $SubjectOrCourseID = $fetch_subject['SubjectOrCourseID'];
    
    
                 echo '<option value="'.$SubjectOrCourseID.'">'.$SubjectOrCourseTitle.'</option>';
    
    
            }while($fetch_subject= mysqli_fetch_assoc($query_subject));

        }else{

            echo '<option value="NULL">NO Subject found</option>';
        }
        


       


      

       


        
?>
