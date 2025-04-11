

<?php




        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');

        $InstitutionID = $_POST['InstitutionID'];
        $staffID = $_POST['staffID'];
        $prosAmount = $_POST['prosAmount'];
        
        
        $updatestaffsalary = mysqli_query($link,"UPDATE `staff` SET `StaffSalary`='$prosAmount' WHERE InstitutionID='$InstitutionID' AND StaffID='$staffID'");
      
      
         if($updatestaffsalary == true)
         {
                echo '1';
                
         }else
         {
              echo '2';
         }

        
       
        
        






?>