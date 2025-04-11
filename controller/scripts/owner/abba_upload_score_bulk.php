<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    /* Getting file name */
    if (!empty($_FILES['file']['name'])) {
        
        $abba_campus_id = $_POST['abba_campus_id'];
        $abba_display_result_class = $_POST['abba_display_result_class'];
        $abba_display_session = $_POST['abba_display_session'];
        $abba_result_display_term = $_POST['abba_result_display_term'];
        $abba_display_result_subject = $_POST['abba_display_result_subject'];

        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        // Validate whether selected file is part of the group of CSV file above, if it is, then upload
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
            $filename = $_FILES['file']['name'];
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);
            //echo count($linecount);
            while (($line = fgetcsv($csvFile)) !== FALSE) 
            {
                //print("<pre>".print_r($line,true)."</pre>");

                $sqlGetGradingSystem = "SELECT * FROM `resultsetting` INNER JOIN classordepartment ON resultsetting.SectionID=classordepartment.SectionID WHERE resultsetting.CampusID='$abba_campus_id' AND classordepartment.ClassOrDepartmentID='$abba_display_result_class'";
                $queryGetGradingSystem = mysqli_query($link, $sqlGetGradingSystem);
                $rowGetGradingSystem = mysqli_fetch_assoc($queryGetGradingSystem);
                $countGetGradingSystem = mysqli_num_rows($queryGetGradingSystem);

                $totalnumbofca = $rowGetGradingSystem['NumberOfCA'];

                $studentRegNuber = $line[1];

                $sqlGetuserlogin = "SELECT * FROM `userlogin` WHERE InstitutionIDOrCampusID='$abba_campus_id' AND UserType='student' AND UserRegNumberOrUsername='$studentRegNuber'";
                $queryGetuserlogin = mysqli_query($link, $sqlGetuserlogin);
                $rowGetuserlogin = mysqli_fetch_assoc($queryGetuserlogin);
                $countGetuserlogin = mysqli_num_rows($queryGetuserlogin);
                
                $abba_student_id = $rowGetuserlogin['UserID'];

                if ($rowGetGradingSystem['NumberOfCA'] == '1') {
                    
                    $ca1 = $line[2];
                    $exam = $line[3];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0) 
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } else {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }
 
                } 
                elseif ($rowGetGradingSystem['NumberOfCA'] == '2') 
                {
                    
                    $ca1 = $line[2];
                    $ca2 = $line[3];
                    $exam = $line[4];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0) 
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } else {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '$ca2', '0', '0', '0', '0', '0', '0', '0', '0')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }

                } 
                elseif ($rowGetGradingSystem['NumberOfCA'] == '3') 
                {
                    $ca1 = $line[2];
                    $ca2 = $line[3];
                    $ca3 = $line[4];
                    $exam = $line[5];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0)
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2', `CA3` = '$ca3' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } 
                    else 
                    {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '$ca2', '$ca3', '0', '0', '0', '0', '0', '0', '0')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }
                } 
                elseif ($rowGetGradingSystem['NumberOfCA'] == '4') 
                {
                    $ca1 = $line[2];
                    $ca2 = $line[3];
                    $ca3 = $line[4];
                    $ca4 = $line[5];
                    $exam = $line[6];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0)
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2', `CA3` = '$ca3', `CA4` = '$ca4' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } 
                    else 
                    {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '$ca2', '$ca3', '$ca4', '0', '0', '0', '0', '0', '0')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }
                } 
                elseif ($rowGetGradingSystem['NumberOfCA'] == '5') 
                {
                    $ca1 = $line[2];
                    $ca2 = $line[3];
                    $ca3 = $line[4];
                    $ca4 = $line[5];
                    $ca5 = $line[6];
                    $exam = $line[7];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0)
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2', `CA3` = '$ca3', `CA4` = '$ca4', `CA5` = '$ca5' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } 
                    else 
                    {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '$ca2', '$ca3', '$ca4', '$ca5', '0', '0', '0', '0', '0')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }
                } 
                elseif ($rowGetGradingSystem['NumberOfCA'] == '6')
                {
                    $ca1 = $line[2];
                    $ca2 = $line[3];
                    $ca3 = $line[4];
                    $ca4 = $line[5];
                    $ca5 = $line[6];
                    $ca6 = $line[7];
                    $exam = $line[8];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0)
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2', `CA3` = '$ca3', `CA4` = '$ca4', `CA5` = '$ca5', `CA6` = '$ca6' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } 
                    else 
                    {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '$ca2', '$ca3', '$ca4', '$ca5', '$ca6', '0', '0', '0', '0')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }
                } 
                elseif ($rowGetGradingSystem['NumberOfCA'] == '7') 
                {
                    $ca1 = $line[2];
                    $ca2 = $line[3];
                    $ca3 = $line[4];
                    $ca4 = $line[5];
                    $ca5 = $line[6];
                    $ca6 = $line[7];
                    $ca7 = $line[8];
                    $exam = $line[9];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0)
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2', `CA3` = '$ca3', `CA4` = '$ca4', `CA5` = '$ca5', `CA6` = '$ca6', `CA7` = '$ca7' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } 
                    else 
                    {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '$ca2', '$ca3', '$ca4', '$ca5', '$ca6', '$ca7', '0', '0', '0')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }
                } 
                elseif ($rowGetGradingSystem['NumberOfCA'] == '8') 
                {
                    $ca1 = $line[2];
                    $ca2 = $line[3];
                    $ca3 = $line[4];
                    $ca4 = $line[5];
                    $ca5 = $line[6];
                    $ca6 = $line[7];
                    $ca7 = $line[8];
                    $ca8 = $line[9];
                    $exam = $line[10];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0)
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2', `CA3` = '$ca3', `CA4` = '$ca4', `CA5` = '$ca5', `CA6` = '$ca6', `CA7` = '$ca7', `CA8` = '$ca8' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } 
                    else 
                    {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '$ca2', '$ca3', '$ca4', '$ca5', '$ca6', '$ca7', '$ca8', '0', '0')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }
                } 
                elseif ($rowGetGradingSystem['NumberOfCA'] == '9') 
                {
                    $ca1 = $line[2];
                    $ca2 = $line[3];
                    $ca3 = $line[4];
                    $ca4 = $line[5];
                    $ca5 = $line[6];
                    $ca6 = $line[7];
                    $ca7 = $line[8];
                    $ca8 = $line[9];
                    $ca9 = $line[10];
                    $exam = $line[11];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0)
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2', `CA3` = '$ca3', `CA4` = '$ca4', `CA5` = '$ca5', `CA6` = '$ca6', `CA7` = '$ca7', `CA8` = '$ca8', `CA9` = '$ca9' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } 
                    else 
                    {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '$ca2', '$ca3', '$ca4', '$ca5', '$ca6', '$ca7', '$ca8', '$ca9', '0')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }
                } 
                elseif ($rowGetGradingSystem['NumberOfCA'] == '10') 
                {
                    $ca1 = $line[2];
                    $ca2 = $line[3];
                    $ca3 = $line[4];
                    $ca4 = $line[5];
                    $ca5 = $line[6];
                    $ca6 = $line[7];
                    $ca7 = $line[8];
                    $ca8 = $line[9];
                    $ca9 = $line[10];
                    $ca10 = $line[11];
                    $exam = $line[12];

                    $sqlCheckIfScoreExist = "SELECT * FROM `score` WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND ClassOrDepartmentID='$abba_display_result_class' AND CourseOrSubjectID='$abba_display_result_subject' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term'";
                    $QueryCheckIfScoreExist = mysqli_query($link, $sqlCheckIfScoreExist);
                    $rowCheckIfScoreExist = mysqli_fetch_assoc($QueryCheckIfScoreExist);
                    $countCheckIfScoreExist = mysqli_num_rows($QueryCheckIfScoreExist);

                    if ($countCheckIfScoreExist > 0)
                    {
                        $sqlInsertScore = "UPDATE `score` SET `CampusID` = '$abba_campus_id', `Exam` = '$exam', `CA1` = '$ca1', `CA2` = '$ca2', `CA3` = '$ca3', `CA4` = '$ca4', `CA5` = '$ca5', `CA6` = '$ca6', `CA7` = '$ca7', `CA8` = '$ca8', `CA9` = '$ca9', `CA10` = '$ca10' WHERE CampusID='$abba_campus_id' AND StudentID='$abba_student_id' AND CourseOrSubjectID='$abba_display_result_subject' AND ClassOrDepartmentID='$abba_display_result_class' AND Session='$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;


                    } 
                    else 
                    {

                        $sqlInsertScore = "INSERT INTO `score` (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `Exam`, `CA1`, `CA2`, `CA3`, `CA4`, `CA5`, `CA6`, `CA7`, `CA8`, `CA9`, `CA10`) VALUES ('$abba_campus_id', '$abba_student_id', '$abba_display_result_class', '$abba_display_result_subject', '$abba_display_session', '$abba_result_display_term', '$exam', '$ca1', '$ca2', '$ca3', '$ca4', '$ca5', '$ca6', '$ca7', '$ca8', '$ca9', '$ca10')";
                        $queryInsertScore = mysqli_query($link, $sqlInsertScore);

                        echo 1;
                    }
                } 
                else 
                {
                    echo 2;
                }

            }
        }
        else
        {
            echo 3;

        }
    } 
    else 
    {
        echo 3;

    }
?>