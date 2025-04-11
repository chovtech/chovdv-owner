<?php

            include('../../config/config.php');

            $WhatsappNumberFull  = $_POST['num'];
            $number = str_replace('+', '', $WhatsappNumberFull);
            $message = $_POST['sendmessage'];
          
   

    
        // echo 'done';
        $curl = curl_init();
        $data = array("api_key" => "TLrJyjpmjT13Rca5RUeiVXcZIPa2W9AKWsAhFGsuAOJJUVDJa4crZrBe3ml2Ug", "to" => "$number",  "from" => "EduMESS",
        "sms" => "$message",  "type" => "plain",  "channel" => "generic" );
        
        $post_data = json_encode($data);
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ng.termii.com/api/sms/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $response;
        
      $data = json_decode($response);
        $successmsg = $data->$message;


        echo 'success';
   

?>