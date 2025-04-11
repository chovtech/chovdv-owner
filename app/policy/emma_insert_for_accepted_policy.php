<?php

include('../../../config/config.php');

$emmagetthisinstitutionid = $_POST['emmasendinstitutionidforpolicy'];
$emmagetthisusertype = $_POST['emmausertypeforpolicy'];
$emmagetthisuserid = $_POST['emmauseridforpolicy'];
$emmagetacceptancestatus = $_POST['emmaacceptancestatusforpolicy'];


$emmapolicyacceptance_insert = "INSERT INTO `policyforstakeholders`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `Status`) VALUES ('$emmagetthisinstitutionid','$emmagetthisuserid','$emmagetthisusertype','$emmagetacceptancestatus')";
$emmapolicyacceptance_insertquery = mysqli_query($link,$emmapolicyacceptance_insert);

if($emmapolicyacceptance_insertquery > 0){
    echo 1;
}else{
    echo 2;
}



?>