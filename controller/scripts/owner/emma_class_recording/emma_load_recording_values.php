<?php

include('../../../config/config.php');


$emma_get_campus = $_POST['emma_send_campus'];
$emma_get_session = $_POST['emma_send_session'];
$emma_get_term = $_POST['emma_send_term'];
$emma_get_class = $_POST['emma_send_class'];
$emma_get_subject = $_POST['emma_send_subject'];

$select_for_default_image = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2'";
$select_for_default_image_query = mysqli_query($link, $select_for_default_image);
$select_for_default_image_fetch = mysqli_fetch_assoc($select_for_default_image_query);

$select_for_images = $select_for_default_image_fetch['BaseSixtyFour'];

$emma_select_for_class_recording = "SELECT * FROM `classrecording` WHERE `CampusID` = '$emma_get_campus' AND `sessionName` = '$emma_get_session' 
AND `TermOrSemesterID` = '$emma_get_term' AND `ClassOrDepartmentID` = '$emma_get_class' AND `SubjectOrCourseID` = '$emma_get_subject' ORDER BY `Date` DESC";
$emma_select_for_class_recording_query = mysqli_query($link, $emma_select_for_class_recording);
$emma_select_for_class_recording_fetch = mysqli_fetch_assoc($emma_select_for_class_recording_query);
$emma_select_for_class_recording_rows = mysqli_num_rows($emma_select_for_class_recording_query);

if($emma_select_for_class_recording_rows > 0){

    echo '  <div class="card chiCourseList mt-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3 fw-bolder">
                        Session
                        </div>

                        <div class="col-3 fw-bolder">
                        Date
                        </div>

                        <div class="col-4 text-center fw-bolder">
                        Recording
                        </div>

                        <div class="col-2 fw-bolder">
                        Status
                        </div>
                    </div>
                </div>';
    do{

        $emma_fetch_audio = $emma_select_for_class_recording_fetch['AudioRecording'];
        $emma_fetch_duration = $emma_select_for_class_recording_fetch['Duration'];
        $emma_fetch_session = $emma_select_for_class_recording_fetch['sessionName'];
        $emma_fetch_status = $emma_select_for_class_recording_fetch['Status'];
        $emma_fetch_date = $emma_select_for_class_recording_fetch['Date'];

        $audio_binary_for_class_recording = base64_decode($emma_fetch_audio);

        echo '              
            <div class="card-body">
                <div class="row g-2">

                    <div class="col-lg-3 col-sm-2 col-md-2">
                        <div style="margin-top:15px;">
                            <span>'.$emma_fetch_session.'</span>
                        </div>
                    </div>

                    <div class="col-3">
                        <div style="font-size: bold; margin-top: 18px;">
                            <span>
                                '.$emma_fetch_date.'
                            </span>
                        </div>
                    </div>

                    
                    <div class="col-4">
                        <div style="margin-top: 4px;">';
                        
                        if($emma_fetch_status == 1){
                            echo '<div style="">
                                    <audio controls style="cursor: not-allowed>
                                        <source src="data:audio/wav;base64,' . base64_encode($audio_binary_for_class_recording) . '" type="audio/wav">
                                    </audio>
                                </div>';
                        }else{
                            echo '<audio controls>
                                    <source src="data:audio/wav;base64,' . base64_encode($audio_binary_for_class_recording) . '" type="audio/wav">
                                </audio>';
                        }   
                        echo '</div>
                    </div>';
                    
                    if($emma_fetch_status == 1){
                        echo '<div class="col-sm-2 col-md-2 col-lg-2">
                                <div style="margin-top: 15px;">
                                    <i class="fas fa-circle" style="color: green; cursor: pointer;" id="" data-bs-toggle="modal" data-bs-target="#">Active</i> 
                                </div>
                            </div>';
                        }else{
                            echo ' <div class="col-sm-2 col-md-2 col-lg-2">
                                    <div style="margin-top: 12px;">
                                        <i class="fas fa-circle text-danger" style="color: red; cursor: pointer;" id="" data-bs-toggle="modal" data-bs-target="#">Recorded</i> 
                                    </div>
                                </div>';
                        }
                echo '</div>
            </div>';

    }while($emma_select_for_class_recording_fetch = mysqli_fetch_assoc($emma_select_for_class_recording_query));
    echo '</div>';
}else{

    echo '<div class="card mt-1">
            <div class="card-body" style:"width:10px;">
                <div align="center" class="">
                    <img src="'.$select_for_images.'" alt"No Record Found" style="width: 100px;">
                    <h6 class="text-secondary mt-1">No Records Found!</h6>
                </div>
            </div>
        </div>';
}



?>