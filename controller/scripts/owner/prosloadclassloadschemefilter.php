<?php


    include('../../config/config.php');

    $campus_ID = $_POST['campus_ID'];


    $select_class = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `CampusID`='$campus_ID' ORDER BY ClassOrDepartmentName ASC");
    $select_class_cnt = mysqli_num_rows($select_class);
    $select_class_cnt_row = mysqli_fetch_assoc($select_class);

    if($select_class_cnt > 0)
    {


        echo '<option value="NULL">Select class</option>';

           do{

                     $ClassOrDepartmentName = $select_class_cnt_row['ClassOrDepartmentName'];
                     $ClassOrDepartmentID = $select_class_cnt_row['ClassOrDepartmentID'];


                  echo '<option value="'.$ClassOrDepartmentID.'">'.$ClassOrDepartmentName.'</option>';


           }while($select_class_cnt_row = mysqli_fetch_assoc($select_class));
                


    }else
    {
        echo '<option value="NULL">No class found</option>';
    }










?>