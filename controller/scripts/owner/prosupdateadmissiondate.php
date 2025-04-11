<?php
            include('../../config/config.php');
            
            $InstitutionID = $_POST['InstitutionID'];
            $UserID = $_POST['UserID'];
            $enddate = $_POST['enddate'];
            $startdate = $_POST['startdate'];
            
            $selectwebsettingsverify = mysqli_query($link, "SELECT * FROM `webadmissionsetting` WHERE InstitutionID='$InstitutionID'");
            $selectwebsettingsverifycnct = mysqli_num_rows($selectwebsettingsverify);
            $selectwebsettingsverifycnctrow = mysqli_fetch_assoc($selectwebsettingsverify);
            
            if ($selectwebsettingsverifycnct > 0) {
                
                $updatetimeuration = mysqli_query($link, "UPDATE `webadmissionsetting` SET `StartDate`='$startdate', `EndDate`='$enddate' WHERE InstitutionID='$InstitutionID'");
            } else {
                
                $updatetimeuration = mysqli_query($link, "INSERT INTO `webadmissionsetting`(`InstitutionID`, `StartDate`, `EndDate`) VALUES ('$InstitutionID','$startdate','$enddate')");
            }
            
            if ($updatetimeuration == true) {
                echo 'success';
            } else {
                echo 'failed';
            }
?>
