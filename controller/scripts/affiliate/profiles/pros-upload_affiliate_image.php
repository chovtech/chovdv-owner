<?php



        include('../../../config/config.php');
        // $groupSchoolID = $_POST['groupSchoolID'];
        $Image  = $_POST['image'];
         $AffiliateID  = $_POST['AffiliateID'];
        

       $select_update = mysqli_query($link,"UPDATE `affiliate` SET `Photo`='$Image' WHERE   AffiliateID='$AffiliateID'");

       if($select_update == true)
       {
            echo 'success';
       }

     
        
        

?>