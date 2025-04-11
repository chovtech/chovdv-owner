<?php

include("../../../config/config.php");

$emma_staff_data = $_POST['emma_collect_staff_data'];
$emma_institution = $_POST['emma_collects_institution_id'];
$emma_folder_id = $_POST['emma_collects_folder_id'];
$emma_campus_id = $_POST['emma_gets_campus_id_for_view'];

$select_from_third_folder_table = "SELECT * FROM `thirdfoldertable` WHERE `InstitutionID` IN ('$emma_institution',0) AND `CampusID` = '$emma_campus_id' AND `SecondFolderID` = '$emma_folder_id' AND `DeleteStatus` = 0 ORDER BY ThirdFolderName ASC ";
$select_from_third_folder_table_query = mysqli_query($link, $select_from_third_folder_table);
$select_from_third_folder_table_fetch = mysqli_fetch_assoc($select_from_third_folder_table_query);
$select_from_third_folder_table_number_of_rows = mysqli_num_rows($select_from_third_folder_table_query);


$select_for_default_images_table = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'emma_main_folder_background_image' ";
$select_for_default_images_table_query = mysqli_query($link, $select_for_default_images_table);
$select_for_default_images_table_fetch = mysqli_fetch_assoc($select_for_default_images_table_query);
$select_for_default_images_table_num_of_rows = mysqli_num_rows($select_for_default_images_table_query);

if($select_for_default_images_table_num_of_rows > 0){
    $fetch_image_from_default_images = $select_for_default_images_table_fetch['BaseSixtyFour'];
}else{
    $fetch_image_from_default_images = '';
}

