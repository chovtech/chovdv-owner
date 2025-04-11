<?php

include("../../../config/config.php");

    $emma_collect_base_sixty_four = $_POST['file'];
    $emma_collect_folder_id = $_POST['fileforfolderid'];
    $emma_collect_campus_id = $_POST['fileforcampusid'];
    $emma_collect_institution_id = $_POST['fileforinstitutionid'];
    $emma_collect_file_name = $_POST['fileforfilename'];
    $emma_collect_file_type = $_POST['fileforfiletype'];


$select_for_first_file_in_file_table = "SELECT * FROM `filestable` WHERE `FolderID` = '$emma_collect_folder_id' AND `CampusID` = '$emma_collect_campus_id' AND `BaseSixtyFour` = '$emma_collect_base_sixty_four' AND `InstitutionID` = '$emma_collect_institution_id' AND `FileName` = '$emma_collect_file_name' AND `FileType` = '$emma_collect_file_type' AND `FolderType` = 'FirstFolder' ";
$select_for_first_file_in_file_table_query = mysqli_query($link, $select_for_first_file_in_file_table);
$select_for_first_file_in_file_table_fetch = mysqli_fetch_assoc($select_for_first_file_in_file_table_query);
$select_for_first_file_in_file_table_num_of_rows = mysqli_num_rows($select_for_first_file_in_file_table_query);

if( $select_for_first_file_in_file_table_num_of_rows > 0){
    echo 1;
}else{

    $insert_for_first_file_in_file_table = "INSERT INTO `filestable`(`CampusID`, `FolderID`,`BaseSixtyFour`,`InstitutionID`,`FileName`,`FileType`,`DeleteStatus`,`FolderType`) VALUES ('$emma_collect_campus_id','$emma_collect_folder_id','$emma_collect_base_sixty_four','$emma_collect_institution_id','$emma_collect_file_name','$emma_collect_file_type',0,'FirstFolder')";
    $insert_for_first_file_in_file_table_query = mysqli_query($link, $insert_for_first_file_in_file_table);

    if($insert_for_first_file_in_file_table_query == true){
        echo 3;
    }else{
        echo 4;
    }
}

?>