<?php

                include('../../config/config.php');
                $IntitutionID = $_POST['IntitutionID'];
                $campusID = $_POST['campusID'];



                
                $delect_section = mysqli_query($link, "SELECT * FROM `sectionlist`
                 WHERE NOT EXISTS (SELECT * FROM `section` 
                 WHERE `sectionlist`.`SectionListID` = `section`.`SectionListID` AND `section`.`CampusID`='$campusID')");
                $delect_section_cnt = mysqli_num_rows($delect_section);
                $delect_section_cnt_row = mysqli_fetch_assoc($delect_section);
                $num = 1;




                if($delect_section_cnt > 0)
                {

                                    echo '<br><div class="row">';


                                    do {
                    
                                        $section_name = $delect_section_cnt_row['SectionListName'];
                                        $facultyID = $delect_section_cnt_row['SectionListID'];
                                        //<span style="font-weight:800;">'.$num++.'</span>
                    
                    
                    
                                        $pros_verify_sectio_created = mysqli_query($link,"SELECT * FROM `section` WHERE `CampusID`='$campusID' AND SectionListID='$facultyID'"); 
                                        $pros_verify_sectio_created_cnt = mysqli_num_rows($pros_verify_sectio_created);
                                        $pros_verify_sectio_created_cnt_row = mysqli_fetch_assoc($pros_verify_sectio_created);
                    
                    
                                        if($pros_verify_sectio_created_cnt > 0)
                                        {
                    
                                                $sectionalisanamegotten =  $pros_verify_sectio_created_cnt_row['SectionName'];
                                                $pros_checked_sectioncreated = 'checked';
                                                $bordercolor = '1px solid #007bff';
                                                
                                        }else
                                        {
                                            $sectionalisanamegotten = $section_name;
                                            $pros_checked_sectioncreated = '';
                                            $bordercolor = 'none';
                                        }
                                        
                    
                                           
                                        echo
                                        '<div class="col-sm-6 mb-3">
                                                        
                                                        <div class="card generalclass-checksection checksectiongeneral' . $facultyID . '" data-id="prosfacultyid'.$facultyID.'"  style="cursor:pointer;border-radius:10px;outline:'.$bordercolor.'" >
                                                            <div class="card-body" style="border:none; #007bff;border-radius:5px;height:50px;">
                                                            
                                                                <div class="radio-group">
                                                                    <input class="form-check-input pros-checkchildren sectioncheckbox " '.$pros_checked_sectioncreated.'  data-checkverify="checksectiongeneral' . $facultyID . '" value="' . $section_name . '"  id="prosfacultyid' . $facultyID . '" name="prosfacultyid' . $facultyID . '"   type="checkbox" >
                                                                        <label for="prosfacultyid' . $facultyID . '" style="cursor:pointer;font-size:12px;">' . $section_name . '</label>
                    
                                                                </div>
                                                            </div>
                                                        </div>  
                    
                                                    </div>';
                                            
                                            echo '<div class="col-sm-6 mb-3">
                                                        <input type="text" style="border-radius:10px;height:50px;color:gray;font-size:13px;outline:'.$bordercolor.'" data-id="'.$facultyID.'" value="'.$sectionalisanamegotten.'" class="form-control prosgetcheckedsectionaliasgeneralclass sectioncheckbox pros-checkchildren sectionalianameherechecked'.$facultyID.'" placeholder="enter section alias" >          
                                                </div>';
                                        
                    
                                    } while ($delect_section_cnt_row = mysqli_fetch_assoc($delect_section));
                    
                        echo '</div>';
    



                }else
                {


                    $selectwelcomingimage = mysqli_query($link,"SELECT * FROM `defaultimages` WHERE ImageName='abba-no-record-found-image2'");
                    $selectwelcomingimagecnt = mysqli_num_rows($selectwelcomingimage);
                    $selectwelcomingimagecntrow = mysqli_fetch_assoc($selectwelcomingimage);
                
                    $welcoming_images_onborading =  $selectwelcomingimagecntrow['BaseSixtyFour'];



                
                    echo '<div align="center" class="pb-1 pt-0 justify-content-center">
                    <img class="img-fluid" align="center" src="'.$welcoming_images_onborading.'"   style="width:10%;">

                    <p class="pt-2 fs-6 text-secondary">you have added all section!</p>
                    </div>';

                }


               












?>