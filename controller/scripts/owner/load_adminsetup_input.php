
<?php

    include('../../config/config.php');

    $userid = $_POST['UserID'];
    $ownername = $_POST['ownerfirst_Name'];
    $tagstate = $_POST['tagstate'];
    $groupschoolID_new = $_POST['groupSchoolID'];
    $campusID_new = $_POST['CampusID'];

    $usertypecheck = $_POST['usertypecheck'];

    


    $selectverify_campus_new_maincam = mysqli_query($link, "SELECT  * FROM `campus` WHERE   
    InstitutionID='$groupschoolID_new'");
    $selectverify_campuscnt_new_maincam = mysqli_num_rows($selectverify_campus_new_maincam);
    $selectverify_campuscnt_row_new_maincam = mysqli_fetch_assoc($selectverify_campus_new_maincam);


   
      // PROS GET ALREADY CREATED ADMIN HERE
      $sch_admin_sql =  mysqli_query($link,"SELECT * FROM `staff` WHERE `Role`='$usertypecheck' AND
    `InstitutionID`='$groupschoolID_new'  ORDER BY `StaffFirstName` ASC");
     $sch_admin_sql_cnt = mysqli_num_rows($sch_admin_sql);
    
    $tagstatecampusmain = $selectverify_campuscnt_row_new_maincam['TagState'];

    // if($tagstatecampusmain == '29'):

    // elseif($tagstatecampusmain != '29'):


        if($sch_admin_sql_cnt > 0)
        {

            $sch_admin_sql_row = mysqli_fetch_assoc($sch_admin_sql);


                do{

                    echo '<div class="row">

                            <div class="col-sm-6">
                                <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> First name<span style="color:red;">*</span></label></div>
                                <div class="pros-flexi-input-affix-wrapper-campus adminfnamecover">
                                    <input type="text" value="'.$sch_admin_sql_row['StaffFirstName'].'" class="pros-flexi-input generaladminfirstname" data-id="" id="admininsertid" placeholder="First name" style="width:93%;">
                                </div>&nbsp;&nbsp;
                            </div>

                            <div class="col-sm-6">
                                <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> Last Name<span style="color:red;">*</span></label></div>
                                <div class="pros-flexi-input-affix-wrapper-campus adminlnamecover">
                                    <input type="text"  value="'.$sch_admin_sql_row['StaffLastName'].'" class="pros-flexi-input generaladminltname"  data-id="" id="admin-lname" placeholder="Last name" style="width:93%;">
                                </div>&nbsp;&nbsp;
                            </div>

                            <div class="col-sm-12">
                                    <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                    <div class="pros-flexi-input-affix-wrapper-campus adminemailcover">
                                        <input type="text" value="'.$sch_admin_sql_row['StaffEmail'].'" class="pros-flexi-input generaladminemail" data-id="" id="admin-email" placeholder="eg:example@example.com" style="width:93%;">
                                    </div>&nbsp;&nbsp;
                            </div>

                            <div class="col-sm-12">
                                    <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                    <div class="pros-flexi-input-affix-wrapper-campus adminnumcover">
                                        <input type="tel" value="'.$sch_admin_sql_row['StaffMainNumber'].'" name="pros-adminnumset[main]" data-id="" class="pros-flexi-input generaladminnum pros-adminnumset" id="pros-adminnumset" placeholder="e.g., XXXX-XXX-XXXX" style="width:93%;margin-left:4%;">
                                    </div>&nbsp;&nbsp;
                            </div>
                    </div><br><br>';


                }while($sch_admin_sql_row = mysqli_fetch_assoc($sch_admin_sql));


        }else{
                        echo '<div class="row">

                        <div class="col-sm-6">
                            <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> First name<span style="color:red;">*</span></label></div>
                            <div class="pros-flexi-input-affix-wrapper-campus adminfnamecover">
                                <input type="text" class="pros-flexi-input generaladminfirstname" data-id="" id="admininsertid" placeholder="First name" style="width:93%;">
                            </div>&nbsp;&nbsp;
                        </div>

                        <div class="col-sm-6">
                            <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> Last Name<span style="color:red;">*</span></label></div>
                            <div class="pros-flexi-input-affix-wrapper-campus adminlnamecover">
                                <input type="text" class="pros-flexi-input generaladminltname"  data-id="" id="admin-lname" placeholder="Last name" style="width:93%;">
                            </div>&nbsp;&nbsp;
                        </div>

                        <div class="col-sm-12">
                                <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                <div class="pros-flexi-input-affix-wrapper-campus adminemailcover">
                                    <input type="text" class="pros-flexi-input generaladminemail" data-id="" id="admin-email" placeholder="eg:example@example.com" style="width:93%;">
                                </div>&nbsp;&nbsp;
                        </div>

                        <div class="col-sm-12">
                                <div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                <div class="pros-flexi-input-affix-wrapper-campus adminnumcover">
                                    <input type="number" name="pros-adminnumset[main]" data-id="" class="pros-flexi-input generaladminnum pros-adminnumset" id="pros-adminnumset" placeholder="e.g., XXXX-XXX-XXXX" style="width:93%;margin-left:4%;">
                                </div>&nbsp;&nbsp;
                        </div>

                </div>';

        }


                              



                                echo  '<div id="displayschool-admin"></div>
                                    

                                        <center>
                                            <span class="circle-icon" id="pros-add-admin-btn" style="color:#007bff;font-size:12px;cursor:pointer;">
                                            Add staff <i class="fa fa-plus"></i>
                                            </span>
                                        </center>&nbsp;&nbsp; 

                                        <br>
                                        <button type="button" id="createadmin-setup-btn" data-action="notedit" data-maintag="'.$tagstatecampusmain.'" data-tag="20" data-school="'.$groupschoolID_new.'" data-campus="'.$campusID_new.'"    style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Create Now</button><br>
                                        <input type="hidden" id="appendinput-admin">
                                        <input type="hidden" id="checkvalidatedadmin">';



    // endif;


    