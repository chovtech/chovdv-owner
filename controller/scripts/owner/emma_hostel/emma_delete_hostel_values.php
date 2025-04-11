<?php


include("../../../config/config.php");


$get_delete_route_id = $_POST['emma_userid_delete'];
$get_delete_campus_id = $_POST['emma_campus_id_for_delete'];
$get_delete_institution_id = $_POST['abba-change-institution'];
$get_delete_name = $_POST['emma_delete_name'];
$hostel_delete_description = "Hostel Deleted";
date_default_timezone_set("Africa/Lagos");
$today = date("d/m/Y");
$currentTime = date("H:i:s");
$currenttime_date = date("Y-m-d h:i:s");


$collect_hostel_delete_values = "UPDATE `hosteltable` SET `DeleteStatus`= '1'  WHERE `HostelID`='$get_delete_route_id' AND `CampusID`='$get_delete_campus_id' AND `InstitutionID`='$get_delete_institution_id'";
$delete_result_values = mysqli_query($link, $collect_hostel_delete_values);


        if(mysqli_query($link, $collect_hostel_delete_values)){
            $insert2 = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) VALUES ('$get_delete_institution_id','$get_delete_route_id',
            '0','0','0','0','$hostel_delete_description','$currenttime_date')";
                $insert2sl = mysqli_query($link, $insert2);
            echo 5;
        }else{
            echo "ERROR: Could not able to execute $collect_hostel_delete_values. " . mysqli_error($link);
        }

?>