<?php

    include('../../../config/config.php');

    $emma_campus_for_class = $_POST["campus"];
    $emma_classes_edit= $_POST["classesArray"];

    $emma_select_class_edit = "SELECT * FROM `classordepartment` WHERE `CampusID` = '$emma_campus_for_class'";
    $emma_select_class_query_edit = mysqli_query($link, $emma_select_class_edit);
    $emma_select_class_fetch_edit = mysqli_fetch_assoc($emma_select_class_query_edit);
    $emma_select_class_rows_edit = mysqli_num_rows($emma_select_class_query_edit);

    if($emma_select_class_rows_edit > 0){   
        do{
            $emma_get_class_id = $emma_select_class_fetch_edit['ClassOrDepartmentID'];
            $emma_get_class = $emma_select_class_fetch_edit['ClassOrDepartmentName'];

            $checked = '';

            foreach ($emma_classes_edit as $emma_classes) {
                if ($emma_classes == $emma_get_class_id) {

                    $checked.= 'checked';
                }
            }     

            echo'
            <li class="item item_one_edit emmacheckitemsone_edit '. $checked.'" data-id="'.$emma_get_class_id.'">
                <span class="checkbox-one" id="'.$emma_get_class_id.'" data-id="'.$emma_get_class_id.'">
                    <i class="fa-solid fas fa-check check-icon"></i>
                </span>
                <span class="item_one-text">'.$emma_get_class.'</span>
            </li>';

        }while($emma_select_class_fetch_edit = mysqli_fetch_assoc($emma_select_class_query_edit));
    }
    else
    {
    echo 2;
    }

?>