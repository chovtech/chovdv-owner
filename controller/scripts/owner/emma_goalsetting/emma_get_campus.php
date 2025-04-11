<?php

include('../../../config/config.php');

$emmainstitution = $_POST['emma_institution'];

$get_campus_select = "SELECT * FROM `campus` WHERE `InstitutionID` = '$emmainstitution' ORDER BY `CampusName` ASC ";
$get_campus_query = mysqli_query($link, $get_campus_select);
$get_campus_fetch = mysqli_fetch_assoc($get_campus_query);
$get_campus_rows = mysqli_num_rows($get_campus_query);

if($get_campus_rows > 0){

    echo '<option value="NULL">Select Campus</option>';

    do{
        $fetchcampus_id = $get_campus_fetch['CampusID'];

        $fetchcampus_name = $get_campus_fetch['CampusName'];

        echo '<option value="'.$fetchcampus_id.'">'.$fetchcampus_name.'</option>';

    }while($get_campus_fetch = mysqli_fetch_assoc($get_campus_query));

}else{

}


?>