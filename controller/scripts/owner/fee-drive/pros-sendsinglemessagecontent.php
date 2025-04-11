<?php

                
            include('../../../config/config.php');

           


                                         
             $prosname= implode(',', $_POST['prosname']);
             $prosnumber = implode(',', $_POST['prosnumber']);
             $email = $_POST['email'];
             $messagetype = $_POST['selectedValue'];
             $message_content = mysqli_real_escape_string($link,$_POST['message_content']);
           
           
           
            $messagetitle_title = mysqli_real_escape_string($link, $_POST["messagetitlewa"]);

            
            $messgecomplete_msg_complete = rawurlencode(''.$messagetitle_title.'' . "\n\n" . str_replace('\n',"\n",$message_content));



            $abba_institution_id = $_POST['abba_get_stored_institution_id'];
            $number = $prosnumber;
            $msg = $messgecomplete_msg_complete;
            $file = '';
            
            
            if($messagetype == '')
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
                
                
                 include('../messaging/whatsapp/send_whatapp_msg.php');
                  send_whatsapp_msg($abba_institution_id, $number, $apikey, $msg,$file);
            }else
            {
        
                        // include('../messaging/email/school_email_content.php');
                       
                        //  include('../messaging/email/school_email_content.php');
                        
                
            }
            
            
            
            echo 1;


?>