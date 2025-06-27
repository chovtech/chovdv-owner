<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php-error.log');
header('Content-Type: application/json');
require_once('../../../config/config.php');

function generateRefID($prefix = 'CREDIT-') {
    return $prefix . date("YmdHis") . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));
}

function creditWallet($link, $affiliate_id, $amount) {
    mysqli_query($link, "UPDATE affiliate SET WalletAmount = WalletAmount + $amount WHERE AffiliateID = '$affiliate_id'");
}
require_once('../messaging/wametor/send_wa_msg.php');


$input = json_decode(file_get_contents('php://input'), true);
$institutionId = (int)($input['institutionId'] ?? 0);
$UserID = (int)($input['UserID'] ?? 0);
$UserType = $input['UserType'] ?? '';
$current_plan_id = (int)($input['current_plan'] ?? 0);
$new_plan_id = (int)($input['choosed_plain'] ?? 0);
$transaction_method = $input['transaction_method'] ?? '';
$campuses = $input['campuses'] ?? [];

$currentPlan = mysqli_fetch_assoc(mysqli_query($link, "SELECT Amount FROM edumesplan WHERE PlanID = '$current_plan_id'"));
$newPlan = mysqli_fetch_assoc(mysqli_query($link, "SELECT Amount FROM edumesplan WHERE PlanID = '$new_plan_id'"));
$current_plan_amount = (float)($currentPlan['Amount'] ?? 0);
$new_plan_amount = (float)($newPlan['Amount'] ?? 0);

$wamentorData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM whatsappapikey WHERE Purpose='Default' AND Api_source='wamentor'"));
$wamentor_key = $wamentorData['ApiKey'] ?? '';
$wamentor_userid = $wamentorData['Api_userid'] ?? '';

$session = mysqli_fetch_assoc(mysqli_query($link, "SELECT sessionName FROM session WHERE sessionStatus = '1'"))['sessionName'] ?? '';
$termRow = mysqli_fetch_assoc(mysqli_query($link, "SELECT TermOrSemesterName, TermOrSemesterID FROM termorsemester WHERE status = '1'"));
$term = $termRow['TermOrSemesterName'] ?? '';
$termID = $termRow['TermOrSemesterID'] ?? '';

$date = date("Y-m-d H:i:s");
$status = 'paid';

if (!$institutionId || !$UserID || !$current_plan_id || !$new_plan_id || !$session || !$termID) {
    echo json_encode(['success' => false, 'message' => 'Missing required parameters']);
    exit;
}

$insertedCampuses = [];
$total_payment = 0;
$transaction_type = ($new_plan_amount > $current_plan_amount) ? 'upgrade' : 'downgrade';

foreach ($campuses as $data) {
    $campusID = (int)$data['campusID'];
    $topUp = (float)$data['topUp'];
    if ($topUp <= 0) continue;

    $ref_number = generateRefID(strtoupper($transaction_type) . '-');
    $result = mysqli_query($link, "INSERT INTO plantransaction (
        CampusID, PlanID, SessionName, TermOrSemesterName,
        ActualAmount, DiscountedAmount, DatePaid,
        ref_number, transaction_type, transaction_method
    ) VALUES (
        '$campusID', '$new_plan_id', '$session', '$termID',
        '$topUp', 0, '$date',
        '$ref_number', '$transaction_type', '$transaction_method')");

    if (!$result) {
        echo json_encode(['success' => false, 'message' => "Insert failed for campus ID $campusID", 'error' => mysqli_error($link)]);
        exit;
    }
    $insertedCampuses[] = ['campusID' => $campusID, 'amount' => $topUp];
    $total_payment += $topUp;
}

