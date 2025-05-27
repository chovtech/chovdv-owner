<?php


        include('../../config/config.php');
        $userid  = $_POST['UserID'];
        $schoolName  = mysqli_real_escape_string($link,$_POST['schoolName']);
        $schoolMotto  = mysqli_real_escape_string($link,$_POST['mottoid']);
        $schooldomain  = $_POST['schooldomain'];
        $tagID  = $_POST['tagID'];
        
        $campuslocation  = explode(',',$_POST['campuslocation']);
        $campusemail  = explode(',',$_POST['campusemail']);
        $phonenum  = explode(',',$_POST['formattedinput']);
        $countryid  = explode(',',$_POST['country_ID']);
        $stateID  = explode(',',$_POST['state_ID']);
        $lga  = explode(',',$_POST['local_Gov']);
        // $address  = explode(',',$_POST['schooladdress']);
        $prosschoolurl = $schooldomain.='.edumess.com';

          $firstCampusEmail = $campusemail[0];
          $firstPhoneNum = $phonenum[0];
          $firstCountryID = $countryid[0];
          $firstStateID = $stateID[0];
          $firstLGA = $lga[0];
              


        

        $verifygeneral_url = mysqli_query($link,"SELECT * FROM `institution` WHERE InstitutionWebsite='$schooldomain'");
        $verifygeneral_cnt = mysqli_num_rows($verifygeneral_url);

        if($verifygeneral_cnt > 0)
        {

        }else
        {
            
            
            
            
            $validateschoolcreated = mysqli_query($link,"SELECT * FROM `institution` WHERE InstitutionGeneralName='$schoolName' AND CustomUrl='$schooldomain'");
            $validateschoolcreated_cnt = mysqli_num_rows($validateschoolcreated);
            
            
            if($validateschoolcreated_cnt > 0)
            {
                   echo 'schoolexist';
                
            }else
            {
                
           
                
                
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
    
                if($tagID == '')
                {
    
                }else
                {
                       //updating tag state
                        $updateaistate = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `TagState`='$tagID' WHERE  `AgencyOrSchoolOwnerID`='$userid'");
                      //updating tag state
                }
    
               
    
                //getting school default type
                     $schooltype = $selectagencycntrow['EducationType'];
                //getting school default type

                // create-schoolonboarding.php
    
                $insert_sql =  mysqli_query($link,"INSERT INTO 
                `institution`(`AgencyOrSchoolOwnerID`, `EducationType`, 
                `InstitutionGeneralName`, `InstitutionMotto`, `InstitutionPhone`,
                 `InstitutionEmail`,  `CustomUrl`, `ActualPlan`,  `SessionOfSignup`,
                  `TermOfSignup`, `DateOfSignup` ) 
                VALUES ('$userid','$schooltype','$schoolName',
                '$schoolMotto','$firstPhoneNum','$firstCampusEmail',
                '$prosschoolurl', '5', '$session_startcount','$termname','$currentdate')");
    
              $groupofschoolID = mysqli_insert_id($link);
    
                foreach($campuslocation as $key => $campuslocationarr)
                {
                        $campuslocationarr;
                         $campusemailarr = $campusemail[$key];
                         $phonenumarr = $phonenum[$key];
                        $countryidarr = $countryid[$key];
                        $stateID_arr = $stateID[$key];
                        $lga_arr = $lga[$key];
                        // $addressarr = $address[$key];
                        
                        $campusnameloc = $schoolName.=$campuslocationarr;
    
                        $insertcampus =  mysqli_query($link,"INSERT INTO `campus`(`InstitutionID`,
                         `CampusName`, `CampusCountry`, `CampusState`,
                          `CampusLGA`, `CampusEmail`,`CampusPhone`)  
                        
                        VALUES ('$groupofschoolID','$campuslocationarr','$countryidarr','$stateID_arr','$lga_arr','$campusemailarr','$phonenumarr')");
    
    
                } 
                
                if($insertcampus == true)
                {
    
    
     
                        // add extra virtual campus
                        $insertcampusnew =  mysqli_query($link,"INSERT INTO `campus`(`InstitutionID`,
                        `CampusName`, `CampusCountry`, `CampusState`,
                        `CampusLGA`,`CampusEmail`,`CampusPhone`)  
                      
                      VALUES ('$groupofschoolID','Virtual campus','$firstCountryID ','$firstStateID','$firstLGA','$firstCampusEmail','$firstPhoneNum')");
                    // add extra virtual campus
    
                    echo 'success';
                }
                
            }
        }
        
       
?>