<?php
    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_comments_usertype = $_POST['abba_comments_usertype'];

    if($abba_comments_usertype == 'schoolhead')
    {
        $abba_sql_class = ("SELECT DISTINCT StaffID, StaffFirstName, StaffMiddleName, StaffLastName FROM `staff` INNER JOIN section ON staff.StaffID=section.PrincipalOrDeanOrHeadTeacherUserID WHERE section.CampusID=$abba_campus_id ORDER BY StaffLastName ASC");
        
    }
    else{

        $abba_sql_class = ("SELECT DISTINCT StaffID, StaffFirstName, StaffMiddleName, StaffLastName FROM `staff` INNER JOIN classordepartment ON staff.StaffID=classordepartment.HODOrFormTeacherUserID WHERE classordepartment.CampusID=$abba_campus_id ORDER BY StaffLastName ASC");
        
    }
    $abba_result_class = mysqli_query($link, $abba_sql_class);
    $abba_row_class = mysqli_fetch_assoc($abba_result_class);
    $abba_row_cnt_class = mysqli_num_rows($abba_result_class);
    
    echo '<option value="NULL">Select Staff</option>';

    if($abba_row_cnt_class > 0)
    {
        do{

            echo '<option value="'.$abba_row_class['StaffID'].'">'.$abba_row_class['StaffLastName'].' '.$abba_row_class['StaffMiddleName'].' '.$abba_row_class['StaffFirsttName'].'</option>';
    
        }while($abba_row_class = mysqli_fetch_assoc($abba_result_class));
    }
    else
    {
        echo '<option value="NULL">No Records Found</option>';
    }
?>