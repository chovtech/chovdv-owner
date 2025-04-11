<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $campus_id  = $_POST['campus_id'];
    $institution_id  = $_POST['institution_id'];
    $qr_code  = $_POST['qr_code'];
    $longitude  = $_POST['longitude'];
    $latitude  = $_POST['latitude'];
    $clock_in_time  = $_POST['clock_in_time'].':00';
    $clock_in_penalty  = $_POST['clock_in_penalty'];
    $clock_out_time  = $_POST['clock_out_time'].':00';
    $clock_out_penalty  = $_POST['clock_out_penalty'];
    
    date_default_timezone_set("Africa/Lagos");
        
    $date = date("Y-m-d");

    $sql_attendance_penalty = mysqli_query($link, "SELECT * FROM `attendance_penalty` WHERE `InstitutionID`='$institution_id'");
    $row_attendance_penalty = mysqli_fetch_array($sql_attendance_penalty);
    $count_attendance_penalty = mysqli_num_rows($sql_attendance_penalty);

    if ($count_attendance_penalty > 0) {
    
        $sql_attendance_penalty_update = mysqli_query($link, "UPDATE `attendance_penalty` SET `Clock_In_Time`='$clock_in_time',`Clock_In_Penalty`='$clock_in_penalty',`Clock_Out_Time`='$clock_out_time',`Clock_Out_Penalty`='$clock_out_penalty',`Date_Time_Set`='$date' WHERE InstitutionID = '$institution_id'");

        $sql_campus_update = mysqli_query($link, "UPDATE `campus` SET `Campus_Longitude`='$longitude',`Campus_Latitude`='$latitude',`Campus_QR_Code`='$qr_code' WHERE `InstitutionID` = '$institution_id' AND `CampusID` = '$campus_id'");
    
        echo 1;
    }
    else
    {
        $sql_attendance_penalty_update = mysqli_query($link, "INSERT INTO `attendance_penalty`(`sn`, `InstitutionID`, `Clock_In_Time`, `Clock_In_Penalty`, `Clock_Out_Time`, `Clock_Out_Penalty`, `Date_Time_Set`) 
        VALUES (NULL,'$institution_id','$clock_in_time','$clock_in_penalty','$clock_out_time','$clock_out_penalty','$date')");

        $sql_campus_update = mysqli_query($link, "UPDATE `campus` SET `Campus_Longitude`='$longitude',`Campus_Latitude`='$latitude',`Campus_QR_Code`='$qr_code' WHERE `InstitutionID` = '$institution_id' AND `CampusID` = '$campus_id'");
    
        echo 1;
    }
?>