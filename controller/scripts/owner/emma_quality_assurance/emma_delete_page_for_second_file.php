<?php

include("../../../config/config.php");

$emma_data_id_for_delete = $_POST['emma_gets_data_id_for_delete'];
$emma_campus_id_for_delete = $_POST['emma_gets_campus_id_for_delete'];

$emma_delete_for_second_file_table = "UPDATE `filestable` SET `DeleteStatus` = 1 WHERE `CampusID` = '$emma_campus_id_for_delete' AND `FileTableID` = '$emma_data_id_for_delete' ";

if(mysqli_query($link, $emma_delete_for_second_file_table)){
    echo 19;
} else {
    echo  18;
}



?>