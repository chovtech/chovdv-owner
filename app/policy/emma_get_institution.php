<?php

include('../../../config/config.php');

$emma_collect_parent_id = $_POST['emma_get_institution'];


$emma_parent_table_select = "SELECT * FROM `parent` WHERE `ParentID` = '$emma_collect_parent_id' ";
$emma_parent_table_query = mysqli_query($link, $emma_parent_table_select);
$emma_parent_table_fetch = mysqli_fetch_assoc($emma_parent_table_query);
$emma_parent_table_rows = mysqli_num_rows($emma_parent_table_query);

    if($emma_parent_table_rows > 0){

       $emma_institution = $emma_parent_table_fetch['InstitutionID'];

       echo '<input type="hidden" class="emmaloadinputforinstitutionorparent" value="'.$emma_institution.'">';
       
    }else{
        echo 2;
    }

?>