<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $user_id  = $_POST['user_id'];
    $aff_level  = $_POST['aff_level'];
    $session  = $_POST['session'];
    $term  = $_POST['term'];

    $query = "SELECT * FROM `affiliate` WHERE ";

    if($aff_level == 0)
    {
        $query .= "(`affiliate_l1` = '$user_id' OR `affiliate_l2` = '$user_id')";
    }
    elseif($aff_level == 1)
    {
        $query .= "`affiliate_l1` = '$user_id'";
    }
    else
    {
        $query .= "`affiliate_l2` = '$user_id'";
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
    $query .= " ORDER BY `AffiliateFName` ASC";

    // Now run the query
    $sql_affiliate = mysqli_query($link, $query);
    $sql_affiliate_row = mysqli_fetch_assoc($sql_affiliate);
    $sql_affiliate_cnt = mysqli_num_rows($sql_affiliate);

    if($sql_affiliate_cnt > 0)
    {
        do{

            $affiliate_id = $sql_affiliate_row['AffiliateID'];
            $level_1 = $sql_affiliate_row['affiliate_l1'];
            $level_2 = $sql_affiliate_row['affiliate_l2'];

            if($level_1 == 1)
            {
                $aff_level = 'Level 1';

                $sql_affiliate_sub = mysqli_query($link, "SELECT * FROM `affiliate` WHERE `affiliate_l1` = '$affiliate_id'");
                $sql_affiliate_sub_cnt = mysqli_num_rows($sql_affiliate_sub);

                $sql_affiliate_earning_l1 = mysqli_query($link, "SELECT SUM(amount) as earning_amt FROM `affiliate_earning` WHERE `affiliate_id` = '$user_id' AND `sub_affiliate_id` = '$affiliate_id' AND `earning_level` = '1' AND `status` = 'credit'");
                $sql_affiliate_earning_l1_row = mysqli_fetch_assoc($sql_affiliate_earning_l1);
                $sql_affiliate_earning_l1_cnt = mysqli_num_rows($sql_affiliate_earning_l1);

                if($sql_affiliate_earning_l1_cnt > 0)
                {
                    $earning = $sql_affiliate_earning_l1_row['earning_amt'];
                }
                else{
                    $earning = 0;
                }

            }
            elseif($level_2 == 1)
            {
                $aff_level = 'Level 2';
                $sql_affiliate_sub_cnt = 0;


                $sql_affiliate_earning_l2 = mysqli_query($link, "SELECT SUM(amount) as earning_amt FROM `affiliate_earning` WHERE `affiliate_id` = '$user_id' AND `sub_affiliate_id` = '$affiliate_id' AND `earning_level` = '2' AND `status` = 'credit'");
                $sql_affiliate_earning_l2_row = mysqli_fetch_assoc($sql_affiliate_earning_l2);
                $sql_affiliate_earning_l2_cnt = mysqli_num_rows($sql_affiliate_earning_l2);

                if($sql_affiliate_earning_l2_cnt > 0)
                {
                    $earning = $sql_affiliate_earning_l2_row['earning_amt'];
                }
                else{
                    $earning = 0;
                }

            }

            echo '<div class="col-lg-3 col-md-4 col-sm-6 affiliate-card mt-3">
                  <div class="panel panel-default userlist shadow">
                      <div class="panel-body text-center">
                          <div class="userprofile">
                              <div class="userpic"> <img src="'.$sql_affiliate_row['Photo'].'" alt="" class="userpicimg"> </div>
                              <h3 class="username">'.$sql_affiliate_row['AffiliateFName'].' '.$sql_affiliate_row['AffiliateMName'].' '.$sql_affiliate_row['AffiliateLName'].'</h3>
                              <span>'.$aff_level.'</span>
                              <h6>Earned: ₦'.number_format($earning).'</h6>
                              <h6>Affiliates: '.$sql_affiliate_sub_cnt.'</h6>
                          </div>
                      </div>
                      <div class="p-3" style="font-weight:medium;">
                          <p>Email: <a href="mailto:'.$sql_affiliate_row['Email'].'">'.$sql_affiliate_row['Email'].'</a></p>
                          <p>Phone No.: <a href="tel:'.$sql_affiliate_row['Phone'].'">'.$sql_affiliate_row['Phone'].'</a></p>
                          <p>Date Added: '.$sql_affiliate_row['DateJoined'].'</p>
                      </div>
                  </div>
            </div>';

        }while($sql_affiliate_row = mysqli_fetch_assoc($sql_affiliate));
    }
    else
    {
        echo '<div align="center"> No Records Found</div>';
    }


    // For affiliate level 1
    $sql_affiliate_l1_query = "SELECT * FROM `affiliate` WHERE affiliate_l1 = '$user_id'";

    // Add session filter if needed
    if ($session != '0') {
        $sql_affiliate_l1_query .= " AND `Session` = '$session'";
    }

    // Add term filter if needed
    if ($term != '0') {
        $sql_affiliate_l1_query .= " AND `Term` = '$term'";
    }

    // Execute the query
    $sql_affiliate_l1_db = mysqli_query($link, $sql_affiliate_l1_query);
    $sql_affiliate_l1_db_row = mysqli_fetch_assoc($sql_affiliate_l1_db);
    $sql_affiliate_l1_db_cnt = mysqli_num_rows($sql_affiliate_l1_db);

    if ($sql_affiliate_l1_db_cnt > 0) {
        $affiliate_id_db = $sql_affiliate_l1_db_row['AffiliateID'];

        // For earning level 1, build the query
        $sql_affiliate_earning_l1_query = "SELECT SUM(amount) as earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND sub_affiliate_id = '$affiliate_id_db' AND earning_level = '1' AND `status` = 'credit'";

        // Add session filter if needed
        if ($session != '0') {
            $sql_affiliate_earning_l1_query .= " AND `Session` = '$session'";
        }

        // Add term filter if needed
        if ($term != '0') {
            $sql_affiliate_earning_l1_query .= " AND `Term` = '$term'";
        }

        // Execute the query
        $sql_affiliate_earning_l1_db = mysqli_query($link, $sql_affiliate_earning_l1_query);
        $sql_affiliate_earning_l1_db_row = mysqli_fetch_assoc($sql_affiliate_earning_l1_db);
        $sql_affiliate_earning_l1_db_cnt = mysqli_num_rows($sql_affiliate_earning_l1_db);

        if ($sql_affiliate_earning_l1_db_cnt > 0) {
            $earning_1_db = number_format($sql_affiliate_earning_l1_db_row['earning_amt_db'] ?? 0);
        } else {
            $earning_1_db = 0;
        }
    } else {
        $earning_1_db = 0;
    }

    echo '<input type="hidden" id="aff_db_earn" value="₦'.$earning_1_db.'">';
    echo '<input type="hidden" id="aff_db_amt" value="'.$sql_affiliate_l1_db_cnt.'">';

    // For affiliate level 2
    $sql_affiliate_l2_query = "SELECT * FROM `affiliate` WHERE affiliate_l2 = '$user_id'";

    // Add session filter if needed
    if ($session != '0') {
        $sql_affiliate_l2_query .= " AND `Session` = '$session'";
    }

    // Add term filter if needed
    if ($term != '0') {
        $sql_affiliate_l2_query .= " AND `Term` = '$term'";
    }

    // Execute the query
    $sql_affiliate_l2_db = mysqli_query($link, $sql_affiliate_l2_query);
    $sql_affiliate_l2_db_row = mysqli_fetch_assoc($sql_affiliate_l2_db);
    $sql_affiliate_l2_db_cnt = mysqli_num_rows($sql_affiliate_l2_db);

    if ($sql_affiliate_l2_db_cnt > 0) {
        $affiliate_id_2_db = $sql_affiliate_l2_db_row['AffiliateID'];

        // For earning level 2, build the query
        $sql_affiliate_earning_l2_query = "SELECT SUM(amount) as earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND sub_affiliate_id = '$affiliate_id_2_db' AND earning_level = '2' AND `status` = 'credit'";

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
    } else {
        $earning_2_db = 0;
    }

    echo '<input type="hidden" id="sub_db_earn" value="₦'.$earning_2_db.'">';
    echo '<input type="hidden" id="sub_db_amt" value="'.$sql_affiliate_l2_db_cnt.'">';

?>