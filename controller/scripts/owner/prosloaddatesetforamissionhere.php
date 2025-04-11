


<?php

                include('../../config/config.php');
               
                $IntitutionID  = $_POST['InstitutionID'];



                $verifyupdatequerysettings = mysqli_query($link, "SELECT * FROM `webadmissionsetting` WHERE  `InstitutionID`='$IntitutionID'");
                $verifyupdatequerysettingscnt = mysqli_num_rows($verifyupdatequerysettings);
                $verifyupdatequerysettingscntrow = mysqli_fetch_assoc($verifyupdatequerysettings);
                
                
                
                  if($verifyupdatequerysettingscnt > 0)
                    {

                        $startdate =  $verifyupdatequerysettingscntrow['StartDate'];
                        $EndDate =  $verifyupdatequerysettingscntrow['EndDate'];
                        
                    }else
                    {
                        $startdate =  '';
                        $EndDate =  '';   
                    }
                    
                    
                    
             echo '<div class="row">

                     <span class="pros-schoolheading ms-1" style="line-height: 35px;">Set Admission Duration</span>
                        <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                Kindly  input your admission duration below.
                        </span><br>
                      <div class="col-sm-6 mt-3" >
                                    <div class="pros-geneclass-label" ><label for="schoolName">Start <span style="color:red;">*</span></label></div>
                                    <input type="date" style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" id="prosstartdate" value="'.$startdate.'"  class="form-control  prosgeneralfaqquestionedit" >
                        </div>

                        <div class="col-sm-6  mt-3" >
                                <div class="pros-geneclass-label" >
                                    <label for="schoolName">End<span style="color:red;">*</span></label>
                                </div>

                                <input type="date" style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" id="prosenddate" value="'.$EndDate.'"  class="form-control  prosgeneralfaqquestionedit" >
                        </div>
                </div>';
                    
                    
                    
                    
?>