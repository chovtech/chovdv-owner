<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $campus_id = $_POST['abba_campus_id'];

    $abba_default_section_id = $_POST['abba_default_section_id'];

    $abba_section_id = $_POST['abba_section_id'];

    $abba_default_class_id = $_POST['abba_default_class_id'];

    $new_class_name = explode(',',$_POST['new_class_name']);

    // Loop through the data
    foreach ($new_class_name as $new_class_name_new) {

        $new_class_name_new;

        $sqltocheckclassordepartment = mysqli_query($link, "SELECT * FROM `classordepartment` WHERE `CampusID` = '$campus_id' AND `ClassOrDepartmentName` = '$new_class_name_new' AND `SectionID` = '$abba_section_id' AND `ClassTemplateID` = '$abba_default_class_id'");
        $rowtocheckclassordepartment = mysqli_fetch_array($sqltocheckclassordepartment);
        $counttocheckclassordepartment = mysqli_num_rows($sqltocheckclassordepartment);

        if($counttocheckclassordepartment > 0)
        {
           
        }
        else
        {
            // Section does not exist, insert the section and update the columns
            $abba_sql_insert_section = "INSERT INTO `classordepartment`(`ClassOrDepartmentID`, `ClassTemplateID`, `SectionID`, `CampusID`, `ClassOrDepartmentName`, `HODOrFormTeacherUserID`, `ResultType`, `GradingMethodID`, `ClassPhoto`, `PostStatus`) VALUES (NULL,'$abba_default_class_id','$abba_section_id','$campus_id','$new_class_name_new','0','0','0','0','0')";
            $abba_result_insert_section = mysqli_query($link, $abba_sql_insert_section);

        } 
    }

?>