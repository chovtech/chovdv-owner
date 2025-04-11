<?php


        include('../../config/config.php');

        $userID = $_POST['UserID'];
        $InstitutionID  = $_POST['InstitutionID'];

       
    
        $selectcampus_selected = mysqli_query($link,"SELECT * FROM `staff` INNER JOIN `campus` ON `staff`.`StaffID` = `campus`.`Admin` WHERE `staff`.`StaffID`='$userID' AND `campus`.`InstitutionID`='$InstitutionID'");
        $selectcampus_selectedcnt = mysqli_num_rows($selectcampus_selected);
        $selectcampus_selectedcntrows = mysqli_fetch_assoc($selectcampus_selected);




        if( $selectcampus_selectedcnt > 0)
        {


                    echo '<option value="NULL">Select campus</option>';

                    do{


                        $CampusName = $selectcampus_selectedcntrows['CampusName'];
                        $CampusID = $selectcampus_selectedcntrows['CampusID'];

                        echo '<option value="'.$CampusID.'">'.$CampusName.'</option>';

                    }while($selectcampus_selectedcntrows = mysqli_fetch_assoc($selectcampus_selected));
        }else
        {
                    echo '  <option value="NULL">Campus not found</option>';
        }



?>