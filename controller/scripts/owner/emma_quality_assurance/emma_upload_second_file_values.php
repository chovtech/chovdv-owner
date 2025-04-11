<?php

include("../../../config/config.php");

$second_file_base_sixty_four = $_POST['filedata'];
$second_file_data_id = $_POST['filefothirdfolderdataid'];
$second_file_campus_id = $_POST['fileforthirdfoldercampusid'];
$second_file_institution_id = $_POST['fileforthirdfolderinstitutionid'];
$second_file_name = $_POST['fileforthirdfilename'];
$second_file_type = $_POST['fileforthirdfiletype'];


$select_for_second_file_in_file_table = "SELECT * FROM `filestable` WHERE `FolderID` = '$second_file_data_id ' AND `CampusID` = '$second_file_campus_id' AND `BaseSixtyFour` = '$second_file_base_sixty_four' AND `InstitutionID` = '$second_file_institution_id' AND `FileName` = '$second_file_name' AND `FileType` = '$second_file_type' ORDER BY `FileName` ASC ";
$select_for_second_file_in_file_table_query = mysqli_query($link, $select_for_second_file_in_file_table);
$select_for_second_file_in_file_table_fetch = mysqli_fetch_assoc($select_for_second_file_in_file_table_query);
$select_for_second_file_in_file_table_num_of_rows = mysqli_num_rows($select_for_second_file_in_file_table_query);

if( $select_for_second_file_in_file_table_num_of_rows > 0){
    echo 1;
}else{
    $insert_for_second_file_in_file_table = "INSERT INTO `filestable`(`InstitutionID`, `CampusID`, `FolderID`, `FolderType`, `FileName`, `FileType`, `DeleteStatus`, `BaseSixtyFour`) VALUES ('$second_file_institution_id','$second_file_campus_id','$second_file_data_id','SecondFolder','$second_file_name','$second_file_type',0,'$second_file_base_sixty_four')";
    $insert_for_second_file_in_file_table_query = mysqli_query($link, $insert_for_second_file_in_file_table);

    if($insert_for_second_file_in_file_table_query == true){
        echo 3;
    }else{
        echo 4;
    }
}

?>