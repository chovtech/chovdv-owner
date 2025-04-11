<?php


include("../../../config/config.php");


$emma_third_file_base_sixty_four = $_POST['filedata'];
$emma_third_file_data_id = $_POST['filefothirdfiledataid'];
$emma_third_file_campus_id = $_POST['fileforthirdfilecampusid'];
$emma_third_file_institution_id = $_POST['fileforthirdfileinstitutionid'];
$emma_third_file_name = $_POST['fileforthirdfilename'];
$emma_third_file_type = $_POST['fileforthirdfiletype'];

$select_for_third_file_create = "SELECT * FROM `filestable` WHERE `BaseSixtyFour` = '$emma_third_file_base_sixty_four' AND `FolderID` = '$emma_third_file_data_id' AND `CampusID` = '$emma_third_file_campus_id' AND `InstitutionID` = '$emma_third_file_institution_id' AND `FileName` = '$emma_third_file_name' AND `FileType` = '$emma_third_file_type' ORDER BY `FileName` ASC ";
$select_for_third_file_create_query = mysqli_query($link, $select_for_third_file_create);
$select_for_third_file_create_fetch = mysqli_fetch_assoc($select_for_third_file_create_query);
$select_for_third_file_create_num_of_rows = mysqli_num_rows($select_for_third_file_create_query);

if($select_for_third_file_create_num_of_rows > 0){
    echo 2;
}else{
    $insert_for_third_file_in_file_table = "INSERT INTO `filestable`(`InstitutionID`, `CampusID`, `FolderID`, `FolderType`, `FileName`, `FileType`, `DeleteStatus`, `BaseSixtyFour`) VALUES ('$emma_third_file_institution_id','$emma_third_file_campus_id','$emma_third_file_data_id','ThirdFolder','$emma_third_file_name','$emma_third_file_type',0,'$emma_third_file_base_sixty_four')";
    $insert_for_third_file_in_file_table_query = mysqli_query($link, $insert_for_third_file_in_file_table);

    if($insert_for_third_file_in_file_table_query == true){
        echo 3;
    }else{
        echo 4;
    }
}

?>