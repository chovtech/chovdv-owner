<?php

    include('../../../config/config.php');

    $get_task_id = $_POST['get_task_id'];
    $get_user_id = $_POST['get_user_id'];
    $get_commitee_id = $_POST['get_commitee_id'];
    $get_penalty = $_POST['get_penalty'];

    $get_user_penalty = mysqli_real_escape_string($link,$get_penalty);

    $select_for_penalty = "SELECT * FROM `offenceconclusion` WHERE `CommitteeID` = '$get_commitee_id' AND `UserID` = '$get_user_id' AND `TaskID` = '$get_task_id' AND `Penalty` = '$get_penalty' ";
    $query_for_penalty = mysqli_query($link, $select_for_penalty);
    $fetch_for_penalty = mysqli_fetch_assoc($query_for_penalty);
    $rows_for_penalty = mysqli_num_rows($query_for_penalty);

    if($rows_for_penalty > 0){
        echo 1;
    }else {
        $insert_for_penalty = "INSERT INTO `offenceconclusion`(`TaskID`, `CommitteeID`, `UserID`, `Status`, `Penalty`) VALUES ('$get_task_id','$get_commitee_id','$get_user_id',0,'$get_penalty')";
        $insert_query_for_penalty = mysqli_query($link, $insert_for_penalty);
    }

    if($insert_for_penalty == true){
        echo 2;
    }else{
        echo 3;
    }
?>