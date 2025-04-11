
<div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
    
    <div class="row g-2" id="abba_hide_parent_filter">
        <div class="col-md-12 col-lg-3">
            <form>
                <div class="mb-3">
                    <div class="search-container">
                        <input type="text" class="search-input form-control form-control-sm abba_parent_search"
                            placeholder="Search Parent">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 col-lg-3">
            <select style="color: #666666;" class="form-select form-select-sm"
                aria-label=".form-select-sm example" id="abba_display_parent_campus">
                <option value="NULL">Select campus</option>
            </select>
        </div>
        <div class="col-md-1 col-lg-1">
            <select class="form-select form-select-sm"
                style="border:none;border-bottom:2px solid #007ffb;font-size:13px;cursor:pointer;width:70%;background: transparent;text-align: center;padding-right: 10px;" id="abba_increase_parent_per_page">
                <option value="12" selected>12</option>
                <option value="60">60</option>
                <option value="120">120</option>
                <option value="360">360</option>
                <option value="720">720</option>
                <option value="1080">1080</option>
            </select>
        </div>
        <div class="col-md-2 col-lg-2">
            <i class="fa fa-filter btn btn-outline-primary" data-bs-toggle="collapse" href="#parent_collapseExample"
                role="button" aria-expanded="false" aria-controls="parent_collapseExample" style="font-size:12px;">More
                filter</i>
        </div>
        
        <div class="col-md-12 col-lg-1">

        </div>

        <div class="col-md-12 col-lg-2">
            <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                class="btn btn-sm btn-primary text-light" data-bs-toggle="modal"
                data-bs-target="#abba_create_parent_Modal"> <svg xmlns="http://www.w3.org/2000/svg" width="20"
                    height="20" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M19 17v2H7v-2s0-4 6-4s6 4 6 4m-3-9a3 3 0 1 0-3 3a3 3 0 0 0 3-3m3.2 5.06A5.6 5.6 0 0 1 21 17v2h3v-2s0-3.45-4.8-3.94M18 5a2.91 2.91 0 0 0-.89.14a5 5 0 0 1 0 5.72A2.91 2.91 0 0 0 18 11a3 3 0 0 0 0-6M8 10H5V7H3v3H0v2h3v3h2v-3h3Z" />
                </svg> Create Parent</button>
        </div>

        <div class="collapse" id="parent_collapseExample">
            <div class="row g-2">
                <div class="col-md-12 col-lg-2">
                    <select style="color: #666666;" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" id="abba_display_parent_session">

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
                        aria-label=".form-select-sm example" id="abba_display_parent_term">
                        <option value="NULL">Select Term</option>
                    </select>
                </div>

                <div class="col-md-12 col-lg-2">
                    <select style="color: #666666;" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" id="abba_display_parent_section">
                        <option value="NULL">Select Section</option>
                    </select>
                </div>
                <div class="col-md-12 col-lg-2">
                    <select style="color: #666666;" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" id="abba_display_parent_class">
                        <option value="NULL">Select Class</option>
                    </select>
                </div>
                <div class="col-md-12 col-lg-2">
                    <select style="color: #666666;" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" id="abba_display_parent_type">
                        <option value="NULL">Select Student Type</option>
                        <option value="Day">Day Student</option>
                        <option value="Boarding">Boarding Student</option>
                        <!-- <option value="prefect">Prefect</option> -->
                    </select>
                </div>
                <div class="col-md-12 col-lg-2">
                    <select style="color: #666666;" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" id="abba_display_parent_status">
                        <option value="NULL">Select Status</option>
                        <option value="1">Active</option>
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
                        class="btn btn-sm fw-normal" id="abba_get_parent_on_click"> Load filter</button>
                </div>
            </div>
        </div>

    </div>

    <div id="abba_display_parent">

    </div>

    <div align="center" style="margin-top: 30px;" id="parent_pagination-container">

    </div>
</div>



