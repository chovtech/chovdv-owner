<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    
    $abba_class_id = $_POST['abba_class_id'];

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_sql_student = "SELECT * FROM student INNER JOIN classordepartmentstudentallocation ON student.StudentID = classordepartmentstudentallocation.StudentID WHERE student.CampusID='$abba_campus_id' AND classordepartmentstudentallocation.CampusID='$abba_campus_id' AND (ClassOrDepartmentID = $abba_class_id OR $abba_class_id IS NULL)";
    $abba_result_student = mysqli_query($link, $abba_sql_student);
    $abba_row_student = mysqli_fetch_assoc($abba_result_student);
    $abba_row_cnt_student = mysqli_num_rows($abba_result_student);

    if($abba_row_cnt_student > 0)
    {
        echo '<div class="card mt-5 card-scrollable">
            <div class="card-header">
                <b>Select Students </b>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="search-container">
                        <input type="text" class="search-input form-control form-control-sm abba_stud_assign_search" placeholder="Search Student"><i class="fas fa-search search-icon"></i>
                    </div>
                </li>';

                echo '<div class="stud_assign_selectBox-cont">';
            
                    do{

                        $student_id = $abba_row_student['StudentID'];

                        $abba_sql_student_check = "SELECT * FROM student WHERE StudentID='$student_id' AND CampusID='$abba_campus_id' AND ParentID != 0";
                        $abba_result_student_check = mysqli_query($link, $abba_sql_student_check);
                        $abba_row_student_check = mysqli_fetch_assoc($abba_result_student_check);
                        $abba_row_cnt_student_check = mysqli_num_rows($abba_result_student_check);

                        if($abba_row_cnt_student_check > 0)
                        {
                            $disable = 'disabled';
                            $text = '<span style="color:green;">(Assigned)</span>';
                        }
                        else{
                            $disable = '';
                            $text = '';
                        }

                        echo '<li class="list-group-item stud_assign_card_search_get">
                            <input class="form-check-input" type="checkbox" '.$disable.' name="assigned_student" id="stud'.$abba_row_student['StudentID'].'" value="'.$abba_row_student['StudentID'].'">
                            <label class="form-check-label" for="stud'.$abba_row_student['StudentID'].'">'.$abba_row_student['StudentLastName'].' '.substr($abba_row_student['StudentMiddleName'], 0, 1).'. '.$abba_row_student['StudentFirstName'].' '.$text.'
                        </li>';

                    }while($abba_row_student = mysqli_fetch_assoc($abba_result_student));
                echo '</div>
            </ul>
        </div>';
    }
    else
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">We couldn\'t find any record.</p></div>';
    }

?>