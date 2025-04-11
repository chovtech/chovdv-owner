<?php

                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                include('../../../config/config.php');


                $StudentID = $_POST["StudentID"];

                $settingsID = $_POST["pros_settingsID"];
                $status = $_POST["status"];


                if($status  == 1)
                {


                    $update_status = mysqli_query($link, "UPDATE `assignmentanswer` SET `publishstatus`='0' WHERE StudentID='$StudentID' AND `AssignmentSettingsID`='$settingsID'");

                }else
                {

                    $update_status = mysqli_query($link, "UPDATE `assignmentanswer` SET `publishstatus`='1' WHERE StudentID='$StudentID' AND `AssignmentSettingsID`='$settingsID'");

                }



                if(  $update_status  == true)
                {
                      echo 'success';
                }else
                {
                    echo 'failed';
                }



               

                



    ?>