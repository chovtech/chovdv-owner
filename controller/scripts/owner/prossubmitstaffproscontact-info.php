<?php


                    include('../../config/config.php');
                        
                    $prosstaffemailedit = $_POST['prosstaffemailedit'];
                    $prosstaffadress = mysqli_real_escape_string($link,$_POST['prosstaffadress']);
                    $phonenumfull = $_POST['phonenumfull'];
                    $staffID = $_POST['staffID'];



                    $update_sql = mysqli_query($link,"UPDATE `staff` SET `StaffMainNumber`='$phonenumfull',`StaffEmail`='$prosstaffemailedit',`StaffAddress`='$prosstaffadress' WHERE `StaffID`='$staffID'");


                    if($update_sql == true)
                    {
                          echo 'success';
                    }else
                    {
                        echo 'fail';

                    }

                    



                   



?>