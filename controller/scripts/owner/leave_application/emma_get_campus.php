<?php

include("../../../config/config.php");


$keep_institution_id = $_POST['keep_institution_id'];

$get_camp = "SELECT * FROM `campus` WHERE InstitutionID = '$keep_institution_id' ";
$get_camp_query = mysqli_query($link, $get_camp);
$get_camp_fetch = mysqli_fetch_assoc($get_camp_query);
$get_camp_rows = mysqli_num_rows($get_camp_query);

if($get_camp_rows > 0){
    echo $get_campus = $get_camp_fetch['CampusID'];
}else{

}



?>