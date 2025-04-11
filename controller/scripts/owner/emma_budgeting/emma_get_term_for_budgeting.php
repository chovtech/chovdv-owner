<?php

 include('../../../config/config.php');

 $emma_campus_for_term = $_POST["emma_send_campus_for_term"];

$emma_select_term = "SELECT * FROM termorsemester INNER JOIN termalias ON termorsemester.TermOrSemesterID = termalias.TermOrSemesterID WHERE termalias.CampusID = '$emma_campus_for_term'";

$emma_select_term_query = mysqli_query($link, $emma_select_term);
$emma_select_term_fetch = mysqli_fetch_assoc($emma_select_term_query);
$emma_select_term_rows = mysqli_num_rows($emma_select_term_query);

echo '<option value="NULL">Select term</option>';

if($emma_select_term_rows > 0)
{
    do{
        $emma_get_term_id = $emma_select_term_fetch['TermOrSemesterID'];
        $emma_get_term = $emma_select_term_fetch['TermAliasName'];
        $emma_status = $emma_select_term_fetch['status'];

        if($emma_status === '1'){

        $emma_selected_term = "selected";

        }else{

        $emma_selected_term = '';

        }

        echo '<option value="'.$emma_get_term_id.'" ' . $emma_selected_term . '>'.$emma_get_term.'</option>';
        
    }while($emma_select_term_fetch = mysqli_fetch_assoc($emma_select_term_query));
}
else{

}

?>