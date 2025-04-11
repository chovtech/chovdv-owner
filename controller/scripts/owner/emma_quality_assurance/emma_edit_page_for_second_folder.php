<?php

include("../../../config/config.php");

$emma_this_data_id = $_POST['emma_data_id_for_second_folder'];
$emma_folder_value_for_second_folder = $_POST['emma_second_folder_edit_value_name'];
$emma_campus_id_for_second_folder = $_POST['emma_second_folder_edit_campus_id'];
$emma_data_id_for_second_folder = $_POST['emma_second_folder_edit_data_id'];
$emma_institution_id_for_second_folder = $_POST['emma_second_folder_edit_institution_id'];

$select_for_this_folder = "SELECT * FROM `secondfoldertable` WHERE `SecondFolderName` = '$emma_folder_value_for_second_folder' AND `InstitutionID` = '$emma_institution_id_for_second_folder' AND `CampusID` = '$emma_campus_id_for_second_folder' AND `FirstFolderID` = '$emma_data_id_for_second_folder'";
$select_for_this_folder_query = mysqli_query($link, $select_for_this_folder);
$select_for_this_folder_fetch = mysqli_fetch_assoc($select_for_this_folder_query);
$select_for_this_folder_rows = mysqli_num_rows($select_for_this_folder_query);


if($select_for_this_folder_rows > 0){
    echo 1;
}else{
    $emma_edit_for_second_folder_table = "UPDATE `secondfoldertable` SET `SecondFolderName` = '$emma_folder_value_for_second_folder' WHERE `InstitutionID`='$emma_institution_id_for_second_folder' AND `CampusID`='$emma_campus_id_for_second_folder' AND `FirstFolderID`='$emma_data_id_for_second_folder' AND `SecondFolderID` = '$emma_this_data_id' ";
    $emma_edit_for_second_folder_table_query = mysqli_query($link, $emma_edit_for_second_folder_table);

    if(mysqli_query($link, $emma_edit_for_second_folder_table)){
        echo 10;
    }else{
        echo 11;
    }
}

?>