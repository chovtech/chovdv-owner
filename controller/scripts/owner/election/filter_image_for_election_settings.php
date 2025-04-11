<?php

include("../../../config/config.php");

$institution = $_POST['institution'];

$default_images = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'filter_image_for_background' ";
$default_images_query = mysqli_query($link, $default_images);
$default_images_fetch = mysqli_fetch_assoc($default_images_query);
$default_images_rows = mysqli_num_rows($default_images_query);

if($default_images_rows > 0){
    $get_image = $default_images_fetch['BaseSixtyFour'];

    echo '<div align="center">
                <div class="">
                    <img src="'.$get_image.'" alt="" style="width:200px;">
                    <p class="text-primary" style="font-size: 15px;"> Please Filter By Campus</p>
                </div>
            </div>';
}else{

}

?>