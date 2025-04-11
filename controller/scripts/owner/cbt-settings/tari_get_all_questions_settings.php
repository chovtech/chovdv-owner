<?php

    include('../../../config/config.php');

   
    $tari_get_stored_instituion_id = trim($_POST['tari_get_stored_instituion_id']);

    $campusIDSent = $_POST['campusID'];
    $sessionID = $_POST['sessionID'];
    $subjectID = $_POST['subjectID'];
    $classID = $_POST['classID'];
    $termID = $_POST['termID'];


  
    $fetch = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` INNER JOIN `campus` ON `cbtsetquestionssettings`.`CampusID` = `campus`.`CampusID` WHERE `campus`.`InstitutionID`='$tari_get_stored_instituion_id' AND `cbtsetquestionssettings`.sessionID='$sessionID' AND   (`cbtsetquestionssettings`.`TermOrSemesterID` = '$termID' OR  $termID IS NULL) AND   (`cbtsetquestionssettings`.`CampusID` = '$campusIDSent' OR    $campusIDSent  IS NULL) AND (`cbtsetquestionssettings`.`ClassOrDepartmentID` = '$classID ' OR   $classID   IS NULL) AND (`cbtsetquestionssettings`.`SubjectOrCourseID` = '$subjectID' OR      $subjectID   IS NULL) AND `cbtsetquestionssettings`.DeleteStatus='0'");
  
                               
                               

    $num_row = mysqli_num_rows($fetch);
    $fetch_row = mysqli_fetch_assoc($fetch);

    if($num_row > 0){

       
        do{
        
        $cbtsetquestionssettingsID =  $fetch_row['cbtsetquestionssettingsID'];

        $ClassOrDepartmentName =  $fetch_row['ClassOrDepartmentName'];
        $ClassOrDepartmentID =  $fetch_row['ClassOrDepartmentID'];

        $SubjectOrCourseTitle =  $fetch_row['SubjectOrCourseTitle'];
        $SubjectOrCourseID =  $fetch_row['SubjectOrCourseID'];
    
        $CampusName =  $fetch_row['CampusName'];
        $CampusID =  $fetch_row['CampusID'];

        $TermOrSemesterID =  $fetch_row['TermOrSemesterID'];

        $AssesementType =  $fetch_row['AssesementType'];
        $AssesementCategory =  $fetch_row['AssesementCategory'];
        $AssesementTitle =  $fetch_row['AssesementTitle'];
        $AssesementDate =  $fetch_row['AssesementDate'];
        $AssesementStartTime =  $fetch_row['AssesementStartTime'];
        $AssesementEndTime =  $fetch_row['AssesementEndTime'];

       $question = $fetch_row['question'];
       $TheoryQuestion = $fetch_row['TheoryQuestion'];


       
       $ex = explode(",", $question);

       $extheory = explode(",",  $TheoryQuestion);




       if($AssesementCategory == 'Theory')
       {

             $questionNumbers = count($extheory);
        
       }else
       {

           $questionNumbers = count($ex);

       }

      

       $first = substr($SubjectOrCourseTitle, 0, 1);


       $select_termname = mysqli_query($link, "SELECT * FROM `termalias` WHERE TermOrSemesterID='$TermOrSemesterID' AND CampusID='$CampusID'");
       $select_termname_cnt = mysqli_num_rows($select_termname);
       $slect_fechassoc_row  = mysqli_fetch_assoc($select_termname);

      $TermAliasName =  $slect_fechassoc_row['TermAliasName'];

       
       echo ' <div class="col-md-12 col-lg-6" id="settings_div'.$cbtsetquestionssettingsID.'">
                    <div class="row p-1">
                        <div class ="col-lg-12 col-sm-12">';


                             if( $campusIDSent == '0' ||  $campusIDSent =='0' ||  $campusIDSent == 'NULL')
                             {


                                echo '<small style="font-size: 10px;">'.$CampusName.'</small>';

                             }else
                             {
                               
                             }

                             


                        echo '</div>
                    </div>
                <div class="card mb-3" style="max-width: 540px; border:1px solid #007ffb;">
                    <div class="row g-0">
                        <div class="col-lg-4 col-sm-6 col-md-4">
                            <span class="btn btn-sm btn-icon fw-bold p-0" style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:60px;width:70%;height:100%;justify-content: center; display: flex; align-items: center;">
                               '.$first.'
                            </span>
                        </div>
                        <div class="col-lg-8 col-sm-6 col-md-8">
                            <div class="card-body text-secondary">

                                <div class="row">
                                    <div class="col-lg-8 col-sm-6 col-md-12">
                                        <h5 class="card-title">'.$AssesementTitle.'<br><small style="font-size:15px;">'.$ClassOrDepartmentName.' - '. $SubjectOrCourseTitle.'</small></h5>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-md-12">
                                        <i class="fa fa-eye float-end text-primary" data-bs-toggle="collapse" href="#collapseExample'.$cbtsetquestionssettingsID.'" aria-expanded="false" aria-controls="collapseExample" style="cursor:pointer;text-decoration: underline;font-size:11px;"> View Details</i>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        
                                        <div class="collapse" id="collapseExample'.$cbtsetquestionssettingsID.'">
                                            <div class="card card-body">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <small style="font-size:11px;"><b>Assesement Type:</b> '.$AssesementType.'</small>
                                                </div>
                                                <hr class="m-1">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <small style="font-size:11px;"><b>Assesement Category:</b> '.$AssesementCategory.'</small>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <small style="font-size:11px;"><b>Term:</b> '. $TermAliasName.'</small>
                                                </div>
                                                <hr class="m-1">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <small style="font-size:11px;"><b>No. of Questions:</b> '.$questionNumbers.'</small>
                                                </div>
                                                <hr class="m-1">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <small style="font-size:11px;"><b>Start Time:</b> '.$AssesementStartTime.'</small>
                                                    <small class="ms-2" style="font-size:11px;"><b>End Time:</b> '.$AssesementEndTime.'</small>
                                                </div>
                                                <hr class="m-1">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <small style="font-size:11px;"><b>Date:</b> '.$AssesementDate.'</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-text">
                                
                                
                                 <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-success mb-2 " 
                                        data-bs-toggle="modal" data-bs-target="#prosloadmarexamheremodal" id="prosloadloadsytudentanswerbtn" style="font-size:11px;"
                                        data-id="'.$cbtsetquestionssettingsID.'" data-cat="'.$AssesementCategory.'"  data-camp="'.$CampusID.'"><i class="fas fa-check"></i></button>

                                    <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-danger mb-2 tari_delete_settings" 
                                    data-bs-toggle="modal" data-bs-target="#delete_question_settings_modal" id="tari_delete_settings" style="font-size:11px;"
                                    data-id="'.$cbtsetquestionssettingsID.'" data-cat="'.$AssesementCategory.'" data-camp="'.$CampusID.'"><i class="fas fa-trash"></i></button>

                                    <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-primary mb-2 tari_edit_setting" 
                                    data-bs-toggle="modal" data-bs-target="#tari_edit_setting_modal" id="tari_edit_setting" style="font-size:11px;"
                                    data-id="'.$cbtsetquestionssettingsID.'" data-camp="'.$CampusID.'" data-cat="'.$AssesementCategory.'"><i class="fas fa-edit"></i></button>

                                    <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-warning mb-2 tari_view_settings" 
                                    data-bs-toggle="modal" data-bs-target="#tari_view_settings_modal" id="tari_view_settings" style="font-size:11px;"
                                    data-id="'.$cbtsetquestionssettingsID.'" data-cat="'.$AssesementCategory.'"  data-camp="'.$CampusID.'"><i class="fas fa-eye"></i></button>
                                </div>

                                <button type="button" class="btn btn-sm text-white float-end mt-2 rounded-3 btn-primary mb-2 tari_add_remove_settings" 
                                    data-bs-toggle="modal" 
                                    data-class ="'.$ClassOrDepartmentID.'" 
                                    data-id="'.$cbtsetquestionssettingsID.'" 
                                    data-subject="'.$SubjectOrCourseID.'" 
                                    data-campus="'.$CampusID.'" 
                                    data-term="'.$TermOrSemesterID.'"
                                    data-cat="'.$AssesementCategory.'"  
                                    data-bs-target="#tari_add_remove_settings_modal" 
                                    style="font-size:11px;" id="tari_add_remove_settings"><i class="fas fa-plus"> Add/Remove Questions</i></button>';
                            
                        echo '</div>
                    </div>
                    </div>
                </div>
            </div>';
    

        }while($fetch_row = mysqli_fetch_assoc($fetch));

    
        
    }
    else{

        echo '<div class="col-12 text-center mt-3" id="">

                    <img src="./err.png" class="text-center" style="width:7%;opacity:0.7;" />

                       <p class="pt-2 text-secondary text-center">  No Assesement Settings Available, Please Create Assesement.</p>
                        <a href="javascript:();" type="button"
                            class="btn btn-primary btn-sm"
                            data-bs-toggle="modal" data-bs-target="#tari_settings_modal"
                            id="">
                            <span style="font-size: 10px;">Create Assesement</span>
                        </a>
                </div>'; 
    }
           
      

?>