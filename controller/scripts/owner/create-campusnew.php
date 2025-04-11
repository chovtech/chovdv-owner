<?php
        include('../../config/config.php');
        $userid  = $_POST['UserID'];

        $groupofschoolID =  $_POST['schoolIDnew'];
        $tagID  = $_POST['tagID'];
        
        $campuslocation  = explode(',',$_POST['campuslocation']);
        $campusemail  = explode(',',$_POST['campusemail']);
        $phonenum  = explode(',',$_POST['formattedinput']);
        $countryid  = explode(',',$_POST['country_ID']);
        $stateID  = explode(',',$_POST['state_ID']);
        $lga  = explode(',',$_POST['local_Gov']);
      

          $firstCampusEmail = $campusemail[0];
          $firstPhoneNum = $phonenum[0];
          $firstCountryID = $countryid[0];
          $firstStateID = $stateID[0];
          $firstLGA = $lga[0];
              


        

       
            //getting current term
            $sqlGettermorsemesterDetails = ("SELECT * FROM `termorsemester`");
            $resultGettermorsemesterDetails = mysqli_query($link, $sqlGettermorsemesterDetails);
            $rowGettermorsemesterDetails = mysqli_fetch_assoc($resultGettermorsemesterDetails);
            $row_cntGettermorsemesterDetails = mysqli_num_rows($resultGettermorsemesterDetails);

            $termname = $rowGettermorsemesterDetails['TermOrSemesterName'];
            //getting current term

            //getting current session
            $sqlsecsession_startcount = mysqli_query($link,"SELECT * FROM `session` WHERE `sessionStatus`='1'");
            $querysecsession_startcount = mysqli_fetch_assoc($sqlsecsession_startcount);
            $cntsecsession_startcount = mysqli_num_rows($sqlsecsession_startcount);
            
            $session_startcount =  $querysecsession_startcount['sessionName'];
            $sessionID_startcount =  $querysecsession_startcount['sessionID'];
            //getting current session

            $currentdate = Date('Y-m-d');
            $selectagency = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$userid'");
            $selectagencycntrow = mysqli_fetch_assoc($selectagency);

            if($tagID == '' || $tagID > 26)
            {

            }else
            {
                   //updating tag state
                    $updateaistate = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `TagState`='$tagID' WHERE  `AgencyOrSchoolOwnerID`='$userid'");
                  //updating tag state
            }

           


         

            foreach($campuslocation as $key => $campuslocationarr)
            {
                $campuslocationarrnew = mysqli_real_escape_string($link,$campuslocationarr);
                     $campusemailarr = $campusemail[$key];
                     $phonenumarr = $phonenum[$key];
                    $countryidarr = $countryid[$key];
                    $stateID_arr = $stateID[$key];
                    $lga_arr = $lga[$key];
                    // $addressarr = $address[$key];
                    
                    

                    $insertcampus =  mysqli_query($link,"INSERT INTO `campus`(`InstitutionID`,
                     `CampusName`, `CampusCountry`, `CampusState`,
                      `CampusLGA`, `CampusEmail`,`CampusPhone`)  
                    
                    VALUES ('$groupofschoolID','$campuslocationarrnew','$countryidarr','$stateID_arr','$lga_arr','$campusemailarr','$phonenumarr')");

            } 
            
            if($insertcampus == true)
            {


                  

                echo 'success';
            }
        
        
       
?>