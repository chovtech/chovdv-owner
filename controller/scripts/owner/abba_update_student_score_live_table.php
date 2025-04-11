<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $InstitutionID = $_POST['abba_get_instituion_id'];

    if ($_POST['ID']) {

        $ID = $_POST['ID'];
        $ca1 = $_POST['ca1'];
        $ca2 = $_POST['ca2'];
        $ca3 = $_POST['ca3'];
        $ca4 = $_POST['ca4'];
        $ca5 = $_POST['ca5'];
        $ca6 = $_POST['ca6'];
        $ca7 = $_POST['ca7'];
        $ca8 = $_POST['ca8'];
        $ca9 = $_POST['ca9'];
        $ca10 = $_POST['ca10'];
        $exam = $_POST['exam'];

        $total = $ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8 + $ca9 + $ca10 + $exam;

        $sqlGetStudentVitals = "SELECT * FROM `score` WHERE ScoreID='$ID'";
        $queryGetStudentVitals = mysqli_query($link, $sqlGetStudentVitals);
        $rowGetStudentVitals = mysqli_fetch_assoc($queryGetStudentVitals);
        $countGetStudentVitals = mysqli_num_rows($queryGetStudentVitals);

        $CampusID = $rowGetStudentVitals['CampusID'];
        $ClassOrDepartmentID = $rowGetStudentVitals['ClassOrDepartmentID'];

        $sqlGetSchool = "SELECT * FROM `classordepartment` WHERE CampusID='$CampusID' AND ClassOrDepartmentID='$ClassOrDepartmentID'";
        $queryGetSchool = mysqli_query($link, $sqlGetSchool);
        $rowGetSchool = mysqli_fetch_assoc($queryGetSchool);
        $countGetSchool = mysqli_num_rows($queryGetSchool);

        $SectionID = $rowGetSchool['SectionID'];
        $GradingMethodID = $rowGetSchool['GradingMethodID'];

        $sqlGetGradingSystem = "SELECT * FROM `resultsetting` WHERE CampusID='$InstitutionID' AND SectionID='$SectionID'";
        $queryGetGradingSystem = mysqli_query($link, $sqlGetGradingSystem);
        $rowGetGradingSystem = mysqli_fetch_assoc($queryGetGradingSystem);
        $countGetGradingSystem = mysqli_num_rows($queryGetGradingSystem);

        $sqlGetGradingSystemNew = "SELECT * FROM `gradingstructure` WHERE InstitutionID = '$InstitutionID' AND GradingMethodID = '$GradingMethodID' AND $total BETWEEN RangeStart AND RangeEnd";
        $queryGetGradingSystemNew = mysqli_query($link, $sqlGetGradingSystemNew);
        $rowGetGradingSystemNew = mysqli_fetch_assoc($queryGetGradingSystemNew);
        $countGetGradingSystemNew = mysqli_num_rows($queryGetGradingSystemNew);

        $remark = $rowGetGradingSystemNew['Remark'];
        $grade = $rowGetGradingSystemNew['Grade'];


        $gradesetting = array($grade, $remark);
        echo json_encode($gradesetting);

        $sqlUpdateScore = "UPDATE `score` SET `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2', `CA3` = '$ca3', `CA4` = '$ca4', `CA5` = '$ca5', `CA6` = '$ca6', `CA7` = '$ca7', `CA8` = '$ca8', `CA9` = '$ca9', `CA10` = '$ca10' WHERE `ScoreID` = '$ID'";
        $queryUpdateScore = mysqli_query($link, $sqlUpdateScore);

    }
?>