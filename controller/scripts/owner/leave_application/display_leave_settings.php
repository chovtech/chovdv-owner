<?php

include("../../../config/config.php");

$keep_institution_id = $_POST['keep_institution_id'];

$get_institution_name = "SELECT * FROM `institution` WHERE `InstitutionID` = '$keep_institution_id' ";
$get_institution_query = mysqli_query($link, $get_institution_name);
$fetch_institution = mysqli_fetch_assoc($get_institution_query);
$rows_for_institution = mysqli_num_rows($get_institution_query);

if($rows_for_institution > 0){
    $get_institution_name = $fetch_institution['InstitutionGeneralName'];

    $select_for_limit_table = "SELECT * FROM `leaveapplicationlimit` WHERE `InstitutionID` = '$keep_institution_id' ";
    $limit_table_query = mysqli_query($link, $select_for_limit_table);
    $fetch_limit_query = mysqli_fetch_assoc($limit_table_query);
    $rows_limit_query = mysqli_num_rows($limit_table_query);

    if($rows_limit_query > 0){

        do{

            $get_session = $fetch_limit_query['SessionType'];
            $get_num_days = $fetch_limit_query['MaximumNumberOfDays'];
            $get_limit_id = $fetch_limit_query['LeaveapplicationlimitID'];
            $get_limit_institutionID = $fetch_limit_query['InstitutionID'];

            echo '<div class="card chiCourseList">
                <div class="card-body">
                    <div class="row g-2">
                        
                        <div class="col-sm-4 col-md-4" style="display: flex;">
                            <div style="margin-left: 10px;">
                                <h6 style="font-size: 14px; font-weight: bold;">Institution</h6>
                                <small style="color: #9b9a9a;">'.$get_institution_name.'</small>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-2">
                            <div>
                                <h6 style="font-size: 14px; font-weight: bold;">Session Type</h6>
                                <span>'.$get_session.'</span>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="row ">
                                <div class="col-2">
                                
                                </div>
                                <div class="col-8">
                                    <div>
                                    <h6 style="font-size: 14px; font-weight: bold;">Number Of Days</h6>
                                    <span>'.$get_num_days.'</span>
                                    </div>
                                </div>
                                <div class="col-2">
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                        <div style="margin-top: 10px;" class="g-5">
                            <i class="fa fa-edit" style="color: green; cursor: pointer;" id="emma_edit_leave_settings" data-bs-toggle="modal" data-bs-target="#leave_application_edit_settings" data-session='.$get_session.' data-days='.$get_num_days.' data-id='.$get_limit_id.' data-institute='.$get_limit_institutionID.'> Edit Leave</i>&nbsp;&nbsp;
                        </div>
                    </div>
                    </div>
                </div>
            </div>&nbsp;
            ';
        }while($fetch_limit_query = mysqli_fetch_assoc($limit_table_query));
        
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
                    <p class="mt-2">No Record Found, Add Leave Settings</p>
                </div>
            </div>';
        }else{

        }
    }


}else{
    echo 'No Institution';
}



?>