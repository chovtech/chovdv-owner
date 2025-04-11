<?php
        //Include database connection
         include ('../../config/config.php');

        $campusID = $_POST['campusID'];

         $ClassNameAddClass = $_POST['classID'];
        $mergerid = $_POST['mergerid'];
        $UserID = $_POST['UserID'];


         $deletecourmertitle =  mysqli_query($link,"DELETE FROM `courseorsubjectmergetitle` WHERE CampusID='$campusID' AND ClassOrDepartmentID='$ClassNameAddClass' AND CourseOrSubjectMergeID='$mergerid'");
         
         if($deletecourmertitle == true)
         {
                  $deletecourmer =  mysqli_query($link,"DELETE FROM `courseorsubjectmerged` WHERE CampusID='$campusID' AND ClassOrDepartmentID='$ClassNameAddClass' AND CourseOrSubjectMergeID='$mergerid'");
                  echo 'success';
         }
          

    

?>   