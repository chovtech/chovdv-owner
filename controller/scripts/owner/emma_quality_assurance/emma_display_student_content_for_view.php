<?php

    include("../../../config/config.php");

    
    $emma_receive_student_data_id_for_modal = $_POST['emma_receive_student'];
    $emma_receive_institution_id_for_student_view = $_POST['emma_collects_student_institution_id_for_view'];
    $emma_receive_campus_id_for_view = $_POST['emma_campus_id_for_view'];

    $select_for_session = "SELECT * FROM `session` WHERE `sessionStatus` = 1";
    $select_for_session_query = mysqli_query($link, $select_for_session);
    $select_for_session_fetch = mysqli_fetch_assoc($select_for_session_query);
    $select_for_session_rows = mysqli_num_rows($select_for_session_query);

    if($select_for_session_rows > 0){
        $emma_fetch_session_name = $select_for_session_fetch['sessionName'];
    }else{

    }

    $select_for_student_view = "SELECT * FROM `student` INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID` INNER JOIN `classordepartment` ON `classordepartmentstudentallocation`.`ClassOrDepartmentID` = `classordepartment`.`ClassOrDepartmentID` WHERE `student`.`CampusID` = '$emma_receive_campus_id_for_view' AND `classordepartment`.`CampusID` = '$emma_receive_campus_id_for_view' AND `classordepartmentstudentallocation`.`CampusID` = '$emma_receive_campus_id_for_view' AND `student`.`StudentID` = '$emma_receive_student_data_id_for_modal' AND `classordepartmentstudentallocation`.`Session` = '$emma_fetch_session_name' ";
    $select_for_student_view_query = mysqli_query($link, $select_for_student_view);
    $select_for_student_view_fetch = mysqli_fetch_assoc($select_for_student_view_query);
    $select_for_student_view_rows = mysqli_num_rows($select_for_student_view_query);

    
    if($select_for_student_view_rows > 0){

        
        
        do{
            $emma_fetching_student_id = $select_for_student_view_fetch['StudentID'];
            $emma_fetching_student_first_name = $select_for_student_view_fetch['StudentFirstName'];
            $emma_fetching_student_middle_name = $select_for_student_view_fetch['StudentMiddleName'];
            $emma_fetching_student_last_name = $select_for_student_view_fetch['StudentLastName'];
            $emma_fetching_student_main_number = $select_for_student_view_fetch['StudentPhone'];
            $emma_fetching_student_email = $select_for_student_view_fetch['StudentEmail'];
            $emma_fetching_student_country = $select_for_student_view_fetch['StudentCountry'];
            $emma_fetching_student_local_government_area = $select_for_student_view_fetch['StudentLga'];
            $emma_fetching_student_type = $select_for_student_view_fetch['StudentTypeBoardingOrDay'];
            $emma_fetching_student_address = $select_for_student_view_fetch['StudentAddress'];
            $emma_fetching_student_city = $select_for_student_view_fetch['StudentCity'];
            $emma_fetching_student_session = $select_for_student_view_fetch['Session'];
            $emma_fetching_student_class_name = $select_for_student_view_fetch['ClassOrDepartmentName'];
            $emma_fetching_student_gender = $select_for_student_view_fetch['StudentGender'];
            $emma_fetching_student_religion = $select_for_student_view_fetch['StudentReligion'];
            $emma_fetching_student_photo = $select_for_student_view_fetch['StudentPhoto'];
            // $emma_fetching_office_address = $select_for_student_view_fetch['ParentOfficeAddress'];  

            // Convert the string date to a DateTime object
            // $startDate = DateTime::createFromFormat('d/m/Y', $emma_fetching_date_hired);
            // $endDate = new DateTime();

            // Calculate the difference between the two dates
            // $interval = $startDate->diff($endDate);

            // Get the difference in years and months
            // $years = $interval->y;
            // $months = $interval->m;

            $select_for_student_countries = "SELECT * FROM `countries` WHERE `countryID` = '$emma_fetching_student_country'";
            $select_for_student_countries_query = mysqli_query($link, $select_for_student_countries);
            $select_for_student_countries_fetch = mysqli_fetch_assoc($select_for_student_countries_query);
            $select_for_student_countries_rows = mysqli_num_rows($select_for_student_countries_query);

            if($select_for_student_countries_rows > 0){
                $emma_get_student_country_name = $select_for_student_countries_fetch['CountryName'];
            }else{
                $emma_get_student_country_name = '';

            }

            $select_for_student_state = "SELECT * FROM `states` WHERE `countryID` = '$emma_fetching_student_country' AND `StateID` = '$emma_fetching_student_city'";
            $select_for_student_state_query = mysqli_query($link, $select_for_student_state);
            $select_for_student_state_fetch = mysqli_fetch_assoc($select_for_student_state_query);
            $select_for_student_state_rows = mysqli_num_rows($select_for_student_state_query);

            if($select_for_student_state_rows > 0){
                $emma_get_student_state_name = $select_for_student_state_fetch['StateName'];
            }else{
                $emma_get_student_state_name = '';
            }

            $select_for_student_city = "SELECT * FROM `cities` WHERE `countryID` = '$emma_fetching_student_country' AND `StateID` = '$emma_fetching_student_city' AND `CityID` = '$emma_fetching_student_local_government_area'";
            $select_for_student_city_query = mysqli_query($link, $select_for_student_city);
            $select_for_student_city_fetch = mysqli_fetch_assoc($select_for_student_city_query);
            $select_for_student_city_rows = mysqli_num_rows($select_for_student_city_query);

            if($select_for_student_city_rows > 0){
                $emma_get_student_city_name = $select_for_student_city_fetch['CityName'];
            }else{
                $emma_get_student_city_name = '';
            }

            // $select_for_student_id = "SELECT * FROM `classordepartmentstudentallocation` WHERE `StudentID` = '$emma_fetching_student_id'";
            // $select_for_student_id_query = mysqli_query($link, $select_for_student_id);
            // $select_for_student_id_fetch = mysqli_fetch_assoc($select_for_student_id_query);
            // $select_for_student_id_rows = mysqli_num_rows($select_for_student_id_query);

            // if($select_for_student_id_rows > 0){
            //     $emma_get_student_id = $select_for_student_id_fetch[''];
            // }else{
            //     $emma_get_student_id = '';

            // }
            // $select_for_subject_and_class = "SELECT DISTINCT classtemplate.`ClassTemplateID`,classtemplate.`ClassTemplateName` FROM `courseorsubjectallocation` INNER JOIN subjectorcourse ON `courseorsubjectallocation`.`SubjectOrCourseID` = `subjectorcourse`.`SubjectOrCourseID` INNER JOIN `classordepartment` ON `courseorsubjectallocation`.`ClassOrDepartmentID` = `classordepartment`.`ClassOrDepartmentID` INNER JOIN `classtemplate` ON `classordepartment`.`ClassTemplateID` = `classtemplate`.`ClassTemplateID` WHERE `courseorsubjectallocation`.`CourseOrSubjectTeacherUserID` = '$emma_fetching_staff_id'";
            // $select_for_subject_and_class_query = mysqli_query($link, $select_for_subject_and_class);
            // $select_for_subject_and_class_fetch = mysqli_fetch_assoc($select_for_subject_and_class_query);
            // $select_for_subject_and_class_rows = mysqli_num_rows($select_for_subject_and_class_query);

        echo '
    
        <input type="hidden" id="emma_folder_id_for_file_details">
            <div class="row emma_loadcontent_for_download" data-thisdataidforpdf="'.$emma_fetching_student_id.'" id="emma_modal_content_for_convert'.$emma_fetching_student_id.'" data-parent="emma_file_staff_name'.$emma_fetching_student_id.'">

                <div class="col-4 ms-3 p-3" style="background-color:#007ffb;">
                    <img src="'.$emma_fetching_student_photo.'" alt="" style="width: 50%;">
                    <h5 class="mt-5 text-white">Contact</h5>
                    <h6 class="text-white" id="emma_email_for_first_file">'.$emma_fetching_student_email.'</h6>
                    <h6 class="text-white" id="emma_phone_number_for_first_file">'.$emma_fetching_student_main_number.'<br>(Phone)</h6>';

                echo '</div>
            
                        <div class="col-7 p-3 ms-3">
                            <div>
                                <h2 class="mt-1 text-dark" id="'.$emma_fetching_student_id.'">'.$emma_fetching_student_first_name.' '.$emma_fetching_student_middle_name.' '.$emma_fetching_student_last_name.'</h2>
                                <h6 class="text-dark mt-1"></h5>
                                <h6 class="text-secondary" id="emma_school_location_for_first_file">'.$emma_fetching_student_local_government_area.','.$emma_get_student_state_name.','.$emma_get_student_country_name.'</h6>
                                <h6 class="text-secondary" id="">Gender: '.$emma_fetching_student_gender.'</h6>
                                <h6 class="text-secondary">Student Type: '.$emma_fetching_student_type.'</h6>

                            </div>
                        <div>
                        <h4 class="text-dark mt-5">Level</h4>
                        <h6 class="text-secondary">Session: '.$emma_fetching_student_session.'</h6>
                        <h6 class="text-secondary">Class: '.$emma_fetching_student_class_name.'</h6>



                        <h4 class="text-dark mt-5">Address</h4>

                        <h6 class="text-dark mt-1">Home Address: '.$emma_fetching_student_address.'</h5>';

                echo'</div>
                </div>
            </div>
                <div class="modal-footer">
                    
                </div>';
        }while($select_for_student_view_fetch = mysqli_fetch_assoc($select_for_student_view_query));

    }else{
        
    }


?>