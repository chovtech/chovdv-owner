<?php

include("../../../config/config.php");

$this_session = $_POST['this_session'];
$keep_institution_id = $_POST['keep_institution_id'];

$select_for_owner_leave_table = "SELECT * FROM `leaveapplication` INNER JOIN `leaveapplicationlimit` ON 
`leaveapplication`.`InstitutionID` = `leaveapplicationlimit`.`InstitutionID` WHERE `leaveapplication`.`InstitutionID` = '$keep_institution_id'
 AND `leaveapplicationlimit`.`SessionType` = '$this_session' ";
$select_query = mysqli_query($link, $select_for_owner_leave_table);
$fetch_query = mysqli_fetch_assoc($select_query);
$rows_of_query = mysqli_num_rows($select_query);

if($rows_of_query > 0){

    do{
        $get_leave_title = $fetch_query['LeaveTitle'];
        $get_leave_StartDate = $fetch_query['StartDate'];
        $get_leave_EndDate = $fetch_query['EndDate'];
        $get_leave_NumberOfDays = $fetch_query['NumberOfDays'];
        $get_leave_ID = $fetch_query['LeaveID'];
        $get_leave_status = $fetch_query['Status'];
        $get_leave_user_id = $fetch_query['UserID'];
        $get_leave_institution_id = $fetch_query['InstitutionID'];


        $select_from_staff = "SELECT * FROM `staff` WHERE `InstitutionID` = '$keep_institution_id' AND `StaffID` = '$get_leave_user_id' ";
        $query_from_staff = mysqli_query($link, $select_from_staff);
        $fetch_from_staff = mysqli_fetch_assoc($query_from_staff);
        $rows_from_staff = mysqli_num_rows($query_from_staff);

        if($rows_from_staff > 0){

            // do{
                $get_staff_first_name = $fetch_from_staff['StaffFirstName'];
                $get_staff_last_name = $fetch_from_staff['StaffLastName'];

                echo'
                        <div class="card chiCourseList">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-sm-4 col-md-2" style="display: flex;">
                                        <div style="margin-left: 10px;">
                                            <small style="color: #9b9a9a;">Staff Name</small>
                                            <p style="font-size: 14px; font-weight: bold;">'.$get_staff_first_name.' '.$get_staff_last_name.'</p>

                                        </div>
                                    </div>

                                    <div class="col-sm-2 col-md-2">
                                        <div>
                                            <small style="color: #9b9a9a;">Start Date</small>
                                            <h6 style="font-size: 14px; font-weight: normal;">'.$get_leave_StartDate.'</h6>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 col-md-2">
                                        <div>
                                            <small style="color: #9b9a9a;">End Date</small>
                                            <h6 style="font-size: 14px; font-weight: normal;">'.$get_leave_EndDate.'</h6>
                                        </div>
                                    </div>';

                                    if($get_leave_status == 0){
                                        echo '<div class="col-sm-2 col-md-1">
                                                <div>
                                                    <small style="color: #9b9a9a;">Status</small>
                                                    <h6 style="font-size: 14px; font-weight: normal;" class="text-warning fw-semibold">Pending</h6>
                                                </div>
                                            </div>';
                                    }elseif ($get_leave_status == 1) {
                                        echo '<div class="col-sm-2 col-md-1">
                                                <div>
                                                    <small style="color: #9b9a9a;">Status</small>
                                                    <h6 style="font-size: 14px; font-weight: normal;" class="text-success fw-semibold">Approved</h6>
                                                </div>
                                            </div>';
                                    }else{
                                        echo '<div class="col-sm-2 col-md-1">
                                                <div>
                                                    <small style="color: #9b9a9a;">Status</small>
                                                    <h6 style="font-size: 14px; font-weight: normal;" class="text-danger fw-semibold">Declined</h6>
                                                </div>
                                            </div>';
                                    }

                                    echo'
                                    <div class="col-sm-4 col-md-2">
                                        <div class="row ">
                                            <div class="col-2">
                                            
                                            </div>

                                            <div class="col-8">
                                                <div>
                                                    <small style="color: #9b9a9a;">No. Of Days</small>
                                                    <h6 style="font-size: 14px; font-weight: normal;">'.$get_leave_NumberOfDays.'</h6>

                                                </div>
                                            </div>

                                            <div class="col-2">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 col-md-3">
                                        <div>';
                                            if($get_leave_status == 1){
                                                echo'
                                                <button type="button" class="btn btn-danger mt-2 btn-sm emma_decline_leave" style="padding: 5px 10px; font-size: 10px;" data-id="'.$get_leave_ID.'" data-status="'.$get_leave_status.'" data-userid="'.$get_leave_user_id.'">Decline</button>
                                                <i class="fa fa-eye mt-2" style="color: blue; cursor: pointer;" id="emma_view_leave_details" data-bs-toggle="modal" data-bs-target="#view_leave" data-userid="'.$get_leave_user_id.'" data-institution='.$get_leave_institution_id.' data-id="'.$get_leave_ID.'"> View</i>&nbsp;&nbsp;';
                                            }elseif ($get_leave_status == 2) {
                                                echo'
                                                <button type="button" class="btn btn-success mt-2 btn-sm emma_approve_leave" style="padding: 5px 10px; font-size: 10px;" data-id="'.$get_leave_ID.'" data-status="'.$get_leave_status.'" data-userid="'.$get_leave_user_id.'">Approve</button>&nbsp;&nbsp;
                                                <i class="fa fa-eye mt-2" style="color: blue; cursor: pointer;" id="emma_view_leave_details" data-bs-toggle="modal" data-bs-target="#view_leave" data-userid="'.$get_leave_user_id.'" data-institution='.$get_leave_institution_id.' data-id="'.$get_leave_ID.'"> View</i>&nbsp;&nbsp;';
                                            }elseif($get_leave_status == 0){
                                                echo'
                                                <button type="button" class="btn btn-success btn-sm mt-2 emma_approve_leave" style="padding: 5px 10px; font-size: 10px;" data-id="'.$get_leave_ID.'" data-status="'.$get_leave_status.'" data-userid="'.$get_leave_user_id.'">Approve</button>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-danger btn-sm mt-2 emma_decline_leave" style="padding: 5px 10px; font-size: 10px;" data-id="'.$get_leave_ID.'" data-status="'.$get_leave_status.'" data-userid="'.$get_leave_user_id.'">Decline</button>
                                                <i class="fa fa-eye mt-2" style="color: blue; cursor: pointer;" id="emma_view_leave_details" data-bs-toggle="modal" data-bs-target="#view_leave" data-userid="'.$get_leave_user_id.'" data-institution='.$get_leave_institution_id.' data-id="'.$get_leave_ID.'"> View</i>&nbsp;&nbsp;';
                                            }else{

                                            }
                                            echo'
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>&nbsp;';

            // }while($fetch_from_staff = mysqli_fetch_assoc($query_from_staff));

        }else{
            echo '2';
        }

    }while($fetch_query = mysqli_fetch_assoc($select_query));

}else{
    $select_for_leave_default_images = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2' ";
    $query_for_leave_default_images = mysqli_query($link, $select_for_leave_default_images);
    $fetch_for_leave_default_images = mysqli_fetch_assoc($query_for_leave_default_images);
    $rows_for_leave_default_images = mysqli_num_rows($query_for_leave_default_images);

    if($rows_for_leave_default_images > 0){
        $get_image = $fetch_for_leave_default_images['BaseSixtyFour'];

        echo 
        '<div align="center">
            <div class="">
                <img src="'.$get_image.'" alt="" style="width:115px;">
                <p class="mt-2">No Record Found</p>
            </div>
        </div>';
    }else{

    }
}


?>