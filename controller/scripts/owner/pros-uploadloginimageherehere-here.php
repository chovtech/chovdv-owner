<?php

            include('../../config/config.php');

                            
            $InstitutionID = $_POST['IntitutionID'];
            $campusID = $_POST['campusID'];
            $image = $_POST['image'];
            $prosstageforloginimage = $_POST['prosloadstageoimage'];






            if($prosstageforloginimage == '1')
            {
  
  
                $pros_update_loginimage = mysqli_query($link, "UPDATE `institution` SET `LoginBgImage`='$image'  WHERE  InstitutionID='$InstitutionID'");
  
               
            }else if($prosstageforloginimage == '2')
            {
  
              $pros_update_loginimage = mysqli_query($link,"UPDATE `institution` SET `LoginBgImage`='',`LoginBgImage2`='$image'  WHERE  InstitutionID='$InstitutionID'");
  
            }else if($prosstageforloginimage == '3')
            {
              $pros_update_loginimage = mysqli_query($link, "UPDATE `institution` SET `LoginBgImage3`='$image'  WHERE  InstitutionID='$InstitutionID'");
  
            }
      
  
            if($pros_update_loginimage == true)
            {
                echo 'success';
            }else
            {
              echo 'failed';
            }
  


            



?>