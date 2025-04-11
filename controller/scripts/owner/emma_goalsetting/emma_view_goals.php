<?php

include("../../../config/config.php");

$goalview_data_id = $_POST['goalview_data_id'];
$goalview_campus_id = $_POST['goalview_campus_id'];

$select_for_view_goal_settings = "SELECT * FROM `goalsetting` WHERE `GoalID` = '$goalview_data_id' AND `CampusID` = '$goalview_campus_id' AND `DeleteStatus` = 0 ";
$query_for_view_goal_settings = mysqli_query($link, $select_for_view_goal_settings);
$fetch_for_view_goal_settings = mysqli_fetch_assoc($query_for_view_goal_settings);
$rows_for_view_goal_settings = mysqli_num_rows($query_for_view_goal_settings);

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

        $select_from_actions_table = "SELECT * FROM `goalactions` WHERE `GoalID` = '$goalview_data_id' ";
        $query_from_actions_table = mysqli_query($link, $select_from_actions_table);
        $fetch_from_actions_table = mysqli_fetch_assoc($query_from_actions_table);
        $rows_from_actions_table = mysqli_num_rows($query_from_actions_table);


        if ($rows_from_actions_table > 0) {
           
            echo '<div class="row p-4">';

            do{
                
                $get_actions = $fetch_from_actions_table['Actions'];
                $get_peryear = $fetch_from_actions_table['Years'];
                $get_amountperyear = $fetch_from_actions_table['AmountPerYear'];

                $actions_array = explode(',', $get_actions);

                    echo'
                    <div class="col-sm-6">
                        <div class="card" style="border-radius:10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Year '.$get_peryear.'</h5>
                                <p class="text-dark">Amount per year: '.$get_amountperyear.'</p>
                                <p class="text-dark fw-bold">Actions: </p>
                                    <div align="start">
                                        <ul class="card-text">';
                                            foreach ($actions_array as $action) {
                                                echo'
                                                <li class="p-1">'.$action.'.</li>';
                                            }
                                    echo '</ul>
                                    </div>
                            </div>
                        </div>
                    </div>';
            }while($fetch_from_actions_table = mysqli_fetch_assoc($query_from_actions_table));

            if($get_goal_image_for_view == ''){

            }else{
                echo 
                '<div align="center">
                    <div class="card p-2 mt-2" style="width: 18rem;">
                        <img src="'.$get_goal_image_for_view.'" class="card-img-top" alt="Goal Image">
                    </div>
                </div>
            </div>';
            }
        } else {
            echo 'No actions found.';
        }
}else{

}


?>