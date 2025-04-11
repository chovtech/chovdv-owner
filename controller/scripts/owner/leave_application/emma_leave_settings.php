<?php

include("../../../config/config.php");

$get_limit = $_POST['get_limit'];
$keep_institution_id = $_POST['keep_institution_id'];
$session = $_POST['session'];

$select_for_leave_limit = "SELECT * FROM `leaveapplicationlimit` WHERE `InstitutionID` = '$keep_institution_id' AND `SessionType` = '$session' ";
$query_for_leave_limit = mysqli_query($link, $select_for_leave_limit);
$fetch_for_leave_limit = mysqli_fetch_assoc($query_for_leave_limit);
$rows_for_leave_limit = mysqli_num_rows($query_for_leave_limit);

if($rows_for_leave_limit > 0){
    echo 1;
}else{
    $insert_limit = "INSERT INTO `leaveapplicationlimit`(`InstitutionID`, `SessionType`, `MaximumNumberOfDays`) VALUES ('$keep_institution_id','$session','$get_limit')";
    $insert_limit_query = mysqli_query($link, $insert_limit);

    if($insert_limit_query == true){
        echo 2;
    }else{
        echo 3;
    }

}

?>