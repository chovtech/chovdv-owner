<?php

include('../../../config/config.php');

// Sanitize inputs
$user_id = mysqli_real_escape_string($link, $_POST['user_id']);
$user_type = mysqli_real_escape_string($link, $_POST['user_type']);
$session = mysqli_real_escape_string($link, $_POST['session']);
$term = mysqli_real_escape_string($link, $_POST['term']);
$ownerId = mysqli_real_escape_string($link, $_POST['ownerId']);



 $pros_get_current_term = mysqli_query($link,"SELECT * FROM session INNER JOIN
  termorsemester WHERE session.sessionStatus='1' AND termorsemester.status=1");//PROS GET CURRENT TERM AND SESSION HERE

 $pros_get_current_term_fetch = mysqli_fetch_assoc($pros_get_current_term);
 
  $crrrntsession = $pros_get_current_term_fetch['sessionName']; 
 $crrrntterm =  $pros_get_current_term_fetch['TermOrSemesterID']; 
 



if ($ownerId == 'all') {
    
    $pros_sql_institution = "
        SELECT institution.AgencyOrSchoolOwnerID, institution.InstitutionID, institution.InstitutionGeneralName,institution.CustomUrl
        FROM `institution` 
        INNER JOIN `agencyorschoolowner` 
        ON `institution`.`AgencyOrSchoolOwnerID` = `agencyorschoolowner`.`AgencyOrSchoolOwnerID` 
        WHERE `agencyorschoolowner`.`AffiliateID` = '$user_id' AND `institution`.`TrashStatus`='0'
    ";
} else {
    $pros_sql_institution = "
        SELECT 
       AgencyOrSchoolOwnerID, InstitutionID, InstitutionGeneralName,CustomUrl
        
        FROM `institution` 
        WHERE `AgencyOrSchoolOwnerID` = '$ownerId' AND `TrashStatus`='0'
    ";
}

$pros_result_institution_sql = mysqli_query($link, $pros_sql_institution);
$pros_row_cnt_institution_cont = mysqli_num_rows($pros_result_institution_sql);

if ($pros_row_cnt_institution_cont > 0) {
    $usercontent = [];

    while ($pros_result_institution_cont_row = mysqli_fetch_assoc($pros_result_institution_sql)) {
        $InstitutionID = $pros_result_institution_cont_row['InstitutionID'];
        $InstitutionGeneralName = $pros_result_institution_cont_row['InstitutionGeneralName'];
        $CustomUrl = $pros_result_institution_cont_row['CustomUrl'];
        $AgencyOrSchoolOwnerID = $pros_result_institution_cont_row['AgencyOrSchoolOwnerID'];


        $pros_check_transfer_sql = "SELECT id FROM affiliate_transfer_history 
                           WHERE AgencyOrSchoolOwnerID = '$AgencyOrSchoolOwnerID' AND Status = 'pending'";

        $pros_check_transfer_result = mysqli_query($link, $pros_check_transfer_sql);
        $pros_check_transfer_count = mysqli_num_rows($pros_check_transfer_result);

        $transfer_status = ($pros_check_transfer_count) ?  'pending' : '';

        // Check if this school was transferred to the current user
        $check_transferred_to_user_sql = "SELECT from_affilliate_id, to_affilliate_id, Status 
                                        FROM affiliate_transfer_history 
                                        WHERE AgencyOrSchoolOwnerID = '$AgencyOrSchoolOwnerID' 
                                        AND to_affilliate_id = '$user_id' 
                                        AND Status = 'approved'
                                        ORDER BY request_date DESC 
                                        LIMIT 1";
        $check_transferred_to_user_result = mysqli_query($link, $check_transferred_to_user_sql);
        $transferred_to_user = mysqli_fetch_assoc($check_transferred_to_user_result);
        
        $is_transferred_to_user = ($transferred_to_user) ? true : false;
        $original_owner_id = ($transferred_to_user) ? $transferred_to_user['from_affilliate_id'] : null;

        // Get campuses
        $select_campus_count_sql = mysqli_query($link, "
            SELECT * FROM `campus`  WHERE `InstitutionID` = '$InstitutionID' 
            AND `CampusTrashStatus`='0' ORDER BY CampusName ASC "); 
           
       
        
        $campus_camp = 0;
        $student_count_general = 0;
       $payment_status = 'Unpaid'; // Default value
        $usercontent_campus = [];

        while ($campus_row = mysqli_fetch_assoc($select_campus_count_sql)) {
            $CampusID = $campus_row['CampusID'];
            $Campus_name = $campus_row['CampusName'];
            $campus_camp++;
            
            
            
            
            
             // Check payment status
        $pros_get_paid_nonpayment_sql = "
            SELECT * FROM `plantransaction` 
            WHERE `CampusID` = '$CampusID'
            
            
        ";

        if($session == '0' ||$session == 'NULL') {
            
             $pros_get_paid_nonpayment_sql .="
            AND `SessionName` = '$crrrntsession' 
             ";
           
        }else{
            $pros_get_paid_nonpayment_sql .="
            AND `SessionName` = '$session' 
             ";
        }
        
        
        



        if($term == '0' ||$term == 'NULL') {
            
            $pros_get_paid_nonpayment_sql .= "
           AND `TermOrSemesterName` = '$crrrntterm'
             ";
        }else{
            $pros_get_paid_nonpayment_sql .= "
           AND `TermOrSemesterName` = '$term'
             ";
        }
        $pros_get_paid_nonpayment =  mysqli_query($link, $pros_get_paid_nonpayment_sql);
         $payment_status_campus = (mysqli_num_rows($pros_get_paid_nonpayment) > 0) ? 'Paid' : 'Unpaid';

            // Count students in each campus
            $pros_load_student_forsch_sql = "
                SELECT * FROM `student` 
                INNER JOIN `classordepartmentstudentallocation` 
                ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID`
                WHERE `student`.`CampusID` = '$CampusID' 
                 AND student.StudentTrashStatus='0'
            ";

            if($session == '0' ||$session == 'NULL') {
           
            }else{
                $pros_load_student_forsch_sql .= "
                AND `classordepartmentstudentallocation`.`Session` = '$session'
                 ";
            }

            $pros_load_student_forsch = mysqli_query($link,$pros_load_student_forsch_sql);

            $campus_student_count = 0;
            while (mysqli_fetch_assoc($pros_load_student_forsch)) {
                $campus_student_count++;
                $student_count_general++;
            }

            $usercontent_campus[] = [
                'campusId' => $CampusID,
                'campus_name' => $Campus_name,
                'student_campus_count' => $campus_student_count,
                'pay_campus_status' => $payment_status_campus
            ];
        }

        $usercontent[] = [
            'school_id' => $InstitutionID,
            'AgencyOrSchoolOwnerID' => $AgencyOrSchoolOwnerID,
            'transfer_status' => $transfer_status,
            'is_transferred_to_user' => $is_transferred_to_user,
            'original_owner_id' => $original_owner_id,
            'school_name' => $InstitutionGeneralName,
            'shool_login' => $CustomUrl,
            'campus_sch_count' => $campus_camp,
            'student_sch_count' => $student_count_general,
            'campuscontent' => $usercontent_campus
        ];
    }

    $response = [
        "requestSuccessful" => true,
        "responseMessage" => "success",
        "responseDescription" => "owner list found",
        "responseBody" => $usercontent
    ];

} else {
    $response = [
        "requestSuccessful" => true,
        "responseMessage" => "failed",
        "responseDescription" => "owner not list found",
        "responseBody" => [
            'owner_id' => null,
            'owner_fname' => null,
            'owner_lname' => null,
            'owner_address' => null,
            'owner_main_phone' => null,
            'owner_wa_phone' => null,
            'owner_email' => null,
        ]
    ];
}
$utf8_string = mb_convert_encoding($response, 'UTF-8', 'UTF-8');
    
  
    
$json_response = json_encode($utf8_string, JSON_UNESCAPED_UNICODE);

// Output the JSON response
echo $json_response;


?>
