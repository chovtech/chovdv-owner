<?php

    include('../../config/config.php');

     $firstName = $_POST['firstName'];
    $surnameName = $_POST['surnameName'];
    $gender = $_POST['gender'];
   
     $country = $_POST['country'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
  
    $userID = $_POST['userID'];

 

   

    $update = mysqli_query($link, " UPDATE `agencyorschoolowner` SET `AgencyOrSchoolOwnerGender`='$gender',`AgencyOrSchoolOwnerName`='$firstName',`AgencyOrSchoolOwnerNameTwo`='$surnameName',
    `AgencyOrSchoolOwnerCountry`='$country',`AgencyOrSchoolOwnerState`='$state',`AgencyOrSchoolOwnerLGA`='$lga' WHERE AgencyOrSchoolOwnerID='$userID'");
                                    

        
    if($update){

        $country_query = mysqli_query($link, "SELECT `CountryName` FROM `countries` WHERE countryID = '$country'");
        $fetch_Country = mysqli_fetch_assoc($country_query);
        $countryName = $fetch_Country['CountryName'];

        $student_query = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$userID'");
        $fetch_student = mysqli_fetch_assoc($student_query);

        $sf = $fetch_student['AgencyOrSchoolOwnerName'];
      
        $sl = $fetch_student['AgencyOrSchoolOwnerNameTwo'];
        $studentLang = $fetch_student['DefaultLanguage'];
       



        echo '	<li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Full Name:</span> <span>
                     '.ucfirst(strtolower($firstName)).' '.ucfirst(strtolower($surnameName)).' 
                </span></li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Sex:</span> <span>
                <input type="text" value="'.ucfirst(strtolower($firstName)).'" hidden id="sf" >
                <input type="text" value="'.ucfirst(strtolower($surnameName)).'" hidden id="sl" >
                
                <input type="text" value="'.ucfirst(strtolower($countryName)).'" hidden id="countryID" >';
                    
                        if ($gender == '' ||  $gender == 0){
                            echo 'N/A';
                        }
                        else{
                            echo ucfirst(strtolower($gender));
                        }
                   
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