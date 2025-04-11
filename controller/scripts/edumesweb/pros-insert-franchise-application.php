<?php

                include('../../config/config.php');
                include('../../../lang/english.php');
                
                  use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;
            
                require 'PHPMailer-master/Exception.php';
                require 'PHPMailer-master/PHPMailer.php';
                require 'PHPMailer-master/SMTP.php';
        


                $firstName  = mysqli_real_escape_string($link,$_POST['firstName']);
                $lastName  =mysqli_real_escape_string($link, $_POST['lastName']);
                $email  = $_POST['email'];
                $pros_country  = $_POST['pros_country'];
                $pros_region  = $_POST['pros_region'];
                $location  = $_POST['location'];
                $tellusaboutyou_self  = mysqli_real_escape_string($link,$_POST['tellusaboutyou_self']);
                $tellusaboutyou_want_market  =  mysqli_real_escape_string($link, $_POST['tellusaboutyou_want_market']);
                $formattedinput  = $_POST['formattedinput'];



                $prosgetfranchiselocationdetails = mysqli_query($link, "SELECT * FROM `franchiseregion` INNER JOIN `franchiselocation` ON 
                `franchiseregion`.`FranchiseRegionID` = `franchiselocation`.`FranchiseRegionID` INNER JOIN `countries` ON `franchiseregion`.`CountryID` = `countries`.`countryID`
                WHERE `franchiseregion`.`CountryID`='$pros_country' AND  `franchiseregion`.`FranchiseRegionID`='$pros_region' AND `franchiselocation`.`FranchiseLocationID`='$location'");
                
                $prosgetfranchiselocationdetailsgetrecord = mysqli_fetch_assoc($prosgetfranchiselocationdetails);
                
                $FranchiseRegionTitle = $prosgetfranchiselocationdetailsgetrecord['FranchiseRegionTitle'];
                $FranchiseLocationTitle = $prosgetfranchiselocationdetailsgetrecord['FranchiseLocationTitle'];
                $CountryName = $prosgetfranchiselocationdetailsgetrecord['CountryName'];

                $select_verify_query = mysqli_query($link, "SELECT * FROM `franchiserecord` WHERE Email='$email'");
                $select_verify_query_cnt = mysqli_num_rows($select_verify_query);

                if($select_verify_query_cnt > 0)
                {

                        echo 'exist';
                }else
                {
                    $insert_record_query = "INSERT INTO `franchiserecord` (`FirstName`, `LastName`, `Email`, `Phone`, `CountryID`, `FranchiseRegionID`, `FranchiseLocationID`, `AboutFranchise`, `HowToSellEdumess`)
                    VALUES ('$firstName', '$lastName', '$email', '$formattedinput', '$pros_country', '$pros_region', '$location', '$tellusaboutyou_self', '$tellusaboutyou_want_market')";
                    
                    $insert_record = mysqli_query($link, $insert_record_query);
                    
                    if ($insert_record) {
                        echo 'success';
                        
                        
                        
                        
                        
         $htmlcontent.='
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
                                                                <img width="94" height="94" src="https://img.icons8.com/3d-fluency/94/confetti.png" alt="confetti"/>
                                                                 
                                                                  
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
                                                               <span style="font-size: 14px; line-height: 16px;">'.$website_signupgoogleinfoe_hi.' '.$firstName.'</span>
                                                            </p>
                                                            <p style="font-size: 14px; line-height: 160%;"></p>
                                                            <p style="font-size: 14px; line-height: 160%;">
                                                               <span style="font-size: 16px; line-height: 16px;">
                                                                  <strong>
                                                                     <span style="line-height: 16px;">Franchise Application</span>
                                                                  </strong>
                                                               </span>
                                                            </p>
                                                            <p style="font-size: 14px; line-height: 160%;"></p>
                                                            <p style="font-size: 14px; line-height: 160%;">
                                                               <span style="font-size: 14px; line-height: 16px; color: #292929;">
                                                                  <span style="line-height: 16px;">
                                                                     <strong>Congratulations</strong>
                                                                  </span>We are pleased to inform you that your franchise application has been successfully received.
                                                                  To take the next step in the process, kindly click the button below to schedule an interview</span>
                                                            </p>
                                                           
                                                            
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
                                                            <a href="'.$defaultUrl.'schedule-interview" target="_blank" class="v-button" style="box-sizing: border-box;display: inline-block;font-family:\'Cabin\',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #296beb; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:100%; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 16px;">
                                                               <span style="display:block;padding:14px 44px 13px;line-height:120%;">
                                                                  <span style="line-height: 19.2px;">
                                                                     <strong>
                                                                        <span style="line-height: 19.2px;">Schedule Interview</span>
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
         
         
         
         
         
         
         
         
         
         
         
         
         
         
          $prosedumessfranchisedetails.='
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
                                                                <img width="94" height="94" src="https://img.icons8.com/3d-fluency/94/confetti.png" alt="confetti"/>
                                                                 
                                                                  
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
                                                               <span style="font-size: 14px; line-height: 16px;">'.$website_signupgoogleinfoe_hi.' '.$firstName.'</span>
                                                            </p>
                                                            <p style="font-size: 14px; line-height: 160%;"></p>
                                                            <p style="font-size: 14px; line-height: 160%;">
                                                               <span style="font-size: 16px; line-height: 16px;">
                                                                  <strong>
                                                                     <span style="line-height: 16px;">Franchise Application</span>
                                                                  </strong>
                                                               </span>
                                                            </p>
                                                            <p style="font-size: 14px; line-height: 160%;"></p>
                                                            <p style="font-size: 14px; line-height: 160%;">
                                                               <span style="font-size: 14px; line-height: 16px; color: #292929;">
                                                                  <span style="line-height: 16px;">
                                                                     <strong>Dear Franchise Team,</strong>
                                                                  </spanI am interested in applying for a franchise opportunity with your company. Please find below my application details:</span>
                                                                  
                                                                  
                                                                    <ul>
                                                                        <li><strong>Name:</strong>'.$firstName.' '.$lastName.'</li>
                                                                        <li><strong>Email:</strong>'.$email.'</li>
                                                                        <li><strong>Phone:</strong> '.$formattedinput.'</li>
                                                                        <li><strong>About my self:</strong> '.$tellusaboutyou_self.'</li>
                                                                        <li><strong>How I want to Sell EduMESS:</strong> '.$tellusaboutyou_want_market.'</li>
                                                                        <li><strong>Franchise Country:</strong> '.$CountryName.'</li>
                                                                        <li><strong>Franchise Region:</strong> '.$FranchiseRegionTitle.'</li>
                                                                         <li><strong>Franchise Location:</strong> '.$FranchiseLocationTitle.'</li>
                                                                    </ul>
                                                                   <p>Thank you for considering my application. Please let me know if there are any additional steps or information required.</p>
                                                                     <p>Sincerely,<br>'.$firstName.' '.$lastName.'</p>
                                                            </p>
                                                            
                                                            
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
         
         
         
          $selectserveretails = mysqli_query($link,"SELECT * FROM `serverpassword`");
       $selectserveretailscnt = mysqli_fetch_assoc($selectserveretails);
      
         $servername =  $selectserveretailscnt['ServerName'];
         $serverpwd =  $selectserveretailscnt['ServerPassword'];
         
        
         
            //send to applicant here
             $email_to =  'hello@edumess.com';
            $delivery = 'hello@edumess.com';
             $altmess = 'alt';
            // = 'emaildelivery@schoolportalgenerator.com';
            $nameto = '';
            $subject = 'Franchise Interview';
            $subjectnew = mb_encode_mimeheader($subject, 'UTF-8');
            
            // $encoded_subject = "=?$charset?B?".base64_encode($subject)."?=\n" ;
            
            $mail = new PHPMailer(true);
              $owner =  'EduMESS';
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'chovgroup.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $servername;                     //SMTP username
                $mail->Password   = $serverpwd;                             //SMTP password
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
            
            
            
            
             $mailedumess = new PHPMailer(true);
              $owner =  'EduMESS';
            try {
                //Server settings
                $mailedumess->SMTPDebug = 0;                      //Enable verbose debug output
                $mailedumess->isSMTP();                                            //Send using SMTP
                $mailedumess->Host       = 'chovgroup.com';                     //Set the SMTP server to send through
                $mailedumess->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mailedumess->Username   = $servername;                     //SMTP username
                $mailedumess->Password   = $serverpwd;                             //SMTP password
                $mailedumess->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mailedumess->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
                //Recipients
                $mailedumess->setFrom($delivery,$owner);
                $mailedumess->addAddress('franchise@edumess.com', $nameto);     //Add a recipient
                $mailedumess->addAddress('franchise@edumess.com');               //Name is optional
                $mailedumess->addReplyTo($email_to, $nameto);
                $mailedumess->addCC('franchise@edumess.com');
               $mailedumess->addBCC('franchise@edumess.com');
                
                
                
          
            
                //Content
                $mailedumess->isHTML(true);                                  //Set email format to HTML
                $mailedumess->Subject = $subjectnew;
                $mailedumess->Body = $prosedumessfranchisedetails;
                $mailedumess->AltBody = $prosedumessfranchisedetails;
        
                $mailedumess->send();
                
            } catch (Exception $e) {
        
           
            }
                        
                        
                        
                        
                    } else {
                        // Handle the case where the insertion was not successful.
                        // You can add error handling here if needed.
                        echo 'error: ' . mysqli_error($link); // 
                   }

            }



               

 ?>