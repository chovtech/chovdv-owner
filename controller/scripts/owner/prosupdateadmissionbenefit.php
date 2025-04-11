<?php

        include('../../config/config.php');
        $UserID = $_POST['UserID'];
        $IntitutionID = $_POST['IntitutionID'];
        $benefitnameWithHashtags = explode('###', $_POST['benefitnameWithHashtags']);

        $benefitWithoutHashtagsArray = array();

        foreach ($benefitnameWithHashtags as $benefitnew) {
            $benefitWithoutHashtags = mysqli_real_escape_string($link, str_replace('###', '', $benefitnew));
            $benefitWithoutHashtagsArray[] = $benefitWithoutHashtags;
        }

        // Now you can access each element of the array individually
          $benefit1 = $benefitWithoutHashtagsArray[0];
          $benefit2 = $benefitWithoutHashtagsArray[1];
          $benefit3 = $benefitWithoutHashtagsArray[2];
         $benefit4 =  $benefitWithoutHashtagsArray[3];
         $benefit5 = $benefitWithoutHashtagsArray[4];



         $selectwebsettingsverify = mysqli_query($link,"SELECT * FROM `webadmissionsetting` WHERE InstitutionID='$IntitutionID'");
         $selectwebsettingsverifycnct = mysqli_num_rows($selectwebsettingsverify);
         $selectwebsettingsverifycnctrow =mysqli_fetch_assoc($selectwebsettingsverify);

         if($selectwebsettingsverifycnct > 0)
         {

            $inertinstitution = mysqli_query($link,"UPDATE `webadmissionsetting` SET  `FirstBenefit`='$benefit1',`SecondBenefit`='$benefit2',
            `ThirdBenefit`='$benefit3',`FourthBenefit`=' $benefit4',`FifthBenefit`='$benefit5'  WHERE InstitutionID='$IntitutionID'");
         }else
         {


            $inertinstitution = mysqli_query($link,"INSERT INTO `webadmissionsetting`(`InstitutionID`,  `FirstBenefit`, `SecondBenefit`, `ThirdBenefit`, `FourthBenefit`, `FifthBenefit`) VALUES ('$IntitutionID','$benefit1','$benefit2','$benefit3','$benefit4', '$benefit5')");
            
         }


        
         

         if($inertinstitution == true)
         {
                   echo 'success';
         }else
         {

               echo 'fauiled';

         }







    ?>