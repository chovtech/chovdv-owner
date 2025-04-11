<?php

            include("../../../config/config.php");

            $emma_hostel_institution_id = $_POST['abba-change-institution'];

            $select_hostel_institution_id = "SELECT * FROM `hosteltable` WHERE `InstitutionID` = '$emma_hostel_institution_id' ";
            $hosteloutcome = mysqli_query($link, $select_hostel_institution_id);
            $number_of_hostel_rows = mysqli_num_rows($hosteloutcome);

            if($number_of_hostel_rows > 0){
               echo 1;
            }else{
                echo 2;
            }

?>