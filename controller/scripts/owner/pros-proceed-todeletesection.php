<?php

                include('../../config/config.php');

                
                $IntitutionID = $_POST['IntitutionID'];
                $campusID = $_POST['campusID'];
                 $sectionID = $_POST['sectionID'];


                date_default_timezone_set('Africa/Lagos');

               

                // Create a DateTime object representing the current date and time
                $currentDate = new DateTime();

                // Add 2 weeks to the current date
                $currentDate->modify('+2 weeks');

                // Format the date as a string in the Nigerian format (dd/mm/yyyy)
                $newDate = $currentDate->format('d/m/Y');

                
                 // Output the new date in the Nigerian format



                $deletescetionhere = mysqli_query($link,"UPDATE `section` SET `SectionTrashStatus`='1',`TrashDuration`='$newDate' WHERE  SectionID='$sectionID'");
               

                 if($deletescetionhere == true)
                 {
                     echo 'success';
                 }else
                {
                    echo 'failed';  
                }


                


                





    ?>