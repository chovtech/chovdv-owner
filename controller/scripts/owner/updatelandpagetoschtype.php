<?php
        include('../../config/config.php');
        $userid  = $_POST['UserID'];
        $tagstate  = $_POST['tagID'];
      
        $updatelang = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `TagState`='$tagstate' WHERE  `AgencyOrSchoolOwnerID`='$userid'");
?>