<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

 $committeeid = $_POST["committeeid"];
 $campusid = $_POST["campusid"];
 
    $slect_all_committee = "SELECT * FROM `member` WHERE `CommitteeID`= '$committeeid' AND deletestatus = 0";
    $ekene_query_link_class = mysqli_query($link, $slect_all_committee);
    $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
    $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);

    if ($ekene_row_cnt_ekene > 0)
    {
        do{
            
        $CommitteeID = $ekene_get_details_subject['CommitteeID'];
        $PositionID = $ekene_get_details_subject['PositionID'];
        $DateIn = $ekene_get_details_subject['DateIn'];
        $UserID = $ekene_get_details_subject['UserID'];
        $Usertype = $ekene_get_details_subject['Usertype'];
        $InstitutionorCampusID = $ekene_get_details_subject['InstitutionorCampusID'];

        $select_position = "SELECT * FROM `position` WHERE `PositionID` = '$PositionID'";
        $ekene_query_position = mysqli_query($link, $select_position);
        $ekene_get_details_position = mysqli_fetch_assoc($ekene_query_position);
        $ekene_row_cnt_position = mysqli_num_rows($ekene_query_position);

        if ($ekene_row_cnt_position > 0)
        {
        $PositionTitle = $ekene_get_details_position['PositionTitle'];
        }
        else
        {
      
        }


        if ($Usertype == 'student')
        {
        
        $ekene_select_Student = "SELECT * FROM `student` WHERE `StudentID` = '$UserID' AND `CampusID` = '$InstitutionorCampusID'";
        $ekene_query_Student = mysqli_query($link, $ekene_select_Student);
        $ekene_get_details_Student = mysqli_fetch_assoc($ekene_query_Student);
        $ekene_row_cnt_Student = mysqli_num_rows($ekene_query_Student);
        
          if ($ekene_row_cnt_Student > 0)
          {
            $StudentFirstName = $ekene_get_details_Student['StudentFirstName'];
            $StudentLastName = $ekene_get_details_Student['StudentLastName'];

            echo '<div class="card chiCourseList">
            <div class="card-body">
                <div class="row g-2">
                    
                    <div class="col-sm-4 col-md-4" style="display: flex;">
                        <div style="margin-left: 10px;">
                            <h6 style="font-size: 14px; font-weight: bold;">Member Name</h6>
                            <small style="color: #9b9a9a;">'.$StudentFirstName.'</small>
                           
                            <small style="color: #9b9a9a;">'.$StudentLastName.'</small>
                        </div>
                        
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <div>
                            <h6 style="font-size: 14px; font-weight: bold;">UserType</h6>
                            <span>'.$Usertype.'</span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="row ">
                            <div class="col-2">
                              
                            </div>
                            <div class="col-8">
                                <div>
                                <h6 style="font-size: 14px; font-weight: bold;">Position</h6>
                                <span>'.$PositionTitle.'</span>
                                </div>
                            </div>
                            <div class="col-2">
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2">
                    <div style="margin-top: 10px;" class="g-5">
                        <i class="fa fa-edit" style="color: green; cursor: pointer;" id="ekene_edit_membericon" data-committee="'.$CommitteeID.'" data-id="'.$UserID.'" data-cam="'.$InstitutionorCampusID.'" data-position="'.$PositionID.'" data-positionname="'.$PositionTitle.'"> Position</i>&nbsp;&nbsp;
                        <i class="fa fa-trash" style="color: red; cursor: pointer;" id="ekene_delete_membericon"  data-cam="'.$InstitutionorCampusID.'" data-committee="'.$CommitteeID.'" data-id="'.$UserID.'"> Delete</i>
                        
                    </div>
                </div>
                </div>
            </div>
        </div>&nbsp;
        ';
          }
         } elseif ($Usertype == 'parent')
         {
          $ekene_select_parent = "SELECT * FROM `parent` WHERE `parentID` = '$UserID' AND `InstitutionID` = '$InstitutionorCampusID'";
          $ekene_query_parent = mysqli_query($link, $ekene_select_parent);
          $ekene_get_details_parent = mysqli_fetch_assoc($ekene_query_parent);
          $ekene_row_cnt_parent = mysqli_num_rows($ekene_query_parent);
            if ($ekene_row_cnt_parent > 0)
            {
              $ParentFirstName = $ekene_get_details_parent['ParentFirstName'];
              $ParentLastName = $ekene_get_details_parent['ParentLastName'];
  
              echo '<div class="card chiCourseList">
              <div class="card-body">
                  <div class="row g-2">
                      
                      <div class="col-sm-4 col-md-4" style="display: flex;">
                          <div style="margin-left: 10px;">
                              <h6 style="font-size: 14px; font-weight: bold;">Member Name</h6>
                              <small style="color: #9b9a9a;">'.$ParentFirstName.'</small>
                             
                              <small style="color: #9b9a9a;">'.$ParentLastName.'</small>
                          </div>
                          
                      </div>
                      <div class="col-sm-2 col-md-2">
                          <div>
                              <h6 style="font-size: 14px; font-weight: bold;">UserType</h6>
                              <span>'.$Usertype.'</span>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-4">
                          <div class="row ">
                              <div class="col-2">
                                
                              </div>
                              <div class="col-8">
                                  <div>
                                  <h6 style="font-size: 14px; font-weight: bold;">Position</h6>
                                  <span>'.$PositionTitle.'</span>
                                  </div>
                              </div>
                              <div class="col-2">
                                
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-2 col-md-2">
                      <div style="margin-top: 10px;" class="g-5">
                          <i class="fa fa-edit" style="color: green; cursor: pointer;" id="ekene_edit_membericon" data-committee="'.$CommitteeID.'" data-id="'.$UserID.'" data-cam="'.$InstitutionorCampusID.'" data-position="'.$PositionID.'" data-positionname="'.$PositionTitle.'"> Position</i>&nbsp;&nbsp;
                          <i class="fa fa-trash" style="color: red; cursor: pointer;" id="ekene_delete_membericon"  data-cam="'.$InstitutionorCampusID.'" data-committee="'.$CommitteeID.'" data-id="'.$UserID.'"> Delete</i>
                          
                      </div>
                  </div>
                  </div>
              </div>
          </div>&nbsp;
          ';
            }
         }else
         {
          $ekene_select_staff = "SELECT * FROM `staff` WHERE `StaffID` = '$UserID' AND `InstitutionID` = '$InstitutionorCampusID'";
          $ekene_query_staff = mysqli_query($link, $ekene_select_staff);
          $ekene_get_details_staff = mysqli_fetch_assoc($ekene_query_staff);
          $ekene_row_cnt_staff = mysqli_num_rows($ekene_query_staff);
            if ($ekene_row_cnt_staff > 0)
            {
              $StaffFirstName = $ekene_get_details_staff['StaffFirstName'];
              $StaffLastName = $ekene_get_details_staff['StaffLastName'];
  
              echo '<div class="card chiCourseList">
              <div class="card-body">
                  <div class="row g-2">
                      
                      <div class="col-sm-4 col-md-4" style="display: flex;">
                          <div style="margin-left: 10px;">
                              <h6 style="font-size: 14px; font-weight: bold;">Member Name</h6>
                              <small style="color: #9b9a9a;">'.$StaffFirstName.'</small>
                             
                              <small style="color: #9b9a9a;">'.$StaffLastName.'</small>
                          </div>
                          
                      </div>
                      <div class="col-sm-2 col-md-2">
                          <div>
                              <h6 style="font-size: 14px; font-weight: bold;">UserType</h6>
                              <span>'.$Usertype.'</span>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-4">
                          <div class="row ">
                              <div class="col-2">
                                
                              </div>
                              <div class="col-8">
                                  <div>
                                  <h6 style="font-size: 14px; font-weight: bold;">Position</h6>
                                  <span>'.$PositionTitle.'</span>
                                  </div>
                              </div>
                              <div class="col-2">
                                
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-2 col-md-2">
                      <div style="margin-top: 10px;" class="g-5">
                          <i class="fa fa-edit" style="color: green; cursor: pointer;" id="ekene_edit_membericon" data-committee="'.$CommitteeID.'" data-id="'.$UserID.'" data-cam="'.$InstitutionorCampusID.'" data-position="'.$PositionID.'" data-positionname="'.$PositionTitle.'"> Position</i>&nbsp;&nbsp;
                          <i class="fa fa-trash" style="color: red; cursor: pointer;" id="ekene_delete_membericon"  data-cam="'.$InstitutionorCampusID.'" data-committee="'.$CommitteeID.'" data-id="'.$UserID.'"> Delete</i>
                          
                      </div>
                  </div>
                  </div>
              </div>
          </div>&nbsp;
          ';
            }
         }

      
    }while($ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class));
  }
  else
  {
       
    $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
    $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
    $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

    if ($pros_select_record_not_found_count > 0) {
        $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
        echo '<center><img class="mb-1" src="' . $pros_general_no_record . '" width="100" alt="">
              <p>No Member found.</p></center>';
    }

  }

  
?>