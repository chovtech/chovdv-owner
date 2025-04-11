<?php

                                include('../../config/config.php');

                            
                                $IntitutionID = $_POST['IntitutionID'];
                                $campusID = $_POST['campusID'];

                                $prosschool_logo  = mysqli_query($link,"SELECT * FROM `institution` WHERE InstitutionID='$IntitutionID'");
                                $prosschool_logo_cnt = mysqli_num_rows($prosschool_logo);
                                $prosschool_logo_cntrow = mysqli_fetch_assoc($prosschool_logo);
                                $InstitutionLogo =  $prosschool_logo_cntrow['InstitutionLogo'];

                                  
                      
                      
                                    echo '<div class="row">
                                    <div class="col-sm-2 col-md-2"></div>
                                    <div class="col-sm-8 col-md-8">
                                    <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;">
                                    <div class="card-body">
                                    <div class="row" id="createwelcomemsg-setup" style="padding:0%;">
                                        <div class="col-sm-12">
                                            <div class="proscontainerimage select-image ">
                                                        
                                                <h4>School Logo </h4>
                                                <input type="file" id="procickinputlogo" class="pros-logofilehere"  accept="image/*" hidden>
                                              <div class="img-area prosbackgroundimagearea proscreatnewschooldes" data-img="" >
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p>upload your school logo</p>
                                            </div>
                                            
                                            </div>
                                        </div>  
                                       
                                    </div>
                      
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2"></div>
                                    </div>';
                      
                      
                                    echo '<textarea id="prosgetimagecontethere-logo"  hidden="hidden"  name="logo" rows="4" cols="50">'.$InstitutionLogo.'</textarea>';
                      
                      
                      
                      
                     


?>