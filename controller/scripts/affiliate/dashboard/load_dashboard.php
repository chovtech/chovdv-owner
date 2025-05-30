<?php
include('../../../config/config.php');

// Sanitize input
$user_id = mysqli_real_escape_string($link, $_POST['user_id']);
$user_type = mysqli_real_escape_string($link, $_POST['user_type']);
$session = mysqli_real_escape_string($link, $_POST['session']);
// $term = mysqli_real_escape_string($link, $_POST['term']);

 $crnt_session = mysqli_real_escape_string($link, $_POST['crnt_session']);
$crnt_term = mysqli_real_escape_string($link, $_POST['crnt_term']);

// inialize campus status here
$total_active_campus = 0;
$total_inactive_campus= 0;

$newadded_campus = array();


// get owner
$pros_sql_owner = ("SELECT * FROM `agencyorschoolowner` WHERE `AffiliateID`='$user_id' 
ORDER BY AgencyOrSchoolOwnerName ASC");
$pros_result_owner = mysqli_query($link, $pros_sql_owner);
// $pros_row_owner = mysqli_fetch_assoc($pros_result_owner);
$pros_row_cnt_owner = mysqli_num_rows($pros_result_owner);


// Get all institutions under the affiliate
$institution_sql = "
    SELECT institution.InstitutionID, institution.InstitutionGeneralName 
    FROM institution
    INNER JOIN agencyorschoolowner 
    ON institution.AgencyOrSchoolOwnerID = agencyorschoolowner.AgencyOrSchoolOwnerID
    WHERE agencyorschoolowner.AffiliateID = '$user_id' AND `institution`.`TrashStatus`='0'
";
$institution_result = mysqli_query($link, $institution_sql);

if ($institution_result && mysqli_num_rows($institution_result) > 0) {
    while ($institution = mysqli_fetch_assoc($institution_result)) {
        $institution_id = $institution['InstitutionID'];

        // Get campuses for this institution
        $campus_sql = "SELECT CampusID, CampusName,CampusActiveStatus FROM campus WHERE InstitutionID = '$institution_id'
         AND `CampusTrashStatus`='0'";
        $campus_result = mysqli_query($link, $campus_sql);
        $campus_count = mysqli_num_rows($campus_result);


        // $total_campus += $campus_count;

        if ($campus_result && $campus_count > 0) {
            while ($campus = mysqli_fetch_assoc($campus_result)) {
                $campus_id = $campus['CampusID'];
                $CampusActiveStatus = $campus['CampusActiveStatus'];

                //check campus status condition
                if($CampusActiveStatus == '1')
                {
                    $total_active_campus++;
                }else
                {
                    $total_inactive_campus++;
                }
            }
        }

       
    }
}


     
        // SELECT NEWLY ADDDED SCHOOLS AND CAMPUSES
          $new_campus_sql = "SELECT `institution`.`InstitutionID`,
          `institution`.`InstitutionGeneralName`, 
          `campus`.`CampusID`,`campus`.`CampusName` 
          FROM `campus` INNER JOIN
          `institution` ON 
          `campus`.`InstitutionID` = `institution`.`InstitutionID` INNER JOIN agencyorschoolowner 
           ON institution.AgencyOrSchoolOwnerID = agencyorschoolowner.AgencyOrSchoolOwnerID
            WHERE agencyorschoolowner.AffiliateID = '$user_id' AND 
          `campus`.`CampusActiveStatus`='1' 
          AND `campus`.`CampusTrashStatus`='0'
          ORDER BY `campus`.`CampusID` DESC LIMIT 3";
        $new_campus_result = mysqli_query($link, $new_campus_sql);
        $new_campus_count = mysqli_num_rows($new_campus_result);

        if ($new_campus_result && $new_campus_count > 0) {
            while ($new_campus = mysqli_fetch_assoc($new_campus_result)) {


             if($new_campus_count > 3)
             {

             }else{

              $new_campus_id = $new_campus['CampusID'];
              $new_campus_name = $new_campus['CampusName'];
              $new_institution_id = $new_campus['InstitutionID'];
              $new_institution_name = $new_campus['InstitutionGeneralName'];


              $newadded_campus[] = array(
                'institute_id' => $new_institution_id,
                'institute_name' => $new_institution_name,
                'campus_name' => $new_campus_name,
                'campus_id' =>  $new_campus_id
              );

             }
               
                // Process each new campus
                // echo $new_campus['CampusName'];
            }
        }
        // SELECT NEWLY ADDDED SCHOOLS AND CAMPUSES



// GET TERMLY EARNING HERE
    $pros_count_amount_sql = '';
    $pros_count_amount_sql.="SELECT * FROM 
    `affiliate_earning` WHERE  `affiliate_id`='$user_id' AND 
    `transaction_type`='credit'";

    //pros check if term is selected
    if($crnt_term == '0')
    {
    }else{
      $pros_count_amount_sql.="AND `Term`='$crnt_term'";
    }//pros check if term is selected

    //pros check if session is selected
    if($crnt_session == '0')
    {
    //   echo 'session zero';
    }else{
      $pros_count_amount_sql.="AND `Session`='$crnt_session'";
    }//pros check if session is selected

    // print_r($pros_count_amount_sql);
    $pros_count_amount = mysqli_query($link, $pros_count_amount_sql);
    
    $pros_count_amount_row = mysqli_fetch_assoc($pros_count_amount);
     $pros_count_amount_rows = mysqli_num_rows($pros_count_amount);
    
     $termly_amount = 0;
    
    
    if($pros_count_amount_rows > 0)
    {
        
        
         do{

            $id = $pros_count_amount_row['id'];
            $sub_affiliate_id = $pros_count_amount_row['sub_affiliate_id'];
            $amount = $pros_count_amount_row['amount'];
            $earning_level = $pros_count_amount_row['earning_level'];
            $Session_new = $pros_count_amount_row['Session'];
            $Term_new = $pros_count_amount_row['Term'];
            $status = $pros_count_amount_row['transaction_type'];
            $InstitutionID = $pros_count_amount_row['InstitutionID'];
            $affiliate_percentage = $pros_count_amount_row['affiliate_percentage'];
            
            
             $final_amt = (intVal($affiliate_percentage) / 100) * $amount;
             
             $termly_amount+=$final_amt;
            
           }while($pros_count_amount_row = mysqli_fetch_assoc($pros_count_amount));
        
    }
    
    //  $pros_count_amount_rows = mysqli_num_rows($pros_count_amount);
    
    // collect total affilect here
    
    // $final_amt = (intVal($affiliate_percentage) / 100) * $amount;
    
        
    
    // $termly_amount = (int)$pros_count_amount_row['TotalAmount'];


// pros get all afiliate here
$pros_get_affiliate_all = mysqli_query($link, "SELECT 
  COUNT(*) AS TotalAffiliates
FROM 
  `affiliate`
WHERE 
  (`affiliate_l1` = '$user_id' OR `affiliate_l2` = '$user_id')
  AND `DeleteStatus` = 0
");

$pros_get_affiliate_all_fetch = mysqli_fetch_assoc($pros_get_affiliate_all);
$total_affilite = (int)$pros_get_affiliate_all_fetch['TotalAffiliates'];


// get leveel one

$pros_get_affiliate_all_one = mysqli_query($link, "SELECT 
  COUNT(*) AS TotalAffiliatesone
FROM 
  `affiliate`
WHERE 
  `affiliate_l1` = '$user_id' 
  AND `DeleteStatus` = 0
");

$pros_get_affiliate_all_fetch_one = mysqli_fetch_assoc($pros_get_affiliate_all_one);
$total_affilite_one = (int)$pros_get_affiliate_all_fetch_one['TotalAffiliatesone'];




// get leveel two

$pros_get_affiliate_all_two = mysqli_query($link, "SELECT 
  COUNT(*) AS TotalAffiliatestwo
FROM 
  `affiliate`
WHERE 
  `affiliate_l2` = '$user_id' 
  AND `DeleteStatus` = 0
");

$pros_get_affiliate_all_fetch_two = mysqli_fetch_assoc($pros_get_affiliate_all_two);
$total_affilite_two = (int)$pros_get_affiliate_all_fetch_two['TotalAffiliatestwo'];




$response =  [
    'total_institutions' => mysqli_num_rows($institution_result),
    'total_active_campuses' => $total_active_campus,
    'total_inactive_campuses' => $total_inactive_campus,
    'owner_cont' => $pros_row_cnt_owner,
    'termly_amount' => number_format($termly_amount),
    'total_affiliate' => number_format($total_affilite),
    'total_affiliate_one' => number_format($total_affilite_one),
    'total_affiliate_two' => number_format($total_affilite_two),
    'newadded_campus' => $newadded_campus
];



$utf8_string = mb_convert_encoding($response, 'UTF-8', 'UTF-8');
    
  
    
$json_response = json_encode($utf8_string, JSON_UNESCAPED_UNICODE);

// Output the JSON response
echo $json_response;
