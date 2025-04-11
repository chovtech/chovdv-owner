<?php
    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_sql_campus = ("SELECT * FROM `campus` WHERE CampusID=$abba_campus_id AND AdmissionNumberCount != ''");
    $abba_result_campus = mysqli_query($link, $abba_sql_campus);
    $abba_row_campus = mysqli_fetch_assoc($abba_result_campus);
    $abba_row_cnt_campus = mysqli_num_rows($abba_result_campus);

    if($abba_row_cnt_campus > 0)
    {
        $abba_sql_userlogin = ("SELECT * FROM `userlogin` WHERE InstitutionIDOrCampusID = '$abba_campus_id' AND UserType = 'student' ORDER BY CAST(SUBSTRING(UserRegNumberOrUsername, 1, IF(REGEXP_INSTR(UserRegNumberOrUsername, '[^0-9]') > 0, REGEXP_INSTR(UserRegNumberOrUsername, '[^0-9]') - 1, LENGTH(UserRegNumberOrUsername) ) ) AS SIGNED) DESC LIMIT 1");
        $abba_result_userlogin = mysqli_query($link, $abba_sql_userlogin);
        $abba_row_userlogin = mysqli_fetch_assoc($abba_result_userlogin);
        $abba_row_cnt_userlogin = mysqli_num_rows($abba_result_userlogin);

        if($abba_row_cnt_userlogin > 0)
        {

            echo $abba_row_userlogin['UserRegNumberOrUsername'] + 1;
        }
        else
        {
            echo $abba_row_campus['AdmissionNumberCount'];
        }
    }
    else
    {
        echo '';
    }
?>