<?php
        include('../../config/config.php');

       
        $campusID  = $_POST['campusID'];
        $campusloceditt  = mysqli_real_escape_string($link,$_POST['campusloceditt']);

        $email  = mysqli_real_escape_string($link,$_POST['campusemailedit']);
        $country  = $_POST['proscampuscountryedit'];
        $state  = $_POST['proscampusstateedit'];
        $lga  = $_POST['proscampuslgaedit'];
        $number  = $_POST['number'];

        $updatecampussql = mysqli_query($link,"UPDATE `campus` SET `CampusName`='$campusloceditt',`CampusCountry`='$country',
        `CampusState`='$state',`CampusLGA`='$lga',`CampusEmail`='$email',`CampusPhone`='$number' WHERE `CampusID`='$campusID'");




            if($updatecampussql == true)
            {
                   echo 'success';
            }else
            {
                echo 'failed';
            }



       
      
      
       


?>