<?php

include('../../../config/config.php');

$keepinstitution = $_POST['emmasendinstitutionid'];
$keepusertype = $_POST['emmausertype'];
$keepuserid = $_POST['emmauserid'];
$keepstatus = $_POST['emmaacceptancestatus'];

$emmaselectpolicyforteacher = "SELECT * FROM `policyforstakeholders` WHERE `InstitutionIDOrCampusID` = '$keepinstitution' AND `UserType` = '$keepusertype' AND `UserID` = '$keepuserid' AND `Status` = '$keepstatus' ";
$emmaselectpolicyforteacher_query = mysqli_query($link, $emmaselectpolicyforteacher);

if($emmaselectpolicyforteacher_query !== false){
    echo 1;
}else{
    echo 2;
}

?>
