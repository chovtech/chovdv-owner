<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $classid = $_POST["classid"];
 $campus = $_POST["campus"];
 $term = $_POST["term"];
 $subject = $_POST["subject"];

 $slect_topic_ekene = " SELECT * FROM `curriculumtopic` WHERE `CampusID` = '$campus' AND `SubjectOrCourseID` = '$subject' AND `ClassOrDepartmentID` = '$classid' AND `TermOrSemesterName` = '$term'";
 $ekene_query_link_class = mysqli_query($link, $slect_topic_ekene);
 $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
 $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);
 if ($ekene_row_cnt_ekene > 0)
 {
     do{

        $CurriculumTopicID = $ekene_get_details_subject['CurriculumTopicID'];
        $CampusID = $ekene_get_details_subject['CampusID'];
        $SubjectOrCourseID = $ekene_get_details_subject['SubjectOrCourseID'];
        $ClassOrDepartmentID = $ekene_get_details_subject['ClassOrDepartmentID'];
        $TopicName = $ekene_get_details_subject['TopicName'];
        $TermOrSemesterName = $ekene_get_details_subject['TermOrSemesterName'];
       $select_progess_report = " SELECT * FROM `progressreport` WHERE `CurriculumTopicID` = '$CurriculumTopicID' AND `CampusID`= '$CampusID' AND `SubjectOrCourseID` = '$SubjectOrCourseID' 
       AND `ClassOrDepartmentID` = '$ClassOrDepartmentID' AND  `TermOrSemesterName`= '$TermOrSemesterName' AND `TopicName` = '$TopicName'";
        $ekene_query_link_progress = mysqli_query($link, $select_progess_report);
        $ekene_get_details_progress = mysqli_fetch_assoc($ekene_query_link_progress);
        $ekene_row_cnt_progress = mysqli_num_rows($ekene_query_link_progress);
        if ($ekene_row_cnt_progress > 0)
        {
            $Date = $ekene_get_details_progress['Date'];
             echo '
             <div class="card chiCourseList">
             <div class="card-body">
                 <div class="row g-2">
                     <div class="col-sm-4 col-md-4" style="display: flex;">
                         <div style="margin-top: 5px;">
                             <input class="form-check-input" checked style="height: 20px; width: 20px;" type="checkbox" value="" id="flexCheckIndeterminate" disabled>
                         </div>
                         <div style="margin-left: 30px;" class="mt-2">
                             <h6 style="font-size: 14px;">'.$TopicName.'</h6>
                         </div>
                     </div>
                     <div class="col-sm-2 col-md-2">
                         <!-- Content for the second column -->
                     </div>
                     <div class="col-sm-4 col-md-4">
                         <!-- Content for the third column -->
                     </div>
                     <div class="col-sm-2 col-md-2">
                         <div style="margin-top: 10px;">
                             <div>
                                 <h6 style="font-size: 14px;">Duration</h6>
                                 <span style="color: green;">'.$Date.'</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>&nbsp;&nbsp;
         
         
       ';
        }else
        {

       echo ' <div class="card chiCourseList">
       <div class="card-body">
           <div class="row g-2">
               
               <div class="col-sm-4 col-md-4" style="display: flex;">

                   <div style="margin-top: 5px;">
                   <input class="form-check-input ekenecheckeboxtopic" data-topicid= "'.$CurriculumTopicID.'" data-topic= "'.$TopicName.'"  data-term= "'.$TermOrSemesterName.'"
                    data-classid= "'.$ClassOrDepartmentID.'"  data-camid= "'.$CampusID.'" data-subjectid= "'.$SubjectOrCourseID.'" style="height: 20px; width: 20px;" type="checkbox" >
                   </div>
                   <div style="margin-left: 30px;" class="mt-2">
                       <h6 style="font-size: 14px;">'.$TopicName.'</h6>
                      
                   </div>
                   
               </div>
               <div class="col-sm-2 col-md-2">
                  
               </div>
               <div class="col-sm-4 col-md-4">
                  
               </div>
               <div class="col-sm-2 col-md-2">
                   <div style="margin-top: 10px;">
                   <div>
                   <h6 style="font-size: 14px;">Duration</h6>
                   <span style="color: red;">Not submitted</span>
               </div>
                   </div>
               </div>
           </div>
       </div>
   </div>&nbsp;&nbsp;

 ';
        }


     }while( $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class));
 }
 else
 {
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



