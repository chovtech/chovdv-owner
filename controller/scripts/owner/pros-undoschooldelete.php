<?php


         include('../../config/config.php');

         $SchoolID = $_POST['InstitutionID'];
         $UserID  = $_POST['UserID'];
         $CampusID = $_POST['prosdeletecampusID'];

            $deleteschoolquery = mysqli_query($link,"UPDATE `institution` SET `TrashStatus`='0',
            `TrashPeriod`='' WHERE InstitutionID='$SchoolID'");


            $updatecampus_statushere = mysqli_query($link,"UPDATE `campus` SET `CampusTrashStatus`='0',`TrashPeriod`=''
            WHERE CampusID='$CampusID' AND InstitutionID='$SchoolID'");
       
            if($updatecampus_statushere == true)
            {
                        echo 'success';
            }else
            {
                    echo 'failed';
            }



?>