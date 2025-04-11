

<?php


        include('../../../config/config.php');

        $campus_id = trim($_POST['campus_id']);
        
       



         // get term
         $check_term = "SELECT * FROM `termalias` INNER JOIN `termorsemester` ON `termalias`.`TermOrSemesterID` = `termorsemester`.`TermOrSemesterID` WHERE `termalias`.`CampusID`='$campus_id'";
   
        $query_term = mysqli_query($link,$check_term);
        $fetch_term= mysqli_fetch_assoc($query_term);
        $row_term = mysqli_num_rows($query_term);

      

        if($row_term > 0)
        {

            echo '<option value="NULL">Select term</option>';

            do{


                $TermOrSemesterID = $fetch_term['TermOrSemesterID'];
                $TermAliasName = $fetch_term['TermAliasName'];
                $statusnew = $fetch_term['status'];

                if($statusnew == '1')
                {
                      $selectsub = 'selected';
                }else
                {
                    $selectsub = '';
                }
    

                
    
                 echo '<option '.$selectsub.' value="'.$TermOrSemesterID.'">'.$TermAliasName.'</option>';
    
    
            }while($fetch_term= mysqli_fetch_assoc($query_term));

        }else{

        }
        


       


      

       


        
?>
