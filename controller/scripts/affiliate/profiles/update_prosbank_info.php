<?php


                    include('../../../config/config.php');
                        
                    $bank_code = $_POST['bank_code'];
                    $acc_name = mysqli_real_escape_string($link,$_POST['acc_name']);
                    $bank_name = mysqli_real_escape_string($link,$_POST['bank_name']);
                    $acc_no = mysqli_real_escape_string($link,$_POST['acc_no']);

                    $AffiliateID = $_POST['AffiliateID'];

                    

                   

                    $update_sql = mysqli_query($link,"UPDATE `affiliate` SET `BankAccName`='$acc_name',
                    `BankAccNo`='$acc_no',`BankCode`='$bank_code', `Bank`='$bank_name' WHERE `AffiliateID`='$AffiliateID'");


                    if($update_sql == true)
                    {
                          echo 'success';
                    }else
                    {
                        echo 'fail';

                    }

                    



                   



?>