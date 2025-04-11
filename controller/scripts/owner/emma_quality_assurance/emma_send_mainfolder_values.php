<?php

include("../../../config/config.php");

$emma_received_institution_id = $_POST['emma_collects_institution_id'];
$emma_received_folder_id = $_POST['emma_collects_folder_id'];


$select_from_second_folder_table = "SELECT * FROM `secondfoldertable` WHERE `InstitutionID` IN ('$emma_received_institution_id',0) AND `FirstFolderID` = '$emma_received_folder_id' AND `DeleteStatus` = 0 ORDER BY SecondFolderName ASC";
$select_from_second_folder_table_query = mysqli_query($link, $select_from_second_folder_table);
$select_from_second_folder_table_fetch = mysqli_fetch_assoc($select_from_second_folder_table_query);
$select_from_second_folder_table_number_of_rows = mysqli_num_rows($select_from_second_folder_table_query);


$select_for_default_images_table = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'emma_main_folder_background_image' ";
$select_for_default_images_table_query = mysqli_query($link, $select_for_default_images_table);
$select_for_default_images_table_fetch = mysqli_fetch_assoc($select_for_default_images_table_query);
$select_for_default_images_table_num_of_rows = mysqli_num_rows($select_for_default_images_table_query);


if($select_for_default_images_table_num_of_rows > 0){

    $fetch_image_from_default_images = $select_for_default_images_table_fetch['BaseSixtyFour'];
    
}else{
    echo 12;
}


