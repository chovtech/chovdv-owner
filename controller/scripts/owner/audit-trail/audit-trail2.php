<?php

include('../../../config/config.php');

$emma_get_campus_id = $_POST['emma_campus_id'];   

$sql_emma_campus = "SELECT * FROM `termalias`  INNER JOIN `termorsemester` ON `termalias`.`TermOrSemesterID` = `termorsemester`.`TermOrSemesterID` WHERE `termalias`.`CampusID`='$emma_get_campus_id '";
$emma_select_row = mysqli_query($link,$sql_emma_campus);
$emma_select_num_rows = mysqli_fetch_assoc($emma_select_row);

if($emma_select_num_rows  > 0){

    echo '<option value="NULL">Select Term</option>';

     $cnt = 0;
        
        do{
            $cnt++;

            $emma_term_id = $emma_select_num_rows['TermOrSemesterID'];

            $emma_term_name = $emma_select_num_rows['TermAliasName'];
            $status = $emma_select_num_rows['status'];

                if($status == '1')
                {
                       $current_selected = 'selected';
                }else
                {
                    $current_selected = '';
                }

            echo '<option '.$current_selected.' value="'.$emma_term_id.'">'.$emma_term_name.'</option>';
             
        }while($emma_select_num_rows = mysqli_fetch_assoc($emma_select_row));
   

}
else{

    echo '<option value="NULL">No Term Found</option>';
}



?>


