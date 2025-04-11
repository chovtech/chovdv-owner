<?php

    include('../../config/config.php');

    $image = $_POST['image'];
    $studentID = $_POST['studentID'];


   $upload = mysqli_query($link, "UPDATE `student`
                                SET `StudentPhoto` = '$image'
                                WHERE `StudentID` = '$studentID'");

    if($upload){

        echo $image;
    }else{
        echo '0';
    }


?>