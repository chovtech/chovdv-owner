<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include('../../../config/config.php');

    // Retrieve the raw JSON data from the request body
    $webhookPayload = file_get_contents("php://input");
    
    // Decode the JSON data into a PHP array
    $webhookData = json_decode($webhookPayload, true);
    
    // Check if the decoding was successful
    if ($webhookData !== null){
        
        // Access the specific data you need
        $eventType = $webhookData['eventType'];

        $transactionReference = $webhookData['eventData']['transactionReference'];
        
        $paymentReference = $webhookData['eventData']['paymentReference'];
        
        $paidOn = $webhookData['eventData']['paidOn'];
        
        list($date, $time) = explode(" ", $paidOn);
        
        $paymentDescription = $webhookData['eventData']['paymentDescription'];
        
        
        $src_bankCode_pre = $webhookData['eventData']['paymentSourceInformation'][0];
        
        $src_amountPaid_pre = $webhookData['eventData']['paymentSourceInformation'][0];
        
        $src_accountName_pre = $webhookData['eventData']['paymentSourceInformation'][0];
        
        $src_sessionId_pre = $webhookData['eventData']['paymentSourceInformation'][0];
        
        $src_accountNumber_pre = $webhookData['eventData']['paymentSourceInformation'][0];
        
        $src_bankCode = $src_bankCode_pre['bankCode'];
        
        $src_amountPaid = $src_amountPaid_pre['amountPaid'];
        
        $src_accountName = $src_accountName_pre['accountName'];
        
        $src_sessionId = $src_sessionId_pre['sessionId'];
        
        $src_accountNumber = $src_accountNumber_pre['accountNumber'];
        
        
        $dest_bankCode_pre = $webhookData['eventData']['destinationAccountInformation'][0];
        
        $dest_bankName_pre = $webhookData['eventData']['destinationAccountInformation'];
        
        $dest_accountNumber_pre = $webhookData['eventData']['destinationAccountInformation'][0];
        
        $settlementAmount_pre = $webhookData['eventData']['destinationAccountInformation'][0];
        
        $paymentStatus_pre = $webhookData['eventData']['destinationAccountInformation'][0];
        
        $dest_bankCode = $dest_bankCode_pre['bankCode'];
        
        $dest_bankName = $dest_bankName_pre['bankName'];
        
        $dest_accountNumber = $dest_accountNumber_pre['accountNumber'];
        
        $settlementAmount = $settlementAmount_pre['settlementAmount'];
        
        $paymentStatus = $paymentStatus_pre['paymentStatus'];
        
        $description = 'Transfer from '.$src_accountName;
        
        
        $select_charge = mysqli_query($link, "SELECT * FROM `edumesspaymentcharges`");
        $select_charge_rowsel = mysqli_fetch_assoc($select_charge);
        $select_charge_row = mysqli_num_rows($select_charge);
        
        $fee_charge = intval($select_charge_rowsel['transfer_fee']);
        
        $fee_charge_cap = intval($select_charge_rowsel['transfer_cap']);
        
        $edumess_fee_check = ($fee_charge / 100) * $settlementAmount;
        
        if($edumess_fee_check > $fee_charge_cap)
        {
            $edumess_fee = $fee_charge_cap;
        }
        else
        {
            $edumess_fee = $edumess_fee_check;
        }
        
        // Process the data further as needed
        
        $select_agency = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE `WalletAccountNumber` = '$dest_accountNumber'");
        $select_agency_rowsel = mysqli_fetch_assoc($select_agency);
        $select_agency_row = mysqli_num_rows($select_agency);
    
        if ($select_agency_row > 0) 
        {
            $monnify_charge = intval($src_amountPaid) - intval($settlementAmount);

            $funding_amt = $settlementAmount;
        
            $UserID = $select_agency_rowsel['AgencyOrSchoolOwnerID'];
        
            $UserType = 'owner';
            
            $abba_Wallet_Balance = $select_agency_rowsel['WalletBalance'] + $funding_amt;
            
            
            $select_wallettransactions = mysqli_query($link, "INSERT INTO `wallettransactions`(`WalletTransactionID`, `UserID`, `UserType`, `TransactionType`, `Amount`, `TransactionFee`, `monnifyfee`, `Reference`, `MonthPaid`, `SalaryPaidDate`, `description`, `Date`, `Time`, `Status`) 
            VALUES (NULL,'$UserID','$UserType','Credit','$funding_amt','$edumess_fee','$monnify_charge','$paymentReference','0','0','$description','$date','$time','0')");
            
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
                } 
                else 
                {
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
            }
            else{


                $number = $AgencyOrSchoolOwnerWhatsAppPhone;
            }


            if($number == '')
            {

            }
            else
            {

                $date = date("Y-m-d");
                $time = date("h:i:s");

                $pros_selectappi_details = mysqli_query($link,"SELECT * FROM `whatsappapikey` WHERE InstitutionID='$abba_institution_id' AND Purpose='finance'");
                $pros_selectappi_detailscnt = mysqli_num_rows($pros_selectappi_details);
                $pros_selectappi_detailscnt_rows = mysqli_fetch_assoc($pros_selectappi_details);
                      
                if($pros_selectappi_detailscnt > 0)
                {
                          
                    $apikey=  $pros_selectappi_detailscnt_rows['ApiKey'];
                          
                }
                else
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
                "- Description: " . $description . "\n" .
                "- Wallet Balance: ₦" . number_format($abba_Wallet_Balance). "\n\n" .
                "If you have any questions or need assistance, feel free to reach out.");

                $file =  '';

                send_whatsapp_msg($abba_institution_id,$number,$apikey, $msg, $file);

            }

        }
        else
        {
            $select_staff = mysqli_query($link, "SELECT * FROM `staff` WHERE `WalletAccountNumber` = '$dest_accountNumber'");
            $select_staff_rowsel = mysqli_fetch_assoc($select_staff);
            $select_staff_row = mysqli_num_rows($select_staff);
        
            if ($select_staff_row > 0) 
            {
                $monnify_charge = $src_amountPaid - $settlementAmount;

                $funding_amt = $settlementAmount;
            
                $UserID = $select_staff_rowsel['StaffID'];
                
                $select_userlogin = mysqli_query($link, "SELECT * FROM `userlogin` WHERE `UserID` = '$UserID' AND `UserType` IN ('teacher', 'schoolhead', 'admin')");
                $select_userlogin_rowsel = mysqli_fetch_assoc($select_userlogin);
                $select_userlogin_row = mysqli_num_rows($select_userlogin);
            
                $UserType = $select_userlogin_rowsel['UserType'];
                
                $abba_Wallet_Balance = $select_staff_rowsel['WalletBalance'] + $funding_amt;
                
                
                $select_wallettransactions = mysqli_query($link, "INSERT INTO `wallettransactions`(`WalletTransactionID`, `UserID`, `UserType`, `TransactionType`, `Amount`, `TransactionFee`, `monnifyfee`, `Reference`, `MonthPaid`, `SalaryPaidDate`, `description`, `Date`, `Time`, `Status`) 
                VALUES (NULL,'$UserID','$UserType','Credit','$funding_amt','$edumess_fee','$monnify_charge','$paymentReference','0','0','$description','$date','$time','0')");
                
                $sqlinsertaccountdetailsUPDATE = mysqli_query($link, "UPDATE `staff` SET `WalletBalance`='$abba_Wallet_Balance' WHERE `StaffID` = '$UserID'");
    
                $select_agency_content = mysqli_query($link, "SELECT * FROM `institution` INNER JOIN  staff  ON `institution`.InstitutionID = `staff`.InstitutionID WHERE `staff`.StaffID='$UserID'");
                $select_agency_content_cnt = mysqli_num_rows($select_agency_content);
                $select_agency_content_cnt_row = mysqli_fetch_assoc($select_agency_content);
    
    
                $abba_institution_id =  $select_agency_content_cnt_row['InstitutionID'];
                $AgencyOrSchoolOwnerMainPhone = $select_agency_content_cnt_row['StaffMainNumber'];
                
                $AgencyOrSchoolOwnerWhatsAppPhone = $select_agency_content_cnt_row['StaffWhatsappNumber'];
            
                $AgencyOrSchoolOwnerName = $select_agency_content_cnt_row['StaffFirstName'];
                $InstitutionGeneralName = $select_agency_content_cnt_row['InstitutionGeneralName'];
        
                function formatPhoneNumber($phoneNumber) {
                    // Remove non-numeric characters
                    $numericPhoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        
                    // Check if the number starts with '0' and add '234' in that case
                    if (substr($numericPhoneNumber, 0, 1) === '0') {
                        return '234' . substr($numericPhoneNumber, 1);
                    } 
                    else 
                    {
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
                    $number = $AgencyOrSchoolOwnerMainPhone;
                }
                else{
    
    
                    $number = $AgencyOrSchoolOwnerWhatsAppPhone;
                }
    
    
                if($number == '')
                {
    
                }
                else
                {
    
                    $date = date("Y-m-d");
                    $time = date("h:i:s");
    
                    $pros_selectappi_details = mysqli_query($link,"SELECT * FROM `whatsappapikey` WHERE InstitutionID='$abba_institution_id' AND Purpose='finance'");
                    $pros_selectappi_detailscnt = mysqli_num_rows($pros_selectappi_details);
                    $pros_selectappi_detailscnt_rows = mysqli_fetch_assoc($pros_selectappi_details);
                          
                    if($pros_selectappi_detailscnt > 0)
                    {
                              
                        $apikey=  $pros_selectappi_detailscnt_rows['ApiKey'];
                              
                    }
                    else
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
                    "- Description: " . $description . "\n" .
                    "- Wallet Balance: ₦" . number_format($abba_Wallet_Balance). "\n\n" .
                    "If you have any questions or need assistance, feel free to reach out.");
    
                    $file =  '';
    
                    send_whatsapp_msg($abba_institution_id,$number,$apikey, $msg, $file);
    
                }
            }
            else
            {
                $select_parent = mysqli_query($link, "SELECT * FROM `parent` WHERE `WalletAccountNumber` = '$dest_accountNumber'");
                $select_parent_rowsel = mysqli_fetch_assoc($select_parent);
                $select_parent_row = mysqli_num_rows($select_parent);
            
                if ($select_parent_row > 0) 
                {
                    $monnify_charge = $src_amountPaid - $settlementAmount;

                    $funding_amt = $settlementAmount;
                
                    $UserID = $select_staff_rowsel['ParentID'];
                    
                    $select_userlogin = mysqli_query($link, "SELECT * FROM `userlogin` WHERE `UserID` = '$UserID' AND `UserType` IN ('parent')");
                    $select_userlogin_rowsel = mysqli_fetch_assoc($select_userlogin);
                    $select_userlogin_row = mysqli_num_rows($select_userlogin);
                
                    $UserType = $select_userlogin_rowsel['UserType'];
                    
                    $abba_Wallet_Balance = $select_staff_rowsel['WalletBalance'] + $funding_amt;
                    
                    
                    $select_wallettransactions = mysqli_query($link, "INSERT INTO `wallettransactions`(`WalletTransactionID`, `UserID`, `UserType`, `TransactionType`, `Amount`, `TransactionFee`, `monnifyfee`, `Reference`, `MonthPaid`, `SalaryPaidDate`, `description`, `Date`, `Time`, `Status`) 
                    VALUES (NULL,'$UserID','$UserType','Credit','$funding_amt','$edumess_fee','$monnify_charge','$paymentReference','0','0','$description','$date','$time','0')");
                    
                    $sqlinsertaccountdetailsUPDATE = mysqli_query($link, "UPDATE `parent` SET `WalletBalance`='$abba_Wallet_Balance' WHERE `ParentID` = '$UserID'");
        
                    $select_agency_content = mysqli_query($link, "SELECT * FROM `institution` INNER JOIN  parent  ON `institution`.InstitutionID = `parent`.InstitutionID WHERE `parent`.ParentID='$UserID'");
                    $select_agency_content_cnt = mysqli_num_rows($select_agency_content);
                    $select_agency_content_cnt_row = mysqli_fetch_assoc($select_agency_content);
        
        
                    $abba_institution_id =  $select_agency_content_cnt_row['InstitutionID'];
                    $AgencyOrSchoolOwnerMainPhone = $select_agency_content_cnt_row['ParentMainPhoneNumber'];
                    
                    $AgencyOrSchoolOwnerWhatsAppPhone = $select_agency_content_cnt_row['ParentWhatsappNumber'];
                
                    $AgencyOrSchoolOwnerName = $select_agency_content_cnt_row['ParentFirstName'];
                    $InstitutionGeneralName = $select_agency_content_cnt_row['InstitutionGeneralName'];
            
                    function formatPhoneNumber($phoneNumber) {
                        // Remove non-numeric characters
                        $numericPhoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
            
                        // Check if the number starts with '0' and add '234' in that case
                        if (substr($numericPhoneNumber, 0, 1) === '0') {
                            return '234' . substr($numericPhoneNumber, 1);
                        } 
                        else 
                        {
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
                        $number = $AgencyOrSchoolOwnerMainPhone;
                    }
                    else{
        
        
                        $number = $AgencyOrSchoolOwnerWhatsAppPhone;
                    }
        
        
                    if($number == '')
                    {
        
                    }
                    else
                    {
        
                        $date = date("Y-m-d");
                        $time = date("h:i:s");
        
                        $pros_selectappi_details = mysqli_query($link,"SELECT * FROM `whatsappapikey` WHERE InstitutionID='$abba_institution_id' AND Purpose='finance'");
                        $pros_selectappi_detailscnt = mysqli_num_rows($pros_selectappi_details);
                        $pros_selectappi_detailscnt_rows = mysqli_fetch_assoc($pros_selectappi_details);
                              
                        if($pros_selectappi_detailscnt > 0)
                        {
                                  
                            $apikey=  $pros_selectappi_detailscnt_rows['ApiKey'];
                                  
                        }
                        else
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
                        "- Description: " . $description . "\n" .
                        "- Wallet Balance: ₦" . number_format($abba_Wallet_Balance). "\n\n" .
                        "If you have any questions or need assistance, feel free to reach out.");
        
                        $file =  '';
        
                        send_whatsapp_msg($abba_institution_id,$number,$apikey, $msg, $file);
        
                    }
                }
                else
                {
                    
                }
            }
        }
        
        // For example, log the details
        $logMessage = $webhookData;
        error_log($logMessage, 3, "webhook_log1.txt");
    
        // Empty the file before writing new data
        file_put_contents("webhook_data2.txt", "");
    
        // Save the decoded data into a file
        file_put_contents("webhook_data2.txt", print_r($webhookData, true));
        
    } 
    else {
        // Handle the case where JSON decoding failed
        error_log("Failed to decode JSON data from webhook", 3, "webhook_log1.txt");
    }

    // Send a response (optional)
    header("Content-Type: application/json");
    echo json_encode(["status" => "success"]);

?>