<?php
    include ('../../config/config.php');

      $session = $_POST['session'];
     $StaffID = $_POST['staffID'];
     $InstitutionID = $_POST['instid'];
      $status = $_POST['status'];
     $date = date('Y-m-d');

     if($status == '2')
     {
      


        $updatestaffstatus = mysqli_query($link,"INSERT INTO `deactivateuser`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `sessionName`, `Status`, `Date`) VALUES ('$InstitutionID','$StaffID','staff','$session','$status','$date')");

        echo '1';
     }else
     {
        $updatestaffstatus = mysqli_query($link,"DELETE FROM `deactivateuser` WHERE InstitutionIDOrCampusID='$InstitutionID' AND UserID='$StaffID' AND UserType='staff'");
        echo '2';
     }


     

    

?>