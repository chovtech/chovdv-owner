<?php

            include('../../config/config.php');

            $pros_instituion_id = $_POST['abba_instituion_id'];
            $userID = $_POST['userID'];


            $selectverify_campus_new = mysqli_query($link, "SELECT  * FROM `campus` WHERE  FIND_IN_SET('$userID', `Admin`) > 0 AND  InstitutionID='$pros_instituion_id' ORDER BY CampusName ASC");
            $selectverify_campuscnt_new = mysqli_num_rows($selectverify_campus_new);
            $selectverify_campuscnt_row_new = mysqli_fetch_assoc($selectverify_campus_new);


            if($selectverify_campuscnt_new > 0)
            {
                            do{


                                $CampusName = $selectverify_campuscnt_row_new['CampusName'];
                                $CampusID = $selectverify_campuscnt_row_new['CampusID'];

                                echo '<option value="'.$CampusID.'">'.$CampusName.'</option>';
                                

                            }while($selectverify_campuscnt_row_new = mysqli_fetch_assoc($selectverify_campus_new));
            }else
            {
                
            }


           
   


?>