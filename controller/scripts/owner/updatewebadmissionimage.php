<?php
        include('../../config/config.php');
        $UserID = $_POST['UserID'];
        $InstitutionID = $_POST['IntitutionID'];
        $Image = $_POST['image'];
        
        $selectwebsettingsverify = mysqli_query($link, "SELECT * FROM `webadmissionsetting` WHERE InstitutionID='$InstitutionID'");
        $selectwebsettingsverifycnct = mysqli_num_rows($selectwebsettingsverify);
        
        if ($selectwebsettingsverifycnct > 0) {
            $uploadimage = mysqli_query($link, "UPDATE `webadmissionsetting` SET BackgroundImage='$Image' WHERE InstitutionID='$InstitutionID'");
        } else {
            $uploadimage = mysqli_query($link, "INSERT INTO `webadmissionsetting` (`InstitutionID`, `BackgroundImage`) VALUES ('$InstitutionID', '$Image')");
        }
        
        if ($uploadimage === true) {
            echo 'success';
        } else {
            echo 'failed';
        }
?>
