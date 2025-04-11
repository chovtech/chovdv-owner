<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    
    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_sql_campus = "SELECT *
    FROM campus 
    WHERE CampusID=$abba_campus_id";
    $abba_result_campus = mysqli_query($link, $abba_sql_campus);
    $abba_row_campus = mysqli_fetch_assoc($abba_result_campus);
    $abba_row_cnt_campus = mysqli_num_rows($abba_result_campus);
    
    if($abba_row_cnt_campus > 0)
    {
        echo $abba_row_campus['AdmissionNumberCount'];
          
    }
    else
    {
        
    }
?>