<?php

include("../../../config/config.php");

$keep_staff_id = $_POST['keep_staff_id'];
$keep_institution_id = $_POST['keep_institution_id'];
$leave_id = $_POST['leave_id'];

    $abba_institution_id = $keep_institution_id;

    $get_api_key = "SELECT * FROM `whatsappapikey` WHERE `InstitutionID` = '$keep_institution_id' ";
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
            }else{

            }

            // Return the numeric phone number
            return $numericPhoneNumber;
        }
    }

    $file = '';

    $select_for_staff_name = "SELECT * FROM `staff` WHERE `StaffID` = '$keep_staff_id' AND `InstitutionID` = '$keep_institution_id' ";
    $query_for_staff_name = mysqli_query($link, $select_for_staff_name);
    $fetch_for_staff_name = mysqli_fetch_assoc($query_for_staff_name);
    $rows_for_staff_name = mysqli_num_rows($query_for_staff_name);

    if($rows_for_staff_name > 0){

        $get_staff_first_name = $fetch_for_staff_name['StaffFirstName'];
        $get_staff_whatsapp_number = $fetch_for_staff_name['StaffWhatsappNumber'];
        $get_staff_main_number = $fetch_for_staff_name['StaffMainNumber'];

        if($get_staff_whatsapp_number == ''){
            $newnumber = $get_staff_main_number;
        }else{
            $newnumber = $get_staff_whatsapp_number;
        }

        $number = formatPhoneNumber($newnumber);

        $select_for_approve_or_reject = "SELECT * FROM `leaveapplication` WHERE `InstitutionID` = '$keep_institution_id' AND `LeaveID` = '$leave_id' AND `UserID` = '$keep_staff_id'";
        $query_for_approve_or_reject = mysqli_query($link, $select_for_approve_or_reject);
        $fetch_for_approve_or_reject = mysqli_fetch_assoc($query_for_approve_or_reject);
        $rows_for_approve_or_reject = mysqli_num_rows($query_for_approve_or_reject);

        if($rows_for_approve_or_reject > 0){


            $update_limit = "UPDATE `leaveapplication` SET `Status`= 1 WHERE `LeaveID`='$leave_id' AND `InstitutionID`='$keep_institution_id' AND `UserID` = '$keep_staff_id' ";
            $update_limit_query = mysqli_query($link, $update_limit);

            if($update_limit_query == true){
                echo 1;

                $select_for_approve_message = "SELECT * FROM `leaveapplication` WHERE `InstitutionID` = '$keep_institution_id' AND `LeaveID` = '$leave_id' AND `UserID` = '$keep_staff_id' AND `Status` = 1";
                $query_for_approve_message = mysqli_query($link, $select_for_approve_message);
                $fetch_for_approve_message = mysqli_fetch_assoc($query_for_approve_message);
                $rows_for_approve_message = mysqli_num_rows($query_for_approve_message);

                if($rows_for_approve_message > 0){

                    $get_leave_desc = $fetch_for_approve_message['LeaveTitle'];
                    $get_leave_startdate = $fetch_for_approve_message['StartDate'];
                    $get_leave_enddate = $fetch_for_approve_message['EndDate'];
                    $get_leave_days = $fetch_for_approve_message['NumberOfDays'];


                    $msg = rawurlencode(
                        '*Hi '.$get_staff_first_name.',*

I hope this message finds you well. I wanted to inform you that your leave application has been approved.

Leave Details:
- Leave Description: '.$get_leave_desc.'
- Dates: '.$get_leave_startdate.' to '.$get_leave_enddate.'
- Number Of Days: '.$get_leave_days.' days


Please ensure that any necessary arrangements are made for your absence during this time. If you have any questions or concerns, feel free to reach out.

Thank you for your understanding, and I hope you have a restful and productive time off.'
                        );
                          
        
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
                                echo 'No API';
                            }
                        }
        
                        include("../messaging/whatsapp/send_whatapp_msg.php");
        
                        send_whatsapp_msg($abba_institution_id, $number,$apikey, $msg, $file);
        
                        $activity_log_inst_camp_id = $_POST['campus'];
                        $activity_log_userid = $_POST['userid'];
                        $activity_log_usertype = $_POST['usertype'];
                        $activity_log_description = 'Approved Leave';
                        $activity_log_longitude = $_POST['longitude'];
                        $activity_log_latitude = $_POST['latitude'];
        
                        insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
                }else{

                }

                
            }else{
                echo 3;
            }

        }else{
            echo 4;
        }

    }else{

    }





?>
