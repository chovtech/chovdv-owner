<?php


include("../../../config/config.php");


$emma_receive_data_id_for_main_folder_delete = $_POST['send_data_id_for_main_folder'];
$emma_receive_campus_id_for_main_folder_delete = $_POST['send_campus_id_for_main_folder'];

$collect_main_folder_delete_values = "UPDATE `firstfoldertable` SET `DeleteStatus`= '1'  WHERE `CampusID` = '$emma_receive_campus_id_for_main_folder_delete' AND `FirstFolderID` = '$emma_receive_data_id_for_main_folder_delete' ";
$collect_main_folder_delete_values_query = mysqli_query($link, $collect_main_folder_delete_values);

if(mysqli_query($link, $collect_main_folder_delete_values)){
    echo 30;
}else{
    echo 50;
}

?>