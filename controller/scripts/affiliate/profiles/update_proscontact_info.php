<?php


                    include('../../../config/config.php');
                        
                    $prosstaffemailedit = $_POST['prosstaffemailedit'];
                    $prosstaffadress = mysqli_real_escape_string($link,$_POST['prosstaffadress']);
                    $phonenumfull = $_POST['phonenumfull'];
                    $AffiliateID = $_POST['AffiliateID'];

                    $phonenumfull = mysqli_real_escape_string($link,$phonenumfull);

                    $update_sql = mysqli_query($link,"UPDATE `affiliate` SET `Phone`='$phonenumfull',
                    `Email`='$prosstaffemailedit',`Address`='$prosstaffadress' WHERE `AffiliateID`='$AffiliateID'");


                    if($update_sql == true)
                    {
                          echo 'success';
                    }else
                    {
                        echo 'fail';

                    }

                    



                   



?>