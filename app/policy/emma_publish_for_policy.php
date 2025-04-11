<?php

include('../../../config/config.php');


$emma_publish_data_id = $_POST['view_publish_id'];
$emma_publish_data_status = $_POST['view_publish_status'];
$emma_publish_data_institution = $_POST['emma_publish_institute'];

if($emma_publish_data_status == 1){

    $emma_update_for_publish = "UPDATE `policy` SET `PublishStatus`= 2 WHERE `sn` = '$emma_publish_data_id' AND `InstitutionID` = '$emma_publish_data_institution' AND `DeleteStatus`= 0 ";

}else{
    $emma_update_for_publish = "UPDATE `policy` SET `PublishStatus`= 1 WHERE `sn`='$emma_publish_data_id' AND `InstitutionID`='$emma_publish_data_institution' AND `DeleteStatus`= 0 ";
}

$emma_update_for_publish_query = mysqli_query($link,$emma_update_for_publish);

if($emma_update_for_publish_query == true){

    echo 1;

}else{
    
    echo 2;

}
?>