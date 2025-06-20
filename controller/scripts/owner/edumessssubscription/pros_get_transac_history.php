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

    $limit = 10;
    $offset = ($page - 1) * $limit;

    // Count total records with condition
    $count_sql = "SELECT COUNT(*) as total FROM `plantransaction` 
                  INNER JOIN `campus` ON `plantransaction`.`CampusID` = `campus`.`CampusID`
                  WHERE `campus`.`InstitutionID` = '$institutionID'";

    if ($session !== '0' && $session !== 'all' && $session !== 'NULL' && $session !== '') {
        $count_sql .= " AND plantransaction.SessionName = '$session'";
    }

    $count_result = mysqli_query($link, $count_sql);
    if (!$count_result) throw new Exception("Count query failed: " . mysqli_error($link));

    $total_data = mysqli_fetch_assoc($count_result);
    $total_records = $total_data['total'];
    $total_pages = ceil($total_records / $limit);

    // Transaction query with join
    $get_transaction = "
        SELECT plantransaction.*, campus.CampusName
        FROM `plantransaction` 
        INNER JOIN `campus` ON `plantransaction`.`CampusID` = `campus`.`CampusID`
        WHERE `campus`.`InstitutionID` = '$institutionID'
    ";

    if ($session !== '0' && $session !== 'all' && $session !== 'NULL' && $session !== '') {
        $get_transaction .= " AND plantransaction.SessionName = '$session'";
    }

    $get_transaction .= " ORDER BY plantransaction.`PlanTransactionID` DESC LIMIT $limit OFFSET $offset";

    $result = mysqli_query($link, $get_transaction);
    if (!$result) throw new Exception("Transaction query failed: " . mysqli_error($link));

    $transactions = [];
    while ($row = mysqli_fetch_assoc($result)) {
      


        $termid = $row['TermOrSemesterName'];
        $CampusID = $row['CampusID'];
        $getterm = mysqli_query($link, "SELECT *
            FROM termorsemester
            INNER JOIN termalias ON termorsemester.TermOrSemesterID = termalias.TermOrSemesterID
            WHERE termalias.CampusID = '$CampusID' AND termorsemester.TermOrSemesterID = '$termid'
            ");
        $getterm_row = mysqli_fetch_assoc($getterm);
        $termalias =  $getterm_row['TermAliasName'];

        $row['TermAliasName'] = $termalias; //  Add new key to row

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
