<?php

            include('../../config/config.php');

           $UserID = $_POST['UserID'];
           $IntitutionID = $_POST['IntitutionID'];
           $staffID = $_POST['staffID'];
           $mainmenuIDJson = $_POST['mainmenuIDJson'];



           $selecctuserverify = mysqli_query($link,"SELECT * FROM `menupermission` WHERE UserID='$staffID'");
           $selecctuserverifyrow = mysqli_num_rows($selecctuserverify);

           if($selecctuserverifyrow > 0)
           {
               $updatepermession = mysqli_query($link,"UPDATE `menupermission` SET  `AdministrativeMenu`='$mainmenuIDJson' WHERE `UserID`='$staffID'");
                        
           }else
           {
                  $updatepermession = mysqli_query($link,"INSERT INTO `menupermission`(`AdministrativeMenu`, `UserID`) VALUES ('$mainmenuIDJson','$staffID')");

           }

           if($updatepermession == true)
           {

             echo 'success';

           }else
           {
               echo 'failed';
           }


        
?>