<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    
    $abba_campus_id = $_POST['abba_campus_id'];

    $parent_id = $_POST['parent_id'];
    
    $parent_span = $_POST['parent_span'];

    $abba_sql_session = ("SELECT * FROM `session` WHERE sessionStatus = '1'");
    $abba_result_session = mysqli_query($link, $abba_sql_session);
    $abba_row_session = mysqli_fetch_assoc($abba_result_session);
    $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

    if ($abba_row_cnt_session > 0) 
    {
        $abba_display_session = $abba_row_session['sessionName'];
    } 
    else 
    {
        $abba_display_session = 'NIL';
    }

    $abba_sql_term = ("SELECT * FROM `termorsemester` WHERE status = '1'");
    $abba_result_term = mysqli_query($link, $abba_sql_term);
    $abba_row_term = mysqli_fetch_assoc($abba_result_term);
    $abba_row_cnt_term = mysqli_num_rows($abba_result_term);

    if($abba_row_cnt_term > 0)
    {

        $abba_display_term = $abba_row_term['TermOrSemesterID'];
        
    }
    else
    {
        $abba_display_term = 'NIL';
    }



    $abba_sql_student = "SELECT DISTINCT student.StudentID, StudentFirstName, StudentMiddleName, StudentLastName, userlogin.UserRegNumberOrUsername,
    classordepartment.ClassOrDepartmentName, student.CampusID, parent.ParentEmail, parent.ParentMainPhoneNumber, parent.ParentWhatsappNumber,
    student.PrefectID, student.StudentPhoto
    FROM student 
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
    INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    INNER JOIN userlogin ON student.StudentID=userlogin.UserID AND student.CampusID=userlogin.InstitutionIDOrCampusID
    INNER JOIN parent ON student.ParentID=parent.ParentID
    WHERE (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL)
    AND (userlogin.InstitutionIDOrCampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND userlogin.UserType='student'
    AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session'
    AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND StudentTrashStatus = 0 AND student.ParentID = '$parent_id'
    ORDER BY StudentLastName ASC";
    $abba_result_student = mysqli_query($link, $abba_sql_student);
    $abba_row_student = mysqli_fetch_assoc($abba_result_student);
    $abba_row_cnt_student = mysqli_num_rows($abba_result_student);
    
    if($abba_row_cnt_student > 0)
    {
        echo '<div class="row g-4 mt-1 maincard selectBox-cont">';

            do{

                $abba_get_student_id = $abba_row_student['StudentID'];

                $abba_get_campus = $abba_row_student['CampusID'];

                $abba_get_prefect_id = $abba_row_student['PrefectID'];

                $abba_get_student_image = $abba_row_student['StudentPhoto'];

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

                $abba_get_parent_email = strtolower($abba_row_student['ParentEmail']);

                $abba_get_parent_email_string_length = strlen($abba_get_parent_email);

                if($abba_get_parent_email == 0 || $abba_get_parent_email == '')
                {
                    $abba_get_parent_email_shortened_or_not = 'Nil';
                }
                else
                {
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
 
                    $abba_sql_status = ("SELECT * FROM `deactivateuser` WHERE UserID = '$abba_get_student_id' AND UserType = 'student' AND InstitutionIDOrCampusID = '$abba_get_campus' AND sessionName = '$abba_display_session' AND (TermOrSemesterName = $abba_display_term OR $abba_display_term IS NULL)");
                    $abba_result_status = mysqli_query($link, $abba_sql_status);
                    $abba_row_status = mysqli_fetch_assoc($abba_result_status); 
                    $abba_row_cnt_status = mysqli_num_rows($abba_result_status);

                    if($abba_row_cnt_status < 1)
                    {
                        $abba_status_class = 'chiActive';
                        $abba_status_text = 'Active';

                    }
                    else
                    {
                        $abba_get_status = $abba_row_status['Status'];

                        if($abba_get_status == '0')
                        {
                            $abba_status_class = 'chiInActive';
                            $abba_status_text = 'InActive';

                        }
                        else
                        {
                            $abba_status_class = 'chiBlock';
                            $abba_status_text = 'Blocked';

                        }
                    }
                    
                    echo '<div class="col-sm-12 col-md-12 col-lg-4 carditems card_search_get student_remove_'.$abba_get_student_id.'">
                        <div class="topSecCards" style="width: 100%; ">
                            <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                
                            </div>

                            <span  style="float: right;margin-bottom:3px;">
                                <div class="dropdown dropdown-sm">
                                    <span class="abba_student_parent" role="button" data-id="'.$abba_get_student_id.'" data-card="student_remove_'.$abba_get_student_id.'" data-span="'.$parent_span.'" style="float: right; margin-top: -28px; margin-right: 18px;">
                                        <i class="fa fa-times text-danger" style="font-size: 20px;"></i>
                                    </span>
                                </div>
                            </span>

                            <span style="float: left;margin-top:-5px;margin-left:5px;" id="abba_stud_stat_span'.$abba_get_student_id.'">
                                <div class="dropdown dropdown-sm">
                                    <button type="button" class="btn '.$abba_status_class.'" id="dropdownMenuLink'.$abba_get_student_id.'" data-bs-toggle="dropdown" aria-expanded="false"> 
                                        '.$abba_status_text.'
                                    </button>
                                </div>
                            
                            </span>

                            <div align="center" style="margin-top: 30px;">
                                <label style="cursor:pointer;">
                                    <img src="'.$abba_get_student_image_final.'" style="width: 30%; border-radius: 50%;" alt="">
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
                                </div>
                            </div>

                        </div>
                    </div>';
                    
            }while($abba_row_student = mysqli_fetch_assoc($abba_result_student));

        echo '</div>';

    }
    else
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
    }
?>