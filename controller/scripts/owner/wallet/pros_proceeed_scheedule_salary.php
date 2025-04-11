<?php
      
      
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');


        
  
        $UserID = $_POST['UserID'];
        $UserType = $_POST['UserType'];

        $amountschedule = $_POST['amountschedule'];
        $date_scheduled = $_POST['datescheduled'];
        $monthschedule = $_POST['monthschedule'];

        $amount_forallstaff = $_POST['pros_amount_forallstaff'];


        $staffID = $_POST['staffID'];
        
         $prospaymentype = $_POST['prospaymentype'];

        

        $select_scheduleverification = mysqli_query($link,"SELECT * FROM `salaryscheduledate` WHERE UserID='$UserID' AND ScheduleMonth='$monthschedule'");
        $select_scheduleverification = mysqli_num_rows($select_scheduleverification);



        if($select_scheduleverification > 0)
        {
                  echo '2';

                 
        }else
        {


                                include('../messaging/whatsapp/send_whatapp_msg.php');



                                // staffID


                                $insert_schedule =  mysqli_query($link, "INSERT INTO `salaryscheduledate`(`UserID`, `ScheduleMonth`, `ScheduleDate`, `ScheduleAmount`,`UserScheduledFor`,`ScheduleSource`) 
                                VALUES ('$UserID','$monthschedule','$date_scheduled','$amountschedule','$staffID','$prospaymentype')");



                                $select_agency_content = mysqli_query($link, "SELECT * FROM `institution` INNER JOIN  agencyorschoolowner  ON `institution`.AgencyOrSchoolOwnerID = `agencyorschoolowner`.AgencyOrSchoolOwnerID WHERE `agencyorschoolowner`.AgencyOrSchoolOwnerID='$UserID'");
                                $select_agency_content_cnt = mysqli_num_rows($select_agency_content);
                                $select_agency_content_cnt_row = mysqli_fetch_assoc($select_agency_content);
                        
                        
                                $abba_institution_id =  $select_agency_content_cnt_row['InstitutionID'];
                                $number = $select_agency_content_cnt_row['AgencyOrSchoolOwnerMainPhone'];
                                
                                
                        
                                 $AgencyOrSchoolOwnerName = $select_agency_content_cnt_row['AgencyOrSchoolOwnerName'];
                                 $InstitutionGeneralName = $select_agency_content_cnt_row['InstitutionGeneralName'];
                                 
                                 
                                 
                                 
                                 
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
                                                     


                                 
                                $msg = rawurlencode("Scheduled Salary Payment for $monthschedule\n\n" .
                                   "Dear $AgencyOrSchoolOwnerName,\n\n" .
                                   "I hope this message finds you well. We would like to inform you that the scheduled salary payment for the month of $monthschedule has been finalized. The total amount to be paid for all staff members is $amountschedule\n\n" .
                                   "Scheduled Payment Date: $date_scheduled\n\n" .
                                   "Best regards,\n$InstitutionGeneralName");
                                                    
                        
                                $file =  '';


                        
                                send_whatsapp_msg($abba_institution_id,$number,$apikey, $msg, $file);


                                echo '1';

        }


       
      
       
       


?>



