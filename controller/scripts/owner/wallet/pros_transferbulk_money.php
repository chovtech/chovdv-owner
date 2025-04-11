<?php

                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                include('../../../config/config.php');


                $walletbankname =  explode(',',$_POST['walletbankname']);
                $account_number =  explode(',',$_POST['accounnum']);
                $accountref =  explode(',',$_POST['accountref']);
                $account_name = explode(',', $_POST['accounname']);
                $transfer_amt = explode(',',$_POST['totalsalarytobepaid']);
                $staffID = explode(',',$_POST['staffID']);
                $InstitutionID = explode(',',$_POST['InstitutionID']);

                $maintoken = $_POST['storedtoken'];
                $narration = $_POST['narration'];
                $Aamount = $_POST['totalamounttosent_allstaff'];

                $month = $_POST['paymenetmonth'];
                $proscheckedpayementtype = $_POST['prospaymentype'];

                $salrytotalamountowner = $Aamount;
                
                $UserID = $_POST['UserID'];
                $UserType = $_POST['UserType'];

                $fullmessagearr = array();
                $fullnumarr= array();
                $fullfilearr= array();
                $fullinstit= array();
                $apikeynecont = array();
                
                
              

                 date_default_timezone_set("Africa/Lagos");
                $date = date("Y-m-d");
                $time = date("h:i:s");


                 $do = str_replace('-', '', date("Y-m-d"));
                $no = str_replace(':', '',date("h:i:s"));
                $po = rand();
                $referencenumbero = "RX" . $do . $no . $po . "-" .$UserID;

             

              

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

            
                $select_agency = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` INNER JOIN institution  ON  `agencyorschoolowner`.AgencyOrSchoolOwnerID =  `institution`.AgencyOrSchoolOwnerID
                WHERE `agencyorschoolowner`.AgencyOrSchoolOwnerID='$UserID' AND TransactionPin != 0");
                $select_agency_rowsel = mysqli_fetch_assoc($select_agency);
                $select_agency_row = mysqli_num_rows($select_agency);

                if ($select_agency_row > 0) 
                {


                        
                                $WalletBalance = $select_agency_rowsel['WalletBalance'];
                               $AgencyOrSchoolOwnerMainPhone_Initial = $select_agency_rowsel['AgencyOrSchoolOwnerMainPhone'];
                               $AgencyOrSchoolOwnerWhatsAppPhone_Initial = $select_agency_rowsel['AgencyOrSchoolOwnerWhatsAppPhone'];

                                $InstitutionGeneralName_Initial = $select_agency_rowsel['InstitutionGeneralName'];

                                $InstitutionID_Initial = $select_agency_rowsel['InstitutionID'];

                            

                            if($AgencyOrSchoolOwnerWhatsAppPhone_Initial == '')
                            {
                                        $ownernewnumber = $AgencyOrSchoolOwnerMainPhone_Initial;
                            }else{

                                         $ownernewnumber = $AgencyOrSchoolOwnerWhatsAppPhone_Initial;

                            }



                              $formattedParentNumberowenr = formatPhoneNumber($ownernewnumber);
                              $fileownernew = '';
                            
                            
                            
                            
                            
                             $pros_selectappi_details = mysqli_query($link,"SELECT * FROM `whatsappapikey` WHERE InstitutionID='$InstitutionID_Initial' AND Purpose='finance'");
                              $pros_selectappi_detailscnt = mysqli_num_rows($pros_selectappi_details);
                              $pros_selectappi_detailscnt_rows = mysqli_fetch_assoc($pros_selectappi_details);
                              
                              
                              if($pros_selectappi_detailscnt > 0)
                              {
                                  
                                    $apikeynewowner=  $pros_selectappi_detailscnt_rows['ApiKey'];
                                  
                              }else
                              {
                                  
                                        $pros_selectappi_details_default = mysqli_query($link,"SELECT * FROM `whatsappapikey` WHERE InstitutionID='0' AND Purpose='Default'");
                                      $pros_selectappi_detailscnt_default = mysqli_num_rows($pros_selectappi_details_default);
                                      $pros_selectappi_detailscnt_rows_default = mysqli_fetch_assoc($pros_selectappi_details_default);
                                      
                                      $apikeynewcontowner =   $pros_selectappi_detailscnt_rows_default['ApiKey'];
                                          
                                          
                                           
                                  
                              }
               


                            $debitAlertMessage = "**Debit Alert**\n\n" .
                                "Dear [Owner's Name],\n\n" .
                                "This is to notify you that the salary payments for $month have been processed successfully. The total amount debited from your account is $salrytotalamountowner.\n\n" .
                                "Transaction Details:\n" .
                                "- Amount: $salrytotalamountowner\n" .
                                "- Date: $date\n\n" .
                                "If you have any inquiries or require further assistance, please don't hesitate to contact our support team.\n\n" .
                                "Thank you for using our salary payment services.\n\n" .
                                "Best regards,\n $InstitutionGeneralName_Initial";



                              
                            foreach($transfer_amt as $key => $transfer_amtnew)
                            {


                            

                                    $transfer_amtnew;

                                    $walletbanknamenew = $walletbankname[$key];
                                    $account_numbernew = $account_number[$key];
                                    $accountrefnew =   $accountref[$key];
                                    $account_namenew =  $account_number[$key];
                                     $staffIDnew =  $staffID[$key];
                                    $InstitutionIDnew  =  $InstitutionID[$key];

                                    $WalletBalance -= $transfer_amtnew;

                                    $selct_staff = mysqli_query($link, "SELECT * FROM `staff` WHERE StaffID='$staffIDnew' AND InstitutionID='$InstitutionIDnew'");
                                    $selct_scnt = mysqli_num_rows($selct_staff);
                                    $selct_scntrow = mysqli_fetch_assoc($selct_staff);
                                  
                                  

                                   $StaffFirstName =  $selct_scntrow['StaffFirstName'];
                                   $StaffLastName =  $selct_scntrow['StaffLastName'];
                                   $email =  $selct_scntrow['StaffEmail'];
                                   $userType =  $selct_scntrow['Role'];
                                   $WalletBank =  $selct_scntrow['WalletBank'];

                                   $WalletAccountName =  $selct_scntrow['WalletAccountName'];
                                   $StaffMainNumber =  $selct_scntrow['StaffMainNumber'];
                                   $StaffWhatsappNumber =  $selct_scntrow['StaffWhatsappNumber'];

                                    $StaffSalary =  $selct_scntrow['StaffSalary'];





                                    $select_agency_content = mysqli_query($link, "SELECT * FROM `institution` INNER JOIN `campus` ON `institution`.`InstitutionID` = `campus`.`InstitutionID` INNER JOIN `agencyorschoolowner` ON `institution`.`AgencyOrSchoolOwnerID` = `agencyorschoolowner`.`AgencyOrSchoolOwnerID` WHERE `institution`.InstitutionID='$InstitutionIDnew'");
                                    $select_agency_content_cnt = mysqli_num_rows($select_agency_content);
                                    $select_agency_content_cnt_row = mysqli_fetch_assoc($select_agency_content);
                    
                    
                                    $abba_institution_id2 =  $select_agency_content_cnt_row['InstitutionID'];
                                    $numberowner1 = $select_agency_content_cnt_row['AgencyOrSchoolOwnerMainPhone'];
                                    $numberowner2 = $select_agency_content_cnt_row['AgencyOrSchoolOwnerWhatsAppPhone'];
                                    $AgencyOrSchoolOwnerName = $select_agency_content_cnt_row['AgencyOrSchoolOwnerName'];
                                    $AgencyOrSchoolOwnerID = $select_agency_content_cnt_row['AgencyOrSchoolOwnerID'];
                    
                                    $CampusName = $select_agency_content_cnt_row['CampusName'];
                    
                                    $firstLettercampus = substr($CampusName, 0, 1);
                    
                                    $InstitutionGeneralName = $select_agency_content_cnt_row['InstitutionGeneralName'];
                                    
                                    $prosfullschool =  $InstitutionGeneralName;



                                    $staffslaryfull = $StaffSalary+ $transfer_amtnew;
                                               

                                    $d = str_replace('-', '', date("Y-m-d"));
                                    $n = str_replace(':', '',date("h:i:s"));
                                    $p = rand();
                                    $referencenumber = "RX" . $d . $n . $p . "-" .$staffIDnew;

                                     $date =  date("Y-m-d");
                                     $timenew = date("h:i:s");
                                     $datenew = date("h:i:s");

                                    if($StaffWhatsappNumber == '')
                                    {
                                        $staffnumber = $StaffMainNumber;
                                    }else{
                    
                    
                                        $staffnumber = $StaffWhatsappNumber ;
                                    }






                                    if($staffnumber != '')
                                    {





                                                             // Format the phone numbers
                                                             $formattedParentNumber = formatPhoneNumber($staffnumber);
                            
                                                             $message = rawurlencode(
                                                                 "*Salary Alert!*\n\n" .
                                                                 "Dear " . $StaffFirstName . " " . $StaffLastName . ",\n\n" .
                                                                 "We are pleased to inform you that your salary has been successfully processed.\n\n" .
                                                                 "*Amount Paid*: ₦" . number_format($StaffSalary) . "\n" .
                                                                 "*Payment Date*: " . $date . "\n\n" .
                                                                 "Thank you for your hard work and dedication!\n\n" .
                                                                 "Best regards,\n" .
                                                                 $prosfullschool
                                                             );
                     
                                                             $filniialize = '';
                                                             $institutioninition = $abba_institution_id2;
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                           $pros_selectappi_details = mysqli_query($link,"SELECT * FROM `whatsappapikey` WHERE InstitutionID='$abba_institution_id2' AND Purpose='finance'");
                                          $pros_selectappi_detailscnt = mysqli_num_rows($pros_selectappi_details);
                                          $pros_selectappi_detailscnt_rows = mysqli_fetch_assoc($pros_selectappi_details);
                                          
                                          
                                          if($pros_selectappi_detailscnt > 0)
                                          {
                                              
                                                $apikeynew=  $pros_selectappi_detailscnt_rows['ApiKey'];
                                              
                                          }else
                                          {
                                              
                                                    $pros_selectappi_details_default = mysqli_query($link,"SELECT * FROM `whatsappapikey` WHERE InstitutionID='0' AND Purpose='Default'");
                                                  $pros_selectappi_detailscnt_default = mysqli_num_rows($pros_selectappi_details_default);
                                                  $pros_selectappi_detailscnt_rows_default = mysqli_fetch_assoc($pros_selectappi_details_default);
                                                  
                                                  $apikeynew =   $pros_selectappi_detailscnt_rows_default['ApiKey'];
                                                      
                                                      
                                                       
                                              
                                          }
                                         
                     
                     
                                                             $fullmessagearr[] = $message;
                                                             $fullnumarr[] = $formattedParentNumber;
                                                             $fullfilearr[] = $filniialize;
                                                             $fullinstit[] =  $institutioninition;
                                                             $apikeynecont[] =  $apikeynew;
                                                             
                                                             
                                                             
                                                             

                                    }


                                    




                                    if($WalletAccountName == '' ||  $WalletBank == '')
                                    {



                                                    $ch = curl_init();

                                                    curl_setopt($ch, CURLOPT_URL, "https://api.monnify.com/api/v1/bank-transfer/reserved-accounts");
                                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                                                    curl_setopt($ch, CURLOPT_HEADER, FALSE);
                                        
                                                    curl_setopt($ch, CURLOPT_POST, TRUE);
                                        
                                                    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                                                                            \"accountName\": \"$StaffFirstName.$StaffLastName\",
                                                                            \"accountReference\": \"$referencenumber\",
                                                                            \"currencyCode\": \"NGN\",
                                                                            \"contractCode\": \"779688215159\",
                                                                            \"customerName\": \" $StaffFirstName.$StaffLastName\",
                                                                            \"customerEmail\": \"$email\"
                                                                        }");
                                        
                                                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                                        "Content-Type: application/json",
                                                        "Authorization: Bearer $maintoken"
                                                    )
                                                    );
                
                
                                                    
                                                $response = curl_exec($ch);
                                                curl_close($ch);
                
                                                //var_dump($response);
                                                $object = json_decode($response, true);
                                                $accountname = $object["responseBody"]["accountName"];
                                                $accountnumber = $object["responseBody"]["accountNumber"];
                                                $bankname = $object["responseBody"]["bankName"];
                                                $bankcode = $object["responseBody"]["bankCode"];
                                                $reservationReference = $object["responseBody"]["reservationReference"];
                                                $responsemain = $object['requestSuccessful'];
                                                $accountReference = $object["responseBody"]["accountReference"];



                                                $updatesalary =  mysqli_query($link, "UPDATE `staff` SET 
                                                `WalletBank`='$bankname',`WalletAccountName`='$accountname',`WalletAccountNumber`='$accountnumber',`WalletAccountReference`='$accountReference' 
                                                WHERE StaffID='$staffIDnew' AND InstitutionID='$InstitutionIDnew'");
    
                                    }
                        
 
                                       $updatesalary = mysqli_query($link,"UPDATE `staff` SET `WalletBalance`='$staffslaryfull', `SalaryPaidDate`='$month' WHERE StaffID='$staffIDnew' AND InstitutionID='$InstitutionIDnew'");
                                
                               
                                        $Insert_wallet = mysqli_query($link,"INSERT INTO
                                        `wallettransactions`(`UserID`,`UserType`,`TransactionType`,
                                        `Amount`, `TransactionFee`, `Reference`,`MonthPaid`, `Date`, `Time`,`Status`) 
                                        VALUES ('$staffIDnew', '$userType','Credit','$staffslaryfull','0','$referencenumber', '$month','$datenew','$timenew','1')");

                            }


                            // $fullmessagearr[] = $debitAlertMessage;
                            // $fullnumarr[] =  $formattedParentNumberowenr;
                            // $fullfilearr[] = $fileownernew;
                            // $fullinstit[] = $InstitutionID_Initial;

                              
                            if($proscheckedpayementtype == 'wallet')
                            {

                                        $walletnewamount =  $WalletBalance - $Aamount;
                                        $updatewallete = mysqli_query($link,"UPDATE  `agencyorschoolowner` SET WalletBalance='$walletnewamount' WHERE AgencyOrSchoolOwnerID='$UserID'");
                            
                            }else if($proscheckedpayementtype == 'saved')
                            {


                                        $checkSavingsQuery = "SELECT `SaveLockID`, `Amount`, `SaveStatus` FROM `edumesssavelock` WHERE `UserID` =  $UserID AND `SaveStatus` = 1 AND UserType='$UserType'";
                                        $result = mysqli_query($link, $checkSavingsQuery);
                                        
                                        $totalSavingsAmount = 0;  // Initialize the variable outside the loop
                                        
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            // User has savings, process the payment
                                        
                                            $savingIDs = [];
                                        
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $totalSavingsAmount += $row['Amount'];
                                                $savingIDs[] = $row['SaveLockID'];
                                            }
                                        
                                            if ($Aamount >= $totalSavingsAmount) {
                                                // The amount to pay is equal to or greater than the total savings amount
                                                // Process the payment and update SaveStatus to 3 (fully paid)
                                        
                                                $updatePaymentQuery = "UPDATE `edumesssavelock` SET `Amount` = 0, `SaveStatus` = 3 WHERE `SaveLockID` IN (" . implode(',', $savingIDs) . ")";
                                                mysqli_query($link,  $updatePaymentQuery);
                                        
                                                // Now you can handle any remaining amount (if any)
                                                $remainingAmount = $Aamount - $totalSavingsAmount;
                                        
                                                if ($remainingAmount > 0) {
                                                    // Handle remaining amount, for example, update user's balance
                                                    // $remainingAmount is the amount remaining after using the savings
                                                }
                                            } else {
                                                // The amount to pay is less than the total savings amount
                                                // Update the saving amounts and SaveStatus
                                        
                                                foreach ($savingIDs as $savingID) {
                                                    $updatePaymentQuery = "UPDATE `edumesssavelock` SET `Amount` = 0, `SaveStatus` = 3 WHERE `SaveLockID` = $savingID";
                                                    mysqli_query($link,  $updatePaymentQuery);
                                                }
                                        
                                                // You can handle any remaining amount (if any) here
                                            }
                                        } else {
                                            // User doesn't have savings
                                            // Handle this case, for example, update user's balance
                                        
                                            // Optionally, you may update the SaveStatus to 3 to indicate fully paid
                                            $updatePaymentQuery = "UPDATE `edumesssavelock` SET `SaveStatus` = 3 WHERE `UserID` = $UserID  AND UserType='$UserType'";
                                            mysqli_query($link, $updatePaymentQuery);
                                        }

                            }else{



                                            $checkSavingsQuery = "SELECT `SaveLockID`, `Amount`, `SaveStatus` FROM `edumesssavelock` WHERE `UserID` =  $UserID AND `SaveStatus` = 2 AND UserType='$UserType'";
                                            $result = mysqli_query($link, $checkSavingsQuery);
                                            
                                            $totalSavingsAmount = 0;  // Initialize the variable outside the loop
                                            
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                // User has savings, process the payment
                                            
                                                $savingIDs = [];
                                            
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $totalSavingsAmount += $row['Amount'];
                                                    $savingIDs[] = $row['SaveLockID'];
                                                }
                                            
                                                if ($Aamount >= $totalSavingsAmount) {
                                                    // The amount to pay is equal to or greater than the total savings amount
                                                    // Process the payment and update SaveStatus to 3 (fully paid)
                                            
                                                    $updatePaymentQuery = "UPDATE `edumesssavelock` SET `Amount` = 0, `SaveStatus` = 4 WHERE `SaveLockID` IN (" . implode(',', $savingIDs) . ")";
                                                    mysqli_query($link, $updatePaymentQuery);
                                            
                                                    // Now you can handle any remaining amount (if any)
                                                    $remainingAmount = $Aamount - $totalSavingsAmount;
                                            
                                                    if ($remainingAmount > 0) {
                                                        // Handle remaining amount, for example, update user's balance
                                                        // $remainingAmount is the amount remaining after using the savings
                                                    }
                                                } else {
                                                    // The amount to pay is less than the total savings amount
                                                    // Update the saving amounts and SaveStatus
                                            
                                                    foreach ($savingIDs as $savingID) {
                                                        $updatePaymentQuery = "UPDATE `edumesssavelock` SET `Amount` = 0, `SaveStatus` = 4 WHERE `SaveLockID` = $savingID";
                                                        mysqli_query($link,  $updatePaymentQuery);
                                                    }
                                            
                                                    // You can handle any remaining amount (if any) here
                                                }
                                            } else {
                                                // User doesn't have savings
                                                // Handle this case, for example, update user's balance
                                            
                                                // Optionally, you may update the SaveStatus to 3 to indicate fully paid
                                                $updatePaymentQuery = "UPDATE `edumesssavelock` SET `SaveStatus` = 4 WHERE `UserID` =  $UserID AND AND UserType='$UserType'";
                                                mysqli_query($link, $updatePaymentQuery);
                                            }


                            }


                    include('../messaging/whatsapp/send_whatapp_msg.php');


                     $msg = implode(",", $fullmessagearr);
                      $number = implode(",",  $fullnumarr);
                      $file = implode(",",  $fullfilearr);
                      $abba_institution_id = implode(",", $fullinstit);
                      
                      $apikey = implode(",", $apikeynecont);
                    
                      
                    send_whatsapp_msg($abba_institution_id, $number, $apikey, $msg, $file);

                    $Insert_walletowner = mysqli_query($link,"INSERT INTO `wallettransactions`(`UserID`,`UserType`,`TransactionType`,`Amount`,`TransactionFee`,`Reference`,`Date`,`Time`) VALUES ('$UserID','$UserType','Debit','$Aamount','0','$referencenumbero','$date','$time')");


                     echo 1;

             



         }else
         {
            echo 2;
        }
         
         
?>