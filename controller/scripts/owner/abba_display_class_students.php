<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_get_instituion_id = $_POST['abba_get_instituion_id'];

    $abba_display_result_class = $_POST['abba_display_result_class'];
    $abba_display_session = $_POST['abba_display_session'];
    $abba_result_display_term = $_POST['abba_result_display_term'];
    $abba_display_result_subject = $_POST['abba_display_result_subject'];
    
    $btnclicked = $_POST['btnclicked'];

    echo '<input type="hidden" id="sessionAddToSheet" value="' . $abba_display_session . '">
        <input type="hidden" id="termAddToSheet" value="' . $abba_result_display_term . '">
        <input type="hidden" id="classAddToSheet" value="' . $abba_display_result_class . '">
        <input type="hidden" id="subjectAddToSheet" value="' . $abba_display_result_subject . '">';

    $sqlGetStudent = "SELECT * FROM `classordepartmentstudentallocation` INNER JOIN student ON student.StudentID=classordepartmentstudentallocation.StudentID WHERE classordepartmentstudentallocation.Session='$abba_display_session' AND classordepartmentstudentallocation.ClassOrDepartmentID ='$abba_display_result_class' ORDER BY StudentLastName ASC";
    $queryGetStudent = mysqli_query($link, $sqlGetStudent);
    $rowGetStudent = mysqli_fetch_assoc($queryGetStudent);
    $countGetStudent = mysqli_num_rows($queryGetStudent);

    if ($countGetStudent > 0) {
        echo '<fieldset class="abba_stud_checkbox-group">';
            echo '<legend class="abba_stud_checkbox-group-legend fs-6">Choose Student(s)</legend>
                    <div class="abba_stud_checkbox m-3">
                    <label class="abba_stud_checkbox-wrapper" for="StudentToSheet_id_selectall">
                        <input type="checkbox" class="abba_stud_checkbox-input StudentToSheet_id_selectall" id="StudentToSheet_id_selectall"/>
                        <span class="abba_stud_checkbox-tile">
                            <span class="abba_stud_checkbox-label p-2 fw-bold">Select All <br><small class="text-primary abba_sheet_student_total_selected"></small></span>
                        </span>
                    </label>
                </div>';

            do {
                $StudentID = $rowGetStudent['StudentID'];

                $sqlGetStudentReg = "SELECT * FROM `userlogin` WHERE userlogin.UserType='student' AND UserID='$StudentID' AND userlogin.InstitutionIDOrCampusID='$abba_campus_id'";
                $queryGetStudentReg = mysqli_query($link, $sqlGetStudentReg);
                $rowGetStudentReg = mysqli_fetch_assoc($queryGetStudentReg);

                $UserRegNumberOrUsername = $rowGetStudentReg['UserRegNumberOrUsername'];

                $fullname = $rowGetStudent['StudentLastName'] . ' ' . $rowGetStudent['StudentFirstName'];

                if($btnclicked == 1)
                {
                    $sqlGetScoreSheet_check = "SELECT * FROM `score` WHERE CampusID = '$abba_campus_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term' AND StudentID='$StudentID'";
                    $queryGetScoreSheet_check = mysqli_query($link, $sqlGetScoreSheet_check);
                    $rowGetScoreSheet_check = mysqli_fetch_assoc($queryGetScoreSheet_check);
                    $countGetScoreSheet_check = mysqli_num_rows($queryGetScoreSheet_check);
    
                }
                elseif($btnclicked == 2){
                    $sqlGetScoreSheet_check = "SELECT * FROM `psychomotortraits` WHERE StudentID='$StudentID' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term' AND CampusID='$abba_campus_id'";
                    $queryGetScoreSheet_check = mysqli_query($link, $sqlGetScoreSheet_check);
                    $rowGetScoreSheet_check = mysqli_fetch_assoc($queryGetScoreSheet_check);
                    $countGetScoreSheet_check = mysqli_num_rows($queryGetScoreSheet_check);
                }
                else{
                    $sqlGetScoreSheet_check = "SELECT * FROM `affectivetraits` WHERE StudentID='$StudentID' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term' AND CampusID='$abba_campus_id'";
                    $queryGetScoreSheet_check = mysqli_query($link, $sqlGetScoreSheet_check);
                    $rowGetScoreSheet_check = mysqli_fetch_assoc($queryGetScoreSheet_check);
                    $countGetScoreSheet_check = mysqli_num_rows($queryGetScoreSheet_check);
                    
                }
                
                if($countGetScoreSheet_check > 0)
                {
                    $checked = 'checked';
                }
                else{
                    $checked = '';
                }
                
                if($rowGetStudent['StudentPhoto'] === 0 || $rowGetStudent['StudentPhoto'] === NULL || $rowGetStudent['StudentPhoto'] === '')
                {
                    $stud_img = '../../assets/images/adminImg/default-img.png';
                }
                else{
                    $stud_img = $rowGetStudent['StudentPhoto'];
                }

                echo '<div class="abba_stud_checkbox m-3">
                    <label class="abba_stud_checkbox-wrapper" for="StudentToSheet_id_' . $rowGetStudent['StudentID'] . '">
                        <input type="checkbox" '.$checked.' class="abba_stud_checkbox-input bg-secondary studentAddToScoreSheet" id="StudentToSheet_id_' . $rowGetStudent['StudentID'] . '" name="" value="' . $rowGetStudent['StudentID'] . '"/>
                        <span class="abba_stud_checkbox-tile">
                            <span class="abba_stud_checkbox-icon">
                                <img src="'.$stud_img.'" width="40" style="border-radius:50px;"/>
                            </span>
                            <span class="abba_stud_checkbox-label p-2">' . $fullname . '</span>
                        </span>
                    </label>
                </div>';
            } while ($rowGetStudent = mysqli_fetch_assoc($queryGetStudent));

        echo '</fieldset>';

    } 
    else 
    {
        echo '<div class="alert alert-warning alert-rounded"> <i class="ti-info"></i>' . 'Opps! Seem like no student has been allocated to this class yet.</div>';
    }
?>