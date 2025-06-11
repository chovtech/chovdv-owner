<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];

    $campus_id = $_POST['campus_id'];

    $abba_display_session = $_POST['abba_display_session'];

    $abba_display_term = $_POST['abba_display_term'];

    $student_array = $_POST['student_array'];

    $user_id = $_POST['user_id'];

    $user_type = $_POST['user_type'];
    
    $class_id = $_POST['class_id'];

    $subcat_array = $_POST['subcat_array'];

    $cat_array = $_POST['cat_array'];

    date_default_timezone_set("Africa/Lagos");

    $date = date("Y-m-d H:i:s");

    $abba_sql_delete_assignoptionalfees = ("DELETE FROM `assignoptionalfees` WHERE `InstitutionID` = '$abba_instituion_id' 
    AND `CampusID` = '$campus_id' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' 
    AND `TermOrSemesterID` = '$abba_display_term' AND `Status` != 1");
    $abba_result_delete_assignoptionalfees = mysqli_query($link, $abba_sql_delete_assignoptionalfees);

    foreach ($student_array as $i => $student_id) 
    {
        $student_id;

        $subcat_id = $subcat_array[$i];
        
        $catId = $cat_array[$i];

        $abba_sql_insert_assignoptionalfees = ("INSERT INTO `assignoptionalfees`(`AssignOptionalFeesID`, `InstitutionID`, `CampusID`, `ClassOrDepartmentID`, `Session`, `TermOrSemesterID`, `CategoryID`, `SubcategoryID`, `StudentID`, `Status`, `Date`) VALUES (NULL,'$abba_instituion_id','$campus_id','$class_id','$abba_display_session','$abba_display_term','$catId','$subcat_id','$student_id','0','$date')");
        $abba_result_insert_assignoptionalfees = mysqli_query($link, $abba_sql_insert_assignoptionalfees);
    }

    $discription = 'Assign optional fees to students';

    $insert_activity_log = mysqli_query($link,"INSERT INTO `activitylog`(`ActitvityLogID`, `InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) VALUES (NULL,'$abba_instituion_id','$user_id','$user_type','0','0','0','0','$discription','$date')");

?>