<?php

include("../../../config/config.php");

$data_id = $_POST['data_id'];
$data_institution = $_POST['data_institution'];
$data_userid = $_POST['data_userid'];

$select_for_view_more_details = "SELECT * FROM `leaveapplication` 
    INNER JOIN `leaveapplicationlimit` ON `leaveapplication`.`InstitutionID` = `leaveapplicationlimit`.`InstitutionID`
    WHERE `leaveapplication`.`LeaveID` = '$data_id' 
    AND `leaveapplicationlimit`.`InstitutionID` = '$data_institution' 
    AND `leaveapplication`.`UserID` = '$data_userid'";

$query_for_view_more_details = mysqli_query($link, $select_for_view_more_details);
$fetch_for_view_more_details = mysqli_fetch_assoc($query_for_view_more_details);
$rows_for_view_more_details = mysqli_num_rows($query_for_view_more_details);


if($rows_for_view_more_details > 0){
    $get_leave_description = $fetch_for_view_more_details['LeaveTitle'];
    $get_leave_start_date = $fetch_for_view_more_details['StartDate'];
    $get_leave_end_date = $fetch_for_view_more_details['EndDate'];
    $get_leave_number_of_days = $fetch_for_view_more_details['NumberOfDays'];
    $get_leave_status = $fetch_for_view_more_details['Status'];
    $get_leave_session = $fetch_for_view_more_details['SessionType'];
    $get_leave_maximum_number_of_days = $fetch_for_view_more_details['MaximumNumberOfDays'];

    $used_days = $get_leave_maximum_number_of_days  - $get_leave_number_of_days;

    $select_for_staff = "SELECT * FROM `staff` WHERE `StaffID` = '$data_userid' AND `InstitutionID` = '$data_institution' ";
    $query_for_staff = mysqli_query($link, $select_for_staff);
    $fetch_for_staff = mysqli_fetch_assoc($query_for_staff);
    $rows_for_staff = mysqli_num_rows($query_for_staff);

    if($rows_for_staff > 0){
        $get_staff_firstname = $fetch_for_staff['StaffFirstName'];
        $get_staff_middlename = $fetch_for_staff['StaffMiddleName'];
        $get_staff_lastname = $fetch_for_staff['StaffLastName'];

        echo '
            <div class="p-1">Staff Name:'.$get_staff_firstname.' '.$get_staff_middlename.' '.$get_staff_lastname.'</div>
            <div class="p-1">Leave Description:'.$get_leave_description.'</div>
                
            <div class="p-1">Start Date:'.$get_leave_start_date.'</div>
            <div class="p-1">End Date:'.$get_leave_end_date.'</div>
            <div class="p-1">Maximum leave Days yearly:'.$get_leave_maximum_number_of_days.'</div>
            <div class="p-1">Days Assigned:'.$get_leave_number_of_days.'</div>';
            
            if($get_leave_status == 0){
                echo '<div class="p-1"> Status: <span class="text-warning">Pending</span></div>';
            }else if($get_leave_status == 1){
                echo '<div class="p-1"> Status: <span class="text-success">Approved</span></div>';
            }else{
                echo '<div class="p-1"> Status: <span class="text-danger">Declined</span></div>';
            }
    }else{
        echo 2;
    }

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