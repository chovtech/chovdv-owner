<?php


include("../../../config/config.php");

$collect_institution_id = $_POST["abba-change-institution"];
$collect_campus_id = $_POST["emma_display_route_details"];


$select_route_values = "SELECT * FROM `transportationtable` WHERE 
`InstitutionID` = '$collect_institution_id' 
AND (`CampusID` = $collect_campus_id  OR $collect_campus_id IS NULL) AND DeleteStatus='0'";
$select_route_result = mysqli_query($link, $select_route_values);
$fetch_route_result = mysqli_fetch_assoc($select_route_result);
$numbers_of_rows = mysqli_num_rows($select_route_result);


if($numbers_of_rows > 0){
    echo '<div class="row">';

    $row = 1;

    do{
        $row++;
        $emma_get_auto_incremented_id = $fetch_route_result['RouteID'];
        $emma_get_route_name = $fetch_route_result['RouteName'];
        $emma_get_route_amount = $fetch_route_result['RouteAmount'];
        $CampusIDnew = $fetch_route_result['CampusID'];



             $select_campusname_values = "SELECT * FROM `campus` WHERE CampusID='$CampusIDnew '";
            $select_campusname_result = mysqli_query($link, $select_campusname_values);
            $fetch_campusname_result = mysqli_fetch_assoc($select_campusname_result);
            $numbers_campusname_rows = mysqli_num_rows($select_campusname_result);
            
            $CampusName =  $fetch_campusname_result['CampusName'];


             $campusnamenew = substr($CampusName, 0, 31);
             
        

        $firstLetter = mb_substr($emma_get_route_name, 0, 1, 'UTF-8');
        
        echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get">
        <div class="topSecCards" style="width: 100%; ">
            
            <div align="center" style="margin-top: 18px;padding-top:20px;">
                <i class="fas fa-bus" style="font-size:25px;"></i>
                <h6 class="class_name emmaloadeditcontent-routename'.$emma_get_auto_incremented_id.'" style="font-weight: 600; margin-top: 5px;font-size:14px;" > '. $emma_get_route_name.'</h6>
                <p style="font-weight: 500; color: #b8b8b8;">Route Amount: <span class="emmaloadeditconforeditamount'.$emma_get_auto_incremented_id.'">₦'.number_format($emma_get_route_amount).'</span></p>
                
                 <span class="text-muted text-sm">'.$campusnamenew.'</span>
            </div>
           
            <div style="padding: 7px;">
                <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                    
                    <div style="padding: 5px;" align="center">
                        &nbsp;&nbsp;&nbsp;
                        <span class="abba_tooltip">
                        <button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-danger mb-2 emma_delete_settings" data-bs-toggle="modal" data-bs-target="#emma_transport_delete_modal_pop_up" id="emmaloaddeletecontentbtn" style="font-size:11px;" data-name="'.$emma_get_route_name.'" data-camp="'.$CampusIDnew.'" data-id="'.$emma_get_auto_incremented_id.'" ">
                        <i class="fas fa-trash"></i>
                        </button>
                            <span class="abba_tooltiptext">Trash Route</span>
                        </span>
                        &nbsp;&nbsp;
                        <span class="abba_tooltip">
                        <button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-warning mb-2 tari_edit_setting emmaloadrouteeditcontent"  data-routename="'.$emma_get_route_name.'"  data-routeamount="'.$emma_get_route_amount.'"  data-id="'.$emma_get_auto_incremented_id.'" data-campusid="'.$CampusIDnew.'" data-bs-toggle="modal" data-bs-target="#emma_transport_edit_modal_pop_up" id="loadsectioneditcontenthere" style="font-size:11px;" data-id="'.$emma_get_auto_incremented_id.'" ">
                        <i class="fas fa-edit emma_edit_btn" ></i>
                        </button>
                            <span class="abba_tooltiptext">View Fees</span>
                        </span>
                    </div>
                </div>
            </div>
            </div>

        </div>';
      
 
    }while($fetch_route_result = mysqli_fetch_assoc($select_route_result));

    echo '</div>';

}else{
    
    
    
    echo '<div align="center" >';
        

                $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                if ($pros_select_record_not_found_count > 0) {
                

                    $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                    echo '<img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                    <p>No record found.</p>';
                }


    echo '</div>';
 
}
?>