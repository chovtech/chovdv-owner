<?php

?>
                                <div class="row g-2">
                                        <div class="col-md-2 col-lg-2">
                                            <select style="color: #666666;"
                                                    class="form-select form-select-sm emma-load-campuspostransaction"
                                                    aria-label=".form-select-sm example">
                                                    <option value="NULL">Select Campus</option>
                                                    
                                                </select>
                                        </div>
                                        <div class="col-md-2 col-lg-2">

                                               <select style="color: #666666;"
                                                    class="form-select form-select-sm emma-transactiontype"
                                                    aria-label=".form-select-sm example ">
                                                    <option selected value="NULL">Transaction Type</option>
                                                    <option value="income">Income</option>
                                                    <option value="expenditure">Expenditure</option>
                                                    
                                                </select>
                                         
                                        </div>
                                        <div class="col-md-2 col-lg-2">
                                            <i class="fa fa-filter btn btn-outline-primary" data-bs-toggle="collapse"
                                                href="#collapseExample" role="button" aria-expanded="false"
                                                aria-controls="collapseExample" style="font-size:12px;"> More filter</i>
                                        </div>
                                        <div class="col-md-3 col-lg-4">

                                        </div>
                                    </div>

                                    <div class="row g-4 pb-5">
                                        <div class="row g-4 col-sm-12 col-md-12 col-lg-12">
                                            <div class="collapse" id="collapseExample">
                                                
                                        
                                                <div class="row g-2">
                                                    
                                                    
                                                     <div class="col-md-3 col-lg-2">
                                                         
                                                        
                                                         
                                                         <select style="color: #666666;" class="form-select form-select-sm" aria-label=".form-select-sm example" id="emmagetsessiontransactionfileter">

                                                            <option value="NULL">Select Session</option>
                                                            <?php
                
                                                            $emma_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                            $emma_result_session = mysqli_query($link, $emma_sql_session);
                                                            $abba_row_session = mysqli_fetch_assoc($emma_result_session);
                                                            $emma_row_cnt_session = mysqli_num_rows($emma_result_session);
                
                                                            if ($emma_row_cnt_session > 0) {
                                                                do {
                                                                    if ($emma_row_session['sessionStatus'] == '1') {
                                                                        $emma_selected_session = 'selected';
                                                                    } else {
                                                                        $emma_selected_session = '';
                                                                    }
                                                                    echo '<option value="' . $emma_row_session['sessionName'] . '" ' . $emma_selected_session . '>' . $emma_row_session['sessionName'] . '</option>';
                
                                                                } while ($emma_row_session = mysqli_fetch_assoc($emma_result_session));
                                                            } else {
                                                                echo '<option value="0">No Records Found</option>';
                                                            }
                                                            ?>
                                                        </select>

                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="col-md-3 col-lg-2">
                                                         
                                                         
                                                         
                                                         <select style="color: #666666;" class="form-select form-select-sm" aria-label=".form-select-sm example" id="emma_filterterm_id">

                                                            <option value="NULL">Select Term</option>
                                                            
                                                            
                                                        </select>

                                                    </div>
                                                    
                                                    <div class="col-md-3 col-lg-2">

                                                            <select style="color: #666666;" class="form-select form-select-sm emmatutionfeetuitiontype"
                                                                aria-label=".form-select-sm example">
                                                                <option value="NULL">TuitionType</option>
                                                                   <option value="Normal">Normal</option>
                                                                    <option value="Sholarship">Sholarship</option>
                                                                    <option value="Repurchase">Repurchase</option>
                                                            </select>
                                                        
                                                    </div>



                                                    <div class="col-md-5 col-lg-5">
                                                        <div class="form-group" style="display: flex;">
                                                            <div style="width: 35%;">
                                                                <input class="form-control emmaload-start-date-transhistory"
                                                                    style="font-size: 11px; color: #888888;"
                                                                    type="date">
                                                            </div>
                                                            <span style="padding: 5px 2px 10px 4px;">To</span>
                                                            <div style="width: 35%; margin-left: 5px;">
                                                                <input class="form-control emmaload-end-date-transhistory"
                                                                    style="font-size: 11px; color: #888888;"
                                                                    type="date">
                                                            </div>

                                                            

                                                            <button type="button"
                                                                style="margin-left: 10px; font-size: 11px; height: 30px; width: 70px; border-radius: 5px;"
                                                                class="btn btn-primary btn-sm emma-load-value-btn">Load
                                                            </button>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


            <div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
                <div class="table-responsive emma-load-transaction-auditory">
                    <div align="center" id="emma-loadnofield-selectedoptionalfee-content">
                        <?php
                            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                            if ($pros_select_record_not_found_count > 0) {
                            

                                $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                                echo '<img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                                <p>No record found.</p>';
                            }
                        ?>
                    </div>     
                </div>
            </div>