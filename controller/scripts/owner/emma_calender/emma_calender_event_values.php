<?php

include("../../../config/config.php");


$emma_institution = $_POST['emma_event_institution'];
$emma_date_started = $_POST['emma_start_date_for_event'];
$emma_purposes = explode(',',$_POST['emmasendpurpose']);
$emma_title = explode(',',$_POST['emmasendcalendertitle']);
$emma_session = $_POST['emma_session_for_calender'];
$emma_term = $_POST['emma_term_for_calender'];


foreach($emma_purposes as  $key => $emma_purposesnew){

    // $emma_purposenew =  $emma_purposes[$key];
    $emma_titlenew =  $emma_title[$key];
    $emma_newtitle  = mysqli_real_escape_string($link, $emma_titlenew);

    $emma_select_for_calender = "SELECT * FROM `calender` WHERE `Start_Date` = '$emma_date_started' AND `End_Date` = '$emma_date_started' AND `Purpose_ID` = '$emma_purposesnew' AND `Session` = '$emma_session' AND `TermOrSemesterID` = '$emma_term' AND `Title` = '$emma_newtitle'";
    $emma_select_for_calender_query = mysqli_query($link, $emma_select_for_calender);
    $emma_select_for_calender_fetch = mysqli_fetch_assoc($emma_select_for_calender_query);
    $emma_select_for_calender_rows = mysqli_num_rows($emma_select_for_calender_query);

    // if($emma_select_for_calender_rows > 0){
    //     echo '';
    // }else{

    //     $emma_get_start_date = $emma_select_for_calender_fetch['Start_Date'];
    //     $emma_get_end_date = $emma_select_for_calender_fetch['End_Date'];

    $insert_into_calender_table = "INSERT INTO `calender`(`InstitutionID`, `Start_Date`, `End_Date`, `Purpose_ID`, `Session`, `TermOrSemesterID`, `Title`) VALUES ('$emma_institution','$emma_date_started','$emma_date_started','$emma_purposesnew','$emma_session','$emma_term','$emma_newtitle')";
    $insert_into_calender_table_query = mysqli_query($link, $insert_into_calender_table);

    // }
}
    if($insert_into_calender_table_query == true){
        echo 2;
    }else{
        echo 3;
    }
    
?>