<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $stud = $_POST['stud'];
    
    $camp = $_POST['camp'];
    
    $session = $_POST['session'];
    
    $term = $_POST['term'];
    
    $usertype = $_POST['usertype'];
    
    $staffid = $_POST['staffid'];
    
    $resulttype = $_POST['resulttype'];

    $comment = mysqli_real_escape_string($link, $_POST['comment']);
    
    date_default_timezone_set("Africa/Lagos");
    
    $date = date("Y-m-d");

    $abba_sql_student_delete = "DELETE FROM `remark` WHERE `CampusID` = '$camp' AND `StudentID` = '$stud' AND `RemarkType` = '$usertype' AND `Session` = '$session' AND `TermOrSemester` = '$term'";
    $abba_result_student_delete = mysqli_query($link, $abba_sql_student_delete);
    
    $abba_sql_student = "INSERT INTO `remark`(`RemarkID`, `CampusID`, `PrincipalOrDeanOrHeadTeacherUserID`, `StudentID`, `RemarkType`, `ResultType`, `Session`, `TermOrSemester`, `RemarkComment`, `Date`) VALUES (NULL,'$camp','$staffid','$stud','$usertype','$resulttype','$session','$term','$comment','$date')";
    $abba_result_student = mysqli_query($link, $abba_sql_student);
    
    $abba_sql_student_log = "INSERT INTO `activitylog`(`ActitvityLogID`, `InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) VALUES (NULL,'$camp','$staffid','$usertype','0','0','0','0','Entered a comment','$date')";
    $abba_result_student_log = mysqli_query($link, $abba_sql_student_log);
    

?>