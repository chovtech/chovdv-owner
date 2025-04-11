<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $campus = $_POST["campus"];


 $select_all_committee = " SELECT * FROM `boardmember` WHERE `CampusID` IN (0, $campus) AND DeleteStatus = 0";
 $ekene_query_link_class = mysqli_query($link, $select_all_committee);
 $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
 $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);
 echo '<option value="NULL">Select Committee</option>';
 if ($ekene_row_cnt_ekene > 0)
 {
    
    do{
        $Committeename = $ekene_get_details_subject['Committeename'];

        $CommitteeID = $ekene_get_details_subject['CommitteeID'];
        echo '<option value="'.$CommitteeID.'">'.$Committeename.'</option>';

    }while($ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class));
 }
 else{
    echo '<option value="NULL">No Records Found</option>';
 }

 ?>