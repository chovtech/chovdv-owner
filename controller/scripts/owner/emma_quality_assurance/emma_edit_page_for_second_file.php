<?php


include("../../../config/config.php");

$institution_id_for_second_file = $_POST['emma_institution_id_for_second_file'];
$campus_id_for_second_file = $_POST['emma_campus_for_second_file'];
$data_id_for_second_file = $_POST['emma_data_id_for_second_file'];
$value_for_second_file = $_POST['emma_second_file_name'];


$select_for_second_file = "SELECT * FROM `filestable` WHERE `InstitutionID` = '$institution_id_for_second_file' AND `CampusID` = '$campus_id_for_second_file' AND `FileTableID` = '$data_id_for_second_file' AND `FileName` = '$value_for_second_file'";
$select_for_second_query = mysqli_query($link, $select_for_second_file);
$select_for_second_file_fetch = mysqli_fetch_assoc($select_for_second_query);
$select_for_second_file_num_of_rows = mysqli_num_rows($select_for_second_query);

if($select_for_second_file_num_of_rows = 0){
    echo 121;
}else{
    $update_for_second_file_edit = "UPDATE `filestable` SET `FileName`='$value_for_second_file' WHERE `FileTableID`='$data_id_for_second_file' AND `InstitutionID`='$institution_id_for_second_file' AND `CampusID`='$campus_id_for_second_file' ";
    $update_for_second_file_edit_query = mysqli_query($link, $update_for_second_file_edit);

    if($update_for_second_file_edit_query == true){
        echo 122;
    }else{
        echo 123;
    }
}

?>