if ($total_payment > 0) {
    mysqli_query($link, "UPDATE institution SET ActualPlan='$new_plan_id' WHERE InstitutionID='$institutionId'");
    mysqli_query($link, "UPDATE agencyorschoolowner SET WalletBalance = WalletBalance - $total_payment WHERE AgencyOrSchoolOwnerID = '$UserID'");

    $schoolName = mysqli_fetch_assoc(mysqli_query($link, "SELECT InstitutionGeneralName FROM institution INNER JOIN campus ON institution.InstitutionID = campus.InstitutionID WHERE campus.CampusID = '{$campusID}'"))['InstitutionGeneralName'] ?? 'A School';

    $structure = mysqli_query($link, "SELECT level, percentage FROM affiliate_payment_structure");
    $percentages = array_fill_keys(['lead','direct','level 1','level 2','company'], 0);
    while ($row = mysqli_fetch_assoc($structure)) $percentages[strtolower($row['level'])] = $row['percentage'];

    $company_share = ($total_payment * $percentages['company']) / 100;
    $affiliate_share = ($total_payment * $percentages['direct']) / 100;

    $affiliate = mysqli_fetch_assoc(mysqli_query($link, "SELECT ao.prev_support_person, a.AffiliateID, ao.affiliate_lead, a.affiliate_l1, a.affiliate_l2 
        FROM agencyorschoolowner ao
        INNER JOIN affiliate a ON ao.AffiliateID = a.AffiliateID
        WHERE ao.AgencyOrSchoolOwnerID = '$UserID'"));

    $main_id = $affiliate['AffiliateID'];
    $lead_id = $affiliate['affiliate_lead'];
    $transfer_id = $affiliate['prev_support_person'];
    $lvl1_id = $affiliate['affiliate_l1'];
    $lvl2_id = $affiliate['affiliate_l2'];

    $has_transfer = $transfer_id != 0;
    [$main_pct, $transfer_pct] = [100, 0];
    if ($has_transfer) {
        $split = mysqli_fetch_assoc(mysqli_query($link, "SELECT to_percentage, from_percentage FROM affiliate_transfer_history WHERE AgencyOrSchoolOwnerID = '$UserID' AND from_affilliate_id = '$transfer_id' AND to_affilliate_id = '$main_id'"));
        if ($split) [$main_pct, $transfer_pct] = [$split['to_percentage'], $split['from_percentage']];
    }

    $ref = generateRefID();
    mysqli_query($link, "INSERT INTO company_earning (InstitutionID,
     total_payment, affiliate_share, company_percentage, company_amount, 
     has_level_1, has_level_2, ref_number, Session, Term, date) 
        VALUES ('$institutionId', '$total_payment', '$affiliate_share', 
        '{$percentages['company']}', '$company_share', 
        ".($lvl1_id != 0 ? 1 : 0).", ".($lvl2_id != 0 ? 1 : 0).", '$ref', '$session', '$termID', '$date')");

    $messages = [];
    foreach ([[$lvl1_id,'level_1',$percentages['level 1'],1], [$lvl2_id,'level_2',$percentages['level 2'],2]] as [$id,$type,$pct,$lvl]) {
        if ($id && $pct > 0) {
            $amt = round(($company_share * $pct) / 100, 2);
            mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
                VALUES ('$id','$type',$lvl,0,'$institutionId','$pct','$amt','$session','$termID','credit','$status','$ref','$date')");
            creditWallet($link, $id, $amt);
            $info = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone FROM affiliate WHERE AffiliateID='$id'"));
            $messages[] = ['name'=>$info['AffiliateFName'],'phone'=>$info['Phone'],'amount'=>$amt];
        }
    }

    if ($lead_id && $percentages['lead'] > 0) {
        $amt = round(($affiliate_share * $percentages['lead']) / 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date)
            VALUES ('$lead_id','lead',0,0,'$institutionId','{$percentages['lead']}','$amt','$session','$termID','credit','$status','$ref','$date')");
        creditWallet($link, $lead_id, $amt);
        $info = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone FROM affiliate WHERE AffiliateID='$lead_id'"));
        $messages[] = ['name'=>$info['AffiliateFName'],'phone'=>$info['Phone'],'amount'=>$amt];
        $affiliate_share -= $amt;
    }

    foreach ([[$main_id, $main_pct, 'main', 0], [$transfer_id, $transfer_pct, 'transfer', 1]] as [$id, $pct, $type, $is_transfer]) {
        if (!$id || ($type === 'transfer' && !$has_transfer) || ($type === 'transfer' && $main_id == $transfer_id)) continue;
        $amt = round(($affiliate_share * $pct) / 100, 2);
        $aff_pct = round(($amt / $total_payment) * 100, 2);
        mysqli_query($link, "INSERT INTO affiliate_earning (affiliate_id, earning_type, earning_level, is_transfered, InstitutionID, affiliate_percentage, amount, Session, Term, transaction_type, status, ref_number, date) 
            VALUES ('$id','$type',0,$is_transfer,'$institutionId','$aff_pct','$amt','$session','$termID','credit','$status','$ref','$date')");
        creditWallet($link, $id, $amt);
        $info = mysqli_fetch_assoc(mysqli_query($link, "SELECT AffiliateFName, Phone FROM affiliate WHERE AffiliateID='$id'"));
        $messages[] = ['name'=>$info['AffiliateFName'],'phone'=>$info['Phone'],'amount'=>$amt];
    }

    sendWhatsAppMsg([
        "user_id" => $wamentor_userid,
        "template_id" => "admin-notify",
        "message" => "Hi {{number}}, ₦{{amount}} was earned from {{school}} ({{plan_status}}).\n\n Ref: {{ref}},\n\n Term: {{term}},\n\n Session: {{session}}.",
        "contacts" => [[
            "number" => "+2349035315300",
            "name" => "EduMESS",
            "amount" => number_format($company_share, 2),
            "school" => $schoolName,
            "plan_status" => $transaction_type,
            "ref" => $ref,
            "term" => $term,
            "session" => $session
        ]]
    ], $wamentor_key);

    $affPayload = [
        "user_id" => $wamentor_userid,
        "template_id" => "plan-notify",
        "message" => "Hi {{name}}, you’ve just earned ₦{{amount}} from {{school}} subscription ({{plan_status}}).",
        "contacts" => []
    ];

    foreach ($messages as $msg) {
        $affPayload['contacts'][] = [
            "number" => $msg['phone'],
            "name" => $msg['name'],
            "amount" => number_format($msg['amount'], 2),
            "school" => $schoolName,
            "plan_status" => $transaction_type
        ];
    }

    sendWhatsAppMsg($affPayload, $wamentor_key);
}

echo json_encode(['success' => true, 'inserted' => $insertedCampuses, 
'message' => "Plan {$transaction_type} successful. Payments have been processed."]);
