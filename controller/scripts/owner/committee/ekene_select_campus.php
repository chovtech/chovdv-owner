<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $instutition = $_POST["instutition"];

$ekene_select_campus = "SELECT * FROM `campus` WHERE `InstitutionID`= '$instutition' ORDER BY CampusName ASC";

$ekene_query_link_campus = mysqli_query($link, $ekene_select_campus);
$ekene_get_details_campus = mysqli_fetch_assoc($ekene_query_link_campus);
 $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_campus);

echo '<option value="NULL">Select campus</option>';

if($ekene_row_cnt_ekene > 0)
{
   
    
    do{
       

        $ekene_subject_id = $ekene_get_details_campus['CampusID'];

        $ekene_subject = $ekene_get_details_campus['CampusName'];

        echo '<option value="'.$ekene_subject_id.'">'.$ekene_subject.'</option>';
        
    }while($ekene_get_details_campus = mysqli_fetch_assoc($ekene_query_link_campus));
}
else{
    echo '<option value="NULL">No Records Found</option>';
}

?>