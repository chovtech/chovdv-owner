<?php
include("../../../config/config.php");



    $ekene_campusnew = $_POST["ekene_campusnew"];

    $ekene_assignmentid = $_POST["ekene_assignmentid"];
    $ekene_title = $_POST["ekene_title"];

    $ekene_select_fromassignmentsettings =" SELECT * FROM `assignmentsettings` WHERE `AssignmentSettingsID` = '$ekene_assignmentid' AND `CampusID` = '$ekene_campusnew' 
    ";

        $ekene_mysqli_query = mysqli_query($link, $ekene_select_fromassignmentsettings);
        $ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_query);
      $ekene_row_cnt_ekene = mysqli_num_rows($ekene_mysqli_query);

      if($ekene_row_cnt_ekene > 0)
      {
        $AssignmentType = $ekene_get_details['AssignmentType'];
        $Overallscore = $ekene_get_details['Overallscore'];
        $submissiondate = $ekene_get_details['submissiondate'];
        $AssignmentTitle = $ekene_get_details['AssignmentTitle'];
        $Startdate = $ekene_get_details['Startdate'];
        $AssignmentStartTime = $ekene_get_details['AssignmentStartTime'];
        $AssignmentDate = $ekene_get_details['AssignmentDate'];
        $AssignmentEndTime = $ekene_get_details['AssignmentEndTime'];
        $AssignmentEndTime = $ekene_get_details['AssignmentEndTime'];

         
         $timenew = date('H:i', strtotime(str_replace('PM', ' PM', str_replace('AM', ' AM', $AssignmentStartTime))));

        $timenewend = date('H:i', strtotime(str_replace('PM', ' PM', str_replace('AM', ' AM',  $AssignmentEndTime))));
        
     
        


        echo ' <div class="col-md-12 col-lg-12">
                <div class="form-group abba_local-forms ekene_select_class">
                    <label>Title<span style="color:orangered;">*</span> </label>
                    <input class="form-control"  value="'.$AssignmentTitle.'" id="ekene_titleedit" placeholder="Enter the Title">
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="form-group abba_local-forms ekene_select_class">
                    <label>overall score<span style="color:orangered;">*</span> </label>
                    <input class="form-control" id="overall_scoreedit" value="'.$Overallscore.'" type="number"placeholder="Enter the overall score">
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                
                <div class="form-group abba_local-forms ekene_select_class">
                    <label>Cbt base or not<span style="color:orangered;">*</span> </label>
                    <select class="form-control" id="cbtornotedit">
                        <option value="NULL">Select</option>';
                           
                        if($AssignmentType == 'no')
                        {
                          echo '<option  value="yes">Yes</option>
                            <option selected value="no">No</option>';
                        }else{

                            echo '<option selected  value="yes">Yes</option>
                            <option  value="no">No</option>';
                        }

                 echo   '</select>
                </div>
            

            </div>
            
            <div class="row ekene_hidecbtcontent" id="ekene_hidecbt1">
            <div class="col-md-12 col-lg-12">
                <div class="form-group abba_local-forms ekene_select_class">
                    <label>Date<span style="color:orangered;">*</span> </label>
                    <input type="date" value="'.$AssignmentDate.'" class="form-control" id="hidden_dateedit">
                </div>
            </div>

            <div class="col-md-12 col-lg-12">
                <div class="form-group abba_local-forms ekene_select_class">
                    <label>Start time<span style="color:orangered;">*</span> </label>
                    <input type="time" value="'.$timenew.'" class="form-control" id="start_timeedit">
                </div>
            </div>

            <div class="col-md-12 col-lg-12">
                <div class="form-group abba_local-forms ekene_select_class">
                    <label>End time<span style="color:orangered;">*</span> </label>
                    <input type="time" value="'.$timenewend.'" class="form-control" id="end_timeedit">
                </div>
            </div>
            </div>

               

            <div class="row  ekene_hidenotcbtcontent">
            <div class="col-md-12 col-lg-12">
                <div class="form-group abba_local-forms ekene_select_class">
                    <label> Start Date<span style="color:orangered;">*</span> </label>
                    <input type="date" class="form-control"  value="'.$Startdate.'" id="start_dateedit">
                </div>
            </div>

            <div class="col-md-12 col-lg-12">
                <div class="form-group abba_local-forms ekene_select_class">
                    <label>Submission Date<span style="color:orangered;">*</span> </label>
                    <input type="date" class="form-control" value="'.$submissiondate.'" id="submission_dateedit">
                </div>
            </div>

          
            </div>



                <div class="col-md-12 col-lg-12">
                  <div class="form-group abba_local-forms ekene_select_class">
                      <label>Instruction<span style="color:orangered;">*</span> </label>
                      <textarea class="form-control" value="'.$Instruction.'" id="instrcutionedit"></textarea>
                  </div>
              </div>

            
            ';



        
      }

?>  