<?php
        include('../../config/config.php');

        $facultyID = explode(',', $_POST['FacultyID']);
                $schoolhead  =  explode(',',$_POST['schoolheadchecked']);
        // $campusID  = $_POST['campusID'];

        $tagstate  = $_POST['tagstate'];
        $UserID  = $_POST['UserID'];
        $campusID  = $_POST['campusID'];

        $uniqueArray = array_unique($facultyID);

        foreach($uniqueArray as $key => $facultyIDnew) 
        {

                $facultyIDnew;

                $headnew =  $schoolhead [$key];
                
                $sqlGetSchool = ("UPDATE `section` SET `PrincipalOrDeanOrHeadTeacherUserID`='$headnew' WHERE CampusID='$campusID' AND SectionID='$facultyIDnew'");
                $resultGetSchool = mysqli_query($link, $sqlGetSchool);


                $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'"); 

        }    

?>