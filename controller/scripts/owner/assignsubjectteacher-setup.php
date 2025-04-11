<?php
    //Include database connection
    include ('../../config/config.php');

    $UserID = $_POST['UserID'];
    $staffID = $_POST['staffID'];
  
   $classID = $_POST['classID'];
   $campusID = $_POST['campusID'];
   $subjecID = explode(',',$_POST['subjecID']);

   foreach($subjecID  as $subjecIDnew)
   {
         $subjecIDnew;

        $verifysubject_insert = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` WHERE CampusID='$campusID' AND ClassOrDepartmentID='$classID' AND SubjectOrCourseID='$subjecIDnew'");
        $verifysubject_insertcnt = mysqli_num_rows($verifysubject_insert);

        if($verifysubject_insertcnt > 0)
        {
                  $sqlAssignTeacher = ("UPDATE `courseorsubjectallocation` SET `CourseOrSubjectTeacherUserID` = '$staffID' WHERE `ClassOrDepartmentID` = '$classID' AND SubjectOrCourseID='$subjecIDnew' AND  CampusID='$campusID'");
                  $resultAssignTeacher = mysqli_query($link, $sqlAssignTeacher);

        }else
        {

            $sqlAssignTeacher = ("INSERT INTO `courseorsubjectallocation`(`CampusID`, `ClassOrDepartmentID`, `SubjectOrCourseID`, `CourseOrSubjectTeacherUserID`) VALUES ('$campusID','$classID','$subjecIDnew','$staffID')");
            $resultAssignTeacher = mysqli_query($link, $sqlAssignTeacher);
        }


        

   }
        // if successfully 
        if($resultAssignTeacher == true)
        {
            echo 'success';
        }
        // if successfully 

 
    
?>