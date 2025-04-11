<?php

    include("../../../config/config.php");

    $positions_array = $_POST['positionsArray'];

    $get_positions = "SELECT * FROM `electionpositions` ORDER BY `ElectionPositionName` ASC ";
    $get_positions_query = mysqli_query($link, $get_positions);
    $get_positions_fetch = mysqli_fetch_assoc($get_positions_query);
    $get_positions_rows = mysqli_num_rows($get_positions_query);

    if($get_positions_rows > 0){

        do{

            $positions_id = $get_positions_fetch['ElectionPositionID'];
            $positions_name = $get_positions_fetch['ElectionPositionName'];

            $checked = '';

            foreach ($positions_array as $position_id) {
                if ($position_id == $positions_id) {

                    $checked.= 'checked';
                }
            }     

            echo'
            <li class="item itemedit emmacheckitems_edit emmapositions_edit '. $checked.'" data-id="'.$positions_id.'">
                <span class="checkbox position_checkbox_edit " id="'.$positions_id.'" data-id="'.$positions_id.'">
                    <i class="fa-solid fas fa-check check-icon"></i>
                </span>
                <span class="item-text_edit ">'.$positions_name.'</span>
            </li>';

        }while($get_positions_fetch = mysqli_fetch_assoc($get_positions_query));
    }else{
        echo 2;
    }
?>