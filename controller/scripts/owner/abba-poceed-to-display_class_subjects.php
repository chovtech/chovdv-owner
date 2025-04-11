<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    

    $abba_class_id = $_POST['class_id'];

    $abba_campus_id = $_POST['abba_campus_id'];
    
    $abba_class_template_id = $_POST['abba_class_template_id'];

    $abba_sql_subjectorcourse = "SELECT * FROM courseorsubjectallocation INNER JOIN subjectorcourse ON courseorsubjectallocation.SubjectOrCourseID=subjectorcourse.SubjectOrCourseID WHERE ClassTemplateID='$abba_class_template_id' AND CampusID='$abba_campus_id' AND ClassOrDepartmentID='$abba_class_id' ORDER BY SubjectOrCourseTitle ASC";
    $abba_result_subjectorcourse = mysqli_query($link, $abba_sql_subjectorcourse);
    $abba_row_subjectorcourse = mysqli_fetch_assoc($abba_result_subjectorcourse);
    $abba_row_cnt_subjectorcourse = mysqli_num_rows($abba_result_subjectorcourse);

    echo '<div class="row">
        <div class="col-md-12">
            <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;width:120px;" class="btn btn-sm btn-primary text-light" data-bs-toggle="modal" data-bs-target="#abba_add_class_subject_template_Modal" id="display_subject_temp"> <i class="fas fa-plus-circle"> Add Subject</i></button>
        </div>
        <div class="col-md-12">
            <div class="row mt-3 all_subject_teach">
                <div class="col-12">
                    <div class="form-group abba_local-forms">
                        <label>Select to teacher to teach all subjects</label>
                        <select class="form-select abba_collect_staff_list" id="abba_teacher_for_all_subject">
                            <option value="0">Select Teacher</option>';

                            $abba_sql_staff_1 = "SELECT * FROM staff INNER JOIN campus ON staff.InstitutionID=campus.InstitutionID WHERE CampusID='$abba_campus_id' AND StaffTrashStatus = '0'";
                            $abba_result_staff_1 = mysqli_query($link, $abba_sql_staff_1);
                            $abba_row_staff_1 = mysqli_fetch_assoc($abba_result_staff_1);
                            $abba_row_cnt_staff_1 = mysqli_num_rows($abba_result_staff_1);

                            if($abba_row_cnt_staff_1 > 0)
                            {
                                do{

                                    echo '<option value="'.$abba_row_staff_1['StaffID'].'">'.$abba_row_staff_1['StaffLastName'].' '.$abba_row_staff_1['StaffFirstName'].'</option>';

                                }while($abba_row_staff_1 = mysqli_fetch_assoc($abba_result_staff_1));
                            }
                            else
                            {
                                echo '<option value="0">No Records Found</option>';
                            }
                            
                        echo '</select>
                    </div>
                </div>
            </div>
            
            <div id="sub_formtoappend">';

                if($abba_row_cnt_subjectorcourse > 0)
                {
                    
                    do{

                        $subject_id = $abba_row_subjectorcourse['SubjectOrCourseID'];

                        $subject_name = $abba_row_subjectorcourse['SubjectOrCourseTitle'];

                        $teacher_id = $abba_row_subjectorcourse['CourseOrSubjectTeacherUserID'];

                        echo '<div class="row" id="div_id_'.$subject_id.'" data-span="div_span_'.$subject_id.'">

                            <div class="col-6">
                                <div class="form-group abba_local-forms">
                                    <label>Subject</label>
                                    <input type="text" disabled class="form-control get_assign_subject_id" placeholder="Class Name" value="'.$subject_name.'" data-id="'.$subject_id.'"/> 
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-group abba_local-forms">
                                    <label>Subject Teacher</label>
                                    <select class="form-control abba_teacher_for_subject">
                                        <option value="0">Select Teacher</option>';

                                        $abba_sql_staff = "SELECT * FROM staff INNER JOIN campus ON staff.InstitutionID=campus.InstitutionID WHERE CampusID='$abba_campus_id' AND StaffTrashStatus = '0'";
                                        $abba_result_staff = mysqli_query($link, $abba_sql_staff);
                                        $abba_row_staff = mysqli_fetch_assoc($abba_result_staff);
                                        $abba_row_cnt_staff = mysqli_num_rows($abba_result_staff);

                                        if($abba_row_cnt_staff > 0)
                                        {
                                            do{
                                                
                                                if($teacher_id == $abba_row_staff['StaffID'])
                                                {
                                                    $selected = 'selected';
                                                }
                                                else
                                                {
                                                    $selected = '';
                                                }

                                                echo '<option value="'.$abba_row_staff['StaffID'].'" '.$selected.'>'.$abba_row_staff['StaffLastName'].' '.$abba_row_staff['StaffFirstName'].'</option>';

                                            }while($abba_row_staff = mysqli_fetch_assoc($abba_result_staff));
                                        }
                                        else
                                        {
                                            echo '<option value="0">No Records Found</option>';
                                        }
                                        
                                    echo '</select>
                                </div>
                            </div>

                            <div class="col-1 sub_removeappendform">
                                <i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i>
                            </div>
                        </div>';

                    }while($abba_row_subjectorcourse = mysqli_fetch_assoc($abba_result_subjectorcourse));
                }
                else
                {
                    echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">We couldn\'t find any record.</p></div>';
                }

            echo '</div>
        </div>
    </div>';
?>