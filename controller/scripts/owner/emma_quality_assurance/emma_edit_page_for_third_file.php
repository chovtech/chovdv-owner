<?php

include("../../../config/config.php");


$emma_file_name_for_third_folder = $_POST['emma_third_file_name'];
$emma_campus_id_for_third_folder = $_POST['emma_campus_for_third_file'];
$emma_data_id_for_third_folder = $_POST['emma_data_id_for_third_file'];
$emma_institution_id_for_third_folder = $_POST['emma_institution_id_for_third_file'];


$select_for_third_file = "SELECT * FROM `filestable` WHERE `InstitutionID` = '$emma_institution_id_for_third_folder' AND `CampusID` = '$emma_campus_id_for_third_folder' AND `FileTableID` = '$emma_data_id_for_third_folder' AND `FileName` = '$emma_file_name_for_third_folder'";
$select_for_third_file_query = mysqli_query($link, $select_for_third_file);
$select_for_third_file_fetch = mysqli_fetch_assoc($select_for_third_file_query);
$select_for_third_file_num_of_rows = mysqli_num_rows($select_for_third_file_query);

if($select_for_third_file_num_of_rows = 0){
    echo 121;
}else{
    $update_for_third_file_edit = "UPDATE `filestable` SET `FileName`='$emma_file_name_for_third_folder' WHERE `FileTableID`='$emma_data_id_for_third_folder' AND `InstitutionID`='$emma_institution_id_for_third_folder' AND `CampusID`='$emma_campus_id_for_third_folder' ";
    $update_for_third_file_edit_query = mysqli_query($link, $update_for_third_file_edit);

    if($update_for_third_file_edit_query == true){
        echo 122;
    }else{
        echo 123;
    }
}


?>