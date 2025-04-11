<?php

include('../../../config/config.php');

$campaigncampus = $_POST['campaigncampus'];
$campaignsession = $_POST['campaignsession'];
$campaign_settingstitle = $_POST['campaign_settingstitle'];
$emmagetamount = $_POST['emmagetamount'];



foreach ($campaign_settingstitle as $key => $campaign_settingstitlenew) {
    $emmagetamount_new = $emmagetamount[$key];

    $select_for_campaign = "SELECT * FROM `electioncampaign` WHERE `CampusID` = '$campaigncampus' AND `SessionName` = '$campaignsession' AND `CampaignPageName` = '$campaign_settingstitlenew' ";
    $query_for_campaign = mysqli_query($link, $select_for_campaign);
    $fetch_for_campaign = mysqli_fetch_assoc($query_for_campaign);
    $rows_for_campaign = mysqli_num_rows($query_for_campaign);

    if($rows_for_campaign > 0){

        echo 1;
    }
    else
    {
        $insert_campaign_setting = "INSERT INTO `electioncampaign`(`CampusID`, `SessionName`, `CampaignPageName`, `CampaignAmount`) 
        VALUES ('$campaigncampus','$campaignsession','$campaign_settingstitlenew','$emmagetamount_new')";
        $insert_campaign_setting_query = mysqli_query($link, $insert_campaign_setting);

        if($insert_campaign_setting_query == true){
            echo 3;

            $activity_log_inst_camp_id = $campaigncampus;
            $activity_log_userid = $_POST['userid'];
            $activity_log_usertype = $_POST['usertype'];
            $activity_log_description = 'Set Campaign';
            $activity_log_longitude = $_POST['longitude'];
            $activity_log_latitude = $_POST['latitude'];

            insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
        }else{
            echo 4;
        }
    }
}




?>