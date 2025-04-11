<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];
    $abba_display_result_class = $_POST['abba_display_result_class'];
    $abba_display_session = $_POST['abba_display_session'];
    $abba_result_display_term = $_POST['abba_result_display_term'];
    $abba_display_result_subject = $_POST['abba_display_result_subject'];


    $sqlGetClassList = "SELECT * FROM `classordepartmentstudentallocation` 
        WHERE ClassOrDepartmentID='$abba_display_result_class' 
        AND Session='$abba_display_session' AND CampusID='$abba_campus_id'";
    $queryGetClassList = mysqli_query($link, $sqlGetClassList);
    $rowGetClassList = mysqli_fetch_assoc($queryGetClassList);
    $countGetClassList = mysqli_num_rows($queryGetClassList);

    $sqlGetGradingSystem = "SELECT * FROM `resultsetting` INNER JOIN classordepartment ON resultsetting.SectionID=classordepartment.SectionID WHERE resultsetting.CampusID='$abba_campus_id' AND classordepartment.ClassOrDepartmentID='$abba_display_result_class'";
    $queryGetGradingSystem = mysqli_query($link, $sqlGetGradingSystem);
    $rowGetGradingSystem = mysqli_fetch_assoc($queryGetGradingSystem);
    $countGetGradingSystem = mysqli_num_rows($queryGetGradingSystem);

    $totalnumbofca = $rowGetGradingSystem['NumberOfCA'];

    if ($rowGetGradingSystem['NumberOfCA'] == '1') {
        $ca1test = ["Name", "Reg Number", "CA 1", "EXAM"];
    } elseif ($rowGetGradingSystem['NumberOfCA'] == '2') {
        $ca1test = ["Name", "Reg Number", "CA 1", "CA 2", "EXAM"];
    } elseif ($rowGetGradingSystem['NumberOfCA'] == '3') {
        $ca1test = ["Name", "Reg Number", "CA 1", "CA 2", "CA 3", "EXAM"];
    } elseif ($rowGetGradingSystem['NumberOfCA'] == '4') {
        $ca1test = ["Name", "Reg Number", "CA 1", "CA 2", "CA 3", "CA 4", "EXAM"];
    } elseif ($rowGetGradingSystem['NumberOfCA'] == '5') {
        $ca1test = ["Name", "Reg Number", "CA 1", "CA 2", "CA 3", "CA 4", "CA 5", "EXAM"];
    } elseif ($rowGetGradingSystem['NumberOfCA'] == '6') {
        $ca1test = ["Name", "Reg Number", "CA 1", "CA 2", "CA 3", "CA 4", "CA 5", "CA 6", "EXAM"];
    } elseif ($rowGetGradingSystem['NumberOfCA'] == '7') {
        $ca1test = ["Name", "Reg Number", "CA 1", "CA 2", "CA 3", "CA 4", "CA 5", "CA 6", "CA 7", "EXAM"];
    } elseif ($rowGetGradingSystem['NumberOfCA'] == '8') {
        $ca1test = ["Name", "Reg Number", "CA 1", "CA 2", "CA 3", "CA 4", "CA 5", "CA 6", "CA 7", "CA 8", "EXAM"];
    } elseif ($rowGetGradingSystem['NumberOfCA'] == '9') {
        $ca1test = ["Name", "Reg Number", "CA 1", "CA 2", "CA 3", "CA 4", "CA 5", "CA 6", "CA 7", "CA 8", "CA 9", "EXAM"];
    } elseif ($rowGetGradingSystem['NumberOfCA'] == '10') {
        $ca1test = ["Name", "Reg Number", "CA 1", "CA 2", "CA 3", "CA 4", "CA 5", "CA 6", "CA 7", "CA 8", "CA 9", "CA 10", "EXAM"];
    } else {
        $ca1test = '';
    }

    if ($countGetClassList > 0) {

        //get the file name. We used the Session_Term_Classname_subjectname to get the file. So thats whats we did with the query below

        $sqlGetSubjectName = "SELECT * FROM `subjectorcourse` WHERE SubjectOrCourseID='$abba_display_result_subject'";
        $queryGetSubjectName = mysqli_query($link, $sqlGetSubjectName);
        $rowGetSubjectName = mysqli_fetch_assoc($queryGetSubjectName);
        $countGetSubjectName = mysqli_num_rows($queryGetSubjectName);

        $sqlGetClassName = "SELECT * FROM `classordepartment` WHERE ClassOrDepartmentID='$abba_display_result_class'";
        $queryGetClassName = mysqli_query($link, $sqlGetClassName);
        $rowGetClassName = mysqli_fetch_assoc($queryGetClassName);
        $countGetClassName = mysqli_num_rows($queryGetClassName);

        $sqlGettermalias = "SELECT * FROM `termalias` WHERE TermOrSemesterID='$abba_result_display_term' AND CampusID='$abba_campus_id'";
        $queryGettermalias = mysqli_query($link, $sqlGettermalias);
        $rowGettermalias = mysqli_fetch_assoc($queryGettermalias);
        $countGettermalias = mysqli_num_rows($queryGettermalias);

        $SubjectOrCourseTitle = str_replace('/', '-', $rowGetSubjectName['SubjectOrCourseTitle']);
        // $ClassOrDepartmentName = trim($rowGetClassName['ClassOrDepartmentName']);
        $ClassOrDepartmentName = str_replace(' ', '-', $rowGetClassName['ClassOrDepartmentName']);


        $today = date("Y-m-d");
        $seconds = date("hisa");
        $time = $today . $seconds;

        $SessionForName = str_replace('/', '_', $abba_display_session);
        $fileName = $SubjectOrCourseTitle . '_' . $ClassOrDepartmentName . '_' .  str_replace(' ', '_', $rowGettermalias['TermAliasName']) . '_' . $SessionForName . '-' . $time;

        $Fname = fopen('../../../assets/subject_class_list/' . $fileName . '.csv', 'w') or die("Unable to open file!");
        $lineHeader = $ca1test;
        fputcsv($Fname, $lineHeader);

        do {
            $StudentID = $rowGetClassList['StudentID'];

            $sqlGetStudentInfo = "SELECT * FROM `student` WHERE StudentID ='$StudentID'";
            $queryGetStudentInfo = mysqli_query($link, $sqlGetStudentInfo);
            $rowGetStudentInfo = mysqli_fetch_assoc($queryGetStudentInfo);
            $countGetStudentInfo = mysqli_num_rows($queryGetStudentInfo);

            $sqlGetStudentReg = "SELECT * FROM `userlogin` WHERE UserID ='$StudentID' AND UserType='student' AND InstitutionIDOrCampusID = '$abba_campus_id'";
            $queryGetStudentReg = mysqli_query($link, $sqlGetStudentReg);
            $rowGetStudentReg = mysqli_fetch_assoc($queryGetStudentReg);
            $countGetStudentReg = mysqli_num_rows($queryGetStudentReg);

            $UserRegNumberOrUsername = $rowGetStudentReg['UserRegNumberOrUsername'];

            $studentFullName = $rowGetStudentInfo['StudentLastName'] . ' ' . $rowGetStudentInfo['StudentMiddleName'] . ' ' . $rowGetStudentInfo['StudentFirstName'];

            $lineData = array($studentFullName, $UserRegNumberOrUsername, '', '', '', '');

            fputcsv($Fname, $lineData);
        
        } while ($rowGetClassList = mysqli_fetch_assoc($queryGetClassList));

        //set headers to download file rather than displayed
        $downloadPaths = $defaultUrl . 'assets/subject_class_list/' . $fileName . '.csv';
        
        $downloadname = str_replace(' ', '_', $SubjectOrCourseTitle . '_' . $ClassOrDepartmentName) . '_' .  str_replace(' ', '_', $rowGettermalias['TermAliasName']) . '_' . $SessionForName;
        
        $abba_json = (object) [
            'downloadPaths' => $downloadPaths,
            'downloadname' => $downloadname,
            'abbafilename' => '../../../assets/subject_class_list/'.$fileName.'.csv'
        ];
        
        echo $abba_json_content = json_encode($abba_json);

    } else {
        
        echo 1;
    }

?>