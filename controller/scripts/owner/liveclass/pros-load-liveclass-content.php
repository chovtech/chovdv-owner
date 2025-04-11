<?php

            include('../../../config/config.php');

           
            $campusID = $_POST['campusID'];
            $prosselectsession = $_POST['prosselectsession'];
            $term = $_POST['term'];
            $classid = $_POST['classid'];
            $subjectID = $_POST['subjectID'];

            
            $instutitionID = $_POST['instutitionID'];
            $usertype = $_POST['usertype'];
            $userID = $_POST['userID'];

            $current_date = date('Y-m-d');

            $current_time = date('H:i');



            $pros_get_live_class_cont = mysqli_query($link, "SELECT * FROM `virtualclasssettings` INNER JOIN `subjectorcourse` ON `virtualclasssettings`.`SubjectOrCourseID` = `subjectorcourse`.`SubjectOrCourseID`
             WHERE `virtualclasssettings`.`CampusID`='$campusID' AND `virtualclasssettings`.`ClassOrDepartmentID`='$classid' AND (`virtualclasssettings`.`SubjectOrCourseID`= $subjectID OR $subjectID IS NULL) AND (`virtualclasssettings`.`TermOrSemesterID`= $term OR $term IS NULL) AND `virtualclasssettings`.`sessionName`='$prosselectsession' AND `virtualclasssettings`.`DeleteStatus`='0'");


            $pros_get_live_class_cont_row = mysqli_num_rows($pros_get_live_class_cont);
            $pros_get_live_class_cont_row_cnt = mysqli_fetch_assoc($pros_get_live_class_cont);


            if($pros_get_live_class_cont_row > 0)
            {

                $prosgetdefaultimage = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE ImageName='abba_profile_dummy_image'");

                $prosgetdefaultimage_cnt = mysqli_num_rows($prosgetdefaultimage);
                $prosgetdefaultimage_cnt_row = mysqli_fetch_assoc($prosgetdefaultimage);

                if($prosgetdefaultimage_cnt > 0)
                {
                   $dummy_images =  $prosgetdefaultimage_cnt_row['BaseSixtyFour'];
                }else
                {
                    $dummy_images =  '';
                }

               

                if($prosgetdefaultimage_cnt > 0)



                echo '<div class="row">


                <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-check" style="margin-left: 20px;">
                    <input class="form-check-input" style="font-size: 20px;" type="checkbox" id="pros_select_all_class">
                    <label for="pros_select_all_class" class="mt-1">Select All</label> <span id="prosloadnumberofclasesselected" data-bs-toggle="modal" data-bs-target="#prosdelete_questionmodal" style="color: orangered; cursor: pointer;">
                  
                    </span>
                </div>
            </div>
                
           
                ';

                  do{

                            $sessionName =  $pros_get_live_class_cont_row_cnt['sessionName'];
                            $ClassDate =  $pros_get_live_class_cont_row_cnt['ClassDate'];
                            $StartTime =  $pros_get_live_class_cont_row_cnt['StartTime'];
                            $EndTime =  $pros_get_live_class_cont_row_cnt['EndTime'];
                            $SubjectOrCourseTitle =  $pros_get_live_class_cont_row_cnt['SubjectOrCourseTitle'];
                            $SubjectOrCourseID_New =  $pros_get_live_class_cont_row_cnt['SubjectOrCourseID'];

                            $VirtualID =  $pros_get_live_class_cont_row_cnt['VirtualID'];
                            $ClassOrDepartmentID =  $pros_get_live_class_cont_row_cnt['ClassOrDepartmentID'];

                            $TermOrSemesterIDnew =  $pros_get_live_class_cont_row_cnt['TermOrSemesterID'];


                            $pros_select_student = mysqli_query($link, "SELECT * FROM `classordepartmentstudentallocation` WHERE `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `CampusID`='$campusID' AND `Session`='$sessionName'");

                            $pros_select_student_cnt = mysqli_num_rows($pros_select_student);

                         
                            // PROS LOAD TERM SET HERE

                                $pros_select_term_alias =  mysqli_query($link, "SELECT * FROM `termalias` WHERE `TermOrSemesterID`='$TermOrSemesterIDnew' AND `CampusID`='$campusID' ");
                                $pros_select_term_alias_cnt = mysqli_num_rows($pros_select_term_alias);



                                $pros_select_term_alias_cnt_row = mysqli_fetch_assoc($pros_select_term_alias);


                                $TermAliasName =   $pros_select_term_alias_cnt_row['TermAliasName'];


                              // PROS LOAD TERM SET HERE

                              if( $current_date >  $ClassDate )
                              {


                                        $joinbtn = ' <button disabled type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-danger mb-2"><i class="fas fa-video"></i> Expired</button>';

                              }else
                              {

                               
                                // $StartTime =  $pros_get_live_class_cont_row_cnt['StartTime'];
                                // $EndTime =  $pros_get_live_class_cont_row_cnt['EndTime'];



                                if( $current_time >  $EndTime 
                                ){


                                     $joinbtn = ' <button disabled type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-danger mb-2"><i class="fas fa-video"></i> Expired</button>'; 

                                }else if( $current_time <   $StartTime  )
                                {
                                    $joinbtn = ' <button disabled type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-warning mb-2"><i class="fas fa-video"></i> Pending</button>'; 

                                }else

                                {

                                    $joinbtn = ' <a href="https://liveclass-67891b610a7a.herokuapp.com/index.html" target="_blank" type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-success mb-2"><i class="fas fa-video"></i> Join</a>'; 

                                }

                              }

                             

                        echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 "    >
                            <div class="card shadow-sm question_card2 " data-id="51" data-cat="Assesement">
                                <div class="form-check" style="margin-left: 20px; padding-top: 5px;">
                                    <input class="form-check-input prosloadsigngleclasshere" data-camp="'.$campusID.'" data-id="'.$VirtualID.'" data-subj="'.$SubjectOrCourseID_New.'" data-class="'.$ClassOrDepartmentID .'" data-term="'. $TermOrSemesterIDnew.'" data-session="'.$sessionName.'" style="font-size: 20px;" name="abba_get_multi_student_id" type="checkbox" >
                                    <p class="float-end me-3">Virtual Class</p>
                                </div>
                                
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5>'.$SubjectOrCourseTitle.'</h5>
                                    </div>
                                    <div class="updated_question51">
                                        <div class="card-text">

                                        <div class="row">
                                    <div class="col-8">
                                        <div style="border-left: #ffa6a6 solid 3px; margin-left: 10px; margin-top: 10px; height: 70%; padding: 0px 5px 0px 10px;">
                                            <!-- <h6>English Language</h6> -->
                                            <small>'. $StartTime.' - '.$EndTime.'</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div style="padding: 15px;">';




                                        $pros_load_student_count = mysqli_query($link,"SELECT * FROM `student` INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID` WHERE `classordepartmentstudentallocation`.`CampusID`='$campusID' AND `classordepartmentstudentallocation`.`Session`='$sessionName' AND `classordepartmentstudentallocation`.`ClassOrDepartmentID`='$ClassOrDepartmentID'"); 

                                        $pros_load_student_count_rows = mysqli_num_rows($pros_load_student_count);

                                        if( $pros_load_student_count_rows  > 0)
                                        {



                                              $prosload_count_stud = 0;

                                              $countnumberstudent_remains = 0;


                                               while($pros_load_student_count_rows_fetch = mysqli_fetch_assoc($pros_load_student_count)){

                                                       $prosload_count_stud++;

                                                       if( $prosload_count_stud <= 3 )
                                                       {



                                                                if($prosload_count_stud == '1')
                                                                {


                                                                    $proscount_degree =  90;

                                                                }else if($prosload_count_stud == '2')
                                                                {

                                                                    $proscount_degree =  70;

                                                                }else if($prosload_count_stud == '3')
                                                                {
                                                                    $proscount_degree =  50;

                                                                }



                                                             $StudentPhoto = $pros_load_student_count_rows_fetch['StudentPhoto'];

                                                             $StudentFirstName = $pros_load_student_count_rows_fetch['StudentFirstName'];

                                                           

                                                             if($StudentPhoto == '')
                                                             {
                                                                 $pros_load_images = $dummy_images;

                                                             }else{

                                                                 $pros_load_images =  $StudentPhoto;

                                                             }

                                                           
                                                            echo '<img src="'.$pros_load_images.'" alt="Image 1" style="border-radius:50px;border:1px solid #d3d2d2; width: 30px; z-index: '.$prosload_count_stud.'; right: '.$proscount_degree.'px; position: absolute;">';


                                                       }else
                                                       {


                                                        $countnumberstudent_remains+=1;





                                                       }

                                                       if( $countnumberstudent_remains == '0')
                                                       {

                                                       }else
                                                       {
                                                                    echo '<a href="" style="z-index: 4; right: 10px; margin-top: 3px; position: absolute;color: #666666; font-size: 12px;text-decoration:none;">
                                                                        <i class="fas fa-plus"></i> '.$countnumberstudent_remains.'
                                                                    </a>';
                                                       }


                                                //  StudentID StudentFirstName
                                                   

                                               }
                                        }else
                                        {

                                        }






                                       echo '</div>
                                    </div>
                                </div>

                                </div>

                                       <p></p> <a class="collapsed pt-2" style="font-size:12px;" data-bs-toggle="collapse" href="#collapseExampleclass'.$VirtualID .'" role="button" aria-expanded="false" aria-controls="collapseExample">

                                       <span class="fa fa-eye text-primary if-collapsed fw-light"> View Details</span> 
                                            <span class="fa fa-eye-slash text-primary if-not-collapsed fw-light"> hide Options</span>
                                        </a>

                                        <div class="collapse" id="collapseExampleclass'.$VirtualID .'">
                                            <p></p>

                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <small style="font-size:11px;"><b>Term:</b> '.$TermAliasName.'</small>
                                        </div>
                                        <hr class="m-1">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <small style="font-size:11px;"><b>No. of student:</b> '. $pros_select_student_cnt.'</small>
                                        </div>
                                        <hr class="m-1">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                        <small style="font-size:11px;"><b>Date:</b> '.$ClassDate.'</small><br>
                                            <small style="font-size:11px;"><b>Start Time:</b> '.$StartTime.'</small>
                                            <small class="ms-2" style="font-size:11px;"><b>End Time:</b> '.$EndTime.'</small>
                                        </div>
                                           
                                        </div>
                                    </div>
                                    <div class="card-text">
                                       '. $joinbtn.'



                                        <button type="button"  data-bs-toggle="offcanvas" data-bs-target="#pros_deleteliveclass_modal" aria-controls="pros_deleteliveclass_modal" data-camp="'.$campusID.'" data-id="'.$VirtualID.'" data-subj="'.$SubjectOrCourseID_New.'" data-class="'.$ClassOrDepartmentID .'" data-term="'. $TermOrSemesterIDnew.'" data-session="'.$sessionName.'" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-danger mb-2 pros_proceed_deletemodal_btn" ><i class="fas fa-trash"></i></button>

                                      

                                       <button type="button"    data-bs-toggle="modal"
                                       data-bs-target="#pros_editliveclass_modal" data-camp="'.$campusID.'" data-id="'.$VirtualID.'" data-subj="'.$SubjectOrCourseID_New.'" data-class="'.$ClassOrDepartmentID .'" data-term="'. $TermOrSemesterIDnew.'" data-session="'.$sessionName.'" data-date="'. $ClassDate .'" data-stime="'.$StartTime .'"   data-etime="'.$EndTime.'" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-primary mb-2 pros_proceed_editmodal_btn" ><i class="fas fa-pen"></i></button>

                                    </div>
                                </div>
                            </div>
                        </div>';



                       
                        
                       

                        
                  }while($pros_get_live_class_cont_row_cnt = mysqli_fetch_assoc($pros_get_live_class_cont));


                  echo ' </div>';

            }else
            {

            }








?>