<?php
        include('../../config/config.php');
        $userid  = $_POST['UserID'];
        $defaultschooltype  = $_POST['schooltype'];
        $tagstate  = $_POST['tagid'];
        
        $updateaistate = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `TagState`='$tagstate' WHERE  `AgencyOrSchoolOwnerID`='$userid'");
?>
