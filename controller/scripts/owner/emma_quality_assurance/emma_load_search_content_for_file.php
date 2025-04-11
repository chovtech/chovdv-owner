<?php

// include("../../../config/config.php");

$emma_get_id_for_institution = $_POST['emma_get_institution_id_for_search'];
$emma_get_id_for_file = $_POST['emma_get_file_id_for_search'];
$emma_get_id_for_folder = $_POST['emma_gets_folder_id_for_search'];
$emma_get_value_for_foldertype = $_POST['emma_foldertype_for_search'];


$emma_select_for_file_search = "SELECT * FROM `filestable` WHERE `InstitutionID` = 'emma_get_id_for_institution' AND `FileTableID` = '$emma_get_id_for_file' AND `FolderID` = '$emma_get_id_for_folder' AND `FolderType` = 'emma_get_value_for_foldertype'";
$emma_select_for_file_search_query = mysqli_query($link, $emma_select_for_file_search);
$emma_select_for_file_search_fetch = mysqli_fetch_assoc($emma_select_for_file_search_query);
$emma_select_for_file_search_rows = mysqli_num_rows($emma_select_for_file_search_query);

if($emma_get_value_for_foldertype == 'FirstFolder'){

}elseif($emma_get_value_for_foldertype == 'SecondFolder'){

}elseif($emma_get_value_for_foldertype == 'ThirdFolder'){

}else(
    
)



?>