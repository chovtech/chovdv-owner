<?php
        include('../../config/config.php');

        $schoolink = $_POST['schoolink'];
        $UserID  = $_POST['UserID'];
        $SchoolID  = $_POST['SchoolID'];

        $schoolink.='.edumess.com';

        if($SchoolID == '')
        {
              $verifyschool =  mysqli_query($link,"SELECT * FROM `institution` WHERE CustomUrl='$schoolink'");
              $verifyschoolcnt = mysqli_num_rows($verifyschool);
        }else
        {

            $verifyschool =  mysqli_query($link,"SELECT * FROM `institution` WHERE CustomUrl='$schoolink' AND InstitutionID != '$SchoolID'");
            $verifyschoolcnt = mysqli_num_rows($verifyschool);
            
        }

        if($verifyschoolcnt > 0)
        {
            echo 'found';
        }else{
            echo 'not found';
        }




        


        

?>