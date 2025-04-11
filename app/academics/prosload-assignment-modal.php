




        <!--  //set assignment modal =======----- -->


        <div class="modal fade" id="ekene-setassignmentmodal" aria-hidden="true"
                aria-labelledby="ekene-setassignmentmodalLabel" tabindex="-1">
                <div class="modal-dialog modal-xl" style="width:80%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel"> Question</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mt-4">
                            <input id="ekene_hidden" type="hidden" value="0">

                            <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group ekene_select_campus abba_local-forms">
                                            <label>Campus<span style="color:orangered;">*</span> </label>
                                            <select class="form-control" id="ekene_display_campus_for_create_class">
                                                <option value="NULL">Select Campus</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group abba_local-forms ekene_select_class">
                                            <label>class<span style="color:orangered;">*</span> </label>
                                            <select class="form-control" id="ekene_display_section_for_display_class">
                                                <option value="NULL">Select class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group abba_local-forms ekene_select_class">
                                            <label>Subjects<span style="color:orangered;">*</span> </label>
                                            <select class="form-control" id="ekene_display_subject_class">
                                                <option value="NULL">select Subjects</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group abba_local-forms ekene_select_class">
                                            <label>Title<span style="color:orangered;">*</span> </label>
                                            <input class="form-control" id="ekene_title" placeholder="Enter the Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group abba_local-forms ekene_select_class">
                                            <label>overall score<span style="color:orangered;">*</span> </label>
                                            <input class="form-control" id="overall_score" type="number"placeholder="Enter the overall score">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        
                                        <div class="form-group abba_local-forms ekene_select_class">
                                            <label>Cbt base or not<span style="color:orangered;">*</span> </label>
                                            <select class="form-control" id="cbtornot">
                                                <option value="NULL">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    

                                    </div>



                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group abba_local-forms prosloadcbtorexamsettingstype">
                                            <label>  Category <span style="color:orangered;">*</span> </label>
                                            <select class="form-control prosassementcategory_create" >
                                                <option value="NULL" disabled>Select</option>
                                                <option value="Objective">Objective</option>
                                                <option value="Theory">Theory</option>
                                                <option value="Both">Both</option>
                                            </select>
                                        </div>
                                    
                                    </div>

                                    
                               

                                
                            </div>





                              


                                <div class="row" id="ekene_hidecbt">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group abba_local-forms ekene_select_class">
                                            <label>Date<span style="color:orangered;">*</span> </label>
                                            <input type="date" class="form-control" id="hidden_date">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group abba_local-forms ekene_select_class">
                                            <label>Start time<span style="color:orangered;">*</span> </label>
                                            <input type="time" class="form-control" id="start_time">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group abba_local-forms ekene_select_class">
                                            <label>End time<span style="color:orangered;">*</span> </label>
                                            <input type="time" class="form-control" id="end_time">
                                        </div>
                                    </div>
                                </div>

                                                                    
                                    <div class="row" id="ekene_hidenotcbt">
                                        <div class="col-md-12 col-lg-4">
                                            <div class="form-group abba_local-forms ekene_select_class">
                                                <label> Start Date<span style="color:orangered;">*</span> </label>
                                                <input type="date" class="form-control" id="start_date">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-4">
                                            <div class="form-group abba_local-forms ekene_select_class">
                                                <label>Submission Date<span style="color:orangered;">*</span> </label>
                                                <input type="date" class="form-control" id="submission_date">
                                            </div>
                                        </div>
                                    </div>

                            
                                <div class="row">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">
                                        <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                            class="btn btn-sm btn-primary text-light mb-5" 
                                        >
                                            <span class=" float-end  cursor:pointer; font-weight:bold;"
                                                id="ekene_import_question"><i class="fa fa-plus"></i> import Questions</span>
                                        </button>

                                    </div>
                                </div>

                                <div class="row" id="insrtuction_div" style="padding: 15px;"></div>
                                            
                                    <div class="row">
                                            <div class="col-sm-12">
                                            <!-- Nav tabs -->
                                                <div class="col-sm-12">
                                                    <ul class="nav nav-tabs mb-3 customtab" id="abba-config" role="tablist">
                                                    
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="config-tab-12" data-bs-toggle="tab" href="#config-tabs-12"
                                                                role="tab" aria-controls="config-tabs-12" aria-selected="true">Obective</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="config-tab-13" data-bs-toggle="tab" href="#config-tabs-13"
                                                                role="tab" aria-controls="config-tabs-13" aria-selected="false">Theory</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="tab-content" id="abba-config-content">

                                                <div class="tab-pane fade show active" id="config-tabs-12" role="tabpanel"
                                                    aria-labelledby="config-tab-12">
                                                    <div class="row" id="ekeneloadappededinputhere">


                                                        <input type="hidden" id="ekeneloadobjectiveappendquestion" value="0">


                                                        <div class="col-12">
                                                            <div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
                                                                <div class="table-responsive emma-load-transaction-auditory">

                                                                    <div align="center" id="ekehidehidecontentnorecord">
                                                                        <input id="hidd" type="hidden" value="1">
                                                                        <?php

                                                                                $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
                                                                                $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                                                                $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                                                                if ($pros_select_record_not_found_count > 0) {
                                                                                    $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
                                                                                    echo '
                                                                                
                                                                                    <img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">
                                                                                    <p style="color: black;">Click below to Add questions.</p>';
                                                                                }
                                                                    

                                                                        ?>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                        <div class="d-flex justify-content-center">
                                                            <button id="ekene_add_obj" class="circle-icon btn btn-success mx-2" style="font-size: 12px; font-weight: 500;">
                                                                Add objective question <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>



                                                </div>


                                                <div class="tab-pane fade show " id="config-tabs-13" role="tabpanel"
                                                    aria-labelledby="config-tab-13">
                                                    
                                                    <div class="row" id="ekeneloadappededinputheretheory">

                                                        <input type="hidden" id="ekeneloadtheoryappendquestion" value="0">

                                                        <div class="col-12">
                                                            <div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
                                                                <div class="table-responsive emma-load-transaction-auditory">

                                                                    <div align="center" id="ekenetheorynorecordfoundcontent">
                                                                    <input id="hidd1" type="hidden" value="1">
                                                                        <?php

                                                                            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
                                                                            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                                                            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                                                            if ($pros_select_record_not_found_count > 0) {
                                                                                $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
                                                                                echo '
                                                                            
                                                                                <img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">
                                                                                <p  style="color: black;">Click below to Add questions.</p>     
                                                                                ';
                                                                            }
                                                                

                                                                        ?>
                                                                    
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                        <div class="d-flex justify-content-center">
                                                            <button id="ekene_addtheory" class="circle-icon btn btn-primary mx-2" style="font-weight: 500;">
                                                                Add theory question <i class="fa fa-plus"></i>
                                                            </button>

                                                        </div>


                                                </div>
                                            </div>
                                    </div>
                                </div>

                    
                        <div class="modal-footer">
                            <button class="btn btn-primary submitquestion" id="ekene_add_question">Submit</button>

                        </div>

                </div>
                    
                    </div>
                </div>
            </div>
        <!-- =====end of set assignment modal======----- -->


            <div class="modal fade" id="ekene-import-questionmodal" aria-hidden="true"
                aria-labelledby="ekene-import-questionmodalLabel" tabindex="-1">
                <div class="modal-dialog modal-fullscreen" style="width:100%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel"> Question</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-3">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                        id="select_question_category">
                                        <option>Question category</option>
                                        <option value="Theory">Theory</option>
                                        <option value="Objective">Objective </option>
                                       

                                    </select>


                                </div>
                                <div class="col-3">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                        id="select_question_type">
                                        <option selected value="NULL">Question type</option>
                                        <option value="Assesement">Assessment</option>
                                        <option value="Pratice">Pratice Question</option>

                                    </select>
                                </div>
                                <div class="col-2">
                                    <a  type="button" class="btn btn-primary btn-sm"
                                        id="pros_load_import_question" style="width: 100%;">
                                        <span style="font-size: 13px;">Load</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row mt-5 g-3" id="display_import">
                                <div class="col-12 mt-5" id="ekene_display_student_behavioural">
                                    <div align="center">
                                        <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                        <p class="pt-2 fs-6 text-secondary">Please
                                            filter to proceed.</p>
                                    </div>
                                </div>



                            </div>

                        </div>
                        <div class="modal-footer mt-5">
                            <button class="btn btn-primary" id="add_button">Next</button>

                        </div>

                    </div>

                </div>
            </div>

        <!-- Button trigger modal -->
     

        <div class="modal fade" id="ekeneloaddeletemodal" tabindex="-1" aria-labelledby="ekeneloaddeletemodalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="dataid">
                    <input type="hidden" id="datacam">
                    <p style="color: red">Are you sure you want to delete this? This action is irreversible.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="eken_delete_all">delete</button>
                </div>
                </div>
            </div>
        </div>



        
        <div class="modal fade" id="ekene_save_change" aria-hidden="true"
             aria-labelledby="ekene_save_changeLabel" tabindex="-1">

            <div class="modal-dialog modal-xl" style="width:80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel"> Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
             
                <div class="modal-body mt-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Nav tabs -->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs mb-3 customtab" id="abba-config" role="tablist">
                                
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="config-tab-16" data-bs-toggle="tab" href="#config-tabs-16"
                                            role="tab" aria-controls="config-tabs-12" aria-selected="true">Obective</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="config-tab-15" data-bs-toggle="tab" href="#config-tabs-15"
                                            role="tab" aria-controls="config-tabs-15" aria-selected="false">Theory</a>
                                    </li>
                                </ul>


                            </div>
                        </div>

                        <div class="tab-content" id="ekene-config-content1">

                            <div class="tab-pane fade " id="config-tabs-15" role="tabpanel" aria-labelledby="config-tab-15">

                                <div class="row">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">
                                        <button type="button"  id="ekene_import_questionthoerysavechangequestion" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                            class="btn btn-sm btn-primary text-light mb-5" 
                                        >
                                            <span class=" float-end  cursor:pointer; font-weight:bold;"
                                               ><i class="fa fa-plus"></i> import Questions</span>
                                        </button>

                                    </div>
                                    
                                    <input type="hidden" id="ekeneloadtheoryappendquestionsjon" value="0">
                                    <div class="row" id="ekeneloadappededinputheresavechangetheory">
                                             
                                        <div class="col-12">
                                            <div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
                                                <div class="table-responsive emma-load-transaction-auditory">
                                              
                                                     
                                                    <div align="center" id="ekehidehidecontentnorecordtheorysavechange">
                                                    <input id="hidd12" type="hidden" value="1">
                                                        <?php

                                                            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
                                                            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                                            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                                            if ($pros_select_record_not_found_count > 0) {
                                                                $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
                                                                echo '
                                                            
                                                                <img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">
                                                                <p style="color: black;">Click below to Add questions.</p>';
                                                            }
                                                    

                                                        ?>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                            <div class="col-6">

                                             </div>

                                             <div class="col-6">
                                                    <span id="ekene_add_json_theoryquestion" class=" mx-2 float-end" style="font-size: 12px; font-weight: bold; color: blue; cursor: pointer;">
                                                    <i class="fa fa-plus"></i> Add theory question
                                                    </span>
                                             </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button id="eke_save_changetheory" class="circle-icon btn btn-primary mx-2" style="font-size: 12px; font-weight: 500;">
                                           Save change
                                        </button>
                                     </div>


                                </div>
                            </div>




                            <div class="tab-pane fade show active" id="config-tabs-16" role="tabpanel" aria-labelledby="config-tab-16">

                                <div class="row">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">
                                        <button type="button"  id="ekene_import_questionobjectivesavechangequestion" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                            class="btn btn-sm btn-primary text-light mb-5" 
                                        >
                                            <span class=" float-end  cursor:pointer; font-weight:bold;"
                                               ><i class="fa fa-plus"></i> import Questions</span>
                                        </button>

                                    </div>
                                    <input type="hidden" id="ekeneloadobjectiveappendquestionsjon" value="0">
                                    <div class="row" id="ekeneloadappededinputheresavechangeobjective">

                                        <div class="col-12">
                                            <div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
                                                <div class="table-responsive emma-load-transaction-auditory">

                                                    <div align="center" id="ekehidehidecontentnorecordobjectivesavechange">
                                                        <input id="hidd2" type="hidden" value="1">
                                                        <?php

                                                            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
                                                            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                                            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                                            if ($pros_select_record_not_found_count > 0) {
                                                                $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
                                                                echo '
                                                            
                                                                <img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">
                                                                <p style="color: black;">Click below to Add questions.</p>';
                                                            }
                                                    

                                                        ?>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                           <div class="row">
                                            <div class="col-6">

                                             </div>

                                             <div class="col-6">
                                                    <span id="ekene_add_jsonobjectivequestion" class=" mx-2 float-end" style="font-size: 12px; font-weight: bold; color: green; cursor: pointer;">
                                                    <i class="fa fa-plus"></i> Add objective question
                                                    </span>
                                             </div>
                                           </div>

                                    <div class="d-flex justify-content-center">
                                        <button id="eke_save_changeobjective" class="circle-icon btn btn-primary mx-2" style="font-size: 12px; font-weight: 500;">
                                           Save change
                                        </button>
                                     </div>


                                </div>
                            </div>
                                      
                            


                        </div>

                    </div>
                </div>

            </div>
            </div>
        </div>     
       

        <div class="modal fade" id="ekeneloaddeletemodaljson" tabindex="-1" aria-labelledby="ekeneloaddeletemodaljsonLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="kdatacamid">
                <input type="hidden" id="kdataid">
                    <input type="hidden" id="dataassignmentquestionid">
                    <p style="color: red">Are you sure you want to delete this? This action is irreversible.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="eken_delete_eachjsonquestion">delete</button>
                </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="ekeneloaddeletemodaljsontheory" tabindex="-1" aria-labelledby="ekeneloaddeletemodaljsontheoryLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="kdatacamidtheory">
                <input type="hidden" id="kdataidtheory">
                    <input type="hidden" id="dataassignmentquestionidtheory">
                    <p style="color: red">Are you sure you want to delete this? This action is irreversible.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="eken_delete_eachjsonquestiontheory">delete</button>
                </div>
                </div>
            </div>
        </div>



    <div class="modal fade" id="ekene-import-questionmodalobjective" aria-hidden="true"
            aria-labelledby="ekene-import-questionmodalobjectiveLabel" tabindex="-1">
            <div class="modal-dialog modal-fullscreen" style="width:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel"> Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-3">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="select_question_categoryobjective">
                                    <option >Question category</option>
                                
                                    <option selected>Objective </option>
                                

                                </select>


                            </div>
                            <div class="col-3">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="select_question_typeobjective">
                                    <option selected value="NULL">Question type</option>
                                    <option>Assessment</option>
                                    <option>Pratice Question</option>
                                    <option>Other Question</option>

                                </select>
                            </div>
                            <div class="col-2">
                                <a href="javascript:();" type="button" class="btn btn-primary btn-sm"
                                    id="load_import_questionobjective" style="width: 100%;">
                                    <span style="font-size: 13px;">Load</span>
                                </a>
                            </div>
                        </div>

                        <div class="row mt-5 g-3" id="display_importobjective">
                            <div class="col-12 mt-5" id="ekene_display_student_behaviouralobjective">
                                <div align="center">
                                    <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                    <p class="pt-2 fs-6 text-secondary">Please
                                        filter to proceed.</p>
                                </div>
                            </div>



                        </div>

                    </div>
                    <div class="modal-footer mt-5">
                        <button class="btn btn-primary" id="add_buttonobjective">Next</button>

                    </div>

                </div>

            </div>
        </div>



    <div class="modal fade" id="ekene-import-questionmodaltheory" aria-hidden="true"
        aria-labelledby="ekene-import-questionmodaltheoryLabel" tabindex="-1">
        <div class="modal-dialog modal-fullscreen" style="width:100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"> Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                id="select_question_categorytheory">
                                <option >Question category</option>
                              
                                <option selected>Theory </option>
                             

                            </select>


                        </div>
                        <div class="col-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                id="select_question_typetheory">
                                <option selected value="NULL">Question type</option>
                                <option>Assessment</option>
                                <option>Pratice Question</option>
                                <option>Other Question</option>

                            </select>
                        </div>
                        <div class="col-2">
                            <a href="javascript:();" type="button" class="btn btn-primary btn-sm"
                                id="load_import_questiontheory" style="width: 100%;">
                                <span style="font-size: 13px;">Load</span>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-5 g-3" id="display_importtheory">
                        <div class="col-12 mt-5" id="ekene_display_student_behaviouraltheory">
                            <div align="center">
                                <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                <p class="pt-2 fs-6 text-secondary">Please
                                    filter to proceed.</p>
                            </div>
                        </div>



                    </div>

                </div>
                <div class="modal-footer mt-5">
                    <button class="btn btn-primary" id="add_buttontheory">Next</button>

                </div>

            </div>

        </div>
    </div>
    <input type="hidden" id="dataassignmentid">



 
        <div class="modal fade" id="ekene_view_dowloadquestion" aria-hidden="true"
             aria-labelledby="ekene_view_dowloadquestionLabel" tabindex="-1">

            <div class="modal-dialog modal-xl" style="width:80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel"> Download</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
             


                    <div class="modal-body-wrapper">
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-6 float-start">
                                <!-- <span style="cursor: pointer; color: blue; text-decoration: underline" id="ekene_showanswer"><i class="fa fa-eye"></i>"Show answer </span> -->
                             </div>
                             <div class="col-6 float-end" align="right">
                                <button class="btn btn-primary" id="ekene_print"><i class="fa fa-print"></i>Download</button>
                             </div>
                        </div>
                
                           <div class="row p-3"  id="downloadassignmentekene"></div>
                    </div>
                    </div>

                </div>
            </div>
        </div>   



        

        <div class="modal fade" id="ekene_mark_question" aria-hidden="true"
             aria-labelledby="ekene_mark_questionLabel" tabindex="-1">

            <div class="modal-dialog modal-xl" style="width:80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel"> Mark Assignment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
             
                    <div class="modal-body mt-1">
                        <!-- <div class="row">
                            <div class="col-6 float-start">
                                <span style="cursor: pointer; color: blue; text-decoration: underline" id="ekene_showanswer"><i class="fa fa-eye"></i>"Show answer </span>
                             </div>
                             <div class="col-6 float-end" align="right">
                                <button class="btn btn-primary" id="ekene_print"><i class="fa fa-print"></i> Print </button>
                             </div>
                        </div> -->
                
                           <div id="ekenemarkassignmentekene"></div>

                           <!-- reset hidden input field -->
                           <input type="hidden" id="resetassignmentid">
                            <input type="hidden" id="resetstudentid">
                            <!-- pulish hidden input field -->
                            <input type="hidden" id="publishassignmentid">
                            <input type="hidden" id="publishstudentid">
                            <input type="hidden" id="publishdatastatus">
                            
                                 <!-- convert hidden input field.... -->
                            <input type="hidden" id="ekeneconvertdatastatus" name="ekeneconvertdatastatus">
                            
                            <input type="hidden" id="ekeneconvertstudentid" name="ekeneconvertstudentid">
                            <input type="hidden" id="overallhiddeninput" name="overallhiddeninput">

                            <input type="hidden" id="tota_lobjectivequestion" name="tota_lobjectivequestion">
                                    <!-- hidden -->
                            <input type="hidden" id="datasession">
                            <input type="hidden" id="dataterm">
                
                                    
                    </div>

                </div>
            </div>
        </div>   




        <div class="modal fade" id="ekene_markmainassignment" aria-hidden="true" aria-labelledby="modalLabel"
        tabindex="-1">

        <div class="modal-dialog modal-xl" style="width:80%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"> Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mt-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Nav tabs -->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs mb-3 customtab" id="abba-config" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="config-tab-20" data-bs-toggle="tab" href="#config-tabs-20"
                                            role="tab" aria-controls="config-tabs-20" aria-selected="true">Obective</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="config-tab-21" data-bs-toggle="tab" href="#config-tabs-21"
                                            role="tab" aria-controls="config-tabs-21" aria-selected="false">Theory</a>
                                    </li>
                                </ul>


                            </div>
                        </div>

                        <div class="tab-content" id="ekene-config-content1">

                            <div class="tab-pane fade  " id="config-tabs-21" role="tabpanel"  aria-labelledby="config-tab-21">
                               

                                <div id="theoryparttab" style="color: black;"></div>

                                <input type="hidden" id="ekene_studenthiddenidten">
                                <input type="hidden" id="ekene_campushiddenidten">
                                <input type="hidden" id="ekene_sassignmenthiddenidten">

                            </div>




                            <div class="tab-pane fade show active" id="config-tabs-20" role="tabpanel" aria-labelledby="config-tab-20">
                            <div id="objectiveparttab"  style="color: black;"></div>

                            </div>
                        </div>






                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="submit_markedassignment">Submit</button>
                    </div>
            </div>
        </div>
        </div>


      <div class="modal fade" id="ekene_convert_assignmentmodal" tabindex="-1" aria-labelledby="ekene_convert_assignmentmodalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">convert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- <input type="hidden" id="kdatacamidtheory">
                <input type="hidden" id="kdataidtheory"> -->
                    <input type="hidden" id="">

                    <div class="col-md-12 col-lg-12">
                            <select style="color: #666666;" class="form-select form-select-sm"
                                aria-label="form-select-sm example" id="ekene_ca_select">
                                <option value="NULL">select CA</option>
                            </select>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="ekene_convertbutton">Convert</button>
                </div>
                </div>
            </div>
        </div>




        <!-- ====PROS RESET ASSIGNMENT MODAL HERE======= -->





                               <!--==== Delete scheduled salary==== -->
                               <div class="modal fade" id="resetmodalhere" tabindex="-1" aria-labelledby="resetmodalhereLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content" style="border-radius: 20px;">
                                    <div class="modal-body overflow-auto">
                                        <div align="center">

                                                 <h5 class="mt-3">Reset Assignment</h5>

                                                         <img />

                                                       <br><br><span class="text-danger">
                                                        Are you sure you want to reset this assignment?<br>

                                                        <b>Note:</b> 
                                                        Students who have already completed this assignment will need to redo it.

                                                       </span>
                                                   

                                        </div>
                                        <br><br>
                                    
                                    </div>
                             


                             
                                            
                                    <input type="hidden" class="form-control pros-resetassignmentid">
                                    <input type="hidden" class="form-control pros-resetstudentid">
                                    <input type="hidden" class="form-control pros-studentcampus">
                                    <input type="hidden" class="form-control pros-resetdatastatus">
                                    <input type="hidden" class="form-control pros-resetdata">
                                           

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success" id="resteassignmentbtn_final">Reset <i class="fas fa-undo"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>


        

       <!-- ====PROS RESET ASSIGNMENT MODAL HERE======= -->





        
        <div class="modal fade" id="ekene_publishandunpublish_assignmentmodal" tabindex="-1" aria-labelledby="ekene_convert_assignmentmodalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assignment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
           
                    <!-- <input type="hidden" id=""> -->

                     <div id="publishandunpulishassignment"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="ekene_publishandunpuishbutton">Submit</button>
                </div>
                </div>
            </div>
        </div>





        <!---====Edit Profile Side Modal Start Here====-->
        <div class="modal fade modalshow modalfade" id="edit_assignmenttitle" tabindex="-1"
            aria-labelledby="edit_assignmenttitle" aria-hidden="true" sty>
            <div class="modal-dialog modal-dialog-scrollable dialogcontent" style="border-top-left-radius: 30px; width: 25%;">
                <div class="modal-content modalcontent" style="background-color:#ffffff;">
                    <div class="modal-body modalbodycontent">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" style="font-weight: bold;"> Edit Assignment <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                </svg>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="position: fixed; margin-left: -10px; margin-top: -30px; display: flex;">
                            <img src="../../assets/images/favicon11.png" style="width: 150px; z-index: -1; opacity: 0.1;"
                                data-dismiss="modal" aria-label="Close">
                        </div>
                        <div width="300px" class="sc-UpCWa ezuGy flexi-sheet-body" open="">
                            <div width="100%" height="100%" style="padding: 20px; margin-top:40px;" class="sc-pyfCe gtGxgb">
                                <div id="ekeneedit_content"></div>
                                    <input type="hidden" id="eke_hiddeninput">


                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                            <i class="fa fa-times"> Close</i>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" id="eken_edit_assignmenttitle">
                            <i class="fa fa-edit"> Edit</i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    
    
    
    
    