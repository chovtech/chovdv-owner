<?php

    include('../../config/config.php');

    $UserID = $_POST['UserID'];
    $campusID = $_POST['campusID'];
    $IntitutionID = $_POST['IntitutionID'];

    $updateprefixtag = mysqli_query($link, "UPDATE `admissionregnumberprifix` SET `Slidestatus`='1' WHERE `CampusID`='$campusID'");


    if ($updateprefixtag == true) {
        echo 'success';
    }

?>