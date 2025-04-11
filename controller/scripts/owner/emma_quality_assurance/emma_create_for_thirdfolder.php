<?php

include("../../../config/config.php");

$emma_gets_third_institution_id = $_POST['emma_create_institution_id'];
$emma_gets_third_folder_value = $_POST['emma_create_folder_value'];
$emma_gets_second_data_id = $_POST['emma_second_data_id'];
$emma_campus_id_for_third_folder = $_POST['emma_campus_id_for_third_folder_create'];


$select_for_thirdfolder_table = "SELECT * FROM `thirdfoldertable` WHERE `CampusID` = '$emma_campus_id_for_third_folder' AND `SecondFolderID` = '$emma_gets_second_data_id' AND `ThirdFolderName` = '$emma_gets_third_folder_value' AND `InstitutionID` = '$emma_gets_third_institution_id' ";
$select_for_thirdfolder_table_query = mysqli_query($link, $select_for_thirdfolder_table);
$select_for_thirdfolder_table_fetch = mysqli_fetch_assoc($select_for_thirdfolder_table_query);
$select_for_thirdfolder_table_number_of_rows = mysqli_num_rows($select_for_thirdfolder_table_query);

if($select_for_thirdfolder_table_number_of_rows > 0){
    echo 122;
    
}else{
    $insert_for_thirdfolder_table = "INSERT INTO `thirdfoldertable`(`InstitutionID`,`ThirdFolderName`,`CampusID`,`SecondFolderID`,`DeleteStatus`) VALUES ('$emma_gets_third_institution_id','$emma_gets_third_folder_value','$emma_campus_id_for_third_folder','$emma_gets_second_data_id',0)";
    $insert_for_thirdfolder_table_query = mysqli_query($link,$insert_for_thirdfolder_table);

    if($insert_for_thirdfolder_table_query == true){
        echo 40;
    }else{
        echo  41;
    }
}

?>