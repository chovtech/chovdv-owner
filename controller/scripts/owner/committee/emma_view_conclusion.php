<?php

include('../../../config/config.php');

$task_id = $_POST['task_id'];
$commitee_id = $_POST['commitee_id'];
$user_id = $_POST['user_id'];
$user_type_holder = $_POST['user_type'];

if($user_type_holder == 'admin'){

    $view_penalty = "SELECT * FROM `offenceconclusion` WHERE `TaskID` = '$task_id' AND `CommitteeID` = '$commitee_id' ";
    $view_penalty_query = mysqli_query($link, $view_penalty);
    $fetch_penalty_query = mysqli_fetch_assoc($view_penalty_query);
    $rows_penalty_query = mysqli_num_rows($view_penalty_query);

    if($rows_penalty_query > 0){
        echo $get_penalty_id = $fetch_penalty_query['Penalty'];
        $get_offence = $fetch_penalty_query['OffenceID'];
        $get_committee_id = $fetch_penalty_query['CommitteeID'];
        $get_task_id = $fetch_penalty_query['TaskID'];
        $get_status_id = $fetch_penalty_query['Status'];
        

        echo '<div class="card">
                <div class="card-body text-center">
                    <b>'.$get_penalty_id.'</b>
                </div>
            </div>
            <input type="hidden" class="keep_offence_id" value="'.$get_offence.'">
            <input type="hidden" class="keep_commitee_id" value="'.$get_committee_id.'">
            <input type="hidden" class="keep_status_id" value="'.$get_status_id.'">
            <input type="hidden" class="keep_task_id" value="'.$get_task_id.'">';
    }else{
    echo '2';
    }
}elseif($user_type_holder == 'owner'){
    $view_penalty = "SELECT * FROM `offenceconclusion` WHERE `TaskID` = '$task_id' AND `CommitteeID` = '$commitee_id' ";
    $view_penalty_query = mysqli_query($link, $view_penalty);
    $fetch_penalty_query = mysqli_fetch_assoc($view_penalty_query);
    $rows_penalty_query = mysqli_num_rows($view_penalty_query);

    if($rows_penalty_query > 0){
        echo $get_penalty_id = $fetch_penalty_query['Penalty'];
        $get_offence = $fetch_penalty_query['OffenceID'];
        $get_committee_id = $fetch_penalty_query['CommitteeID'];
        $get_task_id = $fetch_penalty_query['TaskID'];
        $get_status_id = $fetch_penalty_query['Status'];
        

        echo '<div class="card">
                <div class="card-body text-center">
                    <b>'.$get_penalty_id.'</b>
                </div>
            </div>
            <input type="hidden" class="keep_offence_id" value="'.$get_offence.'">
            <input type="hidden" class="keep_commitee_id" value="'.$get_committee_id.'">
            <input type="hidden" class="keep_status_id" value="'.$get_status_id.'">
            <input type="hidden" class="keep_task_id" value="'.$get_task_id.'">';
    }else{
    echo '2';
    }
}else{

}

?>