if($select_from_second_folder_table_number_of_rows > 0){

    $collect_thiscampus_id_from_second_table = $select_from_second_folder_table_fetch['CampusID'];
    $collect_second_data_id_from_second_table = $select_from_second_folder_table_fetch['SecondFolderID'];
    
    echo '<div class="row ">
            <div class="col">
                <h6 class=" card-title text-primary" id="emma_create_icon_for_second_folder" data-firstfolderid= "'.$collect_second_data_id_from_second_table.'" data-campuseid="'.$collect_thiscampus_id_from_second_table.'" data-id="'.$emma_received_folder_id.'" data-bs-toggle="modal" id="" data-bs-target="#emma_second_create_new_Modal"><i class="fas fa-plus-circle" style="color:#007ffb;"> </i> FOLDER</h6>
                    <div class="row emma_second_folder_value emma_second_folder_pagination">';
    do{
        $collect_data_id_from_second_table = $select_from_second_folder_table_fetch['SecondFolderID'];
        $collect_id_from_second_table = $select_from_second_folder_table_fetch['FirstFolderID'];
        $collect_name_from_second_table = $select_from_second_folder_table_fetch['SecondFolderName'];
        $collect_campus_id_from_second_table = $select_from_second_folder_table_fetch['CampusID'];
        $collect_incremented_id_from_table = $select_from_second_folder_table_fetch['SecondFolderID'];
        $collect_institution_id_from_table = $select_from_second_folder_table_fetch['InstitutionID'];

        $collect_data_id_from_second_table;

        if($collect_data_id_from_second_table == 44)
        {
            $emma_staff = 'staff';
        }
        elseif($collect_data_id_from_second_table == 43)
        {
            $emma_staff = 'parents';
        }
        elseif($collect_data_id_from_second_table == 42)
        {
            $emma_staff = 'students';
        }else
        {
            $emma_staff = '';
        }

        echo '<div class="col-lg-4 col-md-6 emma_second_folder_class emma_second_folder_class_pagination">
                    <div class="card mt-2">
                        <div class="card-body" style="font-size: 13px; height:58px; cursor:pointer;">
                            <div class="row align-items-center"> <!-- Add align-items-center class to align vertically centered -->
                
                                
                                <div class="col-2 mt-1 emma_second_folder_icon" data-file="pdf" data-staff="'.$emma_staff.'" data-secondfolderid="'.$collect_data_id_from_second_table.'" data-thisfoldername="'.$collect_name_from_second_table.'"  data-campusid="'.$collect_campus_id_from_second_table.'" data-secondfolderid="'.$collect_id_from_second_table.'" data-thirddataid="'.$collect_data_id_from_second_table.'" data-bs-toggle="" data-bs-target="#">
                                    <i class="far fa-folder fa-2x mt-4" style="color:#007ffb; display:inline;"></i>
                                </div>
                
                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="col-7 ms-1 emma_second_folder_name" data-staff="'.$emma_staff.'" data-secondfolderid="'.$collect_data_id_from_second_table.'" data-thisfoldername="'.$collect_name_from_second_table.'"  data-campusid="'.$collect_campus_id_from_second_table.'" data-secondfolderid="'.$collect_id_from_second_table.'" data-thirddataid="'.$collect_data_id_from_second_table.'" data-bs-toggle="" data-bs-target="#">
                                    <p data-bs-toggle="tooltip" data-bs-placement="top" title="'.$collect_name_from_second_table.'" class="text-center ms-3 mt-1" style="display:inline;cursor:pointer;"><span>'.$collect_name_from_second_table.'</span></p>
                                </div>';

                                if($collect_institution_id_from_table == 0){

                                }else{
                                    echo '<div class="col-2 mt-1">
                                        <span style="display:inline;">
                                            <div class="dropdown">
                                                <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="float: right;">
                                                    <i class="bx bx-dots-vertical-rounded" style="font-size: 22px;"></i>
                                                </span>
                    
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">
                    
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon dropdown-item" id="emma_edit_icon_for_second_folder" data-secondfolderdataid="'.$collect_incremented_id_from_table.'" data-folder="'.$collect_name_from_second_table.'" data-campus="'.$collect_campus_id_from_second_table.'" data-id="'.$collect_id_from_second_table.'" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#emma_add_new_second_edit_Modal"> <i class="bx bx-edit" aria-hidden="true"></i>Edit</a>
                                                    </li>
                    
                                                    <li>
                                                        <a href="#" style="color: red;" id="emma_delete_icon_for_second_folder" data-iddelete="'.$collect_incremented_id_from_table.'" data-camp="'.$collect_campus_id_from_second_table.'" data-bs-toggle="modal" id="" data-bs-target="#emma_second_folder_delete_Modal" class="dropdown-item"> <i class="bx bx-trash" style="color: red;" aria-hidden="true"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </span>
                                    </div>';
                                }
                          echo '</div>
                        </div>
                    </div>
                </div>';

    }while($select_from_second_folder_table_fetch = mysqli_fetch_assoc($select_from_second_folder_table_query));
    echo '   
    <div align="center" style="margin-top: 30px;" id="emma_data_room_paginationcont_for_second_folder"></div>
    </div>
            </div>
        </div>
    </div>';
}else{
    echo '
        <div class="row">
            <div class="col">
                <h6 class="card-title text-primary" data-bs-toggle="modal" data-bs-target="#emma_second_create_new_Modal" ><i class="fas fa-plus-circle" style="color:#007ffb;"> </i> FOLDER</h6>
            </div>
            <div class="col text-end">
            
            </div>
        </div>
        <div align="center" style="opacity:0.5;" class="p-5" data-bs-toggle="modal">
            <img src="'.$fetch_image_from_default_images.'" alt="" style="color:#007ffb; width:40%" data-bs-target="#emma_second_create_new_Modal>
        </div>';
}


            // `CampusID` IN ('$emma_received_campus_id', 0) AND 

            $select_from_files_table = "SELECT * FROM `filestable` WHERE `InstitutionID` IN ('$emma_received_institution_id', 0) AND `FolderID` = '$emma_received_folder_id' AND `DeleteStatus` = 0 ORDER BY `FileName` ASC ";
            $select_from_second_folder_table_query_for_first_file = mysqli_query($link, $select_from_files_table);
            $select_from_second_folder_table_fetch_for_first_file = mysqli_fetch_assoc($select_from_second_folder_table_query_for_first_file);
            $select_from_second_folder_table_number_of_rows_for_first_file = mysqli_num_rows($select_from_second_folder_table_query_for_first_file);


            $select_for_default_images_table = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'emma_background_image_for_files' ";
            $select_for_default_images_table_query = mysqli_query($link, $select_for_default_images_table);
            $select_for_default_images_table_fetch = mysqli_fetch_assoc($select_for_default_images_table_query);
            $select_for_default_images_table_num_of_rows = mysqli_num_rows($select_for_default_images_table_query);


            if($select_for_default_images_table_num_of_rows > 0){
                $fetch_file_image_from_default_images = $select_for_default_images_table_fetch['BaseSixtyFour'];
            }else{
                echo 13;
            }

            if($select_from_second_folder_table_number_of_rows_for_first_file > 0){
                echo '<div class="row ">
                        <div class="col">
                            <h6 class="card-title mt-5 text-primary" data-bs-toggle="modal" data-bs-target="#emma_open_modal_for_first_file" ><i class="fas fa-plus-circle" style="color:#007ffb;"> </i> FILES</h6>
                        </div>

                        <div class="col text-end">
                        
                        </div>
                    </div>

                <div class="row mt-2 emma_second_folder_pagination_file">';

            do{
                $collect_first_file_id_from_second_table = $select_from_second_folder_table_fetch_for_first_file['FolderID'];
                $collect_first_file_name_from_second_table = $select_from_second_folder_table_fetch_for_first_file['FileName'];
                $collect_first_file_campus_id_from_second_table = $select_from_second_folder_table_fetch_for_first_file['CampusID'];
                $collect_first_file_incremented_id_from_table = $select_from_second_folder_table_fetch_for_first_file['FileTableID'];
                $collect_first_file_type_from_table = $select_from_second_folder_table_fetch_for_first_file['FileType'];
                $collect_first_file_image_from_table = $select_from_second_folder_table_fetch_for_first_file['BaseSixtyFour'];
                $collect_first_file_institution_id = $select_from_second_folder_table_fetch_for_first_file['InstitutionID'];


                echo '<div class="col-lg-3 col-md-6 emma_second_folder_class_pagination_file">
                        <div class="card mt-2" style="border-radius:10px; border: 1px #5FAAFF solid">
                            <div class="card-body">';
                                if($collect_first_file_institution_id == 0 && $collect_first_file_campus_id_from_second_table == 0 ){

                                }else{
                                    echo '<span class="float-end">
                                        <div class="dropdown">
                                            <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                                style="float: right;">
                                                <i class="bx bx-dots-vertical-rounded" style="font-size: 22px;"></i>
                                            </span>
                                    
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">
                                                <li>
                                                    <a href="#" class="btn btn-sm btn-icon emma_download_first_file dropdown-item" data-thisdownloadid="'.$collect_first_file_incremented_id_from_table.'" data-toggle="tooltip" > <i class="fas fa-download aria-hidden="true"></i> Download</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="btn btn-sm btn-icon emma_edit_first_folder dropdown-item" data-thiscampus="'.$collect_first_file_campus_id_from_second_table.'" data-thisname="'.$collect_first_file_name_from_second_table.'" data-thisid="'.$collect_first_file_incremented_id_from_table.'" data-bs-toggle="modal" id="emma_edit_for_first_file" data-bs-target="#emma_add_new_edit_modal_for_first_file" data-toggle="tooltip">  <i class="bx bx-edit" aria-hidden="true"></i>Edit</a>
                                                </li>

                                                <li>
                                                    <a href="#" style="color: red;" id="emma_delete_icon_for_first_file" data-deleteid="'.$collect_first_file_incremented_id_from_table.'" data-deletecamp="'.$collect_first_file_campus_id_from_second_table.'" data-bs-toggle="modal" id="" data-bs-target="#emma_first_file_delete_Modal" class="dropdown-item"> <i class="bx bx-trash" style="color: red;" aria-hidden="true"></i> Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </span>';
                                }

                                if($collect_first_file_type_from_table == "pdf"){
                                    echo '<i class="far fa-file-pdf ms-3 fa-4x d-flex justify-content-center mt-3 emma_view_for_first_file" style="color:#007ffb;" data-firstfileviewbasesixtyfour="'.$collect_first_file_image_from_table.'" data-fileviewid="'.$collect_first_file_incremented_id_from_table.'" data-filetype="'.$collect_first_file_type_from_table.'" data-bs-toggle="modal" data-bs-target="#emma_view_for_first_file"></i>';
                                }elseif($collect_first_file_type_from_table == "rtf"){
                                    echo '<i class="far fa-file-alt ms-3 fa-4x d-flex justify-content-center mt-3 emma_view_for_first_file" style="color:#007ffb;" data-firstfileviewbasesixtyfour="'.$collect_first_file_image_from_table.'" data-fileviewid="'.$collect_first_file_incremented_id_from_table.'" data-filetype="'.$collect_first_file_type_from_table.'" data-bs-toggle="modal" data-bs-target="#emma_view_for_first_file"></i>';
                                }elseif($collect_first_file_type_from_table == "docx"){
                                    echo '<i class="far fa-file-word ms-3 fa-4x d-flex justify-content-center mt-3 emma_view_for_first_file" style="color:#007ffb;" data-firstfileviewbasesixtyfour="'.$collect_first_file_image_from_table.'" data-fileviewid="'.$collect_first_file_incremented_id_from_table.'" data-filetype="'.$collect_first_file_type_from_table.'" data-bs-toggle="modal" data-bs-target="#emma_view_for_first_file"></i>';
                                }else{

                                }

                                echo '<p class="text-center mt-1" style="cursor:pointer; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" data-firstfileviewbasesixtyfour="'.$collect_first_file_image_from_table.'" data-fileviewid="'.$collect_first_file_incremented_id_from_table.'" data-filetype="'.$collect_first_file_type_from_table.'" data-bs-toggle="modal" data-bs-target="#emma_view_for_first_file">'.$collect_first_file_name_from_second_table.'</p>
                        </div>
                    </div>
                </div>';

            }while($select_from_second_folder_table_fetch_for_first_file = mysqli_fetch_assoc($select_from_second_folder_table_query_for_first_file));
    
            echo '<div align="center" style="margin-top: 30px;" id="emma_data_room_paginationcont_for_second_folder_file">jvkycdciyufyki4akrutgucr6yt</div>
            </div>';
}else{
    echo '<div class="row">
            <div class="col">
                <h6 class="card-title mt-5 text-primary" data-bs-toggle="modal" data-bs-target="#emma_open_modal_for_first_file" ><i class="fas fa-plus-circle" style="color:#007ffb;"> </i>FILES</h6>
            </div>
            <div class="col text-end">
            
            </div>
            <div align="center">
                <img src="'.$fetch_file_image_from_default_images.'" alt="" style="width:20%; opacity:0.5;"  data-bs-toggle="modal" data-bs-target="#emma_open_modal_for_first_file">
            </div>
        </div>';
}

?>