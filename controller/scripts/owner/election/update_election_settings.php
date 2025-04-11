<?php

    include("../../../config/config.php");

    $data_id = $_POST['data_id'];
    $campus_id = $_POST['campus_id'];
    $session = $_POST['session'];
    $title = $_POST['title'];
    $positions_edit = implode(',',$_POST['positions_edit']);
    $classes_edit = implode(',',$_POST['classes_edit']);
    $season_start_date_edit = $_POST['season_start_date_edit'];
    $season_end_date_edit = $_POST['season_end_date_edit'];
    $campaign_start_date_edit = $_POST['campaign_start_date_edit'];
    $campaign_end_date_edit = $_POST['campaign_end_date_edit'];
    $election_day_date_edit = $_POST['election_day_date_edit'];
    $student_average_range_edit = $_POST['student_average_range_edit'];
    $payment_permission = $_POST['payment_permission'];


    $update_election_settings = "UPDATE `electionsettings` SET `ElectionTitle`='$title',`PositionsSelected`='$positions_edit',`ClassesSelected`='$classes_edit',
    `ElectionSeasonStartDate`='$season_start_date_edit',`ElectionSeasonEndDate`='$season_end_date_edit',`ElectionDayDate`='$election_day_date_edit',`ElectionCampaignStartDate`='$campaign_start_date_edit',
    `ElectionCampaignEndDate`='$campaign_end_date_edit',`StudentAverageRange`='$student_average_range_edit',`PaymentStatus`='$payment_permission',`DeleteStatus`= 0 
    WHERE `ElectionSettingsID`='$data_id' AND `CampusID`='$campus_id' AND `SessionName`='$session' ";
    $update_query_election_settings = mysqli_query($link, $update_election_settings);

    if($update_query_election_settings == true){
        echo 1;

        $activity_log_inst_camp_id = $campus_id;
        $activity_log_userid = $_POST['userid'];
        $activity_log_usertype = $_POST['usertype'];
        $activity_log_description = 'Edit Election Settings';
        $activity_log_longitude = $_POST['longitude'];
        $activity_log_latitude = $_POST['latitude'];

        insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
    }else{
        echo 2;
    }

?>