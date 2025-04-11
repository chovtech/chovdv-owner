<?php




            include('../../config/config.php');
            
            
            $image = $_POST['image'];
            $staffID = $_POST['staffID'];
            $InstitutionID = $_POST['InstitutionID'];
           
            
            $updtatestaffprofile = mysqli_query($link,"SELECT * FROM `staff` WHERE `InstitutionID`='$InstitutionID' AND `StaffID`='$staffID'");
            $updtatestaffprofilecnt = mysqli_num_rows($updtatestaffprofile);
            $updtatestaffprofilecnt_fetch =mysqli_fetch_assoc($updtatestaffprofile);
            
            if($updtatestaffprofilecnt > 0)
            {
                
                
               echo $StaffSignature =  $updtatestaffprofilecnt_fetch['StaffSign'];
                
            }else
            {
                
            }
            
      
        
        
?>