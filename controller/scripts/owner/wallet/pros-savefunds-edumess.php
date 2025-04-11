


<?php
      
      
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');


        
  
        $UserID = $_POST['UserID'];
        $UserType = $_POST['UserType'];

        $prossavititle_title = mysqli_real_escape_string($link, $_POST['prossavititle_title']);
        $SchoolGeneralNameAmount = $_POST['Amount'];
        $Date = $_POST['Date'];
        $datastatus = $_POST['datastatus'];

    

        


        date_default_timezone_set('Africa/Lagos');

        // Get the current date
        $currentDate = date('Y-m-d');

      

        if( $datastatus == 'save')
        {

                $status = 1;

                $select_agency_content = mysqli_query($link, "SELECT * FROM `institution` INNER JOIN  agencyorschoolowner  ON `institution`.AgencyOrSchoolOwnerID = `agencyorschoolowner`.AgencyOrSchoolOwnerID WHERE `agencyorschoolowner`.AgencyOrSchoolOwnerID='$UserID'");
                $select_agency_content_cnt = mysqli_num_rows($select_agency_content);
                $select_agency_content_cnt_row = mysqli_fetch_assoc($select_agency_content);
        
        
                $walletamount =   $select_agency_content_cnt_row ['WalletBalance'];

                $abba_institution_id =  $select_agency_content_cnt_row['InstitutionID'];
                $numberowner1 = $select_agency_content_cnt_row['AgencyOrSchoolOwnerMainPhone'];
                $numberowner2 = $select_agency_content_cnt_row['AgencyOrSchoolOwnerWhatsAppPhone'];
                $AgencyOrSchoolOwnerName = $select_agency_content_cnt_row['AgencyOrSchoolOwnerName'];
                $AgencyOrSchoolOwnerID = $select_agency_content_cnt_row['AgencyOrSchoolOwnerID'];
            
               
            
                // $firstLettercampus = substr($CampusName, 0, 1);
            
                $InstitutionGeneralName = $select_agency_content_cnt_row['InstitutionGeneralName'];
                
                $prosfullschool =  $InstitutionGeneralName;
            
            
            
            
                                 
                                 if($numberowner2 == '')
                                 {
                                         $ownernumber = $numberowner1;
                                 }else{
                                 
                                 
                                        $ownernumber = $numberowner2;
                                 }
                                 
                                         
                                 
                                 
                                 
                                         // Function to format a phone number
                                         function formatPhoneNumber($phoneNumber) {
                                         // Remove non-numeric characters
                                         $numericPhoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
                                 
                                         // Check if the number starts with '0' and add '234' in that case
                                         if (substr($numericPhoneNumber, 0, 1) === '0') {
                                                 return '234' . substr($numericPhoneNumber, 1);
                                         } else {
                                                 // Check if the number starts with '+', if yes, remove the '+'
                                                 if (substr($numericPhoneNumber, 0, 1) === '+') {
                                                 $numericPhoneNumber = substr($numericPhoneNumber, 1);
                                                 }
                                 
                                                 // Return the numeric phone number
                                                 return $numericPhoneNumber;
                                         }
                                         }
                                 
                                 
                                         // Format the phone numbers
                                         $number = formatPhoneNumber(  $ownernumber);
                                 
                                 
                                 
                                 
               
        
        
                if($SchoolGeneralNameAmount > $walletamount ){
        
                        echo '3';
        
                }else
                {
        
                        $select_scheduleverification = mysqli_query($link,"SELECT * FROM `edumesssavelock` WHERE
                        UserID='$UserID' AND UserType='$UserType' AND PayBackDate='$Date' AND PlanTitle='$prossavititle_title' AND SaveStatus='$status'");
               
                       $select_scheduleverificationcnt = mysqli_num_rows($select_scheduleverification);
               
                       if( $select_scheduleverificationcnt > 0)
                       {
               
                           echo '2';
               
                       }else
                       {
               
        
        
                               $walletbalance_amount =   $walletamount - $SchoolGeneralNameAmount;
        
                               $update_walletbalance = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `WalletBalance`='$walletbalance_amount' WHERE AgencyOrSchoolOwnerID='$UserID'");
        
        
                        
               
               
                               $insert_saving = mysqli_query($link,"INSERT INTO 
                               `edumesssavelock`(`UserID`, `UserType`, `Amount`, `PlanTitle`, `PayBackDate`,  `SaveStatus`, `DateSaved`)
                                VALUES ('$UserID','$UserType','$SchoolGeneralNameAmount','$prossavititle_title','$Date','$status','$currentDate')");
               
               
               
               
                                       
                                                        if($number == '')
                                                        {
                                                
                                                        }else
                                                        {
                                                
                                                                $date = date("Y-m-d");
                                                                $time = date("h:i:s");
                                                                
                                                                
                                                                
                                                                
                                                                
                                                 $pros_selectappi_details = mysqli_query($link,"SELECT * FROM `whatsappapikey` WHERE InstitutionID='$abba_institution_id' AND Purpose='finance'");
                                                  $pros_selectappi_detailscnt = mysqli_num_rows($pros_selectappi_details);
                                                  $pros_selectappi_detailscnt_rows = mysqli_fetch_assoc($pros_selectappi_details);
                                                  
                                                  
                                                  if($pros_selectappi_detailscnt > 0)
                                                  {
                                                      
                                                        $apikey=  $pros_selectappi_detailscnt_rows['ApiKey'];
                                                      
                                                  }else
                                                  {
                                                      
                                                            $pros_selectappi_details_default = mysqli_query($link,"SELECT * FROM `whatsappapikey` WHERE InstitutionID='0' AND Purpose='Default'");
                                                          $pros_selectappi_detailscnt_default = mysqli_num_rows($pros_selectappi_details_default);
                                                          $pros_selectappi_detailscnt_rows_default = mysqli_fetch_assoc($pros_selectappi_details_default);
                                                          
                                                         $apikey=   $pros_selectappi_detailscnt_rows_default['ApiKey'];
                                                              
                                                              
                                                               
                                                      
                                                  }
                                                                            
                                                                
                                                                include('../messaging/whatsapp/send_whatapp_msg.php');
                                                
                                                
                                                                $msg = rawurlencode(
                                                                        '*Funds Transfer Alert*' . "\n\n" .
                                                                        'Dear ' . $AgencyOrSchoolOwnerName . ' ,' . "\n\n" .
                                                                        
                                                                        'We hope this message finds you well. This is to inform you that a funds transfer has been successfully initiated from your wallet to your saving account.' . "\n\n" .
                                                                        '*Transaction Details:*' . "\n" .
                                                                        '   - *Amount:* ₦' . number_format($SchoolGeneralNameAmount) . "\n" .
                                                                        '   - *Date and Time:* ' . $currentDate . ' ' . $time . "\n" .
                                                                        
                                                                        'Thank you for choosing ' . $prosfullschool . '.' . "\n\n" .
                                                                        'Best regards,' . "\n" .
                                                                        $prosfullschool . ' Team' . "\n\n" .
                                                                        
                                                                        '*(powered by EduMESS)*'
                                                                        );
                                                                        
                                                
                                                                
                                                                $file =  '';
                                                
                                                
                                                                        
                                                                send_whatsapp_msg($abba_institution_id,$number,$apikey, $msg, $file);
                                                
                                                        }
               
                                       echo '1';
               
                       }
                      
        
        
        
                        
                }
        
        





        }else{




                $status = 2;

                $select_agency_content = mysqli_query($link, "SELECT * FROM `institution` INNER JOIN  agencyorschoolowner  ON `institution`.AgencyOrSchoolOwnerID = `agencyorschoolowner`.AgencyOrSchoolOwnerID WHERE `agencyorschoolowner`.AgencyOrSchoolOwnerID='$UserID'");
                $select_agency_content_cnt = mysqli_num_rows($select_agency_content);
                $select_agency_content_cnt_row = mysqli_fetch_assoc($select_agency_content);
        
        
                $walletamount =   $select_agency_content_cnt_row ['WalletBalance'];
        

                $abba_institution_id =  $select_agency_content_cnt_row['InstitutionID'];
                $numberowner1 = $select_agency_content_cnt_row['AgencyOrSchoolOwnerMainPhone'];
                $numberowner2 = $select_agency_content_cnt_row['AgencyOrSchoolOwnerWhatsAppPhone'];
                $AgencyOrSchoolOwnerName = $select_agency_content_cnt_row['AgencyOrSchoolOwnerName'];
                $AgencyOrSchoolOwnerID = $select_agency_content_cnt_row['AgencyOrSchoolOwnerID'];
            
               
            
                // $firstLettercampus = substr($CampusName, 0, 1);
            
                $InstitutionGeneralName = $select_agency_content_cnt_row['InstitutionGeneralName'];
                
                $prosfullschool =  $InstitutionGeneralName;
            
            
            
            
                                 
                                 if($numberowner2 == '')
                                 {
                                         $ownernumber = $numberowner1;
                                 }else{
                                 
                                 
                                        $ownernumber = $numberowner2;
                                 }
                                 
                                         
                                 
                                 
                                 
                                         // Function to format a phone number
                                         function formatPhoneNumber($phoneNumber) {
                                         // Remove non-numeric characters
                                         $numericPhoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
                                 
                                         // Check if the number starts with '0' and add '234' in that case
                                         if (substr($numericPhoneNumber, 0, 1) === '0') {
                                                 return '234' . substr($numericPhoneNumber, 1);
                                         } else {
                                                 // Check if the number starts with '+', if yes, remove the '+'
                                                 if (substr($numericPhoneNumber, 0, 1) === '+') {
                                                 $numericPhoneNumber = substr($numericPhoneNumber, 1);
                                                 }
                                 
                                                 // Return the numeric phone number
                                                 return $numericPhoneNumber;
                                         }
                                         }
                                 
                                 
                                         // Format the phone numbers
                                         $number = formatPhoneNumber(  $ownernumber);
                                 
                                 
                                 
        
        
                if($SchoolGeneralNameAmount > $walletamount ){
        
                        echo '3';
        
                }else
                {
        
                        $select_scheduleverification = mysqli_query($link,"SELECT * FROM `edumesssavelock` WHERE
                        UserID='$UserID' AND UserType='$UserType' AND PayBackDate='$Date' AND PlanTitle='$prossavititle_title' AND SaveStatus='$status'");
               
                       $select_scheduleverificationcnt = mysqli_num_rows($select_scheduleverification);
               
                       if( $select_scheduleverificationcnt > 0)
                       {
               
                           echo '2';
               
                       }else
                       {
               
        
        
                               $walletbalance_amount =   $walletamount - $SchoolGeneralNameAmount;
        
        
        
                               $update_walletbalance = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `WalletBalance`='$walletbalance_amount' WHERE AgencyOrSchoolOwnerID='$UserID'");
        
        
                        
               
               
                               $insert_saving = mysqli_query($link,"INSERT INTO 
                               `edumesssavelock`(`UserID`, `UserType`, `Amount`, `PlanTitle`, `PayBackDate`,  `SaveStatus`, `DateSaved`)
                                VALUES ('$UserID','$UserType','$SchoolGeneralNameAmount','$prossavititle_title','$Date','$status','$currentDate')");
               
               
               if($number == '')
               {
       
               }else
               {
       
                       $date = date("Y-m-d");
                       $time = date("h:i:s");
       
                       
                       include('../messaging/whatsapp/send_whatapp_msg.php');
       
       
                       $msg = rawurlencode(
                               '*Funds Transfer Alert*' . "\n\n" .
                               'Dear ' . $AgencyOrSchoolOwnerName . ' ,' . "\n\n" .
                               
                               'We hope this message finds you well. This is to inform you that a funds transfer has been successfully initiated from your wallet to your locked account.' . "\n\n" .
                               '*Transaction Details:*' . "\n" .
                               '   - *Amount:* ₦' . number_format($SchoolGeneralNameAmount) . "\n" .
                               '   - *Date and Time:* ' . $currentDate . ' ' . $time . "\n" .
                               
                               'Thank you for choosing ' . $prosfullschool . '.' . "\n\n" .
                               'Best regards,' . "\n" .
                               $prosfullschool . ' Team' . "\n\n" .
                               
                               '*(powered by EduMESS)*'
                               );
                               
       
                       
                       $file =  '';
       
       
                               
                       send_whatsapp_msg($abba_institution_id,$number, $msg, $file);
       
               }
               
                                      
               
                                       echo '1';
               
                       }
                      
        
        
        
                        
                }






        }


        
      
       


       

       
      
       
       


?>



