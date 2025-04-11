<?php



    include('../../config/config.php');

    $userID = $_POST['UserID'];
    $IntitutionID = $_POST['IntitutionID'];
    $ownerfirstName = $_POST['ownerfirst_Name'];
    $admissioncampus = $_POST['campusID'];

    $selectadminsonboardingverification = mysqli_query($link,"SELECT DISTINCT `campus`.`CampusID`  FROM `institution` INNER JOIN `campus` ON `institution`.InstitutionID = `campus`.`InstitutionID` INNER JOIN `admissionclass` ON  `campus`.`CampusID` = `admissionclass`.`CampusID` INNER JOIN `admissionregnumberprifix` ON `admissionclass`.`CampusID` = `admissionregnumberprifix`.`CampusID` 
    WHERE `institution`.`InstitutionID`='$IntitutionID' AND  `admissionregnumberprifix`.Slidestatus='1'");
    $selectadminsonboardingverificationcnt = mysqli_num_rows($selectadminsonboardingverification);
    $selectadminsonboardingverificationcntrow = mysqli_fetch_assoc($selectadminsonboardingverification);

    
   


if($selectadminsonboardingverificationcnt > 0)
{

   }else
   {



                       echo '<input type="hidden" value="prosshowtag" id="prosverifyadmissiontag">';
                                                                
                        //ADMISSION WELCOME MSG
                        echo '<div class="row" id="pros-admissionfirstwelcome"   style="display:none;" >
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">

                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;border:none;" >
                        <div class="card-body">
                                        
                            <div class="row" id="createwelcomemsg-setup" style="padding:0%;">
                                    <center><h4 class="ms-5" style="color:#666666;font-weight:bold;"> Welcome ' . $ownerfirstName . '</h4></center> 

                                    <center><img  class="" src="../../assets/images/users/welcomejifimage.gif" style="width:200px;height:150px;"></center>


                                    <p class="pros-setmsgdes ms-4" style="display:block;font-size:14px;display:block;">
                                        Welcome to our platform! We are excited to assist you in setting up your admission process.
                                        To proceed further and initiate the setup, please click the button below.
                                    </p>
                                <center><button type="button" id="proceedto-toload-campus"    style="background-color:#007bff;cursor:pointer;width:50%;font-size:14px;width:100%;" class="btn btn-block btn-lg text-light">Proceed <i class="fas fa-long-arrow-alt-right"></i> </button></center>
                                
                            </div>

                        </div>
                        </div>
                            
                        </div>
                        <div class="col-sm-2"></div>
                        </div>';
                        //ADMISSION WELCOME MSG




                        //ADMISSION CAMPUSES


                        $selectverify_campus = mysqli_query($link, "SELECT  * FROM `campus` WHERE   InstitutionID='$IntitutionID' ORDER BY CampusName ASC");
                        $selectverify_campuscnt = mysqli_num_rows($selectverify_campus);
                        $selectverify_campuscnt_row = mysqli_fetch_assoc($selectverify_campus);

                        $numcamp = 1;
                        if ($selectverify_campuscnt > 0) {



                        echo '
                        <div class="main-content" id="prosdisplaycampuforamisssion" style="display:none;">
                        <div class="row  pt-0 p-4" id="wizardRow">
                            <div class="col-md-12 text-center">
                                <div class="wizard-form py-4 my-2">
                                <ul id="progressBar" class="progressbar px-xlg-1 px-0">
                                <li id="progressList-1"
                                class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list active">
                                Select Campus</li>

                                    <li id="progressList-2"
                                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                                    Set Classes</li>
                                    <li id="progressList-3"
                                    class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list  ">
                                Adm Form Amount</li>
                                    <li id="progressList-4"
                                    class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                                Reg Prefix</li>
                                </ul>
                                </div>
                            </div>
                        </div>';


                        echo '<div class="row justify-content-center" >
                        <div class="col-lg-10 col-md-9">
                        <h3 class="fw-bold pt-5">Select Campus</h3>
                        <p class="small pb-5" style="font-size:13px;">Please select at least one campus before procceding</p>

                        <div class="row row-cols-1 row-cols-lg-3 g-4 pb-5 border-bottom">';

                        $counter = 0;
                        do {
                        $campusname = $selectverify_campuscnt_row['CampusName'];
                        $campusID = $selectverify_campuscnt_row['CampusID'];
                        $campusemail = $selectverify_campuscnt_row['CampusEmail'];
                        $campusphone = $selectverify_campuscnt_row['CampusPhone'];
                        $address = $selectverify_campuscnt_row['CampusAddress'];
                        $campustagstate = $selectverify_campuscnt_row['TagState'];
                        $maxcampus_length = 30;

                        if (strlen($campusname) > $maxcampus_length) {

                        $shortened_campus = substr($campusname, 0, 30) . "...";

                        } else {
                        $shortened_campus = $campusname;
                        }

                        $counter++;
                        $campusnamefull = ucfirst($campusname);


                        if ($counter == 1) {

                        echo '<div class="col-sm-4 mb-4">
                                            <div class="card proscampuscard"  data-id="' . $campusID . '" style="background-image: linear-gradient(180deg,#007bff,#00008B);height:180px;border:1px solid #DFE0EB;border-radius:15px;cursor:pointer;">
                                            <div class="card-header" style="background-image: linear-gradient(180deg,#007bff,#00008B);border-top-right-radius:15px;border-top-left-radius:15px;">
                                        
                                                <input type="radio" class="proscheckbox proscheckcampus' . $campusID . '" id="check" name="check" value="' . $campusID . '"   style="float:right;">
                                                    <h3 class="card-title text-light" style="font-weight:600;text-transform: uppercase;font-size: 0.87rem;">Main campus</h3>
                                                
                                                    
                                                </div>
                                                <div class="card-body">
                                                        <center><i class="fa fa-university card-img-top mx-auto img-light fs-1 pb-1 text-light"></i></center>
                                                        <p></p><p></p>
                                                        <h5 class="section-title text-light ms-5" style="font-weight:600;font-size: 0.77rem;">' . $campusnamefull . '</h5>';



                        echo '</div>
                                            </div>
                                    </div>';

                        } else {


                        echo '<div class="col-sm-4 mb-4">
                                            <div class="card proscampuscard" data-id="' . $campusID . '" style="background:#FCFCFC;border:1px solid #DFE0EB;height:180px;border-radius:15px;cursor:pointer;">
                                                <div class="card-header" style="background:#FCFCFC;border-top-right-radius:15px;border-top-left-radius:15px;">
                                                <input type="radio" class="proscheckbox proscheckcampus' . $campusID . '" id="check" name="check" value="' . $campusID . '"   style="float:right;">
                                                    <h3 class="card-title" style="font-weight:600;text-transform: uppercase;font-size: 0.87rem;">Campus ' . $numcamp++ . '</h3>
                                                    
                                                </div>

                                                <div class="card-body">
                                                    <center><i class="fa fa-university  card-img-top mx-auto img-light fs-1 pb-1"></i></center>
                                                    <p></p><p></p>
                                                    <h5 class="section-title ms-5" style="font-weight:600;font-size:14px;">' . $campusnamefull . '</h5>';



                        echo '</div>
                                            </div>
                                    </div>';
                        }



                        } while ($selectverify_campuscnt_row = mysqli_fetch_assoc($selectverify_campus));
                        echo '</div>

                        <button type="button" class="btn btn-sm text-white float-end next  rounded-3 pros-generalnxt"  style="background-color:#0066FF;float:right;width:15%;position:relative;top:-10px;">Next <i class="fas fa-long-arrow-alt-right"></i></button>
                        ';
                        echo '</div>
                        </div>
                        </div>
                        ';

                        } else {
                        // Handle the case when no campuses are found
                        }

                        //ADMISSION CAMPUSES






                        //ADMISSION CLASSES
                        echo '<div class="main-content" id="prosdisplayclassesforadmission" style="display:none;">

                        <div class="row  pt-0 p-4" id="wizardRow">

                        <div class="col-md-12 text-center">
                            <div class="wizard-form py-4 my-2">
                            <ul id="progressBar" class="progressbar px-xlg-1 px-0">
                                <li id="progressList-1"
                                class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                                Select Campus</li>
                                <li id="progressList-2"
                                class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list active">
                            Set Classes</li>
                            <li id="progressList-3"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list  ">
                           Adm Form Amount</li>
                            <li id="progressList-4"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Reg Prefix</li>
                            </ul>
                            
                        </div>

                        </div>
                        </div>';
                        echo '<div class="row align-content-center" >
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-10 col-md-10">

                        <div class="card" style="background-color:white;border-radius:21px;padding-top:10px;border:none;" >
                        <div class="card-body">
                        <h3 class="fw-bold pt-5">Select Classes</h3>
                        <p class="small pb-5" style="font-size:13px;">Please select at least one class for each campus before procceding</p>
                        <div class="row row-cols-1 row-cols-lg-3  border-bottom">';


                                $selectverify_campus_new = mysqli_query($link, "SELECT  * FROM `campus` WHERE CampusID='$admissioncampus'");
                                $selectverify_campuscnt_new = mysqli_num_rows($selectverify_campus_new);
                                $selectverify_campuscnt_row_new = mysqli_fetch_assoc($selectverify_campus_new);
                                $campusnameclass = $selectverify_campuscnt_row_new['CampusName'];


                                echo '
                                <div class="col-sm-12">
                                <div class="accordion">
                                    <div class="accordion__collapsible">
                                        <div class="collapsible__header">
                                            <p>' . $campusnameclass . '</p>
                                        </div>
                                        <div class="collapsible__content" style="overflow-y: scroll;">
                                            <p></p> <p></p>';

                                            $selctclassadmission = mysqli_query($link, "SELECT * FROM `classtemplate` ORDER BY ClassTemplateName ASC");
                                            $selctclassadmissionrowcont = mysqli_num_rows($selctclassadmission);
                                            $selctclassadmissionrowcontrow = mysqli_fetch_assoc($selctclassadmission);

                                            echo '<div class="row" >
                                                <div class="col-sm-2" ></div>
                                                <div class="col-sm-8" >
                                                <div class="row">
                                                <p></p> <p></p>
                                            ';

                                                   $classnum =1;
                                                    do {

                                                        $classnameadmissionname = $selctclassadmissionrowcontrow['ClassTemplateName'];
                                                        $ClassTemplateIDnew = $selctclassadmissionrowcontrow['ClassTemplateID'];


                                                        if (stripos($classnameadmissionname, 'grade') || stripos($classnameadmissionname, 'Grade') || stripos($classnameadmissionname, 'GRADE') !== false) {
                                                           
                                                                $classtype = 'grade';
                                                                
                                                        }else if(stripos($classnameadmissionname, 'primary') || stripos($classnameadmissionname, 'Primary') || stripos($classnameadmissionname, 'PRIMARY') !== false) 
                                                        {

                                                             $classtype = 'primary';

                                                        } else if(stripos($classnameadmissionname, 'basic') || stripos($classnameadmissionname, 'Basic') || stripos($classnameadmissionname, 'BASIC') !== false) 
                                                        {

                                                            $classtype = 'basic';
                                                        }  
                                                        else {
                                                            $classtype = '';
                                                        }


                                                       

                                                        echo '
                                                        <div class="col-sm-6" >
                                                        <ul class="" style="list-style-type:none;">
                                                            <li class="item prosgenerallist-itemssel" data-id="' . $admissioncampus .'" data-faculty="'. $ClassTemplateIDnew . '" style="cursor: pointer;">
                                                                    '.$classnum++.' <img  class="" src="' . $defaultUrl . '/assets/images/users/classiconadmission.png" style="width:40px;height:40px;">&nbsp;
                                                                    <span class="item-text abba_tooltip">' . $classnameadmissionname . '  <span class="abba_tooltiptext">' . $classnameadmissionname . '</span></span>
                                                                        <input type="checkbox" class="pros-checkbox-input-new pros-generalcheckschoolhead checkshoolheadnew' .$ClassTemplateIDnew . ' proscheckboxinside' . $admissioncampus . '' . $ClassTemplateIDnew . '" data-campus="' . $admissioncampus . '" data-faculty="' . $admissioncampus . '" data-classgroup="'.$classtype.'" id="schoolassign" style="float: right; margin-right:10px;"   name="schoolhead-assign" value="' . $ClassTemplateIDnew . '">
                                                            </li>
                                                            </ul>
                                                            </div>
                                                            ';
                                                    } while ($selctclassadmissionrowcontrow = mysqli_fetch_assoc($selctclassadmission));

                                                
                                        echo '
                                        </div>
                                        </div>
                                        <div class="col-sm-2" ></div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                ';

                        echo '
                        </div>
                        <br></br>
                        <button type="button" class="btn btn-dark text-white float-start back rounded-3 pros-generalnxtback" style="float:right;position:relative;top:-10px;">Back</button>
                            <button type="button" class="btn btn-sm text-white float-end next  rounded-3 pros-generalnxt"  style="background-color:#0066FF;float:right;position:relative;top:-10px;">Next <i class="fas fa-long-arrow-alt-right"></i></button> 
                        </div>
                        </div>
                        </div> 

                        <div class="col-lg-1 col-md-1"></div>
                        </div>
                        </div>
                        ';

                        //ADMISSION CLASSES





                        //ADMISSION QUESTION FOR PAYMENT
                        echo '<div class="row" id="admissionquestionpayment"   style="display:none;" >
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">

                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;border:none;" >
                        <div class="card-body">
                                        
                            <u style="cursor:pointer;float:right;margin-right:3%;" class="pros-generalnxtback" >
                            <i class="fas fa-long-arrow-alt-left"></i>
                                    Back
                                </u>
                            <div class="row" id="createwelcomemsg-setup" style="padding:0%;">
                                    <center><h4 class="ms-5" style="color:#666666;font-weight:bold;">Admission Form Payment</h4></center> 
                                    <center><img  class="" src="../../assets/images/users/admissionpayment-image.png" style="width:200px;height:150px;"></center>

                                    <p class="pros-setmsgdes ms-4" style="display:block;font-size:15px;display:block;">
                                        Do you want to set payment for admisssion form? if yes click on proceed else skip.

                                    </p>

                                <div style="display:flex;">

                                    <button type="button" class="btn btn-dark text-white float-start back rounded-3  prosskippayment" style=""> Skip </button>
                                   <button type="button" class="btn btn-sm text-white  next   rounded-3 float-end  prospaymentnxt"  style="background-color:#0066FF;">Proceed <i class="fas fa-long-arrow-alt-right"></i></button>  

                                </div>
                                
                            </div>

                        </div>

                        </div>
                        
                        </div>
                        <div class="col-sm-2"></div>

                        </div>';

                        //ADMISSION QUESTION FOR PAYMENT








                        //ADMISSION PAYMENT FORM

                        echo '<div class="main-content" id="prosloadpaymentinput" style="display:none;">
                        <div class="row  pt-0 p-4" id="wizardRow">
                        <div class="col-md-1 text-center"></div>
                        <div class="col-md-10 col-lg-10 col-sm-12 ">
                                    <div class="wizard-form py-4 my-2">
                                    <ul id="progressBar" class="progressbar px-xlg-1 px-0">

                                        <li id="progressList-1"
                                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                                        Select Campus</li>
                                        <li id="progressList-2"
                                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                                    Set Classes</li>
                                        <li id="progressList-3"
                                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list  active">
                                       Adm Form Amount</li>
                                        <li id="progressList-4"
                                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                                    Reg Prefix</li>
                                    
                                    </ul>
                                    </div>
                                    <br><br><br>
                                   <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;border:none;">
                                     <div class="card-body">
                                    <center><h5 class="ms-5" style="color:#666666;font-weight:bold;"> Admission Form Payment </h5></center>
                                    <center><small class="small pb-5" style="font-size:13px;">Kindly input admission form amount below.
                                       Note:if you
                                    </small> </center>

                                        
                                    ';


                                    $selectclass = mysqli_query($link,"SELECT * FROM `classtemplate` INNER JOIN `admissionclass` ON `classtemplate`.ClassTemplateID = `admissionclass`.AdmissionDefaultClassID WHERE admissionclass.CampusID='$admissioncampus' ORDER BY `classtemplate`.ClassTemplateName ASC");
                                    $selectclasscnt =  mysqli_num_rows($selectclass);
                                    $selectclasscntrow =  mysqli_fetch_assoc($selectclass);

                                    echo '
                                    <div class="row">
                                       <div class="col-sm-1"></div>
                                       <div class="col-sm-10">
                                      <div class="row">

                                                <div class="col-sm-12">
                                                        <label for="schoolName" style="margin-right:20%;font-size:15px;"><b>Use for all(amount)</b><span style="color:red;">*</span></label>
                                                        <input type="number" style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3;outline: 1px solid #007bff;" id="prosamountforallcampus"  placeholder="e.g $1000" class="form-control " >
                                                        <br><br>
                                                </div>
                                            ';

                                            if($selectclasscnt > 0)
                                            {



                                                
                                                          echo '<div class="col-sm-2 mb-3">
                                                            </div>';

                                                        echo '<div  class="col-sm-10 mb-3">
                                                                 <label for="schoolName" style="margin-left:15%;font-size:15px;"><b>Use for each class(amount)</b><span style="color:red;"></span></label>
                                                           </div>';
                                               
                                                    do{

                                                        $classnameforpayment =  $selectclasscntrow['ClassTemplateName'];
                                                        $classnameforID =  $selectclasscntrow['ClassTemplateID'];

                                                       
                                                        echo '<div class="col-sm-2 mb-3">
                                                                '.$classnameforpayment.'
                                                            </div>';

                                                        echo '<div  class="col-sm-10 mb-3">
                                                                <input type="number" style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;"   data-id="'.$classnameforID.'" placeholder="e.g $1000" class="form-control prosgeneralamounteachclass">
                                                          </div>';
                                                    
                                                    
                                                    }while($selectclasscntrow =  mysqli_fetch_assoc($selectclass));
                                            }

                                    echo '
                                     
                                    </div>
                                    <div class="col-sm-1"></div>
                                    
                                    </div>
                                    </div>

                                      <button type="button" class="btn btn-dark text-white float-start back rounded-3 pros-generalnxtback" style="float:right;position:relative;top:-10px;">Back</button>
                                      <button type="button" class="btn btn-sm text-white float-end  next   rounded-3   pros-generalnxt"  style="background-color:#0066FF;">Proceed <i class="fas fa-long-arrow-alt-right"></i></button> 
                                    ';
                  echo '</div>
                    <div class="col-md-1 text-center"></div>

                    </div>
                    </div>
                    </div>
                </div>
                    ';


                        //ADMISSION PAYMENT FORM






                        //ADMISSION prifix 

                        echo '<div class="main-content" id="prosloadpaymentprefixinput" style="display:none;">
                        <div class="row  pt-0 p-4" id="wizardRow">
                        <div class="col-md-1 text-center"></div>
                        <div class="col-md-10 text-center">
                        <div class="wizard-form py-4 my-2">
                        <ul id="progressBar" class="progressbar px-xlg-1 px-0">
                        <li id="progressList-1"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Select Campus</li>
                        <li id="progressList-2"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Set Classes</li>
                        <li id="progressList-3"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                       Adm Form Amount</li>
                        <li id="progressList-4"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list active">
                        Reg Prefix</li>
                        </ul>

                        </div>
                        <div class="col-md-1 text-center"></div>
                        </div>
                        </div>';

                        echo '<div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-9">
                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;" >
                        <div class="card-body">
                        <center><h5 class="ms-5" style="color:#666666;font-weight:bold;"> Admission Prefix for Applicant. </h5></center>
                        <small class="small pb-5" style="font-size:14px;">Kindly input your admission for each campus  below.<br><b>Note:</b>this prefix will be appended as their registration number.</small> 
                        <p></p>';



                        $selectverify_campus_new_prefix = mysqli_query($link, "SELECT  * FROM `campus` WHERE CampusID='$admissioncampus'");
                        $selectverify_campuscnt_new_prefix = mysqli_num_rows($selectverify_campus_new_prefix);
                        $selectverify_campuscnt_row_new_prefix = mysqli_fetch_assoc($selectverify_campus_new_prefix);


                        $campusnameclassprefix = $selectverify_campuscnt_row_new_prefix['CampusName'];



                            //pros add student prefix dropdown for admission start here  

                                echo '<div class="accordion">
                                    <div class="accordion__collapsible">
                                        <div class="collapsible__header">
                                            <p>' . $campusnameclassprefix . '</p>
                                        </div>
                                        <div class="collapsible__content">
                                            <p></p>
                                                <div class="pros-geneclass-label" style="margin-left:18%;"><label for="schoolName"><b>Enter your prefix below</b><span style="color:red;">*</span></label></div>
                                                
                                                <center>
                                                    <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:15px; outline: 1px solid #007bff;width:70%;" placeholder="e:g;LFSO" class="form-control form-control-sm mb-3" id="prosadmissionprefixinput">
                                           </center>

                                                
                                        </div>
                                    </div>
                                </div>';

                        //pros add student prefix dropdown for admission end here  
                        echo '<p></p><p></p><button type="button" class="btn btn-dark text-white float-start back rounded-3 pros-generalnxtback" style="float:right;position:relative;top:-10px;"><i class="fas fa-long-arrow-alt-left"></i> Back </button>
                        <button type="button" class="btn btn-sm text-white float-end next  rounded-3 pros-generalnxt"  style="background-color:#0066FF;float:right;position:relative;top:-10px;">Next <i class="fas fa-long-arrow-alt-right"></i></button>';
                        echo '</div>
                        </div>
                        </div>
                        <div class="col-sm-2"></div>
                        </div>
                        </div>';

                        //ADMISSION prefix 



                        //ADMISSION CHOICE OF CBT EXAM
                        echo '<div class="row" id="pros-admissionchoiceofexam"   style="display:none;" >
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">

                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;border:none;" >
                        <div class="card-body">

                        <u style="cursor:pointer;float:right;margin-right:3%;" class="pros-generalnxtback" >
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back
                        </u>
                        <div class="row" id="createwelcomemsg-setup" style="padding:0%;">
                        <center><h4 class="ms-5" style="color:#666666;font-weight:bold;">Admission CBT Exammination </h4></center> 

                        <center><img  class="" src="../../assets/images/users/admissioniexammages.png" style="width:200px;height:150px;"></center>


                        <center><p class="pros-setmsgdes ms-4" style="display:block;font-size:15px;display:block;">
                        Do you want to set CBT Exam for applicant to partake before getting admitted? if yes click proceed below else click skip.
                        </p></center>

                        <div style="display:flex;">
                        <button type="button" class="btn btn-dark text-white float-start back rounded-3  prosskipadmissioncbt" style=""> Skip </button>
                        <button type="button" class="btn btn-sm text-white  next   rounded-3 float-end   prosgenralnxtbutton"  style="background-color:#0066FF;">Proceed <i class="fas fa-long-arrow-alt-right"></i></button>  
                        </div>

                        </div>

                        </div>

                        </div>

                        </div>
                        <div class="col-sm-2"></div>

                        </div>';

                        //ADMISSION CHOICE OF CBT EXAM




                        //ADMISSION CONGRATULATIONS MESSAGE HALF SETUP
                        echo '<div class="row" id="pros-admissionadmistrativecongratemessage"   style="display:none;" >

                      
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">

                                <u style="cursor:pointer;float:right;" class="pros-generalnxtback" >
                                <i class="fas fa-long-arrow-alt-left"></i>
                                <b>Back</b>
                                </u>

                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;border:none;" >
                        <div class="card-body">';

                        

                        echo '<div class="row" id="createwelcomemsg-setup" style="padding:0%;">
                        <center><h4 class="ms-5" style="color:#666666;font-weight:bold;">Congratulations ' . $ownerfirstName . ' </h4></center> 


                        <center><img  class="" src="../../assets/images/users/welcomejifimage.gif" style="width:200px;height:150px;"></center>


                            <p class="pros-setmsgdes ms-4" style="display:block;font-size:14px;">
                                    Well done on finishing the initial wizard setup! Maintain your momentum and proceed to configure the admission website. Your progress is remarkable! Continue confidently to the next stage, pushing forward towards your goals. You\' re doing fantastic!
                            </p>

                        </div>

                        <button type="button" class="btn btn-dark text-white float-start back rounded-3  pros-skipwebcontent" data-campus="'.$admissioncampus.'" style=""> Skip </button>
                        <button type="button" class="btn btn-sm text-white  next   rounded-3 float-end   proceedfromcontowebsetup-btn"  style="background-color:#0066FF;">Proceed <i class="fas fa-long-arrow-alt-right"></i></button>  

                         

                        </div>
                        </div>
                        </div>
                        <div class="col-sm-2"></div>

                        </div>';
                        //ADMISSION CONGRATULATIONS MESSAGE HALF SETUP




                        //ADMISSION TERM AND SESSION
                        echo '<div class="main-content" id="prosadmissiontermandsession" style="display:none;">
                        <div class="row  pt-0 p-4" id="wizardRow">
                        <div class="col-md-12 ">
                        <div class="wizard-form py-4 my-2">
                        <ul id="progressBar" class="progressbar px-xlg-1 d-flex px-0">
                            <li id="progressList-1"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list  active">
                            Session & term</li>
                            <li id="progressList-2"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Title & des</li>
                            <li id="progressList-3"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                            Benefit</li>
                            <li id="progressList-4"
                            class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        FAQS</li>

                        <li id="progressList-5"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list mr-2">
                        Images</li>

                        </ul>

                        </div>

                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;border:none;" >
                        <div class="card-body">
                        <div class="row">
                                <div class="col-sm-4 d-none d-lg-block">
                                    <div class="pros-dotted-box">
                                    <span class="schooliconinform" >
                                        <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/session-setupimage.png" >
                                    </span>
                                    </div>
                            </div>

                                <div class="col-sm-12 col-lg-8 col-md-12 " >
                                        <h5 class="" style="color:#666666;font-weight:bold;"> Admission session and term </h5>
                                        <small class="small pb-5" style="font-size:13px;">Kindly select term you want to set admission below.</small> 
                                        <br> <br>';
                                        
                                    


                                $verifysession = mysqli_query($link, "SELECT * FROM `session`");
                                $verifysessioncnt = mysqli_num_rows($verifysession);
                                $verifysessioncntrow = mysqli_fetch_assoc($verifysession);

                                $verifysession_current = mysqli_query($link, "SELECT * FROM `session` WHERE sessionStatus='1'");
                                $verifysessioncnt_current = mysqli_num_rows($verifysession_current);
                                $verifysessioncntrow_current = mysqli_fetch_assoc($verifysession_current);

                                $currentsession = $verifysessioncntrow_current['sessionName'];


                            

                                if ($verifysessioncnt > 0) {

                                    echo '<div class="pros-geneclass-label" style=" "><label  for="schoolName">Session<span style="color:red;">*</span></label></div>
                                                <div class="form-floating mb-3 fnamevalidate">
                                                <div class="select-wrapper">
                                                <select style="height:30px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3;  border-radius:80px; outline: 1px solid #007bff;" class="form-control form-control-sm " id="sessionadmission">

                                                <option value="0">Select Session</option>';

                                                do {

                                                    $sessionname = $verifysessioncntrow['sessionName'];

                                                    if ($currentsession == $sessionname) {
                                                        $slectedsession = 'selected';

                                                    } else {
                                                        $slectedsession = '';
                                                    }
                                                    echo '<option ' . $slectedsession . ' value="' . $sessionname . '">' . $sessionname . '</option>';

                                                } while ($verifysessioncntrow = mysqli_fetch_assoc($verifysession));

                                        echo '</select>
                                                </div>
                                            </div>';

                                } else {

                                }

                                

                        $verifyterm = mysqli_query($link, "SELECT * FROM `termalias` WHERE  CampusID='$admissioncampus'");
                        $verifytermcnt = mysqli_num_rows($verifyterm);
                        $verifytermcntrow = mysqli_fetch_assoc($verifyterm);


                        // select the current term here
                        $selecttermsemester = mysqli_query($link, "SELECT * FROM `termorsemester` WHERE `status`='1'");
                        $selecttermsemester_cnt = mysqli_num_rows($selecttermsemester);
                        $selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester);

                        $curentterm = $selecttermsemester_row['TermOrSemesterID'];
                        // select the current term here

                        if ($verifytermcnt > 0) {
                        echo '
                        <div class="pros-geneclass-label" style=" "><label  for="schoolName">Term<span style="color:red;">*</span></label></div>
                        <div class="form-floating mb-3 fnamevalidate">
                        <div class="select-wrapper">

                            <select style="height:30px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3;  border-radius:80px; outline: 1px solid #007bff;" class="form-control form-control-sm " id="termadmission">
                                <option value="0">Select Term</option>';

                        do {

                        $termaliasname = $verifytermcntrow['TermAliasName'];
                        $termaliaID = $verifytermcntrow['TermAliasName'];

                        $curenttermalias = $selecttermsemester_row['TermOrSemesterID'];

                        if ($curenttermalias == $curentterm) {
                        $slected = 'selected';

                        } else {
                        $slected = '';
                        }

                        echo '<option ' .$slected . ' value="'.$curentterm . '">' . $termaliasname . '</option>';


                        } while ($verifytermcntrow = mysqli_fetch_assoc($verifyterm));

                        echo '</select>
                        </div>
                        </div>';
                        } else {

                        }
                        echo '
                        <br>
                        <button type="button" class="btn btn-dark text-white float-start back rounded-3 pros-generalnxtback" style="float:right;position:relative;top:-10px;"><i class="fas fa-long-arrow-alt-left"></i> Back</button>
                        <button type="button" class="btn btn-sm text-white  next   rounded-3 float-end   pros-generalnxt"  style="background-color:#0066FF;">Proceed <i class="fas fa-long-arrow-alt-right"></i></button>  
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>';
                        echo '
                        </div>';

                        //ADMISSION TERM AND SESSION







                        //ADMISSION TITLE AND DESCRIPTION
                        echo '<div class="main-content" id="prosadmissiondestitle" style="display:none;">

                        <div class="row  pt-0 p-4" id="wizardRow">
                        <div class="col-md-12 ">
                        <div class="wizard-form py-4 my-2">
                        <ul id="progressBar" class="progressbar px-xlg-1 d-flex px-0">
                        <li id="progressList-1"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list  ">
                        Session & term</li>
                        <li id="progressList-2"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list active">
                        Title & des</li>
                        <li id="progressList-3"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Benefit</li>
                        <li id="progressList-4"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        FAQS</li>

                        <li id="progressList-5"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list mr-2">
                        Images</li>





                        </ul>

                        </div>

                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;" >
                        <div class="card-body">
                        <div class="row">
                        <div class="col-sm-4 d-none d-lg-block">
                        <div class="pros-dotted-box">
                        <span class="schooliconinform" >
                            <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/admissionwebsiteimageconfig.gif" >
                        </span>
                        </div>
                        </div>

                        <div class="col-sm-12 col-lg-8 col-md-12 " >
                            <h5 class="" style="color:#666666;font-weight:bold;"> Admission Title and Description </h5>
                            <small class="small pb-5" style="font-size:13px;">Kindly input your description  and title of below.</small> 
                            <br> <br>';


                            echo '<div class="pros-geneclass-label" style=""><label for="schoolName">Admission title<span style="color:red;">*</span></label></div>
                                
                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your title here"  class="form-control form-control-sm mb-2" id="admissiontitle">
                            ';

                            echo ' <div class="pros-geneclass-label" style="">
                                <label for="schoolName">Admission Description<span style="color:red;">*</span></label>
                                </div>
                                <textarea style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your description here"  class="form-control" id="prosadmissondes"></textarea>
                           ';
                            echo '<br> 
                        <button type="button" class="btn btn-dark text-white float-start back rounded-3 pros-generalnxtback" style="float:right;position:relative;top:-10px;"><i class="fas fa-long-arrow-alt-left"></i> Back</button>
                        <button type="button" class="btn btn-sm text-white  next   rounded-3 float-end   pros-generalnxt"  style="background-color:#0066FF;">Proceed <i class="fas fa-long-arrow-alt-right"></i></button>  
                        
                        </div>
                        </div>

                        </div>


                        </div>
                        </div>
                        </div>
                        </div>';

                        echo '

                        </div>';

                        //ADMISSION TITLE AND DESCRIPTION



                        //ADMISSION BENEFIT
                        echo '<div class="main-content" id="prosadmissionbenefitcontaineer"
                        style="display:none;">

                        <div class="row  pt-0 p-4" id="wizardRow">
                        <div class="col-md-12 ">
                        <div class="wizard-form py-4 my-2">
                        <ul id="progressBar" class="progressbar px-xlg-1 d-flex px-0">
                        <li id="progressList-1"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list  ">
                        Session & term</li>
                        <li id="progressList-2"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Title & des </li>
                        <li id="progressList-3"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list active">
                        Benefit</li>
                        <li id="progressList-4"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        FAQS</li>

                        <li id="progressList-1"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list mr-2">
                        Images</li>

                        </ul>

                        </div>

                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;" >
                        <div class="card-body">

                        <div class="row">

                        <div class="col-sm-4 d-none d-lg-block">
                        <div class="pros-dotted-box">
                        <span class="schooliconinform" >
                            <img  class="pros-schooliconinform-schoolhead-image mt-4" src="../../assets/images/users/studenadmissionbenefit.gif" >
                        </span>
                        </div>
                        </div>

                        <div class="col-sm-12 col-lg-8 col-md-12 " >
                        <h5 class="" style="color:#666666;font-weight:bold;"> What benefits will you offer to your applicants?</h5>
                        <small class="small pb-5" style="font-size:13px;">Kindly state your benefit below.<br><b>Note:</b> If you intend to add more than the ones provided, do not hesitate to contact  for support.</small> 
                        <br> <br>';

                        echo '
                        <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit One<span style="color:red;">*</span></label></div>
                            <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here"  class="form-control  prosgeneralbenefit" id="prosbenefit1">

                        <div class="row">
                            <div class="col-sm-6" >
                                    <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Two<span style="color:red;">*</span></label></div>
                                  
                                        <input type="text" style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here"  class="form-control  prosgeneralbenefit" id="prosbenefit2">
                            </div>


                            <div class="col-sm-6" >
                            <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Three<span style="color:red;">*</span></label></div>
                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here"    class="form-control  prosgeneralbenefit" id="prosbenefit3">
                            </div>

                            <div class="col-sm-6" >
                            <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Four<span style="color:red;">*</span></label></div>
                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here"  class="form-control  prosgeneralbenefit" id="prosbenefit4">
                            </div>

                            <div class="col-sm-6" >
                            <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Five<span style="color:red;">*</span></label></div>
                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here"  class="form-control  prosgeneralbenefit" id="prosbenefit5">
                            </div>
                        </div> ';

                        echo '<br> 
                        <button type="button" class="btn btn-dark text-white float-start back rounded-3 pros-generalnxtback" style="float:right;position:relative;top:-10px;"><i class="fas fa-long-arrow-alt-left"></i> Back</button>
                        <button type="button" class="btn btn-sm text-white  next   rounded-3 float-end   pros-generalnxt"  style="background-color:#0066FF;">Proceed <i class="fas fa-long-arrow-alt-right"></i></button>  
                        </div>
                        </div>
                        </div>

                        </div>
                        </div>
                        </div>
                        </div>';

                        echo '

                        </div>';

                        //ADMISSION BENEFIT






                        //ADMISSION FAQ QUESTION
                        echo '<div class="main-content" id="prosadmissionfaqcontaineer"
                        style="display:none;">

                        <div class="row  pt-0 p-4" id="wizardRow">
                        <div class="col-md-12 ">
                        <div class="wizard-form py-4 my-2">
                        <ul id="progressBar" class="progressbar px-xlg-1 d-flex px-0">
                        <li id="progressList-1"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list  ">
                        Session & term</li>
                        <li id="progressList-2"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Title & des</li>
                        <li id="progressList-3"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Benefit</li>
                        <li id="progressList-4"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list active">
                        FAQS</li>


                        <li id="progressList-5"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Images</li>


                        </ul>

                        </div>

                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;" >
                        <div class="card-body">

                        <div class="row">
                        <div class="col-sm-4 d-none d-lg-block">
                        <div class="pros-dotted-box">
                        <span class="schooliconinform" >
                            <img  class="pros-schooliconinform-schoolhead-image" src="../../assets/images/users/faqsmges.gif" >
                        </span>
                        </div>
                        </div>



                        <div class="col-sm-12 col-lg-8 col-md-12 " >

                        <h5 class="" style="color:#666666;font-weight:bold;"> Frequently Asked Questions(FAQS)</h5>
                        <small class="small pb-5" style="font-size:13px;">Kindly state your FAQS below.<br><b>Note:</b> If you intend to add more than the ones provided, do not hesitate to contact  for support.</small> 
                        <br> <br>';

                        echo '


                        <div class="row">
                            <div class="col-sm-6" >
                                    <div class="pros-geneclass-label" style=""><label for="schoolName">Question <span style="color:red;">*</span></label></div>
                                    <input type="text" style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" id="prosfaquestion1" placeholder="How do I apply for admission to your school?"  class="form-control  prosgeneralfaqquestion" >
                                   
                            </div>


                            <div class="col-sm-6" >
                                    <div class="pros-geneclass-label" style="">
                                        <label for="schoolName">Answer<span style="color:red;">*</span></label>
                                    </div>

                                    <textarea style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" id="prosfaqanswer1"   class="form-control form-control-sm generalfaqanswers" ></textarea>

                                    
                            </div>



                        <div class="col-sm-6" >
                            <div class="pros-geneclass-label" style=""><label for="schoolName">Question <span style="color:red;">*</span></label></div>
                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" id="prosfaquestion2" placeholder="How do I apply for admission to your school?"  class="form-control  prosgeneralfaqquestion" >
                               
                        </div>


                        <div class="col-sm-6" >
                            <div class="pros-geneclass-label" style="">
                            <label for="schoolName">Answer<span style="color:red;">*</span></label>
                            </div>

                          
                            <textarea style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" id="prosfaqanswer2"  class="form-control form-control-sm generalfaqanswers" placeholder="e:g;You can apply on our website."></textarea>
                            
                            
                        </div>


                        <div class="col-sm-6" >
                                <div class="pros-geneclass-label" style=""><label for="schoolName">Question <span style="color:red;">*</span></label></div>
                                    <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" id="prosfaquestion3" placeholder="How do I apply for admission to your school?"  class="form-control  prosgeneralfaqquestion" >
                        </div>


                        <div class="col-sm-6" >
                                <div class="pros-geneclass-label" style="">
                                <label for="schoolName">Answer<span style="color:red;">*</span></label>
                                </div>

                                <div class="form-floating mb-3 fnamevalidate">
                                     <textarea style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" id="prosfaqanswer3" placeholder="e:g;You can apply on our website." class="form-control form-control-sm generalfaqanswers" ></textarea>
                                </div>
                        </div>

                        </div>';
                        echo '<br> 

                        <button type="button" class="btn btn-dark text-white float-start back rounded-3 pros-generalnxtback" style="float:right;position:relative;top:-10px;"><i class="fas fa-long-arrow-alt-left"></i> Back</button>
                        <button type="button" class="btn btn-sm text-white  next   rounded-3 float-end   pros-generalnxt"  style="background-color:#0066FF;">Proceed <i class="fas fa-long-arrow-alt-right"></i></button>  
                        </div>
                        </div>
                        </div>

                        </div>
                        </div>
                        </div>
                        </div>';

                        echo '

                        </div>';

                        //ADMISSION FAQ QUESTION



                        //ADMISSION WEB IMAGES
                        echo '<div class="main-content" id="prosadmissionwebimagescontaineer"
                        style="display:none;">

                        <div class="row  pt-0 p-4" id="wizardRow">
                        <div class="col-md-12 ">
                        <div class="wizard-form py-4 my-2">
                        <ul id="progressBar" class="progressbar px-xlg-1 d-flex px-0">
                        <li id="progressList-1"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list  ">
                        Session & term</li>
                        <li id="progressList-2"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Title & des</li>
                        <li id="progressList-3"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        Benefit</li>
                        <li id="progressList-4"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list ">
                        FAQS</li>


                        <li id="progressList-5"
                        class="d-inline-block fw-bold w-25 position-relative text-center float-start progressbar-list active">
                        Images</li>



                        </ul>

                        </div>

                        <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-1"></div>

                        <div class="col-sm-12 col-md-12 col-lg-10">
                        <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;border:none;" >
                        <div class="card-body">
                        <center><h5 class="card-title" style="color:#666666;font-weight:bold;">Website image and color</h5> </center>
                        <center><div class="small card-text" style="font-size:15px;display:block;">Kindly Configure your admission website background image,Banner image and button color below. </div></center>
                        ';


                        echo '
                        <center>
                            <div class="proscontainerimage select-image prosbacgroundimagesel">
                                        
                                <h4>Background Image <i class="fas fa-pen" style="font-size:13px;"></i></h4>
                                <input type="file" class="prosfilebackground" id="file" accept="image/*" hidden>
                                <div class="img-area prosbackgroundimagearea" data-img="">
                                        
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    
                                    <p>mage dimension must be   <span>1000 x 667</span></p>
                                </div>
                            
                            </div>
                                
                            ';



                        echo '<br> 

                        <button type="button" class="btn btn-dark text-white float-start back rounded-3 pros-generalnxtback" style="float:right;position:relative;top:-10px;"><i class="fas fa-long-arrow-alt-left"></i> Back</button>
                        <button type="button" class="btn btn-sm text-white  next   rounded-3 float-end   pros-generalnxt" data-campus="'.$admissioncampus.'" style="background-color:#0066FF;">Proceed <i class="fas fa-long-arrow-alt-right"></i></button>  

                        </div>
                        </div>
                        </div>
                        <div class="col-sm-12 "col-md-12 "col-lg-1"></div>
                        </div>

                        </div>
                        </div>
                        </div>
                        </div>';

                        echo '

                        </div>';

                        //ADMISSION WEB IMAGES


   }







?>