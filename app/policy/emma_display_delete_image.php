<?php

include('../../../config/config.php');


$emmainstitution = $_POST['institution'];

$emma_select_for_delete_image = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'prostrashimage'";
$emma_query_for_delete_image = mysqli_query($link, $emma_select_for_delete_image);
$emma_fetch_for_delete_image = mysqli_fetch_assoc($emma_query_for_delete_image);
$emma_rows_for_delete_image = mysqli_num_rows($emma_query_for_delete_image);

$emma_get_base_sixty_four = $emma_fetch_for_delete_image['BaseSixtyFour'];

echo '<div align="center">
        <img src="'.$emma_get_base_sixty_four.'" alt="">
      </div>';


?>