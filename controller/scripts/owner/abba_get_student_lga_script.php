<?php

    include('../../config/config.php');

    $abba_get_student_country_id = $_POST['abba_get_student_country_id'];

    $abba_get_student_state_id = $_POST['abba_get_student_state_id'];

    $abba_sql_get_lga = "SELECT * FROM `cities` WHERE countryID=$abba_get_student_country_id AND StateID=$abba_get_student_state_id ORDER BY CityName ASC";
    $abba_query_get_lga = mysqli_query($link, $abba_sql_get_lga);
    $abba_row_get_lga = mysqli_fetch_assoc($abba_query_get_lga);
    $abba_count_get_lga = mysqli_num_rows($abba_query_get_lga);

    if ($abba_count_get_lga > 0) 
    {

        echo '<option value="0">Select L.G.A</option>';

        do {

            $abba_lga_name = $abba_row_get_lga['CityName'];
            $abba_lga_id = $abba_row_get_lga['CityID'];

            echo '<option value="' . $abba_lga_id . '">' . $abba_lga_name . '</option>';

        } while ($abba_row_get_lga = mysqli_fetch_assoc($abba_query_get_lga));

    } 
    else {
        echo '<option value="NULL">No records found</option>';
    }
?>