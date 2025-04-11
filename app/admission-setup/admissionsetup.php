<div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">

            <ul class="nav nav-pills mb-3 renceTab prosloadhidetablist" id="pills-tab" role="tablist" >
                <li class="nav-item border" role="presentation">
                    <a href="Javascript:;" class="nav-link active abba_tab_checker_for_summary" data-id="student"
                        data-sumdiv="student_summary_div" id="pills-classsetting-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-classsetting" type="button" role="tab" aria-controls="pills-classsetting"
                        aria-selected="true"><i class="fas fa-cog"></i> Class settings</a>
                </li>

                <li class="nav-item border" role="presentation">
                    <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" data-id="parent"
                        data-sumdiv="parent_summary_div" id="pills-websitting-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-websitting" type="button" role="tab" aria-controls="pills-websitting"
                        aria-selected="false"><i class="fas fa-globe"></i> Website settings</a>
                </li>


                <li class="nav-item border" role="presentation">
                    <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" data-id="parent"
                        data-sumdiv="parent_summary_div" id="pills-admissionletter-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-admissionletter" type="button" role="tab" aria-controls="pills-admissionletter"
                        aria-selected="false"><i class=" fa fa-file-alt"></i> Admission letter</a>
                </li>

            </ul>


            
   

        <div class="tab-content prosloadtabhidecontent" id="pills-tabContent" >
            
            <div class="tab-pane fade show active" id="pills-classsetting" role="tabpanel"
                aria-labelledby="pills-classsetting-tab">
                <div id="prosloadadmissionclasses"></div>
            </div>

            <div class="tab-pane fade show " id="pills-websitting" role="tabpanel" aria-labelledby="pills-websitting-tab">
                <div id="pros-loadamissionwebcontent"></div>
            </div>

            <div class="tab-pane fade show " id="pills-admissionletter" role="tabpanel" aria-labelledby="pills-admissionletter-tab">
                  
                        <div id="prosloadadmissiontemplatehere"></div>
            </div>

        </div>
        
</div>





<div class="row justify-content-center">
    <div class="container-fluid mt-3 mb-3">
        <div class="picture-container">
            <div class="image-error"></div>

            <div id="pros-uploadstaffimage" class="modal" role="dialog" style="position: absolute;">
                <div class="modal-dialog modal-md">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="invitestaff-usertype">Upload Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

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

            <!-- banner inmge here -->
            <div id="pros-uploadstaffimagebanner" class="modal" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="invitestaff-usertype">Upload Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                                    <input type="hidden" id="prosgetstaffID-formimage">
                                    <div id="image_demobanner"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <button class="btn btn-success btn-sm proscrop_editwebimage"> submit </button>
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
            <!-- banner inmge here -->
        </div>
    </div>
</div>










<!---====Edit Profile Side Modal Start Here====-->
<div class="modal fade modalshow modalfade" id="edit-admissionprofile" tabindex="-1"
    aria-labelledby="edit-staffprofileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable dialogcontent" style="border-top-left-radius: 30px; width: 100%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff;">
            <div class="modal-body modalbodycontent">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"> Edit Admission Setting <svg xmlns="http://www.w3.org/2000/svg"
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
                        <div id="prosloadeditadmindescription"></div>



                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fa fa-times"> Close</i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="pros-updateadmissiondes">
                    <i class="fa fa-edit"> Update</i>
                </button>
            </div>

        </div>
    </div>
</div>
<!---====End Edit Profile Side ModalEndHere====-->











<!---====Edit Profile Side Modal Start Here====-->
<div class="modal fade modalshow modalfade" id="edit-admissionprofilebenefit" tabindex="-1"
    aria-labelledby="edit-staffprofileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable dialogcontent" style="border-top-left-radius: 30px; width: 100%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff;">
            <div class="modal-body modalbodycontent">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"> Edit Admission BENEFIT <svg xmlns="http://www.w3.org/2000/svg"
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
                        <div id="prosloadeditadminbenefit"></div>



                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fa fa-times"> Close</i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="pros-updateadmissionbenefit">
                    <i class="fa fa-edit"> Update</i>
                </button>
            </div>

        </div>
    </div>
</div>
<!---====End Edit Profile Side ModalEndHere====-->








<!---====Edit Profile Side Modal Start Here====-->
<div class="modal fade modalshow modalfade" id="edit-admissionprofilefaq" tabindex="-1"
    aria-labelledby="edit-staffprofileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable dialogcontent" style="border-top-left-radius: 30px; width: 100%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff;">
            <div class="modal-body modalbodycontent">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"> Edit Admission FAQS <svg xmlns="http://www.w3.org/2000/svg"
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
                        <div id="prosloadeditadminfaq"></div>



                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fa fa-times"> Close</i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="pros-updateadmissionfaq">
                    <i class="fa fa-edit"> Update</i>
                </button>
            </div>

        </div>
    </div>
</div>
<!---====End Edit Profile Side ModalEndHere====-->





