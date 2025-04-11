<?php

    include("../../../config/config.php");


    $emma_receive_parent_data_id_for_modal = $_POST['emma_receive_parent'];
    $emma_receive_institution_id_for_parent_view = $_POST['emma_collects_institution_id_for_view'];



    $select_for_parent_view = "SELECT * FROM `parent` INNER JOIN `institution` ON `parent`.`InstitutionID` = `institution`.`InstitutionID` WHERE `parent`.`InstitutionID` = '$emma_receive_institution_id_for_parent_view' AND `institution`.`InstitutionID` = '$emma_receive_institution_id_for_parent_view' AND `ParentID` = '$emma_receive_parent_data_id_for_modal' LIMIT 1";
    $select_for_parent_view_query = mysqli_query($link, $select_for_parent_view);
    $select_for_parent_view_fetch = mysqli_fetch_assoc($select_for_parent_view_query);
    $select_for_parent_view_rows = mysqli_num_rows($select_for_parent_view_query);

    
    if($select_for_parent_view_rows > 0){

        
        do{

            $emma_fetching_parent_id = $select_for_parent_view_fetch['ParentID'];
            $emma_fetching_parent_first_name = $select_for_parent_view_fetch['ParentFirstName'];
            $emma_fetching_parent_middle_name = $select_for_parent_view_fetch['ParentMiddleName'];
            $emma_fetching_parent_last_name = $select_for_parent_view_fetch['ParentLastName'];
            $emma_fetching_parent_main_number = $select_for_parent_view_fetch['ParentMainPhoneNumber'];
            $emma_fetching_parent_state_of_origin = $select_for_parent_view_fetch['ParentState'];
            $emma_fetching_parent_country = $select_for_parent_view_fetch['ParentCountry'];
            $emma_fetching_parent_local_government_area = $select_for_parent_view_fetch['ParentLga'];
            $emma_fetching_parent_whatsapp_number = $select_for_parent_view_fetch['ParentWhatsappNumber'];
            $emma_fetching_parent_address = $select_for_parent_view_fetch['ParentHomeAddress'];
            $emma_fetching_parent_photo = $select_for_parent_view_fetch['ParentPhoto'];
            $emma_fetching_parent_email = $select_for_parent_view_fetch['ParentEmail'];
            $emma_fetching_parent_title = $select_for_parent_view_fetch['ParentTitle'];
            $emma_fetching_parent_gender = $select_for_parent_view_fetch['ParentGender'];
            // $emma_fetching_parent_hobbies = explode(',',$select_for_parent_view_fetch['StaffHobbies']);
            $emma_fetching_parent_occupation = $select_for_parent_view_fetch['ParentOccupation'];
            $emma_fetching_office_address = $select_for_parent_view_fetch['ParentOfficeAddress'];  

            // Convert the string date to a DateTime object
            // $startDate = DateTime::createFromFormat('d/m/Y', $emma_fetching_date_hired);
            // $endDate = new DateTime();

            // Calculate the difference between the two dates
            // $interval = $startDate->diff($endDate);

            // Get the difference in years and months
            // $years = $interval->y;
            // $months = $interval->m;

            $select_for_parent_countries = "SELECT * FROM `countries` WHERE `countryID` = '$emma_fetching_parent_country'";
            $select_for_parent_countries_query = mysqli_query($link, $select_for_parent_countries);
            $select_for_parent_countries_fetch = mysqli_fetch_assoc($select_for_parent_countries_query);
            $select_for_parent_countries_rows = mysqli_num_rows($select_for_parent_countries_query);

            if($select_for_parent_countries_rows > 0){
                $emma_get_parent_country_name = $select_for_parent_countries_fetch['CountryName'];
            }else{
                $emma_get_parent_country_name = '';

            }

            $select_for_parent_state = "SELECT * FROM `states` WHERE `countryID` = '$emma_fetching_parent_country' AND `StateID` = '$emma_fetching_parent_state_of_origin'";
            $select_for_parent_state_query = mysqli_query($link, $select_for_parent_state);
            $select_for_parent_state_fetch = mysqli_fetch_assoc($select_for_parent_state_query);
            $select_for_parent_state_rows = mysqli_num_rows($select_for_parent_state_query);

            if($select_for_parent_state_rows > 0){
                $emma_get_parent_state_name = $select_for_parent_state_fetch['StateName'];
            }else{
                $emma_get_parent_state_name = '';
            }

            $select_for_parent_city = "SELECT * FROM `cities` WHERE `countryID` = '$emma_fetching_parent_country' AND `StateID` = '$emma_fetching_parent_state_of_origin' AND `CityID` = '$emma_fetching_parent_local_government_area'";
            $select_for_parent_city_query = mysqli_query($link, $select_for_parent_city);
            $select_for_parent_city_fetch = mysqli_fetch_assoc($select_for_parent_city_query);
            $select_for_parent_city_rows = mysqli_num_rows($select_for_parent_city_query);

            if($select_for_parent_city_rows > 0){
                $emma_get_parent_city_name = $select_for_parent_city_fetch['CityName'];
            }else{
                $emma_get_parent_city_name = '';
            }

            // $select_for_subject_and_class = "SELECT DISTINCT classtemplate.`ClassTemplateID`,classtemplate.`ClassTemplateName` FROM `courseorsubjectallocation` INNER JOIN subjectorcourse ON `courseorsubjectallocation`.`SubjectOrCourseID` = `subjectorcourse`.`SubjectOrCourseID` INNER JOIN `classordepartment` ON `courseorsubjectallocation`.`ClassOrDepartmentID` = `classordepartment`.`ClassOrDepartmentID` INNER JOIN `classtemplate` ON `classordepartment`.`ClassTemplateID` = `classtemplate`.`ClassTemplateID` WHERE `courseorsubjectallocation`.`CourseOrSubjectTeacherUserID` = '$emma_fetching_staff_id'";
            // $select_for_subject_and_class_query = mysqli_query($link, $select_for_subject_and_class);
            // $select_for_subject_and_class_fetch = mysqli_fetch_assoc($select_for_subject_and_class_query);
            // $select_for_subject_and_class_rows = mysqli_num_rows($select_for_subject_and_class_query);

        echo '
    
        <input type="hidden" id="emma_folder_id_for_file_details">
            <div class="row emma_loadcontent_for_download" data-thisdataidforpdf="'.$emma_fetching_parent_id.'" id="emma_modal_content_for_convert'.$emma_fetching_parent_id.'" data-parent="emma_file_staff_name'.$emma_fetching_parent_id.'">

                <div class="col-4 ms-3 p-3" style="background-color:#007ffb;">
                <img src="'.$emma_fetching_parent_photo.'" alt="" style="width: 50%;">
                    <h5 class="mt-5 text-white">Contact</h5>
                    <h6 class="text-white" id="emma_email_for_first_file">'.$emma_fetching_parent_email.'</h6>
                    <h6 class="text-white" id="emma_phone_number_for_first_file">'.$emma_fetching_parent_main_number.'<br>(Phone)</h6>
                    <h6 class="text-white" id="emma_whatsapp_number_for_first_file">'.$emma_fetching_parent_whatsapp_number.'<br>(WhatsApp)</h6>';

                echo '</div>
            
                        <div class="col-7 p-3 ms-3">
                            <div>
                                <h2 class="mt-1 text-dark" id="emma_file_staff_name'.$emma_fetching_parent_id.'">'.$emma_fetching_parent_first_name.' '.$emma_fetching_parent_middle_name.' '.$emma_fetching_parent_last_name.'</h2>
                                <h6 class="text-dark mt-1"></h5>
                                <h6 class="text-secondary" id="emma_school_location_for_first_file">'.$emma_fetching_parent_local_government_area.','.$emma_get_parent_state_name.','.$emma_get_parent_country_name.'</h6>
                                <h6 class="text-secondary" id="">Gender: '.$emma_fetching_parent_gender.'</h6>

                            </div>
                        <div>
                        <h4 class="text-dark mt-5">Experience</h4>

                        <h6 class="text-dark mt-1">Occupation: '.$emma_fetching_parent_occupation.'</h5>

                        <h4 class="text-dark mt-5">Address</h4>

                        <h6 class="text-dark mt-1">Home Address: '.$emma_fetching_parent_address.'</h5>
                        <h6 class="text-dark mt-1">Office Address: '.$emma_fetching_office_address.'</h5>';

                echo'</div>
                </div>
            </div>
                <div class="modal-footer">
                    
                </div>';
        }while($select_for_parent_view_fetch = mysqli_fetch_assoc($select_for_parent_view_query));

    }else{
        
    }


?>