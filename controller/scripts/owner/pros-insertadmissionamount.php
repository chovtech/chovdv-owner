<?php


            include('../../config/config.php');
            $userID = $_POST['UserID'];

            $IntitutionID = $_POST['IntitutionID'];
            $amountsingle = $_POST['prosadmissionamount'];
            $campusID = $_POST['prosadmissioncampus_storage'];

            $prosadmissionamounteacclassID = explode(',', $_POST['prosadmissionamounteacclassID']);
            $prosadmissionamounteach = explode(',', $_POST['prosadmissionamountforeach']);


                if ($amountsingle == '') {

                    foreach ($prosadmissionamounteacclassID as $key => $newclassesarr) {

                        $newclassesarr;
                        $amountnew = $prosadmissionamounteach[$key];

                        $upateadmittedclass = mysqli_query($link, "UPDATE `admissionclass` SET `PaymentAmount` = '$amountnew', PaymentStatus='1' WHERE CampusID='$campusID' AND AdmissionDefaultClassID='$newclassesarr'");
                    }

                } else {

                        $upateadmittedclass = mysqli_query($link, "UPDATE `admissionclass` SET `PaymentAmount` = '$amountsingle', PaymentStatus='1' WHERE CampusID='$campusID'");

                }


                if($upateadmittedclass == true)
                {
                      echo 'success';  
                }else
                {
                    echo 'fail';  
                }













?>