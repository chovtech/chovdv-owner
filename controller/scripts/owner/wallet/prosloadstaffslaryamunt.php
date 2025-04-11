

<?php




        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');

        $InstitutionID = $_POST['InstitutionID'];
        $staffID = $_POST['staffID'];
        
        
        
        
        
        
        $prosgetstaffrecordcontent = mysqli_query($link, "SELECT * FROM `staff` 
        WHERE 
         InstitutionID='$InstitutionID' AND  `StaffID`='$staffID' ORDER BY StaffLastName ASC");
        
        $prosgetstaffrecordcontent_cnt = mysqli_num_rows($prosgetstaffrecordcontent);
        $prosgetstaffrecordcontent_row = mysqli_fetch_assoc($prosgetstaffrecordcontent);
        
        
        if($prosgetstaffrecordcontent_cnt > 0)
        {
            
            
                   
                   
                   
                   
                    $StaffLastName = $prosgetstaffrecordcontent_row['StaffLastName']; 
                    $StaffFirstName = $prosgetstaffrecordcontent_row['StaffFirstName'];
                    // $StaffID = $prosgetstaffrecordcontent_row['StaffID'];
                   echo $StaffSalary = $prosgetstaffrecordcontent_row['StaffSalary'];
                    
                    
                
      
          
              
        }
        
        
        






?>