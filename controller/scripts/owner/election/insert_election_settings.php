<?php

    include('../../../config/config.php');

    $campus = $_POST['campus'];
    $session = $_POST['session'];
    $positions = implode(',',$_POST['positions']);
    $classes_permitted = implode(',',$_POST['classes_permitted']);
    $election_title = $_POST['election_title'];
    $election_season_start_date = $_POST['election_season_start_date'];
    $election_season_end_date = $_POST['election_season_end_date'];
    $election_day_date = $_POST['election_day_date'];
    $election_campaign_start_date = $_POST['election_campaign_start_date'];
    $election_campaign_end_date = $_POST['election_campaign_end_date'];
    $student_average_limit = $_POST['student_average_limit'];
    $student_debt_status = $_POST['student_debt'];
    

    $new_election_title = mysqli_real_escape_string($link, $election_title);

    $select_for_election = "SELECT * FROM `electionsettings` WHERE `CampusID` = '$campus' AND `SessionName` = '$session' ";
    $query_for_election = mysqli_query($link, $select_for_election);
    $fetch_for_election = mysqli_fetch_assoc($query_for_election);
    $rows_for_election = mysqli_num_rows($query_for_election);

    if($rows_for_election > 0){
        echo 1;
    }else{
        
        $insert_into_election = "INSERT INTO `electionsettings`(`CampusID`, `SessionName`, `ElectionTitle`, `PositionsSelected`, `ClassesSelected`, `ElectionSeasonStartDate`, `ElectionSeasonEndDate`, `ElectionDayDate`, `ElectionCampaignStartDate`, `ElectionCampaignEndDate`, `StudentAverageRange`, `PaymentStatus`, `DeleteStatus`) 
        VALUES ('$campus','$session','$new_election_title','$positions','$classes_permitted','$election_season_start_date','$election_season_end_date','$election_day_date','$election_campaign_start_date','$election_campaign_end_date','$student_average_limit','$student_debt_status',0)";
        $insert_into_election_query = mysqli_query($link, $insert_into_election);
    }

    if($insert_into_election_query == true){
        echo 2;

        $activity_log_inst_camp_id = $campus;
        $activity_log_userid = $_POST['userid'];
        $activity_log_usertype = $_POST['usertype'];
        $activity_log_description = 'Set Election';
        $activity_log_longitude = $_POST['longitude'];
        $activity_log_latitude = $_POST['latitude'];

        insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
    }else{
        echo 3;
    }
?>