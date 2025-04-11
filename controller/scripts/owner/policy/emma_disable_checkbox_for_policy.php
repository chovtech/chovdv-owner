<?php

include('../../../config/config.php');

// Assuming $link is your MySQLi connection

// Checkboxes values
$emma_institution_id_for_checkboxes = $_POST['emma_check_policy_box_institution'];

// Users to check
$users = ['parent', 'staff', 'student'];

// Placeholder for the WHERE clause conditions
$whereConditions = [];

// Build the WHERE clause conditions
foreach ($users as $user) {
    $whereConditions[] = "StakeHolder LIKE '%" . mysqli_real_escape_string($link, $user) . "%'";
}

// Combine the conditions with OR
$whereClause = implode(' OR ', $whereConditions);

// SQL query to check if any user exists
$sql = "SELECT * FROM `policy` WHERE $whereClause";

// Execute the query
$result = mysqli_query($link, $sql);

if ($result) {
    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    
    // Check if any user exists
    $userCount = mysqli_num_rows($result);
    // $userCount = mysqli_num_rows($row['userCount'];)

    if ($userCount > 0) {
        $emmacheckparent = 0;
        $emmacheckstaff = 0;
        $emmacheckstudent = 0;
    
        do {
            $StakeHolder = $row['StakeHolder'];

            if ($StakeHolder == 'parent') {
                $emmacheckparent += 1;
            } elseif ($StakeHolder == 'staff') {
                $emmacheckstaff += 1;
            } elseif ($StakeHolder == 'student') {
                $emmacheckstudent += 1;
            }

        } while ($row = mysqli_fetch_assoc($result));

        if ($emmacheckparent == 0){
            echo 1;
        }else if ($emmacheckparent > 0){
            echo 11;
        }else if ($emmacheckstaff == 0){
            echo 2;
        }else if ($emmacheckstaff > 0){
            echo 22;
        }else if ($emmacheckstudent == 0){
            echo 3;
        }else if ($emmacheckstudent > 0){
            echo 33;
        }else if ($emmacheckparent == 0 && $emmacheckstaff == 0){
            echo 1122;
        }else if ($emmacheckparent == 0 && $emmacheckstudent == 0){
            echo 1133;
        }else if ($emmacheckparent > 0 && $emmacheckstudent > 0){
            echo 13;
        }else if ($emmacheckparent > 0 && $emmacheckstaff > 0){
            echo 23;
        }else if ($emmacheckparent == 0 && $emmacheckstaff > 0){
            echo 112;
        }else if ($emmacheckparent == 0 && $emmacheckstudent > 0){
            echo 113;
        }else if ($emmacheckstaff == 0 && $emmacheckparent == 0){
            echo 21;
        }else if ($emmacheckstaff == 0 && $emmacheckstudent == 0){
            echo 23;
        }elseif ($emmacheckstaff > 0 && $emmacheckparent > 0){
            echo 2211;
        }else if ($emmacheckstaff > 0 && $emmacheckstudent > 0){
            echo 2233;
        }else if ($emmacheckstaff == 0 && $emmacheckparent > 0){
            echo 211;
        }else if ($emmacheckstaff == 0 && $emmacheckstudent > 0){
            echo 233;
        }else if ($emmacheckstaff > 0 && $emmacheckstudent == 0){
            echo 223;
        }else if ($emmacheckstudent > 0 && $emmacheckstaff == 0){
            echo 332;
        }else if ($emmacheckstudent > 0 && $emmacheckparent == 0){
            echo 331;
        }else if ($emmacheckstudent == 0 && $emmacheckparent > 0){
            echo 311;
        }else if ($emmacheckstudent == 0 && $emmacheckstaff > 0){
            echo 322;
        }else if ($emmacheckstudent == 0 && $emmacheckstaff == 0 && $emmacheckparent == 0){
            echo 321;
        }else if ($emmacheckstudent > 0 && $emmacheckstaff > 0 && $emmacheckparent > 0){
            echo 332211;
        }else if ($emmacheckstudent == 0 && $emmacheckstaff == 0 && $emmacheckparent > 0){
            echo 3211;
        }else if ($emmacheckstudent == 0 && $emmacheckstaff > 0 && $emmacheckparent == 0){
            echo 3221;
        }else if ($emmacheckstudent > 0 && $emmacheckstaff == 0 && $emmacheckparent == 0){
            echo 3321;
        }else{
            echo 'NULL';
        }

    } else {
        echo 2;
    }
} else {
    // Handle query error
    // echo "Error: " . mysqli_error($link);
}

?>