<!---====Edit Profile Side Modal Start Here====-->
<div class="modal fade modalshow modalfade" id="prosloadmodaladminprefixsettings" tabindex="-1"
    aria-labelledby="edit-staffprofileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable dialogcontent" style="border-top-left-radius: 30px; width: 100%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff;">
            <div class="modal-body modalbodycontent">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"> Edit/Add Admission Settings <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pen" viewBox="0 0 16 16">
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

                        <div id="prosloadclasslistforedit"></div>



                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fa fa-times"> Close</i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="prosadmissionclassnewhere">
                    <i class="fa fa-edit"> Update</i>
                </button>
            </div>

        </div>
    </div>
</div>
<!---====End Edit Profile Side ModalEndHere====-->



    <!-- =====LOAD ONBORADING INFO HERE===== -->
        <div class="modal fade" id="prosloadonboardingmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="prosloadonboardingmodalLabel" aria-hidden="true"  style="border:none;">
        <div class="modal-dialog modal-xl pros-stylemodalonboardingcontent">
            <div class="modal-content " style="z-index:-2;">
                     <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn float-end text-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                        </div>

                        
                    </div>
            
            <div class="modal-body">
                
                    <div id="pros-loadadmissioncontenthere"></div>
            </div>
            </div>
        </div>
        </div>
    <!-- =====LOAD ONBORADING INFO HERE===== -->


    

     <!-- ====PROS LOAD ADMISSION CLASSS HERE===== -->
     <div class="modal fade" id="prosloadaddnewsubjectmodal"  tabindex="-1" aria-labelledby="prosloadaddnewsubjectmodalLabel" aria-hidden="true"  style="border:none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
            <div class="modal-header" style="border:none;">
                    <h5 class="modal-title text-primary"> Add Admission Classes<svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pen" viewBox="0 0 16 16">
                            <path
                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                        </svg>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
            <div class="modal-body">
           
                    <div id="pros-loadadmissionclassesforaddnewhere"></div>
            </div>


            <div class="modal-footer" style="border:none;">
            <button type="button" class="btn btn-sm text-white float-end mt-2 rounded-3 btn-primary mb-2 pros-prosaddnewclass"><i class="fas fa-plus"> Add New </i></button>
                
               
           
                
            </div>


            </div>
        </div>
        </div>
    <!-- ====PROS LOAD ADMISSION CLASSS HERE===== -->












    
  <!-- ======prosload admissionduration=== -->
<div class="modal fade modalshow modalfade" id="prosloadamissiondurationhere" tabindex="-1"
    aria-labelledby="prosloadamissiondurationhereLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable dialogcontent " style="border-top-left-radius: 30px; width: 100%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff;">
            <div class="modal-body modalbodycontent">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"> Edit/Set Admission Duration <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pen" viewBox="0 0 16 16">
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

                                            <div id="prosloadinstitutiondatesetforadmision"></div>
               
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fa fa-times"> Close</i>
                </button>
                 <button type="button" class="btn btn-primary btn-sm" id="prosupdateadmissiondurationrangebtn">
                    <i class="fa fa-edit"> Update</i>
                </button>
            </div>

        </div>
    </div>
</div>
  <!-- ======prosload admissionduration=== -->





  
<!-- =====CHANGE ADMISSION STATUS HERE===== -->
<div class="modal fade" id="prosloadapplicantstausmodal" tabindex="-1" aria-labelledby="prosloadapplicantstausmodal" aria-hidden="true"  style="border:none;">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border:none;">
        <h6 class="modal-title" id="prosloadapplicantstausmodallabel"> Admission Letter </h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color:#F8F8F8 ;">
                  <div id="pros-loadadmissionletterforview"></div>
      </div>
    </div>
  </div>
</div>
<!-- =====CHANGE ADMISSION STATUS HERE===== -->




<!-- =====CHANGE ADMISSION STATUS HERE===== -->
<div class="modal fade" id="proseitadmissionlettermodal" tabindex="-1" aria-labelledby="proseitadmissionlettermodal" aria-hidden="true"  style="border:none;">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="border:none;">
        <h6 class="modal-title" id="prosloadapplicantstausmodallabel"> Edit Admission letter  

        <svg xmlns="http://www.w3.org/2000/svg"
            width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
            <path
                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
        </svg>

        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color:#F8F8F8 ;">
                 <div id="prosloadadmissiontemplate"></div>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fa fa-times"> Close</i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="pros-updateadmissionletterdescription">
                    <i class="fa fa-edit"> Update</i>
                </button>
        </div>
    </div>
  </div>
</div>
<!-- =====CHANGE ADMISSION STATUS HERE===== -->




<!-- =====CHANGE ADMISSION STATUS HERE===== -->
<div class="modal fade" id="prosloadapplicantstausmodal-here" tabindex="-1" aria-labelledby="prosloadapplicantstausmodal-here" aria-hidden="true"  style="border:none;">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header" style="border:none;">
        <!-- <h6 class="modal-title" id="prosloadapplicantstausmodallabel"> Edit Admission letter   -->

        <svg xmlns="http://www.w3.org/2000/svg"
            width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
            <path
                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
        </svg>

        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                 <div id="prosloaadmissionstatusforchangestatus"></div>
      </div>
      <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fa fa-times"> Close</i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="pros-updateadmissionletterdescription">
                    <i class="fa fa-edit"> Update</i>
                </button> -->
        </div>
    </div>
  </div>
</div>
<!-- =====CHANGE ADMISSION STATUS HERE===== -->


















  