<?php

        include('../../config/config.php');
       
        $schoolurl = $_POST['schoolurl'];
        $schoolname = mysqli_real_escape_string($link,$_POST['schoolname']);
        $schoolmotto  = mysqli_real_escape_string($link,$_POST['schoolmotto']);
        $InstitutionID  = $_POST['InstitutionID'];
        $UserID  = $_POST['UserID'];

        $updateschool = mysqli_query($link," UPDATE `institution` SET `InstitutionGeneralName`='$schoolname',
        `InstitutionMotto`='$schoolmotto ',`CustomUrl`='$schoolurl' WHERE InstitutionID='$InstitutionID' AND AgencyOrSchoolOwnerID='$UserID'");

        if($updateschool == true)
        {
            echo 'success';

        }else
        {
            echo 'failed';
        }
 
        

        
       
       
         

       
        

      

       
               
               
              
        

?>