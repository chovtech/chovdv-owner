<?php

include("../../../config/config.php");

$institution = $_POST['institution'];

// Query to select all rows from the electionsettings table
$get_position = "SELECT * FROM `electionsettings`";
$get_position_query = mysqli_query($link, $get_position);

// Get the number of rows
$get_position_rows = mysqli_num_rows($get_position_query);

if ($get_position_rows > 0) {
    // Initialize an array to hold all positions
    $all_positions = [];

    // Fetch the first row
    $get_position_fetch = mysqli_fetch_assoc($get_position_query);

    // Process rows using a do-while loop
    do {
        $positions = explode(',', $get_position_fetch['PositionsSelected']);
        // Merge the positions into the all_positions array
        $all_positions = array_merge($all_positions, $positions);
    } while ($get_position_fetch = mysqli_fetch_assoc($get_position_query));

    // Count the total number of positions
    echo $total_positions = count($all_positions);

} else {
    echo 0;
}

?>
