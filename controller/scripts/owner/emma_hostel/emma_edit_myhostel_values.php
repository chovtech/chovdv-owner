<?php

    include("../../../config/config.php");


        $emma_getting_user_id = $_POST['emma_hostel_user_id'];
        $emma_getting_user_type = $_POST['emma_hostel_user_type'];
        $emma_get_hostel_name = $_POST['get_the_hostel_name'];
        $emma_get_hostel_amount = $_POST['get_the_hostel_amount'];
        $emma_get_hostel_id = $_POST['emmaamount-forhostelid'];
        $emma_get_institution_id = $_POST['abba-change-institution'];
        $hostel_edit_description = "Hosted Edited";
        date_default_timezone_set("Africa/Lagos");
        $today = date("d/m/Y");
        $currentTime = date("H:i:s");
        $currenttime_date = date("Y-m-d h:i:s");


            $emma_update_values = "UPDATE `hosteltable` SET `HostelName`='$emma_get_hostel_name',`HostelAmount`='$emma_get_hostel_amount' WHERE `HostelID`='$emma_get_hostel_id' AND `InstitutionID`='$emma_get_institution_id'";
            $emma_update_values_query = mysqli_query($link, $emma_update_values);


                if(mysqli_query($link, $emma_update_values)){
                    $insert2 = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) VALUES ('$emma_get_institution_id','$emma_getting_user_id','$emma_getting_user_type',
                        '0','0','0','0','$hostel_edit_description','$currenttime_date')";
                    $insert3 = mysqli_query($link, $insert2);

                    echo 4;
                } else{
                    echo "ERROR: Could not able to execute $emma_update_values. " . mysqli_error($link);
                }

?>