<?php


include("../../../config/config.php");


$get_delete_userid = $_POST['emma_delete_userid'];
$get_delete_usertype = $_POST['emma_delete_usertype'];
$get_delete_route_id = $_POST['delete_route_id'];
$get_delete_campus_id = $_POST['delete_this_campus_id'];
$get_delete_institution_id = $_POST['abba-change-institution'];
$route_delete_description = "Route deleted";
        // date_default_timezone_set("Africa/Lagos");
        $today = date("d/m/Y");
        $currentTime = date("H:i:s");
        $currenttime_date = date("Y-m-d h:i:s");

        $collect_delete_values = "UPDATE `transportationtable` SET `DeleteStatus`= '1'  WHERE `RouteID`='$get_delete_route_id' AND `CampusID`='$get_delete_campus_id' AND `InstitutionID`='$get_delete_institution_id'";
        $delete_result_values = mysqli_query($link, $collect_delete_values);


        if(mysqli_query($link, $collect_delete_values)){
            $insert2 = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) VALUES ('$get_delete_institution_id','$get_delete_userid','$get_delete_usertype',
            '0','0','0','0','$route_delete_description','$currenttime_date')";
            $insert4 = mysqli_query($link, $insert2);
            echo 5;
        }else{
            echo "ERROR: Could not able to execute $collect_delete_values. " . mysqli_error($link);
        }

?>