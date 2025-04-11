<?php


    include('../../config/config.php');

    $userid = $_POST['UserID'];
    $SchoolID = $_POST['SchoolID'];
    $campusID = $_POST['campusID'];


    $currentDate = date('Y-m-d'); // Get the current date
    $twoWeeksLater = date('Y-m-d', strtotime('+2 weeks', strtotime($currentDate))); // Add two weeks to the current date for schooool to be removed in the database


        $deleteschoollnow = mysqli_query($link,"UPDATE `campus` SET `CampusTrashStatus`='1', `TrashPeriod`='$twoWeeksLater'  WHERE InstitutionID='$SchoolID' AND CampusID='$campusID'");
   


         if($deleteschoollnow == true)
         {
            echo 'success';
         }else

         {
            echo 'fail';  
         }

    ?>