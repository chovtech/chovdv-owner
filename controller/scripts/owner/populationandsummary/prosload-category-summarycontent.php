<?php



                    include('../../../config/config.php');

                    $campusID = $_POST['campusID'];
                    $IntitutionID = $_POST['abba_get_stored_institution_id'];
                    $session = $_POST['session'];
                    $term = $_POST['term'];

                    $classID = $_POST['classID'];

                    

                   



                    $prosgetcategorycontent  = mysqli_query($link,"SELECT  DISTINCT(`chargestructure`.`CategoryID`),`chargestructure`.`InstitutionID`,
                     `chargestructure`.`CampusID`,`category`.`CategoryTitle`,`category`.`CategoryType`,`campus`.`CampusName`
                      FROM `category`  INNER JOIN `chargestructure` ON `category`.`CategoryID` = `chargestructure`.`CategoryID` INNER JOIN `campus` ON `chargestructure`.`CampusID` = `campus`.`CampusID`
                     WHERE `chargestructure`.`InstitutionID`='$IntitutionID' AND 
                     `chargestructure`.`Session`='$session' 
                    AND (`chargestructure`.`TermOrSemesterID`= $term OR  $term IS NULL) AND
                     (`chargestructure`.`CampusID`=$campusID OR $campusID IS NULL) AND  (`chargestructure`.`ClassOrDepartmentID`= $classID OR  $classID IS NULL)");

                    $prosgetcategorycontent_cnt = mysqli_num_rows($prosgetcategorycontent);
                    $prosgetcategorycontent_cnt_row = mysqli_fetch_assoc($prosgetcategorycontent);



                    if($campusID != 'NULL')
                    {
            
            
            
                        $pros_get_cinstiutionrecordhere = mysqli_query($link, "SELECT * FROM `institution` 
                        INNER JOIN `campus` ON `institution`.`InstitutionID` = `campus`.`InstitutionID`
                         WHERE `institution`.`InstitutionID`='$IntitutionID' AND  `campus`.`CampusID`='$campusID'");
                        $pros_get_cinstiutionrecordhere_row = mysqli_num_rows($pros_get_cinstiutionrecordhere);
                        $pros_get_cinstiutionrecordhere_row_cnt = mysqli_fetch_assoc($pros_get_cinstiutionrecordhere);
            
                        if($pros_get_cinstiutionrecordhere_row  > 0)
                        {
                            $fullschooolname =  $pros_get_cinstiutionrecordhere_row_cnt['InstitutionGeneralName'].' ('.$pros_get_cinstiutionrecordhere_row_cnt['CampusName'].')';
                        }else
                        {
                            $fullschooolname =  '';
                        }
            
            
                    }else
                    {
            
            
                            $pros_get_cinstiutionrecordhere = mysqli_query($link, " SELECT * FROM `institution` WHERE InstitutionID='$IntitutionID'");
                            $pros_get_cinstiutionrecordhere_row = mysqli_num_rows($pros_get_cinstiutionrecordhere);
                            $pros_get_cinstiutionrecordhere_row_cnt = mysqli_fetch_assoc($pros_get_cinstiutionrecordhere);
            
                            $fullschooolname =  $pros_get_cinstiutionrecordhere_row_cnt['InstitutionGeneralName'];
            
                    
            
                    }

                    if($prosgetcategorycontent_cnt > 0)
                    {



                                            
                        echo '
                        <button type="button" style="background-color: #696969;" class="btn btn-sm text-white float-end m-2 rounded-3  prosprint-printcontent-categorycontent mb-2 tari_edit_setting"  style="font-size:11px; ">
                            Print/Download <i class="fas fa-print"></i>
                        </button>
                        
                        <table class="table table-borderless "  id="prosloadcategosummfullcontent"  style="border-spacing: 5px;">


                            <thead style="background-color:#007ffb;height:2px;">
                                <tr>
                                <th scope="col" class="text-light"></th>
                                <th scope="col" class="text-light">'.$fullschooolname.'<br>Category Summary</th>
                                
                                <th scope="col" class="text-light"></th>
                                <th scope="col" class="text-light"></th>
                                <th scope="col" class="text-light"></th>
                                <th scope="col" class="text-light"></th>
                                
                                </tr>
                            </thead>
                        <thead style="background-color:#007ffb;height:2px;">
                            <tr>
                            <th scope="col" class="text-light"></th>
                            <th scope="col" class="text-light">Campus</th>
                            
                            <th scope="col" class="text-light">Category</th>
                           
                     
                         
                            <th scope="col" class="text-light">Type</th>
                            
                            <th scope="col" class="text-light">Amount</th>
                            <th scope="col" class="text-light"></th>
                            </tr>
                        </thead>
                        <tbody>';

                                        $num =1;

                                        do{


                                               $categorytitle = $prosgetcategorycontent_cnt_row['CategoryTitle'];
                                               $CategoryID = $prosgetcategorycontent_cnt_row['CategoryID'];
                                               $CampusIDNew = $prosgetcategorycontent_cnt_row['CampusID'];
                                               $CategoryType = $prosgetcategorycontent_cnt_row['CategoryType'];
                                               $CampusName = $prosgetcategorycontent_cnt_row['CampusName'];



                                               
                    
                                              
                                             

                                               $prosgettransactionforcategorcontent = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionIn FROM `transactions`
                                                WHERE InstitutionID='$IntitutionID' AND CampusID='$CampusIDNew' AND CategoryID='$CategoryID' AND 
                                                `session`='$session' AND (TermOrSemesterID= $term OR $term IS NULL) 
                                                AND `DeleteStatus`='0'");
                                                 $prosgettransactionforcategorcontent_cnt = mysqli_num_rows($prosgettransactionforcategorcontent);
                                                $prosgettransactionforcategorcontent_cnt_row = mysqli_fetch_assoc($prosgettransactionforcategorcontent);


                                                 $TransactionIn_Amount =  $prosgettransactionforcategorcontent_cnt_row['TransactionIn'];

                                                if($TransactionIn_Amount == '0' || $TransactionIn_Amount == '')
                                                {

                                                }else
                                                {


                                                    echo   '<tr>
                                                                <th >'.$num++.'</th>
                                                                <th>'.$CampusName.'</th>
                                                                <td >'.$categorytitle.'</td>
                                                                <td >'.$CategoryType.'</td>
                                                                <td class="text-primary">₦'.number_format($TransactionIn_Amount).'</td>
                                                                <td class="text-primary ">
                                                                <button type="button" class="btn btn-sm text-white  m-2 rounded-3 btn-primary mb-2 tari_edit_setting prosloadcateitemsdetails-sumarybtn proshideviewiconforprint"  data-term="'.$term.'" data-session="'.$session.'" data-institution="'.$IntitutionID.'" data-catego="'.$CategoryID.'"  data-camp="'.$CampusIDNew.'" data-class="'.$classID.'"
                                                                data-bs-toggle="modal" data-bs-target="#prosviewcategorysubpymenteach-modal" id="prosloadsectioneditcontenthere" style="font-size:11px;">
                                                                    <i class="fas fa-eye" id="emma_edit_icon"></i>
                                                                    </button>
                                                                
                                                                </td>
                                                        </tr>';
                                                }


                                              
                                                                                    
                                           




                                        }while($prosgetcategorycontent_cnt_row = mysqli_fetch_assoc($prosgetcategorycontent));

                        echo '</tbody>
                        </table>';
                    }else
                    {

                                $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                                $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                if ($pros_select_record_not_found_count > 0) {
                                

                                    $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                                    echo '<center><img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                                    <p>No record found.</p></center>';
                                }


                                        


                    }





?>