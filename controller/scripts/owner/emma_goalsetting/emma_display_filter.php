<?php

include("../../../config/config.php");

$institution = $_POST['emma_institution'];

$filter_select = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'filter_image_for_background' ";
$filter_query = mysqli_query($link, $filter_select);
$filter_fetch = mysqli_fetch_assoc($filter_query);
$filter_rows = mysqli_num_rows($filter_query);

if($filter_rows > 0){
    $getimage = $filter_fetch['BaseSixtyFour'];

    echo '
        <div align="center" class="mt-4">
            <div style="background-color:#ffffff;"> 
                <img src="'.$getimage.'" alt="" style="width:25%;" class="mt-5">
                <h6 class="pb-5">Please Filter to proceed</h6>
            </div>
        </div>';
}else{

}

?>