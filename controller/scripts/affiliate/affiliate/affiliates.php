<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $user_id  = $_POST['user_id'];
    $aff_level  = $_POST['aff_level'];
    // $session  = $_POST['session'];
    // $term  = $_POST['term'];
    
    $session  = 0;
    $term  = 0;

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
    $query .= " ORDER BY `AffiliateID` DESC";

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

            if($level_1 == $user_id)
            {
                $aff_level = 'Level 1';

                $sql_affiliate_sub = mysqli_query($link, "SELECT * FROM `affiliate` WHERE `affiliate_l1` = '$affiliate_id'");
                $sql_affiliate_sub_cnt = mysqli_num_rows($sql_affiliate_sub);

                $sql_affiliate_earning_l1 = mysqli_query($link, "SELECT SUM(amount) as earning_amt FROM `affiliate_earning` WHERE `affiliate_id` = '$user_id' AND `sub_affiliate_id` = '$affiliate_id' AND `earning_level` = '1' AND `transaction_type` = 'credit'");
                $sql_affiliate_earning_l1_row = mysqli_fetch_assoc($sql_affiliate_earning_l1);
                $sql_affiliate_earning_l1_cnt = mysqli_num_rows($sql_affiliate_earning_l1);

                if($sql_affiliate_earning_l1_cnt > 0)
                {
                    $earning = $sql_affiliate_earning_l1_row['earning_amt'] ?? 0;
                }
                else{
                    $earning = 0;
                }

            }
            elseif($level_2 == $user_id)
            {
                $aff_level = 'Level 2';
                $sql_affiliate_sub_cnt = 0;


                $sql_affiliate_earning_l2 = mysqli_query($link, "SELECT SUM(amount) as earning_amt FROM `affiliate_earning` WHERE `affiliate_id` = '$user_id' AND `sub_affiliate_id` = '$affiliate_id' AND `earning_level` = '2' AND `transaction_type` = 'credit'");
                $sql_affiliate_earning_l2_row = mysqli_fetch_assoc($sql_affiliate_earning_l2);
                $sql_affiliate_earning_l2_cnt = mysqli_num_rows($sql_affiliate_earning_l2);

                if($sql_affiliate_earning_l2_cnt > 0)
                {
                    $earning = $sql_affiliate_earning_l2_row['earning_amt'] ?? 0;
                }
                else{
                    $earning = 0;
                }

            }
            else
            {
                $earning = 0;
            }
            
            if($aff_level == 'Level 1')
            {
                $aff_level_new = 'Direct Affiliate';
                $aff_level_color = 'chiActive';
            }
            else
            {
                $aff_level_new = $aff_level;
                $aff_level_color = 'chiInActive';
            }
            
            if($sql_affiliate_row['Photo'] == '' || $sql_affiliate_row['Photo'] == '0' || $sql_affiliate_row['Photo'] == NULL)
            {
                $aff_img = '../../assets/images/adminImg/default-img.png';
            }
            else
            {
                $aff_img = $sql_affiliate_row['Photo'];
            }

            echo '
            <div class="col-sm-3 col-md-6 col-lg-3 carditems affiliate-card">
                <div class="topSecCards" style="width: 100%; ">
                    <span style="float: right;margin-top:20px;" id="abba_stud_stat_span">
                        <div class="dropdown dropdown-sm">
                            <button type="button" class="btn '.$aff_level_color.'" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;"> 
                                '.$aff_level_new.'
                            </button>
                            
                        </div>
                    
                    </span>

                    <div align="center" style="margin-top: 30px;">
                        <label for="abba_insert_student_image" style="cursor:pointer;">
                            <img src="'.$aff_img.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                            <input type="file" style="display:none;" class="abba_update_student_image" accept="image/*">
                        </label>
                        
                        <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"> '.$sql_affiliate_row['AffiliateFName'].' '.$sql_affiliate_row['AffiliateLName'].'<span class="abba_tooltiptext student_full_name">'.$sql_affiliate_row['AffiliateFName'].' '.$sql_affiliate_row['AffiliateMName'].' '.$sql_affiliate_row['AffiliateLName'].'</span></h6>
                        
                    </div>
                    <div style="padding: 7px;">
                        <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                            <div class="row">
                                <div align="center" class="col-6">
                                    <div style=" padding-top: 10px;">
                                        <Small style="color: #8d8d8d; font-size: 11px;">Affiliates</Small><br>
                                        <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;">'.$sql_affiliate_sub_cnt.'</p>
                                    </div>
                                </div>
                                <div align="center" class="col-6">
                                    <div style=" padding-top: 10px;">
                                        <Small style="color: #8d8d8d; font-size: 11px;">Amount Generated </Small><br>
                                        <p class="abba_tooltip" style="color: #464545; font-size: 12px; font-weight: 600;">₦'.number_format($earning).'</p>
                                    </div>
                                </div>
                            </div>

                            <div style="padding: 5px; margin-left: 10px;">
                                <Small class="abba_tooltip" style="color: #666666; font-size: 12px;">
                                <i class="bx bx-envelope"></i> <a href="mailto:'.$sql_affiliate_row['Email'].'">'.$sql_affiliate_row['Email'].'</a><br>
                                <i class="bx bx-phone"></i> <a href="tel:'.$sql_affiliate_row['Phone'].'">'.$sql_affiliate_row['Phone'].'</a><br>
                                Date Added: '.$sql_affiliate_row['DateJoined'].'</Small>

                            </div>
                        </div>
                    </div>

                </div>
            </div>';

        }while($sql_affiliate_row = mysqli_fetch_assoc($sql_affiliate));
    }
    else
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
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
        $sql_affiliate_earning_l1_query = "SELECT SUM(amount) as earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND sub_affiliate_id = '$affiliate_id_db' AND earning_level = '1' AND `transaction_type` = 'credit'";

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
        $sql_affiliate_earning_l2_query = "SELECT SUM(amount) as earning_amt_db FROM `affiliate_earning` WHERE affiliate_id = '$user_id' AND sub_affiliate_id = '$affiliate_id_2_db' AND earning_level = '2' AND `transaction_type` = 'credit'";

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