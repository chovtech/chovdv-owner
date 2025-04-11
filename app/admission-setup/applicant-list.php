<div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
    <div class="tab-content" id="pills-tabContent">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-12 col-lg-2">
                    <select style="color: #666666;" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" id="abba_display_campus">
                        <option value="NULL">Select campus</option>
                    </select>
                </div>

                <div class="col-md-12 col-lg-2">
                    <select style="color: #666666;" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" id="prosloadadmitetedclassesinput">
                        <option value="NULL">Select Class</option>
                    </select>
                </div>

               

                <div class="col-md-12 col-lg-2">
                    <select style="color: #666666;" class="form-select form-select-sm"
                        aria-label=".form-select-sm example" id="prosadmissionsession">
                        <option value="NULL">Select session</option>
                    </select>
                </div>

                <div class="col-md-12 col-lg-2">
                    <button type="button"
                        style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;"
                        class="btn btn-sm fw-normal" id="pros_get_applicant_on_click"><i class="fas fa-circle-notch"></i>
                        Load filter</button>
                </div>

                <div class="col-md-12 col-lg-1">
                   
                </div>


                <div class="col-md-12 col-lg-2">
                        <button type="button" id="pros-create-applicant" style="float: right;font-size:14px;" data-bs-toggle="modal"
                            class="btn btn-sm btn-primary">Register now <i class="fa fa-plus"></i></button>
                            
                </div>
            </div><br><br>


            <div class="table-responsive" id="prosploadadmission-record"></div>
            
        </div>
    </div>
</div>






<!-- Modal -->
<div class="modal fade" id="prosmodalsmsadmissionmessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-body">

                <center><h6>Share login details or chat below</h6></center>
                <br>
                <div class="proscontentadminrecord " style="margin-left:20%;">
                    <center>
                    <ul class="prosiconsadminrecord d-flex flex-row gap-3" >
                        <a href="javascript:void();"  class="prosloadwhatmodalmessgebtn" id="proswhatappbtn"><i class="fab fa-whatsapp"></i></a>
                        <a href="javascript:void();" class="prosload-sms-messgebtn"  id="pros-smsbtn" ><i class="fa fa-sms"></i></a>
                        <a href="javascript:void();" id="prosloademailinputforemailbtn"><i class="fa fa-envelope"></i></a>
                    </ul>
                    </center>
                </div>
      </div>
    </div>
  </div>
</div>





<!-- =====CHANGE ADMISSION STATUS HERE===== -->
<div class="modal fade" id="prosloadapplicantstausmodal" tabindex="-1" aria-labelledby="prosloadapplicantstausmodalLabel" aria-hidden="true"  style="border:none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border:none;">
        <h6 class="modal-title" id="prosloadapplicantstausmodalLabel">Choose class to be  admitted</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <div id="prosloadapplicantionstatus"></div>

      </div>
    </div>
  </div>
</div>
<!-- =====CHANGE ADMISSION STATUS HERE===== -->


<!-- =====LOAD EMAIL INFO HERE===== -->
<div class="modal fade" id="prosloademailconetnt-applicationmodal" tabindex="-1" aria-labelledby="prosloademailconetnt-applicationmodalLabel" aria-hidden="true"  style="border:none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border:none;">
        <h6 class="modal-title" id="prosloademailconetnt-applicationmodalLabel"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <div id="prosloademailcontactherenowdiv"></div>

      </div>
    </div>
  </div>
</div>
<!-- =====LOAD EMAIL INFO HERE===== -->




<!-- =====LOAD WHATSAPP INFO HERE===== -->
<div class="modal fade" id="prosloadwhatsappconetnt-applicationmodal" tabindex="-1" aria-labelledby="prosloadwhatsappconetnt-applicationmodalLabel" aria-hidden="true"  style="border:none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border:none;">
        <h6 class="modal-title" id="prosloadwhatsappconetnt-applicationmodalLabel"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  

            <div id="whatsappdisplay-view"></div>
            <span id="input-whatsapp-programme-btn" style="color:blue;cursor:pointer;float:right;"><u>Click to Input login Information</u></span><br>
            <label>Input Message:</label>
            <textarea class="form-control" id="sendmessage" rows="12"></textarea>
           
      </div>
      <div class="modal-footer" style="border:none;">
            <button type="button" class="btn text-light btn-sm" style="background-color:green;" id="proceed-whatsapp-programme-btn"> Send Message <i class="fab fa-whatsapp"></i></button>
      </div>

    </div>
  </div>
</div>

<!-- =====LOAD WHATSAPP INFO HERE===== -->



<!-- =====LOAD WHATSAPP INFO HERE===== -->
<div class="modal fade" id="prosload-sms-conetnt-applicationmodal" tabindex="-1" aria-labelledby="prosload-sms-conetnt-applicationmodalLabel" aria-hidden="true"  style="border:none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border:none;">
        <h6 class="modal-title" id="prosload-sms-conetnt-applicationmodalLabel"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <span id="input-sms-programme-btn" style="color:blue;cursor:pointer;float:right;"><u>Click to Input login Information</u></span><br>
            <label>Input Message:</label>
            <textarea class="form-control" id="sendmessage-sms" rows="12"></textarea>

      </div>
      <div class="modal-footer" style="border:none;">
            <button type="button" class="btn bg-primary text-light btn-sm"  id="proceed-sms-programme-btn"> Send Message <i class="fa fa-sms"></i></button>
      </div>

    </div>
  </div>
</div>
<!-- =====LOAD WHATSAPP INFO HERE===== -->
 


<!--DELETE APPLICANT HERE -->
<div class="modal fade" id="pros-deleteapplicant-modal"
        tabindex="-1" role="dialog" aria-labelledby="pros-deleteapplicant-modalLabel" aria-hidden="true">
        <div class="modal-dialog " style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border:none;">
                    <h5 class="modal-title" style="font-weight:600;font-size:15px;" id="pros-deleteapplicant-modalLabel">
                        Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="displayschooldel-onboarding">
                    <center>
                        <p style="font-weight:400;font-size:15px;">Are you sure you want to delete <span
                                id="displayschoolname-del"></span>?</p>

                        <span style="color:red;font-weight:600;">
                        Note: If you delete this applicant,
                        all the records for this<br> applicant will be deleted.
                        </span>
                    </center>

                  <input type="hidden" class="prosremovestudentid">
                  <input type="hidden" class="prosremovesinstitutioid">
                   <input type="hidden" class="prosremovescampusid">


                </div>
                <div class="modal-footer" style="border:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteconfirmDeleteapplicant">Delete</button>
                </div>
            </div>
        </div>
    </div>
   <!--DELETE APPLICANT HERE -->

        <input type="hidden" id="num">
        <input type="hidden" id="regnum">
        <input type="hidden" id="pwrd">
        <input type="hidden" id="link">
        <input type="hidden" id="student_id">