<?php


include('../../../config/config.php');

$data_id_edit = $_POST['emma_edit_id'];
$data_title_edit = $_POST['emma_edit_title'];
$data_description_edit = $_POST['emma_edit_description'];
// $data_section_edit = $_POST['emma_edit_section'];
// $data_section_description_edit = $_POST['emma_edit_section_description'];

$data_section_edit = rtrim($_POST['emma_edit_section'], '###');
$data_section_edit = explode('###,', $data_section_edit);

implode('### ',$data_section_edit); 

$emma_get_sections_for_edit = implode('### ',$data_section_edit); 

$data_section_description_edit = $_POST['emma_edit_section_description'];


$emma_edit_for_policy = "UPDATE `policy` SET `Title`='$data_title_edit',`Description`='$data_description_edit',`Section`='$emma_get_sections_for_edit',`SectionDescription`='$data_section_description_edit' WHERE `sn`='$data_id_edit' AND `DeleteStatus`= 0 ";
$emma_edit_for_policy_query = mysqli_query($link, $emma_edit_for_policy);

if($emma_edit_for_policy_query == true){
    echo 1;
}else{
    echo 2;
}



?>