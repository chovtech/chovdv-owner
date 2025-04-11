<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];
    
    $abba_display_result_class = $_POST['abba_display_result_class'];
    
    $abba_display_session = $_POST['abba_display_session'];
    
    $abba_result_display_term = $_POST['abba_result_display_term'];
    
    $abba_get_instituion_id = $_POST['abba_get_instituion_id'];
    
    $abba_result_type = $_POST['abba_result_type'];

    $usertype = $_POST['usertype'];
    
    
    $abba_sql_student = "SELECT DISTINCT student.StudentID, StudentFirstName, StudentMiddleName, StudentLastName, userlogin.UserRegNumberOrUsername, student.CampusID, parent.ParentEmail, parent.ParentMainPhoneNumber, parent.ParentWhatsappNumber,
    student.StudentPhoto 
    FROM student 
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID 
    INNER JOIN userlogin ON student.StudentID=userlogin.UserID AND student.CampusID=userlogin.InstitutionIDOrCampusID 
    LEFT JOIN parent ON student.ParentID=parent.ParentID 
    WHERE student.CampusID=$abba_campus_id AND userlogin.InstitutionIDOrCampusID=$abba_campus_id AND userlogin.UserType='student' AND classordepartmentstudentallocation.CampusID=$abba_campus_id AND classordepartmentstudentallocation.Session='$abba_display_session' AND classordepartmentstudentallocation.ClassOrDepartmentID='$abba_display_result_class' AND StudentTrashStatus = 0 ORDER BY StudentLastName ASC";
    $abba_result_student = mysqli_query($link, $abba_sql_student);
    $abba_row_student = mysqli_fetch_assoc($abba_result_student);
    $abba_row_cnt_student = mysqli_num_rows($abba_result_student);
    
    if($abba_row_cnt_student > 0)
    {
        
        echo '<div class="row g-4 mt-1 maincard selectBox-cont">';

            do{

                $abba_get_student_id = $abba_row_student['StudentID'];

                $abba_get_campus = $abba_row_student['CampusID'];

                $abba_get_student_image = $abba_row_student['StudentPhoto'];

                if($abba_get_student_image === '' || $abba_get_student_image === 0)
                {
                    $abba_get_student_image_final = '../../assets/images/adminImg/default-img.png';
                }
                else
                {
                    $abba_get_student_image_final = $abba_get_student_image;
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

                $abba_sql_status = ("SELECT deactivateuser.Status FROM `deactivateuser` WHERE UserID = '$abba_get_student_id' AND UserType = 'student' AND InstitutionIDOrCampusID = '$abba_get_campus' AND sessionName = '$abba_display_session' AND (TermOrSemesterName = $abba_result_display_term OR TermOrSemesterName = '')");
                $abba_result_status = mysqli_query($link, $abba_sql_status);
                $abba_row_status = mysqli_fetch_assoc($abba_result_status);
                $abba_row_cnt_status = mysqli_num_rows($abba_result_status);

                if($abba_row_cnt_status < 1)
                {
                    echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get student_delete_'.$abba_get_student_id.'">
                        <div class="topSecCards" style="width: 100%; ">
                            
                            <div align="center" style="margin-top: 18px;">
                                <label style="cursor:pointer;">
                                    <img class="student'.$abba_get_student_id.'" data-studimgclass="student'.$abba_get_student_id.'" id="abba_get_student_image" data-id="'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" src="'.$abba_get_student_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                    <input type="hidden" style="display:none;" class="abba_update_student_image" name="abba_insert_student_image" accept="image/*">
                                </label>
                                
                                <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_student_name_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_student_name.'</span></h6>
                                <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_student['UserRegNumberOrUsername'].'</p>
                            </div>
                            <div style="padding: 7px;" align="center">
                                <button class="btn btn-sm bg-primary text-light rounded-3 mt-1 british_modal_id" type="button" align="right" data-stud="'.$abba_get_student_id.'" data-camp="'.$abba_get_campus.'" data-session="'.$abba_display_session.'" data-term="'.$abba_result_display_term.'" data-resulttype="'.$abba_result_type.'" data-class="'.$abba_display_result_class.'" data-inst="'.$abba_get_instituion_id.'" data-bs-toggle="modal" data-bs-target="#britishModal"><i class="fas fa-pen"> Enter Result</i></button>
                            </div>
                        </div>
                    </div>';
                }
                else
                {
                    
                }

                    
            }while($abba_row_student = mysqli_fetch_assoc($abba_result_student));

        echo '</div>';
    }
    else
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
    }
    
?>