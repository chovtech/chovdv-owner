<?php
        include('../../config/config.php');
        
        $userID = $_POST['UserID'];
        $IntitutionID = $_POST['IntitutionID'];
        $admissionclasses = $_POST['classID'];
        $admissionclasses_campus = $_POST['campusID'];
        $classimexplodeforadmission = explode(',', $admissionclasses);
        $cmapusforclassimexplodeforadmission = explode(',', $admissionclasses_campus);
        
        foreach ($classimexplodeforadmission as $key => $newclassesarr) {
        
            $newclassesarr;
        
            $campusIDnew = $cmapusforclassimexplodeforadmission[$key];
            $selectquestionexisted = mysqli_query($link, "SELECT * FROM `admissionclass` WHERE `CampusID`='$campusIDnew' AND `AdmissionDefaultClassID`='$newclassesarr'");
            $selectquestionexistedrows = mysqli_num_rows($selectquestionexisted);
        
            if ($selectquestionexistedrows > 0) {
                $upateadmittedclass = mysqli_query($link, "UPDATE `admissionclass` SET `AdmissionDefaultClassID`='$newclassesarr' WHERE `CampusID`='$campusIDnew' AND `AdmissionDefaultClassID`='$newclassesarr'");
            } else {
                $upateadmittedclass = mysqli_query($link, "INSERT INTO `admissionclass`(`CampusID`, `AdmissionDefaultClassID`) VALUES ('$campusIDnew','$newclassesarr')");
            }
        
            if (!$upateadmittedclass) {
                // Handle database query error
                echo 'Error: ' . mysqli_error($link);
                exit(); // Terminate the script if there's an error
            }
        }
        
        if ($upateadmittedclass == true) {
            echo 'success';
        }
?>
