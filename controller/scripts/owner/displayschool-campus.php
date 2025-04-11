<?php


    include('../../config/config.php');

    $userid = $_POST['UserID'];
    $ownername = $_POST['ownerfirst_Name'];
    $tagstate = $_POST['tagstate'];



    $select_schoolowner = mysqli_query($link, "SELECT * FROM `institution` WHERE `AgencyOrSchoolOwnerID`='$userid'");
    $select_schoolowner_row = mysqli_fetch_assoc($select_schoolowner);
    $select_schoolowner_row_cnt = mysqli_num_rows($select_schoolowner);

   

 if ($select_schoolowner_row_cnt > 0) {

    $groupschoolID_new = $select_schoolowner_row['InstitutionID'];

    $selectverify_campus_new = mysqli_query($link, "SELECT  * FROM `campus` WHERE   InstitutionID='$groupschoolID_new' ORDER BY CampusName ASC");
    $selectverify_campuscnt_new = mysqli_num_rows($selectverify_campus_new);
    $selectverify_campuscnt_row_new = mysqli_fetch_assoc($selectverify_campus_new);

    $campusID_new = $selectverify_campuscnt_row_new['CampusID'];

    $tagstatecampusmain = $selectverify_campuscnt_row_new['TagState'];

    if ($tagstatecampusmain == '' || $tagstatecampusmain == '15'  ||   $tagstatecampusmain == '16' ||  $tagstatecampusmain == '17' ||  $tagstatecampusmain == '18' ||  $tagstatecampusmain == '19' ||  $tagstatecampusmain == '20' ||  $tagstatecampusmain == '21' ||  $tagstatecampusmain == '22' ||  $tagstatecampusmain == '23' ||  $tagstatecampusmain == '24' ||  $tagstatecampusmain == '25' ||  $tagstatecampusmain == '26' ||  $tagstatecampusmain == '27' ||  $tagstatecampusmain == '28') {


        echo '
                <div class="col-sm-12">
                <div class="pros-wrapper-warning ">
                        <div class="card pros-alertcard  alert alert-dismissible fade show">
                                <button style="position:absolute;right:1rem;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            
                            <div class="pros-icon"><i class="fa fa-exclamation-circle"></i></div>
                            <div class="pros-subject">
                                <h4>Welcome ' . $ownername . '</h4>

                                <p >Your school setup is yet to be completed. <br>  kindly click on proceed below to complete your setup.</p>
                                <button type="button"  data-bs-toggle="modal" data-bs-target="#pros-createstaff-modal" data-tag="'.$tagstatecampusmain.'" data-campus="'.$campusID_new.'" data-id="'.$groupschoolID_new.'" id="pinvitestaffclick" style="cursor:pointer;font-size;11px;color:blue;position:absolute;right:2rem;bottom:1rem;background-color:#fdc220;" class="btn btn-sm text-light pros-loadsetupmodal">Proceed </button>
                                
                            </div>
                    
                        </div>
                    </div>
                </div>'; 
    }

    echo '<input type="hidden" id="confirmschoolfor-owner" value="schoolavailable">';
    $numcamp = 2;

    do {

                    $groupschoolID = $select_schoolowner_row['InstitutionID'];
                    $schoolname = $select_schoolowner_row['InstitutionGeneralName'];

                    $TrashStatusschool = $select_schoolowner_row['TrashStatus'];


                if($TrashStatusschool == '1')
                {
                            $disabledcardschool = 'disabledschoolcampuscard';
                            $disabledcardclickschool = 'disabledschoolcampus';
                }else
                {

                    $disabledcardschool = '';
                    $disabledcardclickschool = '';

                }

                    

                      echo '<div class="col-9  '.$disabledcardclickschool.'">
                    
                            <h1 class="section-title mb-4" style="font-weight:600;font-size: 1.8rem;color:black;">' . $schoolname . '
                          <div class="dropdown">
                             <span data-bs-toggle="dropdown" aria-expanded="false" class="fa fa-edit text-primary" style="cursor:pointer;font-size:18px;"></span>
                                <div class="dropdown-menu" style="width:100px;height:140px;background-color:white;border-radius:10px;position:absolute;right:20rem;">
                                    <a class="dropdown-item" data-bs-toggle="modal" href="#pros-editschool-modal" data-id="' . $groupschoolID . '"  id="editschoolbtn"  style="cursor:pointer;font-size:13px;">   <i class="fa fa-edit text-warning" aria-hidden="true"> </i> Edit School</a>
                                    <a class="dropdown-item" data-bs-toggle="modal" href="#pros-deleteschool-modal" data-schoolname="'.$schoolname .'" data-school="'.$groupschoolID.'"  id="deleteschoolbtn"  style="cursor:pointer;font-size:13px;">   <i class="fa fa-trash text-danger" aria-hidden="true"> </i> Delete School</a>
                                   
                                </div>
                               
                                 </div>
                                 
                                 <a  style="color:blue;font-size:13px;cursor:pointer;display: block;" data-bs-toggle="modal" data-bs-target="#pros-invitestaff-usertype" data-id="' . $groupschoolID . '" id="invitestaffclick">   invite staff</a>
                               
                        </div>';

                        $selectverify_campus = mysqli_query($link, "SELECT  * FROM `campus` WHERE   InstitutionID='$groupschoolID' ORDER BY CampusName ASC");
                        $selectverify_campuscnt = mysqli_num_rows($selectverify_campus);
                        $selectverify_campuscnt_row = mysqli_fetch_assoc($selectverify_campus);

        if ($selectverify_campuscnt > 0) {

            $counter = 0;
            do {
                $campusname = $selectverify_campuscnt_row['CampusName'];
                $campusID = $selectverify_campuscnt_row['CampusID'];
                $campusemail = $selectverify_campuscnt_row['CampusEmail'];
                $campusphone = $selectverify_campuscnt_row['CampusPhone'];
                $address = $selectverify_campuscnt_row['CampusAddress'];
                $campustagstate = $selectverify_campuscnt_row['TagState'];
                $TrashPeriodcampus = $selectverify_campuscnt_row['CampusTrashStatus'];

                
                $maxcampus_length = 30;

                if (strlen($campusname) > $maxcampus_length) {

                    $shortened_campus = substr($campusname, 0, 30) . "...";

                } else {
                    $shortened_campus = $campusname;
                }

                $counter++;


                if($TrashPeriodcampus == '1')
                {
                            $disabledcard = 'disabledschoolcampuscard';
                            $disabledcardclick = 'disabledschoolcampus';
                }else
                {

                    $disabledcard = '';
                    $disabledcardclick = '';

                }


               

                
                if ($counter == 1) {
                    
                   
                    echo '<div class="col-sm-4 mb-4">
                            <div class="card '.$disabledcard.' '.$disabledcardclick.'" style="background-image: linear-gradient(180deg,#007bff,#00008B);height:180px;border:1px solid #DFE0EB;border-radius:15px;">
                            <div class="card-header" style="background-image: linear-gradient(180deg,#007bff,#00008B);border-top-right-radius:15px;border-top-left-radius:15px;">
                                <div class="dropdown " style="margin-right:10rem;position:absolute;top:0.5rem;right:-8.5rem;">
                                        <span class="fa fa-ellipsis-v  text-light"  data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;font-size:14px;"></span> 
                                    
                                    <div class="dropdown-menu" style="width:30px !important;height:140px;background-color:white;border-radius:10px;">
                                        <a class="dropdown-item" data-bs-toggle="modal" href="#pros-editcampus-modal"   id="editcampusbtn" data-camp="' . $campusID . '" data-sch="' . $groupschoolID . '" style="cursor:pointer;font-size:12px;">   <i class="fa fa-edit text-warning" aria-hidden="true"> </i> Edit</a>
                                        <a class="dropdown-item" data-bs-toggle="modal" href="#pros-deletecampus-modal"   id="prosdeletecampusbtnload"  data-campname="'.$campusname.'" data-camp="'.$campusID . '" data-sch="' . $groupschoolID . '" style="cursor:pointer;font-size:12px;"> <i class="fa fa-trash text-danger" aria-hidden="true"></i>   Delete </a>
                                        
                                    
                                    </div>
                                </div>
                                
                                    <h3 class="card-title text-light" style="font-weight:600;text-transform: uppercase;font-size: 0.87rem;">Main Campus</h3>
                                
                                
                                </div>
                                <div class="card-body">
                                        <h5 class="section-title text-light prosdisplaycampusnameedit'.$campusID.'"  style="font-weight:600;font-size: 0.77rem;">' . $shortened_campus . '</h5>';


                                        if($TrashPeriodcampus == '1')
                                        {


                                            echo '<a    data-id="'.$campusID.'" data-school="'.$groupschoolID.'"   class="pros-undoncampusdeletebtn prosundodeleteschoolorcampusdelbtn"  style="color:white;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Undo Delete</a>';
                                        }else
                                        {

                                                    if ($campustagstate == '' || $tagstatecampusmain == '15' || $campustagstate == '16' || $campustagstate == '17' || $campustagstate == '18' || $campustagstate == '19' || $campustagstate == '20' || $campustagstate == '21' || $campustagstate == '22' || $campustagstate == '23' || $campustagstate == '24' || $campustagstate == '25' || $campustagstate == '26' || $campustagstate == '27' || $campustagstate == '28')
                                                    {
                                                            echo '<u class="opensetupmodalforschool" data-maintag="'.$tagstatecampusmain.'" data-tag="'.$campustagstate.'" data-id="'.$groupschoolID.'" data-campus="'.$campusID.'" data-access="granted" data-maincam="main" style="color:white;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Complete setup</u>';
                                                    }else
                                                    {
                                                        
                                                        echo '<a  data-bs-toggle="modal" data-bs-target="#prosloadset-configurationhere" data-id="'.$campusID.'"   class="prosloadinstitutionbtn"  style="color:white;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Make Changes</a>';
                                                    }


                                        }

                                       

                                        
                                echo '</div>
                            </div>
                    </div>';

                } else {


                    echo '<div class="col-sm-4 mb-4">
                            <div class="card '.$disabledcard.' '.$disabledcardclick.'" style="background:#FCFCFC;border:1px solid #DFE0EB;height:180px;border-radius:15px;">
                                <div class="card-header" style="background:#FCFCFC;border-top-right-radius:15px;border-top-left-radius:15px;">
                                    <div class="dropdown" style="margin-right:10rem;position:absolute;top:0.5rem;right:-8.5rem;">

                                        <span class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="cursor:pointer;font-size:14px;"></span> 

                                        <div class="dropdown-menu" style="width:30px !important;height:140px;background-color:white;border-radius:10px;">
                                            <a class="dropdown-item"  data-bs-toggle="modal" href="#pros-editcampus-modal"   id="editcampusbtn" data-camp="' . $campusID . '" data-sch="' . $groupschoolID . '" style="cursor:pointer;font-size:12px;">  <i class="fa fa-edit text-warning" aria-hidden="true"></i> Edit </a>
                                            <a class="dropdown-item" data-bs-toggle="modal" href="#pros-deletecampus-modal"   id="prosdeletecampusbtnload"  data-campname="'.$campusname.'" data-camp="' . $campusID . '" data-sch="' . $groupschoolID . '"  style="cursor:pointer;font-size:12px;">  <i class="fa fa-trash text-danger" aria-hidden="true"></i>  Delete </a>
                                           
                                            
                                        </div>

                                    </div>

                                    <h3 class="card-title" style="font-weight:600;text-transform: uppercase;font-size: 0.87rem;">Campus ' .$numcamp++ . '</h3>
                                    
                                </div>

                                <div class="card-body">
                                    <h5 class="section-title prosdisplaycampusnameedit'.$campusID.'" style="font-weight:600;font-size:14px;">' .$shortened_campus . '</h5>';
                                    //  <u class="text-danger" style="float:left;font-size:13px;text-decoration:none;margin-top:4rem;">0% completed</u>
                                    // echo '<a href="" class=""  style="color:white;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">View setup</a>';
                                    

                                    if($TrashPeriodcampus == '1')
                                    {


                                        echo '<a    data-id="'.$campusID.'" data-school="'.$groupschoolID.'"    class="pros-undoncampusdeletebtn prosundodeleteschoolorcampusdelbtn"  style="color:blue;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Undo Delete</a>';
                                    }else
                                    {
                                        


                                                if ($tagstatecampusmain == '' || $tagstatecampusmain == '15' || $tagstatecampusmain == '16' || $tagstatecampusmain == '17' || $tagstatecampusmain == '18' || $tagstatecampusmain == '19' || $tagstatecampusmain == '20' || $tagstatecampusmain == '21' || $tagstatecampusmain == '22' || $tagstatecampusmain == '23' || $tagstatecampusmain == '24' || $tagstatecampusmain == '25' || $tagstatecampusmain == '26')
                                                {
                                                    
                                                            echo '<u  class="opensetupmodalforschool" data-id="'.$groupschoolID.'" data-campus="'.$campusID.'" data-access="notgranted" style="color:blue;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Complete Setup</u>';
                                                }else
                                                {

                                                    if ($campustagstate == '' ||  $campustagstate == '15' || $campustagstate == '16' || $campustagstate == '17' || $campustagstate == '18' || $campustagstate == '19' || $campustagstate == '20' || $campustagstate == '21' || $campustagstate == '22' || $campustagstate == '23' || $campustagstate == '24' || $campustagstate == '25' || $campustagstate == '26' || $campustagstate == '27' || $campustagstate == '28')
                                                    {
                                                                echo '<u  class="opensetupmodalforschool" data-maintag="'.$tagstatecampusmain.'" data-tag="'.$campustagstate.'" data-id="'.$groupschoolID.'" data-campus="'.$campusID.'" data-maincam="notmain" data-access="granted" style="color:blue;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Complete Setup</u>';  
                                                    }else
                                                    {
                                                                echo '<a data-bs-toggle="modal" data-bs-target="#prosloadset-configurationhere" data-id="'.$campusID.'"   class="prosloadinstitutionbtn"   style="color:blue;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Make Changes</a>';
                                                    } 


                                                        
                                                }

                                    }
                                        
                                    
                                    
                                echo '</div>
                            </div>
                    </div>';
                }



            } while ($selectverify_campuscnt_row = mysqli_fetch_assoc($selectverify_campus));
        } else {

        }

         //Add new campus btn here

         
        

            echo '<div class="col-sm-4 mb-4">
                    <div class="card '.$disabledcardclickschool.' '.$disabledcardschool.'" data-bs-toggle="modal" id="proscreatescampusgetid" data-school="'.$groupschoolID.'"  data-bs-target="#pros-createnewcampus" style="height:180px;border-radius:15px;cursor:pointer;border:1px solid #007bff;color:#007bff;display: flex;justify-content: center;align-items: center;">
                    <div class="card-body" style="display: flex;justify-content: center;align-items: center;">
                        <center>
                            <span class="fa fa-plus" style="color:blue;font-size:15px;cursor:pointer;"></span><br>
                            <span>Add Campus</span>
                        </center>
                        
                    </div>
                    </div>
            </div>';

        //Add new campus btn here

    } while ($select_schoolowner_row = mysqli_fetch_assoc($select_schoolowner));


    $sqlGetSchool = ("SELECT * FROM `section` WHERE CampusID='$campusID_new'");
    $resultGetSchool = mysqli_query($link, $sqlGetSchool);
    $rowGetSchool = mysqli_fetch_assoc($resultGetSchool);
    $row_cntGetSchool = mysqli_num_rows($resultGetSchool);


    $sqlGetSchool_assigned  = ("SELECT * FROM `section` WHERE CampusID='$campusID_new' AND PrincipalOrDeanOrHeadTeacherUserID != '0'");
    $resultGetSchool_assigned  = mysqli_query($link, $sqlGetSchool_assigned);
    $rowGetSchool_assigned  = mysqli_fetch_assoc($resultGetSchool_assigned);
    $row_cntGetSchool_assigned  = mysqli_num_rows($resultGetSchool_assigned);

    if ($tagstatecampusmain == '' ||  $tagstatecampusmain == '15' || $tagstatecampusmain== '16' || $tagstatecampusmain == '17' || $tagstatecampusmain == '18' || $tagstatecampusmain == '19' || $tagstatecampusmain == '20' || $tagstatecampusmain == '21' || $tagstatecampusmain == '22' || $tagstatecampusmain == '23' || $tagstatecampusmain == '24' || $tagstatecampusmain == '25' || $tagstatecampusmain == '26' || $tagstatecampusmain == '27' || $tagstatecampusmain == '28')  {
       

        // <!--prompt stup modal --> 
        echo '<div class="modal fade " id="pros-displaystepmsg-modal" style="background-color: rgba(0, 0, 0, 0.9); z-index: 1050;" tabindex="-1" role="dialog" aria-labelledby="pros-displaystepmsg-modalLabel" aria-hidden="true">
                   <div class="modal-dialog modal-lg" style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);" role="document">
                       <div class="modal-content" style="border-radius:20px;">

                           <div class="modal-header" style="border:none;">
                              
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body" >
                                <center><h5 class="ms-5" style="color:#666666;font-weight:bold;">Congratulations ' . $ownername . ',</h5></center> 

                                         <center><img  class="" src="../../assets/images/users/congratulations-images.png" style="width:200px;height:150px;"></center>

                                        
                                            <p class="ms-5 pros-setmsgdes" >
                                                Your school has been created successfully.<br>
                                                 kindly click on the button below to complete your setup listed below. 
                                             </p>
    
                                        <ul class="list-group ms-5" style="list-style-type:none;font-size:14px;">';

                                                        $checkstaffverification = mysqli_query($link, "SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND  `Role`='teacher'");
                                                        $checkstaffverificationcnt = mysqli_num_rows($checkstaffverification);

                                                        $checkstaffverification_teacher = mysqli_query($link, "SELECT * FROM `staff` WHERE InstitutionID='$groupschoolID_new' AND  `Role`='schoolhead'");
                                                        $checkstaffverificationcnt_teacher = mysqli_num_rows($checkstaffverification_teacher);


                                                        if($tagstatecampusmain == '' || $tagstatecampusmain == '15' || $tagstatecampusmain == '16' || $tagstatecampusmain == '17' || $tagstatecampusmain == '18' || $tagstatecampusmain == '19' || $tagstatecampusmain == '20' || $tagstatecampusmain == '21')
                                                        {

                                                                if ($row_cntGetSchool > 0) {

                                                                    echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Create section</li>';
                                                                } else {

                                                                    echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;"> Create section</li>';
                                                                }


                                                                if ($checkstaffverificationcnt_teacher > 0) {

                                                                    echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Create a school head</li>';
    
                                                                } else {
    
                                                                    echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;"> Create a school head</li>';
                                                                }

                                                                if($row_cntGetSchool_assigned > 0)
                                                                {
                                                                    echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Assign school head to section</li>';
                                                        
                                                                }else
                                                                {
                                                                    echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;"> Assign school head to section</li>';
                                                                }


                                                                if ($checkstaffverificationcnt > 0) {

                                                                    echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Create a teacher</li>';
                                                                } else {
    
                                                                    echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;">  Create a teacher</li>';
                                                                }



                                                        }else if($tagstatecampusmain == '22' || $tagstatecampusmain == '23' || $tagstatecampusmain == '24' || $tagstatecampusmain == '25' || $tagstatecampusmain == '26' || $tagstatecampusmain == '27' || $tagstatecampusmain == '28' || $tagstatecampusmain == '29')
                                                        {

                                                                    $sqlGetSchool_class = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new'");
                                                                    $resultGetSchool_class  = mysqli_query($link, $sqlGetSchool_class);
                                                                    $rowGetSchool_class  = mysqli_fetch_assoc($resultGetSchool_class);
                                                                    $row_cntGetSchool_class  = mysqli_num_rows($resultGetSchool_class);


                                                                    $sqlGetSchool_subject = ("SELECT * FROM `subjectorcourse` WHERE CampusID='$campusID_new'");
                                                                    $resultGetSchool_subject  = mysqli_query($link, $sqlGetSchool_subject);
                                                                    $rowGetSchool_subject = mysqli_fetch_assoc($resultGetSchool_subject);
                                                                    $row_cntGetSchool_subject  = mysqli_num_rows($resultGetSchool_subject);



                                                                    if($row_cntGetSchool_class  > 0)
                                                                    {
                                                                        echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Create class</li>';
                                                                    }else
                                                                    {
                                                                        echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;"> Create class</li>';
                                                                    }



                                                                    $sqlGetSchool_class_formteacher = ("SELECT * FROM `classordepartment` WHERE CampusID='$campusID_new' AND `HODOrFormTeacherUserID` != '0'");
                                                                    $resultGetSchool_class_teacher  = mysqli_query($link, $sqlGetSchool_class_formteacher);
                                                                    $rowGetSchool_class_teacher  = mysqli_fetch_assoc($resultGetSchool_class_teacher);
                                                                    $row_cntGetSchool_class_teacher  = mysqli_num_rows($resultGetSchool_class_teacher);
        
        
        
                                                                    if($row_cntGetSchool_class_teacher > 0)
                                                                    {
                                                                          echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Form teacher</li>';
                                                                    }else
                                                                    {
                                                                              echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;"> Form teacher</li>';
                                                                    }



                                                                    if($row_cntGetSchool_subject  > 0)
                                                                    {

                                                                        echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Create subject</li>';
                                                                    }else
                                                                    {
                                                                        echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;"> Create subject</li>';
                                                                    }


                                                                    $selectmerger = mysqli_query($link,"SELECT * FROM `courseorsubjectmerged` INNER JOIN courseorsubjectmergetitle ON courseorsubjectmergetitle.CourseOrSubjectMergeID = courseorsubjectmerged.CourseOrSubjectMergeID WHERE courseorsubjectmerged.CampusID='$campusID_new'");
                                                                    $selectmergercnt = mysqli_num_rows($selectmerger);

                                                                    if($selectmergercnt > 0)
                                                                    {
                                                                          echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Subject merged</li>';

                                                                    }else
                                                                    {
                                                                          echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;"> Subject merged</li>';
                                                                    }

                                                                    $select_subject_assigned = mysqli_query($link,"SELECT * FROM `subjectorcourse` INNER JOIN courseorsubjectallocation ON subjectorcourse.SubjectOrCourseID = courseorsubjectallocation.SubjectOrCourseID WHERE courseorsubjectallocation.CampusID='$campusID_new'");
                                                                    $select_subject_assignedcnt = mysqli_num_rows($select_subject_assigned);


                                                                    if($select_subject_assignedcnt > 0)
                                                                    {
                                                                                echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Assign a subject teacher</li>';
                                                                    }else
                                                                    {
                                                                                echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;"> Assign a subject teacher</li>';
                                                                    }



                                                                    $select_termallias =  mysqli_query($link,"SELECT * FROM `termalias` WHERE CampusID='$campusID_new'");
                                                                    $select_termalliascnt = mysqli_num_rows($select_termallias);

                                                                    if($select_termalliascnt > 0)
                                                                    {
                                                                            echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Term alias</li>';
                                                                    }else
                                                                    {
                                                                            echo '<li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-cancelicon.svg" style="width:20px;"> Term alias </li>';   
                                                                    }
                                                        }
                           echo ' </ul>';
                         echo '<br>

                                       <center><button type="button" id="pros-nextschool-createstaff" data-tag="'.$tagstatecampusmain.'"   style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light pros-loadsetupmodal" data-campus="'.$campusID_new.'" data-id="'.$groupschoolID_new.'">Proceed <i class="fa fa-long-arrow-right"></i></button></center>
                           </div>
                       </div>
                   </div>
               </div>';
    } else {

    }  //    <!--prompt stup modal -->

  


    //    <!--prompt stup modal -->

          // <!--prompt stup modal --> 
          echo '<div class="modal fade" id="pros-createstaff-modal" style="background-color: rgba(0, 0, 0, 0.9); z-index: 1050;" tabindex="-1" role="dialog" aria-labelledby="pros-createstaff-modalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-xl" id="pros-reducemodalclasstypesetup"  style="max-width:86%;margin: 1.75rem auto;color: rgb(56, 58, 63);" role="document">
              <div class="modal-content" id="prosscrollinside-modalbody" style="border:none;width: 100%;border-radius: 5px;">

                <div class="modal-header" style="border:none;">

                  <u style="color:blue;font-size:13px;text-decoration:underline;cursor:pointer;display:none;" id="movebackbtn-setup"><i class="fa fa-arrow-left"></i> Back</u>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  
                  <div class="modal-body"  style="padding:6% 8%;overflow: auto;">';
                        echo '<div id="pros-displaysetup-content"></div>'; //load setup modal
                  echo '</div>

            </div>
        </div>
        </div>';
                  //    prompt stup modal 







   



} else {

}







?>