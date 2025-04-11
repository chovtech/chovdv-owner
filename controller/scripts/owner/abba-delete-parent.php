<?php
    include('../../config/config.php');
    
    $abba_get_multi_parent_id_array = explode(',',$_POST['abba_get_multi_parent_id']);

    foreach($abba_get_multi_parent_id_array as $abba_get_multi_parent_id)
    {
        $abba_get_multi_parent_id;
        
        $abba_sql_parent_delete_status = ("UPDATE `parent` SET `ParentTrashStatus`='1' WHERE `ParentID` = '$abba_get_multi_parent_id'");
        $abba_result_parent_delete_status = mysqli_query($link, $abba_sql_parent_delete_status);
        
        if($abba_result_parent_delete_status == true)
        {
            echo '<div class="text-success fs-5" align="center" role="alert">
                <i class="fa fa-check"> Delete Successful</i>
            </div>';
        }
        else
        {
            echo '<div class="text-danger fs-5" align="center" role="alert">
                <i class="fa fa-times"> Delete was not successful</i>  
            </div>';
        }
    }
?>