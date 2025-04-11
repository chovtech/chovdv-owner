
<?php

include('../../../config/config.php');

$campus = $_POST['campus'];

$delete_member_modal = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'prostrashimage' ";
$query_delete_member_modal = mysqli_query($link, $delete_member_modal);
$fetch_delete_member_modal = mysqli_fetch_assoc($query_delete_member_modal);
$rows_delete_member_modal = mysqli_num_rows($query_delete_member_modal);

if($rows_delete_member_modal > 0){
    $get_image = $fetch_delete_member_modal['BaseSixtyFour'];
        echo '<div align="center">
                <img src="'.$get_image.'" alt="" style="">
            </div>';
}

?>