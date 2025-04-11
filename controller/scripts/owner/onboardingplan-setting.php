<?php
    include('../../config/config.php');

    $planid = $_POST['planid'];
    $tagid = $_POST['tagid'];
    $userID = $_POST['UserID'];


    $updateuser_tag = mysqli_query($link, "UPDATE `agencyorschoolowner` SET `TagState`='$tagid' WHERE  `AgencyOrSchoolOwnerID`='$userID'");

    $selectplan_amount = mysqli_query($link, "SELECT * FROM `edumesplan` WHERE PlanID='$planid'");
    $selectplan_amount_rows = mysqli_num_rows($selectplan_amount);
    $selectplan_amount_rows_cnt = mysqli_fetch_assoc($selectplan_amount);


    if ($selectplan_amount_rows > 0) {

        $planamount = $selectplan_amount_rows_cnt['Amount'];
        $updatelang = mysqli_query($link, "UPDATE `institution` SET `ActualPlan`='$planid',`PlanAmount`='$planamount' WHERE `AgencyOrSchoolOwnerID`='$userID'");
    } else {

    }
?>