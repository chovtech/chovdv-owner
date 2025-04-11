<?php

        include('../../config/config.php');
        $UserID = $_POST['UserID'];
        $IntitutionID = $_POST['IntitutionID'];
        $faquestionnew = explode('###', $_POST['faquestionnew']);
        $faqanswernew = explode('###', $_POST['faqanswernew']);


       $deleteinstution = mysqli_query($link,"DELETE FROM `webadmissionquestion` WHERE InstitutionID='$IntitutionID'");
        foreach ($faquestionnew as $key =>  $faquestionnewarr) {


            $qustiongottenfinal = mysqli_real_escape_string($link, str_replace('###', '', $faquestionnewarr));
           $answerfinal = mysqli_real_escape_string($link, str_replace('###', '',  $faqanswernew[$key]));

          $updatefaqs = mysqli_query($link,"INSERT INTO `webadmissionquestion`(`InstitutionID`, `Question`, `Answer`) VALUES ('$IntitutionID','$qustiongottenfinal','$answerfinal')");



        }


        if( $updatefaqs == true)
        {
            echo 'success';

        }else
        {

            echo 'failed';

        }



?>