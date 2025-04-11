<?php

    include("../../../config/config.php");

    $editgoalid = $_POST['editgoalid'];
    $editvisionstatement = $_POST['editvisionstatement'];
    $emma_get_campus_for_edit = $_POST['emma_get_campus_for_edit'];
    $jsonString = $_POST['jsonString'];

    $editvisionstatement_new = mysqli_real_escape_string($link, $editvisionstatement);

    $emmagoalsettingsid  = array();

    $jsonData = json_decode($jsonString, true);
        
    if ($jsonData !== null) {
        foreach ($jsonData as $goalData) {
            $title = $goalData['title'];
            $amount = $goalData['amount'];
            $image = $goalData['image'];
            $totalyears = $goalData['totalyears'];

            $title_new = mysqli_real_escape_string($link, $title);

            $delete_goals_and_visions = "DELETE FROM `goalsetting` WHERE `GoalID` = '$editgoalid' AND `DeleteStatus` = 0 ";
            $delete_goals_and_visions_query = mysqli_query($link, $delete_goals_and_visions);

            if($delete_goals_and_visions_query == true){
                $emmalastgoalsettingsid = mysqli_insert_id($link);
                $emmagoalsettingsid[] = $emmalastgoalsettingsid;

                $insert_for_edited_goal_settings = "INSERT INTO `goalsetting`(`GoalID`, `CampusID`, `Years`, `BaseSixtyFour`, `VisionStatement`, `GoalTitle`, `GoalAmount`, `DeleteStatus`)
                VALUES ('$emmalastgoalsettingsid','$emma_get_campus_for_edit','$totalyears','$image','editvisionstatement_new','$title_new','$amount',0)";
                
                $insert_for_edited_goal_settings_query = mysqli_query($link, $insert_for_edited_goal_settings);


                if($insert_for_edited_goal_settings_query == true){

                    $yearly_goals = $goalData['yearly_goals'];

                   
                    foreach ($yearly_goals as $yearlyGoal) {
                        $year = $yearlyGoal['year'];
                        $pyear_amt = $yearlyGoal['pyear_amt'];
                        $todos = $yearlyGoal['todos'];

                        $todo_actions = implode(',', $todos);
                        $todo_actions_new = mysqli_real_escape_string($link, $todo_actions);


                        $delete_actions = "DELETE FROM `goalactions` WHERE `GoalID` = '$editgoalid' ";
                        $delete_actions_query = mysqli_query($link, $delete_actions);

                        if($delete_actions_query == true){
                            // echo 'true delete for goal actions';

                            $insert_for_goal_actions = "INSERT INTO `goalactions`(`GoalID`, `Actions`, `Years`, `AmountPerYear`) 
                            VALUES ('$emmalastgoalsettingsid','$todo_actions_new','$year','$pyear_amt')";
                            $insert_for_goal_actions_query = mysqli_query($link, $insert_for_goal_actions);

                            if($insert_for_goal_actions_query == true){

                                $activity_log_inst_camp_id = $emma_get_campus_for_edit;
                                $activity_log_userid = $_POST['userid'];
                                $activity_log_usertype = $_POST['usertype'];
                                $activity_log_description = 'Edited Goal';
                                $activity_log_longitude = $_POST['longitude'];
                                $activity_log_latitude = $_POST['latitude'];
 
                                // insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
                            }else{
                                echo 'wrong final insert';
                            }
                        }else{
                            echo 'wrong delete for goal actions';
                        }
                    }
                }else{
                    echo 'wrong insert for goal settings';
                }
            
            }else{
                echo 'wrong delete for goal settings';
            }
        }
    }else{
        echo 2;
    }
?>
