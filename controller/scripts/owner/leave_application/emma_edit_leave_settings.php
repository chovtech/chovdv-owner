<?php

include("../../../config/config.php");

$session = $_POST['session'];
$maximum_days = $_POST['maximum_days'];
$data_id = $_POST['data_id'];
$institute_id = $_POST['institute_id'];

$update_limit = "UPDATE `leaveapplicationlimit` SET `MaximumNumberOfDays` = '$maximum_days' WHERE `LeaveapplicationlimitID` = '$data_id' AND `InstitutionID`='$institute_id' AND `SessionType`='$session' ";
$update_limit_query = mysqli_query($link, $update_limit);

if($update_limit_query == true){
    echo 1;

    $activity_log_inst_camp_id = $_POST['campus'];
        $activity_log_userid = $_POST['userid'];
        $activity_log_usertype = $_POST['usertype'];
        $activity_log_description = 'Edited Leave Settings';
        $activity_log_longitude = $_POST['longitude'];
        $activity_log_latitude = $_POST['latitude'];

        insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
}else{
    echo 2;
}

?>