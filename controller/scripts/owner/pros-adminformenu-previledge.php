<?php

        include('../../config/config.php');

        $IntitutionID = $_POST['IntitutionID'];
        $UserID = $_POST['UserID'];

        $selectstaff = mysqli_query($link, "SELECT * FROM `staff` WHERE InstitutionID='$IntitutionID' AND `Role`='admin'");
        $selectstaffcnt = mysqli_num_rows($selectstaff);
        $selectstaffcntrow = mysqli_fetch_assoc($selectstaff);


        if($selectstaffcnt > 0)
        {


               do{


                   $staff_f_name =  $selectstaffcntrow['StaffFirstName'];
                   $staff_l_name =  $selectstaffcntrow['StaffLastName'];
                   $StaffID =  $selectstaffcntrow['StaffID'];
                   $StaffPhoto =  $selectstaffcntrow['StaffPhoto'];


                   if($StaffPhoto == '')
                   {
                       $StaffPhotonew = 'data:image/png;base64,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'; 
                   }else
                   {
                      $StaffPhotonew = $StaffPhoto;
                   }

                      echo '<li class="option prosgeneraladmin-select" data-staff="'.$staff_f_name.' '.$staff_l_name.'" data-id="'.$StaffID.'" >&nbsp;
                                <img src="'.$StaffPhotonew.'" width="50">

                                    <span class="option-text">'.$staff_f_name.' '.$staff_l_name.'</span>
                      </li>';

                    
               }while($selectstaffcntrow = mysqli_fetch_assoc($selectstaff));

               
        }else
        {
              
        }
?>