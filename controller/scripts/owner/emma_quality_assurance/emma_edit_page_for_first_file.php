<?php


include("../../../config/config.php");

$emma_edit_first_file_data_id = $_POST['emma_first_file_data_id'];
$emma_edit_first_file_name = $_POST['emma_first_file_name'];
$emma_edit_first_file_campus_id = $_POST['emma_first_file_campus_id'];
$emma_edit_first_file_institution_id = $_POST['emma_first_file_institution_id'];

$emma_edit_for_first_file = "UPDATE `filestable` SET `FileName`='$emma_edit_first_file_name' WHERE `InstitutionID`='$emma_edit_first_file_institution_id' AND `CampusID`='$emma_edit_first_file_campus_id' AND `FileTableID`='$emma_edit_first_file_data_id' ";
$emma_edit_for_first_file_query = mysqli_query($link, $emma_edit_for_first_file);

if(mysqli_query($link, $emma_edit_for_first_file)){
    echo 100;
}else{
    echo 200;
}

?>