<?php

    include('../../../config/config.php');

    $emma_campus_for_class = $_POST["campus"];

    $emma_select_class = "SELECT * FROM `classordepartment` WHERE `CampusID` = '$emma_campus_for_class'";
    $emma_select_class_query = mysqli_query($link, $emma_select_class);
    $emma_select_class_fetch = mysqli_fetch_assoc($emma_select_class_query);
    $emma_select_class_rows = mysqli_num_rows($emma_select_class_query);

    if($emma_select_class_rows > 0){

        do{
        
            $emma_get_class_id = $emma_select_class_fetch['ClassOrDepartmentID'];
            $emma_get_class = $emma_select_class_fetch['ClassOrDepartmentName'];

            echo'
            <li class="item item_one emmacheckitemsone" data-id="'.$emma_get_class_id.'">
                <span class="checkbox-one" id="'.$emma_get_class_id.'" data-id="'.$emma_get_class_id.'">
                    <i class="fa-solid fas fa-check check-icon"></i>
                </span>
                <span class="item_one-text">'.$emma_get_class.'</span>
            </li>';

        }while($emma_select_class_fetch = mysqli_fetch_assoc($emma_select_class_query));
    }
    else
    {
    echo 2;
    }

?>