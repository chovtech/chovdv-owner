<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include ('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_display_result_class = $_POST['abba_display_result_class'];
    $abba_display_session = $_POST['abba_display_session'];
    $abba_result_display_term = $_POST['abba_result_display_term'];
    $abba_display_result_subject = $_POST['abba_display_result_subject'];
    
    $btnclicked = $_POST['btnclicked'];

    if($btnclicked == '1')
    {
        
        $sqlDel1 = ("DELETE FROM `score` WHERE CampusID='$abba_campus_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'");
        $resultDel1 = mysqli_query($link, $sqlDel1)or die(mysqli_error($link));
        
        echo 1;

    }
    elseif($btnclicked == '2')
    {
        $sqlDel1 = ("DELETE FROM `psychomotortraits` WHERE CampusID='$abba_campus_id' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'");
        $resultDel1 = mysqli_query($link, $sqlDel1)or die(mysqli_error($link));
        
                            
                echo 2;

    }
    else{
        $sqlDel1 = ("DELETE FROM `affectivetraits` WHERE CampusID='$abba_campus_id' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'");
        $resultDel1 = mysqli_query($link, $sqlDel1)or die(mysqli_error($link));
        
        echo 3;
    }
	
?>        