<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    
    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_section_id = $_POST['abba_section_id'];

    $abba_display_class = $_POST['abba_display_class'];

    $abba_display_student_type = $_POST['abba_display_student_type'];

    $abba_display_student_status = $_POST['abba_display_student_status'];

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

    if($abba_display_student_type == 'NULL')
    {

        $stud_type = "(student.StudentTypeBoardingOrDay=NULL OR NULL IS NULL)";

    }
    else{
        $stud_type = "student.StudentTypeBoardingOrDay='$abba_display_student_type'";
    }
    
    if($abba_instituion_id == '' || $abba_instituion_id == '0' || $abba_instituion_id == 0 || $abba_instituion_id == 'undefined' || $abba_instituion_id == 'NULL')
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';

    }
    else
    {

        $abba_sql_student = "SELECT DISTINCT student.StudentID, StudentFirstName, StudentMiddleName, StudentLastName, userlogin.UserRegNumberOrUsername, userlogin.UserType, classordepartment.ClassOrDepartmentName, campus.CampusID, parent.ParentEmail, parent.ParentMainPhoneNumber, parent.ParentWhatsappNumber, student.PrefectID, student.StudentPhoto
        FROM `campus`
        INNER JOIN student ON campus.CampusID=student.CampusID
        INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
        INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
        INNER JOIN userlogin ON student.StudentID=userlogin.UserID AND student.CampusID=userlogin.InstitutionIDOrCampusID
        LEFT JOIN parent ON student.ParentID=parent.ParentID
        WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL)
        AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND $stud_type
        AND (userlogin.InstitutionIDOrCampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND userlogin.UserType='student'
        AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session'
        AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL)
        AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND StudentTrashStatus = 0
        ORDER BY StudentLastName ASC LIMIT $start_from, $record_per_page";
        $abba_result_student = mysqli_query($link, $abba_sql_student);
        $abba_row_student = mysqli_fetch_assoc($abba_result_student);
        $abba_row_cnt_student = mysqli_num_rows($abba_result_student);
        
        if($abba_row_cnt_student > 0)
        {
            echo '<div class="row g-4 mt-1 maincard selectBox-cont">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-check" style="margin-left: 20px;">
                        <input class="form-check-input" style="font-size: 20px;" type="checkbox" id="abba_select_all_students">
                        <label for="abba_select_all_students" class="mt-1">Select All</label> <span id="abba_student_total_selected" style="color:orangered;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></span><span id="abba_student_total_selected_for_promote" class="abba_promote_pre_btn" data-type="multiple" style="color:#14A44D;cursor:pointer;"></span>
                    </div>
                </div>';
                
                $cnt = 1;
    
                do{
    
                    $abba_get_student_id = $abba_row_student['StudentID'];
    
                    $abba_get_campus = $abba_row_student['CampusID'];
    
                    $abba_get_prefect_id = $abba_row_student['PrefectID'];
    
                    $abba_get_student_image = $abba_row_student['StudentPhoto'];
    
                    $abba_get_student_usertype = $abba_row_student['UserType'];
                    
                    $abba_sql_campus = ("SELECT * FROM `campus` INNER JOIN institution ON campus.InstitutionID = institution.InstitutionID WHERE campus.CampusID = '$abba_get_campus' AND CampusID = '$abba_get_campus'");
                    $abba_result_campus = mysqli_query($link, $abba_sql_campus);
                    $abba_row_campus = mysqli_fetch_assoc($abba_result_campus); 
                    $abba_row_cnt_campus = mysqli_num_rows($abba_result_campus);
    
                    if($abba_row_cnt_campus > 0)
                    {
                        $abba_student_campus_url = $abba_row_campus['CustomUrl'];
                    }
                    else
                    {
                        $abba_student_campus_url = 'Nil';
                    }
    
                    if($abba_get_student_image === '' || $abba_get_student_image === 0)
                    {
                        $abba_get_student_image_final = '../../assets/images/adminImg/default-img.png';
                    }
                    else
                    {
                        $abba_get_student_image_final = $abba_get_student_image;
                    }
    
                    $abba_get_class = $abba_row_student['ClassOrDepartmentName'];
    
                    $abba_get_class_string_length = strlen($abba_get_class);
    
                    if($abba_get_class_string_length > 9)
                    {
                        $abba_get_class_shortened_or_not = substr($abba_get_class, 0, 9).'..';
                    }
                    else
                    {
                        $abba_get_class_shortened_or_not = $abba_get_class;
                    }
    
                    $abba_get_student_name = '<b>'.$abba_row_student['StudentLastName'].'</b>, '.substr($abba_row_student['StudentMiddleName'], 0, 1).'. '.$abba_row_student['StudentFirstName'];
    
                    $abba_get_student_name_string_length = strlen($abba_get_student_name);
    
                    if($abba_get_student_name_string_length > 23)
                    {
                        $abba_get_student_name_shortened_or_not = substr($abba_get_student_name, 0, 23).'..';
                    }
                    else
                    {
                        $abba_get_student_name_shortened_or_not = $abba_get_student_name;
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
    
                    $abba_get_parent_whats_app_number = $abba_row_student['ParentWhatsappNumber'];
    
                    $abba_get_parent_main_number = $abba_row_student['ParentMainPhoneNumber'];
    
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
    
    
                    if($abba_get_prefect_id == '' || $abba_get_prefect_id == NULL || $abba_get_prefect_id == 0)
                    {
                        $abba_student_prefect_position = 'Nil';
                    }
                    else
                    {
                        $abba_sql_prefect = ("SELECT * FROM `prefect` WHERE PrefectID = '$abba_get_prefect_id' AND CampusID = '$abba_get_campus'");
                        $abba_result_prefect = mysqli_query($link, $abba_sql_prefect);
                        $abba_row_prefect = mysqli_fetch_assoc($abba_result_prefect); 
                        $abba_row_cnt_prefect = mysqli_num_rows($abba_result_prefect);
        
                        if($abba_row_cnt_prefect > 0)
                        {
                            $abba_student_prefect_position = $abba_row_prefect['PrefectName'];
                        }
                        else
                        {
                            $abba_student_prefect_position = 'Nil';
                        }
                    }
    
                    $abba_get_prefect_position_string_length = strlen($abba_student_prefect_position);
    
                    if($abba_get_prefect_position_string_length > 10)
                    {
                        $abba_get_prefect_position_shortened_or_not = substr($abba_student_prefect_position, 0, 10).'..';
                    }
                    else
                    {
                        $abba_get_prefect_position_shortened_or_not = $abba_student_prefect_position;
                    }
                    
                    // Plain text to encrypt
                    $plain_text = 'id=' . $abba_get_student_id . '&camp=' . $abba_get_campus . '&usertype=' . $abba_get_student_usertype . '&whoid=2&whotype=admin';
            
                    // Secret key (32 bytes for AES-256, adjust as per the encryption algorithm)
                    $secret_key = "16-character-secret"; // Replace with your secure secret key
            
                    // Encryption algorithm and mode (AES-256 CBC)
                    $encryption_algo = "AES-256-CBC";
            
                    // Initialization vector (IV) - random bytes for each encryption
                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($encryption_algo));
            
                    // Perform encryption
                    $encrypted_data = openssl_encrypt($plain_text, $encryption_algo, $secret_key, OPENSSL_RAW_DATA, $iv);
            
                    // Combine IV and cipher text for storage/transfer
                    $encrypted_message = base64_encode($iv . $encrypted_data);
            
                    // Create the URL with the encrypted data and encryption algorithm
                    $encoded_message = urlencode($encrypted_message);
                    $encrypted_url = 'https://'.$abba_student_campus_url."/student/profile/?const=" . $encoded_message;
                    
                    
                    if($abba_display_student_status  == 'NULL')
                    {
                        $cnt++;
    
                        $abba_sql_status = ("SELECT * FROM `deactivateuser` WHERE UserID = '$abba_get_student_id' AND UserType = 'student' AND InstitutionIDOrCampusID = '$abba_get_campus' AND sessionName = '$abba_display_session' AND (TermOrSemesterName = $abba_display_term OR $abba_display_term IS NULL)");
                        $abba_result_status = mysqli_query($link, $abba_sql_status);
                        $abba_row_status = mysqli_fetch_assoc($abba_result_status); 
                        $abba_row_cnt_status = mysqli_num_rows($abba_result_status);
    
                        if($abba_row_cnt_status < 1)
                        {
                            $abba_status_class = 'chiActive';
                            $abba_status_text = 'Active';
    
                            $abba_other_status_select_one = '<i class="fa fa-minus-circle text-secondary" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Deactivate</i>';
    
                            $abba_other_status_select_two = '<i class="fas fa-ban text-danger" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"> Block</i>';
    
                            $abba_student_selected_stat_one = '0';
    
                            $abba_student_selected_stat_two = '2';
                            
                        }
                        else
                        {
                            $abba_get_status = $abba_row_status['Status'];
    
                            if($abba_get_status == '0')
                            {
                                $abba_status_class = 'chiInActive';
                                $abba_status_text = 'InActive';
    
                                
                                $abba_other_status_select_one = '<i class="fa fa-toggle-on text-success" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Activate</i>';
    
                                $abba_other_status_select_two = '<i class="fas fa-ban text-danger" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"> Block</i>';
    
                                $abba_student_selected_stat_one = '1';
    
                                $abba_student_selected_stat_two = '2';
                                
                            }
                            else
                            {
                                $abba_status_class = 'chiBlock';
                                $abba_status_text = 'Blocked';
    
                                $abba_other_status_select_one = '<i class="fa fa-toggle-on text-success" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Activate</i>';
    
                                $abba_other_status_select_two = '<i class="fa fa-minus-circle text-secondary" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Deactivate</i>';
    
                                $abba_student_selected_stat_one = '1';
    
                                $abba_student_selected_stat_two = '0';
                                
                            }
                        }
                        
                        echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get student_delete_'.$abba_get_student_id.'">
                            <div class="topSecCards" style="width: 100%; ">
                                <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                    <input class="form-check-input abba_student_checkbox" style="font-size: 20px;" name="abba_get_multi_student_id" type="checkbox" value="'.$abba_get_student_id.'" id="md_checkbox_Student_'.$abba_get_student_id.'" data-studcardid="student_delete_'.$abba_get_student_id.'">
                                </div>
    
                                <span  style="float: right;margin-bottom:3px;">
                                    <div class="dropdown dropdown-sm">
                                        <span  class="" role="button" id="dropdownMenuLink'.$abba_get_student_id.'" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; margin-top: -28px; margin-right: 15px;">
                                            <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                        </span>
                                    
                                        <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_get_student_id.'" style="background: #f7fff7;border:none;">
                                            <li>
                                                <a href="'.$encrypted_url.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"  data-toggle="tooltip"> <i class="fa fa-eye text-primary" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> View Profile</i> </a>
                                            </li>
    
                                            <li>
                                                <a href="'.$encrypted_url.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"  data-toggle="tooltip"> <i class="fas fa-pencil-alt text-warning" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Edit Profile</i> </a>
                                            </li>
    
                                            <li>
                                                <a  data-id="'.$abba_get_student_id.'" data-checkbox="md_checkbox_Student_'.$abba_get_student_id.'" class="dropdown-item abba_promote_pre_btn" data-type="single"> <i class="fas fa-trophy" style="cursor:pointer;font-size:13px;color:#14A44D;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Promote Student</i> </a>
                                            <li>
    
                                            <li>
                                                <a  data-id="'.$abba_get_student_id.'" data-checkbox="md_checkbox_Student_'.$abba_get_student_id.'" class="dropdown-item abba_delete_single_student" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fas fa-trash-alt text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Delete Student</i> </a>
                                            <li>
                                        </ul>
    
                                    </div>
                                </span>
    
                                <span style="float: right;margin-top:-5px;" id="abba_stud_stat_span'.$abba_get_student_id.'">
                                    <div class="dropdown dropdown-sm">
                                        <button type="button" class="btn '.$abba_status_class.'" id="dropdownMenuLink'.$abba_get_student_id.'" data-bs-toggle="dropdown" aria-expanded="false"> 
                                            <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$abba_status_text.'
                                        </button>
                                        
                                        <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_get_student_id.'" style="background: #f7fff7;border:none;">
                                            <li>
                                                <a type="button" data-id="'.$abba_get_student_id.'" data-status="'.$abba_student_selected_stat_one.'" data-span="abba_stud_stat_span'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" class="dropdown-item abba_change_student_status"> '.$abba_other_status_select_one.' </a>
                                            </li>
    
                                            <li>
                                                <a type="button" data-id="'.$abba_get_student_id.'" data-status="'.$abba_student_selected_stat_two.'" data-span="abba_stud_stat_span'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" class="dropdown-item abba_change_student_status"> '.$abba_other_status_select_two.' </a>
                                            </li>
    
                                        </ul>
                                    </div>
                                
                                </span>
    
                                <div align="center" style="margin-top: 30px;">
                                    <label for="abba_insert_student_image" style="cursor:pointer;">
                                        <img class="student'.$abba_get_student_id.'" data-studimgclass="student'.$abba_get_student_id.'" id="abba_get_student_image" data-id="'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" src="'.$abba_get_student_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                        <input type="file" style="display:none;" class="abba_update_student_image" name="abba_insert_student_image" id="abba_insert_student_image" accept="image/*">
                                    </label>
                                    
                                    <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_student_name_shortened_or_not.'<span class="abba_tooltiptext student_full_name">'.$abba_get_student_name.'</span></h6>
                                    <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_student['UserRegNumberOrUsername'].'</p>
                                </div>
                                <div style="padding: 7px;">
                                    <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                        <div class="row">
                                            <div align="center" class="col-6">
                                                <div style=" padding-top: 10px;">
                                                    <Small style="color: #8d8d8d; font-size: 11px;">Current Class</Small><br>
                                                    <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;">'.$abba_get_class_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_class.'</span></p>
                                                </div>
                                            </div>
                                            <div align="center" class="col-6">
                                                <div style=" padding-top: 10px;">
                                                    <Small style="color: #8d8d8d; font-size: 11px;">School Prefect</Small><br>
                                                    <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"> '.$abba_get_prefect_position_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_student_prefect_position.'</span></p>
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
                        if($abba_display_student_status  == '1')
                        {
                            
                            $abba_sql_status = ("SELECT * FROM `deactivateuser` WHERE UserID = '$abba_get_student_id' AND UserType = 'student' AND InstitutionIDOrCampusID = '$abba_get_campus' AND sessionName = '$abba_display_session' AND (TermOrSemesterName = $abba_display_term OR $abba_display_term IS NULL)");
                            $abba_result_status = mysqli_query($link, $abba_sql_status);
                            $abba_row_status = mysqli_fetch_assoc($abba_result_status); 
                            $abba_row_cnt_status = mysqli_num_rows($abba_result_status);
    
                            if($abba_row_cnt_status < 1)
                            {
                                $cnt++;
                        
                                $abba_status_class = 'chiActive';
                                $abba_status_text = 'Active';
    
                                $abba_other_status_select_one = '<i class="fa fa-minus-circle text-secondary" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Deactivate</i>';
    
                                $abba_other_status_select_two = '<i class="fas fa-ban text-danger" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"> Block</i>';
        
                                $abba_student_selected_stat_one = '0';
        
                                $abba_student_selected_stat_two = '2';
                                
                                echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get student_delete_'.$abba_get_student_id.'">
                                    <div class="topSecCards" style="width: 100%; ">
                                        <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                            <input class="form-check-input abba_student_checkbox" style="font-size: 20px;" name="abba_get_multi_student_id" type="checkbox" value="'.$abba_get_student_id.'" id="md_checkbox_Student_'.$abba_get_student_id.'" data-studcardid="student_delete_'.$abba_get_student_id.'">
                                        </div>
    
                                        <span  style="float: right;margin-bottom:3px;">
                                            <div class="dropdown dropdown-sm">
                                                <span  class="" role="button" id="dropdownMenuLink'.$abba_get_student_id.'" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; margin-top: -28px; margin-right: 15px;">
                                                    <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                </span>
                                            
                                                <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_get_student_id.'" style="background: #f7fff7;border:none;">
                                                    <li>
                                                        <a href="'.$encrypted_url.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"  data-toggle="tooltip"> <i class="fa fa-eye text-primary" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> View Profile</i> </a>
                                                    </li>
            
                                                    <li>
                                                        <a href="'.$encrypted_url.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"  data-toggle="tooltip"> <i class="fas fa-pencil-alt text-warning" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Edit Profile</i> </a>
                                                    </li>
    
                                                    <li>
                                                        <a  data-id="'.$abba_get_student_id.'" data-checkbox="md_checkbox_Student_'.$abba_get_student_id.'" class="dropdown-item abba_promote_pre_btn" data-type="single"> <i class="fas fa-trophy" style="cursor:pointer;font-size:13px;color:#14A44D;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Promote Student</i> </a>
                                                    <li>
    
                                                    <li>
                                                        <a  data-id="'.$abba_get_student_id.'" data-checkbox="md_checkbox_Student_'.$abba_get_student_id.'" class="dropdown-item abba_delete_single_student" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fas fa-trash-alt text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Delete Student</i> </a>
                                                    <li>
                                                </ul>
    
                                            </div>
                                        </span>
    
                                        <span style="float: right;margin-top:-5px;" id="abba_stud_stat_span'.$abba_get_student_id.'">
                                            <div class="dropdown dropdown-sm">
                                                <button type="button" class="btn '.$abba_status_class.'" id="dropdownMenuLink'.$abba_get_student_id.'" data-bs-toggle="dropdown" aria-expanded="false"> 
                                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$abba_status_text.'
                                                </button>
                                                
                                                <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_get_student_id.'" style="background: #f7fff7;border:none;">
                                                    <li>
                                                        <a type="button" data-id="'.$abba_get_student_id.'" data-status="'.$abba_student_selected_stat_one.'" data-span="abba_stud_stat_span'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" class="dropdown-item abba_change_student_status"> '.$abba_other_status_select_one.' </a>
                                                    </li>
    
                                                    <li>
                                                        <a type="button" data-id="'.$abba_get_student_id.'" data-status="'.$abba_student_selected_stat_two.'" data-span="abba_stud_stat_span'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" class="dropdown-item abba_change_student_status"> '.$abba_other_status_select_two.' </a>
                                                    </li>
    
                                                </ul>
                                            </div>
                                        
                                        </span>
    
                                        <div align="center" style="margin-top: 30px;">
                                            <label for="abba_insert_student_image" style="cursor:pointer;">
                                                <img class="student'.$abba_get_student_id.'" data-studimgclass="student'.$abba_get_student_id.'" id="abba_get_student_image" data-id="'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" src="'.$abba_get_student_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                                <input type="file" style="display:none;" class="abba_update_student_image" name="abba_insert_student_image" id="abba_insert_student_image" accept="image/*">
                                            </label>
                                            
                                            <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_student_name_shortened_or_not.'<span class="abba_tooltiptext student_full_name">'.$abba_get_student_name.'</span></h6>
                                            <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_student['UserRegNumberOrUsername'].'</p>
                                        </div>
                                        <div style="padding: 7px;">
                                            <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                                <div class="row">
                                                    <div align="center" class="col-6">
                                                        <div style=" padding-top: 10px;">
                                                            <Small style="color: #8d8d8d; font-size: 11px;">Current Class</Small><br>
                                                            <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;">'.$abba_get_class_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_class.'</span></p>
                                                        </div>
                                                    </div>
                                                    <div align="center" class="col-6">
                                                        <div style=" padding-top: 10px;">
                                                            <Small style="color: #8d8d8d; font-size: 11px;">School Prefect</Small><br>
                                                            <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"> '.$abba_get_prefect_position_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_student_prefect_position.'</span></p>
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
                                
                            }
                        }
                        elseif($abba_display_student_status  == '2')
                        {
    
                            $abba_sql_status = ("SELECT * FROM `deactivateuser` WHERE UserID = '$abba_get_student_id' AND UserType = 'student' AND InstitutionIDOrCampusID = '$abba_get_campus' AND Status = '2' AND sessionName = '$abba_display_session' AND (TermOrSemesterName = $abba_display_term OR $abba_display_term IS NULL)");
                            $abba_result_status = mysqli_query($link, $abba_sql_status);
                            $abba_row_status = mysqli_fetch_assoc($abba_result_status); 
                            $abba_row_cnt_status = mysqli_num_rows($abba_result_status);
    
                            if($abba_row_cnt_status > 0)
                            {
    
                                $cnt++;
                        
                                $abba_status_class = 'chiBlock';
                                $abba_status_text = 'Blocked';
    
                                $abba_other_status_select_one = '<i class="fa fa-toggle-on text-success" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Activate</i>';
    
                                $abba_other_status_select_two = '<i class="fas fa-ban text-danger" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"> Block</i>';
    
                                $abba_student_selected_stat_one = '1';
    
                                $abba_student_selected_stat_two = '2';
                                
                                echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get student_delete_'.$abba_get_student_id.'">
                                    <div class="topSecCards" style="width: 100%; ">
                                        <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                            <input class="form-check-input abba_student_checkbox" style="font-size: 20px;" name="abba_get_multi_student_id" type="checkbox" value="'.$abba_get_student_id.'" id="md_checkbox_Student_'.$abba_get_student_id.'" data-studcardid="student_delete_'.$abba_get_student_id.'">
                                        </div>
    
                                        <span  style="float: right;margin-bottom:3px;">
                                            <div class="dropdown dropdown-sm">
                                                <span  class="" role="button" id="dropdownMenuLink'.$abba_get_student_id.'" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; margin-top: -28px; margin-right: 15px;">
                                                    <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                </span>
                                            
                                                <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_get_student_id.'" style="background: #f7fff7;border:none;">
                                                    <li>
                                                        <a href="'.$encrypted_url.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"  data-toggle="tooltip"> <i class="fa fa-eye text-primary" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> View Profile</i> </a>
                                                    </li>
            
                                                    <li>
                                                        <a href="'.$encrypted_url.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"  data-toggle="tooltip"> <i class="fas fa-pencil-alt text-warning" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Edit Profile</i> </a>
                                                    </li>
    
                                                    <li>
                                                        <a  data-id="'.$abba_get_student_id.'" data-checkbox="md_checkbox_Student_'.$abba_get_student_id.'" class="dropdown-item abba_promote_pre_btn" data-type="single"> <i class="fas fa-trophy" style="cursor:pointer;font-size:13px;color:#14A44D;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Promote Student</i> </a>
                                                    <li>
    
                                                    <li>
                                                        <a  data-id="'.$abba_get_student_id.'" data-checkbox="md_checkbox_Student_'.$abba_get_student_id.'" class="dropdown-item abba_delete_single_student" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fas fa-trash-alt text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Delete Student</i> </a>
                                                    <li>
                                                </ul>
    
                                            </div>
                                        </span>
    
                                        <span style="float: right;margin-top:-5px;" id="abba_stud_stat_span'.$abba_get_student_id.'">
                                            <div class="dropdown dropdown-sm">
                                                <button type="button" class="btn '.$abba_status_class.'" id="dropdownMenuLink'.$abba_get_student_id.'" data-bs-toggle="dropdown" aria-expanded="false"> 
                                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$abba_status_text.'
                                                </button>
                                                
                                                <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_get_student_id.'" style="background: #f7fff7;border:none;">
                                                    <li>
                                                        <a type="button" data-id="'.$abba_get_student_id.'" data-status="'.$abba_student_selected_stat_one.'" data-span="abba_stud_stat_span'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" class="dropdown-item abba_change_student_status"> '.$abba_other_status_select_one.' </a>
                                                    </li>
    
                                                    <li>
                                                        <a type="button" data-id="'.$abba_get_student_id.'" data-status="'.$abba_student_selected_stat_two.'" data-span="abba_stud_stat_span'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" class="dropdown-item abba_change_student_status"> '.$abba_other_status_select_two.' </a>
                                                    </li>
    
                                                </ul>
                                            </div>
                                        
                                        </span>
    
                                        <div align="center" style="margin-top: 30px;">
                                            <label for="abba_insert_student_image" style="cursor:pointer;">
                                                <img class="student'.$abba_get_student_id.'" data-studimgclass="student'.$abba_get_student_id.'" id="abba_get_student_image" data-id="'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" src="'.$abba_get_student_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                                <input type="file" style="display:none;" class="abba_update_student_image" name="abba_insert_student_image" id="abba_insert_student_image" accept="image/*">
                                            </label>
                                            
                                            <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_student_name_shortened_or_not.'<span class="abba_tooltiptext student_full_name">'.$abba_get_student_name.'</span></h6>
                                            <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_student['UserRegNumberOrUsername'].'</p>
                                        </div>
                                        <div style="padding: 7px;">
                                            <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                                <div class="row">
                                                    <div align="center" class="col-6">
                                                        <div style=" padding-top: 10px;">
                                                            <Small style="color: #8d8d8d; font-size: 11px;">Current Class</Small><br>
                                                            <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;">'.$abba_get_class_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_class.'</span></p>
                                                        </div>
                                                    </div>
                                                    <div align="center" class="col-6">
                                                        <div style=" padding-top: 10px;">
                                                            <Small style="color: #8d8d8d; font-size: 11px;">School Prefect</Small><br>
                                                            <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"> '.$abba_get_prefect_position_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_student_prefect_position.'</span></p>
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
                                
                            }
                        }
                        elseif($abba_display_student_status  == '0')
                        {
    
                            $abba_sql_status = ("SELECT * FROM `deactivateuser` WHERE UserID = '$abba_get_student_id' AND UserType = 'student' AND InstitutionIDOrCampusID = '$abba_get_campus' AND Status = '0' AND sessionName = '$abba_display_session' AND (TermOrSemesterName = $abba_display_term OR $abba_display_term IS NULL)");
                            $abba_result_status = mysqli_query($link, $abba_sql_status);
                            $abba_row_status = mysqli_fetch_assoc($abba_result_status); 
                            $abba_row_cnt_status = mysqli_num_rows($abba_result_status);
    
                            if($abba_row_cnt_status > 0)
                            {
    
                                $cnt++;
                        
                                $abba_status_class = 'chiInActive';
                                $abba_status_text = 'InActive';
    
                                $abba_other_status_select_one = '<i class="fa fa-toggle-on text-success" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Activate</i>';
    
                                $abba_other_status_select_two = '<i class="fas fa-ban text-danger" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"> Block</i>';
    
                                $abba_student_selected_stat_one = '1';
    
                                $abba_student_selected_stat_two = '2';
    
                                echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get student_delete_'.$abba_get_student_id.'">
                                    <div class="topSecCards" style="width: 100%; ">
                                        <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                            <input class="form-check-input abba_student_checkbox" style="font-size: 20px;" name="abba_get_multi_student_id" type="checkbox" value="'.$abba_get_student_id.'" id="md_checkbox_Student_'.$abba_get_student_id.'" data-studcardid="student_delete_'.$abba_get_student_id.'">
                                        </div>
    
                                        <span  style="float: right;margin-bottom:3px;">
                                            <div class="dropdown dropdown-sm">
                                                <span  class="" role="button" id="dropdownMenuLink'.$abba_get_student_id.'" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; margin-top: -28px; margin-right: 15px;">
                                                    <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                </span>
                                            
                                                <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_get_student_id.'" style="background: #f7fff7;border:none;">
                                                    <li>
                                                        <a href="'.$encrypted_url.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"  data-toggle="tooltip"> <i class="fa fa-eye text-primary" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> View Profile</i> </a>
                                                    </li>
            
                                                    <li>
                                                        <a href="'.$encrypted_url.'" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item"  data-toggle="tooltip"> <i class="fas fa-pencil-alt text-warning" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Edit Profile</i> </a>
                                                    </li>
    
                                                    <li>
                                                        <a data-id="'.$abba_get_student_id.'" data-checkbox="md_checkbox_Student_'.$abba_get_student_id.'" class="dropdown-item abba_promote_pre_btn" data-type="single"> <i class="fas fa-trophy" style="cursor:pointer;font-size:13px;color:#14A44D;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Promote Student</i> </a>
                                                    <li>
    
                                                    <li>
                                                        <a  data-id="'.$abba_get_student_id.'" data-checkbox="md_checkbox_Student_'.$abba_get_student_id.'" class="dropdown-item abba_delete_single_student" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fas fa-trash-alt text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Delete Student</i> </a>
                                                    <li>
                                                </ul>
    
                                            </div>
                                        </span>
    
                                        <span style="float: right;margin-top:-5px;" id="abba_stud_stat_span'.$abba_get_student_id.'">
                                            <div class="dropdown dropdown-sm">
                                                <button type="button" class="btn '.$abba_status_class.'" id="dropdownMenuLink'.$abba_get_student_id.'" data-bs-toggle="dropdown" aria-expanded="false"> 
                                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$abba_status_text.'
                                                </button>
                                                
                                                <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_get_student_id.'" style="background: #f7fff7;border:none;">
                                                    <li>
                                                        <a type="button" data-id="'.$abba_get_student_id.'" data-status="'.$abba_student_selected_stat_one.'" data-span="abba_stud_stat_span'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" class="dropdown-item abba_change_student_status"> '.$abba_other_status_select_one.' </a>
                                                    </li>
    
                                                    <li>
                                                        <a type="button" data-id="'.$abba_get_student_id.'" data-status="'.$abba_student_selected_stat_two.'" data-span="abba_stud_stat_span'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" class="dropdown-item abba_change_student_status"> '.$abba_other_status_select_two.' </a>
                                                    </li>
    
                                                </ul>
                                            </div>
                                        
                                        </span>
    
                                        <div align="center" style="margin-top: 30px;">
                                            <label for="abba_insert_student_image" style="cursor:pointer;">
                                                <img class="student'.$abba_get_student_id.'" data-studimgclass="student'.$abba_get_student_id.'" id="abba_get_student_image" data-id="'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" src="'.$abba_get_student_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                                <input type="file" style="display:none;" class="abba_update_student_image" name="abba_insert_student_image" id="abba_insert_student_image" accept="image/*">
                                            </label>
                                            
                                            <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_student_name_shortened_or_not.'<span class="abba_tooltiptext student_full_name">'.$abba_get_student_name.'</span></h6>
                                            <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_student['UserRegNumberOrUsername'].'</p>
                                        </div>
                                        <div style="padding: 7px;">
                                            <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                                <div class="row">
                                                    <div align="center" class="col-6">
                                                        <div style=" padding-top: 10px;">
                                                            <Small style="color: #8d8d8d; font-size: 11px;">Current Class</Small><br>
                                                            <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;">'.$abba_get_class_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_class.'</span></p>
                                                        </div>
                                                    </div>
                                                    <div align="center" class="col-6">
                                                        <div style=" padding-top: 10px;">
                                                            <Small style="color: #8d8d8d; font-size: 11px;">School Prefect</Small><br>
                                                            <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;"> '.$abba_get_prefect_position_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_student_prefect_position.'</span></p>
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
                                
                            }
                        }
                        else
                        {
                            
                        }
                    }
                    
            
                }while($abba_row_student = mysqli_fetch_assoc($abba_result_student));
    
            echo '</div>';
    
            $page_query = "SELECT DISTINCT student.StudentID, StudentFirstName, StudentMiddleName, StudentLastName, userlogin.UserRegNumberOrUsername,
            classordepartment.ClassOrDepartmentName, campus.CampusID, parent.ParentEmail, parent.ParentMainPhoneNumber, parent.ParentWhatsappNumber,
            student.PrefectID, student.StudentPhoto
            FROM `campus`
            INNER JOIN student ON campus.CampusID=student.CampusID
            INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
            INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
            INNER JOIN userlogin ON student.StudentID=userlogin.UserID AND student.CampusID=userlogin.InstitutionIDOrCampusID
            LEFT JOIN parent ON student.ParentID=parent.ParentID
            WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL)
            AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND $stud_type
            AND (userlogin.InstitutionIDOrCampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND userlogin.UserType='student'
            AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session'
            AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL)
            AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND StudentTrashStatus = 0
            ORDER BY StudentLastName ASC";
            $page_result = mysqli_query($link, $page_query);  
            $total_records = mysqli_num_rows($page_result);
            
            echo '<input type="hidden" value="'.$total_records.'" id="studentpagination">
            <input type="hidden" value="'.$page.'" id="currentpage">';
        }
        else
        {
            echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
        }
    }

?>