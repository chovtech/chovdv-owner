<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $sqlgetresultsetting = ("SELECT * FROM `resultsetting` WHERE CampusID = '$abba_campus_id' AND MidTermCaToUse != '' AND MidTermCaToUse != '0'");
    $resultgetresultsetting = mysqli_query($link, $sqlgetresultsetting);
    $rowgetresultsetting = mysqli_fetch_assoc($resultgetresultsetting);
    $row_cntgetresultsetting = mysqli_num_rows($resultgetresultsetting);

    echo '<option value="NULL">Select Result Type</option>';

    if($row_cntgetresultsetting > 0)
    {

        echo '<option value="midterm">Mid-Term Result</option>';
        $selected = '';
    }
    else{
        $selected = 'selected';
    }

    echo '<option value="termly" '.$selected.'>Termly Result</option>';

?>