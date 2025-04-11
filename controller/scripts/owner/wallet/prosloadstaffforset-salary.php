<?php




        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');

        $InstitutionID = $_POST['InstitutionID'];
        
        
        
        
        $prosgetstaffrecordcontent = mysqli_query($link, "SELECT * FROM `staff` 
        WHERE NOT EXISTS(SELECT * FROM `deactivateuser` WHERE `deactivateuser`.`UserID` =  `staff`.`StaffID` AND `deactivateuser`.`UserType`='staff')
        AND InstitutionID='$InstitutionID'  ORDER BY StaffLastName ASC");
        
        $prosgetstaffrecordcontent_cnt = mysqli_num_rows($prosgetstaffrecordcontent);
        $prosgetstaffrecordcontent_row = mysqli_fetch_assoc($prosgetstaffrecordcontent);
        
        
        if($prosgetstaffrecordcontent_cnt > 0)
        {
            
            
                          echo '<option value="NULL">Select staff</option>';
               do{
                   
                   
                   
                    $StaffLastName = $prosgetstaffrecordcontent_row['StaffLastName']; 
                    $StaffFirstName = $prosgetstaffrecordcontent_row['StaffFirstName'];
                    $StaffID = $prosgetstaffrecordcontent_row['StaffID'];
                    
                    
                    
                   echo '<option value="'.$StaffID.'">'.$StaffLastName.' '.$StaffFirstName.'</option>';
                    
                     
                   
               }while($prosgetstaffrecordcontent_row = mysqli_fetch_assoc($prosgetstaffrecordcontent));
        }else
        {
          
              echo '<option value="NULL">No staff found</option>';
        }
        
        
        






?>