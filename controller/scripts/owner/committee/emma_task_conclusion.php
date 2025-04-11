<?php

include('../../../config/config.php');

$commitee_id = $_POST['commitee_id'];
$usertype = $_POST['usertype'];
$userid = $_POST['userid'];

$select_for_viewing = "SELECT * FROM `member` INNER JOIN `boardmember` ON `member`.`CommitteeID` = `boardmember`.`CommitteeID`
 WHERE `member`.`CommitteeID` = '$commitee_id' AND `member`.`Usertype` = '$usertype' AND `member`.`UserID` = '$userid' ";
$query_for_viewing = mysqli_query($link, $select_for_viewing);
$fetch_for_viewing = mysqli_fetch_assoc($query_for_viewing);
$rows_for_viewing = mysqli_num_rows($query_for_viewing);

    if($rows_for_viewing > 0){
        
        $get_position_id = $fetch_for_viewing['PositionID'];

        if($get_position_id == 40){
            
        }

    }else{

        echo 2;

    }


?>