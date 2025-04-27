<?php
    include('../../../config/config.php');

    $session_name = $_POST['session_name'];
    $curnt_session = $_POST['curnt_session'];

    

    $abba_sql_term = ("SELECT * FROM `termorsemester`  ORDER BY TermOrSemesterID ASC");
    $abba_result_term = mysqli_query($link, $abba_sql_term);
    $abba_row_term = mysqli_fetch_assoc($abba_result_term);
    $abba_row_cnt_term = mysqli_num_rows($abba_result_term);
    
    // echo '<option value="NULL">Select Term</option>';

    if($abba_row_cnt_term > 0)
    {

        do{


            if($curnt_session == $session_name)
            {
                if($abba_row_term['status'] == '1')
                {
                    $abba_selected_term = 'selected';
                }
                else
                {
                    $abba_selected_term = '';
                }

            }else{
                $abba_selected_term = '';
            }

          
            echo '<option value="'.$abba_row_term['TermOrSemesterID'].'" '.$abba_selected_term.'>'.$abba_row_term['TermOrSemesterName'].'</option>';

        }while($abba_row_term = mysqli_fetch_assoc($abba_result_term));


       

    }
    else
    {
        echo '<option value="NULL">No Records Found</option>';
    }
?>