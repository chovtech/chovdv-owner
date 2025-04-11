<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_class_id = $_POST['class_id'];

    $abba_campus_id = $_POST['abba_campus_id'];
    
    $abba_class_template_id = $_POST['abba_class_template_id'];

    $subject_id = explode(',',$_POST['subject_id']);

    $teacher_id = explode(',',$_POST['teacher_id']);

    $abba_sql_subjectorcourse = "DELETE FROM `courseorsubjectallocation` WHERE `CampusID` = '$abba_campus_id' AND `ClassOrDepartmentID` = '$abba_class_id'";
    $abba_result_subjectorcourse = mysqli_query($link, $abba_sql_subjectorcourse);

    foreach($subject_id as $i => $subject_id_new)
    {
        $subject_id_new;

        $teacher_id_new = $teacher_id[$i];

        $abba_sql_subjectorcourse_insert = "INSERT INTO `courseorsubjectallocation`(`CourseOrSubjectAllocationID`, `CampusID`, `ClassOrDepartmentID`, `SubjectOrCourseID`, `CourseOrSubjectTeacherUserID`) VALUES (NULL,'$abba_campus_id','$abba_class_id','$subject_id_new','$teacher_id_new')";
        $abba_result_subjectorcourse_insert = mysqli_query($link, $abba_sql_subjectorcourse_insert);
    }
        
?>