<?php

         include('../../../config/config.php');

        $tari_get_stored_instituion_id = $_POST['tari_get_stored_instituion_id'];


        $campus_id = $_POST['campus_id'];
        $sectionID = $_POST['sectionID'];
        $classtemplateID = $_POST['classtemplateID'];
        $MainclassID = implode(',',$_POST['MainclassID']);

        $term = $_POST['term'];

        $classF_Index =  $classtemplateID[0];




       
       

        // get total parent
        $check_subject = ("SELECT DISTINCT `subjectorcourse`.`SubjectOrCourseID`,`subjectorcourse`.`SubjectOrCourseTitle` FROM `courseorsubjectallocation` INNER JOIN `classordepartmentstudentallocation` ON `courseorsubjectallocation`.`ClassOrDepartmentID` = `classordepartmentstudentallocation`.`ClassOrDepartmentID` INNER JOIN `subjectorcourse` ON `subjectorcourse`.`SubjectOrCourseID` = `courseorsubjectallocation`.`SubjectOrCourseID` WHERE `subjectorcourse`.`ClassTemplateID`='$classF_Index' AND `courseorsubjectallocation`.`ClassOrDepartmentID` IN($MainclassID) AND `courseorsubjectallocation`.`CampusID`='$campus_id'
        ");

            $query_subject = mysqli_query($link,$check_subject);
            $fetch_subject = mysqli_fetch_assoc($query_subject);
            $row_subject = mysqli_num_rows($query_subject);

        if($row_subject > 0)
        {
            echo '<option value="NULL">Please Select Subject</option>';

            do{

                $subjectID =  $fetch_subject['SubjectOrCourseID'];
                $subjectName =  $fetch_subject['SubjectOrCourseTitle'];

                echo '<option value="'.$subjectID.'">'.$subjectName.'</option>';

            }while($fetch_subject = mysqli_fetch_assoc($query_subject));

        }else{
            
            echo '<option value="NULL">No Subject</option>';
        }

?>