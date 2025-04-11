<?php
    include('../../config/config.php');
    
    $abba_get_inst_id = $_POST['abba_get_inst_id'];

    $abba_get_parent_id = $_POST['abba_get_parent_id'];

    $image = $_POST['image'];
    
    $abba_sql_update_parent_image = ("UPDATE `parent` SET `ParentPhoto`='$image' WHERE `ParentID` = '$abba_get_parent_id' AND InstitutionID = '$abba_get_inst_id'");
    $abba_result_update_parent_image = mysqli_query($link, $abba_sql_update_parent_image);
    
    if($abba_result_update_parent_image == true)
    {
        echo 1;
    }
    else
    {
        echo 2;
    }
?>