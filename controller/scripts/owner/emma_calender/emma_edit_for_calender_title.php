<?php

include("../../../config/config.php");


$emmageteventtitle = $_POST['emmaedittitle'];
$emmageteditinstitution = $_POST['emmaeditinstitution'];
$emmagetdataid = $_POST['emmaeditdataid'];

    $emma_update_for_edit = "UPDATE `calender` SET `Title` = '$emmageteventtitle' WHERE `sn`='$emmagetdataid' AND `InstitutionID` = '$emmageteditinstitution'";
    $emma_update_for_edit_query = mysqli_query($link, $emma_update_for_edit);

    if($emma_update_for_edit_query == 'true'){
        echo 10;
    }else{
        echo 20;
    }


?>