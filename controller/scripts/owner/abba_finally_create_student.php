<?php
    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];
    $abba_get_student_first_name = mysqli_real_escape_string($link,$_POST['abba_get_student_first_name']);
    $abba_get_student_middle_name = mysqli_real_escape_string($link,$_POST['abba_get_student_middle_name']);
    $abba_get_student_last_name = mysqli_real_escape_string($link,$_POST['abba_get_student_last_name']);
    $studentphonefull = $_POST['studentphonefull'];
    $abba_get_student_email = mysqli_real_escape_string($link,$_POST['abba_get_student_email']);
    $abba_get_student_disability = mysqli_real_escape_string($link,$_POST['abba_get_student_disability']);
    $abba_get_student_alergy = mysqli_real_escape_string($link,$_POST['abba_get_student_alergy']);
    $abba_get_student_gender = $_POST['abba_get_student_gender'];
    $abba_get_student_dob = $_POST['abba_get_student_dob'];
    $abba_get_student_blood_group = $_POST['abba_get_student_blood_group'];
    $abba_get_student_religion = mysqli_real_escape_string($link,$_POST['abba_get_student_religion']);
    $abba_display_student_country = $_POST['abba_display_student_country'];
    $abba_display_student_state = $_POST['abba_display_student_state'];
    $abba_display_student_lga = $_POST['abba_display_student_lga'];
    $abba_get_student_city = mysqli_real_escape_string($link,$_POST['abba_get_student_city']);
    $abba_get_student_address = mysqli_real_escape_string($link,$_POST['abba_get_student_address']);
    $abba_display_create_student_class = $_POST['abba_display_create_student_class'];
    $abba_get_student_session = $_POST['abba_get_student_session'];
    $abba_get_student_doa = $_POST['abba_get_student_doa'];
    $abba_get_student_reg_number = mysqli_real_escape_string($link,$_POST['abba_get_student_reg_number']);
    $abba_get_student_password = mysqli_real_escape_string($link,md5($_POST['abba_get_student_password']));
    $abba_get_student_type = $_POST['abba_get_student_type'];
    $abba_get_student_parent = (isset($_POST['abba_get_student_parent']) ? $_POST['abba_get_student_parent'] : '');

    $abba_sql_check_username = "SELECT * FROM `userlogin` WHERE `UserRegNumberOrUsername` ='$abba_get_student_reg_number' AND `InstitutionIDOrCampusID` = '$abba_campus_id' AND `UserType` = 'student'";
    $abba_sql_Result_check_username = mysqli_query($link, $abba_sql_check_username);
    $abba_sql__check_username_Row = mysqli_fetch_assoc($abba_sql_Result_check_username);
    $abba_sql_check_username_Count = mysqli_num_rows($abba_sql_Result_check_username);

    if($abba_sql_check_username_Count  < 1)
    {


        $abba_sql_insert_student = ("INSERT INTO `student`(`ParentID`, `SecParentID`, `CampusID`, `StudentTypeBoardingOrDay`, `PrefectID`, `StudentFirstName`, `StudentMiddleName`, `StudentLastName`, `StudentDOB`, `StudentGender`, `StudentPhone`, `StudentEmail`, `StudentCountry`, `StudentState`, `StudentLga`, `StudentCity`, `StudentAddress`, `StudentDOA`, `StudentBloodGroup`, `StudentAlergies`, `StudentDisabilities`, `StudentReligion`, `StudentPhoto`, `StudentTrashStatus`, `AlumniStatus`) VALUES ('$abba_get_student_parent','0','$abba_campus_id','$abba_get_student_type','0','$abba_get_student_first_name','$abba_get_student_middle_name','$abba_get_student_last_name','$abba_get_student_dob','$abba_get_student_gender','$studentphonefull','$abba_get_student_email','$abba_display_student_country','$abba_display_student_state','$abba_display_student_lga','$abba_get_student_city','$abba_get_student_address','$abba_get_student_doa','$abba_get_student_blood_group','$abba_get_student_alergy','$abba_get_student_disability','$abba_get_student_religion','','0','0')");
        $abba_result_insert_student = mysqli_query($link, $abba_sql_insert_student);
        
        if($abba_result_insert_student == true)
        {
            $abba_last_id = mysqli_insert_id($link);

            $abba_create_student_Login = "INSERT INTO `userlogin` (`InstitutionIDOrCampusID`, `UserID`, `UserRegNumberOrUsername`, `UserPassword`, `UserType`, `VerificationStatus`, `LoginStatus`) VALUES ('$abba_campus_id', '$abba_last_id', '$abba_get_student_reg_number', '$abba_get_student_password', 'student', '0', '0')";

            if(mysqli_query($link, $abba_create_student_Login))
            {
                    $abba_assign_student_to_class = "INSERT INTO `classordepartmentstudentallocation`( `CampusID`, `ClassOrDepartmentID`, `Session`, `StudentID`) VALUES ('$abba_campus_id', '$abba_display_create_student_class', '$abba_get_student_session', '$abba_last_id')";
                    
                    if(mysqli_query($link, $abba_assign_student_to_class))
                    {
                        echo 1;
                    }
                    else{
                        echo 0;
                    }
            }
            else
            {
                echo 0;
            }
        }
        else
        {
            echo 0;

            // echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }
    }
    else
    {
        echo 2;
    }
?>