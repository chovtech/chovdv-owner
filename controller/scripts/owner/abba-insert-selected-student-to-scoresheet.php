<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_display_result_class = $_POST['abba_display_result_class'];
    $abba_display_session = $_POST['abba_display_session'];
    $abba_result_display_term = $_POST['abba_result_display_term'];
    $abba_display_result_subject = $_POST['abba_display_result_subject'];
    
    $btnclicked = $_POST['btnclicked'];

    $selStudentAddToScoreSheet = $_POST['selStudentAddToScoreSheet'];

    $str_arr = explode(",", $selStudentAddToScoreSheet);

    if($btnclicked == '1')
    {
        foreach ($str_arr as $Student) {
            $Student;
    
            $sqlCheckScoreSheet = "SELECT * FROM `score` 
            WHERE StudentID = '$Student' 
            AND ClassOrDepartmentID='$abba_display_result_class' 
            AND CourseOrSubjectID='$abba_display_result_subject' 
            AND Session='$abba_display_session' 
            AND TermOrSemester='$abba_result_display_term' 
            AND CampusID='$abba_campus_id'";
            $queryCheckScoreSheet = mysqli_query($link, $sqlCheckScoreSheet);
            $rowCheckScoreSheet = mysqli_fetch_assoc($queryCheckScoreSheet);
            $countCheckScoreSheet = mysqli_num_rows($queryCheckScoreSheet);
    
            if ($countCheckScoreSheet > 0) 
            {
                
            } 
            else 
            {
                $sqlInsertToScoreSheet = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`)VALUES ('$abba_campus_id', '$Student', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
                $queryInsertToScoreSheet = mysqli_query($link, $sqlInsertToScoreSheet);
    
                if ($queryInsertToScoreSheet) {
                   
                }

            }
    
        }
        
        echo 1;
    }
    else if($btnclicked == 2)
    {
        foreach ($str_arr as $Student) 
        {
            $Student;

            $sqlCheckScoreSheet = "SELECT * FROM `psychomotortraits` WHERE StudentID='$Student' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term' AND CampusID='$abba_campus_id'";
            $queryCheckScoreSheet = mysqli_query($link, $sqlCheckScoreSheet);
            $rowCheckScoreSheet = mysqli_fetch_assoc($queryCheckScoreSheet);
            $countCheckScoreSheet = mysqli_num_rows($queryCheckScoreSheet);
            
            if ($countCheckScoreSheet > 0) 
            {
                
            } 
            else 
            {
                $sqlInsertToScoreSheet = "INSERT INTO `psychomotortraits` 
                (`CampusID`, `StudentID`, `Session`, `TermOrSemester`, `Dexterity`, `WritingSkills`, `GymnasticSkills`, `MusicalSkills`, `ExperimentalSkills`, `HandlingOfEquipment`) VALUES ('$abba_campus_id', '$Student', '$abba_display_session', '$abba_result_display_term', '0', '0', '0', '0', '0', '0')";
                $queryInsertToScoreSheet = mysqli_query($link, $sqlInsertToScoreSheet);
    
                if ($queryInsertToScoreSheet) 
                {
                   
                }
                else{
                    
                }

            }
    
        }
        
        echo 2;
    }
    else
    {
        foreach ($str_arr as $Student) {
            $Student;
    
            $sqlCheckScoreSheet = "SELECT * FROM `affectivetraits` WHERE StudentID='$Student' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term' AND CampusID='$abba_campus_id'";
            $queryCheckScoreSheet = mysqli_query($link, $sqlCheckScoreSheet);
            $rowCheckScoreSheet = mysqli_fetch_assoc($queryCheckScoreSheet);
            $countCheckScoreSheet = mysqli_num_rows($queryCheckScoreSheet);
    
            if ($countCheckScoreSheet > 0) 
            {
                
            } 
            else 
            {
                $sqlInsertToScoreSheet = "INSERT INTO `affectivetraits`(`CampusID`, `StudentID`, `Session`, `ClassID`, `TermOrSemester`, `Punctuality`, `Attendance`, `Neatness`, `Curiosity`, `Diligence`, `Creative`, `Attentiveness`, `ClassParticipation`, `Obedience`, `Honesty`, `RelationshipWithMates`) VALUES ('$abba_campus_id','$Student','$abba_display_session','$abba_display_result_class','$abba_result_display_term','0','0','0','0','0','0','0','0','0','0','0')";
                $queryInsertToScoreSheet = mysqli_query($link, $sqlInsertToScoreSheet);
    
                if ($queryInsertToScoreSheet) {
                   
                }

            }
    
        }
        
        echo 3;
    }
?>