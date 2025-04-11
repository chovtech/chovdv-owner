<?php
    include ('../../config/config.php');

    
     $StaffID = explode(',',$_POST['StaffID']);
     $InstitutionID = $_POST['pros_get_stored_instituion_id'];


        foreach($StaffID as $StaffIDarr)
        {
               $StaffIDarr;
                        
                       
                $updatedeletestaus = mysqli_query($link," UPDATE  `staff` SET StaffTrashStatus='1' WHERE InstitutionID='$InstitutionID' AND StaffID='$StaffIDarr'");

        }

        if($updatedeletestaus == true)
        {
            echo 'success';
        }

?>