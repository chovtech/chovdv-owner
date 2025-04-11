<?php

include("../../../config/config.php");


$emma_collects_data_id_for_edit = $_POST['emma_collect_data_id'];
$emma_collects_campus_id_for_edit = $_POST['emma_collect_campus_id'];
$emma_collects_institution_id_for_edit = $_POST['emma_collect_institution'];
$emma_collects_folder_name_for_edit = $_POST['emma_collect_main_folder_value'];


$emma_update_first_folder_values = "UPDATE `firstfoldertable` SET `FirstFolderName`='$emma_collects_folder_name_for_edit' WHERE `FirstFolderID`='$emma_collects_data_id_for_edit' AND `InstitutionID`='$emma_collects_institution_id_for_edit' AND `CampusID`='$emma_collects_campus_id_for_edit' ";
$emma_update_first_folder_values_query = mysqli_query($link, $emma_update_first_folder_values);


    if(mysqli_query($link, $emma_update_first_folder_values)){
        echo 7;
    }else{
        echo 77;
    }
?>