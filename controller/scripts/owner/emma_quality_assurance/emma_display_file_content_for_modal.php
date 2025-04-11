<?php

include("../../../config/config.php");

@$emma_receives_data_id = $_POST['emma_collects_data_id'];
@$emma_receive_staff_data = $_POST['emma_send_staff_data'];
@$emma_receive_institution_id_for_file_details = $_POST['emma_collects_institution_id_for_file_details'];


if($emma_receive_staff_data == "staff"){

    $select_for_first_file_staff_details = "SELECT * FROM `staff` WHERE `InstitutionID` = '$emma_receive_institution_id_for_file_details' ORDER BY StaffFirstName ASC";
    $select_for_first_file_staff_details_query = mysqli_query($link, $select_for_first_file_staff_details);
    $select_for_first_file_staff_details_fetch = mysqli_fetch_assoc($select_for_first_file_staff_details_query);
    $select_for_first_file_staff_details_number_of_rows = mysqli_num_rows($select_for_first_file_staff_details_query);



    if($select_for_first_file_staff_details_number_of_rows > 0){

        echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">City</th>
                    <th scope="colspan="2"">Address</th>
                </tr>
            </thead>';
            do{
                $emma_fetch_staff_details_first_name = $select_for_first_file_staff_details_fetch['StaffFirstName'];
                $emma_fetch_staff_details_middle_name = $select_for_first_file_staff_details_fetch['StaffMiddleName'];
                $emma_fetch_staff_details_last_name = $select_for_first_file_staff_details_fetch['StaffLastName'];
                $emma_fetch_staff_details_gender = $select_for_first_file_staff_details_fetch['StaffGender'];
                $emma_fetch_staff_details_phone_number = $select_for_first_file_staff_details_fetch['StaffMainNumber'];
                // $emma_fetch_parent_whatsapp_number = $select_for_first_file_staff_details_fetch['ParentWhatsappNumber'];
                $emma_fetch_staff_details_email = $select_for_first_file_staff_details_fetch['StaffEmail'];
                $emma_fetch_staff_details_gender = $select_for_first_file_staff_details_fetch['StaffGender'];
                $emma_fetch_staff_details_home_address = $select_for_first_file_staff_details_fetch['StaffAddress'];

                echo '
                    <tbody>
                        <tr>
                            <td>'.$emma_fetch_staff_details_first_name.'</td>
                            <td>'.$emma_fetch_staff_details_last_name.'</td>
                            <td>'.$emma_fetch_staff_details_phone_number.'</td>
                            <td>'.$emma_fetch_staff_details_email.'</td>
                            <td>'.$emma_fetch_staff_details_gender.'</td>
                            <td colspan="2">'.$emma_fetch_staff_details_home_address.'</td>
                        </tr>
                    </tbody>';
            }while($select_for_first_file_staff_details_fetch = mysqli_fetch_assoc($select_for_first_file_staff_details_query));
        echo '</table>';
    }else{
        echo 'us';
    }

}elseif($emma_receive_staff_data == "parents"){

    $emma_select_for_parents = "SELECT * FROM `parent` WHERE `InstitutionID` = '$emma_receive_institution_id_for_file_details' ORDER BY ParentFirstName ASC";
    $emma_select_for_parents_query = mysqli_query($link, $emma_select_for_parents);
    $emma_select_for_parents_fetch = mysqli_fetch_assoc($emma_select_for_parents_query);
    $emma_select_for_parents_rows = mysqli_num_rows($emma_select_for_parents_query);

    if($emma_select_for_parents_rows > 0){

        echo '
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">City</th>
                        <th scope="colspan="2"">Address</th>
                    </tr>
                </thead>';
        do{
            $emma_fetch_parent_first_name = $emma_select_for_parents_fetch['ParentFirstName'];
            $emma_fetch_parent_middle_name = $emma_select_for_parents_fetch['ParentMiddleName'];
            $emma_fetch_parent_last_name = $emma_select_for_parents_fetch['ParentLastName'];
            $emma_fetch_parent_gender = $emma_select_for_parents_fetch['ParentGender'];
            $emma_fetch_parent_phone_number = $emma_select_for_parents_fetch['ParentMainPhoneNumber'];
            // $emma_fetch_parent_whatsapp_number = $emma_select_for_parents_fetch['ParentWhatsappNumber'];
            $emma_fetch_parent_email = $emma_select_for_parents_fetch['ParentEmail'];
            $emma_fetch_parent_city = $emma_select_for_parents_fetch['ParentCity'];
            $emma_fetch_parent_home_address = $emma_select_for_parents_fetch['ParentHomeAddress'];


        echo '
                    <tbody>
                        <tr>
                            <td>'.$emma_fetch_parent_first_name.'</td>
                            <td>'.$emma_fetch_parent_last_name.'</td>
                            <td>'.$emma_fetch_parent_phone_number.'</td>
                            <td>'.$emma_fetch_parent_email.'</td>
                            <td>'.$emma_fetch_parent_city.'</td>
                            <td colspan="2">'.$emma_fetch_parent_home_address.'</td>
                        </tr>
                    </tbody>
            ';
        }while($emma_select_for_parents_fetch = mysqli_fetch_assoc($emma_select_for_parents_query));
        echo '          </table>';
    }else{
        echo 'us';
    }
}elseif($emma_receive_staff_data == "students"){


    $select_for_students = "SELECT * FROM `student` INNER JOIN `campus` ON `student`.`CampusID` = `campus`.`CampusID` WHERE `campus`.`InstitutionID` = '$emma_receive_institution_id_for_file_details' ORDER BY StudentFirstName ASC ";
    $select_for_students_query = mysqli_query($link, $select_for_students);
    $select_for_students_fetch = mysqli_fetch_assoc($select_for_students_query);
    $select_for_students_rows = mysqli_num_rows($select_for_students_query);

    if($select_for_students_rows > 0){
        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModa">
                    Open
                        </button>
                            <div class="load_content_for_pdf">
                                <div class="modal fade" id="exampleModa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">View Student Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" id=""></div>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">First Name</th>
                                                        <th scope="col">Last Name</th>
                                                        <th scope="col">Phone Number</th>
                                                        <th scope="col">Email Address</th>
                                                        <th scope="col">City</th>
                                                        <th scope="colspan="2"">Address</th>
                                                    </tr>
                                                </thead>';
                do{

                    $emma_get_student_first_name = $select_for_students_fetch['StudentFirstName'];
                    $emma_get_student_middle_name = $select_for_students_fetch['StudentMiddleName'];
                    $emma_get_student_last_name = $select_for_students_fetch['StudentLastName'];
                    $emma_get_student_phone_number = $select_for_students_fetch['StudentPhone'];
                    $emma_get_student_email_address = $select_for_students_fetch['StudentEmail'];
                    $emma_get_student_city = $select_for_students_fetch['StudentCity'];
                    $emma_get_student_home_address = $select_for_students_fetch['StudentAddress'];

                    echo '<tbody>
                            <tr>
                                <td>'.$emma_get_student_first_name.'</td>
                                <td>'.$emma_get_student_last_name.'</td>
                                <td>'.$emma_get_student_phone_number.'</td>
                                <td>'.$emma_get_student_email_address.'</td>
                                <td>'.$emma_get_student_city.'</td>
                                <td>'.$emma_get_student_home_address.'</td>
                            </tr>
                        </tbody>';
                }while($select_for_students_fetch = mysqli_fetch_assoc($select_for_students_query));
                echo '          </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }else{

    }
}else{

}

?>