<?php
// Include the configuration file
include('../../config/config.php');

// Retrieve data from POST request
$userid = mysqli_real_escape_string($link, $_POST['UserID']);
$campusID = mysqli_real_escape_string($link, $_POST['campusID']);
$tagstate = mysqli_real_escape_string($link, $_POST['tagstate']);
$groupSchoolID = mysqli_real_escape_string($link, $_POST['groupSchoolID']);
$maincampus = mysqli_real_escape_string($link, $_POST['maincampus']);

// Check if the user exists in the database
$select_schoolowner = mysqli_query($link, "SELECT * FROM `campus` WHERE InstitutionID='$groupSchoolID' AND CampusID ='$campusID'");
$select_schoolowner_row_cnt = mysqli_num_rows($select_schoolowner);

if ($select_schoolowner_row_cnt > 0) {
    while ($select_schoolowner_row = mysqli_fetch_assoc($select_schoolowner)) {
        $tagstatus = $select_schoolowner_row['TagState'];

        if ($tagstatus != '29') {
            // Process sections
            $delect_section_new = mysqli_query($link, "SELECT * FROM `section` WHERE CampusID='$maincampus' ORDER BY SectionName ASC");

            while ($delect_section_cnt_row_new = mysqli_fetch_assoc($delect_section_new)) {
                $section_name_new = $delect_section_cnt_row_new['SectionName'];
                $facultyID_new = $delect_section_cnt_row_new['SectionID'];
                $SectionListIDnew = $delect_section_cnt_row_new['SectionListID'];
                $schoolheadID = $delect_section_cnt_row_new['PrincipalOrDeanOrHeadTeacherUserID'];

                // Check if the section exists in the current campus
                $sqlGetSchool = "SELECT * FROM `section` WHERE CampusID='$campusID' AND SectionName='$section_name_new'";
                $resultGetSchool = mysqli_query($link, $sqlGetSchool);
                $row_cntGetSchool = mysqli_num_rows($resultGetSchool);

                if ($row_cntGetSchool == 0) {
                    // Insert the section if it doesn't exist
                    $sqlInsertIntoScoolFacylty = "INSERT INTO `section` (`CampusID`, `SectionListID`, `SectionName`, `PrincipalOrDeanOrHeadTeacherUserID`) VALUES ('$campusID', '$SectionListIDnew', '$section_name_new', '0')";
                    $resultInsertIntoScoolFacylty = mysqli_query($link, $sqlInsertIntoScoolFacylty);
                    $lastInsertIdsection = mysqli_insert_id($link);

                    // Process classes
                    $sqlGetSchool_class_new = "SELECT * FROM `classordepartment` WHERE CampusID='$maincampus' AND SectionID='$facultyID_new'";
                    $resultGetSchool_class_new = mysqli_query($link, $sqlGetSchool_class_new);

                    if ($resultGetSchool_class_new) {
                        while ($rowGetSchool_class_new = mysqli_fetch_assoc($resultGetSchool_class_new)) {
                            $classnametwo = $rowGetSchool_class_new['ClassOrDepartmentName'];
                            $classnametwoID = $rowGetSchool_class_new['ClassOrDepartmentID'];
                            $ClassTemplateIDgotten = $rowGetSchool_class_new['ClassTemplateID'];
                            $HODteacher = $rowGetSchool_class_new['HODOrFormTeacherUserID'];

                            // Insert classes if they don't exist
                            $insertclassimport = mysqli_query($link, "INSERT INTO `classordepartment`(`SectionID`, `ClassTemplateID`, `CampusID`, `ClassOrDepartmentName`, `HODOrFormTeacherUserID`) VALUES ('$lastInsertIdsection', '$ClassTemplateIDgotten', '$campusID', '$classnametwo', '$HODteacher')");
                            $insertclassimportlastid = mysqli_insert_id($link);

                            // Process subjects/courses
                            $subjectcollected = mysqli_query($link, "SELECT * FROM `courseorsubjectallocation` INNER JOIN `subjectorcourse` ON `courseorsubjectallocation`.`SubjectOrCourseID` = `subjectorcourse`.`SubjectOrCourseID` WHERE `courseorsubjectallocation`.`CampusID`='$maincampus' AND courseorsubjectallocation.ClassOrDepartmentID='$classnametwoID'");
                            while ($subjectcollectedroewcnt = mysqli_fetch_assoc($subjectcollected)) {
                                $SubjectOrCourseID = $subjectcollectedroewcnt['SubjectOrCourseID'];
                                $CourseOrSubjectTeacherUserIDnew = $subjectcollectedroewcnt['CourseOrSubjectTeacherUserID'];

                                // Check if the allocation exists for this campus, class, and subject/course
                                $sqlCheckAllocation = "SELECT * FROM `courseorsubjectallocation` WHERE `CampusID`='$campusID' AND `ClassOrDepartmentID`='$lastInsertIdsection' AND `SubjectOrCourseID`='$SubjectOrCourseID'";
                                $resultCheckAllocation = mysqli_query($link, $sqlCheckAllocation);
                                $row_cntCheckAllocation = mysqli_num_rows($resultCheckAllocation);

                                if ($row_cntCheckAllocation == 0) {
                                    // Insert subject/course allocation if it doesn't exist
                                    $updatesubject = mysqli_query($link, "INSERT INTO `courseorsubjectallocation`(`CampusID`, `ClassOrDepartmentID`, `SubjectOrCourseID`, `CourseOrSubjectTeacherUserID`) VALUES ('$campusID','$lastInsertIdsection','$SubjectOrCourseID','$CourseOrSubjectTeacherUserIDnew')");
                                }
                            }
                        }
                    }
                }
            }

            // Process term aliases
            $select_termalias = mysqli_query($link, "SELECT * FROM `termalias` WHERE CampusID='$maincampus'");
            while ($select_termaliascntrow = mysqli_fetch_assoc($select_termalias)) {
                $TermAliasName = $select_termaliascntrow['TermAliasName'];
                $TermOrSemesterID = $select_termaliascntrow['TermOrSemesterID'];

                // Insert term aliases
                $updatetermalis = mysqli_query($link, "INSERT INTO `termalias`(`TermAliasName`, `TermOrSemesterID`, `CampusID`) VALUES ('$TermAliasName','$TermOrSemesterID','$campusID')");
            }
        }
    }

    // Update the tag state
    $updatetag = mysqli_query($link, "UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'");

    if ($updatetag) {
        echo 'success';
    } else {
        echo 'failed';
    }
} else {
    echo 'School not found.';
}
?>
