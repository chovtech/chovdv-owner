<?php

    include("../../../config/config.php");

    $get_hostel_institution_id = $_POST['abba-change-institution'];
    $get_hostel_campus_id = $_POST['emma_display_hostel_onboarding_campus'];
    $get_hostel_name = explode(',',$_POST['emma_hostel_input']);
    $get_hostel_amount = explode(',',$_POST['emma_hostel_amount_input']);
    $get_emma_hostel_user_type = $_POST['emma_hostel_user_type'];
    $get_emma_hostel_user_id = $_POST['emma_hostel_user_id'];

    $currentdate =  date('Y-m-d H:i:s');

    foreach($get_hostel_name as  $key => $get_hostel_namenew){
        
       $routename_new  = mysqli_real_escape_string($link, $get_hostel_namenew);
        $emma_hostel_amounntnew =  $get_hostel_amount[$key];
      

    $select_hostel_onboarding_values = "SELECT * FROM `hosteltable` WHERE `InstitutionID` = '$get_hostel_institution_id' AND `CampusID` = '$get_hostel_campus_id' AND `HostelName` = '$routename_new' AND `HostelAmount` = '$emma_hostel_amounntnew'";
    $result = mysqli_query($link, $select_hostel_onboarding_values);
    $num_of_rows = mysqli_num_rows($result);


            if($num_of_rows > 0){

                $inertquery = false;

            }else{

                $insert_hostel_onboarding_values  = "INSERT INTO `hosteltable`(`InstitutionID`, `CampusID`,`HostelName`, `HostelAmount`) VALUES ('$get_hostel_institution_id','$get_hostel_campus_id','$get_hostel_namenew','$emma_hostel_amounntnew')";
                $inertquery = mysqli_query($link, $insert_hostel_onboarding_values);
            
        }
        

    }

    
    if($inertquery == true){

        $insertquery_for_activitylog_table = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) 
        VALUES ('$get_hostel_campus_id','$get_emma_hostel_user_id','$get_emma_hostel_user_type','0','0','0','0','Hostel created','$currentdate')";
        $emma_insert_query = mysqli_query($link, $insertquery_for_activitylog_table);

        echo 1;

    } else{
        echo 2;
    }

?>