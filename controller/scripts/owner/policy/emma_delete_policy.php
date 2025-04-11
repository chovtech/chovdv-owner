<?php

include('../../../config/config.php');


$emma_institution_delete = $_POST['emma_institution_for_delete_policy'];
$emma_data_id_delete = $_POST['deletedata_id'];

$emma_delete_select = "UPDATE `policy` SET `DeleteStatus`= 1 WHERE `sn`='$emma_data_id_delete' AND `InstitutionIDOrCampusID`='$emma_institution_delete' ";
$emma_delete_query = mysqli_query($link, $emma_delete_select);

if($emma_delete_query == true){
    echo 1;
}else{
    echo 2;
}

?>