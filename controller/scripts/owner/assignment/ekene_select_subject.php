<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $class_id = $_POST["class_id"];
 $campus = $_POST["campus"];

 $ekene_sql_class = ("SELECT * FROM `classordepartment` INNER JOIN `courseorsubjectallocation` ON classordepartment.ClassOrDepartmentID = courseorsubjectallocation.ClassOrDepartmentID
  AND classordepartment.CampusID = courseorsubjectallocation.CampusID
   INNER JOIN `subjectorcourse` ON `courseorsubjectallocation`.`SubjectOrCourseID`=`subjectorcourse`.`SubjectOrCourseID`
    WHERE `classordepartment`.`CampusID`= '$campus' AND `courseorsubjectallocation`.`CampusID`='$campus' AND
     `classordepartment`.ClassOrDepartmentID = '$class_id' AND courseorsubjectallocation.ClassOrDepartmentID = '$class_id'
     ORDER BY SubjectOrCourseTitle ASC" );
 $ekene_query_link_class = mysqli_query($link, $ekene_sql_class);
 $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
 $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);

 echo '<option value="NULL">Select subject</option>';

 if($ekene_row_cnt_ekene > 0)
 {
    
     
     do{
        

         $ekene_subject_id = $ekene_get_details_subject['SubjectOrCourseID'];

         $ekene_subject = $ekene_get_details_subject['SubjectOrCourseTitle'];

         echo '<option value="'.$ekene_subject_id.'">'.$ekene_subject.'</option>';
         
     }while($ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class));
 }
 else{
     echo '<option value="NULL">No Records Found</option>';
 }
?>