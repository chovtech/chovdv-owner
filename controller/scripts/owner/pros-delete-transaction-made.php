<?php

            include('../../config/config.php');

         
           $TransactionID = $_POST['TransactionID'];
            $campusID = $_POST['campusID'];


            $delete_transaction = mysqli_query($link,"UPDATE `transactions` SET DeleteStatus='1'  WHERE TransactionReference='$TransactionID' AND CampusID='$campusID'");
           

            if($delete_transaction  == true)
            {

                  echo 'success';

            }else
            {
                echo 'fail';
            }


?>