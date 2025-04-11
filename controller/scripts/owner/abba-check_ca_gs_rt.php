<?php

    include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];
    
    // ca-gs-rt(meaning CA Setting, grading structure and result type has not been set)
    // ca-rt(meaning CA Setting and result type has not been set)
    // gs-rt(meaning grading structure and result type has not been set)
    // rt(meaning result type has not been set)
    // ca-gs(meaning CA Setting and grading structure has not been set)
    // ca(meaning CA Setting has not been set)
    // gs(meaning grading structure has not been set)

    $abba_sql_check_ca = ("SELECT * FROM `campus`
    INNER JOIN resultsetting ON campus.CampusID=resultsetting.CampusID
    WHERE campus.InstitutionID=$abba_instituion_id");
    $abba_result_check_ca = mysqli_query($link, $abba_sql_check_ca);
    $abba_row_check_ca = mysqli_fetch_assoc($abba_result_check_ca);
    $abba_row_cnt_check_ca = mysqli_num_rows($abba_result_check_ca);

    if($abba_row_cnt_check_ca > 0)
    {
        $abba_sql_check_gs = ("SELECT * FROM gradingstructure
        WHERE InstitutionID=$abba_instituion_id");
        $abba_result_check_gs = mysqli_query($link, $abba_sql_check_gs);
        $abba_row_check_gs = mysqli_fetch_assoc($abba_result_check_gs);
        $abba_row_cnt_check_gs = mysqli_num_rows($abba_result_check_gs);

        if($abba_row_cnt_check_gs > 0)
        {

        }
        else{
            echo 'gs';
        }
    }
    else{

        $abba_sql_check_gs = ("SELECT * FROM gradingstructure
        WHERE InstitutionID=$abba_instituion_id");
        $abba_result_check_gs = mysqli_query($link, $abba_sql_check_gs);
        $abba_row_check_gs = mysqli_fetch_assoc($abba_result_check_gs);
        $abba_row_cnt_check_gs = mysqli_num_rows($abba_result_check_gs);

        if($abba_row_cnt_check_gs > 0)
        {
            
                echo 'ca';
            
        }
        else{

             echo 'ca-gs';
            
        }
    }
?>
