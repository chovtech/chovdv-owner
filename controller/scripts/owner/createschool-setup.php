<?php  
                 include('../../config/config.php');
                 include('../../../lang/english.php');

                 $userid  = $_POST['UserID'];
                 $groupSchoolID  = $_POST['groupSchoolID'];
                 $CampusID  = $_POST['CampusID'];
                 $maintag  = $_POST['maintag'];
                  
                  use PHPMailer\PHPMailer\PHPMailer;
                  use PHPMailer\PHPMailer\SMTP;
                  use PHPMailer\PHPMailer\Exception;
    
                require 'PHPMailer-master/Exception.php';
                require 'PHPMailer-master/PHPMailer.php';
                require 'PHPMailer-master/SMTP.php';

                 

                 $tagstate  = $_POST['tagstate'];
                 $headfname  = explode(',', $_POST['schoolheadname']);
                 $headlastname = explode(',', $_POST['schoooheadlastname']);
                 $heademail = explode(',',$_POST['schoolphoneemail']);
                 $headnum = explode(',', $_POST['formattedinput']);

                $counttotal = count($headfname);
                  
                  
               $selectschool = mysqli_query($link,"SELECT * FROM `institution` WHERE InstitutionID='$groupSchoolID'");
               $selectschoolfetch = mysqli_fetch_assoc($selectschool);
               
               $schoolname = $selectschoolfetch['InstitutionGeneralName'];
               $schoollink = $selectschoolfetch['CustomUrl'];
               
               $choolurl = $schoollink.='/sign-in/';
               
               $htmlcontent = '';


                if($maintag == '27' &&  $headlastname[0] == '' || $headfname[0] == '' || $heademail[0]  == '' || $headnum[0] == '')  
                {

                        $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$CampusID'");   
                        
                   
                }else
                {


                $selectserveretails = mysqli_query($link,"SELECT * FROM `serverpassword`");
                $selectserveretailscnt = mysqli_fetch_assoc($selectserveretails);
              
                 $servername =  $selectserveretailscnt['ServerName'];
                 $serverpwd =  $selectserveretailscnt['ServerPassword'];
                 $Host =  $selectserveretailscnt['Host'];
                 
                 
                 $affiliate_wa_sql = mysqli_query($link,"SELECT `affiliate`.Phone AS wanum FROM `affiliate` 
                 INNER JOIN `agencyorschoolowner` ON 
                 `affiliate`.`AffiliateID` =  `agencyorschoolowner`.`AffiliateID`
                 INNER JOIN `institution`
                 ON `agencyorschoolowner`.`AgencyOrSchoolOwnerID` =
                 `institution`.`AgencyOrSchoolOwnerID` WHERE `institution`.`InstitutionID`='$groupSchoolID'");
                 
                 $affiliate_wa_row = mysqli_fetch_assoc($affiliate_wa_sql);
                 
                 $affiliate_wanum = $affiliate_wa_row['wanum'];


                 $countnumofsucees = '';
                 $countnumoffailure = '';

                 foreach($headfname as $key =>  $headfnamenew)
                 {

                       
                        $headfnamenew;
                        $headlastnamearr = $headlastname[$key];
                        $heademailarr =  $heademail[$key];
                        $headnumarr =  $headnum[$key];
                        $headfnamenewarr =  $headfname[$key];

                         $staffverify = mysqli_query($link,"SELECT * FROM `staff` WHERE InstitutionID='$groupSchoolID' AND StaffEmail='$heademailarr'");
                         $staffverifycnt_rows  = mysqli_num_rows($staffverify);


                        if($staffverifycnt_rows > 0)
                        {
                       

                                   $countnumoffailure = +1;

                                  $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$CampusID'");
                                  
                        }else
                        
                        {



                                $countnumofsucees = +1;

                                $insert_staff = mysqli_query($link,"INSERT INTO `staff`( `InstitutionID`, `Role`, `StaffFirstName`, `StaffLastName`, `StaffMainNumber`, `StaffEmail`)
                                VALUES ('$groupSchoolID','schoolhead','$headfnamenew','$headlastnamearr', '$headnumarr','$heademailarr')");
       
       
       
       
       
                               
                                    
                                       $staffID =  mysqli_insert_id($link);
                                      
                                       $passwordmd5 = md5(1234);

                                        $insertlogin = mysqli_query($link,"INSERT INTO `userlogin`(`InstitutionIDOrCampusID`, `UserID`, `UserRegNumberOrUsername`, `UserPassword`, `UserType`) 
                                        VALUES ('$groupSchoolID','$staffID','$heademailarr','$passwordmd5','schoolhead')");



                
                                          
                                          $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$CampusID'"); 
                                          
                                          
                                          $logindetailscontainer = '';
                                          
                                                       
                                                     $email_to =  'hello@edumess.com';
                                                     $delivery = 'hello@edumess.com';
                                                     $altmess = 'alt';
                                                    
                                                    $nameto = '';
                                                    $subject = 'Congratulations on Your New Employment!';
                                                    $subjectnew = mb_encode_mimeheader($subject, 'UTF-8');
                                                    
                                                    
                                                    
                                                    $mail = new PHPMailer(true);
                                                     
                                                    try {
                                                        //Server settings
                                                        $mail->SMTPDebug = 0;                      //Enable verbose debug output
                                                        $mail->isSMTP();                                            //Send using SMTP
                                                        $mail->Host       = $Host;                     //Set the SMTP server to send through
                                                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                                        $mail->Username   = $servername;                     //SMTP username
                                                        $mail->Password   = $serverpwd;                             //SMTP password
                                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                                
                                                        //Recipients
                                                        $mail->setFrom($delivery,$schoolname);
                                                        $mail->addAddress($heademailarr, $nameto);     //Add a recipient
                                                        $mail->addAddress($heademailarr);               //Name is optional
                                                        $mail->addReplyTo($email_to, $nameto);
                                                        $mail->addCC($heademailarr);
                                                        $mail->addBCC($heademailarr);
                                                        
                                                        
                                                         //loop emaill for each user here
                                                        
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
                                                      
                                                       <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                                      
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
                                                                                                       <span style="font-size: 14px; line-height: 16px;">Hi '.$headfnamenewarr.'</span>
                                                                                                    </p>
                                                                                                    <p style="font-size: 14px; line-height: 160%;"></p>
                                                                                                    <p style="font-size: 14px; line-height: 160%;">
                                                                                                       <span style="font-size: 16px; line-height: 16px;">
                                                                                                          <strong>
                                                                                                             <span style="line-height: 16px;">congratulations.</span>
                                                                                                          </strong>
                                                                                                       </span>
                                                                                                    </p>
                                                                                                    <p style="font-size: 14px; line-height: 160%;"></p>
                                                                                                    <p style="font-size: 14px; line-height: 160%;">
                                                                                                       <span style="font-size: 14px; line-height: 16px; color: #292929;">
                                                                                                          <span style="line-height: 16px;">
                                                                                                             <strong></strong>
                                                                                                          </span> on your appointment as the new School Head at '.$schoolname.'! Here are your temporary login details you can login and edit it.</span>
                                                                                                    </p>
                                                                                                    
                                                                                                     
                                                                                                    <span style="font-size: 14px; line-height: 16px;">
                                                                                                    Username: '.$heademailarr.'</span>
                                                                                                     
                                                                                                   <span style="font-size: 14px; line-height: 16px;"><br>Password(<small style="font-style: italic;">temporary you can login and edit </small>):
                                                                                                    1234</span>
                                                                                                    
                                                                                                   
                                                                                                    <p style="font-size: 14px; line-height: 160%;"></p>
                                                                                                    
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
                                                                                                    <a href="'.$choolurl.'" target="_blank" class="v-button" style="box-sizing: border-box;display: inline-block;font-family:\'Cabin\',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #296beb; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:100%; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 16px;">
                                                                                                       <span style="display:block;padding:14px 44px 13px;line-height:120%;">
                                                                                                          <span style="line-height: 19.2px;">
                                                                                                             <strong>
                                                                                                                <span style="line-height: 19.2px;">Click to login</span>
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
                                                                                                    <p style="line-height: 140%;">'.$website_signupwhatsdes.' <span style="color: #3598db; line-height: 18.2px;">+'.$affiliate_wanum.'</span>, '.$website_signupwhatsdessub.' <a href="https://wa.me/'.$affiliate_wanum.'" style="color: #2dc26b; line-height: 18.2px;">WhatsApp '.$affiliate_wanum.'</a>
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
                                                                                                    <p style="line-height: 140%;">'.$website_signup_poweredb.' <br />
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
                                                  
                                                    
                                                        //Content
                                                        $mail->isHTML(true);                                  //Set email format to HTML
                                                        $mail->Subject = $subjectnew;
                                                        $mail->Body = $htmlcontent;
                                                        $mail->AltBody = $htmlcontent;
                                                
                                                        $mail->send();
                                                        
                                                    } catch (Exception $e) {
                                                
                                                   
                                                    }
                                             
                                            
                                            
                                            //loopemail for each user here
                                    
                        }

                       
                                 
                 }

                }
                 
                

        //validate feedback returning to ajax 

             $countnumsuccess  =   strlen($countnumofsucees); 
             $countnumoffailure =  strlen($countnumoffailure); 

             if($countnumsuccess >  $countnumoffailure)
             {
                 
                        echo 'success';
                        
             }else if($countnumoffailure == '0')
             {
                 
                echo 'success';
                
             }else
              {
                    echo 'found';
             }

        //validate feedback returning to ajax
        
   
?>