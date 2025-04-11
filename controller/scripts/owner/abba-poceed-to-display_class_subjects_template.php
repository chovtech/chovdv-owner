<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    

    $abba_class_id = $_POST['class_id'];

    $abba_campus_id = $_POST['abba_campus_id'];
    
    $abba_class_template_id = $_POST['abba_class_template_id'];

    $abba_sql_subjectorcourse = "SELECT * FROM subjectorcourse WHERE ClassTemplateID='$abba_class_template_id' ORDER BY SubjectOrCourseTitle ASC";
    $abba_result_subjectorcourse = mysqli_query($link, $abba_sql_subjectorcourse);
    $abba_row_subjectorcourse = mysqli_fetch_assoc($abba_result_subjectorcourse);
    $abba_row_cnt_subjectorcourse = mysqli_num_rows($abba_result_subjectorcourse);

    if($abba_row_cnt_subjectorcourse > 0)
    {
        echo '<div class="card card-scrollable">
            <div class="card-header">
                <small>Kindly select the subjects you would like to add to the class</small>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="search-container">
                        <input type="text" class="search-input form-control form-control-sm abba_subject_assign_search" placeholder="Search Subject"><i class="fas fa-search search-icon"></i>
                    </div>
                </li>';

                echo '<div class="subject_assign_selectBox-cont">
                    <li class="list-group-item">
                        <input class="form-check-input" type="checkbox" id="abba_select_all_subject_template" value="ProcToaddSubjects">
                        <label class="form-check-label" for="abba_select_all_subject_template">Select All
                    </li>';
                    
                    do{

                        $subject_id = $abba_row_subjectorcourse['SubjectOrCourseID'];

                        $subject_name = $abba_row_subjectorcourse['SubjectOrCourseTitle'];

                        $abba_sql_subjectorcourse_checker = "SELECT * FROM courseorsubjectallocation INNER JOIN subjectorcourse ON courseorsubjectallocation.SubjectOrCourseID=subjectorcourse.SubjectOrCourseID WHERE ClassTemplateID='$abba_class_template_id' AND CampusID='$abba_campus_id' AND ClassOrDepartmentID='$abba_class_id' AND courseorsubjectallocation.SubjectOrCourseID='$subject_id'";
                        $abba_result_subjectorcourse_checker = mysqli_query($link, $abba_sql_subjectorcourse_checker);
                        $abba_row_subjectorcourse_checker = mysqli_fetch_assoc($abba_result_subjectorcourse_checker);
                        $abba_row_cnt_subjectorcourse_checker = mysqli_num_rows($abba_result_subjectorcourse_checker);

                        if($abba_row_cnt_subjectorcourse_checker > 0)
                        {
                            $disabled = 'disabled';
                            $text = '<span class="text-success div_span_'.$subject_id.'">(Already Added)</span>';
                        }
                        else{
                            $disabled = '';
                            $text = '';
                        }

                        echo '<li class="list-group-item subject_assign_card_search_get">
                            <input class="form-check-input ProcToaddSubjects" '.$disabled.' type="checkbox" name="assigned_subject" id="sub'.$subject_id.'" value="'.$subject_name.'" data-id="'.$subject_id.'" data-div="div_id_'.$subject_id.'">
                            <label class="form-check-label" for="sub'.$subject_id.'">'.$subject_name.' '.$text.'
                        </li>';


                    }while($abba_row_subjectorcourse = mysqli_fetch_assoc($abba_result_subjectorcourse));
                echo '</div>
            </ul>
        </div>';
    }
    else
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">We couldn\'t find any record.</p></div>';
    }

?>