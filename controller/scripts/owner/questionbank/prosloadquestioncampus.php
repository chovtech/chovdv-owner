<?php


        include('../../../config/config.php');

        $prosloadinstitutionid = $_POST['prosloadinstitutionid'];
        
       



         // get campus
         $check_campus = "SELECT * FROM `campus` WHERE InstitutionID='$prosloadinstitutionid' ORDER BY CampusName ASC";
   
        $query_campus = mysqli_query($link,$check_campus);
        $fetch_campus= mysqli_fetch_assoc($query_campus);
        $row_campus = mysqli_num_rows($query_campus);

        if($row_campus  > 0)
        {

            echo '<option value="NULL">Select Campus</option>';

               do{


                $CampusName = $fetch_campus['CampusName'];
                $CampusID = $fetch_campus['CampusID'];
                

                echo '<option value="'.$CampusID.'">'.$CampusName.'</option>';

               }while($fetch_campus= mysqli_fetch_assoc($query_campus));

        }else
        {


            echo '<option value="NULL">No campus found</option>';
        }

     ?>