<?php

    include('../../config/config.php');

    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $surnameName = $_POST['surnameName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $bloodgroup = $_POST['bloodgroup'];
    $religion = $_POST['religion'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $allergies = $_POST['allergies'];
    $disability = $_POST['disability'];
    $studentID = $_POST['studentID'];

 
    $update = mysqli_query($link, "UPDATE `student`
                                    SET `StudentFirstName` = '$firstName',
                                        `StudentMiddleName` = '$middleName',
                                        `StudentLastName` = '$surnameName',
                                        `StudentGender` = '$gender',
                                        `StudentDOB` = '$dob',
                                        `StudentBloodGroup` = '$bloodgroup',
                                        `StudentReligion` = '$religion',
                                        `StudentCountry` = '$country',
                                        `StudentState` = '$state',
                                        `StudentLga` = '$lga',
                                        `StudentDisability` = '$disability',
                                        `StudentAllergies` = '$allergies'
                                        WHERE `StudentID` = '$studentID';
                                    ");

        
    if($update){

        $country_query = mysqli_query($link, "SELECT `CountryName` FROM `countries` WHERE countryID = '$country'");
        $fetch_Country = mysqli_fetch_assoc($country_query);
        $countryName = $fetch_Country['CountryName'];

        $student_query = mysqli_query($link, "SELECT * FROM `student` WHERE StudentID = '$studentID'");
        $fetch_student = mysqli_fetch_assoc($student_query);

        $sf = $fetch_student['StudentFirstName'];
        $sm = $fetch_student['StudentMiddleName'];
        $sl = $fetch_student['StudentLastName'];
        $studentLang = $fetch_student['Lang_Val'];
       



        echo '	<li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Full Name:</span> <span>
                     '.ucfirst(strtolower($firstName)).' '.ucfirst(strtolower($surnameName)).' '.ucfirst(strtolower($middleName)).'
                </span></li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Sex:</span> <span>
                <input type="text" value="'.ucfirst(strtolower($firstName)).'" hidden id="sf" >
                <input type="text" value="'.ucfirst(strtolower($surnameName)).'" hidden id="sl" >
                <input type="text" value="'.ucfirst(strtolower($middleName)).'" hidden id="sm" >
                <input type="text" value="'.ucfirst(strtolower($countryName)).'" hidden id="countryID" >';
                    
                        if ($gender == '' ||  $gender == 0){
                            echo 'N/A';
                        }
                        else{
                            echo ucfirst(strtolower($gender));
                        }
                    echo '</span></li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Status:</span> <span  style="color:#01df77;">Active</span></li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">School Prefect:</span> <span>';
                     echo 'N/A';
                    echo '</span></li> 
                <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Country:</span> <span>';
                    
                        if ($countryName == '' || $countryName == 0){
                            echo 'N/A';
                        }
                        else{
                            echo ucfirst(strtolower($countryName));
                        }
                    '</span></li>';

                echo '<li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">Languages:</span> <span>';
                    if ($studentLang == '' || $studentLang == 0){
                        echo 'N/A';
                    }
                    else{
                        echo ucfirst(strtolower($studentLang));
                    }
                echo '</span></li>';

                }else{
                    echo '0';
                }



?>