<?php


include("../../../config/config.php");

$emma_gets_data_id_for_delete = $_POST['emma_download_for_data_id'];

$emma_select_for_first_file_download = "SELECT * FROM `filestable` WHERE `FileTableID` = '$emma_gets_data_id_for_delete' ";
$emma_select_for_first_file_download_query = mysqli_query($link, $emma_select_for_first_file_download);
$emma_select_for_first_file_download_fetch = mysqli_fetch_assoc($emma_select_for_first_file_download_query);
$emma_select_for_first_file_download_rows = mysqli_num_rows($emma_select_for_first_file_download_query);

if( $emma_select_for_first_file_download_rows > 0){
    $emma_fetch_base_sixty_four_from_files_table = $emma_select_for_first_file_download_fetch['BaseSixtyFour'];
    $emma_fetch_file_name_from_files_table = $emma_select_for_first_file_download_fetch['FileName'];
    $emma_fetch_file_type_from_files_table = $emma_select_for_first_file_download_fetch['FileType'];

    echo '<input type="hidden" id="emma_id_for_basesixtyfour_files_table" value="'.$emma_fetch_base_sixty_four_from_files_table.'">
          <input type="hidden" id="emma_id_for_filename_files_table" value="'.$emma_fetch_file_name_from_files_table.'">
          <input type="hidden" id="emma_id_for_filetype_files_table" value="application/'.$emma_fetch_file_type_from_files_table.'">';
}else{
    echo 2;
}


?>