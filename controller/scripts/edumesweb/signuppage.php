<?php

    // Display all errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    include('../../config/config.php');
    $lang = $_POST['defaultlang'];
    include('../../../lang/'.$lang.'.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/Exception.php';
    require 'PHPMailer-master/PHPMailer.php';
    require 'PHPMailer-master/SMTP.php';
    
    $FName  = $_POST['firstname'];
    $lastName  = $_POST['lastname'];
    $email =  $_POST['email'];
    $num =  $_POST['phonenumfull'];
    $tagid =  $_POST['tagid'];
    $signup_as =  $_POST['signup_as'];
    $lead_id =  isset($_POST['lead_id']) ? mysqli_real_escape_string($link, $_POST['lead_id']) : '';

    
    
    
    
    $password =  mysqli_real_escape_string($link,trim($_POST['password']));
    $broughtbyconsul = mysqli_real_escape_string($link,$_POST['consultandid']);
    date_default_timezone_set('Africa/Lagos');
    $expire_stamp = date('Y-m-d H:i:sa', strtotime("+5 min"));
    // $now_stamp = date("Y-m-d H:i:s");
        
    $selectserveretails = mysqli_query($link,"SELECT * FROM `serverpassword`");
    $selectserveretailscnt = mysqli_fetch_assoc($selectserveretails);
      
    $servername =  $selectserveretailscnt['ServerName'];
    $serverpwd =  $selectserveretailscnt['ServerPassword'];
    
    
    // pros verify user from login
    
    $verifycheck_login = mysqli_query($link,"SELECT * FROM `userlogin` WHERE `UserType` IN('owner','affiliate') AND `UserRegNumberOrUsername`='$email' AND VerificationStatus ='1'");
    $verifycheck_login_cnt = mysqli_num_rows($verifycheck_login);


    if($verifycheck_login_cnt > 0)
    {
             echo 'found';  
    }else
    {
      
        // $pros verify user loged in
        
        if($signup_as == 'owner')
        {
            
             $verifycheck = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerEmail='$email'");
            
        }else{
           
             $verifycheck = mysqli_query($link," SELECT * FROM `affiliate` WHERE Email='$email'");
            
        }
        // $pros verify user loged in
       
        $verifycheckuserinfo = mysqli_fetch_assoc($verifycheck);
        $verifycheckuserinfocnt = mysqli_num_rows($verifycheck);
        
                        
         if($verifycheckuserinfocnt > 0)
         {
            
            $getownerinfo = mysqli_query($link,"SELECT * FROM userlogin  WHERE UserRegNumberOrUsername='$email' AND VerificationStatus ='1'");
            $getownerinfo_cnt_row = mysqli_fetch_assoc($getownerinfo);
            $getownerinfo_cnt = mysqli_num_rows($getownerinfo);
            
            if($getownerinfo_cnt > 0)
            {
                     
                  echo 'found';
                  
            }
            else
            {
            
                  $currentdate = Date('Y-m-d');
                  date_default_timezone_set('Africa/Lagos');
                  $currenttime = date('h:i:a');
         
                  $getconsultinfo = mysqli_query($link,"SELECT * FROM userlogin  WHERE `UserID`='$broughtbyconsul' AND `UserType` ='affiliate'");
                  $getconsultinfo_cnt = mysqli_num_rows($getconsultinfo);
                  $getconsultinfo_cnt_row = mysqli_fetch_assoc($getconsultinfo); 
         
                  $consultantid = $getconsultinfo_cnt_row['UserID']; 
         
                  //getting current term
                  $sqlGettermorsemesterDetails = ("SELECT * FROM `termorsemester` WHERE `status`='1'");
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
         
                  $FiveDigitRandomNumber = rand(10000,99999);
                  
                  // COLLECT ID BASE ON USER TRYING TO SIGN UP HERE
                  
                     if ($signup_as == 'owner') {
                        $ownerid = $verifycheckuserinfo['AgencyOrSchoolOwnerID']; 
                        $referencenumber = "RX-" .$ownerid."owner";
                     } else {
                        $ownerid = $verifycheckuserinfo['AffiliateID'];  
                        $referencenumber = "RX-" .$ownerid."affiliate";
                     }

                  // COLLECT ID BASE ON USER TRYING TO SIGN UP HERE
                  
                  
                  
                  
                  
                  
                  $reservedemail = $email;
                  
                  
                  $tokenurl = "{$defaultUrl}signup-verification/?LcH6eMciwz3OOqP7KOrjjFf2V1DYE6=mkiuytrcccvvUR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&oionxx={$ownerid}&marana={$email}&kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6=UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&tak={$FiveDigitRandomNumber}&lang={$lang}&utype={$signup_as}";
                  
                  $passwordmd5 = md5($password);
                  
                  echo $ownerid;
                  
                  
                  // pros update token here
                  if ($signup_as == 'owner') {
                     
                     
                     
                        $notifycationinsert = mysqli_query($link,"INSERT INTO `notifications`(`UserID`, `UserType`, `Description`,  `DateandTime`) VALUES ('$ownerid','owner','Congratulations for your account with EduMESS Software has been registered successfully','$currentdate')");//notification email
                  
                  
                        // school owner insert sqli
                        $insertownert = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `TokenID`='$FiveDigitRandomNumber' WHERE AgencyOrSchoolOwnerID = '$ownerid'");
                     
                  }else
                  {
                        $notifycationinsert = mysqli_query($link,"INSERT INTO `notifications`(`UserID`, `UserType`, `Description`,  `DateandTime`) VALUES ('$ownerid','affiliate','Congratulations for your account with EduMESS Software has been registered successfully','$currentdate')");//notification email
         
                  
                        // school owner insert sqli
                        $insertownert = mysqli_query($link,"UPDATE `affiliate` SET `TokenID`='$FiveDigitRandomNumber' WHERE AffiliateID = '$ownerid'");
                     
                  }
                  
               
                  
                  $htmlcontent='
                  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                  <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                     <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta name="x-apple-disable-message-reformatting">
                        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
                        <meta name="format-detection" content="telephone=no, date=no, address=no, email=no, url=no">
                        <meta name="x-apple-disable-message-reformatting">
                        <!--[if !mso]>
                                       <!-->
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <!--
                                          <![endif]-->
                        <title></title>
                        <style type="text/css">
                           @media only screen and (min-width: 620px) {
                              .u-row {
                                 width: 600px !important;
                              }
                  
                              .u-row .u-col {
                                 vertical-align: top;
                              }
                  
                              .u-row .u-col-33p33 {
                                 width: 199.98px !important;
                              }
                  
                              .u-row .u-col-66p67 {
                                 width: 400.02px !important;
                              }
                  
                              .u-row .u-col-100 {
                                 width: 600px !important;
                              }
                           }
                  
                           @media (max-width: 620px) {
                              .u-row-container {
                                 max-width: 100% !important;
                                 padding-left: 0px !important;
                                 padding-right: 0px !important;
                              }
                  
                              .u-row .u-col {
                                 min-width: 320px !important;
                                 max-width: 100% !important;
                                 display: block !important;
                              }
                  
                              .u-row {
                                 width: 100% !important;
                              }
                  
                              .u-col {
                                 width: 100% !important;
                              }
                  
                              .u-col>div {
                                 margin: 0 auto;
                              }
                           }
                  
                           body {
                              margin: 0;
                              padding: 0;
                           }
                  
                           table,
                           tr,
                           td {
                              vertical-align: top;
                              border-collapse: collapse;
                           }
                  
                           p {
                              margin: 0;
                           }
                  
                           .ie-container table,
                           .mso-container table {
                              table-layout: fixed;
                           }
                  
                           * {
                              line-height: inherit;
                           }
                  
                           a[x-apple-data-detectors="true] {
                  color: inherit !important;
                           text-decoration: none !important;
                           }
                  
                           table,
                           td {
                              color: #000000;
                           }
                  
                           #u_body a {
                              color: #0000ee;
                              text-decoration: underline;
                           }
                        </style>
                        <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet" type="text/css">
                     </head>
                     <body xml:lang="en" class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #faf9f9;color: #000000">
                        <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #faf9f9;width:100%" cellpadding="0" cellspacing="0">
                           <tbody>
                              <tr style="vertical-align: top">
                                 <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                       <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                          <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                             <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                <div style="height: 100%;width: 100% !important;">
                                                   <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                                  <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                     <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="left">
                                                                           <img align="left" border="0" src="https://assets.unlayer.com/projects/145304/1678799684381-edumes-blue.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 18%;max-width: 104.4px;" width="104.4" />
                                                                        </td>
                                                                     </tr>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                       <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                          <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                             <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                <div style="height: 100%;width: 100% !important;">
                                                   <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                                  <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                     <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center" style="width:10%;" >
                                                                           <img align="center" style="width:30%;height:auto;"  border="0" src="https://media.istockphoto.com/id/1196328556/vector/two-factor-authentication-mobile-app-rsa-token-mobile-app-cryptosystem-for-security-two.jpg?s=612x612&w=0&k=20&c=JYMQ701HuEfaNcP4jQBla0UxP0GVKsYb5yt93129hEw=" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 580px;" width="580" />
                                                                        </td>
                                                                     </tr>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 
                                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                       <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                          <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                             <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                <div style="height: 100%;width: 100% !important;">
                                                   <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 55px 10px 30px;font-family:\'Cabin\',sans-serif;" align="left">
                                                                  <div style="font-size: 10px; line-height: 160%; text-align: left; word-wrap: break-word;">
                                                                     <p style="font-size: 14px; line-height: 160%;">
                                                                        <span style="font-size: 14px; line-height: 16px;">'.$website_signupgoogleinfoe_hi.' '.$FName.'</span>
                                                                     </p>
                                                                     <p style="font-size: 14px; line-height: 160%;"></p>
                                                                     <p style="font-size: 14px; line-height: 160%;">
                                                                        <span style="font-size: 16px; line-height: 16px;">
                                                                           <strong>
                                                                              <span style="line-height: 16px;">'.$website_signupgooglein_succesemailtitle.'</span>
                                                                           </strong>
                                                                        </span>
                                                                     </p>
                                                                     <p style="font-size: 14px; line-height: 160%;"></p>
                                                                     <p style="font-size: 14px; line-height: 160%;">
                                                                        <span style="font-size: 14px; line-height: 16px; color: #292929;">
                                                                           <span style="line-height: 16px;">
                                                                              <strong>'.$website_signup_congrtulation.'</strong>
                                                                           </span>'.$website_signupdes.'</span>
                                                                     </p>
                                                                     
                                                                     <h1 align="center" style=" line-height: 160%;letter-spacing: 3px;">'.$FiveDigitRandomNumber.'</h1>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      <p style="font-size: 14px; line-height: 160%;"></p>
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                                  <div align="center">
                                                                     <a href="'.$tokenurl.'" target="_blank" class="v-button" style="box-sizing: border-box;display: inline-block;font-family:\'Cabin\',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #296beb; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:100%; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 16px;">
                                                                        <span style="display:block;padding:14px 44px 13px;line-height:120%;">
                                                                           <span style="line-height: 19.2px;">
                                                                              <strong>
                                                                                 <span style="line-height: 19.2px;">'.$website_signupbtn_now.'</span>
                                                                              </strong>
                                                                           </span>
                                                                        </span>
                                                                     </a>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                                  <div style="font-size: 13px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                     <p style="line-height: 140%;">'.$website_signupwhatsdes.' <span style="color: #3598db; line-height: 18.2px;">+234 704 527 7801</span>, '.$website_signupwhatsdessub.' <a href="https://wa.me/+2347045277801" style="color: #2dc26b; line-height: 18.2px;">WhatsApp +2347045277801</a>
                                                                     </p>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                                  <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                     <tbody>
                                                                        <tr style="vertical-align: top">
                                                                           <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                              <span>&#160;</span>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                       <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                          <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                             <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                   <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                                  <div style="font-size: 13px; line-height: 130%; text-align: left; word-wrap: break-word;">
                                                                     <p style="line-height: 130%;">'.$website_signupgoogleinfoe_downloadmobileapp.'</p>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                       <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                          <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                             <div class="u-col u-col-33p33" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                                <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                   <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                                  <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                     <tr>
                                                                        <td style="padding-right: 0px;padding-left: 0px;" align="left">
                                                                           <a href="https://www.edumess.com">
                                                                              <img align="left" border="0" src="https://assets.unlayer.com/projects/145304/1678802826342-appstre.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 74%;max-width: 133.2px;" width="133.2" />
                                                                              <a>
                                                                        </td>
                                                                     </tr>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                                                <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                   <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                       <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                          <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                             <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                                <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                   <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                      <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                                  <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                     <p style="line-height: 140%;">'.$website_signup_poweredby.' <br />
                                                                        <strong>
                                                                           <a href="'.$defaultUrl.'">EduMESS Inc.</a>
                                                                        </strong>
                                                                     </p>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </body>
                  </html>';
                  
                  
         
         
                     $email_to =  'verify@edumess.com';
                     $delivery = 'verify@edumess.com';
                     $altmess = 'alt';
                     // = 'emaildelivery@schoolportalgenerator.com';
                     $nameto = '';
                     $subject = $website_signupgoogleinfoe_emailheader;
                     $subjectnew = mb_encode_mimeheader($subject, 'UTF-8');
                     
                     // $encoded_subject = "=?$charset?B?".base64_encode($subject)."?=\n" ;
                     
                     
                     
                     $mail = new PHPMailer(true);
                        $owner =  'EduMESS';
                     try {
                        //Server settings
                        $mail->SMTPDebug = 0;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'edumess.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'verify@edumess.com';                     //SMTP username
                        $mail->Password   = 'Year@2025$$';                            //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                  
                        //Recipients
                        $mail->setFrom($delivery,$owner);
                        $mail->addAddress($email, $nameto);     //Add a recipient
                        $mail->addAddress($email);               //Name is optional
                        $mail->addReplyTo($email_to, $nameto);
                        $mail->addCC($email);
                        $mail->addBCC($email);
                  
                     
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = $subjectnew;
                        $mail->Body = $htmlcontent;
                        $mail->AltBody = $htmlcontent;
                  
                        $mail->send();
                        
                     } catch (Exception $e) {
                  
                     
                     }
      
               ?>
         
            <?php             
            }
         
         }  
         else
         {
            
            $currentdate = Date('Y-m-d');
            date_default_timezone_set('Africa/Lagos');
            $currenttime = date('h:i:a');
      
            $getconsultinfo = mysqli_query($link,"SELECT * FROM userlogin  WHERE UserID='$broughtbyconsul'");
            $getconsultinfo_cnt = mysqli_num_rows($getconsultinfo);
            $getconsultinfo_cnt_row = mysqli_fetch_assoc($getconsultinfo); 
            
            if($getconsultinfo_cnt > 0)
            {
                  $consultantid = $getconsultinfo_cnt_row['UserID'];
            }else
            {
                  $consultantid =$broughtbyconsul;
            }
      
               
      
            //getting current term
            $sqlGettermorsemesterDetails = ("SELECT * FROM `termorsemester` WHERE `status`='1'");
            $resultGettermorsemesterDetails = mysqli_query($link, $sqlGettermorsemesterDetails);
            $rowGettermorsemesterDetails = mysqli_fetch_assoc($resultGettermorsemesterDetails);
            $row_cntGettermorsemesterDetails = mysqli_num_rows($resultGettermorsemesterDetails);
      
            $termname = $rowGettermorsemesterDetails['TermOrSemesterName'];
            $TermOrSemesterID = $rowGettermorsemesterDetails['TermOrSemesterID'];
            
            
            //getting current term
      
            //getting current session
            $sqlsecsession_startcount = mysqli_query($link,"SELECT * FROM `session` WHERE `sessionStatus`='1'");
            $querysecsession_startcount = mysqli_fetch_assoc($sqlsecsession_startcount);
            $cntsecsession_startcount = mysqli_num_rows($sqlsecsession_startcount);
            
            $session_startcount =  $querysecsession_startcount['sessionName'];
            $sessionID_startcount =  $querysecsession_startcount['sessionID'];
            //getting current session
      
            $FiveDigitRandomNumber = rand(10000,99999);
               
            // school owner insert sqli
            
            
            
            
                  // COLLECT referencenumber BASE ON USER TRYING TO SIGN UP HERE AND INSERT
                  
                     if ($signup_as == 'owner') {
                        $insertownert = mysqli_query($link,"INSERT INTO 
                        `agencyorschoolowner`(`AffiliateID`,`affiliate_lead`, `AgencyOrSchoolOwnerName`,
                        `AgencyOrSchoolOwnerNameTwo`,`AgencyOrSchoolOwnerMainPhone`,
                        `AgencyOrSchoolOwnerEmail`,  `SessionOfSignup`, `TermOfSignup`,
                           `DateOfSignup`,`TagState`,`TokenID`,`TokenDuration`)
                           VALUES ('$consultantid','$lead_id ', '$FName','$lastName','$num',
                           '$email','$session_startcount','$termname','$currentdate',
                           '$tagid','$FiveDigitRandomNumber','$expire_stamp')");
                        
                     } else {
                        
                        // $ownerid = $verifycheckuserinfo['AffiliateID'];  
                        
                        
                        // pros verify affiliate level two
                        $pros_check_leveltwo = mysqli_query($link, "SELECT * FROM `affiliate` WHERE `AffiliateID`='$consultantid'");
                        $pros_check_leveltwocount = mysqli_fetch_assoc($pros_check_leveltwo);
                        $pros_check_leveltwocount_rows = mysqli_num_rows($pros_check_leveltwo);
                        
                        if($pros_check_leveltwocount_rows  > 0)
                        {
                           $level_two =  $pros_check_leveltwocount['affiliate_l1'];
                        }else
                        {
                              $level_two = 0;
                        }
                        
                           $insertownert = mysqli_query($link,"INSERT INTO `affiliate`(`UserType`, `AffiliateFName`, `AffiliateMName`, `AffiliateLName`, `Gender`, `Email`, `Phone`,  `affiliate_l1`, `affiliate_l2`,  `TokenID`, `DateJoined`, `TagState`,
                        `Session`, `Term`,  `TokenDuration`) VALUES ('affiliate','$FName', '','$lastName','','$email','$num','$consultantid','$level_two','$FiveDigitRandomNumber','$currentdate','$tagid','$session_startcount', '$TermOrSemesterID','$expire_stamp')");
                     }
                     
                     
                  
                     
                     

                  // COLLECT referencenumber BASE ON USER TRYING TO SIGN UP HERE
                  
                  $ownerid = mysqli_insert_id($link);
                  //school owner OR affiliate insert sqli
            
                  $reservedemail = $email;
                  
                     if ($signup_as == 'owner') {
                           $referencenumber = "RX-" .$ownerid."owner";
                     }else{
                           $referencenumber = "RX-" .$ownerid."affiliate";
                     }
            
                     
                     $tokenurl = "{$defaultUrl}signup-verification/?LcH6eMciwz3OOqP7KOrjjFf2V1DYE6=mkiuytrcccvvUR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&oionxx={$ownerid}&marana={$email}&kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6=UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&tak={$FiveDigitRandomNumber}&lang={$lang}&utype={$signup_as}";
                     
                     $passwordmd5 = md5($password);
            
            
               // INSERT USER HERE
                  
                     if ($signup_as == 'owner') {
                        // $ownerid = $verifycheckuserinfo['AgencyOrSchoolOwnerID']; 
                        $insertlogindetais = mysqli_query($link,"INSERT INTO `userlogin`(`InstitutionIDOrCampusID`,`UserID`, `UserRegNumberOrUsername`, `UserPassword`, `UserType`)
                           VALUES ('$consultantid','$ownerid','$email','$passwordmd5','owner')");
                     } else {
                           $insertlogindetais = mysqli_query($link,"INSERT INTO `userlogin`(`InstitutionIDOrCampusID`,`UserID`, `UserRegNumberOrUsername`, `UserPassword`, `UserType`)
                           VALUES ('0','$ownerid','$email','$passwordmd5','affiliate')");
                           $notifycationinsert = mysqli_query($link,"INSERT INTO `notifications`(`UserID`, `UserType`, `Description`,  `DateandTime`) VALUES ('$ownerid','affiliate','Congratulations for your account with EduMESS Software has been registered successfully','$currentdate')");//notification email
                     }

            // INSERT USER HERE
            
            
            
            echo $ownerid;
            
            
            
            $htmlcontent='
               <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
               <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                  <head>
                     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                     <meta name="viewport" content="width=device-width, initial-scale=1.0">
                     <meta name="x-apple-disable-message-reformatting">
                     <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
                     <meta name="format-detection" content="telephone=no, date=no, address=no, email=no, url=no">
                     <meta name="x-apple-disable-message-reformatting">
                     <!--[if !mso]>
                                    <!-->
                     <meta http-equiv="X-UA-Compatible" content="IE=edge">
                     <!--
                                       <![endif]-->
                     <title></title>
                     <style type="text/css">
                        @media only screen and (min-width: 620px) {
                           .u-row {
                              width: 600px !important;
                           }
            
                           .u-row .u-col {
                              vertical-align: top;
                           }
            
                           .u-row .u-col-33p33 {
                              width: 199.98px !important;
                           }
            
                           .u-row .u-col-66p67 {
                              width: 400.02px !important;
                           }
            
                           .u-row .u-col-100 {
                              width: 600px !important;
                           }
                        }
            
                        @media (max-width: 620px) {
                           .u-row-container {
                              max-width: 100% !important;
                              padding-left: 0px !important;
                              padding-right: 0px !important;
                           }
            
                           .u-row .u-col {
                              min-width: 320px !important;
                              max-width: 100% !important;
                              display: block !important;
                           }
            
                           .u-row {
                              width: 100% !important;
                           }
            
                           .u-col {
                              width: 100% !important;
                           }
            
                           .u-col>div {
                              margin: 0 auto;
                           }
                        }
            
                        body {
                           margin: 0;
                           padding: 0;
                        }
            
                        table,
                        tr,
                        td {
                           vertical-align: top;
                           border-collapse: collapse;
                        }
            
                        p {
                           margin: 0;
                        }
            
                        .ie-container table,
                        .mso-container table {
                           table-layout: fixed;
                        }
            
                        * {
                           line-height: inherit;
                        }
            
                        a[x-apple-data-detectors="true] {
            color: inherit !important;
                        text-decoration: none !important;
                        }
            
                        table,
                        td {
                           color: #000000;
                        }
            
                        #u_body a {
                           color: #0000ee;
                           text-decoration: underline;
                        }
                     </style>
                     <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet" type="text/css">
                  </head>
                  <body xml:lang="en" class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #faf9f9;color: #000000">
                     <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #faf9f9;width:100%" cellpadding="0" cellspacing="0">
                        <tbody>
                           <tr style="vertical-align: top">
                              <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                 <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                       <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                          <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                             <div style="height: 100%;width: 100% !important;">
                                                <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                               <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                  <tr>
                                                                     <td style="padding-right: 0px;padding-left: 0px;" align="left">
                                                                        <img align="left" border="0" src="https://assets.unlayer.com/projects/145304/1678799684381-edumes-blue.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 18%;max-width: 104.4px;" width="104.4" />
                                                                     </td>
                                                                  </tr>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                       <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                          <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                             <div style="height: 100%;width: 100% !important;">
                                                <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                               <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                  <tr>
                                                                     <td style="padding-right: 0px;padding-left: 0px;" align="center" style="width:10%;" >
                                                                        <img align="center" style="width:30%;height:auto;"  border="0" src="https://media.istockphoto.com/id/1196328556/vector/two-factor-authentication-mobile-app-rsa-token-mobile-app-cryptosystem-for-security-two.jpg?s=612x612&w=0&k=20&c=JYMQ701HuEfaNcP4jQBla0UxP0GVKsYb5yt93129hEw=" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 580px;" width="580" />
                                                                     </td>
                                                                  </tr>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              
                                 <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                       <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                          <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                             <div style="height: 100%;width: 100% !important;">
                                                <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 55px 10px 30px;font-family:\'Cabin\',sans-serif;" align="left">
                                                               <div style="font-size: 10px; line-height: 160%; text-align: left; word-wrap: break-word;">
                                                                  <p style="font-size: 14px; line-height: 160%;">
                                                                     <span style="font-size: 14px; line-height: 16px;">'.$website_signupgoogleinfoe_hi.' '.$FName.'</span>
                                                                  </p>
                                                                  <p style="font-size: 14px; line-height: 160%;"></p>
                                                                  <p style="font-size: 14px; line-height: 160%;">
                                                                     <span style="font-size: 16px; line-height: 16px;">
                                                                        <strong>
                                                                           <span style="line-height: 16px;">'.$website_signupgooglein_succesemailtitle.'</span>
                                                                        </strong>
                                                                     </span>
                                                                  </p>
                                                                  <p style="font-size: 14px; line-height: 160%;"></p>
                                                                  <p style="font-size: 14px; line-height: 160%;">
                                                                     <span style="font-size: 14px; line-height: 16px; color: #292929;">
                                                                        <span style="line-height: 16px;">
                                                                           <strong>'.$website_signup_congrtulation.'</strong>
                                                                        </span>'.$website_signupdes.'</span>
                                                                  </p>
                                                               
                                                                  <h1 align="center" style=" line-height: 160%;letter-spacing: 3px;">'.$FiveDigitRandomNumber.'</h1>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <p style="font-size: 14px; line-height: 160%;"></p>
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                               <div align="center">
                                                                  <a href="'.$tokenurl.'" target="_blank" class="v-button" style="box-sizing: border-box;display: inline-block;font-family:\'Cabin\',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #296beb; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:100%; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 16px;">
                                                                     <span style="display:block;padding:14px 44px 13px;line-height:120%;">
                                                                        <span style="line-height: 19.2px;">
                                                                           <strong>
                                                                              <span style="line-height: 19.2px;">'.$website_signupbtn_now.'</span>
                                                                           </strong>
                                                                        </span>
                                                                     </span>
                                                                  </a>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                               <div style="font-size: 13px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                  <p style="line-height: 140%;">'.$website_signupwhatsdes.' <span style="color: #3598db; line-height: 18.2px;">+234 704 527 7801</span>, '.$website_signupwhatsdessub.' <a href="https://wa.me/+2347045277801" style="color: #2dc26b; line-height: 18.2px;">WhatsApp +2347045277801</a>
                                                                  </p>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                               <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                  <tbody>
                                                                     <tr style="vertical-align: top">
                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                           <span>&#160;</span>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                       <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                          <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                             <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                               <div style="font-size: 13px; line-height: 130%; text-align: left; word-wrap: break-word;">
                                                                  <p style="line-height: 130%;">'.$website_signupgoogleinfoe_downloadmobileapp.'</p>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                       <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                          <div class="u-col u-col-33p33" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                                             <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                               <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                  <tr>
                                                                     <td style="padding-right: 0px;padding-left: 0px;" align="left">
                                                                        <a href="https://www.edumess.com">
                                                                           <img align="left" border="0" src="https://assets.unlayer.com/projects/145304/1678802826342-appstre.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 74%;max-width: 133.2px;" width="133.2" />
                                                                           <a>
                                                                     </td>
                                                                  </tr>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                                             <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="u-row-container" style="padding: 0px;background-color: transparent">
                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                                       <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                          <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                             <div style="height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                                   <table style="font-family:\'Cabin\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                      <tbody>
                                                         <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Cabin\',sans-serif;" align="left">
                                                               <div style="font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                  <p style="line-height: 140%;">'.$website_signup_poweredby.' <br />
                                                                     <strong>
                                                                        <a href="'.$defaultUrl.'">EduMESS Inc.</a>
                                                                     </strong>
                                                                  </p>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </body>
               </html>';
               
               
               
      
                  $email_to =  'verify@edumess.com';
                  $delivery = 'verify@edumess.com';
                  $altmess = 'alt';
                  // = 'emaildelivery@schoolportalgenerator.com';
                  $nameto = '';
                  $subject_goten = $website_signupgoogleinfoe_emailheader;
                  $subject = mb_encode_mimeheader($subject_goten, 'UTF-8');
                  $htmlContent =  $htmlcontent;
                  $recipientEmail = $email;
                  $senderEmail = $delivery;
               
                  // require '../email-pack/my-send-mail.php';
                  
                  // sendEmail($htmlContent, $subject, $recipientEmail, $senderEmail);
               
                  $mail = new PHPMailer(true);
                  
                     try {
                        // Server settings
                        $mail->SMTPDebug = 0; // Set to 0 for no debugging, 2 for verbose debug output
                        $mail->isSMTP();
                        $mail->Host = 'edumess.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'verify@edumess.com';
                        $mail->Password = 'Year@2025$$';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port = 465;
            
                        // Recipients
                        $mail->setFrom($senderEmail, 'EduMESS');
                        $mail->addAddress($recipientEmail);
                        $mail->addBCC($senderEmail);
            
                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = $subject;
                        $mail->Body = $htmlContent;
                        $mail->AltBody = strip_tags($htmlContent);
            
                        // Attempt to send the email
                        if ($mail->send()) {
                              // echo "1";
                        } else {
                              // echo "0";
                        }
                     } catch (Exception $e) {
                        //echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
            
                        // echo 0;
                     }
                                          
            
            ?>
            
            
            
               
                  
         <?php             
         }
                 
    }
   
    // content ends here
    
?>
      
      




								
								
                               
								