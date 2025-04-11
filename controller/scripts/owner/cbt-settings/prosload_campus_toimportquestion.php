<?php

                include('../../../config/config.php');

               $instituion_id = trim($_POST['tari_get_stored_instituion_id']);

               $select_campus = mysqli_query($link, "SELECT * FROM `campus` WHERE InstitutionID='$instituion_id' AND `CampusTrashStatus`='0'");
               $select_campus_row = mysqli_num_rows($select_campus);
               $select_campus_fetch = mysqli_fetch_assoc($select_campus);


               if($select_campus_row  > 0)
               {



                                 echo '<option value="all">All</option>';

                                do{
                                                $CampusName =  $select_campus_fetch['CampusName'];
                                                $CampusID =  $select_campus_fetch['CampusID'];


                                            echo '<option value="'.$CampusID.'">'.$CampusName.'</option>';

                                }while($select_campus_fetch = mysqli_fetch_assoc($select_campus));

               }else
               {

               }


?> 