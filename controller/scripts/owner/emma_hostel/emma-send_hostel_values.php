<?php


include("../../../config/config.php");

$collect_institution_id = $_POST["abba-change-institution"];
$collect_campus_id = $_POST["emma_display_hostel_details"];


$select_route_values = "SELECT * FROM `hosteltable` WHERE 
`InstitutionID` = '$collect_institution_id' 
AND (`CampusID` = $collect_campus_id  OR $collect_campus_id IS NULL) AND DeleteStatus='0'";
$emma_select_hostel_result = mysqli_query($link, $select_route_values);
$fetch_route_result = mysqli_fetch_assoc($emma_select_hostel_result);
$numbers_of_rows = mysqli_num_rows($emma_select_hostel_result);

if($numbers_of_rows > 0){
    echo '<div class="row">';

    $row = 1;

    do{
        $row++;
        $emma_get_auto_incremented_id = $fetch_route_result['HostelID'];
        $emma_get_hostel_name = $fetch_route_result['HostelName'];
        $emma_get_hostel_amount = $fetch_route_result['HostelAmount'];
        $CampusIDnew = $fetch_route_result['CampusID'];


        $firstLetter = mb_substr($emma_get_hostel_name, 0, 1, 'UTF-8');
        
        echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get">
                <div class="topSecCards" style="width: 100%; ">
                    
                    <div align="center" style="margin-top: 18px;padding-top:20px;">
                        <i class="fas fa-home" style="font-size:25px;"></i>
                        <h6 class="class_name emmaloadeditcontent-hostelname'.$emma_get_auto_incremented_id.'" style="font-weight: 600; margin-top: 5px;font-size:14px;" > '. $emma_get_hostel_name.'</h6>
                        <p style="font-weight: 500; color: #b8b8b8;">Route Amount: <span class="emmaloadeditconforedithostelamount'.$emma_get_auto_incremented_id.'">₦'.number_format($emma_get_hostel_amount).'</span></p>
                    </div>
                
                    <div style="padding: 7px;">
                        <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                            <div style="padding: 5px;" align="center">
                                &nbsp;&nbsp;&nbsp;
                                <span class="abba_tooltip">
                                    <button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-warning mb-2 tari_edit_setting emma_get_hostel_edit_values" data-id="'.$emma_get_auto_incremented_id.'" data-camp="'.$CampusIDnew.'" data-bs-toggle="modal" data-bs-target="#emma_hostel_edit_modal_pop_up" id="loadsectioneditcontenthere" style="font-size:11px;" data-id="'.$emma_get_auto_incremented_id.'" ">
                                        <i class="fas fa-edit emma_edit_btn" ></i>
                                    </button>
                                <span class="abba_tooltiptext">Edit Hostel</span>
                                </span>
                                &nbsp;&nbsp;
                                <span class="abba_tooltip">
                                    <button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-danger mb-2 emma_delete_settings" data-bs-toggle="modal" data-bs-target="#emma_hostel_delete_modal_pop_up" id="emmaloadhosteldeletecontentbtn" style="font-size:11px;" data-name="'.$emma_get_hostel_name.'" data-camp="'.$CampusIDnew.'" data-id="'.$emma_get_auto_incremented_id.'" ">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <span class="abba_tooltiptext">Trash Hostel</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>';
            
 
    }while($fetch_route_result = mysqli_fetch_assoc($emma_select_hostel_result));

    echo '</div>';

}else{
 
}
?>