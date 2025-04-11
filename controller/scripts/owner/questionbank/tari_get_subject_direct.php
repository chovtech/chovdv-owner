<?php
include('../../../config/config.php');

        $tari_get_stored_instituion_id = $_POST['tari_get_stored_instituion_id'];
        $campus_id = $_POST['campus_id'];
         $sectionID = $_POST['sectionID'];
         

       
      
        // SELECT DISTINCT subjectorcourse.SubjectOrCourseID, subjectorcourse.SubjectOrCourseTitle FROM  `classordepartment` 
        //                 INNER JOIN `courseorsubjectallocation` ON classordepartment.ClassOrDepartmentID = courseorsubjectallocation.ClassOrDepartmentID
        //                 INNER JOIN `subjectorcourse` ON courseorsubjectallocation.SubjectOrCourseID = subjectorcourse.SubjectOrCourseID
        //                 WHERE classordepartment.CampusID = '$campus_id' AND classordepartment.`SectionID` = '$sectionID' ORDER BY `ClassOrDepartmentName` ASC


        $check_subject = (" SELECT * FROM `section` INNER JOIN `classtemplate` ON 
        `section`.`SectionListID` = `classtemplate`.`SectionListID` 
        WHERE `section`.`CampusID`='$campus_id' AND `section`.`SectionID`='$sectionID'");


        $query_subject = mysqli_query($link,$check_subject);
        $fetch_subject = mysqli_fetch_assoc($query_subject);
         $row_subject = mysqli_num_rows($query_subject);

        if($row_subject > 0)
        {
            echo '<h5 class="p-4">Select Class</h5>
                 <form class="selectSubject">';
                
            do{
                $ClassTemplateName = $fetch_subject['ClassTemplateName'];
                $ClassTemplateID = $fetch_subject['ClassTemplateID'];

                echo '<label class="ps-1 py-1 subjectDirect" data-id="'. $ClassTemplateID.'">
                        <input type="radio" class="prosloadclassforcreatequestion" name="radio3" value="'.$ClassTemplateID.'"/>
                        <span>'.$ClassTemplateName.'</span>
                    </label>';   
            }while( $fetch_subject = mysqli_fetch_assoc($query_subject));

            echo '</form>';

        }else{
            echo '<img src="err.png" width="70" class="img-fluid mx-auto d-block" alt="...">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                        <p style="font-size:18px;">Opps, No Class Found.</p>
                        </blockquote>
                    </figure>';
        }
?>
