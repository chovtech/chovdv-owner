<?php

    include ('../../config/config.php');

     $CampusID = $_POST['campusID'];
     $campusname = $_POST['campusname'];
     $selStaffID = $_POST['staffID'];

                echo '<div class="multipleSelection">
                            <div class="pros-flexi-label-wrapper " style="margin-right:10rem;"><label
                                for="schoolName">'.$campusname.'</label>
                            </div>
                        <div class="selectBox shadow-sm">
                            <input type="text" name="tags" data-role="tagsinput" id="tagsinput" placeholder="Click  here to select section"
                                class="tagsinput prostaginpu'.$CampusID.' form-control bg-grey">
                        </div>
                        <div id="checkBoxes-one" class="checkBoxes-one">
                            <p class="checkbox-title">Search Section  </p>
                            <div class="form-custom">
                                <input type="text" class="search form-control bg-grey" placeholder="Search...">
                            </div>
                            <div class="selectBox-cont">';

                            
                                    $select_cnt = mysqli_query($link,"SELECT * FROM `section` WHERE CampusID='$CampusID'");
                                    $select_cntrow = mysqli_num_rows($select_cnt);
                                    $select_cntrowcnt = mysqli_fetch_assoc($select_cnt);

                                        if($select_cntrow > 0)
                                        {
                                            do{

                                                $sectionName = $select_cntrowcnt['SectionName']; 
                                                $SectionID = $select_cntrowcnt['SectionID']; 
                                                $PrincipalOrDeanOrHeadTeacherUserID = $select_cntrowcnt['PrincipalOrDeanOrHeadTeacherUserID']; 


                                                if($PrincipalOrDeanOrHeadTeacherUserID  ==  $selStaffID)
                                                {
                                                                $proscheckfaculthere = 'checked';
                                                }else
                                                {
                                                               $proscheckfaculthere = '';
                                                }

                                                

                                            echo '<label class="custom_check w-100">
                                                    <input type="checkbox" '.$proscheckfaculthere.' data-id="'.$SectionID.'" data-campus="'.$CampusID.'" name="group" value="'.$sectionName.'" class="X pros-checkinputnewinsert">
                                                    <img width="40" class="" id="pros-img" title="">
                                                    <span class="checkmark"></span>'.$sectionName .'
                                                </label>';

                            
                                            }while($select_cntrowcnt = mysqli_fetch_assoc($select_cnt));
                                            
                                        }

                                echo '
                                </div><br><br>
                            <button type="button" id="pros-closedropdownclose" class="btn btn-sm  w-100 btn-danger mb-1 close">Close</button>
                        </div>
                    </div>';





       

        
   





?>