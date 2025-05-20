<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $user_id  = $_POST['user_id'];
    $aff_level  = $_POST['aff_level'];
    $session  = $_POST['session'];
    $term  = $_POST['term'];
    $trans_type  = $_POST['trans_type'];


    $query = "SELECT * FROM `affiliate_earning` WHERE affiliate_id = '$user_id'";

    if($aff_level == 1)
    {
        $query .= " AND `earning_level` = '$aff_level'";
    }
    elseif($aff_level == 2)
    {
        $query .= " AND `earning_level` = '$aff_level'";
    }

    // Add session filter if needed
    if($session != '0')
    {
        $query .= " AND `Session` = '$session'";
    }

    // Add term filter if needed
    if($term != '0')
    {
        $query .= " AND `Term` = '$term'";
    }

    // Add trans_type filter if needed
    if($trans_type != '0')
    {
        $query .= " AND `transaction_type` = '$trans_type'";
    }

    // Order by name
    $query .= " ORDER BY `date` DESC";

    // Now run the query
    $sql_affiliate = mysqli_query($link, $query);
    $sql_affiliate_row = mysqli_fetch_assoc($sql_affiliate);
    $sql_affiliate_cnt = mysqli_num_rows($sql_affiliate);

    if($sql_affiliate_cnt > 0)
    {
        $cnt = 1;
        
        echo '<tr id="noRecordsRow" style="display: none;">
            <td colspan="6" class="text-center text-muted">No records found</td>
        </tr>';
        
        do{

            $id = $sql_affiliate_row['id'];
            $sub_affiliate_id = $sql_affiliate_row['sub_affiliate_id'];
            $amount = $sql_affiliate_row['amount'];
            $earning_level = $sql_affiliate_row['earning_level'];
            $Session_new = $sql_affiliate_row['Session'];
            $Term_new = $sql_affiliate_row['Term'];
            $status = $sql_affiliate_row['transaction_type'];
            $InstitutionID = $sql_affiliate_row['InstitutionID'];
            $affiliate_percentage = $sql_affiliate_row['affiliate_percentage'];
            
            $final_amt = (intVal($affiliate_percentage) / 100) * $amount;
            
            if($sub_affiliate_id == '0')
            {
                
                $affiliate = 'Direct Earning';

                $affiliate_lvl = '';
            }
            else{

                $abba_sql_affiliate_dis = ("SELECT * FROM `affiliate` WHERE `AffiliateID` = $sub_affiliate_id");
                $abba_result_affiliate_dis = mysqli_query($link, $abba_sql_affiliate_dis);
                $abba_row_affiliate_dis = mysqli_fetch_assoc($abba_result_affiliate_dis);
                $abba_row_cnt_affiliate_dis = mysqli_num_rows($abba_result_affiliate_dis);

                 if ($abba_row_cnt_affiliate_dis > 0)
                {

                    $affiliate = $abba_row_affiliate_dis['AffiliateFName'].' '.$abba_row_affiliate_dis['AffiliateMName'].' '.$abba_row_affiliate_dis['AffiliateLName'];

                    $affiliate_lvl = $earning_level;
                    
                }
                else{

                    $affiliate = '';

                    $affiliate_lvl = '';
                    
                }

            }

            if($Term_new == '1')
            {
                $Term_name = 'First Term';
            }
            elseif($Term_new == '2')
            {
                $Term_name = 'Second Term';
            }
            else{
                $Term_name = 'Third Term';
            }
            
            if($status == 'credit')
            {
                $color = 'success';
            }
            else
            {
                $color = 'danger';
            }
            
            $abba_sql_institution = ("SELECT * FROM `institution` WHERE `InstitutionID` = $InstitutionID");
            $abba_result_institution = mysqli_query($link, $abba_sql_institution);
            $abba_row_institution = mysqli_fetch_assoc($abba_result_institution);
            $abba_row_cnt_institution = mysqli_num_rows($abba_result_institution);

             if ($abba_row_cnt_institution > 0)
            {

                $inst_name = $abba_row_institution['InstitutionGeneralName'];

            }
            else{

                $inst_name = '';

            }
            
            $ref_number = $sql_affiliate_row['ref_number'];
            $date = $sql_affiliate_row['date'];

            echo '<tr>
                <th scope="row">'.$cnt++.'</th>
                <td>'.$ref_number.'</td>
                <td>'.$inst_name .'</td>
                <td>₦'.number_format($final_amt).'</td>
                <td class="text-'.$color.'">'.strtoupper($status).'</td>
                <td>'.$date.'</td>
                <td><i class="fas fa-eye text-primary view_details_btn" data-bs-toggle="modal" data-bs-target="#trans_det_Modal" style="cursor:pointer;" data-affname = "'.$abba_row_affiliate_dis['AffiliateFName'].' '.$abba_row_affiliate_dis['AffiliateMName'].' '.$abba_row_affiliate_dis['AffiliateLName'].'" data-lvl = "'.$earning_level.'" data-term = "'.$Term_name.'" data-session = "'.$Session_new.'" data-ref = "'.$ref_number.'" data-inst = "'.$inst_name.'"  data-amt = "₦'.number_format($amount).'" data-status = "'.strtoupper($status).'" data-date = "'.$date.'"></i></td>
                
            </tr>';

        }while($sql_affiliate_row = mysqli_fetch_assoc($sql_affiliate));
    }
    else
    {
        echo '<tr>
            <td colspan="6" class="text-center text-muted">No records found</td>
        </tr>';
    }

    // For DB Credit
    $sql_affiliate_earning_l1_query = "SELECT SUM((affiliate_percentage / 100) * amount) AS earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND `transaction_type` = 'credit'";

    // Add session filter if needed
    if ($session != '0') {
        $sql_affiliate_earning_l1_query .= " AND `Session` = '$session'";
    }

    // Add term filter if needed
    if ($term != '0') {
        $sql_affiliate_earning_l1_query .= " AND `Term` = '$term'";
    }

    $sql_affiliate_earning_l1_db = mysqli_query($link, $sql_affiliate_earning_l1_query);
    $sql_affiliate_earning_l1_db_row = mysqli_fetch_assoc($sql_affiliate_earning_l1_db);
    $sql_affiliate_earning_l1_db_cnt = mysqli_num_rows($sql_affiliate_earning_l1_db);

    if ($sql_affiliate_earning_l1_db_cnt > 0) {
        $earning_1_db = number_format($sql_affiliate_earning_l1_db_row['earning_amt_db'] ?? 0);

    } else {
        $earning_1_db = 0;
    }

    echo '<input type="hidden" id="credit" value="₦'.$earning_1_db.'">';

    // For DB Debit
    $sql_affiliate_earning_l2_query = "SELECT SUM(amount) as earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND `transaction_type` = 'debit'";

    // Add session filter if needed
    if ($session != '0') {
        $sql_affiliate_earning_l2_query .= " AND `Session` = '$session'";
    }

    // Add term filter if needed
    if ($term != '0') {
        $sql_affiliate_earning_l2_query .= " AND `Term` = '$term'";
    }

    // Execute the query
    $sql_affiliate_earning_l2_db = mysqli_query($link, $sql_affiliate_earning_l2_query);
    $sql_affiliate_earning_l2_db_row = mysqli_fetch_assoc($sql_affiliate_earning_l2_db);
    $sql_affiliate_earning_l2_db_cnt = mysqli_num_rows($sql_affiliate_earning_l2_db);

    if ($sql_affiliate_earning_l2_db_cnt > 0) {
        $earning_2_db = number_format($sql_affiliate_earning_l2_db_row['earning_amt_db'] ?? 0);
    } else {
        $earning_2_db = 0;
    }

    echo '<input type="hidden" id="debit" value="₦'.$earning_2_db.'">';
    
    
    // For Earn
    $query_aff_earn_l1 = "SELECT SUM((affiliate_percentage / 100) * amount) AS earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND `transaction_type` = 'credit' AND `earning_level` = '1'";

    // Add session filter if needed
    if ($session != '0') {
        $query_aff_earn_l1 .= " AND `Session` = '$session'";
    }

    // Add term filter if needed
    if ($term != '0') {
        $query_aff_earn_l1 .= " AND `Term` = '$term'";
    }

    // Execute the query
    $query_aff_earn_l1_db = mysqli_query($link, $query_aff_earn_l1);
    $query_aff_earn_l1_db_row = mysqli_fetch_assoc($query_aff_earn_l1_db);
    $query_aff_earn_l1_db_cnt = mysqli_num_rows($query_aff_earn_l1_db);

    if ($query_aff_earn_l1_db_cnt > 0) {
        $aff_earn_l1 = number_format($query_aff_earn_l1_db_row['earning_amt_db'] ?? 0);
    } else {
        $aff_earn_l1 = 0;
    }

    echo '<input type="hidden" id="aff_earn_l1" value="₦'.$aff_earn_l1.'">';
    
    
    
    
    
    
    // For DB Debit
    $query_aff_earn_l2 = "SELECT SUM((affiliate_percentage / 100) * amount) AS earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND `transaction_type` = 'credit' AND `earning_level` = '2'";

    // Add session filter if needed
    if ($session != '0') {
        $query_aff_earn_l2 .= " AND `Session` = '$session'";
    }

    // Add term filter if needed
    if ($term != '0') {
        $query_aff_earn_l2 .= " AND `Term` = '$term'";
    }

    // Execute the query
    $query_aff_earn_l2_db = mysqli_query($link, $query_aff_earn_l2);
    $query_aff_earn_l2_db_row = mysqli_fetch_assoc($query_aff_earn_l2_db);
    $query_aff_earn_l2_db_cnt = mysqli_num_rows($query_aff_earn_l2_db);

    if ($query_aff_earn_l2_db_cnt > 0) {
        $aff_earn_l2 = number_format($query_aff_earn_l2_db_row['earning_amt_db'] ?? 0);
    } else {
        $aff_earn_l2 = 0;
    }

    echo '<input type="hidden" id="aff_earn_l2" value="₦'.$aff_earn_l2.'">';
    
    
    
    
    
    
    // For DB Debit
    $query_aff_earn_l0 = "SELECT SUM((affiliate_percentage / 100) * amount) AS earning_amt_db
                        FROM `affiliate_earning`
                        WHERE affiliate_id = '$user_id'
                          AND `transaction_type` = 'credit'
                          AND `earning_level` = '0'";

    // Add session filter if needed
    if ($session != '0') {
        $query_aff_earn_l0 .= " AND `Session` = '$session'";
    }

    // Add term filter if needed
    if ($term != '0') {
        $query_aff_earn_l0 .= " AND `Term` = '$term'";
    }

    // Execute the query
    $query_aff_earn_l0_db = mysqli_query($link, $query_aff_earn_l0);
    $query_aff_earn_l0_db_row = mysqli_fetch_assoc($query_aff_earn_l0_db);
    $query_aff_earn_l0_db_cnt = mysqli_num_rows($query_aff_earn_l0_db);

    if ($query_aff_earn_l0_db_cnt > 0) {
        $aff_earn_l0 = number_format($query_aff_earn_l0_db_row['earning_amt_db'] ?? 0);
    } else {
        $aff_earn_l0 = 0;
    }

    echo '<input type="hidden" id="aff_earn_l0" value="₦'.$aff_earn_l0.'">';


?>