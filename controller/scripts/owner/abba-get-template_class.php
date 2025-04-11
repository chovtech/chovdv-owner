<?php
    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_section_id = $_POST['abba_section_id'];

    $abba_sql_class = ("SELECT * FROM `classtemplate` WHERE SectionListID = $abba_section_id ORDER BY ClassTemplateName ASC");
    $abba_result_class = mysqli_query($link, $abba_sql_class);
    $abba_row_class = mysqli_fetch_assoc($abba_result_class);
    $abba_row_cnt_class = mysqli_num_rows($abba_result_class);
    
    echo '<option value="NULL">Select Class</option>';

    if($abba_row_cnt_class > 0)
    {
        do{

            echo '<option value="'.$abba_row_class['ClassTemplateID'].'">'.$abba_row_class['ClassTemplateName'].'</option>';
    
        }while($abba_row_class = mysqli_fetch_assoc($abba_result_class));
    }
    else
    {
        echo '<option value="NULL">No Records Found</option>';
    }
?>