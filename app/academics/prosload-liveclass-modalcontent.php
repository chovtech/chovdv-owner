
<!--PROS SETTINGS  OF LIVE CLASS HERE-->
<div class="modal fade " id="prossetvirualclass_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="prossetvirualclass_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">virtual Class Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">




                <div class="row">

                        <div class="col-lg-4">

                            <div class="form-group local-forms ">


                                <label></label>
                                <select class="form-control question_card select11 " id="prosselectvirtualtosetcampus">

                                    <option value="NULL">Select Campus</option>

                                </select>
                            </div>

                        </div>

                     

                        <div class="col-lg-4">


                                <div class="form-group local-forms ">
                                    <label></label>
                                    <select class="form-control question_card  " id="prosselectvirtualtosetsession">
                                        <option value="NULL">Select Session</option>

                                    </select>
                                </div>


                        </div>


                        <div class="col-lg-4">
                            <div class="form-group local-forms ">
                                <label></label>
                                <select class="form-control question_card  " id="prosselectvirtualtosetterm">
                                    <option value="NULL">Select Term</option>

                                </select>
                            </div>
                        </div>

 
                      
                        <div class="col-lg-4">
                            <div class="form-group local-forms ">
                                <label></label>
                                <select class="form-control question_card" id="virtualsettingsclass">

                                    <option value="NULL">Select Class</option>

                                </select>
                            </div>
                        </div>
                     

                        <div class="col-lg-4">
                            <div class="form-group local-forms ">
                             
                                <select class="form-control question_card" id="virtualsettinssubject">

                                    <option value="NULL">Select Subject </option>

                                </select>
                            </div>
                        </div>
                       

                        <div class="col-lg-4">
                            <div class="form-group local-forms ">
                              <input type="date" class="form-control question_card prosload_start_classdate" >
                                
                            </div>
                        </div>

                    

                        <div class="col-lg-4">
                            <div class="form-group local-forms ">
                              <input type="time" class="form-control question_card prosload_start_class_starttime" >
                            </div>
                        </div>

                   
                        <div class="col-lg-4">
                            <div class="form-group local-forms ">
                              <input type="time" class="form-control question_card prosload_start_class_endtime" >
                            </div>
                        </div>
              </div>  

                   
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary btn-sm" style="font-size:12px;" id="goBacktoSettings"><i class="fa fa-arrow-left"></i> Back</button> -->
                    <button type="button" class="btn btn-primary btn-sm" style="font-size:12px;" id="prosset_virtualclassbtn">Schedule Now <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
 <!--PROS SETTINGS  OF LIVE CLASS HERE-->




  

        <!--DELETE CLASS SINGLE MODAL-->
        <div class="offcanvas offcanvas-bottom" style="height: 90vh; border-top-left-radius: 15px; border-top-right-radius: 15px;"  tabindex="-1" id="pros_deleteliveclass_modal" aria-labelledby="pros_deleteliveclass_modalLabel">
            
            <button type="button" class="btn-close text-reset" style="margin: 20px 0px 0px 20px;" data-bs-dismiss="offcanvas" aria-label="Close"></button>
           
            <div class="offcanvas-header justify-content-center">
              <h4 class="offcanvas-title " id="pros_deleteliveclass_modalLabel">Delete Class</h4>
            </div>

         
            <input type="hidden" class="prosload_campus_for_liveclassdelete_here">
            <input type="hidden" class="prosload_id_for_liveclassdelete_here">

            <input type="hidden" class="prosload_subjid_for_liveclassdelete_here">
            <input type="hidden" class="prosload_classid_for_liveclassdelete_here">




            <input type="hidden" class="prosload_term_for_liveclassdelete_here">
            <input type="hidden" class="prosload_session_for_liveclassdelete_here">




            <div class="offcanvas-body small">
                <p align="center" style="font-size: 150px; color: #DE1828;">
                    <!-- <i class='bx bx-check-circle bx-tada' ></i> -->

                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.486 2 2 5.589 2 10c0 2.908 1.898 5.515 5 6.934V22l5.34-4.005C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8m0 14h-.333L9 18v-2.417l-.641-.247C5.67 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6s-3.589 6-8 6"/><path fill="currentColor" d="M14.293 6.293L12 8.586L9.707 6.293L8.293 7.707L10.586 10l-2.293 2.293l1.414 1.414L12 11.414l2.293 2.293l1.414-1.414L13.414 10l2.293-2.293z"/></svg>
                </p>
                <h5  align="center">Are you sure <br> you want to delete this class?</h5><br>
                <h5  align="center">this  can't be undone if deleted</h5>
                <br>
                <div align="center">
    
                    <a  class="btn btn-danger pros_delete_liveclasss_btn" style="border-radius: 30px; margin-top: 5px; font-weight: 550; padding: 10px 10px; border: none; width: 70%; background-color: #DE1828;" type="button">Delete</a>
    
                </div>
            </div>

        </div>
        
    <!--DELETE CLASS SINGLE MODAL-->




   


       <!--DELETE CLASS BULK MODAL-->
       <div class="offcanvas offcanvas-bottom" style="height: 90vh; border-top-left-radius: 15px; border-top-right-radius: 15px;"  tabindex="-1" id="pros_deleteliveclassulk_modal" aria-labelledby="pros_deleteliveclassulk_modalLabel">
            
            <button type="button" class="btn-close text-reset" style="margin: 20px 0px 0px 20px;" data-bs-dismiss="offcanvas" aria-label="Close"></button>
           
            <div class="offcanvas-header justify-content-center">
              <h4 class="offcanvas-title " id="pros_deleteliveclass_modalLabel">Delete Class</h4>
            </div>

            <div class="offcanvas-body small">
                <p align="center" style="font-size: 150px; color: #DE1828;">
                    <!-- <i class='bx bx-check-circle bx-tada' ></i> -->

                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.486 2 2 5.589 2 10c0 2.908 1.898 5.515 5 6.934V22l5.34-4.005C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8m0 14h-.333L9 18v-2.417l-.641-.247C5.67 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6s-3.589 6-8 6"/><path fill="currentColor" d="M14.293 6.293L12 8.586L9.707 6.293L8.293 7.707L10.586 10l-2.293 2.293l1.414 1.414L12 11.414l2.293 2.293l1.414-1.414L13.414 10l2.293-2.293z"/></svg>
                </p>
                <h5  align="center">Are you sure <br> you want to delete this class?</h5><br>
                <h5  align="center">this  can't be undone if deleted</h5>
                <br>
                <div align="center">
    
                    <a  class="btn btn-danger pros_delete_liveclasssbulk_btn" style="border-radius: 30px; margin-top: 5px; font-weight: 550; padding: 10px 10px; border: none; width: 70%; background-color: #DE1828;" type="button">Delete</a>
    
                </div>
            </div>

        </div>
        
    <!--DELETE CLASS BULK MODAL-->





        <!-- create class -->
    <div class="modal fade modalshow modalfade" id="pros_editliveclass_modal" tabindex="-1"
        aria-labelledby="pros_editliveclass_modalLabel" aria-hidden="true">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">

                <div class="modal-header">
                    <h5 class="modal-title text-primary">
                        <i class="fas fa-plus-circle"> Edit Virtual Class</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <input type="hidden" class="prosload_campus_for_liveclassdelete_here_edit">
                    <input type="hidden" class="prosload_id_for_liveclassdelete_here_edit">
                    <input type="hidden" class="prosload_subjid_for_liveclassdelete_here_edit">
                    <input type="hidden" class="prosload_classid_for_liveclassdelete_here_edit">
                    <input type="hidden" class="prosload_term_for_liveclassdelete_here_edit">
                    <input type="hidden" class="prosload_session_for_liveclassdelete_here_edit">

                    <div class="row">

                        <div class="col-lg-12">
                                <div class="form-group local-forms ">
                                <input type="date" class="form-control question_card prosload_start_classdate_edit" >
                                    
                                </div>
                        </div>
                    

                      

                        <div class="col-lg-12">
                            <div class="form-group local-forms ">
                              <input type="time" class="form-control question_card prosload_start_class_starttime_edit" >
                            </div>
                        </div>

                   
                        <div class="col-lg-12">
                            <div class="form-group local-forms ">
                              <input type="time" class="form-control question_card prosload_start_class_endtime_edit" >
                            </div>
                        </div>
                        
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-sm" id="pros_edit_liveclass_finalbtn"> 
                        <i class="fa fa-edit"> Save</i>
                    </button>
                </div>
            </div>
        </div>
    </div>