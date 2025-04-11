<?php

include('../../../config/config.php');

$emma_get_institution = $_POST['emma_send_institution'];

$emma_select_for_policy_card = "SELECT * FROM `policy` WHERE `InstitutionIDOrCampusID` = '$emma_get_institution' AND `DeleteStatus` = 0 ";
$emma_query_for_policy_card = mysqli_query($link, $emma_select_for_policy_card);
$emma_fetch_for_policy_card = mysqli_fetch_assoc($emma_query_for_policy_card);
$emma_rows_for_policy_card = mysqli_num_rows($emma_query_for_policy_card);

if($emma_rows_for_policy_card > 0){
    echo'<div class="row">';

    do{
        $emma_get_title_for_policy = $emma_fetch_for_policy_card['Title'];
        $emma_get_description_for_policy = $emma_fetch_for_policy_card['Description'];
        $emma_get_section_for_policy = $emma_fetch_for_policy_card['Section'];
        $emma_get_stakeholder_for_policy = $emma_fetch_for_policy_card['StakeHolder'];
        $emma_get_publish_status_for_policy = $emma_fetch_for_policy_card['PublishStatus']; 
        $emma_get_data_id_for_policy = $emma_fetch_for_policy_card['sn'];
        $emma_get_section_for_policy_description = $emma_fetch_for_policy_card['SectionDescription'];


        echo '  <div class="col-sm-3 col-md-6 col-lg-4 mt-2 carditems card_search_get">
                    <div class="topSecCards bg-white" style="width: 100%; border-radius:5px;">
                        <div align="center" style="margin-top: 18px;padding-top:20px;">
                            <i class="fas fa-file-contract" style="font-size:25px;"></i>
                            <h6 class="class_name " style="font-weight: 600; margin-top: 5px;font-size:14px;" >Title:<span class="emma_policy_title_for_edit"> '.$emma_get_title_for_policy.'</span></h6>
                            <h6 style="font-weight: 600; margin-top: 5px;font-size:14px;">Description:<br></h6>';
                            if(strlen($emma_get_description_for_policy) > 20){
                                
                                $shortenedStringfor_description = substr($emma_get_description_for_policy, 0, 20) . '...';
                            }
                            else
                            {
                                $shortenedStringfor_description = $emma_get_description_for_policy;
                            }

                            $new_section_description_for_edit = str_replace(",", "", $emma_get_section_for_policy_description);
                            $new_section_for_edit = str_replace(",", "", $emma_get_section_for_policy);

                            echo'
                            <div class="emmapolicydescription">'.$shortenedStringfor_description.'</div>
                            
                            <span class="text-muted text-sm"></span>
                        </div>
                    
                        <div style="padding: 7px;">
                            <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                
                                <div style="padding: 5px;" align="center">
                                

                                    &nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-info mb-2 emma_view_icon_for_policy" data-idforpolicyview="'.$emma_get_data_id_for_policy.'"  data-publishstatus="'.$emma_get_publish_status_for_policy.'"  data-routeamount=""  data-id="" data-campusid="" data-bs-toggle="modal" data-bs-target="#emma_modal_for_view" id="" style="font-size:11px;" data-id="" >
                                            <i class="fas fa-eye" ></i>
                                        </button>
                                        <span class="abba_tooltiptext"> View </span>
                                    </span>

                                    &nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <button type="button" class="btn btn-sm text-white emma_edit_icon_for_policy float-end m-2 rounded-3 btn-warning mb-2" data-emmapolicy_edit_dataid="'.$emma_get_data_id_for_policy.'" data-emmapolicy_edit_title="'.$emma_get_title_for_policy.'" data-emma_policy_edit_description="'.$new_section_description_for_edit.'" data-emma_edit_policy_description="'.$shortenedStringfor_description.'" data-emma_edit_section_description="'.$emma_get_section_for_policy_description.'" data-emma_policy_edit_section="'. $new_section_for_edit.'" data-bs-toggle="modal" data-bs-target="#editforpolicy" id="" style="font-size:11px;" >
                                        <i class="fas fa-edit" ></i>
                                        </button>
                                        <span class="abba_tooltiptext"> Edit </span>
                                    </span>

                                    &nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-danger mb-2 emma_delete_icon_for_policy" data-bs-toggle="modal" data-bs-target="#emma_modal_for_policy_delete" id="" style="font-size:11px;" data-name="" data-camp="" data-idforpolicydelete="'.$emma_get_data_id_for_policy.'" >
                                        <i class="fas fa-trash"></i>
                                        </button>
                                        <span class="abba_tooltiptext"> Trash Route </span>
                                    </span>

                                    &nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <button type="button" class="btn btn-sm text-white float-end m-2 rounded-3 btn-success mb-2 emma_publish_icon_for_policy" data-idforpolicypublish="'.$emma_get_data_id_for_policy.'"  data-publishstatusid="'.$emma_get_publish_status_for_policy.'"   data-campusid="" data-bs-toggle="modal" data-bs-target="#" style="font-size:11px;" data-id="" >
                                            <i class="fas fa-upload" ></i>
                                        </button>
                                        <span class="abba_tooltiptext"> Publish </span>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }while($emma_fetch_for_policy_card = mysqli_fetch_assoc($emma_query_for_policy_card));
    echo '</div>';

}else{
    $emma_default_images_select = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2' ";
    $emma_default_images_query = mysqli_query($link, $emma_default_images_select);
    $emma_default_images_fetch = mysqli_fetch_assoc($emma_default_images_query);
    $emma_default_images_rows = mysqli_num_rows($emma_default_images_query);

    if($emma_default_images_rows > 0){
        $emmadisplaynorecordimage = $emma_default_images_fetch['BaseSixtyFour'];

        echo '<img src="'.$emmadisplaynorecordimage.'" alt="" ';
    }else{

    }
}

?>