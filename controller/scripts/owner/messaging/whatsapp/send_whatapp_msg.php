<?php


 
    function send_whatsapp_msg($abba_institution_id, $number,$apikey, $msg, $file){
        
        
        if($abba_institution_id == 0)
        {
            $number_array= explode(',', $number);
                
            $msg_array= explode(',', $msg);
            
            $file_array= explode(',', $file);
            
            foreach($number_array as $i => $f_number){
                
                if($i == 0)
                {
                    
                }
                else
                {
                    sleep(10);
                }
                
                $f_number;
                $f_msg = $msg_array[$i];
                $f_file = $file_array[$i];
                
                // Initialize cURL session
                $ch = curl_init();
                
                // Define the URL with query parameters
                $url = 'http://api.textmebot.com/send.php?recipient='.$f_number.'&apikey=jLPphCxEaSLG&text='.$f_msg.'&file='.$f_file;
                
                // Set cURL options
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
                // Execute the cURL request
                $response = curl_exec($ch);
                
                // Check for cURL errors
                if (curl_errno($ch)) {
                    echo 'cURL error: ' . curl_error($ch);
                } else {
                    // Handle the response (in this example, we'll just echo it)
                    // echo $response;
                }
                
                // Close cURL session
                curl_close($ch);
                
                // echo 1;
            
            }
        }
        else
        {
            // $sql_institution = "SELECT * FROM `institution` WHERE `InstitutionID` ='$abba_institution_id' AND WhatsAppStatus = 1";
            // $sql_institution_Result = mysqli_query($link, $sql_institution);
            // $sql_institution_Row = mysqli_fetch_assoc($sql_institution_Result);
            // $sql_institution_Count = mysqli_num_rows($sql_institution_Result);
            
            // if($sql_institution_Count > 0)
            // {
            
                $number_array= explode(',', $number);
                
                $msg_array= explode(',', $msg);
                
                $file_array= explode(',', $file);
                
                 $api_key_array = explode(',', $apikey);
                
                
                
                
                 
                
                foreach($number_array as $i => $f_number){
                    
                    if($i == 0)
                    {
                        
                    }
                    else
                    {
                        
                        sleep(10);
                        
                    }
                    
                     $f_number;
                     $f_msg = $msg_array[$i];
                     $f_file = $file_array[$i];
                     $apikeynew = $api_key_array[$i];
                     
                     
                    
                    // Initialize cURL session
                    $ch = curl_init();
                    
                    // Define the URL with query parameters
                    $url = 'http://api.textmebot.com/send.php?recipient='.$f_number.'&apikey='.$apikeynew.'&text='.$f_msg.'&file='.$f_file;
                    
                    // Set cURL options
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                    // Execute the cURL request
                      $response = curl_exec($ch);
                    
                    // Check for cURL errors
                    if (curl_errno($ch)) {
                        echo 'cURL error: ' . curl_error($ch);
                    } else {
                        // Handle the response (in this example, we'll just echo it)
                        // echo $response;
                    }
                    
                    // Close cURL session
                    curl_close($ch);
                    
                    // echo 1;
                
                }
            // }
            // else
            // {
            //     echo 0;
            // }
        }
        
    }
?>