<?php


         include('../../config/config.php');

         $SchoolID = $_POST['SchoolID'];
         $UserID  = $_POST['UserID'];
         $CampusID = $_POST['campusID'];

         
         date_default_timezone_set('Africa/Lagos');

         // Create a DateTime object representing the current date and time
         $currentDate = new DateTime();

         // Add 2 weeks to the current date
         $currentDate->modify('+2 weeks');

         // Format the date as a string in the Nigerian format (dd/mm/yyyy)
         $newDate = $currentDate->format('d/m/Y');

         $updatecampus_statushere = mysqli_query($link,"UPDATE `campus` SET `CampusTrashStatus`='1',`TrashPeriod`='$newDate'
         WHERE CampusID='$CampusID' AND InstitutionID='$SchoolID'");


        if($updatecampus_statushere == true)
        {
            // $deletescetionhere = mysqli_query($link,"UPDATE `section` SET `SectionTrashStatus`='1',
            // `TrashDuration`='$newDate' WHERE CampusID='$CampusID'");
            
                    echo 'success';

        }else
        {
                  echo 'failed';
        }



?>