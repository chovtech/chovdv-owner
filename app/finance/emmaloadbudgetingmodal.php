<!-- first modal for budgeting  -->
<div class="modal fade" id="budgetModalforadditems" aria-hidden="true" aria-labelledby="budgetModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Set Budget</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-10">
                            
                        </div>
                        <div class="col-lg-2">
                            <!-- <a href="" data-bs-target="#useTemplateModal" data-bs-toggle="modal" data-bs-dismiss="modal"  style="float: right; font-size: 12px;" >
                                <i class="fa fa-plus" aria-hidden="true"></i> Use Template
                            </a> -->
                        </div>
                    </div>    
            
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-12">
                            <div align="center">
                                <img src="../../assets/images/Feb-Business_9.jpg" style="width: 15%;" alt="">
                                <p></p>
                                <p>Opps looks like you haven't set any Budget items yet!!! <br> Click on Add Item to set them.</p>

                                <button type="button" id="emma_add_items_button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#addItemsModalfordropdowns" data-bs-dismiss="" style="border: solid 1px #FF7702; background: #FF7702; border-radius: 25px; font-size: 16px; width: 250px;" >
                                    <i class='bx bxs-bookmark-alt-plus' ></i> Add Items
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- second modal for budgeting-->
    <div class="modal fade" id="addItemsModalfordropdowns" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="addItemsModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalToggleLabel2"><i class="fas fa-plus-circle" aria-hidden="true"></i> Add Item</h5>
                    <button type="button" class="btn-close" data-bs-toggle="" data-bs-target="#" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div style=" margin: 20px 25px 0 25px;">
                        <div class="col-12 mb-2">
                            <div class="form-floating ">
                                <select class="form-select emmaloadcampusforbudgeting" style="font-size: 13px; height: 50px;border: none; border-bottom: #b3b3b3 solid 1px;" id="floatingSelect" aria-label="Floating label select example">
                                <option  selected>Select Campus</option>
                                
                                </select>
                                <label for="floatingSelect">Select Campus</label>
                            </div>
                        </div>

                        <div class="col-12 mb-2">
                            <div class="form-floating ">
                                <select class="form-select emmaloadsessionforbudgeting" style="font-size: 13px; height: 50px;border: none; border-bottom: #b3b3b3 solid 1px;" id="floatingSelect" aria-label="Floating label select example">
                                <option  selected>Select Session</option>
                                </select>
                                <label for="floatingSelect">Select Session</label>
                            </div>
                        </div>

                        <div class="col-12 mb-2">
                            <div class="form-floating ">
                                <select class="form-select emmaloadtermforbudgeting" style="font-size: 13px; height: 50px;border: none; border-bottom: #b3b3b3 solid 1px;" id="floatingSelect" aria-label="Floating label select example">
                                <option  selected>Select Term</option>
                               
                                </select>
                                <label for="floatingSelect">Select Term</label>
                            </div>
                        </div>

                        <div class="col-12 mb-2">
                            <div class="form-floating ">
                                <select class="form-select emmaloadcategorytypeforbudgeting" style="font-size: 13px; height: 50px;border: none; border-bottom: #b3b3b3 solid 1px;" id="floatingSelect" aria-label="Floating label select example">
                                <option  selected>Select Category</option>
                                </select>
                                <label for="floatingSelect">Select Category</label>
                            </div>
                        </div>

                        <div class="emmaloadcategorytitleforbudgeting"></div>                                                                           
                    </div>
                </div>

                <div class="modal-footer mt-4">
                    <input type='hidden' class='emmaloaddataidforcategory'>
                    <input type='hidden' class='emmaloaddataidforsubcategory'>
                    <button class="btn btn-sm btn-primary emmasubmitbutton" data-bs-target="#budgetModal2" data-bs-toggle="modal" data-bs-dismiss="" >Submit</button>
                </div>
                
            </div>
        </div>
    </div>

    <!--School Budget with table Modal -->
    <div class="modal fade" id="budgetModal2" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="budgetModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">School Budget</h4>
                    <button type="button" class="btn-close" data-bs-toggle="" data-bs-target="#" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">      

                    <div class="row">
                        <div class="col-lg-9">
                            
                        </div>
                        <div class="col-lg-3">
                            <!-- <a href="" style="float: right; font-size: 14px; text-decoration: none;"  data-bs-target="#addItemsModal2" data-bs-toggle="modal" data-bs-dismiss="modal">
                                <i class="fa fa-plus" aria-hidden="true"></i> Create New Item
                            </a> -->
                        </div>
                    </div>   
            
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-12">
                            <div class="emmaloadtablecontent"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary emmaproceedandinsertbuttonforbudgeting" data-bs-target="#" data-bs-toggle="" data-bs-dismiss="">Proceed</button>
                </div>
            </div>
        </div>
    </div>
                         
    <!-- edit budget modal  -->
        <div class="modal fade" id="edditbudget" tabindex="-1" aria-labelledby="edditbudgetLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id=""><i class="fas fa-edit"> Edit Budget</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="emma_budget_edit_data_id">
                        <input type="hidden" class="emma_budget_edit_campus_id">
                        <input type="hidden" class="emma_budget_edit_sub_category_id">
                        <input type="hidden" class="emma_budget_edit_actual_amount_hidden">
                        

                        <div class="">
                            <div align="end">
                                <div class="emma_budget_edit_sub_title fw-bold"></div>
                                <div class="emma_budget_edit_actual_amount fw-bold"></div>
                            </div>
                        </div>

                        <div class="abba_local-forms  mt-4">
                            <label>Budgeted Amount<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control emma_budget_edit_data_budget" id="">
                        </div>

                        <div class="abba_local-forms  mt-4">
                            <label>Difference Amount<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control emma_budget_edit_difference" id="" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_edit_budget_button"><i class="fas fa-edit"> Update</i></button>
                    </div>
                </div>
            </div>
        </div>

    <!-- delete budget modal  -->
        <div class="modal fade" id="deletebudget" tabindex="-1" aria-labelledby="deletebudgetLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id=""><i class="fas fa-trash"> Delete Budget</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="emma_budget_delete_data_id">
                        <input type="hidden" class="emma_budget_delete_campus_id">
                        <input type="hidden" class="emma_budget_delete_sub_category_id">

                        <div align="center" class="text-danger">
                            <h6>Are you sure you want to delete this, <br> <b>Note</b>: This cannot be reversed</h6>
                        </div>

                        <div class="displaydeleteimg"></div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger text-white emma_delete_budget_button"><i class="fas fa-trash"> Delete</i></button>
                    </div>
                </div>
            </div>
        </div>
    <!--====School Budget Modal=====-->