<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include('../../../config/config.php');

    $final_charge_amt = $_POST['final_charge_amt'];

    $funding_amt = $_POST['funding_amt'];

    $UserID = $_POST['UserID'];

    $UserType = $_POST['UserType'];

    $referencenumber = $_POST['referencenumber'];

    date_default_timezone_set("Africa/Lagos");

    $date = date("Y-m-d");
    $time = date("h:i:s");
    
    $Transaction_Type = $_POST['Transaction_Type'];

     $select_wallettransactions = mysqli_query($link, "INSERT INTO `wallettransactions`(`WalletTransactionID`, `UserID`, `UserType`, `TransactionType`, `Amount`, `TransactionFee`, `Reference`, `Date`, `Time`) 
        VALUES (NULL,'$UserID','$UserType','$Transaction_Type','$funding_amt','$final_charge_amt','$referencenumber','$date','$time')");

    $select_agency = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$UserID'");
    $select_agency_rowsel = mysqli_fetch_assoc($select_agency);
    $select_agency_row = mysqli_num_rows($select_agency);

    if ($select_agency_row > 0) 
    {
        $abba_Wallet_Balance = $select_agency_rowsel['WalletBalance'] + $funding_amt;

        $sqlinsertaccountdetailsUPDATE = mysqli_query($link, "UPDATE `agencyorschoolowner` SET `WalletBalance`='$abba_Wallet_Balance' WHERE `AgencyOrSchoolOwnerID` = '$UserID'");

        $select_agency_content = mysqli_query($link, "SELECT * FROM `institution` INNER JOIN  agencyorschoolowner  ON `institution`.AgencyOrSchoolOwnerID = `agencyorschoolowner`.AgencyOrSchoolOwnerID WHERE `agencyorschoolowner`.AgencyOrSchoolOwnerID='$UserID'");
        $select_agency_content_cnt = mysqli_num_rows($select_agency_content);
        $select_agency_content_cnt_row = mysqli_fetch_assoc($select_agency_content);


        $abba_institution_id =  $select_agency_content_cnt_row['InstitutionID'];
        $AgencyOrSchoolOwnerMainPhone = $select_agency_content_cnt_row['AgencyOrSchoolOwnerMainPhone'];
        
        $AgencyOrSchoolOwnerWhatsAppPhone = $select_agency_content_cnt_row['AgencyOrSchoolOwnerWhatsAppPhone'];
        
         $AgencyOrSchoolOwnerName = $select_agency_content_cnt_row['AgencyOrSchoolOwnerName'];
         $InstitutionGeneralName = $select_agency_content_cnt_row['InstitutionGeneralName'];

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

            if($AgencyOrSchoolOwnerWhatsAppPhone == '')
            {
                $number =  $AgencyOrSchoolOwnerMainPhone;
            }else{


                $number = $AgencyOrSchoolOwnerWhatsAppPhone;
            }


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


                $msg = rawurlencode(" **Credit Alert** \n\n" .
                "Your account has been successfully credited.\n\n" .
                "Transaction Details:\n" .
                "- Amount: ₦" . number_format($funding_amt). "\n" .
                "- Date: " . $date . " " . $time . "\n" .
                "- Wallet Balance: ₦" . number_format($abba_Wallet_Balance). "\n\n" .
                "If you have any questions or need assistance, feel free to reach out. Happy spending!");

                   
                   $file =  '';


                        
                   send_whatsapp_msg($abba_institution_id,$number,$apikey, $msg, $file);

            }

    }
    else
    {

    }
    echo 1;

?>