<?php


        include('../../config/config.php');

        $campusID = $_POST['campusID'];
        $InstitutionID = $_POST['prosInstitutionID'];
        $studentID = $_POST['studentID'];


        $pros_total_payment_current = 0; 
        $pros_total_debt_current = 0;  
        $pros_total_paid_current = 0;  

        $pros_total_paid_old = 0;  
        $pros_total_debt_old = 0;
        $pros_total_charger_old = 0;


        $verifycurrentpacurrent = 0;

        
        $selectsessionpros = mysqli_query($link, "SELECT * FROM `session` WHERE  sessionStatus='1'");
        $selectsessionproscnt = mysqli_num_rows($selectsessionpros);
        $selectsessionproscnt_row = mysqli_fetch_assoc($selectsessionpros);

        $Currentsession = $selectsessionproscnt_row['sessionName'];


        $selecttermcnt = mysqli_query($link," SELECT * FROM `termorsemester` INNER JOIN `termalias` ON  `termorsemester`.`TermOrSemesterID` = `termalias`.`TermOrSemesterID`  WHERE `termalias`.`CampusID`='$campusID' AND `termorsemester`.`status`='1'");
        $selecttermcntrow = mysqli_fetch_assoc($selecttermcnt);
        $selecttermcnt_num = mysqli_num_rows($selecttermcnt);

        $currntTermOrSemesterID = $selecttermcntrow['TermOrSemesterID'];
        $current_Term_alisName = $selecttermcntrow['TermAliasName'];
        
        if($currntTermOrSemesterID == '1')
        {
            
              $termstring = '1';
        }else if($currntTermOrSemesterID == '2')
        {
            
             $termstring = '1,2';
            
        }else if($currntTermOrSemesterID == '3')
        {
            $termstring = '1,2,3';
        }


        //PROS DOWNLOAD IMAGE HERE
            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='pros-download-image'");
            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);
            $pros_general_download = $pros_select_record_not_found_row['BaseSixtyFour'];
       //PROS DOWNLOAD IMAGE HERE


        

        
       
        
        $select_studentfeeherecurrent = mysqli_query($link, "SELECT * FROM `student`
        INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID`
        WHERE `classordepartmentstudentallocation`.`CampusID`='$campusID' AND `student`.`StudentID`='$studentID' AND `Session`='$Currentsession'");

         $select_studentfeeherecurrentrowcnt = mysqli_num_rows($select_studentfeeherecurrent);
         $select_studentfeeherecurrentrowcntrowdata = mysqli_fetch_assoc($select_studentfeeherecurrent);

         
         $Currentsession = $selectsessionproscnt_row['sessionName'];
         $currntTermOrSemesterID = $selecttermcntrow['TermOrSemesterID'];

        


         if($select_studentfeeherecurrentrowcnt > 0)
         {


                     $currentClassOrDepartmentID =  $select_studentfeeherecurrentrowcntrowdata['ClassOrDepartmentID'];
                     $stufullstudentName  = $select_studentfeeherecurrentrowcntrowdata['StudentFirstName'].' '.$select_studentfeeherecurrentrowcntrowdata['StudentLastName'];


                      $select_schargestructure_currentterm = mysqli_query($link,"SELECT SUM(Amount)  AS Amount FROM `chargestructure`
                      WHERE `ClassOrDepartmentID`='$currentClassOrDepartmentID' AND `Session`='$Currentsession' AND `TermOrSemesterID`='$currntTermOrSemesterID' AND `Status`='1'");
                    $select_schargestructure_currenttercnt = mysqli_num_rows($select_schargestructure_currentterm);
                     $select_schargestructure_currenttercntrow = mysqli_fetch_assoc($select_schargestructure_currentterm);



                     $getoptionalfeeamounthere_current = mysqli_query($link, "SELECT SUM(`chargestructure`.`Amount`) AS `Amountopt`
                    FROM `assignoptionalfees`
                    INNER JOIN `chargestructure` ON `assignoptionalfees`.`SubcategoryID` = `chargestructure`.`SubcategoryID` AND
                        `assignoptionalfees`.`CategoryID` = `chargestructure`.`CategoryID` AND `assignoptionalfees`.`Session`
                        = `chargestructure`.`Session` AND `assignoptionalfees`.`TermOrSemesterID` =  
                        `chargestructure`.`TermOrSemesterID` AND `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID`
                    WHERE `chargestructure`.`Status`='0' 
                    AND `assignoptionalfees`.`ClassOrDepartmentID`='$currentClassOrDepartmentID'
                    AND `assignoptionalfees`.`CampusID`='$campusID'
                    AND `assignoptionalfees`.`Session`='$Currentsession'
                    AND `assignoptionalfees`.`TermOrSemesterID`='$currntTermOrSemesterID'
                    AND `assignoptionalfees`.`StudentID`='$studentID'");

                    $optional_fee_row_curent = mysqli_fetch_assoc($getoptionalfeeamounthere_current);

                    $optional_fee_current = ($optional_fee_row_curent['Amountopt'] !== null) ? $optional_fee_row_curent['Amountopt'] : 0.00;


                    $currentteramount_comfee =  $select_schargestructure_currenttercntrow['Amount'];

                   $totalcurrentfeetotal = $optional_fee_current + $currentteramount_comfee;


                   $totalcurentfeelefttransaction = $totalcurrentfeetotal;
                   $prospertotalpaid =  0;

                    
                    



                    $select_transactionhere = mysqli_query($link, "SELECT * FROM `transactions` WHERE
                    `ClassOrDepartmentID`='$currentClassOrDepartmentID' AND `Session`='$Currentsession' AND `TermOrSemesterID`='$currntTermOrSemesterID' 
                    AND `StudentID`='$studentID' AND TransactionType='income' AND CampusID='$campusID'");
                          
                    $select_transactionherecnt = mysqli_num_rows($select_transactionhere);
                   

                    if($select_transactionherecnt > 0)
                    {


                        $verifycurrentpacurrent+=1;

                        // echo '
                        //     <u type="button" class="text-success float-end mt-2 " data-id="'.$stufullstudentName.'" style="margin-right:17px;"><a target="_blank" href="'.$defaultUrl.'/app/print-reciept/?stud='.$studentID.'&camp='.$campusID.'&inst='.$InstitutionID.'&ref=noref"><img class="mb-1" src="'.$pros_general_download.'" width="26" alt=""> Save All</a></u><p></p><br>';
                        
                        echo '<div  class="prosloadamountsummarycontainer" id="prosprintcurrentpost-summary" style="border-radius: 10px 0 0 10px;">
                             
                        
                        <h6 class="mt-4" style="font-weight:800;">'.$Currentsession.'(Current Term) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="" >Total: ₦ '.number_format($totalcurrentfeetotal).'</span></h6>
                        <table class="table " style="border-left:1px solid black;border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black;">
                         <thead>
                             <tr >
                                 <th scope="col" style="border-top-left-radius: 10px;border-right:1px solid black;"> Reference</th>
                                 <th scope="col" style="border-right:1px solid black;">Date</th>
                                 <th scope="col" style="border-right:1px solid black;"> paid</th>
                                 <th scope="col" >Balance</th>
                                 <th scope="col" style="border-top-right-radius: 10px;"></th>
                             </tr>
                         </thead>
                         <tbody>';        


                                $numcureent = 1;

                              while ($select_transactionherecntrow = mysqli_fetch_assoc($select_transactionhere)) {




                                         $TransactionIn = $select_transactionherecntrow['TransactionIn'];
                                         $TransactionReference = $select_transactionherecntrow['TransactionReference'];
                                         $datepaidtransaction = $select_transactionherecntrow['Date'];

                                        $totalcurentfeelefttransaction-=$TransactionIn;
                                        $prospertotalpaid+=$TransactionIn;


                                        $pros_total_payment_current = $totalcurrentfeetotal - $totalcurentfeelefttransaction; 
                                        $pros_total_paid_current+=$TransactionIn;  

                                       

                                        $shortenedrefnum = substr($TransactionReference, -0, 8);

                                        echo '<tr>
                                        
                                                <td style="border-right:1px solid black;">'.$shortenedrefnum.'..</td>
                                                <td style="border-right:1px solid black;">'.$datepaidtransaction.'</td>
                                                <td style="border-right:1px solid black;">₦'.number_format($TransactionIn).'</td>
                                                
                                                <td>₦'.number_format($totalcurentfeelefttransaction).'</td>
                                                <td>
                                                    <a style="cursor:pointer;" class="text-success" target="_blank" href="'.$defaultUrl.'/app/print-reciept/?stud='.$studentID.'&camp='.$campusID.'&inst='.$InstitutionID.'&ref='.$TransactionReference.'" id="printrecieptbtn">
                                                        <img class="mb-1" src="'.$pros_general_download.'" width="25" alt="">
                                                    </a>
                                                </td>
                                          
                                            </tr>';
                                            
                                            
                              }


                                     echo '<tr style="font-weight:800;">
                                            <td style="border-right:1px solid black;">Grand Total</td>
                                            <td style="border-right:1px solid black;"></td>
                                            <td style="border-right:1px solid black;"> ₦'.number_format($prospertotalpaid).'</td>
                                            <td>₦'.number_format($totalcurentfeelefttransaction).'</td>
                                            <td></td>
                                        </tr>';

                                        $pros_total_debt_current+=$totalcurentfeelefttransaction; 


                        echo '</tbody>
                        </table>
                        </div>
                        ';
                       

                    }else
                    {
                                 
                        $verifycurrentpacurrent+=0;
                    }

         }else
         { 
         }



        $select_studentfeehere = mysqli_query($link, "SELECT * FROM `student`
        INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID`
        WHERE `classordepartmentstudentallocation`.`CampusID`='$campusID' AND `student`.`StudentID`='$studentID'");

        $select_studentfeeherecnt = mysqli_num_rows($select_studentfeehere);


        $grandto_other_amount = 0;
        $grandto_other_amount_debt = 0;
        $grandto_other_amount_paid = 0;

      


        if ($select_studentfeeherecnt > 0) {
        
            // echo '<button type="button" class="btn btn-link float-end pros-dowloadallfee-incomebtn">Print <i class="fa fa-print"></i></button>';   
           
            echo ' <br></br><div  id="prosprintfeesummaryicome">';
                  
            while ($select_studentfeeherecntrow = mysqli_fetch_assoc($select_studentfeehere)) {

                $sessionName = $select_studentfeeherecntrow['Session'];
                $ClassOrDepartmentID = $select_studentfeeherecntrow['ClassOrDepartmentID'];

                $stufullstudentNamedebt  = $select_studentfeeherecntrow['StudentFirstName'].' '.$select_studentfeeherecntrow['StudentLastName'];



                $pros_get_compu_fee_eachterm_perssion = mysqli_query($link, "SELECT SUM(Amount) AS `Amountcomp`, `TermOrSemesterID`, `Session`
                FROM `chargestructure`  WHERE `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `Session`='$sessionName' AND `CampusID`='$campusID'
                 AND `Status`='1' AND `Session` !='$Currentsession' GROUP BY `TermOrSemesterID`, `Session` ORDER BY `Session` DESC");
                $pros_get_compu_fee_eachterm_perssioncnt = mysqli_num_rows($pros_get_compu_fee_eachterm_perssion);
               


                    
                

                        if($pros_get_compu_fee_eachterm_perssioncnt > 0)
                        {


                            $grandtotalofoldebt = 0;
                        
                        echo '
                        <u type="button" class="text-primary float-end mt-1 pros-download-feesummary-feebtn" data-id="'.$stufullstudentNamedebt.'" style="margin-right:17px;"><img class="" src="'.$pros_general_download.'" width="25" alt=""> Save </u>
                        <div  class="prosloadamountsummarycontainer" id="pros-download-oldsummary-feesummarycontent">
                             
                              
                        <h6 style="font-weight:800;">'.$sessionName.'(Old debt) </h6>
                        <table class="table" style="border-left:1px solid black;border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black;">
                            <thead>
                                <tr>
                                    
                                    <th  style="border-right:1px solid black;">Term</th>
                                    <th  style="border-right:1px solid black;"> Fee</th>
                                    <th  style="border-right:1px solid black;"> paid</th>
                                    <th  style="border-right:1px solid black;">Debt</th>
                                </tr>
                            </thead>
                            <tbody>';


                            $grandprostotalfee = 0;
                            $grandprostotalpaid = 0;
                            $grandprostotaldebt = 0;
                        

                            while ($pros_get_compu_fee_eachterm_perssioncntrow = mysqli_fetch_assoc($pros_get_compu_fee_eachterm_perssion)) {


                                $comp_amont_total = $pros_get_compu_fee_eachterm_perssioncntrow['Amountcomp'];
                                $Sessionnamechaarge = $pros_get_compu_fee_eachterm_perssioncntrow['Session'];
                                $TermOrSemesterIDcharge = $pros_get_compu_fee_eachterm_perssioncntrow['TermOrSemesterID'];



                                
                            
                                $getoptionalfeeamounthere = mysqli_query($link, "SELECT SUM(`chargestructure`.`Amount`) AS `Amountopt`
                                FROM `assignoptionalfees`
                                INNER JOIN `chargestructure` ON  `assignoptionalfees`.`SubcategoryID` = `chargestructure`.`SubcategoryID` AND
                                `assignoptionalfees`.`CategoryID` = `chargestructure`.`CategoryID` AND `assignoptionalfees`.`Session`
                                = `chargestructure`.`Session` AND `assignoptionalfees`.`TermOrSemesterID` =  
                                `chargestructure`.`TermOrSemesterID` 
                                AND `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID`
                                WHERE `chargestructure`.`Status`='0' 
                                AND `assignoptionalfees`.`ClassOrDepartmentID`='$ClassOrDepartmentID'
                                AND `assignoptionalfees`.`CampusID`='$campusID'
                                AND `assignoptionalfees`.`Session`='$Sessionnamechaarge'
                                AND `assignoptionalfees`.`TermOrSemesterID`='$TermOrSemesterIDcharge'
                                AND `assignoptionalfees`.`StudentID`='$studentID'");

                                $optional_fee_row = mysqli_fetch_assoc($getoptionalfeeamounthere);
                                $optional_fee = ($optional_fee_row['Amountopt'] !== null) ? $optional_fee_row['Amountopt'] : 0.00;

                              // Calculate Total Paid (You can adjust this calculation as needed)




                            $paidfeequery = mysqli_query($link, "SELECT SUM(TransactionIn) AS amountpaid FROM `transactions` WHERE
                            ClassOrDepartmentID='$ClassOrDepartmentID' AND `Session`='$Sessionnamechaarge' AND 
                            TermOrSemesterID='$TermOrSemesterIDcharge' AND StudentID='$studentID'");
                        

                        
                               $paidfeequeryrowcnt =  mysqli_num_rows($paidfeequery);

                                if($paidfeequeryrowcnt > 0)
                                {

                                    $paidfeequeryrow =  mysqli_fetch_assoc($paidfeequery);

                                    $paidfee_amount = $paidfeequeryrow['amountpaid']; 
                                }else
                                {
                                    $paidfee_amount = 0.00;
                                }

                            


                                $gettermaliasname = mysqli_query($link, "SELECT * FROM `termalias` WHERE `CampusID`='$campusID' AND `TermOrSemesterID`='$TermOrSemesterIDcharge'");
                                $gettermaliasname_row = mysqli_fetch_assoc($gettermaliasname);
                                $TermAliasName = $gettermaliasname_row['TermAliasName'];

                                if ($comp_amont_total === NULL || $comp_amont_total === '' || $comp_amont_total === '0') {
                                    $comp_fee_grandtotal = 0.00;
                                } else {
                                    $comp_fee_grandtotal = $comp_amont_total;
                                }

                                $total_fee = $comp_fee_grandtotal + $optional_fee;

                                $totalbalance = $total_fee -  $paidfee_amount;


                                if($paidfee_amount >=  $total_fee)
                                {

                               
                                }else
                                {

                               
                           


                                    $grandprostotalfee+=$total_fee;
                                    $grandprostotalpaid+=$paidfee_amount;
                                    $grandprostotaldebt+=$totalbalance;



                                        $grandto_other_amount+=$total_fee;
                                        $grandto_other_amount_debt+=$totalbalance;
                                        $grandto_other_amount_paid+=$paidfee_amount;


                            
                                        echo '<tr>
                                            
                                            <td style="border-right:1px solid black;">' .$TermAliasName . '</td>
                                            <td style="border-right:1px solid black;">₦' . number_format($total_fee) . '</td>
                                            <td style="border-right:1px solid black;">₦'; 


                                            
                                                    if($paidfee_amount == '0' || $paidfee_amount == '' || $paidfee_amount == NULL)
                                                    {
                                                    echo '0.00';
                                                    }else
                                                    {
                                                        echo  number_format($paidfee_amount);
                                                    }
                                                
                                            
                                        echo '</td>
                                            <td>
                                            ₦' . number_format($totalbalance) . '
                                            </td>
                                        </tr>';

                                }
                                    

                            }

                            echo '<tr>
                                    <td style="font-weight:800;border-right:1px solid black;">Grand Total</td>
                                        <td style="font-weight:800;border-right:1px solid black;">₦'.number_format($grandprostotalfee).'</td>
                                        <td style="font-weight:800;border-right:1px solid black;"> ₦'.number_format($grandprostotalpaid).'</td>
                                    <td style="font-weight:800;">₦'.number_format($grandprostotaldebt).'</td>
                             </tr>';

                             $grandtotalofoldebt+=$grandprostotaldebt;
                             

                             $pros_total_paid_old+=$grandprostotalpaid;
                             $pros_total_debt_old+=$grandprostotaldebt;
                             $pros_total_charger_old+=$grandprostotalfee;
                            
                        echo '</tbody>
                        </table>
                        </div>';

                        }else
                        {

                        }
        
            }




             

             $pros_total_paid_old;
             $pros_total_debt_old;
             $pros_total_charger_old;

          
             
                //verify tranaction for current term
             if($verifycurrentpacurrent   == '1')
             {

                $pros_total_payment_current+=$totalcurentfeelefttransaction; 
                $pros_total_paid_current;
                $pros_total_debt_current;


                $overtotalgrandtotal_debt = $pros_total_debt_old +  $pros_total_debt_current; 





                  if($overtotalgrandtotal_debt == '0' )
                  {

                  }else
                  {

                 

                    echo '<table class="table" style="border-left:1px solid black;border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black;">
                        <thead>
                            
                        </thead>
                        <tbody>
                            
                            
                        </tbody>
                        <tfoot>
                            <tr>
                        
                            <td style="font-weight:800;border-right:1px solid black;">Grand Total Balance</td>
                            <td style="font-weight:800;border-right:1px solid black;">₦'.number_format($overtotalgrandtotal_debt).'</td>
                            
                            </tr>
                        </tfoot>
                    </table>';
                }

             }else
             {



                if($pros_total_debt_old == '0' )
                {

                }else
                {


                        echo '<table class="table" style="border-left:1px solid black;border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black;">
                            <thead>
                                
                            </thead>
                            <tbody>
                                
                                
                            </tbody>
                            <tfoot>
                                <tr>
                            
                                <td style="font-weight:800;border-right:1px solid black;">Grand Total Balance</td>
                                <td style="font-weight:800;border-right:1px solid black;">₦'.number_format($pros_total_debt_old).'</td>
                                
                                </tr>
                            </tfoot>
                        </table>';

                    }
             }
          

           



        } else {
            // Handle the case where no data is found
            echo 'No student fee data found.';
        }


?>
