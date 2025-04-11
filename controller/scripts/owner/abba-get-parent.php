<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_section_id = $_POST['abba_section_id'];

    $abba_display_class = $_POST['abba_display_class'];

    $abba_display_parent_type = $_POST['abba_display_parent_type'];

    $abba_display_parent_status = $_POST['abba_display_parent_status'];

    $abba_display_session = $_POST['abba_display_session'];

    $abba_display_term = $_POST['abba_display_term'];

    $record_per_page_check = intval($_POST['record_per_page']);

    if (is_numeric($record_per_page_check)) 
    {
        $record_per_page = intval($_POST['record_per_page']);

    } 
    else {
        $record_per_page = 12;

    }

    if (is_numeric($_POST["page"])) 
    {
        $page = intval($_POST["page"]);

    } 
    else {
        $page = 1;

    }


    $start_from = ($page - 1)*$record_per_page;
    
    if($abba_instituion_id == '' || $abba_instituion_id == '0' || $abba_instituion_id == 0 || $abba_instituion_id == 'undefined' || $abba_instituion_id == 'NULL')
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
    }
    else
    {
    
        $abba_sql_parent = ("SELECT DISTINCT parent.ParentID,ParentFirstName,ParentMiddleName,ParentLastName,userlogin.UserRegNumberOrUsername, student.CampusID,parent.ParentEmail,parent.ParentMainPhoneNumber,parent.ParentWhatsappNumber,parent.ParentPhoto
        FROM `parent`
        INNER JOIN userlogin ON parent.ParentID=userlogin.UserID AND parent.InstitutionID=userlogin.InstitutionIDOrCampusID
        LEFT JOIN student ON parent.ParentID=student.ParentID
        LEFT JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
        LEFT JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
        WHERE parent.InstitutionID=$abba_instituion_id AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.StudentTypeBoardingOrDay='$abba_display_parent_type' OR $abba_display_parent_type IS NULL) AND (userlogin.InstitutionIDOrCampusID=$abba_instituion_id OR $abba_instituion_id IS NULL) AND userlogin.UserType='parent' AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND ParentTrashStatus = 0 ORDER BY ParentLastName ASC LIMIT $start_from, $record_per_page");
        $abba_result_parent = mysqli_query($link, $abba_sql_parent);
        $abba_row_parent = mysqli_fetch_assoc($abba_result_parent);
        $abba_row_cnt_parent = mysqli_num_rows($abba_result_parent);
        
        if($abba_row_cnt_parent > 0)
        {
            echo '<div class="row g-4 mt-1 parent_maincard selectBox-cont">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-check" style="margin-left: 20px;">
                        <input class="form-check-input" style="font-size: 20px;" type="checkbox" id="abba_select_all_parent">
                        <label for="abba_select_all_parent" class="mt-1">Select All</label> <span id="abba_parent_total_selected" style="color:orangered;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#abba_parent_staticBackdrop"></span>
                    </div>
                </div>';
    
                do{
    
                    $abba_get_parent_id = $abba_row_parent['ParentID'];
    
                    $abba_get_campus = $abba_row_parent['CampusID'];
    
                    $abba_get_parent_image = $abba_row_parent['ParentPhoto'];
    
                    if($abba_get_parent_image === '' || $abba_get_parent_image === 0)
                    {
                        $abba_get_parent_image_final = '../../assets/images/adminImg/default-img.png';
                    }
                    else
                    {
                        $abba_get_parent_image_final = $abba_get_parent_image;
                    }
    
                    $abba_get_parent_name = '<b>'.$abba_row_parent['ParentLastName'].'</b>, '.substr($abba_row_parent['ParentMiddleName'], 0, 1).'. '.$abba_row_parent['ParentFirstName'];
    
                    $abba_get_parent_name_string_length = strlen($abba_get_parent_name);
    
                    if($abba_get_parent_name_string_length > 23)
                    {
                        $abba_get_parent_name_shortened_or_not = substr($abba_get_parent_name, 0, 23).'..';
                    }
                    else
                    {
                        $abba_get_parent_name_shortened_or_not = $abba_get_parent_name;
                    }
    
                    $abba_get_parent_email = (empty($abba_row_student['ParentEmail'])) ? null : strtolower($abba_row_student['ParentEmail']);
    
                    if($abba_get_parent_email == 0 || $abba_get_parent_email == '')
                    {
                        $abba_get_parent_email_shortened_or_not = 'Nil';
                    }
                    else
                    {
    
                        $abba_get_parent_email_string_length = strlen($abba_get_parent_email);
    
                        if($abba_get_parent_email_string_length > 23)
                        {
                            $abba_get_parent_email_shortened_or_not = substr($abba_get_parent_email, 0, 23).'..';
                        }
                        else
                        {
                            $abba_get_parent_email_shortened_or_not = $abba_get_parent_email;
                        }
                    }
    
                    $abba_get_parent_whats_app_number = $abba_row_parent['ParentWhatsappNumber'];
    
                    $abba_get_parent_main_number = $abba_row_parent['ParentMainPhoneNumber'];
    
                    if($abba_get_parent_whats_app_number == 0 || $abba_get_parent_whats_app_number == '')
                    {
                        if($abba_get_parent_main_number == 0 || $abba_get_parent_main_number == '')
                        {
                            $abba_get_parent_phone_number = '<i class="fas fa-phone"></i> Nil';
                        }
                        else
                        {
                            $abba_get_parent_phone_number = '<a href="tel:'.$abba_get_parent_main_number.'" target="_blank" style="text-decoration:none;"><i class="fas fa-phone"></i> '.$abba_get_parent_main_number.'</a>';
                        }
                    }
                    else
                    {
                        $abba_get_parent_phone_number = '<a href="https://wa.me/'.$abba_get_parent_main_number.'" target="_blank" style="text-decoration:none;"><i class="fab fa-whatsapp"></i> '.$abba_get_parent_whats_app_number.'</a>';
    
                    }
    
                    $abba_sql_cnt_kids = ("SELECT *
                    FROM `student`
                    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
                    WHERE (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND StudentTrashStatus = 0 AND ParentID = $abba_get_parent_id");
                    $abba_result_cnt_kids = mysqli_query($link, $abba_sql_cnt_kids);
                    $abba_row_cnt_kids = mysqli_fetch_assoc($abba_result_cnt_kids);
                    $abba_row_cnt_cnt_kids = mysqli_num_rows($abba_result_cnt_kids);
                    
                    if($abba_display_parent_status  == 'NULL')
                    {
                        $abba_sql_status = ("SELECT * FROM `deactivateuser` WHERE UserID = '$abba_get_parent_id' AND UserType = 'parent' AND InstitutionIDOrCampusID = '$abba_instituion_id'");
                        $abba_result_status = mysqli_query($link, $abba_sql_status);
                        $abba_row_status = mysqli_fetch_assoc($abba_result_status); 
                        $abba_row_cnt_status = mysqli_num_rows($abba_result_status);
    
                        if($abba_row_cnt_status < 1)
                        {
                            $abba_status_class = 'chiActive';
                            $abba_status_text = 'Active';
    
                            $abba_parent_selected_stat_one = '2';
                            
                        }
                        else
                        {
                            $abba_status_class = 'chiBlock';
                            $abba_status_text = 'Blocked';
    
                            $abba_parent_selected_stat_one = '1';
                        }
                        
                        echo '<div class="col-sm-3 col-md-6 col-lg-3 parent_carditems card_search_get_parent parent_delete_'.$abba_get_parent_id.'">
                            <div class="topSecCards" style="width: 100%; ">
                                <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                    <input class="form-check-input abba_parent_checkbox" style="font-size: 20px;" name="abba_get_multi_parent_id" type="checkbox" value="'.$abba_get_parent_id.'" id="md_checkbox_parent_'.$abba_get_parent_id.'" data-parent_cardid="parent_delete_'.$abba_get_parent_id.'">
                                </div>
    
                                <span  style="float: right;margin-bottom:3px;">
                                    <div class="dropdown dropdown-sm">
                                        <span  class="" role="button" id="dropdownMenuLinkparent'.$abba_get_parent_id.'" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; margin-top: -28px; margin-right: 15px;">
                                            <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                        </span>
                                    
                                        <ul class="dropdown-menu shadow abba-parent-dropdown" aria-labelledby="dropdownMenuLinkparent'.$abba_get_parent_id.'" style="background: #f7fff7;border:none;">
                                            <li>
                                                <a href="../parent-profile/?id='.$abba_get_parent_id.'" data-id="'.$abba_get_parent_id.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"> <i class="fa fa-eye text-primary" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> View Profile</i> </a>
                                            </li>
    
                                            <li>
                                                <a href="../parent-profile/?id='.$abba_get_parent_id.'" data-id="'.$abba_get_parent_id.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"> <i class="fas fa-pencil-alt text-warning" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Edit Profile</i> </a>
                                            </li>
    
                                            <li>
                                                <a  data-id="'.$abba_get_parent_id.'" data-checkbox="md_checkbox_parent_'.$abba_get_parent_id.'" class="dropdown-item abba_delete_single_parent"  data-bs-toggle="modal" data-bs-target="#abba_parent_staticBackdrop"> <i class="fas fa-trash-alt text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Delete Parent</i> </a>
                                            <li>
                                        </ul>
    
                                    </div>
                                </span>
    
                                <span style="float: right;" id="abba_parent_stat_span'.$abba_get_parent_id.'">
                                    <button type="button" class="btn '.$abba_status_class.' abba_change_parent_status" id="parent'.$abba_get_parent_id.'" data-id="'.$abba_get_parent_id.'" data-status="'.$abba_parent_selected_stat_one.'" data-span="abba_parent_stat_span'.$abba_get_parent_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$abba_status_text.'</button>
                                </span>
    
                                <div align="center" style="margin-top: 30px;">
                                    <label for="abba_insert_parent_image" style="cursor:pointer;">
                                        <img class="parent'.$abba_get_parent_id.'" id="abba_get_parent_image" data-id="'.$abba_get_parent_id.'" data-inst="'.$abba_instituion_id.'" data-imgclass="parent'.$abba_get_parent_id.'" src="'.$abba_get_parent_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                        <input type="file" style="display:none;" class="abba_update_parent_image" name="abba_insert_parent_image" id="abba_insert_parent_image" accept="image/*">
                                    </label>
                                    
                                    <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_parent_name_shortened_or_not.'<span class="abba_tooltiptext parent_full_name">'.$abba_get_parent_name.'</span></h6>
                                    <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_parent['UserRegNumberOrUsername'].'</p>
                                </div>
                                <div style="padding: 7px;">
                                    <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                        <div class="row">
                                            <div align="center" class="col-6">
                                                <div style=" padding-top: 10px;" data-bs-toggle="modal" data-bs-target="#abba_parent_kids" data-id="'.$abba_get_parent_id.'" data-span="get_kids_num'.$abba_get_parent_id.'" data-camp="'.$abba_get_campus.'">
                                                    <Small style="color: #8d8d8d; font-size: 11px;">My Kids</Small><br>
                                                    <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"><span class="get_kids_num'.$abba_get_parent_id.'">'.$abba_row_cnt_cnt_kids.'</span> <i class="fa fa-eye"></i></p>
                                                </div>
                                            </div>
                                            <div align="center" class="col-6">
                                                <div style=" padding-top: 10px;">
                                                    <Small style="color: #8d8d8d; font-size: 11px;">Fee Balance</Small><br>
                                                    <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"> 100,000<span class="abba_tooltiptext">100,000</span></p>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div style="padding: 5px; margin-left: 10px;">
                                            <Small class="abba_tooltip" style="color: #666666; font-size: 12px;"><i class="bx bx-envelope"></i>
                                                '.$abba_get_parent_email_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_parent_email.'</span></Small>
                                            <p style="color: #666666; font-size: 12px; font-weight: 600;"> '.$abba_get_parent_phone_number.'</p>
    
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>';
                        
                    }
                    else
                    {
                        if($abba_display_parent_status  == '1')
                        {
                            $abba_sql_status = ("SELECT * FROM `deactivateuser` WHERE UserID = '$abba_get_parent_id' AND UserType = 'parent' AND InstitutionIDOrCampusID = '$abba_instituion_id'");
                            $abba_result_status = mysqli_query($link, $abba_sql_status);
                            $abba_row_status = mysqli_fetch_assoc($abba_result_status); 
                            $abba_row_cnt_status = mysqli_num_rows($abba_result_status);
    
                            if($abba_row_cnt_status < 1)
                            {
                                $abba_status_class = 'chiActive';
                                $abba_status_text = 'Active';
    
                                $abba_parent_selected_stat_one = '2';
                                
                            }
                            else
                            {
                                $abba_status_class = 'chiBlock';
                                $abba_status_text = 'Blocked';
    
                                $abba_parent_selected_stat_one = '1';
                            }
                            
                            echo '<div class="col-sm-3 col-md-6 col-lg-3 parent_carditems card_search_get parent_delete_'.$abba_get_parent_id.'">
                                <div class="topSecCards" style="width: 100%; ">
                                    <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                        <input class="form-check-input abba_parent_checkbox" style="font-size: 20px;" name="abba_get_multi_parent_id" type="checkbox" value="'.$abba_get_parent_id.'" id="md_checkbox_parent_'.$abba_get_parent_id.'" data-parent_cardid="parent_delete_'.$abba_get_parent_id.'">
                                    </div>
    
                                    <span  style="float: right;margin-bottom:3px;">
                                        <div class="dropdown dropdown-sm">
                                            <span  class="" role="button" id="dropdownMenuLinkparent'.$abba_get_parent_id.'" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; margin-top: -28px; margin-right: 15px;">
                                                <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                            </span>
                                        
                                            <ul class="dropdown-menu shadow abba-parent-dropdown" aria-labelledby="dropdownMenuLinkparent'.$abba_get_parent_id.'" style="background: #f7fff7;border:none;">
                                                <li>
                                                    <a href="../parent-profile/?id='.$abba_get_parent_id.'" data-id="'.$abba_get_parent_id.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"> <i class="fa fa-eye text-primary" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> View Profile</i> </a>
                                                </li>
    
                                                <li>
                                                    <a href="../parent-profile/?id='.$abba_get_parent_id.'" data-id="'.$abba_get_parent_id.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"> <i class="fas fa-pencil-alt text-warning" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Edit Profile</i> </a>
                                                </li>
    
                                                <li>
                                                    <a  data-id="'.$abba_get_parent_id.'" data-checkbox="md_checkbox_parent_'.$abba_get_parent_id.'" class="dropdown-item abba_delete_single_parent"  data-bs-toggle="modal" data-bs-target="#abba_parent_staticBackdrop"> <i class="fas fa-trash-alt text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Delete Parent</i> </a>
                                                <li>
                                            </ul>
    
                                        </div>
                                    </span>
    
                                    <span style="float: right;" id="abba_parent_stat_span'.$abba_get_parent_id.'">
                                        <button type="button" class="btn '.$abba_status_class.' abba_change_parent_status" id="parent'.$abba_get_parent_id.'" data-id="'.$abba_get_parent_id.'" data-status="'.$abba_parent_selected_stat_one.'" data-span="abba_parent_stat_span'.$abba_get_parent_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$abba_status_text.'</button>
                                    </span>
    
                                    <div align="center" style="margin-top: 30px;">
                                        <label for="abba_insert_parent_image" style="cursor:pointer;">
                                            <img class="parent'.$abba_get_parent_id.'" id="abba_get_parent_image" data-id="'.$abba_get_parent_id.'" data-inst="'.$abba_instituion_id.'" data-imgclass="parent'.$abba_get_parent_id.'" src="'.$abba_get_parent_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                            <input type="file" style="display:none;" class="abba_update_parent_image" name="abba_insert_parent_image" id="abba_insert_parent_image" accept="image/*">
                                        </label>
                                        
                                        <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_parent_name_shortened_or_not.'<span class="abba_tooltiptext parent_full_name">'.$abba_get_parent_name.'</span></h6>
                                        <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_parent['UserRegNumberOrUsername'].'</p>
                                    </div>
                                    <div style="padding: 7px;">
                                        <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                            <div class="row">
                                                <div align="center" class="col-6">
                                                    <div style=" padding-top: 10px;" data-bs-toggle="modal" data-bs-target="#abba_parent_kids" data-id="'.$abba_get_parent_id.'" data-span="get_kids_num'.$abba_get_parent_id.'" data-camp="'.$abba_get_campus.'">
                                                        <Small style="color: #8d8d8d; font-size: 11px;">My Kids</Small><br>
                                                        <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"><span class="get_kids_num'.$abba_get_parent_id.'">'.$abba_row_cnt_cnt_kids.'</span> <i class="fa fa-eye"></i></p>
                                                    </div>
                                                </div>
                                                <div align="center" class="col-6">
                                                    <div style=" padding-top: 10px;">
                                                        <Small style="color: #8d8d8d; font-size: 11px;">Fee Balance</Small><br>
                                                        <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"> 100,000<span class="abba_tooltiptext">100,000</span></p>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div style="padding: 5px; margin-left: 10px;">
                                                <Small class="abba_tooltip" style="color: #666666; font-size: 12px;"><i class="bx bx-envelope"></i>
                                                    '.$abba_get_parent_email_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_parent_email.'</span></Small>
                                                <p style="color: #666666; font-size: 12px; font-weight: 600;"> '.$abba_get_parent_phone_number.'</p>
    
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>';
                        }
                        elseif($abba_display_parent_status  == '2')
                        {
                            $abba_sql_status = ("SELECT * FROM `deactivateuser` WHERE UserID = '$abba_get_parent_id' AND UserType = 'parent' AND InstitutionIDOrCampusID = '$abba_instituion_id'");
                            $abba_result_status = mysqli_query($link, $abba_sql_status);
                            $abba_row_status = mysqli_fetch_assoc($abba_result_status); 
                            $abba_row_cnt_status = mysqli_num_rows($abba_result_status);
    
                            if($abba_row_cnt_status < 1)
                            {
                                $abba_status_class = 'chiActive';
                                $abba_status_text = 'Active';
    
                                $abba_parent_selected_stat_one = '2';
                                
                            }
                            else
                            {
                                $abba_status_class = 'chiBlock';
                                $abba_status_text = 'Blocked';
    
                                $abba_parent_selected_stat_one = '1';
                            }
                            
                            echo '<div class="col-sm-3 col-md-6 col-lg-3 parent_carditems card_search_get parent_delete_'.$abba_get_parent_id.'">
                                <div class="topSecCards" style="width: 100%; ">
                                    <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                        <input class="form-check-input abba_parent_checkbox" style="font-size: 20px;" name="abba_get_multi_parent_id" type="checkbox" value="'.$abba_get_parent_id.'" id="md_checkbox_parent_'.$abba_get_parent_id.'" data-parent_cardid="parent_delete_'.$abba_get_parent_id.'">
                                    </div>
    
                                    <span  style="float: right;margin-bottom:3px;">
                                        <div class="dropdown dropdown-sm">
                                            <span  class="" role="button" id="dropdownMenuLinkparent'.$abba_get_parent_id.'" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; margin-top: -28px; margin-right: 15px;">
                                                <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                            </span>
                                        
                                            <ul class="dropdown-menu shadow abba-parent-dropdown" aria-labelledby="dropdownMenuLinkparent'.$abba_get_parent_id.'" style="background: #f7fff7;border:none;">
                                                <li>
                                                    <a href="../parent-profile/?id='.$abba_get_parent_id.'" data-id="'.$abba_get_parent_id.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"> <i class="fa fa-eye text-primary" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> View Profile</i> </a>
                                                </li>
    
                                                <li>
                                                    <a href="../parent-profile/?id='.$abba_get_parent_id.'" data-id="'.$abba_get_parent_id.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"> <i class="fas fa-pencil-alt text-warning" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Edit Profile</i> </a>
                                                </li>
    
                                                <li>
                                                    <a  data-id="'.$abba_get_parent_id.'" data-checkbox="md_checkbox_parent_'.$abba_get_parent_id.'" class="dropdown-item abba_delete_single_parent"  data-bs-toggle="modal" data-bs-target="#abba_parent_staticBackdrop"> <i class="fas fa-trash-alt text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Delete Parent</i> </a>
                                                <li>
                                            </ul>
    
                                        </div>
                                    </span>
    
                                    <span style="float: right;" id="abba_parent_stat_span'.$abba_get_parent_id.'">
                                        <button type="button" class="btn '.$abba_status_class.' abba_change_parent_status" id="parent'.$abba_get_parent_id.'" data-id="'.$abba_get_parent_id.'" data-status="'.$abba_parent_selected_stat_one.'" data-span="abba_parent_stat_span'.$abba_get_parent_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$abba_status_text.'</button>
                                    </span>
    
                                    <div align="center" style="margin-top: 30px;">
                                        <label for="abba_insert_parent_image" style="cursor:pointer;">
                                            <img class="parent'.$abba_get_parent_id.'" id="abba_get_parent_image" data-id="'.$abba_get_parent_id.'" data-inst="'.$abba_instituion_id.'" data-imgclass="parent'.$abba_get_parent_id.'" src="'.$abba_get_parent_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                            <input type="file" style="display:none;" class="abba_update_parent_image" name="abba_insert_parent_image" id="abba_insert_parent_image" accept="image/*">
                                        </label>
                                        
                                        <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_parent_name_shortened_or_not.'<span class="abba_tooltiptext parent_full_name">'.$abba_get_parent_name.'</span></h6>
                                        <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_parent['UserRegNumberOrUsername'].'</p>
                                    </div>
                                    <div style="padding: 7px;">
                                        <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                            <div class="row">
                                                <div align="center" class="col-6">
                                                    <div style=" padding-top: 10px;" data-bs-toggle="modal" data-bs-target="#abba_parent_kids" data-id="'.$abba_get_parent_id.'" data-span="get_kids_num'.$abba_get_parent_id.'" data-camp="'.$abba_get_campus.'">
                                                        <Small style="color: #8d8d8d; font-size: 11px;">My Kids</Small><br>
                                                        <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"><span class="get_kids_num'.$abba_get_parent_id.'">'.$abba_row_cnt_cnt_kids.'</span> <i class="fa fa-eye"></i></p>
                                                    </div>
                                                </div>
                                                <div align="center" class="col-6">
                                                    <div style=" padding-top: 10px;">
                                                        <Small style="color: #8d8d8d; font-size: 11px;">Fee Balance</Small><br>
                                                        <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"> 100,000<span class="abba_tooltiptext">100,000</span></p>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div style="padding: 5px; margin-left: 10px;">
                                                <Small class="abba_tooltip" style="color: #666666; font-size: 12px;"><i class="bx bx-envelope"></i>
                                                    '.$abba_get_parent_email_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_parent_email.'</span></Small>
                                                <p style="color: #666666; font-size: 12px; font-weight: 600;"> '.$abba_get_parent_phone_number.'</p>
    
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>';
                        }
                        else
                        {
                            echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
                        }
                    }
                    
            
                }while($abba_row_parent = mysqli_fetch_assoc($abba_result_parent));
    
            echo '</div>';
    
            $page_query = "SELECT DISTINCT(parent.ParentID),ParentFirstName,ParentMiddleName,ParentLastName,userlogin.UserRegNumberOrUsername, student.CampusID,parent.ParentEmail,parent.ParentMainPhoneNumber,parent.ParentWhatsappNumber,parent.ParentPhoto
            FROM `parent`
            INNER JOIN userlogin ON parent.ParentID=userlogin.UserID AND parent.InstitutionID=userlogin.InstitutionIDOrCampusID
            LEFT JOIN student ON parent.ParentID=student.ParentID
            LEFT JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
            LEFT JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
            WHERE parent.InstitutionID=$abba_instituion_id AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.StudentTypeBoardingOrDay='$abba_display_parent_type' OR $abba_display_parent_type IS NULL) AND (userlogin.InstitutionIDOrCampusID=$abba_instituion_id OR $abba_instituion_id IS NULL) AND userlogin.UserType='parent' AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND ParentTrashStatus = 0 ORDER BY ParentLastName ASC";
            $page_result = mysqli_query($link, $page_query);  
            $total_records = mysqli_num_rows($page_result);
            
            echo '<input type="hidden" value="'.$total_records.'" id="parentpagination">
            <input type="hidden" value="'.$page.'" id="currentpage">';
        }
        else
        {
            echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
        }
    }
?>