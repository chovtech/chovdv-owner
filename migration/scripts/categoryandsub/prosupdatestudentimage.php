<?php
                
                
                
                
                 error_reporting(E_ALL);
            ini_set('display_errors', 1);
        
            include('../../../controller/config/config.php');
            
            include('../../../controller/config/config2.php');
            
            
            
          
            
             $staffid = $_POST['staffid'];
             $base64String = $_POST['base64String'];
             
             $updatstudent = mysqli_query($link,"UPDATE `staff` SET `StaffPhoto`='$base64String' WHERE `StaffID`='$staffid'");
             
             
             if($updatstudent = true)
             {
                   echo 'succeess';
             }else
             {
                 
                 echo 'failed';
                 
             }
             
             
            


?>