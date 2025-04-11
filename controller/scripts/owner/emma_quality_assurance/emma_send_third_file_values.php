<?php

include("../../../config/config.php");

$emma_gets_data_id_for_third_file = $_POST['emma_gets_third_file_data_id'];
$emma_gets_campus_id_for_third_file = $_POST['emma_gets_third_file_campus_id'];
$emma_gets_institution_id_for_third_file = $_POST['emma_gets_third_file_institution_id'];

$emma_select_for_third_file = "SELECT * FROM `filestable` WHERE `FolderID` = '$emma_gets_data_id_for_third_file' AND `CampusID` = '$emma_gets_campus_id_for_third_file' AND `InstitutionID` = '$emma_gets_institution_id_for_third_file' AND `DeleteStatus` = 0 ";
$emma_select_for_third_file_query = mysqli_query($link, $emma_select_for_third_file);
$emma_select_for_third_file_fetch = mysqli_fetch_assoc($emma_select_for_third_file_query);
$emma_select_for_third_file_num_of_rows = mysqli_num_rows($emma_select_for_third_file_query);

$select_for_default_images_table_for_third_file = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'emma_background_image_for_files' ";
$select_for_default_images_table_query_for_third_file = mysqli_query($link, $select_for_default_images_table_for_third_file);
$select_for_default_images_table_fetch_for_third_file = mysqli_fetch_assoc($select_for_default_images_table_query_for_third_file);
$select_for_default_images_table_num_of_rows_for_third_file = mysqli_num_rows($select_for_default_images_table_query_for_third_file);


if($select_for_default_images_table_num_of_rows_for_third_file > 0){
    $fetch_image_files_from_default_images_for_third_file = $select_for_default_images_table_fetch_for_third_file['BaseSixtyFour'];
}else{
    echo 12;
}


if($emma_select_for_third_file_num_of_rows > 0){
    echo '<div class="row">
    <div class="col">
        <h6 class="card-title text-primary" data-bs-toggle="modal" data-bs-target="#emma_open_modal_for_third_file" ><i class="fas fa-plus-circle" style="color:#007ffb;"> </i>FILES</h6>
    </div>

    <div class="col text-end">
                
    </div>
</div>

    <div class="row emma_first_div_for_third_file_pagination">';
    do{
        
        $emma_third_file_folder_id = $emma_select_for_third_file_fetch["FileTableID"];
        $emma_third_file_campus_id = $emma_select_for_third_file_fetch["CampusID"];
        $emma_third_file_name = $emma_select_for_third_file_fetch["FileName"];
        $emma_third_file_type = $emma_select_for_third_file_fetch["FileType"];
        $emma_third_file_basesixtyfour = $emma_select_for_third_file_fetch["BaseSixtyFour"];



     echo'   <div class="col-lg-3 col-md-6 emma_second_div_for_third_file_pagination">
                <div class="card mt-2" style="border-radius:10px; border: 1px #5FAAFF solid">
                    <div class="card-body">
                    <span class="float-end">
                        <div class="dropdown">
                            <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                style="float: right;">
                                <i class="bx bx-dots-vertical-rounded" style="font-size: 22px;"></i>
                            </span>
                    
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">
                                <li>
                                    <a href="#" class="btn btn-sm btn-icon emma_download_third_file dropdown-item" data-thirdfiledataid="'.$emma_third_file_folder_id.'" data-toggle="tooltip" > <i class="fas fa-download aria-hidden="true"></i> Download</a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-sm btn-icon emma_edit_third_file dropdown-item" data-thisname="'.$emma_third_file_name.'" data-campusid="'.$emma_third_file_campus_id.'" data-folderid="'.$emma_third_file_folder_id.'"  data-bs-toggle="modal" data-bs-target="#emma_add_new_edit_modal_for_third_files" data-toggle="tooltip">  <i class="bx bx-edit" aria-hidden="true"></i>Edit</a>
                                </li>

                                <li>
                                    <a href="#" style="color: red;" id="emma_delete_icon_for_first_files" data-campusiddelete="'.$emma_third_file_campus_id.'" data-folderiddelete="'.$emma_third_file_folder_id.'" data-bs-toggle="modal" id="" data-bs-target="#emma_third_files_delete_Modal" class="dropdown-item"> <i class="bx bx-trash" style="color: red;" aria-hidden="true"></i> Delete</a>
                                </li>
                            </ul>
                        </div>
                    </span>
                    
                    <i class="far fa-file-pdf ms-3 fa-4x d-flex justify-content-center mt-3 emma_view_for_third_file" style="color:#007ffb;" data-bs-toggle="modal" data-bs-target="#emma_last_file_view" data-emmalastfilebasesixtyfour="'.$emma_third_file_basesixtyfour.'" data-emmalastfiletype="'.$emma_third_file_type.'" data-emmalastfileid="'.$emma_third_file_folder_id.'"></i>
                    <p class="text-center mt-1 emma_view_for_third_file" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#emma_last_file_view" data-emmalastfilebasesixtyfour="'.$emma_third_file_basesixtyfour.'" data-emmalastfiletype="'.$emma_third_file_type.'" data-emmalastfileid="'.$emma_third_file_folder_id.'">'.$emma_third_file_name.'</p>
                </div>
            </div>
        </div>';
    }while($emma_select_for_third_file_fetch = mysqli_fetch_assoc($emma_select_for_third_file_query));
    echo '<div id="emma_third_div_for_third_file_pagination" class="mt-4"></div>
    </div>';
}else{
    echo '<div class="row">
            <div class="col">
                <h6 class="card-title mt-5 text-primary" data-bs-toggle="modal" data-bs-target="#emma_open_modal_for_third_file" ><i class="fas fa-plus-circle" style="color:#007ffb;"> </i>FILES</h6> 
            </div>
            <div class="col text-end">
            
            </div>
        </div>
        <div align="center" style="opacity:0.5;" data-bs-toggle="modal" data-bs-target="#emma_open_modal_for_third_file">
            <img src="'.$fetch_image_files_from_default_images_for_third_file.'" alt="" style="color:#007ffb; width:20%">
        </div>';
}


?>