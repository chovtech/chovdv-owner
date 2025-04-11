<?php

        
        // Include the database configuration
        include('../../config/config.php');
        
        // Get input data
        
        
         $userID = $_POST['userID'];
        $campusID = $_POST['campusID'];
        $InstitutionID = $_POST['prosInstitutionID'];
        $instituname = $_POST['abba_get_stored_instituion_name'];
        $sessionName = $_POST['sessionName'];
        $ClassOrDepartmentID = $_POST['ClassID'];
        $term = $_POST['term'];
        $studentID = $_POST['studentID'];
        $amount_paying = $_POST['Amountpaying'];
        $transactionType = $_POST['transactionType'];
        $currentDate = date("Y-m-d");
        $current_time = date('g:iA');
        
        $walletbalalert = 0;
        
       
        
         
        $select_campus = mysqli_query($link,"SELECT * FROM `campus` WHERE CampusID='$campusID'"); 
        $select_campus_row = mysqli_fetch_assoc($select_campus);
        
         $CampusName = $select_campus_row['CampusName'];
         
         
         
         $selectstudent = mysqli_query($link,"SELECT * FROM `student` INNER JOIN `userlogin` ON  `student`.StudentID = `userlogin`.UserID  WHERE `student`.CampusID='$campusID' AND `student`.StudentID='$studentID'");
         $selectstudent_cnt = mysqli_num_rows($selectstudent);
         $selectstudent_cntrow = mysqli_fetch_assoc($selectstudent);
         
          $UserRegNumberOrUsername = $selectstudent_cntrow['UserRegNumberOrUsername'];
         
          $selecttermcnt = mysqli_query($link," SELECT * FROM `termorsemester` INNER JOIN `termalias` ON  `termorsemester`.`TermOrSemesterID` = `termalias`.`TermOrSemesterID`  WHERE `termalias`.`CampusID`='$campusID' AND `termorsemester`.`TermOrSemesterID`='$term'");
        $selecttermcntrow = mysqli_fetch_assoc($selecttermcnt);
        $selecttermcnt_num = mysqli_num_rows($selecttermcnt);

        
        $current_Term_alisName = $selecttermcntrow['TermAliasName'];

         
        
          
       
         
        $select_parent_no = mysqli_query($link,"SELECT * FROM `student` INNER JOIN `parent` ON `student`.`ParentID` = `parent`.`ParentID` WHERE `student`.`StudentID`='$studentID'");
       $select_parent_norow = mysqli_num_rows($select_parent_no);
        $select_parent_norow_row =  mysqli_fetch_assoc($select_parent_no);
        
        $ParentID =  $select_parent_norow_row['ParentID']; 

        if($select_parent_norow  > 0)
        {
                $whaparentwhatsnot =  $select_parent_norow_row['ParentWhatsappNumber'];   
                
                 $parentfullname =  $select_parent_norow_row['ParentFirstName'].' '. $select_parent_norow_row['ParentLastName'];   
                 $studnetfullname =  $select_parent_norow_row['StudentFirstName'].' '. $select_parent_norow_row['StudentLastName']; 
                 
                 $recipientEmail =  $select_parent_norow_row['ParentEmail']; 
                 
                 
        }else
        {
                 $whaparentwhatsnot =  '';  
        }
            
           
        
           $firstLettercampus = strtoupper(substr($CampusName, 0, 2));
        
        
          $selectclass_detailshere = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `CampusID`='$campusID' AND  ClassOrDepartmentID='$ClassOrDepartmentID'");
           $selectclass_detailsherecnt = mysqli_num_rows($selectclass_detailshere);

           if($selectclass_detailsherecnt > 0)
           {
                $selectclass_detailsherecntrow = mysqli_fetch_assoc($selectclass_detailshere);

                $ClassOrDepartmentName = $selectclass_detailsherecntrow['ClassOrDepartmentName'];

           }else
           {

                     $ClassOrDepartmentName = '';
           }
        
        // Function to generate a unique transaction reference
        function generateTransactionReference($studentID,$firstLettercampus) {
            $timestamp = time();
            $randomNumber = mt_rand(100, 999);
           
            $transactionReference =  $firstLettercampus ."" .$studentID . "" . $timestamp . "" . $randomNumber;
            return $transactionReference;
        }
        
        $transactionReference = generateTransactionReference($studentID,$firstLettercampus);
        
        // Select student's wallet balance
        $select_student_wallet = mysqli_query($link, "SELECT * FROM `parent` WHERE `ParentID`='$ParentID'");
        $select_student_wallet_row = mysqli_fetch_assoc($select_student_wallet);
        
        $student_wallet_balance = $select_student_wallet_row['WalletBalance'];
        
        
        
        $pros_getcharge_for_termsent = mysqli_query($link,"SELECT SUM(Amount)  AS Amountverifiedcomp FROM `chargestructure` WHERE
         `CampusID`='$campusID' AND `Session`='$sessionName' AND `TermOrSemesterID`='$term' AND `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `Status`='1'");
        
         $pros_getcharge_for_termsent_row = mysqli_fetch_assoc($pros_getcharge_for_termsent);
        
         $Amountverifiedcompnew = $pros_getcharge_for_termsent_row['Amountverifiedcomp'];
         
        //  $pros_tractiontion SELECT SUM(TransactionIn)  AS TransactionInnew FROM `transactions` WHERE `CampusID`='' 
        //  AND `ClassOrDepartmentID`='' AND `StudentID`='' AND `Session`='' AND `TermOrSemesterID`=''
        
        
        
        // Select compulsory fees
        $select_compulsory_fees = mysqli_query($link, "SELECT * FROM `chargestructure` WHERE CampusID='$campusID' AND ClassOrDepartmentID='$ClassOrDepartmentID' AND `Status`='1' AND TermOrSemesterID='$term' AND `Session`='$sessionName'");
        while ($compulsory_fee_row = mysqli_fetch_assoc($select_compulsory_fees)) {
        
            $categoryIDForcompFEE = $compulsory_fee_row['CategoryID'];
            $SubcategoryIDForcompFEE = $compulsory_fee_row['SubcategoryID'];
            $CompAmount = $compulsory_fee_row['Amount'];
            $Statuscheckfee = $compulsory_fee_row['Status'];
        
            // Check if there's enough balance to make the payment for this category and subcategory
            if ($amount_paying >= $CompAmount) {
                
                
                // Deduct the amount for this category and subcategory
                $amount_paying -= $CompAmount;
        
                // Insert the payment record into the transaction table for compulsory fees
                $insertPaymentQuery = "INSERT INTO `transactions`(`InstitutionID`, `CampusID`, `TransactionReference`, `TransactionType`,`ModeofTransaction`, `CategoryID`, `SubcategoryID`, `TuitionType`, `StudentID`, `ClassOrDepartmentID`, `Session`, `TermOrSemesterID`, `TransactionIn`, `Date`) 
                                       VALUES ('$InstitutionID','$campusID','$transactionReference','income', 'Normal', '$categoryIDForcompFEE','$SubcategoryIDForcompFEE','$transactionType','$studentID','$ClassOrDepartmentID','$sessionName','$term','$CompAmount','$currentDate')";
        
                // Execute the query to insert the payment record for compulsory fees
                mysqli_query($link, $insertPaymentQuery);
            } else {
                
                
                     // Deduct the remaining amount for this category and subcategory
                            $CompAmountPaid = $amount_paying;
                            $amount_paying = 0;
                    
                            // Insert the partial payment record into the transaction table for compulsory fees
                            $insertPartialPaymentQuery = "INSERT INTO `transactions`(`InstitutionID`, `CampusID`, `TransactionReference`, `TransactionType`,`ModeofTransaction`, `CategoryID`, `SubcategoryID`, `TuitionType`, `StudentID`, `ClassOrDepartmentID`, `Session`, `TermOrSemesterID`, `TransactionIn`, `Date`) 
                               VALUES ('$InstitutionID','$campusID','$transactionReference','income', 'Normal', '$categoryIDForcompFEE','$SubcategoryIDForcompFEE','$transactionType','$studentID','$ClassOrDepartmentID','$sessionName','$term','$CompAmountPaid','$currentDate')";

        // Execute the query to insert the partial payment record for compulsory fees
        mysqli_query($link, $insertPartialPaymentQuery);

        // Break the loop as there's not enough balance to continue with compulsory fees
        break;
                break; // Not enough balance to continue with compulsory fees
            }
        } 
        
        // Handle optional fees if there's still a remaining balance
        if ($amount_paying > 0) {
            $select_optional_fees = mysqli_query($link, "SELECT * FROM `assignoptionalfees` INNER JOIN `chargestructure` ON `assignoptionalfees`.`CategoryID` = `chargestructure`.`CategoryID` AND `assignoptionalfees`.`SubcategoryID` = `chargestructure`.`SubcategoryID`  
            WHERE `assignoptionalfees`.`CampusID`='$campusID' AND `assignoptionalfees`.`ClassOrDepartmentID`='$ClassOrDepartmentID' AND `assignoptionalfees`.`Session`='$sessionName' AND `assignoptionalfees`.`TermOrSemesterID`='$term' AND `assignoptionalfees`.`StudentID`='$studentID' AND `chargestructure`.`Status`='0'");
            while ($optional_fee_row = mysqli_fetch_assoc($select_optional_fees)) {
                $optionalSubcategoryID = $optional_fee_row['SubcategoryID'];
                $optionalCategoryID = $optional_fee_row['CategoryID'];
                $AmountOptional = $optional_fee_row['Amount'];
        
                
                // Check if there's enough balance to make the payment for this optional fee
                if ($amount_paying >= $AmountOptional) {
                    // Deduct the amount for this optional fee
                    $amount_paying -= $AmountOptional;
        
                        if($amount_paying == '0')
                        {
        
                        }else
                        {
                               // Insert the payment record into the transaction table for optional fees
                                $insertPaymentQueryOptional = "INSERT INTO `transactions`(`InstitutionID`, `CampusID`, `TransactionReference`, `TransactionType`, `CategoryID`, `SubcategoryID`, `TuitionType`, `StudentID`, `ClassOrDepartmentID`, `Session`, `TermOrSemesterID`, `TransactionIn`, `Date`) 
                                VALUES ('$InstitutionID','$campusID','$transactionReference','income','$optionalCategoryID','$optionalSubcategoryID','$transactionType','$studentID','$ClassOrDepartmentID','$sessionName','$term','$AmountOptional','$currentDate')";
        
                                mysqli_query($link, $insertPaymentQueryOptional);
                        }
        
                    // Execute the query to insert the payment record for optional fees
                   
                } else {
                    
                    // Check if there's money in the wallet to cover the remaining amount
                    if ($student_wallet_balance >= $amount_paying) {
        
                        // Deduct the remaining amount from the wallet balance
                        $student_wallet_balance -= $amount_paying;
        
                          if($amount_paying == '0')
                          {
        
                          }else
                          {
        
                                    // Insert the payment record into the transaction table for optional fees
                                    $insertPaymentQueryOptional = "INSERT INTO `transactions`(`InstitutionID`, `CampusID`, `TransactionReference`, `TransactionType`, `CategoryID`, `SubcategoryID`, `TuitionType`, `StudentID`, `ClassOrDepartmentID`, `Session`, `TermOrSemesterID`, `TransactionIn`, `Date`) 
                                    VALUES ('$InstitutionID','$campusID','$transactionReference','income','$optionalCategoryID','$optionalSubcategoryID','$transactionType','$studentID','$ClassOrDepartmentID','$sessionName','$term','$amount_paying','$currentDate')";
        
                                    // Execute the query to insert the payment record for optional fees
                                    mysqli_query($link, $insertPaymentQueryOptional);
                          }
        
        
                                    // Reset the amount paying to zero
                                    $amount_paying = 0;
                                    
                    } else {
                        break; // Not enough balance in the wallet to continue with optional fees
                    }
                }
            }
        }
        
        // Check if there's any balance remaining
        if ($amount_paying > 0) {
        
            // Insert the remaining balance into the student's wallet
            $student_wallet_balance += $amount_paying;
        
            // Update the student's wallet balance in the database
            mysqli_query($link, "UPDATE `parent` SET `WalletBalance`='$student_wallet_balance' WHERE `ParentID`='$ParentID'");
            
            $walletbalaler+=1;
        }
        
        // Check if compulsory fees or optional fees payments were successful
        if (mysqli_affected_rows($link) > 0) {
            
            
            
               $newdate_time = $currentDate.' '.$current_time;
                
              $insertauditray = mysqli_query($link,"INSERT INTO `audittrail`(`InstitutionID`, `CampusID`, `UserID`, `UserType`, `TransactionType`, `Session`, `TermOrSemesterID`, `TuitionType`, `ActionType`, `Description`, `DateStart`, `DateEnd`) 
              VALUES ('$InstitutionID','$campusID','$userID','owner','income','$sessionName','$term','$transactionType','Post payment','Income transaction posted','$currentDate', '$current_time')");
              
              $inssertactivity = mysqli_query($link,"INSERT INTO `activitylog`( `InstitutionIDOrCampusID`, `UserID`, `UserType`,  `Description`, `Date/Time`) 
              VALUES ('$InstitutionID','$userID','owner','Income transaction posted','$newdate_time')");
              
              
              
              
              //Receipt content here
              
              
              
              
              
                    //PROS LOAD CHARGES PER STUDENT HERE 
                        
                        
                        $select_amounteach_student_classs =   mysqli_query($link,"SELECT * FROM `student` INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID` 
                        WHERE `student`.`StudentID`='$studentID' AND `student`.`CampusID`='$campusID'");
                        
                        $select_amounteach_student_classscnt = mysqli_num_rows($select_amounteach_student_classs);
                        $select_amounteach_student_classscntrow = mysqli_fetch_assoc($select_amounteach_student_classs);
                        
                     
                        
                        
                        
                        
                        //PROS LOAD CHARGES PER STUDENT HERE
                      
                      


                    $getinst = mysqli_query($link,"SELECT * FROM `institution` WHERE `InstitutionID`='$InstitutionID'");
                    $fetchinstdet = mysqli_fetch_assoc($getinst);


                    $getinst_campus = mysqli_query($link,"SELECT * FROM `campus` WHERE `InstitutionID`='$InstitutionID' AND `CampusID`='$campusID'");
                    $fetchinstdet_campus = mysqli_fetch_assoc($getinst_campus);


                    $CampusName =  $fetchinstdet_campus['CampusName'];




                    $getstudent = mysqli_query($link," SELECT * FROM `student` INNER JOIN `userlogin` ON `student`.`StudentID` 
                    = `userlogin`.`UserID` WHERE `student`.`CampusID`='$campusID' AND `student`.`StudentID`='$studentID'");
                    $fetchstudent = mysqli_fetch_assoc($getstudent);

                    $schoolname  = $fetchinstdet['InstitutionGeneralName'].'('.$CampusName.')';
                    $institutitonlogo = $fetchinstdet['InstitutionLogo'];
                    $institutitonWebsite = $fetchinstdet['InstitutionWebsite'];
                    
                    
                    
                    
                    
                    
                    
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
                          $number = formatPhoneNumber($whaparentwhatsnot);
                         $file = '';        
                         $abba_institution_id = $InstitutionID;
                         
                         
                         
                         if($whaparentwhatsnot == '')
                         {
                                echo 3;
                         }else if($walletbalaler == '1')
                         {
                              echo 2;
                         }else
                         {
                             echo 1;
                         }
                         
                         
                     
                         
                         
                              if($recipientEmail == '')
                              {
                                  
                              }else
                              {
                                  
                                  
                                       
                                  
                                  
                                  
                                          $senderEmail = $fetchinstdet['InstitutionEmail'];
                                      
                                                    
                                           $email_content =  'Dear ' . $parentfullname . ',' . "\n\n" .
                                                
                                                'Payment received! Receipt for ' . $studnetfullname . ' is ready.' . "\n" .
                                                'View and download it here: .' . $defaultUrl.'/app/print-reciept?ref='.$transactionReference.'&&inst='. $InstitutionID.'&&camp='.$campusID.'&&stud='.$studentID . "\n\n" .
                                            
                                                'Thank you,' . "\n" .
                                                $schoolname;
                                           
                                              $subject = 'School Fees Receipt'; 
                                    
                                            
                                             include('messaging/email/school_email_content.php');
                                             
                                            
                                           include('messaging/email/abba-sender.php');
                                             
                                             sendEmail($htmlContent, $subject, $recipientEmail, $senderEmail);
                                            
                                            
                         
                                  
                              }
                         
                         
                         
                         
                               
                         
                         
                         
                                    // jLPphCxEaSLG&text=
                         
                           

                  
                                 if($whaparentwhatsnot == '')
                                 {
                                     
                                 }else
                                 {
                                     
                                     
                                     
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
                                          
                                     
                                                $msg = rawurlencode('Dear ' . $parentfullname . ',' . "\n\n" .
                                                
                                                'Payment received! Receipt for ' . $studnetfullname . ' is ready.' . "\n" .
                                                'View and download it here: .' . $defaultUrl.'/app/print-reciept?ref='.$transactionReference.'&&inst='. $InstitutionID.'&&camp='.$campusID.'&&stud='.$studentID . "\n\n" .
                                            
                                                'Thank you,' . "\n" .
                                                $schoolname );
                                           
                                                include('messaging/whatsapp/send_whatapp_msg.php');
                 
                                              send_whatsapp_msg($abba_institution_id,$number,$apikey, $msg, $file);
                                     
                                 }
                                 

          
        //   echo 'https://wa.me/'.$whaparentwhatsnot .'?text=*SCHOOL%20FEES%20PAYMENT%20RECIPT*%0AKindly%20find%20details%20of%20payment%20and%20receipt%20below%20for%20download%0A%0A*Student%20Name*:%20'.$selectstudent_cntrow['StudentLastName'].'%20'.$selectstudent_cntrow['StudentMiddleName'].'%20'.$selectstudent_cntrow['StudentFirstName'].'%0A*Reg Number:* '.$UserRegNumberOrUsername.'%0A*Class:*%20'.$ClassOrDepartmentName.'%0A*Term:*%20'.$current_Term_alisName.'%20Term%0A%0AClick%20on%20the%20link%20to%20download%0A'.$defaultUrl.'/app/print-reciept?ref='.$transactionReference.'%26inst='. $InstitutionID.'%26camp='.$campusID.'%26stud='.$studentID.'%0A%0AFrom%0A*'.$instituname;
        } else {
            echo 'error';
        }


?>
