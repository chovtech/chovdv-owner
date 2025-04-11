<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $campus = $_POST["campus"];

$ekene_select_term = "SELECT *
FROM termorsemester
INNER JOIN termalias ON termorsemester.TermOrSemesterID = termalias.TermOrSemesterID
WHERE termalias.CampusID = '$campus'

";

$ekene_query_link_term = mysqli_query($link, $ekene_select_term);
$ekene_get_details_term = mysqli_fetch_assoc($ekene_query_link_term);
 $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_term);

echo '<option value="NULL">Select term</option>';

if($ekene_row_cnt_ekene > 0)
{
   
    
    do{
       

        $ekene_subject_id = $ekene_get_details_term['TermOrSemesterID'];

        $ekene_subject = $ekene_get_details_term['TermAliasName'];
        $status = $ekene_get_details_term['status'];
          if($status === '1')
          {
            $ekene_selected_term = "selected";
          }
          else
          {
            $ekene_selected_term = '';
          }

        echo '<option value="'.$ekene_subject_id.'"  ' . $ekene_selected_term . '>'.$ekene_subject.'</option>';
        
    }while($ekene_get_details_term = mysqli_fetch_assoc($ekene_query_link_term));
}
else{
    echo '<option value="NULL">No Records Found</option>';
}

?>