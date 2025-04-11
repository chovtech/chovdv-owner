<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    // collect the input details
    $abba_campus_id = $_POST['abba_campus_id'];
    $InstitutionID = $_POST['InstitutionID'];
    $Session = $_POST['Session'];
    $TermOrSemesterID = $_POST['TermOrSemesterID'];
    $ClassOrDepartmentID = $_POST['ClassOrDepartmentID'];

    $StudentID = explode(',' , $_POST['StudentID']);
    $StudentIDlength = count($StudentID);
    
    $remarkcorearea = explode(',' , $_POST['remarkcorearea']);
    $countremarkcorearea = count($remarkcorearea);
    
    $AssessmentKeyID = explode(',' , $_POST['AssessmentKeyID']);
    $countAssessmentKeyID = count($AssessmentKeyID);
    $AssessmentKeyIDstdid = explode(',' , $_POST['AssessmentKeyIDstdid']);
    $students_assessmentessentialid = explode(',' , $_POST['students_assessmentessentialid']);
    $remark = explode('####,' , mysqli_real_escape_string($link,$_POST['remark']));

    $remarkEssentialAspectsID = explode(',' , $_POST['remarkEssentialAspectsID']);
    $countremarkEssentialAspectsID = count($remarkEssentialAspectsID);
    $remarkstudid = explode(',', $_POST['remarkstudid']);

    $teacher_comment_corearea = explode(',' , $_POST['teacher_comment_corearea']);
    $countteacher_comment_corearea = count($teacher_comment_corearea);
   
    $teacher_comment = explode('####,' , mysqli_real_escape_string($link,$_POST['teacher_comment']));
    $teacher_comment_studid = explode(',' , $_POST['teacher_comment_studid']);
   

    $overall_comment_studid = explode(',' , $_POST['overall_comment_studid']);
    $countoverall_comment_studid = count($overall_comment_studid);
    $overall_comment = explode('####,' , mysqli_real_escape_string($link,$_POST['overall_comment']));
    
    date_default_timezone_set("Africa/Lagos");
    $DateCreated = date('Y-m-d H:i:s');

    for($i=0; $i<$countremarkEssentialAspectsID; $i++)
    {
        $newremark =   str_replace('####','',$remark[$i]);
        
        $remarkstudid[$i];
        $remarkEssentialAspectsID[$i];
        $remarkcorearea[$i];
        
        $checkifalready = mysqli_query($link,"SELECT * FROM `britischessentialallocation` WHERE `EssentialAspectsID`='$remarkEssentialAspectsID[$i]' AND `CoreAreaID`='$remarkcorearea[$i]' AND
        `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `Session`='$Session' AND `TermOrSemesterID`='$TermOrSemesterID' AND `StudentID`='$remarkstudid[$i]' AND CampusID = '$abba_campus_id'");
        
        $countbritall = mysqli_num_rows($checkifalready);
        
        if($countbritall > 0)
        {
          
            $sqlupdateess = mysqli_query($link,"UPDATE `britischessentialallocation` SET `Remark`='$newremark' WHERE `EssentialAspectsID`='$remarkEssentialAspectsID[$i]' AND 
            `CoreAreaID`='$remarkcorearea[$i]' AND CampusID = '$abba_campus_id' AND `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `Session`='$Session' AND `TermOrSemesterID`='$TermOrSemesterID' AND `StudentID`='$remarkstudid[$i]'");
            
        }
        else
        {
            $sqlinsertesskey = mysqli_query($link,"INSERT INTO `britischessentialallocation`(`EssentialAspectsID`, `CoreAreaID`, `CampusID`,
            `ClassOrDepartmentID`, `AssessmentkeyID`, `Session`, `TermOrSemesterID`, `StudentID`, `Remark`) 
            VALUES ('$remarkEssentialAspectsID[$i]','$remarkcorearea[$i]','$abba_campus_id','$ClassOrDepartmentID','0','$Session','$TermOrSemesterID','$remarkstudid[$i]','$newremark')");
            
        } 
    }
    
    for($i=0; $i<$countteacher_comment_corearea; $i++)
    {
        $teacher_comment_corearea[$i];
        $newteachercomment =   str_replace('####','',$teacher_comment[$i]);
        $teacher_comment_studid[$i];
        
        
        $checkifexist = mysqli_query($link,"SELECT * FROM `britishcoreareacomments` WHERE CampusID = '$abba_campus_id' AND `Session`='$Session' AND 
        `TermOrSemesterID`='$TermOrSemesterID' AND `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `StudentID`='$teacher_comment_studid[$i]' AND `CoreAreaID`='$teacher_comment_corearea[$i]'");
        
        $count = mysqli_num_rows($checkifexist);
        
        if($count > 0)
        {
            
            $updatecomment = mysqli_query($link,"UPDATE `britishcoreareacomments` SET `TeachersCoreAreaComment`='$newteachercomment' WHERE `CoreAreaID`='$teacher_comment_corearea[$i]'
            AND `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `TermOrSemesterID`='$TermOrSemesterID' AND `Session`='$Session' AND `StudentID`='$teacher_comment_studid[$i]' AND CampusID = '$abba_campus_id'");
            
        }
        else
        {
            
            $insertcomment = mysqli_query($link,"INSERT INTO `britishcoreareacomments`(`CampusID`, `Session`, `TermOrSemesterID`, 
            `ClassOrDepartmentID`, `StudentID`, `CoreAreaID`, `TeachersCoreAreaComment`, `DateCreated`) 
            VALUES ('$abba_campus_id','$Session','$TermOrSemesterID','$ClassOrDepartmentID','$teacher_comment_studid[$i]','$teacher_comment_corearea[$i]','$newteachercomment','$DateCreated')");
            
            $insertreport = mysqli_query($link,"INSERT INTO `britishreports`(`CampusID`, `Session`, `TermOrSemesterID`, 
            `ClassOrDepartmentID`, `CoreAreaID`, `StudentID`, `DateCreated`) 
            VALUES ('$abba_campus_id','$Session','$TermOrSemesterID','$ClassOrDepartmentID','$teacher_comment_corearea[$i]','$teacher_comment_studid[$i]','$DateCreated')");
        } 
    }
    
    for($i=0; $i<$countoverall_comment_studid; $i++)
    {
        $overall_comment_studid[$i];
        
        $newoverall_comment =   str_replace('####','',$overall_comment[$i]);
        
        $sqlcheck = mysqli_query($link,"SELECT * FROM `britishoverallcomments` WHERE CampusID = '$abba_campus_id' AND 
        `Session`='$Session' AND `TermOrSemesterID`='$TermOrSemesterID' AND `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `StudentID`='$overall_comment_studid[$i]'");
        
        $count = mysqli_num_rows($sqlcheck);
        
        if($count > 0)
        {
            $sqltoupdate = mysqli_query($link,"UPDATE `britishoverallcomments` SET `OverallComment`='$newoverall_comment' 
            WHERE CampusID = '$abba_campus_id' AND `Session`='$Session' AND `TermOrSemesterID`='$TermOrSemesterID' AND `StudentID`='$overall_comment_studid[$i]'");
        }
        else
        {
            $sqlinsert = mysqli_query($link,"INSERT INTO `britishoverallcomments`(`CampusID`, `Session`, `TermOrSemesterID`, 
            `ClassOrDepartmentID`, `StudentID`, `OverallComment`, `DateCreated`) VALUES ('$abba_campus_id','$Session','$TermOrSemesterID','$ClassOrDepartmentID','$overall_comment_studid[$i]','$newoverall_comment','$DateCreated')");   
        }
    }
    
    for($i=0; $i<$countAssessmentKeyID; $i++)
    {
        $AssessmentKeyID[$i];
        $AssessmentKeyIDstdid[$i];
        $students_assessmentessentialid[$i];
        
        $sqlupdateassessmentkey = mysqli_query($link,"UPDATE `britischessentialallocation` SET `AssessmentkeyID`='$AssessmentKeyID[$i]' WHERE `EssentialAspectsID`='$students_assessmentessentialid[$i]' AND CampusID = '$abba_campus_id' AND `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `Session`='$Session' AND `TermOrSemesterID`='$TermOrSemesterID' AND `StudentID`='$AssessmentKeyIDstdid[$i]'");
         
    }

    $stud_id = $_POST['StudentID'];

    $sql_student = mysqli_query($link,"SELECT * FROM `student` WHERE `StudentID`='$stud_id' AND CampusID = '$abba_campus_id'");
    $fetch_student = mysqli_fetch_assoc($sql_student);

    $sql_classordepartment = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `ClassOrDepartmentID` = '$ClassOrDepartmentID' AND CampusID = '$abba_campus_id'");
    $fetch_classordepartment = mysqli_fetch_assoc($sql_classordepartment);

    $activity_log_inst_camp_id = $abba_campus_id;
    $activity_log_userid = $_POST['user_id'];
    $activity_log_usertype = $_POST['user_type'];
    $activity_log_description = 'Entered british result for '.$fetch_student['StudentFirstName'].' '.$fetch_student['StudentLastName'].' in '.$fetch_classordepartment['ClassOrDepartmentName'].'';
    $activity_log_longitude = $_POST['longitude'];
    $activity_log_latitude = $_POST['latitude'];

    insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);

?>