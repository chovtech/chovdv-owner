<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');
    
    $abba_display_result_class = $_POST['abba_display_result_class'];

    $abba_campus_id = $_POST['abba_campus_id'];

    $check_subject = ("SELECT * FROM  `courseorsubjectallocation` INNER JOIN `subjectorcourse` ON courseorsubjectallocation.SubjectOrCourseID = subjectorcourse.SubjectOrCourseID WHERE `CampusID` = '$abba_campus_id' AND `ClassOrDepartmentID` = '$abba_display_result_class' ORDER BY `SubjectOrCourseTitle` ASC");
    $query_subject = mysqli_query($link,$check_subject);
    $fetch_subject = mysqli_fetch_assoc($query_subject);
    $row_subject = mysqli_num_rows($query_subject);

    if($row_subject > 0)
    {
        echo '<option value="NULL">Select Subject</option>';
        do{

            echo '<option value="'.$fetch_subject['SubjectOrCourseID'].'">'.$fetch_subject['SubjectOrCourseTitle'].'</option>';
    
        }while($fetch_subject = mysqli_fetch_assoc($query_subject));
    }
    else
    {
        echo '<option value="NULL">No Records Found</option>';
    }

?>