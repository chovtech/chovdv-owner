<?php

    include('../../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];

    $campus_id = $_POST['campus_id'];

    if($campus_id == '' || $campus_id == 'undefined'){
        $campus_id_mew = 'NULL';
    }
    else{
        $campus_id_mew = $campus_id;
    }

    $abba_sql_check_chargestructure = ("SELECT * FROM `campus`
    INNER JOIN chargestructure ON campus.CampusID=chargestructure.CampusID
    WHERE campus.InstitutionID=$abba_instituion_id AND chargestructure.InstitutionID=$abba_instituion_id AND (campus.CampusID=$campus_id_mew OR $campus_id_mew IS NULL) AND (chargestructure.CampusID=$campus_id_mew OR $campus_id_mew IS NULL)");
    $abba_result_check_chargestructure = mysqli_query($link, $abba_sql_check_chargestructure);
    $abba_row_check_chargestructure = mysqli_fetch_assoc($abba_result_check_chargestructure);
    $abba_row_cnt_check_chargestructure = mysqli_num_rows($abba_result_check_chargestructure);

    if($abba_row_cnt_check_chargestructure > 0)
    {
        echo 1;
    }
    else{
        echo 0;
    }
?>
