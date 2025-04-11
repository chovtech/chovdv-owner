<?php

    include("../../../config/config.php");

    
    $emma_get_calender_institution = $_POST['emmasendinstitutionforcalender'];


    $select_for_emma_calender = "SELECT * FROM `calender` WHERE `InstitutionID` = '$emma_get_calender_institution' ORDER BY sn DESC";
    $select_for_emma_calender_query = mysqli_query($link, $select_for_emma_calender);
    $select_for_emma_calender_fetch = mysqli_fetch_assoc($select_for_emma_calender_query);
    $select_for_emma_calender_rows = mysqli_num_rows($select_for_emma_calender_query);

    if($select_for_emma_calender_rows > 0)
    {
        $emma_get_calender_values = array();

        do{
            
        $emma_data_id_for_calender = $select_for_emma_calender_fetch['sn'];
        $calender_start_date_for_emma =  str_replace('-','',$select_for_emma_calender_fetch['Start_Date']);
        // $calender_end_date_for_emma =  str_replace('-','',$select_for_emma_calender_fetch['End_Date']);
        $calender_purpose_for_emma =  $select_for_emma_calender_fetch['Purpose_ID'];
        $calender_session_for_emma =  $select_for_emma_calender_fetch['Session'];
        $calender_termorsemester_for_emma =  $select_for_emma_calender_fetch['TermOrSemesterID'];
        $calender_title_for_emma =  $select_for_emma_calender_fetch['Title'];

        $emma_get_calender_values[] = array(
  
            'calenderdataid' => $emma_data_id_for_calender,
            'calenderstartdateforemma' => $calender_start_date_for_emma,
            // 'calenderenddateforemma' => $calender_end_date_for_emma,
            'calenderpurposeforemma' => $calender_purpose_for_emma,
            'calendersessionforemma' => $calender_session_for_emma,
            'calendertermorsemesterforemma' => $calender_termorsemester_for_emma,
            'calendertitleforemma' => $calender_title_for_emma,

        );
        
        }while($select_for_emma_calender_fetch = mysqli_fetch_assoc($select_for_emma_calender_query));

        
        $emma_calender_data = json_encode($emma_get_calender_values, JSON_PRETTY_PRINT);
        echo $emma_calender_data;

    }else{
        
    }
?>
