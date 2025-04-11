


<?php
                    
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');


        $Sdate = $_POST['sDate'];
        $endate = $_POST['enddate'];
        $des = $_POST['des'];

        $institutionID = $_POST['abba_get_stored_institution_id'];


        $select_institution = mysqli_query($link,"SELECT * FROM `setcountdown` WHERE InstitutionID='$institutionID'");
        $select_institution_cnt = mysqli_num_rows($select_institution);

        if($select_institution_cnt > 0)
        {


                $insert_update_timecountdown = mysqli_query($link,"UPDATE `setcountdown` SET `StartDate`='$Sdate',`EndDate`='$endate',`Description`='$des' WHERE  `InstitutionID`='$institutionID'");



        }else{


                      $insert_update_timecountdown = mysqli_query($link,"INSERT INTO `setcountdown`(`InstitutionID`, `StartDate`, `EndDate`, `Description`) 
                      VALUES ('$institutionID','$Sdate','$endate','$des')");
        }


        if($insert_update_timecountdown  == true)
        {
              
                
                
                
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


                                            

                
                
                
                
                                
                        
                               $select_agency_content = mysqli_query($link, "SELECT * FROM `institution` INNER JOIN `parent` ON `institution`.`InstitutionID` = `parent`.`InstitutionID` WHERE `institution`.InstitutionID='$institutionID'");
                            $select_agency_content_cnt = mysqli_num_rows($select_agency_content);
                          
              
                                                      $memmasget = array();
                                $number2 = array();
                                $filenew = array();
                                $institutionnew = array();
                                
                                while ($select_agency_content_cnt_row = mysqli_fetch_assoc($select_agency_content)) {
                                    $abba_institution_id2 = $select_agency_content_cnt_row['InstitutionID'];
                                    $InstitutionGeneralName = $select_agency_content_cnt_row['InstitutionGeneralName'];
                                    $ParentFirstName = $select_agency_content_cnt_row['ParentFirstName'];
                                    $ParentLastName = $select_agency_content_cnt_row['ParentLastName'];
                                    $ParentWhatsappNumber = $select_agency_content_cnt_row['ParentWhatsappNumber'];
                                    $ParentMainPhoneNumber = $select_agency_content_cnt_row['ParentMainPhoneNumber'];
                                    $ParentEmail = $select_agency_content_cnt_row['ParentEmail'];
                                
                                    $InstitutionID = $abba_institution_id2;
                                    $prosfullschool = $InstitutionGeneralName;
                                
                                    if ($ParentWhatsappNumber == '') {
                                        $ownernumber = $ParentMainPhoneNumber;
                                    } else {
                                        $ownernumber = $ParentWhatsappNumber;
                                    }
                                
                                    $startDateTime = new DateTime($Sdate);
                                    $endDateTime = new DateTime($endate);
                                
                                    // Calculating the difference between the two dates
                                    $dateDifference = $startDateTime->diff($endDateTime);
                                
                                    // Accessing the difference in days
                                    $daysDifference = $dateDifference->days;
                                
                                    // Format the phone numbers
                                    $formattedParentNumber = formatPhoneNumber($ownernumber);
                                
                                    $endDate = $endDateTime->format('Y-m-d'); // Define $endDate
                                $message = rawurlencode(
                                    "School Fee Payment Due in $daysDifference Days\n\n" .
                                    "Dear $ParentFirstName $ParentLastName,\n\n" .
                                    "I trust this message finds you well. I want to remind you that the school fee payment is due in just $daysDifference days, on $endDate. Please ensure timely completion of the payment process to avoid any inconvenience.\n\n" .
                                    "If you have any queries or require assistance, do not hesitate to contact $prosfullschool.\n\n" .
                                    "Thank you for your prompt attention to this matter.\n\n" .
                                    "Best regards,\n\n" .
                                    "$prosfullschool"
                                );
                                                                
                                                                    $filenaeme = ''; // This line seems unnecessary
                                    $institution = $InstitutionID;
                                
                                    // Assign values to arrays without square brackets
                                    $memmasget_temp = $message;
                                    $number2_temp = $formattedParentNumber;
                                    $filenew_temp = $filenaeme;
                                    $institution_temp = $institution;
                                
                                    // Append the temporary values to the main arrays
                                    $memmasget[] = $memmasget_temp;
                                    $number2[] = $number2_temp;
                                    $filenew[] = $filenew_temp;
                                    $institutionnew[] = $institution_temp;
                                }
                                
                                include('../messaging/whatsapp/send_whatapp_msg.php');
                                
                                $msg = implode(',', $memmasget);
                                $number = implode(',', $number2);
                                $file = implode(',', $filenew);
                                $abba_institution_id = implode(',', $institutionnew);
                
                 send_whatsapp_msg($abba_institution_id, $number, $msg, $file);
                
                
                echo 1;
                
                
                
                

        }else{
                  echo '2';
        }










 ?>