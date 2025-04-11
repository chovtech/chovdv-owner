<?php



        include('../../config/config.php');
        $groupSchoolID = $_POST['groupSchoolID'];
        $Image  = $_POST['image'];
        $StaffID  = $_POST['StaffID'];
        

       $select_update = mysqli_query($link,"UPDATE `staff` SET StaffPhoto='$Image' WHERE InstitutionID='$groupSchoolID' AND StaffID='$StaffID'");

       if($select_update == true)
       {
            echo 'succcess';
       }
        
        

?>