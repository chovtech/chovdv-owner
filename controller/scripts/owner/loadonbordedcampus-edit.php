<?php
        include('../../config/config.php');

        $groupofschoolID = $_POST['SchoolID'];
        $campusID  = $_POST['campusID'];


        $select_campus = mysqli_query($link,"SELECT * FROM `campus` WHERE InstitutionID='$groupofschoolID' AND CampusID='$campusID'");  
        $select_campus_row = mysqli_fetch_assoc($select_campus);

       $campusname =  $select_campus_row['CampusName'];
       $campusemail =  $select_campus_row['CampusEmail'];
       $campuscountryID =  $select_campus_row['CampusCountry'];
       $campusno =  $select_campus_row['CampusPhone'];
       $CampusState =  $select_campus_row['CampusState'];
       $CampusLGA =  $select_campus_row['CampusLGA'];




       echo '<input type="hidden" id="proscampusifforeditfinal" value="'.$campusID.'">';
       



        echo '
        <div class="row" style="padding:0%;">
            <div class="col-sm-6 d-none d-lg-block"  >
                <div class=" pros-diskschooltitleedit flexi-wizard-title"><h1>Edit Campus </h1></div><br>
                <div class="pros-dotted-boxedit">
                    <span class="schooliconinformedit" >
                    <img  class="schooliconinform-imageedit" src="../../assets/images/users/campusimage.png" >
                    
                    </span>
                </div>
            </div>

        <div class="col-sm-6 col-md-12 col-lg-6" >
                <span class=" pros-schoolheading" style="line-height: 35px; margin-left:11%;" >About The Campus</span>
                <span  style="margin-left:11%;font-family: poppins, sans-serif;color: #363949;font-size:12px;">
                Fill information about your campus below
                  </span>
            <span direction="vertical" class=""></span><br><br>
                
                 <div class="pros-flexi-label-wrapperedit"><label for="schoolName">Campus title/location<span style="color:red;">*</span></label></div>
                <div class="pros-flexi-input-affix-wrapper-invitemail">
                       <input name="schoolName" class="pros-flexi-input" placeholder=" campus location here" id="proscampuslocationedit" type="text" spacebottom="10px" required="" value="'.$campusname.'" style="width: 80%;">
                </div>&nbsp;&nbsp;

                <div class="pros-flexi-label-wrapperedit"><label for="schoolName">Email<span style="color:red;">*</span></label></div>
                <div class="pros-flexi-input-affix-wrapper-invitemail">
                       <input name="schoolName" class="pros-flexi-input" placeholder="e.g example@gmail.com" id="proscampusemailhere" type="text" spacebottom="10px" required="" value="'.$campusemail.'" style="width: 100%;">
                </div>&nbsp;&nbsp;

                <div class="pros-flexi-label-wrapperedit"><label for="schoolName">Phone<span style="color:red;">*</span></label></div>
                <div class="pros-flexi-input-affix-wrapper-invitemail">
                       <input name="proscampusnumberedit" class="pros-flexi-input campusnumberedit" placeholder="e.g XXXX-XXX-XXXX" id="proscampusnumberedit" type="tel" spacebottom="10px" required="" value="'.$campusno.'" style="width: 80%;margin-left:4%;">
                </div>&nbsp;&nbsp;
            
               
                    <div class="pros-flexi-label-wrapperedit"><label for="schoolName">Country<span style="color:red;">*</span></label></div>
                        <div class="pros-flexi-input-affix-wrapper-invitemail">
                        <select class="generalcountry  ml-4 pros-generalselect-input" id="proscampuscountryedit" style="width:65%;margin-left:6rem;">
                        <option value="0">Select Country</option>';
                                
                                $sqltogetcountries = mysqli_query($link, "SELECT * FROM `countries`");
                                $rowtogetcountries = mysqli_fetch_assoc($sqltogetcountries);
                                $cnttogetcountries = mysqli_num_rows($sqltogetcountries);

                                if ($cnttogetcountries > 0) {

                                    do {
                                        $CountryName = $rowtogetcountries['CountryName'];
                                        $countryID = $rowtogetcountries['countryID'];

                                        if ($countryID == $campuscountryID) {
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }


                                        echo '<option value="' . $countryID . '" ' . $selected . '>' . $CountryName . '</option>';

                                    } while ($rowtogetcountries = mysqli_fetch_assoc($sqltogetcountries));

                                }
                               
                        echo '</select>
                    
                    </div>&nbsp;&nbsp;
                    <div class="row">
                    
                        <div class="col-sm-6">
                                    <div class="pros-flexi-label-wrapperedit"><label for="schoolName">State<span style="color:red;">*</span></label></div>
                                <div class="pros-flexi-input-affix-wrapper-invitemail ">
                                    <select class="campus-state ml-3 pros-generalselect-input" id="proscampusstateedit" style="width:70%;margin-left:2rem;">
                                    <option value="0">Select State</option>';

                                    $prosslect_state = mysqli_query($link,"SELECT * FROM `states` WHERE countryID='$campuscountryID'");
                                    $prosslect_statecnt = mysqli_num_rows($prosslect_state);
                                    $prosslect_statecnt_row = mysqli_fetch_assoc($prosslect_state);

                                    if($prosslect_statecnt > 0)
                                    {
                                          do{

                                                  $statename =  $prosslect_statecnt_row['StateName'];
                                                  $StateID =  $prosslect_statecnt_row['StateID'];

                                                  if($CampusState ==  $StateID)
                                                  {
                                                      $stateselected = "selected";
                                                  }else
                                                  {
                                                    $stateselected = "";
                                                  }



                                                  echo '<option '.$stateselected.' value="'.$StateID .'">'.$statename.'</option>';





                                          }while($prosslect_statecnt_row = mysqli_fetch_assoc($prosslect_state));
                                    }



                                    echo '</select>
                                
                                </div>
                        </div>   
                        <div class="col-sm-6">
                                                    
                            <div class="pros-flexi-label-wrapperedit"><label for="schoolName">LGA<span style="color:red;">*</span></label></div>
                            <div class="pros-flexi-input-affix-wrapper-invitemail ">
                                <select class="campus-lga ml-3 pros-generalselect-input" id="proscampuslgaedit" style="width: 70%;margin-left:2rem;">
                                <option value="0">Select LGA</option>';


                                            
                                    $prosslect_lga = mysqli_query($link,"SELECT * FROM `cities` WHERE countryID='$campuscountryID'");
                                    $prosslect_lgacnt = mysqli_num_rows($prosslect_lga);
                                    $prosslect_lgacnt_row = mysqli_fetch_assoc($prosslect_lga);

                                    if($prosslect_lgacnt > 0)
                                    {



                                                do{

                                                    $CityName =  $prosslect_lgacnt_row['CityName'];
                                                    $CityID =  $prosslect_lgacnt_row['CityID'];

                                                    if($CampusLGA ==  $CityID)
                                                    {
                                                        $lgaselected = "selected";
                                                    }else
                                                    {
                                                          $lgaselected = "";
                                                    }



                                                    echo '<option '.$lgaselected.' value="'.$CityID .'">'.$CityName.'</option>';





                                            }while($prosslect_lgacnt_row = mysqli_fetch_assoc($prosslect_lga));

                                    }

                                    
                                echo '</select>
                            
                            </div>  
                        </div>  
                                
                    </div><br>
                <button type="button" id="pros-updtaecampusbtn"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light">Update Campus</button>
        </div>
    </div>
</div>';
        
        


?>
