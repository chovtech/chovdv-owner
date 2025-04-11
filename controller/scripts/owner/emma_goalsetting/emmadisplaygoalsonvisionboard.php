<?php

include("../../../config/config.php");

$dataid = explode(',', $_POST['setdataid']);
$campus = $_POST['campusdisplay'];
$visionDisplayed = false;

foreach ($dataid as $key => $dataidnew) {

    $select_to_display_goals = "SELECT * FROM `goalsetting` WHERE `CampusID` = '$campus' AND `GoalID` = '$dataidnew' AND `DeleteStatus` = 0 ";
    $query_to_display_goals = mysqli_query($link, $select_to_display_goals);

    if ($query_to_display_goals) {
        $fetch_to_display_goals = mysqli_fetch_assoc($query_to_display_goals);
        $rows_to_display_goals = mysqli_num_rows($query_to_display_goals);

        $get_vision_statement = $fetch_to_display_goals['VisionStatement'];
        $get_goal_title = $fetch_to_display_goals['GoalTitle'];
        $get_goal_amount = $fetch_to_display_goals['GoalAmount'];
        $get_duration = $fetch_to_display_goals['Years'];
        $get_image = $fetch_to_display_goals['BaseSixtyFour'];

        if (!$visionDisplayed) {
            echo '<div align="center">' . $get_vision_statement . '</div>';
            $visionDisplayed = true;
        }
        echo'
        <div class="visionboard mt-2 ms-4">
            <h4 class="text-dark fw-bold" style="font-family: Roboto, sans-serif;"> Goal Title: ' . $get_goal_title . '</h4>';
            if ($get_duration == 1) {
                echo '<h6 style="font-family: Roboto, sans-serif;"> Duration: ' . $get_duration . ' Year</h6>';
            } else {
                echo '<h6 style="font-family: Roboto, sans-serif;"> Duration: ' . $get_duration . ' Years</h6>';
            }

        echo '<h6  style="font-family: Roboto, sans-serif;"> Amount: <b>' . $get_goal_amount . '</b></h6>
        </div>';

        $select_from_actions_table = "SELECT * FROM `goalactions` WHERE `GoalID` = '$dataidnew' ";
        $query_from_actions_table = mysqli_query($link, $select_from_actions_table);

        if ($query_from_actions_table) {
            $row_from_actions_table = mysqli_num_rows($query_from_actions_table);
            if ($row_from_actions_table > 0) {
                echo '<div class="row p-4">';

                    while ($fetch_from_actions_table = mysqli_fetch_assoc($query_from_actions_table)) {

                        $get_actions = $fetch_from_actions_table['Actions'];
                        $get_peryear = $fetch_from_actions_table['Years'];
                        $get_amountperyear = $fetch_from_actions_table['AmountPerYear'];

                        $actions_array = explode(',', $get_actions);

                        echo '
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
                    }
                        if($get_image == ''){

                        }else{
                        echo

                        '<div align="center">
                            <div class="card p-2 mt-2" style="width: 18rem;">
                                <img src="'.$get_image.'" class="card-img-top" alt="Goal Image">
                            </div>
                        </div>';
                        }
                echo '</div>'; 
            } else {
                echo 'No actions found.';
            }
        } else {
            echo 'Error querying actions table.';
        }
    } else {
        echo 'Error querying goal setting table.';
    }
}

?>
