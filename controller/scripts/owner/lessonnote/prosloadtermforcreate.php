<?php


                include('../../../config/config.php');

            
               
                $instutitionID = $_POST['instutitionID'];
                 $campusid = $_POST['campusid'];



              
                 $progettermsql = mysqli_query($link, "SELECT * FROM `termalias` INNER JOIN `termorsemester` ON `termalias`.`TermOrSemesterID` = `termorsemester`.`TermOrSemesterID` WHERE `termalias`.`CampusID`='$campusid '");

                 $progettermsql_cnt = mysqli_num_rows($progettermsql);
                 $progettermsql_cnt_row = mysqli_fetch_assoc($progettermsql);
 
 
                 if($progettermsql_cnt  > 0)  
                 {
 
 
                          echo '<option value="NULL">Select Term</option>';
 
                             do{
 
 
                               $TermAliasName =   $progettermsql_cnt_row['TermAliasName'];
                               $TermOrSemesterID =   $progettermsql_cnt_row['TermOrSemesterID'];
                               $statusnew =   $progettermsql_cnt_row['status'];
 
 
                               if($statusnew == '1')
                               {
                                   $prosloadstatus = 'selected';
                               }else
                               {
                                 $prosloadstatus = '';
                               }
 
                                  echo '<option '.$prosloadstatus .' value="'.$TermOrSemesterID.'">'.$TermAliasName.'</option>';
 
                             }while($progettermsql_cnt_row = mysqli_fetch_assoc($progettermsql));
                 }else
                 {
 
                     echo '<option value="NULL">No term found!</option>';
 
                 }
 
 


 ?>