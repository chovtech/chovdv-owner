<?php

include("../../../config/config.php");


$emma_collect_delete_data_id_for_third_folder = $_POST['delete_data_id'];
$emma_collect_delete_campus_id_for_third_folder = $_POST['delete_campus_id'];

$delete_third_folder = "UPDATE `thirdfoldertable` SET `DeleteStatus`= 1 WHERE `ThirdFolderTableID`='$emma_collect_delete_data_id_for_third_folder' AND `CampusID`='$emma_collect_delete_campus_id_for_third_folder' ";
$delete_third_folder_query = mysqli_query($link, $delete_third_folder);

if(mysqli_query($link, $delete_third_folder)){
    echo 101;
}else{
    echo 102;
}

?>