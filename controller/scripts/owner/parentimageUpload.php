<?php

    include('../../config/config.php');

    $image = $_POST['image'];
    $parentID = $_POST['parentID'];


   $upload = mysqli_query($link, "UPDATE `parent`
                                SET `ParentPhoto` = '$image'
                                WHERE `ParentID` = '$parentID'");

    if($upload){

        echo $image;
    }else{
        echo '0';
    }


?>