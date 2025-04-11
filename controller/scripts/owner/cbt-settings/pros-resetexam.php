<?php


    
        include('../../../config/config.php');
    
    
    
         $campusID = $_POST['campusID'];
         $settingsID = $_POST['ctbid'];
         $student_ID = $_POST['student_id'];
         $timeIN = $_POST['timeIN'];
         $timeOUT = $_POST['timeOUT'];
         $date = $_POST['date'];
         
         
         
         $update_settings = mysqli_query($link, "UPDATE `cbtsetquestionssettings` SET
         `AssesementDate`='$date',`AssesementStartTime`='$timeIN',`AssesementEndTime`='$timeOUT'
         WHERE `CampusID`='$campusID' AND `cbtsetquestionssettingsID`='$settingsID'");
         
         
        if($update_settings == true)
        {
            
            
            $update_student = mysqli_query($link, "UPDATE `cbtquestionsanswers` SET `objective_status`='0',
            `theory_status`='0',`ResultStatus`='0' WHERE `cbtquestionsanswersID`='$settingsID' 
            AND `StudentID`='$student_ID' AND `CampusID`='$campusID'");
            
            if($update_student == true)
            {
                
                echo 'success';
            }else
            {
                
                   echo 'failed';
                
            }
            
        }
         
         
        
        
        
        
?>