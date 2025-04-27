<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $user_id  = $_POST['user_id'];
    $aff_level  = $_POST['aff_level'];
    $session  = $_POST['session'];
    $term  = $_POST['term'];


    $query = "SELECT * FROM `affiliate_earning` WHERE affiliate_id = '$user_id'";

    if($aff_level == 1)
    {
        $query .= "`earning_level` = '$aff_level'";
    }
    elseif($aff_level == 2)
    {
        $query .= "`earning_level` = '$aff_level'";
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

    // Order by name
    $query .= " ORDER BY `date` ASC";

    // Now run the query
    $sql_affiliate = mysqli_query($link, $query);
    $sql_affiliate_row = mysqli_fetch_assoc($sql_affiliate);
    $sql_affiliate_cnt = mysqli_num_rows($sql_affiliate);

    if($sql_affiliate_cnt > 0)
    {
        $cnt = 1;
        do{

            $id = $sql_affiliate_row['id'];
            $sub_affiliate_id = $sql_affiliate_row['sub_affiliate_id'];
            $amount = $sql_affiliate_row['amount'];
            $earning_level = $sql_affiliate_row['earning_level'];
            $Session_new = $sql_affiliate_row['Session'];
            $Term_new = $sql_affiliate_row['Term'];
            $status = $sql_affiliate_row['status'];
            $ref_number = $sql_affiliate_row['ref_number'];
            $date = $sql_affiliate_row['date'];

            echo '<div class="col-lg-6 col-md-6 col-sm-6 affiliate-card mt-3">

                <div class="card p-1">
                    <div class="row">

                        <div class="col-lg-1">
                            <small>SN</small><br>
                            <span style="font-weight:600;">'.$cnt++.'.</span>
                        </div>

                        <div class="col-lg-5">
                            <small>Ref. Number</small><br>
                            <span style="font-weight:600;">'.$ref_number.'</span>
                        </div>

                        <div class="col-lg-3">
                            <small>Type</small><br>
                            <span style="color:green;font-weight:600;">'.strtoupper($status).'</span>
                        </div>

                        <div class="col-lg-3">
                            <small>Amount</small><br>
                            <span style="font-weight:600;">₦'.number_format($amount).'</span>
                        </div>
                    </div>
                    <p>
                        <span style="color:#007ffb;cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#collapseExample'.$id.'" aria-expanded="false" aria-controls="collapseExample'.$id.'">
                            View Details
                        </span>
                    </p>
                    <div class="collapse card card-body" id="collapseExample'.$id.'">
                         <div class="row">';

                             if($sub_affiliate_id == '0')
                             {
                                echo '<div class="col-lg-4">
                                      <span style="font-weight:600;">Direct Earning</span>
                                  </div>';
                             }
                             else{

                                 $abba_sql_affiliate_dis = ("SELECT * FROM `affiliate` WHERE `AffiliateID` = $sub_affiliate_id");
                                 $abba_result_affiliate_dis = mysqli_query($link, $abba_sql_affiliate_dis);
                                 $abba_row_affiliate_dis = mysqli_fetch_assoc($abba_result_affiliate_dis);
                                 $abba_row_cnt_affiliate_dis = mysqli_num_rows($abba_result_affiliate_dis);

                                 if ($abba_row_cnt_affiliate_dis > 0)
                                 {

                                    echo '<div class="col-lg-4">
                                          <small>Affiliate</small><br>
                                          <span style="font-weight:600;">'.$abba_row_affiliate_dis['AffiliateFName'].' '.$abba_row_affiliate_dis['AffiliateMName'].' '.$abba_row_affiliate_dis['AffiliateLName'].'</span>
                                      </div>

                                      <div class="col-lg-4">
                                          <small>Affiliate Lvl</small><br>
                                          <span style="font-weight:600;">Lvl '.$earning_level.'.</span>
                                      </div>';
                                 }
                                 else{

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



                            echo '<div class="col-lg-4">
                                <small>Session</small><br>
                                <span style="font-weight:600;">'.$Session_new.'</span>
                            </div>

                            <div class="col-lg-4">
                                <small>Term</small><br>
                                <span style="font-weight:600;">'.$Term_name.'</span>
                            </div>

                            <div class="col-lg-4">
                                <small>Date</small><br>
                                <span style="font-weight:600;">'.$date.'</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>';

        }while($sql_affiliate_row = mysqli_fetch_assoc($sql_affiliate));
    }
    else
    {
        echo '<div align="center"> No Records Found</div>';
    }

    // For DB Credit
    $sql_affiliate_earning_l1_query = "SELECT SUM(amount) as earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND `status` = 'credit'";

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
    $sql_affiliate_earning_l2_query = "SELECT SUM(amount) as earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND `status` = 'debit'";

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

?>