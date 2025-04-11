<?php

include("../../../config/config.php");

$emma_campus_id_for_budgeting = $_POST['emma_send_campus_for_category'];

$select_for_category = "SELECT * FROM `category` GROUP BY CategoryType";
$select_for_category_query = mysqli_query($link, $select_for_category);
$select_for_category_fetch = mysqli_fetch_assoc($select_for_category_query);
$select_for_category_rows = mysqli_num_rows($select_for_category_query);

if($select_for_category_rows > 0){
    echo '<option value="NULL">Select Category</option>';

    do{
        $emma_get_category_id = $select_for_category_fetch['CategoryID'];

        $emma_get_category_name = $select_for_category_fetch['CategoryType'];

        echo '<option value="'.$emma_get_category_name.'">'.$emma_get_category_name.'</option>';

    }while($select_for_category_fetch = mysqli_fetch_assoc($select_for_category_query));

}else{
    echo 2;
}


?>