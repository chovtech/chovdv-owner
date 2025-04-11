<?php

include('../../../config/config.php');

$emma_campuses = $_POST['emma_campus_names'];
$emma_folders = explode(',',$_POST['emma_folder_names']);
// print_r($emma_folders);

$emma_institution_id = $_POST['emma_institution_names'];

foreach($emma_folders as $emma_folder_names) {
    $emma_folder_names;

    $insert_folder_values = "SELECT * FROM `firstfoldertable` WHERE 'CampusID' = '$emma_campuses' AND `FirstFolderName` = '$emma_folder_names' AND `InstitutionID` = '$emma_institution_id' ";
    $insert_folder_query = mysqli_query($link, $insert_folder_values);
    $insert_folder_rowcount  = mysqli_num_rows($insert_folder_query);

    if($insert_folder_rowcount > 0){
        echo 9;
    }else{
        $emma_inserting_into_table = "INSERT INTO `firstfoldertable`(`InstitutionID`,`CampusID`,`FirstFolderName`,`DeleteStatus`) VALUES ('$emma_institution_id','$emma_campuses','$emma_folder_names',0)";
        $insert_folder_querys = mysqli_query($link, $emma_inserting_into_table);

        if($insert_folder_querys == true)
        {
            echo 2;
        }
        else{
            echo 1;
        }
    }
}

?>