<?php




            include('../../../config/config.php');

            $prosloadinstitutionid = $_POST['prosloadinstitutionid'];
          

                 $fetch = "SELECT * FROM `questionbank`  WHERE `InstitutionID` ='$prosloadinstitutionid'
                  AND  `Status`='0'";
                $prosquery = mysqli_query($link, $fetch);

                $num_row = mysqli_num_rows($prosquery);
                $fetch_row = mysqli_fetch_assoc($prosquery);

                if($num_row > 0){
                    echo '2';
                }else
                {
                     echo '1'; 
                }
              
               
           

       


    




?>