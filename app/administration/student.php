<div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
    
    <div class="row g-2" id="abba_hide_student_filter">
        <div class="col-md-12 col-lg-3">
            <form>
                <div class="mb-3">
                    <div class="search-container">
                        <input type="text" class="search-input form-control form-control-sm abba_student_search"
                            placeholder="Search Student">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 col-lg-2">
            <select style="color: #666666;" class="form-select form-select-sm"
                aria-label=".form-select-sm example" id="abba_display_student_campus">
                <option value="NULL">Select campus</option>
            </select>
        </div>
        <div class="col-md-1 col-lg-1">
            <select class="form-select form-select-sm"
                style="border:none;border-bottom:2px solid #007ffb;font-size:13px;cursor:pointer;width:70%;background: transparent;text-align: center;padding-right: 10px;" id="abba_increase_students_per_page">
                <option value="12" selected>12</option>
                <option value="60">60</option>
                <option value="120">120</option>
                <option value="360">360</option>
                <option value="720">720</option>
                <option value="1080">1080</option>
            </select>
        </div>
        <div class="col-md-2 col-lg-2">
            <i class="fa fa-filter btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample"
                role="button" aria-expanded="false" aria-controls="collapseExample" style="font-size:12px;">More
                filter</i>
        </div>
        <div class="col-md-2 col-lg-2">
            <button type="button" style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;" class="btn btn-sm fw-normal"  data-bs-toggle="modal" data-bs-target="#regnumberset"> <i class="fas fa-user-graduate"> Set Reg. No. count </i></button>
        </div>
        
        <div class="col-md-12 col-lg-2">
            <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                class="btn btn-sm btn-primary text-light" data-bs-toggle="modal"
                data-bs-target="#abba_create_student_Modal"> <svg xmlns="http://www.w3.org/2000/svg" width="20"
                    height="20" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M19 17v2H7v-2s0-4 6-4s6 4 6 4m-3-9a3 3 0 1 0-3 3a3 3 0 0 0 3-3m3.2 5.06A5.6 5.6 0 0 1 21 17v2h3v-2s0-3.45-4.8-3.94M18 5a2.91 2.91 0 0 0-.89.14a5 5 0 0 1 0 5.72A2.91 2.91 0 0 0 18 11a3 3 0 0 0 0-6M8 10H5V7H3v3H0v2h3v3h2v-3h3Z" />
                </svg> Create Student</button>
        </div>
    </div>

    <div class="row g-4">

        <div class="row g-4 col-sm-12 col-md-12 col-lg-12">
            <div class="collapse" id="collapseExample">
                <div class="row g-2">
                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_session">

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
                            aria-label=".form-select-sm example" id="abba_display_term">
                            <option value="NULL">Select Term</option>
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_section">
                            <option value="NULL">Select Section</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_class">
                            <option value="NULL">Select Class</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_student_type">
                            <option value="NULL">Select Student Type</option>
                            <option value="Day">Day Student</option>
                            <option value="Boarding">Boarding Student</option>
                            <!-- <option value="prefect">Prefect</option> -->
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_student_status">
                            <option value="NULL">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                            <option value="2">Blocked</option>
                        </select>
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-10">

                    </div>
                    <div class="col-md-12 col-lg-2">
                        <button type="button"
                            style="float: right;font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;"
                            class="btn btn-sm fw-normal" id="abba_get_student_on_click"> Load filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="abba_display_students" class="get_final_student_content">

    </div>

    <div align="center" style="margin-top: 30px;" id="pagination-container">

    </div>
</div>

