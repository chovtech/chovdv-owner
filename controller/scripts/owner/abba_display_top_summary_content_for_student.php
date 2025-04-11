<?php

    include('../../config/config.php');
    
    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_section_id = $_POST['abba_section_id'];

    $abba_display_class = $_POST['abba_display_class'];

    $abba_display_student_type = $_POST['abba_display_student_type'];

    $abba_display_session = $_POST['abba_display_session'];

    $abba_display_term = $_POST['abba_display_term'];

    $abba_display_student_status = $_POST['abba_display_student_status'];


    // get inactive students
    $abba_sql_inactive = ("SELECT COUNT(DISTINCT(student.StudentID)) AS totalstud FROM `campus`
    INNER JOIN student ON campus.CampusID=student.CampusID
    INNER JOIN deactivateuser ON student.StudentID=deactivateuser.UserID AND deactivateuser.UserType = 'student'
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID
    INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND StudentTrashStatus = 0 AND deactivateuser.sessionName = '$abba_display_session' AND (deactivateuser.TermOrSemesterName = $abba_display_term OR $abba_display_term IS NULL) AND deactivateuser.Status = 0");
    $abba_result_inactive = mysqli_query($link, $abba_sql_inactive);
    $abba_row_inactive = mysqli_fetch_assoc($abba_result_inactive);
    $abba_row_cnt_inactive = mysqli_num_rows($abba_result_inactive);

    if($abba_row_inactive['totalstud'] == 0 || $abba_row_inactive['totalstud'] == NULL || $abba_row_inactive['totalstud'] == '')
    {
        $abba_get_total_inactive_student = 0;
    }
    else
    {
        $abba_get_total_inactive_student = $abba_row_inactive['totalstud'];
    }


    // get blocked students
    $abba_sql_blocked = ("SELECT COUNT(DISTINCT(student.StudentID)) AS totalstud FROM `campus`
    INNER JOIN student ON campus.CampusID=student.CampusID
    INNER JOIN deactivateuser ON student.StudentID=deactivateuser.UserID AND deactivateuser.UserType = 'student'
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID
    INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND StudentTrashStatus = 0 AND deactivateuser.sessionName = '$abba_display_session' AND (deactivateuser.TermOrSemesterName = $abba_display_term OR $abba_display_term IS NULL) AND deactivateuser.Status = 2");
    $abba_result_blocked = mysqli_query($link, $abba_sql_blocked);
    $abba_row_blocked = mysqli_fetch_assoc($abba_result_blocked);
    $abba_row_cnt_blocked = mysqli_num_rows($abba_result_blocked);

    if($abba_row_blocked['totalstud'] == 0 || $abba_row_blocked['totalstud'] == NULL || $abba_row_blocked['totalstud'] == '')
    {
        $abba_get_total_blocked_student = 0;
    }
    else
    {
        $abba_get_total_blocked_student = $abba_row_blocked['totalstud'];
    }


    // get total students
    $abba_sql_student = ("SELECT COUNT(DISTINCT(student.StudentID)) AS totalstud FROM `campus`
    INNER JOIN student ON campus.CampusID=student.CampusID
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID
    INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND StudentTrashStatus = 0");
    $abba_result_student = mysqli_query($link, $abba_sql_student);
    $abba_row_student = mysqli_fetch_assoc($abba_result_student);
    $abba_row_cnt_student = mysqli_num_rows($abba_result_student);

    if($abba_row_student['totalstud'] == 0 || $abba_row_student['totalstud'] == NULL || $abba_row_student['totalstud'] == '')
    {
        $abba_get_total_active_student = 0;

        $abba_get_total_student = $abba_row_student['totalstud'];
    }
    else
    {
        $abba_get_total_active_student = $abba_row_student['totalstud'] - $abba_get_total_inactive_student - $abba_get_total_blocked_student;

        $abba_get_total_student = $abba_row_student['totalstud'];
    }


    // get male students
    $abba_sql_male_student = ("SELECT COUNT(DISTINCT(student.StudentID)) AS totalstud FROM `campus`
    INNER JOIN student ON campus.CampusID=student.CampusID
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID
    INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND StudentTrashStatus = 0 AND student.StudentGender = 'Male'");
    $abba_result_male_student = mysqli_query($link, $abba_sql_male_student);
    $abba_row_male_student = mysqli_fetch_assoc($abba_result_male_student);
    $abba_row_cnt_male_student = mysqli_num_rows($abba_result_male_student);

    if($abba_row_male_student['totalstud'] == 0 || $abba_row_male_student['totalstud'] == NULL || $abba_row_male_student['totalstud'] == '')
    {
        $abba_get_total_male_student = 0;
    }
    else
    {
        $abba_get_total_male_student = $abba_row_male_student['totalstud'];
    }



    // get female students
    $abba_sql_female_student = ("SELECT COUNT(DISTINCT(student.StudentID)) AS totalstud FROM `campus`
    INNER JOIN student ON campus.CampusID=student.CampusID
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID
    INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND StudentTrashStatus = 0 AND student.StudentGender = 'Female'");
    $abba_result_female_student = mysqli_query($link, $abba_sql_female_student);
    $abba_row_female_student = mysqli_fetch_assoc($abba_result_female_student);
    $abba_row_cnt_female_student = mysqli_num_rows($abba_result_female_student);

    if($abba_row_female_student['totalstud'] == 0 || $abba_row_female_student['totalstud'] == NULL || $abba_row_female_student['totalstud'] == '')
    {
        $abba_get_total_female_student = 0;
    }
    else
    {
        $abba_get_total_female_student = $abba_row_female_student['totalstud'];
    }




    // get Day students
    $abba_sql_day_student = ("SELECT COUNT(DISTINCT(student.StudentID)) AS totalstud FROM `campus`
    INNER JOIN student ON campus.CampusID=student.CampusID
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID
    INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND StudentTrashStatus = 0 AND student.StudentTypeBoardingOrDay = 'Day'");
    $abba_result_day_student = mysqli_query($link, $abba_sql_day_student);
    $abba_row_day_student = mysqli_fetch_assoc($abba_result_day_student);
    $abba_row_cnt_day_student = mysqli_num_rows($abba_result_day_student);

    if($abba_row_day_student['totalstud'] == 0 || $abba_row_day_student['totalstud'] == NULL || $abba_row_day_student['totalstud'] == '')
    {
        $abba_get_total_day_student = 0;
    }
    else
    {
        $abba_get_total_day_student = $abba_row_day_student['totalstud'];
    }



    // get boarding students
    $abba_sql_boarding_student = ("SELECT COUNT(DISTINCT(student.StudentID)) AS totalstud FROM `campus`
    INNER JOIN student ON campus.CampusID=student.CampusID
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID
    INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND StudentTrashStatus = 0 AND student.StudentTypeBoardingOrDay = 'Boarding'");
    $abba_result_boarding_student = mysqli_query($link, $abba_sql_boarding_student);
    $abba_row_boarding_student = mysqli_fetch_assoc($abba_result_boarding_student);
    $abba_row_cnt_boarding_student = mysqli_num_rows($abba_result_boarding_student);

    if($abba_row_boarding_student['totalstud'] == 0 || $abba_row_boarding_student['totalstud'] == NULL || $abba_row_boarding_student['totalstud'] == '')
    {
        $abba_get_total_boarding_student = 0;
    }
    else
    {
        $abba_get_total_boarding_student = $abba_row_boarding_student['totalstud'];
    }

?>

    <div class="col-sm-3 col-md-6 col-lg-3">

        <div class="topSecCards" style="width: 100%; height: 120px;">
            <div style="border: 2px solid #0066FF; height: 100%; border-radius: 8px; padding: 10px;">
                <div align="center" style="font-size: 60px; color: #0066FF;">
                    <i class="fa fa-child" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-md-6 col-lg-3">

        <div class="topSecCards" style="width: 100%; height: 120px;">
            <div class="abba_student_card">
                <div class="row g-2" style="margin-top: 0px;">
                    <div class="col-6" style="padding-top: 15px;">
                        <h6 style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">Total Students</h6>
                        <p></p>
                        <h4 style="margin-left: 10px; color: #ffffff;"><?php echo number_format($abba_get_total_student); ?></h4>
                    </div>
                    <div class="col-6" style="padding-top: 0px;">
                        <div style="margin-right: 0px;">
                            <p style="font-size: 10.5px; color: #98ff7e;">
                                <span style="color: white;"><?php echo number_format($abba_get_total_active_student); ?></span> <br> Active Students
                            </p>

                            <p style="font-size: 10.5px; margin-top: -10px; color: lightgrey;">
                                <span style="color: white;"><?php echo number_format($abba_get_total_inactive_student); ?></span> <br>InActive Students
                            </p>

                            <p style="font-size: 10.5px; color: #FFC600; margin-top: -10px;">
                                <span style="color: white;"><?php echo number_format($abba_get_total_blocked_student);?></span><br> Blocked Students
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3 col-md-6 col-lg-3">

        <div class="topSecCards" style="width: 100%; height: 120px;">
            <div class="row">
                <div class="col-7">
                    <div class="card" style="border: none; margin-top: 10px; background: #f7fff7; border-radius: 20px;">
                        <div class="card-body">
                            <div class="text-center">
                                <input data-plugin="knob" data-width="70" data-height="70" data-linecap=round
                                    data-fgColor="#0066FF" value="<?php echo $abba_get_total_male_student + $abba_get_total_female_student; ?>" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">

                    <h6 style="color: #666666; margin-top: 25px; font-size: 15px;"><?php echo number_format($abba_get_total_male_student);?></h6>
                    <h6 style="font-size: 12px; font-weight: 400; color: #057ff1;">Male</h6>
                    <h6 style="color: #666666; font-size: 15px;"><?php echo number_format($abba_get_total_female_student);?></h6>
                    <h6 style="font-size: 12px; font-weight: 400; color: #b4030c;">Female</h6>
                </div>
            </div>
        </div>

    </div>


    <div class="col-sm-3 col-md-6 col-lg-3">
        <div class="topSecCards" style="width: 100%; height: 120px;">
            <div class="row">
                <div class="col-6">
                    <div class="card" style="border: none; margin-top: 10px; background: #f7fff7; border-radius: 20px;">
                        <div class="card-body">
                            <div class="text-center">
                                <input data-plugin="knob" data-width="70" data-height="70" data-linecap=round
                                    data-fgColor="#3ceb71" value="<?php echo $abba_get_total_day_student + $abba_get_total_boarding_student; ?>" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h6 style="color: #666666; margin-top: 15px; font-size: 15px;"><?php echo number_format($abba_get_total_day_student); ?></h6>
                    <h6 style="font-size: 12px; font-weight: 400; color: #057ff1;">Day Students</h6>
                    <h6 style="color: #666666; font-size: 15px;"><?php echo number_format($abba_get_total_boarding_student); ?></h6>
                    <h6 style="font-size: 12px; font-weight: 400; color: #b4030c;">Boarding Students</h6>
                </div>
            </div>
        </div>
    </div>