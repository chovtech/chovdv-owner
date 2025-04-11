<?php

include("../../../config/config.php");

$emma_delete_third_files_data_id = $_POST['emma_gets_third_file_data_id_for_delete'];
$emma_delete_third_files_campus_id = $_POST['emma_gets_third_file_campus_id_for_delete'];


$emma_delete_for_third_files_table = "UPDATE `filestable` SET `DeleteStatus` = 1 WHERE `CampusID` = '$emma_delete_third_files_campus_id' AND `FileTableID` = '$emma_delete_third_files_data_id' ";
$emma_delete_for_third_files_table_query = mysqli_query($link, $emma_delete_for_third_files_table);

if($emma_delete_for_third_files_table_query == true){
    echo 223;
}else{
    echo 343;
}
?>