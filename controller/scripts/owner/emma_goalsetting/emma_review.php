<?php

    include("../../../config/config.php");

    $user_data_id = $_POST['user_data_id'];
    $loadreviewid = $_POST['loadreviewid'];
    $emma_institution = $_POST['emma_institution'];
    $emma_goal_id_for_messaging = $_POST['emma_goal_id_for_messaging'];
    $subject = 'Goal Setting';
    $senderEmail = 'hello@edumess.com';

    $abba_institution_id = $emma_institution;

    $get_api_key = "SELECT * FROM `whatsappapikey` WHERE `InstitutionID` = '$emma_institution' ";
    $get_api_key_query = mysqli_query($link, $get_api_key);
    $get_api_key_fetch = mysqli_fetch_assoc($get_api_key_query);
    $get_api_key_rows = mysqli_num_rows($get_api_key_query);

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

    $file = '';

    $select_for_goal_settings = "SELECT * FROM `goalsetting` WHERE `GoalID` = '$loadreviewid'";
    $query_for_goal_settings = mysqli_query($link, $select_for_goal_settings);
    $fetch_for_goal_settings = mysqli_fetch_assoc($query_for_goal_settings);
    $rows_for_goal_settings = mysqli_num_rows($query_for_goal_settings);

    if($rows_for_goal_settings > 0){

        $get_vision_statement = $fetch_for_goal_settings['VisionStatement'];
        $get_goal_title = $fetch_for_goal_settings['GoalTitle'];
        $get_goal_amount = $fetch_for_goal_settings['GoalAmount'];
        $get_goal_years = $fetch_for_goal_settings['Years'];


        $select_to_get_actions = "SELECT * FROM `goalactions` WHERE `GoalID` = '$loadreviewid' ";
        $query_to_get_actions = mysqli_query($link, $select_to_get_actions);
        $fetch_to_get_actions = mysqli_fetch_assoc($query_to_get_actions);
        $rows_to_get_actions = mysqli_num_rows($query_to_get_actions);

        $select_for_messaging = "SELECT * FROM `agencyorschoolowner` WHERE `AgencyOrSchoolOwnerID` = '$user_data_id' ";
        $query_for_messaging = mysqli_query($link, $select_for_messaging);
        $fetch_for_messaging = mysqli_fetch_assoc($query_for_messaging);
        $rows_for_messaging = mysqli_num_rows($query_for_messaging);

        $select_for_goal_settings_messaging = "SELECT * FROM `goalsetting` WHERE `GoalID` = '$emma_goal_id_for_messaging' ";
        $query_for_goal_settings_messaging = mysqli_query($link, $select_for_goal_settings_messaging);
        $fetch_for_goal_settings_messaging = mysqli_fetch_assoc($query_for_goal_settings_messaging);
        $rows_for_goal_settings_messaging = mysqli_num_rows($query_for_goal_settings_messaging);

        $emma_all_actions = '';

        if($rows_to_get_actions > 0){

            do{
                $get_actions = $fetch_to_get_actions['Actions'];
                $get_per_year = $fetch_to_get_actions['Years'];
                $get_per_amount = $fetch_to_get_actions['AmountPerYear'];

                $emma_all_actions .= '<li class="text-bold"> Year:' . $get_per_year . '</li>';
                $emma_all_actions .= '<li> Actions:' . $get_actions . '</li>';
                $emma_all_actions .= '<li> Amount:' . $get_per_amount . '</li>';

            }while($fetch_to_get_actions = mysqli_fetch_assoc($query_to_get_actions));

            if($rows_for_messaging > 0){
                $get_owner_name = $fetch_for_messaging['AgencyOrSchoolOwnerName'];
                $get_owner_whatsapp_number = $fetch_for_messaging['AgencyOrSchoolOwnerWhatsAppPhone'];
                $get_owner_main_number = $fetch_for_messaging['AgencyOrSchoolOwnerMainPhone'];

                if($get_owner_whatsapp_number == ''){
                    $newnumber = $get_owner_main_number;
                }else{
                    $newnumber = $get_owner_whatsapp_number;
                }
 
                $number = formatPhoneNumber($newnumber);
                $msg = 'Dear '.$get_owner_name.', A message has been sent to your email regarding your goal setting, check it out';

                    if($get_api_key_rows > 0){
                        $whatsapp_api = $get_api_key_fetch['ApiKey'];

                        $apikey = $whatsapp_api;

                       
                    }else{

                        $get_api_key_default = "SELECT * FROM `whatsappapikey` WHERE `InstitutionID` = 0 ";
                        $get_api_key_default_query = mysqli_query($link, $get_api_key_default);
                        $get_api_key_fetch_default = mysqli_fetch_assoc($get_api_key_default_query);
                        $get_api_key_default_rows = mysqli_num_rows($get_api_key_default_query);
                
                        if($get_api_key_default_rows > 0){
                            $whatsapp_api = $get_api_key_fetch_default['ApiKey'];
                            $apikey = $whatsapp_api;

                            
                        }else{
                
                        }
                    }   

                if($rows_for_goal_settings_messaging > 0){

                    $get_vision_statement_for_messaging = $fetch_for_goal_settings_messaging['VisionStatement'];
                    $get_goal_title_for_messaging = $fetch_for_goal_settings_messaging['GoalTitle'];
                    $get_goal_amount_for_messaging = $fetch_for_goal_settings_messaging['GoalAmount'];
                    $get_goal_years_for_messaging = $fetch_for_goal_settings_messaging['Years'];
                    $get_goal_image_for_messaging = $fetch_for_goal_settings_messaging['BaseSixtyFour'];

                    $email_content = 'Subject: Hurray, Your Yearly Goal Successfully !

                    Dear '.$get_owner_name.',
                    
                    Congratulations on successfully setting up your long-term goal! Your dedication to planning for the future is commendable. Heres a summary of your goal:
                    
                    Goal: '.$get_vision_statement_for_messaging.' over '.$get_goal_years_for_messaging.' years
                    
                    Actions and Amounts for Each Year:
                    
                    '.$emma_all_actions.'
                    
                    Your proactive approach to goal setting is admirable, and we are excited to see you progress towards your aspirations.<br>';
                    if($get_goal_image_for_messaging == ''){

                    }else{
                        
                        '<div align="center>
                        <img src="'.$get_goal_image_for_messaging.'">
                        </div>';
                    }
                }else{
                
                }
            }else{
                echo 2;
            }
        }else{
     
        }
    }else{

    }
  
    include("../messaging/email/school_email_content.php");

    $select_for_messaging = "SELECT * FROM `agencyorschoolowner` WHERE `AgencyOrSchoolOwnerID` = '$user_data_id' ";
    $query_for_messaging = mysqli_query($link, $select_for_messaging);
    $fetch_for_messaging = mysqli_fetch_assoc($query_for_messaging);
    $rows_for_messaging = mysqli_num_rows($query_for_messaging);

    if(isset($_POST['jsonString'])) {

        $jsonString = $_POST['jsonString'];

        $jsonData = json_decode($jsonString, true);

        $allChecked = true;

        foreach ($jsonData as $yearlyGoal) {

            $data_id = $yearlyGoal['data_id'];

    		$actions_review = $yearlyGoal['actions_review'];
            $review = implode(',',$yearlyGoal['review']);
            $review_new = mysqli_real_escape_string($link, $review);

    		foreach ($actions_review as $key => $actions_review_new) {
    			if(empty($actions_review_new)) {
    				$allChecked = false;
    				break;
    			}
    		}


    		if (!$allChecked) {
    			echo 'null';
    		} else {

    			
    		}

    		$holdactions = implode(',',$actions_review);

            $select_reviews = "SELECT * FROM `goalreview` WHERE `ActionID` = '$data_id' AND `Reviews` = '$review_new' AND `Actions` = '$holdactions' ";
            $query_reviews = mysqli_query($link, $select_reviews);

            if($query_reviews == false){
                echo 2;
            }else{
                $insert_reviews = "INSERT INTO `goalreview`(`ActionID`, `Reviews`, `Actions`) VALUES ('$data_id','$review_new','$holdactions')";
                $insert_reviews_query = mysqli_query($link, $insert_reviews);
            }
        }

        if($insert_reviews_query == true){
            
            echo 1;


                if($rows_for_messaging > 0){
                    

                    $recipientEmail = $fetch_for_messaging['AgencyOrSchoolOwnerEmail'];
                    
                    include("../messaging/email/abba-sender.php");

                    sendEmail($htmlContent, $subject, $recipientEmail, $senderEmail);
                 
                    // include("../messaging/whatsapp/send_whatapp_msg.php");

                    // send_whatsapp_msg($abba_institution_id, $number,$apikey, $msg, $file);

                

                
                
                }else{

                }      



        }else{
            echo 3;
        }
        
    } else {
        echo "No data received.";
    }

?>
