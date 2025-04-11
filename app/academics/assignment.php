
    <div class="row">
    
        <div class="col-12">
            <button type="button"
            style="float: right;font-size: 13px;border:none;font-weight:500;"
            class="btn btn-sm btn-primary text-light" data-bs-toggle="modal"
            data-bs-target="#ekene-setassignmentmodal" id="set_assignment_1"> <i
                class="fas fa-tasks"> Set assignment</i></button>
        </div>
      
        <div class="col-12 mt-3">

            <div class="card">
                <div class="card-body">


                    <div class="row g-2">
                        <div class="col-md-12 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm"
                                aria-label="form-select-sm example" id="ekene_select_assignment_campus">
                                <option value="NULL">Select campus</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm"
                                aria-label="form-select-sm example" id="ekene_select_assignment_class">
                                <option value="NULL">Select Class</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm"
                                aria-label="form-select-sm example" id="ekene_select_assignment_subject">
                                <option value="NULL">Select subject</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm"
                                aria-label="form-select-sm example" id="ekene_display_behavioural_session">

                                <option value="NULL">Select Session</option>
                                <?php

                                    $ekene_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                    $ekene_result_session = mysqli_query($link, $ekene_sql_session);
                                    $ekene_row_session = mysqli_fetch_assoc($ekene_result_session);
                                    $ekene_row_cnt_session = mysqli_num_rows($ekene_result_session);

                                    if ($ekene_row_cnt_session > 0) {
                                        do {
                                            if ($ekene_row_session['sessionStatus'] == '1') {
                                                $ekene_selected_session = 'selected';
                                            } else {
                                                $ekene_selected_session = '';
                                            }
                                            echo '<option value="' . $ekene_row_session['sessionName'] . '" ' . $ekene_selected_session . '>' . $ekene_row_session['sessionName'] . '</option>';

                                        } while ($ekene_row_session = mysqli_fetch_assoc($ekene_result_session));
                                    } else {
                                        echo '<option value="0">No Records Found</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                       
                        
                        <div class="col-md-12 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm"
                                aria-label="form-select-sm example" id="ekene_select_assignment_term">
                                <option value="NULL">Select Term</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-lg-1">

                        </div>
                        <div class="col-md-12 col-lg-1">
                            <a href="javascript:();" type="button" class="btn btn-primary btn-sm"
                                id="ekene_load_assignment_question" style="width: 100%;">
                                <span style="font-size: 13px;">Load</span>
                            </a>
                        </div>
                    </div>

                   
                </div>
               
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-12 mt-3" id="ekene_display_student_behavioural">
                            <div align="center">
                                <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                <p class="pt-2 fs-6 text-secondary">Please
                                    filter to proceed.</p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
                           
