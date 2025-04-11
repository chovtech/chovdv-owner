    <?php

    include("../../../config/config.php");

    $keep_staff_id = $_POST['keep_staff_id'];
    $keep_institution_id = $_POST['keep_institution_id'];

    $select_for_leave_application_display = "SELECT * FROM `leaveapplication` WHERE `InstitutionID` = '$keep_institution_id' AND `UserID` = '$keep_staff_id' ";
    $query_for_leave_application_display = mysqli_query($link, $select_for_leave_application_display);
    $fetch_for_leave_application_display = mysqli_fetch_assoc($query_for_leave_application_display);
    $rows_for_leave_application_display = mysqli_num_rows($query_for_leave_application_display);

    if($rows_for_leave_application_display > 0 || $rows_for_leave_application_display == 0){

        // $get_leave_title = $fetch_for_leave_application_display['LeaveTitle'];
        // $get_leave_date_started = $fetch_for_leave_application_display['StartDate'];
        // $get_leave_date_ended = $fetch_for_leave_application_display['EndDate'];
        // $get_leave_status = $fetch_for_leave_application_display['Status'];
        // $get_leave_number_of_days = $fetch_for_leave_application_display['NumberOfDays'];

            $get_status_zero = "SELECT * FROM `leaveapplication` WHERE `InstitutionID` = '$keep_institution_id' AND `UserID` = '$keep_staff_id' AND `Status` = 0 ";
            $get_status_query_zero = mysqli_query($link, $get_status_zero);
            $get_status_fetch_zero = mysqli_fetch_assoc($get_status_query_zero);
            $get_status_rows_zero = mysqli_num_rows($get_status_query_zero);

            $get_status_one = "SELECT * FROM `leaveapplication` WHERE `InstitutionID` = '$keep_institution_id' AND `UserID` = '$keep_staff_id' AND `Status` = 1 ";
            $get_status_query_one = mysqli_query($link, $get_status_one);
            $get_status_fetch_one = mysqli_fetch_assoc($get_status_query_one);
            $get_status_rows_one = mysqli_num_rows($get_status_query_one);

            $get_status_two = "SELECT * FROM `leaveapplication` WHERE `InstitutionID` = '$keep_institution_id' AND `UserID` = '$keep_staff_id' AND `Status` = 2 ";
            $get_status_query_two = mysqli_query($link, $get_status_two);
            $get_status_fetch_two = mysqli_fetch_assoc($get_status_query_two);
            $get_status_rows_two = mysqli_num_rows($get_status_query_two);

            // if($get_status_rows_zero > 0){
                echo '
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3"><i
                            class="bx bx-user"></i><span
                            class="fw-semibold mx-2">Leaves Available</span> <span>
                            <div class="card  ms-1"
                                style="padding: 4px; color: #009700;  border-radius: 30px 30px 30px 30px; background-color: #bdffd8;">
                                '.$rows_for_leave_application_display.'</div>
                        </span></li>
                    <li class="d-flex align-items-center mb-3"><i
                            class="bx bx-check"></i><span
                            class="fw-semibold mx-2">Leaves Approved</span> <span>
                            <div class="card ms-1"
                                style="padding: 5px; border-radius: 30px 30px 30px 30px; color: #009751;  background-color: #bdffe0;">
                                '.$get_status_rows_one.'</div>
                        </span></li>
                    <li class="d-flex align-items-center mb-3"><i
                            class="bx bx-stopwatch"></i><span
                            class="fw-semibold mx-2">Leaves Pending</span> <span>
                            <div class="card ms-1"
                                style="padding: 5px; border-radius: 30px 30px 30px 30px; color: #8d9700;  background-color: #f3ffbd;">
                                '.$get_status_rows_zero.'</div>
                        </span></li>
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-x"></i><span
                            class="fw-semibold mx-2">Leaves Declined</span> <span>
                            <div class="card ms-1"
                                style="padding: 5px; color: #970000; border-radius: 30px 30px 30px 30px; background-color: #ffc1bd;">
                                '.$get_status_rows_two.'</div>
                        </span></li>
                </ul>';
            // }else{
                
            // }
            

        // }while($fetch_for_leave_application_display = mysqli_fetch_assoc($query_for_leave_application_display));
            
    }else{

    }

    ?>