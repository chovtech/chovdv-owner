<?php

                
        include('../../config/config.php');



        $admissiondescription = mysqli_real_escape_string($link,$_POST['admissiondescription']);
       $UserID = $_POST['UserID'];
       $InstitutionID = $_POST['InstitutionID'];
       $campusID = $_POST['campusID'];





    //    $inserttemp = mysqli_query($link,"INSERT INTO `admissionlettertemplate`(`LetterDescription`) VALUES ('$admissiondescription')");



        $selectadmissionletterverify  = mysqli_query($link,"SELECT * FROM `admissionletter` WHERE CampusID='$campusID'");
        $selectadmissionletterverifycnt = mysqli_num_rows($selectadmissionletterverify);


        if($selectadmissionletterverifycnt > 0)
        {

               $insertdescription = mysqli_query($link,"UPDATE `admissionletter` SET `AdmissionLetter`='$admissiondescription' WHERE `CampusID`='$campusID'");

        }else
        {
            $insertdescription = mysqli_query($link,"INSERT INTO `admissionletter`(`CampusID`, `AdmissionLetter`) VALUES ('$campusID','$admissiondescription')");
        }

      

        if($insertdescription == true)
        {
               echo 'success';
        }else
        {
            echo 'failed';
        }



?>