<!-- create student -->
<div class="modal fade modalshow modalfade" id="abba_create_student_Modal" tabindex="-1"
    aria-labelledby="abba_create_student_ModalLabel" aria-hidden="true">
    <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff; ">

            <div class="modal-header">
                <h5 class="modal-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19 17v2H7v-2s0-4 6-4s6 4 6 4m-3-9a3 3 0 1 0-3 3a3 3 0 0 0 3-3m3.2 5.06A5.6 5.6 0 0 1 21 17v2h3v-2s0-3.45-4.8-3.94M18 5a2.91 2.91 0 0 0-.89.14a5 5 0 0 1 0 5.72A2.91 2.91 0 0 0 18 11a3 3 0 0 0 0-6M8 10H5V7H3v3H0v2h3v3h2v-3h3Z" />
                    </svg> Create
                    Student
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
                            <ul class="nav nav-tabs mb-3 customtab" id="abba_ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="Javascript:;"
                                    class="nav-link active"
                                    id="abba_ex1-tab-10"
                                    data-bs-toggle="tab"
                                    href="#abba_ex1-tabs-10"
                                    role="tab"
                                    aria-controls="abba_ex1-tabs-10"
                                    aria-selected="true">Create Student</a>
                                </li>
                                <!-- <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link"
                                    id="abba_ex1-tab-20"
                                    data-bs-toggle="tab"
                                    href="#abba_ex1-tabs-20"
                                    role="tab"
                                    aria-controls="abba_ex1-tabs-20"
                                    aria-selected="false">Upload Student List</a
                                    >
                                </li> -->
                            </ul>
                        
                            
                            <div class="tab-content" id="ex1-content">

                                <div class="tab-pane fade show active" id="abba_ex1-tabs-10" role="tabpanel" aria-labelledby="abba_ex1-tab-10">
                                    <div>
                                        <div class="row pt-4">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group abba_local-forms">
                                                    <label>Campus<span style="color:orangered;">*</span> </label>
                                                    <select class="form-control" id="abba_display_campus_for_create_student">
                                                        <option value="0">Select Campus</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <span style="font-size:12px; font-weight:500;">Personal Info.</span>
                                        <div class="card">
                                            <form class="ps-3 pe-3 pt-3 pb-0">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>First Name<span style="color:orangered;">*</span> </label>
                                                            <input class="form-control" type="text" placeholder="Enter First Name" id="abba_get_student_first_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Middle Name </label>
                                                            <input class="form-control" type="text" placeholder="Enter Middle Name" id="abba_get_student_middle_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Last Name<span style="color:orangered;">*</span> </label>
                                                            <input class="form-control" type="text" placeholder="Enter Last Name" id="abba_get_student_last_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Phone Number </label>
                                                            <input class="form-control" type="text" name="studentphone[main]" id="abba_get_student_phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Email Address </label>
                                                            <input class="form-control" type="text" placeholder="Enter Email Address" id="abba_get_student_email">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Disability(ies) </label>
                                                            <input class="form-control" type="text" placeholder="Enter Disability(ies)" id="abba_get_student_disability">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Alergy(ies) </label>
                                                            <input class="form-control" type="text" placeholder="Enter Alergy(ies)" id="abba_get_student_alergy">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Gender<span style="color:orangered;">*</span> </label>
                                                            <select class="form-control" id="abba_get_student_gender">
                                                                <option value='0'>Select Gender</option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Date of Birth </label>
                                                            <input class="form-control" type="date" placeholder="Date of Birth" id="abba_get_student_dob">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Blood Group </label>
                                                            <select class="form-control" id="abba_get_student_blood_group">
                                                                <option value="0">Select Blood Group</option>
                                                                <option value="A+">A+</option>
                                                                <option value="A-">A-</option>
                                                                <option value="B+">B+</option>
                                                                <option value="B-">B-</option>
                                                                <option value="AB+">AB+</option>
                                                                <option value="AB-">AB-</option>
                                                                <option value="O+">O+</option>
                                                                <option value="O-">O-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Religion<span style="color:orangered;">*</span> </label>
                                                            <select class="form-control" id="abba_get_student_religion">
                                                                <option value="0">Select Religion</option>
                                                                <option value="Christianity">Christianity</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Hinduism">Hinduism</option>
                                                                <option value="African Traditional &amp; Diasporic">African Traditional &amp; Diasporic</option>
                                                                <option value="Agnostic">Agnostic</option>
                                                                <option value="Atheist">Atheist</option>
                                                                <option value="Baha'i">Baha'i</option>
                                                                <option value="Buddhism">Buddhism</option>
                                                                <option value="Cao Dai">Cao Dai</option>
                                                                <option value="Chinese traditional religion">Chinese traditional religion</option>
                                                                <option value="Jainism">Jainism</option>
                                                                <option value="Juche">Juche</option>
                                                                <option value="Judaism">Judaism</option>
                                                                <option value="Neo-Paganism">Neo-Paganism</option>
                                                                <option value="Nonreligious">Nonreligious</option>
                                                                <option value="Rastafarianism">Rastafarianism</option>
                                                                <option value="Secular">Secular</option>
                                                                <option value="Shinto">Shinto</option>
                                                                <option value="Sikhism">Sikhism</option>
                                                                <option value="Spiritism">Spiritism</option>
                                                                <option value="Tenrikyo">Tenrikyo</option>
                                                                <option value="Unitarian-Universalism">Unitarian-Universalism</option>
                                                                <option value="Zoroastrianism">Zoroastrianism</option>
                                                                <option value="primal-indigenous">primal-indigenous</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Country<span style="color:orangered;">*</span> </label>
                                                            <select class="form-control" id="abba_display_student_country">
                                                                <option value='0'>Choose Country</option>
                
                                                                <?php

                                                                $sqltogetcountries = mysqli_query($link, "SELECT * FROM `countries` ORDER BY CountryName ASC");
                                                                $rowtogetcountries = mysqli_fetch_assoc($sqltogetcountries);
                                                                $cnttogetcountries = mysqli_num_rows($sqltogetcountries);

                                                                if ($cnttogetcountries > 0) {
                                                                    do {
                                                                        $CountryName = $rowtogetcountries['CountryName'];
                                                                        $countryID = $rowtogetcountries['countryID'];

                                                                        if ($countryID == '161') {
                                                                            $selected = 'selected';
                                                                        } else {
                                                                            $selected = '';
                                                                        }

                                                                        echo '<option value="' . $countryID . '" ' . $selected . '>' . $CountryName . '</option>';

                                                                    } while ($rowtogetcountries = mysqli_fetch_assoc($sqltogetcountries));

                                                                }

                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>State<span style="color:orangered;">*</span> </label>
                                                            <select class="form-control" id="abba_display_student_state">
                                                                <option value='0'>Select State</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-group abba_local-forms">
                                                            <label>L.G.A<span style="color:orangered;">*</span> </label>
                                                            <select class="form-control" id="abba_display_student_lga">
                                                                <option value='0'>Select L.G.A</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>City </label>
                                                            <textarea class="form-control" type="date" placeholder="Enter City" id="abba_get_student_city"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Address </label>
                                                            <textarea class="form-control" type="date" placeholder="Enter Address" id="abba_get_student_address"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Select Parent </label>
                                                            <select class="form-select abba_get_student_parent" name="select_box" id="select_box">
                                                                <option value="0" selected>Select Parent</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <span style="font-size:12px; font-weight:500;">School Info.</span>
                                        <div class="card">
                                            <form class="ps-3 pe-3 pt-4 pb-0">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Allocate Class<span style="color:orangered;">*</span> </label>
                                                            <select class="form-control" id="abba_display_create_student_class">
                                                                <option value='0'>Select Class</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Select Session<span style="color:orangered;">*</span> </label>
                                                            <select class="form-control" id="abba_get_student_session">
                                                                <option value="0">Select Session</option>
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
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Date of Admission<span style="color:orangered;">*</span> </label>
                                                            <input class="form-control" type="date" placeholder="Date of Admission" id="abba_get_student_doa">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Student Type<span style="color:orangered;">*</span> </label>
                                                            <select class="form-control" id="abba_get_student_type">
                                                                <option value='0'>Select Student Type</option>
                                                                <option>Day</option>
                                                                <option>Boarding</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Username/Admission no.<span style="color:orangered;">*</span> </label>
                                                            <input class="form-control" type="text" placeholder="UserName" id="abba_get_student_reg_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group abba_local-forms">
                                                            <label>Password<span style="color:orangered;">*</span> </label>
                                                            <input class="form-control" type="password" placeholder="******" id="abba_get_student_password" value="1234">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                
                                </div>
                                
                                <div class="tab-pane fade" id="abba_ex1-tabs-20" role="tabpanel" aria-labelledby="abba_ex1-tab-20">
                                    Tab 2 content
                                </div>
                            </div>
                            <!-- Tab panes -->
                        </div>
                    </div>
                </div>
                <!-- Navbar pills -->
            </div>
            <div class="modal-footer" id="change_create_btn">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                <button type="button" class="btn btn-primary btn-sm" id="abba_proceed_to_create_student"> 
                    <i class="fa fa-plus"> Create</i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- change student status modal -->
