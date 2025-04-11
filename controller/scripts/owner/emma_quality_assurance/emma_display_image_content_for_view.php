<?php
include("../../../config/config.php");

$emma_image_for_second_folder = $_POST['emma_image_id_for_view'];

$select_for_second_folder_image = "SELECT * FROM `filestable` WHERE `FileTableID` = '$emma_image_for_second_folder' ORDER BY `FileName` ASC";
$select_for_second_folder_image_query = mysqli_query($link, $select_for_second_folder_image);

if ($select_for_second_folder_image_query) {
    $select_for_second_folder_image_fetch = mysqli_fetch_assoc($select_for_second_folder_image_query);
    $select_for_second_folder_image_rows = mysqli_num_rows($select_for_second_folder_image_query);

    if ($select_for_second_folder_image_rows > 0) {
        $emma_get_image_base_sixty_four = $select_for_second_folder_image_fetch['BaseSixtyFour'];

        // Display the image
        echo '<div align="center"><img src="' . $emma_get_image_base_sixty_four . '" alt="" style="max-width:100%; height:auto;"></div>';
    } else {
        // Handle the case where no rows are found
    }
} else {
    // Handle the case where the query fails
    echo 'Error: ' . mysqli_error($link);
}
?>