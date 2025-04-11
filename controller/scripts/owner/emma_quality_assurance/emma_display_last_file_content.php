<?php


include("../../../config/config.php");

$dataid = $_POST['lastfileid'];

$select_for_last_files = "SELECT * FROM `filestable` WHERE `FileTableID` = '$dataid' ORDER BY `FileName` ASC";
$select_for_last_files_query = mysqli_query($link, $select_for_last_files);
$select_for_last_files_fetch = mysqli_fetch_assoc($select_for_last_files_query);
$select_for_last_files_rows = mysqli_num_rows($select_for_last_files_query);


if($select_for_last_files_rows > 0){
        $emma_get_files_base_sixty_four = $select_for_last_files_fetch['BaseSixtyFour'];

    echo $emma_get_files_base_sixty_four;
}else{

}


?>