<div class="modal fade" id="abba_change_stud_stat_staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="abba_change_stud_stat_staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="abba_change_stud_stat_staticBackdropLabel"><i class="fas fa-edit-alt"> Change Student Status</i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" align="center">
                <span class="btn btn-sm btn-icon" style="background-color:#facaca;border-radius:50%;">
                    <h2><i class="fas fa-trash-alt text-danger" style="padding:10px;"></i></h2>
                </span><br>
                <span style="font-size:15px;">Are you sure you want to delete the selected student(s)?</span>
                <div id="abba_student_delete_success_msg">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                <button type="button" class="btn btn-danger btn-sm" id="abba_proceed_to_delete_student"><i class="fas fa-trash-alt"> Yes Delete</i></button>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="container-fluid mt-3 mb-3">
        <div class="picture-container">
            <div class="image-error"></div>
            <!-- student Image upload Modal -->
            <div id="abba_update_student_image_modal" class="modal" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Student Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                                    <input type="hidden" id="abba_store_student_id_for_image">
                                    
                                    <input type="hidden" id="abba_store_campus_id_for_image">

                                    <input type="hidden" id="abba_get_student_image_class_input">
                                    <div id="abba_student_demo_image"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            <button class="btn btn-success abba_crop_student_image"> Submit </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</div>

