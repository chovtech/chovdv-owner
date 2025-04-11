<?php

        include('../../config/config.php');

        $IntitutionID = $_POST['IntitutionID'];
        $UserID = $_POST['UserID'];
        $Session = $_POST['Session'];
        $classID = $_POST['classID'];
        $campusID = $_POST['campusID'];

        $UserType = $_POST['usertype'];


       
      

        $select_institutiondetails = mysqli_query($link, "SELECT * FROM `institution` WHERE InstitutionID='$IntitutionID'");
        $select_institutiondetailscnt = mysqli_num_rows($select_institutiondetails);
        $select_institutiondetailscntrow = mysqli_fetch_assoc($select_institutiondetails);



        $GeneralUrl = $select_institutiondetailscntrow['CustomUrl'];
        $schlink = 'https://' . $GeneralUrl . '/sign-in';


        if($UserType == 'admin')
        {




          


            
            $select_menuassign_verify = mysqli_query($link,"SELECT * FROM `menupermission` WHERE UserID='$UserID'");
            $select_menuassign_verifycnt =  mysqli_num_rows($select_menuassign_verify);
            $select_menuassign_verifycntrow =  mysqli_fetch_assoc($select_menuassign_verify);
            
           


            if($select_menuassign_verifycnt > 0)
            {


                        $pros_amin_menu = $select_menuassign_verifycntrow['AdministrativeMenu'];

                       $submenus = json_decode($pros_amin_menu, true);



                       
            
                        // Replace 'submenu_id' and 'desired_submenu' with the actual submenu ID you want to retrieve
                        $desired_submenu = '41';
                        
                        $status = null;
                        
                        foreach ($submenus as $submenu_group) {
                            foreach ($submenu_group as $submenu) {
                                if ($submenu['submenu_id'] == $desired_submenu) {
                                    $status = $submenu['pros_menuper_status'];
                                    break 2; // Break out of both loops
                                }
                            }
                        }



                    if($status == null)
                    {

                        $finaladminpreviledge = '';

                    }else
                    {

                        $previledgestatus =  implode(", ", $status);

                        if($previledgestatus == '1, 2')
                        {
  
                         $finaladminpreviledge = 'editanddel';
  
                        }else if($previledgestatus == '1')
                        {
                          $finaladminpreviledge = 'edit';
  
                        }else if($previledgestatus == '2')
                        {
  
                          $finaladminpreviledge = 'del';
                        }

                    }

                     
            }else
            {

                echo 'notfound';

            }
           

         

            $selectadminssionrecord = mysqli_query($link, "SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN 
            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID INNER JOIN `campus` ON `campus`.`CampusID` = admissionchilddetails.CampusID WHERE 
            `campus`.Admin='$UserID'  AND  `admissionparentdetails`.InstitutionID='$IntitutionID'
            AND admissionchilddetails.TrashStatus  != '1' AND  
            (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   
            (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND  
            (admissionchilddetails.sessionName='$Session' OR $Session IS NULL)  ORDER BY admissionchilddetails.FirstName ASC");
            $selectadminssionrecordcnt = mysqli_num_rows($selectadminssionrecord);
            $selectadminssionrecordcntrow = mysqli_fetch_assoc($selectadminssionrecord);  

            
        }else
        {

                    $selectadminssionrequery = "SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                    classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID
                    WHERE `admissionparentdetails`.InstitutionID='$IntitutionID' AND admissionchilddetails.TrashStatus  != '1' 
                    AND (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) 
                    AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL)";  
                   
                    
                    
                     if ($Session !== 'NULL') {
                         
                           $selectadminssionrequery.= "AND admissionchilddetails.sessionName='$Session'";
                         
                         
                     }else
                     {
                         
                     }
                     
                     
                     $selectadminssionrequery.= "ORDER BY admissionchilddetails.FirstName ASC";
                    
                     $selectadminssionrecord = mysqli_query($link, $selectadminssionrequery);
                     $selectadminssionrecordcnt = mysqli_num_rows($selectadminssionrecord);
                     $selectadminssionrecordcntrow = mysqli_fetch_assoc($selectadminssionrecord);
                    
                    


        }


    //   AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL)
      

if (!$selectadminssionrecord) {

    // Query execution error
    die(mysqli_error($link));

}
if ($selectadminssionrecordcnt > 0) {


    echo '
       


    
   
   
<span style="margin-top:-5px;display:none;"  id="prosgeneralchnagestatus">
    <div class="dropdown dropdown-sm">

    <span   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  ><span type="button"      class="text-info" style="font-size:14px;border-radius:7px;"  > 
           <i class="fa fa-pen " ></i> Change status </span></span>
        

       
        <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink" style="background: #f7fff7;border:none;">
            <li>
                 <a   data-currentstatus="2" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-success prosloadadminstatusbtn"  data-toggle="tooltip"> <i class="fa fa-pen text-sucess" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Admit</i> </a>
            </li>

            <li>
            <a    data-currentstatus="1" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger prosloadadminstatusbtn"  data-toggle="tooltip"> <i class="fa fa-pen text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Decline</i> </a>
            </li>

            <li>
                    <a  data-currentstatus="0" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning prosloadadminstatusbtn"  data-toggle="tooltip"> <i class="fa fa-pen text-warning" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Pending</i> </a>
            </li>

        </ul>
    </div>

        </span >&nbsp;&nbsp;
                <span  class="prosgeneralcommentloadbtnbulk" data-bs-toggle="modal" data-bs-target="#prosmodalsmsadmissionmessage" style="font-size:14px;display:none;" id="prosgeneralcommentchatbulk">
                        <a href="javascript:void();" >Chat <i class="fa fa-comment-dots" aria-hidden="true"></i></a>
                </span>&nbsp;&nbsp;

                <span class="" id="prosgeneralbulkdel" style="font-size:14px;display:none;">
                            <a hre="javascript:void();" data-bs-toggle="modal" data-bs-target="#pros-deleteapplicant-modal"  class="prosremoveapplicantgetdetails" style="font-size:15px;color:red;cursor:pointer;"><i class="fa fa-trash"  aria-hidden="true"></i></a>
                </span>

              
    
    <table id="table2" class="table" style="background-color:white; border-collapse: collapse;">
                            <thead style="padding:5px;margin:0;"> 
                           
                                <tr style="color: #636161;">
                                    <th>
                                        <div style="display:flex;">
                                           
                                            <div class="form-check">
                                                <input class="form-check-input check-all" style="height: 18px; width: 18px;"
                                                    type="checkbox" id="proscheckAllapplicant">
                                                  <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                            
                                        </div>
                                    </th>
                                    <th> Name</th>
                                    <th>Exam score</th>
                                    <th class="d-none d-sm-table-cell">Status</th>
                                    <th class="d-none d-sm-table-cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>';


    $num = 1;

    do {



        // ParentLastName 


        $student_firstName = $selectadminssionrecordcntrow['FirstName'];
        $student_secondName = $selectadminssionrecordcntrow['MiddleName'];
        $student_LastName = $selectadminssionrecordcntrow['LastName'];
        $sessionName = $selectadminssionrecordcntrow['sessionName'];
        $ClassTemplateName = $selectadminssionrecordcntrow['ClassTemplateName'];
        $ChildDetailID = $selectadminssionrecordcntrow['ChildDetailID'];
        $CampusID = $selectadminssionrecordcntrow['CampusID'];
        $sessionName = $selectadminssionrecordcntrow['sessionName'];
        $DOB = $selectadminssionrecordcntrow['DOB'];
        $Gender = $selectadminssionrecordcntrow['Gender'];
        $Status = $selectadminssionrecordcntrow['Status'];
        $Photo = $selectadminssionrecordcntrow['Photo'];



        $Phone_no = $selectadminssionrecordcntrow['Phone'];
        $Email = $selectadminssionrecordcntrow['Email'];
        $ParentFirstName = $selectadminssionrecordcntrow['ParentFirstName'];
        $ParentFMiddleName = $selectadminssionrecordcntrow['ParentFMiddleName'];
        $ParentLastName = $selectadminssionrecordcntrow['ParentLastName'];
        $Country = $selectadminssionrecordcntrow['Country'];
        $LGA = $selectadminssionrecordcntrow['LGA'];
        $State = $selectadminssionrecordcntrow['State'];
        $City = $selectadminssionrecordcntrow['City'];
        $HomeAddress = $selectadminssionrecordcntrow['HomeAddress'];




        $select_userloginfin = "SELECT * FROM userlogin WHERE UserID ='$ChildDetailID' AND UserType = 'applicant' AND InstitutionIDOrCampusID = '$CampusID'";
        $select_userlogin_resultfin = mysqli_query($link, $select_userloginfin);
        $select_userlogin_result_cnt_rowfin = mysqli_fetch_assoc($select_userlogin_resultfin);
        $select_userlogin_result_cntfin = mysqli_num_rows($select_userlogin_resultfin);

        // $UserPassword =  $select_userlogin_result_cnt_rowfin['UserPassword'];
        $UserRegNumberOrUsername = $select_userlogin_result_cnt_rowfin['UserRegNumberOrUsername'];





        $select_cbtquestionsanswers = "SELECT * FROM `cbtquestionsanswers` WHERE `CampusID`='$CampusID' AND `StudentID`='$ChildDetailID' AND sessionID='$sessionName' AND `objective_status`='1'";
        $select_cbtquestionsanswers_result = mysqli_query($link, $select_cbtquestionsanswers);
        $select_cbtquestionsanswers_result_row = mysqli_fetch_assoc($select_cbtquestionsanswers_result);
        $select_cbtquestionsanswers_result_cnt = mysqli_num_rows($select_cbtquestionsanswers_result);




        $sqlGetstates = "SELECT * FROM `states` WHERE countryID='$Country' AND StateID='$State' ORDER BY StateName";
        $queryGetstates = mysqli_query($link, $sqlGetstates);
        $rowGetstates = mysqli_fetch_assoc($queryGetstates);
        $countGetstates = mysqli_num_rows($queryGetstates);
        $StateName = $rowGetstates['StateName'];




        $sqlGetcities = "SELECT * FROM `cities` WHERE StateID='$State' AND CityID='$LGA' ORDER BY CityName";
        $queryGetcities = mysqli_query($link, $sqlGetcities);
        $rowGetcities = mysqli_fetch_assoc($queryGetcities);
        $countGetcities = mysqli_num_rows($queryGetcities);
        $LGAName = $rowGetcities['CityName'];


        $sqlCountry = mysqli_query($link, "SELECT * FROM `countries` WHERE countryID='$Country'");
        $sqlCountryrow = mysqli_num_rows($sqlCountry);
        $sqlCountryrowcnt = mysqli_fetch_assoc($sqlCountry);
        $countryName = $sqlCountryrowcnt['CountryName'];



        if ($Status == '0') {

            $statustitl = 'Pending';
            $statusbtncolor = 'btn-warning';
            $status_state = '0';



        } else if ($Status == '1') {

            $statustitl = 'Declined';
            $statusbtncolor = 'btn-danger';
            $status_state = '1';


        } else if ($Status == '2') {

            $statustitl = 'Admitted';
            $statusbtncolor = 'btn-success';
            $status_state = '2';

        }





                                 echo '<tr class="showHideRow" data-id="hidden_row' . $ChildDetailID . '">
                                                    <td>
                                                    
                                                        <div style="display: flex;">
                                                           
                                                            <div class="form-check">
                                                                 
                                                                <input class="form-check-input proscheckinputapplicant" data-campus="' . $CampusID . '" data-inst="' . $IntitutionID . '" data-student="' . $ChildDetailID . '" data-email="' . $Email . '" data-phone="' . $Phone_no . '" data-link="' . $schlink . '"  data-regno="' . $UserRegNumberOrUsername . '" style="height: 18px; width: 18px;"
                                                                    type="checkbox">
                                                                <label class="form-check-label"></label>
                                                            </div>



                                                           


                                                            <a style="margin-left:20px;color:blue;font-size:20px;"> 
                                                                  <i style="color:#b3b3b3;" class="bx bx-chevron-down-circle"></i> 
                                                            </a>

                                                            <span style="margin-left:10px; margin-top:5px;"> </span>
                                                        </div>
                                                    </td>
                                                   
                                                    <td>';






                                                    if ($Status == '0') {
                                                        echo ' <i class="fa fa-circle text-warning d-block d-sm-none" style="font-size:7px;" aria-hidden="true"></i>';

                                                    } else if ($Status == '1') {
                                                        echo '  <i class="fa fa-circle text-danger d-block d-sm-none" style="font-size:7px;" aria-hidden="true"></i>';

                                                    } else {
                                                        echo ' <i class="fa fa-circle text-success d-block d-sm-none" style="font-size:7px;" aria-hidden="true"></i>';
                                                    }


                                                          echo ' <span >' . $student_firstName . '  ' . $student_LastName . '</span>
                                                    </td>
                                                    <td>';

                                                        if ($select_cbtquestionsanswers_result_cnt > 0) {
                                                            $score = '';
                                                            $totscore = '';

                                                            do {

                                                                $subjectid = $select_cbtquestionsanswers_result_row['SubjectOrCourseID'];
                                                                $currect_answer = explode(',', $select_cbtquestionsanswers_result_row['Answer']);
                                                                $student_answer = explode(',', $select_cbtquestionsanswers_result_row['studentAnswer']);

                                                                $cnt_currect_answer = count($currect_answer);

                                                                $intersect_togetmarks = count(array_intersect_assoc($student_answer, $currect_answer));

                                                                $score += $intersect_togetmarks;
                                                                $totscore += $cnt_currect_answer;

                                                            } while ($select_cbtquestionsanswers_result_row = mysqli_fetch_assoc($select_cbtquestionsanswers_result));


                                                            $scorenew = $score;
                                                            $totscorenew = $totscore;

                                                            echo '<button type="button" class=" btn " style="background-color: #bdffe0;border: 1px solid #01df77;color: #009751;font-size:11px;"  id="pros-changestaupbtn" ><i class="fa fa-eye " id="view-result-btn"></i> ' . $scorenew . ' / ' . $totscorenew . ' </button>';
                                                        } else {

                                                            echo '<button type="button" class="btn btn-sm" style="background-color: #f8a5c2; border: 1px solid #e84580; color: #c13584; font-size: 11px; border-radius: 7px;">Unavailable</button>
                                                                                                                        ';
                                                        }
                                                  echo '</td>';


                                 echo '<td class="d-none d-sm-table-cell">';
                                    echo '<span style="margin-top:-5px;" id="abba_stud_stat_span">
                                                    <div class="dropdown dropdown-sm">

                                                    <span   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  class="prosgeneralupdatesatus'.$ChildDetailID.'"><span type="button"   data-status="'.$status_state.'"  data-student="' . $ChildDetailID . '"  class="btn ' . $statusbtncolor . '  btn-sm text-light" style="font-size:11px;border-radius:7px;"  > 
                                                           <i class="fa fa-pen " ></i> ' . $statustitl . ' </span></span>
                                                        

                                                       
                                                        <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink" style="background: #f7fff7;border:none;">
                                                            <li>
                                                                 <a  data-campus="' . $CampusID . '" data-student="' . $ChildDetailID . '" data-currentstatus="2" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-success prosloadadminstatusbtn"  data-toggle="tooltip"> <i class="fa fa-pen text-sucess" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Admit</i> </a>
                                                            </li>
            
                                                            <li>
                                                            <a   data-campus="' . $CampusID . '" data-student="' . $ChildDetailID . '" data-currentstatus="1" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger prosloadadminstatusbtn"  data-toggle="tooltip"> <i class="fa fa-pen text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Decline</i> </a>
                                                            </li>

                                                            <li>
                                                                    <a   data-campus="' . $CampusID . '" data-student="' . $ChildDetailID . '" data-currentstatus="0" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning prosloadadminstatusbtn"  data-toggle="tooltip"> <i class="fa fa-pen text-warning" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Pending</i> </a>
                                                            </li>
            
                                                        </ul>
                                                    </div>
                                                
                                                </span>';

       

        echo '</td>';


        echo '<td class="d-none d-sm-table-cell">';

             
                if($UserType == 'admin')
                {

                    if($finaladminpreviledge == 'editanddel')
                    {

                        echo '<a href=""  class="prosgeneralcommentloadbtn" data-bs-toggle="modal" data-campus="' . $CampusID . '" data-email="' . $Email . '" data-phone="' . $Phone_no . '" data-link="' . $schlink . '"  data-regno="' . $UserRegNumberOrUsername . '" data-student="' . $ChildDetailID . '" data-bs-target="#prosmodalsmsadmissionmessage" style=" font-size: 15px;"><i class="fa fa-comment-dots" aria-hidden="true"></i></a>
                        <a  href="javascript:void();" data-campus="' . $CampusID . '" data-inst="' . $IntitutionID . '" data-student="' . $ChildDetailID . '" class="prosremoveapplicantgetdetails"  data-bs-toggle="modal" data-bs-target="#pros-deleteapplicant-modal" style="font-size:15px;color:red;"><i class="fa fa-trash"  aria-hidden="true"></i></a>';
                    }else if($finaladminpreviledge == 'edit')
                    {

                        echo '<a href=""  class="prosgeneralcommentloadbtn" data-bs-toggle="modal" data-campus="' . $CampusID . '" data-email="' . $Email . '" data-phone="' . $Phone_no . '" data-link="' . $schlink . '"  data-regno="' . $UserRegNumberOrUsername . '" data-student="' . $ChildDetailID . '" data-bs-target="#prosmodalsmsadmissionmessage" style=" font-size: 15px;"><i class="fa fa-comment-dots" aria-hidden="true"></i></a>
                        ';

                    }else if($finaladminpreviledge == 'del')
                    {
                        echo '
                        <a  href="javascript:void();" data-campus="' . $CampusID . '" data-inst="' . $IntitutionID . '" data-student="' . $ChildDetailID . '" class="prosremoveapplicantgetdetails"  data-bs-toggle="modal" data-bs-target="#pros-deleteapplicant-modal" style="font-size:15px;color:red;"><i class="fa fa-trash"  aria-hidden="true"></i></a>'; 
                    }


                
                }else
                {
                echo '<a href=""  class="prosgeneralcommentloadbtn" data-bs-toggle="modal" data-campus="' . $CampusID . '" data-email="' . $Email . '" data-phone="' . $Phone_no . '" data-link="' . $schlink . '"  data-regno="' . $UserRegNumberOrUsername . '" data-student="' . $ChildDetailID . '" data-bs-target="#prosmodalsmsadmissionmessage" style=" font-size: 15px;"><i class="fa fa-comment-dots" aria-hidden="true"></i></a>
                    <a  href="javascript:void();" data-campus="' . $CampusID . '" data-inst="' . $IntitutionID . '" data-student="' . $ChildDetailID . '" class="prosremoveapplicantgetdetails"  data-bs-toggle="modal" data-bs-target="#pros-deleteapplicant-modal" style="font-size:15px;color:red;"><i class="fa fa-trash"  aria-hidden="true"></i></a>';

                }
   
                                                             
                   
            echo '</td>


                                                </tr>
                                                <tr id="hidden_row' . $ChildDetailID . '" style="display:none;">
                                                    <td colspan=3>
                                                                    
                                                    
                                                        <div class="row" style="padding: 10px 10px 0px 10px;">

                                                                        <div class="col-sm-4">';
                                                                            if ($Photo == '') {

                                                                                echo '<img src="data:image/png;base64,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" alt="Profile Picture" width="120" height="120">';

                                                                            } else {
                                                                                echo '<img src="' . $Photo . '" alt="Profile Picture" width="120" height="120">';
                                                                            }

                                                                            echo '</div>

                                                       
                                                                    <div class="col-sm-4">
                                                                           <h6>PARENT\'S INFORMATION</h6>

                                                                           
                                    
                                                                           <div><span style="font-weight:500;">Name:</span><span> ' . $ParentLastName . ' ' . $ParentFirstName . '</span></div>
                                                                           <div><span style="font-weight:500;">Phone:</span><span><a href="tel:' . $Phone_no . '" target="_blank"> ' . $Phone_no . ' </a></span></div>
                                                                           <div><span style="font-weight:500;">Email:</span><span> ' . $Email . ' </span></div>
                                                                           <div><span style="font-weight:500;">Country:</span><span> ' . $countryName . ' </span></div>
                                                                           <div><span style="font-weight:500;">State:</span><span> ' . $StateName . '</span></div>
                                                                           <div><span style="font-weight:500;">LGA:</span><span> ' . $LGAName . '</span></div>
                                                                           <div><span style="font-weight:500;">City:</span><span> ' . $City . ' </span></div>
                                                                           <div  class="mb-3"><span style="font-weight:500;">Home Address:</span><span>' . $HomeAddress . '</span></div>
                                                                    </div>


                                                                  
                                                                   
                                                                    <div class="col-sm-4">
                                                                          <h6>APPLICANT\'S INFORMATION</h6>

                                                                          <div><span style="font-weight:500;">Name: </span><span>' . $student_LastName . ' ' . $student_firstName . '</span></div>
                                                                           <div><span style="font-weight:500;">Class:</span><span> ' . $ClassTemplateName . ' </span></div>
                                                                           <div><span style="font-weight:500;">Session:</span><span> ' . $sessionName . ' </span></div>
                                                                           <div><span style="font-weight:500;">DOB:</span><span> ' . $DOB . ' </span></div>
                                                                           <div><span style="font-weight:500;">Gender:</span><span> ' . $Gender . ' </span></div>
                                                                           <div><span style="font-weight:500;">UserName:</span><span> '.$UserRegNumberOrUsername.' </span></div>



                                                                           <div class="d-block d-md-none"><span style="font-weight:500;">Status:</span>';


                                                                           echo '<span style="margin-top:-5px;" id="abba_stud_stat_span">
                                                                           <div class="dropdown dropdown-sm">
                       
                                                                           <span   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  class="prosgeneralupdatesatus'.$ChildDetailID.'"><span type="button"   data-status="'.$status_state.'"  data-student="' . $ChildDetailID . '"  class="btn ' . $statusbtncolor . '  btn-sm text-light" style="font-size:11px;border-radius:7px;"  > 
                                                                                  <i class="fa fa-pen " ></i> ' . $statustitl . ' </span></span>
                                                                               
                       
                                                                              
                                                                               <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink" style="background: #f7fff7;border:none;">
                                                                                   <li>
                                                                                        <a  data-campus="' . $CampusID . '" data-student="' . $ChildDetailID . '" data-currentstatus="2" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-success prosloadadminstatusbtn"  data-toggle="tooltip"> <i class="fa fa-pen text-sucess" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Admit</i> </a>
                                                                                   </li>
                                   
                                                                                   <li>
                                                                                   <a   data-campus="' . $CampusID . '" data-student="' . $ChildDetailID . '" data-currentstatus="1" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger prosloadadminstatusbtn"  data-toggle="tooltip"> <i class="fa fa-pen text-danger" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Decline</i> </a>
                                                                                   </li>
                       
                                                                                   <li>
                                                                                           <a   data-campus="' . $CampusID . '" data-student="' . $ChildDetailID . '" data-currentstatus="0" class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning prosloadadminstatusbtn"  data-toggle="tooltip"> <i class="fa fa-pen text-warning" style="cursor:pointer;font-size:13px;" aria-hidden="true"></i> <i class="fa fa" style="cursor:pointer;font-size:13px;"> Pending</i> </a>
                                                                                   </li>
                                   
                                                                               </ul>
                                                                           </div>
                                                                       
                                                                       </span>';

                                                                      echo '</div>
                                                                           <div class="d-block d-md-none">';


                                                                           if($UserType == 'admin')
                                                                           {
                                                           
                                                                               if($finaladminpreviledge == 'editanddel')
                                                                               {
                                                           
                                                                                echo '<span style="font-weight:500;">Action:</span>
                                                                                  
                                                                                <a href=""  class="prosgeneralcommentloadbtn" data-bs-toggle="modal"  data-bs-target="#prosmodalsmsadmissionmessage"  data-campus="' . $CampusID . '" data-email="' . $Email . '" data-link="' . $schlink . '"  data-regno="' . $UserRegNumberOrUsername . '" data-phone="' . $Phone_no . '" data-student="' . $ChildDetailID . '" style=" font-size: 15px;"><i class="fa fa-comment-dots" aria-hidden="true"></i></a>
                                                                                <a hre="javascript:void();" data-campus="' . $CampusID . '" data-inst="' . $IntitutionID . '" data-student="' . $ChildDetailID . '" class="prosremoveapplicantgetdetails" style="font-size:15px;color:red;"><i class="fa fa-trash"  aria-hidden="true"></i></a>';

                                                                               }else if($finaladminpreviledge == 'edit')
                                                                               {
                                                           
                                                                                   echo ' 
                                                                                        <span style="font-weight:500;">Action:</span>
                                                                                        <a href=""  class="prosgeneralcommentloadbtn" data-bs-toggle="modal"  data-bs-target="#prosmodalsmsadmissionmessage"  data-campus="' . $CampusID . '" data-email="' . $Email . '" data-link="' . $schlink . '"  data-regno="' . $UserRegNumberOrUsername . '" data-phone="' . $Phone_no . '" data-student="' . $ChildDetailID . '" style=" font-size: 15px;"><i class="fa fa-comment-dots" aria-hidden="true"></i></a>
                                                                                   ';
                                                           
                                                                               }else if($finaladminpreviledge == 'del')
                                                                               {
                                                                                   echo '
                                                                                   <span style="font-weight:500;">Action:</span>
                                                                                   <a hre="javascript:void();" data-campus="' . $CampusID . '" data-inst="' . $IntitutionID . '" data-student="' . $ChildDetailID . '" class="prosremoveapplicantgetdetails" style="font-size:15px;color:red;"><i class="fa fa-trash"  aria-hidden="true"></i></a>'; 
                                                                               }
                                                           
                                                           
                                                                           
                                                                           }else
                                                                           {


                                                                                    echo '<span style="font-weight:500;">Action:</span>
                                                                                  
                                                                                    <a href=""  class="prosgeneralcommentloadbtn" data-bs-toggle="modal"  data-bs-target="#prosmodalsmsadmissionmessage"  data-campus="' . $CampusID . '" data-email="' . $Email . '" data-link="' . $schlink . '"  data-regno="' . $UserRegNumberOrUsername . '" data-phone="' . $Phone_no . '" data-student="' . $ChildDetailID . '" style=" font-size: 15px;"><i class="fa fa-comment-dots" aria-hidden="true"></i></a>
                                                                                    <a hre="javascript:void();" data-campus="' . $CampusID . '" data-inst="' . $IntitutionID . '" data-student="' . $ChildDetailID . '" class="prosremoveapplicantgetdetails" style="font-size:15px;color:red;"><i class="fa fa-trash"  aria-hidden="true"></i></a>';
                                                           
                                                                           }
                                                                                  
                                                                           
                                                                        echo '</div>
                                                                       
                                                                    </div>

                                                        </div>

                                                    
                                                    </td>
                                                    <td></td>
                                                </tr>';
    } while ($selectadminssionrecordcntrow = mysqli_fetch_assoc($selectadminssionrecord));


    echo '</tbody>
        </table>';






} else {

    echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';

}






?>