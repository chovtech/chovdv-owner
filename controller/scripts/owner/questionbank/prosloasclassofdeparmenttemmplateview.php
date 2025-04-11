<?php
            include('../../../config/config.php');

        $tari_get_stored_instituion_id = $_POST['tari_get_stored_instituion_id'];
        $campus_id = $_POST['campus_id'];
         $sectionID = $_POST['prossetiongotten'];
         

        $check_subject = (" SELECT * FROM `section` INNER JOIN `classtemplate` ON 
        `section`.`SectionListID` = `classtemplate`.`SectionListID` 
        WHERE `section`.`CampusID`='$campus_id' AND `section`.`SectionID`='$sectionID'");


        $query_subject = mysqli_query($link,$check_subject);
        $fetch_subject = mysqli_fetch_assoc($query_subject);
        $row_subject = mysqli_num_rows($query_subject);

        if($row_subject > 0)
        {

            echo '<option value="NULL">Select Class</option>';
           
                
            do{
                $ClassTemplateName = $fetch_subject['ClassTemplateName'];
                $ClassTemplateID = $fetch_subject['ClassTemplateID'];

                echo '<option value="'.$ClassTemplateID .'">'.$ClassTemplateName .'</option>';

            }while( $fetch_subject = mysqli_fetch_assoc($query_subject));

           

        }else{
            echo '<option value="NULL">No class found</option>';
        }
?>
