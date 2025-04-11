<?php
        include('../../config/config.php');

        $groupofschoolID = $_POST['SchoolID'];
        $UserID  = $_POST['UserID'];


        $select_schoolowner = mysqli_query($link,"SELECT * FROM `institution` WHERE `AgencyOrSchoolOwnerID`='$UserID' AND InstitutionID='$groupofschoolID'");
        $select_schoolowner_row = mysqli_fetch_assoc($select_schoolowner);
        $select_schoolowner_row_cnt = mysqli_num_rows($select_schoolowner);


        if($select_schoolowner_row > 0)
        {
                $groupschoolID =  $select_schoolowner_row['InstitutionID'];
                $schoolname =  $select_schoolowner_row['InstitutionGeneralName'];  
                $schoolmotto =  $select_schoolowner_row['InstitutionMotto'];
                $schoollink =  $select_schoolowner_row['CustomUrl']; 

                $newlink = str_replace(".edumess.com", "", $schoollink);
                

                                                echo '<div class="row"  style="padding:0%;">
                                                    <div class="col-sm-6 d-none d-lg-block  style="margin-top:3%;">

                                                    <div class="pros-diskschooltitleedit flexi-wizard-title"><h1>Create School </h1></div><br>
                                                  
                                                    <div class="pros-dotted-boxedit">
                                                           <span class="schooliconinformedit" >
                                                           <img  class="schooliconinform-image" src="../../assets/images/users/institutionimage.png" >
                                                             
                                                           </span>
                                                           
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                                    <span class="sc-iBPTik pros-schoolheading" style="line-height: 35px; margin-left:11%;" >About The School</span>
                                                        <span class="sc-iBPTik dhGlqA"style="margin-left:11%;font-family: poppins, sans-serif;color: #363949;font-size:12px;">
                                                            Fill information about your school below
                                                           
                                                       </span>
                                                        <span direction="vertical" class=""></span><br><br>
                                                            <div class="pros-flexi-label-wrapper"><label for="schoolName">School Name<span style="color:red;">*</span></label></div>
                                                            <div class="pros-flexi-input-affix-wrapper schollnameerr-newedit">
                                                                   <input name="schoolName" class="pros-flexi-input" placeholder="e.g Startop schools" id="pros-eitschoolname" type="text" spacebottom="10px" required="" value="'.$schoolname.'" style="width: 100%;border:none;">
                                                            </div>&nbsp;&nbsp;&nbsp;
                                                            <div class="pros-flexi-label-wrapper"><label for="schoolName">School Motto<span style="color:red;">*</span></label></div>
                                                            <div class="pros-flexi-input-affix-wrapper schollmottoerr-newedit">
                                                                   <input name="schoolName" class="pros-flexi-input" id="pros-eitschoolmotto" placeholder="enter your school motto" type="text" spacebottom="10px" required="" value="'.$schoolmotto.'" style="width: 100%;border:none;">
                                                            </div>

                                                             &nbsp;&nbsp;&nbsp;
                                                             <div class="pros-flexi-label-wrapper"><label for="schoolName">School Link<span style="color:red;">*</span></label>
                                                             
                                                            </div>
                                                            
                                                            <div class="pros-input-wrappernew schollurlerr-newedit">
                                                                  <input name="schoolName" class="pros-flexi-input schoollinkclassedit" id="pros-editschoolurl" placeholder="e.g exampleschools" type="text" spacebottom="10px" required="" value="'.$newlink.'" style="width: 100%;border:none;">
                                                                <span class="pros-input-append">.edumess.com</span>
                                                            </div> &nbsp;&nbsp;&nbsp;
                                                            <span class="sc-iBPTik wIHaT" id="fullschoollinkconedit" data-school="'.$groupofschoolID.'" style="margin-top:-2px;margin-left:40px;color:blue;display:none;">https://<span id="schoollinkdisedit"></span>.edumess.com</span> <br>
                                                          
                                                            <span class="sc-iBPTik wIHaT" style="margin-top:-2px;margin-left:52px;font-family:poppins,sans-serif;color: #363949;font-size:11px;">
                                                                  This will be the  url link to your portal
                                                            </span>


                                                            
                                                            &nbsp;&nbsp;<br></br>
                                                            <button type="button" id="editschoolbtn-full" data-id="'.$groupschoolID.'"   style="background-color:#007bff;cursor:pointer;width:80%;margin-left:11%;font-size:14px;" class="btn btn-block btn-lg text-light">Update School</button>


                                                    </div>

                                                    
                                                </div>';
        }else
        {

        }


?>