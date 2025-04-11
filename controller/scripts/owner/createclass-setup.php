<?php
    include('../../config/config.php');
    
    $userid = $_POST['UserID'];
    $campusID = $_POST['campusID'];
    $tagstate = $_POST['tagstate'];
    $classnames = explode(',', $_POST['classname']);
    $facultyIDs = explode(',', $_POST['FacultyID']);
    $classlistIDs = explode(',', $_POST['ClasslistID']);
    
    // CREATE CLASSES FOR SETUP
    foreach ($classnames as $key => $className) {
        $facultyID = $facultyIDs[$key];
        $classlistID = $classlistIDs[$key];
    
        $classVerify = mysqli_query($link, "SELECT * FROM `classordepartment` WHERE ClassOrDepartmentName='$className' AND CampusID='$campusID' AND SectionID='$facultyID'");
        $classVerifyRowCount = mysqli_num_rows($classVerify);
    
        if ($classVerifyRowCount > 0) {
            $updateAistate = mysqli_query($link, "UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'");
           
        } else {
            $insertClass = mysqli_query($link, "INSERT INTO `classordepartment`(`ClassTemplateID`, `SectionID`, `CampusID`, `ClassOrDepartmentName`) VALUES ('$classlistID', '$facultyID', '$campusID', '$className')");
            $updateAistate = mysqli_query($link, "UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'");
            
        }
    }
    
    if($updateAistate == true)
    {
             echo 'success';   
    }else
    {
        echo 'failed';
    }
    // CREATE CLASSES FOR SETUP
?>
