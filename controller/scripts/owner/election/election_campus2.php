<?php

include("../../../config/config.php");

$institution = $_POST['institution'];

$get_campus = "SELECT * FROM `campus` WHERE `InstitutionID` = '$institution' ORDER BY `CampusName` ASC";
$get_campus_query = mysqli_query($link, $get_campus);
$get_campus_fetch = mysqli_fetch_assoc($get_campus_query);
$get_campus_rows = mysqli_num_rows($get_campus_query);

if($get_campus_rows > 0){

    

    do{
    
        echo $emma_get_campus_id = $get_campus_fetch['CampusID'];
        
    }while($get_campus_fetch = mysqli_fetch_assoc($get_campus_query));
}else{
    
}

?>