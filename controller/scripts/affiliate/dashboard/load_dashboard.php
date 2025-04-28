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




// GET TERMLY EARNING HERE

$pros_count_amount = mysqli_query($link, "SELECT SUM(amount) AS TotalAmount FROM 
`affiliate_earning` WHERE `Session`='$crnt_session' AND `Term`='$crnt_term' AND `affiliate_id`='$user_id'");
//  $pros_count_amount_rows = mysqli_num_rows($pros_count_amount);

// collect total affilect here

    
$pros_count_amount_row = mysqli_fetch_assoc($pros_count_amount);
$termly_amount = (int)$pros_count_amount_row['TotalAmount'];


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
    'total_affiliate_two' => number_format($total_affilite_two)
];



$utf8_string = mb_convert_encoding($response, 'UTF-8', 'UTF-8');
    
  
    
$json_response = json_encode($utf8_string, JSON_UNESCAPED_UNICODE);

// Output the JSON response
echo $json_response;
