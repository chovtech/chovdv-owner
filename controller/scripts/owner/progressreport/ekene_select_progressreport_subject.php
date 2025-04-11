<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $class_id = $_POST["class_id"];
 $campus = $_POST["campus"];
 $instutition = $_POST["instutition"];
 $termid = $_POST["termid"];
 

 $ekene_sql_class = ("SELECT * FROM `classordepartment` INNER JOIN `courseorsubjectallocation` ON classordepartment.ClassOrDepartmentID = courseorsubjectallocation.ClassOrDepartmentID
  AND classordepartment.CampusID = courseorsubjectallocation.CampusID
   INNER JOIN `subjectorcourse` ON `courseorsubjectallocation`.`SubjectOrCourseID`=`subjectorcourse`.`SubjectOrCourseID`
    WHERE `classordepartment`.`CampusID`= '$campus' AND `courseorsubjectallocation`.`CampusID`='$campus' AND
     `classordepartment`.ClassOrDepartmentID = '$class_id' AND courseorsubjectallocation.ClassOrDepartmentID = '$class_id'
     ORDER BY SubjectOrCourseTitle ASC" );
 $ekene_query_link_class = mysqli_query($link, $ekene_sql_class);
 $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
 $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);

//  echo '<option value="NULL">Select subject</option>';

 if($ekene_row_cnt_ekene > 0)
 {
    
     
     do{
        
        $CourseOrSubjectTeacherUserID = $ekene_get_details_subject['CourseOrSubjectTeacherUserID'];

        $ekene_subject_id = $ekene_get_details_subject['SubjectOrCourseID'];

         $ekene_subject = $ekene_get_details_subject['SubjectOrCourseTitle'];

            $ekene_select_staff = "SELECT * FROM `staff` WHERE `InstitutionID` = '$instutition' AND  `StaffID`= '$CourseOrSubjectTeacherUserID'";
            $ekene_query_link_staff = mysqli_query($link, $ekene_select_staff);
            $ekene_get_details_staff = mysqli_fetch_assoc($ekene_query_link_staff);
            $ekene_row_cnt_staff = mysqli_num_rows($ekene_query_link_staff);
            if ($ekene_row_cnt_staff > 0)
            {
                do{
                    $StaffFirstName = $ekene_get_details_staff['StaffFirstName'];
                    $StaffLastName = $ekene_get_details_staff['StaffLastName'];

                }while($ekene_get_details_staff = mysqli_fetch_assoc($ekene_query_link_staff));
            }


            $slect_topic_ekene = " SELECT * FROM `curriculumtopic` WHERE `CampusID` = '$campus' AND `SubjectOrCourseID` = '$ekene_subject_id' AND `ClassOrDepartmentID` = '$class_id' AND `TermOrSemesterName` = '$termid'";
            $ekene_query_link_topic = mysqli_query($link, $slect_topic_ekene);
            $ekene_get_details_topic = mysqli_fetch_assoc($ekene_query_link_topic);
            $ekene_row_cnt_ekenetopic = mysqli_num_rows($ekene_query_link_topic);
             if ($ekene_row_cnt_ekenetopic > 0)
             {
                do{
                            
                    $CurriculumTopicID = $ekene_get_details_topic['CurriculumTopicID'];
                    $CampusID = $ekene_get_details_topic['CampusID'];
                    $SubjectOrCourseID = $ekene_get_details_topic['SubjectOrCourseID'];
                    $ClassOrDepartmentID = $ekene_get_details_topic['ClassOrDepartmentID'];
                    $TopicName = $ekene_get_details_topic['TopicName'];
                    $TermOrSemesterName = $ekene_get_details_topic['TermOrSemesterName'];

                    $select_progess_report = " SELECT * FROM `progressreport` WHERE `CurriculumTopicID` = '$CurriculumTopicID' AND `CampusID`= '$CampusID' AND `SubjectOrCourseID` = '$SubjectOrCourseID' 
                    AND `ClassOrDepartmentID` = '$ClassOrDepartmentID' AND  `TermOrSemesterName`= '$TermOrSemesterName' AND `TopicName` = '$TopicName'";
                    $ekene_query_link_progress = mysqli_query($link, $select_progess_report);
                    $ekene_get_details_progress = mysqli_fetch_assoc($ekene_query_link_progress);
                    $ekene_row_cnt_progress = mysqli_num_rows($ekene_query_link_progress);

                }while( $ekene_get_details_topic = mysqli_fetch_assoc($ekene_query_link_topic));
             }

             if ($ekene_row_cnt_ekenetopic != 0) {
                // Calculate the percentage
                $percentage = ($ekene_row_cnt_progress / $ekene_row_cnt_ekenetopic) * 100;
                echo '<div style="padding: 20px;">
                <div class="card chiCourseList">
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-sm-4 col-md-4" style="display: flex; align-items: center;">
                                <div style="margin-left: 10px;">
                                    <h6 style="font-size: 14px;" value="'.$ekene_subject_id.'">'.$ekene_subject.'</h6>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2">
                            <span>'.$StaffFirstName.' '.$StaffLastName.'</span>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="row g-2" style="margin-top: 5px;">
                                    <div class="col-2">
                                        <span style="font-size: bold;">'.$percentage.'%</span>
                                    </div>
                                    <div class="col-8">
                                        <div style="margin-top: 5px;">
                                            <div class="progress" style="height: 7px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$percentage.'%" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2">
                                <div style="margin-top: 10px;">
                                    
                                    <i class="fa fa-eye" style="color: blue; cursor: pointer;" id="view_progressreporticon" data-id="'.$ekene_subject_id.'" data-bs-toggle="modal" data-bs-target="#ekene_progress_report2"> Report</i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
                
            
            } else {
                echo '<div style="padding: 20px;">
                <div class="card chiCourseList">
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-sm-4 col-md-4" style="display: flex; align-items: center;">
                                <div style="margin-left: 10px;">
                                    <h6 style="font-size: 14px;" value="'.$ekene_subject_id.'">'.$ekene_subject.'</h6>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2">
                            <span>'.$StaffFirstName.' '.$StaffLastName.'</span>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="row g-2" style="margin-top: 5px;">
                                    <div class="col-2">
                                        <span style="font-size: 11px; color: red;">No record</span>
                                    </div>
                                    <div class="col-8">
                                        <div style="margin-top: 5px;">
                                            <div class="progress" style="height: 7px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2">
                            <div style="margin-top: 10px;">
                                <i class="fa fa-eye" style="cursor: pointer; pointer-events: none;"> Report</i>
                            </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            ';
                
            }
          
         
           
        //  echo '<option value="'.$ekene_subject_id.'">'.$ekene_subject.'</option>';
       
     }while($ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class));
 }
 else{
    $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
    $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
    $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

    if ($pros_select_record_not_found_count > 0) {
        $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
        echo '<center><img class="mb-1" src="' . $pros_general_no_record . '" width="100" alt="">
            <p>No record found.</p></center>';
    }
 }
?>