if($select_from_third_folder_table_number_of_rows > 0){

   echo'<div class="row">
            <div class="col">
                <h6 class="card-title emma_create_icon_for_third_folder" style="color:#007ffb;" data-id="'.$emma_folder_id.'" data-campuseid="'.$emma_campus_id.'" id="emma_create_icon_for_third_folders" data-bs-toggle="modal" id="" data-bs-target="#emma_third_create_new_Modal"><i class="fas fa-plus-circle" style="color:#007ffb;"> </i>FOLDER</h6>   
                    <div class="row emma_third_folder_pagination_value">';
                        do{
                            $emma_third_folder_value = $select_from_third_folder_table_fetch['ThirdFolderName'];
                            $emma_third_folder_campus = $select_from_third_folder_table_fetch['CampusID'];
                            $emma_third_folder_data_id = $select_from_third_folder_table_fetch['ThirdFolderTableID'];
                            $emma_third_institution_id = $select_from_third_folder_table_fetch['InstitutionID'];

                            echo'<div class="col-lg-4 col-md-6 emma_rows_for_third_folder_pagination">
                                    <div class="card mt-3">
                                        <div class="card-body" style="font-size: 13px; height:58px;">
                                            <div class="row align-items-center"> <!-- Add align-items-center class to align vertically centered -->

                                                <div class="col-3 mb-2 emma_icon_for_third_folder" data-bs-toggle="" data-bs-target="#" data-thirdfileid="'.$emma_third_folder_data_id.'" data-thirdfilecampus="'.$emma_third_folder_campus.'" data-names="'.$emma_third_folder_value.'">
                                                    <i class="far fa-folder fa-2x" style="color:#007ffb;"></i>
                                                </div>

                                                <div class="col-6 emma_name_for_third_folder" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; data-bs-toggle="" data-bs-target="#" data-thirdfileid="'.$emma_third_folder_data_id.'" data-thirdfilecampus="'.$emma_third_folder_campus.'" data-names="'.$emma_third_folder_value.'">
                                                    <p data-bs-toggle="tooltip" data-bs-placement="top" title="'.$emma_third_folder_value.'"class="text-center mt-1" style="color:#007ffb; cursor:pointer;">'.$emma_third_folder_value.'</p>
                                                </div>';

                                                if($emma_third_institution_id == 0){

                                                }
                                                else
                                                {
                                            echo'<div class="col-3" style="color:#007ffb;">
                                                    <div class="dropdown">
                                                        <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="float: right;">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 22px;"></i>
                                                        </span>

                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">

                                                            <li>
                                                                <a href="#" class="btn btn-sm btn-icon edit_icon_for_third_file dropdown-item" data-thiscampusidforedit="'.$emma_third_folder_campus.'" data-thisdatavalueforedit="'.$emma_third_folder_value.'" data-thisdataidforedit="'.$emma_third_folder_data_id.'" id="emma_edit_icon_for_third_folder" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#emma_add_new_edit_modal_for_third_file"> <i class="bx bx-edit" aria-hidden="true"></i> Edit</a>
                                                            </li>

                                                            <li>
                                                                <a href="#" style="color: red;" id="emma_delete_icon_for_third_folder" data-thiscampusidfordelete="'.$emma_third_folder_campus.'" data-thisdataidfordelete="'.$emma_third_folder_data_id.'" data-bs-toggle="modal" data-bs-target="#emma_third_folder_delete_Modal" class="dropdown-item"> <i class="bx bx-trash" style="color: red;" aria-hidden="true"></i >Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>';
                                                }
                                                echo '
                                            </div>
                                        </div>
                                    </div>
                                </div>';

                        }while($select_from_third_folder_table_fetch = mysqli_fetch_assoc($select_from_third_folder_table_query));
                echo'<div id="emma_close_third_folder_pagination" class="mt-4"></div>
            </div>                       
        </div>';
}else{
    echo '
    <div class="row">
            
            <div class="col text-end">
            
            </div>
        </div>
        <h6 class=" card-title text-primary emma_create_icon_for_third_folder" data-id="'.$emma_folder_id.'" data-campuseid="'.$emma_campus_id.'" data-bs-toggle="modal" id="" data-bs-target="#emma_third_create_new_Modal"><i class="fas fa-plus-circle" style="color:#007ffb;"> </i> FOLDER</h6>

        <div align="center" style="color:#007ffb;">
            <img src="'.$fetch_image_from_default_images.'" alt="" style="width:20%;"  data-bs-toggle="modal" id="" data-bs-target="#emma_third_create_new_Modal">
        </div>
    ';
}





    $select_for_files_table = "SELECT * FROM `filestable` WHERE `CampusID` IN ('$emma_campus_id', 0) AND `FolderID` = '$emma_folder_id' AND `InstitutionID` IN ('$emma_institution', 0) AND `DeleteStatus` = 0 ORDER BY `FileName` ASC";
    $select_for_files_table_query = mysqli_query($link, $select_for_files_table);
    $select_for_files_table_fetch = mysqli_fetch_assoc($select_for_files_table_query);
    $select_for_files_table_num_of_rows = mysqli_num_rows($select_for_files_table_query);


    $select_for_files_default_images_table = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'emma_background_image_for_files' ";
    $select_for_files_default_images_table_query = mysqli_query($link, $select_for_files_default_images_table);
    $select_for_files_default_images_table_fetch = mysqli_fetch_assoc($select_for_files_default_images_table_query);
    $select_for_files_default_images_table_num_of_rows = mysqli_num_rows($select_for_files_default_images_table_query);

    if($select_for_files_default_images_table_num_of_rows > 0){
        $fetch_image_files_from_default_images = $select_for_files_default_images_table_fetch['BaseSixtyFour'];
    }else{
        echo 12;
    }
        
    echo '<div class="emma_first_div_for_second_file_pagination">';

        if($select_for_files_table_num_of_rows > 0){
            echo'<div class="row">
                    <div class="col">
                        <h6 class="card-title mt-5 text-success" data-bs-toggle="modal" data-bs-target="#emma_open_modal_for_second_file" ><i class="fas fa-plus-circle" style="color:#007ffb;"> </i>FILES</h6>
                    </div>

                    <div class="col text-end">
                    
                    </div>
                </div>
        
            <div class="row mt-2">';
                do{

                    $emma_get_campus_id = $select_for_files_table_fetch['CampusID'];
                    $emma_get_data_id = $select_for_files_table_fetch['FileTableID'];
                    $emma_get_file_name = $select_for_files_table_fetch['FileName'];
                    $emma_get_file_type = $select_for_files_table_fetch['FileType'];
                    $emma_get_institution_id = $select_for_files_table_fetch['InstitutionID'];
                    $emma_get_basesixty_four = $select_for_files_table_fetch['BaseSixtyFour'];


                    echo '<div class="col-lg-3 col-md-6 emma_second_div_for_second_file_pagination">
                            <div class="card mt-3" style="border-radius:10px; border: 1px #4BB543 solid; z-index: 1;" data-filetype="'.$emma_get_file_type.'">
                                <div class="card-body">';

                                    if($emma_get_institution_id === '0'){

                                    }else{
                                        echo'<span class="float-end">
                                            <div class="dropdown">
                                                <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="float: right;">
                                                    <i class="bx bx-dots-vertical-rounded" style="font-size: 22px;"></i>
                                                </span>
                                        
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon fw-bold emma_download_second_file dropdown-item" data-idfordownload="'.$emma_get_data_id.'" data-toggle="tooltip" > <i class="fas fa-download aria-hidden="true"></i> Download</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="color: #FFAE42;" class="btn text-bold fw-bold btn-sm btn-icon emma_edit_icon_for_second_file dropdown-item" data-name="'.$emma_get_file_name.'" data-id="'.$emma_get_data_id.'" data-thiscampusid="'.$emma_get_campus_id.'" data-bs-toggle="modal" data-bs-target="#emma_add_new_edit_modal_for_second_file" data-toggle="tooltip">  <i class="bx bx-edit" aria-hidden="true"></i> Edit</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" style="color: red; font-weight:bold;" id="delete_icon_for_second_file" data-ide="'.$emma_get_data_id.'" data-thiscampuside="'.$emma_get_campus_id.'" data-bs-toggle="modal" id="" data-bs-target="#emma_second_file_delete_Modal" class="dropdown-item"> <i class="bx bx-trash" style="color: red;" aria-hidden="true"></i> Delete</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="color: blue; font-weight:bold;" id="view_icon_for_second_file" data-bs-toggle="modal" id="" data-bs-target="#" class="dropdown-item"> <i class="fas fa-eye" style="color: blue;" aria-hidden="true"></i> View</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </span>';
                                    }

                                    if($emma_get_file_type == 'pdf'){
                                        echo '<i class="far fa-file-pdf ms-3 fa-4x d-flex emma_view_for_files justify-content-center mt-3" style="color:#007ffb;" data-thisfilesid="'.$emma_get_data_id.'" id="emma_load_school_details" data-type="'.$emma_get_file_type.'" data-bs-toggle="modal" data-bs-target="#emma_modal_for_second_file" data-filedataid="'.$emma_get_data_id.'" data-basesixtyfour="'.$emma_get_basesixty_four.'"></i>';      
                                    }elseif($emma_get_file_type == 'rtf'){
                                        echo '<i class="far fa-file-alt ms-3 fa-4x d-flex emma_view_for_files justify-content-center mt-3" style="color:#007ffb;" data-thisfilesid="'.$emma_get_data_id.'" id="emma_load_school_details" data-type="'.$emma_get_file_type.'" data-bs-toggle="modal" data-bs-target="#emma_modal_for_second_file" data-filedataid="'.$emma_get_data_id.'" data-basesixtyfour="'.$emma_get_basesixty_four.'"></i>';
                                    }elseif($emma_get_file_type == 'docx' || $emma_get_file_type == 'doc'){
                                        echo '<i class="far fa-file-word ms-3 fa-4x d-flex emma_view_for_files justify-content-center mt-3" style="color:#007ffb;" data-thisfilesid="'.$emma_get_data_id.'" id="emma_load_school_details" data-type="'.$emma_get_file_type.'" data-bs-toggle="modal" data-bs-target="#emma_modal_for_second_file" data-filedataid="'.$emma_get_data_id.'" data-basesixtyfour="'.$emma_get_basesixty_four.'"></i>';
                                    }elseif($emma_get_file_type == 'xlsx' || $emma_get_file_type == 'xls'){
                                        echo '<i class="far fa-file-excel ms-3 fa-4x d-flex emma_view_for_files justify-content-center mt-3" style="color:#007ffb;" data-thisfilesid="'.$emma_get_data_id.'" id="emma_load_school_details" data-type="'.$emma_get_file_type.'" data-bs-toggle="modal" data-bs-target="#emma_modal_for_second_file" data-filedataid="'.$emma_get_data_id.'" data-basesixtyfour="'.$emma_get_basesixty_four.'"></i>';
                                    }elseif($emma_get_file_type == 'html' || $emma_get_file_type == 'htm'){
                                        echo '<i class="fab fa-html5 ms-3 fa-4x d-flex emma_view_for_files justify-content-center mt-3" style="color:#007ffb;" data-thisfilesid="'.$emma_get_data_id.'" id="emma_load_school_details" data-type="'.$emma_get_file_type.'" data-bs-toggle="modal" data-bs-target="#emma_modal_for_second_file" data-filedataid="'.$emma_get_data_id.'" data-basesixtyfour="'.$emma_get_basesixty_four.'"></i>';
                                    }elseif($emma_get_file_type == 'odt'){
                                        echo '<i class="far fa-file-alt ms-3 fa-4x d-flex emma_view_for_files justify-content-center mt-3" style="color:#007ffb;" data-thisfilesid="'.$emma_get_data_id.'" id="emma_load_school_details" data-type="'.$emma_get_file_type.'" data-bs-toggle="modal" data-bs-target="#emma_modal_for_second_file" data-filedataid="'.$emma_get_data_id.'" data-basesixtyfour="'.$emma_get_basesixty_four.'"></i>';
                                    }elseif($emma_get_file_type == 'ods'){
                                        echo '<i class="far fa-file-spreadsheet ms-3 fa-4x d-flex emma_view_for_files justify-content-center mt-3" style="color:#007ffb;" data-thisfilesid="'.$emma_get_data_id.'" id="emma_load_school_details" data-type="'.$emma_get_file_type.'" data-bs-toggle="modal" data-bs-target="#emma_modal_for_second_file" data-filedataid="'.$emma_get_data_id.'" data-basesixtyfour="'.$emma_get_basesixty_four.'"></i>';
                                    }elseif($emma_get_file_type == 'ppt' || $emma_get_file_type == 'pptx'){
                                        echo '<i class="far fa-file-powerpoint ms-3 fa-4x d-flex emma_view_for_files justify-content-center mt-3" style="color:#007ffb;" data-thisfilesid="'.$emma_get_data_id.'" id="emma_load_school_details" data-type="'.$emma_get_file_type.'" data-bs-toggle="modal" data-bs-target="#emma_modal_for_second_file" data-filedataid="'.$emma_get_data_id.'" data-basesixtyfour="'.$emma_get_basesixty_four.'"></i>';
                                    }elseif($emma_get_file_type == 'PNG' || $emma_get_file_type == 'JPEG'|| $emma_get_file_type == 'JPG' || $emma_get_file_type == 'GIF' || $emma_get_file_type == 'png' || $emma_get_file_type == 'jpg' || $emma_get_file_type == 'jpeg' || $emma_get_file_type == 'gif'){
                                        echo '<div align="center">
                                        <img src="'.$emma_get_basesixty_four.'" alt="" style="width: 80%;" data-thisimageid="'.$emma_get_data_id.'" class="emma_view_for_image" data-bs-toggle="modal" data-bs-target="#emma_modal_for_second_file">
                                        </div>';
                                    }else{

                                    }
                                    echo '<p class="text-center mt-1" style="cursor:pointer; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" id="emma_load_school_details" data-bs-toggle="modal" data-bs-target="#emma_load_modal_content" data-type="'.$emma_get_file_type.'" data-filedataid="'.$emma_get_data_id.'" data-basesixtyfour="'.$emma_get_basesixty_four.'">'.$emma_get_file_name.'</p>
                                            
                                </div>
                            </div>
                        </div>';

                }while($select_for_files_table_fetch = mysqli_fetch_assoc($select_for_files_table_query));

            echo '<div></div>';
        }
        else
        {
            echo '<div class="row">
                    <div class="col">
                        <h6 class="card-title mt-5 text-primary" data-bs-toggle="modal" data-bs-target="#emma_open_modal_for_second_file" ><i class="fas fa-plus-circle" style="color:#007ffb;"> </i>FILES</h6> 
                    </div>
                    <div class="col text-end"></div>
                </div>

                <div align="center">
                    <img src="'.$fetch_image_files_from_default_images.'" alt="" style="color:#007ffb; width:20%"  data-bs-toggle="modal" data-bs-target="#emma_open_modal_for_second_file">
                </div>';
        }

    if(isset($_POST['emma_collect_staff_data'])){

        $User_stautus = $_POST['emma_collect_staff_data'];

            if( $User_stautus == 'staff'){

                $select_for_first_file_staff_details_for_view = "SELECT * FROM `staff` WHERE `InstitutionID` = '$emma_institution' ORDER BY StaffFirstName ASC";
                $select_for_first_file_staff_details_query_for_view = mysqli_query($link, $select_for_first_file_staff_details_for_view);
                $select_for_first_file_staff_details_fetch_for_view = mysqli_fetch_assoc($select_for_first_file_staff_details_query_for_view);
                $select_for_first_file_staff_details_number_of_rows_for_view = mysqli_num_rows($select_for_first_file_staff_details_query_for_view);


                if($select_for_first_file_staff_details_number_of_rows_for_view > 0){

                    echo '<div class="row mt-2">';
                        do{
                            $emma_fetch_staff_details_data_id = $select_for_first_file_staff_details_fetch_for_view['StaffID'];
                            $emma_fetch_staff_details_first_name = $select_for_first_file_staff_details_fetch_for_view['StaffFirstName'];
                            $emma_fetch_staff_details_middle_name = $select_for_first_file_staff_details_fetch_for_view['StaffMiddleName'];
                            $emma_fetch_staff_details_last_name = $select_for_first_file_staff_details_fetch_for_view['StaffLastName'];
                            $emma_fetch_staff_details_gender = $select_for_first_file_staff_details_fetch_for_view['StaffGender'];
                            $emma_fetch_staff_details_phone_number = $select_for_first_file_staff_details_fetch_for_view['StaffMainNumber'];
                            // $emma_fetch_parent_whatsapp_number = $select_for_first_file_staff_details_fetch_for_view['ParentWhatsappNumber'];
                            $emma_fetch_staff_details_email = $select_for_first_file_staff_details_fetch_for_view['StaffEmail'];
                            $emma_fetch_staff_details_gender = $select_for_first_file_staff_details_fetch_for_view['StaffGender'];
                            $emma_fetch_staff_details_home_address = $select_for_first_file_staff_details_fetch_for_view['StaffAddress'];

                            echo '<div class="col-lg-3 col-md-6 emma_second_div_for_second_file_pagination">
                                    <div class="card mt-3" style="border-radius:10px; border: 1px #4BB543 solid; z-index: 1;">
                                        <div class="card-body">';

                                            if($emma_institution === '0'){

                                            }else{
                                                echo'<span class="float-end">
                                                    <div class="dropdown">
                                                        <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                                            style="float: right;">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 22px;"></i>
                                                        </span>
                                                
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">
                                                            <li>
                                                                <a href="#" class="btn btn-sm btn-icon fw-bold emma_download_second_file dropdown-item" data-idfordownload="'.$emma_fetch_staff_details_data_id.'" data-toggle="tooltip" > <i class="fas fa-download aria-hidden="true"></i> Download</a>
                                                            </li>
                                                            
                                                            <li>
                                                                <a href="#" style="color: blue; font-weight:bold;" id="staff_view_icon_for_second_file" data-staffid="'.$emma_fetch_staff_details_data_id.'" data-bs-toggle="modal" id="" data-bs-target="#openstaffdetail" class="dropdown-item"> <i class="fas fa-eye" style="color: blue;" aria-hidden="true"></i> View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </span>';
                                            }
                                                echo '<i class="far fa-file-pdf ms-3 fa-4x d-flex justify-content-center mt-3" style="color:#007ffb;" id="" data-bs-toggle="modal" data-bs-target="#emma_load_modal_content"></i>
                                                <p class="text-center mt-1" style="cursor:pointer; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" id="" data-bs-toggle="modal" data-bs-target="#openstaffdetail">'.$emma_fetch_staff_details_first_name.' '.$emma_fetch_staff_details_last_name.'</p>  
                                        </div>
                                    </div>
                                </div>';
                        }while($select_for_first_file_staff_details_fetch_for_view = mysqli_fetch_assoc($select_for_first_file_staff_details_query_for_view));
                        echo '</div class="">';
                }else{
                    
                }
            }elseif($User_stautus == 'parents'){

                $emma_select_for_parents_for_view = "SELECT * FROM `parent` WHERE `InstitutionID` = '$emma_institution' ORDER BY ParentFirstName ASC";
                $emma_select_for_parents_query_for_view = mysqli_query($link, $emma_select_for_parents_for_view);
                $emma_select_for_parents_fetch_for_view = mysqli_fetch_assoc($emma_select_for_parents_query_for_view);
                $emma_select_for_parents_rows_for_view = mysqli_num_rows($emma_select_for_parents_query_for_view);

                if($emma_select_for_parents_rows_for_view > 0){

                    echo '<div class="row mt-2">';
                
                    do{
                        $emma_fetch_parent_data_id = $emma_select_for_parents_fetch_for_view['ParentID'];
                        $emma_fetch_parent_first_name = $emma_select_for_parents_fetch_for_view['ParentFirstName'];
                        $emma_fetch_parent_middle_name = $emma_select_for_parents_fetch_for_view['ParentMiddleName'];
                        $emma_fetch_parent_last_name = $emma_select_for_parents_fetch_for_view['ParentLastName'];
                        $emma_fetch_parent_gender = $emma_select_for_parents_fetch_for_view['ParentGender'];
                        $emma_fetch_parent_phone_number = $emma_select_for_parents_fetch_for_view['ParentMainPhoneNumber'];
                        // $emma_fetch_parent_whatsapp_number = $emma_select_for_parents_fetch_for_view['ParentWhatsappNumber'];
                        $emma_fetch_parent_email = $emma_select_for_parents_fetch_for_view['ParentEmail'];
                        $emma_fetch_parent_city = $emma_select_for_parents_fetch_for_view['ParentCity'];
                        $emma_fetch_parent_home_address = $emma_select_for_parents_fetch_for_view['ParentHomeAddress'];


                        echo '<div class="col-lg-3 col-md-6">
                                <div class="card mt-3" style="border-radius:10px; border: 1px #4BB543 solid; z-index: 1;">
                                    <div class="card-body">';

                                        if($emma_institution === '0'){

                                        }else{
                                            echo'<span class="float-end">
                                                <div class="dropdown">
                                                    <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                                        style="float: right;">
                                                        <i class="bx bx-dots-vertical-rounded" style="font-size: 22px;"></i>
                                                    </span>
                                            
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">
                                                        <li>
                                                            <a href="#" class="btn btn-sm btn-icon fw-bold emma_download_second_file dropdown-item" data-idfordownload="'.$emma_fetch_parent_data_id.'" data-toggle="tooltip" > <i class="fas fa-download aria-hidden="true"></i> Download</a>
                                                        </li>
                                                        
                                                        <li>
                                                            <a href="#" class="dropdown-item emma_view_icon_for_parent" style="color: blue; font-weight:bold;" id="parent_view_icon_for_second_file" data-bs-toggle="modal" id="" data-bs-target="#emma_load_modal_content_for_parent" data-parentid="'.$emma_fetch_parent_data_id.'" class="dropdown-item"> <i class="fas fa-eye" style="color: blue;" aria-hidden="true"></i> View</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </span>';
                                        }

                                            echo '<i class="far fa-file-pdf ms-3 fa-4x d-flex justify-content-center mt-3" style="color:#007ffb;" id="" data-bs-toggle="modal" data-bs-target="#"></i>
                                            <p class="text-center mt-1" style="cursor:pointer; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" id="" data-bs-toggle="modal" data-bs-target="#">'.$emma_fetch_parent_first_name.' '.$emma_fetch_parent_last_name.'</p>
                                    </div>
                                </div>
                            </div>';
                    }while($emma_select_for_parents_fetch_for_view = mysqli_fetch_assoc($emma_select_for_parents_query_for_view));
                    echo '</div>';
                }else{
                    
                }
            }elseif($User_stautus == 'students'){
                $select_for_students_for_view = "SELECT * FROM `student` INNER JOIN `campus` ON `student`.`CampusID` = `campus`.`CampusID` WHERE `campus`.`InstitutionID` = '$emma_institution' ORDER BY StudentFirstName ASC ";
                $select_for_students_query_for_view = mysqli_query($link, $select_for_students_for_view);
                $select_for_students_fetch_for_view = mysqli_fetch_assoc($select_for_students_query_for_view);
                $select_for_students_rows_for_view = mysqli_num_rows($select_for_students_query_for_view);
            
                if($select_for_students_rows_for_view > 0){
                    
                    echo '<div class="row mt-2">';
                            do{
                                $emma_get_student_data_id = $select_for_students_fetch_for_view['StudentID'];
                                $emma_get_student_first_name = $select_for_students_fetch_for_view['StudentFirstName'];
                                $emma_get_student_middle_name = $select_for_students_fetch_for_view['StudentMiddleName'];
                                $emma_get_student_last_name = $select_for_students_fetch_for_view['StudentLastName'];
                                $emma_get_student_phone_number = $select_for_students_fetch_for_view['StudentPhone'];
                                $emma_get_student_email_address = $select_for_students_fetch_for_view['StudentEmail'];
                                $emma_get_student_city = $select_for_students_fetch_for_view['StudentCity'];
                                $emma_get_student_home_address = $select_for_students_fetch_for_view['StudentAddress'];
                                $emma_get_student_campus = $select_for_students_fetch_for_view['CampusID'];

            
                                echo '<div class="col-lg-3 col-md-6">
                                <div class="card mt-3" style="border-radius:10px; border: 1px #4BB543 solid; z-index: 1;">
                                    <div class="card-body">';

                                    if($emma_institution === '0'){

                                    }else{
                                        echo'<span class="float-end">
                                            <div class="dropdown">
                                                <span class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="float: right;">
                                                    <i class="bx bx-dots-vertical-rounded" style="font-size: 22px;"></i>
                                                </span>
                                        
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size:13px;">
                                                    <li>
                                                        <a href="#" class="btn btn-sm btn-icon fw-bold emma_download_second_file dropdown-item" data-idfordownload="'.$emma_get_student_data_id.'" data-toggle="tooltip" > <i class="fas fa-download aria-hidden="true"></i> Download</a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a href="#" style="color: blue; font-weight:bold;" id="view_icon_for_second_file" data-bs-toggle="modal" id="" data-bs-target="#" class="dropdown-item"> <i class="fas fa-eye" style="color: blue;" aria-hidden="true"></i> View</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </span>';
                                    }

                                        echo '<i class="far fa-file-pdf ms-3 fa-4x d-flex justify-content-center mt-3" style="color:#007ffb;" id="student_view_icon_for_second_file" data-campus="'.$emma_get_student_campus.'" data-bs-toggle="modal" data-bs-target="#emma_load_modal_content_for_student" data-studentid="'.$emma_get_student_data_id.'"></i>
                                        <p class="text-center mt-1" style="cursor:pointer; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" id="student_view_icon_for_second_file" data-campus="'.$emma_get_student_campus.'" data-studentid="'.$emma_get_student_data_id.'" data-bs-toggle="modal" data-bs-target="#emma_load_modal_content_for_student">'.$emma_get_student_first_name.' '.$emma_get_student_last_name.'</p>
                                </div>
                            </div>
                        </div>';
                        }while($select_for_students_fetch_for_view = mysqli_fetch_assoc($select_for_students_query_for_view));
                        echo '</div>';
                }
                else
                {

                }
                    
            }
            else
            {

            }
    }
    else
    {

    }
    echo '<div id="emma_third_div_for_second_file_pagination" class="mt-5"></div>
        </div>';
?>