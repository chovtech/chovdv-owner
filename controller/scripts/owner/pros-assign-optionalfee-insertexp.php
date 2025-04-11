<?php

            include('../../config/config.php');

            $campusID = $_POST['campusID'];
            $sessionName = $_POST['sessionName'];
            $term = $_POST['term'];
            $Amountpaying = $_POST['Amountpaying'];
            $prosexpentype = $_POST['prosexpentype'];
            $campusName = $_POST['campusName'];
            $institution_id = $_POST['institution_id'];
            $categoryID = $_POST['categoryID'];

            $currentDate = date("Y-m-d");
           
            

            $firstLettercampus = strtoupper(substr($campusName, 0, 2));
            function generateTransactionReference($firstLettercampus) {
                $timestamp = time();
                $randomNumber = mt_rand(100, 999);
               
                $transactionReference =  $firstLettercampus ."" . $timestamp . "" . $randomNumber;
                return $transactionReference;
            }
            
            $transactionReference = generateTransactionReference($firstLettercampus);



            $insertexpen = mysqli_query($link,"INSERT INTO `transactions`(`InstitutionID`, `CampusID`, `TransactionReference`, `TransactionType`, `ModeofTransaction`, `CategoryID`, `SubcategoryID`, `TuitionType`, `Session`, `TermOrSemesterID`,  `TransactionOut`,  `Date`, `DeleteStatus`)
            VALUES ('$institution_id','$campusID','$transactionReference','expenditure','Normal','$categoryID','$prosexpentype','Normal','$sessionName','$term','$Amountpaying','$currentDate','0')");

            if($insertexpen == true)
            {
                 echo 'success';
            }else
            {
                echo 'failed';
            }

  

 ?>