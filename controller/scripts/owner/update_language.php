<?php

    include('../../config/config.php');
     $ParentID  = $_POST['ParentID'];
     $lang  = $_POST['lang'];
    $tag  = $_POST['tag'];
    
    $updatelang = mysqli_query($link,"UPDATE `parent` 
                                    SET     `Lang_Val`='$lang',
                                            `tagID`='$tag' 
                                    WHERE  `ParentID`='$ParentID'");

    if($updatelang){
        echo "success";
    }else{
        echo "error";
    }

?>