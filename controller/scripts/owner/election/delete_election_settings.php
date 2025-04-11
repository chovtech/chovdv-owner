<?php

include('../../../config/config.php');

$delete_dataid = $_POST['delete_dataid'];
$delete_campusid = $_POST['delete_campusid'];

$update_for_delete = "UPDATE `electionsettings` SET `DeleteStatus`= 1 WHERE `ElectionSettingsID` = '$delete_dataid' AND `CampusID` = '$delete_campusid'";
$update_query_for_delete = mysqli_query($link, $update_for_delete);


if($update_query_for_delete == true){
    echo 1;

    $activity_log_inst_camp_id = $delete_campusid;
    $activity_log_userid = $_POST['userid'];
    $activity_log_usertype = $_POST['usertype'];
    $activity_log_description = 'Delete Election Settings';
    $activity_log_longitude = $_POST['longitude'];
    $activity_log_latitude = $_POST['latitude'];

    insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);

}else{
    echo 2;
}

?>