<!-- create parent -->
<div class="modal fade modalshow modalfade" id="abba_create_parent_Modal" tabindex="-1"
    aria-labelledby="abba_create_parent_ModalLabel" aria-hidden="true">
    <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff; ">

            <div class="modal-header">
                <h5 class="modal-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19 17v2H7v-2s0-4 6-4s6 4 6 4m-3-9a3 3 0 1 0-3 3a3 3 0 0 0 3-3m3.2 5.06A5.6 5.6 0 0 1 21 17v2h3v-2s0-3.45-4.8-3.94M18 5a2.91 2.91 0 0 0-.89.14a5 5 0 0 1 0 5.72A2.91 2.91 0 0 0 18 11a3 3 0 0 0 0-6M8 10H5V7H3v3H0v2h3v3h2v-3h3Z" />
                    </svg> Invite Parent
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
                                    <a
                                    class="nav-link active"
                                    id="abba_ex1-tab-10"
                                    data-bs-toggle="tab"
                                    href="#abba_ex1-tabs-10"
                                    role="tab"
                                    aria-controls="abba_ex1-tabs-10"
                                    aria-selected="true">Invite Via Whatsapp</a>
                                </li>
                                <!-- <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link"
                                    id="abba_ex1-tab-20"
                                    data-bs-toggle="tab"
                                    href="#abba_ex1-tabs-20"
                                    role="tab"
                                    aria-controls="abba_ex1-tabs-20"
                                    aria-selected="false">Invite Via Email</a
                                    >
                                </li> -->
                            </ul>
                        
                            
                            <div class="tab-content" id="ex1-content">

                                <div class="tab-pane fade show active" id="abba_ex1-tabs-10" role="tabpanel" aria-labelledby="abba_ex1-tab-10">
                                    <input type="text" id="text-to-copy" value="" readonly style="border:none;width:100%;"><br><br>

                                    <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-file" id="copy-button"> Copy</i></button>

                                    <a href="whatsapp://send?text=Your%20message%20or%20link%20here" id="abba_parent_invite_link" type="button" class="btn btn-success btn-sm" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"> Share via WhatsApp</i></a>
                                    
                                </div>
                                
                                <!-- <div class="tab-pane fade" id="abba_ex1-tabs-20" role="tabpanel" aria-labelledby="abba_ex1-tab-20">
                                    Tab 2 content
                                </div> -->
                            </div>
                            <!-- Tab panes -->
                        </div>
                    </div>
                </div>
                <!-- Navbar pills -->
            </div>
        </div>
    </div>
</div>

<!-- change parent status modal -->
<div class="modal fade" id="abba_change_parent_stat_staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="abba_change_parent_stat_staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="abba_change_parent_stat_staticBackdropLabel"><i class="fas fa-edit-alt"> Change Student Status</i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" align="center">
                <span class="btn btn-sm btn-icon" style="background-color:#facaca;border-radius:50%;">
                    <h2><i class="fas fa-trash-alt text-danger" style="padding:10px;"></i></h2>
                </span><br>
                <span style="font-size:15px;">Are you sure you want to delete the selected student(s)?</span>
                <div id="abba_parent_delete_success_msg">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                <button type="button" class="btn btn-danger btn-sm" id="abba_proceed_to_delete_parent"><i class="fas fa-trash-alt"> Yes Delete</i></button>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="container-fluid mt-3 mb-3">
        <div class="picture-container">
            <div class="image-error"></div>
            <!-- student Image upload Modal -->
            <div id="abba_update_parent_image_modal" class="modal" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Parent Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                                    <input type="hidden" id="abba_store_parent_id_for_image">
                                    
                                    <input type="hidden" id="abba_store_inst_id_for_image">
                                    
                                    <input type="hidden" id="abba_get_parent_image_class_input">
                                    <div id="abba_parent_demo_image"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            <button class="btn btn-success abba_crop_parent_image"> Submit </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</div>

<!-- delete parent modal -->
<div class="modal fade" id="abba_parent_staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="abba_parent_staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="abba_parent_staticBackdropLabel"><i class="fas fa-trash-alt"> Delete
                        Parent(s)</i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" align="center">
                <span class="btn btn-sm btn-icon" style="background-color:#facaca;border-radius:50%;">
                    <h2><i class="fas fa-trash-alt text-danger" style="padding:10px;"></i></h2>
                </span><br>
                <span style="font-size:15px;">Are you sure you want to delete the selected parent(s)?</span>
                <div id="abba_student_delete_success_msg">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times">
                        Close</i></button>
                <button type="button" class="btn btn-danger btn-sm" id="abba_proceed_to_delete_parent"><i
                        class="fas fa-trash-alt"> Yes Delete</i></button>
            </div>
        </div>
    </div>
</div>



<!-- delete parent modal -->
<div class="modal fade" id="abba_parent_kids" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="abba_parent_staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="abba_parent_staticBackdropLabel"><i class="fas fa-child"> My Kids</i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#abba_assign_parent_to_student_Modal" id="abba_assign_parent_to_students" style="width:200px;float:right;margin-top:10px;margin-right:10px;"><i class="fas fa-link"> Assign student to parent</i> </button>
            </div>
            <div class="modal-body">
                
                <div id="display_my_kids">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
            </div>
        </div>
    </div>
</div>

<!-- add student -->
<div class="modal fade modalshow modalfade" id="abba_assign_parent_to_student_Modal" tabindex="-1"
    aria-labelledby="abba_assign_parent_to_student_ModalLabel" aria-hidden="true">
    <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff; ">

            <div class="modal-header">
                <h5 class="modal-title text-primary">
                    <i class="fas fa-link"> Assign student to parent</i> 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="position: fixed; margin-left: -10px; margin-top: -30px;">
                    
                </div>
                <!-- Navbar pills -->
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" id="abba_parent_id_holder">
                        <input type="hidden" id="abba_parent_span">
                        <input type="hidden" id="abba_parent_camp">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label=".form-select-sm example" id="abba_display_assign_class">

                            <option value="NULL">Select Class</option>
                            
                        </select>
                    </div>

                    <div class="col-sm-12" id="abba_display_student_for_assign">

                    </div>
                </div>
                <!-- Navbar pills -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-sm btn-primary abba_add_student_parent"><i class="fas fa-link"> Assign </i></button>
            </div>
        </div>
    </div>
</div>

