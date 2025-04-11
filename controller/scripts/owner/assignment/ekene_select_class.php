<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $campus = $_POST["campus"];

 $ekene_select_class = "SELECT * FROM `classordepartment` WHERE `CampusID`= '$campus'";

$ekene_query_link_class = mysqli_query($link, $ekene_select_class);
$ekene_get_details_class = mysqli_fetch_assoc($ekene_query_link_class);
$ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);

echo '<option value="NULL">Select class</option>';

if($ekene_row_cnt_ekene > 0)
{
   
    
    do{
       

        $ekene_subject_id = $ekene_get_details_class['ClassOrDepartmentID'];

        $ekene_subject = $ekene_get_details_class['ClassOrDepartmentName'];

        echo '<option value="'.$ekene_subject_id.'">'.$ekene_subject.'</option>';
        
    }while($ekene_get_details_class = mysqli_fetch_assoc($ekene_query_link_class));
}
else{
    echo '<option value="NULL">No Records Found</option>';
}
?>