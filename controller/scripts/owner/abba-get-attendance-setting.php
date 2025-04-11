<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include('../../config/config.php');
    
    $abba_instituion_id = $_POST['abba_instituion_id'];
    
    $abba_sql_attendance_penalty = "SELECT * FROM `attendance_penalty` WHERE InstitutionID=$abba_instituion_id";
    $abba_result_attendance_penalty = mysqli_query($link, $abba_sql_attendance_penalty);
    $abba_row_attendance_penalty = mysqli_fetch_assoc($abba_result_attendance_penalty);
    $abba_row_cnt_attendance_penalty = mysqli_num_rows($abba_result_attendance_penalty);
    
    if($abba_row_cnt_attendance_penalty > 0)
    {
        $Clock_In_Time = $abba_row_attendance_penalty['Clock_In_Time'];
        $Clock_In_Penalty = $abba_row_attendance_penalty['Clock_In_Penalty'];
        $Clock_Out_Time = $abba_row_attendance_penalty['Clock_Out_Time'];
        $Clock_Out_Penalty = $abba_row_attendance_penalty['Clock_Out_Penalty'];
        
        $abba_attendance_content = (object) [
            'Clock_In_Time' => $Clock_In_Time,
            'Clock_In_Penalty' => $Clock_In_Penalty,
            'Clock_Out_Time' => $Clock_Out_Time,
            'Clock_Out_Penalty' => $Clock_Out_Penalty
        ];
        
        echo $abba_dashboard_content_json = json_encode($abba_attendance_content);
    }
    else
    {
        
        $abba_attendance_content = (object) [
            'Clock_In_Time' => '',
            'Clock_In_Penalty' => '',
            'Clock_Out_Time' => '',
            'Clock_Out_Penalty' => ''
        ];
        
        echo $abba_dashboard_content_json = json_encode($abba_attendance_content);
    }
?>