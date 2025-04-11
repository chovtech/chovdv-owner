<?php

include('../../../config/config.php');

$policy_title = $_POST['emma_policy_title'];
$policy_description = $_POST['emma_policy_description'];
$policy_publish = $_POST['emma_policy_publish'];
$policy_institution = $_POST['emma_policy_institution'];
$policy_checkboxes = $_POST['emmapolicycheckboxes'];

//  $policy_sections = explode('###,', $_POST['emmapolicysections']);

$policy_sections = rtrim($_POST['emmapolicysections'], '###');
$policy_sections = explode('###,', $policy_sections);

implode('### ',$policy_sections); 

$emma_get_sections = implode('### ',$policy_sections); 
$emma_get_sections;
$policy_section_descriptions = $_POST['emmapolicydescriptionsforsections'];


$emma_insert_for_policy = "INSERT INTO `policy`(`InstitutionIDOrCampusID`, `Title`,`Description`,`StakeHolder`,`PublishStatus`,`Section`,`SectionDescription`,`DeleteStatus`) VALUES
('$policy_institution','$policy_title','$policy_description','$policy_checkboxes','$policy_publish','$emma_get_sections','$policy_section_descriptions',0)";
$emma_insert_for_policy_query = mysqli_query($link, $emma_insert_for_policy);

if($emma_insert_for_policy_query == true){
    echo 1;
}else{
    echo 2;
}

?>