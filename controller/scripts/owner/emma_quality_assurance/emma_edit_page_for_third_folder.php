<?php


include("../../../config/config.php");


$emma_collects_data_id_for_third_folder = $_POST['collect_data_id_for_third_folder'];
$emma_collects_campus_id_for_third_folder = $_POST['collect_campus_id_for_third_folder'];
$emma_collects_institution_id_for_third_folder = $_POST['collect_institution_id_for_third_folder'];
$emma_collects_value_for_third_folder = $_POST['collect_value_for_third_folder'];

$select_for_third_folder_edit = "SELECT * FROM `thirdfoldertable` WHERE `ThirdFolderName` = '$emma_collects_value_for_third_folder' AND `InstitutionID` =  '$emma_collects_institution_id_for_third_folder' AND `CampusID` = '$emma_collects_campus_id_for_third_folder' ";
$select_for_third_folder_edit_query = mysqli_query($link, $select_for_third_folder_edit);
$select_for_third_folder_edit_fetch = mysqli_fetch_assoc($select_for_third_folder_edit_query);
$select_for_third_folder_edit_rows = mysqli_num_rows($select_for_third_folder_edit_query);

if($select_for_third_folder_edit_rows > 0){
    echo 12;
    
}else{
    $insert_for_third_folder_edit = "UPDATE `thirdfoldertable` SET `InstitutionID`='$emma_collects_institution_id_for_third_folder',`CampusID`='$emma_collects_campus_id_for_third_folder',`ThirdFolderName`='$emma_collects_value_for_third_folder' WHERE  `ThirdFolderTableID`='$emma_collects_data_id_for_third_folder' ";
    $insert_for_third_folder_edit_query = mysqli_query($link, $insert_for_third_folder_edit);

    if($insert_for_third_folder_edit_query == true){
        echo 30;
    }else{
        echo 31;
    }
}


?>