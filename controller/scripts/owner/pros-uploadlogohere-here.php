<?php

            include('../../config/config.php');

        
            $IntitutionID = $_POST['IntitutionID'];
            // $campusID = $_POST['campusID'];
            $image = $_POST['image'];




            $pros_update_logo= mysqli_query($link, "UPDATE `institution` SET `InstitutionLogo`='$image'  WHERE  InstitutionID='$IntitutionID'");



                if($pros_update_logo == true)
                {
                    echo 'success';
                }else
                {
                echo 'failed';
                }



?>

