<?php


include("../../../config/config.php");

$emma_dropdown_institution_id = $_POST["institution_id_values_for_dropdown"];

$select_institution_id_dropdown = "SELECT * FROM `firstfoldertable` WHERE `InstitutionID` IN ($emma_dropdown_institution_id,0) AND `DeleteStatus` = 0 ORDER BY FirstFolderName ASC";
$select_query_institution_id_dropdown = mysqli_query($link, $select_institution_id_dropdown);
$select_fetch_institution_id_dropdown = mysqli_fetch_assoc($select_query_institution_id_dropdown);
$select_row_institution_id_dropdown = mysqli_num_rows($select_query_institution_id_dropdown);

if($select_row_institution_id_dropdown > 0){

    echo '<div class="emma-data-room-maincard">';

        $limit = 10;
        $count = 0;

        do{
        
            $emma_collect_id_from_table = $select_fetch_institution_id_dropdown['FirstFolderID'];
            $emma_collect_folder_name_from_table = $select_fetch_institution_id_dropdown['FirstFolderName'];
            $emma_collect_campus_id_from_table = $select_fetch_institution_id_dropdown['CampusID'];
            $emma_collect_institution_id_from_table = $select_fetch_institution_id_dropdown['InstitutionID'];

            $count++;

            echo '<div class="row mt-4 border emma-data-room-carditems emma_main_folder_loading_card_content" data-icons="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_icons" data-foldername="'.$emma_collect_folder_name_from_table.'" data-name="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_name" data-id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content" id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content" data-folderid="'.$emma_collect_id_from_table.'" data-campusid="'.$emma_collect_campus_id_from_table.'" style="border-radius:10px;">
                <div class="col-lg-12 col-md-12 mt-1">
                    <div class="row emma_main_folder_loading_row" >

                        <div class="col-2 mb-2">
                            <i class="fas fa-folder d-flex float-start fa-2x mt-3" style="color:#E0EEFD;"></i>
                        </div>

                        <div class="col-7 mt-3 emma_name_for_main_folder" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="'.$emma_collect_folder_name_from_table.'" style="cursor: pointer; font-size: 15px;" class=" '.$emma_collect_id_from_table.'autoupdatename" data-name="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_name" id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_name">'.$emma_collect_folder_name_from_table.'</span>
                        </div>';

                        if($emma_collect_institution_id_from_table == 0){

                        }else{
                            echo '<div class="col-3 emma_icons_for_main_folder mt-3">
                                <span style="float: right;margin-bottom:3px;">
                                    <div class="dropdown">
                                        <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                            style="float: right;">
                                            <i class="bx bx-dots-vertical-rounded" data-icons="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_icons" id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_icons" style="font-size: 22px;"></i>
                                        </span>
                                
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">
                                            
                                            <li>
                                                <a href="#" class="btn btn-sm btn-icon emma_edit_clas emma_edit_first_folder dropdown-item" data-toggle="tooltip" data-id="'.$emma_collect_id_from_table.'" data-camp="'.$emma_collect_campus_id_from_table.'" data-folder="'.$emma_collect_folder_name_from_table.'" data-bs-toggle="modal" data-bs-target="#emma_add_new_edit_Modal"> <i
                                                    class="bx bx-edit" aria-hidden="true"></i> Edit</a>
                                            </li>
                                
                                            <li>
                                                <a href="#" style="color: red;" data-id="" data-bs-toggle="modal" id="delete-main_folder_icon" data-bs-target="#emma_add_new_delete_Modal" data-ide="'.$emma_collect_id_from_table.'"  data-camp="'.$emma_collect_campus_id_from_table.'" class="dropdown-item"> <i class="bx bx-trash" style="color: red;" aria-hidden="true"></i>
                                                    Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </span>
                            </div>';
                        }
                    echo '</div>
                </div>
            </div>';
        }while ($count < $limit && ($select_fetch_institution_id_dropdown = mysqli_fetch_assoc($select_query_institution_id_dropdown)));
    
        echo '<p class="view_more_column text-end text-primary mt-2" style="font-size:11px; cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#collapseforviewmorefolders" >View More</p>
        
        <div align="start">
            <div class="collapse" id="collapseforviewmorefolders" style="">';
                $count_new = 11;

                do{
                
                    $emma_collect_id_from_table = $select_fetch_institution_id_dropdown['FirstFolderID'];
                    $emma_collect_folder_name_from_table = $select_fetch_institution_id_dropdown['FirstFolderName'];
                    $emma_collect_campus_id_from_table = $select_fetch_institution_id_dropdown['CampusID'];
                    $emma_collect_institution_id_from_table = $select_fetch_institution_id_dropdown['InstitutionID'];
        
                    $count++;
        
                    echo '<div class="row mt-4 border emma-data-room-carditems emma_main_folder_loading_card_content" data-icons="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_icons" data-foldername="'.$emma_collect_folder_name_from_table.'" data-name="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_name" data-id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content" id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content" data-folderid="'.$emma_collect_id_from_table.'" data-campusid="'.$emma_collect_campus_id_from_table.'" style="border-radius:10px;">
                        <div class="col-lg-12 col-md-12 mt-1">
                            <div class="row emma_main_folder_loading_row" >
        
                                <div class="col-2 mb-2">
                                    <i class="fas fa-folder d-flex float-start fa-2x mt-3" style="color:#E0EEFD;"></i>
                                </div>
        
                                <div class="col-7 mt-3 emma_name_for_main_folder" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="'.$emma_collect_folder_name_from_table.'" style="cursor: pointer; font-size: 15px;" class=" '.$emma_collect_id_from_table.'autoupdatename" data-name="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_name" id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_name">'.$emma_collect_folder_name_from_table.'</span>
                                </div>';
        
                                if($emma_collect_institution_id_from_table == 0){
        
                                }else{
                                    echo '<div class="col-3 emma_icons_for_main_folder mt-3">
                                        <span style="float: right;margin-bottom:3px;">
                                            <div class="dropdown">
                                                <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="float: right;">
                                                    <i class="bx bx-dots-vertical-rounded" data-icons="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_icons" id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_icons" style="font-size: 22px;"></i>
                                                </span>
                                        
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">
                                                    
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon emma_edit_clas emma_edit_first_folder dropdown-item" data-toggle="tooltip" data-id="'.$emma_collect_id_from_table.'" data-camp="'.$emma_collect_campus_id_from_table.'" data-folder="'.$emma_collect_folder_name_from_table.'" data-bs-toggle="modal" data-bs-target="#emma_add_new_edit_Modal"> <i
                                                            class="bx bx-edit" aria-hidden="true"></i> Edit</a>
                                                    </li>
                                        
                                                    <li>
                                                        <a href="#" style="color: red;" data-id="" data-bs-toggle="modal" id="delete-main_folder_icon" data-bs-target="#emma_add_new_delete_Modal" data-ide="'.$emma_collect_id_from_table.'"  data-camp="'.$emma_collect_campus_id_from_table.'" class="dropdown-item"> <i class="bx bx-trash" style="color: red;" aria-hidden="true"></i>
                                                            Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </span>
                                    </div>';
                                }
                            echo '</div>
                        </div>
                    </div>';
                }while ($count_new < $select_row_institution_id_dropdown && ($select_fetch_institution_id_dropdown = mysqli_fetch_assoc($select_query_institution_id_dropdown)));
            
            echo '</div>
        </div>
    </div>';
}
else{
    echo 'No Records Found';
}





?>



