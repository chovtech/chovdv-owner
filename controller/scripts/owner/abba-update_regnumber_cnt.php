<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    
    $abba_campus_id = $_POST['abba_campus_id'];
    
    $display_number_count = $_POST['display_number_count'];

    $abba_sql_campus = "UPDATE `campus` SET `AdmissionNumberCount`='$display_number_count' WHERE `CampusID` = '$abba_campus_id'";
    $abba_result_campus = mysqli_query($link, $abba_sql_campus);

?>