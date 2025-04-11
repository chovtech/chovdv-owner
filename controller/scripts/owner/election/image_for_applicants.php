<?php

include("../../../config/config.php");

$institution = $_POST['institution'];

$default_images = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'filter_image_for_background' ";
$default_images_query = mysqli_query($link, $default_images);
$default_images_fetch = mysqli_fetch_assoc($default_images_query);
$default_images_rows = mysqli_num_rows($default_images_query);

if($default_images_rows > 0){
    $get_image = $default_images_fetch['BaseSixtyFour'];

echo '
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div align="center">
                            <img src="'.$get_image.'" alt="" style="width:180px;">
                            <p class="text-primary"> Please Load To Proceed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        ';
}else{

}

?>