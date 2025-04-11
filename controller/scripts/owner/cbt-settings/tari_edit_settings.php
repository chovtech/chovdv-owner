<?php

    include('../../../config/config.php');

    $userID = trim($_POST['userID']);
    $settingsID = trim($_POST['settingsID']);
    $shuffle = trim($_POST['shuffle']);
    $title = mysqli_real_escape_string($link,trim($_POST['title']));
    $type = trim($_POST['type']);
    $category = trim($_POST['category']);
    $date = trim($_POST['date']);
    $timeIN = $_POST['timeIN'];
    $timeOUT = $_POST['timeOUT'];
    

    $updated = mysqli_query($link,"UPDATE `cbtsetquestionssettings` 
                                SET AssesementTitle = '$title',
                                    AssesementType = '$type',
                                    AssesementCategory = '$category',
                                    AssesementDate = '$date',
                                    AssesementStartTime = '$timeIN',
                                    AssesementEndTime = '$timeOUT',
                                    ShuffleOption = '$shuffle'
                                 WHERE `cbtsetquestionssettingsID` = '$settingsID' ");
                               

    if($updated){
        echo 'Yes';
    }else{
        echo'No';
    }



?>