<?php

include("../../../config/config.php");

$emma_delete_data_id_for_first_file = $_POST['emma_data_id_for_delete'];
$emma_delete_campus_id_for_first_file = $_POST['emma_campus_id_for_delete'];


$emma_delete_for_first_file_table = "UPDATE `filestable` SET `DeleteStatus` = 1 WHERE `CampusID` = '$emma_delete_campus_id_for_first_file' AND `FileTableID` = '$emma_delete_data_id_for_first_file' ";
$emma_delete_for_first_file_table_query = mysqli_query($link, $emma_delete_for_first_file_table);

if(mysqli_query($link, $emma_delete_for_first_file_table)){
    echo 9;
}else{
    echo  8;
}

?>
