<?php
    include('../../config/config.php');
    
    $abba_get_campus_id = $_POST['abba_get_campus_id'];

    $abba_get_student_id = $_POST['abba_get_student_id'];

    $image = $_POST['image'];
    
    $abba_sql_update_student_image = ("UPDATE `student` SET `StudentPhoto`='$image' WHERE `StudentID` = '$abba_get_student_id' AND CampusID = '$abba_get_campus_id'");
    $abba_result_update_student_image = mysqli_query($link, $abba_sql_update_student_image);
    
    if($abba_result_update_student_image == true)
    {
        echo 1;
    }
    else
    {
        echo 2;
    }
?>