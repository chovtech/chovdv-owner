<?php

include("../../../config/config.php");

$emma_collect_data_id_for_deleting_second_folder = $_POST['emma_send_data_id_for_delete'];
$emma_collect_campus_id_for_deleting_second_folder = $_POST['emma_send_campus_id_for_delete'];

$collect_second_folder_delete_values = "UPDATE `secondfoldertable` SET `DeleteStatus`= '1'  WHERE `CampusID` = '$emma_collect_campus_id_for_deleting_second_folder' AND `SecondFolderID` = '$emma_collect_data_id_for_deleting_second_folder' ";
$collect_second_folder_delete_values_query = mysqli_query($link, $collect_second_folder_delete_values);


if(mysqli_query($link, $collect_second_folder_delete_values)){
    echo 24;
}else{
    echo 25;
}

?>