<!-- delete student modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="staticBackdropLabel"><i class="fas fa-trash-alt"> Delete
                        Student(s)</i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" align="center">
                <span class="btn btn-sm btn-icon" style="background-color:#facaca;border-radius:50%;">
                    <h2><i class="fas fa-trash-alt text-danger" style="padding:10px;"></i></h2>
                </span><br>
                <span style="font-size:15px;">Are you sure you want to delete the selected student(s)?</span>
                <div id="abba_student_delete_success_msg">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                <button type="button" class="btn btn-danger btn-sm" id="abba_proceed_to_delete_student"><i class="fas fa-trash-alt"> Yes Delete</i></button>
            </div>
        </div>
    </div>
</div>

<!-- delete student modal -->
<div class="modal fade" id="regnumberset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="staticBackdropLabel"><i class="fas fa-user-graduate"> Set Admission Number Count</i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" align="center">
                <div class="alert alert-info" role="alert">
                    The system will auto-increment all student's Reg. number during registration from whatever number you set below
                </div>
                <div class="row pt-1">
                    <div class="col-12 col-sm-12">
                        <div class="form-group abba_local-forms">
                            <label>Campus<span style="color:orangered;">*</span> </label>
                            <select class="form-control" id="abba_display_reg_cnt_campus">
                                <option value="NULL">Select Campus</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group abba_local-forms">
                            <label>Start Number<span style="color:orangered;">*</span> </label>
                            <input class="form-control" type="number" placeholder="1" id="display_number_count">
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                <button type="button" class="btn btn-primary btn-sm" id="abba_proceed_to_add_number_count"><i class="fas fa-save"> Submit</i></button>
            </div>
        </div>
    </div>
</div>

<!-- promote student modal -->
<div class="modal fade" id="abba_promote_stud_staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="abba_promote_stud_staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="abba_promote_stud_staticBackdropLabel"><i class="fas fa-edit-alt"> Promote Student(s)</i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" align="center">
                
                <div class="col-12">
                    <div class="form-group abba_local-forms">
                        <label>Select Session<span style="color:orangered;">*</span> </label>
                        <select class="form-control" id="abba_get_promote_session">
                            <option value="NULL" disabled>Select Session</option>
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
                </div>
                
                <div class="col-12">
                    <div class="form-group abba_local-forms">
                        <label>Select Section<span style="color:orangered;">*</span> </label>
                        <select class="form-control" id="abba_get_promote_section">
                            <option value="NULL">Select Section</option>
                            
                        </select>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group abba_local-forms">
                        <label>Select Class<span style="color:orangered;">*</span> </label>
                        <select class="form-control" id="abba_display_promote_class">
                            <option value='NULL'>Select Class</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                <button type="button" class="btn btn-success btn-sm" id="abba_proceed_to_promote_student"><i class="fas fa-trophy"> Yes Promote</i></button>
            </div>
        </div>
    </div>
</div>