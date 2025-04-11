<?php

include("../../../config/config.php");

$keep_staff_id = $_POST['keep_staff_id'];
$keep_institution_id = $_POST['keep_institution_id'];

$select_for_leave_application_display = "SELECT * FROM `leaveapplication` WHERE `InstitutionID` = '$keep_institution_id' AND `UserID` = '$keep_staff_id' ";
$query_for_leave_application_display = mysqli_query($link, $select_for_leave_application_display);
$fetch_for_leave_application_display = mysqli_fetch_assoc($query_for_leave_application_display);
$rows_for_leave_application_display = mysqli_num_rows($query_for_leave_application_display);

if($rows_for_leave_application_display > 0){

    echo '<div class="table-responsive mt-3">
            <table class="table text-nowrap mb-0 align-items-center">
                <thead class="text-dark fs-6">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Leave Type</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">From</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">To</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Days</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Permission</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>';
    do{
        $get_leave_title = $fetch_for_leave_application_display['LeaveTitle'];
        $get_leave_date_started = $fetch_for_leave_application_display['StartDate'];
        $get_leave_date_ended = $fetch_for_leave_application_display['EndDate'];
        $get_leave_status = $fetch_for_leave_application_display['Status'];
        $get_leave_number_of_days = $fetch_for_leave_application_display['NumberOfDays'];

        echo '  <tr>
                    <td class="border-bottom-0">
                        <p class="fw-normal mb-0">'.$get_leave_title.'</p>
                    </td>
                    <td class="border-bottom-0">
                        <span class="fw-normal">'.$get_leave_date_started.'</span>
                    </td>
                    <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">'.$get_leave_date_ended.'</p>
                    </td>
                    <td class="border-bottom-0">
                        <h6 class="fw-normal mb-0">'.$get_leave_number_of_days.'</h6>
                    </td>';

                    if($get_leave_status == 0){
                        echo '<td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span
                                        class="text-warning fw-semibold">Pending
                                    </span>
                                </div>
                            </td>';
                    }elseif ($get_leave_status == 1) {
                        echo'<td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span
                                        class="text-success fw-semibold">Approved
                                    </span>
                                </div>
                            </td>';
                    }else {
                        echo'<td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span
                                        class="text-danger fw-semibold">Declined
                                    </span>
                                </div>
                            </td>';
                    }
                    echo ' </tr>';

    }while($fetch_for_leave_application_display = mysqli_fetch_assoc($query_for_leave_application_display));
            echo '</tbody>
        </table>
    </div>';
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
                <p class="mt-2">No Record Found, Apply For Leave to Proceed</p>
            </div>
        </div>';
    }else{

    }
}

?>