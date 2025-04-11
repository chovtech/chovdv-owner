<?php

            include("../../../config/config.php");

            $emma_institution_id = $_POST['abba-change-institution'];

            $select_institution_id = "SELECT * FROM `transportationtable` WHERE `InstitutionID` = '$emma_institution_id' ";
            $outcome = mysqli_query($link, $select_institution_id);
            $number_of_rows = mysqli_num_rows($outcome);

            if($number_of_rows > 0){
               echo 1;
            }else{
                echo 2;
            }

?>