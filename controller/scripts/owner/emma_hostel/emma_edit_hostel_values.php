<?php

    include("../../../config/config.php");

    $emma_get_hostel_data_id = $_POST['emma_edit_data_id'];
    $emma_get_hostel_campus_id = $_POST['emma_edit_campus_id'];
    $emma_get_hostel_institution_id = $_POST['emma_institution_id'];

    //get hostel for edit here

    $emma_get_foredit = "SELECT * FROM `hosteltable` 
    WHERE `InstitutionID`='$emma_get_hostel_institution_id' AND `CampusID`='$emma_get_hostel_campus_id' AND HostelID='$emma_get_hostel_data_id'";
    $select_hostel_result = mysqli_query($link, $emma_get_foredit);
    $fetch_hostel_result = mysqli_fetch_assoc($select_hostel_result);
    $numbers_of_rows = mysqli_num_rows($select_hostel_result);

    if($numbers_of_rows > 0)
    {
        $HostelName =  $fetch_hostel_result['HostelName'];
        $HostelAmount =  $fetch_hostel_result['HostelAmount'];

    }else{
        $HostelName =  '';
        $HostelAmount =  '';
    }
    
    echo '<input type="hidden" class="emmahostelname-foredit" value="'.$HostelName.'">
      <input type="hidden" class="emmahostelamount-foredit" value="'.$HostelAmount.'">
      <input type="hidden" class="emmaamount-forhostelid" value="'.$emma_get_hostel_data_id.'">
    ';
?>
