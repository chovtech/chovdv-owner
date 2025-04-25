<?php
    include('../../../config/config.php');

    $user_id = $_POST['user_id'];
    $user_type = $_POST['user_type'];


    $pros_sql_owner = ("SELECT * FROM `agencyorschoolowner` WHERE `AffiliateID`='$user_id' 
     ORDER BY AgencyOrSchoolOwnerName ASC");
    $pros_result_owner = mysqli_query($link, $pros_sql_owner);
    // $pros_row_owner = mysqli_fetch_assoc($pros_result_owner);
    $pros_row_cnt_owner = mysqli_num_rows($pros_result_owner);




    // CHECK IF USER EXIST
    if($pros_row_cnt_owner > 0)
    {
              
                         
            $usercontent = array();

        // Fetch and add each category to the array
        while ($pros_row_owner = mysqli_fetch_assoc($pros_result_owner)) {
            
            
                $AgencyOrSchoolOwnerID = $pros_row_owner['AgencyOrSchoolOwnerID'];
                $AgencyOrSchoolOwnerName = $pros_row_owner['AgencyOrSchoolOwnerName'];
                $AgencyOrSchoolOwnerNameTwo = $pros_row_owner['AgencyOrSchoolOwnerNameTwo'];
                $AgencyOrSchoolOwnerAddress = $pros_row_owner['AgencyOrSchoolOwnerAddress'];
                $AgencyOrSchoolOwnerMainPhone = $pros_row_owner['AgencyOrSchoolOwnerMainPhone'];
                $AgencyOrSchoolOwnerWhatsAppPhone = $pros_row_owner['AgencyOrSchoolOwnerWhatsAppPhone'];
                $AgencyOrSchoolOwnerEmail = $pros_row_owner['AgencyOrSchoolOwnerEmail'];


                $pros_count_schools =  mysqli_query($link,"SELECT COUNT(InstitutionID)  
                FROM `institution` WHERE `AgencyOrSchoolOwnerID`='$AgencyOrSchoolOwnerID'");
                $pros_count_schools_count = mysqli_num_rows($pros_count_schools);
                
                
                
            

            //  `AgencyOrSchoolOwnerID`, `AffiliateID`, `AmbassadorID`, `AgencyOrSchoolOwnerType`, `AgencyOrSchoolOwnerGender`,
            //   `EducationType`, `AgencyOrSchoolOwnerName`, `AgencyOrSchoolOwnerNameTwo`, 
            //   `AgencyOrSchoolOwnerCountry`, `AgencyOrSchoolOwnerState`, `AgencyOrSchoolOwnerLGA`, `AgencyOrSchoolOwnerCity`, 
            //   `AgencyOrSchoolOwnerAddress`,
            //   `AgencyOrSchoolOwnerMainPhone`, `AgencyOrSchoolOwnerWhatsAppPhone`, `AgencyOrSchoolOwnerEmail`
            
                
            
            $usercontent[] = array(
                
                'owner_id' => $AgencyOrSchoolOwnerID,
                'owner_fname' => $AgencyOrSchoolOwnerName,
                'owner_lname' => $AgencyOrSchoolOwnerNameTwo,
                'owner_address' => $AgencyOrSchoolOwnerAddress,
                'owner_main_phone' => $AgencyOrSchoolOwnerMainPhone,
                'owner_wa_phone' => $AgencyOrSchoolOwnerWhatsAppPhone,
                'owner_email' =>  $AgencyOrSchoolOwnerEmail,
                'no_sch' =>   $pros_count_schools_count

                
            );
            
        }
        
        // var_dump($countries); // Check if $countries array contains data
        
        
        $response = array(
            "requestSuccessful" => true, // Assuming the request was successful
            "responseMessage" => "success",
            "responseDescription" => "owner list found",
                "responseBody" => $usercontent
        ); 
      

    }else
    {

                  $response = array(
                    "requestSuccessful" => true, // Assuming the request was successful
                    "responseMessage" => "failed",
                    "responseDescription" => "owner not list found",
                    "responseBody" => array(
                        'owner_id' => 'null',
                        'owner_fname' => 'null',
                        'owner_lname' => 'null',
                        'owner_address' => 'null',
                        'owner_main_phone' => 'null',
                        'owner_wa_phone' => 'null',
                        'owner_email' =>  'null',
               
                        )
                     ); 
                     
             
    }
    
    
    
    $utf8_string = mb_convert_encoding($response, 'UTF-8', 'UTF-8');
    
  
    
     $json_response = json_encode($utf8_string, JSON_UNESCAPED_UNICODE);

     // Output the JSON response
    echo $json_response;

    
   
?>