<?php

include("../../../config/config.php");

$campus_id = $_POST['campus_id'];
$session = $_POST['session'];

$get_selected_positions = "SELECT * FROM `electionsettings` WHERE `CampusID` = '$campus_id' AND `SessionName` = '$session' ";
$get_query_positions = mysqli_query($link, $get_selected_positions);
$fetch_positions = mysqli_fetch_assoc($get_query_positions);
$rows_positions = mysqli_num_rows($get_query_positions);

if($rows_positions > 0){

    $get_position_id = explode(',',$fetch_positions['PositionsSelected']);

    echo '<option value="NULL">Select Position</option>';
    foreach ($get_position_id as $key => $get_position_id_new) {

        $get_positions = "SELECT * FROM `electionpositions` WHERE `ElectionPositionID` = '$get_position_id_new'  ORDER BY `ElectionPositionName` ASC ";
        $get_positions_query = mysqli_query($link, $get_positions);
        $get_positions_fetch = mysqli_fetch_assoc($get_positions_query);
        $get_positions_rows = mysqli_num_rows($get_positions_query);

        if($get_positions_rows > 0){
     
            $emma_get_elect_id = $get_positions_fetch['ElectionPositionID'];
            $emma_get_elect_postitons = $get_positions_fetch['ElectionPositionName'];
            
            echo '<option value="'.$emma_get_elect_id.'">'.$emma_get_elect_postitons.'</option>';
    
        }else{
            echo '<option value="NULL">No Records Found</option>';
        }
    }
    
}else{
    echo '<option value="">No Records Found</option>';
}

?>