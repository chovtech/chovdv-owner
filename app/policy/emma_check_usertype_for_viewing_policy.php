<?php

include('../../../config/config.php');

$emma_userid = $_POST['emma_userid_for_policy'];
$emma_usertype = $_POST['emma_usertype_for_policy'];

if($emma_usertype == 'admin'){


    $emma_policy_for_admin = "SELECT * FROM `staff` WHERE `StaffID` = '$emma_userid' ";
    $emma_policy_for_admin_query = mysqli_query($link, $emma_policy_for_admin);
    $emma_policy_for_admin_fetch = mysqli_fetch_assoc($emma_policy_for_admin_query);
    $emma_policy_for_admin_rows = mysqli_num_rows($emma_policy_for_admin_query);

    if($emma_policy_for_admin_rows > 0){
        
        $emma_get_institution_id = $emma_policy_for_admin_fetch['InstitutionID'];

        echo '<div class="'.$emma_get_institution_id.'">';

    }else{
        echo 2;
    }

}else if($emma_usertype == 'teacher'){

    $emma_policy_for_teacher = "SELECT * FROM `staff` WHERE `StaffID` = '$emma_userid' ";
    $emma_policy_for_teacher_query = mysqli_query($link, $emma_policy_for_teacher);
    $emma_policy_for_teacher_fetch = mysqli_fetch_assoc($emma_policy_for_teacher_query);
    $emma_policy_for_teacher_rows = mysqli_num_rows($emma_policy_for_teacher_query);

    if($emma_policy_for_teacher_rows > 0){
        
        echo $emma_get_institution_id = $emma_policy_for_teacher_fetch['InstitutionID'];

    }else{
        echo 2;
    }

}else if($emma_usertype == 'schoolhead'){

    $emma_policy_for_schoolhead = "SELECT * FROM `staff` WHERE `StaffID` = '$emma_userid' ";
    $emma_policy_for_schoolhead_query = mysqli_query($link, $emma_policy_for_schoolhead);
    $emma_policy_for_schoolhead_fetch = mysqli_fetch_assoc($emma_policy_for_schoolhead_query);
    $emma_policy_for_schoolhead_rows = mysqli_num_rows($emma_policy_for_schoolhead_query);

    if($emma_policy_for_schoolhead_rows > 0){
        
        echo $emma_get_institution_id = $emma_policy_for_schoolhead_fetch['InstitutionID'];

    }else{
        echo 2;
    }

}else if($emma_usertype == 'parent'){

    $emma_policy_for_parent = "SELECT * FROM `parent` WHERE `ParentID` = '$emma_userid' ";
    $emma_policy_for_parent_query = mysqli_query($link, $emma_policy_for_parent);
    $emma_policy_for_parent_fetch = mysqli_fetch_assoc($emma_policy_for_parent_query);
    $emma_policy_for_parent_rows = mysqli_num_rows($emma_policy_for_parent_query);

    if($emma_policy_for_parent_rows > 0){
        
        echo $emma_get_institution_id = $emma_policy_for_parent_fetch['InstitutionID'];

    }else{
        echo 2;
    }

}else if($emma_usertype == 'student'){

    $emma_policy_for_student = "SELECT * FROM `student` WHERE `StudentID` = '$emma_userid' ";
    $emma_policy_for_student_query = mysqli_query($link, $emma_policy_for_student);
    $emma_policy_for_student_fetch = mysqli_fetch_assoc($emma_policy_for_student_query);
    $emma_policy_for_student_rows = mysqli_num_rows($emma_policy_for_student_query);

    if($emma_policy_for_student_rows > 0){
        
        echo $emma_get_institution_id = $emma_policy_for_student_fetch['CampusID'];

    }else{
        echo 2;
    }

}else{

}

?>