<?php



 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 
 $ekene_campus = $_POST["ekene_campus"];

 $diplay_class = $_POST["diplay_class"];
 $ekene_subject = $_POST["ekene_subject"];
 
 $ekene_select_fromassignmentsettings =" SELECT * FROM `assignmentsettings` WHERE `CampusID` = '$ekene_campus' 
 AND `ClassOrDepartmentID` = '$diplay_class' AND `SubjectOrCourseID` = '$ekene_subject' AND  `deletestatus` = 0";

   $ekene_mysqli_query = mysqli_query($link, $ekene_select_fromassignmentsettings);
   $ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_query);
  $ekene_row_cnt_ekene = mysqli_num_rows($ekene_mysqli_query);

 if($ekene_row_cnt_ekene > 0)
 {
      echo '<div class="row" style="display: flex;">';
     
     do{
     
        $AssignmentTitle = $ekene_get_details['AssignmentTitle'];
        $Startdate = $ekene_get_details['Startdate'];
        $submissiondate = $ekene_get_details['submissiondate'];
        $CampusID = $ekene_get_details['CampusID'];
        $AssignmentSettingsID = $ekene_get_details['AssignmentSettingsID'];

        $CampusID = $ekene_get_details['CampusID'];
        $AssignmentSettingsID = $ekene_get_details['AssignmentSettingsID'];
        $ekene_bage = "SELECT * FROM `assignmentanswer` WHERE `CampusID` = '$ekene_campus' AND `AssignmentSettingsID` = '$AssignmentSettingsID' AND `ClassOrDepartmentID` = '$diplay_class' AND `SubjectOrCourseID` = '$ekene_subject'";

        $ekene_mysqli_bage= mysqli_query($link, $ekene_bage);
        $ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_bage);
       $ekene_row_cnt_bage = mysqli_num_rows($ekene_mysqli_bage);
       

        echo '
        <div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get">
       
            <div class="topSecCards" style="width: 100%;">
            <span class="badge bg-danger mx-2 float-end">'.$ekene_row_cnt_bage.' Submitted</span>
                 <div align="center" style="margin-top: 18px; padding-top: 20px;">
                    <i class="fas fa-pencil-alt" style="font-size: 25px; cursor: pointer;"  data-bs-toggle="modal"
                    data-bs-target="#edit_assignmenttitle" id="ekene_edit_assignmentpencil" data-cam="'.$CampusID.'" data-title="'.$AssignmentTitle.'" data-ass="'.$AssignmentSettingsID.'"></i>
                    <h6 style="font-weight: bold; cursor: pointer; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 5px; font-size: 14px;" class="ekenedisplaysubmissiondate_title'.$AssignmentSettingsID.'"> '. $AssignmentTitle.'</h6>
                    <p style="font-weight: 500; color: #b8b8b8;">Start date: <span>'.$Startdate.'</span></p>
                    <p style="font-weight: 500; color: #b8b8b8;">Submission date: <span>'.$submissiondate.'</span></p>
                </div>
        
                <div style="padding: 7px;">
                    <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                        <div style="padding: 5px;" align="center">
                        
                            <span class="abba_tooltip">
                                <button type="button" class="btn btn-sm text-white float-end m-1  rounded-3 btn-primary mb-2"  data-cam="'.$CampusID.'" data-id="'.$AssignmentSettingsID.'"   id="ekene_view_fullassignment"    data-bs-toggle="modal" data-bs-target="#ekene_save_change"  style="font-size: 11px;">
                                    <i class="fa fa-eye" style="color: white; cursor: pointer;" aria-hidden="true"></i>
                                </button>
                                <span class="abba_tooltiptext">View assignment</span>
                            </span>
                            &nbsp;
        
                            <span class="abba_tooltip">
                                <button type="button" class="btn btn-sm text-white float-end m-1  rounded-3 btn-danger mb-2"  data-cam="'.$CampusID.'" data-id="'.$AssignmentSettingsID.'"  data-bs-toggle="modal" data-bs-target="#ekeneloaddeletemodal" id="ekene_delete_fullassignment" style="font-size: 11px;" >
                                    <i class="fas fa-trash"></i>
                                </button>
                                <span class="abba_tooltiptext">Trash</span>
                            </span>
                            &nbsp;
                            <!-- Add Download Icon -->
                            <span class="abba_tooltip">
                                <button type="button" class="btn btn-sm text-white float-end m-1 rounded-3 btn-success mb-2" data-cam="'.$CampusID.'" data-id="'.$AssignmentSettingsID.'"  data-bs-toggle="modal" data-bs-target="#ekene_view_dowloadquestion" id="ekene_download_fullassignment" style="font-size: 11px;">
                                    <i class="fas fa-download"></i>
                                </button>
                                <span class="abba_tooltiptext">Download</span>
                            </span>
                            &nbsp;
                            <!-- Add Mark Icon -->
                            <span class="abba_tooltip">
                                <button type="button" class="btn btn-sm text-white float-end m-1 rounded-3 btn-info mb-2"data-cam="'.$CampusID.'" data-id="'.$AssignmentSettingsID.'"  data-bs-toggle="modal" data-bs-target="#ekene_mark_question" id="ekene_mark_fullassignment" style="font-size: 11px;">
                                    <i class="fas fa-check"></i>
                                </button>
                                <span class="abba_tooltiptext">Mark</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
        ';

        
         
     }while($ekene_get_details= mysqli_fetch_assoc($ekene_mysqli_query));
     echo '</div>';
 }
 else{
   

    $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
    $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
    $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

    if ($pros_select_record_not_found_count > 0) {
        $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
        echo '
    
        <center><img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">
        <p style="color: black;">No Record Found</p> </center>';
    }



 }


  

?>