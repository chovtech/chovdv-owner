<?php

    include('../../config/config.php');

    $abba_parent_id = $_POST['abba_parent_id'];

    $abba_parent_status = $_POST['abba_parent_status'];

    $abba_get_stored_instituion_id = $_POST['abba_get_stored_instituion_id'];

    $abba_display_session = $_POST['abba_display_session'];

    $abba_create_date = date('Y-m-d');

    if($abba_parent_status == 1)
    {
        $abba_sql_status = ("DELETE FROM `deactivateuser` WHERE `InstitutionIDOrCampusID` = '$abba_get_stored_instituion_id' AND `UserType` = 'parent' AND `UserID` = '$abba_parent_id'");
        $abba_result_status = mysqli_query($link, $abba_sql_status);

        echo '<span style="float: right;" id="abba_parent_stat_span'.$abba_parent_id.'">
            <button type="button" class="btn chiActive abba_change_parent_status" id="parent'.$abba_parent_id.'" data-id="'.$abba_parent_id.'" data-status="2" data-span="abba_parent_stat_span'.$abba_parent_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> Active
            </button>
        </span>';
    }
    else
    {

        $abba_sql_status = ("DELETE FROM `deactivateuser` WHERE `InstitutionIDOrCampusID` = '$abba_get_stored_instituion_id' AND `UserType` = 'parent' AND `UserID` = '$abba_parent_id'");
        $abba_result_status = mysqli_query($link, $abba_sql_status);

        $abba_sql_insert = ("INSERT INTO `deactivateuser`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `sessionName`, `TermOrSemesterName`, `Status`, `Date`) VALUES ('$abba_get_stored_instituion_id','$abba_parent_id','parent','$abba_display_session','','$abba_parent_status','$abba_create_date')");
        $abba_result_insert = mysqli_query($link, $abba_sql_insert);

        echo '<span style="float: right;" id="abba_parent_stat_span'.$abba_parent_id.'">
            <button type="button" class="btn chiBlock abba_change_parent_status" id="parent'.$abba_parent_id.'" data-id="'.$abba_parent_id.'" data-status="1" data-span="abba_parent_stat_span'.$abba_parent_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> Blocked
            </button>
        </span>';
    }

?>
