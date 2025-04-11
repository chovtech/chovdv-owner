<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    
    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_campus_id = $_POST['abba_campus_id'];

    $btnclicked = $_POST['btnclicked'];

    $currentid = $_POST['currentid'];

    if($btnclicked == 1)
    {
        $abba_sql_staff = "SELECT * FROM staff INNER JOIN classordepartment ON staff.StaffID = classordepartment.HODOrFormTeacherUserID WHERE InstitutionID=$abba_instituion_id AND ClassOrDepartmentID = '$currentid' AND StaffTrashStatus = '0'";
        $abba_result_staff = mysqli_query($link, $abba_sql_staff);
        $abba_row_staff = mysqli_fetch_assoc($abba_result_staff);
        $abba_row_cnt_staff = mysqli_num_rows($abba_result_staff);

        if($abba_row_cnt_staff > 0)
        {

            $staff_id = $abba_row_staff['StaffID'];

            $abba_get_staff_whats_app_number = $abba_row_staff['StaffWhatsappNumber'];

            $abba_get_staff_main_number = $abba_row_staff['StaffMainNumber'];

            if($abba_get_staff_whats_app_number == 0 || $abba_get_staff_whats_app_number == '')
            {
                if($abba_get_staff_main_number == 0 || $abba_get_staff_main_number == '')
                {
                    $abba_get_staff_phone_number = '<i class="fas fa-phone"></i> Nil';
                }
                else
                {
                    $abba_get_staff_phone_number = '<a href="tel:'.$abba_get_staff_main_number.'" target="_blank" style="text-decoration:none;"><i class="fas fa-phone"></i> '.$abba_get_staff_main_number.'</a>';
                }
            }
            else
            {
                $abba_get_staff_phone_number = '<a href="https://wa.me/'.$abba_get_staff_main_number.'" target="_blank" style="text-decoration:none;"><i class="fab fa-whatsapp"></i> '.$abba_get_staff_whats_app_number.'</a>';

            }
            
            
            $abba_sql_defaultimages = "SELECT * FROM defaultimages WHERE ImageName = 'abba_profile_dummy_image'";
            $abba_result_defaultimages = mysqli_query($link, $abba_sql_defaultimages);
            $abba_row_defaultimages = mysqli_fetch_assoc($abba_result_defaultimages);
            $abba_row_cnt_defaultimages = mysqli_num_rows($abba_result_defaultimages);
            
            if($abba_row_cnt_defaultimages > 0)
            {
                $abba_profile_dummy_image = $abba_row_defaultimages['ImageName'];
            }
            else
            {
                $abba_profile_dummy_image = '';
            }
            
            
            if($abba_row_staff['StaffPhoto'] == '' || $abba_row_staff['StaffPhoto'] == 0 || $abba_row_staff['StaffPhoto'] == NULL)
            {
                $img = $abba_profile_dummy_image;
            }
            else
            {
                $img = $abba_row_staff['StaffPhoto'];
            }
            
            echo '<div class="card mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <img src="'.$img.'" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title">'.$abba_row_staff['StaffLastName'].' '.substr($abba_row_staff['StaffMiddleName'], 0, 1).'. '.$abba_row_staff['StaffFirstName'].'</h6>
                            <p class="card-text">Phone Number: '.$abba_get_staff_phone_number.'<br>Email: '.$abba_row_staff['StaffEmail'].'</p>
                            <p class="card-text">
                                <i class="fa fa-circle text-success"></i>
                                <a href="../staff-profile?itemid='.$currentid.'&InstitutionID='.$abba_instituion_id.'" class="btn abba_current_teacher float-end"> View Profile</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>';
        }
        else
        {
            $staff_id = 0;
        }


        echo '<div class="card mt-5 card-scrollable">
            <div class="card-header">
                <b>Select a new form teacher </b>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="search-container">
                        <input type="text" class="search-input form-control form-control-sm abba_class_stud_search"
                            placeholder="Search Staff">
                            <i class="fas fa-search search-icon"></i>
                    </div>
                </li>';
            
                $abba_sql_get_staff = "SELECT * FROM staff WHERE InstitutionID=$abba_instituion_id AND StaffTrashStatus = '0' ORDER BY StaffLastName";
                $abba_result_get_staff = mysqli_query($link, $abba_sql_get_staff);
                $abba_row_get_staff = mysqli_fetch_assoc($abba_result_get_staff);
                $abba_row_cnt_get_staff = mysqli_num_rows($abba_result_get_staff);

                if($abba_row_cnt_get_staff > 0)
                {
                    echo '<div class="class_stud_selectBox-cont">';
                        do{
                            if($staff_id == $abba_row_get_staff['StaffID'])
                            {
                                $checked = 'checked';
                            }
                            else
                            {
                                $checked = '';
                            }

                            echo '<li class="list-group-item class_stud_card_search_get">
                                <input class="form-check-input" type="radio" '.$checked.' name="ft_gs_rt_id" id="ft_gs_rt_id'.$abba_row_get_staff['StaffID'].'" value="'.$abba_row_get_staff['StaffID'].'" data-class="'.$currentid.'" data-campus="'.$abba_campus_id.'" data-btn="1">
                                <label class="form-check-label" for="ft_gs_rt_id'.$abba_row_get_staff['StaffID'].'">'.$abba_row_get_staff['StaffLastName'].' '.substr($abba_row_get_staff['StaffMiddleName'], 0, 1).'. '.$abba_row_get_staff['StaffFirstName'].'
                            </li>';

                        }while($abba_row_get_staff = mysqli_fetch_assoc($abba_result_get_staff));

                    echo '</div>';
                }
                else{
                    echo '<li class="list-group-item">
                        No records found
                    </li>';
                }
            echo '</ul>
        </div>';
    }
    elseif($btnclicked == 2){

        $abba_sql_gradingmethod = "SELECT * FROM gradingmethod INNER JOIN classordepartment ON gradingmethod.GradingMethodID = classordepartment.GradingMethodID WHERE InstitutionID=$abba_instituion_id AND ClassOrDepartmentID = '$currentid' AND CampusID = '$abba_campus_id'";
        $abba_result_gradingmethod = mysqli_query($link, $abba_sql_gradingmethod);
        $abba_row_gradingmethod = mysqli_fetch_assoc($abba_result_gradingmethod);
        $abba_row_cnt_gradingmethod = mysqli_num_rows($abba_result_gradingmethod);

        if($abba_row_cnt_gradingmethod > 0) 
        {

            $gradingmethod_id_ini = $abba_row_gradingmethod['GradingMethodID'];

            echo '<div class="card mb-3" style="border:2px dashed #007ffb;">
                <div class="card-body text-secondary">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <h6 class="card-title"><i class="fa fa-circle text-success"></i> '.$abba_row_gradingmethod['GradingMethodTitle'].'</h6>
                        </div>
                        <div class="col-lg-4 col-md-12">

                            <span class="float-end text-primary" data-bs-toggle="collapse" href="#collapseExample'.$gradingmethod_id_ini.'" aria-expanded="false" aria-controls="collapseExample'.$gradingmethod_id_ini.'" style="cursor:pointer;text-decoration: underline;font-size:11px;"><i class="fa fa-eye"></i> View Details</span>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            
                            <div class="collapse" id="collapseExample'.$gradingmethod_id_ini.'">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Range</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                                        $abba_sql_check_gradingstructure = ("SELECT * FROM `gradingstructure` WHERE GradingMethodID='$gradingmethod_id_ini' AND InstitutionID = '$abba_instituion_id' ORDER BY RangeStart ASC");
                                        $abba_result_check_gradingstructure = mysqli_query($link, $abba_sql_check_gradingstructure);
                                        $abba_row_check_gradingstructure = mysqli_fetch_assoc($abba_result_check_gradingstructure);
                                        $abba_row_cnt_check_gradingstructure = mysqli_num_rows($abba_result_check_gradingstructure);

                                        if($abba_row_cnt_check_gradingstructure > 0)
                                        {
                                            do{

                                                echo '<tr>
                                                    <td>'.$abba_row_check_gradingstructure['RangeStart'].' - '.$abba_row_check_gradingstructure['RangeEnd'].'</td>
                                                    <td>'.$abba_row_check_gradingstructure['Grade'].'</td>
                                                    <td>'.$abba_row_check_gradingstructure['Remark'].'</td>
                                                    
                                                </tr>';

                                            }while($abba_row_check_gradingstructure = mysqli_fetch_assoc($abba_result_check_gradingstructure));
                                        }
                                        else{

                                        }

                                    echo '</tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
        else{
            $gradingmethod_id_ini = 0;
        }

        echo '<div class="card mt-5 card-scrollable">
            <div class="card-header">
                <b>Select a new grading structure </b>
            </div>
            <div class="card-body">';

                $abba_sql_check_gradingmethod_new = ("SELECT * FROM `gradingmethod` WHERE InstitutionID=$abba_instituion_id ORDER BY GradingMethodTitle ASC");
                $abba_result_check_gradingmethod_new = mysqli_query($link, $abba_sql_check_gradingmethod_new);
                $abba_row_check_gradingmethod_new = mysqli_fetch_assoc($abba_result_check_gradingmethod_new);
                $abba_row_cnt_check_gradingmethod_new = mysqli_num_rows($abba_result_check_gradingmethod_new);
            
                if ($abba_row_cnt_check_gradingmethod_new > 0) {
            
                    $cnt = 0;
                    
                    do{
            
                        $cnt++;
            
                        $gradingmethod_id = $abba_row_check_gradingmethod_new['GradingMethodID'];
            
                        if($gradingmethod_id == $gradingmethod_id_ini)
                        {
                            $checked = 'checked';
                        }
                        else{
                            $checked = '';
                        }
                        echo '<label class="abba_radio_card col-md-12 col-lg-12 mt-3 p-3" style="border:2px dashed #007ffb;">
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <input name="ft_gs_rt_id" class="abba_radio" type="radio" '.$checked.' value="'.$gradingmethod_id.'" data-class="'.$currentid.'" data-campus="'.$abba_campus_id.'" data-btn="2">
                                </div>
                                <div class="col-lg-4 col-md-12">

                                    <span class="float-end text-primary" data-bs-toggle="collapse" href="#collapseExample'.$cnt.''.$gradingmethod_id.'" aria-expanded="false" aria-controls="collapseExample'.$cnt.''.$gradingmethod_id.'" style="cursor:pointer;text-decoration: underline;font-size:11px;"><i class="fa fa-eye"></i> View Details</span>
                                    
                                </div>
                            </div>
                            
                            <span class="plan-details">
                                <h6 style="font-size:13px;">'.$abba_row_check_gradingmethod_new['GradingMethodTitle'].'</h6>
                                <div class="collapse" id="collapseExample'.$cnt.''.$gradingmethod_id.'">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Range</th>
                                                <th scope="col">Grade</th>
                                                <th scope="col">Remark</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                
                                            $abba_sql_check_gradingstructurenew = ("SELECT * FROM `gradingstructure` WHERE GradingMethodID='$gradingmethod_id' ORDER BY RangeStart ASC");
                                            $abba_result_check_gradingstructurenew = mysqli_query($link, $abba_sql_check_gradingstructurenew);
                                            $abba_row_check_gradingstructurenew = mysqli_fetch_assoc($abba_result_check_gradingstructurenew);
                                            $abba_row_cnt_check_gradingstructurenew = mysqli_num_rows($abba_result_check_gradingstructurenew);
                
                                            if($abba_row_cnt_check_gradingstructurenew > 0)
                                            {
                                                $cntloop = 0;
                                                do{
                                                    $cntloop++;
                
                                                    echo '<tr class="">
                                                        <td>'.$abba_row_check_gradingstructurenew['RangeStart'].' - '.$abba_row_check_gradingstructurenew['RangeEnd'].'</td>
                                                        <td>'.$abba_row_check_gradingstructurenew['Grade'].'</td>
                                                        <td>'.$abba_row_check_gradingstructurenew['Remark'].'</td>
                                                    </tr>';
                                                }while($abba_row_check_gradingstructurenew = mysqli_fetch_assoc($abba_result_check_gradingstructurenew));
                
                                                echo '<input id="create_row_cnt'.$gradingmethod_id.'" type="hidden" value="'.$cntloop.'">';
                                            }
                                            else{
                
                                            }
                
                                        echo '</tbody>
                                    </table>
                                </div>
                            </span>
                        </label>';
                    }while($abba_row_check_gradingmethod_new = mysqli_fetch_assoc($abba_result_check_gradingmethod_new));
                    
                }
                else
                {

                }
            echo '</div>
            
        </div>';

    }
    else
    {
        $abba_sql_result_type = "SELECT * FROM result_type INNER JOIN classordepartment ON result_type.ResultType = classordepartment.ResultType WHERE ClassOrDepartmentID = '$currentid' AND CampusID = '$abba_campus_id'";
        $abba_result_result_type = mysqli_query($link, $abba_sql_result_type);
        $abba_row_result_type = mysqli_fetch_assoc($abba_result_result_type);
        $abba_row_cnt_result_type = mysqli_num_rows($abba_result_result_type);

        if($abba_row_cnt_result_type > 0) 
        {

            $ResultType_ini = $abba_row_result_type['ResultType'];

            echo '<div class="card mb-3" style="border:2px dashed #007ffb;">
                <div class="card-body text-secondary">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <h6 class="card-title"><i class="fa fa-circle text-success"></i> '.$abba_row_result_type['ResultType'].'</h6>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <small>'.$abba_row_result_type['Description'].'</small>
                        </div>
                    </div>
                </div>
            </div>';
        }
        else{
            $ResultType_ini = 0;
        }

        echo '<div class="card mt-5 card-scrollable">
            <div class="card-header">
                <b>Select a new grading structure </b>
            </div>
            <div class="card-body">';

                $abba_sql_check_result_type_new = ("SELECT * FROM `result_type` ORDER BY ResultType ASC");
                $abba_result_check_result_type_new = mysqli_query($link, $abba_sql_check_result_type_new);
                $abba_row_check_result_type_new = mysqli_fetch_assoc($abba_result_check_result_type_new);
                $abba_row_cnt_check_result_type_new = mysqli_num_rows($abba_result_check_result_type_new);
            
                if ($abba_row_cnt_check_result_type_new > 0) {
            
                    $cnt = 0;
                    
                    do{
            
                        $cnt++;
            
                        $result_type_id = $abba_row_check_result_type_new['ResultType'];
            
                        if($result_type_id == $ResultType_ini)
                        {
                            $checked = 'checked';
                        }
                        else{
                            $checked = '';
                        }
                        echo '<label class="abba_radio_card col-md-12 col-lg-12 mt-3 p-3" style="border:2px dashed #007ffb;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <input name="ft_gs_rt_id" class="abba_radio" type="radio" '.$checked.' value="'.$result_type_id.'" data-class="'.$currentid.'" data-campus="'.$abba_campus_id.'" data-btn="3">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <h6 style="font-size:13px;">'.$abba_row_check_result_type_new['ResultType'].'</h6><br>
                                    <small>'.$abba_row_check_result_type_new['Description'].'</small>
                                </div>
                            </div>
                            
                        </label>';
                    }while($abba_row_check_result_type_new = mysqli_fetch_assoc($abba_result_check_result_type_new));
                    
                }
            echo '</div>
            
        </div>';
    }
?>