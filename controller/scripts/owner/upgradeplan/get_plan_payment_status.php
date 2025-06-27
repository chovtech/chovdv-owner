<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php-error.log');

header('Content-Type: application/json');
require_once('../../../config/config.php');

$input = json_decode(file_get_contents('php://input'), true);
$institutionId = (int)($input['institutionId'] ?? 0);
$UserID = (int)($input['UserID'] ?? 0);
$UserType = $input['UserType'] ?? '';
$current_plan_id = (int)($input['current_plan'] ?? 0);
$new_plan_id = (int)($input['choosed_plain'] ?? 0);

if (!$institutionId || !$UserID || !$current_plan_id || !$new_plan_id) {
    echo json_encode(['status' => 'fail', 'reason' => 'Missing required parameters']);
    exit;
}

$sessionRes = mysqli_query($link, "SELECT sessionName FROM session WHERE sessionStatus = '1'");
$termRes = mysqli_query($link, "SELECT TermOrSemesterName, TermOrSemesterID FROM termorsemester WHERE status = '1'");
$sessionData = mysqli_fetch_assoc($sessionRes);
$termData = mysqli_fetch_assoc($termRes);

$sessionName = $sessionData['sessionName'] ?? '';
$termName = $termData['TermOrSemesterName'] ?? '';
$termID = $termData['TermOrSemesterID'] ?? '';

$currentPlan = mysqli_fetch_assoc(mysqli_query($link, "SELECT Amount FROM edumesplan WHERE PlanID = '$current_plan_id'"));
$newPlan = mysqli_fetch_assoc(mysqli_query($link, "SELECT Amount FROM edumesplan WHERE PlanID = '$new_plan_id'"));

$currentAmount = (float)($currentPlan['Amount'] ?? 0);
$newAmount = (float)($newPlan['Amount'] ?? 0);

if ($newAmount < $currentAmount) {
    $checkPayment = mysqli_fetch_assoc(mysqli_query($link, "
        SELECT SUM(ActualAmount + DiscountedAmount) AS totalPaid
        FROM plantransaction
        WHERE CampusID IN (
            SELECT CampusID FROM campus WHERE InstitutionID = '$institutionId'
        )
        AND SessionName = '$sessionName'
        AND TermOrSemesterName = '$termID'
    "));

    $totalPaid = (float)($checkPayment['totalPaid'] ?? 0);
    if ($totalPaid > 0) {
        echo json_encode(['status' => 'fail', 'reason' => 'Downgrade not allowed this term as payments have already been made. Please downgrade next term.']);
        exit;
    }
}

$totalTopUp = 0;
$totalActiveStudents = 0;
$totalAlreadyPaid = 0;
$campuses = [];

$campusQuery = mysqli_query($link, "SELECT CampusID, CampusName FROM campus WHERE InstitutionID = '$institutionId'");

while ($campus = mysqli_fetch_assoc($campusQuery)) {
    $campusID = $campus['CampusID'];
    $campusName = $campus['CampusName'];

    $studentsQuery = mysqli_query($link, "
        SELECT COUNT(DISTINCT student.StudentID) AS totalStudents
        FROM student
        INNER JOIN classordepartmentstudentallocation alloc ON student.StudentID = alloc.StudentID
        WHERE student.CampusID = '$campusID'
          AND alloc.CampusID = '$campusID'
          AND alloc.Session = '$sessionName'
          AND student.StudentTrashStatus = 0
          AND student.StudentID NOT IN (
              SELECT UserID FROM deactivateuser
              WHERE UserType = 'student'
              AND sessionName = '$sessionName'
              AND TermOrSemesterName = '$termID'
              AND Status = 0
          )
    ");

    $studentsRow = mysqli_fetch_assoc($studentsQuery);
    $totalStudents = (int)($studentsRow['totalStudents'] ?? 0);
    if ($totalStudents === 0) continue;

    // Fetch accurate payment records
    $paymentsResult = mysqli_query($link, "
        SELECT (ActualAmount + DiscountedAmount) AS amount
        FROM plantransaction
        WHERE CampusID = '$campusID'
          AND SessionName = '$sessionName'
          AND TermOrSemesterName = '$termID'
          AND transaction_type IN ('normal', 'upgrade','downgrade')
    ");

    $totalPaid = 0;
    $totalPaidStudents = 0;
    while ($row = mysqli_fetch_assoc($paymentsResult)) {
        // $students = (int)($row['num_of_student'] ?? 0);
        $amount = (float)($row['amount'] ?? 0);
        $totalPaid += $amount;
        // $totalPaidStudents += $students;
    }

    $totalPaidStudents = $currentAmount > 0 ? floor($totalPaid / $currentAmount) : 0;
    $paidPerStudent = $totalPaidStudents > 0 ? round($totalPaid / $totalPaidStudents, 2) : 0;
    

    $topUpForPaid = $totalPaidStudents * max(0, $newAmount - $paidPerStudent);
    $topUpForUnpaid = ($totalStudents - $totalPaidStudents) * $newAmount;
    $campusTopUp = $topUpForPaid + $topUpForUnpaid;

    $campuses[] = [
        'campusName' => $campusName,
        'totalStudents' => $totalStudents,
        'studentsPaid' => $totalPaidStudents,
        'paidPerStudent' => $paidPerStudent,
        'topUp' => $campusTopUp,
        'campusId' => $campusID
    ];

    $totalTopUp += $campusTopUp;
    $totalActiveStudents += $totalStudents;
    $totalAlreadyPaid += $totalPaid;
}

echo json_encode([
    'status' => 'success',
    'campuses' => $campuses,
    'totalTopUp' => $totalTopUp,
    'totalStudents' => $totalActiveStudents,
    'alreadyPaid' => $totalAlreadyPaid,
    'perStudentNewPlanAmount' => $newAmount
]);
