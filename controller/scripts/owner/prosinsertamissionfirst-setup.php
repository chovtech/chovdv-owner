<?php


        include('../../config/config.php');

        $userID = $_POST['UserID'];
        $IntitutionID = $_POST['IntitutionID'];
        $CampusIDcompleted = $_POST['CampusIDcompleted'];

       
        $prosadmissionprefix = mysqli_real_escape_string($link, $_POST['prosadmissionprefix']);

      

       

       
       

            $verifyprefexist = mysqli_query($link, "SELECT * FROM `admissionregnumberprifix` WHERE `CampusID`='$CampusIDcompleted'");
            $selectquestionexistedrowsprefix = mysqli_num_rows($verifyprefexist);

            if ($selectquestionexistedrowsprefix > 0) {

                $upateprefix = mysqli_query($link, "UPDATE `admissionregnumberprifix` SET `RegNumberPrifix`='$prosadmissionprefix' WHERE `CampusID`='$CampusIDcompleted'");

            } else {

                $upateprefix = mysqli_query($link, "INSERT INTO `admissionregnumberprifix`(`CampusID`, `RegNumberPrifix`) VALUES ('$CampusIDcompleted','$prosadmissionprefix')");

            }

         


        if ($upateprefix == true) 
        {

            echo 'success';


        }
?>