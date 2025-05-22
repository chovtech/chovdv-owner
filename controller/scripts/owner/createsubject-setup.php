<?php

include('../../config/config.php');

$userid = $_POST['UserID'];
$campusID = $_POST['campusID'];
$tagstate = $_POST['tagstate'];

$subject = explode(',', $_POST['subject']);
$classnameID = explode(',', $_POST['classname']);

$isert_query_pros = false;

foreach ($subject as $key => $subjectnamearr) {
    $classIDarr = $classnameID[$key];

    // Check if subject already allocated
    $verifysubject = mysqli_query($link, "SELECT * FROM `courseorsubjectallocation` 
        WHERE `ClassOrDepartmentID`='$classIDarr' 
        AND `CampusID`='$campusID' 
        AND `SubjectOrCourseID`='$subjectnamearr'");

    if (mysqli_num_rows($verifysubject) > 0) {
        // Already exists — still mark as success
        $isert_query_pros = true;
    } else {
        // Insert new allocation
        $insert_subject = mysqli_query($link, "INSERT INTO `courseorsubjectallocation`
            (`CampusID`, `ClassOrDepartmentID`, `SubjectOrCourseID`) 
            VALUES ('$campusID','$classIDarr','$subjectnamearr')");

        if ($insert_subject) {
            $isert_query_pros = true;
        }
    }
}

if ($isert_query_pros) {
    echo 'success';

    // Update tag state
    mysqli_query($link, "UPDATE `campus` SET `TagState`='$tagstate' WHERE `CampusID`='$campusID'");
} else {
    echo 'failed';
}

// Log the activity
// $activity_log_description = "Created Subject for Campus ID: $campusID";
// insert_activity_log($campusID, $userid, 'owner', $activity_log_description, '0', '0', $link, getClientIp());


?>

    