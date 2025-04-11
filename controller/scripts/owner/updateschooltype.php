<?php
        include('../../config/config.php');
        $userid  = $_POST['UserID'];
        $schooltype  = $_POST['schooltype'];
        // $defaullang  = $_POST['defaultlang'];
        $tagstate  = $_POST['tagID'];
        $updateaistate = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `TagState`='$tagstate',`EducationType`='$schooltype' WHERE  `AgencyOrSchoolOwnerID`='$userid'");
?>

