<?php

    include("../../../config/config.php");

    $setvision = $_POST['setvision'];
    $emma_get_campus = $_POST['emma_get_campus'];
    $jsonString = $_POST['jsonString'];

    $setvision_statement = mysqli_real_escape_string($link, $setvision);
    
    $emmaarrayforid  = array();

    $jsonData = json_decode($jsonString, true);

    if ($jsonData !== null) {
        foreach ($jsonData as $goalData) {
            $title = $goalData['title'];
            $data_id = $goalData['data_id'];
            $amount = $goalData['amount'];
            $image = $goalData['image'];
            $totalyears = $goalData['totalyears'];

            $title_new = mysqli_real_escape_string($link, $title);

            // if($image == ''){
            //     $emmainsertvisionandgoals = "INSERT INTO `goalsetting`(`CampusID`, `Years`, `VisionStatement`, `GoalTitle`, `GoalAmount`, `DeleteStatus`)
            //     VALUES ('$emma_get_campus','$totalyears,'$setvision_statement','$title_new','$amount',0)";
            // }else{
            //     $emmainsertvisionandgoals = "INSERT INTO `goalsetting`(`CampusID`, `Years`, `BaseSixtyFour`, `VisionStatement`, `GoalTitle`, `GoalAmount`, `DeleteStatus`)
            //     VALUES ('$emma_get_campus','$totalyears','$image','$setvision_statement','$title_new','$amount',0)";
            // }

            $emmainsertvisionandgoals = "INSERT INTO `goalsetting`(`CampusID`, `Years`, `BaseSixtyFour`, `VisionStatement`, `GoalTitle`, `GoalAmount`, `DeleteStatus`)
            VALUES ('$emma_get_campus','$totalyears','$image','$setvision_statement','$title_new','$amount',0)";

            $emmainsertvisionandgoals_query = mysqli_query($link, $emmainsertvisionandgoals);
            
            $emmalastid = mysqli_insert_id($link);
            $emmaarrayforid[] = $emmalastid;

            $yearly_goals = $goalData['yearly_goals'];
        
            foreach ($yearly_goals as $yearlyGoal) {
                $year = $yearlyGoal['year'];
                $pyear_amt = $yearlyGoal['pyear_amt'];
                
                $todos = $yearlyGoal['todos'];

                $todoArray = implode(',', $todos);
                $emma_actions = mysqli_real_escape_string($link, $todoArray);

                $select_for_actions = "SELECT * FROM `goalactions` WHERE `Actions` = '$emma_actions' AND `Years` = '$year' AND `AmountPerYear` = '$pyear_amt' ";
                $select_for_actions_query = mysqli_query($link,$select_for_actions);
                $select_for_actions_fetch = mysqli_fetch_assoc($select_for_actions_query);
                $select_for_actions_rows = mysqli_num_rows($select_for_actions_query);

                if($select_for_actions_rows > 0){
                    echo 3;
                }else{
                    $insert_query = "INSERT INTO `goalactions`(`GoalID`,`Actions`, `Years`, `AmountPerYear`) VALUES ('$emmalastid','$emma_actions','$year','$pyear_amt')";
                    $insert_result = mysqli_query($link, $insert_query);
                }
            }
        }

        $emmaarrayforidString = implode(',', $emmaarrayforid);

        if($insert_result !== true){
            echo 2;
        }else{
            echo $emmaarrayforidString;

            $activity_log_inst_camp_id = $emma_get_campus;
            $activity_log_userid = $_POST['userid'];
            $activity_log_usertype = $_POST['usertype'];
            $activity_log_description = 'Created Goal';
            $activity_log_longitude = $_POST['longitude'];
            $activity_log_latitude = $_POST['latitude'];

            insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
        }
    
    } else {
        echo "Error decoding JSON string.";
    }

?>
