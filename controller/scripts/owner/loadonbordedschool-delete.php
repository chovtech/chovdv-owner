<?php


         include('../../config/config.php');

         $SchoolID = $_POST['SchoolID'];
         $UserID  = $_POST['UserID'];




         
         date_default_timezone_set('Africa/Lagos');

               

         // Create a DateTime object representing the current date and time
         $currentDate = new DateTime();

         // Add 2 weeks to the current date
         $currentDate->modify('+2 weeks');

         // Format the date as a string in the Nigerian format (dd/mm/yyyy)
         $newDate = $currentDate->format('d/m/Y');



         $deleteschoolquery = mysqli_query($link,"UPDATE `institution` SET `TrashStatus`='1',
         `TrashPeriod`='$newDate' WHERE InstitutionID='$SchoolID'");



        if($deleteschoolquery == true)
        {


                    $select_campusschooleteed = mysqli_query($link,"SELECT * FROM `campus` WHERE InstitutionID='$SchoolID'");
                    $select_campusschooleteed_cnt = mysqli_num_rows($select_campusschooleteed);
                    $select_campusschooleteed_cnt_row = mysqli_fetch_assoc($select_campusschooleteed);




                    if($select_campusschooleteed_cnt > 0)
                    {

                                    do{


                                            $CampusID = $select_campusschooleteed_cnt_row['CampusID'];


                                            $updatecampus_statushere = mysqli_query($link,"UPDATE `campus` SET `CampusTrashStatus`='1',`TrashPeriod`='$newDate'
                                            WHERE CampusID='$CampusID' AND InstitutionID='$SchoolID'");

                                            // $deletescetionhere = mysqli_query($link,"UPDATE `section` SET `SectionTrashStatus`='1',
                                            // `TrashDuration`='$newDate' WHERE CampusID='$CampusID'");



                                        
                                    }while(  $select_campusschooleteed_cnt_row = mysqli_fetch_assoc($select_campusschooleteed));
                        
                    }else
                    {

                    }




            
            
                    echo 'success';

        }else
        {
                  echo 'failed';
        }



?>