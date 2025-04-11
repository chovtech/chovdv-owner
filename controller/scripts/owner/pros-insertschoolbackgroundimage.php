<?php

                           

         include('../../config/config.php');

          $image = $_POST['image'];
         $InstitutionID = $_POST['prosloginschool'];
         $prosstageforloginimage = $_POST['prosstageforloginimage'];



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