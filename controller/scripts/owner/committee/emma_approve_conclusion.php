<?php

    include('../../../config/config.php');

    $offence_id = $_POST['offence_id'];
    $commitee_id = $_POST['commitee_id'];
    $task_id = $_POST['task_id'];


    $status_id = $_POST['status_id'];

        if($status_id == 0){
        
            echo 'first';
            $update_status = "UPDATE `offenceconclusion` SET `Status`= 1 WHERE `OffenceID` = '$offence_id' AND `TaskID` = '$task_id' AND `CommitteeID`='$commitee_id'";
            $update_status_query = mysqli_query($link, $update_status);
        }else{
            echo 'second';
            $update_status = "UPDATE `offenceconclusion` SET `Status`= 0 WHERE `OffenceID` = '$offence_id' AND `TaskID` = '$task_id' AND `CommitteeID`='$commitee_id' ";
            $update_status_query = mysqli_query($link, $update_status);
        }

    if($update_status_query == true){
        echo 1;
    }else{
        echo 2;
    }

?>