<?php



            include('../../config/config.php');

            $campusID = $_POST['campusID'];
            $sessionName = $_POST['sessionName'];
            $studentID = $_POST['studentID'];
             $ClassID = $_POST['ClassID'];
             $term = $_POST['term'];




    echo  '<form class="pros-form-checkbox ">

            <div class="row">';
            

                    $select_optionalfeecharegerorset = mysqli_query($link,"SELECT * FROM `chargestructure` INNER JOIN `subcategory` ON
                `chargestructure`.`SubcategoryID` = `subcategory`.`SubcategoryID` WHERE `chargestructure`.`Status`='0' 
                AND `chargestructure`.`CampusID`='$campusID' AND `chargestructure`.`Session`='$sessionName' AND `chargestructure`.`TermOrSemesterID`='$term' AND
                `ClassOrDepartmentID`='$ClassID'");
                    $select_optionalfeecharegerorsetcnt = mysqli_num_rows($select_optionalfeecharegerorset);
                    $select_optionalfeecharegerorsetcntrows = mysqli_fetch_assoc($select_optionalfeecharegerorset);


                    if($select_optionalfeecharegerorsetcnt > 0)
                    {




                        echo  '<h3 class="" style="margin-left:2%;" >Optional Fee</h3>
                                                
                        <span class="ms-2"  style="color:#363949;font-size:13px;line-height:25px;">
                                Please select the fees below for assignment
                                
                        </span>
                           <p></p> ';
                      


                        do{

                                    $SubcategoryTitle =   $select_optionalfeecharegerorsetcntrows['SubcategoryTitle'];
                                    $SubcategoryID =   $select_optionalfeecharegerorsetcntrows['SubcategoryID'];
                                    $ChargeStructureID =   $select_optionalfeecharegerorsetcntrows['ChargeStructureID'];
                                    $CategoryID =   $select_optionalfeecharegerorsetcntrows['CategoryID'];


                                    $select_optionalassigned = mysqli_query($link,"SELECT * FROM `assignoptionalfees` 
                                    WHERE `ClassOrDepartmentID`='$ClassID' AND `SubcategoryID`='$SubcategoryID' AND `StudentID`='$studentID'
                                     AND `Session`='$sessionName' AND `TermOrSemesterID`='$term'");

                                    $select_optionalassigned_cnt = mysqli_num_rows($select_optionalassigned);


                                        if($select_optionalassigned_cnt > 0)
                                        {
                                                $proscheckedsubcategory = 'checked';
                                        }else
                                        {
                                                   $proscheckedsubcategory = '';
                                        }


                                        $select_optionpaid_Fee = mysqli_query($link,"SELECT * FROM `transactions` WHERE CampusID='' AND StudentID='$studentID' AND SubcategoryID='$SubcategoryID' 
                                        AND TermOrSemesterID='$term' AND `Session`='$sessionName'");
                                        $select_optionpaid_Feecnt = mysqli_num_rows($select_optionpaid_Fee);

                                        if($select_optionpaid_Feecnt > 0)
                                        {
                                            $proscheckedpaid_disabled = 'disabled';

                                        }else
                                        {
                                            $proscheckedpaid_disabled = '';

                                        }
                                  


                                            
                                 echo '<div class="col-sm-6">
                                        <div class="pros-inputGroup">

                                            <input '.$proscheckedsubcategory.' '.$proscheckedpaid_disabled .' class="prosper-check-optionalfeecontent" id="prosloadcheckbox-optionalfee'.$ChargeStructureID.'" data-id="'.$CategoryID.'" value="'.$SubcategoryID.'" name="option1" type="checkbox"/>
                                            <label for="prosloadcheckbox-optionalfee'.$ChargeStructureID.'">'.$SubcategoryTitle.'</label>

                                        </div>
                                    </div>';

                        }while($select_optionalfeecharegerorsetcntrows = mysqli_fetch_assoc($select_optionalfeecharegerorset));

                            

                    }else
                    {


                                $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                                $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);
                
                                if ($pros_select_record_not_found_count > 0) {
                                

                                    $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
                                    echo ' <div align="center">  
                                         <img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">
                                         <p style="font-size:15px;">No Optional fee found.</p>
                                        </div>
                                       ';
                                    

                                    
                                } else {
                                    // Record not found
                                    // You can do something else here if the record doesn't exist
                                }

                    }


           echo'</div>
         </form>';







?>