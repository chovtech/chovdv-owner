<?php

                
        include('../../config/config.php');

        $userID = $_POST['UserID'];
        $IntitutionID = $_POST['InstitutionID'];
        $campusID = $_POST['campusID'];




        $getownredetails = mysqli_query($link,"SELECT * FROM `institution` INNER JOIN `agencyorschoolowner` ON `institution`.`AgencyOrSchoolOwnerID` = `agencyorschoolowner`.`AgencyOrSchoolOwnerID` WHERE `institution`.`InstitutionID`='$IntitutionID'");
        $getownredetailscnt = mysqli_num_rows($getownredetails);
        $getownredetailscntrows = mysqli_fetch_assoc($getownredetails);



        $Agencyorschoolowner = $getownredetailscntrows['AgencyOrSchoolOwnerName'];
        $Agencyorschoolowneraddress = $getownredetailscntrows['AgencyOrSchoolOwnerAddress'];
        $AgencyOrSchoolOwnerState = $getownredetailscntrows['AgencyOrSchoolOwnerState'];
        $AgencyOrSchoolOwnerCity = $getownredetailscntrows['AgencyOrSchoolOwnerCity'];
        $AgencyOrSchoolOwnerEmail = $getownredetailscntrows['AgencyOrSchoolOwnerEmail'];
        $AgencyOrSchoolOwnerWhatsAppPhone = $getownredetailscntrows['AgencyOrSchoolOwnerWhatsAppPhone'];


        $InstitutionGeneralName = $getownredetailscntrows['InstitutionGeneralName'];
       


        $selectownerstate = mysqli_query($link,"SELECT * FROM `states` WHERE StateID='$AgencyOrSchoolOwnerState'");
        $selectownerstatecnt = mysqli_num_rows($selectownerstate);
        $selectownerstatecntrows = mysqli_fetch_assoc($selectownerstate);

        $ownerstate = $selectownerstatecntrows['StateName'];

        $selectletter = mysqli_query($link,"SELECT * FROM `admissionlettertemplate`");
        $selectlettercnt = mysqli_num_rows($selectletter);

        $selectlettercntrow = mysqli_fetch_assoc($selectletter);


          $descname =  $selectlettercntrow['LetterDescription'];


          $selectsession = mysqli_query($link,"SELECT * FROM `session` WHERE sessionStatus='1'");
          $selectsessioncnt = mysqli_num_rows($selectsession);
          $selectsessioncntrow = mysqli_fetch_assoc($selectsession);
   
   
          $sessionName = $selectsessioncntrow ['sessionName'];

          $replacename = array(
                "[Your Name]",
                "[Your Address]",
                "[City,", "State]",
                "[Email Address]",
                "[Phone Number]",
                "[Year]",
                "[School Name]"
            );
            
            $replaceownername = array(
                $Agencyorschoolowner,
                $Agencyorschoolowneraddress,
                $ownerstate,
                $AgencyOrSchoolOwnerCity,
                $AgencyOrSchoolOwnerEmail,
                $AgencyOrSchoolOwnerWhatsAppPhone,
                $sessionName,
                $InstitutionGeneralName
            );
         
        

         // Perform the replacement
        $replaceschoolname = str_replace($replacename, $replaceownername, $descname);


       $selectadmissionletercampus = mysqli_query($link,"SELECT * FROM `admissionletter` WHERE CampusID='$campusID'");
       $selectadmissionletercampuscnt = mysqli_num_rows($selectadmissionletercampus);
         

       if($selectadmissionletercampuscnt > 0)
       {


                 $selectadmissionletercampuscntrow = mysqli_fetch_assoc($selectadmissionletercampus);
                 $adminlettercampus =  $selectadmissionletercampuscntrow['AdmissionLetter'];
               

           echo '<div class="form-group m-t-40 row">
                    <label for="example-text-input" style="font-size: 15px;" class="col-sm-12 col-md-12 col-form-label">Kindly edit or input your admission letter here</label>
                    <small><b>Note:</b> kindly leave the applicant or recepient details just the way it is. that will be included once the applicant is downloaing the letter</small>
                    <div class="col-sm-12 col-md-12">
                            <textarea class ="mymce prosadmissiondescription" data-id="'.$campusID.'" rows="4" cols="80"  name="area">'.$adminlettercampus.'</textarea>
                    </div>
                 </div>';

       }else
       {

                echo '<div class="form-group m-t-40 row">
                    <label for="example-text-input" style="font-size: 15px;" class="col-sm-12 col-md-12 col-form-label">Kindly edit or input your admission letter here</label>
                       <small><b>Note:</b> kindly leave the applicant or recepient details just the way it is. that will be included once the applicant is downloaing the letter</small>
                    <div class="col-sm-12 col-md-12">
                            <textarea class ="mymce prosadmissiondescription" data-id="'.$campusID.'" rows="4" cols="80"  name="area">'.$replaceschoolname.'</textarea>
                    </div>
                </div>';

       }
       







?>