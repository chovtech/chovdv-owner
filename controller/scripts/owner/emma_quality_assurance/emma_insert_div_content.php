<?php


include("../../../config/config.php");

$emma_array_content = $_POST['emma_array_for_div'];
$emma_institution_id = $_POST['emma_gets_institution_id_for_file_details'];
$emma_data_id = $_POST['emma_collects_data_id'];
$emma_staff_name = $_POST['emma_collect_file_value'];
$emma_filetype = $_POST['emma_gets_filetype'];
$emma_data_id_for_main_div = $_POST['emma_gets_staff_details_id'];              

foreach ($emma_array_content as $i => $emma_array_content_new) {

    $emma_array_content_new;

    $emma_staff_name_new = str_replace(' ', '_', $emma_staff_name[$i]).'.pdf';

    $emma_select_for_div_content = "SELECT * FROM `filestable` WHERE `InstitutionID` = '$emma_institution_id' AND `BaseSixtyFour` = '$emma_array_content_new' AND `FolderID` = '$emma_data_id' AND `FileName` = '$emma_staff_name_new' AND `FileType` = '$emma_filetype'";
    $emma_select_for_div_content_query = mysqli_query($link, $emma_select_for_div_content);
    $emma_select_for_div_content_fetch = mysqli_fetch_assoc($emma_select_for_div_content_query);
    $emma_select_for_div_content_rows = mysqli_num_rows($emma_select_for_div_content_query);
    
    if($emma_select_for_div_content_rows > 0){
        echo 1;
    }else{
        $insert_for_filestable = "INSERT INTO `filestable`(`InstitutionID`,`FolderID`,`FileName`,`DeleteStatus`, `BaseSixtyFour`,`FileType`) VALUES ('$emma_institution_id','$emma_data_id','$emma_staff_name_new',0,'$emma_array_content_new','$emma_filetype')";
        $insert_for_filestable_query = mysqli_query($link, $insert_for_filestable);

        if($insert_for_filestable_query == true){
            
        }else{
            
        }
    }
}

?>