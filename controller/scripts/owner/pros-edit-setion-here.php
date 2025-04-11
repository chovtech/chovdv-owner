<?php

                include('../../config/config.php');

                
                $IntitutionID = $_POST['IntitutionID'];
                $campusID = $_POST['campusID'];
                 $sectionID = $_POST['sectionID'];
                 $sectionName = $_POST['sectionName'];



                 $updatesectionhere = mysqli_query($link,"UPDATE `section` SET `SectionName`='$sectionName' WHERE `CampusID`='$campusID' AND `SectionID`='$sectionID'");
                 

                 if($updatesectionhere == true)
                 {
                      echo 'success';
                 }else
                 {
                    echo 'failed';
                 }




?>