<?php

            include('../../config/config.php');


            $campusID = $_POST['campusID'];  
            $sessionName = $_POST['sessionName'];   
            $ClassID = $_POST['ClassID']; 
            $term = $_POST['term'];
            
         
            $prostotal_optional_No = 0;
            $prostotal_compulsory_No = 0;
            $prostotal_transaction = 0;
            
            
            $selecttermcnt = mysqli_query($link," SELECT * FROM `termorsemester`  WHERE  `status`='1'");
            $selecttermcntrow = mysqli_fetch_assoc($selecttermcnt);
            $selecttermcnt_num = mysqli_num_rows($selecttermcnt);
    
            $currntTermOrSemesterID = $selecttermcntrow['TermOrSemesterID'];
            
            
             $abba_sql_session = "SELECT * FROM `session` WHERE sessionStatus=1";
            $abba_result_session = mysqli_query($link, $abba_sql_session);
            $abba_row_session = mysqli_fetch_assoc($abba_result_session);
            $abba_row_cnt_session = mysqli_num_rows($abba_result_session);
            
            $abba_display_session = $abba_row_session['sessionName'];
           
           
            
             if($currntTermOrSemesterID == '1')
            {
                
                  $termstring = '1';
                  $vserifsession = $abba_display_session;
                  
            }else if($currntTermOrSemesterID == '2')
            {
                
                 $termstring = '1,2';
                 $vserifsession = $abba_display_session;
               
                
            }else if($currntTermOrSemesterID == '3')
            {
                $termstring = '1,2,3';
                $vserifsession = '';
            }
            

            
            $selectstudenthere = mysqli_query($link,"SELECT * FROM `student` INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID`=  `classordepartmentstudentallocation`.`StudentID` WHERE
             `classordepartmentstudentallocation`.`Session`='$sessionName' AND `classordepartmentstudentallocation`.`ClassOrDepartmentID`='$ClassID' AND `student`.`CampusID`='$campusID' ORDER BY StudentLastName ASC");
             $selectstudenthere_cnt = mysqli_num_rows($selectstudenthere);
             $selectstudenthere_cntrows = mysqli_fetch_assoc($selectstudenthere);

             if($selectstudenthere_cnt > 0)
             {

                      echo '<option value="NULL">Select student</option>'; 

                        do{


                           
                
                            $totalcompamount =  0;

                            $StudentID = $selectstudenthere_cntrows['StudentID'];
                            $ParentID = $selectstudenthere_cntrows['ParentID'];
                            $StudentLastName = $selectstudenthere_cntrows['StudentLastName'];
                            $StudentMiddleName = $selectstudenthere_cntrows['StudentMiddleName'];
                            $StudentFirstName = $selectstudenthere_cntrows['StudentFirstName'];
                            
                            
                            
                            
                              $checkedblockstudent = mysqli_query($link, "SELECT * FROM deactivateuser WHERE InstitutionIDOrCampusID = '$campusID' AND UserID = '$StudentID' 
                             AND UserType = 'student' AND sessionName = '$sessionName'
                             AND TermOrSemesterName = '$term' AND Status IN (0,2)");
                             
                             $checkedblockstudentcnt = mysqli_num_rows($checkedblockstudent);
                             
                             
                             if($checkedblockstudentcnt > 0)
                             {
                                 
                             }else
                             {
                                 



                            $select_parent_no = mysqli_query($link,"SELECT * FROM `parent` WHERE `ParentID`='$ParentID'");
                            $select_parent_norow = mysqli_num_rows($select_parent_no);
                            $select_parent_norow_row =  mysqli_fetch_assoc($select_parent_no);


                           $whaparentwhatsnot =  $select_parent_norow_row['ParentWhatsappNumber'];


                            $getstuentallfequery = mysqli_query($link,"SELECT * FROM `classordepartmentstudentallocation` WHERE CampusID='$campusID' AND StudentID='$StudentID'");
                            $getstuentallfequerycnt = mysqli_num_rows($getstuentallfequery);
                            $getstuentallfequerycntrow = mysqli_fetch_assoc($getstuentallfequery);

                          if($getstuentallfequerycnt > 0)
                          {


                            
                                        do{




                                            $sessionNameforeach = $getstuentallfequerycntrow['Session'];
                                            $ClassOrDepartmentIDforeach = $getstuentallfequerycntrow['ClassOrDepartmentID'];
                
                                         
                                           
                
                                           
                                            
                                            $selectcompusoryfee = mysqli_query($link, "SELECT SUM(`Amount`) AS totalcomp
                                                        FROM `chargestructure`
                                                        WHERE `CampusID` = '$campusID'
                                                        AND `ClassOrDepartmentID` = '$ClassOrDepartmentIDforeach'
                                                        AND `Status` = '1'
                                                        AND `Session` = '$sessionNameforeach'
                                                        AND `TermOrSemesterID` IN ($termstring)
                                                        AND NOT EXISTS (
                                                            SELECT 1
                                                            FROM `deactivateuser`
                                                            WHERE `deactivateuser`.`UserID` = '$StudentID'
                                                            AND `deactivateuser`.`TermOrSemesterName` = `chargestructure`.`TermOrSemesterID`
                                                            AND `deactivateuser`.`sessionName` = `chargestructure`.`Session`
                                                            AND `deactivateuser`.`Status` IN (0, 2)
                                                            AND `deactivateuser`.`UserType` = 'student'
                                                        )
                                                    ");

                                            
                                            
                                            
                                            $selectcompusoryfeecnt = mysqli_num_rows($selectcompusoryfee);
                                            $selectcompusoryfeecntrows = mysqli_fetch_assoc($selectcompusoryfee);
                                            
                                            

                                            if($selectcompusoryfeecnt > 0)
                                            {
                                              
                                                
                                                $proscompamount = $selectcompusoryfeecntrows['totalcomp'];
                                                
                                            }else
                                            {
                                                $proscompamount = 0;
                                            }



                                            $totalcompamount+=$proscompamount;


                                        }while($getstuentallfequerycntrow = mysqli_fetch_assoc($getstuentallfequery));
                          }

                        
                           

                          
                                                            
                           
                             $selectstudentoptionalfee = mysqli_query($link, "SELECT SUM(`chargestructure`.`Amount`) AS optionalmaout
                                            FROM `assignoptionalfees`
                                            INNER JOIN `chargestructure` ON `assignoptionalfees`.`SubcategoryID` = `chargestructure`.`SubcategoryID`
                                            AND `assignoptionalfees`.`CategoryID` = `chargestructure`.`CategoryID`
                                            AND `assignoptionalfees`.`Session` = `chargestructure`.`Session`
                                            AND `assignoptionalfees`.`TermOrSemesterID` = `chargestructure`.`TermOrSemesterID`
                                            AND `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID`
                                            WHERE `assignoptionalfees`.`CampusID` = '$campusID'
                                            AND `assignoptionalfees`.`StudentID` = '$StudentID'
                                            AND `chargestructure`.`Status` = '0'
                                            AND `assignoptionalfees`.`TermOrSemesterID` IN ($termstring)
                                            AND NOT EXISTS (
                                                SELECT 1
                                                FROM `deactivateuser`
                                                WHERE `deactivateuser`.`UserID` = '$StudentID'
                                                AND `deactivateuser`.`TermOrSemesterName` = `assignoptionalfees`.`TermOrSemesterID`
                                                AND `deactivateuser`.`sessionName` = `assignoptionalfees`.`Session`
                                                AND `deactivateuser`.`Status` IN (0, 2)
                                                AND `deactivateuser`.`UserType` = 'student'
                                            )
                                        ");

            
             

                            $selectstudentoptionalfeecnt = mysqli_num_rows($selectstudentoptionalfee);
                            $selectstudentoptionalfeecntrow = mysqli_fetch_assoc($selectstudentoptionalfee);

                             $totaloptionalFee =  $selectstudentoptionalfeecntrow['optionalmaout'];

                               if($totaloptionalFee == NULL)
                               {

                                   $totaloptionalFee_Grand = 0;

                               }else
                               {
                                    $totaloptionalFee_Grand = $totaloptionalFee;
                               }

                                $prosoveralltotalforpayment  = $totaloptionalFee_Grand +  $totalcompamount;

                              

                                $selecttransactionhere = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionInAmount FROM `transactions` 
                                WHERE CampusID='$campusID' AND StudentID='$StudentID' AND `DeleteStatus`='0'"); 

   
                                $selecttransactionherecnt = mysqli_num_rows($selecttransactionhere);
                                $selecttransactionherecntrow = mysqli_fetch_assoc($selecttransactionhere);

                                $transactionamount = $selecttransactionherecntrow['TransactionInAmount'];
                                
                                
                                
                                 $selecttransactionherepaid = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionInAmount FROM `transactions` 
                                WHERE CampusID='$campusID' AND StudentID='$StudentID' AND `Session`='$sessionName' AND TermOrSemesterID='$term' AND `DeleteStatus`='0'"); 

   
                                $selecttransactionherecntpaid = mysqli_num_rows($selecttransactionherepaid);
                                $selecttransactionherecntrowpaid = mysqli_fetch_assoc($selecttransactionherepaid);

                                $transactionamountpaid = $selecttransactionherecntrowpaid['TransactionInAmount'];


                                if($transactionamountpaid == NULL)
                                {
                                         $grandtotalforAmount_Transaction = 0;
                                }else
                                {
                                    $grandtotalforAmount_Transaction =  $transactionamountpaid;
                                }
                                
                                
                                
                                if($transactionamount == NULL)
                                {
                                         $grandtotalforAmount_Transactioncont = 0;
                                }else
                                {
                                    $grandtotalforAmount_Transactioncont =  $transactionamount;
                                }
                                
                                

                                 if($grandtotalforAmount_Transactioncont > $prosoveralltotalforpayment)
                                 {
                                      $total_balance = '0.00';
                                 }else
                                 {
                                      $total_balance = number_format(intval($prosoveralltotalforpayment - $grandtotalforAmount_Transactioncont));
                                 }

                                

                            

                                 echo '<option data-wano="'.$whaparentwhatsnot.'" data-id="'.$grandtotalforAmount_Transaction.'" data-bal="'.$total_balance.'" value="'.$StudentID.'">'.$StudentLastName. ' '. $StudentMiddleName.' '. $StudentFirstName.'</option>';

                             }

                        }while($selectstudenthere_cntrows = mysqli_fetch_assoc($selectstudenthere));

             }else
             {
                       echo '<option value="NULL">No student found</option>'; 
             }


            
          

?>