<?php

        include("../../../config/config.php");
        $emma_get_user_id = $_POST['getting_route_userid'];
        $emma_get_user_type = $_POST['getting_route_usertype'];
        $emma_get_route_name = $_POST['get_the_route_name'];
        $emma_get_route_amount = $_POST['get_the_route_amount'];
        $emma_get_route_id = $_POST['emmaamount-forrouteid'];
        $emma_get_institution_id = $_POST['abba-change-institution'];
        $route_edit_description = "Route Edited";
        // date_default_timezone_set("Africa/Lagos");
        $today = date("d/m/Y");
        $currentTime = date("H:i:s");
        $currenttime_date = date("Y-m-d h:i:s");

            $emma_update_values = "UPDATE `transportationtable` SET `RouteName`='$emma_get_route_name',`RouteAmount`='$emma_get_route_amount' WHERE `RouteID`='$emma_get_route_id' AND `InstitutionID`='$emma_get_institution_id'";

            $emma_update_values_query = mysqli_query($link, $emma_update_values);


                if(mysqli_query($link, $emma_update_values)){
                    $insert2 = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) VALUES ('$emma_get_institution_id','$emma_get_user_id','$emma_get_user_type',
                    '0','0','0','0','$route_edit_description','$currenttime_date')";
                    $insert4 = mysqli_query($link, $insert2);

                    echo 4;
                
                } else{
                    echo "ERROR: Could not able to execute $emma_update_values. " . mysqli_error($link);
                }

?>