<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

    include('../config/config.php');

    $lang = $_POST['defaultlang'];

    include('../../lang/' . $lang . '.php');


    //collect the input details
    $username = trim($_POST['uname']);
    $username = mysqli_real_escape_string($link, $username);
    $password = trim(md5($_POST['pwd']));
    $password = mysqli_real_escape_string($link, $password);
    $lastlogin_Date = date('Y-m-d').' '.date('H:i:s');
    
    $longitude = mysqli_real_escape_string($link, $_POST['longitude']);
    
    $latitude = mysqli_real_escape_string($link, $_POST['latitude']);
    
    $locationName = mysqli_real_escape_string($link, $_POST['locationName']);
    
    $ipAddress = mysqli_real_escape_string($link, $_POST['ipAddress']);
    
     
    
    $sql = ("SELECT * FROM `userlogin` WHERE `UserRegNumberOrUsername`='$username' AND UserPassword='$password'");
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $row_cnt = mysqli_num_rows($result);

    if ($row_cnt > 0) {

        $usertype = $row['UserType'];
        $userid = $row['UserID'];

        $verification_status = $row['VerificationStatus'];

        if ($verification_status < 1) {

            if ($usertype == 'owner') {

                $verifycheck = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$userid'");
                $verifycheckuserinfocnt = mysqli_num_rows($verifycheck);
                $verifycheckuserinforow = mysqli_fetch_assoc($verifycheck);

                $email = $verifycheckuserinforow['AgencyOrSchoolOwnerEmail'];


            } else {
                $verifycheck = mysqli_query($link, "  SELECT * FROM `affiliate` WHERE AffiliateID='$userid'");
                $verifycheckuserinfocnt = mysqli_num_rows($verifycheck);
                $verifycheckuserinforow = mysqli_fetch_assoc($verifycheck);


                $email = $verifycheckuserinforow['Email'];

            }


                   echo 'Account not verified. Click  to verify<br> <small style="color:blue;cursor:pointer;font-size:15px;" id="verifyaccountbtn" data-id="' . $userid . '" data-email="' . $email . '" data-pass="' . $password . '" data-username="' . $username . '"><b> Verify Now</b></small>';

               
                        
            // $defaultUrl
        } else {
            // $upatelogininfo = mysqli_query($link, "UPDATE `userlogin` SET `LastLoginDate`='$lastlogin_Date' WHERE UserID='$userid'");

            if ($usertype == 'affiliate') {

                $verify_aff_status = mysqli_query($link, "SELECT * FROM `affiliate`
                 WHERE `AffiliateID`='$userid' AND `ApproveStatus`='0'");

                $verify_aff_status_cnt = mysqli_num_rows($verify_aff_status);

                // check if affiliate is approved
                if($verify_aff_status_cnt > 0)
                {

                    echo 'affnotapproved';

                }else
                {


                    session_start();
                    $_SESSION['spgaffiliate'] = $username;
                    $_SESSION['spgUserType'] = $usertype;
    
                    $sql_insert_activity_log = ("INSERT INTO `activitylog`(`ActitvityLogID`, `InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`)
                    VALUES (NULL,0,'$userid','$usertype','$ipAddress','$locationName','$longitude','$latitude','Logged In','$lastlogin_Date')");
                    $result_insert_activity_log = mysqli_query($link, $sql_insert_activity_log);
    
                    echo $usertype = $row['UserType'];

                }

               
            } elseif ($usertype == 'owner') {
                session_start();
                $_SESSION['spgowner'] = $username;
                $_SESSION['spgUserType'] = $usertype;

                echo $usertype = $row['UserType'];
                
                
                $sql_insert_activity_log = ("INSERT INTO `activitylog`(`ActitvityLogID`, `InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) 
                VALUES (NULL,0,'$userid','$usertype','$ipAddress','$locationName','$longitude','$latitude','Logged In','$lastlogin_Date')");
                $result_insert_activity_log = mysqli_query($link, $sql_insert_activity_log);

            } else {
                echo 'Invalid Login Details!';
            }
        }

    } else {
        echo 'Invalid Login Details!';
    }

?>