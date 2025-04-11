<?php
            include('../../config/config.php');

            $InstitutionID = $_POST['abba_get_stored_instituion_id'];
            $instituname = $_POST['abba_get_stored_instituion_name'];
            $campusID = $_POST['campusID'];
            $transactionType = $_POST['transactionType'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $term = $_POST['term'];
            $session = $_POST['session'];



            $prostutionfeetuitiontype = $_POST['prostutionfeetuitiontype'];

            

            // Start building the SQL query
            $sql = "SELECT * FROM `transactions` INNER JOIN `student` ON 
                    `transactions`.`StudentID` = `student`.`StudentID`
                    WHERE `transactions`.`InstitutionID`='$InstitutionID' AND `transactions`.DeleteStatus ='0'";
                    
            
             if ($campusID !== 'NULL') {
                 $sql .= "AND `transactions`.`CampusID`='$campusID'";
             }else
             {
                 
             }
             
             if ($session !== 'NULL') {
                 $sql .= "AND `transactions`.`Session`='$session'";
             }else
             {
                 
             }
             
              if ($term !== 'NULL') {
                 $sql .= "AND `transactions`.`TermOrSemesterID`='$term'";
             }else
             {
                 
             }

            // Add conditions based on the provided dates and transaction type
            if ($start_date !== '' && $end_date !== '') {
                $sql .= " AND `transactions`.`Date` BETWEEN '$start_date' AND '$end_date'";
            } elseif ($start_date !== '') {
                $sql .= " AND `transactions`.`Date`='$start_date'";
            } elseif ($end_date !== '') {
                $sql .= " AND `transactions`.`Date`='$end_date'";
            }

            if ($transactionType !== 'NULL') {
                $sql .= " AND `transactions`.`TransactionType`='$transactionType'";
            }

            if($prostutionfeetuitiontype !== 'NULL') 
            {
                $sql .= " AND `transactions`.`TuitionType`='$prostutionfeetuitiontype'";

            }else
            {

               
            }
            
             $sql .= "GROUP BY `transactions`.`TransactionReference`";
            
            

            // Execute the SQL query
            $select_transa_history = mysqli_query($link, $sql);

            $select_transa_historycnt = mysqli_num_rows($select_transa_history);
            $select_transa_historycntrows = mysqli_fetch_assoc($select_transa_history);



            if($select_transa_historycnt > 0)
            {



                //PROS DOWNLOAD IMAGE HERE
                    $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='pros-download-image'");
                    $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                    $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);
                    $pros_general_download = $pros_select_record_not_found_row['BaseSixtyFour'];
            //PROS DOWNLOAD IMAGE HERE




                  
                echo '<table id="table1_pros" class="table" style="width:100%;">
                <thead>
                    <tr style="color: #636161;">
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Transaction Type</th>
                        <th>Tuition Type</th>
                        <th>Reference</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="color: #888888;">';
                  
                   $num = 1;
                
                        
                
                      do{

                           $transaction_Ref =   $select_transa_historycntrows ['TransactionReference'];
                           $TransactionType_fetch =   $select_transa_historycntrows ['TransactionType'];
                           $ModeofTransaction =   $select_transa_historycntrows ['ModeofTransaction'];
                           $Session =   $select_transa_historycntrows ['Session'];
                           $TuitionType =   $select_transa_historycntrows ['TuitionType'];
                           $Datenew =   $select_transa_historycntrows ['Date'];
                           $ModeofTransaction =   $select_transa_historycntrows['ModeofTransaction'];
                           $TransactionID =   $select_transa_historycntrows['TransactionID'];
                           $CAMPUSnewID =   $select_transa_historycntrows['CampusID'];
                           $ClassOrDepartmentID =   $select_transa_historycntrows['ClassOrDepartmentID'];
                           $TermOrSemesterID = $select_transa_historycntrows['TermOrSemesterID'];


                           $StudentFirstName =   $select_transa_historycntrows ['StudentFirstName'];
                           $StudentLastName =   $select_transa_historycntrows ['StudentLastName'];
                           $StudentID =   $select_transa_historycntrows ['StudentID'];

                           $studentfullname = $StudentLastName.' '. $StudentFirstName;

                           $ParentID = $select_transa_historycntrows['ParentID'];

                           $selectregno_detail =  mysqli_query($link,"SELECT * FROM `userlogin` WHERE InstitutionIDOrCampusID='$CAMPUSnewID' AND UserID='$StudentID'");
                           $selectregno_detail_cnt = mysqli_num_rows($selectregno_detail);
                           $selectregno_detail_cntrow = mysqli_fetch_assoc($selectregno_detail);


                           $UserRegNumberOrUsername = $selectregno_detail_cntrow['UserRegNumberOrUsername'];



                           $selectclass_detailshere = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `CampusID`='$CAMPUSnewID' AND  ClassOrDepartmentID='$ClassOrDepartmentID'");
                           $selectclass_detailsherecnt = mysqli_num_rows($selectclass_detailshere);

                           if($selectclass_detailsherecnt > 0)
                           {
                                $selectclass_detailsherecntrow = mysqli_fetch_assoc($selectclass_detailshere);

                                $ClassOrDepartmentName = $selectclass_detailsherecntrow['ClassOrDepartmentName'];

                           }else
                           {

                                     $ClassOrDepartmentName = '';
                           }
                          

                            $select_amountforpayment = mysqli_query($link, "SELECT SUM(TransactionIn) AS TransactionIn FROM `transactions` WHERE TransactionReference='$transaction_Ref' 
                            AND CampusID='$CAMPUSnewID' AND StudentID='$StudentID'");
                            
                            $select_amountforpayment_cnt = mysqli_num_rows($select_amountforpayment);
                            $select_amountforpayment_cntrow = mysqli_fetch_assoc($select_amountforpayment);
                            
                             $TransactionIn = $select_amountforpayment_cntrow['TransactionIn'];
                            
                           

                            $select_parent_no = mysqli_query($link,"SELECT * FROM `parent` WHERE `ParentID`='$ParentID'");
                            $select_parent_norow = mysqli_num_rows($select_parent_no);
                            $select_parent_norow_row =  mysqli_fetch_assoc($select_parent_no);


                           $whaparentwhatsnot =  $select_parent_norow_row['ParentWhatsappNumber'];


                           $select_term_alisa = mysqli_query($link,"SELECT * FROM `termalias` WHERE CampusID='$CAMPUSnewID' AND TermOrSemesterID='$TermOrSemesterID'");
                           $select_term_alisa_cnt =  mysqli_fetch_assoc($select_term_alisa);

                           $termaliasName =   $select_term_alisa_cnt['TermAliasName'];


                        echo '<tr class="prosdeletetablecontainer">
                                <td>'.$num++.'</td>
                                <td>'.$studentfullname.'</td>
                                <td>₦ '.number_format($TransactionIn).'</td>
                                <td><span class="transactionType1">'.$TransactionType_fetch.'</span></td>
                                <td>'.$TuitionType.'</td>
                                <td>'.$transaction_Ref.'</td>
                                <td>'.$Datenew.'</td>

                                <td>

                                        <a style="cursor:pointer;" class="text-success" target="_blank" href="'.$defaultUrl.'/app/print-reciept/?stud='.$StudentID.'&camp='.$CAMPUSnewID.'&inst='.$InstitutionID .'&ref='.$transaction_Ref.'" id="printrecieptbtn">
                                            <img class="mb-1" src="'.$pros_general_download.'" width="23" >
                                        </a>&nbsp;&nbsp;

                                      <a style="cursor:pointer;color:green;" target="_blank" 
                                      href="https://wa.me/'.$whaparentwhatsnot .'?text=*SCHOOL%20FEES%20PAYMENT%20RECIPT*%0AKindly%20find%20details%20of%20payment%20and%20receipt%20below%20for%20download%0A%0A*Student%20Name*:%20'.$select_transa_historycntrows['StudentLastName'].'%20'.$select_transa_historycntrows['StudentMiddleName'].'%20'.$select_transa_historycntrows['StudentFirstName'].'%0A*Reg Number:* '.$UserRegNumberOrUsername.'%0A*Class:*%20'.$ClassOrDepartmentName.'%0A*Term:*%20'.$termaliasName.'%20Term%0A%0AClick%20on%20the%20link%20to%20download%0A'.$defaultUrl.'/app/print-reciept?ref='.$transaction_Ref.'%26inst='.$InstitutionID.'%26camp='.$CAMPUSnewID.'%26stud='.$StudentID.'%0A%0AFrom%0A*'.$instituname.'*" id="printrecieptbtn">
                                       
                                        <i class="fab fa-whatsapp" style="font-size:20px;"></i></a>&nbsp;&nbsp;

                                        <span style="cursor:pointer;" class="text-danger"  data-bs-toggle="modal"  data-bs-target="#pros-delete-transaction" data-id="'.$transaction_Ref.'" data-campus="'.$CAMPUSnewID.'"  id="pros-delete-transaction-here">
                                               <i class="fa fa-trash" style="font-size:19px;"></i>
                                        </span>


                                       
                                      
                                        
                                        
                                
                                </td>
                            </tr>';
                           


                      }while($select_transa_historycntrows = mysqli_fetch_assoc($select_transa_history));



                      echo '</tbody>
                     </table>';
            }else
            {

                            echo '<div align="center" id="pros-loadnofield-selectedoptionalfee-content">';
                               

                                            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                                            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                            if ($pros_select_record_not_found_count > 0) {
                                            

                                                $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                                                echo '<img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                                                <p>No transaction found.</p>';
                                            }

                               
                            echo '</div>';

            }




// The rest of your code...
?>
