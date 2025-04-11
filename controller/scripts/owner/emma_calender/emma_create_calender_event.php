<?php
    
include("../../../config/config.php");

$emma_receives_institution = $_POST['emma_send_institution'];

$select_for_calender_purpose = "SELECT * FROM `calender_purpose` ORDER BY Purpose ASC";
$select_for_calender_purpose_query = mysqli_query($link, $select_for_calender_purpose);
$select_for_calender_purpose_fetch = mysqli_fetch_assoc($select_for_calender_purpose_query);
$select_for_calender_purpose_rows = mysqli_num_rows($select_for_calender_purpose_query);

if($select_for_calender_purpose_rows > 0){

    echo '<option value="NULL">Select Purposes</option>';

    do{
        $emma_get_purposes = $select_for_calender_purpose_fetch['Purpose'];
        $emma_get_purposes_id = $select_for_calender_purpose_fetch['sn'];


        echo '<option value="'.$emma_get_purposes_id.'">'.$emma_get_purposes.'</option>';

    }while($select_for_calender_purpose_fetch = mysqli_fetch_assoc($select_for_calender_purpose_query));

}else{
    
}

?>