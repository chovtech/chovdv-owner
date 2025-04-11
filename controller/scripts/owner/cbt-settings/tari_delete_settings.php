<?php

    include('../../../config/config.php');

    $settingsID = trim($_POST['settingsID']);
    $campusID = trim($_POST['campusID']);
    

    $currentDate = date("Y-m-d");

   

    $delete = mysqli_query($link, " UPDATE `cbtsetquestionssettings` SET `DeleteStatus`='1', `DateDeleted`='$currentDate' WHERE `CampusID`='$campusID' AND `cbtsetquestionssettingsID`='$settingsID'");

    if($delete){
        echo 'Yes';
    }else{
        echo 'NO';
    }

?>