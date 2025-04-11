<?php


            include('../../../config/config.php');

            $prosloadDeleteID = $_POST['prosloadDeleteID'];
            $campusID = $_POST['campusID'];
            
            $status = $_POST['prosdel_status'];

            if( $status  == 'single')
            {


                                      $delete_question = mysqli_query($link, " UPDATE `questionbank` SET  `Status`='1' WHERE `QuestionBankID`='$prosloadDeleteID' AND `CampusID`='$campusID'"); 
            }else
            {


                            foreach($campusID as $key =>   $campusIDnew)
                            {

                                       $questionID =  $prosloadDeleteID[$key];
                                       $campusIDnew;

                                       $delete_question = mysqli_query($link, " UPDATE `questionbank` SET  `Status`='1' WHERE `QuestionBankID`='$questionID' AND `CampusID`='$campusIDnew'"); 

                            }

                                   
            }
            

           


           

            if($delete_question  == true)
            {

                   echo '1';
            }else
            {

                   echo '2';
            } 

  ?>          