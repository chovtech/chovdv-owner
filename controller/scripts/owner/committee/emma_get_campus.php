<?php

include('../../../config/config.php');

$institution = $_POST['institution'];

$select_for_institution = "SELECT * FROM `campus` WHERE `InstitutionID` = '$institution' ORDER BY `CampusName` ASC";
$query_for_institution = mysqli_query($link, $select_for_institution);
$fetch_for_institution = mysqli_fetch_assoc($query_for_institution);
$rows_for_institution = mysqli_num_rows($query_for_institution);

if($rows_for_institution > 0){

    echo '<option value="NULL">Select Campus</option>';

    do{
        $emma_get_campus_name = $fetch_for_institution['CampusName'];
        $emma_get_campus_id = $fetch_for_institution['CampusID'];


        echo '<option value="'.$emma_get_campus_id.'">'.$emma_get_campus_name.'</option>';

    }while($fetch_for_institution = mysqli_fetch_assoc($query_for_institution));

}else{

    echo '';
}


?>