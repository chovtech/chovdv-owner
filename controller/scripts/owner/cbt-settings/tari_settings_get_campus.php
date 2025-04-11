<?php

    include('../../../config/config.php');

    $tari_get_stored_instituion_id = $_POST['tari_get_stored_instituion_id'];

    // get total parent
    $abba_sql_check_campus = ("SELECT * FROM `campus` WHERE `campus`.InstitutionID=$tari_get_stored_instituion_id ORDER BY CampusName");
    $abba_result_check_campus = mysqli_query($link, $abba_sql_check_campus);
    $abba_row_check_campus = mysqli_fetch_assoc($abba_result_check_campus);
    $abba_row_cnt_check_campus = mysqli_num_rows($abba_result_check_campus);

    if($abba_row_cnt_check_campus > 0)
    {

          echo '<option value="NULL">Select Campus</option>';
       
        do {

            $campusID = $abba_row_check_campus['CampusID'];
            $campusName = $abba_row_check_campus['CampusName'];

            echo '<option value="'.$campusID.'">'.$campusName.'</option>';

        }while($abba_row_check_campus = mysqli_fetch_assoc($abba_result_check_campus));
    }else{
        echo '<option value="NULL">please Select Campus </option>';
    }