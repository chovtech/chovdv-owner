<?php

include("../../../config/config.php");

$emma_purposes = $_POST['emmasendpurposes'];
$emma_title = $_POST['emmasendtitle'];

$insert_into_calender_table = "INSERT INTO `calender`(`Purpose_ID`,`Title`) VALUES ('$emma_purposes','$emma_title')";
$insert_into_calender_table_query = mysqli_query($link, $insert_into_calender_table);

if($insert_into_calender_table_query == true){
    echo 2;
}else{
    echo 3;
}
    
?>