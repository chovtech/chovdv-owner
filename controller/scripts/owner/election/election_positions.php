<?php

include("../../../config/config.php");

$emma_institution_id = $_POST['institution'];

$select_for_position = "SELECT * FROM `electionpositions` ORDER BY `ElectionPositionName` ASC";
$select_for_position_query = mysqli_query($link, $select_for_position);
$select_for_position_fetch = mysqli_fetch_assoc($select_for_position_query);
$select_for_position_rows = mysqli_num_rows($select_for_position_query);

if($select_for_position_rows > 0){

    do{
        $emma_get_position_id = $select_for_position_fetch['ElectionPositionID'];
        $emma_get_position = $select_for_position_fetch['ElectionPositionName'];;

        echo'<li class="item emmacheckitems" data-id="'.$emma_get_position_id.'">
                <span class="checkbox position_checkbox" id="'.$emma_get_position_id.'" data-id="'.$emma_get_position_id.'">
                    <i class="fa-solid fas fa-check check-icon"></i>
                </span>
                <span class="item-text">'.$emma_get_position.'</span>
            </li>';

    }while($select_for_position_fetch = mysqli_fetch_assoc($select_for_position_query));

}else{
    echo 2;
}

?>