<?php

    include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_sql_campus = ("SELECT * FROM `campus` WHERE InstitutionID = '$abba_instituion_id' ORDER BY CampusName ASC");
    $abba_query_link_campus = mysqli_query($link, $abba_sql_campus);
    $abba_get_details_campus = mysqli_fetch_assoc($abba_query_link_campus);
    $abba_row_cnt_campus = mysqli_num_rows($abba_query_link_campus);

    echo '<option value="NULL">Select Campus</option>';

    if($abba_row_cnt_campus > 0)
    {
        $cnt = 0;
        
        do{
            $cnt++;

            $abba_campus_id = $abba_get_details_campus['CampusID'];

            $abba_campus_name = $abba_get_details_campus['CampusName'];

            echo '<option value="'.$abba_campus_id.'">'.$abba_campus_name.'</option>';
            
        }while($abba_get_details_campus = mysqli_fetch_assoc($abba_query_link_campus));
    }
    else{
        echo '<option value="NULL">No Records Found</option>';
    }
?>