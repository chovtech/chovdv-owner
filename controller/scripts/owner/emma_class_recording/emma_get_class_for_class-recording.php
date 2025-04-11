<?php


 include('../../../config/config.php');

 $emma_campus_for_class = $_POST["emma_send_campus_for_class"];

$emma_select_class = "SELECT * FROM `classordepartment` WHERE `CampusID` = '$emma_campus_for_class'";

$emma_select_class_query = mysqli_query($link, $emma_select_class);
$emma_select_class_fetch = mysqli_fetch_assoc($emma_select_class_query);
$emma_select_class_rows = mysqli_num_rows($emma_select_class_query);

echo '<option value="NULL">Select class</option>';

if($emma_select_class_rows > 0)
{   
    do{
    
        $emma_get_class_id = $emma_select_class_fetch['ClassOrDepartmentID'];
        $emma_get_class = $emma_select_class_fetch['ClassOrDepartmentName'];

        echo '<option value="'.$emma_get_class_id.'">'.$emma_get_class.'</option>';
        
    }while($emma_select_class_fetch = mysqli_fetch_assoc($emma_select_class_query));
}
else{

}

?>