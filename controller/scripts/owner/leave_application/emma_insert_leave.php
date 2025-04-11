<?php


    include("../../../config/config.php");

    $get_leave_title = $_POST['get_leave_title'];
    $get_leave_start_date = $_POST['get_leave_start_date'];
    $get_leave_end_date = $_POST['get_leave_end_date'];
    $keep_staff_id = $_POST['keep_staff_id'];
    $keep_institution_id = $_POST['keep_institution_id'];
    $differenceDays = $_POST['differenceDays'];

    $abba_institution_id = $keep_institution_id;

    $leave_title = mysqli_real_escape_string($link, $get_leave_title);

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

    $select_for_messaging = "SELECT * FROM `agencyorschoolowner` INNER JOIN `institution` ON
     `agencyorschoolowner`.`AgencyOrSchoolOwnerID` = `institution`.`AgencyOrSchoolOwnerID` 
     WHERE `institution`.`InstitutionID` = '$keep_institution_id' ";
    $query_for_messaging = mysqli_query($link, $select_for_messaging);
    $fetch_for_messaging = mysqli_fetch_assoc($query_for_messaging);
    $rows_for_messaging = mysqli_num_rows($query_for_messaging);

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
        

        $select_for_messaging_staff = "SELECT * FROM `staff` WHERE `StaffID` = '$keep_staff_id' AND `InstitutionID` = '$keep_institution_id' ";
        $query_for_messaging_staff = mysqli_query($link, $select_for_messaging_staff);
        $fetch_for_messaging_staff = mysqli_fetch_assoc($query_for_messaging_staff);
        $rows_for_messaging_staff = mysqli_num_rows($query_for_messaging_staff);

        if($rows_for_messaging_staff > 0){

            $get_staff_firstname = $fetch_for_messaging_staff['StaffFirstName'];
            $get_staff_middlename = $fetch_for_messaging_staff['StaffMiddleName'];
            $get_staff_lastname = $fetch_for_messaging_staff['StaffLastName'];
            $get_staff_institution = $fetch_for_messaging_staff['InstitutionID'];
            $get_staff_id = $fetch_for_messaging_staff['StaffID'];


                $select_for_leave_application = "SELECT * FROM `leaveapplication` WHERE `InstitutionID` = '$get_staff_institution' AND `UserID` = '$get_staff_id' AND 
                `LeaveTitle` = '$get_leave_title' AND `StartDate` = '$get_leave_start_date' AND `EndDate` = '$get_leave_end_date' ";
                $query_for_leave_application = mysqli_query($link, $select_for_leave_application);
                $fetch_for_leave_application = mysqli_fetch_assoc($query_for_leave_application);
                $rows_for_leave_application = mysqli_num_rows($query_for_leave_application);

                if($rows_for_leave_application > 0){
                    echo 1;
                }else{

                    $insert_into_leave_application = "INSERT INTO `leaveapplication`(`InstitutionID`, `UserID`, `LeaveTitle`, `StartDate`, `EndDate`, `NumberOfDays`, `Status`) 
                    VALUES ('$keep_institution_id','$keep_staff_id','$leave_title','$get_leave_start_date','$get_leave_end_date','$differenceDays',0)";

                    $insert_into_leave_application_query = mysqli_query($link, $insert_into_leave_application);

                    if($insert_into_leave_application_query == true){

                        echo 2;
                        $select_for_leave_application_table = "SELECT * FROM `leaveapplication` WHERE `InstitutionID` = '$get_staff_institution' AND `UserID` = '$get_staff_id' AND 
                        `LeaveTitle` = '$get_leave_title' AND `StartDate` = '$get_leave_start_date' AND `EndDate` = '$get_leave_end_date' ";
                        $query_for_leave_application_table = mysqli_query($link, $select_for_leave_application_table);
                        $fetch_for_leave_application_table = mysqli_fetch_assoc($query_for_leave_application_table);
                        $rows_for_leave_application_table = mysqli_num_rows($query_for_leave_application_table);

                        if($rows_for_leave_application_table > 0){

                            $get_leave_title = $fetch_for_leave_application_table['LeaveTitle'];
                            $get_leave_startdate = $fetch_for_leave_application_table['StartDate'];
                            $get_leave_enddate = $fetch_for_leave_application_table['EndDate'];
                            $get_leave_NumberOfDays = $fetch_for_leave_application_table['NumberOfDays'];
        
                            $msg = rawurlencode(
                            '*Dear '.$get_owner_name.',*

I hope this message finds you well. I am writing to inform you that '.$get_staff_firstname.' '.$get_staff_middlename.' '.$get_staff_lastname.' has submitted an application for leave.
                            
Leave Details:
- Staff Name: '.$get_staff_firstname.' '.$get_staff_middlename.' '.$get_staff_lastname.'
- Leave Description: '.$get_leave_title.'
- Dates: '.$get_leave_startdate.' to '.$get_leave_enddate.'
- Number Of Days Applied: '.$get_leave_NumberOfDays.' days

Please review the leave request at your earliest convenience,Thanks'
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

                        }else{
                            echo 'No leave Table Record Found';

                        }

                        if($rows_for_leave_application_table > 0){


                            include("../messaging/whatsapp/send_whatapp_msg.php");

                            send_whatsapp_msg($abba_institution_id, $number,$apikey, $msg, $file);

                        }else{
                            echo 'Nill';
                        }

                        $activity_log_inst_camp_id = $_POST['campus'];
                        $activity_log_userid = $_POST['userid'];
                        $activity_log_usertype = $_POST['usertype'];
                        $activity_log_description = 'Apply For Leave';
                        $activity_log_longitude = $_POST['longitude'];
                        $activity_log_latitude = $_POST['latitude'];

                        insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
                    }else{
                        echo 'insert_error';
                    }
                }
        }else{
            echo 'no staff row';
        }
    }else{

    }

?>