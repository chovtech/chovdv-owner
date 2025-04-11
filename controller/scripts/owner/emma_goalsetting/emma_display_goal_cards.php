<?php

include("../../../config/config.php");

$campus = $_POST['emma_get_campus_id'];
$lastid = explode(',',$_POST['emmalastid']);

echo '<div class="row ">';

foreach ($lastid as $key => $lastidnew) {

    $display_cards = "SELECT * FROM `goalsetting` WHERE `CampusID` = '$campus' AND `GoalID` = '$lastidnew' ";
    $display_cards_query = mysqli_query($link, $display_cards);
    $display_cards_fetch = mysqli_fetch_assoc($display_cards_query);
    $display_cards_rows = mysqli_num_rows($display_cards_query);

    if($display_cards_rows > 0){
        do{

            $get_title = $display_cards_fetch['GoalTitle'];
            $get_amount = $display_cards_fetch['GoalAmount'];
            $get_goal_id = $display_cards_fetch['GoalID'];
            $get_goal_statement = $display_cards_fetch['VisionStatement'];
            $get_goal_image = $display_cards_fetch['BaseSixtyFour'];
            $get_goal_years = $display_cards_fetch['Years'];
            $get_goal_campus = $display_cards_fetch['CampusID'];


            echo '
            <div class="col-lg-4 col-sm-12">
            <div class=" topSecCards bg-white carditems card_search_get" style="border-radius:5px;">
                <div align="center" style="margin-top: 18px;padding-top:20px;">
                    <i class="fas fa-bullseye text-primary" style="font-size:25px;"></i>
                    <h6 class="" style="font-weight: 600; margin-top: 5px;font-size:14px;" >'.$get_title.'</h6>
                    <p style="font-weight: 500; color: #b8b8b8;">Goal Amount: <span class="">'.$get_amount.'</span></p>
                </div>

                <div style="padding: 7px;">
                    <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                        <div style="padding: 5px;" align="center">
                            <div class="row">
                                <div class="col-3">
                                    <span class="abba_tooltip">
                                        <button type="button" class="btn btn-sm btn-warning text-white float-end m-2 rounded-3 emma_edit_goals  mb-2" style="font-size:11px;" data-id="'.$get_goal_id.'" data-title="'.$get_title.'" data-amount="'.$get_amount.'" data-statement="'.$get_goal_statement.'" data-image="'.$get_goal_image.'" data-years="'.$get_goal_years.'" data-bs-toggle="modal" data-bs-target="#editgoal">
                                            <i class="fas fa-edit " ></i>
                                        </button>
                                    <span class="abba_tooltiptext">Edit Goal</span>
                                </div>

                                <div class="col-3">
                                    <span class="abba_tooltip">
                                        <button type="button" class="btn btn-sm btn-danger text-white float-end m-2 rounded-3 mb-2 emma_delete_goals" style="font-size:11px;" data-id="'.$get_goal_id.'" data-campus="'.$get_goal_campus.'" data-bs-toggle="modal" data-bs-target="#deletegoal">
                                            <i class="fas fa-trash" ></i>
                                        </button>
                                    <span class="abba_tooltiptext">Delete Goal</span>
                                </div>

                                <div class="col-3">
                                    <span class="abba_tooltip">
                                        <button type="button" class="btn btn-sm text-white emma_goal_view_icon float-end m-2 rounded-3 mb-2" style="font-size:11px; background-color:#007ffb;" data-id="'.$get_goal_id.'" data-title="'.$get_title.'" data-amount="'.$get_amount.'" data-statement="'.$get_goal_statement.'" data-image="'.$get_goal_image.'" data-years="'.$get_goal_years.'" data-bs-toggle="modal" data-bs-target="#emmaviewgoal">
                                            <i class="fas fa-eye" ></i>
                                        </button>
                                    <span class="abba_tooltiptext">View Goal</span>
                                </div>

                                <div class="col-3">
                                    <span class="abba_tooltip">
                                        <button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-success mb-2 emma_goal_review_icon" style="font-size:11px;" data-id="'.$get_goal_id.'" data-bs-toggle="modal" data-bs-target="#emmareviewgoal">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    <span class="abba_tooltiptext">Review Goal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        }while($display_cards_fetch = mysqli_fetch_assoc($display_cards_query));

    }else{
    
    }
}
echo '</div>';

?>