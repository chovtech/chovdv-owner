

<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../controller/config/config.php');
    
    include('../../controller/config/config2.php');
    
    
    
        $selectcampus = mysqli_query($link, "SELECT * FROM `campus`");
        $selectcampuscnt = mysqli_num_rows($selectcampus);
        $selectcampuscnt_row = mysqli_fetch_assoc($selectcampus);
     
     
     
     if( $selectcampuscnt > 0)
     {
             do{
                 
                 
                  $updateinstitution =   $selectcampuscnt_row['InstitutionID'];
                  $CampusID =   $selectcampuscnt_row['CampusID'];
                  
                //   $UserPassword =   $selectcampuscnt_row['UserPassword'];
                  
                   
                  
                //  $UserPasswordnew =   md5($UserPassword);
                  
                  
                  
                  $updateinstitution = mysqli_query($link,"UPDATE `parent` SET `InstitutionID`='$updateinstitution' WHERE `InstitutionID`='$CampusID'");
                  
                  
                 
             }while($selectcampuscnt_row = mysqli_fetch_assoc($selectcampus));
     }
     
    
   

   
    
    

?>