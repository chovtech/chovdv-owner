<?php

                include('../../config/config.php');

                
                $IntitutionID = $_POST['IntitutionID'];
                $campusID = $_POST['campusID'];
                



                $selecttermsemester = mysqli_query($link,"SELECT * FROM `termorsemester`");
                $selecttermsemester_cnt = mysqli_num_rows($selecttermsemester);
                $selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester);


                if($selecttermsemester_cnt > 0)
                {

                    echo ' 
                    <div class="card" style="border-radius:20px;padding:20px;">
                    <div class="body"><br><br>
                    <div class="row">

                         <div align="center">
                                <span class="pros-schoolheading ms-1" style="line-height: 35px;">Term or semester here</span>
                                <span class="pros-sectionpart ms-1"  style="color: #363949;font-size:12px;display:block;">
                                        Kindly  input your default term or semester below.
                                </span><br>
                        </div>';
                    
                           do{

                                 $ternamesetup = $selecttermsemester_row['TermOrSemesterName'];
                                 $ternamesetupID = $selecttermsemester_row['TermOrSemesterID'];

                                 echo '<div class="col-sm-2"></div>';
                           

                                echo '<div class="col-sm-4">
                                      <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName">Term</label></div>
                                    <div class="pros-flexi-input-affix-wrapper-campus" style="opacity: 0.5;pointer-events: none;background-color:#d3d3d3;">
                                         &nbsp;&nbsp; <input type="text" disabled  class="pros-flexi-input " value="'.$ternamesetup.' Term" id="term" placeholder="term" style="width:80%;font-size:14px;font-weight:400;">
                                    </div>&nbsp;&nbsp;
                                </div>';


                                    $verifyterm = mysqli_query($link,"SELECT * FROM `termalias` WHERE TermOrSemesterID='$ternamesetupID' AND CampusID='$campusID'");
                                    $verifytermcnt = mysqli_num_rows($verifyterm);
                                    $verifytermcntrow = mysqli_fetch_assoc($verifyterm);
                                   
                                    if($verifytermcnt > 0)
                                    {

                                        $termaliasname =  $verifytermcntrow['TermAliasName'];


                                        echo '<div class="col-sm-4">
                                                    <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> TERM ALIAS<span style=""></span></label></div>
                                                <div class="pros-flexi-input-affix-wrapper-campus">
                                                &nbsp;&nbsp; <input type="text"   class="pros-flexi-input pros-getterm-aliasvalue" data-id="'.$ternamesetupID.'" value="'.$termaliasname.'"  placeholder="eg;Summer" style="width:80%;font-size:14px;font-weight:400;">
                                                </div>&nbsp;&nbsp;
                                        </div>';

                                    }else
                                    {

                                            echo '<div class="col-sm-4">
                                                    <div class="pros-flexi-label-wrapper " style="margin-right:6rem;"><label for="schoolName"> TERM ALIAS<span style=""></span></label></div>
                                                <div class="pros-flexi-input-affix-wrapper-campus">
                                                    &nbsp;&nbsp;<input type="text"   class="pros-flexi-input pros-getterm-aliasvalue" data-id="'.$ternamesetupID.'"   placeholder="eg;Summer" style="width:80%;font-size:14px;font-weight:400;">
                                                </div>&nbsp;&nbsp;
                                            </div>';

                                    }

                                    echo '<div class="col-sm-2"></div>';
                           
            
                           }while($selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester));

                           echo '<div class="col-sm-2"></div>';
                           echo '<br> <div class="col-sm-8"><button type="button" id="pros-createsession-termbtn"  style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light mt-2">Proceed</button></div>';
                           echo '<div class="col-sm-2"></div>';
                        echo '</div>
                        </div><br><br>
                        </div>
                        ';  


                        
                }else
                {


                    

                }




    ?>