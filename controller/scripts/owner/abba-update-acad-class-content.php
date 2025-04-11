<?php
    include('../../config/config.php');
    
    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_campus_id = $_POST['abba_campus_id'];

    $btnclicked = $_POST['btnclicked'];

    $class_id = $_POST['class_id'];
    
    $ft_gs_rt_id = $_POST['ft_gs_rt_id'];

    if($btnclicked == 1)
    {
        $abba_sql_staff = mysqli_query($link,"UPDATE `classordepartment` SET `HODOrFormTeacherUserID`='$ft_gs_rt_id' WHERE `CampusID` = '$abba_campus_id' AND `ClassOrDepartmentID` = '$class_id'");
    }
    else if($btnclicked == 2){
        $abba_sql_GradingMethodID = mysqli_query($link,"UPDATE `classordepartment` SET `GradingMethodID`='$ft_gs_rt_id' WHERE `CampusID` = '$abba_campus_id' AND `ClassOrDepartmentID` = '$class_id'");
    }
    else
    {
        $abba_sql_ResultType = mysqli_query($link,"UPDATE `classordepartment` SET `ResultType`='$ft_gs_rt_id' WHERE `CampusID` = '$abba_campus_id' AND `ClassOrDepartmentID` = '$class_id'");
    }
?>