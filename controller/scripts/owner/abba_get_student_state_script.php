<?php

    include('../../config/config.php');

    $abba_get_student_country_id = $_POST['abba_get_student_country_id'];

    $abba_sql_get_states = "SELECT * FROM `states` WHERE countryID=$abba_get_student_country_id ORDER BY StateName ASC";
    $abba_query_get_states = mysqli_query($link, $abba_sql_get_states);
    $abba_row_get_states = mysqli_fetch_assoc($abba_query_get_states);
    $abba_count_get_states = mysqli_num_rows($abba_query_get_states);

    if ($abba_count_get_states > 0) 
    {

        echo '<option value="0">Select State</option>';

        do {

            $abba_state_name = $abba_row_get_states['StateName'];
            $abba_state_id = $abba_row_get_states['StateID'];

            echo '<option value="' . $abba_state_id . '">' . $abba_state_name . '</option>';

        } while ($abba_row_get_states = mysqli_fetch_assoc($abba_query_get_states));

    } 
    else {
        echo '<option value="NULL">No records found</option>';
    }
?>