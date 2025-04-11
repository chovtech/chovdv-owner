<?php
include("../../../config/config.php");

$positionname = $_POST["positionname"];
$positionid = $_POST["positionid"];

$slect_all_committee = "SELECT * FROM `position`";
$ekene_query_link_class = mysqli_query($link, $slect_all_committee);
$ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
$ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);
echo '<option value="NULL">Select Position</option>';
   if ($ekene_row_cnt_ekene > 0){ 
        do{
            
            $PositionID = $ekene_get_details_subject['PositionID'];

            $PositionTitle = $ekene_get_details_subject['PositionTitle'];
            echo '<option value="'.$PositionID.'">'.$PositionTitle.'</option>';


        }while($ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class));
   }
   else
   {
    echo '<option value="NULL">No Records Found</option>';
   }


?>