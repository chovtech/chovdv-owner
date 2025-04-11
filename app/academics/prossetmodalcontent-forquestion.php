

     <!-- Modal Welcome-->
     <div class="modal fade" id="welcomeAI"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="welcomeAILabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                   <div class="row">
                        <div class="col-sm-7 col-md-7 col-lg-7">
                           <div class="card-body">
                                <h5>Hello,</h5>
                                <p class="fs-7">Would you like me to guide you through the Question Bank Setup?</p>
                                <p class="fs-6">If Yes, Click on<strong> Proceed</strong> else skip</p>
                           </div>
                           <div class="card-body">
                            <a class="btn btn-md mb-0 float-end" data-bs-dismiss="modal"  style="font-size: 14px;">Skip</a>

                                <!-- <button type="button" style="font-size: 12px;" class="btn btn-sm text-white float-start  mt-2 rounded-3 bg-color-info" data-bs-toggle="modal" data-bs-target="#createQuestion" id="proceed">Proceed</button> -->

                                <button type="button" style="font-size: 12px;" class="btn btn-sm text-white float-start  mt-2 rounded-3 bg-color-info" data-bs-toggle="modal" data-bs-target="#createQuestionDirect" id="proceed">Proceed</button>

                           </div>
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <div class="row">
                                <img class="" src="vi.png" alt="">
                            </div>
                        </div>
                   </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Modal Wizard-->
    <div class="modal fade" id="createQuestion" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="createQuestionLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- section -->
                        <section>
                            <!-- main content -->
                            <div class="main-content">
                                <!-- row -->
                                <div class="row justify-content-center pt-0 p-2" id="wizardRow">
                                    <!-- col -->
                                    <div class="col-lg-12 col-md-8 text-center">
                                        <!-- wizard -->
                                        <div class="wizard-form py-2 my-2">
                                        <!-- ul -->
                                        <ul id="progressBar" class="progressbar px-xlg-1 px-0 d-flex">
                                            <li id="progressList-1"
                                            class="d-inline-block fw-light w-25 position-relative text-center float-start progressbar-list active">
                                            Selct Campus</li>
                                            <li id="progressList-2"
                                            class="d-inline-block fw-light w-25 position-relative text-center float-start progressbar-list">
                                            Select Class</li>
                                            <li id="progressList-3"
                                            class="d-inline-block fw-light w-25 position-relative text-center float-start progressbar-list">
                                            Select Subject</li>
                                            <li id="progressList-4"
                                            class="d-inline-block fw-light w-25 position-relative text-center float-start progressbar-list">
                                            Select Topic</li>
                                            <li id="progressList-5"
                                            class="d-inline-block fw-light w-25 position-relative text-center float-start progressbar-list">
                                            Add Questions</li>
                                            <li id="progressList-6"
                                            class="d-inline-block fw-light w-25 position-relative text-center float-start progressbar-list">
                                            Done</li>
                                        </ul>
                                        <!-- /ul -->
                                        </div>
                                        <!-- /wizard -->
                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->
                                <!-- row -->
                                <div class="row justify-content-center">
                                    <!-- col -->
                                    <div class="col-lg-10 col-md-8">
                                        <h5 class="fw-light-bold">Select Campus</h5>
                                        <p class="small pb-3">Please select at least one Campus</p>
                                        <!-- cards -->
                                        <div class="row row-cols-1 row-cols-lg-3 g-4 pb-5 border-bottom" id="tari_display_campus">
                                            
                                        </div>
                                        <!-- /cards -->
                                        <!-- NEXT BUTTON-->
                                        <button type="button" style="font-size:12px;" class="btn btn-md text-white float-end next mt-2 rounded-3 bg-color-info" id="Next">Next</button>
                                        <!-- /NEXT BUTTON-->
                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->
                                <!-- row -->
                                <div class="row justify-content-center form-business">
                                    <!-- col -->
                                    <div class="col-lg-10 col-md-8">
                                        <h5 class="fw-light-bold">Select Class</h5>
                                        <p class="small pb-3">Please select at least one Class</p>
                
                                        <!-- cards -->
                                        <div class="row justify-content-center row-cols-1 row-cols-lg-3 g-4 pb-5 border-bottom">
                                            <div class="accordion" id="tari_display_class">
                                                    
                                            </div>
                                        </div>
                                        <!-- /cards -->

                                        <!-- NEXT BUTTON-->
                                        <button type="button" style="font-size:12px;" class="btn btn-md bg-warning text-white float-start back mt-2 rounded-3">Back</button>
                                        <button type="button"  style="font-size:12px;" class="btn btn-md text-white float-end mt-2 rounded-3 btn-primary bg-color-info" id="Next2">Next</button>
                                        <!-- /NEXT BUTTON-->
                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->
                                <!-- row -->
                                <div class="row justify-content-center form-business">
                                    <!-- col -->
                                    <div class="col-lg-10 col-md-8">
                                        <h5 class="fw-light-bold">Select Subject</h5>
                                        <p class="small pb-3">Please select one Subject</p>
                                        <!-- cards -->
                                        <div class="row row-cols-1 row-cols-lg-3 g-4 pb-5 border-bottom" >
                                            <form class="form-control justify-content-center border-0 fetch_class shadow-sm" id="tari_display_subject" >
                                                
                                            </form>
                                        </div>
                                        <!-- /cards -->
                                        <!-- NEXT BUTTON-->
                                        <button type="button" style="font-size:12px;" class="btn btn-md bg-warning text-white float-start back mt-2 rounded-3">Back</button>
                                        <button type="button" style="font-size:12px;" class="btn btn-md text-white float-end  mt-2 rounded-3 bg-color-info confirm" id="Next3">Next</button>
                                        <!-- /NEXT BUTTON-->
                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->
                                <!-- row -->
                                <div class="row justify-content-center form-business">
                                    <!-- col -->
                                    <div class="col-lg-10 col-md-8">
                                        <h5 class="fw-light-bold">Select Topic and Sub-Topic</h5>
                                        <p class="small pb-3">Please select Term, Topic (optional) and Sub-Topic(optional)</p>
                                        <!-- cards -->
                                        <div class="row g-4 pb-5 border-bottom">
                                            <div class="col">
                                                <form id="edit-profile-form">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Term <span style="color:red;">*</span></label>
                                                                <select class="form-control select pro" id="term">
                                                                    <option value="0">Select Term</option>
                                                                    <option value="First">First</option>
                                                                    <option value="Second">Second</option>
                                                                    <option value="Third">Third</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Topic (optional)</label>
                                                                <select class="form-control select pro" id="topic">
                                                                    <option value="">Please Select Topic </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Sub-Topic (optional)</label>
                                                                <select class="form-control select pro" id="sub-topic">
                                                                    <option value="">Please Select Sub-Topic </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-12 col-sm-8">
                                                            <figure class="text-left">
                                                                <figcaption class="blockquote-footer">
                                                                    If Topic is not available Click <a class="text-primary" style="cursor: pointer;"><cite title="Source Title"> here </cite></a> to Add Topic
                                                                </figcaption>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /cards -->
                                        <!-- NEXT BUTTON-->
                                        <button type="button" style="font-size:12px;" class="btn btn-md bg-warning text-white float-start back mt-2 rounded-3">Back</button>
                                        <button type="button" style="font-size:12px;" class="btn btn-md text-white float-end  mt-2 rounded-3 bg-color-info confirm" id="Next4">Next</button>
                                        <!-- /NEXT BUTTON-->
                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->
                                <!-- row -->
                                <div class="row justify-content-center form-business">
                                    <!-- col -->
                                    <div class="col-lg-10 col-md-8">
                                        <h5 class="fw-light-bold">Add Question</h5>
                                        <p class="small pb-3">Please add at least one question</p>
                                        <button type="button" class="btn btn-md bg-secondary fw-light text-white small float-end rounded-0 import" id="import" data-bs-toggle="modal" data-bs-target="#importQuestion" style="font-size:12px;"><i class="fa fa-download"></i> Import Questions</button>
                                        <!-- cards -->
                                        <form id="edit-profile-form">
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <div class="form-group local-forms">
                                                        <label>Select Question Type <span style="color:red;">*</span></label>
                                                        <select class="form-control select pro" id="types">
                                                            <option value="0">Select Type</option>
                                                            <option value="Objective">Objective</option>
                                                            <option value="Theory">Theory</option>
                                                            <!-- <option value="Blank">Fill in the Blank Space</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="form-group local-forms" id="cat">
                                                        <label>Select Question Category <span style="color:red;">*</span></label>
                                                        <select class="form-control select pro" id="category">
                                                            <option value="0">Select Category</option>
                                                            <option value="Assesement">Assesement</option> 
                                                            <option value="Practice">Practice</option>  
                                                            <!-- <option value="Blank">Fill in the Blank Space</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row g-4 pb-5 border-bottom types1">
                                            <div class="col-sm-10 col-md-12">
                                                <form class="form" id="all-form">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-8 col-lg-10">
                                                            <div class="card border-0">
                                                                <h5 class="fw-light-bold">Question 1</h5>
                                                                <p class="fw-light-bold">Please Input Question</p>
                                                                <span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span>
                                                                <textarea class ="tinymce example question" id="question1"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3 row">
                                                        <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option A:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                                        <div class="col-sm-6 col-sm-6 col-lg-6">
                                                        <textarea class = "tinymce example optionA" id="optionA"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3 row">
                                                        <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option B:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <textarea class ="tinymce example optionB" id="optionB"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3 row">
                                                        <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option C:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                                        <div class="col-sm-6 col-md-6">
                                                        <textarea class ="tinymce example optionC" id="optionC"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  mt-3 row">
                                                        <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option D:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <textarea class ="tinymce example optionD" id="optionD"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  mt-3 row">
                                                        <label for="example-month-input" style="font-size: 12px;" class="col-sm-4 col-md-2 col-form-label">Select Correct option</label>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <select class="select form-control" id="inlineFormCustomSelect">
                                                                <option selected="" disabled>Select correct option</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                                <option value="D">D</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="formy" id="form">
                                            </div>
                                            <div class="col-md-2 align-self-center" style="float:right;">
                                                <a href="javascript:;" id="add"><i class="fa fa-plus"></i>Add Question</a>
                                            </div>
                                        </div>

                                        <div class="row g-4 pb-5 border-bottom types2">
                                            <div class="col-sm-10 col-md-12" id="question">
                                                <form class="form" id="all-form">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-8 col-lg-10">
                                                            <div class="card border-0">
                                                                <h5 class="fw-light-bold">Question 1</h5>
                                                                <p class="fw-light-bold">Please Input Question</p>
                                                                <textarea class ="example question2" id="tari" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="formy2" id="form2">
                                            </div>
                                            <div class="col-md-2 align-self-center" style="float:right;">
                                                <a href="javascript:;" id="add2"><i class="fa fa-plus"></i> Add Question</a>
                                            </div>
                                        </div>
                                        <!-- /cards -->
                                        <!-- NEXT BUTTON-->
                                        <button type="button" style="font-size:12px;" class="btn btn-md btn-warning text-white float-start back mt-2 rounded-3">Back</button>
                                        <button type="button" style="font-size:12px;" id="previewQ2" class="btn btn-md text-white float-end  mt-2 rounded-3 bg-color-info previewQ2">Preview</button>
                                        <!-- /NEXT BUTTON-->
                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->
                                <!-- row -->
                            </div>
                            <!-- /main content -->
                        </section>
                    <!-- /section -->
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <!--Template  Modal -->
    <div class="modal fade importQuestion" id="importQuestion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="importQuestionLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-keyboard="false" style="font-size:12px;" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <!-- col -->
                        <div class="col-lg-11 col-md-10 col-sm-12">
                            <h5 class="fw-bold fs-5" style="color:#0066FF;">EduMESS</h5> <h7 class="fw-light-bold">Question Bank</h7>
                            <p class="small pb-3">Please filter and add question</p>
                            <div class="col-sm-2 float-end searchbtn">
                                <button type="button" class="btn btn-md bg-primary fw-light text-white small float-end rounded-5 search_question" id="search_question" style="font-size:12px;"><i class="fa fa-search"></i> Search</button>
                            </div>
                            <!-- cards -->
                            <div class="col">
                                <form id="edit-profile-form">
                                    <div class="row">
                                        <div class="col-12 col-sm-2">
                                            <div class="form-group local-forms">
                                                <label>Class</label>
                                                <select class="form-control select pro" id="filter_class">

                                                <?php
                                                    $deafult_class = mysqli_query($link, "SELECT * FROM `classtemplate` ORDER BY `ClassTemplateName` ASC");
                                                    $default_fetch = mysqli_fetch_assoc( $deafult_class);
                                                    $default_row = mysqli_num_rows($deafult_class);

                                                    if($default_row > 1){
                                                        echo '<option value="NULL">Select Class</option>';

                                                        do{
                                                            echo $classID = $default_fetch['ClassTemplateID'];
                                                            $className = $default_fetch['ClassTemplateName'];
                                                            $classTitle = $default_fetch['TemplateTitle'];

                                                            echo '<option data-id="'.$classID.'" value="'.$classTitle.'">'.$className.'</option>';

                                                        }while( $default_fetch = mysqli_fetch_assoc( $deafult_class));
                                                    }
                                                ?>
                                               
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <div class="form-group local-forms filter_subject" >
                                                <label>Subject</label>
                                                <select class="form-control select pro" id="filter_subject">
                                                    <option value="NULL">Select Subject </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <div class="form-group local-forms filter_region">
                                                <label>Region</label>
                                                <select class="form-control select pro" id="filter_region">
                                                    <option value="NULL">Select Region</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms filter_topic">
                                                <label>Topic (optional)</label>
                                                <select class="form-control select pro" id="filter_topic">
                                                    <option value="NULL">Select Topic</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms filter_sub_topic">
                                                <label>Sub-Topic (optional)</label>
                                                <select class="form-control select pro" id="filter_sub_topic">
                                                    <option value="NULL">Select Sub-Topic </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div id="output">
                                    <img src="search.png" class="img-fluid mx-auto d-block" alt="...">
                                    <figure class="text-center">
                                        <blockquote class="blockquote">
                                            <p>Hey, Please Filter Class, Subject and Region</p>
                                        </blockquote>
                                        <figcaption class="blockquote-footer">
                                        Click <a href="#"><cite title="Source Title"> here </cite></a> to add Class
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- /cards -->
                            
                        </div>
                        <!-- /col -->
                    </div>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal">Close</button>
                    <button type="button" style="font-size: 12px;" id="previewQ" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info preview">Preview</button>
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>



   
    <!--Preview  Modal -->
    <div class="modal fade previewQuestion" id="previewQuestion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="previewQuestionLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-keyboard="false" style="font-size:12px;" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <!-- col -->
                        <div class="col-lg-11 col-md-10 col-sm-12">
                            <h5 class="fw-bold fs-5" style="color:#0066FF;">EduMESS</h5> <h7 class="fw-light-bold">Question Bank</h7>
                            <p class="small pb-3">Viwe All Questions</p>
                            
                            <div class="row" id="show">
                                
                            </div>
                            <!-- /cards -->
                            
                        </div>
                        <!-- /col -->
                    </div>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal" id="backButton">Close</button>
                    <button type="button" style="font-size: 12px;" id="importQ" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Import</button>
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>



   
     <!--Preview  Modal 2 -->
     <div class="modal fade previewQuestion2" id="previewQuestion2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="previewQuestion2Label" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-keyboard="false" style="font-size:12px;" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <!-- col -->
                        <div class="col-lg-11 col-md-10 col-sm-12">

                            <h5 class="fw-bold fs-5" style="color:#0066FF;">Preview All Questions</h5> <h7 class="fw-light-bold"></h7>
                            <p class="small pb-3">Please Kindly Check Your Questions</p>
                            
                            <div class="row" id="show2">
                                
                            </div>
                            <!-- /cards -->
                            
                        </div>
                        <!-- /col -->
                    </div>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal" id="backButton">Close</button>
                    <button type="button" style="font-size: 12px;" id="submitQ" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Submit</button>
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>

    <!-- Comfimation Modal -->
    <div class="modal fade" id="comfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="comfirmLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- <div class="modal-header ">
                    <h5 class="modal-title" id="comfirmLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                    <img src="congratulations.png" width="150" class="img-fluid mx-auto d-block mt-3" alt="...">
                    <figure class="text-center">
                        <blockquote class="blockquote fw-light" style="font-size: 16px;">
                        <p>Congratulaions You have Successfully Added Question to your Bank</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                         <!-- <a href="#"><cite title="Source Title"> here </cite></a> -->
                       Please Click on Proceed to View Questions Added
                        </figcaption>
                    </figure>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->
                    <!-- <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal">Exit</button> -->
                    <button type="button" style="font-size: 12px;" id="finish" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Proceed</button>
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>




    <!-- Create Question Modal Direct-->
    <div class="modal fade" id="createQuestionDirect" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="createQuestionDirectLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-primary"><i class="fa fa-question " id=""> </i> Add Questions
                    </h5>
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- section -->
                        <section>
                            <!-- main content -->
                            <div class="main-content">

                                <!-- row -->
                                <div class="card border-0 shadow justify-content-center mb-4">
                                    <h5 class="p-4">Select Campus</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="row p-4 justify-content-center" id="display_campus">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->

                                <!-- row -->
                                <div class="row mb-4" id="section_subject_card">
                                    <div class="col-lg-12">
                                        <div class="card border-0 shadow justify-content-center">
                                            <h5 class="p-4">Select Section and class</h5>
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-md-12">
                                                    <div class="row p-3">
                                                        <div class="col-lg-4">
                                                            <div class="form-group local-forms" id="section_direct">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="card p-2 border-0 shadow" id="subject_direct">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->

                                <!-- row -->
                                <div class="row mb-4" id="term_topic_card">
                                    <div class="col-lg-12">
                                        <div class="card border-0 shadow justify-content-center">
                                            <h5 class="p-4">Select Term and Topic</h5>
                                            <div class="row p-4">
                                                <div class="col-lg-12 col-sm-12 col-md-12">
                                                    <div class="row">




                                                    <div class="col-lg-4">
                                                            <div class="form-group local-forms ">
                                                                <label>Term</label>
                                                                <select class="form-control question_card select pro" id="prosterm2">
                                                                    <!-- <option value="NULL">Select Term</option>
                                                                    <option value="First">First</option>
                                                                    <option value="Second">Second</option>
                                                                    <option value="Third">Third</option> -->
                                                                </select>
                                                            </div>
                                                        </div>


                                                    <div class="col-lg-4">
                                                            <div class="form-group local-forms ">
                                                                <label>Subject</label>
                                                                <select class="form-control question_card select pro" id="prosloadsubjectforcreatequestion">
                                                                    <option value="NULL">Select Subject</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>

                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group local-forms ">
                                                                <label>Topic (optional)</label>
                                                                <select class="form-control question_card select pro" id="topic2">
                                                                    <option value="NULL">Please Select Topic </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group local-forms ">
                                                                <label>Sub-Topic (optional)</label>
                                                                <select class="form-control question_card select pro" id="sub-topic2">
                                                                    <option value="NULL">Please Select Sub-Topic </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 NextSectionClass">
                                                            <div class="form-group local-forms ">
                                                                <button class="btn btn-primary text-small fw-light" type="button" id="NextSectionClass">Proceed <span class="fa fa-arrow-right"></span> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->

                                 <!-- row -->
                                 <!-- <div class="row mb-4" id="class_card">
                                    <div class="col-lg-12">
                                        <div class="card border-0 shadow justify-content-center">
                                            <h5 class="p-4">Select Classes</h5>
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-md-12">
                                                    <div class="row p-4">
                                                        <div class="card p-4 border-0 shadow" id="class_card_display">
                                             
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- /row -->

                                <!-- row -->
                                <!-- <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="card border-0 shadow justify-content-center">
                                            <h5 class="p-4">Select Question Type and Question Category</h5>
                                            <div class="row p-4">
                                                <div class="col-lg-12 col-sm-12 col-md-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group local-forms ">
                                                                <label>Question Type</label>
                                                                <select class="form-control question_card select pro" id="topic">
                                                                    <option value="">Please Select Question Type</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group local-forms ">
                                                                <label>Question Category</label>
                                                                <select class="form-control question_card select pro" id="topic">
                                                                    <option value="">Please Select Question Category </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                       
                                    </div>
                                </div> -->
                                <!-- /row -->

                                <!-- row -->
                                <!-- <div class="row mb-4" id="submit_card">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary fw-light exampleModalToggle" data-bs-toggle="modal" href="#exampleModalToggle" type="button" id="add_direct">Add Questions</button>
                                        
                                    </div>
                                </div> -->
                                <!-- /row -->
                             
                            </div>
                            <!-- /main content -->
                        </section>
                    <!-- /section -->
                </div>
               
            </div>
        </div>
    </div>
    
    <!-- Question Direct Modal -->
    <div class="modal fade" id="exampleModalToggle" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered  modal-fullscreen">
            <div class="modal-content">

            <div class="modal-body">
                    <!-- main content -->
                    <div class="main-content">
                        <!-- row -->
                        <div class="row justify-content-center">
                            <!-- col -->
                            <div class="col-lg-10 col-md-8">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="fw-light-bold">Add Question</h5>
                                        <p class="small pb-3">Please add at least one question</p>
                                    </div>
                                </div>
                                <!-- cards -->
                                <form id="edit-profile-form">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-group local-forms">
                                                <label>Select Question Type <span style="color:red;">*</span></label>
                                                <select class="form-control select pro" id="types_direct">
                                                    <option value="0" selected>Select Type</option>
                                                    <option value="Objective">Objective</option>
                                                    <option value="Theory">Theory</option>
                                                    <!-- <option value="Blank">Fill in the Blank Space</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-group local-forms" id="Catty">
                                                <label>Select Question Category <span style="color:red;">*</span></label>
                                                <select class="form-control select pro" id="category_direct">
                                                    <option value="0">Select Category</option>
                                                    <option value="Assesement">Assesement</option> 
                                                    <option value="Practice">Practice</option>  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <button type="button" class="btn btn-md bg-warning fw-light text-white small float-end rounded-0 import_direct" id="prosimport_directbulk" data-bs-toggle="modal" data-bs-target="#prosloadbulkuploadquestioncontent" style="font-size:12px;"><i class="fa fa-download"></i> Bulk Upload</button>&nbsp;&nbsp;&nbsp;

                                            <button type="button" class="btn btn-md bg-secondary fw-light text-white small float-end rounded-0 import_direct" id="import_direct" data-bs-toggle="modal" data-bs-target="#importQuestion_direct" style="font-size:12px;"><i class="fa fa-download"></i> Import Questions</button>
                                        </div>
                                    </div>
                                </form>
                                
                                <div class="row g-4 pb-5 border-bottom" id="objective_direct" style="display:none;">
                                    <div class="col-sm-10 col-md-12">
                                        <form class="form" id="all-form">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-8 col-lg-10">
                                                    <div class="card border-0">
                                                        <h5 class="fw-light-bold">Question 1</h5>
                                                        <p class="fw-light-bold">Please Input Question</p>
                                                        <span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span>
                                                        <textarea class ="tinymce example question_direct" id="question1_direct"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-3 row">
                                                <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option A:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                                <div class="col-sm-6 col-sm-6 col-lg-6">
                                                <textarea class = "tinymce example optionA_direct" id="optionA_direct"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group mt-3 row">
                                                <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option B:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                <textarea class ="tinymce example optionB_direct" id="optionB_direct"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group mt-3 row">
                                                <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option C:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                                <div class="col-sm-6 col-md-6">
                                                <textarea class ="tinymce example optionC_direct" id="optionC_direct"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group  mt-3 row">
                                                <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option D:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                <textarea class ="tinymce example optionD_direct" id="optionD_direct"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group  mt-3 row">
                                                <label for="example-month-input" style="font-size: 12px;" class="col-sm-4 col-md-2 col-form-label">Select Correct option</label>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <select class="select form-control" id="inlineFormCustomSelect_direct">
                                                        <option selected="" disabled>Select correct option</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="prosformyobjqquestioncontent" id="formmy">
                                    </div>
                                    <div class="col-md-2 align-self-center" style="float:right;">
                                        <a href="javascript:;" id="prosadd_objective_question_btn"><i class="fa fa-plus"></i>Add Question</a>
                                    </div>
                                </div>
                                <div class="row g-4 pb-5 border-bottom" id="theory_direct" style="display:none;">
                                    <div class="col-sm-10 col-md-12">
                                        <form class="form" id="all-form2">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-8 col-lg-10">
                                                    <div class="card border-0">
                                                        <h5 class="fw-light-bold">Question 1</h5>
                                                        <p class="fw-light-bold">Please Input Question</p>
                                                        <textarea class ="example question22_direct" id="tari_direct" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="prosformytheoryqquestioncontent" id="formmy2">
                                    </div>
                                    <div class="col-md-2 align-self-center" style="float:right;">
                                        <a href="javascript:;" id="addy2"><i class="fa fa-plus"></i> Add Question</a>
                                    </div>
                                </div>
                                <!-- /cards -->
                            </div>
                            <!-- /col -->
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <!-- NEXT BUTTON-->
                <button type="button" style="font-size:12px;"  data-bs-dismiss="modal" class="btn btn-md btn-warning text-white float-start mt-2 rounded-3">Back</button>
                <!-- /NEXT BUTTON-->
                <button class="btn btn-md text-white float-end  mt-2 rounded-3 bg-color-info" style="font-size:12px;"   id="previewQ2_direct">Preview</button>
            </div>
            </div>
        </div>
    </div>
   
 
     <!-- Question Preview Direct Modal -->
    <div class="modal fade" id="exampleModalToggle2" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-keyboard="false" style="font-size:12px;" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <!-- col -->
                        <div class="col-lg-11 col-md-10 col-sm-12">
                            <h5 class="fw-bold fs-5" style="color:#0066FF;">Preview All Questions</h5> <h7 class="fw-light-bold"></h7>
                            <p class="small pb-3">Please Kindly Check Your Questions</p>
                            
                            <div class="row" id="show2_direct">
                                
                            </div>
                            <!-- /cards -->
                            
                        </div>
                        <!-- /col -->
                    </div>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal" id="backButton_direct">Close</button>
                    <button type="button" style="font-size: 12px;" id="submitQ_direct" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Submit</button>
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>
   

 
     <!--Template  Modal Direct-->
     <div class="modal fade importQuestion_direct" id="importQuestion_direct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="importQuestion_directLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-keyboard="false" style="font-size:12px;" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <!-- col -->
                        <div class="col-lg-11 col-md-10 col-sm-12">
                            <h5 class="fw-bold fs-5" style="color:#0066FF;">EduMESS</h5> <h7 class="fw-light-bold">Question Bank</h7>
                            <p class="small pb-3">Please filter and add question</p>
                            <div class="col-sm-2 float-end searchbtn_direct">
                                <button type="button" class="btn btn-md bg-primary fw-light text-white small float-end rounded-5 search_question_direct" id="search_question_direct" style="font-size:12px;"><i class="fa fa-question"></i> Load Questions</button>
                            </div>
                            <!-- cards -->
                            <div class="col">
                                <form id="edit-profile-form">
                                    <div class="row">
                                        <div class="col-12 col-sm-2">
                                            <div class="form-group local-forms">
                                                <label>Class</label>
                                                <select class="form-control select pro" id="filter_class_direct">
                                                <?php
                                                    $deafult_class = mysqli_query($link, "SELECT * FROM `classtemplate` ORDER BY `ClassTemplateName` ASC");
                                                    $default_fetch = mysqli_fetch_assoc( $deafult_class);
                                                    $default_row = mysqli_num_rows($deafult_class);

                                                    if($default_row > 1){
                                                        echo '<option value="NULL">Select Class</option>';

                                                        do{
                                                             $classID = $default_fetch['ClassTemplateID'];
                                                            $className = $default_fetch['ClassTemplateName'];
                                                           

                                                            echo '<option data-id="'.$classID.'" value="'. $classID .'">'.$className.'</option>';

                                                        }while( $default_fetch = mysqli_fetch_assoc( $deafult_class));
                                                    }
                                                ?>
                                               
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <div class="form-group local-forms filter_subject_direct" >
                                                <label>Subject</label>
                                                <select class="form-control select pro" id="filter_subject_direct">
                                                    <option value="NULL">Select Subject </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <div class="form-group local-forms filter_region_direct">
                                                <label>Region</label>
                                                <select class="form-control select pro" id="filter_region_direct">
                                                    <option value="NULL">Select Region</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms filter_topic_direct">
                                                <label>Topic (optional)</label>
                                                <select class="form-control select pro" id="filter_topic_direct">
                                                    <option value="NULL">Select Topic</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms filter_sub_topic_direct">
                                                <label>Sub-Topic (optional)</label>
                                                <select class="form-control select pro" id="filter_sub_topic_direct">
                                                    <option value="NULL">Select Sub-Topic </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div id="output_direct">
                                    <img src="search.png" class="img-fluid mx-auto d-block" alt="...">
                                    <figure class="text-center">
                                        <blockquote class="blockquote">
                                        <p>Hey, Please Filter Class, Subject and Region</p>
                                        
                                        </blockquote>
                                        <!-- <figcaption class="blockquote-footer">
                                        Click <a href="#"><cite title="Source Title"> here </cite></a> to add Class
                                        </figcaption> -->
                                    </figure>
                                </div>
                            </div>
                            <!-- /cards -->
                            
                        </div>
                        <!-- /col -->
                    </div>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->

                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal">Close</button>
                    <button type="button" style="font-size: 12px;" id="pros-previewQ_direct_forimport_btn" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info preview">Preview</button>
                    
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>
   
    <!--Preview  Modal Direct-->
    <div class="modal fade previewQuestion_direct" id="previewQuestion_direct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="previewQuestion_directLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-keyboard="false" style="font-size:12px;" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <!-- col -->
                        <div class="col-lg-11 col-md-10 col-sm-12">
                            <h5 class="fw-bold fs-5" style="color:#0066FF;">EduMESS</h5> <h7 class="fw-light-bold">Question Bank</h7>
                            <p class="small pb-3">Viwe All Questions</p>
                            
                            <div class="row" id="prosshow_directtemplate_insert">
                                
                            </div>
                            <!-- /cards -->
                            
                        </div>
                        <!-- /col -->
                    </div>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal" id="backButton_direct">Close</button>
                    <button type="button" style="font-size: 12px;" id="importQ_direct" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Import</button>
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Question Modal Direct-->
    <div class="modal fade" id="edit_question_direct" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="edit_question_directLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center p-5" id="objective_edit_direct">
                        <form class="form" id="all-form">
                            <div id = "load_question">
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-8 col-lg-10">
                                    <div class="card border-0">
                                        <h5 class="fw-light-bold">Question </h5>
                                        <p class="fw-light-bold">Please Edit Question</p>
                                        <span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span>
                                        <textarea class ="tinymce example question1" id="question_edit"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3 row">
                                <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option A:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                <div class="col-md-8 col-sm-12 col-lg-6">
                                <textarea class = "tinymce example optionA1" id="optionA_edit"></textarea>
                                </div>
                            </div>
                            <div class="form-group mt-3 row">
                                <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option B:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                <div class="col-md-8 col-sm-12 col-lg-6">
                                <textarea class ="tinymce example optionB1" id="optionB_edit"></textarea>
                                </div>
                            </div>
                            <div class="form-group mt-3 row">
                                <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option C:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                <div class="col-md-8 col-sm-12 col-lg-6">
                                <textarea class ="tinymce example optionC1" id="optionC_edit"></textarea>
                                </div>
                            </div>
                            <div class="form-group  mt-3 row">
                                <label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option D:<br><span style="color:orangered;"><small>Please use the <b>Ctrl+V</b> keyboard shortcut to paste</small></span></label>
                                <div class="col-md-8 col-sm-12 col-lg-6">
                                <textarea class ="tinymce example optionD1" id="optionD_edit"></textarea>
                                </div>
                            </div>
                            <div class="form-group  mt-3 row">
                                <label for="example-month-input" style="font-size: 12px;" class="col-sm-4 col-md-2 col-form-label">Select Correct option</label>
                                <div class="col-sm-12 col-md-8 col-lg-6">
                                    <select class="select form-control" id="inlineFormCustomSelect_selected">
                                        <option selected="" disabled>Select correct option</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row justify-content-center p-5" id="theory_edit_direct">
                        <form class="form">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-8 col-lg-10">
                                    <div class="card border-0">
                                        <h5 class="fw-light-bold">Question 1</h5>
                                        <p class="fw-light-bold">Please Input Question</p>
                                        <textarea class ="tinymce example question29_direct" id="tari_direct2" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal">Close</button>
                    <button type="button" style="font-size: 12px;" id="Update_question_direct" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Update Question</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Delete Question Modal Direct-->
     <div class="modal fade" id="delete_question_direct" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="delete_question_directLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <input type="hidden" id="prosloaddeletequestioncontent">
                        <input type="hidden" id="prosloadcampusfordeletecontenthere">
                        
                    <div class="text-center">
                              <?php

                                        $prosloaddefaultimages = mysqli_query($link,"SELECT * FROM `defaultimages` WHERE `ImageName`='prostrashimage'");
                                        $prosloaddefaultimagescnt  = mysqli_num_rows($prosloaddefaultimages);
                                        $prosloaddefaultimagescntrow = mysqli_fetch_assoc($prosloaddefaultimages); 



                                        if($prosloaddefaultimagescnt > 0)
                                        {
                                                   
                                            
                                            $deleteimagecontent = $prosloaddefaultimagescntrow['BaseSixtyFour'];

                                              echo '<img src="'.$deleteimagecontent.'">';
                                        }else
                                        {

                                        }


                              ?>
						<!-- <i class="fa fa-trash"></i> -->
					</div>						
					<h4 class="modal-title w-100 text-center">Are you sure?</h4>
                    <p class="text-center">Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="font-size: 12px;">Cancel</button>
                    <button type="button" class="btn btn-danger btn-sm prossubmitdeletequestionfinal_btn" style="font-size: 12px;">Delete</button>
				</div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>






     <!-- Delete Question Modal Direct-->
     <div class="modal fade" id="delete_question_directall" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="delete_question_directallLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                     
                        
                    <div class="text-center">
                              <?php

                                        $prosloaddefaultimages = mysqli_query($link,"SELECT * FROM `defaultimages` WHERE `ImageName`='prostrashimage'");
                                        $prosloaddefaultimagescnt  = mysqli_num_rows($prosloaddefaultimages);
                                        $prosloaddefaultimagescntrow = mysqli_fetch_assoc($prosloaddefaultimages); 



                                        if($prosloaddefaultimagescnt > 0)
                                        {
                                                   
                                            
                                            $deleteimagecontent = $prosloaddefaultimagescntrow['BaseSixtyFour'];

                                              echo '<img src="'.$deleteimagecontent.'">';
                                        }else
                                        {

                                        }


                              ?>
						<!-- <i class="fa fa-trash"></i> -->
					</div>						
					<h4 class="modal-title w-100 text-center">Are you sure?</h4>
                    <p class="text-center">Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="font-size: 12px;">Cancel</button>
                    <button type="button" class="btn btn-danger btn-sm prossubmitdeletequestionfinalall_btn" style="font-size: 12px;">Delete</button>
				</div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>



    

    <!-- abba_show_result_bulk_upload_modal-->
    <div class="modal fade" id="prosloadbulkuploadquestioncontent" tabindex="-1"
        aria-labelledby="prosloadbulkuploadquestioncontentLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bulk Upload</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12" style="border-right:1px solid lightgrey;">
                            <div class="row">
                                <div class="col-lg-12" align="center">
                                    <div class="alert alert-info errormsg" role="alert">
                                        <small>Kindly click on the Download button below to download the question sheet <b>"<i class="fas fa-download"
                                                    style="font-size:12px;"> Click to download Question format</i>"</b> 
                                          </small>
                                    </div>
                                    <a href="../../downloads/question.csv" type="button"  class="btn btn-sm mt-2 rounded-3 btn-outline-primary downloadbtn-question-list " style="width:80%;"><i class="fas fa-download" style="font-size:12px;"> Click to download</i></a>
                                </div>
                            </div>

                           
                        </div>

                        <div class="col-12">
                            <div class="row mt-3 p-3">
                                <div class="col-lg-12 shadow" align="center"
                                    style="height:25vh;display: flex; justify-content: center; align-items: center; margin: 0;background-color:#cfe6fc;border-radius:10px;">
                                    <input type="file" name="file-new[]" id="file-new"
                                        class="abba-inputfile-4 prosloadfileforquestionupload" style="display:none;" />
                                    <label for="file-new">
                                        <i class="fas fa-upload fa-2x icon-color"></i><br>
                                        <span style="font-size:12px;">Click on me to choose a file</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal"><i
                            class="fa fa-times" style="font-size:14px;"> Close</i></button>

                    <button type="button" class="btn btn-primary btn-md pros_proceed_to_upload_question_btn"><i
                            class="fas fa-cloud-upload-alt" style="font-size:14px;"> Upload</i></button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    <!-- =======MAIN CBT SETTINGS======== -->


     <!-- Assesement Settings Modal -->
     <div class="modal fade tari_settings_modal" id="tari_settings_modal" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="tari_settings_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header border-0">
                    <h5 class="modal-title text-primary"><i class="fa fa-cog " id=""> </i> Assesement Settings
                    </h5>
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row p-3" id="section_1">

                        <form id="question_settings_form">

                            <div class="row">

                                <div class="col-12 col-sm-4 col-lg-10">
                                    <div class="form-group local-forms">
                                        <label> Select Campus <span style="color:red;">*</span></label>
                                        <select class="form-control select1 pro" id="tari_settings_campus">
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-5">
                                    <div class="form-group local-forms">
                                        <label>Session <span style="color:red;">*</span></label>
                                        <select class="form-control select1 pro" id="tari_settings_session">

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
                                                echo '<option value="NULL">No Records Found</option>';
                                            }

                                            ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-lg-5">
                                    <div class="form-group local-forms">
                                        <label>Term <span style="color:red;">*</span></label>
                                        <select class="form-control select1 pro" id="tari_settings_term">


                                            <option value="NULL">Select Term</option>
                                            <!-- <option value="First">First</option>
                                            <option value="Second">Second</option>
                                            <option value="Third">Third</option> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-5">
                                    <div class="form-group local-forms">
                                        <label>Section <span style="color:red;">*</span></label>
                                        <select class="form-control select1 pro" id="tari_settings_section">
                                             <option value="NULL">Select Section</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 NextSectionClass">
                                    <div class="form-group local-forms ">
                                        <button class="btn btn-primary text-small fw-light" style="font-size:12px" type="button" id="tari_settings_NextSectionClass">Proceed<span class="fa fa-arrow-right"></span> </button>
                                    </div>
                                </div>
                                
                            </div>

                           
                               
                            </div>

                            <div id="hide_section_2_settings">

                                <div class="row mb-5">
                                    <div class="col-12 col-sm-12 col-lg-12">
                                        <div class="card border-0 shadow">
                                            <div class="card-text">

                                                   <p class="p-2" style="font-size:14px;"> Select Class <span style="color:red;">*</span></p>

                                                    <span class="d-flex p-3" id="displaysmgsunny" style="font-size:12px;">
                                                        <div>
                                                            
                                                        </div>
                                                        <!-- <div class="collapse" id="collapseExample"> -->
                                                            <div class="card card-body alert alert-primary" role="alert">

                                                            <i class="fa fa-info-circle text-primary fs-4" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>

                                                                Please Note: 
                                                                Once the assessment is created, and the classes are selected, 
                                                                the system applies the same assessment settings and questions to all the chosen classes
                                                                
                                                            </div>
                                                        <!-- </div> -->
                                                    </span>
                                                <fieldset class="tari_checkbox-group" id="tari_settings_class">
                                                   
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>

                          <div id="proshidesettingsfinal" style="display: none;">

                                 <div class="row">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <div class="form-group local-forms">
                                        <label>Subject <span style="color:red;">*</span></label>
                                        <select class="form-control select1 pro" id="tari_settings_subject">
                                            <option value="0">Please Select Subject</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                           

                            <div class="row">

                              <div class="col-lg-4">

                                    <div class="form-group local-forms ">
                                        <label>Select what campus to use question from</label>
                                        <select class="form-control question_card select11 pro" id="pros_campustousequestion_settings">
                                            <option value="NULL">Select Campus</option>

                                        </select>
                                    </div>
                                </div>

                               


                                <div class="col-lg-4">
                                    <div class="form-group local-forms ">
                                        <label>Topic (optional)</label>
                                        <select class="form-control question_card select11 pro" id="tari_settings_topic2">
                                            <option value="NULL">Please Select Topic </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group local-forms ">
                                        <label>Sub-Topic (optional)</label>
                                        <select class="form-control question_card select11 pro" id="tari_settings_sub_topic2">
                                            <option value="NULL">Please Select Sub-Topic </option>
                                        </select>
                                    </div>
                                </div>

                             
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group local-forms">
                                            <label>Assesement Title <span style="color:red;">*</span></label>
                                            <input class="form-control settings_sec_2" type="text" placeholder="Enter Assesement Title" id="tari_settings_title">
                                        </div>
                                    </div>    
                            

                              
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group local-forms">
                                            <label>Assesement Type <span style="color:red;">*</span></label>
                                            <select class="form-control settings_sec_2 pro" id="tari_settings_type">
                                                <option value="NULL">Please Select Assesement Type</option>
                                                <option value="Assesement">Assesement</option>
                                                <option value="Practice">Practice </option>
                                                <option value="Admission">Admission</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group local-forms">
                                            <label>Assesement Category <span style="color:red;">*</span></label>
                                            <select class="form-control settings_sec_2 pro" id="tari_settings_category">
                                                <option value="NULL">Please Select Assesement Category</option>
                                                <option value="Objective">Objective</option>
                                                <option value="Theory">Theory </option>
                                                <option value="Both">Both (Theory & Objective)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="col-12 col-sm-4 col-lg-3">
                                        <div class="form-group local-forms">
                                            <label>Assesement Purpose <span style="color:red;">*</span></label>
                                            <select class="form-control settings_sec_2 pro" id="pros_settingspurpose">
                                                <option value="NULL">Please Select Assesement Purpose</option>
                                                <option value="Admission">Admission</option>
                                                <option value="Normal">Normal(Exam, Assesement and Practice) </option>
                                               
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group local-forms">
                                            <label>Assesement Date <span style="color:red;">*</span></label>
                                            <input class="form-control settings_sec_2" type="date" placeholder="Enter Assesement Title" id="tari_settings_date">
                                        </div>
                                    </div>
                              
                              
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group local-forms">
                                            <label>Assesement Start Time <span style="color:red;">*</span></label>
                                            <input class="form-control settings_sec_2" type="time" placeholder="Enter Time" id="tari_settings_time_in">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-4">
                                        <div class="form-group local-forms">
                                            <label>Assesement End Time <span style="color:red;">*</span></label>
                                            <input class="form-control settings_sec_2" type="time" placeholder="Enter Time" id="tari_settings_time_out">
                                        </div>
                                    </div>                                              
                               

                                <div class="row">
                                    <p class="align-middle" style="font-size: 14px;">Would You like the System to set Questions Automatically? <span style="color:red;">*</span></p>
                                    <form class="form">
                                        <div class="switch-field">
                                            <input type="radio" id="radio-one" name="switch-one" value="1" />
                                            <label for="radio-one">Yes</label>
                                            <input type="radio" id="radio-two" name="switch-one" value="0" checked/>
                                            <label for="radio-two">No</label>
                                        </div>
                                    </form>
                                </div>

                                <div class="row" id= "question_number_hide">
                                    <div class="col-12 col-sm-4 col-lg-6">
                                        <p class="align-middle" style="font-size: 14px;">How Many Questions Would You like Us to Set? <span style="color:red;">*</span></p>
                                        <div class="form-group local-forms col-lg-6">
                                        <input class="form-control" type="number" placeholder="Enter the Number of Questions" id="question_Number_for_settings">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <p class="align-middle" style="font-size: 14px;">Do you want to Shuffle the questions? <span style="color:red;">*</span></p>
                                    <form class="form">
                                        <div class="switch-field">
                                            <input type="radio" id="radio-one1" name="switch-two" value="1" />
                                            <label for="radio-one1">Yes</label>
                                            <input type="radio" id="radio-two1" name="switch-two" value="0" checked/>
                                            <label for="radio-two1">No</label>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
              
                <div class="modal-footer">
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal">Close</button>
                    <button type="button" style="font-size: 12px;" id="add_question_settings_btn" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Add Question</button>
                </div>
            </div>
        </div>
    </div>
 <!-- =======MAIN CBT SETTINGS======== -->










   <!--Question Bank Settings Modal -->
   <div class="modal fade QuestionBankModal" id="QuestionBankModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="importQuestionLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <h5 class="modal-title text-primary"><i class="fa fa-question" id=""> </i> Question Bank
                    </h5>
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-keyboard="false" style="font-size:12px;" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <!-- col -->
                        <div class="col-lg-11 col-md-10 col-sm-12">

                        <div class="row">
                            <div class="col-sm-2 col-lg-4 searchbtn mb-4">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></span>
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        </div>
                   
                        <div class="row" id="load_questions">
                                 
                        </div>
                     
                            
                        </div>
                        <!-- /col -->
                    </div>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start"  id="back_to_settings"><i class="fa fa-arrow-left"></i> Back</button>
                    <button type="button" style="font-size: 12px;" id="previewQuestionFromSttings" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Preview</button>
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>

   
    <!-- PreviewQuestionBankModal Bank  Modal -->
    <div class="modal fade PreviewQuestionBankModal" id="PreviewQuestionBankModal" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="PreviewQuestionBankModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <h5 class="modal-title text-primary"><i class="fa fa-question" id=""> </i> Preview All Selected Questions
                    </h5>
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  style="font-size:12px;" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <!-- col -->
                        <div class="col-lg-11 col-md-10 col-sm-12">

                        <!-- <div class="row">
                            <div class="col-sm-2 col-lg-4 searchbtn mb-4">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        </div> -->
                   
                        <div class="row" id="get_questions">
                                 
                        </div>
                     
                            
                        </div>
                        <!-- /col -->
                    </div>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" id="questionModalShow"><i class="fa fa-arrow-back"></i> Back</button>
                    <button type="button" style="font-size: 12px;" id="importQuestionSettings" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info importQuestionSettings">Save Settings</button>
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>


    
     <!-- PreviewQuestionBankModal2 Bank  Modal -->
     <div class="modal fade PreviewQuestionBankModal2" id="PreviewQuestionBankModal2" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="PreviewQuestionBankModal2Label" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <h5 class="modal-title text-primary"><i class="fa fa-question" id=""> </i> Preview All Selected Questions
                    </h5>
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  style="font-size:12px;" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <!-- col -->
                        <div class="col-lg-11 col-md-10 col-sm-12">

                        <!-- <div class="row">
                            <div class="col-sm-2 col-lg-4 searchbtn mb-4">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        </div> -->
                   
                        <div class="row" id="get_questions2">
                                 
                        </div>
                     
                            
                        </div>
                        <!-- /col -->
                    </div>
                </div>
                <div class="modal-footer  border-0">
                    <!-- NEXT BUTTON-->
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" id="questionModalShow2"><i class="fa fa-arrow-back"></i> Back</button>
                    <button type="button" style="font-size: 12px;" id="importQuestionSettings" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info importQuestionSettings">Save Settings</button>
                    <!-- /NEXT BUTTON-->
                </div>
            </div>
        </div>
    </div>


     <!-- Assesement Edit Settings Modal -->
     <div class="modal fade tari_edit_setting_modal" id="tari_edit_setting_modal" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="tari_edit_setting_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-primary"><i class="fa fa-pen" id=""> </i> Edit Assesement Settings
                    </h5>
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row p-3" id="section_edit_modal">

                    </div>
                </div>
              
                <div class="modal-footer">
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal">Close</button>
                    <button type="button" style="font-size: 12px;" id="tari_update_settings" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Update Settings</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Assesement View Questions and Settings Modal -->
    <div class="modal fade tari_view_settings_modal" id="tari_view_settings_modal" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="tari_view_settings_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" id="no_print">
            <div class="modal-content">
                <div class="modal-header border-0" id="no_print">
                    <h5 class="modal-title text-primary"><i class="fa fa-pen"> </i> View Assesement Settings and Questions
                    </h5>
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-wrapper">
                    <div class="modal-body">
                        <div class="row p-3" id="load_Questions_and_Settings">

                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="no_print">
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal">Close</button>
                    <button type="button" style="font-size: 12px;" id="tari_Print_Settings_and_Questions" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Print</button>
                </div>
            
            </div>
        </div>
    </div>

    <!-- Assesement View Questions and Settings Modal -->
    <div class="modal fade tari_add_remove_settings_modal" id="tari_add_remove_settings_modal" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="tari_add_remove_settings_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" id="no_print">
            <div class="modal-content">
                <div class="modal-header border-0" id="no_print">
                    <h5 class="modal-title text-primary"><i class="fa fa-pen" id=""> </i> Add/Remove Questions
                    </h5>
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-wrapper">
                    <div class="modal-body">
                        <div class="row p-3" id="load_questions_from_settings_add_remove">

                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="no_print">
                    <button type="button" style="font-size: 12px;" class="btn btn-danger mt-3 float-start" data-bs-dismiss="modal">Close</button>
                    <button type="button" style="font-size: 12px;" id="tari_add_remove_question_settings" class="btn btn-md text-white float-end  mt-3 rounded-0 bg-info">Submit</button>
                </div>
            
            </div>
        </div>
    </div>

    <!-- Delete Question Modal Direct-->
    <div class="modal fade delete_question_settings_modal" id="delete_question_settings_modal" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="delete_question_settings_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="text-center">
                            <?php

                                    $prosloaddefaultimages = mysqli_query($link,"SELECT * FROM `defaultimages` WHERE `ImageName`='prostrashimage'");
                                    $prosloaddefaultimagescnt  = mysqli_num_rows($prosloaddefaultimages);
                                    $prosloaddefaultimagescntrow = mysqli_fetch_assoc($prosloaddefaultimages); 



                                    if($prosloaddefaultimagescnt > 0)
                                    {
                                                
                                        
                                        $deleteimagecontent = $prosloaddefaultimagescntrow['BaseSixtyFour'];

                                            echo '<img src="'.$deleteimagecontent.'">';
                                    }else
                                    {

                                    }


                            ?>
                
                            </div>	  
                            <input id="hold_del_id" type="hidden">        
                            <input id="prosgetcampusfordel" type="hidden">                      

                  
					<h4 class="modal-title w-100 text-center">Are you sure?</h4>
                    <p class="text-center">Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="font-size: 12px;">Cancel</button>
                    <button type="button" class="btn btn-danger btn-sm" id="delete_question_settings_btn" style="font-size: 12px;">Delete</button>
				</div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>





       <!-- WarningQuery Modal-->
       <div class="modal fade WarningQuery" id="WarningQuery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="WarningQueryLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clear Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                    <img src="./opps.png" class="img-fluid mx-auto d-block mt-3" alt="">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p class="fw-bold">Opps, No Question Added to this Subject in the Question Bank.</p>
                            <p class="fs-5">If you want to save your Settings and Add Question from the Bank</p>
                            <p class="fs-6">Click on Proceed, Else Click on Close to Exit</p>
                        </blockquote>
                        <!-- <figcaption class="blockquote-footer">
                            Click on Create, Else Click on Close
                        </figcaption> -->
                        <!-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createQuestionDirect" style="font-size:12px;">Create Question</button> -->
                    </figure>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" style="font-size:12px;" id="goBacktoSettings"><i class="fa fa-arrow-left"></i> Back</button>
                    <button type="button" class="btn btn-primary btn-sm" style="font-size:12px;" id="save_settings_only">Proceed <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
     <!-- PROS MARK CBT EXAM HERE-->
       <div class="modal fade " id="prosloadmarexamheremodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="prosloadmarexamheremodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clear Record</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 <!--</div> -->
                <div class="modal-body">
                    
                         <div id="prosloadstudentforcbthere"></div>
                   
                </div>
                <div class="modal-footer">
                    
                    <!--<button type="button" class="btn btn-primary btn-sm" style="font-size:12px;" id="">Proceed <i class="fa fa-arrow-right"></i></button>-->
                </div>
            </div>
        </div>
    </div>
    
 <!-- PROS MARK CBT EXAM HERE-->
 
 
 
   <!-- PROS RESET EXAM HERE-->
       <div class="modal fade " id="prosreset_exam_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="prosreset_exam_modalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clear Record</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 <!--</div> -->
                <div class="modal-body">
                    
                    
                    
                              <div class="row">
                                 
                                    <div class="col-12  col-lg-12">
                                        <div class="form-group local-forms">
                                            <label>Assesement Date <span style="color:red;">*</span></label>
                                            <input class="form-control settings_sec_2" type="date" placeholder="Enter Assesement Title" id="pros_settings_date_edit">
                                        </div>
                                    </div>
                              
                              
                                    <div class="col-12  col-lg-12">
                                        <div class="form-group local-forms">
                                            <label>Assesement Start Time <span style="color:red;">*</span></label>
                                            <input class="form-control settings_sec_2" type="time" placeholder="Enter Time" id="pros_settings_time_in_edit">
                                        </div>
                                    </div>
                                   
                                    <div class="col-12  col-lg-12">
                                        <div class="form-group local-forms">
                                            <label>Assesement End Time <span style="color:red;">*</span></label>
                                            <input class="form-control settings_sec_2" type="time" placeholder="Enter Time" id="pros_settings_time_out_edit">
                                        </div>
                                    </div>                                              
                                
                                  
                                  
                              </div>
                    
                         <!--<div id="prosloadstudentforcbthere"></div>-->
                         
                           <input id="reset_exam_stud_id" type="hidden">        
                            <input id="reset_exam_stud_campusid" type="hidden">   
                            <input id="reset_exam_stud_cbtid" type="hidden">   
                   
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary btn-sm pros_resetcbt_btn" style="font-size:12px;" id="">Save <i class="fas fa-undo"></i></button>
                </div>
            </div>
        </div>
    </div>
    
 <!-- PROS RESET EXAM HERE-->
 
 
 
 
 
 
 <!-- PROS MARK CBT EXAM HERE-->
       <div class="modal fade " id="prosconverttocamodal"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="prosconverttocamodalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clear Record</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 <!--</div> -->
                <div class="modal-body">
                    
                        
                   
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary btn-sm" style="font-size:12px;" id="">Convert <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    
 <!-- PROS MARK CBT EXAM HERE-->