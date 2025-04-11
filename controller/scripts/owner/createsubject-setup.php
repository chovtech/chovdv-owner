<?php

    include('../../config/config.php');
    $userid = $_POST['UserID'];
    $campusID = $_POST['campusID'];

    $tagstate = $_POST['tagstate'];
    $subject = explode(',', $_POST['subject']);
    $classnameID = explode(',', $_POST['classname']);


    foreach ($subject as $key => $subjectnamearr) {

        $subjectnamearr;
        $classIDarr = $classnameID[$key];


        $verifysubject = mysqli_query($link, "SELECT * FROM `courseorsubjectallocation` WHERE `ClassOrDepartmentID`='$classIDarr' AND `CampusID`='$campusID' AND `SubjectOrCourseID`='$subjectnamearr'");
        $verifysubjectcnt_rows = mysqli_num_rows($verifysubject);
        $verifysubjectcnt_rowscnt = mysqli_fetch_assoc($verifysubject);


        if ($verifysubjectcnt_rows > 0) {

                $subjectIDnew = $verifysubjectcnt_rowscnt['SubjectOrCourseID'];
              

                $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'"); 



        } else {

                $insert_subject = mysqli_query($link, "INSERT INTO `courseorsubjectallocation`(`CampusID`, `ClassOrDepartmentID`, `SubjectOrCourseID`) VALUES ('$campusID','$classIDarr','$subjectnamearr')");

                $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'"); 
               
        }

    }

    if($updateaistate  == true)
    {
         echo 'success';
    }else
    {
        echo 'failed';

    }



?>