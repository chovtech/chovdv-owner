<?php

include('../../../config/config.php');

$emma_get_default_images = $_POST['emma_send_institution_for_images'];

$emma_select_for_default_images = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2'";
$emma_select_for_default_images_query = mysqli_query($link, $emma_select_for_default_images);
$emma_select_for_default_images_fetch = mysqli_fetch_assoc($emma_select_for_default_images_query);

$emma_fetch_filter_image = $emma_select_for_default_images_fetch['BaseSixtyFour'];

    echo '
    <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-12 mt-3" id="ekene_display_student_behavioural">
                            <div align="center">
                                <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                <p class="pt-2 fs-6 text-secondary">Please
                                    filter to proceed.</p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>';

?>