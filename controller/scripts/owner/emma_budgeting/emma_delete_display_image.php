<?php

include("../../../config/config.php");

$institution = $_POST['institution'];

$display_delete_image = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'prostrashimage' ";
$display_delete_image_query = mysqli_query($link, $display_delete_image);
$display_delete_image_fetch = mysqli_fetch_assoc($display_delete_image_query);
$display_delete_image_rows = mysqli_num_rows($display_delete_image_query);

if($display_delete_image_rows > 0){

    $get_image = $display_delete_image_fetch['BaseSixtyFour'];

    echo '<div align="center">
            <img src="'.$get_image.'" alt="">
          </div>';
  
}else {
   
}




?>