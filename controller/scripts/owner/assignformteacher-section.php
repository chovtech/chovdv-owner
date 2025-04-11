<?php
        include('../../config/config.php');

        $classID = explode(',', $_POST['ClassID']);
        $teacherID  =  explode(',',$_POST['fortteacherchecked']);
        
        $tagstate  = $_POST['tagstate'];
        $UserID  = $_POST['UserID'];
        $campusID  = $_POST['campusID'];
        

       $uniqueArray = array_unique($classID);

        foreach($classID as $key => $classIDnew) 
        {
                $classIDnew;

                $teachernewarr =    $teacherID[$key];
             
                $sqlGetSchool = ("UPDATE `classordepartment` SET `HODOrFormTeacherUserID`='$teachernewarr' WHERE CampusID='$campusID' AND ClassOrDepartmentID='$classIDnew'");
                $resultGetSchool = mysqli_query($link, $sqlGetSchool);
        }   
        
        if($tagstate == '')
        {

        }else
        {
                $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'"); 
        }

            

     
?>