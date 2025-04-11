<?php

include('../../../config/config.php');


    $task_id = $_POST['task_id'];
    $commitee_id = $_POST['commitee_id'];
    $user_id = $_POST['user_id'];


$select_for_status = "SELECT * FROM `offenceconclusion` WHERE `TaskID` = '$task_id' AND `CommitteeID` = '$commitee_id' AND `UserID` = '$user_id' ";
$query_for_status = mysqli_query($link, $select_for_status);
$fetch_for_status = mysqli_fetch_assoc($query_for_status);
$rows_for_status = mysqli_num_rows($query_for_status);

if($rows_for_status > 0){
    echo 1;
}else{
    echo 2;
}

?>