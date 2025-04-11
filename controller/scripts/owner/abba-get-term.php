<?php
    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    @$page = $_POST['page'];

    $abba_sql_term = ("SELECT * FROM `termorsemester` INNER JOIN termalias ON termorsemester.TermOrSemesterID=termalias.TermOrSemesterID WHERE CampusID='$abba_campus_id' ORDER BY termalias.TermOrSemesterID ASC");
    $abba_result_term = mysqli_query($link, $abba_sql_term);
    $abba_row_term = mysqli_fetch_assoc($abba_result_term);
    $abba_row_cnt_term = mysqli_num_rows($abba_result_term);
    
    echo '<option value="NULL">Select Term</option>';

    if($abba_row_cnt_term > 0)
    {

        do{
            if($abba_row_term['status'] == '1')
            {
                $abba_selected_term = 'selected';
            }
            else
            {
                $abba_selected_term = '';
            }

            echo '<option value="'.$abba_row_term['TermOrSemesterID'].'" '.$abba_selected_term.'>'.$abba_row_term['TermAliasName'].'</option>';

        }while($abba_row_term = mysqli_fetch_assoc($abba_result_term));


        if($page == 'result-broadsheet')
        {
            echo '<option value="cumulative">Cumulative</option>';
        }

    }
    else
    {
        echo '<option value="NULL">No Records Found</option>';
    }
?>