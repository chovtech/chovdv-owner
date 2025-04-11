<?php

        include('../../../config/config.php');

        $instutitionID = $_POST['instutitionID'];
        $apikey = $_POST['apikey'];
        $secretekey = $_POST['secretekey'];

        $brand_id = $_POST['brand_id'];




            $insert_supplier = mysqli_query($link, "UPDATE `institution` SET `SendovaApiKey`='$apikey', `SendovaSecreteKey`='$secretekey', `SendovaBrandID`='$brand_id' WHERE `InstitutionID`='$instutitionID')");

            if( $insert_supplier == true)
            {
                    echo 'success';



            }else
            {
                echo 'failed';
            }



       





      



?>