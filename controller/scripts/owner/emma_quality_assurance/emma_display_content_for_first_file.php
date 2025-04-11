<?php


            include("../../../config/config.php");

            $emma_receive_staff_data_id_for_modal = $_POST['emma_receive_staff'];
            $emma_receive_institution_id_for_file_details_for_modal = $_POST['emma_collects_institution_id_for_view'];

            // var datastring = "emma_receive_staff=" + emma_get_staff_id_for_view + "&emma_collects_institution_id_for_view=" + emma_get_staff_institution_for_view;


            $select_for_first_file_details = "SELECT * FROM `staff` INNER JOIN `institution` ON `staff`.`InstitutionID` = `institution`.`InstitutionID` WHERE `staff`.`InstitutionID` = '$emma_receive_institution_id_for_file_details_for_modal' AND `institution`.`InstitutionID` = '$emma_receive_institution_id_for_file_details_for_modal' AND `StaffID` = '$emma_receive_staff_data_id_for_modal' LIMIT 1";
            $select_for_first_file_details_query = mysqli_query($link, $select_for_first_file_details);
            $select_for_first_file_details_fetch = mysqli_fetch_assoc($select_for_first_file_details_query);
            $select_for_first_file_details_number_of_rows = mysqli_num_rows($select_for_first_file_details_query);

            if($select_for_first_file_details_number_of_rows > 0){

                
                do{

                    $emma_fetching_staff_id = $select_for_first_file_details_fetch['StaffID'];
                    $emma_fetching_first_name = $select_for_first_file_details_fetch['StaffFirstName'];
                    $emma_fetching_middle_name = $select_for_first_file_details_fetch['StaffMiddleName'];
                    $emma_fetching_last_name = $select_for_first_file_details_fetch['StaffLastName'];
                    $emma_fetching_main_number = $select_for_first_file_details_fetch['StaffMainNumber'];
                    $emma_fetching_state_of_origin = $select_for_first_file_details_fetch['StaffState'];
                    $emma_fetching_country = $select_for_first_file_details_fetch['StaffCountry'];
                    $emma_fetching_local_government_area = $select_for_first_file_details_fetch['StaffLga'];
                    $emma_fetching_role_or_position_held = $select_for_first_file_details_fetch['Role'];
                    $emma_fetching_whatsapp_number = $select_for_first_file_details_fetch['StaffWhatsappNumber'];
                    $emma_fetching_staff_address = $select_for_first_file_details_fetch['StaffAddress'];
                    $emma_fetching_school_name = $select_for_first_file_details_fetch['InstitutionGeneralName'];
                    $emma_fetching_staff_email = $select_for_first_file_details_fetch['StaffEmail'];
                    $emma_fetching_staff_date = $select_for_first_file_details_fetch['Staffdate_employed'];
                    $emma_fetching_staff_url = $select_for_first_file_details_fetch['Staff_URL'];
                    $emma_fetching_staff_gender = $select_for_first_file_details_fetch['StaffGender'];
                    $emma_fetching_staff_hobbies = explode(',',$select_for_first_file_details_fetch['StaffHobbies']);
                    $emma_fetching_date_hired = $select_for_first_file_details_fetch['StaffDOB'];
                    $emma_fetching_staff_country = $select_for_first_file_details_fetch['StaffPhoto'];  

                    // Convert the string date to a DateTime object
                    $startDate = DateTime::createFromFormat('d/m/Y', $emma_fetching_date_hired);
                    $endDate = new DateTime();

                    // Calculate the difference between the two dates
                    $interval = $startDate->diff($endDate);

                    // Get the difference in years and months
                    $years = $interval->y;
                    $months = $interval->m;

                    $select_for_countries = "SELECT * FROM `countries` WHERE `countryID` = '$emma_fetching_country'";
                    $select_for_countries_query = mysqli_query($link, $select_for_countries);
                    $select_for_countries_fetch = mysqli_fetch_assoc($select_for_countries_query);
                    $select_for_countries_rows = mysqli_num_rows($select_for_countries_query);

                    if($select_for_countries_rows > 0){
                        $emma_get_country_name = $select_for_countries_fetch['CountryName'];
                    }else{

                    }

                    $select_for_state = "SELECT * FROM `states` WHERE `countryID` = '$emma_fetching_country' AND `StateID` = '$emma_fetching_state_of_origin'";
                    $select_for_state_query = mysqli_query($link, $select_for_state);
                    $select_for_state_fetch = mysqli_fetch_assoc($select_for_state_query);
                    $select_for_state_rows = mysqli_num_rows($select_for_state_query);

                    if($select_for_state_rows > 0){
                        $emma_get_state_name = $select_for_state_fetch['StateName'];
                    }else{

                    }

                    $select_for_city = "SELECT * FROM `cities` WHERE `countryID` = '$emma_fetching_country' AND `StateID` = '$emma_fetching_state_of_origin' AND `CityID` = '$emma_fetching_local_government_area'";
                    $select_for_city_query = mysqli_query($link, $select_for_city);
                    $select_for_city_fetch = mysqli_fetch_assoc($select_for_city_query);
                    $select_for_city_rows = mysqli_num_rows($select_for_city_query);

                    if($select_for_city_rows > 0){
                        $emma_get_city_name = $select_for_city_fetch['CityName'];
                    }else{

                    }

                    $select_for_subject_and_class = "SELECT DISTINCT classtemplate.`ClassTemplateID`,classtemplate.`ClassTemplateName` FROM `courseorsubjectallocation` INNER JOIN subjectorcourse ON `courseorsubjectallocation`.`SubjectOrCourseID` = `subjectorcourse`.`SubjectOrCourseID` INNER JOIN `classordepartment` ON `courseorsubjectallocation`.`ClassOrDepartmentID` = `classordepartment`.`ClassOrDepartmentID` INNER JOIN `classtemplate` ON `classordepartment`.`ClassTemplateID` = `classtemplate`.`ClassTemplateID` WHERE `courseorsubjectallocation`.`CourseOrSubjectTeacherUserID` = '$emma_fetching_staff_id'";
                    $select_for_subject_and_class_query = mysqli_query($link, $select_for_subject_and_class);
                    $select_for_subject_and_class_fetch = mysqli_fetch_assoc($select_for_subject_and_class_query);
                    $select_for_subject_and_class_rows = mysqli_num_rows($select_for_subject_and_class_query);

                echo '
            
                <input type="hidden" id="emma_folder_id_for_file_details">
                    <div class="row emma_loadcontent_for_download" data-thisdataidforpdf="'.$emma_fetching_staff_id.'" id="emma_modal_content_for_convert'.$emma_fetching_staff_id.'" data-staff="emma_file_staff_name'.$emma_fetching_staff_id.'">

                        <div class="col-4 ms-3 p-3" style="background-color:#007ffb;">
                            <img src="'.$emma_fetching_staff_country.'" alt="" style="width: 50%;">
                            <h5 class="mt-5 text-white">Contact</h5>
                            <h6 class="text-white" id="emma_email_for_first_file">'.$emma_fetching_staff_email.'</h6>
                            <h6 class="text-white" id="emma_phone_number_for_first_file">'.$emma_fetching_main_number.'<br>(Phone)</h6>
                            <h6 class="text-white" id="emma_whatsapp_number_for_first_file">'.$emma_fetching_whatsapp_number.'<br>(WhatsApp)</h6>
                            <h6 class="text-white" id="emma_profile_link_for_first_file">'.$emma_fetching_staff_url.'<br>(EduMESS)</h6>
                            <h5 class="text-white mt-4" id=""><br>Hobbies</h6>';

                            foreach ($emma_fetching_staff_hobbies as $hobbies) {
                                echo '<div style="font-size:14px;" class="text-white">'.$hobbies.'</div>';
                            }
                        echo '</div>
                    
                                <div class="col-7 p-3 ms-3">
                                    <div>
                                        <h2 class="mt-1 text-dark" id="emma_file_staff_name'.$emma_fetching_staff_id.'">'.$emma_fetching_first_name.' '.$emma_fetching_middle_name.' '.$emma_fetching_last_name.'</h2>
                                        <h6 class="text-dark mt-1">Position Held: '.$emma_fetching_role_or_position_held.'</h5>
                                        <h6 class="text-secondary" id="emma_school_location_for_first_file">'.$emma_get_city_name.','.$emma_get_state_name.','.$emma_get_country_name.'</h6>

                                    </div>
                                <div>
                                <h4 class="text-dark mt-5">Experience</h4>

                                <h6 class="text-dark" id="emma_studied_school_name_for_first_file">'.$emma_fetching_school_name.' </h6>
                                <h6 class="text-dark mt-1" id="emma_year_started_and_ended">'.$years.' years, '.$months.' months</h6>
                                <h6 class="text-dark mt-1">Position Held: '.$emma_fetching_role_or_position_held.'</h5>
                                <h6 class="text-dark mt-1">'.$emma_get_country_name.'</h6>';

                                if($select_for_subject_and_class_rows > 0){

                                    do{
                                            $emma_get_subject_or_course_department_id = $select_for_subject_and_class_fetch['ClassTemplateID'];
                                            $emma_get_subject_or_course_department_name = $select_for_subject_and_class_fetch['ClassTemplateName'];

                                        
                                            echo '<h6 class="text-dark" id="">'.$emma_get_subject_or_course_department_name.' </h6>';
                                

                                        $select_for_subject_list = "SELECT DISTINCT `subjectorcourse`.`SubjectOrCourseTitle`,`subjectorcourse`.`SubjectOrCourseID` FROM `subjectorcourse` INNER JOIN `courseorsubjectallocation` ON `subjectorcourse`.`SubjectOrCourseID` = `courseorsubjectallocation`.`SubjectOrCourseID` WHERE `subjectorcourse`.`ClassTemplateID` = '$emma_get_subject_or_course_department_id' AND `courseorsubjectallocation`.`CourseOrSubjectTeacherUserID` = '$emma_fetching_staff_id'";
                                        $select_for_subject_list_query = mysqli_query($link, $select_for_subject_list);
                                        $select_for_subject_list_fetch = mysqli_fetch_assoc($select_for_subject_list_query);
                                        $select_for_subject_list_rows = mysqli_num_rows($select_for_subject_list_query);

                                        if($select_for_subject_list_rows > 0){

                                                
                                                do{

                                                $emma_fetch_subjects_for_class = $select_for_subject_list_fetch['SubjectOrCourseTitle'].'<br>';

                                                echo '<h6 class="text-secondary" id="">'.$emma_fetch_subjects_for_class.' </h6>';

                                                }while($select_for_subject_list_fetch = mysqli_fetch_assoc($select_for_subject_list_query));
                                        }
                                        else{

                                        }

                                    }while($select_for_subject_and_class_fetch = mysqli_fetch_assoc($select_for_subject_and_class_query));
                                    
                                }else{
                                    
                                }
                        echo'</div>
                        </div>
                    </div>

                        <div class="modal-footer">
                            
                        </div>';
                }while($select_for_first_file_details_fetch = mysqli_fetch_assoc($select_for_first_file_details_query));

            }else{
                
            }


?>