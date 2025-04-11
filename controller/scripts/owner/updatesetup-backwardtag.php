<?php
        include('../../config/config.php');

        // UPDATE TAG IF SKIP TO CREATE OTHER STAFF LIKE ADMIN

        $tagstate  = $_POST['getback_wardbtn'];
        $UserID  = $_POST['UserID'];
        $CampusID  = $_POST['campusID'];

        $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$CampusID'"); 
        // UPDATE TAG IF SKIP TO CREATE OTHER STAFF LIKE ADMIN
?>