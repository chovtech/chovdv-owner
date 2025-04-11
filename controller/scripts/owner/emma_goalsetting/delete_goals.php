<?php

include("../../../config/config.php");

$dataid = $_POST['dataid'];
$datacampus = $_POST['datacampus'];

$delete_goal = "UPDATE `goalsetting` SET `DeleteStatus` = 1 WHERE `GoalID` = '$dataid' AND `CampusID`='$datacampus' ";
$delete_goal_query = mysqli_query($link, $delete_goal);

if($delete_goal_query == true){
    echo 1;

    $activity_log_inst_camp_id = $datacampus;
    $activity_log_userid = $_POST['userid'];
    $activity_log_usertype = $_POST['usertype'];
    $activity_log_description = 'Deleted Goal';
    $activity_log_longitude = $_POST['longitude'];
    $activity_log_latitude = $_POST['latitude'];

    insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);

}else{
    echo 2;
}

?>