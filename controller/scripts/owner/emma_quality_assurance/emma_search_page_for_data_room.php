<?php

include("../../../config/config.php");

$emma_receive_search_value = $_POST['search'];

// Check if the search term is provided
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];

    echo '<div class="card card-body fw-normal" style="width: 200px; height: 300px; overflow: auto; text-overflow: ellipsis; z-index: 1000; position:absolute; left:-14rem; margin-top:30px;">';

     // First Folder
    $select_for_search_from_firstfoldertable = "SELECT * FROM firstfoldertable WHERE `FirstFolderName` LIKE '%$emma_receive_search_value%' AND `DeleteStatus` = 0 ORDER BY `FirstFolderName` ASC ";
    $select_for_search_query_from_firstfoldertable = mysqli_query($link, $select_for_search_from_firstfoldertable);
    $select_for_search_fetch_from_firstfoldertable = mysqli_fetch_assoc($select_for_search_query_from_firstfoldertable);
    $select_for_search_rows_from_firstfoldertable = mysqli_num_rows($select_for_search_query_from_firstfoldertable);

    // Second Folder
    $select_for_search_from_secondfoldertable = "SELECT * FROM secondfoldertable WHERE `SecondFolderName` LIKE '%$emma_receive_search_value%' AND `DeleteStatus` = 0 ORDER BY `SecondFolderName` ASC ";
    $select_for_search_query_from_secondfoldertable = mysqli_query($link, $select_for_search_from_secondfoldertable);
    $select_for_search_fetch_from_secondfoldertable = mysqli_fetch_assoc($select_for_search_query_from_secondfoldertable);
    $select_for_search_rows_from_secondfoldertable = mysqli_num_rows($select_for_search_query_from_secondfoldertable);

    // Third Folder
    $select_for_search_from_thirdfoldertable = "SELECT * FROM thirdfoldertable WHERE `ThirdFolderName` LIKE '%$emma_receive_search_value%' AND `DeleteStatus` = 0 ORDER BY `ThirdFolderName` ASC ";
    $select_for_search_query_from_thirdfoldertable = mysqli_query($link, $select_for_search_from_thirdfoldertable);
    $select_for_search_fetch_from_thirdfoldertable = mysqli_fetch_assoc($select_for_search_query_from_thirdfoldertable);
   $select_for_search_rows_from_thirdfoldertable = mysqli_num_rows($select_for_search_query_from_thirdfoldertable);

    // Files
    $select_for_search_from_filestable = "SELECT * FROM filestable WHERE `FileName` LIKE '%$emma_receive_search_value%' AND `DeleteStatus` = 0 ORDER BY `FileName` ASC ";
    $select_for_search_query_from_filestable = mysqli_query($link, $select_for_search_from_filestable);
    $select_for_search_fetch_from_filestable = mysqli_fetch_assoc($select_for_search_query_from_filestable);
    $select_for_search_rows_from_filestable = mysqli_num_rows($select_for_search_query_from_filestable);

    // Display the search results

    if ($select_for_search_rows_from_firstfoldertable > 0) {
        do{

            $emma_collect_id_from_table = $select_for_search_fetch_from_firstfoldertable['FirstFolderID'];
            $emma_collect_folder_name_from_table = $select_for_search_fetch_from_firstfoldertable['FirstFolderName'];
            $emma_collect_campus_id_from_table = $select_for_search_fetch_from_firstfoldertable['CampusID'];
            $emma_collect_institution_id_from_table = $select_for_search_fetch_from_firstfoldertable['InstitutionID'];
            $emma_firstfolder_name = $select_for_search_fetch_from_firstfoldertable['FirstFolderName'];

                $firstfolderlenght = 19;

                if (strlen($emma_firstfolder_name) > $firstfolderlenght) {
                    // If yes, extract a portion of the string
                    $firstshortenedfolder = substr($emma_firstfolder_name, 0, 16) . "...";
                } else {
                    // If not, use the original string
                    $firstshortenedfolder =  $emma_firstfolder_name;
                }

            echo '<div class="row border mt-2" style="border-radius:5px;">
                    <div class="col-2 p-2">
                        <div class="mt-2 fas fa-folder text-primary"></div>
                    </div>

                    <div class="col-10 p-2">
                        <div class="mt-2 text-normal emma_main_folder_loading_card_content" style="text-overflow: ellipsis; cursor:pointer; overflow:hidden; white-space: nowrap;"
                        data-icons="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_icons" data-foldername="'.$emma_collect_folder_name_from_table.'" data-name="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content_name" data-id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content" id="'.$emma_collect_id_from_table.'emma_loading_main_folder_card_content" data-folderid="'.$emma_collect_id_from_table.'" data-campusid="'.$emma_collect_campus_id_from_table.'">'.$firstshortenedfolder.'</div>
                    </div>
                  </div>';

        }while($select_for_search_fetch_from_firstfoldertable = mysqli_fetch_assoc($select_for_search_query_from_firstfoldertable));
    }
    else
    {
        
    }


    if ($select_for_search_rows_from_secondfoldertable > 0) {
        do{
            $emma_secondfolder_name = $select_for_search_fetch_from_secondfoldertable['SecondFolderName'];
            $collect_data_id_from_second_table = $select_for_search_fetch_from_secondfoldertable['SecondFolderID'];
            $collect_id_from_second_table = $select_for_search_fetch_from_secondfoldertable['FirstFolderID'];
            $collect_name_from_second_table = $select_for_search_fetch_from_secondfoldertable['SecondFolderName'];
            $collect_campus_id_from_second_table = $select_for_search_fetch_from_secondfoldertable['CampusID'];
            $collect_incremented_id_from_table = $select_for_search_fetch_from_secondfoldertable['SecondFolderID'];
            $collect_institution_id_from_table = $select_for_search_fetch_from_secondfoldertable['InstitutionID'];


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
                $emma_staff = 'me';
            }
                $folderlenght = 19;

                if (strlen($emma_secondfolder_name) > $folderlenght) {
                    // If yes, extract a portion of the string
                    $shortenedfolder = substr($emma_secondfolder_name, 0, 16) . "...";
                } else {
                    // If not, use the original string
                    $shortenedfolder =  $emma_secondfolder_name;
                }

            echo '<div class="row border mt-2" style="border-radius:5px;">
            <div class="col-2 p-2">
                <div class="mt-2 fas fa-folder text-primary"></div>
            </div>

            <div class="col-10 p-2 ">
                <div class="mt-2 emma_second_folder_icon" style="text-overflow: ellipsis; cursor:pointer; overflow:hidden; white-space: nowrap;" data-file="pdf" data-staff="'.$emma_staff.'" data-secondfolderid="'.$collect_data_id_from_second_table.'" data-thisfoldername="'.$collect_name_from_second_table.'"  data-campusid="'.$collect_campus_id_from_second_table.'" data-secondfolderid="'.$collect_id_from_second_table.'" data-thirddataid="'.$collect_data_id_from_second_table.'">'.$shortenedfolder.'</div>
            </div>
          </div>';


        }while($select_for_search_fetch_from_secondfoldertable = mysqli_fetch_assoc($select_for_search_query_from_secondfoldertable));
    }
    else
    {
        
    }


    if ($select_for_search_rows_from_thirdfoldertable > 0) {
        do{
            $emma_third_folder_value = $select_for_search_fetch_from_thirdfoldertable['ThirdFolderName'];
            $emma_third_folder_campus = $select_for_search_fetch_from_thirdfoldertable['CampusID'];
            $emma_third_folder_data_id = $select_for_search_fetch_from_thirdfoldertable['ThirdFolderTableID'];
            $emma_third_institution_id = $select_for_search_fetch_from_thirdfoldertable['InstitutionID'];

            $folderlenghts = 19;

                if (strlen($emma_third_folder_value) > $folderlenghts) {
                    // If yes, extract a portion of the string
                    $shortenedfolders = substr($emma_third_folder_value, 0, 16) . "...";
                } else {
                    // If not, use the original string
                    $shortenedfolders =  $emma_third_folder_value;
                }

            echo '<div class="row border mt-2" style="border-radius:5px;">
            <div class="col-2 p-2">
                <div class="mt-2 fas fa-folder text-primary"></div>
            </div>

            <div class="col-10 p-2">
                <div class="mt-2 text-normal emma_name_for_third_folder" style="text-overflow: ellipsis; cursor:pointer; overflow:hidden; white-space: nowrap; data-thirdfileid="'.$emma_third_folder_data_id.'" data-thirdfilecampus="'.$emma_third_folder_campus.'" data-names="'.$emma_third_folder_value.'"">'.$shortenedfolders.'</div>
            </div>
          </div>';
            

        }while($select_for_search_fetch_from_thirdfoldertable = mysqli_fetch_assoc($select_for_search_query_from_thirdfoldertable));
    }
    else
    {
        
    }

    
        // Fetch the first row from the result set
        // $select_for_search_fetch_from_filestable = mysqli_fetch_assoc($select_for_search_query_from_filestable);
    
        // Check if a row was fetched
    if ($select_for_search_rows_from_filestable > 0) {                                               

            do {
                $emma_get_campus_id = $select_for_search_fetch_from_filestable['CampusID'];
                $emma_get_data_id = $select_for_search_fetch_from_filestable['FileTableID'];
                $emma_get_file_name = $select_for_search_fetch_from_filestable['FileName'];
                $emma_get_file_type = $select_for_search_fetch_from_filestable['FileType'];
                $emma_get_institution_id = $select_for_search_fetch_from_filestable['InstitutionID'];
                $emma_get_folder_id = $select_for_search_fetch_from_filestable['FolderID'];
                $emma_get_folder_type = $select_for_search_fetch_from_filestable['FolderType'];
                $emma_get_this_base_sixty_four = $select_for_search_fetch_from_filestable['BaseSixtyFour'];


                $filelenght = 19;

                if (strlen($emma_get_file_name) > $filelenght) {
                    // If yes, extract a portion of the string
                    $shortenedfiles = substr($emma_get_file_name, 0, 16) . "...";
                } else {
                    // If not, use the original string
                    $shortenedfiles =  $emma_get_file_name;
                }

            

            echo '<div class="row border mt-2 emma_search_details_for_file" style="border-radius:5px;" data-basesixtyfour="'.$emma_get_this_base_sixty_four.'" data-institute="'.$emma_get_institution_id.'" data-type="'.$emma_get_folder_type.'" data-file="'.$emma_get_data_id.'" data-folder="'.$emma_get_folder_id.'">
                    <div class="col-2 p-2">
                        <div class="mt-2 fas fa-file text-primary"></div>
                    </div>

                    <div class="col-10 p-2">
                        <div class="mt-2 text-normal emma_load_school_details" style="text-overflow: ellipsis; overflow:hidden; white-space: nowrap; cursor:pointer;" data-filetype="'.$emma_get_file_type.'" data-filedataid="'.$emma_get_data_id.'">'.$shortenedfiles.'</div>
                    </div>
                </div>';
            
                // echo '<div class="mt-1">'.$emma_get_file_name.'</div>';
    
            } while ($select_for_search_fetch_from_filestable = mysqli_fetch_assoc($select_for_search_query_from_filestable));
            
    } else {
        
    }
    echo '</div>';
}

// Close the database connection
mysqli_close($link);

?>
