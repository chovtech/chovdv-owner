<?php

include('../../../config/config.php');

$get_user_id = explode(',',$_POST['get_user_id']);
$get_user_type = $_POST['get_user_type'];
$get_commitee_id = $_POST['get_commitee_id'];

echo '<div class="card">
<div class="card-body">';
foreach ($get_user_id as $key => $get_user_id_new){

    if($get_user_type == 'admin'){

        $get_selected_staff = "SELECT * FROM `staff` WHERE `StaffID` = '$get_user_id_new' ";
        $get_staff_query = mysqli_query($link, $get_selected_staff);
        $get_staff_fetch = mysqli_fetch_assoc($get_staff_query);
        $get_staff_rows = mysqli_num_rows($get_staff_query);
       
        if($get_staff_rows > 0){

            $get_staff_first_name = $get_staff_fetch['StaffFirstName'];
            $get_staff_last_name = $get_staff_fetch['StaffLastName'];

            echo'
                <li class="p-1">
                '.$get_staff_first_name.' '.$get_staff_last_name.'
                </li>
                    ';
        }else{
            echo 2;
        }
                

    }elseif ($get_user_type == 'teacher'){

        $get_selected_staff = "SELECT * FROM `staff` WHERE `StaffID` = '$get_user_id_new' ";
        $get_staff_query = mysqli_query($link, $get_selected_staff);
        $get_staff_fetch = mysqli_fetch_assoc($get_staff_query);
        $get_staff_rows = mysqli_num_rows($get_staff_query);
       
        if($get_staff_rows > 0){

            $get_staff_first_name = $get_staff_fetch['StaffFirstName'];
            $get_staff_last_name = $get_staff_fetch['StaffLastName'];

            echo'
                <li class="p-1">
                '.$get_staff_first_name.' '.$get_staff_last_name.'
                </li>
                    ';
        }else{
            echo 2;
        }

    }elseif ($get_user_type == 'schoolhead') {

        $get_selected_staff = "SELECT * FROM `staff` WHERE `StaffID` = '$get_user_id_new' ";
        $get_staff_query = mysqli_query($link, $get_selected_staff);
        $get_staff_fetch = mysqli_fetch_assoc($get_staff_query);
        $get_staff_rows = mysqli_num_rows($get_staff_query);
       
        if($get_staff_rows > 0){

            $get_staff_first_name = $get_staff_fetch['StaffFirstName'];
            $get_staff_last_name = $get_staff_fetch['StaffLastName'];

            echo'
                <li class="p-1">
                '.$get_staff_first_name.' '.$get_staff_last_name.'
                </li>
                    ';
        }else{
            echo 2;
        }
    }else{

    }
}
echo '</div>
        </div>';

?>