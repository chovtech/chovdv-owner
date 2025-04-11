<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

include('../../../config/config.php');

$campus = $_POST["campus"];

 $slect_all_committee = " SELECT * FROM `boardmember` WHERE `CampusID` IN (0, $campus) AND DeleteStatus = 0";
 $ekene_query_link_class = mysqli_query($link, $slect_all_committee);
 $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
 $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);
 if ($ekene_row_cnt_ekene > 0)
 {
    echo '<div class="row" style="display: flex;">';
     
    do{
        $Committeename = $ekene_get_details_subject['Committeename'];
        $Datecreated = $ekene_get_details_subject['Datecreated'];
        $CommitteeID = $ekene_get_details_subject['CommitteeID'];
        $CampusID = $ekene_get_details_subject['CampusID'];

        $slect_all_member = "SELECT * FROM `member` WHERE `CommitteeID`= '$CommitteeID' AND Deletestatus = 0";
        $ekene_query_link_member = mysqli_query($link, $slect_all_member);
        $ekene_get_details_subjectmember = mysqli_fetch_assoc($ekene_query_link_member);
        $ekene_row_cnt_ekenemember = mysqli_num_rows($ekene_query_link_member);

            echo '
            <div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get">
           
                <div class="topSecCards" style="width: 100%;">
                <span class="badge bg-danger mx-2 float-end">'.$ekene_row_cnt_ekenemember.' Member</span>
                     <div align="center" style="margin-top: 18px; padding-top: 20px;">';
                                if ($CampusID == 0){
                                   
                                }else{

                                    echo '<i class="fas fa-edit" style="font-size: 25px; cursor: pointer;"  data-bs-toggle="modal"
                                    data-bs-target="#ekene_edit_committee_name" id="ekene_editc" data-cam="'.$CampusID.'" data-name = "'.$Committeename.'" data-committeeid= '.$CommitteeID.'></i></p>';
                                }
                    
                        echo '<h6 style="font-weight: bold; cursor: pointer; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 5px; font-size: 14px;" > '. $Committeename.'</h6>';
                        if ($CampusID == 0)
                        {
                            echo '<p style="font-weight: 500; color: #b8b8b8;">Default</p>';
                        }
                        else
                        {
                            echo '<p style="font-weight: 500; color: #b8b8b8;">'.$Datecreated.'</p>';
                        }
                        
                            echo '</div>
            
                    <div style="padding: 7px;">
                        <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                            <div style="padding: 5px;" align="center">
                            
                                <span class="abba_tooltip">
                                    <button type="button" class="btn btn-sm text-white float-end m-1  rounded-3 btn-primary mb-2" data-committee="'.$CommitteeID.'" data-cam="'.$campus.'"    id="ekene_view_fullassignment"    data-bs-toggle="modal" data-bs-target="#ekene_save_change"  style="font-size: 11px;">
                                        <i class="fa fa-eye" style="color: white; cursor: pointer;" aria-hidden="true"></i>
                                    </button>
                                    <span class="abba_tooltiptext">View Member</span>
                                </span>
                                &nbsp;';
                                if ($CampusID == 0)
                                { echo '<span class="abba_tooltip">
                                    <button type="button"  class="btn btn-sm text-white emma_delete_icon_for_commitee float-end m-1  rounded-3 btn-danger mb-2"  data-cam="'.$CampusID.'"data-committee="'.$CommitteeID.'"     id="ekene_delete_fullassignment" style="font-size: 11px;" disabled>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <span class="abba_tooltiptext">Delete Commitee</span>
                                </span>
                                &nbsp;';
                                }else{
                                    echo ' <span class="abba_tooltip">
                                    <button type="button"  class="btn btn-sm text-white emma_delete_icon_for_commitee float-end m-1  rounded-3 btn-danger mb-2"  data-cam="'.$CampusID.'"  data-committee="'.$CommitteeID.'"  data-bs-toggle="modal" data-bs-target="#ekene_delete_committee" id="ekene_delete_fullassignmenttwo" style="font-size: 11px;" >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <span class="abba_tooltiptext">Delete Commitee</span>
                                </span>
                                &nbsp;';
                             
                                }
                                if ($ekene_row_cnt_ekenemember == 0)
                                {
                                    echo ' <span class="abba_tooltip">
                                                <button type="button"  class="btn btn-sm text-white float-end m-1 open_assign_task_modal rounded-3 btn-success mb-2"  data-cam="'.$CampusID.'"  data-committee="'.$CommitteeID.'" data-bs-toggle="modal" data-bs-target="#ekene_assigning_of_task" id="ekene_task_fullassignmenttwo" style="font-size: 11px;" disabled>
                                                    <i class="fas fa-tasks"></i>
                                                </button>
                                                <span class="abba_tooltiptext"> Assign Task</span>
                                            </span>
                                            &nbsp;';
                                }else
                                {

                                    echo ' <span class="abba_tooltip">
                                                <button type="button"  class="btn btn-sm text-white float-end m-1 open_assign_task_modal rounded-3 btn-success mb-2"  data-cam="'.$CampusID.'"  data-committee="'.$CommitteeID.'" data-bs-toggle="modal" data-bs-target="#ekene_assigning_of_task" id="ekene_task_fullassignmenttwo" style="font-size: 11px;">
                                                    <i class="fas fa-tasks"></i>
                                                </button>
                                                <span class="abba_tooltiptext"> Assign Task</span>
                                            </span>
                                        &nbsp;';
                                }
                              
                         
                            echo '</div>
                        </div>
                    </div>
                </div>
            
            </div>
            ';

    }while($ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class));
    echo '</div>';
 }else{
    $select_for_no_record_found = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2' ";
    $query_for_no_record_found = mysqli_query($link, $select_for_no_record_found);
    $fetch_for_no_record_found = mysqli_fetch_assoc($query_for_no_record_found);
    $rows_for_no_record_found = mysqli_num_rows($query_for_no_record_found);

    if($rows_for_no_record_found > 0){
        
        $get_image = $fetch_for_no_record_found['BaseSixtyFour'];
        echo '<div align="center">
                <img src="'.$get_image.'" alt="" style="width:150px">
                <p class="p-1">No Commitee Found</p>
            </div>';
    }else{

    }
 }

 ?>