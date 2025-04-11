<?php

                     include('../../config/config.php');
    
                    $image= $_POST['base64String'];
                    $staffID = $_POST['staffid'];
                    
                    
                    
                    $updatestaffimagehere = mysqli_query($link,"UPDATE `staff` SET `StaffPhoto`='$image' WHERE `StaffID`='$staffID'");
                    
                    
                    
                    
                    


?>