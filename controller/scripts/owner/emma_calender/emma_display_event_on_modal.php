<?php

        include("../../../config/config.php");

          $emma_get_dates = $_POST['emmadates'];
        $emma_get_institution = $_POST['emmainstitution'];


    $emmacalendereventforeach = "SELECT * FROM `calender` WHERE `Start_Date` = '$emma_get_dates' AND `InstitutionID` = '$emma_get_institution'";
    $emmacalendereventforeach_query = mysqli_query($link, $emmacalendereventforeach);
    $emmacalendereventforeach_fetch = mysqli_fetch_assoc($emmacalendereventforeach_query);
    $emmacalendereventforeach_rows = mysqli_num_rows($emmacalendereventforeach_query);

if($emmacalendereventforeach_rows > 0){
    echo '<div class="row">
            <div class="col-7">
                <h6 style="color:#007ffb;">Event Title</h6>
            </div>
            <div class="col-2 ms-2" style="color:#FFAE42";><h6>Edit</h6></div>
            <div class="col-2 text-danger"><h6>Delete</h6></div>
        </div>
        <div class="row">';
    do{
        $emma_get_event_title = $emmacalendereventforeach_fetch['Title'];
        $emma_get_event_id = $emmacalendereventforeach_fetch['sn'];

        echo'
            <div class="col-7 emmaloadtitleoneditmodal"><h6>'.$emma_get_event_title.'</h6></div>
            <div class="col-2 emma_edit_event_title" data-bs-toggle="modal" data-bs-target="#emmatogglemodalforedit" data-idforedit="'.$emma_get_event_id.'" data-emmatitle="'.$emma_get_event_title.'"><button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-warning mb-2 id="" style="font-size:11px; color:#ff6e35;""> <i class="fas fa-edit emma_edit_btn" ></i></i></div>
            <div class="col-2 emma_delete_event_title" data-bs-toggle="modal" data-bs-target="#emmatogglemodalfordelete" data-idfordelete="'.$emma_get_event_id.'"><button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-danger mb-2" style="font-size:11px;""> <i class="fas fa-trash"></i> </button></div>';
            
    }while($emmacalendereventforeach_fetch = mysqli_fetch_assoc($emmacalendereventforeach_query));
    echo '</div>';
}
else
{
    echo '<div class="alert alert-danger" role="alert">No Event Set!</div>';
}

?>