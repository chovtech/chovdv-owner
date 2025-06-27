<?php
include('../../../config/config.php');
// ini_set('error_log', __DIR__ . '/php-error.log');
date_default_timezone_set("Africa/Lagos");
header('Content-Type: application/json');

function sanitize($link, $key, $default = '') {
    return isset($_POST[$key]) ? mysqli_real_escape_string($link, $_POST[$key]) : $default;
}

// function log_info($message) {
//     error_log("[INFO " . date("Y-m-d H:i:s") . "] " . $message . "\n", 3, __DIR__ . "/slot_log.log");
// }

try {
    $campusID      = sanitize($link, 'campusID');
    $userID        = sanitize($link, 'userID');
    $usertype      = sanitize($link, 'usertype');
    $institutionID = sanitize($link, 'instutitionID');

    // log_info("Received: campusID=$campusID, userID=$userID, usertype=$usertype, institutionID=$institutionID");

    // Fetch session
    $sessionRes = mysqli_query($link, "SELECT sessionName FROM session WHERE sessionStatus = '1'");
    if (!$sessionRes || mysqli_num_rows($sessionRes) === 0) {
        throw new Exception("Active session not found");
    }
    $sessionData = mysqli_fetch_assoc($sessionRes);
    // log_info("Session fetched: " . json_encode($sessionData));

    // Fetch term
    $termRes = mysqli_query($link, "SELECT TermOrSemesterName, TermOrSemesterID FROM termorsemester WHERE status = '1'");
    if (!$termRes || mysqli_num_rows($termRes) === 0) {
        throw new Exception("Active term not found");
    }
    $termData = mysqli_fetch_assoc($termRes);
    // log_info("Term fetched: " . json_encode($termData));

    $sessionName = $sessionData['sessionName'] ?? '';
    $termID = $termData['TermOrSemesterID'] ?? '';

    // Fetch institution
    $institutionQuery = "SELECT * FROM institution WHERE InstitutionID='$institutionID'";
    $institutionResult = mysqli_query($link, $institutionQuery);
    if (!$institutionResult || mysqli_num_rows($institutionResult) === 0) {
        throw new Exception("Institution not found");
    }
    $institutionRow = mysqli_fetch_assoc($institutionResult);
    // log_info("Institution fetched: " . json_encode($institutionRow));

    $planid = $institutionRow['ActualPlan'] ?? 0;

    // Fetch plan
    $planQuery = mysqli_query($link, "SELECT * FROM edumesplan WHERE PlanID='$planid'");
    $amount_per_student = 0;
    if ($planQuery && mysqli_num_rows($planQuery) > 0) {
        $planRow = mysqli_fetch_assoc($planQuery);
        $amount_per_student = intval($planRow['Amount']);
        // log_info("Plan found: " . json_encode($planRow));
    } else {
        // log_info("Plan not found for PlanID $planid");
    }

    // Transactions query
    $transaction_sql = "
        SELECT (plantransaction.ActualAmount + plantransaction.DiscountedAmount) AS amount
        FROM plantransaction
        INNER JOIN campus ON plantransaction.CampusID = campus.CampusID
        WHERE campus.InstitutionID = '$institutionID'
        AND plantransaction.SessionName = '$sessionName'
        AND plantransaction.TermOrSemesterName = '$termID'";

    if (!in_array($campusID, ['0', 'all', 'NULL', '','Loading...'])) {
        $transaction_sql .= " AND plantransaction.CampusID = '$campusID'";
    }

    $transaction_sql .= " AND plantransaction.transaction_type IN ('normal', 'upgrade','downgrade')";
    $paymentsResult = mysqli_query($link, $transaction_sql);
    if (!$paymentsResult) {
        throw new Exception("Failed to fetch transactions: " . mysqli_error($link));
    }

    $row_count = mysqli_num_rows($paymentsResult);
    // log_info("Transactions fetched: $row_count rows");

    $totalPaid = 0;
    while ($row = mysqli_fetch_assoc($paymentsResult)) {
        $totalPaid += (float)($row['amount'] ?? 0);
    }
    $total_paid_students = $amount_per_student > 0 ? floor($totalPaid / $amount_per_student) : 0;

    // Allocated query
    $getallocated_count = "
        SELECT COUNT(student_subscription_allocation.StudentID) 
        FROM student_subscription_allocation 
        INNER JOIN campus ON student_subscription_allocation.CampusID = campus.CampusID
        WHERE campus.InstitutionID = '$institutionID'
        AND student_subscription_allocation.Session = '$sessionName'
        AND student_subscription_allocation.Term = '$termID'";

    if (!in_array($campusID, ['0', 'all', 'NULL', '','Loading...'])) {
        $getallocated_count .= " AND student_subscription_allocation.CampusID = '$campusID'";
    }

    $getallocated_count_sql = mysqli_query($link, $getallocated_count);
    if (!$getallocated_count_sql) {
        throw new Exception("Failed to fetch allocation count: " . mysqli_error($link));
    }

    $allocated_row = mysqli_fetch_row($getallocated_count_sql);
    $total_allocated = (int)($allocated_row[0] ?? 0);
    // log_info("Allocated students fetched: $total_allocated");

    echo json_encode([
        'success' => true,
        'data' => [[
            'total_paid' => $total_paid_students,
            'total_allocated' => $total_allocated
        ]]
    ]);
    exit;

} catch (Exception $e) {
    // error_log("[ERROR " . date("Y-m-d H:i:s") . "] " . $e->getMessage() . "\n", 3, __DIR__ . "/slot_log.log");

    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
    exit;
}
