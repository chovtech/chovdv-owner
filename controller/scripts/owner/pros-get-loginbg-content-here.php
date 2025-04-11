<?php

                                include('../../config/config.php');

                            
                                $IntitutionID = $_POST['IntitutionID'];
                                $campusID = $_POST['campusID'];

                                $prosschool_logo  = mysqli_query($link,"SELECT * FROM `institution` WHERE InstitutionID='$IntitutionID'");
                                $prosschool_logo_cnt = mysqli_num_rows($prosschool_logo);
                                $prosschool_logo_cntrow = mysqli_fetch_assoc($prosschool_logo);

                                $LoginBgImage =  $prosschool_logo_cntrow['LoginBgImage'];
                                $LoginBgImage2 =  $prosschool_logo_cntrow['LoginBgImage2'];
                                $LoginBgImage3 =  $prosschool_logo_cntrow['LoginBgImage3'];




                                  echo '<textarea id="prosgetimagecontethere-login1"  hidden="hidden"  name="logo" rows="4" cols="50">'.$LoginBgImage.'</textarea>';
                                    echo '<textarea id="prosgetimagecontethere-login2"  hidden="hidden"  name="logo" rows="4" cols="50">'.$LoginBgImage2.'</textarea>';
                                    echo '<textarea id="prosgetimagecontethere-login3"  hidden="hidden"  name="logo" rows="4" cols="50">'.$LoginBgImage3.'</textarea>';

                                  
                      
                      
                        echo '<div class="row">
                                    <div class="col-sm-2 col-md-2"></div>
                                    <div class="col-sm-8 col-md-8">
                                    <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;">
                                    <div class="card-body">
                                    <div class="row" id="createwelcomemsg-setup" style="padding:0%;">

                                        <div class="col-sm-12">
                                            <div class="proscontainerimage select-image prosloadgerallogincontent " data-id="1">
                                                        
                                                <h4>Login  Image 1 </h4>
                                                <input type="file"  class="prosgeneralimageselectfilebg1 prosgeneralinputloginsel"  accept="image/*" hidden>
                                              <div class="img-area prosbackgroundimagearea proscreatnewschooldes prosloadgerallogincontentnew1" data-img="" >
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p>upload your  login Image</p>
                                              </div>
                                            
                                            </div>
                                        </div>  





                                        <div class="col-sm-12">
                                            <div class="proscontainerimage select-image prosloadgerallogincontent " data-id="2">
                                                        
                                                <h4>Login  Image 2</h4>
                                                <input type="file"  class="prosgeneralimageselectfilebg2 prosgeneralinputloginsel "  accept="image/*" hidden>
                                            <div class="img-area prosbackgroundimagearea proscreatnewschooldes prosloadgerallogincontentnew2" data-img="" >
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p>upload your  login Image</p>
                                            </div>
                                            
                                            </div>
                                        </div>  


                                    <div class="col-sm-12">
                                        <div class="proscontainerimage select-image prosloadgerallogincontent " data-id="3">
                                                    
                                            <h4>Login  Image 3</h4>
                                            <input type="file"  class="prosgeneralimageselectfilebg3 prosgeneralinputloginsel"  accept="image/*" hidden>
                                          <div class="img-area prosbackgroundimagearea prosloadgerallogincontentnew3 " data-img="" >
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>upload your  login Image</p>
                                        </div>
                                        
                                        </div>
                                    </div>  


                                       
                                    </div>
                      
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2"></div>
                        </div>';
                      
                      
                                  
                      
                      




                                    
                                  
                      
                      
                                  
                      


                                    
                                 
                      
                      
                     


?>