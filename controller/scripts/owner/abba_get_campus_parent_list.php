<?php
    include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_sql_parent = ("SELECT * FROM `parent` WHERE InstitutionID=$abba_instituion_id ORDER BY ParentLastName ASC");
    $abba_result_parent = mysqli_query($link, $abba_sql_parent);
    $abba_row_parent = mysqli_fetch_assoc($abba_result_parent);
    $abba_row_cnt_parent = mysqli_num_rows($abba_result_parent);
    
    echo '<option value="0">Select Parent</option>';

    if($abba_row_cnt_parent > 0)
    {
        do{

            echo '<option value="'.$abba_row_parent['ParentID'].'">'.$abba_row_parent['ParentLastName'].' '.$abba_row_parent['ParentMiddleName'].' '.$abba_row_parent['ParentFirstName'].'</option>';
    
        }while($abba_row_parent = mysqli_fetch_assoc($abba_result_parent));
    }
    else
    {
        echo '<option value="NULL">No Records Found</option>';
    }
?>