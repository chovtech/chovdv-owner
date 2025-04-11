<?php

include('../../../config/config.php');

$emma_publish_data_id_for_policy = $_POST['emma_data_id_policy'];
$emma_publish_data_status_for_policy = $_POST['emmastatusforpolicy'];
$emma_publish_data_institution_for_policy = $_POST['emma_policy_institution'];

if($emma_publish_data_status_for_policy == 1){
    $emma_update_for_publish = "UPDATE `policy` SET `PublishStatus`= 2 WHERE `sn` = '$emma_publish_data_id_for_policy' AND `InstitutionIDOrCampusID` = '$emma_publish_data_institution_for_policy' AND `DeleteStatus` = 0 ";
}else{
    $emma_update_for_publish = "UPDATE `policy` SET `PublishStatus`= 1 WHERE `sn` = '$emma_publish_data_id_for_policy' AND `InstitutionIDOrCampusID` = '$emma_publish_data_institution_for_policy' AND `DeleteStatus` = 0 ";
}

$emma_update_for_publish_query = mysqli_query($link, $emma_update_for_publish);


    if($emma_update_for_publish_query == true){

        if($emma_publish_data_status_for_policy == 1){
            echo 1;
        }else if($emma_publish_data_status_for_policy == 2){
            echo 2;
        }else{
            echo 3;
        }

    }else{
        echo 4;
    }




?>