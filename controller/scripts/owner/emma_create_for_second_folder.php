<?php

include("../../../config/config.php");

$emma_receive_mainfolder_id_for_creating_second_folder = $_POST['emma_mainfolder_id'];
$emma_receive_folder_values_for_creating_second_folder = $_POST['emma_second_foldername'];
$emma_receive_institution_id_for_creating_folder_values = $_POST['emma_second_folder_institution_id'];
$emma_receive_campus_id_for_creating_folder_values = $_POST['emma_campus_id'];


$select_from_second_folder_table = "SELECT * FROM `secondfoldertable` WHERE `SecondFolderName` = '$emma_receive_folder_values_for_creating_second_folder' AND `FirstFolderID` = '$emma_receive_mainfolder_id_for_creating_second_folder' AND `InstitutionID` = '$emma_receive_institution_id_for_creating_folder_values' AND `CampusID` = '$emma_receive_campus_id_for_creating_folder_values' ORDER BY SecondFolderName ASC ";
$select_from_second_folder_table_query = mysqli_query($link, $select_from_second_folder_table);
$select_from_second_folder_table_for_num_of_rows = mysqli_num_rows($select_from_second_folder_table_query);

if($select_from_second_folder_table_for_num_of_rows > 0){
    echo 1;
}else{
    $emma_inserting_into_second_folder_table = "INSERT INTO `secondfoldertable`(`FirstFolderID`, `SecondFolderName`, `InstitutionID`,`CampusID`,`DeleteStatus`) VALUES ('$emma_receive_mainfolder_id_for_creating_second_folder','$emma_receive_folder_values_for_creating_second_folder','$emma_receive_institution_id_for_creating_folder_values','$emma_receive_campus_id_for_creating_folder_values',0)";
    $emma_inserting_into_second_folder_table_query = mysqli_query($link, $emma_inserting_into_second_folder_table);

    if($emma_inserting_into_second_folder_table_query == true){
        echo 2;
    }else{
        echo 3;
    }
}

?>