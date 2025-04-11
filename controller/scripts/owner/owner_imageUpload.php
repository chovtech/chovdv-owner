<?php

    include('../../config/config.php');

    $image = $_POST['image'];
    $userID = $_POST['userID'];


   $upload = mysqli_query($link, "UPDATE agencyorschoolowner SET photo='$image' WHERE AgencyOrSchoolOwnerID='$userID '");

    if($upload){

        echo $image;
    }else{
        echo '0';
    }


?>