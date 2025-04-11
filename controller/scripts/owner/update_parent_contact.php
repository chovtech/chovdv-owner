<?php

    include('../../config/config.php');

    $parentphonefull = $_POST['parentphonefull'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $parentCountry = $_POST['country2'];
    $city = $_POST['city'];
    $parentID = $_POST['parentID'];

    $update = mysqli_query($link, "UPDATE `parent`
                            SET `ParentMainPhoneNumber` = '$parentphonefull',
                                `ParentEmail` = '$email',
                                `ParentHomeAddress` = '$address',
                                `ParentCity` = '$city', 
                                `ParentAddressCountry` = '$parentCountry'
                                WHERE `ParentID` = '$parentID';");
     if($update){

        $country_query = mysqli_query($link, "SELECT `CountryName` FROM `countries` WHERE countryID = '$parentCountry'");
        $fetch_Country = mysqli_fetch_assoc($country_query);

        $countryName = $fetch_Country['CountryName'];

        $parent_query = mysqli_query($link, "SELECT * FROM `parent` WHERE `ParentID` = '$parentID'");
        $fetch_parent= mysqli_fetch_assoc($parent_query);

        $ParentMainPhoneNumber = $fetch_parent['ParentMainPhoneNumber'];
        $ParentEmail = $fetch_parent['ParentEmail'];
        $ParentHomeAddress = $fetch_parent['ParentHomeAddress'];
        $ParentCity = $fetch_parent['ParentCity'];
        $ParentAddressCountry = $fetch_parent['ParentAddressCountry'];

        echo '<li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">Contact:</span> <span>';
                if ($ParentMainPhoneNumber == '' || $ParentMainPhoneNumber == 0){
                echo 'N/A';
                }
                else{
                    echo ($ParentMainPhoneNumber);
                }
       echo '</span></li>
            <!-- <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span class="fw-semibold mx-2">Skype:</span> <span>
                john.doe</span></li> -->
            <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Email:</span> <span>';
            if ($ParentEmail == '' || $ParentEmail == 0){
                echo 'N/A';
            }
            else{
                echo ($ParentEmail);
            }
        echo '</span></li>
            <li class="d-flex mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">Address:</span> <span>';
            
            if ($ParentHomeAddress == '' || $ParentHomeAddress == 0){
                echo 'N/A';
            }
            else{
                echo ucfirst(strtolower($ParentHomeAddress));
            }
        echo '</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">City:</span> <span>';
            if ($ParentCity == '' || $ParentCity == 0){
                echo 'N/A';
            }
            else{
                echo ucfirst(strtolower($ParentCity));
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