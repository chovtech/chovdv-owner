<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../../config/config.php');

    $UserID = $_POST['UserID'];

    $UserType = $_POST['UserType'];

   echo $otpValue =  implode("", $_POST['otpValue']);

    date_default_timezone_set("Africa/Lagos");

    $date = date("Y-m-d");
    $time = date("h:i:s");
    
    $select_wallettransactions = mysqli_query($link, "UPDATE `agencyorschoolowner` SET `TransactionPin`=$otpValue WHERE `AgencyOrSchoolOwnerID` = $UserID");

    echo 1;

?>