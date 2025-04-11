







<!--PROS SETTINGS  OF LESSON HERE-->
       <div class="modal fade " id="prossubmitlessonherecontent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="WarningQueryLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lesson Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">




                <div class="row">

                        <div class="col-lg-4">

                            <div class="form-group local-forms ">


                                <label></label>
                                <select class="form-control question_card select11 " id="prosselectlessonnotetosetcampus">

                                    <option value="NULL">Select Campus</option>

                                </select>
                            </div>

                        </div>


                        <div class="col-lg-4">


                                <div class="form-group local-forms ">
                                    <label></label>
                                    <select class="form-control question_card  " id="prosselectlessonnotetosetsession">
                                        <option value="NULL">Select Session</option>

                                    </select>
                                </div>


                        </div>


                        <div class="col-lg-4">
                            <div class="form-group local-forms ">
                                <label></label>
                                <select class="form-control question_card  " id="prosselectlessonnotetosetterm">
                                    <option value="NULL">Select Term</option>

                                </select>
                            </div>
                        </div>

 


                        <div class="col-lg-4">
                            <div class="form-group local-forms ">
                                <label></label>
                                <select class="form-control question_card" id="lessonsettingsclass">

                                    <option value="NULL">Select Class</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group local-forms ">
                             
                                <select class="form-control question_card" id="lessonsettinssubject">

                                    <option value="NULL">Select Subject </option>

                                </select>
                            </div>
                        </div>


                      
              </div>  






              <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="proscard card">
                        <div class="card-body">
                            <div class="prostop">
                                <p class="protitle">Select your lesson Document</p>
                                <a href="#" class="close-btn"><i class="fa-solid fa-xmark"></i></a>
                            </div>


                            

                              <textarea hidden="hidden" id="prosloadtextareaforfilehere" name="w3review" rows="4" cols="50"></textarea>
                              <input type="hidden" class="form-control proshiddeninputfieldforinsert" >

                            
                            
                            <center><p style="font-size:15px;">Upload Lesson File(DOC,PDF,IMAGE)</p></center>
                            
                            <div class="prosdropzone prosloadfiledropzonher">
                                <img class="prosprosdz-icon" src="https://cdn-icons-png.flaticon.com/512/2716/2716054.png" width="60">
                                <p style="font-size: 18px; color: #717171;">Drag files here or <span class="browse"><a href="#">browse</a></span></p>
                            </div>
                            <input type="file" id="prosselectinforlessonfile" accept=".docx,.doc,.pdf,image/*" hidden>



                           <center><p style="font-size:15px;">Upload Lesson Video(Optional)</p></center>

                            <div class="prosdropzone  prosloadvideofullcontent">
                                   <input type="text" class="form-control prosvideolinklessonte" placeholder="Paste your video link">
                                <img class="prosprosdz-icon" src="https://cdn-icons-png.flaticon.com/512/2716/2716054.png" width="60">
                                <p style="font-size: 18px; color: #717171;">Upload lesson video <span class="prosloadlessnotevideocontenthere"><a href="#">browse</a></span></p>
                            </div>


                            

                             <input type="file" id="proslessonnotevideinputhhree" accept="video/*" hidden>

                             <textarea  hidden="hidden" id="prosloadvideoforlessontecreate" rows="4" cols="50"></textarea>

                                <center><p style="font-size:15px;">Upload Lesson Audio(Optional)</p></center>

                            <div class="prosdropzone  ">
                                <input type="text" class="form-control prosaudionlinklessonte" placeholder="Paste your audio link">
                                <img class="prosprosdz-icon" src="https://cdn-icons-png.flaticon.com/512/2716/2716054.png" width="60">
                                <p style="font-size: 18px; color: #717171;">Upload lesson audio <span class="prosgeneralaudioclick"><a href="#">browse</a></span></p>
                            </div>

                            <input type="file" id="proslessonnoteaudioinputhhree" accept="audio/*" hidden>
                            <textarea  hidden="hidden" id="prosloadaudiocontentforcreate" rows="4" cols="50"></textarea>
                            
                            

                            
                           
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>



            



                   
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary btn-sm" style="font-size:12px;" id="goBacktoSettings"><i class="fa fa-arrow-left"></i> Back</button> -->
                    <button type="button" class="btn btn-primary btn-sm" style="font-size:12px;" id="prossaveelssubmitfilecontentherebtn">Proceed <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!--PROS SETTINGS  OF LESSON HERE-->








     <!-- DELETE LESSON NOTE MODAL -->
     <div class="modal fade" id="pros-deletelessonemodalbtn" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="prosdeletetreadcontentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <!-- <h5 class="modal-title" id="createQuestionLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <input type="hidden" class="prosloadlessonnotefordelete">
                <input type="hidden" class="prosloadlessonnotecampusinst">
                <input type="hidden" class="prosloadsubjectname">

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
                    <button type="button" class="btn btn-danger btn-sm prosdeletelessonnotebtn" style="font-size: 12px;">Delete</button>
				</div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

   <!-- DELETE LESSON NOTE MODAL -->