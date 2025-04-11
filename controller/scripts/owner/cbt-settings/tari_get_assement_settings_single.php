<?php

    include('../../../config/config.php');

   $settingsID = trim($_POST['settingsID']);
   $campusID = trim($_POST['campusID']);



   

    $fetch = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` 
                                 WHERE `cbtsetquestionssettingsID` =  '$settingsID' AND `CampusID`='$campusID'");

    $num_row = mysqli_num_rows($fetch);
    $fetch_row = mysqli_fetch_assoc($fetch);

    if($num_row > 0){

        $AssesementType =  $fetch_row['AssesementType'];
        $AssesementCategory =  $fetch_row['AssesementCategory'];
        $AssesementTitle =  $fetch_row['AssesementTitle'];
        $AssesementDate =  $fetch_row['AssesementDate'];
        $AssesementStartTime =  $fetch_row['AssesementStartTime'];
        $AssesementEndTime =  $fetch_row['AssesementEndTime'];
        $AssesementShuffle=  $fetch_row['ShuffleOption'];


        // Convert to 24-hour format
        $timestamp1 = strtotime($AssesementStartTime);
        $timestamp2 = strtotime($AssesementEndTime);

        $timeStart = date("H:i", $timestamp1);
        $timeEnd = date("H:i", $timestamp2);

        // echo $timeStart;

        echo '   <form id="question_settings_form2">
                    <input type="text" hidden value="'.$settingsID.'" id="getSeetingsiD">

                    <div class="row">
                        <div class="col-12 col-sm-4 col-lg-5">
                            <div class="form-group local-forms">
                                <label>Assesement Title <span style="color:red;">*</span></label>
                                <input class="form-control settings_sec_2" type="text" value="'.$AssesementTitle.'" placeholder="Enter Assesement Title" id="tari_settings_title1">
                            </div>
                        </div>    
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-4 col-lg-5">
                            <div class="form-group local-forms">
                                <label>Assesement Type <span style="color:red;">*</span></label>
                                <select class="form-control settings_sec_2 pro" disabled id="tari_settings_type1">
                                    <option value="NULL">Please Select Assesement Type</option>';
                                    if($AssesementType == 'Assesement'){

                                        echo ' <option value="Assesement" selected >Assesement</option>
                                                <option value="Practice">Practice </option>
                                                <option value="Admission"  >Admission</option>
                                                ';

                                    }elseif($AssesementType == 'Practice'){

                                        echo ' <option value="Assesement"  >Assesement</option>
                                          <option value="Practice" selected>Practice </option>
                                          <option value="Admission"  >Admission</option>
                                          ';


                                    }else if($AssesementType == 'Admission')
                                    {

                                        
                                        echo '  <option value="Assesement"  >Assesement</option>
                                        <option value="Practice" >Practice </option>
                                        <option value="Admission" selected >Admission</option>
                                        ';

                                    }
                                    
                                    else{
                                        echo ' <option value="Assesement">Assesement</option>
                                        <option value="Practice">Practice </option>';
                                    }
                                echo '</select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-lg-5">
                            <div class="form-group local-forms">
                                <label>Assesement Category <span style="color:red;">*</span></label>
                                <select class="form-control settings_sec_2 pro" disabled id="tari_settings_category1">
                                    <option value="NULL">Please Select Assesement Category</option>';
                                    if($AssesementCategory == "Objective"){

                                        echo '  <option value="Objective" selected>Objective</option>
                                                <option value="Theory">Theory</option>';

                                    }elseif($AssesementCategory == "Theory"){

                                        echo '  <option value="Objective">Objective</option>
                                                <option value="Theory" selected>Theory</option>';
                                    }elseif($AssesementCategory == "Both"){

                                        echo '  <option value="Objective">Objective</option>
                                                <option value="Theory">Theory</option>
                                                <option value="Both" selected>Both</option>';
                                    }else{
                                        echo '  <option value="Objective">Objective</option>
                                        <option value="Theory">Theory</option>
                                        <option value="Both">Both</option>';
                                    }
                                    
                                echo'</select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-lg-5">
                            <div class="form-group local-forms">
                                <label>Assesement Date <span style="color:red;">*</span></label>
                                <input class="form-control settings_sec_2" type="date" value="'.$AssesementDate.'" placeholder="Enter Assesement Title" id="tari_settings_date1">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-4 col-lg-5">
                            <div class="form-group local-forms">
                                <label>Assesement Start Time <span style="color:red;">*</span></label>
                                <input class="form-control settings_sec_2" type="time"  value="'.$timeStart.'" placeholder="Enter Time" id="tari_settings_time_in1">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-lg-5">
                            <div class="form-group local-forms">
                                <label>Assesement End Time <span style="color:red;">*</span></label>
                                <input class="form-control settings_sec_2" type="time" value="'.$timeEnd.'" placeholder="Enter Time" id="tari_settings_time_out1">
                            </div>
                        </div>                                              
                    </div>
                    
                    <div class="row">
                        <p class="align-middle" style="font-size: 14px;">Do you want to Shuffle the questions? <span style="color:red;">*</span></p>
                        <form class="form">
                            <div class="switch-field">';
                                    
                            if($AssesementShuffle == '1'){
                                echo '<input type="radio" id="radio-one3" name="switch-three" value="1" checked/>
                                        <label for="radio-one3">Yes</label>
                                        <input type="radio" id="radio-two4" name="switch-three" value="0"/>
                                        <label for="radio-two4">No</label>';

                            }elseif($AssesementShuffle == '0'){

                                echo '<input type="radio" id="radio-one3" name="switch-three" value="1" />
                                <label for="radio-one3">Yes</label>
                                <input type="radio" id="radio-two4" name="switch-three" value="0" checked/>
                                <label for="radio-two4">No</label>';

                            }else{

                                echo '<input type="radio" id="radio-one3" name="switch-three" value="1" />
                                <label for="radio-one3">Yes</label>
                                <input type="radio" id="radio-two4" name="switch-three" value="0"/>
                                <label for="radio-two4">No</label>';

                            }
                            echo '</div>
                        </form>
                    </div>

                </form>';
    }

?>