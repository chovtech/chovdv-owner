<?php

    include("../../../config/config.php");

    $review_data_id = $_POST['review_data_id'];
    $review_campus_id = $_POST['review_campus_id'];

    $select_for_view_goal_settings = "SELECT * FROM `goalsetting` WHERE `GoalID` = '$review_data_id' AND `CampusID` = '$review_campus_id' AND `DeleteStatus` = 0 ";
    $query_for_view_goal_settings = mysqli_query($link, $select_for_view_goal_settings);
    $fetch_for_view_goal_settings = mysqli_fetch_assoc($query_for_view_goal_settings);
    $rows_for_view_goal_settings = mysqli_num_rows($query_for_view_goal_settings);

    $cnt = 0;
    echo '<input type="hidden" class="emma_goal_id_for_messaging" value="'.$review_data_id.'">';

    if($rows_for_view_goal_settings > 0){

        $get_total_years_for_view = $fetch_for_view_goal_settings['Years'];
        $get_title_for_view = $fetch_for_view_goal_settings['GoalTitle'];
        $get_total_amount_for_view = $fetch_for_view_goal_settings['GoalAmount'];
        $get_goal_image_for_view = $fetch_for_view_goal_settings['BaseSixtyFour'];
        $get_vision_statement_for_view = $fetch_for_view_goal_settings['VisionStatement'];

        echo '<div align="center">'.$get_vision_statement_for_view.'</div>
            <div class="visionboard mt-2 ms-4">
                <h4 class="text-dark fw-bold" style="font-family: Roboto, sans-serif;"> Goal Title: '.$get_title_for_view.'</h4>';
                if($get_total_years_for_view == 1){
                    echo '<h6 style="font-family: Roboto, sans-serif;"> Duration: '.$get_total_years_for_view.' Year</h6>';
                }else{
                    echo '<h6 style="font-family: Roboto, sans-serif;"> Duration: '.$get_total_years_for_view.' Years</h6>';
                }
                echo '<h6  style="font-family: Roboto, sans-serif;"> Amount: <b>'.$get_total_amount_for_view.'</b></h6>
            </div>';

            $select_from_actions_table = "SELECT * FROM `goalactions` WHERE `GoalID` = '$review_data_id' ";
            $query_from_actions_table = mysqli_query($link, $select_from_actions_table);
            $fetch_from_actions_table = mysqli_fetch_assoc($query_from_actions_table);
            $rows_from_actions_table = mysqli_num_rows($query_from_actions_table);

            if ($rows_from_actions_table > 0) {
            
                echo '<div class="row p-4">';

                do{
                    
                    $cnt_new = $cnt++;

                    $get_actions = $fetch_from_actions_table['Actions'];
                    $get_peryear = $fetch_from_actions_table['Years'];
                    $get_amountperyear = $fetch_from_actions_table['AmountPerYear'];
                    $get_goal_id = $fetch_from_actions_table['ActionID'];

                    $select_review = "SELECT * FROM `goalreview` WHERE `ActionID` = '$get_goal_id' ";
                    $query_review = mysqli_query($link, $select_review);
                    $fetch_review = mysqli_fetch_assoc($query_review);
                    $rows_review = mysqli_num_rows($query_review);

                    $checkinitiallcactions = 0;
                    $checkcurrentacctions = 0;


                    $actions_array = explode(',', $get_actions);

                        echo'
                        <input class="emmainputfortogglecontentreview'.$get_goal_id.' " type="hidden" value="0">
                        <div class="col-sm-6 p-2 emma_review_card" data-id="'.$get_goal_id.'">
                            <div class="card" data-id="'.$get_goal_id.'" style="border-radius:10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Year '.$get_peryear.'</h5>
                                    <p class="text-dark">Amount per year: '.$get_amountperyear.'</p>
                                    <p class="text-dark fw-bold">Actions: </p>
                                    <div align="start" class="justify-content-center">
                                        <ul class="card-text">

                                            <div class="checkbox-wrapper-40 select_all p-2">
                                                <label>
                                                    <input type="checkbox" class="selectallcheckbox checkallactions'.$get_goal_id.'" id="checkall_actions" data-id="'.$get_goal_id.'">
                                                    <span class="checkbox">Select All</span>
                                                </label>
                                            </div>
                                            <div class="row">';
                                                    if($rows_review > 0){

                                                        $get_statusnew = explode(',', $fetch_review ['Actions']);

                                                        foreach ($actions_array as $action) {

                                                            $emmacheckedinputs = '';

                                                            foreach ($get_statusnew as $newkey => $newactionreview) {
                                                                if($newactionreview ==  $action)
                                                                {
                                                                    $emmacheckedinputs.='checked';
                                                                }
                                                            }
                                                            
                                                            echo'
                                                            <div class="col-6">
                                                                <div class="checkbox-wrapper-40 check_actions p-2">
                                                                    <label>
                                                                        <input type="checkbox" '. $emmacheckedinputs.' value="'.$action.'" class="check_eachaction'.$get_goal_id.' emmacheckboxforeachaction" id="selectforeachaction checkeachaction'.$get_goal_id.'" data-id="'.$get_goal_id.'">
                                                                        <span class="checkbox">'.$action.'</span>
                                                                    </label>
                                                                </div>
                                                            </div>';
                                                        }

                                                    }else{

                                                        foreach ($actions_array as $action) {
                                                            echo'
                                                            <div class="col-6">
                                                                <div class="checkbox-wrapper-40 check_actions p-2">
                                                                    <label>
                                                                        <input type="checkbox" value="'.$action.'" class="check_eachaction'.$get_goal_id.' emmacheckboxforeachaction" id="selectforeachaction checkeachaction'.$get_goal_id.'" data-id="'.$get_goal_id.'">
                                                                        <span class="checkbox">'.$action.'</span>
                                                                    </label>
                                                                </div>
                                                            </div>';
                                                        }
                                                    }
                                        echo'</div>
                                        </ul>
                                    </div>
                                    <div align="end">
                                        <div class="text-primary add_new_review_collapible" data-id="'.$get_goal_id.'" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#collapsereviews" ><i class="fas fa-plus-circle fs-7 text-primary"> Add review</i></div>
                                    </div>

                                    <div>
                                        <div class="card card-body emmmtoggleclassreview'.$get_goal_id.'" style="display:none;">
                                            <div class="col-12 mb-2 ps-2 pe-2 mt-3">
                                                <div class="abba_local-forms">
                                                    <label>Reviews<span style="color:orangered;">*</span></label>
                                                    <input type="text" class="form-control  emma_get_all_reviews emma_goal_reviews_input'.$get_goal_id.'" id="" placeholder="Reviews">
                                                    <div class="emmaloadreviewscontent'.$get_goal_id.'"></div>
                                                </div>
                                            </div>
                                            <div align="end">
                                                <small class="emma_add_new_reviews" data-id="'.$get_goal_id.'" style="color:#007ffb; cursor:pointer;">Add More <i class="fas fa-plus-circle"></i></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }while($fetch_from_actions_table = mysqli_fetch_assoc($query_from_actions_table));

                if($get_goal_image_for_view == ''){

                }else {
                    echo 
                    '<div align="center">
                        <div class="card p-2 mt-2" style="width: 18rem;">
                            <img src="'.$get_goal_image_for_view.'" class="card-img-top" alt="Goal Image">
                        </div>
                    </div>';
                }
                echo '</div>';
            } else {
                echo 'No actions found.';
            }
    }else{

    }

?>