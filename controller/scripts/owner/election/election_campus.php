<?php

include("../../../config/config.php");

$institution = $_POST['institution'];

$get_campus = "SELECT * FROM `campus` WHERE `InstitutionID` = '$institution' ORDER BY `CampusName` ASC";
$get_campus_query = mysqli_query($link, $get_campus);
$get_campus_fetch = mysqli_fetch_assoc($get_campus_query);
$get_campus_rows = mysqli_num_rows($get_campus_query);

if($get_campus_rows > 0){

    echo '<option value="NULL">Select Campus</option>';

    do{
    
        $emma_get_campus_id = $get_campus_fetch['CampusID'];
        $emma_get_campus = $get_campus_fetch['CampusName'];;

        echo '<option value="'.$emma_get_campus_id.'">'.$emma_get_campus.'</option>';

    }while($get_campus_fetch = mysqli_fetch_assoc($get_campus_query));
}else{
    echo 'No Campus Found';
}

?>