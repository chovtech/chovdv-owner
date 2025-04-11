<?php

    include('../../../config/config.php');

    $campus_id = $_POST['campus_id'];
    $session = $_POST['session'];
    $positions_id = $_POST['positions_id'];

    $get_applicants = "SELECT * FROM `electionapplicants` WHERE `CampusID` = '$campus_id' AND `SessionName` = '$session' AND `PositionApplied` = '$positions_id' ";
    $get_applicants_query = mysqli_query($link, $get_applicants);
    $get_applicants_fetch = mysqli_fetch_assoc($get_applicants_query);
    $get_applicants_rows = mysqli_num_rows($get_applicants_query);

    if($get_applicants_rows > 0){
        echo '<div class="row mt-3">';

        do{
            $get_student_id = $get_applicants_fetch['StudentID'];
            $get_applied_position = $get_applicants_fetch['PositionApplied'];
            $get_status = $get_applicants_fetch['Status'];
            $get_dataid = $get_applicants_fetch['ElectionApplicantsID'];

            $get_student_details = "SELECT * FROM `student` INNER JOIN `classordepartmentstudentallocation` 
            ON `student`.`CampusID` = `classordepartmentstudentallocation`.`CampusID` AND `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID` 
            INNER JOIN `classordepartment` ON `classordepartmentstudentallocation`.`ClassOrDepartmentID` = `classordepartment`.`ClassOrDepartmentID` 
            WHERE `classordepartment`.`CampusID` = '$campus_id' AND `classordepartmentstudentallocation`.`Session` = '$session' AND 
            `student`.`StudentID` = '$get_student_id' ";

            $get_student_details_query = mysqli_query($link, $get_student_details);
            $get_student_details_fetch = mysqli_fetch_assoc($get_student_details_query);
            $get_student_details_rows = mysqli_num_rows($get_student_details_query);

            if($get_student_details_rows > 0){

                $get_student_first_name = $get_student_details_fetch['StudentFirstName'];
                $get_student_middle_name = $get_student_details_fetch['StudentMiddleName'];
                $get_student_last_name = $get_student_details_fetch['StudentLastName'];
                $get_student_date_of_birth = $get_student_details_fetch['StudentDOB'];
                $get_student_type = $get_student_details_fetch['StudentTypeBoardingOrDay'];
                $get_student_gender = $get_student_details_fetch['StudentGender'];
                $get_student_religion = $get_student_details_fetch['StudentReligion'];
                $get_student_image = $get_student_details_fetch['StudentPhoto'];
                $get_student_class = $get_student_details_fetch['ClassOrDepartmentName'];


                $get_selected_positions = "SELECT * FROM `electionpositions` WHERE `ElectionPositionID` = '$get_applied_position' ";
                $get_positions_query = mysqli_query($link, $get_selected_positions);
                $fetch_selected_position = mysqli_fetch_assoc($get_positions_query);
                $get_selected_rows = mysqli_num_rows($get_positions_query);

                if($get_selected_rows > 0){

                    $get_applied_positions = $fetch_selected_position['ElectionPositionName'];

                    echo'
                    <div class="col-lg-4 p-2">
                        <div class="card" style="border: 3px solid white; border-radius:5px;">
                            <div align="center" class="p-3" style="background-color:#D6DADD;">';
                            
                                if($get_student_image == ''){

                                    $default_images = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'defaultprofile' ";
                                    $default_images_query = mysqli_query($link, $default_images);
                                    $default_images_fetch = mysqli_fetch_assoc($default_images_query);
                                    $default_images_rows = mysqli_num_rows($default_images_query);
                                    
                                    if($default_images_rows > 0){
                                        $get_image = $default_images_fetch['BaseSixtyFour'];

                                        echo '<img src="'.$get_image.'" class="card-img-top" alt="Applicant Picutre" style="width:150px; border-radius:50px;" class="mt-2">';
                                    }else{

                                    }
                                }else{
                                    echo '<img src="'.$get_student_image.'" class="card-img-top" alt="Applicant Picutre" style="width:200px; border-radius:50px;" class="mt-2">';
                                }
                                echo'
                            </div>

                            <div class="card-body">
                                <p class="card-text text-dark">
                                    <b class="p-1">Student Name:</b> '.$get_student_first_name.' '.$get_student_last_name.'<br>
                                    <b class="p-1">Class:</b> '.$get_student_class.'<br>
                                    <b class="p-1">Position Applied:</b> '.$get_applied_positions.'<br>';
                                    if($get_status == 0){

                                        echo'<b class="p-1">Status:</b> <span class="text-warning">Pending</span>';
                                            
                                    }elseif ($get_status == 1) {

                                        echo'<b class="p-1">Status:</b> <span class="text-success">Approved</span>';
                                       
                                    }else{

                                        echo'<b class="p-1">Status:</b> <span class="text-danger">Declined</span>';

                                    }
                                    echo'
                                </p>
                                <div align="end">
                                    <small class="text-primary text-bold viewapplicantsdetails" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#view_applicants" aria-expanded="false" aria-controls="collapse_election_credentials" data-positionapplied="'.$get_applied_position.'" data-status="'.$get_status.'" data-campus="'.$campus_id.'" data-session="'.$session.'" data-positionsid="'.$positions_id.'" data-studentid="'.$get_student_id.'" data-id="'.$get_dataid.'"><i class="fas fa-eye"></i> View</small>
                                </div>
                            </div>
                        </div>
                    </div>';
                }else{
                    echo 'ten';
                }
                
            }else{

                $default_images = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2' ";
                $default_images_query = mysqli_query($link, $default_images);
                $default_images_fetch = mysqli_fetch_assoc($default_images_query);
                $default_images_rows = mysqli_num_rows($default_images_query);
                
                if($default_images_rows > 0){
                    $get_image = $default_images_fetch['BaseSixtyFour'];

                    echo '<div align="center">
                            <div class="">
                                <img src="'.$get_image.'" alt="" style="width:150px;">
                                <p class="text-primary"> No Record Found</p>
                            </div>
                        </div>';

                }else{

                }
            }

        }while($get_applicants_fetch = mysqli_fetch_assoc($get_applicants_query));

        echo '</div>';
    }else{
        $default_images = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2' ";
        $default_images_query = mysqli_query($link, $default_images);
        $default_images_fetch = mysqli_fetch_assoc($default_images_query);
        $default_images_rows = mysqli_num_rows($default_images_query);
        
        if($default_images_rows > 0){
            $get_image = $default_images_fetch['BaseSixtyFour'];

            echo '<div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div align="center">
                                    <img src="'.$get_image.'" alt="" style="width:180px;">
                                    <p class="text-primary"> Please Load To Proceed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        }else{

        }
    }

?>