<?php

        include('../../config/config.php');
        
         $campusID = $_POST['campusID'];
         $UserID = $_POST['UserID'];


        $selectadmittedclass =  mysqli_query($link,"SELECT * FROM `classtemplate` INNER JOIN `admissionclass` ON `classtemplate`.`ClassTemplateID` = `admissionclass`.`AdmissionDefaultClassID` WHERE `admissionclass`.`CampusID`='$campusID' ORDER BY `ClassTemplateName` ASC");
        $selectadmittedclasscnt = mysqli_num_rows($selectadmittedclass);
        $selectadmittedclasscntrow = mysqli_fetch_assoc($selectadmittedclass);


        if($selectadmittedclasscnt > 0)
        {

            echo '<option value="NULL">Select Class</option>';
                do{


                    $Classname = $selectadmittedclasscntrow['ClassTemplateName'];
                    $AdmissionClassID = $selectadmittedclasscntrow['ClassTemplateID'];


                    echo '<option value="'.$AdmissionClassID.'">'.$Classname.'</option>';
                    

                }while($selectadmittedclasscntrow = mysqli_fetch_assoc($selectadmittedclass));
        }else{
            echo '<option value="NULL">No class found</option>';
        }




        
?>