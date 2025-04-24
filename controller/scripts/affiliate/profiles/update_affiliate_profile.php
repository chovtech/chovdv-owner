<?php

        include('../../../config/config.php');
        $fname = mysqli_real_escape_string($link, $_POST['fname']);
        $lname  = mysqli_real_escape_string($link,$_POST['lname']);
        $mname  = mysqli_real_escape_string($link,$_POST['mname']);
        // $bloodg  = $_POST['bloodg']
        $religion  = mysqli_real_escape_string($link,$_POST['religion']);
        $gender  = $_POST['gender'];
        // $dob  = $_POST['dob'];
        $country  = $_POST['country'];
        $state = $_POST['state'];
        $lga = $_POST['lga'];

        $AffiliateID  = $_POST['AffiliateID'];
        // $InstitutionID  = $_POST['InstitutionID'];

        $updatepersonaldetails = mysqli_query($link," UPDATE `affiliate`
         SET `AffiliateFName`='$fname',`AffiliateMName`='$mname',`AffiliateLName`='$lname',
            `Gender`='$gender',`Country`='$country',`State`='$state',
            `LGA`='$lga', `Religion`='$religion' 
            WHERE AffiliateID='$AffiliateID'");
        

      


        if($updatepersonaldetails == true)
        {
            echo 'success';

        }else
        {
            echo 'failed';

        }
 
  
?>