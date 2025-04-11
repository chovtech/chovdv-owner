                                  <div class="row g-2">
                                        <div class="col-md-2 col-lg-2">
                                            <select style="color: #666666;"
                                                    class="form-select form-select-sm pros-load-campuspostransaction-feedrive"
                                                    aria-label=".form-select-sm example">
                                                    <option value="NULL">Select Campus</option>
                                                    
                                                </select>
                                        </div>

                                        <div class="col-md-2 col-lg-2">
                                            <select style="color: #666666;" class="form-select form-select-sm" aria-label=".form-select-sm example" id="prosgetsessiontranfeedrive">

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


                                       
                                        <div class="col-md-2 col-lg-2">
                                            <i class="fa fa-filter btn btn-outline-primary" data-bs-toggle="collapse"
                                                href="#collapseExample" role="button" aria-expanded="false"
                                                aria-controls="collapseExample" style="font-size:12px;"> More filter</i>
                                        </div>

                                        <div class="col-md-4 col-lg-4"></div>
                                        <div class="col-md-2 col-md-2">
                                            <button type="button" class="btn btn-sm btn-primary  pros-sendmessagein-bulk-btn"   data-bs-toggle="modal" data-bs-target="#exampleModalSend" style="float: right;border: solid 1px #FF7702; background: #FF7702; font-size: 12px;" >
                                                <i class='bx bx-mail-send'></i> Send Message
                                            </button>
                                        </div>

                                    </div>

                                    <div class="row g-4 pb-5">
                                        <div class="row g-4 col-sm-12 col-md-12 col-lg-12">
                                            <div class="collapse" id="collapseExample">
                                                
                                        
                                                <div class="row g-2">
                                                    
                                                    
                                                    <div class="col-md-3 col-lg-2">
                                                    
                                                         
                                                         <select style="color: #666666;" class="form-select form-select-sm" aria-label=".form-select-sm example" id="prosloatermfeedrive">

                                                            <option value="NULL">Select Term</option>
                                                            
                                                        </select>

                                                    </div>
                                                    
                                                    <div class="col-md-3 col-lg-2">

                                                            <select style="color: #666666;" class="form-select form-select-sm pros-sectionfeedrive-feedrive"
                                                                aria-label=".form-select-sm example">
                                                                <option value="NULL">Section</option>
                                                                  
                                                            </select>
                                                        
                                                    </div>


                                                    <div class="col-md-3 col-lg-2">

                                                        <select style="color: #666666;"
                                                            class="form-select form-select-sm prosclass-loadfeedrive"
                                                            aria-label=".form-select-sm example ">
                                                            <option selected value="NULL">Class</option>
                                                           
                                                            
                                                        </select>

                                                     </div>


                                                     <div class="col-md-3 col-lg-2">
                                                            <select style="color: #666666;"
                                                                class="form-select form-select-sm pros-loadstatusfeedrive"
                                                                aria-label=".form-select-sm example ">
                                                                <option selected  value="NULL">All Status</option>
                                                                <option  value="1">Paid</option>
                                                                <option  value="2">Outstanding</option>
                                                                <option  value="3">Not paid</option>
                                                            
                                                                
                                                            </select>
                                                    </div>

                                                            
                                                    <div class="col-md-2 col-lg-2">
                                                        <div class="form-group" style="display: flex;">
                                                           
                                                            <button type="button"
                                                                style="margin-left: 10px; font-size: 11px; height: 30px; width: 70px; border-radius: 5px;"
                                                                class="btn btn-primary btn-sm pros-loadfeedrive-btn">Load</button>

                                                        </div>
                                                    </div>
                                                    
                                                         
                                                  
                                                    <div class="col-md-3 col-lg-3">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                                                       
                                    <div class="table-Side-Chi topSecCards" style="padding: 30px 30px 30px 30px;">
                                        
                                        
                                                                 <div class="row" align="right"> 

                                                                <div class="col-sm-6"></div>
                                                                <div class="col-sm-6">

                                                                <span type="button"
                                                                style="margin-left: 10px; font-size: 11px;  border-radius: 5px;"
                                                                class="btn btn-primary btn-sm pros-setcountdown_btn "  data-bs-toggle="modal" data-bs-target="#prosloadcountdown">Set countdown <i class="fas fa-hourglass-start"></i></span>

                                                                </div>


                                                               
                                                                
                                                               
                                                                      
                                                                </div>
                                        <div class="table-responsive pros-load-transaction-feedrive">
                                                  <div align="center" id="pros-loadnofield-selectedoptionalfee-content-feedrive">
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
                                        <div align="center" style="margin-top: 30px;" id="pros-staffpaginationcont"></div>
                                    </div>







                                   
       