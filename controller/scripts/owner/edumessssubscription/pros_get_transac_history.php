<?php
ob_start();
include('../../../config/config.php');
header('Content-Type: application/json');

function sanitize($link, $key, $default = '') {
    return isset($_POST[$key]) ? mysqli_real_escape_string($link, $_POST[$key]) : $default;
}

try {
    $userID = sanitize($link, 'userID');
    $usertype = sanitize($link, 'usertype');
    $institutionID = sanitize($link, 'institutionID');
    $session = sanitize($link, 'session');
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    // Load institution plan info
    $institutionQuery = "SELECT * FROM `institution` WHERE InstitutionID='$institutionID'
     ORDER BY InstitutionGeneralName ASC";
    $institutionResult = mysqli_query($link, $institutionQuery);
    $institutionRow = mysqli_fetch_assoc($institutionResult);

    $planid = $institutionRow['ActualPlan'] ?? 0;
    $planamount_set = $institutionRow['PlanAmount'] ?? 0;
    $planpercentage = $institutionRow['PlanPercentage'] ?? 0;

    // Get amount per student
    $planQuery = mysqli_query($link, "SELECT * FROM `edumesplan` WHERE `PlanID`='$planid'");
    $amount_per_student = 0;
    if (mysqli_num_rows($planQuery) > 0) {
        $planRow = mysqli_fetch_assoc($planQuery);
        $amount_per_student = intval($planRow['Amount']);
    }

    $limit = 10;
    $offset = ($page - 1) * $limit;

    // Count total records
    $count_sql = "SELECT COUNT(*) as total FROM `plantransaction`
                  INNER JOIN `campus` ON `plantransaction`.`CampusID` = `campus`.`CampusID`
                  WHERE `campus`.`InstitutionID` = '$institutionID'";

    if (!in_array($session, ['0', 'all', 'NULL', ''])) {
        $count_sql .= " AND plantransaction.SessionName = '$session'";
    }

    $count_result = mysqli_query($link, $count_sql);
    if (!$count_result) throw new Exception("Count query failed: " . mysqli_error($link));

    $total_data = mysqli_fetch_assoc($count_result);
    $total_records = $total_data['total'];
    $total_pages = ceil($total_records / $limit);

    // Fetch transaction records
    $transaction_sql = "SELECT plantransaction.*, campus.CampusName
                        FROM `plantransaction`
                        INNER JOIN `campus` ON `plantransaction`.`CampusID` = `campus`.`CampusID`
                        WHERE `campus`.`InstitutionID` = '$institutionID'";

    if (!in_array($session, ['0', 'all', 'NULL', ''])) {
        $transaction_sql .= " AND plantransaction.SessionName = '$session'";
    }

    $transaction_sql .= " ORDER BY plantransaction.PlanTransactionID DESC LIMIT $limit OFFSET $offset";
    $result = mysqli_query($link, $transaction_sql);
    if (!$result) throw new Exception("Transaction query failed: " . mysqli_error($link));

    $transactions = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $termid = $row['TermOrSemesterName'];
        $CampusID = $row['CampusID'];

        // Count active students
        $active_students_sql = "
            SELECT COUNT(DISTINCT student.StudentID) AS totalstud
            FROM campus
            INNER JOIN student ON campus.CampusID = student.CampusID
            INNER JOIN classordepartmentstudentallocation ON student.StudentID = classordepartmentstudentallocation.StudentID
            INNER JOIN classordepartment ON classordepartmentstudentallocation.ClassOrDepartmentID = classordepartment.ClassOrDepartmentID
            WHERE campus.InstitutionID = '$institutionID'
            AND campus.CampusID = '$CampusID'
            AND student.CampusID = '$CampusID'
            AND classordepartmentstudentallocation.CampusID = '$CampusID'
            AND classordepartmentstudentallocation.Session = '{$row['SessionName']}'
            AND classordepartment.CampusID = '$CampusID'
            AND student.StudentTrashStatus = 0
            AND student.StudentID NOT IN (
                SELECT UserID FROM deactivateuser
                WHERE UserType = 'student'
                  AND sessionName = '{$row['SessionName']}'
                  AND TermOrSemesterName = '$termid'
                  AND Status = 0
            )";

        $active_result = mysqli_query($link, $active_students_sql);
        $total_student = 0;
        if ($active_result && mysqli_num_rows($active_result) > 0) {
            $active_data = mysqli_fetch_assoc($active_result);
            $total_student = $active_data['totalstud'];
        }

        $amount_paid = (float)$row['ActualAmount'] + (float)$row['DiscountedAmount'];
        $total_paid_students = $amount_per_student > 0 ? floor($amount_paid / $amount_per_student) : 0;

        // Fetch term alias name
        $term_query = mysqli_query($link, "SELECT * FROM termorsemester
            INNER JOIN termalias ON termorsemester.TermOrSemesterID = termalias.TermOrSemesterID
            WHERE termalias.CampusID = '$CampusID' AND termorsemester.TermOrSemesterID = '$termid'");
        $term_row = mysqli_fetch_assoc($term_query);
        $termalias = $term_row['TermAliasName'] ?? '';

        $row['TermAliasName'] = $termalias;
        $row['num_of_studentnew'] = $total_paid_students;
        $transactions[] = $row;
    }

    $response = [
        'success' => true,
        'data' => [
            'transactions' => $transactions,
            'pagination' => [
                'current_page' => $page,
                'total_pages' => $total_pages,
                'total_records' => $total_records,
                'limit' => $limit
            ]
        ]
    ];

} catch (Exception $e) {
    mysqli_rollback($link);
    $response = [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ];
}

ob_clean();
echo json_encode($response);
ob_end_flush();
?>
