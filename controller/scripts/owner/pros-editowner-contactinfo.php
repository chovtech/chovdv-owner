<?php

    include('../../config/config.php');

    $studentphonefull = $_POST['studentphonefull'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $StudentCountry = $_POST['country2'];
    $city = $_POST['city'];
    $userID = $_POST['userID'];

   

    $update = mysqli_query($link, " UPDATE `agencyorschoolowner` SET `AgencyOrSchoolOwnerCity`='$city', 
    `AgencyOrSchoolOwnerAddress`='address',
     `AgencyOrSchoolOwnerWhatsAppPhone`='$studentphonefull',`AgencyOrSchoolOwnerEmail`='$email' WHERE `AgencyOrSchoolOwnerID`='$userID'");
     if($update){

        $country_query = mysqli_query($link, "SELECT `CountryName` FROM `countries` WHERE countryID = '$StudentCountry'");
        $fetch_Country = mysqli_fetch_assoc($country_query);

        $countryName = $fetch_Country['CountryName'];

        $student_query = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE `AgencyOrSchoolOwnerID`='$userID'");
        $fetch_student = mysqli_fetch_assoc($student_query);

        $StudentPhone = $fetch_student['AgencyOrSchoolOwnerWhatsAppPhone'];
        $StudentEmail = $fetch_student['AgencyOrSchoolOwnerEmail'];
        $StudentAddress = $fetch_student['AgencyOrSchoolOwnerAddress'];
        $StudentCity = $fetch_student['AgencyOrSchoolOwnerCity'];
        $StudentCountryAddress = $fetch_student['AgencyOrSchoolOwnerCountry'];

        echo '<li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">Contact:</span> <span>';
                if ($StudentPhone == '' || $StudentPhone == 0){
                echo 'N/A';
                }
                else{
                    echo ($StudentPhone);
                }
       echo '</span></li>
            <!-- <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span class="fw-semibold mx-2">Skype:</span> <span>
                john.doe</span></li> -->
            <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Email:</span> <span>';
            if ($StudentEmail == '' || $StudentEmail == 0){
                echo 'N/A';
            }
            else{
                echo ($StudentEmail);
            }
        echo '</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">Address:</span> <span>';
            
            if ($StudentAddress == '' || $StudentAddress == 0){
                echo 'N/A';
            }
            else{
                echo ucfirst(strtolower($StudentAddress));
            }
        echo '</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">City:</span> <span>';
            if ($StudentCity == '' || $StudentCity == 0){
                echo 'N/A';
            }
            else{
                echo ucfirst(strtolower($StudentCity));
            }
            echo '</span></li> ';

           echo '<li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">Country:</span> <span>';
            if ($countryName == '' || $countryName == 0){
                echo 'N/A';
            }
            else{
                echo ucfirst(strtolower($countryName));
            }
            echo '</span></li> ';




     }else{
        echo '0';
     }


?>