<?php

    include("../../../config/config.php");

    $get_institution_id = $_POST['abba-change-institution'];
    $get_campus_id = $_POST['emma_display_onboarding_campus'];
    $get_route_name = explode(',',$_POST['emma_route_input']);
    $get_route_amount = explode(',',$_POST['emma_amount_input']);
    $get_emma_user_type = $_POST['emma_user_type'];
    $get_emma_user_id = $_POST['emma_user_id'];
    

    $currentdate =  date('Y-m-d H:i:s');

    $faildinsert = 0;
    $successinsert = 0;

    foreach($get_route_name as  $key => $get_route_namenew){
        
            $routename_new  = mysqli_real_escape_string($link, $get_route_namenew);
            $emma_routeamounntnew =  $get_route_amount[$key];
      
        
            $select_onboarding_values = "SELECT * FROM `transportationtable` WHERE `InstitutionID` = '$get_institution_id' AND `CampusID` = '$get_campus_id' AND `RouteName` = '$routename_new' AND `RouteAmount` = '$emma_routeamounntnew'";
            $result = mysqli_query($link, $select_onboarding_values);
             $num_of_rows = mysqli_num_rows($result);


            if($num_of_rows > 0){

                $inertquery = false;
                 $faildinsert+=+1;

            }else{
            

                $insert_onboarding_values  = "INSERT INTO `transportationtable`(`InstitutionID`, `CampusID`,`RouteName`, `RouteAmount`) VALUES ('$get_institution_id','$get_campus_id','$get_route_namenew','$emma_routeamounntnew')";
                $inertquery = mysqli_query($link, $insert_onboarding_values);
                
                  $successinsert+=+1;
            
        }
        

    }

    
    if($successinsert != '0'){

        $insertquery_for_activitylog_table = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) 
        VALUES ('$get_campus_id','$get_emma_user_id','$get_emma_user_type','0','0','0','0','Transport Route created','$currentdate')";
        $emma_insert_query = mysqli_query($link, $insertquery_for_activitylog_table);

        echo 1;
      

    } else if($faildinsert > $successinsert){
        echo 2;
    }else
    {
      echo 3;  
    }




?>