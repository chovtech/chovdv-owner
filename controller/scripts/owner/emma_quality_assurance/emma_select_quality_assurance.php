<?php

    include('../../../config/config.php');

    $emma_institution_id = $_POST['get_institution_id'];

    $emma_select = "SELECT * FROM `campus` WHERE `InstitutionID` = $emma_institution_id ORDER BY `CampusName` ASC ";
    $emma_query = mysqli_query($link,$emma_select);
    $emma_fetch_query = mysqli_fetch_assoc($emma_query);
    $emma_row_count = mysqli_num_rows($emma_query);

    echo '<option value="NULL">Select Campus</option>';

        if($emma_row_count > 0){

        do{
            
            $emma_campus_id = $emma_fetch_query['CampusID'];

            $emma_campus_name = $emma_fetch_query['CampusName'];

            echo '<option value="'.$emma_campus_id.'">'.$emma_campus_name.'</option>';
            
        }while($emma_fetch_query = mysqli_fetch_assoc($emma_query));
    }
    else{
        echo '<option value="NULL">No Records Found</option>';
    }
    

?>
