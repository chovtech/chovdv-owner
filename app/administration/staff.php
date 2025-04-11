    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
        <ul class="nav nav-pills mb-3 renceTab" id="pills-tab" role="tablist">
            
            <li class="nav-item" role="presentation">
                <a href="Javascript:;" class="nav-link active abba_tab_checker_for_summary" data-id="staff" id="pills-staff-tab" data-bs-toggle="pill" data-bs-target="#pills-staff" type="button" role="tab" aria-controls="pills-staff" aria-selected="true"><i class="fa fa-user"></i> Staff</a>
            </li>


             <li class="nav-item border border-2" role="presentation">
                <button class="nav-link" data-id="staff-attendance" id="pills-staff-attendance-tab" data-bs-toggle="pill" data-bs-target="#pills-staff-attendance" type="button" role="tab" aria-controls="pills-staff-attendance" aria-selected="true"><i class="fa fa-list-alt"></i> Attendance</button>
            </li>
            <li class="nav-item border border-2" role="presentation">
                <button class="nav-link" data-id="staff-payroll" id="pills-staff-payroll-tab" data-bs-toggle="pill" data-bs-target="#pills-staff-payroll" type="button" role="tab" aria-controls="pills-staff-payroll" aria-selected="true"><i class="fa fa-list-alt"></i> Payroll</button>
            </li>
            
             <li class="nav-item border border-2" role="presentation">
            <button class="nav-link" data-id="leave-application" id="pills-leave-application-tab" data-bs-toggle="pill" data-bs-target="#pills-leave-application" type="button" role="tab" aria-controls="pills-leave-application" aria-selected="true"><i class="fas fa-sign-out-alt"></i> Leave Application</button>
           </li>
          
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-staff" role="tabpanel" aria-labelledby="pills-staff-tab">

                <div class="row g-2">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <button type="button" id="pros-create-staff" style="float: right;" data-bs-toggle="modal"
                            data-bs-target="#pros-invitestaff-usertype" class="btn btn-sm btn-primary">Create
                            Staff</button>
                    </div>
                </div><br>

                <div class="row g-2">
                    <div class="col-md-12 col-lg-2 ">
                        <form>
                            <div class="mb-3">
                                <input type="text" id="pros-searchstaff" class="form-control form-control-sm"
                                    placeholder="Search staff" aria-describedby="emailText">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_campus">
                            <option value="NULL">Select campus</option>
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm" id="pros_display_staff_type"
                            aria-label=".form-select-sm example">
                            <option value="NULL" selected>Select staff type</option>
                            <option value="0">Academic Staff</option>
                            <option value="1">Non Academic Staff</option>
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="pros_display_staff_status">
                            <option value="NULL">Select Status</option>
                            <option value="1">Active</option>
                            <option value="2">Blocked</option>
                        </select>
                    </div>


                    <div class="col-md-1 col-lg-1">
                        <select class="form-select form-select-sm"
                            style="border:none;border-bottom:2px solid #007ffb;font-size:13px;cursor:pointer;width:70%;background: transparent;text-align: center;padding-right: 10px;"
                            id="pros_increase_staff_per_page">

                            <option value="12" selected>12</option>
                            <option value="60">60</option>
                            <option value="120">120</option>
                            <option value="360">360</option>
                            <option value="720">720</option>
                            <option value="1080">1080</option>
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-2">
                        <button type="button"
                            style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;"
                            class="btn btn-sm fw-normal" id="pros_get_staff_on_click"><i
                                class="fas fa-circle-notch"></i> Load filter</button>
                    </div>





                </div>


                <div align="center" class="mt-2 no-results-image" style="display: none;"><img
                        src="../../assets/images/adminImg/err.png" style="width:15%;" />
                    <p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p>
                </div>
                <div id="pros-loadstaff" class="pros-loadstaffclass">

                </div>


                <div align="center" style="margin-top: 30px;" id="pros-staffpaginationcont">

                </div>
            </div>
            
            
            
            
             <div class="tab-pane fade" id="pills-staff-attendance" role="tabpanel" aria-labelledby="pills-staff-attendance-tab">
                
                <div class="row g-2">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <button type="button" style="float: right;font-size:13px;" data-bs-toggle="modal" data-bs-target="#abba_set_attendance_config_Modal" class="btn btn-sm btn-primary">
                            <i class="fas fa-cog"></i> Attendance Config.</button>
                    </div>
                </div><br>
                
                <div class="row g-2 mt-2">
                    
                    
                    
                    
                     <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_attendance_campus">
                            <option value="NULL">Select Campus</option>
                        </select>
                    </div>
                    
                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_attendance_session">
                            <option value="NULL">Select Session</option>
                            <?php

                                $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                $abba_result_session = mysqli_query($link, $abba_sql_session);
                                $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                $abba_row_cnt_session = mysqli_num_rows($abba_result_session);
    
                                if ($abba_row_cnt_session > 0) {
                                    do {
                                        if ($abba_row_session['sessionStatus'] == '1') {
                                            $abba_selected_session = 'selected';
                                        } else {
                                            $abba_selected_session = '';
                                        }
                                        echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';
    
                                    } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                } else {
                                    echo '<option value="0">No Records Found</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_attendance_term">
                            <option value="NULL">Select Term</option>
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm" id="abba_staff_type"
                            aria-label=".form-select-sm example">
                            <option value="NULL" selected>Select staff type</option>
                            <option value="0">Academic Staff</option>
                            <option value="1">Non Academic Staff</option>
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-2">
                        
                    </div>

                    <div class="col-md-12 col-lg-2" align="right">
                        <button type="button" style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;" class="btn btn-sm fw-normal" id="abba_get_attendance_record">Load filter</button>
                    </div>

                </div>
                
                
                <div style="background-color:#fff;padding: 35px 35px 35px 35px;margin-top:15px;">
                    <div class="table-responsive">
                        <div class="abba_display_attendance_records">
                            
                        </div>
                    </div>
                </div>
            </div>
            
            
            

                <!--==========PAYROLL CONTENT HERE========-->
             
             
                <div class="tab-pane fade" id="pills-staff-payroll" role="tabpanel" aria-labelledby="pills-staff-payroll-tab">
                
                <div class="row g-2">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <button type="button" style="float: right;font-size:13px;" data-bs-toggle="modal" data-bs-target="#staffpayrollmodalcontent" class="btn btn-sm btn-primary prospaysalrymodalbtn">
                        <i class="fas fa-credit-card"></i> Pay Salary</button>
                    </div>
                </div><br>


                                <!-- Navbar pills -->
                 <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs mb-3 customtab" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link active abba_main_tab"
                                    id="ex1-tab-salary" data-id="salary"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-salary"
                                    role="tab"
                                    aria-controls="ex1-tabs-salary"
                                    aria-selected="true" data-id="salary">Salary  history</a>
                                </li>
                                
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link abba_main_tab"
                                    id="ex1-tab-schedule" data-id="schedule"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-schedule"
                                    role="tab"
                                    aria-controls="ex1-tabs-schedule"
                                    aria-selected="false">Scheduled Salary history</a
                                    >
                                </li>
                                
                                
                                
                               
                                
                            </ul>
                        
                            
                            <div class="tab-content" id="ex1-content">

                                <div class="tab-pane fade show active" id="ex1-tabs-salary" role="tabpanel" aria-labelledby="ex1-tab-salary">

                                    <div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
                                           <div class="table-responsive prosloastaff_salary_forpayroll"></div>
                                      </div>

                                </div>


                                  <div class="tab-pane fade show" id="ex1-tabs-schedule" role="tabpanel" aria-labelledby="ex1-tab-schedule">
                                            <div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
                                                <div class="table-responsive prosloastaff_scheule_salaryhistory"></div>
                                            </div>
                                    </div>
                                

                            </div>
                            <!-- Tab panes -->
                        </div>
                    
                    </div>
                </div>
                <!--/ Navbar pills -->
                    
        
             
                
               
            </div>
            
            
            
            <!--==================PAYROLL CONTENT HERE====================-->
            
            
            
            
                        <!--==================LEAVE APPLICATION STARTS HERE====================-->

                        <div class="tab-pane fade" id="pills-leave-application" role="tabpanel" aria-labelledby="pills-leave-application-tab">
    
    <div class="row g-2">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="button" style="float: right;font-size:13px;" data-bs-toggle="modal" data-bs-target="#leave_application_settings" class="btn btn-sm btn-primary">
            <i class="fas fa-cog fa-spin"></i> Leave Settings</button>
        </div>
    </div><br>

    <div class="row">
            <div class="col-sm-12">
                <!-- Nav tabs -->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs mb-3 customtab" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a
                            class="nav-link active abba_main_tab"
                            id="ex1-tab-leave-history" data-id="leave-history"
                            data-bs-toggle="tab"
                            href="#ex1-tabs-leave-history"
                            role="tab"
                            aria-controls="ex1-tabs-leave-history"
                            aria-selected="true" data-id="leave-history">Leave history</a>
                        </li>
                        
                        <li class="nav-item" role="presentation">
                            <a
                            class="nav-link abba_main_tab"
                            id="ex2-tab-leave-settings" data-id="leave-settings"
                            data-bs-toggle="tab"
                            href="#ex1-tabs-leave-settings"
                            role="tab"
                            aria-controls="ex1-tabs-leave-settings"
                            aria-selected="false" data-id="leave-settings">Leave settings</a>
                        </li>
                    </ul>
                    

                    <input type="hidden" class="keep_campus">
                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-tabs-leave-history" role="tabpanel" aria-labelledby="ex1-tabs-leave-historyLabel">
                            <div class="row g-2 mt-3">
                                <div class="col-md-6 col-lg-3">
                                    <select style="color: #666666;" class="form-select form-select-sm"
                                        aria-label="form-select-sm example"
                                        id="emma_load_session_for_leave">
                                        <option value="NULL">Select Session</option>
                                    </select>
                                </div>
                            </div>

                            <div class="table-Side-Chi topSecCards mt-2" style="padding: 50px 50px 50px 50px;">

                                <div class="emma_display_table_for_owner"></div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="ex2-content">
                        <div class="tab-pane fade" id="ex1-tabs-leave-settings" role="tabpanel" aria-labelledby="ex1-tabs-leave-settingsLabel">
                            <div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
                                <!-- <div class="table-responsive"> -->
                                    <div class="load_settings_table"></div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <!-- Tab panes -->
                </div>
            </div>
        </div>

    <!-- <div class="card">
        <div class="card-body">
            
        </div>
    </div> -->

</div>



        </div>
    </div>




    <!-- INVITE STAFF MODAL-->
    <div class="modal fade" id="pros-invitestaff-usertype" style="background-color: rgba(0, 0, 0, 0.9); z-index: 1050;"
        tabindex="-1" aria-labelledby="pros-invitestaff-usertypeLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg pros-invitestaff-usertype-dialog"
            style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);">

            <div class="modal-content" style="border:none;width: 100%;border-radius: 5px;">
                <div class="modal-header" style="border:none;">
                    <!-- <h5 class="modal-title"  id="invitestaff-usertype">Modal title</h5>-->
                    <u style="color:blue;font-size:13px;text-decoration:underline;cursor:pointer;display:none"
                        id="invitestaff-backbtn"><i class="fa fa-arrow-left"></i> Back</u>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body" style="padding:6% 8%;">

                    <!-- ======usertype conatiner end here===== -->
                    <div class="row" id="selectuser-typecontainer" style="display:none;">

                        <div class="col-12" align="center">
                            <h5 class=" schoolheading " style="line-height: 35px;">choose your choise of user below
                            </h5><br><br>
                        </div>



                        <div class="col-sm-6 mb-3">

                            <div class="card generalclass-usertype" style="cursor:pointer;" data-id="3">

                                <div class="card-body"
                                    style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                    <div class="radio-group">
                                        <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                            id="admin" value="admin" name="usertype">
                                        <label class="ml-1" for="admin"
                                            style="font-weight:600;cursor:pointer;">Admin</label>
                                        <!-- <input type="radio" style="flex:left;" class="defaultlang english with-gap englishclick"  value="english" id="radio-btn" name="radio-btn"> -->
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="col-sm-6 mb-3">

                            <div class="card generalclass-usertype" style="cursor:pointer;" data-id="2">

                                <div class="card-body"
                                    style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                    <div class="radio-group">
                                        <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                            value="schoolhead" id="personalassist" name="usertype">
                                        <label class="ml-1" for="personalassist"
                                            style="font-weight:600;cursor:pointer;">School Head</label>
                                    </div>
                                    <!-- <small style="font-size:10px;">
                                                                A school admin is the person in charge of managing the administrative tasks of a school
                                                            </small> -->
                                </div>

                            </div>

                        </div>



                       
                        <div class="col-sm-6 mb-3">

                            <div class="card generalclass-usertype" style="cursor:pointer;" data-id="4">

                                <div class="card-body"
                                    style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                    <div class="radio-group">
                                        <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                            id="teacher" value="teacher" name="usertype">
                                        <label class="ml-1" for="teacher"
                                            style="font-weight:600;cursor:pointer;">Teacher</label>

                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="col-sm-6 mb-3">
                            <div class="card generalclass-usertype" style="cursor:pointer;" data-id="5">

                                <div class="card-body"
                                    style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                    <div class="radio-group">
                                        <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                            id="nonteaching" value="nonteaching" name="usertype">
                                        <label class="ml-1" for="teacher"
                                            style="font-weight:600;cursor:pointer;">Non-teaching</label>

                                    </div>
                                </div>

                            </div>
                        </div>

                        

                        <div class="col-sm-12 mb-3">
                            <div class="card generalclass-usertype" style="cursor:pointer;" data-id="1">
                                <div class="card-body" style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">
                                    

                                    <div class="radio-group">

                                        <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                            value="Senior executive/Board member" id="seniorexecutive" name="usertype">

                                        <label for="seniorexecutive" style="font-weight:600;cursor:pointer;">Senior
                                            executive/Board member</label>

                                    </div>

                                </div>

                            </div>

                        </div>




                        <div class="col-sm-12 mb-3">
                            <button type="button" id="getschoolusertypebtn"
                                style="background-color:#007bff;cursor:pointer;width:100%;"
                                class="btn btn-lg text-light">Proceed <i class="fa fa-long-arrow-right"></i></button>
                        </div>
                    </div>
                    <!-- ======usertype conatiner end here===== -->

                    <!-- ======getstaff-forinsert conatiner end here===== -->
                    <div id="getstaff-forinsert-container" style="display:none;">

                        <div class="row">

                            <div class="col-12" align="center">
                                <h5 class=" schoolheading " style="line-height: 35px;">choose to either create staff or
                                    invite</h5>
                                <br><br>

                            </div>

                            <div class="col-12">
                                <span id="pros-watchtutorial"
                                    style="color:blue;font-size:13px;text-decoration:underline;cursor:pointer;float:right;"><i
                                        class=" fa fa-play-circle" style="font-size:20px;"></i> Watch tutorial </span>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <div class="card stafflink-card " data-id="1" style="cursor:pointer;">

                                    <!-- Card content for box 1 -->
                                    <div class="card-body bringformlinkinvite"
                                        style="border:none;border:1px solid #007bff;border-radius:5px;height:120px;">

                                        <div class="radio-group">

                                            <input type="radio" style="cursor:pointer;"
                                                class="with-gap inviteuser-create  bringformlink" id="invitelink"
                                                value="Invite Staff" name="inviteuser-link">
                                            <label class="ml-1 mb-2" for="invitelink"
                                                style="font-weight:600;cursor:pointer;" id="pros-invitetitle">Invite Staff</label>

                                        </div>

                                        <p>By clicking on invite staff, this means you want to send an invite link to a
                                            staff for registration. </p>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 mb-3">

                                <div class="card stafflink-card " data-id="2" style="cursor:pointer;">

                                    <div class="card-body bringformlinkcreate"
                                        style="border:none;border:1px solid #007bff;border-radius:5px;;height:120px;">

                                        <div class="radio-group">

                                            <input type="radio" style="cursor:pointer;"
                                                class="with-gap inviteuser-create bringformlink" id="createstaff"
                                                value="Create staff" name="inviteuser-link">
                                            <label class="ml-1 mb-2" for="createstaff"
                                                style="font-weight:600;cursor:pointer;" id="pros-createtitle">Create staff</label>

                                        </div>

                                        <p>By clicking on craete staff, this means you want to create the staff by
                                            filling the form your self. </p>
                                    </div>

                                </div><br>
                                
                            </div>

                            <div class="col-sm-12 mb-3" id="displaystaffemail" style="display:none;">

                                <div class="pros-geneclass-label"
                                    style="margin-right:11rem;margin-left:2%;text-transform: uppercase;font-weight: 700;display: block;font-size: 0.9em;">
                                    <label for="schoolName">Staff email<span
                                            style="color:red;margin-right:2.5rem;">*</span></label>
                                </div>

                                <div class="pros-flexi-input-affix-wrapper-invitemail staffemail-invitelink">

                                    <input type="email" class="pros-flexi-input prosgeneralinvitemail" id="staffemail-invite"
                                        placeholder="Enter your staff's email" style="width:70%;">
                                </div>

                                <!-- appending email for staff invitation here -->
                                <div id="pros-display-appendstaff-email"></div>
                                <!-- appending email for staff invitation end here -->

                                <br>
                                <span class="circle-icon" id="pros-addstaff-email-invite"
                                    style="color:#007bff;font-size:12px;cursor:pointer;float:right;">
                                    Add Staff <i class="fa fa-plus"></i>
                                </span>
                                <input type="hidden" id="pros-appendinput-ivite-email">

                            </div>

                            <div class="col-sm-12 mb-3" id="staff-form" style="display:none;">

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="pros-flexi-label-wrapper " style="margin-right:11rem;"><label
                                                for="schoolName"> First name<span style="color:red;">*</span></label>
                                        </div>
                                        <div class="pros-flexi-input-affix-wrapper-invitemail stafffnamecont">
                                            <input type="text" class="pros-flexi-input" id="staff-fname"
                                                placeholder="Enter your staff's first name" style="width:80%;">
                                        </div>&nbsp;&nbsp;
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                for="schoolName"> Last Name<span style="color:red;">*</span></label>
                                        </div>
                                        <div class="pros-flexi-input-affix-wrapper-invitemail stafff-lastnamecont">
                                            <input type="text" class="pros-flexi-input" id="staff-lname"
                                                placeholder="Enter your staff's last name" style="width:80%;">
                                        </div>&nbsp;&nbsp;
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                        <div class="pros-flexi-input-affix-wrapper-invitemail stafff-emailcont">
                                            <input type="text" class="pros-flexi-input" id="staff-email"
                                                placeholder="Enter your staff's email" style="width:80%;">
                                        </div>&nbsp;&nbsp;
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                        <div class="pros-flexi-input-affix-wrapper-invitemail staffnumbercont">
                                            <input type="number" name="staffphone" class="pros-flexi-input "
                                                id="staffnumber" placeholder="e:g XXXX-XXX-XXXX"
                                                style="width:85%;margin-left:4%;">
                                        </div>&nbsp;&nbsp;
                                    </div>


                                    
                                    <div class="col-sm-6">
                                        <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                for="schoolName"> Date of birth<span style="color:red;">*</span></label></div>
                                        <div class="pros-flexi-input-affix-wrapper-invitemail stafff-dobcont">
                                            <input type="date" class="pros-flexi-input" id="pros-staff-dob"
                                                placeholder="Enter your staff's email" style="width:80%;">
                                        </div>&nbsp;&nbsp;
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                for="schoolName"> Gender<span style="color:red;">*</span></label></div>
                                    <div class="pros-flexi-input-affix-wrapper-invitemail stafff-gendercont">
                                       <select class="pros-flexi-input" id="prosstaffgender"  style="width:80%;">
                                      
                                            <option value="0">Select Gender</option>
                                            <option  value="Male">Male</option>
                                            <option  value="Female">Female</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-sm-12 mb-3">
                                <button type="button" id="getschoolinvitebtn"
                                    style="background-color:#007bff;cursor:pointer;width:100%;"
                                    class="btn btn-block btn-lg text-light">Submit <i
                                        class="fa fa-long-arrow-right"></i></button>
                            </div>

                        </div>
                    </div>
                    <!-- ======getstaff-forinsert conatiner end here===== -->



                    <!-- ======display menu conatiner for admin and pa===== -->
                    <div class="row" id="pros-displayadminmenuset" style="display:none;">

                    </div>
                    <!-- ======display menu conatiner for admin and pa===== -->
                </div>

                <input type="hidden" id="getusertypeinvite"><!-- store staff id here -->

                <input type="hidden" id="prosmenucontent">
                <!-- <input type="hidden" id="pros-dispaly-mainmenu">
                <input type="hidden" id="pros-dispaly-submenu">
                <input type="hidden" id="pros-dispaly-menustatus"> -->

                <div class="modal-footer" style="border:none;">
                </div>

            </div>
        </div>
    </div>
    <!--INVITE STAFF MODAL END-->




    <!--change staff role-->
    <div class="modal fade" id="pros-changestaffrole" style="background-color: rgba(0, 0, 0, 0.9); z-index: 1050;"
        tabindex="-1" aria-labelledby="pros-invitestaff-usertypeLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable "
            style="margin: 1.75rem auto;color: rgb(56, 58, 63);">

            <div class="modal-content"
                style="border:none;border-radius: 5px;background-color:rgb(245, 245, 247);">
                <div class="modal-header" style="border:none;">
                    <h5 class="modal-title" id="invitestaff-usertype">Change staff role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="padding:3% 5%;">
                    <div id="loadChangeRoleForm"></div>
                </div>

                <div class="modal-footer" style="border:none;">
                </div>

            </div>
        </div>
    </div>
    <!--change staff role-->





    <!--delete staff modal -->
    <div class="modal fade" id="pros-deltestaffmodal-modal" style="background-color: rgba(0, 0, 0, 0.9); z-index: 1050;"
        tabindex="-1" role="dialog" aria-labelledby="pros-deltestaffmodal-modalLabel" aria-hidden="true">
        <div class="modal-dialog " style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border:none;">
                    <h5 class="modal-title" style="font-weight:600;font-size:15px;" id="deleteschool-modalLabel">
                        Delete staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="displayschooldel-onboarding">
                    <input type="hidden" id="pros-storegetstaffIDdel">
                    <p style="font-weight:400;font-size:15px;">want to delete staff?
                    </p>

                    <span style="color:red;font-weight:600;">
                        Note: This action is irreversible. Are you sure you want to delete?
                    </span>



                </div>
                <div class="modal-footer" style="border:none;">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button type="button" class="btn btn-danger " id="staffconfirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!--delete staff modal -->



    <div class="row justify-content-center">
        <div class="container-fluid mt-3 mb-3">
            <div class="picture-container">
                <div class="image-error"></div>
                <!-- Image Modal -->
                <div id="pros-uploadstaffimage" class="modal" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="invitestaff-usertype">Upload Image</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                                        <input type="hidden" id="prosgetstaffID-formimage">
                                        <div id="image_demo"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <button class="btn btn-success btn-sm crop_image"> submit </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>


    

    <!--======= PAYROLL MODAL CONTENT========= -->


                         
                    <!--==== =Transfer Modal In Bulk===== -->
                  <div class="modal fade" id="staffpayrollmodalcontent" tabindex="-1" aria-labelledby="withdrawModalBulkLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-body overflow-auto">
                                <div align="center">
                                <h4 class="mt-3"><i class="fas fa-exchange-alt"></i> Pay Salary</h4>
                                </div>
                                <br><br>
                                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                <ul class="nav nav-pills mb-3 renceTab prosloadhidetablist" id="pills-tab" role="tablist" >
                                    <li class="nav-item border" role="presentation">
                                        <a href="Javascript:;" class="nav-link active abba_tab_checker_for_summary" data-id="student"
                                            data-sumdiv="student_summary_div" id="pills-classsetting-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-classsetting" type="button" role="tab" aria-controls="pills-classsetting"
                                            aria-selected="true"><i class="fas fa-money-bill"></i> Payment Now</a>
                                    </li>
                                    &nbsp;&nbsp;
                                    <li class="nav-item border" role="presentation">
                                        <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" data-id="schedule"
                                            data-sumdiv="parent_summary_div" id="pills-websitting-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-websitting" type="button" role="tab" aria-controls="pills-websitting"
                                            aria-selected="false"><i class="fas fa-credit-card"></i> Schedule Salary </a>
                                    </li>
                                    
                                    
                                    &nbsp;&nbsp;
                                    <li class="nav-item border" role="presentation">
                                        <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" data-id="salarysettings"
                                            data-sumdiv="salarysettings_summary_div" id="pills-salarysettings-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-salarysettings" type="button" role="tab" aria-controls="pills-salarysettings"
                                            aria-selected="false"><i class="fa fa-setting"></i> Set Salary </a>
                                    </li>
                                </ul>
                                <div class="tab-content prosloadtabhidecontent" id="pills-tabContent" >
                                    <div class="tab-pane fade show active" id="pills-classsetting" role="tabpanel" aria-labelledby="pills-classsetting-tab">
                                        <div class="row">
                                            <div class="col-md-7 col-12">
                                            <div class="row">
                                                <input type="hidden" class="prosloadsalaybulkamount_inititated">
                                                <div class="col-12 mb-4">
                                                    <div class="row">
                                                        <div class="col-md-12 ps-0">
                                                        <p class="ps-3 textmuted fw-bold h6 mb-0">TOTAL SALARY AMOUNT</p>
                                                        <span class="h4 fw-bold d-flex ps-3">₦ <span class="textmuted prosloadamountcontent" >0.00</span></span> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group abba_local-forms ">
                                            <label>Month<span style="color:orangered;">*</span> </label>
                                            <input type="month" class="form-control  prosstartamountmonth_instantpayment" >
                                        </div>
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Click to pick staff for payment
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p class="ps-3 textmuted mb-0">Choose the right payment type for efficient staff salary processing. </p>
                                                    <div  class="my-4" style="margin-left:15px;"> 
                                                        <input  class="prosgeneralpaymenttypecheck"  type="radio" onchange="toggleForm('Wallet')" value="wallet" name="chargeType" id="wallet" checked> <label class="text-primary" for="wallet"><strong>Wallet</strong></label>
                                                        <input class="ms-3 prosgeneralpaymenttypecheck" onchange="toggleForm('Saved')" value="saved"  type="radio" name="chargeType" id="saved"> <label class="text-primary" for="saved"><strong>Saved</strong></label>
                                                        <input class="ms-3 prosgeneralpaymenttypecheck" onchange="toggleForm('Blocked')" value="blocked"    type="radio" name="chargeType" id="block"> <label class="text-primary" for="block"><strong>Locked</strong></label>
                                                    </div>
                                                    <div class="row " style="margin-left:12px;"><div class="prosloadcontenttypeinstant"></div > </div>
                                                    <div class="container table-responsive proscontfloatcontent prosloadstaffcontentsalary"> </div>

                                                   
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12" style="padding: 30px;">
                                            <button class="btn btn-primary abba_transfer_bulk"  onclick="payWithMonnifyBulk()" style="width: 100%;" type="button">
                                            <i class="fas fa-exchange-alt"></i> Pay
                                            </button>
                                            <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                                by EduMESS
                                            </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade show " id="pills-websitting" role="tabpanel" aria-labelledby="pills-websitting-tab">
                                        <div id="pros-loadamissionwebcontent">
                                            


                                         <div class="row ">
                                           
                                            <div  class="my-4" style="margin-left:15px;"> 
                                                 <p class="ps-3 textmuted mb-0 mb-2" style="margin-right:25px;">Choose the right payment type </p>
                                                <input  class="prosgeneralpaymenttypecheck_schedule"  type="radio" value="wallet" name="chargeTypeshedule" id="walletschedule" checked> <label class="text-primary" for="walletschedule"><strong>Wallet</strong></label>
                                                <input class="ms-3 prosgeneralpaymenttypecheck_schedule" value="saved"  type="radio" name="chargeTypeshedule" id="savedschedule"> <label class="text-primary" for="savedschedule"><strong>Saved</strong></label>
                                                <input class="ms-3 prosgeneralpaymenttypecheck_schedule" value="blocked"    type="radio" name="chargeTypeshedule" id="blockschedule"> <label class="text-primary" for="blockschedule"><strong>Locked</strong></label>
                                                </div>

                                                 <div class="row  " style="margin-left:12px;"><div class="prosloadcontenttypeinstant_schedule"></div> </div>
                                            </div>


                                            <div class="accordion" id="accordionExampleschedule">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOneschedule">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneschedule" aria-expanded="true" aria-controls="collapseOneschedule">
                                                    <u>Click to view more fields</u>
                                                    </button>
                                                </h2>
                                                <div id="collapseOneschedule" class="accordion-collapse collapse " aria-labelledby="headingOneschedule" data-bs-parent="#accordionExampleschedule">
                                                    <div class="accordion-body">
                                                          <br>

                                                          <p class="mr-2"><strong>Select Date, Month And Amount for Staff's automated Salary Payment</strong></p>
                                                        
                                                        
                                                        <div class="form-group abba_local-forms ">
                                                        <label>Month<span style="color:orangered;">*</span> </label>
                                                        <input type="month" class="form-control pros_general_schedule_input prosstartamountmonth-scheule" >
                                                        </div>
                                                        <div class="form-group abba_local-forms ">
                                                        <label>Date<span style="color:orangered;">*</span> </label>
                                                        <input type="date" class="form-control pros_general_schedule_input schedulepaymentdate" id="schedulepaymentdate">
                                                        </div>
                                                        <div class="form-group abba_local-forms">
                                                        <label>Amount<span style="color:orangered;">*</span> </label>
                                                        <input type="number"
                                                            class="form-control form-control-sm account_name prosamountschedule pros_general_schedule_input_amount" 
                                                            placeholder="Amount">
                                                        </div>


                                                        <div class="row">
                                                        <div class="col-md-7 col-12">
                                                            <div class="row">
                                                                <input type="hidden" class="prosloadsalaybulkamount_schedule">
                                                                <div class="col-12 mb-4">
                                                                    <div class="row">
                                                                    <div class="col-md-12 ps-0">
                                                                        <p class="ps-3 textmuted fw-bold h6 mb-0">TOTAL SALARY AMOUNT</p>
                                                                        <input type="hidden" class="prosloadsalaybulkamount_inititatedschedule">
                                                                        <span class="h4 fw-bold d-flex ps-3">₦ <span class="textmuted prosloadamountcontent-schedule" >0.00</span></span> 
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>



                                                        <div class="prosloadstaffforshedule-salary table-responsive"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>


                                            <div class="row">
                                            <div class="col-12" style="padding: 30px;">
                                                <button class="btn btn-primary pros_transfer_schedulebtn"  disabled="disabled"   style="width: 100%;" type="button">
                                                <i class="fas fa-credit-card"></i> Schedule Now
                                                </button>
                                                <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                                    by EduMESS
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <!--===PROS LOAD SALARY SETTGSIN=======-->
                                     
                                     
                                     <div class="tab-pane fade show " id="pills-salarysettings" role="tabpanel" aria-labelledby="pills-salarysettings-tab">
                                         <br>
                                         
                                         <p class="mr-2"><strong>Please select a staff member and enter the amount you want to pay as their salary.</strong></p>
                                         
                                        <div class="col-12 mb-2">
                                            <div class="form-floating ">
                                                <select class="form-select prostaffforsalarysettings_payrol"
                                                    style="font-size: 13px; height: 53px;border: none; border-bottom: #b3b3b3 solid 1px;"
                                                    id="floatingSelect" aria-label="Floating label select example">
                                                    <option selected></option>
                                                    
                                                   
                                                 </select>
                                                <label for="floatingSelect">Select Staff</label>
                                            </div>
                                        </div><br>
                                         
                                         
                                          <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="number"
                                                        style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                                        class="form-control form-control-sm staffsalaryamount_setpayroll" id="floatingInput"
                                                        placeholder="name">
                                                    <label for="floatingInput"
                                                        style="color: #afafaf; margin-top: 2px; font-weight: 500;">Salary Amount</label>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row">
                                            <div class="col-12" style="padding: 30px;">
                                                <button class="btn btn-primary prossetsalaryamountherebtn"     style="width: 100%;" type="button">
                                                <i class="fa fa-settings"></i> Set Salary
                                                </button>
                                                <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                                    by EduMESS
                                                </div>
                                            </div>
                                            </div>
                                         
                                         
                                    </div>
                                     
                                      <!--===PROS LOAD SALARY SETTGSIN=======-->
                                        
                                    
                                         
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!--===Transfer Modal In Bulk=======-->






                               <!--==== Delete scheduled salary==== -->
                   <div class="modal fade" id="prosloadeleteschedulemodal" tabindex="-1" aria-labelledby="prosloadeleteschedulemodalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content" style="border-radius: 20px;">
                                    <div class="modal-body overflow-auto">
                                        <div align="center">

                                                 <h5 class="mt-3">Delete salary scheduled</h5>

                                                         <img src='data:image/gif;base64,R0lGODlhQABAAPcAAAD/AIXF84XK94bA7Yeo14e14oidzYqKvIuCs4xypYx5rI1sn41tn41toI1un45tn45woo9voI9voo9xopBypJB0pZB2ppFxoZFyo5JyoJJ0pJJ2ppJ3p5J4qJNyoJN5qZR7qpR8q5R8rJV1oJV2pZV4qJV9q5V/rZZ6qZZ9q5Z/rZaArpeArpeCsJh4oZiArZmGspp8qZqDsJqJtJt7oZt7opt+qJuEsJuMtpx/q5yNt5yNt5yNuJ2Hsp2JtJ2QuZ5/oZ6Su5+Er5+Mt5+UvKCVvqGCoqGSu6KDo6KGr6KHsaKXv6KawaOFpaOJsqOMtaOSuqOVvaOcw6SFoqSOt6SUvKWgxqaWvaaYv6ajyKeIo6iQt6icwqiny6mLo6mQt6mgxqqrzquStquew6utz6uw0ayOpKyjyKylyayx0ayy0q2Qo62VuK2Vuq2Wu62hxq2z1K6Rpa+YvK+pzK+31rCWtLCZvLCavbCmybCtz7Cw0LC417C52LGavbG52LG62bG72bKVprKv0LKw0bKz1LK927K+27K+3LOdv7OszbPB3bSXpLSz1LTA3bTD37WpybXD37XE4LaZpbaiwrax0ba007bF4Left7e52LikxLi21bqepbq/3brF4bvI47ypx7y72LzC372qx73E4L6ip76nu77L5b+jpr+tyL+/27/G4sDJ5MDL5sGlp8Gwy8HL5cLE3sLN58OxzMPG4MPO58SopsSpqMS0zsXJ4saqqMbN5cbQ6MexwMfM5MfN5citp8jS6cm50cnQ58qvp8rU6suwqMu3w8vU6szV7MzW7M2+1c7Y7c+0qM+1qNC2qdHD2NK/x9PAyNS7qdTI29XI29a9qte9qNjGy9jN3tnAqdrAqtvQ4dzR4dzT4t3Eqt/Hqt/Pzt/W5OLKq+LZ5uTV0eXNrObe6ufPrOnj7OrTrOvUrOvl7u3g1u3o8O/YrfDZrvDs8/LcrfLv9PPcrvPdrvXerfXz9/bq3Pfhrvjirvj2+fnjrvrv3vr4+/38/f///yH/C05FVFNDQVBFMi4wAwEAAAAh+QQFBAAAACwAAAAAQABAAIcA/wCFxfOFyveGwO2HqNeHteKInc2KiryLgrOMcqWMeayNbJ+NbZ+NbaCNbp+ObZ+OcKKPb6CPb6KPcaKQcqSQdKWQdqaRcaGRcqOScqCSdKSSdqaSd6eSeKiTcqCTeamUe6qUfKuUfKyVdaCVdqWVeKiVfauVf62WeqmWfauWf62WgK6XgK6XgrCYeKGYgK2ZhrKafKmag7CaibSbe6Gbe6KbfqibhLCbjLacf6ucjbecjbecjbidh7KdibSdkLmef6GekrufhK+fjLeflLyglb6hgqKhkruig6Oihq+ih7Gil7+imsGjhaWjibKjjLWjkrqjlb2jnMOkhaKkjreklLyloMamlr2mmL+mo8iniKOokLeonMKop8upi6OpkLepoMaqq86rkrarnsOrrc+rsNGsjqSso8ispcmssdGsstKtkKOtlbitlbqtlrutocats9SukaWvmLyvqcyvt9awlrSwmbywmr2wpsmwrc+wsNCwuNewudixmr2xudixutmxu9mylaayr9CysNGys9Syvduyvtuyvtyznb+zrM2zwd20l6S0s9S0wN20w9+1qcm1w9+1xOC2maW2osK2sdG2tNO2xeC3n7e3udi4pMS4ttW6nqW6v926xeG7yOO8qce8u9i8wt+9qse9xOC+oqe+p7u+y+W/o6a/rci/v9u/xuLAyeTAy+bBpafBsMvBy+XCxN7CzefDsczDxuDDzufEqKbEqajEtM7FyeLGqqjGzeXG0OjHscDHzOTHzeXIrafI0unJudHJ0OfKr6fK1OrLsKjLt8PL1OrM1ezM1uzNvtXO2O3PtKjPtajQtqnRw9jSv8fTwMjUu6nUyNvVyNvWvarXvajYxsvYzd7ZwKnawKrb0OHc0eHc0+LdxKrfx6rfz87f1uTiyqvi2ebk1dHlzazm3urnz6zp4+zq06zr1Kzr5e7t4Nbt6PDv2K3w2a7w7PPy3K3y7/Tz3K7z3a713q318/f26tz34a744q749vn546767976+Pv9/P3///8I/wD9/RNIcKDBgggPKiRozwkGRAsjJpz4z2BFgRcrWtyIkWNFeTkeLFjQBmPHkxpRZpTIMiG8W670IbQXQ4KLaA4kfPFHsWfElEBXekQXY8GDHPIwgnxggx0/cBEWbDEZ1KNQni1ZciOxAEECCTHs+aNpk909fvfIRZDwpJ/Pt1eronzmoGuAAQqOmgvZlJ9fv+QyLHDSL65hi3ATopKw4EAAAQICfF1Q9qxltOQ8SEgiMytFuXL99RlpALLpAkb7/l3NjxxXIfYOqxyYUN8nBoxzU96t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'/>

                                                       <br><br><span class="text-danger">Are you sure you want to delete this salary Scheduled?</span>
                                                   

                                        </div>
                                        <br><br>
                                    
                                    </div>
                             
                                            
                                    <input type="hidden" class="form-control  prosloadschedduleid_for_del"  placeholder="name">
                                           

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger prosdelete_schedulebtnall_btn">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!--==== Delete scheduled salary==== -->




     <!--======= PAYROLL MODAL CONTENT========= -->
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
      <!-- atendance config -->
    <div class="modal fade modalshow modalfade" id="abba_set_attendance_config_Modal" tabindex="-1"
        aria-labelledby="abba_set_attendance_config_ModalLabel" aria-hidden="true">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">
    
                <div class="modal-header">
                    <h5 class="modal-title text-primary">
                        <i class="fa fa-list-alt"></i> Attendance Configuration
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="position: fixed; margin-left: -10px; margin-top: -30px;">
                        
                    </div>
                    <!-- Navbar pills -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Nav tabs -->
                            <div class="col-sm-12">
                                <span style="font-size:12px; font-weight:500;">Generate Campus QR-Code and Pin Campus Location</span>
                                <div class="card">
                                    <form class="ps-3 pe-3 pt-3 pb-0">
                                        <div class="row">
                                            
                                            <span style="font-size:12px; font-weight:500;"><i class="fas fa-magic"></i> Generate Campus QR-Code</span>
                                            <div class="card qr-code-div">
                                                <form class="ps-3 pe-3 pt-3 pb-0">
                                                    <div class="row p-3">
                                                        <div class="col-12 col-sm-12" align="right">
                                                            <button type="button" style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;" class="btn btn-sm fw-normal abba_generate_qr_code"><i class="fas fa-magic"></i> Generate QR-Code</button>
                                                        </div>
                                                        <div class="col-12 col-sm-12 p-4">
                                                            <div class="text-center" id="qr-code-preloader">
    
                                                            </div>
                                                            <div class="text-center qr-code-display">
    
                                                                <span style="font-weight:600;font-size:20px;cursor:pointer;" class="abba_generate_qr_code">Generate QR-Code</span>
                                                            </div>
                                                        </div>
                                                        <div class="qr-code-print" id="printContent" style="display: none; text-align: center;">
                                                            
                                                        </div>
                                                        <div class="col-12 col-sm-12" align="right">
                                                            <button type="button" style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;" class="btn btn-sm fw-normal printQRCodeBtn"><i class="fas fa-print"></i> Print QR-Code</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <!-- Hidden iframe for printing -->
                                            <iframe id="printFrame" style="display: none;"></iframe>
                                            
                                            <span style="font-size:12px; font-weight:500;margin-top:15px;"><i class="fas fa-location-arrow"></i> Pin Campus Location</span>
                                            <div class="card mb-3 pin_loc_div">
                                                <form class="ps-3 pe-3 pt-3 pb-0">
                                                    <div class="row p-3">
                                                        <div class="col-12 col-sm-12" align="right">
                                                            <button type="button" style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;" class="btn btn-sm fw-normal abba_pin_location"><i class="fas fa-location-arrow"></i> Pin Location</button>
                                                        </div>
                                                        <div class="col-12 col-sm-12 p-4">
                                                            <div class="text-center" id="pin-location-preloader">
    
                                                            </div>
                                                            <div class="text-center pin-location-display">
    
                                                                <span style="font-weight:600;font-size:20px;cursor:pointer;" class="abba_generate_qr_code show_pinned_location">Pin Campus Location</span>
                                                            </div>
                                                            <input type="hidden" class="abba_longitude">
                                                            <input type="hidden" class="abba_latitude">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="mt-4">
                                    <span style="font-size:12px; font-weight:500;">Clock in and clock out time and penalty.</span>
                                    <div class="card">
                                        <form class="ps-3 pe-3 pt-4 pb-0">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group abba_local-forms">
                                                        <label>Clock In Time.<span style="color:orangered;">*</span> </label>
                                                        <input class="form-control" type="time" placeholder="Clock In Time" id="abba_get_clock_in_time">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group abba_local-forms">
                                                        <label>Clock In Penalty.<span style="color:orangered;">*</span> </label>
                                                        <input class="form-control" type="number" placeholder="Clock In Penalty" id="abba_get_clock_in_penalty">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group abba_local-forms">
                                                        <label>Clock Out Time.<span style="color:orangered;">*</span> </label>
                                                        <input class="form-control" type="time" placeholder="Clock Out Time" id="abba_get_clock_out_time">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group abba_local-forms">
                                                        <label>Clock Out Penalty.<span style="color:orangered;">*</span> </label>
                                                        <input class="form-control" type="number" placeholder="Clock Out Penalty" id="abba_get_clock_out_penalty">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Navbar pills -->
                </div>
                <div class="modal-footer" id="change_create_btn">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-sm abba_proceed_set_attendance_config"> 
                        <i class="fas fa-save"></i> Save Changes</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- atendance config -->
    <div class="modal fade" id="staticBackdropattend" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropattendLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" style="border-radius: 40px;">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title text-primary">
                        <i class="fa fa-list-alt"></i> Attendance History
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body abba_dis_staff_atten_his">
                    
                </div>
                <div class="modal-footer" id="change_create_btn">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalimageview" tabindex="-1" aria-labelledby="exampleModalimageviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" class="attendance_img" width="100%" height="auto" style="transform: rotate(90deg);">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
     <!-- leave application settings modal  -->
    <div class="modal fade" id="leave_application_settings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="leave_application_settingsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="staticBackdropLabel"><i class="fas fa-cog fa-spin"></i> Leave Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 mb-2 ps-2 pe-2 mt-3">
                            <div class="form-floating">
                                <select class="form-select emmaloadcampusforleave" style="font-size: 13px; height: 50px;border: none; border-bottom: #b3b3b3 solid 1px;" id="" aria-label="emmaloadcampusforleaveLabel">
                                <option  selected>Select Session</option>
                                
                                </select>
                                <label for="floatingSelect">Select Session</label>
                            </div>
                        </div>


                        <div class="col-12 mb-2 ps-2 pe-2 mt-3">
                            <div class="abba_local-forms">
                                <label>Yearly Leave Limit<span style="color:orangered;">*</span></label>
                                <input type="number" class="form-control leave_limit_per_year" id="" placeholder="Yearly Leave Limit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_leave_limit_per_year"><i class="fas fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- edit leave settings  -->

    <div class="modal fade" id="leave_application_edit_settings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="leave_application_settingsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="staticBackdropLabel"><i class="fas fa-edit"></i> Edit Leave Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="leave_settings_data_id">
                        <input type="hidden" class="leave_settings_institution_id">

                        <div class="col-12 mb-2 ps-2 pe-2 mt-3">
                            <div class="abba_local-forms">
                                <label>Session<span style="color:orangered;">*</span></label>
                                <input type="text" class="form-control edit_leave_session" id="" placeholder="Yearly Leave Limit" disabled>
                            </div>
                        </div>

                        <div class="col-12 mb-2 ps-2 pe-2 mt-3">
                            <div class="abba_local-forms">
                                <label>Yearly Leave Limit<span style="color:orangered;">*</span></label>
                                <input type="number" class="form-control edit_leave_limit_per_year" id="" placeholder="Yearly Leave Limit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary edit_leave_limit_per_year"><i class="fas fa-edit"></i> Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="view_leave" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="leave_application_settingsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="staticBackdropLabel"><i class="fas fa-eye eye-icon"></i> View Leave History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="emma_keep_view_details"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

