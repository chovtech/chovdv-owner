<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../../config/config.php');

$institutionID = $_POST['abba_get_stored_institution_id'];

$select_institution = mysqli_query($link, "SELECT * FROM `setcountdown` WHERE InstitutionID='$institutionID'");
$select_institution_cnt = mysqli_num_rows($select_institution);
$select_institution_cnt_row = mysqli_fetch_assoc($select_institution);

if ($select_institution_cnt > 0) {
    $start = $select_institution_cnt_row['StartDate'];
    $EndDate = $select_institution_cnt_row['EndDate'];
    $Description = $select_institution_cnt_row['Description'];

    $proscoundown = array(
        'startdate' => $start,
        'enddate' => $EndDate,
        'description' => $Description
    );

    $json_data = json_encode($proscoundown, JSON_PRETTY_PRINT);

    echo $json_data;
} else {
    // Return an empty JSON object to ensure consistent format
    echo json_encode(new stdClass());
}
?>