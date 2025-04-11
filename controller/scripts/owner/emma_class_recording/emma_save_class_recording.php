<?php

include('../../../config/config.php');

$emma_get_record_campus = trim($_POST['emma_campus_for_rec']);
$emma_get_record_session = trim($_POST['emma_session_for_rec']);
$emma_get_record_term = trim($_POST['emma_term_for_rec']);
$emma_get_record_class = trim($_POST['emma_class_for_rec']);
$emma_get_record_subject = trim($_POST['emma_subject_for_rec']);
$emma_get_audio_data = trim($_POST['audioData']);
$emma_get_duration = trim($_POST['duration']);
$emma_get_status = trim($_POST['status']);
$emma_get_date = trim($_POST['formattedDate']);


$emma_insert_for_class_recording = "INSERT INTO `classrecording`(`CampusID`, `sessionName`, `TermAliasName`, `ClassOrDepartmentName`, `SubjectOrCourseTitle`, `AudioRecording`, `Duration`,`Status`,`Date`) VALUES ('$emma_get_record_campus','$emma_get_record_session','$emma_get_record_term','$emma_get_record_class','$emma_get_record_subject','$emma_get_audio_data','$emma_get_duration','$emma_get_status','$emma_get_date')";
$emma_insert_for_class_recording_query = mysqli_query($link, $emma_insert_for_class_recording);

if($emma_insert_for_class_recording_query == 'true'){
    echo 1;
}else{
    echo 2;
}


?>