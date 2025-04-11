<?php

    include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_section_id = $_POST['abba_section_id'];

    $abba_display_class = $_POST['abba_display_class'];

    $abba_display_student_type = $_POST['abba_display_type'];

    $abba_display_session = $_POST['abba_display_session'];

    $abba_display_term = $_POST['abba_display_term'];

    $abba_display_student_status = $_POST['abba_display_status'];

    // get total parent
    $abba_sql_parent = ("SELECT COUNT(DISTINCT(parent.ParentID)) AS totalparent FROM `parent`
    INNER JOIN userlogin ON parent.ParentID=userlogin.UserID AND parent.InstitutionID=userlogin.InstitutionIDOrCampusID
    LEFT JOIN student ON parent.ParentID=student.ParentID
    LEFT JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
    LEFT JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE parent.InstitutionID=$abba_instituion_id AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.StudentTypeBoardingOrDay='$abba_display_student_type' OR $abba_display_student_type IS NULL) AND (userlogin.InstitutionIDOrCampusID=$abba_instituion_id OR $abba_instituion_id IS NULL) AND userlogin.UserType='parent' AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND ParentTrashStatus = 0");
    $abba_result_parent = mysqli_query($link, $abba_sql_parent);
    $abba_row_parent = mysqli_fetch_assoc($abba_result_parent);
    $abba_row_cnt_parent = mysqli_num_rows($abba_result_parent);

    // get blocked parent
    $abba_sql_blocked = ("SELECT COUNT(DISTINCT(parent.ParentID)) AS totalparent FROM `parent`
    INNER JOIN userlogin ON parent.ParentID=userlogin.UserID AND parent.InstitutionID=userlogin.InstitutionIDOrCampusID
    INNER JOIN deactivateuser ON parent.ParentID=deactivateuser.UserID AND deactivateuser.UserType = 'parent'
    LEFT JOIN student ON parent.ParentID=student.ParentID
    LEFT JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
    LEFT JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE parent.InstitutionID=$abba_instituion_id AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.StudentTypeBoardingOrDay='$abba_display_student_type' OR $abba_display_student_type IS NULL) AND (userlogin.InstitutionIDOrCampusID=$abba_instituion_id OR $abba_instituion_id IS NULL) AND userlogin.UserType='parent' AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND ParentTrashStatus = 0");
    $abba_result_blocked = mysqli_query($link, $abba_sql_blocked);
    $abba_row_blocked = mysqli_fetch_assoc($abba_result_blocked);
    $abba_row_cnt_blocked = mysqli_num_rows($abba_result_blocked);

    // get total parent male
    $abba_sql_parent_male = ("SELECT COUNT(DISTINCT(parent.ParentID)) AS totalparent FROM `parent`
    INNER JOIN userlogin ON parent.ParentID=userlogin.UserID AND parent.InstitutionID=userlogin.InstitutionIDOrCampusID
    LEFT JOIN student ON parent.ParentID=student.ParentID
    LEFT JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
    LEFT JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE parent.InstitutionID=$abba_instituion_id AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.StudentTypeBoardingOrDay='$abba_display_student_type' OR $abba_display_student_type IS NULL) AND (userlogin.InstitutionIDOrCampusID=$abba_instituion_id OR $abba_instituion_id IS NULL) AND userlogin.UserType='parent' AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND ParentTrashStatus = 0 AND parent.ParentGender = 'Male'");
    $abba_result_parent_male = mysqli_query($link, $abba_sql_parent_male);
    $abba_row_parent_male = mysqli_fetch_assoc($abba_result_parent_male);
    $abba_row_cnt_parent_male = mysqli_num_rows($abba_result_parent_male);

    // get total parent female
    $abba_sql_parent_female = ("SELECT COUNT(DISTINCT(parent.ParentID)) AS totalparent FROM `parent`
    INNER JOIN userlogin ON parent.ParentID=userlogin.UserID AND parent.InstitutionID=userlogin.InstitutionIDOrCampusID
    LEFT JOIN student ON parent.ParentID=student.ParentID
    LEFT JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
    LEFT JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID=classordepartment.ClassOrDepartmentID
    WHERE parent.InstitutionID=$abba_instituion_id AND (student.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (student.StudentTypeBoardingOrDay='$abba_display_student_type' OR $abba_display_student_type IS NULL) AND (userlogin.InstitutionIDOrCampusID=$abba_instituion_id OR $abba_instituion_id IS NULL) AND userlogin.UserType='parent' AND (classordepartmentstudentallocation.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND classordepartmentstudentallocation.Session='$abba_display_session' AND (classordepartment.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) AND (classordepartment.ClassOrDepartmentID=$abba_display_class OR $abba_display_class IS NULL) AND (classordepartment.SectionID=$abba_section_id OR $abba_section_id IS NULL) AND ParentTrashStatus = 0 AND parent.ParentGender = 'Female'");
    $abba_result_parent_female = mysqli_query($link, $abba_sql_parent_female);
    $abba_row_parent_female = mysqli_fetch_assoc($abba_result_parent_female);
    $abba_row_cnt_parent_female = mysqli_num_rows($abba_result_parent_female);

?>

<div class="col-sm-3 col-md-6 col-lg-3">

    <div class="topSecCards" style="width: 100%; height: 120px;">
        <div style="border: 2px solid #0066FF; height: 100%; border-radius: 8px; padding: 10px;">
            <div align="center" style="font-size: 60px; color: #0066FF;">
                <i class="fas fa-user" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-6 col-lg-3">

    <div class="topSecCards" style="width: 100%; height: 120px;">
        <div class="abba_parent_card">
            <div class="row" style="margin-top: 12px;">
                <div class="col-6">
                    <h6 style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">Total Parents</h6>
                    <p></p>
                    <h4 style="margin-left: 10px; color: #ffffff;"><?php echo number_format($abba_row_parent['totalparent']);?></h4>
                </div>
                <div class="col-6">

                    <h6 style="color: white;"><?php echo number_format($abba_row_parent['totalparent'] - $abba_row_blocked['totalparent']);?></h6>
                    <h6 style="font-size: 12px; color: #98ff7e;">Active Parents</h6>

                    <h6 style="color: white;"><?php echo number_format($abba_row_blocked['totalparent']);?></h6>
                    <h6 style="font-size: 12px; color: lightgrey;">Blocked Parents</h6>
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
                            <input data-plugin="knob" data-width="70" data-height="70" data-linecap="round"
                                data-fgColor="#0066FF" value="<?php echo $abba_row_parent['totalparent'];?>" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">

                <h6 style="color: #666666; margin-top: 25px; font-size: 15px;"><?php echo $abba_row_parent_male['totalparent']; ?></h6>
                <h6 style="font-size: 12px; font-weight: 400; color: #057ff1;">Male</h6>
                <h6 style="color: #666666; font-size: 15px;"><?php echo $abba_row_parent_female['totalparent']; ?></h6>
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
                                data-fgColor="#3ceb71" value="27" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">

                <h6 style="color: #666666; margin-top: 15px; font-size: 15px;">10</h6>
                <h6 style="font-size: 12px; font-weight: 400; color: #057ff1;">Oweing Parents</h6>
                <h6 style="color: #666666; font-size: 15px;">15</h6>
                <h6 style="font-size: 12px; font-weight: 400; color: #b4030c;">Paid Parents</h6>
            </div>
        </div>
    </div>

</div>