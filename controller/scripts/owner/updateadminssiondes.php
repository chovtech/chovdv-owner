<?php
     
        include('../../config/config.php');

        $userID = $_POST['UserID'];
        $IntitutionID = $_POST['InstitutionID'];

       $description =  mysqli_real_escape_string($link,$_POST['admindescription']);
        $Title =  mysqli_real_escape_string($link,$_POST['adminTitle']);
        $Session =  mysqli_real_escape_string($link,$_POST['adminsession']);
        $Term =  $_POST['adminterm'];


          $selectwebsettingsverify = mysqli_query($link,"SELECT * FROM `webadmissionsetting` WHERE InstitutionID='$IntitutionID'");
          $selectwebsettingsverifycnct = mysqli_num_rows($selectwebsettingsverify);
          $selectwebsettingsverifycnctrow =mysqli_fetch_assoc($selectwebsettingsverify);


             


          if( $selectwebsettingsverifycnct  > 0)
          {
                     $updatedes = mysqli_query($link,"UPDATE `webadmissionsetting` SET `Title`='$Title',`Description`='$description',`Session`='$Session',`Term`='$Term' WHERE `InstitutionID`='$IntitutionID'");
           
          }else
          {
                       $updatedes = mysqli_query($link,"INSERT INTO `webadmissionsetting`(`InstitutionID`, `Title`, `Description`, `Session`, `Term`) VALUES ('$IntitutionID','$Title','$description','$Session','$Term')");
                 
          }


   

     if($updatedes == true)
     {
        echo 'success';
     }
   ?>
