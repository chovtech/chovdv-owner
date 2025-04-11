<?php

    include("../../../config/config.php");

        $emma_get_route_name = $_POST['get_the_route_name'];
        $emma_get_route_amount = $_POST['get_the_route_amount'];
        $emma_get_route_id = $_POST['emmaamount-forrouteid'];
        $emma_get_institution_id = $_POST['abba-change-institution'];


            $emma_update_values = "UPDATE `transportationtable` SET `RouteName`='$emma_get_route_name',`RouteAmount`='$emma_get_route_amount' WHERE `RouteID`='$emma_get_route_id' AND `InstitutionID`='$emma_get_institution_id'";
            $emma_update_values_query = mysqli_query($link, $emma_update_values);


                if(mysqli_query($link, $emma_update_values)){
                    echo 4;
                } else{
                    echo "ERROR: Could not able to execute $emma_update_values. " . mysqli_error($link);
                }

?>