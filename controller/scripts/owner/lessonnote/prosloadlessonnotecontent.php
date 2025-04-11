<?php




                include('../../../config/config.php');

            
                $userID = $_POST['userID'];
                $usertype = $_POST['usertype'];
                $campusID = $_POST['campusID'];
                $prosselectsession = $_POST['prosselectsession'];
                $term = $_POST['term'];
                $classid = $_POST['classid'];
                $instutitionID= $_POST['instutitionID'];
                $date_time = date('Y-m-d H:i:s');


              


                $slecetlesson = mysqli_query($link, "SELECT * FROM `lessonnote` 
                INNER JOIN `subjectorcourse` ON `lessonnote`.`SubjectOrCourseID` = `subjectorcourse`.`SubjectOrCourseID`
                 WHERE `lessonnote`.`CampusID`='$campusID' AND `lessonnote`.`ClassOrDepartmentID`='$classid' AND `lessonnote`.`TermOrSemesterID`='$term' AND `lessonnote`.`sessionName`='$prosselectsession' AND  `lessonnote`.`Status`='0'");

                 $slecetlessonrowcnt = mysqli_num_rows($slecetlesson);
                 $slecetlessonrowcntrow = mysqli_fetch_assoc($slecetlesson);




                 if( $slecetlessonrowcnt  > 0)
                 {


                    echo '<div class="row"> ';

                       do{




                                    $SubjectOrCourseTitle = $slecetlessonrowcntrow['SubjectOrCourseTitle'];
                                    $File = $slecetlessonrowcntrow['File'];
                                    $LessonId = $slecetlessonrowcntrow['LessonId'];
                                    $FileType = $slecetlessonrowcntrow['FileType'];

                                    $CampusIDnew = $slecetlessonrowcntrow['CampusID'];
                                    $SubjectOrCourseTitle = $slecetlessonrowcntrow['SubjectOrCourseTitle'];

                                   

                                      
                                     




                                         echo '<div class="col-sm-4 mb-4 prossubjectfullcontenthere'.$LessonId.'">

                                                  <textarea hidden="hidden" id="prosloadbase64contentforlessonnote'.$LessonId.'" name="w3review" rows="4" cols="50">'. $File .'</textarea>

                                                        <input type="hidden" value="'.$FileType.'" class="form-control prosloadfiletypeforlessonnote'.$LessonId.'" >
                                                    <div class="card  " style="background:#FCFCFC;border:1px solid #DFE0EB;height:180px;border-radius:15px;">
                                                        <div class="card-header" style="background:#FCFCFC;border-top-right-radius:15px;border-top-left-radius:15px;">
                                                            <div class="dropdown" style="margin-right:10rem;position:absolute;top:0.5rem;right:-8.5rem;">

                                                                <span class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;font-size:14px;"></span> 

                                                                <div class="dropdown-menu" style="width:30px !important;height:140px;background-color:white;border-radius:10px;">
                                                                   
                                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#pros-deletelessonemodalbtn" id="prosloaddeletemodalherebtn" data-camp="'.$CampusIDnew.'" data-id="'.$LessonId.'" data-subjectname="'. $SubjectOrCourseTitle .'" style="cursor:pointer;font-size:12px;">  <i class="fa fa-trash text-danger" aria-hidden="true"></i>  Delete </a>
                                                                
                                                                    
                                                                </div>

                                                            </div>

                                                            <h3 class="card-title" style="font-weight:600;text-transform: uppercase;font-size: 0.87rem;">Lesson Note</h3>
                                                            
                                                        </div>

                                                        <div class="card-body">
                                                        <h5 class="section-title prosdisplaycampusnameedit144" style="font-weight:600;font-size:14px;">'. $SubjectOrCourseTitle.'</h5>


                                                        

                                                            <a  class="prosdowloadlessoncontentbtn" data-id="'.$LessonId.'" style="color:blue;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Download <i class="fa fa-download"></i></a>
                                                    </div>

                                                    </div>
                                            </div>';

                        

                       }while($slecetlessonrowcntrow = mysqli_fetch_assoc($slecetlesson));

                       echo '</div>';

                 }else
                 {



                            echo '<div align="center" id="pros-loadnofield-selectedoptionalfee-content-feedrive">';
                
                                    $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                                    $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                    $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                    if ($pros_select_record_not_found_count > 0) {
                                    

                                    $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                                    echo '<img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                                    <p>No record found.</p>';
                                    }
                            echo '</div>';



                 }



                
     





     ?>


   