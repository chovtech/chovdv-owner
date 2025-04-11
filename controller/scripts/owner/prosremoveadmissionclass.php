<?php

                include('../../config/config.php');

                $UserID = $_POST['UserID'];
                $InstitutionID = $_POST['IntitutionID'];
                $campusID = $_POST['campusID'];
                $classID = $_POST['IputstageID'];


                $deleteadmissionclasses = mysqli_query($link,"DELETE FROM `admissionclass` WHERE CampusID='$campusID' AND  AdmissionDefaultClassID='$classID'");

                if($deleteadmissionclasses  == true)
                {
                       echo 'success';
                }else
                {
                    echo 'fail';  
                }
               

                





?>