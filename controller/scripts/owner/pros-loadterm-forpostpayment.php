<?php

   
            include('../../config/config.php');


               $campusID = $_POST['campusID'];  
            
            $selectteraliashere = mysqli_query($link,"SELECT * FROM `termorsemester` INNER JOIN `termalias` ON 
             `termorsemester`.`TermOrSemesterID` = `termalias`.`TermOrSemesterID` WHERE `termalias`.`CampusID`='$campusID'");

            $selectteraliasherecnt = mysqli_num_rows($selectteraliashere);
            $selectteraliasherecntrow = mysqli_fetch_assoc($selectteraliashere);


            if( $selectteraliasherecnt > 0)
            {

                                do{

                                    

                                   $TermAliasName =  $selectteraliasherecntrow['TermAliasName'];
                                   $TermOrSemesterID =  $selectteraliasherecntrow['TermOrSemesterID'];
                                   $status =  $selectteraliasherecntrow['status'];
                                  


                                    if ($status == '1') {
                                        $prosselectcurrentterm = 'selected';
                                    } else {
                                        $prosselectcurrentterm = '';
                                    }

                                echo '<option ' . $prosselectcurrentterm . ' value="' . $TermOrSemesterID . '">' .$TermAliasName . '</option>';

                                   


                                }while($selectteraliasherecntrow = mysqli_fetch_assoc($selectteraliashere));      
            }else
            {
                     echo '<option value="NULL">No term found</option>';
            }


           


?>