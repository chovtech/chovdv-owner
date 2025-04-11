<?php

include('../../../config/config.php');

$emma_get_insitute = $_POST['emmainstitute'];


$emma_insert_for_class_recording_two = "INSERT INTO `classrecording`(`Status`) VALUES (2)";
$emma_insert_for_class_recording_query_two = mysqli_query($link, $emma_insert_for_class_recording_two);

if($emma_insert_for_class_recording_query_two == 'true'){
    echo 11;
}else{
    echo 12;
}


?>