<?php
    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_sql_section = ("SELECT * FROM `section` WHERE CampusID='$abba_campus_id' ORDER BY SectionName ASC");
    $abba_result_section = mysqli_query($link, $abba_sql_section);
    $abba_row_section = mysqli_fetch_assoc($abba_result_section);
    $abba_row_cnt_section = mysqli_num_rows($abba_result_section);
    
    echo '<option value="NULL">Select Section</option>';

    if($abba_row_cnt_section > 0)
    {
        do{

            echo '<option value="'.$abba_row_section['SectionID'].'" '.$abba_selected_section.' data-id="'.$abba_row_section['SectionListID'].'">'.$abba_row_section['SectionName'].'</option>';
    
        }while($abba_row_section = mysqli_fetch_assoc($abba_result_section));
    }
    else
    {
        echo '<option value="NULL">No Records Found</option>';
    }
?>