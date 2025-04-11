<?php
    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_comments_usertype = $_POST['abba_comments_usertype'];

    $abba_comments_staff = $_POST['abba_comments_staff'];

    if($abba_comments_usertype == 'schoolhead')
    {
        $abba_sql_class = ("SELECT DISTINCT ClassOrDepartmentID, ClassOrDepartmentName FROM `staff` INNER JOIN section ON staff.StaffID=section.PrincipalOrDeanOrHeadTeacherUserID INNER JOIN classordepartment ON section.SectionID=classordepartment.SectionID AND section.CampusID=classordepartment.CampusID WHERE section.CampusID=$abba_campus_id AND classordepartment.CampusID=$abba_campus_id AND staff.StaffID=$abba_comments_staff ORDER BY ClassOrDepartmentName ASC");
        
    }
    else{

        $abba_sql_class = ("SELECT DISTINCT ClassOrDepartmentID, ClassOrDepartmentName FROM `staff` INNER JOIN classordepartment ON staff.StaffID=classordepartment.HODOrFormTeacherUserID WHERE classordepartment.CampusID=$abba_campus_id AND staff.StaffID=$abba_comments_staff ORDER BY ClassOrDepartmentName ASC");
        
    }
    $abba_result_class = mysqli_query($link, $abba_sql_class);
    $abba_row_class = mysqli_fetch_assoc($abba_result_class);
    $abba_row_cnt_class = mysqli_num_rows($abba_result_class);
    
    echo '<option value="NULL">Select Class</option>';

    if($abba_row_cnt_class > 0)
    {
        do{

            echo '<option value="'.$abba_row_class['ClassOrDepartmentID'].'">'.$abba_row_class['ClassOrDepartmentName'].'</option>';
    
        }while($abba_row_class = mysqli_fetch_assoc($abba_result_class));
    }
    else
    {
        echo '<option value="NULL">No Records Found</option>';
    }
?>