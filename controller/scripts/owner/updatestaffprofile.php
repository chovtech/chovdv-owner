<?php

        include('../../config/config.php');
        $fname = $_POST['fname'];
        $lname  = $_POST['lname'];
        $mname  = $_POST['mname'];
        $bloodg  = $_POST['bloodg'];
        $religion  = $_POST['religion'];
        $gender  = $_POST['gender'];
        $dob  = $_POST['dob'];
        $country  = $_POST['country'];
        $state = $_POST['state'];
        $lga = $_POST['lga'];

        $StaffID  = $_POST['staffID'];
        $InstitutionID  = $_POST['InstitutionID'];

        $updatepersonaldetails = mysqli_query($link," UPDATE `staff` SET `StaffFirstName`='$fname',`StaffMiddleName`='$mname',`StaffLastName`='$lname',`StaffDOB`='$dob',
            `StaffGender`='$gender',`StaffCountry`='$country',`StaffState`='$state',`StaffLga`='$lga', `StaffBloodGroup`='$bloodg',`StaffReligion`='$religion' WHERE StaffID='$StaffID' AND InstitutionID='$InstitutionID'");
        


        if($updatepersonaldetails == true)
        {
            echo 'success';

        }else
        {
            echo 'failed';

        }
 
  
?>