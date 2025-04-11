




            <div class="row g-2">
                    <div class="col-md-2 col-lg-2">
                        <select style="color: #666666;"
                                class="form-select form-select-sm pros-load-campuspostransaction-categorysummary"
                                aria-label=".form-select-sm example">
                                <option value="NULL">Select Campus</option>
                                
                            </select>
                    </div>

                    

                    <div class="col-md-2 col-lg-2">
                        <select style="color: #666666;"
                                class="form-select form-select-sm pros-load-classname-catefee"
                                aria-label=".form-select-sm example">
                                <option value="NULL">Select Class</option>
                                
                            </select>
                    </div>

                    

                    <div class="col-md-2 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm" aria-label=".form-select-sm example" id="prosgetsession-categorysummary">

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
                                
                                    
                    <div class="col-md-3 col-lg-2">
                        <select style="color: #666666;" class="form-select form-select-sm" aria-label=".form-select-sm example" id="prosloaterm-categorysummary">

                            <option value="NULL">Select Term</option>
                            
                        </select>
                    </div>
                                                
                    <div class="col-md-2 col-lg-2">
                        <div class="form-group" style="display: flex;">
                            
                            <button type="button"
                                style="margin-left: 10px; font-size: 11px; height: 30px; width: 70px; border-radius: 5px;"
                                class="btn btn-primary btn-sm pros-load-categorysummary-btn">Load</button>

                        </div>
                    </div>
            </div><br>



            <div class="table-Side-Chi topSecCards" style="padding: 20px 20px 20px 20px;">
            <div class="table-responsive prosloadcategorysummary">
                        <div align="center" id="pros-load-loadcategorysummarycontent">

                            <?php

                                $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                                $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                if ($pros_select_record_not_found_count > 0) {
                                

                                    $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                                    echo '<img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                                    <p>Filter to load record.</p>';
                                }

                            ?>
                        </div>
            </div>
            </div>