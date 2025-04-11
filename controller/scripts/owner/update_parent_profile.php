<?php

    include('../../config/config.php');

    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $surnameName = $_POST['surnameName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $parenttitle = $_POST['parenttitle'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $parentID = $_POST['parentID'];
    

 
    $update = mysqli_query($link, "UPDATE `parent`
                                    SET `ParentFirstName` = '$firstName',
                                        `ParentMiddleName` = '$middleName',
                                        `ParentLastName` = '$surnameName',
                                        `ParentGender` = '$gender',
                                        `ParentDOB` = '$dob',
                                        `ParentTitle` = '$parenttitle',
                                        `ParentCountry` = '$country',
                                        `ParentState` = '$state',
                                        `ParentLga` = '$lga'
                                        WHERE `ParentID` = '$parentID';
                                    ");

        
    if($update){

        $country_query = mysqli_query($link, "SELECT `CountryName` FROM `countries` WHERE countryID = '$country'");
        $fetch_Country = mysqli_fetch_assoc($country_query);
        $countryName = $fetch_Country['CountryName'];

        $parent_query = mysqli_query($link, "SELECT * FROM `parent` WHERE ParentID = '$parentID'");
        $fetch_parent = mysqli_fetch_assoc($parent_query);

        $sf = $fetch_parent['ParentFirstName'];
        $sm = $fetch_parent['ParentMiddleName'];
        $sl = $fetch_parent['ParentLastName'];
        $ParentTitle = $fetch_parent['ParentTitle'];
        $parentLang = $fetch_parent['Lang_Val'];

       



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
                <li class="d-flex align-items-center mb-3"><i class="bx bx-male"></i><span class="fw-semibold mx-2">Parent Title:</span> <span>';
															 
                    if ($ParentTitle == '' ||  $ParentTitle == 0){

                        echo 'N/A';
                    }
                    else{
                        echo ucfirst(strtolower($ParentTitle));
                    }
				echo '</span></li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Status:</span> <span  style="color:#01df77;">Active</span></li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar"></i><span class="fw-semibold mx-2">Date of Birth:</span> <span>';						
                    if ($dob == '' ||  $dob == 0){
                        echo 'N/A';
                    }
                    else{
                        echo ucfirst(strtolower($dob));
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
                    if ($parentLang == '' || $parentLang == 0){
                        echo 'N/A';
                    }
                    else{
                        echo ucfirst(strtolower($parentLang));
                    }
                echo '</span></li>';

                }else{
                    echo '0';
                }



?>