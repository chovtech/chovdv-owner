<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');

$institutionid = $_POST["institution"];

$ekene_sql_campus = ("SELECT * FROM campus WHERE InstitutionID = '$institutionid' ORDER BY CampusName ASC");
    $ekene_query_link_campus = mysqli_query($link, $ekene_sql_campus);
    $ekene_get_details_campus = mysqli_fetch_assoc($ekene_query_link_campus);
    $ekene_row_cnt_campus = mysqli_num_rows($ekene_query_link_campus);

    echo '<option value="NULL">Select Campus</option>';

    if($ekene_row_cnt_campus > 0)
    {
        $cnt = 0;
        
        do{
            $cnt++;

            $ekene_campus_id = $ekene_get_details_campus['CampusID'];

            $ekene_campus_name = $ekene_get_details_campus['CampusName'];

            echo '<option value="'.$ekene_campus_id.'">'.$ekene_campus_name.'</option>';
            
        }while($ekene_get_details_campus = mysqli_fetch_assoc($ekene_query_link_campus));
    }
    else{
        echo '<option value="NULL">No Records Found</option>';
    }

?>