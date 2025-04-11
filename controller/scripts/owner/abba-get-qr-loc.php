<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include('../../config/config.php');
    
    $abba_instituion_id = $_POST['institution_id'];
    
    $campus_id = $_POST['campus_id'];
    
    $abba_sql_campus = "SELECT * FROM `campus` WHERE InstitutionID=$abba_instituion_id AND CampusID = '$campus_id'";
    $abba_result_campus = mysqli_query($link, $abba_sql_campus);
    $abba_row_campus = mysqli_fetch_assoc($abba_result_campus);
    $abba_row_cnt_campus = mysqli_num_rows($abba_result_campus);
    
    if($abba_row_cnt_campus > 0)
    {
        $Campus_Longitude = $abba_row_campus['Campus_Longitude'];
        $Campus_Latitude = $abba_row_campus['Campus_Latitude'];
        $Campus_QR_Code = $abba_row_campus['Campus_QR_Code'];
        
        $abba_attendance_content = (object) [
            'Campus_Longitude' => $Campus_Longitude,
            'Campus_Latitude' => $Campus_Latitude,
            'Campus_QR_Code' => $Campus_QR_Code
        ];
        
        echo $abba_dashboard_content_json = json_encode($abba_attendance_content);
    }
    else
    {
        
        $abba_attendance_content = (object) [
            'Campus_Longitude' => '',
            'Campus_Latitude' => '',
            'Campus_QR_Code' => ''
        ];
        
        echo $abba_dashboard_content_json = json_encode($abba_attendance_content);
    }
?>