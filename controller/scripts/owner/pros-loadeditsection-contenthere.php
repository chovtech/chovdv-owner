<?php

                include('../../config/config.php');

                
                $IntitutionID = $_POST['IntitutionID'];
                $campusID = $_POST['campusID'];
                 $sectionID = $_POST['sectionID'];


                 



                 echo '<div class="row">
                          <input type="hidden" value="'.$sectionID.'" id="prosloadsectionsubmitforeditid">
                        ';


                        $pros_verify_sectio_created = mysqli_query($link,"SELECT * FROM `section` WHERE `CampusID`='$campusID' AND SectionID='$sectionID'"); 
                        $pros_verify_sectio_created_cnt = mysqli_num_rows($pros_verify_sectio_created);
                        $pros_verify_sectio_created_cnt_row = mysqli_fetch_assoc($pros_verify_sectio_created);


                        if($pros_verify_sectio_created_cnt > 0)
                        {
                          

                                       $SectionName = $pros_verify_sectio_created_cnt_row['SectionName'];
                                

                            
                                         echo '<div class="col-sm-12 mb-3">
                                            
                                         <input type="text" style="border-radius:10px;height:50px;color:gray;font-size:13px;"  value="'.$SectionName.'" class="form-control  proseditsectionvalforeit" placeholder="enter section alias" >          
        
                                        </div>';


                        }else
                        {

                        }

                 echo '</div>';




?>