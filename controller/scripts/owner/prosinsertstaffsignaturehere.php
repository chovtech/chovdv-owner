<?php




            include('../../config/config.php');
            
            
            $image = mysqli_real_escape_string($link, $_POST['image']);
            $staffID = $_POST['staffID'];
            $InstitutionID = $_POST['InstitutionID'];
            
            
            $updtatestaffprofile = mysqli_query($link,"UPDATE `staff` SET `StaffSign`='$image' WHERE `InstitutionID`='$InstitutionID' AND `StaffID`='$staffID'");
            
            if($updtatestaffprofile == true)
            {
                echo '1';
            }else
            {
                echo '2';
            }
            
       
        
        
        
?>