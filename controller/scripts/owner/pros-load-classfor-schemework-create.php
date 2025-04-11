<?php

            include('../../config/config.php');

            $abba_instituion_id = $_POST['abba_instituion_id'];
            $campusID = $_POST['campus_id'];
            $sectionID = $_POST['sectionID'];



            $select_class = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE SectionID='$sectionID' AND CampusID='$campusID'");
            $select_class_row = mysqli_num_rows($select_class);
            $select_class_rowcnt =mysqli_fetch_assoc($select_class);

            if($select_class_row > 0)
            {

                echo '<label class="ms-2" style="font-weight:700;">Class</label>';
                        do{

                            $ClassOrDepartmentName = $select_class_rowcnt['ClassOrDepartmentName'];
                            $ClassOrDepartmentID = $select_class_rowcnt['ClassOrDepartmentID'];

                            echo '<div class="col-sm-4">
                                <fieldset class="tari-tari_checkbox-group ">
                                    <div class="tari_checkbox ">
                                    <label  for="proscheck-classinsertschemework'.$ClassOrDepartmentID.'" class="tari_checkbox-wrapper">
                                        <input type="checkbox" value="'.$ClassOrDepartmentID.'" id="proscheck-classinsertschemework'.$ClassOrDepartmentID.'"  class="tari_checkbox-input prosgetclassnamecheck-general"   />
                                        <span class="tari_checkbox-tile">
                                        <span class="tari_checkbox-label">'.$ClassOrDepartmentName.'</span>
                                        </span>
                                    </label>
                                    </div>
                                </fieldset> 
                            </div>';



                        }while($select_class_rowcnt = mysqli_fetch_assoc($select_class)); 
            }else
            {
                $selectwelcomingimage_new = mysqli_query($link,"SELECT * FROM `defaultimages` WHERE ImageName='abba-no-record-found-image2'");
                $selectwelcomingimagecnt_new = mysqli_num_rows($selectwelcomingimage_new);
                $selectwelcomingimagecntrow_new = mysqli_fetch_assoc($selectwelcomingimage_new);

                $welcoming_images_onborading_new =  $selectwelcomingimagecntrow_new['BaseSixtyFour'];


            echo '<div align="center" class="pb-1 pt-0 justify-content-center">
                        <img class="img-fluid" align="center" src="'.$welcoming_images_onborading_new.'"   style="width:20%;"><br>
                       No class found for this section.<br>
                       
                </div>';
            }


            


?>