<?php


include('../../../config/config.php');


$campusid = $_POST['campusid'];
$sessionname = $_POST['sessionname'];
$campaigntitle = $_POST['campaigntitle'];
$campaignamount = $_POST['campaignamount'];


$select_for_campaign_edit = "SELECT * FROM `electioncampaign` WHERE `CampusID` = '$campusid' AND `SessionName` = '$sessionname' AND `CampaignPageName` = '$campaigntitle' ";
$query_for_campaign_edit = mysqli_query($link, $select_for_campaign_edit);
$fetch_for_campaign_edit = mysqli_fetch_assoc($query_for_campaign_edit);
$rows_for_campaign_edit = mysqli_num_rows($query_for_campaign_edit);

if($rows_for_campaign_edit > 0){

    $update_table = "UPDATE `electioncampaign` SET `CampaignAmount` = '$campaignamount' WHERE `CampusID` = '$campusid' AND `SessionName` = '$sessionname' AND `CampaignPageName` = '$campaigntitle' ";
    $update_table_query = mysqli_query($link, $update_table);

    if($update_table_query > 0){
        echo 1;

        $activity_log_inst_camp_id = $campaigncampus;
        $activity_log_userid = $_POST['userid'];
        $activity_log_usertype = $_POST['usertype'];
        $activity_log_description = 'Edit Campaign';
        $activity_log_longitude = $_POST['longitude'];
        $activity_log_latitude = $_POST['latitude'];

        insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);

    }else{
        echo 2;
    }
}else{
    echo 3;
}





?>