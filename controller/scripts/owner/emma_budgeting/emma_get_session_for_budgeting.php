<?php

include("../../../config/config.php");

$emma_institution_id_for_session = $_POST['emma_send_the_institution'];



$select_for_session = "SELECT * FROM `session` ORDER BY sessionName ASC";
$select_for_session_query = mysqli_query($link, $select_for_session);
$select_for_session_fetch = mysqli_fetch_assoc($select_for_session_query);
$select_for_session_rows = mysqli_num_rows($select_for_session_query);

if($select_for_session_rows > 0){
    echo '<option value="NULL">Select Session</option>';

    do{
    
        $emma_get_session_id = $select_for_session_fetch['sessionID'];
        $emma_get_session = $select_for_session_fetch['sessionName'];;
        $emma_status_for_session = $select_for_session_fetch['sessionStatus'];

        if($emma_status_for_session === '1'){

        $emma_selected_session = "selected";

        }else{

        $emma_selected_session = '';

        }

        echo '<option value="'.$emma_get_session.'" '.$emma_selected_session.'>'.$emma_get_session.'</option>';

    }while($select_for_session_fetch = mysqli_fetch_assoc($select_for_session_query));

}else{
    echo 2;
}

?>