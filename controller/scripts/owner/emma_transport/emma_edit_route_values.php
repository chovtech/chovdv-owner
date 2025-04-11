<?php

    include("../../../config/config.php");

    $emma_get_route_name = $_POST['emma_load_route_name'];
    $emma_get_route_amount = $_POST['emma_load_route_amount'];
    $emma_get_route_data_id = $_POST['emma_data_id'];
    $emma_get_route_campus_id = $_POST['emma_camp_id'];
    $emma_get_route_institution_id = $_POST['institution_id'];

    //get route for edit here

    $emma_get_foredit = "SELECT * FROM `transportationtable` 
    WHERE `InstitutionID`='$emma_get_route_institution_id' AND `CampusID`='$emma_get_route_campus_id' AND RouteID='$emma_get_route_data_id'";
    $select_route_result = mysqli_query($link, $emma_get_foredit);
    $fetch_route_result = mysqli_fetch_assoc($select_route_result);
    $numbers_of_rows = mysqli_num_rows($select_route_result);

    if($numbers_of_rows > 0)
    {

          
            $RouteName =  $fetch_route_result['RouteName'];
            $RouteAmount =  $fetch_route_result['RouteAmount'];

    }else{

            $RouteName =  '';
            $RouteAmount =  '';

    }
    
    echo '<input type="hidden" class="emmahostelname-foredit" value="'.$RouteName.'">
      <input type="hidden" class="emmahostelamount-foredit" value="'.$RouteAmount.'">
      <input type="hidden" class="emmaamount-forrouteid" value="'.$emma_get_route_data_id.'">
    ';


  


?>