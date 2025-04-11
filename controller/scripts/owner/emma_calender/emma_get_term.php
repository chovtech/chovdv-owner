<?php

include("../../../config/config.php");

$emma_institution_id_for_term = $_POST['emma_send_the_institution_term'];

$select_for_term = "SELECT * FROM `termorsemester` ORDER BY TermOrSemesterName ASC";
$select_for_term_query = mysqli_query($link, $select_for_term);
$select_for_term_fetch = mysqli_fetch_assoc($select_for_term_query);
$select_for_term_rows = mysqli_num_rows($select_for_term_query);

if($select_for_term_rows > 0){

    echo '<option value="NULL">Select Term</option>';

    do{
        $emma_get_term = $select_for_term_fetch['TermOrSemesterName'];
        $emma_get_term_id = $select_for_term_fetch['TermOrSemesterID'];


        echo '<option value="'.$emma_get_term_id.'">'.$emma_get_term.'</option>';

    }while($select_for_term_fetch = mysqli_fetch_assoc($select_for_term_query));

}else{
    
}

?>