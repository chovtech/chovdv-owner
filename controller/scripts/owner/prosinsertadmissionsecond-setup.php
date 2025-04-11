<?php


        include('../../config/config.php');


         $IntitutionID = $_POST['IntitutionID'];
        $UserID = $_POST['UserID'];
        $campusID = $_POST['campusID'];

       
        $backgroundimage = mysqli_real_escape_string($link, $_POST['backgroundimage']);
        $admissiontermgotten = $_POST['admissiontermgotten'];
        $admissionsessiongotten = $_POST['admissionsessiongotten'];
        $admissiontitlegotten = mysqli_real_escape_string($link, $_POST['admissiontitlegotten']);
        $admissiondescription = mysqli_real_escape_string($link, $_POST['admissiondescription']);

        $admissionbenefit = $_POST['admissionbenefit'];
        $prosfrequntlyaskedquestion = $_POST['prosfrequntlyaskedquestion'];
        $frequntlyaskedques_answer = $_POST['frequntlyaskedques_answer'];

        $admissionbenefisplitt = explode('###,', $admissionbenefit);
        $prosfrequntlyaskedquestionsplit = explode('###,', $prosfrequntlyaskedquestion);
        $frequntlyaskedques_answersplit = explode('###,', $frequntlyaskedques_answer);

        $benefitone = mysqli_real_escape_string($link, $admissionbenefisplitt[0]);
        $benefit_two = mysqli_real_escape_string($link, $admissionbenefisplitt[1]);
        $benefit_three = mysqli_real_escape_string($link, $admissionbenefisplitt[2]);
        $benefit_four = mysqli_real_escape_string($link, $admissionbenefisplitt[3]);
        $benefit_five = mysqli_real_escape_string($link, $admissionbenefisplitt[4]);    



            $verifyupdatequerysettings = mysqli_query($link, "SELECT * FROM `webadmissionsetting` WHERE  `InstitutionID`='$IntitutionID'");
            $verifyupdatequerysettingscnt = mysqli_num_rows($verifyupdatequerysettings);

            if ($verifyupdatequerysettingscnt > 0) {
                

                $updatesettings = mysqli_query($link, "UPDATE `webadmissionsetting` SET `Title`='$admissiontitlegotten', `Description`='$admissiondescription', `Session`='$admissionsessiongotten', `Term`='$admissiontermgotten',  `BackgroundImage`='$backgroundimage', `FirstBenefit`='$benefitone', `SecondBenefit`='$benefit_two', `ThirdBenefit`='$benefit_three', `FourthBenefit`='$benefit_four', `FifthBenefit`='$benefit_five' WHERE `InstitutionID`='$IntitutionID'");
                $updateprefixtag = mysqli_query($link, "UPDATE `admissionregnumberprifix` SET `Slidestatus`='1' WHERE `CampusID`='$campusID'");

            } else {

                $updateprefixtag = mysqli_query($link, "UPDATE `admissionregnumberprifix` SET `Slidestatus`='1' WHERE `CampusID`='$campusID'");

                $updatesettings = mysqli_query($link, "INSERT INTO `webadmissionsetting` (`InstitutionID`, `Title`, `Description`, `Session`, `Term`,  `BackgroundImage`, `FirstBenefit`, `SecondBenefit`, `ThirdBenefit`, `FourthBenefit`, `FifthBenefit`) VALUES ('$IntitutionID','$admissiontitlegotten','$admissiondescription','$admissionsessiongotten','$admissiontermgotten','$backgroundimage','$benefitone','$benefit_two','$benefit_three','$benefit_four','$benefit_five')");
            }



            



            foreach ($prosfrequntlyaskedquestionsplit as $key => $question) {



                        $question;
                        $faqsquestionanserw =  $frequntlyaskedques_answersplit[$key];



                        $faqsnew= mysqli_real_escape_string($link,str_replace('###', '',  $question));
                       $answernew= mysqli_real_escape_string($link,str_replace('###', '', $faqsquestionanserw));


                            $selectinstitutionqueryquestion = mysqli_query($link, "SELECT * FROM `webadmissionquestion` WHERE InstitutionID='$IntitutionID'");
                            $selectinstitutionqueryrowques = mysqli_num_rows($selectinstitutionqueryquestion);
                            $selectinstitutionqueryrowquesrow = mysqli_fetch_assoc($selectinstitutionqueryquestion);



                            if ($selectinstitutionqueryrowques > 0) {

                                $faqustionID = $selectinstitutionqueryrowquesrow['AdmissionQuestionID'];

                                $updatesettingsquestiondel = mysqli_query($link, "DELETE FROM `webadmissionquestion`  WHERE `InstitutionID`='$IntitutionID'");

                                
                               
                               
                                $updatesettingsquestion = mysqli_query($link, "INSERT INTO `webadmissionquestion` (`InstitutionID`, `Question`, `Answer`) VALUES ('$IntitutionID','$faqsnew','$answernew')");

                            } else {
                                
                                $updatesettingsquestion = mysqli_query($link, "INSERT INTO `webadmissionquestion` (`InstitutionID`, `Question`, `Answer`) VALUES ('$IntitutionID','$faqsnew','$answernew')");
                            }




            }


            if ($updatesettings === true && $updatesettingsquestion == true) {
                echo 'success';
            }






?>