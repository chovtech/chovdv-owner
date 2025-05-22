<?php


    include('../../config/config.php');

    $userid = $_POST['UserID'];
    $ownername = $_POST['ownerfirst_Name'];
    $tagstate = $_POST['tagstate'];
    $groupschoolID_new = $_POST['groupSchoolID'];
    $campusID_new = $_POST['CampusID'];


    $selectverify_campus_new_maincam = mysqli_query($link, "SELECT  * FROM `campus` WHERE   InstitutionID='$groupschoolID_new'");
    $selectverify_campuscnt_new_maincam = mysqli_num_rows($selectverify_campus_new_maincam);
    $selectverify_campuscnt_row_new_maincam = mysqli_fetch_assoc($selectverify_campus_new_maincam);

    $tagstatecampusmain = $selectverify_campuscnt_row_new_maincam['TagState'];

    if($tagstatecampusmain == '29'){


                $sqlGetSchool = ("SELECT * FROM `section` WHERE CampusID='$campusID_new'");
                $resultGetSchool = mysqli_query($link, $sqlGetSchool);
                $rowGetSchool = mysqli_fetch_assoc($resultGetSchool);
                $row_cntGetSchool = mysqli_num_rows($resultGetSchool);



                $sqlGetSchool_assigned  = ("SELECT * FROM `section` WHERE CampusID='$campusID_new' AND PrincipalOrDeanOrHeadTeacherUserID != '0'");
                $resultGetSchool_assigned  = mysqli_query($link, $sqlGetSchool_assigned);
                $rowGetSchool_assigned  = mysqli_fetch_assoc($resultGetSchool_assigned);
                $row_cntGetSchool_assigned  = mysqli_num_rows($resultGetSchool_assigned);


                $selectverify_campus_new = mysqli_query($link, "SELECT  * FROM `campus` WHERE   InstitutionID='$groupschoolID_new'");
                $selectverify_campuscnt_new = mysqli_num_rows($selectverify_campus_new);
                $selectverify_campuscnt_row_new = mysqli_fetch_assoc($selectverify_campus_new);

                $campusID_newmain = $selectverify_campuscnt_row_new['CampusID'];




                //load setup choices for other campus either import or edit 
                    echo '<div class="row" id="pros-loadimportoption" style="display:none;">';
                            echo '<center><h2 class="ms-5" style="color:#666666;font-weight:bold;"><b>Hurray!!</b> Congratulations '.$ownername.',</h2><br></center> 

                            <center><p class="pros-setmsgdes" style="display:block;font-size:15px;">
                                    You have successfully completed setting up your main campus. Do you want to use the same setting or make some changes in the setup for this campuse? 
                            </p></center>
                            
                            <center><img class="" src="../../assets/images/users/congratulations-images.png" style="width:200px;height:150px;"></center>';
                            
                            
                            echo '
                                <div class="btn-group" style="margin-top:20px;">
                                    <button type="button" class="btn btn-secondary btn-lg" style="font-size:15px;" data-tag="" id="pros-skipcampuseditsetup-campussetup">Make changes <i class="fa fa-angle-double-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary btn-lg" style="font-size:15px;" data-tag="29" data-maincampus="'.$campusID_newmain.'" data-campus="'.$campusID_new .'" data-school="'.$groupschoolID_new.'"   id="git g">Use for all campuses <i class="fa fa-long-arrow-right"></i></button>
                                </div>';
                    echo '</div>';
                //load setup choices for other campus either import or edit end here


                

                    
                //  edit  section for other campuses start here 
                            echo '<div class="row" id="displaysection-content" style="padding:0%;display:none;">
                                        <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                            <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Choose section</h1></div><br><br>

                                                <div class="pros-dotted-box">
                                                    <span class="schooliconinform" >
                                                    <img  class="schooliconinform-image-new" src="../../assets/images/users/school-sectionimage.png" >
                                                    </span>
                                                </div>
                                        </div>


                                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                            <span class="pros-schoolheading" style="line-height: 35px; margin-left:2%;" >Create and Customize School Sections</span>
                                            
                                                <span class="pros-sectionpart ms-2"  style="color:#363949;font-size:13px; display: block;">
                                                    Select the sections you want to include in your school (e.g., Junior Secondary, Senior Secondary) and assign an alias to each one for clarity.
                                                        The alias will help you personalize the section names to suit your school\'s structure.
                                                </span>
                                        ';

                                        $delect_section = mysqli_query($link, "SELECT * FROM `sectionlist`");
                                        $delect_section_cnt = mysqli_num_rows($delect_section);
                                        $delect_section_cnt_row = mysqli_fetch_assoc($delect_section);
                                        $num = 1;

                                    echo '<br><div class="row">';
                                            do {

                                                    $section_name = $delect_section_cnt_row['SectionListName'];
                                                    $facultyID = $delect_section_cnt_row['SectionListID'];
                                                    //<span style="font-weight:800;">'.$num++.'</span>



                                                        $pros_verify_sectio_created = mysqli_query($link,"SELECT * FROM `section` WHERE `CampusID`='$campusID_new' AND SectionListID='$facultyID'"); 
                                                        $pros_verify_sectio_created_cnt = mysqli_num_rows($pros_verify_sectio_created);
                                                        $pros_verify_sectio_created_cnt_row = mysqli_fetch_assoc($pros_verify_sectio_created);


                                                        if($pros_verify_sectio_created_cnt > 0)
                                                        {

                                                                $sectionalisanamegotten =  trim($pros_verify_sectio_created_cnt_row['SectionName']);
                                                                $pros_checked_sectioncreated = 'checked';
                                                                $bordercolor = '1px solid #007bff';
                                                                
                                                        }else
                                                        {
                                                            $sectionalisanamegotten = trim($section_name);
                                                            $pros_checked_sectioncreated = '';
                                                            $bordercolor = 'none';
                                                        }
                                                    

                                                        echo
                                                            '
                                                            <div class="col-sm-6 mb-3">
                                                                        
                                                                    <div class="card generalclass-checksection checksectiongeneral'.$facultyID.'" 
                                                                        data-id="prosfacultyid'.$facultyID.'" 
                                                                        style="cursor:pointer;border-radius:10px;outline:'.$bordercolor.';">
                                                                        <div class="card-body" style="border:none;border-radius:5px;height:50px;">
                                                                            <div class="radio-group">
                                                                                <input class="form-check-input pros-checkchildren sectioncheckbox" 
                                                                                    id="prosfacultyid'.$facultyID.'" 
                                                                                    data-id="prosfacultyid'.$facultyID.'"  
                                                                                    data-checkverify="checksectiongeneral' . $facultyID . '"
                                                                                    type="checkbox"
                                                                                    value="'.$section_name.'"
                                                                                    '.$pros_checked_sectioncreated.'
                                                                                    >
                                                                                <label for="prosfacultyid'.$facultyID.'" 
                                                                                    style="cursor:pointer;font-size:12px;">
                                                                                    '.$section_name.'
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>      

                                                                </div>';
                                                        
                                                        echo '<div class="col-sm-6 mb-3">
                                                                    <input type="text" style="border-radius:10px;height:50px;color:gray;font-size:13px;outline:'.$bordercolor.'" data-id="'.$facultyID.'" value="'.$sectionalisanamegotten.'" class="form-control prosgetcheckedsectionaliasgeneralclass sectioncheckbox pros-checkchildren sectionalianameherechecked'.$facultyID.'" placeholder="enter section alias" >          
                                                            </div>';
                                                    

                                                } while ($delect_section_cnt_row = mysqli_fetch_assoc($delect_section));

                                    echo '</div>

                                        <br>
                                            
                                            
                                            <button type="button" id="pros-create-sectionbtn" data-school="'.$groupschoolID_new.'" data-main="'.$tagstatecampusmain.'" data-tag="16" data-campus="'.$campusID_new .'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create section</button><br>
                                    </div>

                                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                                            <div class="pros-wizard-container" >
                                                <div class="pros-wizard-steps">
                                                    <div class="pros-wizard-step">
                                                    <div class="pros-step-content">
                                                        <div class="pros-step-number active">1</div>
                                                        <div class="vertical-line"> </div>
                                                        <div class="pros-step-description active" style="font-size:13px;">Section</div>
                                                    </div>
                                                    </div>
                                                    <div class="pros-wizard-step">
                                                    <div class="pros-step-content">
                                                        <div class="pros-step-number">2</div>
                                                        <div class="pros-step-description" style="font-size:13px;">School head</div>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="pros-wizard-step">
                                                    <div class="pros-step-content">
                                                        <div class="pros-step-number">2</div>
                                                        <div class="pros-step-description" style="font-size:13px;">Assign School head</div>
                                                    </div>
                                                    </div>

                                                    
                                                    <div class="pros-wizard-step">
                                                    <div class="pros-step-content">
                                                        <div class="pros-step-number">4</div>
                                                        <div class="vr" style="background-color:blue;"></div>
                                                        <div class="pros-step-description" style="font-size:13px;">Teacher</div>
                                                    </div>
                                                    </div>

                                                    <div class="pros-wizard-step">
                                                    <div class="pros-step-content">
                                                        <div class="pros-step-number">5</div>
                                                        <div class="pros-step-description" style="font-size:13px;">Other staff</div>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                            </div> 
                                    </div>
                                </div>';
                //edit  section for other campuses end here
                        


            //edit school head or create for another campus start here

            echo '<div class="row" id="pros-displayhead-setup" style="padding:0%;display:none">

                <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                        <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>School head</h1></div><br><br>
                        <div class="pros-dotted-box">
                            <span class="schooliconinform" >
                            <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/schoolhead.png" >
                            </span>
                        </div>
                </div>
                
                <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                    <span class="pros-schoolheading" style="line-height: 35px;" >Create a school head</span>
                
                    <span class="pros-sectionpart "  style="color: #363949;font-size:12px;display: block;">
                            Kindly create a school head to manage your campus. add multiple school head by clicking  add school head below.
                    </span><br>';

                    echo '  <div class="row">
                                <div class="col-sm-6">
                                    <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> First name<span style="color:red;">*</span></label></div>
                                    <div class="pros-flexi-input-affix-wrapper-campus headfnamecover">
                                        <input type="text" class="pros-flexi-input generalheadfirstname" data-id="" id="scheadinsertid" placeholder="First name" style="width:70%;">
                                    </div>&nbsp;&nbsp;
                                </div>

                                <div class="col-sm-6">
                                    <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> Last Name<span style="color:red;">*</span></label></div>
                                    <div class="pros-flexi-input-affix-wrapper-campus headlnamecover">
                                        <input type="text" class="pros-flexi-input generalhealtname"  data-id="" id="head-lname" placeholder="Last name" style="width:70%;">
                                    </div>&nbsp;&nbsp;
                                </div>

                                <div class="col-sm-12">
                                        <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                        <div class="pros-flexi-input-affix-wrapper-campus heademailcover">
                                            <input type="text" class="pros-flexi-input generalheademail" data-id="" id="head-email" placeholder="eg:example@example.com" style="width:70%;">
                                        </div>&nbsp;&nbsp;
                                </div>

                                <div class="col-sm-12">
                                        <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                        <div class="pros-flexi-input-affix-wrapper-campus headnumcover">
                                            <input type="number" name="pros-headnumset[main]" data-id="" class="pros-flexi-input generalheadnum" id="pros-headnumset" placeholder="e:g XXXX-XXX-XXXX" style="width:91%;margin-left:4%;">
                                        </div>&nbsp;&nbsp; 
                                </div>
                                
                            </div>

                            <div id="displayschool-headinput"></div>
                    <center>
                    <span class="circle-icon" id="pros-addschoolhead-btn" style="color:#007bff;font-size:12px;cursor:pointer;">
                    Add school head <i class="fa fa-plus"></i>
                    </span>
                    </center>&nbsp;&nbsp;<br>
                        <input type="hidden" id="appendinput-schoolhead">
                        <input type="hidden" id="checkvalidatedschoolhead">
                        <button type="button" id="pros-create-schoolheadbtn" data-tag="17" data-maintag="'.$tagstatecampusmain.'" data-campus="'.$campusID_new.'" data-school="'.$groupschoolID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create new</button><br>
                </div>

                <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                    <div class="pros-wizard-container" >
                        <div class="pros-wizard-steps">
                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number">1</div>
                                <div class="pros-step-description " style="font-size:13px;">  Section</div>
                            </div>
                            </div>
                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number active">2</div>
                                <div class="pros-step-description active" style="font-size:13px;">School head</div>
                            </div>
                            </div>
                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number">3</div>
                                <div class="pros-step-description" style="font-size:13px;">Assign School head</div>
                            </div>
                            </div>
                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number">4</div>
                                <div class="vr" style="background-color:blue;"></div>
                                <div class="pros-step-description" style="font-size:13px;">Teacher</div>
                            </div>
                            </div>
                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number">5</div>
                                <div class="pros-step-description" style="font-size:13px;">Other staff</div>
                            </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>';
            //edit school head or create for another campus end here
        
                
            
            //assign school head to section start here  for edit
                echo '<div class="row" id="assignschoolheadfaculty" style="padding:0%;display:none">
                            <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                <div class="pros-diskschooltitle " style="margin-right:10rem;font-size:10px;"><h1>Assign school head</h1></div><br><br>
                                <div class="pros-dotted-box">
                                    <span class="schooliconinform" >
                                    <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/schoolhead.png" >
                                    </span>
                                </div>
                            </div>


                        <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                <span class="pros-schoolheading ms-4" style="line-height: 35px;" >Assign school head to section</span>
                            
                                <span class="pros-sectionpart ms-4"  style="color: #363949;font-size:12px;display: block;">
                                kindly click on the section to assign to a school head.
                                </span><br><br>';


                                $delect_section_new = mysqli_query($link, "SELECT * FROM `section` WHERE CampusID='$campusID_new' ORDER BY SectionName ASC");
                                $delect_section_cnt_new = mysqli_num_rows($delect_section_new);
                                $delect_section_cnt_row_new = mysqli_fetch_assoc($delect_section_new);

                                echo '<div class="row ms-1" >';
                                        do {
                                                $section_name_new = $delect_section_cnt_row_new['SectionName'];
                                                $facultyID_new = $delect_section_cnt_row_new['SectionID'];


                                                // check if section set up from the main campus the same with template
                                                

                                            echo '<div class="col-sm-6">
                                                    <div class="pros-container">
                                                        <div class="pros-select-btn prosopendrophead' . $facultyID_new . ' pros-generalsechead" data-id="' . $facultyID_new . '">
                                                            <span class="btn-text">' . $section_name_new . '<span class="pros-headdisplaynumslected' . $facultyID_new . '" style="font-size:11px;"></span></span>
                                                            <span class="arrow-dwn">
                                                                <i class="fa fa-chevron-down"></i>
                                                            </span>
                                                        </div>
                                
                                                        <ul class="list-items">';

                                                                    $checkstaffverification_head = mysqli_query($link, "SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND `Role`='schoolhead'");
                                                                    $checkstaffverificationcnt_head = mysqli_num_rows($checkstaffverification_head);
                                                                    $checkstaffverificationcnt_row = mysqli_fetch_assoc($checkstaffverification_head);


                                                                    do {

                                                                        $headfirstname = $checkstaffverificationcnt_row['StaffFirstName'];
                                                                        $headlastname = $checkstaffverificationcnt_row['StaffLastName'];
                                                                        $headStaffID = $checkstaffverificationcnt_row['StaffID'];
                                                                        
                                                                        
                                                                        $sectiontemplateassigndupliacte = substr($headfirstname.' '.$headlastname.'...', 0, 8);


                                                                        
                                                                        // check if setup matches the main campus for assigning a school head
                                                                        $sqlGetSchoolverifyassign = ("SELECT * FROM `section` WHERE CampusID='$campusID_newmain' AND SectionName='$section_name_new' AND `PrincipalOrDeanOrHeadTeacherUserID` = '$headStaffID '");
                                                                        $resultGetSchoolverifyassign = mysqli_query($link, $sqlGetSchoolverifyassign);
                                                                        $rowGetSchoolverifyassign = mysqli_fetch_assoc( $resultGetSchoolverifyassign);
                                                                        $row_cntGetSchoolverifyassign = mysqli_num_rows($resultGetSchoolverifyassign);
                    
                                                                        if($row_cntGetSchoolverifyassign  > 0)
                                                                        {
                                                                            $section_namesetupassign = $rowGetSchoolverifyassign['PrincipalOrDeanOrHeadTeacherUserID'];
                    
                    
                                                                            if($section_namesetupassign ==  $headStaffID)
                                                                            {
                                                                                $proschecksectionassign = 'checked';
                                                                            }else
                                                                            {
                                                                                    $proschecksectionassign = '';
                                                                            }
                                                                                
                                                                        }else
                                                                        {
                                                                                $proschecksectionassign = '';       
                                                                        }
                                                                // check if setup matches the main campus for assigning a school head


                                                                        echo '<li class="item prosgenerallist-itemssel" data-id="' . $facultyID_new . '' . $headStaffID . '" data-faculty="' . $facultyID_new . '">
                                                                                    <img  class="" src="' . $defaultUrl . '/assets/images/users/defaultprofile.png" style="width:30px;height:30px;">&nbsp;
                                                                                    <span class="item-text">' . $sectiontemplateassigndupliacte . '</span>
                                                                                    <input type="radio" '.$proschecksectionassign.' class="pros-checkbox-input-new pros-generalcheckschoolhead checkshoolheadnew'.$facultyID_new .' proscheckboxinside'.$facultyID_new . '' .$headStaffID.'" data-staff="'.$headStaffID.'" data-faculty="' . $facultyID_new . '" id="schoolassign" style="float: right; margin-right:10px;;"   name="schoolhead-assign'.$facultyID_new.'" value="' . $headStaffID . '">
                                                                                </li>';

                                                                    } while ($checkstaffverificationcnt_row = mysqli_fetch_assoc($checkstaffverification_head));
                                                        echo '</ul>
                                                </div>
                                            </div>';
                                        } while ($delect_section_cnt_row_new = mysqli_fetch_assoc($delect_section_new));
                                            echo '<br>
                                            <button type="button" id="assignschoolheadtofac-btn" data-tag="18" data-school="'.$groupschoolID_new.'" data-main="'.$tagstatecampusmain.'" data-campus="'.$campusID_new.'"  style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Assign Now</button><br>';
                                    echo '</div> '; 
                        echo '</div>

                        <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                            <div class="pros-wizard-container" >
                                <div class="pros-wizard-steps">
                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number ">1</div>
                                        <div class="pros-step-description" style="font-size:13px;">  Section</div>
                                    </div>
                                    </div>
                                
                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number">2</div>
                                        <div class="pros-step-description" style="font-size:13px;">School head</div>
                                    </div>
                                    </div>

                                    
                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number active">3</div>
                                        <div class="pros-step-description active" style="font-size:11px;">Assign School head</div>
                                    </div>
                                    </div>
                                            
                                    
                                    
                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number">4</div>
                                        <div class="pros-step-description" style="font-size:13px;">Teacher</div>
                                    </div>
                                    </div>

                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number">5</div>
                                        <div class="pros-step-description" style="font-size:13px;">Other staff</div>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div> 
                        </div>';
                echo '</div>';
            //assign school head to section end here  for edit


            //create school teacher start here 
            echo '<div class="row" id="proscreateschool-teacher" style="padding:0%;display:none">

                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                    <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Create teacher</h1></div><br><br>
                        <div class="pros-dotted-box">
                            <span class="schooliconinform" >
                            <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/teacher-setupimage.png" >
                            </span>
                        </div>

                    </div>


                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                        <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Create teacher</span>
                    
                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                            Kindly create a subject teacher below.
                        </span><br>';


                                echo '
                                                    
                                    <div class="row">

                                            <div class="col-sm-6">
                                                <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> First name<span style="color:red;">*</span></label></div>
                                                <div class="pros-flexi-input-affix-wrapper-campus teacherfnamecover">
                                                    <input type="text" class="pros-flexi-input generalteacherfirstname" data-id="" id="teacherinsertid" placeholder="First name" style="width:70%;">
                                                </div>&nbsp;&nbsp;
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> Last Name<span style="color:red;">*</span></label></div>
                                                <div class="pros-flexi-input-affix-wrapper-campus teacherlnamecover">
                                                    <input type="text" class="pros-flexi-input generalteacherltname"  data-id="" id="teacher-lname" placeholder="Last name" style="width:70%;">
                                                </div>&nbsp;&nbsp;
                                            </div>

                                            <div class="col-sm-12">
                                                    <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                                    <div class="pros-flexi-input-affix-wrapper-campus teacheremailcover">
                                                        <input type="text" class="pros-flexi-input generalteacheremail" data-id="" id="teacher-email" placeholder="eg:example@example.com" style="width:70%;">
                                                    </div>&nbsp;&nbsp;
                                            </div>

                                            <div class="col-sm-12">
                                                    <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                                    <div class="pros-flexi-input-affix-wrapper-campus teachernumcover">
                                                            <input type="number" name="pros-teachernumset[main]" data-id="" class="pros-flexi-input generalteachernum" id="pros-teachernumset" placeholder="e.g., XXXX-XXX-XXXX" style="width:91%;margin-left:4%;">
                                                    </div>&nbsp;&nbsp;
                                            </div>
                                    </div>

                                    <div id="displayschool-teacher"></div>
                                
                                    <center>
                                    <span class="circle-icon" id="pros-addteacher-btn" style="color:#007bff;font-size:12px;cursor:pointer;">
                                    Add teacher <i class="fa fa-plus"></i>
                                    </span>
                                </center>&nbsp;&nbsp;';

                            echo '<br>
                            <button type="button" id="createteacher-setup-btn" data-tag="19" data-maintag="'.$tagstatecampusmain.'" data-school="'.$groupschoolID_new .'"  data-campus="'.$campusID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create Now</button><br>
                            <input type="hidden" id="appendinput-teacher">
                            <input type="hidden" id="checkvalidatedteacher">
                    </div>

                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                        <div class="pros-wizard-container">

                            
                            <div class="pros-wizard-steps">

                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number ">1</div>
                                    <div class="pros-step-description" style="font-size:13px;">  Section</div>
                                </div>
                                </div>
                            
                                <div class="pros-wizard-step">
                            
                                <div class="pros-step-content">
                                    <div class="pros-step-number">2</div>
                                    <div class="pros-step-description" style="font-size:13px;">School head</div>
                                </div>
                                </div>

                                
                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number ">3</div>
                                    <div class="pros-step-description " style="font-size:11px;">Assign School head</div>
                                </div>
                                </div>
                                        
                                
                                
                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number active">4</div>
                                    <div class="pros-step-description active" style="font-size:13px;">Teacher</div>
                                </div>
                                </div>

                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number">5</div>
                                    <div class="pros-step-description" style="font-size:13px;">Other staff</div>
                                </div>
                                </div>
                                
                            </div>
                        </div> 
                    </div>';

            echo '</div>';
            //create school teacher end here    
            

            //create  other staff  start here 
            echo '<div class="row" id="createotherschooltype-setup" style="padding:0%;display:none">
                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                            <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1> Other staff</h1></div><br><br>
                        <div class="pros-dotted-box">
                            <span class="schooliconinform" >
                            <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/teacher-setupimage.png" >
                            </span>
                        </div>

                    </div>


                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                        <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Create Other staff</span>
                    
                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                            kindly click yes to create any  staff of your choice  or skip to get to another step 
                        </span><br>';


                    echo '<div class="row" id="createotheeusertypecover" >

                            <div class="col-sm-12 mb-3">

                                <div class="card generalcreateotheeusertypecover" style="cursor:pointer;" data-id="1">

                                    <div class="card-body" style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                        <div class="radio-group">
                                            
                                            <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck-setup" value="senior executive/Board member" id="proschecksetupboard" name="usertype">

                                            <label for="seniorexecutive" style="font-weight:600;cursor:pointer;">Senior executive/Board member</label>
                                            
                                        </div>
                                        
                                    </div>

                                </div>  

                            </div>
                            
                            <div class="col-sm-12 mb-3">

                                <div class="card generalcreateotheeusertypecover" style="cursor:pointer;" data-id="2">
                                
                                    <div class="card-body" style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                        <div class="radio-group">
                                            <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck-setup" value="admin" id="pros-checksetupdamin" name="usertype">
                                            <label class="ml-1" for="personalassist" style="font-weight:600;cursor:pointer;">Admin </label>
                                        </div>
                                    
                                    </div>

                                </div>     
                            
                            </div>

                            <div class="col-6">
                                    <button type="button" class="btn btn-secondary btn-sm" style="width:70%;margin-top:20px;" data-action="edit" data-tag="20" data-campus="'.$campusID_new.'" id="skipcreatestaff"   class="btn  text-dark" class="">skip <i class="fa fa-angle-double-right"></i></button>
                            </div>

                            <div class="col-6">
                                        <button type="button" class="btn btn-primary btn-sm" style="width:70%;float:right;margin-top:20px;" id="proceedtocreatestaff-setup">yes <i class="fa fa-long-arrow-right"></i></button>
                            </div>
                        </div>';

                    echo '
                        <div id="admininputcoversetup" style="display:none">        
                            <div class="row">

                                    <div class="col-sm-6">
                                        <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> First name<span style="color:red;">*</span></label></div>
                                        <div class="pros-flexi-input-affix-wrapper-campus adminfnamecover">
                                            <input type="text" class="pros-flexi-input generaladminfirstname" data-id="" id="admininsertid" placeholder="First name" style="width:93%;">
                                        </div>&nbsp;&nbsp;
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> Last Name<span style="color:red;">*</span></label></div>
                                        <div class="pros-flexi-input-affix-wrapper-campus adminlnamecover">
                                            <input type="text" class="pros-flexi-input generaladminltname"  data-id="" id="admin-lname" placeholder="Last name" style="width:93%;">
                                        </div>&nbsp;&nbsp;
                                    </div>

                                    <div class="col-sm-12">
                                            <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                            <div class="pros-flexi-input-affix-wrapper-campus adminemailcover">
                                                <input type="text" class="pros-flexi-input generaladminemail" data-id="" id="admin-email" placeholder="eg:example@example.com" style="width:93%;">
                                            </div>&nbsp;&nbsp;
                                    </div>

                                    <div class="col-sm-12">
                                            <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                            <div class="pros-flexi-input-affix-wrapper-campus adminnumcover">
                                                <input type="number" name="pros-adminnumset[main]" data-id="" class="pros-flexi-input generaladminnum" id="pros-adminnumset" placeholder="e.g., XXXX-XXX-XXXX" style="width:93%;margin-left:4%;">
                                            </div>&nbsp;&nbsp;
                                    </div>

                            </div>

                            <div id="displayschool-admin"></div>
                        

                                <center>
                                <span class="circle-icon" id="pros-add-admin-btn" style="color:#007bff;font-size:12px;cursor:pointer;">
                                Add staff <i class="fa fa-plus"></i>
                                </span>
                            </center>&nbsp;&nbsp; ';

                            echo '<br>
                            <button type="button" id="createadmin-setup-btn" data-maintag="'.$tagstatecampusmain.'" data-action="edit" data-tag="21" data-school="'.$groupschoolID_new.'" data-campus="'.$campusID_new.'"  style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create Now</button><br>
                            <input type="hidden" id="appendinput-admin">
                            <input type="hidden" id="checkvalidatedadmin">
                            </div>
                            ';
                    // create other user type

                    echo '<input type="hidden" id="usertypevalue-setup">'; //store usertype value here

                    echo '</div>

                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                        <div class="pros-wizard-container">

                        
                            <div class="pros-wizard-steps">

                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number ">1</div>
                                    <div class="pros-step-description" style="font-size:13px;">  Section</div>
                                </div>
                                </div>
                            
                                <div class="pros-wizard-step">
                            
                                <div class="pros-step-content">
                                    <div class="pros-step-number">2</div>
                                    <div class="pros-step-description" style="font-size:13px;">School head</div>
                                </div>
                                </div>

                                
                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number ">3</div>
                                    <div class="pros-step-description " style="font-size:11px;">Assign School head</div>
                                </div>
                                </div>
                                        
                                
                                
                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number ">4</div>
                                    <div class="pros-step-description " style="font-size:13px;">Teacher</div>
                                </div>
                                </div>

                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number active">5</div>
                                    <div class="pros-step-description active" style="font-size:13px;">Other staff</div>
                                </div>
                                </div>
                                
                            </div>
                        </div> 
                    </div>';
            echo '</div>';
            //create  other staff  end here 
            
            
            
            //congratulations msg half setup
                echo '<div class="row" id="createwelcomemsg-setup" style="padding:0%;display:none">

                    <center><h4 class="ms-5" style="color:#666666;font-weight:bold;"><b>Hurray!!</b> Congratulations ' .$ownername . ',</h4></center> 

                    <center><img  class="" src="../../assets/images/users/congratulations-images.png" style="width:200px;height:150px;"></center>


                    <p class="pros-setmsgdes" style="display:block;font-size:14px;">
                        part of your setup has been accomplished successfully.<br> kindly click to create classes and subject.
                    </p>';
                echo '<center><button type="button" id="proceedto-createclassbtn" data-tag="21"  data-campus="'.$campusID_new.'"  style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light">Proceed <i class="fa fa-long-arrow-right"></i></button></center>';

                echo '</div>';
            //congratulations msg half setup ends here



            //create class start here
                echo '<div class="row" id="createclasses-setup" style="padding:0%;display:none">';
                    echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                            <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Create class</h1></div><br><br>

                            <div class="pros-dotted-box">
                                <span class="schooliconinform" >
                                    <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/classimages.png" >
                                </span>
                            </div>
            
                        </div>


                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                        <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Create classes</span>
                    
                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                            kindly click on the section to assign to a school head.
                        </span><br>';


                        $sqlGetSchool_class = ("SELECT * FROM `section` WHERE CampusID='$campusID_new'");
                        $resultGetSchool_class = mysqli_query($link, $sqlGetSchool_class);
                        $rowGetSchool_class = mysqli_fetch_assoc($resultGetSchool_class);
                        $row_cntGetSchool_class = mysqli_num_rows($resultGetSchool_class);

                echo '<div class="row">';

                            if($row_cntGetSchool_class  > 0)
                            {

                                    $numclass = 1;
                                    do {


                                    $facultyname_class = $rowGetSchool_class['SectionName'];
                                    $facultynameID_class = $rowGetSchool_class['SectionID'];
                                    $facultynameID_class_SectionListID = $rowGetSchool_class['SectionListID'];

                                    echo '<div class="col-sm-12">';

                                        echo '<div class="pros-container-class" style="width:100%;margin-bottom:20px;">
                                                <div class="pros-select-btn  createclassgeneral pros-openclasswhenclick' . $facultynameID_class . ' getclassopenondocument-ready' . $numclass++ . '"  data-faculty="' . $facultynameID_class . '">
                                                    <span class="btn-text">' . $facultyname_class . '</span>
                                                    <span class="arrow-dwn">
                                                        <i class="fa fa-chevron-down"></i>
                                                    </span>
                                                </div>

                                                <div class="list-items" style="padding:15px 40px 40px 40px;list-style-type:none;">';
                                                        echo '<small  style="font-size:12px;margin-left:0.4rem;">kindly input your class below <br><strong>Note:</strong> you can add multiple class in an input with comma seperated just .</small><p></p><p></p>';
                                                    
                                                            echo'<div class="row">
                                                                
                                                            ';



                                                                    $pros_select_row_classfor_section_created = mysqli_query($link,"SELECT * FROM `classtemplate` WHERE SectionListID='$facultynameID_class_SectionListID'");
                                                                    $pros_select_row_classfor_section_created_row = mysqli_fetch_assoc($pros_select_row_classfor_section_created);
                                                                    $pros_select_row_classfor_section_created_cnt = mysqli_num_rows($pros_select_row_classfor_section_created);

                                                                    if($pros_select_row_classfor_section_created_cnt > 0)
                                                                    {
                                                                                        do{

                                                                                                    $pros_ClassTemplateName =  $pros_select_row_classfor_section_created_row['ClassTemplateName'];
                                                                                                    $pros_ClassTemplateID =  $pros_select_row_classfor_section_created_row['ClassTemplateID'];
                                    

                                                                                                    echo '<h6>'.$pros_ClassTemplateName.'</h6>
                                                                                                            <div class="col-sm-12 mb-3">
                                                                                                                    <input type="text" style="border-radius:10px;height:50px;color:gray;font-size:13px;"  data-faculty="'.$facultynameID_class.'" data-classlist="'.$pros_ClassTemplateID.'"  class="form-control prosgeneralclassselecttobecreated prosgeneralclass-getfaculty'.$pros_ClassTemplateID.'" placeholder="e:g;JSS ONE A,JSS ONE B" >          
                                                                                                        </div>';
                                                                                                

                                                                                        }while($pros_select_row_classfor_section_created_row = mysqli_fetch_assoc($pros_select_row_classfor_section_created));
                                                                    }else
                                                                    {



                                                                        echo '<center>
                                                                                    <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                                                                    <p>Class template not found for this section.</p>
                                                                            </center>';

                                                                    }

                                                                
                                                            echo '</div>';
                                                            




                                                    

                                                        echo '</div>
                                        </div>';

                                    echo '</div>';


                                    } while ($rowGetSchool_class = mysqli_fetch_assoc($resultGetSchool_class));
                            }else
                            {

                            }
                        echo '</div>';
                                    echo '<br> <button type="button" id="createclass-setup-btn" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"  data-tag="22" data-school="'.$groupschoolID_new.'"    style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create Class</button><br>
                                </div>

                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                            <div class="pros-wizard-container">
                                <div class="pros-wizard-steps">
                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number active">1</div>
                                        <div class="pros-step-description active" style="font-size:13px;">Create Class</div>
                                    </div>
                                    </div>
                                
                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number">2</div>
                                        <div class="pros-step-description" style="font-size:13px;">Create Subject</div>
                                    </div>
                                    </div>
                                    
                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number ">3</div>
                                        <div class="pros-step-description " style="font-size:11px;">Merge subject</div>
                                    </div>
                                    </div>

                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number">4</div>
                                        <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                                    </div>
                                    </div>

                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number ">5</div>
                                        <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                                    </div>
                                </div>

                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number">6</div>
                                    <div class="pros-step-description" style="font-size:12px;">Term</div>
                                </div>
                                </div>
                                            
                                </div>
                            </div> 
                        </div>';
            echo '</div>';
            //create class end here




            //edit setup subject for other campuses here
            echo '<div class="row" id="createsubject-setup" style="display:none;">';

                echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                    <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Create subject</h1></div><br><br>

                        <div class="pros-dotted-box">
                            <span class="schooliconinform" >
                                <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/subject-image.png" >
                            </span>
                        </div>
                
                </div>



            <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
            <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Create subject here</span>

            <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                kindly click on each class to create subject below.
            </span><br>';



            $sqlGetSchool_subject = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new'");
            $resultGetSchool_subject  = mysqli_query($link, $sqlGetSchool_subject);
            $rowGetSchool_subject  = mysqli_fetch_assoc($resultGetSchool_subject);
            $row_cntGetSchool_subject  = mysqli_num_rows($resultGetSchool_subject );

                echo '<div class="row">';

                if($row_cntGetSchool_subject > 0)
                {

                    $prosverifycheckedsubject = 0;

                        $numsubject = 1;
                        do {


                        $facultyname_subject  = $rowGetSchool_subject ['ClassOrDepartmentName'];
                        $facultynameID_subject  = $rowGetSchool_subject ['ClassOrDepartmentID'];
                        $facultynameID_subject_ClassTemplateID  = $rowGetSchool_subject ['ClassTemplateID'];

                        echo '<div class="col-sm-12">';

                        echo '<div class="pros-container-class" style="width:100%;margin-bottom:20px;">
                        <div class="pros-select-btn  createsubjectgeneral pros-opensubjectwhenclick' . $facultynameID_subject . ' getsubjectopenondocument-ready' . $numsubject ++ . '"  data-faculty="' . $facultynameID_subject  . '">
                            <span class="btn-text">' . $facultyname_subject  . '</span>
                            <span class="arrow-dwn">
                                <i class="fa fa-chevron-down"></i>
                            </span>
                        </div>';



                                

                                    echo'<div class="list-items" style="padding:15px 40px 40px 40px;list-style-type:none;">';

                                                    $selectsubject_for_template_here = mysqli_query($link,"SELECT * FROM `subjectorcourse` WHERE `ClassTemplateID`='$facultynameID_subject_ClassTemplateID'");
                                                                        $selectsubject_for_template_here_cnt_row =  mysqli_fetch_assoc($selectsubject_for_template_here);
                                                                        $selectsubject_for_template_here_cnt =  mysqli_num_rows($selectsubject_for_template_here);
                                                                        
                                                                        
                                                                        
                                                                    


                                                                        if($selectsubject_for_template_here_cnt > 0)
                                                                        {


                                                                                    echo '<div class="wrapper">
                                                                                            
                                                                                                <div class="pros-content-subject">
                                                                                                    <div class="pros-search-subjectname">
                                                                                                    </div><br>
                                                                                                
                                                                                                    <fieldset class="tari-tari_checkbox-group prosloadsubjectcontainer-forcreate" >';

                                                                                                                        do{

                                                                                                                                $pros_SubjectOrCourseName_list = $selectsubject_for_template_here_cnt_row['SubjectOrCourseTitle'];
                                                                                                                                $pros_SubjectOrCourseName_listID = $selectsubject_for_template_here_cnt_row['SubjectOrCourseID'];


                                                                                                                                $prosverifycheckedsubject++;
                                                                                                                                $veliadetsubjectcreated_pros = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` WHERE ClassOrDepartmentID='$facultynameID_subject' AND `SubjectOrCourseID`='$pros_SubjectOrCourseName_listID'");
                                                                                                                                $veliadetsubjectcreated_proscnt = mysqli_num_rows($veliadetsubjectcreated_pros);
                                                                                                                                $veliadetsubjectcreated_proscntrow = mysqli_fetch_assoc($veliadetsubjectcreated_pros);


                                                                                                                                if($veliadetsubjectcreated_proscnt > 0)
                                                                                                                                {
                                                                                                                                                $subjectselected = 'checked';
                                                                                                                                }else

                                                                                                                                {
                                                                                                                                                    $subjectselected = '';
                                                                                                                                }

                                                                                                                                echo '
                                                                                                                                <div class="tari_checkbox " >
                                                                                                                                <label  for="editcheckbox'.$pros_SubjectOrCourseName_listID.$prosverifycheckedsubject.'" class="tari_checkbox-wrapper">
                                                                                                                                    <input type="checkbox" '.$subjectselected.' id="editcheckbox'.$pros_SubjectOrCourseName_listID.$prosverifycheckedsubject.'" data-class="'.$facultynameID_subject.'" value="'.$pros_SubjectOrCourseName_listID.'" class="tari_checkbox-input prosgeneralsubjectgotten "   />
                                                                                                                                    <span class="tari_checkbox-tile">&nbsp;&nbsp;
                                                                                                                                    <span class="tari_checkbox-label">'.$pros_SubjectOrCourseName_list.'</span>
                                                                                                                                    </span>
                                                                                                                                </label>
                                                                                                                                </div>';

                                                                                                                        }while($selectsubject_for_template_here_cnt_row =  mysqli_fetch_assoc($selectsubject_for_template_here));
                                                                                        
                                                                                        
                                                                                echo '
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>';
                                                    }else
                                                    {

                                                        echo '<center>
                                                                <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                                                <p>Subject not found</p>
                                                                </center>';
                                                                
                                                                
                                                
                                                    }
                                            
                                        
                                                

                                echo '</div>
                            </div>';
                    echo '</div>';


                            } while ($rowGetSchool_subject  = mysqli_fetch_assoc($resultGetSchool_subject ));
                    }else
                    {
                        echo '<center>
                        <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                        <p>Class not found</p>
                        </center>';
                    }
                echo '</div>';

            


                echo '<br> <button type="button" id="createsubject-setup-btn" data-tag="23" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create Subject</button><br>
            </div>

            <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                    <div class="pros-wizard-container">

                        
                        <div class="pros-wizard-steps">

                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">1</div>
                                <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                            </div>
                            </div>
                        
                            <div class="pros-wizard-step">
                        
                            <div class="pros-step-content">
                                <div class="pros-step-number active">2</div>
                                <div class="pros-step-description active" style="font-size:12px;">Create Subject</div>
                            </div>
                            </div>

                            
                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">3</div>
                                <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                            </div>
                            </div>


                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number">4</div>
                                <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                            </div>
                            </div>

                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">5</div>
                                <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                            </div>
                        </div>

                        <div class="pros-wizard-step">
                        <div class="pros-step-content">
                            <div class="pros-step-number">6</div>
                            <div class="pros-step-description" style="font-size:12px;">Term</div>
                        </div>
                        </div>
                            
                        </div>
                    </div> 
                </div>';
            echo '</div>';

            //edit setup subject for other campuses here



            //edit merging of subject title
            echo '<div class="row" id="mergesubjectcontent" style="display:none;">';

            echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">

                <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Merge subject </h1></div><br><br>

                <div class="pros-dotted-box">
                    <span class="schooliconinform" >
                        <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/subject-image.png" >
                    </span>
                </div>

            </div>


                <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                        <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Merge subject to a title</span>

                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                            kindly select subjects you will like to merge to a title e:g ICT <br><i class="fa fa-arrow-right"></i>(computer studies, data processing etc).
                        </span>
                        <small class="mt-1" style="color: #363949;font-size:12px;display:block;"><b>Note:</b> this section is optional you can click on next below to skip this step.</small>
                        <br>';


                        $sqlGetSchool_subject_merge = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new'");
                        $resultGetSchool_subject_merge  = mysqli_query($link, $sqlGetSchool_subject_merge);
                        $rowGetSchool_subject_merge  = mysqli_fetch_assoc($resultGetSchool_subject_merge);
                        $row_cntGetSchool_subject_merge  = mysqli_num_rows($resultGetSchool_subject_merge);

                        echo '<div class="row">';

                                $numsubjectmerge = 1;
                                do {


                                        $facultyname_subject_merge  = $rowGetSchool_subject_merge ['ClassOrDepartmentName'];
                                        $facultynameID_subject_merge  = $rowGetSchool_subject_merge ['ClassOrDepartmentID'];


                                        $selecttitleass = mysqli_query($link,"SELECT * FROM `courseorsubjectmergetitle` WHERE CampusID='$campusID_new' AND ClassOrDepartmentID='$facultynameID_subject_merge'");
                                        $selecttitleasscnt = mysqli_num_rows($selecttitleass);
                                        $selecttitleasscntrow = mysqli_fetch_assoc($selecttitleass);

                                        
                                        // echo '<span class="mytooltip tooltip-effect-5"> <span class="tooltip-item">Euclid</span> <span class="tooltip-content clearfix"> <img src="../assets/images/tooltip/Euclid.png" /> <span class="tooltip-text">Also known as Euclid of andria, was a Greek mathematician, often referred.</span> </span> </span>';

                                    

                                        echo '<div class="col-sm-12">';

                                        echo '<div class="pros-container-class" style="width:100%;margin-bottom:20px;">

                                                <div class="pros-select-btn  createsubjectgeneralmerge pros-opensubjectwhenclickmerge'.$facultynameID_subject_merge.' getsubjectopenondocument-ready' . $numsubjectmerge ++ .'"  data-faculty="'.$facultynameID_subject_merge.'">
                                                    <span class="btn-text">' . $facultyname_subject_merge  . '</span>
                                                    <span class="arrow-dwn">
                                                        <i class="fa fa-chevron-down"></i>
                                                    </span>
                                                </div>
                    
                
                                                    <div class="list-items  pros-reloadclasscontentmerge'.$facultynameID_subject_merge.'" style="padding:15px 40px 40px 40px;list-style-type:none;">
                                                            <div class=" subjectlistmeslistmerge prosgenerallist-itemssel" >';



                                                            if($selecttitleasscnt > 0)
                                                            {

                                                                        do{

                                                                            $mergetitle = $selecttitleasscntrow['MergeTitle'];
                                                                        $mergetitleID = $selecttitleasscntrow['CourseOrSubjectMergeID'];


                                                                        $selectclassmerge_num = mysqli_query($link,"SELECT * FROM `courseorsubjectmerged` WHERE CampusID='$campusID_new' AND ClassOrDepartmentID='$facultynameID_subject_merge' AND CourseOrSubjectMergeID='$mergetitleID'");
                                                                        $selectclassmerge_cnt_num = mysqli_num_rows($selectclassmerge_num);
                                                                        $selectclassmerge_cntrow_num = mysqli_fetch_assoc($selectclassmerge_num);

                                                                                    
                                                                        echo '<div class="form-check form-check-inline" style="font-size:13px;">
                                                                                
                                                                            <label class="form-check-label pros-subjectmergelabel popup pros-hovermergesub" data-id="'.$facultynameID_subject_merge.''.$mergetitleID.'"  style="cursor:pointer;" for="inlineRadio1">
                                                                            <div class="popuptext pros-popmeup'.$facultynameID_subject_merge.''.$mergetitleID.'" id="myPopup">';

                                                                                    do{
                                                                                        

                                                                                        $subjectID_merged = $selectclassmerge_cntrow_num['SubjectOrCourseID'];
                                                                                        
                                                                                            

                                                                                            $getsubectmerge =  mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` INNER JOIN `subjectorcourse` ON  `courseorsubjectallocation`.`SubjectOrCourseID` =   `subjectorcourse`.`SubjectOrCourseID` WHERE 
                                                                                            `courseorsubjectallocation`.`CampusID`='$campusID_new' AND `courseorsubjectallocation`.`ClassOrDepartmentID`='$facultynameID_subject_merge' AND `courseorsubjectallocation`.`SubjectOrCourseID`='$subjectID_merged'");
                                                                                            $getsubectmergecnt = mysqli_num_rows($getsubectmerge);
                                                                                            $getsubectmergecntrow = mysqli_fetch_assoc($getsubectmerge);
                                                                                            $subjectmerge_new = $getsubectmergecntrow['SubjectOrCourseTitle'];

                                                                                        echo '<ul style="list-style-type:none;">
                                                                                            <li>'.$subjectmerge_new.'</li>
                                                                                            </ul>';


                                                                                    }while($selectclassmerge_cntrow_num = mysqli_fetch_assoc($selectclassmerge_num));


                                                                                    
                                                                            echo '</div>
                                                                            ' .$mergetitle .'(<small>'.$selectclassmerge_cnt_num.'</small>)
                                                                                <i class="fa fa-trash text-danger  remove-linkmergegenehovrbtn" data-bs-toggle="tooltip"  data-tag="24" data-id="'.$mergetitleID.'" data-maintag="'.$tagstatecampusmain.'"  data-group="'.$groupschoolID_new.'" data-class="'.$facultynameID_subject_merge.'" data-campus="'.$campusID_new.'">
                                                                            </i></label>
                                                                        
                                                                        </div>';


                                                                        

                                                                    }while($selecttitleasscntrow = mysqli_fetch_assoc($selecttitleass));


                                                            }else
                                                            {

                                                                        // $selecttitleass_maincampus = mysqli_query($link,"SELECT * FROM `courseorsubjectmergetitle` WHERE CampusID='$campusID_newmain' AND ClassOrDepartmentID='$facultynameID_subject_merge'");
                                                                        // $selecttitleasscnt_maincampus = mysqli_num_rows($selecttitleass_maincampus);
                                                                        // $selecttitleasscntrow_maincampus = mysqli_fetch_assoc($selecttitleass_maincampus);
                                
                                                            }


                                                                
                                                                    $select_subjectformerge = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` INNER JOIN `subjectorcourse` ON  `courseorsubjectallocation`.`SubjectOrCourseID` =   `subjectorcourse`.`SubjectOrCourseID` WHERE   `courseorsubjectallocation`.`CampusID`='$campusID_new' AND `courseorsubjectallocation`.`ClassOrDepartmentID`='$facultynameID_subject_merge'");
                                                                    $select_subjectformerge_cnt = mysqli_num_rows($select_subjectformerge);
                                                                    $select_subjectformerge_cntrow = mysqli_fetch_assoc($select_subjectformerge);
                                                                

                                                                if($select_subjectformerge_cnt > 0)
                                                                {
                                                                echo '<div class="reloadmergecontent'.$facultynameID_subject_merge.'">';
                                                                    do{


                                                                        $subjectname = $select_subjectformerge_cntrow['SubjectOrCourseTitle'];
                                                                        $subjectID = $select_subjectformerge_cntrow['SubjectOrCourseID'];

                                                                        

                                                                        $selectclassmerge = mysqli_query($link,"SELECT * FROM `courseorsubjectmerged` WHERE CampusID='$campusID_new' AND ClassOrDepartmentID='$facultynameID_subject_merge'  AND SubjectOrCourseID='$subjectID'");
                                                                        $selectclassmerge_cnt = mysqli_num_rows($selectclassmerge);
                                                                        $selectclassmerge_cntrow = mysqli_fetch_assoc($selectclassmerge);

                                                                        if($selectclassmerge_cnt > 0)
                                                                        {
                                                                            


                                                                        }else
                                                                        { 
                                                                            
                                                                            
                                                                            echo '<div class="form-check form-check-inline" style="font-size:13px;">';

                                                                                
                                                                            echo '<input class="form-check-input pros-checkchildren-new pros-generalmergesubject generchecksubjectmerge'.$subjectID.''.$facultynameID_subject_merge.' pros-mergerbyclass'.$facultynameID_subject_merge.'" value="'.$subjectID.'" data-id="'.$facultynameID_subject_merge.'"  style="cursor:pointer;border: 1px solid; border-color: gray;font-weight:bold;" type="checkbox">
                                                                            <label class="form-check-label pros-subjectmergelabel " data-id="'.$subjectID.''.$facultynameID_subject_merge.'"  style="cursor:pointer;" for="inlineRadio1">' .$subjectname.'</label>';

                                                                            echo '</div>';
                                                                        }

                                                                    }while($select_subjectformerge_cntrow = mysqli_fetch_assoc($select_subjectformerge));
                                                                    echo '<br><br>';  


                                                                    echo '<div class="pros-flexi-label-wrappernew" ><label for="schoolName"> Merge title<span style="color:red;">*</span></label></div>
                                                                    <small  style="font-size:12px;margin-left:0.4rem;">kindly input your merge title</small>
                                                                    <div class="pros-flexi-input-affix-wrapper-campus">                
                                                                            <input type="text" class="pros-flexi-input genesubjectnameinputmerge pros-generalinputmerge'.$facultynameID_subject_merge.'" data-id="'.$facultynameID_subject_merge .'"  placeholder="eg:PSV" style="width:94%;">
                                                                    </div>';

                                                                    echo '<br><button type="button" class="btn btn-info  btn-sm text-light generalbnmergesub-btn pros-individualmergerbtn'.$facultynameID_subject_merge.'" data-maintag="'.$tagstatecampusmain.'" data-id="'.$facultynameID_subject_merge .'" data-tag="23" data-group="'.$groupschoolID_new.'" data-school="'.$campusID_new .'"   style="float:right;">Merge <i class="fa fa-compress"></i>
                                                                    </button>';
                                                                echo '</div>';
                                                                }else
                                                                {
                                                                

                                                                    echo '<center>
                                                                                <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                                                                <p>Subject not found</p>
                                                                        </center>';
                                                                        
                                                                        
                                                                }

                                                


                                                            echo '</div>
                                                    </div>
                                            </div>';
                
                                        echo '</div>';


                                    } while ($rowGetSchool_subject_merge  = mysqli_fetch_assoc($resultGetSchool_subject_merge));

                        echo '</div>';


                        echo '<br> <button type="button" id="createmergesubject-setup-btn" data-tag="24" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Next</button><br>
                </div>';

        

                echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                    <div class="pros-wizard-container">

                        
                        <div class="pros-wizard-steps">

                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">1</div>
                                <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                            </div>
                            </div>
                        
                            <div class="pros-wizard-step">
                        
                            <div class="pros-step-content">
                                <div class="pros-step-number ">2</div>
                                <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                            </div>
                            </div>

                            
                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number active">3</div>
                                <div class="pros-step-description active" style="font-size:12px;">Merge subject</div>
                            </div>
                            </div>


                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number">4</div>
                                <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                            </div>
                            </div>

                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">4</div>
                                <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                            </div>
                        </div>

                        <div class="pros-wizard-step">
                        <div class="pros-step-content">
                            <div class="pros-step-number">6</div>
                            <div class="pros-step-description" style="font-size:12px;">Term</div>
                        </div>
                        </div>
                            
                        </div>
                    </div> 
                </div>';

            echo '</div>';
        //edit merging of subject title




            //edit assign form teacher container
            echo '<div class="row" id="pros-assign-formteachercontent" style="display:none;">';
                    echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">

                            <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Form teacher </h1></div><br><br>

                            <div class="pros-dotted-box">
                                <span class="schooliconinform" >
                                    <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/subject-image.png" >
                                </span>
                            </div>

                        </div>


                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                            <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Assign form teacher here</span>

                            <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                Kindly select a form teacher you want to assign to each classs.
                            </span>
                            <br>';


                            $sqlGetSchool_subject_form = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new' ORDER BY ClassOrDepartmentName ASC");
                            $resultGetSchool_subject_form  = mysqli_query($link, $sqlGetSchool_subject_form);
                            $rowGetSchool_subject_form  = mysqli_fetch_assoc($resultGetSchool_subject_form);
                            $row_cntGetSchool_subject_form  = mysqli_num_rows($resultGetSchool_subject_form);

                            echo '<div class="row">';

                                    $numsubjectform = 1;

                                    do {



                                        $classidformname = $rowGetSchool_subject_form  ['ClassOrDepartmentName'];
                                        $classformID  = $rowGetSchool_subject_form ['ClassOrDepartmentID'];
                                        $formteacherverifycam  = $rowGetSchool_subject_form ['HODOrFormTeacherUserID'];


                                        // GET FORM TEACHER FOR THE MAIN CAMPUS
                                            $sqlGetSchool_subject_form_campus = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_newmain' AND HODOrFormTeacherUserID != '0' AND ClassOrDepartmentName='$classidformname'
                                            ORDER BY ClassOrDepartmentName ASC");
                                            $resultGetSchool_subject_form_campus  = mysqli_query($link, $sqlGetSchool_subject_form_campus);
                                            $rowGetSchool_subject_form_campus  = mysqli_fetch_assoc($resultGetSchool_subject_form_campus);
                                            $row_cntGetSchool_subject_form_campus  = mysqli_num_rows($resultGetSchool_subject_form_campus);
                                        // GET FORM TEACHER FOR THE MAIN CAMPUS
                                        
                                            if($formteacherverifycam == '0')
                                            {

                                                if($row_cntGetSchool_subject_form_campus > 0)
                                                {


                                                    $verifyteacher_staffID  = $rowGetSchool_subject_form_campus['HODOrFormTeacherUserID'];

                                                }else
                                                {
                                                    $verifyteacher_staffID = '';
                                                }


                                            }else
                                            {
                                            $verifyteacher_staffID = $formteacherverifycam;
                                            }

                                        echo '<div class="col-sm-6">
                                        <div class="pros-container">
                                            <div class="pros-select-btn pros-assignformteacherbtncollapse'.$classformID.' pros-generalformteach" data-id="'.$classformID.'">
                                                <span class="btn-text">'.$classidformname.'<span class="pros-headdisplaynumslected'.$classformID.'" style="font-size:11px;"></span></span>
                                                <span class="arrow-dwn">
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                    
                                            <ul class="list-items">';
                                    
                                                            $checkstaffverification_form = mysqli_query($link, "SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND `Role`='teacher'");
                                                            $checkstaffverificationcnt_form = mysqli_num_rows($checkstaffverification_form);
                                                            $checkstaffverificationcnt_row_form = mysqli_fetch_assoc($checkstaffverification_form);
                                    
                                    
                                                            do {

                                                                    $formfirstname = $checkstaffverificationcnt_row_form['StaffFirstName'];
                                                                    $formlastname = $checkstaffverificationcnt_row_form['StaffLastName'];
                                                                    $formStaffID = $checkstaffverificationcnt_row_form['StaffID'];

                                                                    $fullnameform = substr($formfirstname.' '.$formlastname.'...', 0, 9);
                                                                    if($verifyteacher_staffID  == $formStaffID)
                                                                    {
                                                                        $checkedformteacher = 'checked';

                                                                    }else
                                                                    {
                                                                        $checkedformteacher = ''; 
                                                                    }
                                    
                                                                


                                                                            echo '<li class="item prosgenerallist-itemssel" data-id="'.$classformID.''.$formStaffID.'" data-faculty="'.$classformID.'">

                                                                                            <img  class="" src="' . $defaultUrl . '/assets/images/users/defaultprofile.png" style="width:40px;height:40px;">&nbsp;
                                                                                            <span class="item-text abba_tooltip">'.$fullnameform  . ' <span class="abba_tooltiptext">'.$formfirstname.' '.$formlastname.'</span></span>
                                                                                            <input type="radio" name="formradio'.$classformID.'" '.$checkedformteacher.' class="pros-checkbox-input-new pros-generalcheckschoolhead pro-generalclassassign-formteacher checkshoolheadnew'.$classformID.' data-staff="'.$formStaffID.'" proscheckboxinside'.$classformID .''. $formStaffID. '" data-faculty="'.$classformID.'" id="formteacherschoolassign" style="float: right; margin-right:10px;"    value="'.$formStaffID.'">
                                                                                </li>';

                                    
                                                            } while ($checkstaffverificationcnt_row_form = mysqli_fetch_assoc($checkstaffverification_form));
                                    
                                            echo '</ul>
                                    </div>
                                    </div>
                                    ';



                                            $facultyname_subject_form  = $rowGetSchool_subject_form ['ClassOrDepartmentName'];
                                            $facultynameID_subject_form  = $rowGetSchool_subject_form ['ClassOrDepartmentID'];

                                            
                                    } while ($rowGetSchool_subject_form  = mysqli_fetch_assoc($resultGetSchool_subject_form));
                                    
                            echo '</div>';

                            echo '<br> <button type="button" id="assignformteacher-setup-btn" data-tag="25" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"    style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Assign now</button><br>
                    </div>';


                    echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                    <div class="pros-wizard-container">
                    
                        <div class="pros-wizard-steps">

                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">1</div>
                                <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                            </div>
                            </div>
                        
                            <div class="pros-wizard-step">
                        
                            <div class="pros-step-content">
                                <div class="pros-step-number ">2</div>
                                <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                            </div>
                            </div>

                            
                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number">3</div>
                                <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                            </div>
                            </div>


                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number active">4</div>
                                <div class="pros-step-description active" style="font-size:12px;">Form teacher</div>
                            </div>
                            </div>

                            <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number ">4</div>
                                    <div class="pros-step-description" style="font-size:12px;">Subject teacher</div>
                                </div>
                            </div>

                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number">6</div>
                                <div class="pros-step-description" style="font-size:12px;">Term</div>
                            </div>
                            </div>



                            
                        </div>
                    </div> 
                    </div>';

            echo '</div>';
            //edit assign form teacher container      
                    
                    



            //edit assign  subject teacher container
                echo '<div  class="row" id="assignsubject-teachercontainer" style="display:none;">';

                        echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                    <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Subject teacher </h1></div><br><br>

                                    <div class="pros-dotted-box">
                                        <span class="schooliconinform" >
                                            <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/subject-image.png" >
                                        </span>
                                    </div>

                            </div>


                            <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                    <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Assign subject teacher here</span>
                                    <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                    Kindly select a subject teacher you want to assign to each subject.
                                    </span>
                                    <br>';


                                        $sqlGetSchool_subject_subject = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new' ORDER BY ClassOrDepartmentName ASC");
                                        $resultGetSchool_subject_subject  = mysqli_query($link, $sqlGetSchool_subject_subject);
                                        $rowGetSchool_subject_subject  = mysqli_fetch_assoc($resultGetSchool_subject_subject);
                                        $row_cntGetSchool_subject_subject  = mysqli_num_rows($resultGetSchool_subject_subject);

                                    echo '<div class="row">';

                                    if($row_cntGetSchool_subject_subject > 0)
                                    {

                                

                                                $numsubjectsubject = 1;

                                                do {

                                                    $classidsubjectname = $rowGetSchool_subject_subject['ClassOrDepartmentName'];
                                                    $classsubjectID  = $rowGetSchool_subject_subject['ClassOrDepartmentID'];
                                                    $classsubjectIDtemplate  = $rowGetSchool_subject_subject['ClassTemplateID'];

                                                    echo '<div class="col-sm-12">
                                                    <div class="pros-container-class" id="pros-loadsubjectassign-content'.$classsubjectID.'" style="width:100%;margin-bottom:20px;">
                                                        <div class="pros-select-btn pros-subjectteacher-open'.$classsubjectID.' pros-generalsubjectteacher" data-id="'.$classsubjectID.'">
                                                            <span class="btn-text">'.$classidsubjectname.'<span class="pros-headdisplaynumslected'.$classsubjectID.'" style="font-size:11px;"></span></span>
                                                            <span class="arrow-dwn">
                                                                <i class="fa fa-chevron-down"></i>
                                                            </span>
                                                        </div>
                                                
                                                        <div class="list-items" style="padding:15px 40px 40px 40px;list-style-type:none;">';
                                                            echo '<div class=" prosgenerallist-subjectteach" data-id="'.$classsubjectID.'" data-faculty="'.$classsubjectID.'">';
                                                                    

                                                                    $selectsql_result_teacher = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` INNER JOIN `subjectorcourse` ON 
                                                                    `courseorsubjectallocation`.`SubjectOrCourseID` =   `subjectorcourse`.`SubjectOrCourseID`
                                                                    WHERE `courseorsubjectallocation`.CampusID='$campusID_new' AND `subjectorcourse`.ClassTemplateID='$classsubjectIDtemplate' AND `courseorsubjectallocation`.`ClassOrDepartmentID`='$classsubjectID'");
                                                                    $selectsql_result_teacher_cnt = mysqli_num_rows($selectsql_result_teacher);
                                                                    $selectsql_result_teacher_cntrow = mysqli_fetch_assoc($selectsql_result_teacher);
                                                                    
                                                                    


                                                                    if($selectsql_result_teacher_cnt > 0)
                                                                    {
                                                                            $allar = 'all';

                                                                echo '<div class="row">';

                                                                            echo '<span class="pros-schoolheading ms-1" style="line-height: 35px;"> How to assign a subject teacher?</span>
                                                                            <span class="pros-sectionpart ms-1 mb-3"  style="color: #363949;font-size:12px;display:block;">
                                                                                Please choose a teacher for each subject or allocate a specific teacher to each subject below.
                                                                            </span>';

                                                                        echo '<div class="col-sm-6">
                                                                                <div class="event__name" style="font-size:1rem; font-weight: 500;">Assign all </div>
                                                                            </div>';
                                                                        
                                                                    echo '<div class="col-sm-6">
                                                                                <div class="pros-select-menu mb-5"  ">
                                                                                    <div class="pros-select-btn-new prosgenralopenteacher-dropdown pros-removeteacherdropdown'.$classsubjectID.''.$allar.'" data-id="'.$classsubjectID.''.$allar.'" style="background-color: #f1f1f1;box-shadow:0 0 3px rgba(0, 0, 0, 0.1);">
                                                                                        <span class="pros-sBtn-text pros-displayselectedval-teacher'.$classsubjectID.''.$allar.'">All  teacher</span>
                                                                                        <i class="bx bx-chevron-down"></i>
                                                                                    </div>
                                                                                        <ul class="pros-options pros-opensubject-teacher'.$classsubjectID.''.$allar.'" style="background-color: #f1f1f1;color: #0047ab;">
                                                                                                    <div class="pros-search">
                                                                                                        <i class="fa fa-search"></i>
                                                                                                        <input class="pros-search-input pros-selectall-searchinput" data-id="'.$classsubjectID.''.$allar.'" spellcheck="false" type="text" placeholder="Search">
                                                                                                    </div>';

                                                                                                            $selecclassteacher_all = mysqli_query($link,"SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND Role IN ('teacher','schoolhead')");
                                                                                                            $selecclassteachercnt_all = mysqli_num_rows($selecclassteacher_all);
                                                                                                            $selecclassteachercntrow_all = mysqli_fetch_assoc($selecclassteacher_all);
                                                                                                                
                                                                                                            do {
                                                                                                                
                                                                                                            
                                                                                                                $seletsubject_teacherfname_pros_all =  $selecclassteachercntrow_all['StaffFirstName'];
                                                                                                                $seletsubject_teacherlastname_pros_all =  $selecclassteachercntrow_all['StaffLastName'];
                                                                                                                $seletsubject_teacherID_pros_all =  $selecclassteachercntrow_all['StaffID'];


                                                                                                            
                                                                                                                echo '<li  style="background-color: #f1f1f1;color: #0047ab;" class="pros-option pros-clickselectallteacher  pros-optiongoteenserch'.$classsubjectID.''.$allar.'" data-id="'.$classsubjectID.''.$allar.'" data-class="'.$classsubjectID.'" data-group="'.$groupschoolID_new.'" data-tag="26" data-cam="'.$campusID_new.'" data-staff="'.$seletsubject_teacherID_pros_all.'">

                                                                                                                        <img class="" src="'.$defaultUrl.'/assets/images/users/defaultprofile.png" style="width:40px;height:40px;">
                                                                                                                        <span  style="background-color: #f1f1f1;"class="pros-option-text pros-optiongoteenserch-text'.$classsubjectID.''.$allar.'">'.$seletsubject_teacherfname_pros_all.' '.$seletsubject_teacherlastname_pros_all.'</span>
                                                                                                                </li>';
                                                                                                            
                                                                                                            } while ($selecclassteachercntrow_all = mysqli_fetch_assoc($selecclassteacher_all));

                                                                                                            
                                                                                                    echo '<p class="noresultfound'.$classsubjectID.''.$allar.'" style="display:none">No teacher found!</p>
                                                                                        </ul>
                                                                            </div>';
                                                                        
                                                                        echo '</div>';
                                                                        
                                                                        echo '</div>';
                                                                        

                                                                        
                                                                            $num = 1;

                                                                                do{
                                                                                    $subjectcoure_assign =   $selectsql_result_teacher_cntrow['SubjectOrCourseTitle'];
                                                                                    $SubjectOrCourseID_assign =   $selectsql_result_teacher_cntrow['SubjectOrCourseID'];

                                                                                    $selecclassteacher = mysqli_query($link,"SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND Role IN ('teacher','schoolhead')");

                                                                                    $selecclassteachercnt = mysqli_num_rows($selecclassteacher);
                                                                                    $selecclassteachercntrow = mysqli_fetch_assoc($selecclassteacher);
                                                                                    

                                                                    echo '<div class="row">';
                                                                                echo '<div class="col-sm-6">
                                                                                        <div class="event__name" style="font-size:1rem; font-weight: 500; margin-bottom: 1rem;">'.$num++.'. '.$subjectcoure_assign.'</div>
                                                                                </div>';

                                                                                echo '<div class="col-sm-6">
                                                                                        <div class="pros-select-menu">
                                                                                            <div class="pros-select-btn-new prosgenralopenteacher-dropdown pros-removeteacherdropdown'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-id="'.$classsubjectID.''.$SubjectOrCourseID_assign.'">';

                                                                                            $select_class_teacher_set =  mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` WHERE CampusID='$campusID_new' AND ClassOrDepartmentID='$classsubjectID' AND SubjectOrCourseID='$SubjectOrCourseID_assign'");
                                                                                            $select_class_teachercnt_set = mysqli_num_rows($select_class_teacher_set);
                                                                                            $select_class_teachercnt_setrow = mysqli_fetch_assoc($select_class_teacher_set);

                                                                                            if($select_class_teachercnt_set > 0)
                                                                                            {
                                                                                                    

                                                                                                        $staffIDgotten = $select_class_teachercnt_setrow['CourseOrSubjectTeacherUserID'];
                                                                                                        
                                                                                                        if($staffIDgotten == '0')
                                                                                                        {
                                                                                                        echo '<span class="pros-sBtn-text pros-selectallteacherset pros-displayallstaffselected'.$classsubjectID.'  pros-displayselectedval-teacher'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-subject="'.$SubjectOrCourseID_assign.'">Select  teacher</span>';   
                                                                                                        }else
                                                                                                        {
                                                                                                            


                                                                                                        $select_staff_exist = mysqli_query($link,"SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND StaffID='$staffIDgotten'"); 
                                                                                                        $select_staff_exist_cnt = mysqli_num_rows($select_staff_exist);
                                                                                                        $select_staff_exist_cntrow = mysqli_fetch_assoc($select_staff_exist);


                                                                                                            $fnamestaffgotten = $select_staff_exist_cntrow['StaffFirstName'];
                                                                                                            $lnamestaffgotten = $select_staff_exist_cntrow['StaffLastName'];



                                                                                                        echo '<span class="pros-sBtn-text pros-selectallteacherset pros-displayallstaffselected'.$classsubjectID.'  pros-displayselectedval-teacher'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-subject="'.$SubjectOrCourseID_assign.'">'.$fnamestaffgotten.' '.$lnamestaffgotten.'</span>';
                                                                                                        }
                                                                                            }else
                                                                                            {
                                                                                                echo '<span class="pros-sBtn-text pros-selectallteacherset pros-displayallstaffselected'.$classsubjectID.'  pros-displayselectedval-teacher'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-subject="'.$SubjectOrCourseID_assign.'">Select  teacher</span>';
                                                                                            }

                                                                                            
                                                                                            echo '<i class="bx bx-chevron-down"></i>
                                                                                            </div>
                                                                                    

                                                                                            <ul class="pros-options pros-opensubject-teacher'.$classsubjectID.''.$SubjectOrCourseID_assign.'">
                                                                                                                        
                                                                                                <div class="pros-search">
                                                                                                    <i class="fa fa-search"></i>
                                                                                                    <input class="pros-search-input" data-id="'.$classsubjectID.''.$SubjectOrCourseID_assign.'" spellcheck="false" type="text" placeholder="Search">
                                                                                                </div>';

                                                                                                    

                                                                                                do{
                                                                                                    

                                                                                                        $seletsubject_teacherfname_pros =  $selecclassteachercntrow['StaffFirstName'];
                                                                                                        $seletsubject_teacherlastname_pros =  $selecclassteachercntrow['StaffLastName'];
                                                                                                        $seletsubject_teacherID_pros =  $selecclassteachercntrow['StaffID'];


                                                                                                        echo '<li class="pros-option prosoptionsingle pros-optiongoteenserch'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-id="'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-class="'.$classsubjectID.'"  data-group="'.$groupschoolID_new.'" data-tag="26" data-cam="'.$campusID_new.'" data-staff="'.$seletsubject_teacherID_pros.'"  data-subject="'.$SubjectOrCourseID_assign.'">
                                                                                                            <img  class="" src="' . $defaultUrl . '/assets/images/users/defaultprofile.png" style="width:40px;height:40px;">
                                                                                                            
                                                                                                            <span class="pros-option-text pros-optiongoteenserch-text'.$classsubjectID.''.$SubjectOrCourseID_assign.'">'.$seletsubject_teacherfname_pros.'  '.$seletsubject_teacherlastname_pros.'</span>
                                                                                                        </li>';
                                                                                                    

                                                                                                }while($selecclassteachercntrow = mysqli_fetch_assoc($selecclassteacher));
                                                                                            
                                                                                            
                                                                                                

                                                                                                
                                                                                                    echo '<p class=" noresultfound'.$classsubjectID.''.$SubjectOrCourseID_assign.'" style="display:none">No teacher found!</p>
                                                                                                
                                                                                            </ul>
                                                                                    </div>';



                                                                                                
                                                                                echo '</div>';
                                                                                                

                                                                            echo '</div> ';       

                                                                                }while($selectsql_result_teacher_cntrow = mysqli_fetch_assoc($selectsql_result_teacher));

                                                                    }else
                                                                    {
                                                                        echo '<center>
                                                                            <img  class="" style="opacity: 0.5;" src="../../assets/images/users/norecordfound-subject.png" style="width:180px;">
                                                                            <div style="font-weight:bold;font-size:15px;">Subject not found</div>
                                                                        </center>
                                                                        ';

                                                                    }


                                                                        // load subject and teacher inside here
                                                            echo '</div>';
                                                        echo '</div>
                                                </div>
                                                </div>
                                                ';
                                                } while ($rowGetSchool_subject_subject  = mysqli_fetch_assoc($resultGetSchool_subject_subject));

                                            }else
                                            {
                                                echo '<center>
                                                <img  class="" style="opacity: 0.5;" src="../../assets/images/users/norecordfound-subject.png" style="width:180px;">
                                                <div style="font-weight:bold;font-size:15px;">No class found</div>
                                            </center>
                                            ';  
                                            }
                                                
                                        echo '</div>';

                                echo '<br> <button type="button" id="pros-assignsubject-proceedbtn" data-tag="26" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"     style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Proceed</button><br>
                            </div>';


                            echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                                <div class="pros-wizard-container">
                                
                                    <div class="pros-wizard-steps">

                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number ">1</div>
                                            <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                                        </div>
                                        </div>
                                    
                                        <div class="pros-wizard-step">
                                    
                                        <div class="pros-step-content">
                                            <div class="pros-step-number ">2</div>
                                            <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                                        </div>
                                        </div>

                                        
                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number">3</div>
                                            <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                                        </div>
                                        </div>


                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number ">4</div>
                                            <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                                        </div>
                                        </div>


                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number active">4</div>
                                            <div class="pros-step-description active" style="font-size:12px;">Subject teacher</div>
                                        </div>
                                        </div>

                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number">6</div>
                                            <div class="pros-step-description" style="font-size:12px;">Term</div>
                                        </div>
                                        </div>
                                        
                                    </div>
                                </div> 
                            </div>';

                                        
                    echo '</div>';             
                        //edit assign  subject container






                        // set session and term
                        echo '<div class="row" id="pros-loadsession-termcontent" style="display:none;">';
                                                    
                        echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                        <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1> Term or semester</h1></div><br><br>

                        <div class="pros-dotted-box">
                            <span class="schooliconinform" >
                                <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/session-setupimage.png" >
                            </span>
                        </div>

                </div>


                <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                        <span class="pros-schoolheading ms-1" style="line-height: 35px;">Term or semester here</span>
                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                Kindly  input your default term or semester below.
                        </span>
                        <br>';


                        $selecttermsemester = mysqli_query($link,"SELECT * FROM `termorsemester`");
                        $selecttermsemester_cnt = mysqli_num_rows($selecttermsemester);
                        $selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester);


                        if($selecttermsemester_cnt > 0)
                        {
                        

                            echo ' <div class="row">';

                            
                            
                                    do{

                                        $ternamesetup = $selecttermsemester_row['TermOrSemesterName'];
                                        $ternamesetupID = $selecttermsemester_row['TermOrSemesterID'];
                                    

                                        echo '<div class="col-sm-6">
                                                <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName">Term</label></div>
                                            <div class="pros-flexi-input-affix-wrapper-campus" style="opacity: 0.5;pointer-events: none;background-color:#d3d3d3;">
                                                <input type="text" disabled  class="pros-flexi-input " value="'.$ternamesetup.' Term" id="term" placeholder="term" style="width:80%;font-size:14px;font-weight:400;">
                                            </div>&nbsp;&nbsp;
                                        </div>';


                                                $verifyterm = mysqli_query($link,"SELECT * FROM `termalias` WHERE TermOrSemesterID='$ternamesetupID' AND CampusID='$campusID_new'");
                                                $verifytermcnt = mysqli_num_rows($verifyterm);
                                                $verifytermcntrow = mysqli_fetch_assoc($verifyterm);

                                                if($verifytermcnt  > 0)
                                                {
                                                    $termaliasname =  $verifytermcntrow['TermAliasName'];
                                                }else
                                                {

                                                    $verifyterm_maincampus = mysqli_query($link,"SELECT * FROM `termalias` WHERE TermOrSemesterID='$ternamesetupID' AND CampusID='$campusID_newmain'");
                                                    $verifytermcnt_maincampus = mysqli_num_rows($verifyterm_maincampus);
                                                    $verifytermcntrow_maincampus = mysqli_fetch_assoc($verifyterm_maincampus);

                                                    if($verifytermcnt_maincampus > 0)
                                                    {
                                                        $termaliasname =  $verifytermcntrow_maincampus['TermAliasName'];
                                                    }else
                                                    {
                                                        $termaliasname =  ''; 
                                                    }
                                                }

                                                

                                            echo '<div class="col-sm-6">
                                                        <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> TERM ALIAS<span style=""></span></label></div>
                                                    <div class="pros-flexi-input-affix-wrapper-campus">
                                                        <input type="text"   class="pros-flexi-input pros-getterm-aliasvalue" data-id="'.$ternamesetupID.'" value="'.$termaliasname.'"  placeholder="eg;Summer" style="width:80%;font-size:14px;font-weight:400;">
                                                    </div>&nbsp;&nbsp;
                                            </div>';
                                    
                    
                                    }while($selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester));

                                echo '</div>';  
                        }else
                        {

                        }

                    echo '<br> <button type="button" id="pros-createsession-termbtn" data-tag="29" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"    style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Proceed</button><br>
                </div>';


                echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                    <div class="pros-wizard-container">
                        
                        <div class="pros-wizard-steps">

                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">1</div>
                                <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                            </div>
                            </div>
                        
                            <div class="pros-wizard-step">
                        
                            <div class="pros-step-content">
                                <div class="pros-step-number ">2</div>
                                <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                            </div>
                            </div>

                            
                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number">3</div>
                                <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                            </div>
                            </div>


                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">4</div>
                                <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                            </div>
                            </div>


                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">5</div>
                                <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                            </div>
                            </div>



                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number active">6</div>
                                <div class="pros-step-description active" style="font-size:12px;">Term</div>
                            </div>
                            </div>
                            
                        </div>
                    </div> 
                </div>';

                echo '</div>';                   
            // set session and term







    }else{

    

                                    

                                //create school head start here // 
                                    echo '<div class="row" id="pros-displayhead-setup" style="padding:0%;display:none">
                                                <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                                    <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>School head</h1></div><br><br>

                                                        <div class="pros-dotted-box">
                                                            <span class="schooliconinform" >
                                                            <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/schoolhead.png" >
                                                            </span>
                                                        </div>
                                                    
                                                </div>
                                                            

                                                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                                            <span class="pros-schoolheading" style="line-height: 35px;" >Create a school head</span>
                                                        
                                                            <span class="pros-sectionpart "  style="color: #363949;font-size:12px;display: block;">
                                                                    Kindly create a school head to manage your campus.add multiple school head by clicking  add school head below.
                                                            </span><br>
                                                        ';



                                                        echo '  <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> First name<span style="color:red;">*</span></label></div>
                                                                            <div class="pros-flexi-input-affix-wrapper-campus headfnamecover">
                                                                                <input type="text" class="pros-flexi-input generalheadfirstname" data-id="" id="scheadinsertid" placeholder="First name" style="width:70%;">
                                                                            </div>&nbsp;&nbsp;
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> Last Name<span style="color:red;">*</span></label></div>
                                                                            <div class="pros-flexi-input-affix-wrapper-campus headlnamecover">
                                                                                <input type="text" class="pros-flexi-input generalhealtname"  data-id="" id="head-lname" placeholder="Last name" style="width:70%;">
                                                                            </div>&nbsp;&nbsp;
                                                                        </div>

                                                                        <div class="col-sm-12">
                                                                                <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                                                                <div class="pros-flexi-input-affix-wrapper-campus heademailcover">
                                                                                    <input type="text" class="pros-flexi-input generalheademail" data-id="" id="head-email" placeholder="eg:example@example.com" style="width:70%;">
                                                                                </div>&nbsp;&nbsp;
                                                                        </div>

                                                                        <div class="col-sm-12">
                                                                                <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                                                                <div class="pros-flexi-input-affix-wrapper-campus headnumcover">
                                                                                    <input type="number" name="pros-headnumset[main]" data-id="" class="pros-flexi-input generalheadnum" id="pros-headnumset" placeholder="e:g XXXX-XXX-XXXX" style="width:91%;margin-left:4%;">
                                                                                </div>&nbsp;&nbsp; 
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div id="displayschool-headinput"></div>
                                                                    
                                                                
                                                    
                                                                        <center>
                                                                        <span class="circle-icon" id="pros-addschoolhead-btn" style="color:#007bff;font-size:12px;cursor:pointer;">
                                                                        Add school head <i class="fa fa-plus"></i>
                                                                        </span>
                                                                    </center>&nbsp;&nbsp;<br>
                                                                    <input type="hidden" id="appendinput-schoolhead">
                                                                    <input type="hidden" id="checkvalidatedschoolhead">
                                                                    
                                                                    
                                                                    <button type="button" id="pros-create-schoolheadbtn" data-maintag="'.$tagstatecampusmain.'" data-campus="'.$campusID_new.'" data-tag="17" data-school="'.$groupschoolID_new .'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create new</button><br>
                                                                </div>

                                                        <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                                                            <div class="pros-wizard-container" >

                                                                
                                                                <div class="pros-wizard-steps">

                                                                    <div class="pros-wizard-step">
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number">1</div>
                                                                        
                                                                        <div class="pros-step-description " style="font-size:13px;">  Section</div>
                                                                    </div>
                                                                    </div>
                                                                
                                                                    <div class="pros-wizard-step">
                                                                
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number active">2</div>
                                                                        <div class="pros-step-description active" style="font-size:13px;">School head</div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="pros-wizard-step">
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number">3</div>
                                                                        <div class="pros-step-description" style="font-size:13px;">Assign School head</div>
                                                                    </div>
                                                                    </div>
                                                                    
                                                                    <div class="pros-wizard-step">
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number">4</div>
                                                                        <div class="vr" style="background-color:blue;"></div>
                                                                        <div class="pros-step-description" style="font-size:13px;">Teacher</div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="pros-wizard-step">
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number">5</div>
                                                                        <div class="pros-step-description" style="font-size:13px;">Other staff</div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                            </div>';

                                //create school head end here//  

                                    //  create section start here    
                                        echo '<div class="row" id="displaysection-content" style="padding:0%;display:none">

                                                        <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                                            <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Choose section</h1></div><br><br>

                                                                <div class="pros-dotted-box">
                                                                    <span class="schooliconinform" >
                                                                    <img  class="schooliconinform-image-new" src="../../assets/images/users/school-sectionimage.png" >
                                                                    </span>
                                                                </div>
                                                        </div>


                                                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                                            <span class="pros-schoolheading" style="line-height: 35px; margin-left:2%;" >Create and Customize School Sections</span>
                                                        
                                                            <span class="pros-sectionpart ms-2"  style="color:#363949;font-size:13px; display: block;">
                                                                Select the sections you want to include in your school (e.g., Junior Secondary, Senior Secondary) and assign an alias to each one for clarity.
                                                                The alias will help you personalize the section names to suit your school\'s structure.
                                                            </span>
                                                        ';

                                                            $delect_section = mysqli_query($link, "SELECT * FROM `sectionlist`");
                                                            $delect_section_cnt = mysqli_num_rows($delect_section);
                                                            $delect_section_cnt_row = mysqli_fetch_assoc($delect_section);
                                                            $num = 1;

                                                        echo '<br><div class="row">';
                                                                do {

                                                                        $section_name = trim($delect_section_cnt_row['SectionListName']);
                                                                        $facultyID = $delect_section_cnt_row['SectionListID'];
                                                                        //<span style="font-weight:800;">'.$num++.'</span>



                                                                        $pros_verify_sectio_created = mysqli_query($link,"SELECT * FROM `section` WHERE `CampusID`='$campusID_new' AND SectionListID='$facultyID'"); 
                                                                        $pros_verify_sectio_created_cnt = mysqli_num_rows($pros_verify_sectio_created);
                                                                        $pros_verify_sectio_created_cnt_row = mysqli_fetch_assoc($pros_verify_sectio_created);


                                                                        if($pros_verify_sectio_created_cnt > 0)
                                                                        {

                                                                                $sectionalisanamegotten =  trim($pros_verify_sectio_created_cnt_row['SectionName']);
                                                                                $pros_checked_sectioncreated = 'checked';
                                                                                $bordercolor = '1px solid #007bff';
                                                                                
                                                                        }else
                                                                        {
                                                                            $sectionalisanamegotten = trim($section_name);
                                                                            $pros_checked_sectioncreated = '';
                                                                            $bordercolor = 'none';
                                                                        }
                                                                        

                                                                            echo
                                                                                '
                                                                                <div class="col-sm-6 mb-3">
                                                                                        
                                                                                    <div class="card generalclass-checksection checksectiongeneral'.$facultyID.'" 
                                                                                            data-id="prosfacultyid'.$facultyID.'" 
                                                                                            style="cursor:pointer;border-radius:10px;outline:'.$bordercolor.';">
                                                                                            <div class="card-body" style="border:none;border-radius:5px;height:50px;">
                                                                                                <div class="radio-group">
                                                                                                    <input class="form-check-input pros-checkchildren sectioncheckbox" 
                                                                                                        id="prosfacultyid'.$facultyID.'" 

                                                                                                         data-id="prosfacultyid'.$facultyID.'"  
                                                                                                         data-checkverify="checksectiongeneral' . $facultyID . '"
                                                                                                        type="checkbox"
                                                                                                        value="'.$section_name.'"
                                                                                                        '.$pros_checked_sectioncreated.'
                                                                                                        >
                                                                                                    <label for="prosfacultyid'.$facultyID.'" 
                                                                                                        style="cursor:pointer;font-size:12px;">
                                                                                                        '.$section_name.'
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>                


                                                                                    </div>';
                                                                            
                                                                            echo '<div class="col-sm-6 mb-3">
                                                                                        <input type="text" style="border-radius:10px;height:50px;color:gray;font-size:13px;outline:'.$bordercolor.'" data-id="'.$facultyID.'" value="'.$sectionalisanamegotten.'" class="form-control prosgetcheckedsectionaliasgeneralclass sectioncheckbox pros-checkchildren sectionalianameherechecked'.$facultyID.'" placeholder="enter section alias" >          
                                                                                </div>';
                                                                        

                                                                    } while ($delect_section_cnt_row = mysqli_fetch_assoc($delect_section));

                                                        echo '</div>

                                                        
                                                            <button type="button" id="pros-create-sectionbtn" data-school="'.$groupschoolID_new.'" data-main="'.$tagstatecampusmain.'" data-tag="16" data-campus="' . $campusID_new . '"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create section</button><br>
                                                    </div>

                                                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                                                            <div class="pros-wizard-container" >

                                                                
                                                                <div class="pros-wizard-steps">

                                                                    <div class="pros-wizard-step">
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number active">1</div>
                                                                        <div class="vertical-line"> </div>
                                                                        <div class="pros-step-description active" style="font-size:13px;">  Section</div>
                                                                    </div>
                                                                    </div>
                                                                
                                                                    <div class="pros-wizard-step">
                                                                
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number">2</div>
                                                                        <div class="pros-step-description" style="font-size:13px;">School head</div>
                                                                    </div>
                                                                    </div>

                                                                    
                                                                    <div class="pros-wizard-step">
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number">2</div>
                                                                        <div class="pros-step-description" style="font-size:13px;">Assign School head</div>
                                                                    </div>
                                                                    </div>

                                                                    
                                                                    <div class="pros-wizard-step">
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number">4</div>
                                                                        <div class="vr" style="background-color:blue;"></div>
                                                                        <div class="pros-step-description" style="font-size:13px;">Teacher</div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="pros-wizard-step">
                                                                    <div class="pros-step-content">
                                                                        <div class="pros-step-number">5</div>
                                                                        <div class="pros-step-description" style="font-size:13px;">Other staff</div>
                                                                    </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div> 
                                                    </div>
                                                </div>';
                                //  create section end here 



                            //assign school head to section start here 
                            echo '<div class="row" id="assignschoolheadfaculty" style="padding:0%;display:none">
                                                    
                                        <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:80px;">
                                            <div class="pros-diskschooltitle " style="margin-right:10rem;font-size:10px;"><h1>Assign school head</h1></div><br><br>
                                            <div class="pros-dotted-box">
                                                <span class="schooliconinform" >
                                                <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/schoolhead.png" >
                                                </span>
                                            </div>
                                        </div>


                                        <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                            <span class="pros-schoolheading ms-4" style="line-height:35px;">Assign school head to section</span>
                                        
                                            <span class="pros-sectionpart ms-4"  style="color: #363949;font-size:12px;display: block;">
                                            kindly click on the section to assign to assign a school head.
                                            </span><br><br>';


                                        $delect_section_new = mysqli_query($link, "SELECT * FROM `section` WHERE CampusID='$campusID_new' ORDER BY SectionName ASC");
                                        $delect_section_cnt_new = mysqli_num_rows($delect_section_new);
                                        $delect_section_cnt_row_new = mysqli_fetch_assoc($delect_section_new);

                                    echo '<div class="row ms-1" >';
                                        
                                            if($delect_section_cnt_new > 0)
                                            {

                                        
                                                    do {

                                                            $section_name_new = $delect_section_cnt_row_new['SectionName'];
                                                            $facultyID_new = $delect_section_cnt_row_new['SectionID'];
                                                            // <div class="pros-flexi-label-wrapper" style="margin-right:11.1rem;"><label for="schoolName">Select School head<span style="color:red;">*</span></label></div>
                                                            // <small class="text-muted ms-2" style="font-size:11px;margin-left:3px;">Kindly choose the school head you want to assign sections to.</small><br>

                                                                echo '<div class="col-sm-6">
                                                                        <div class="pros-container">
                                                                            <div class="pros-select-btn prosopendrophead' . $facultyID_new . ' pros-generalsechead" data-id="' . $facultyID_new . '">
                                                                                <span class="btn-text">' . $section_name_new . '<span class="pros-headdisplaynumslected' . $facultyID_new . '" style="font-size:11px;"></span></span>
                                                                                <span class="arrow-dwn">
                                                                                    <i class="fa fa-chevron-down"></i>
                                                                                </span>
                                                                            </div>
                                                    
                                                                            <ul class="list-items">';

                                                                                            $checkstaffverification_head = mysqli_query($link, "SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND `Role`='schoolhead'");
                                                                                            $checkstaffverificationcnt_head = mysqli_num_rows($checkstaffverification_head);
                                                                                            $checkstaffverificationcnt_row = mysqli_fetch_assoc($checkstaffverification_head);


                                                                                            do {


                                                                                                $headfirstname = $checkstaffverificationcnt_row['StaffFirstName'];
                                                                                                $headlastname = $checkstaffverificationcnt_row['StaffLastName'];
                                                                                                $headStaffID = $checkstaffverificationcnt_row['StaffID'];

                                                                                                $fullname = substr($headfirstname.' '.$headlastname.'...', 0, 8);
                                                                                            
                                                                                                

                                                                                                echo '<li class="item prosgenerallist-itemssel" data-id="' . $facultyID_new . '' . $headStaffID . '" data-faculty="' . $facultyID_new . '">
                                                                                                                <img  class="" src="' . $defaultUrl . '/assets/images/users/defaultprofile.png" style="width:40px;height:40px;">&nbsp;
                                                                                                                <span class="item-text abba_tooltip">'. $fullname.'  <span class="abba_tooltiptext">'.$headfirstname.' '.$headlastname.'</span></span>
                                                                                                                    <input type="radio" class="pros-checkbox-input-new pros-generalcheckschoolhead checkshoolheadnew' . $facultyID_new . ' proscheckboxinside' . $facultyID_new . '' . $headStaffID . '" data-staff="'.$headStaffID.'" data-faculty="' . $facultyID_new . '" id="schoolassign" style="float: right; margin-right:10px;"   name="schoolhead-assign'.$facultyID_new.'" value="' . $headStaffID . '">
                                                                                                        </li>';

                                                                                            } while ($checkstaffverificationcnt_row = mysqli_fetch_assoc($checkstaffverification_head));
                                                                            echo '</ul>
                                                                    </div>
                                                            </div>
                                                            ';
                                                        } while ($delect_section_cnt_row_new = mysqli_fetch_assoc($delect_section_new));
                                            }else
                                            {

                                                    echo '<center>
                                                            <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                                            <p>No section found</p>
                                                    </center>
                                                    
                                                    ';

                                            }

                                            echo '<br>
                                            <button type="button" id="assignschoolheadtofac-btn" data-tag="18" data-school="'.$groupschoolID_new.'" data-main="'.$tagstatecampusmain.'" data-campus="'.$campusID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Assign Now</button><br>';
                                      echo '</div> ';
                                echo '
                                </div>

                                <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                                <div class="pros-wizard-container" >

                                    
                                    <div class="pros-wizard-steps">
                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number ">1</div>
                                            <div class="pros-step-description" style="font-size:13px;">  Section</div>
                                        </div>
                                        </div>
                                    
                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number">2</div>
                                            <div class="pros-step-description" style="font-size:13px;">School head</div>
                                        </div>
                                        </div>

                                        
                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number active">3</div>
                                            <div class="pros-step-description active" style="font-size:11px;">Assign School head</div>
                                        </div>
                                        </div>
                                                
                                        
                                        
                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number">4</div>
                                            <div class="pros-step-description" style="font-size:13px;">Teacher</div>
                                        </div>
                                        </div>

                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number">5</div>
                                            <div class="pros-step-description" style="font-size:13px;">Other staff</div>
                                        </div>
                                        </div>
                                        
                                    </div>
                                </div> 
                                </div>';
                            echo '</div>';

                            //assign school head to section end here 





                            //create school teacher start here 
                                echo '<div class="row" id="proscreateschool-teacher" style="padding:0%;display:none">
                                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                            <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Create teacher</h1></div><br><br>
                                        <div class="pros-dotted-box">
                                            <span class="schooliconinform" >
                                            <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/teacher-setupimage.png" >
                                            </span>
                                        </div>

                                    </div>


                                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                        <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Create teacher</span>
                                    
                                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                            Kindly create a subject teacher below.
                                        </span><br>';


                                                echo '
                                                    <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="pros-flexi-label-wrapper" style="margin-right:6rem;"><label for="schoolName"> First name<span style="color:red;">*</span></label></div>
                                                                <div class="pros-flexi-input-affix-wrapper-campus teacherfnamecover">
                                                                    <input type="text" class="pros-flexi-input generalteacherfirstname" data-id="" id="teacherinsertid" placeholder="First name" style="width:70%;">
                                                                </div>&nbsp;&nbsp;
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> Last Name<span style="color:red;">*</span></label></div>
                                                                <div class="pros-flexi-input-affix-wrapper-campus teacherlnamecover">
                                                                    <input type="text" class="pros-flexi-input generalteacherltname"  data-id="" id="teacher-lname" placeholder="Last name" style="width:70%;">
                                                                </div>&nbsp;&nbsp;
                                                            </div>

                                                            <div class="col-sm-12">
                                                                    <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                                                    <div class="pros-flexi-input-affix-wrapper-campus teacheremailcover">
                                                                        <input type="text" class="pros-flexi-input generalteacheremail" data-id="" id="teacher-email" placeholder="eg:example@example.com" style="width:70%;">
                                                                    </div>&nbsp;&nbsp;
                                                            </div>

                                                            <div class="col-sm-12">
                                                                    <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                                                    <div class="pros-flexi-input-affix-wrapper-campus teachernumcover">
                                                                            <input type="number" name="pros-teachernumset[main]" data-id="" class="pros-flexi-input generalteachernum" id="pros-teachernumset" placeholder="e.g., XXXX-XXX-XXXX" style="width:91%;margin-left:4%;">
                                                                    </div>&nbsp;&nbsp;
                                                            </div>
                                                    </div>

                                                    <div id="displayschool-teacher"></div>
                                                
                                                    <center>
                                                    <span class="circle-icon" id="pros-addteacher-btn" style="color:#007bff;font-size:12px;cursor:pointer;">
                                                    Add teacher <i class="fa fa-plus"></i>
                                                    </span>
                                                </center>&nbsp;&nbsp;';

                                            echo '<br>
                                            <button type="button" id="createteacher-setup-btn" data-tag="19" data-maintag="'.$tagstatecampusmain.'"  data-campus="'.$campusID_new.'" data-school="'. $groupschoolID_new .'"    style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create Now</button><br>
                                            <input type="hidden" id="appendinput-teacher">
                                            <input type="hidden" id="checkvalidatedteacher">
                                    </div>

                                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                                        <div class="pros-wizard-container">

                                            
                                            <div class="pros-wizard-steps">

                                                <div class="pros-wizard-step">
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number ">1</div>
                                                    <div class="pros-step-description" style="font-size:13px;">  Section</div>
                                                </div>
                                                </div>
                                            
                                                <div class="pros-wizard-step">
                                            
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number">2</div>
                                                    <div class="pros-step-description" style="font-size:13px;">School head</div>
                                                </div>
                                                </div>

                                                
                                                <div class="pros-wizard-step">
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number ">3</div>
                                                    <div class="pros-step-description " style="font-size:11px;">Assign School head</div>
                                                </div>
                                                </div>
                                                        
                                                
                                                
                                                <div class="pros-wizard-step">
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number active">4</div>
                                                    <div class="pros-step-description active" style="font-size:13px;">Teacher</div>
                                                </div>
                                                </div>

                                                <div class="pros-wizard-step">
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number">5</div>
                                                    <div class="pros-step-description" style="font-size:13px;">Other staff</div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div> 
                                    </div>';

                                echo '</div>';
                                //create school teacher end here 





                                //create  other staff  start here 
                                    echo '<div class="row" id="createotherschooltype-setup" style="padding:0%;display:none">
                                    <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                            <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1> Other staff</h1></div><br><br>
                                        <div class="pros-dotted-box">
                                            <span class="schooliconinform" >
                                            <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/teacher-setupimage.png" >
                                            </span>
                                        </div>

                                    </div>


                                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                        <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Create Other staff</span>
                                    
                                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                            kindly click yes to create any  staff of your choice  or skip to get to another step 
                                        </span><br>';


                                    echo '<div class="row" id="createotheeusertypecover" >

                                            <div class="col-sm-12 mb-3">

                                                <div class="card generalcreateotheeusertypecover" style="cursor:pointer;" data-id="1">

                                                    <div class="card-body" style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                                        <div class="radio-group">
                                                            
                                                            <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck-setup" value="senior executive/Board member" id="proschecksetupboard" name="usertype">

                                                            <label for="seniorexecutive" style="font-weight:600;cursor:pointer;"  data-id="1">Senior executive/Board member</label>
                                                            
                                                        </div>
                                                        
                                                    </div>

                                                </div>  

                                            </div>
                                            
                                            <div class="col-sm-12 mb-3">

                                                <div class="card generalcreateotheeusertypecover" style="cursor:pointer;" data-id="2">
                                                
                                                    <div class="card-body" style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                                        <div class="radio-group">
                                                            <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck-setup" value="admin" id="pros-checksetupdamin" name="usertype">
                                                            <label class="ml-1" data-id="2" for="personalassist" style="font-weight:600;cursor:pointer;">Admin </label>
                                                        </div>
                                                    
                                                    </div>

                                                </div>     
                                            
                                            </div>

                                            <div class="col-6">
                                                    <button type="button" class="btn btn-secondary btn-sm" style="width:70%;margin-top:20px;" data-action="notedit" data-tag="20" id="skipcreatestaff" data-campus="'.$campusID_new.'"    class="btn  text-dark" class="">skip <i class="fa fa-angle-double-right"></i></button>
                                            </div>

                                            <div class="col-6">
                                                        <button type="button" class="btn btn-primary btn-sm" style="width:70%;float:right;margin-top:20px;" id="proceedtocreatestaff-setup">yes <i class="fa fa-long-arrow-right"></i></button>
                                            </div>
                                        </div>';

                                    echo '
                                    <div id="admininputcoversetup" style="display:none">        
                                        <div class="row">

                                                <div class="col-sm-6">
                                                    <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> First name<span style="color:red;">*</span></label></div>
                                                    <div class="pros-flexi-input-affix-wrapper-campus adminfnamecover">
                                                        <input type="text" class="pros-flexi-input generaladminfirstname" data-id="" id="admininsertid" placeholder="First name" style="width:93%;">
                                                    </div>&nbsp;&nbsp;
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> Last Name<span style="color:red;">*</span></label></div>
                                                    <div class="pros-flexi-input-affix-wrapper-campus adminlnamecover">
                                                        <input type="text" class="pros-flexi-input generaladminltname"  data-id="" id="admin-lname" placeholder="Last name" style="width:93%;">
                                                    </div>&nbsp;&nbsp;
                                                </div>

                                                <div class="col-sm-12">
                                                        <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                                        <div class="pros-flexi-input-affix-wrapper-campus adminemailcover">
                                                            <input type="text" class="pros-flexi-input generaladminemail" data-id="" id="admin-email" placeholder="eg:example@example.com" style="width:93%;">
                                                        </div>&nbsp;&nbsp;
                                                </div>

                                                <div class="col-sm-12">
                                                        <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                                        <div class="pros-flexi-input-affix-wrapper-campus adminnumcover">
                                                            <input type="number" name="pros-adminnumset[main]" data-id="" class="pros-flexi-input generaladminnum" id="pros-adminnumset" placeholder="e.g., XXXX-XXX-XXXX" style="width:93%;margin-left:4%;">
                                                        </div>&nbsp;&nbsp;
                                                </div>

                                        </div>

                                        <div id="displayschool-admin"></div>
                                    

                                            <center>
                                            <span class="circle-icon" id="pros-add-admin-btn" style="color:#007bff;font-size:12px;cursor:pointer;">
                                            Add staff <i class="fa fa-plus"></i>
                                            </span>
                                        </center>&nbsp;&nbsp; ';

                                        echo '<br>
                                        <button type="button" id="createadmin-setup-btn" data-action="notedit" data-maintag="'.$tagstatecampusmain.'" data-tag="20" data-school="'.$groupschoolID_new.'" data-campus="'.$campusID_new.'"    style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create Now</button><br>
                                        <input type="hidden" id="appendinput-admin">
                                        <input type="hidden" id="checkvalidatedadmin">
                                        </div>
                                        ';
                                // create other user type

                                echo '<input type="hidden" id="usertypevalue-setup">'; //store usertype value here

                                echo '</div>

                                <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                                    <div class="pros-wizard-container">

                                    
                                        <div class="pros-wizard-steps">

                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">1</div>
                                                <div class="pros-step-description" style="font-size:13px;">  Section</div>
                                            </div>
                                            </div>
                                        
                                            <div class="pros-wizard-step">
                                        
                                            <div class="pros-step-content">
                                                <div class="pros-step-number">2</div>
                                                <div class="pros-step-description" style="font-size:13px;">School head</div>
                                            </div>
                                            </div>

                                            
                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">3</div>
                                                <div class="pros-step-description " style="font-size:11px;">Assign School head</div>
                                            </div>
                                            </div>
                                                    
                                            
                                            
                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">4</div>
                                                <div class="pros-step-description " style="font-size:13px;">Teacher</div>
                                            </div>
                                            </div>

                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number active">5</div>
                                                <div class="pros-step-description active" style="font-size:13px;">Other staff</div>
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                </div>';

                                echo '</div>';
                                //create  other staff  end here 



                            //congratulations msg half setup
                                echo '<div class="row" id="createwelcomemsg-setup" style="padding:0%;display:none">

                                    <center><h4 class="ms-5" style="color:#666666;font-weight:bold;"><b>Hurray!!</b> Congratulations ' .$ownername . ',</h4></center> 

                                    <center><img  class="" src="../../assets/images/users/congratulations-images.png" style="width:200px;height:150px;"></center>


                                    <p class="pros-setmsgdes" style="display:block;font-size:14px;">
                                        part of your setup has been accomplished successfully.<br> kindly click to create classes and subject.
                                    </p>';
                                echo '<center><button type="button" id="proceedto-createclassbtn" data-tag="21"  data-campus="'.$campusID_new.'"  style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light">Proceed <i class="fa fa-long-arrow-right"></i></button></center>';

                                echo '</div>';
                            //congratulations msg half setup ends here


                                //create class start here
                                echo '<div class="row" id="createclasses-setup" style="padding:0%;display:none">';
                                        echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                                <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Create class</h1></div><br><br>

                                                <div class="pros-dotted-box">
                                                    <span class="schooliconinform" >
                                                        <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/classimages.png" >
                                                    </span>
                                                </div>
                                
                                        </div>


                                        <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                                    <span class="pros-schoolheading ms-1" style="line-height:35px;">Create classes</span>
                                                
                                                    <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                                        kindly click on the section to assign to a school head.
                                                    </span><br>';


                                                        $sqlGetSchool_class = ("SELECT * FROM `section` WHERE CampusID='$campusID_new'");
                                                        $resultGetSchool_class = mysqli_query($link, $sqlGetSchool_class);
                                                        $rowGetSchool_class = mysqli_fetch_assoc($resultGetSchool_class);
                                                        $row_cntGetSchool_class = mysqli_num_rows($resultGetSchool_class);

                                                echo '<div class="row">';

                                                            if($row_cntGetSchool_class  > 0)
                                                            {

                                                                    $numclass = 1;
                                                                    do {


                                                                    $facultyname_class = $rowGetSchool_class['SectionName'];
                                                                    $facultynameID_class = $rowGetSchool_class['SectionID'];
                                                                    $facultynameID_class_SectionListID = $rowGetSchool_class['SectionListID'];

                                                                    echo '<div class="col-sm-12">';

                                                                        echo '<div class="pros-container-class" style="width:100%;margin-bottom:20px;">
                                                                                <div class="pros-select-btn  createclassgeneral pros-openclasswhenclick' . $facultynameID_class . ' getclassopenondocument-ready' . $numclass++ . '"  data-faculty="' . $facultynameID_class . '">
                                                                                    <span class="btn-text">' . $facultyname_class . '</span>
                                                                                    <span class="arrow-dwn">
                                                                                        <i class="fa fa-chevron-down"></i>
                                                                                    </span>
                                                                                </div>

                                                                                <div class="list-items" style="padding:15px 40px 40px 40px;list-style-type:none;">';
                                                                                    echo '<small  style="font-size:12px;margin-left:0.4rem;">kindly input your class below <br><strong>Note:</strong> you can add multiple class in an input with comma seperated just .</small><p></p><p></p>';
                                                                                    
                                                                                            echo'<div class="row">
                                                                                            
                                                                                            ';



                                                                                                $pros_select_row_classfor_section_created = mysqli_query($link,"SELECT * FROM `classtemplate` WHERE SectionListID='$facultynameID_class_SectionListID'");
                                                                                                    $pros_select_row_classfor_section_created_row = mysqli_fetch_assoc($pros_select_row_classfor_section_created);
                                                                                                    $pros_select_row_classfor_section_created_cnt = mysqli_num_rows($pros_select_row_classfor_section_created);

                                                                                                    if($pros_select_row_classfor_section_created_cnt > 0)
                                                                                                    {
                                                                                                                        do{

                                                                                                                                $pros_ClassTemplateName =  $pros_select_row_classfor_section_created_row['ClassTemplateName'];
                                                                                                                                $pros_ClassTemplateID =  $pros_select_row_classfor_section_created_row['ClassTemplateID'];
                                                                

                                                                                                                                echo '<h6>'.$pros_ClassTemplateName.'</h6>
                                                                                                                                        <div class="col-sm-12 mb-3">
                                                                                                                                                <input type="text" style="border-radius:10px;height:50px;color:gray;font-size:13px;"  data-faculty="'.$facultynameID_class.'" data-classlist="'.$pros_ClassTemplateID.'"  class="form-control prosgeneralclassselecttobecreated prosgeneralclass-getfaculty'.$pros_ClassTemplateID.'" placeholder="e:g;JSS ONE A,JSS ONE B" >          
                                                                                                                                        </div>';
                                                                                                                                

                                                                                                                        }while($pros_select_row_classfor_section_created_row = mysqli_fetch_assoc($pros_select_row_classfor_section_created));
                                                                                                    }else
                                                                                                    {



                                                                                                        echo '<center>
                                                                                                                    <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                                                                                                    <p>Class template not found for this section.</p>
                                                                                                        </center>';

                                                                                                    }

                                                                                            
                                                                                            echo '</div>';
                                                                                            




                                                                                

                                                                                        echo '</div>
                                                                        </div>';

                                                                    echo '</div>';


                                                                    } while ($rowGetSchool_class = mysqli_fetch_assoc($resultGetSchool_class));
                                                            }else
                                                            {

                                                            }
                                                echo '</div>';


                                            echo '<br> <button type="button" id="createclass-setup-btn" data-maintag="'.$tagstatecampusmain.'"  data-campus="'.$campusID_new.'"  data-tag="22" data-school="'.$groupschoolID_new.'"    style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create Class</button><br>
                                    </div>

                                        <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                                                <div class="pros-wizard-container">

                                                    
                                                    <div class="pros-wizard-steps">

                                                        <div class="pros-wizard-step">
                                                        <div class="pros-step-content">
                                                            <div class="pros-step-number active">1</div>
                                                            <div class="pros-step-description active" style="font-size:13px;">Create Class</div>
                                                        </div>
                                                        </div>
                                                    
                                                        <div class="pros-wizard-step">
                                                            <div class="pros-step-content">
                                                                <div class="pros-step-number">2</div>
                                                                <div class="pros-step-description" style="font-size:13px;">Create Subject</div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="pros-wizard-step">
                                                        <div class="pros-step-content">
                                                            <div class="pros-step-number ">3</div>
                                                            <div class="pros-step-description " style="font-size:11px;">Merge subject</div>
                                                        </div>
                                                        </div>



                                                        <div class="pros-wizard-step">
                                                        <div class="pros-step-content">
                                                            <div class="pros-step-number">4</div>
                                                            <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                                                        </div>
                                                        </div>
            
                                                        <div class="pros-wizard-step">
                                                        <div class="pros-step-content">
                                                            <div class="pros-step-number ">5</div>
                                                            <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                                                        </div>
                                                    </div>
                
                                                    <div class="pros-wizard-step">
                                                    <div class="pros-step-content">
                                                        <div class="pros-step-number">6</div>
                                                        <div class="pros-step-description" style="font-size:12px;">Term</div>
                                                    </div>
                                                    </div>
                                                                
                                                    
                                                        
                                                    </div>
                                                </div> 
                                            </div>';
                                echo '</div>';
                                //create class end here




                            //create subject  start here
                                echo '<div class="row" id="createsubject-setup" style="display:none;">';

                                    echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                        <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Create subject</h1></div><br><br>

                                            <div class="pros-dotted-box">
                                                <span class="schooliconinform" >
                                                    <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/subject-image.png" >
                                                </span>
                                            </div>
                                    
                                    </div>
                                



                                <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Create subject here</span>

                                <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                    kindly click on the each class to create a subject.
                                </span><br>';


                                $sqlGetSchool_subject = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new'");
                                $resultGetSchool_subject  = mysqli_query($link, $sqlGetSchool_subject);
                                $rowGetSchool_subject  = mysqli_fetch_assoc($resultGetSchool_subject);
                                $row_cntGetSchool_subject  = mysqli_num_rows($resultGetSchool_subject );

                                    echo '<div class="row">';

                                    if($row_cntGetSchool_subject > 0)
                                    {

                                            $subjecttestideitednecon = 1;

                                            $numsubject = 1;
                                            do {


                                            $facultyname_subject  = $rowGetSchool_subject ['ClassOrDepartmentName'];
                                            $facultynameID_subject  = $rowGetSchool_subject ['ClassOrDepartmentID'];
                                            $facultynameID_subject_ClassTemplateID  = $rowGetSchool_subject ['ClassTemplateID'];

                                            echo '<div class="col-sm-12">';

                                            echo '<div class="pros-container-class" style="width:100%;margin-bottom:20px;">
                                            <div class="pros-select-btn  createsubjectgeneral pros-opensubjectwhenclick' . $facultynameID_subject . ' getsubjectopenondocument-ready' . $numsubject ++ . '"  data-faculty="' . $facultynameID_subject  . '">
                                                <span class="btn-text">' . $facultyname_subject  . '</span>
                                                <span class="arrow-dwn">
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>';



                                                    

                                                        echo'<div class="list-items" style="padding:15px 40px 40px 40px;list-style-type:none;">';

                                                                        $selectsubject_for_template_here = mysqli_query($link,"SELECT * FROM `subjectorcourse` WHERE `ClassTemplateID`='$facultynameID_subject_ClassTemplateID'");
                                                                        $selectsubject_for_template_here_cnt_row =  mysqli_fetch_assoc($selectsubject_for_template_here);
                                                                        $selectsubject_for_template_here_cnt =  mysqli_num_rows($selectsubject_for_template_here);


                                                                        if($selectsubject_for_template_here_cnt > 0)
                                                                        {


                                                                                    echo '<div class="wrapper">
                                                                                            
                                                                                                <div class="pros-content-subject">
                                                                                                    <div class="pros-search-subjectname">
                                                                                                    </div><br>
                                                                                                
                                                                                                    <fieldset class="tari-tari_checkbox-group prosloadsubjectcontainer-forcreate" >';

                                                                                                                        do{

                                                                                                                                $pros_SubjectOrCourseName_list = $selectsubject_for_template_here_cnt_row['SubjectOrCourseTitle'];
                                                                                                                                $pros_SubjectOrCourseName_listID = $selectsubject_for_template_here_cnt_row['SubjectOrCourseID'];

                                                                                                                                    $subjecttestideitednecon++;

                                                                                                                                $veliadetsubjectcreated_pros = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` WHERE ClassOrDepartmentID='$facultynameID_subject' AND `SubjectOrCourseID`='$pros_SubjectOrCourseName_listID'");
                                                                                                                                $veliadetsubjectcreated_proscnt = mysqli_num_rows($veliadetsubjectcreated_pros);
                                                                                                                                $veliadetsubjectcreated_proscntrow = mysqli_fetch_assoc($veliadetsubjectcreated_pros);


                                                                                                                                if($veliadetsubjectcreated_proscnt > 0)
                                                                                                                                {
                                                                                                                                                $subjectselected = 'checked';
                                                                                                                                }else

                                                                                                                                {
                                                                                                                                                    $subjectselected = '';
                                                                                                                                }

                                                                                                                                echo '
                                                                                                                                <div class="tari_checkbox " >
                                                                                                                                <label  for="editcheckbox'.$pros_SubjectOrCourseName_listID.$subjecttestideitednecon.'" class="tari_checkbox-wrapper">
                                                                                                                                    <input type="checkbox" '.$subjectselected.' id="editcheckbox'.$pros_SubjectOrCourseName_listID.$subjecttestideitednecon.'" data-class="'.$facultynameID_subject.'" value="'.$pros_SubjectOrCourseName_listID.'" class="tari_checkbox-input prosgeneralsubjectgotten "   />
                                                                                                                                    <span class="tari_checkbox-tile">&nbsp;&nbsp;
                                                                                                                                    <span class="tari_checkbox-label">'.$pros_SubjectOrCourseName_list.'</span>
                                                                                                                                    </span>
                                                                                                                                </label>
                                                                                                                                </div>';

                                                                                                                        }while($selectsubject_for_template_here_cnt_row =  mysqli_fetch_assoc($selectsubject_for_template_here));
                                                                                                            
                                                                                                    echo '
                                                                                                    </fieldset>
                                                                                                </div>
                                                                                            </div>';
                                                                        }else
                                                                        {

                                                                            echo '<center>
                                                                                    <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                                                                    <p>Subject not found</p>
                                                                                    </center>';
                                                                                    
                                                                                    
                                                                    
                                                                        }
                                                            
                                                        
                                                                    

                                                    echo '</div>
                                                </div>';
                                        echo '</div>';


                                                } while ($rowGetSchool_subject  = mysqli_fetch_assoc($resultGetSchool_subject ));
                                        }else
                                        {
                                            echo '<center>
                                            <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                            <p>Class not found</p>
                                            </center>';
                                        }
                                    echo '</div>';

                        
                            
                            


                                    echo '<br> <button type="button" id="createsubject-setup-btn" data-tag="23" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create Subject</button><br>
                                </div>

                                <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                                        <div class="pros-wizard-container">

                                            
                                            <div class="pros-wizard-steps">

                                                <div class="pros-wizard-step">
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number ">1</div>
                                                    <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                                                </div>
                                                </div>
                                            
                                                <div class="pros-wizard-step">
                                            
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number active">2</div>
                                                    <div class="pros-step-description active" style="font-size:12px;">Create Subject</div>
                                                </div>
                                                </div>

                                                
                                                <div class="pros-wizard-step">
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number ">3</div>
                                                    <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                                                </div>
                                                </div>


                                                <div class="pros-wizard-step">
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number">4</div>
                                                    <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                                                </div>
                                                </div>

                                                <div class="pros-wizard-step">
                                                <div class="pros-step-content">
                                                    <div class="pros-step-number ">5</div>
                                                    <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                                                </div>
                                            </div>
        
                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number">6</div>
                                                <div class="pros-step-description" style="font-size:12px;">Term</div>
                                            </div>
                                            </div>
                                                
                                            </div>
                                        </div> 
                                    </div>';
                                echo '</div>';

                            // merging of subject title
                                echo '<div class="row" id="mergesubjectcontent" style="display:none;">';

                                        echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">

                                            <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Merge subject </h1></div><br><br>

                                            <div class="pros-dotted-box">
                                                <span class="schooliconinform" >
                                                    <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/subject-image.png" >
                                                </span>
                                            </div>

                                        </div>


                                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                            <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Merge subject to a title</span>

                                            <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                                kindly select subjects you will like to merge to a title e:g ICT <br><i class="fa fa-arrow-right"></i>(computer studies, data processing etc).
                                            </span>
                                            <small class="mt-1" style="color: #363949;font-size:12px;display:block;"><b>Note:</b> this section is optional you can click on next below to skip this step.</small>
                                            <br>';


                                            $sqlGetSchool_subject_merge = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new'");
                                            $resultGetSchool_subject_merge  = mysqli_query($link, $sqlGetSchool_subject_merge);
                                            $rowGetSchool_subject_merge  = mysqli_fetch_assoc($resultGetSchool_subject_merge);
                                            $row_cntGetSchool_subject_merge  = mysqli_num_rows($resultGetSchool_subject_merge);

                                            echo '<div class="row">';
                                            

                                            if($row_cntGetSchool_subject_merge > 0)
                                            {

                                            
                                                    $numsubjectmerge = 1;
                                                    do {


                                                            $facultyname_subject_merge  = $rowGetSchool_subject_merge['ClassOrDepartmentName'];
                                                            $facultynameID_subject_merge  = $rowGetSchool_subject_merge['ClassOrDepartmentID'];
                                                            $facultynameID_subject_merge_templateID = $rowGetSchool_subject_merge['ClassTemplateID'];


                                                            $selecttitleass = mysqli_query($link,"SELECT * FROM `courseorsubjectmergetitle` WHERE CampusID='$campusID_new' AND ClassOrDepartmentID='$facultynameID_subject_merge'");
                                                            $selecttitleasscnt = mysqli_num_rows($selecttitleass);
                                                            $selecttitleasscntrow = mysqli_fetch_assoc($selecttitleass);

                                                            
                                                            // echo '<span class="mytooltip tooltip-effect-5"> <span class="tooltip-item">Euclid</span> <span class="tooltip-content clearfix"> <img src="../assets/images/tooltip/Euclid.png" /> <span class="tooltip-text">Also known as Euclid of andria, was a Greek mathematician, often referred.</span> </span> </span>';

                                                        

                                                            echo '<div class="col-sm-12">';

                                                            echo '<div class="pros-container-class" style="width:100%;margin-bottom:20px;">

                                                                    <div class="pros-select-btn  createsubjectgeneralmerge pros-opensubjectwhenclickmerge'.$facultynameID_subject_merge.' getsubjectopenondocument-ready' . $numsubjectmerge ++ .'"  data-faculty="'.$facultynameID_subject_merge.'">
                                                                        <span class="btn-text">' . $facultyname_subject_merge  . '</span>
                                                                        <span class="arrow-dwn">
                                                                            <i class="fa fa-chevron-down"></i>
                                                                        </span>
                                                                    </div>
                                        
                                    
                                                                        <div class="list-items  pros-reloadclasscontentmerge'.$facultynameID_subject_merge.'" style="padding:15px 40px 40px 40px;list-style-type:none;">
                                                                                <div class=" subjectlistmeslistmerge prosgenerallist-itemssel" >';



                                                                                if($selecttitleasscnt > 0)
                                                                                {

                                                                                        do{

                                                                                            $mergetitle = $selecttitleasscntrow['MergeTitle'];
                                                                                            $mergetitleID = $selecttitleasscntrow['CourseOrSubjectMergeID'];


                                                                                            $selectclassmerge_num = mysqli_query($link,"SELECT * FROM `courseorsubjectmerged` WHERE CampusID='$campusID_new' AND ClassOrDepartmentID='$facultynameID_subject_merge' AND CourseOrSubjectMergeID='$mergetitleID'");
                                                                                            $selectclassmerge_cnt_num = mysqli_num_rows($selectclassmerge_num);
                                                                                            $selectclassmerge_cntrow_num = mysqli_fetch_assoc($selectclassmerge_num);


                                                                                            echo '<div class="form-check form-check-inline" style="font-size:13px;">
                                                                                                
                                                                                                <label class="form-check-label pros-subjectmergelabel popup pros-hovermergesub" data-id="'.$facultynameID_subject_merge.''.$mergetitleID.'"  style="cursor:pointer;" for="inlineRadio1">
                                                                                                <div class="popuptext pros-popmeup'.$facultynameID_subject_merge.''.$mergetitleID.'" id="myPopup">';

                                                                                                        do{
                                                                                                            

                                                                                                            $subjectID_merged = $selectclassmerge_cntrow_num['SubjectOrCourseID'];
                                                                                                            
                                                                                                            

                                                                                                            $getsubectmerge =  mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` INNER JOIN `subjectorcourse` ON  `courseorsubjectallocation`.`SubjectOrCourseID` =   `subjectorcourse`.`SubjectOrCourseID` WHERE 
                                                                                                            `courseorsubjectallocation`.`CampusID`='$campusID_new' AND `courseorsubjectallocation`.`ClassOrDepartmentID`='$facultynameID_subject_merge' AND `courseorsubjectallocation`.`SubjectOrCourseID`='$subjectID_merged'");
                                                                                                            $getsubectmergecnt = mysqli_num_rows($getsubectmerge);
                                                                                                            $getsubectmergecntrow = mysqli_fetch_assoc($getsubectmerge);

                                                                                                            $subjectmerge_new = $getsubectmergecntrow['SubjectOrCourseTitle'];

                                                                                                        echo '<ul style="list-style-type:none;">
                                                                                                                <li>'.$subjectmerge_new.'</li>
                                                                                                            </ul>';


                                                                                                        }while($selectclassmerge_cntrow_num = mysqli_fetch_assoc($selectclassmerge_num));


                                                                                                    
                                                                                                echo '</div>
                                                                                                ' .$mergetitle .'(<small>'.$selectclassmerge_cnt_num.'</small>)
                                                                                                <i class="fa fa-trash text-danger  remove-linkmergegenehovrbtn" data-bs-toggle="tooltip"  data-tag="23" data-id="'.$mergetitleID.'" data-maintag="'.$tagstatecampusmain.'"   data-group="'.$groupschoolID_new.'" data-class="'.$facultynameID_subject_merge.'" data-campus="'.$campusID_new.'">
                                                                                                </i></label>
                                                                                            
                                                                                            </div>';


                                                                                            

                                                                                        }while($selecttitleasscntrow = mysqli_fetch_assoc($selecttitleass));

                                                                                }


                                                                                    $select_subjectformerge = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` INNER JOIN `subjectorcourse` ON  `courseorsubjectallocation`.`SubjectOrCourseID` =   `subjectorcourse`.`SubjectOrCourseID` WHERE   `courseorsubjectallocation`.`CampusID`='$campusID_new' AND `courseorsubjectallocation`.`ClassOrDepartmentID`='$facultynameID_subject_merge'");
                                                                                    $select_subjectformerge_cnt = mysqli_num_rows($select_subjectformerge);
                                                                                    $select_subjectformerge_cntrow = mysqli_fetch_assoc($select_subjectformerge);
                                    
                                                                                    

                                                                                            

                                                                                    if($select_subjectformerge_cnt > 0)
                                                                                    {
                                                                                    echo '<div class="reloadmergecontent'.$facultynameID_subject_merge.'">';
                                                                                        do{


                                                                                            $subjectname = $select_subjectformerge_cntrow['SubjectOrCourseTitle'];
                                                                                            $subjectID = $select_subjectformerge_cntrow['SubjectOrCourseID'];

                                                                                            // SELECT * FROM `subjectorcourse` WHERE SubjectOrCourseID='$subjectID_merged' AND CampusID='$campusID_new' AND ClassOrDepartmentID='$facultynameID_subject_merge'

                                                                                            $selectclassmerge = mysqli_query($link,"SELECT * FROM `courseorsubjectmerged` WHERE CampusID='$campusID_new' AND ClassOrDepartmentID='$facultynameID_subject_merge'  AND SubjectOrCourseID='$subjectID'");
                                                                                            $selectclassmerge_cnt = mysqli_num_rows($selectclassmerge);
                                                                                            $selectclassmerge_cntrow = mysqli_fetch_assoc($selectclassmerge);

                                                                                            if($selectclassmerge_cnt > 0)
                                                                                            {
                                                                                                


                                                                                            }else
                                                                                            { 
                                                                                                
                                                                                                
                                                                                                echo '<div class="form-check form-check-inline" style="font-size:13px;">';

                                                                                                    
                                                                                                echo '<input class="form-check-input pros-checkchildren-new pros-generalmergesubject generchecksubjectmerge'.$subjectID.''.$facultynameID_subject_merge.' pros-mergerbyclass'.$facultynameID_subject_merge.'" value="'.$subjectID.'" data-id="'.$facultynameID_subject_merge.'"  style="cursor:pointer;border: 1px solid; border-color: gray;font-weight:bold;" type="checkbox">
                                                                                                <label class="form-check-label pros-subjectmergelabel " data-id="'.$subjectID.''.$facultynameID_subject_merge.'"  style="cursor:pointer;" for="inlineRadio1">' .$subjectname.'</label>';

                                                                                                echo '</div>';
                                                                                                

                                                                                            }

                                                                                        

                                                                                        }while($select_subjectformerge_cntrow = mysqli_fetch_assoc($select_subjectformerge));
                                                                                        echo '<br><br>';  


                                                                                        echo '<div class="pros-flexi-label-wrappernew" ><label for="schoolName"> Merge title<span style="color:red;">*</span></label></div>
                                                                                        <small  style="font-size:12px;margin-left:0.4rem;">kindly input your merge title</small>
                                                                                        <div class="pros-flexi-input-affix-wrapper-campus">                
                                                                                                <input type="text" class="pros-flexi-input genesubjectnameinputmerge pros-generalinputmerge'.$facultynameID_subject_merge.'" data-id="'.$facultynameID_subject_merge .'"  placeholder="eg:PSV" style="width:94%;">
                                                                                        </div>';

                                                                                        echo '<br><button type="button" class="btn btn-info  btn-sm text-light generalbnmergesub-btn pros-individualmergerbtn'.$facultynameID_subject_merge.'" data-id="'.$facultynameID_subject_merge .'" data-maintag="'.$tagstatecampusmain.'" data-tag="23" data-group="'.$groupschoolID_new.'" data-school="'.$campusID_new .'"   style="float:right;">Merge <i class="fa fa-compress"></i>
                                                                                        </button>';
                                                                                    echo '</div>';
                                                                                    }else
                                                                                    {
                                                                                    

                                                                                        echo '<center>
                                                                                                    <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                                                                                    <p>Subject not found</p>
                                                                                            </center>
                                                                                            
                                                                                            ';
                                                                                    }

                                                                    


                                                                                echo '</div>
                                                                        </div>
                                                                </div>';
                                    
                                                            echo '</div>';


                                                        } while ($rowGetSchool_subject_merge  = mysqli_fetch_assoc($resultGetSchool_subject_merge));


                                                    }else
                                                    {
                                                        echo '<center>
                                                            <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                                            <p>No class found</p>
                                                        </center>
                                                        
                                                        ';    
                                                    }
                                            echo '</div>';


                                            echo '<br> <button type="button" id="createmergesubject-setup-btn" data-tag="24" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"    style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Next</button><br>
                                    </div>';


                                echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">

                                    <div class="pros-wizard-container">

                                    
                                        <div class="pros-wizard-steps">

                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">1</div>
                                                <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                                            </div>
                                            </div>
                                        
                                            <div class="pros-wizard-step">
                                        
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">2</div>
                                                <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                                            </div>
                                            </div>

                                            
                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number active">3</div>
                                                <div class="pros-step-description active" style="font-size:12px;">Merge subject</div>
                                            </div>
                                            </div>


                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number">4</div>
                                                <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                                            </div>
                                            </div>

                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">4</div>
                                                <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                                            </div>
                                        </div>

                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number">6</div>
                                            <div class="pros-step-description" style="font-size:12px;">Term</div>
                                        </div>
                                        </div>
                                            
                                        </div>
                                    </div> 
                                </div>';

                                echo '</div>';
                            // merging of subject title


                                // assign form teacher container
                                echo '<div class="row" id="pros-assign-formteachercontent" style="display:none;">';

                                echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">

                                        <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Form teacher </h1></div><br><br>

                                        <div class="pros-dotted-box">
                                            <span class="schooliconinform" >
                                                <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/subject-image.png" >
                                            </span>
                                        </div>

                                    </div>


                                <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                        <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Assign form teacher here</span>

                                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                            Kindly select a form teacher you want to assign to each classs.
                                        </span>
                                        <br>';
                                    

                                        $sqlGetSchool_subject_form = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new' ORDER BY ClassOrDepartmentName ASC");
                                        $resultGetSchool_subject_form  = mysqli_query($link, $sqlGetSchool_subject_form);
                                        $rowGetSchool_subject_form  = mysqli_fetch_assoc($resultGetSchool_subject_form);
                                        $row_cntGetSchool_subject_form  = mysqli_num_rows($resultGetSchool_subject_form);

                                        echo '<div class="row">';


                                        if($row_cntGetSchool_subject_form )
                                        {

                                    
                                                $numsubjectform = 1;

                                                do {



                                                    $classidformname = $rowGetSchool_subject_form  ['ClassOrDepartmentName'];
                                                    $classformID  = $rowGetSchool_subject_form ['ClassOrDepartmentID'];

                                                    echo '<div class="col-sm-6">
                                                    <div class="pros-container">
                                                        <div class="pros-select-btn pros-assignformteacherbtncollapse'.$classformID.' pros-generalformteach" data-id="'.$classformID.'">
                                                            <span class="btn-text">'.$classidformname.'<span class="pros-headdisplaynumslected'.$classformID.'" style="font-size:11px;"></span></span>
                                                            <span class="arrow-dwn">
                                                                <i class="fa fa-chevron-down"></i>
                                                            </span>
                                                        </div>
                                                
                                                        <ul class="list-items">';
                                                
                                                                        $checkstaffverification_form = mysqli_query($link, "SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND `Role`='teacher'");
                                                                        $checkstaffverificationcnt_form = mysqli_num_rows($checkstaffverification_form);
                                                                        $checkstaffverificationcnt_row_form = mysqli_fetch_assoc($checkstaffverification_form);
                                                
                                                
                                                                        do {

                                                                                $formfirstname = $checkstaffverificationcnt_row_form['StaffFirstName'];
                                                                                $formlastname = $checkstaffverificationcnt_row_form['StaffLastName'];
                                                                                $formStaffID = $checkstaffverificationcnt_row_form['StaffID'];


                                                                            $fullnameform = substr($formfirstname.' '.$formlastname.'...', 0, 9);

                                                                                
                                                                                        
            
                                                                                echo '<li class="item prosgenerallist-itemssel" data-id="'.$classformID.''.$formStaffID.'" data-faculty="'.$classformID.'">

                                                                                            <img  class="" src="' . $defaultUrl . '/assets/images/users/defaultprofile.png" style="width:40px;height:40px;">&nbsp;
                                                                                            <span class="item-text abba_tooltip">'.$fullnameform  . ' <span class="abba_tooltiptext">'.$formfirstname.' '.$formlastname.'</span></span>
                                                                                            <input type="radio" name="formradio'.$classformID.'" class="pros-checkbox-input-new pros-generalcheckschoolhead pro-generalclassassign-formteacher checkshoolheadnew'.$classformID.' proscheckboxinside'.$classformID .''. $formStaffID. '" data-staff="'.$formStaffID.'" data-faculty="'.$classformID.'" id="formteacherschoolassign" style="float: right; margin-right:10px;"   name="schoolhead-assign" value="' .$formStaffID.'">
                                                                                </li>';

                                                
                                                                        } while ($checkstaffverificationcnt_row_form = mysqli_fetch_assoc($checkstaffverification_form));
                                                
                                                        echo '</ul>
                                                </div>
                                                </div>
                                                ';



                                                        $facultyname_subject_form  = $rowGetSchool_subject_form ['ClassOrDepartmentName'];
                                                        $facultynameID_subject_form  = $rowGetSchool_subject_form ['ClassOrDepartmentID'];

                                                        
                                                } while ($rowGetSchool_subject_form  = mysqli_fetch_assoc($resultGetSchool_subject_form));
                                            }else
                                            {
                                                echo '<center>
                                                <img  class="" src="../../assets/images/users/subjectnot-found.png" style="width:200px;">
                                                <p>Class not found</p>
                                                </center>
                                                
                                                ';
                                            }
                                        echo '</div>';

                                        echo '<br> <button type="button" id="assignformteacher-setup-btn" data-tag="25" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Assign now</button><br>
                                </div>';


                                echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                                <div class="pros-wizard-container">
                                
                                    <div class="pros-wizard-steps">

                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number ">1</div>
                                            <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                                        </div>
                                        </div>
                                    
                                        <div class="pros-wizard-step">
                                    
                                        <div class="pros-step-content">
                                            <div class="pros-step-number ">2</div>
                                            <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                                        </div>
                                        </div>

                                        
                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number">3</div>
                                            <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                                        </div>
                                        </div>


                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number active">4</div>
                                            <div class="pros-step-description active" style="font-size:12px;">Form teacher</div>
                                        </div>
                                        </div>

                                        <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">4</div>
                                                <div class="pros-step-description" style="font-size:12px;">Subject teacher</div>
                                            </div>
                                        </div>

                                        <div class="pros-wizard-step">
                                        <div class="pros-step-content">
                                            <div class="pros-step-number">6</div>
                                            <div class="pros-step-description" style="font-size:12px;">Term</div>
                                        </div>
                                        </div>



                                        
                                    </div>
                                </div> 
                                </div>';

                                echo '</div>';
                                // assign form teacher container


                                


                        // assign  subject teacher container
                        echo '<div  class="row" id="assignsubject-teachercontainer" style="display:none;">';

                            echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                        <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1>Subject teacher </h1></div><br><br>

                                        <div class="pros-dotted-box">
                                            <span class="schooliconinform" >
                                                <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/subject-image.png" >
                                            </span>
                                        </div>

                                </div>


                                <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                        <span class="pros-schoolheading ms-1" style="line-height: 35px;" >Assign subject teacher here</span>
                                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                        Kindly select a subject teacher you want to assign to each subject.
                                        </span>
                                        <br>';


                                    $sqlGetSchool_subject_subject = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new' ORDER BY ClassOrDepartmentName ASC");
                                    $resultGetSchool_subject_subject  = mysqli_query($link, $sqlGetSchool_subject_subject);
                                    $rowGetSchool_subject_subject  = mysqli_fetch_assoc($resultGetSchool_subject_subject);
                                    $row_cntGetSchool_subject_subject  = mysqli_num_rows($resultGetSchool_subject_subject);

                                echo '<div class="row">';

                                if($row_cntGetSchool_subject_subject > 0)
                                {

                            

                                            $numsubjectsubject = 1;

                                            do {

                                                $classidsubjectname = $rowGetSchool_subject_subject['ClassOrDepartmentName'];
                                                $classsubjectID  = $rowGetSchool_subject_subject['ClassOrDepartmentID'];
                                                $classsubjectIDtemplate  = $rowGetSchool_subject_subject['ClassTemplateID'];

                                                echo '<div class="col-sm-12">
                                                <div class="pros-container-class" id="pros-loadsubjectassign-content'.$classsubjectID.'" style="width:100%;margin-bottom:20px;">
                                                    <div class="pros-select-btn pros-subjectteacher-open'.$classsubjectID.' pros-generalsubjectteacher" data-id="'.$classsubjectID.'">
                                                        <span class="btn-text">'.$classidsubjectname.'<span class="pros-headdisplaynumslected'.$classsubjectID.'" style="font-size:11px;"></span></span>
                                                        <span class="arrow-dwn">
                                                            <i class="fa fa-chevron-down"></i>
                                                        </span>
                                                    </div>
                                            
                                                    <div class="list-items" style="padding:15px 40px 40px 40px;list-style-type:none;">';
                                                        echo '<div class=" prosgenerallist-subjectteach" data-id="'.$classsubjectID.'" data-faculty="'.$classsubjectID.'">';
                                                                

                                                                $selectsql_result_teacher = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` INNER JOIN `subjectorcourse` ON 
                                                                `courseorsubjectallocation`.`SubjectOrCourseID` =   `subjectorcourse`.`SubjectOrCourseID`
                                                                WHERE `courseorsubjectallocation`.CampusID='$campusID_new' AND `subjectorcourse`.ClassTemplateID='$classsubjectIDtemplate' AND `courseorsubjectallocation`.`ClassOrDepartmentID`='$classsubjectID'");
                                                                $selectsql_result_teacher_cnt = mysqli_num_rows($selectsql_result_teacher);
                                                                $selectsql_result_teacher_cntrow = mysqli_fetch_assoc($selectsql_result_teacher);
                                                                
                                                                


                                                                if($selectsql_result_teacher_cnt > 0)
                                                                {
                                                                        $allar = 'all';

                                                            echo '<div class="row">';

                                                                        echo '<span class="pros-schoolheading ms-1" style="line-height: 35px;"> How to assign a subject teacher?</span>
                                                                        <span class="pros-sectionpart ms-1 mb-3"  style="color: #363949;font-size:12px;display:block;">
                                                                            Please choose a teacher for each subject or allocate a specific teacher to each subject below.
                                                                        </span>';

                                                                    echo '<div class="col-sm-6">
                                                                            <div class="event__name" style="font-size:1rem; font-weight: 500;">Assign all </div>
                                                                        </div>';
                                                                    
                                                                echo '<div class="col-sm-6">
                                                                            <div class="pros-select-menu mb-5"  ">
                                                                                <div class="pros-select-btn-new prosgenralopenteacher-dropdown pros-removeteacherdropdown'.$classsubjectID.''.$allar.'" data-id="'.$classsubjectID.''.$allar.'" style="background-color: #f1f1f1;box-shadow:0 0 3px rgba(0, 0, 0, 0.1);">
                                                                                    <span class="pros-sBtn-text pros-displayselectedval-teacher'.$classsubjectID.''.$allar.'">All  teacher</span>
                                                                                    <i class="bx bx-chevron-down"></i>
                                                                                </div>
                                                                                    <ul class="pros-options pros-opensubject-teacher'.$classsubjectID.''.$allar.'" style="background-color: #f1f1f1;color: #0047ab;">
                                                                                                <div class="pros-search">
                                                                                                    <i class="fa fa-search"></i>
                                                                                                    <input class="pros-search-input pros-selectall-searchinput" data-id="'.$classsubjectID.''.$allar.'" spellcheck="false" type="text" placeholder="Search">
                                                                                                </div>';

                                                                                                        $selecclassteacher_all = mysqli_query($link,"SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND Role IN ('teacher','schoolhead')");
                                                                                                        $selecclassteachercnt_all = mysqli_num_rows($selecclassteacher_all);
                                                                                                        $selecclassteachercntrow_all = mysqli_fetch_assoc($selecclassteacher_all);
                                                                                                            
                                                                                                        do {
                                                                                                            
                                                                                                        
                                                                                                            $seletsubject_teacherfname_pros_all =  $selecclassteachercntrow_all['StaffFirstName'];
                                                                                                            $seletsubject_teacherlastname_pros_all =  $selecclassteachercntrow_all['StaffLastName'];
                                                                                                            $seletsubject_teacherID_pros_all =  $selecclassteachercntrow_all['StaffID'];
                                                                                                                
                                                                                                                $fullnamesubjectteacassign = substr($seletsubject_teacherfname_pros_all.' '.$seletsubject_teacherlastname_pros_all.'...', 0, 10);

                                                                                                        
                                                                                                            echo '<li  style="background-color: #f1f1f1;color: #0047ab;" class="pros-option pros-clickselectallteacher  pros-optiongoteenserch'.$classsubjectID.''.$allar.'" data-id="'.$classsubjectID.''.$allar.'" data-class="'.$classsubjectID.'" data-group="'.$groupschoolID_new.'" data-tag="26" data-cam="'.$campusID_new.'" data-staff="'.$seletsubject_teacherID_pros_all.'">

                                                                                                                    <img class="" src="'.$defaultUrl.'/assets/images/users/defaultprofile.png" style="width:40px;height:40px;">
                                                                                                                    <span  style="background-color: #f1f1f1;"class="pros-option-text pros-optiongoteenserch-text'.$classsubjectID.''.$allar.'">'.$fullnamesubjectteacassign.'</span>
                                                                                                            </li>';
                                                                                                        
                                                                                                        } while ($selecclassteachercntrow_all = mysqli_fetch_assoc($selecclassteacher_all));

                                                                                                        
                                                                                                echo '<p class="noresultfound'.$classsubjectID.''.$allar.'" style="display:none">No teacher found!</p>
                                                                                    </ul>
                                                                        </div>';
                                                                    
                                                                    echo '</div>';
                                                                    
                                                                    echo '</div>';
                                                                    

                                                                    
                                                                        $num = 1;

                                                                            do{
                                                                                $subjectcoure_assign =   $selectsql_result_teacher_cntrow['SubjectOrCourseTitle'];
                                                                                $SubjectOrCourseID_assign =   $selectsql_result_teacher_cntrow['SubjectOrCourseID'];

                                                                                $selecclassteacher = mysqli_query($link,"SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND Role IN ('teacher','schoolhead')");

                                                                                $selecclassteachercnt = mysqli_num_rows($selecclassteacher);
                                                                                $selecclassteachercntrow = mysqli_fetch_assoc($selecclassteacher);
                                                                                

                                                                echo '<div class="row">';
                                                                            echo '<div class="col-sm-6">
                                                                                    <div class="event__name" style="font-size:1rem; font-weight: 500; margin-bottom: 1rem;">'.$num++.'. '.$subjectcoure_assign.'</div>
                                                                            </div>';

                                                                            echo '<div class="col-sm-6">
                                                                                    <div class="pros-select-menu">
                                                                                        <div class="pros-select-btn-new prosgenralopenteacher-dropdown pros-removeteacherdropdown'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-id="'.$classsubjectID.''.$SubjectOrCourseID_assign.'">';

                                                                                        $select_class_teacher_set =  mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` WHERE CampusID='$campusID_new' AND ClassOrDepartmentID='$classsubjectID' AND SubjectOrCourseID='$SubjectOrCourseID_assign'");
                                                                                        $select_class_teachercnt_set = mysqli_num_rows($select_class_teacher_set);
                                                                                        $select_class_teachercnt_setrow = mysqli_fetch_assoc($select_class_teacher_set);

                                                                                        if($select_class_teachercnt_set > 0)
                                                                                        {
                                                                                                

                                                                                                    $staffIDgotten = $select_class_teachercnt_setrow['CourseOrSubjectTeacherUserID'];
                                                                                                    
                                                                                                    if($staffIDgotten == '0')
                                                                                                    {
                                                                                                    echo '<span class="pros-sBtn-text pros-selectallteacherset pros-displayallstaffselected'.$classsubjectID.'  pros-displayselectedval-teacher'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-subject="'.$SubjectOrCourseID_assign.'">Select  teacher</span>';   
                                                                                                    }else
                                                                                                    {
                                                                                                        


                                                                                                    $select_staff_exist = mysqli_query($link,"SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND StaffID='$staffIDgotten'"); 
                                                                                                    $select_staff_exist_cnt = mysqli_num_rows($select_staff_exist);
                                                                                                    $select_staff_exist_cntrow = mysqli_fetch_assoc($select_staff_exist);


                                                                                                        $fnamestaffgotten = $select_staff_exist_cntrow['StaffFirstName'];
                                                                                                        $lnamestaffgotten = $select_staff_exist_cntrow['StaffLastName'];



                                                                                                    echo '<span class="pros-sBtn-text pros-selectallteacherset pros-displayallstaffselected'.$classsubjectID.'  pros-displayselectedval-teacher'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-subject="'.$SubjectOrCourseID_assign.'">'.$fnamestaffgotten.' '.$lnamestaffgotten.'</span>';
                                                                                                    }
                                                                                        }else
                                                                                        {
                                                                                            echo '<span class="pros-sBtn-text pros-selectallteacherset pros-displayallstaffselected'.$classsubjectID.'  pros-displayselectedval-teacher'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-subject="'.$SubjectOrCourseID_assign.'">Select  teacher</span>';
                                                                                        }

                                                                                        
                                                                                        echo '<i class="bx bx-chevron-down"></i>
                                                                                        </div>
                                                                                

                                                                                        <ul class="pros-options pros-opensubject-teacher'.$classsubjectID.''.$SubjectOrCourseID_assign.'">
                                                                                                                    
                                                                                            <div class="pros-search">
                                                                                                <i class="fa fa-search"></i>
                                                                                                <input class="pros-search-input" data-id="'.$classsubjectID.''.$SubjectOrCourseID_assign.'" spellcheck="false" type="text" placeholder="Search">
                                                                                            </div>';

                                                                                                

                                                                                            do{
                                                                                                

                                                                                                    $seletsubject_teacherfname_pros =  $selecclassteachercntrow['StaffFirstName'];
                                                                                                    $seletsubject_teacherlastname_pros =  $selecclassteachercntrow['StaffLastName'];
                                                                                                    $seletsubject_teacherID_pros =  $selecclassteachercntrow['StaffID'];


                                                                                                    echo '<li class="pros-option prosoptionsingle pros-optiongoteenserch'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-id="'.$classsubjectID.''.$SubjectOrCourseID_assign.'" data-class="'.$classsubjectID.'"  data-group="'.$groupschoolID_new.'" data-tag="26" data-cam="'.$campusID_new.'" data-staff="'.$seletsubject_teacherID_pros.'"  data-subject="'.$SubjectOrCourseID_assign.'">
                                                                                                        <img  class="" src="' . $defaultUrl . '/assets/images/users/defaultprofile.png" style="width:40px;height:40px;">
                                                                                                        
                                                                                                        <span class="pros-option-text pros-optiongoteenserch-text'.$classsubjectID.''.$SubjectOrCourseID_assign.'">'.$seletsubject_teacherfname_pros.'  '.$seletsubject_teacherlastname_pros.'</span>
                                                                                                    </li>';
                                                                                                

                                                                                            }while($selecclassteachercntrow = mysqli_fetch_assoc($selecclassteacher));
                                                                                        
                                                                                        
                                                                                            

                                                                                            
                                                                                                echo '<p class=" noresultfound'.$classsubjectID.''.$SubjectOrCourseID_assign.'" style="display:none">No teacher found!</p>
                                                                                            
                                                                                        </ul>
                                                                                </div>';



                                                                                            
                                                                            echo '</div>';
                                                                                            

                                                                        echo '</div> ';       

                                                                            }while($selectsql_result_teacher_cntrow = mysqli_fetch_assoc($selectsql_result_teacher));

                                                                }else
                                                                {
                                                                    echo '<center>
                                                                        <img  class="" style="opacity: 0.5;" src="../../assets/images/users/norecordfound-subject.png" style="width:180px;">
                                                                        <div style="font-weight:bold;font-size:15px;">Subject not found</div>
                                                                    </center>
                                                                    ';

                                                                }


                                                                    // load subject and teacher inside here
                                                        echo '</div>';
                                                    echo '</div>
                                            </div>
                                            </div>
                                            ';
                                            } while ($rowGetSchool_subject_subject  = mysqli_fetch_assoc($resultGetSchool_subject_subject));

                                        }else
                                        {
                                            echo '<center>
                                            <img  class="" style="opacity: 0.5;" src="../../assets/images/users/norecordfound-subject.png" style="width:180px;">
                                            <div style="font-weight:bold;font-size:15px;">No class found</div>
                                        </center>
                                        ';  
                                        }
                                            
                                    echo '</div>';


                                

                                        

                                    echo '<br> <button type="button" id="pros-assignsubject-proceedbtn" data-tag="26" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"    style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Proceed</button><br>
                                </div>';


                                echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                                    <div class="pros-wizard-container">
                                    
                                        <div class="pros-wizard-steps">

                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">1</div>
                                                <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                                            </div>
                                            </div>
                                        
                                            <div class="pros-wizard-step">
                                        
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">2</div>
                                                <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                                            </div>
                                            </div>

                                            
                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number">3</div>
                                                <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                                            </div>
                                            </div>


                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">4</div>
                                                <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                                            </div>
                                            </div>


                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number active">4</div>
                                                <div class="pros-step-description active" style="font-size:12px;">Subject teacher</div>
                                            </div>
                                            </div>

                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number">6</div>
                                                <div class="pros-step-description" style="font-size:12px;">Term</div>
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                </div>';

                                            
                        echo '</div>';             
                        // assign  subject container



                        // set session and term
                        echo '<div class="row" id="pros-loadsession-termcontent" style="display:none;">';
                                            
                                        echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                        <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1> Term or semester</h1></div><br><br>

                                        <div class="pros-dotted-box">
                                            <span class="schooliconinform" >
                                                <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/session-setupimage.png" >
                                            </span>
                                        </div>

                                </div>


                                <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                        <span class="pros-schoolheading ms-1" style="line-height: 35px;">Term or semester here</span>
                                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                                Kindly  input your default term or semester below.
                                        </span>
                                        <br>';


                                        $selecttermsemester = mysqli_query($link,"SELECT * FROM `termorsemester`");
                                        $selecttermsemester_cnt = mysqli_num_rows($selecttermsemester);
                                        $selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester);


                                        if($selecttermsemester_cnt > 0)
                                        {

                                            echo ' <div class="row">';
                                                    do{

                                                            $ternamesetup = $selecttermsemester_row['TermOrSemesterName'];
                                                            $ternamesetupID = $selecttermsemester_row['TermOrSemesterID'];
                                                    

                                                        echo '<div class="col-sm-6">
                                                                <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName">Term</label></div>
                                                            <div class="pros-flexi-input-affix-wrapper-campus" style="opacity: 0.5;pointer-events: none;background-color:#d3d3d3;">
                                                                <input type="text" disabled  class="pros-flexi-input " value="'.$ternamesetup.' Term" id="term" placeholder="term" style="width:80%;font-size:14px;font-weight:400;">
                                                            </div>&nbsp;&nbsp;
                                                        </div>';


                                                            $verifyterm = mysqli_query($link,"SELECT * FROM `termalias` WHERE TermOrSemesterID='$ternamesetupID' AND CampusID='$campusID_new'");
                                                            $verifytermcnt = mysqli_num_rows($verifyterm);
                                                            $verifytermcntrow = mysqli_fetch_assoc($verifyterm);
                                                            
                                                            if($verifytermcnt > 0)
                                                            {

                                                                $termaliasname =  $verifytermcntrow['TermAliasName'];


                                                                echo '<div class="col-sm-6">
                                                                            <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> TERM ALIAS<span style=""></span></label></div>
                                                                        <div class="pros-flexi-input-affix-wrapper-campus">
                                                                            <input type="text"   class="pros-flexi-input pros-getterm-aliasvalue" data-id="'.$ternamesetupID.'" value="'.$termaliasname.'"  placeholder="eg;Summer" style="width:80%;font-size:14px;font-weight:400;">
                                                                        </div>&nbsp;&nbsp;
                                                                </div>';

                                                            }else
                                                            {

                                                                    echo '<div class="col-sm-6">
                                                                            <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> TERM ALIAS<span style=""></span></label></div>
                                                                        <div class="pros-flexi-input-affix-wrapper-campus">
                                                                            <input type="text"   class="pros-flexi-input pros-getterm-aliasvalue" data-id="'.$ternamesetupID.'"   placeholder="eg;Summer" style="width:80%;font-size:14px;font-weight:400;">
                                                                        </div>&nbsp;&nbsp;
                                                                    </div>';

                                                            }







                                                            
                                                    
                                    
                                                    }while($selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester));

                                                echo '</div>';  
                                        }else
                                        {

                                        }

                                    echo '<br> <button type="button" id="pros-createsession-termbtn" data-tag="27" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Proceed</button><br>
                                </div>';


                                echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                                    <div class="pros-wizard-container">
                                        
                                        <div class="pros-wizard-steps">

                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">1</div>
                                                <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                                            </div>
                                            </div>
                                        
                                            <div class="pros-wizard-step">
                                        
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">2</div>
                                                <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                                            </div>
                                            </div>

                                            
                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number">3</div>
                                                <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                                            </div>
                                            </div>


                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">4</div>
                                                <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                                            </div>
                                            </div>


                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">5</div>
                                                <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                                            </div>
                                            </div>



                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number active">6</div>
                                                <div class="pros-step-description active" style="font-size:12px;">Term</div>
                                            </div>
                                            </div>



                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">7</div>
                                                <div class="pros-step-description " style="font-size:12px;">School Logo</div>
                                            </div>
                                            </div>
            
                                            <div class="pros-wizard-step">
                                            <div class="pros-step-content">
                                                <div class="pros-step-number ">8</div>
                                                <div class="pros-step-description " style="font-size:12px;">Login Background</div>
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                </div>';

                        echo '</div>';                   
                        // set session and term











                // load school logo
                    echo '<div class="row" id="pros-schlogo-content" style="display:none;">';
                                                    
                        echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                                <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1> School Logo</h1></div><br><br>

                                <div class="pros-dotted-box">
                                    <span class="schooliconinform" >
                                        <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/session-setupimage.png" >
                                    </span>
                                </div>

                        </div>


                        <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                <span class="pros-schoolheading ms-1" style="line-height: 35px;">School Logo Here</span>
                                <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                        Kindly  upload your school logo here
                                </span>
                                <br> ';


                                                $prosschool_logo  = mysqli_query($link,"SELECT * FROM `institution` WHERE InstitutionID='$groupschoolID_new'");
                                                $prosschool_logo_cnt = mysqli_num_rows($prosschool_logo);
                                                $prosschool_logo_cntrow = mysqli_fetch_assoc($prosschool_logo);

                                                if($prosschool_logo_cnt > 0)
                                                {


                                                    $Logo =  $prosschool_logo_cntrow['InstitutionLogo'];


                                                    echo '<div class="prosdisplayimagelogo" align="center">
                                                
                                                                <img class="prosloaschoolimageheregeralbtn"  id="prosloaschoolimagehere" src="'.$Logo.'" width="200" alt="school logo">
                                                    </div>';

                                                }else
                                                {


                                                    echo '<center id="prosloadnologofoundhere">
                                                    <img  class="proshideimagelogoherelogo" style="opacity: 0.5;" src="../../assets/images/users/norecordfound-subject.png" style="width:180px;display:none;">
                                                    <div style="font-weight:bold;font-size:15px;">No logo found</div>
                                                    </center>';

                                                    echo '<img  class="prosloaschoolimageheregeralbtn"  width="200" alt="school logo">';

                                                }

                                            


                                                
                                        echo '<div class="form-row no-padding" align="center">
                                                <input type="file" id="prosschoollogo_input" data-school="'.$groupschoolID_new.'"  name="insert_image" class="form-element">
                                        </div>';
                                
                                


                                
                            echo '<button type="button" id="pros-create-logo" data-tag="28" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Proceed</button><br>
                            <br> </div>';


                        echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                            <div class="pros-wizard-container">
                                
                                <div class="pros-wizard-steps">

                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number ">1</div>
                                        <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                                    </div>
                                    </div>
                                
                                    <div class="pros-wizard-step">
                                
                                    <div class="pros-step-content">
                                        <div class="pros-step-number ">2</div>
                                        <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                                    </div>
                                    </div>

                                    
                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number">3</div>
                                        <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                                    </div>
                                    </div>


                                    <div class="pros-wizard-step">
                                    <div class="pros-step-content">
                                        <div class="pros-step-number ">4</div>
                                        <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                            </div>
                            </div>


                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">5</div>
                                <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                            </div>
                            </div>



                            <div class="pros-wizard-step">
                            <div class="pros-step-content">
                                <div class="pros-step-number ">6</div>
                                <div class="pros-step-description " style="font-size:12px;">Term</div>
                            </div>
                            </div>


                            <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number active">7</div>
                                    <div class="pros-step-description active" style="font-size:12px;">School Logo</div>
                                </div>
                                </div>

                                <div class="pros-wizard-step">
                                <div class="pros-step-content">
                                    <div class="pros-step-number ">8</div>
                                    <div class="pros-step-description " style="font-size:12px;">Login Background</div>
                                </div>
                                </div>
                            
                        </div>
                    </div> 
                </div>';

            echo '</div>';                   
        // pros load school logo for set up here






        // pros load school bg images
        echo '<div class="row" id="prosschool-bgimage-content" style="display:none;">';
                                            
        echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;padding-right:70px;">
                <div class="pros-diskschooltitle " style="margin-right:10rem;"><h1> Login images</h1></div><br><br>

                <div class="pros-dotted-box">
                    <span class="schooliconinform" >
                        <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/session-setupimage.png" >
                    </span>
                </div>

        </div>


        <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                <span class="pros-schoolheading ms-1" style="line-height: 35px;">School Login Image</span>
                <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                        Kindly  upload your school login images
                </span>
                <br>';

                        
                        


                        $prosschool_loginimages  = mysqli_query($link,"SELECT * FROM `institution` WHERE InstitutionID='$groupschoolID_new'");
                        $prosschool_loginimages_cnt = mysqli_num_rows($prosschool_loginimages);
                        $prosschool_loginimages_cntrow = mysqli_fetch_assoc($prosschool_loginimages);
                        
                        $loginimageone = $prosschool_loginimages_cntrow['LoginBgImage'];
                        $prosloadimagenotfoundcontenttwo = $prosschool_loginimages_cntrow['LoginBgImage2'];
                        $prosloadimagenotfoundcontentthree = $prosschool_loginimages_cntrow['LoginBgImage3'];

                        


                        $prosschool_noimagefoundlogo  = mysqli_query($link,"SELECT * FROM `defaultimages` WHERE ImageName='abba-no-record-found-image2'");
                        $prosschool_prosschool_noimagefoundlogocnt = mysqli_num_rows($prosschool_noimagefoundlogo);
                        $prosschool_prosschool_noimagefoundlogocntrow = mysqli_fetch_assoc($prosschool_noimagefoundlogo);

                        $prosloadimagenotfoundcontent = $prosschool_prosschool_noimagefoundlogocntrow['BaseSixtyFour'];
                    
                        




                        
                                
                        echo '
                                <div ><h5>Image 1</h5></div>
                                <div class="form-row no-padding" >
                                        
                                        <input type="file"  class="prosgeneralloginimages" data-stage="1" data-school="'.$groupschoolID_new.'"   name="insert_image" class="form-element">
                                </div>

                        <br>';

                            if($loginimageone == '')
                            {


                                    echo '
                                        <div id="prosnocontenttownotfoundfirst">No Image found</div>
                                        <img  class="prosloadinagecontentherefirst" width="200" alt="school logo" style="display:none;">
                                            
                                    ';
                                    
                                    
                                
                            }else
                            {
                                            echo '<img  class="prosloaschoolimagehere prosloadinagecontentherefirst" src="'.$loginimageone.'" width="200" alt="school loginimages">';
                            }
                            



                            

                        
                    echo '<br><br><div ><h5>Image 2</h5></div>
                        <div class="form-row no-padding" >
                                
                                <input type="file" class="prosgeneralloginimages" data-stage="2" data-school="'.$groupschoolID_new.'"  name="insert_image" class="form-element">
                    </div><br>';

                        if($prosloadimagenotfoundcontenttwo == '')
                        {

                                    echo ' <div id="prosnocontenttownotfoundsecond">No Image found</div>

                                    <img  class="prosloadinagecontentheresecond" width="200" alt="school logo" style="display:none;">';
                            
                        }else
                        {
                            echo '<img  id="prosloaschoolimagehere prosloadinagecontentheresecond" src="'.$prosloadimagenotfoundcontenttwo.'" width="200" alt="school loginimages">';
                        
                        }


                        
                        echo '<br><br><div ><h5>Image 3</h5></div>
                        <div class="form-row no-padding" >
                                
                                <input type="file" class="prosgeneralloginimages" data-stage="3" data-school="'.$groupschoolID_new.'"  name="insert_image" class="form-element">
                        </div>';
                    


                        if($prosloadimagenotfoundcontentthree == '')
                        {

                                    echo ' <div id="prosnocontenttownotfoundthird">No Image found</div>

                                    <img  class="prosloadinagecontentherethird" width="200" alt="school logo" style="display:none;">';
                            
                        }else
                        {
                            echo '<img class="prosloadinagecontentherethird"  id="prosloaschoolimagehere" src="'.$prosloadimagenotfoundcontentthree.'" width="200" alt="school loginimages">';
                        
                        }
                
                


                
            echo ' <button type="button" id="pros-submitlogin-bgfinal" data-tag="29" data-maintag="'.$tagstatecampusmain.'"   data-campus="'.$campusID_new.'"   data-school="'.$groupschoolID_new.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Proceed</button><br>
            <br> </div>';


        echo '<div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
            <div class="pros-wizard-container">
                
                <div class="pros-wizard-steps">

                    <div class="pros-wizard-step">
                    <div class="pros-step-content">
                        <div class="pros-step-number ">1</div>
                        <div class="pros-step-description " style="font-size:13px;">Create Class</div>
                    </div>
                    </div>
                
                    <div class="pros-wizard-step">
                
                    <div class="pros-step-content">
                        <div class="pros-step-number ">2</div>
                        <div class="pros-step-description " style="font-size:12px;">Create Subject</div>
                    </div>
                    </div>

                    
                    <div class="pros-wizard-step">
                    <div class="pros-step-content">
                        <div class="pros-step-number">3</div>
                        <div class="pros-step-description " style="font-size:12px;">Merge subject</div>
                    </div>
                    </div>


                    <div class="pros-wizard-step">
                    <div class="pros-step-content">
                        <div class="pros-step-number ">4</div>
                        <div class="pros-step-description " style="font-size:12px;">Form teacher</div>
                    </div>
                    </div>


                    <div class="pros-wizard-step">
                    <div class="pros-step-content">
                        <div class="pros-step-number ">5</div>
                        <div class="pros-step-description " style="font-size:12px;">Subject teacher</div>
                    </div>
                    </div>



                    <div class="pros-wizard-step">
                    <div class="pros-step-content">
                        <div class="pros-step-number ">6</div>
                        <div class="pros-step-description " style="font-size:12px;">Term</div>
                    </div>
                    </div>


                        <div class="pros-wizard-step">
                        <div class="pros-step-content">
                            <div class="pros-step-number ">7</div>
                            <div class="pros-step-description " style="font-size:12px;">School Logo</div>
                        </div>
                        </div>

                        <div class="pros-wizard-step">
                        <div class="pros-step-content">
                            <div class="pros-step-number active">8</div>
                            <div class="pros-step-description active" style="font-size:12px;">Login Background</div>
                        </div>
                        </div>
                    
                </div>
            </div> 
        </div>';

            echo '</div>';                   
        // pros load school bg images

    }    
    
    
         
?>