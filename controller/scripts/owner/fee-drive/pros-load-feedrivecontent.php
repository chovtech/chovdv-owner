<?php


           include('../../../config/config.php');
            
             $campusID = $_POST['campusID'];
             $SectionID = $_POST['sectionID'];
             
             $InstitutionID = $_POST['abba_get_stored_institution_id'];
             $session = $_POST['session'];
             $classID = $_POST['classID'];
             $status = $_POST['status'];
             $term = $_POST['term'];

            $pros_select_record_not_found_user = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba_profile_dummy_image'");
            $pros_select_record_not_found_count_user= mysqli_num_rows($pros_select_record_not_found_user);
            $pros_select_record_not_found_row_user = mysqli_fetch_assoc($pros_select_record_not_found_user);

               if ($pros_select_record_not_found_count_user > 0) {

                       $pros_general_no_record_user = $pros_select_record_not_found_row_user['BaseSixtyFour'];

                
               }else
               {
                  $pros_general_no_record_user = '';
               }


                        $pros_get_charge = mysqli_query($link,"SELECT DISTINCT(`student`.`StudentID`),`student`.`StudentFirstName`,`student`.`StudentLastName`,`classordepartment`.`ClassOrDepartmentID`, 
                        `classordepartmentstudentallocation`.`Session`, `classordepartment`.`ClassOrDepartmentName`,`chargestructure`.`TermOrSemesterID`,`student`.`StudentPhoto`, `student`.CampusID FROM `student` INNER JOIN 
                        `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID` 
                        AND `student`.`CampusID` = `classordepartmentstudentallocation`.CampusID 
                        INNER JOIN `classordepartment` ON `classordepartmentstudentallocation`.`ClassOrDepartmentID` = `classordepartment`.`ClassOrDepartmentID` 
                        INNER JOIN `chargestructure` ON `classordepartmentstudentallocation`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID`
                        AND `chargestructure`.`Session` = `classordepartmentstudentallocation`.`Session` AND
                        `chargestructure`.`CampusID` = `classordepartmentstudentallocation`.`CampusID`
                        WHERE `chargestructure`.`InstitutionID`='$InstitutionID'  AND `chargestructure`.`Session`='$session' 
                        AND  (`chargestructure`.`CampusID`=$campusID  OR $campusID IS NULL) AND  (`chargestructure`.`ClassOrDepartmentID`= $classID OR $classID IS NULL) 
                        AND (`chargestructure`.`TermOrSemesterID`= $term OR $term IS NULL )  AND (`classordepartment`.`SectionID`= $SectionID OR  $SectionID  IS NULL ) ");
                        
                        $pros_get_charge_cnt = mysqli_num_rows($pros_get_charge);
                        $pros_get_charge_cnt_row = mysqli_fetch_assoc($pros_get_charge);
         
                         if($pros_get_charge_cnt > 0)
                         {
             
             
                                 
             
                                 echo '<table id="table2_pros" class="table pros-maintable" style="width:100%;">
                                     <thead >
                                        <tr style="color: #636161;">
                                              <th>
                                                 <div class="form-check">
                                                    <input class="form-check-input check-all pros-checkall-drive" style="height: 18px; width: 18px;" type="checkbox" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                 </div>
                                              </th>
                                              <th>   
                                                 <span style="margin-left: 20px; margin-top: 5px;"> Name</span>
                                              </th>
                                              <th>Status</th>
                                              <th>Amount</th>
                                              <th>Action</th>
                                        </tr>
                                     </thead>
                                     <tbody style="color: #888888;">';
                                     
                                     
                                     
                                  
                                     if($status == 'NULL')
                                     {
    
    
    
                                                       
                                              do{
                                                  
                                                  
                                                  
                                                         $studfullname = $StudentFirstName.' '.$StudentLastName;
                               
                                                          $StudentFirstName =  $pros_get_charge_cnt_row['StudentFirstName'];
                                                          $StudentLastName =  $pros_get_charge_cnt_row['StudentLastName'];
                                                          $StudentID =  $pros_get_charge_cnt_row['StudentID'];
                                                          $ClassOrDepartmentID =  $pros_get_charge_cnt_row['ClassOrDepartmentID'];
                                                          $Sessionnew =  $pros_get_charge_cnt_row['Session'];
                                                          $TermOrSemesterID =  $pros_get_charge_cnt_row['TermOrSemesterID'];
                                                          $ClassOrDepartmentName =  $pros_get_charge_cnt_row['ClassOrDepartmentName'];
                                                          $StudentPhoto =  $pros_get_charge_cnt_row['StudentPhoto'];
                                                          $CampusIDnew =  $pros_get_charge_cnt_row['CampusID'];
                                                          
                                                          
                                                            $checkedblockstudent = mysqli_query($link, "SELECT * FROM deactivateuser WHERE InstitutionIDOrCampusID = '$CampusIDnew' AND UserID = '$StudentID' 
                                                             AND UserType = 'student' AND sessionName = '$Sessionnew'
                                                             AND TermOrSemesterName = '$TermOrSemesterID' AND Status IN (0,2)");
                                                             
                                                             $checkedblockstudentcnt = mysqli_num_rows($checkedblockstudent);
                                                             
                                                             
                                                             if($checkedblockstudentcnt > 0)
                                                             {
                                                                 
                                                             }else
                                                             {
                                                                 
                                                             
                                                                                      
                                                          
                                                                  $ParentID =  $pros_get_charge_cnt_row['ParentID'];
                                                                  
                                                                  $pros_select = mysqli_query($link, "SELECT * FROM `parent` WHERE ParentID='$ParentID'");
                                                                  $pros_select_cnt = mysqli_num_rows($pros_select);
                                                                  $pros_select_cntrow = mysqli_fetch_assoc($pros_select);
                                                          
                                                          
                                                         
                                                          
                                                                $ParentOtherPhoneNumber = $pros_select_cntrow['ParentOtherPhoneNumber'];
                                                                $ParentMainPhoneNumber = $pros_select_cntrow['ParentMainPhoneNumber'];
                                                                $ParentWhatsappNumber = $pros_select_cntrow['ParentWhatsappNumber'];
                                                                $ParentEmail = $pros_select_cntrow['ParentEmail'];
                                                                 
                                                                 if(!$ParentWhatsappNumber == '')
                                                                 {
                                                                        $parentwanum = $ParentWhatsappNumber;
                                                                     
                                                                 }else if(!$ParentMainPhoneNumber == '')
                                                                 {
                                                                      $parentmainnum = $ParentOtherPhoneNumber;
                                                                 }else
                                                                 {
                                                                       $parentmainnum = $ParentOtherPhoneNumber;
                                                                 }
                      
                      
                      
                      
                     
                                                          $student_regno = mysqli_query($link,"SELECT * FROM `userlogin` WHERE `UserID`='$StudentID' AND UserType='student'");
                                                          $student_regno_cnt = mysqli_num_rows($student_regno);
                                                          $student_regno_cnt_row =mysqli_fetch_assoc($student_regno);
                      
                                                          if($student_regno_cnt > 0)
                                                          {
                                                                $UserRegNumberOrUsername =  $student_regno_cnt_row['UserRegNumberOrUsername'];
                                                          }else
                                                          {
                                                                $UserRegNumberOrUsername =  '';
                                                          }
                                                       
                      
                                                          if($StudentPhoto  == '')
                                                       {
                                                          $StudentPhotonew =  $pros_general_no_record_user;
                                                       }else
                                                       {
                                                          $StudentPhotonew = $StudentPhoto ; 
                                                       }
                                                          
                                                          
                      
                      
                                                          $select_compulsoryfee_here = mysqli_query($link,"SELECT SUM(Amount) AS Amount FROM `chargestructure` WHERE `InstitutionID`='$InstitutionID'
                                                          AND ClassOrDepartmentID='$ClassOrDepartmentID' AND `Session`='$Sessionnew' AND `Status`='1' AND CampusID='$CampusIDnew'");
                                                          $select_compulsoryfee_here_cnt = mysqli_num_rows($select_compulsoryfee_here);
                                                          $select_compulsoryfee_here_cnt_row = mysqli_fetch_assoc($select_compulsoryfee_here);
                                                          
                                                          
                                                           $charegamount =  $select_compulsoryfee_here_cnt_row['Amount'];
                      
                                                          if($charegamount == 'NULL' || $charegamount == '0' || $charegamount == '')
                                                          {
                      
                                                                 $compusamount = 0;
                      
                                                          }else
                                                          {
                                                                  
                                                                   $compusamount = $select_compulsoryfee_here_cnt_row['Amount'];
                                                          }
                                                          
                                                          
                      
                                                           $pros_select_optional_fee = mysqli_query($link,"SELECT SUM(`chargestructure`.`Amount`) AS Prosoptionalfee FROM `chargestructure` INNER JOIN assignoptionalfees ON `chargestructure`.`CampusID` = `assignoptionalfees`.`CampusID` AND
                                                            `chargestructure`.`CategoryID` = `assignoptionalfees`.`CategoryID` AND `chargestructure`.`SubcategoryID` = `assignoptionalfees`.`SubcategoryID`
                                                            AND `chargestructure`.`Session` = `assignoptionalfees`.`Session` WHERE `chargestructure`.`ClassOrDepartmentID`='$ClassOrDepartmentID' AND 
                                                            `assignoptionalfees`.`StudentID`='$StudentID' AND  `assignoptionalfees`.`TermOrSemesterID`='$TermOrSemesterID' AND `assignoptionalfees`.`Session`='$Sessionnew' AND `chargestructure`.`Status`='0' AND `assignoptionalfees`.`CampusID`='$CampusIDnew'");
                     
                                                             $pros_select_optional_fee_cnt = mysqli_num_rows($pros_select_optional_fee);
                                                             $pros_select_optional_fee_cnt_row = mysqli_fetch_assoc($pros_select_optional_fee);
                                                             
                                                              $optionalfeetotalnew =   $pros_select_optional_fee_cnt_row['Prosoptionalfee'];
                      
                                                           
                                                             if($optionalfeetotalnew == 'NULL' || $optionalfeetotalnew == '0' || $optionalfeetotalnew == '')
                                                             {
                      
                      
                                                                   $optionalfeetotalall = 0;
                                                             }else
                                                             {
                      
                                                                $optionalfeetotalall = $optionalfeetotalnew;
                      
                                                             }
                                                             
                                                              
                                                             
                                                             
                                                                // $prosoptionfeetransport = mysqli_query($link,"SELECT SUM(`transportationtable`.`RouteAmount`) AS 
                                                                // prostotaltransportoptionamount FROM `assignoptionalfees` INNER JOIN `transportationtable` ON
                                                                // `assignoptionalfees`.`SubcategoryID` = `transportationtable`.`RouteID` AND `transportationtable`.`CampusID` =
                                                                // `assignoptionalfees`.`CampusID`  WHERE `assignoptionalfees`.`Session`='$Sessionnew' AND 
                                                                // `assignoptionalfees`.`TermOrSemesterID`='$TermOrSemesterID' 
                                                                // AND `assignoptionalfees`.`StudentID`='$StudentID'
                                                                // AND `assignoptionalfees`.`ClassOrDepartmentID`='$ClassOrDepartmentID' AND `assignoptionalfees`.`CategoryID`='27'");
                      
                                                           
                                                                //  $prosoptionfeetransportcnt = mysqli_num_rows($prosoptionfeetransport);
                                                                //  $prosoptionfeetransportrow = mysqli_fetch_assoc($prosoptionfeetransport);
                                                                 
                                                                //  $optionoptiontrans = $prosoptionfeetransportrow['prostotaltransportoptionamount'];
                      
                                                             
                                                                //  if($optionoptiontrans == 'NULL' || $optionoptiontrans == '0' || $optionoptiontrans == '')
                                                                //  {
                                                                //      $transportallamount = 0;
                                                                //  }else
                                                                //  {
                                                                //      $transportallamount = $optionoptiontrans;
                                                                //  }
                                                             
                                                             
                                                             
                                                             
                                                             
                                                                // $prosoptionfeehostel = mysqli_query($link,"SELECT SUM(`hosteltable`.`HostelAmount`) AS 
                                                                // hosttelamountgottenopt FROM `assignoptionalfees` INNER JOIN `hosteltable` ON
                                                                // `assignoptionalfees`.`SubcategoryID` = `hosteltable`.`HostelID` AND `hosteltable`.`CampusID` =
                                                                // `assignoptionalfees`.`CampusID`  WHERE `assignoptionalfees`.`Session`='$Sessionnew' AND 
                                                                // `assignoptionalfees`.`TermOrSemesterID`='$TermOrSemesterID' 
                                                                // AND `assignoptionalfees`.`StudentID`='$StudentID'
                                                                // AND `assignoptionalfees`.`ClassOrDepartmentID`='$ClassOrDepartmentID' AND `assignoptionalfees`.`CategoryID`='26'");
                      
                                                           
                                                                //  $prosoptionfeehostelcnt = mysqli_num_rows($prosoptionfeehostel);
                                                                //  $prosoptionfeehostelrow = mysqli_fetch_assoc($prosoptionfeehostel);
                                                                 
                                                                //  $optionoptionhostel = $prosoptionfeehostelrow['hosttelamountgottenopt'];
                      
                                                             
                                                                //  if($optionoptionhostel == 'NULL' || $optionoptionhostel == '0' || $optionoptionhostel == '')
                                                                //  {
                                                                //      $hostelallamount = 0;
                                                                //  }else
                                                                //  {
                                                                //      $hostelallamount = $optionoptionhostel;
                                                                //  }
                                                             
    
                      
                                                                 $optionalfeetotal = $optionalfeetotalall; 
                                                                
                                                             $totalamountwithounformat = $optionalfeetotal + $compusamount;
                      
                      
                                                             $prostotalgradfee =  number_format($optionalfeetotal + $compusamount); 
                      
    
                                                            
                                                             $select_pros_transaction_here = mysqli_query($link,"  SELECT SUM(TransactionIn) AS TransactionInPaid FROM `transactions`
                                                             WHERE InstitutionID='$InstitutionID' AND (`CampusID`= $campusID  OR $campusID  IS NULL) 
                                                            AND `Session`='$session' AND (`TermOrSemesterID`= $term OR $term IS NULL) AND  StudentID='$StudentID' AND `DeleteStatus`='0'");
                      
                                                             $select_pros_transaction_here_cnt = mysqli_num_rows($select_pros_transaction_here);
                                                             $select_pros_transaction_here_cnt_row = mysqli_fetch_assoc($select_pros_transaction_here);
                      
                                                             if($select_pros_transaction_here_cnt > 0)
                                                             {
                                                                $TransactionInamountal =   $select_pros_transaction_here_cnt_row['TransactionInPaid'];
                                                             }else
                                                             {
                                                                      $TransactionInamountal =   0;
                                                             }
                      
                                                                if($totalamountwithounformat == $TransactionInamountal || $TransactionInamountal >  $totalamountwithounformat)
                                                                {
                      
                                                                         $prostransactionstatus = 'transactionType1';
                                                                         $statusbutton = 'Paid';
                      
                      
                                                                }else if($TransactionInamountal == 0)
                                                                {
                                                                   $prostransactionstatus = 'transactionType2';
                                                                   $statusbutton = 'Unpaid';
                      
                                                                }else if($totalamountwithounformat > $TransactionInamountal)
                                                                {
                                                                   $prostransactionstatus = 'transactionType3';
                      
                                                                    $statusbutton = 'Outstanding';
                      
                                                                }
                                                                
                                                          
                                                       echo '<tr class="showHideRow prostablerowpag" data-id="hidden_row'. $StudentID . '">
                                                       <th>
                                                          <div class="form-check">    
                                                                <input class="form-check-input prosloadfeedriveeach-check" value="'.$ParentEmail.'" data-num="'.$parentmainnum.'"  data-stud="'.$studfullname.'" style="height: 18px; width: 18px;" type="checkbox">
                                                                <label class="form-check-label"></label>
                                                          </div>
                                                       </th>
                                                       <td>
                                                          <div style="display: flex;">
                                                                <a style="margin-left: 20px; color: #b3b3b3; font-size: 20px;"> 
                                                                   <i class="bx bx-chevron-down-circle"></i> 
                                                                </a>
                                                                <span style="margin-left: 10px; margin-top: 5px;"> '.$StudentLastName.' '.$StudentFirstName.' ('.$UserRegNumberOrUsername.')</span>
                                                          </div>
                                                       </td>
                                                       <td><span class="'.$prostransactionstatus.'">'.$statusbutton.'</span></td>
                                                       <td>₦ '.$prostotalgradfee.'</td>                                                            
                                                       <td>
                                                          <a href="" style="text-decoration: none;" data-bs-toggle="modal"  data-bs-target="#prossendmessageindividual" id="prosloadmessagecontentbtn" data-stud="'.$StudentID.'" data-campus="'.$CampusIDnew.'" data-inst="'.$InstitutionID.'" >
                                                                <i class="bx bx-mail-send"></i> Send Message
                                                          </a>
                      
                                                          <a href="" style="margin-left: 20px; font-size: 15px;" data-stud="'. $StudentID.'" data-class="'.$ClassOrDepartmentID.'" data-session="'.$Sessionnew.'" data-inst="'.$InstitutionID.'" data-campus="'.$CampusIDnew.'" data-term="'.$term.'" class="prosload-userindividualizebill-btn" data-bs-toggle="modal" data-bs-target="#individualizebillModal">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                          </a>
                                                       </td>
                                                          
                                                    
                                                          
                                                    </tr>';
                      
                      
                                                    echo '<tr id="hidden_row'. $StudentID .'" class="hidden_row" style="display:none;">
                                                    <td colspan=4>
                                                          <div class="row" style="padding: 10px 10px 0px 10px;">
                                                             <div class="col-3">
                                                                <img src="'.$StudentPhotonew.'" style="border-radius: 10px;" width="70" height="70" alt="">
                                                                <div class="mt-2" style="margin-left: 10px;">
                                                                      <strong>Class:</strong>
                                                                      <p>'.$ClassOrDepartmentName.'</p>
                                                                </div>
                                                             </div>
                                                             <div class="col-9">
                                                                <div class="row">
                                                                      
                                                                      <div class="col-6">
                                                                         <strong>Amount Payable:</strong>
                                                                         <p>₦'.$prostotalgradfee.'</p>
                                                                      </div>
                                                                      <div class="col-6">
                                                                         <strong>Discount</strong>
                                                                         <p>₦ 0.00</p>
                                                                      </div>
                                                                      <div class="col-6">
                                                                         <strong>Amount Deposited</strong>
                                                                         <p>₦ '.number_format($TransactionInamountal).'</p>
                                                                      </div>
                                                                      <div class="col-6">';
                                                                         //<a href="" style="text-decoration: none;"><i class="bx bx-download"></i> Download Fee</a>
                                                                    echo  '</div>
                                                                </div>
                                                             </div>
                                                          </div>
                                                    </td>
                                                    <td></td>
                                                 </tr>';
                                             }
                                              }while($pros_get_charge_cnt_row = mysqli_fetch_assoc($pros_get_charge));
    
                                     }else if($status == '1')
                                     {
    
                                                 do{
                                                 
                                                 
                                                 
                                                 
                                                    $StudentFirstName =  $pros_get_charge_cnt_row['StudentFirstName'];
                                                    $StudentLastName =  $pros_get_charge_cnt_row['StudentLastName'];
                                                    $StudentID =  $pros_get_charge_cnt_row['StudentID'];
                                                    $ClassOrDepartmentID =  $pros_get_charge_cnt_row['ClassOrDepartmentID'];
                                                    $Sessionnew =  $pros_get_charge_cnt_row['Session'];
                                                    $TermOrSemesterID =  $pros_get_charge_cnt_row['TermOrSemesterID'];
                                                    $ClassOrDepartmentName =  $pros_get_charge_cnt_row['ClassOrDepartmentName'];
                                                    $StudentPhoto =  $pros_get_charge_cnt_row['StudentPhoto'];
                                                    $CampusIDnew =  $pros_get_charge_cnt_row['CampusID'];
                                                    
                                                    
                                                    
                                                     $checkedblockstudent = mysqli_query($link, "SELECT * FROM deactivateuser WHERE InstitutionIDOrCampusID = '$CampusIDnew' AND UserID = '$StudentID' 
                                                     AND UserType = 'student' AND sessionName = '$Sessionnew'
                                                     AND TermOrSemesterName = '$TermOrSemesterID' AND Status IN (0,2)");
                                                     
                                                     $checkedblockstudentcnt = mysqli_num_rows($checkedblockstudent); 
                                                     
                                                     
                                                     
                                                     if($checkedblockstudentcnt > 0)
                                                     {
                                                         
                                                     }else
                                                     {
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                     
                                                             
                                                    
                                                    
                                                         $studfullname = $StudentFirstName.' '.$StudentLastName;
                                                    
                                                    
                                                    
                                                         $ParentID =  $pros_get_charge_cnt_row['ParentID'];
                                                          
                                                          $pros_select = mysqli_query($link, "SELECT * FROM `parent` WHERE ParentID='$ParentID'");
                                                          $pros_select_cnt = mysqli_num_rows($pros_select);
                                                          $pros_select_cntrow = mysqli_fetch_assoc($pros_select);
                                                          
                                                          
                                                         
                                                          
                                                            $ParentOtherPhoneNumber = $pros_select_cntrow['ParentOtherPhoneNumber'];
                                                            $ParentMainPhoneNumber = $pros_select_cntrow['ParentMainPhoneNumber'];
                                                            $ParentWhatsappNumber = $pros_select_cntrow['ParentWhatsappNumber'];
                                                            $ParentEmail = $pros_select_cntrow['ParentEmail'];
                                                             
                                                             if(!$ParentWhatsappNumber == '')
                                                             {
                                                                    $parentwanum = $ParentWhatsappNumber;
                                                                 
                                                             }else if(!$ParentMainPhoneNumber == '')
                                                             {
                                                                  $parentmainnum = $ParentOtherPhoneNumber;
                                                             }else
                                                             {
                                                                   $parentmainnum = $ParentOtherPhoneNumber;
                                                             }
                  
                                           
                                           
                                           
                                           
                                           
                                                    $student_regno = mysqli_query($link,"SELECT * FROM `userlogin` WHERE `UserID`='$StudentID' AND UserType='student'");
                                                    $student_regno_cnt = mysqli_num_rows($student_regno);
                                                    $student_regno_cnt_row =mysqli_fetch_assoc($student_regno);
                                           
                                                    if($student_regno_cnt > 0)
                                                    {
                                                          $UserRegNumberOrUsername =  $student_regno_cnt_row['UserRegNumberOrUsername'];
                                                    }else
                                                    {
                                                          $UserRegNumberOrUsername =  '';
                                                    }
                                                 
                                           
                                                       if($StudentPhoto  == '')
                                                       {
                                                          $StudentPhotonew =  $pros_general_no_record_user;
                                                       }else
                                                       {
                                                          $StudentPhotonew = $StudentPhoto ; 
                                                       }
                                                    
                                                    
                                           
                                           
                                                    $select_compulsoryfee_here = mysqli_query($link,"SELECT SUM(Amount) AS Amount FROM `chargestructure` WHERE InstitutionID='$InstitutionID'
                                                    AND ClassOrDepartmentID='$ClassOrDepartmentID' AND `Session`='$Sessionnew' AND `Status`='1'");
                                                    $select_compulsoryfee_here_cnt = mysqli_num_rows($select_compulsoryfee_here);
                                                    $select_compulsoryfee_here_cnt_row = mysqli_fetch_assoc($select_compulsoryfee_here);
                                           
                                           
                                                         $charegamount =  $select_compulsoryfee_here_cnt_row['Amount'];
                      
                                                          if($charegamount == 'NULL' || $charegamount == '0' || $charegamount == '')
                                                          {
                      
                                                                 $compusamount = 0;
                      
                                                          }else
                                                          {
                                                                  
                                                                   $compusamount = $select_compulsoryfee_here_cnt_row['Amount'];
                                                          }
                                           
                                           
                                           
                                                       $pros_select_optional_fee = mysqli_query($link,"SELECT SUM(`chargestructure`.`Amount`) AS Prosoptionalfee FROM `chargestructure` INNER JOIN assignoptionalfees ON `chargestructure`.`CampusID` = `assignoptionalfees`.`CampusID` AND
                                                          `chargestructure`.`CategoryID` = `assignoptionalfees`.`CategoryID` AND `chargestructure`.`SubcategoryID` = `assignoptionalfees`.`SubcategoryID`
                                                          AND `chargestructure`.`Session` = `assignoptionalfees`.`Session` WHERE `chargestructure`.`ClassOrDepartmentID`='$ClassOrDepartmentID' AND 
                                                          `assignoptionalfees`.`StudentID`='$StudentID' AND  `assignoptionalfees`.`TermOrSemesterID`='$TermOrSemesterID' AND `assignoptionalfees`.`Session`='$Sessionnew'");
                                           
                                                       $pros_select_optional_fee_cnt = mysqli_num_rows($pros_select_optional_fee);
                                                       $pros_select_optional_fee_cnt_row = mysqli_fetch_assoc($pros_select_optional_fee);
                                           
                                                       if($pros_select_optional_fee_cnt > 0)
                                                       {
                                           
                                           
                                                             $optionalfeetotal =  $pros_select_optional_fee_cnt_row['Prosoptionalfee'];
                                                       }else
                                                       {
                                           
                                                          $optionalfeetotal = 0;
                                           
                                                       }
                                           
                                                       $totalamountwithounformat = $optionalfeetotal + $compusamount;
                                           
                                           
                                                       $prostotalgradfee =  number_format($optionalfeetotal + $compusamount); 
                                           
                                           
                                                    
                                           
                                                    
                                           
                                                       $select_pros_transaction_here = mysqli_query($link,"  SELECT SUM(TransactionIn) AS TransactionInPaid FROM `transactions`
                                                       WHERE InstitutionID='$InstitutionID' AND (`CampusID`= $campusID  OR $campusID  IS NULL) 
                                                    AND `Session`='$session' AND (`TermOrSemesterID`= $term OR $term IS NULL) AND  StudentID='$StudentID' AND `DeleteStatus`='0'");
                                           
                                                       $select_pros_transaction_here_cnt = mysqli_num_rows($select_pros_transaction_here);
                                                       $select_pros_transaction_here_cnt_row = mysqli_fetch_assoc($select_pros_transaction_here);
                                           
                                                       if($select_pros_transaction_here_cnt > 0)
                                                       {
                                                          $TransactionInamountal =   $select_pros_transaction_here_cnt_row['TransactionInPaid'];
                                                       }else
                                                       {
                                                                $TransactionInamountal =   0;
                                                       }
                                           
                                                          if($totalamountwithounformat == $TransactionInamountal || $TransactionInamountal >  $totalamountwithounformat)
                                                          {
                                           
                                                                   $prostransactionstatus = 'transactionType1';
                                                                   $statusbutton = 'Paid';
                                           
                                           
                                           
                                           
                                                                               
                                                                         echo '<tr class="showHideRow prostablerowpag" data-id="hidden_row'. $StudentID . '">
                                                                         <th>
                                                                            <div class="form-check">
                                                                                  <input class="form-check-input prosloadfeedriveeach-check" value="'.$ParentEmail.'" data-num="'.$parentmainnum.'"  data-stud="'.$studfullname.'"   style="height: 18px; width: 18px;" type="checkbox">
                                                                                  <label class="form-check-label"></label>
                                                                            </div>
                                                                         </th>
                                                                         <td>
                                                                            <div style="display: flex;">
                                                                                  <a style="margin-left: 20px; color: #b3b3b3; font-size: 20px;"> 
                                                                                     <i class="bx bx-chevron-down-circle"></i> 
                                                                                  </a>
                                                                                  <span style="margin-left: 10px; margin-top: 5px;"> '.$StudentLastName.' '.$StudentFirstName.' ('.$UserRegNumberOrUsername.')</span>
                                                                            </div>
                                                                         </td>
                                                                         <td><span class="'.$prostransactionstatus.'">'.$statusbutton.'</span></td>
                                                                         <td>₦ '.$prostotalgradfee.'</td>                                                            
                                                                         <td>
                                                                            <a href="" style="text-decoration: none;" data-bs-toggle="modal"  data-bs-target="#prossendmessageindividual" id="prosloadmessagecontentbtn" data-stud="'.$StudentID.'" data-campus="'.$CampusIDnew.'" data-inst="'.$InstitutionID.'" >
                                                                                  <i class="bx bx-mail-send"></i> Send Message
                                                                            </a>
                                           
                                                                            <a href="" style="margin-left: 20px; font-size: 15px;" data-stud="'. $StudentID.'" data-class="'.$ClassOrDepartmentID.'" data-session="'.$Sessionnew.'" data-inst="'.$InstitutionID.'" data-campus="'.$CampusIDnew.'" data-term="'.$term.'" class="prosload-userindividualizebill-btn" data-bs-toggle="modal" data-bs-target="#individualizebillModal">
                                                                                  <i class="fa fa-eye" aria-hidden="true"></i>
                                                                            </a>
                                                                         </td>
                                                                            
                                                                      
                                                                            
                                                                      </tr>';
                                           
                                           
                                                                      echo '<tr id="hidden_row'. $StudentID .'" class="hidden_row" style="display:none;">
                                                                      <td colspan=4>
                                                                            <div class="row" style="padding: 10px 10px 0px 10px;">
                                                                               <div class="col-3">
                                                                                  <img src="'.$StudentPhotonew.'" style="border-radius: 10px;" width="70" height="70" alt="">
                                                                                  <div class="mt-2" style="margin-left: 10px;">
                                                                                        <strong>Class:</strong>
                                                                                        <p>'.$ClassOrDepartmentName.'</p>
                                                                                  </div>
                                                                               </div>
                                                                               <div class="col-9">
                                                                                  <div class="row">
                                                                                        
                                                                                        <div class="col-6">
                                                                                           <strong>Amount Payable:</strong>
                                                                                           <p>₦'.$prostotalgradfee.'</p>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                           <strong>Discount</strong>
                                                                                           <p>₦ 0.00</p>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                           <strong>Amount Deposited</strong>
                                                                                           <p>₦ '.number_format($TransactionInamountal).'</p>
                                                                                        </div>
                                                                                        <div class="col-6">';
                                                                                           //<a href="" style="text-decoration: none;"><i class="bx bx-download"></i> Download Fee</a>
                                                                                        echo '</div>
                                                                                  </div>
                                                                               </div>
                                                                            </div>
                                                                      </td>
                                                                      <td></td>
                                                                   </tr>';
                                           
                                           
                                                          }else if($TransactionInamountal == 0)
                                                          {
                                                             
                                                          }else if($totalamountwithounformat > $TransactionInamountal)
                                                          {
                                                          
                                           
                                                          }
                                                    }
                                                    
                                              }while($pros_get_charge_cnt_row = mysqli_fetch_assoc($pros_get_charge));
    
                                     }else if($status == '2')
                                     {
                                                                                              
                                                do{
                                        
                                        
                                        
                                        
                                                          $StudentFirstName =  $pros_get_charge_cnt_row['StudentFirstName'];
                                                          $StudentLastName =  $pros_get_charge_cnt_row['StudentLastName'];
                                                          $StudentID =  $pros_get_charge_cnt_row['StudentID'];
                                                          $ClassOrDepartmentID =  $pros_get_charge_cnt_row['ClassOrDepartmentID'];
                                                          $Sessionnew =  $pros_get_charge_cnt_row['Session'];
                                                          $TermOrSemesterID =  $pros_get_charge_cnt_row['TermOrSemesterID'];
                                                          $ClassOrDepartmentName =  $pros_get_charge_cnt_row['ClassOrDepartmentName'];
                                                          $StudentPhoto =  $pros_get_charge_cnt_row['StudentPhoto'];
                                                          $CampusIDnew =  $pros_get_charge_cnt_row['CampusID'];
                                                          
                                                          
                                                         $checkedblockstudent = mysqli_query($link, "SELECT * FROM deactivateuser WHERE InstitutionIDOrCampusID = '$CampusIDnew' AND UserID = '$StudentID' 
                                                         AND UserType = 'student' AND sessionName = '$Sessionnew'
                                                         AND TermOrSemesterName = '$TermOrSemesterID' AND Status IN (0,2)");
                                                         
                                                         $checkedblockstudentcnt = mysqli_num_rows($checkedblockstudent); 
                                                         
                                                         
                                                         if($checkedblockstudentcnt > 0)
                                                         {
                                                             
                                                         }else
                                                         {
                                                             
                                                        
                      
                      
                                                            $studfullname = $StudentFirstName.' '.$StudentLastName;
                                                    
                                                    
                                                    
                                                              $ParentID =  $pros_get_charge_cnt_row['ParentID'];
                                                              
                                                              $pros_select = mysqli_query($link, "SELECT * FROM `parent` WHERE ParentID='$ParentID'");
                                                              $pros_select_cnt = mysqli_num_rows($pros_select);
                                                              $pros_select_cntrow = mysqli_fetch_assoc($pros_select);
                                                          
                                                          
                                                         
                                                          
                                                            $ParentOtherPhoneNumber = $pros_select_cntrow['ParentOtherPhoneNumber'];
                                                            $ParentMainPhoneNumber = $pros_select_cntrow['ParentMainPhoneNumber'];
                                                            $ParentWhatsappNumber = $pros_select_cntrow['ParentWhatsappNumber'];
                                                            $ParentEmail = $pros_select_cntrow['ParentEmail'];
                                                             
                                                             if(!$ParentWhatsappNumber == '')
                                                             {
                                                                    $parentwanum = $ParentWhatsappNumber;
                                                                 
                                                             }else if(!$ParentMainPhoneNumber == '')
                                                             {
                                                                  $parentmainnum = $ParentOtherPhoneNumber;
                                                             }else
                                                             {
                                                                   $parentmainnum = $ParentOtherPhoneNumber;
                                                             }
                      
                      
                      
                      
                                                          $student_regno = mysqli_query($link,"SELECT * FROM `userlogin` WHERE `UserID`='$StudentID' AND UserType='student'");
                                                          $student_regno_cnt = mysqli_num_rows($student_regno);
                                                          $student_regno_cnt_row =mysqli_fetch_assoc($student_regno);
                      
                                                          if($student_regno_cnt > 0)
                                                          {
                                                                $UserRegNumberOrUsername =  $student_regno_cnt_row['UserRegNumberOrUsername'];
                                                          }else
                                                          {
                                                                $UserRegNumberOrUsername =  '';
                                                          }
                                                       
                      
                                                          if($StudentPhoto  == '')
                                                       {
                                                          $StudentPhotonew =  $pros_general_no_record_user;
                                                       }else
                                                       {
                                                          $StudentPhotonew = $StudentPhoto ; 
                                                       }
                                                          
                                                          
                      
                      
                                                          $select_compulsoryfee_here = mysqli_query($link,"SELECT SUM(Amount) AS Amount FROM `chargestructure` WHERE InstitutionID='$InstitutionID'
                                                          AND ClassOrDepartmentID='$ClassOrDepartmentID' AND `Session`='$Sessionnew' AND `Status`='1'");
                                                          $select_compulsoryfee_here_cnt = mysqli_num_rows($select_compulsoryfee_here);
                                                          $select_compulsoryfee_here_cnt_row = mysqli_fetch_assoc($select_compulsoryfee_here);
                      
                      
                                                          
                                                         $charegamount =  $select_compulsoryfee_here_cnt_row['Amount'];
                      
                                                          if($charegamount == 'NULL' || $charegamount == '0' || $charegamount == '')
                                                          {
                      
                                                                 $compusamount = 0;
                      
                                                          }else
                                                          {
                                                                  
                                                                   $compusamount = $select_compulsoryfee_here_cnt_row['Amount'];
                                                          }
                                           
                      
                      
                                                             $pros_select_optional_fee = mysqli_query($link,"SELECT SUM(`chargestructure`.`Amount`) AS Prosoptionalfee FROM `chargestructure` INNER JOIN assignoptionalfees ON `chargestructure`.`CampusID` = `assignoptionalfees`.`CampusID` AND
                                                                `chargestructure`.`CategoryID` = `assignoptionalfees`.`CategoryID` AND `chargestructure`.`SubcategoryID` = `assignoptionalfees`.`SubcategoryID`
                                                                AND `chargestructure`.`Session` = `assignoptionalfees`.`Session` WHERE `chargestructure`.`ClassOrDepartmentID`='$ClassOrDepartmentID' AND 
                                                                `assignoptionalfees`.`StudentID`='$StudentID' AND  `assignoptionalfees`.`TermOrSemesterID`='$TermOrSemesterID' AND `assignoptionalfees`.`Session`='$Sessionnew'");
                      
                                                             $pros_select_optional_fee_cnt = mysqli_num_rows($pros_select_optional_fee);
                                                             $pros_select_optional_fee_cnt_row = mysqli_fetch_assoc($pros_select_optional_fee);
                      
                                                             if($pros_select_optional_fee_cnt > 0)
                                                             {
                      
                      
                                                                   $optionalfeetotal =  $pros_select_optional_fee_cnt_row['Prosoptionalfee'];
                                                             }else
                                                             {
                      
                                                                $optionalfeetotal = 0;
                      
                                                             }
                      
                                                             $totalamountwithounformat = $optionalfeetotal + $compusamount;
                      
                      
                                                             $prostotalgradfee =  number_format($optionalfeetotal + $compusamount); 
                      
    
                                                          
                      
                                                          
                      
                                                             $select_pros_transaction_here = mysqli_query($link,"  SELECT SUM(TransactionIn) AS TransactionInPaid FROM `transactions`
                                                             WHERE InstitutionID='$InstitutionID' AND (`CampusID`= $campusID  OR $campusID  IS NULL) 
                                                          AND `Session`='$session' AND (`TermOrSemesterID`= $term OR $term IS NULL) AND  StudentID='$StudentID' AND `DeleteStatus`='0' AND `DeleteStatus`='0'");
                      
                                                             $select_pros_transaction_here_cnt = mysqli_num_rows($select_pros_transaction_here);
                                                             $select_pros_transaction_here_cnt_row = mysqli_fetch_assoc($select_pros_transaction_here);
                      
                                                             if($select_pros_transaction_here_cnt > 0)
                                                             {
                                                                $TransactionInamountal =   $select_pros_transaction_here_cnt_row['TransactionInPaid'];
                                                             }else
                                                             {
                                                                      $TransactionInamountal =   0;
                                                             }
                      
                                                                if($totalamountwithounformat == $TransactionInamountal || $TransactionInamountal >  $totalamountwithounformat)
                                                                {
                      
                                                                        
                      
                      
                                                                }else if($TransactionInamountal == 0)
                                                                {
                                                                   
                      
                                                                }else if($totalamountwithounformat > $TransactionInamountal)
                                                                {
    
                                                                                     $prostransactionstatus = 'transactionType3';
                                                                                     $statusbutton = 'Outstanding';
    
                                                                               echo '<tr class="showHideRow prostablerowpag" data-id="hidden_row'. $StudentID . '">
                                                                                     <th>
                                                                                        <div class="form-check">
                                                                                              <input class="form-check-input prosloadfeedriveeach-check" value="'.$ParentEmail.'" data-num="'.$parentmainnum.'"  data-stud="'.$studfullname.'"  style="height: 18px; width: 18px;" type="checkbox">
                                                                                              <label class="form-check-label"></label>
                                                                                        </div>
                                                                                     </th>
                                                                                     <td>
                                                                                        <div style="display: flex;">
                                                                                              <a style="margin-left: 20px; color: #b3b3b3; font-size: 20px;"> 
                                                                                                 <i class="bx bx-chevron-down-circle"></i> 
                                                                                              </a>
                                                                                              <span style="margin-left: 10px; margin-top: 5px;"> '.$StudentLastName.' '.$StudentFirstName.' ('.$UserRegNumberOrUsername.')</span>
                                                                                        </div>
                                                                                     </td>
                                                                                     <td><span class="'.$prostransactionstatus.'">'.$statusbutton.'</span></td>
                                                                                     <td>₦ '.$prostotalgradfee.'</td>                                                            
                                                                                     <td>
                                                                                        <a href="" style="text-decoration: none;" data-bs-toggle="modal"  data-bs-target="#prossendmessageindividual" id="prosloadmessagecontentbtn" data-stud="'.$StudentID.'" data-campus="'.$CampusIDnew.'" data-inst="'.$InstitutionID.'" >
                                                                                              <i class="bx bx-mail-send"></i> Send Message
                                                                                        </a>
                                                    
                                                                                        <a href="" style="margin-left: 20px; font-size: 15px;" data-stud="'. $StudentID.'" data-class="'.$ClassOrDepartmentID.'" data-session="'.$Sessionnew.'" data-inst="'.$InstitutionID.'" data-campus="'.$CampusIDnew.'" data-term="'.$term.'" class="prosload-userindividualizebill-btn" data-bs-toggle="modal" data-bs-target="#individualizebillModal">
                                                                                              <i class="fa fa-eye" aria-hidden="true"></i>
                                                                                        </a>
                                                                                     </td>
                                                                                        
                                                                                  
                                                                                        
                                                                                  </tr>';
                                                    
                                                    
                                                                                  echo '<tr id="hidden_row'. $StudentID .'" class="hidden_row" style="display:none;">
                                                                                  <td colspan=4>
                                                                                        <div class="row" style="padding: 10px 10px 0px 10px;">
                                                                                           <div class="col-3">
                                                                                              <img src="'.$StudentPhotonew.'" style="border-radius: 10px;" width="70" height="70" alt="">
                                                                                              <div class="mt-2" style="margin-left: 10px;">
                                                                                                    <strong>Class:</strong>
                                                                                                    <p>'.$ClassOrDepartmentName.'</p>
                                                                                              </div>
                                                                                           </div>
                                                                                           <div class="col-9">
                                                                                              <div class="row">
                                                                                                    
                                                                                                    <div class="col-6">
                                                                                                       <strong>Amount Payable:</strong>
                                                                                                       <p>₦'.$prostotalgradfee.'</p>
                                                                                                    </div>
                                                                                                    <div class="col-6">
                                                                                                       <strong>Discount</strong>
                                                                                                       <p>₦ 0.00</p>
                                                                                                    </div>
                                                                                                    <div class="col-6">
                                                                                                       <strong>Amount Deposited</strong>
                                                                                                       <p>₦ '.number_format($TransactionInamountal).'</p>
                                                                                                    </div>
                                                                                                    <div class="col-6">';
                                                                                                       // <a href="" style="text-decoration: none;"><i class="bx bx-download"></i> Download Fee</a>
                                                                                                    echo '</div>
                                                                                              </div>
                                                                                           </div>
                                                                                        </div>
                                                                                  </td>
                                                                                  <td></td>
                                                                               </tr>';
                                                                   
                                                                }
                                                          
                                                       
                                                 }
                                              }while($pros_get_charge_cnt_row = mysqli_fetch_assoc($pros_get_charge));
    
    
                                     }else if($status == '3')
                                     {
    
                                                          do{
                                                          
                                                             $StudentFirstName =  $pros_get_charge_cnt_row['StudentFirstName'];
                                                             $StudentLastName =  $pros_get_charge_cnt_row['StudentLastName'];
                                                             $StudentID =  $pros_get_charge_cnt_row['StudentID'];
                                                             $ClassOrDepartmentID =  $pros_get_charge_cnt_row['ClassOrDepartmentID'];
                                                             $Sessionnew =  $pros_get_charge_cnt_row['Session'];
                                                             $TermOrSemesterID =  $pros_get_charge_cnt_row['TermOrSemesterID'];
                                                             $ClassOrDepartmentName =  $pros_get_charge_cnt_row['ClassOrDepartmentName'];
                                                             $StudentPhoto =  $pros_get_charge_cnt_row['StudentPhoto'];
                                                             $CampusIDnew =  $pros_get_charge_cnt_row['CampusID'];
                                                             
                                                             
                                                             
                                                            $checkedblockstudent = mysqli_query($link, "SELECT * FROM deactivateuser WHERE InstitutionIDOrCampusID = '$CampusIDnew' AND UserID = '$StudentID' 
                                                             AND UserType = 'student' AND sessionName = '$Sessionnew'
                                                             AND TermOrSemesterName = '$TermOrSemesterID' AND Status IN (0,2)");
                                                             
                                                            $checkedblockstudentcnt = mysqli_num_rows($checkedblockstudent); 
                                                            
                                                            if($checkedblockstudentcnt > 0)
                                                            {
                                                                
                                                            }else
                                                            {
                                                                
                                                           
                                                             
                                                             
                                                             
                                                             
                                                              $studfullname = $StudentFirstName.' '.$StudentLastName;
                                                    
                                                    
                                                        
                                                              $ParentID =  $pros_get_charge_cnt_row['ParentID'];
                                                              
                                                              $pros_select = mysqli_query($link, "SELECT * FROM `parent` WHERE ParentID='$ParentID'");
                                                              $pros_select_cnt = mysqli_num_rows($pros_select);
                                                              $pros_select_cntrow = mysqli_fetch_assoc($pros_select);
                                                              
                                                          
                                                         
                                                          
                                                            $ParentOtherPhoneNumber = $pros_select_cntrow['ParentOtherPhoneNumber'];
                                                            $ParentMainPhoneNumber = $pros_select_cntrow['ParentMainPhoneNumber'];
                                                            $ParentWhatsappNumber = $pros_select_cntrow['ParentWhatsappNumber'];
                                                            $ParentEmail = $pros_select_cntrow['ParentEmail'];
                                                             
                                                             if(!$ParentWhatsappNumber == '')
                                                             {
                                                                    $parentwanum = $ParentWhatsappNumber;
                                                                 
                                                             }else if(!$ParentMainPhoneNumber == '')
                                                             {
                                                                  $parentmainnum = $ParentOtherPhoneNumber;
                                                             }else
                                                             {
                                                                   $parentmainnum = $ParentOtherPhoneNumber;
                                                             }
                      
                         
                         
                         
                         
                         
                                                             $student_regno = mysqli_query($link,"SELECT * FROM `userlogin` WHERE `UserID`='$StudentID' AND UserType='student'");
                                                             $student_regno_cnt = mysqli_num_rows($student_regno);
                                                             $student_regno_cnt_row =mysqli_fetch_assoc($student_regno);
                         
                                                             if($student_regno_cnt > 0)
                                                             {
                                                                   $UserRegNumberOrUsername =  $student_regno_cnt_row['UserRegNumberOrUsername'];
                                                             }else
                                                             {
                                                                   $UserRegNumberOrUsername =  '';
                                                             }
                                                          
                         
                                                             if($StudentPhoto  == '')
                                                          {
                                                             $StudentPhotonew =  $pros_general_no_record_user;
                                                          }else
                                                          {
                                                             $StudentPhotonew = $StudentPhoto ; 
                                                          }
                                                             
                                                             
                         
                         
                                                             $select_compulsoryfee_here = mysqli_query($link,"SELECT SUM(Amount) AS Amount FROM `chargestructure` WHERE InstitutionID='$InstitutionID'
                                                             AND ClassOrDepartmentID='$ClassOrDepartmentID' AND `Session`='$Sessionnew' AND `Status`='1'");
                                                             $select_compulsoryfee_here_cnt = mysqli_num_rows($select_compulsoryfee_here);
                                                             $select_compulsoryfee_here_cnt_row = mysqli_fetch_assoc($select_compulsoryfee_here);
                         
                                                             $charegamount =  $select_compulsoryfee_here_cnt_row['Amount'];
                      
                                                              if($charegamount == 'NULL' || $charegamount == '0' || $charegamount == '')
                                                              {
                          
                                                                     $compusamount = 0;
                          
                                                              }else
                                                              {
                                                                      
                                                                       $compusamount = $select_compulsoryfee_here_cnt_row['Amount'];
                                                              }
                         
                         
                                                                $pros_select_optional_fee = mysqli_query($link,"SELECT SUM(`chargestructure`.`Amount`) AS Prosoptionalfee FROM `chargestructure` INNER JOIN assignoptionalfees ON `chargestructure`.`CampusID` = `assignoptionalfees`.`CampusID` AND
                                                                   `chargestructure`.`CategoryID` = `assignoptionalfees`.`CategoryID` AND `chargestructure`.`SubcategoryID` = `assignoptionalfees`.`SubcategoryID`
                                                                   AND `chargestructure`.`Session` = `assignoptionalfees`.`Session` WHERE `chargestructure`.`ClassOrDepartmentID`='$ClassOrDepartmentID' AND 
                                                                   `assignoptionalfees`.`StudentID`='$StudentID' AND  `assignoptionalfees`.`TermOrSemesterID`='$TermOrSemesterID' AND `assignoptionalfees`.`Session`='$Sessionnew'");
                         
                                                                $pros_select_optional_fee_cnt = mysqli_num_rows($pros_select_optional_fee);
                                                                $pros_select_optional_fee_cnt_row = mysqli_fetch_assoc($pros_select_optional_fee);
                         
                                                                if($pros_select_optional_fee_cnt > 0)
                                                                {
                         
                         
                                                                      $optionalfeetotal =  $pros_select_optional_fee_cnt_row['Prosoptionalfee'];
                                                                }else
                                                                {
                         
                                                                   $optionalfeetotal = 0;
                         
                                                                }
                         
                                                                $totalamountwithounformat = $optionalfeetotal + $compusamount;
                         
                         
                                                                $prostotalgradfee =  number_format($optionalfeetotal + $compusamount); 
                         
    
                                                             
                         
                                                             
                         
                                                                $select_pros_transaction_here = mysqli_query($link,"  SELECT SUM(TransactionIn) AS TransactionInPaid FROM `transactions`
                                                                WHERE InstitutionID='$InstitutionID' AND (`CampusID`= $campusID  OR $campusID  IS NULL) 
                                                             AND `Session`='$session' AND (`TermOrSemesterID`= $term OR $term IS NULL) AND  StudentID='$StudentID' AND `DeleteStatus`='0'");
                         
                                                                $select_pros_transaction_here_cnt = mysqli_num_rows($select_pros_transaction_here);
                                                                $select_pros_transaction_here_cnt_row = mysqli_fetch_assoc($select_pros_transaction_here);
                         
                                                                if($select_pros_transaction_here_cnt > 0)
                                                                {
                                                                   $TransactionInamountal =   $select_pros_transaction_here_cnt_row['TransactionInPaid'];
                                                                }else
                                                                {
                                                                         $TransactionInamountal =   0;
                                                                }
                         
                                                                   if($totalamountwithounformat == $TransactionInamountal || $TransactionInamountal >  $totalamountwithounformat)
                                                                   {
                         
                                                                         
                         
                         
                                                                   }else if($TransactionInamountal == 0)
                                                                   {
    
    
                                                                      $prostransactionstatus = 'transactionType2';
                                                                      $statusbutton = 'Unpaid';
    
                                                                                        echo '<tr class="showHideRow prostablerowpag" data-id="hidden_row'. $StudentID . '">
                                                                                              <th>
                                                                                                 <div class="form-check">
                                                                                                       <input class="form-check-input prosloadfeedriveeach-check" value="'.$ParentEmail.'" data-num="'.$parentmainnum.'"  data-stud="'.$studfullname.'"  style="height: 18px; width: 18px;" type="checkbox">
                                                                                                       <label class="form-check-label"></label>
                                                                                                 </div>
                                                                                              </th>
                                                                                              <td>
                                                                                                 <div style="display: flex;">
                                                                                                       <a style="margin-left: 20px; color: #b3b3b3; font-size: 20px;"> 
                                                                                                          <i class="bx bx-chevron-down-circle"></i> 
                                                                                                       </a>
                                                                                                       <span style="margin-left: 10px; margin-top: 5px;"> '.$StudentLastName.' '.$StudentFirstName.' ('.$UserRegNumberOrUsername.')</span>
                                                                                                 </div>
                                                                                              </td>
                                                                                              <td><span class="'.$prostransactionstatus.'">'.$statusbutton.'</span></td>
                                                                                              <td>₦ '.$prostotalgradfee.'</td>                                                            
                                                                                              <td>
                                                                                                 <a href="" style="text-decoration: none;" data-bs-toggle="modal"  data-bs-target="#prossendmessageindividual" id="prosloadmessagecontentbtn" data-stud="'.$StudentID.'" data-campus="'.$CampusIDnew.'" data-inst="'.$InstitutionID.'" >
                                                                                                       <i class="bx bx-mail-send"></i> Send Message
                                                                                                 </a>
                                                             
                                                                                                 <a href="" style="margin-left: 20px; font-size: 15px;" data-stud="'. $StudentID.'" data-class="'.$ClassOrDepartmentID.'" data-session="'.$Sessionnew.'" data-inst="'.$InstitutionID.'" data-campus="'.$CampusIDnew.'" data-term="'.$term.'" class="prosload-userindividualizebill-btn" data-bs-toggle="modal" data-bs-target="#individualizebillModal">
                                                                                                       <i class="fa fa-eye" aria-hidden="true"></i>
                                                                                                 </a>
                                                                                              </td>
                                                                                                 
                                                                                           
                                                                                                 
                                                                                           </tr>';
                                                             
                                                             
                                                                                           echo '<tr id="hidden_row'. $StudentID .'" class="hidden_row" style="display:none;">
                                                                                           <td colspan=4>
                                                                                                 <div class="row" style="padding: 10px 10px 0px 10px;">
                                                                                                    <div class="col-3">
                                                                                                       <img src="'.$StudentPhotonew.'" style="border-radius: 10px;" width="70" height="70" alt="">
                                                                                                       <div class="mt-2" style="margin-left: 10px;">
                                                                                                             <strong>Class:</strong>
                                                                                                             <p>'.$ClassOrDepartmentName.'</p>
                                                                                                       </div>
                                                                                                    </div>
                                                                                                    <div class="col-9">
                                                                                                       <div class="row">
                                                                                                             
                                                                                                             <div class="col-6">
                                                                                                                <strong>Amount Payable:</strong>
                                                                                                                <p>₦'.$prostotalgradfee.'</p>
                                                                                                             </div>
                                                                                                             <div class="col-6">
                                                                                                                <strong>Discount</strong>
                                                                                                                <p>₦ 0.00</p>
                                                                                                             </div>
                                                                                                             <div class="col-6">
                                                                                                                <strong>Amount Deposited</strong>
                                                                                                                <p>₦ '.number_format($TransactionInamountal).'</p>
                                                                                                             </div>
                                                                                                             <div class="col-6">';
                                                                                                               // <a href="" style="text-decoration: none;"><i class="bx bx-download"></i> Download Fee</a>
                                                                                                            echo '</div>
                                                                                                       </div>
                                                                                                    </div>
                                                                                                 </div>
                                                                                           </td>
                                                                                           <td></td>
                                                                                        </tr>';
    
    
    
                                                                      
                         
                                                                   }else if($totalamountwithounformat > $TransactionInamountal)
                                                                   {
    
                                                                                    
                                                                      
                                                                   }
                                                             
                                                         }
                         
                                                 }while($pros_get_charge_cnt_row = mysqli_fetch_assoc($pros_get_charge));
    
    
    
                                     }
                                     
             
                                     echo '</tbody>
                                     </table>';
             
                         }else
                         {
             
             
                                        echo '<div align="center" id="pros-loadnofield-selectedoptionalfee-content-feedrive">';
             
                                                    $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                                                    $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                                    $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);
             
                                                    if ($pros_select_record_not_found_count > 0) {
                                                    
             
                                                       $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
             
                                                       echo '<img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">
             
                                                       <p>No record found.</p>';
                                                    }
                                     echo '</div>';
             
             
             
                         }
         
         
      



            

             


?>