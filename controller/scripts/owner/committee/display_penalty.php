<?php

include('../../../config/config.php');

$userid = $_POST['userid'];
$commitee_id = $_POST['commitee_id'];
$task_id = $_POST['task_id'];

$select_for_penalty = "SELECT * FROM `offenceconclusion` WHERE `CommitteeID` = '$commitee_id' AND `UserID` = '$userid' AND `TaskID` = '$task_id' ";
$query_for_penalty = mysqli_query($link, $select_for_penalty);
$fetch_for_penalty = mysqli_fetch_assoc($query_for_penalty);
$rows_for_penalty = mysqli_num_rows($query_for_penalty);

if($rows_for_penalty > 0){
    echo $get_penalty = $fetch_for_penalty['Penalty'];
}else{
    echo 2;
}

?>