<?php
    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_section_id = $_POST['abba_section_id'];


    $abba_sql_class = ("SELECT * FROM `classordepartment` WHERE CampusID=$abba_campus_id AND (SectionID = $abba_section_id OR $abba_section_id IS NULL) ORDER BY ClassOrDepartmentName ASC");
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