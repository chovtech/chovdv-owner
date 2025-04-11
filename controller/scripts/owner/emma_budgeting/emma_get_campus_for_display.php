

<?php

include("../../../config/config.php");

$emma_get_institution = $_POST['institutionID'];

$select_for_campus = "SELECT * FROM `campus` WHERE `InstitutionID` = '$emma_get_institution' ORDER BY CampusName ASC";
$select_for_campus_query = mysqli_query($link, $select_for_campus);
$select_for_campus_fetch = mysqli_fetch_assoc($select_for_campus_query);
$select_for_campus_rows = mysqli_num_rows($select_for_campus_query);

if($select_for_campus_rows > 0){
    echo '<option value="NULL">Select Campus</option>';

    do{
    
        $emma_get_campus_id = $select_for_campus_fetch['CampusID'];
        $emma_get_campus = $select_for_campus_fetch['CampusName'];;

        echo '<option value="'.$emma_get_campus_id.'">'.$emma_get_campus.'</option>';

    }while($select_for_campus_fetch = mysqli_fetch_assoc($select_for_campus_query));
}else{
    echo 2;
}

?>
