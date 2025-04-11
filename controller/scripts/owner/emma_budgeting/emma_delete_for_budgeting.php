<?php

include("../../../config/config.php");

$delete_data_id = $_POST['deletedataidfordelete'];
$delete_campus_id = $_POST['deletecampusidfordelete'];


$delete_budget = "UPDATE `budgeting` SET `DeleteStatus`= 1 WHERE `sn` = '$delete_data_id' AND `CampusID` = '$delete_campus_id' ";
$delete_budget_query = mysqli_query($link, $delete_budget);

if($delete_budget_query == true){
    echo 1;
}else{
    echo 2;
}

?>
