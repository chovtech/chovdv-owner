<?php

            include('../../config/config.php');
            $InstitutionID = $_POST['abba_get_stored_instituion_id'];
            $UserID = $_POST['UserID'];


            //WALLET SELECT QUERY HERE
            $select_agency = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$UserID'");
            $select_agency_row = mysqli_num_rows($select_agency);



            if ($select_agency_row > 0) {

                $select_agency_rowsel = mysqli_fetch_assoc($select_agency);


                if ($select_agency_rowsel['WalletBalance'] == '0') {

                   
                    $prosWalletBalance = '0.00';
                } else {

                    $prosWalletBalance = number_format($select_agency_rowsel['WalletBalance']);
                }



                if ($select_agency_rowsel['PendingWithdrawal'] == '0') {
                    $prosPendingWithdrawal = '0.00';
                } else {
                    

                    $prosPendingWithdrawal = number_format($select_agency_rowsel['PendingWithdrawal']);
                }


                if ($select_agency_rowsel['AmountWithdrawn'] == '0') {

                    $prosAmountWithdrawn = '0.00';
                } else {
                    $prosAmountWithdrawn = number_format($select_agency_rowsel['AmountWithdrawn']);
                }


            } else {


                $prosWalletBalance = 0.00;
                $prosPendingWithdrawal = 0.00;
                $prosAmountWithdrawn  = 0.00;
            }
            //WALLET SELECT QUERY HERE

            $selectsessionpros = mysqli_query($link, "SELECT * FROM `session` WHERE  sessionStatus='1'");
            $selectsessionproscnt = mysqli_num_rows($selectsessionpros);
            $selectsessionproscnt_row = mysqli_fetch_assoc($selectsessionpros);
    
            $Currentsession = $selectsessionproscnt_row['sessionName'];
    
    


           $prostotalpaid = 0;
           $prostotalbalance = 0;

           $prostotalbalancecheckverify = 0;
           $prostotalbalanceheckverifyrem = 0;

            $selectinstitutionrecord = mysqli_query($link,"SELECT * FROM `campus` WHERE InstitutionID='$InstitutionID'");
            $selectinstitutionrecordcnt = mysqli_num_rows($selectinstitutionrecord);
        

            if($selectinstitutionrecordcnt > 0)
            {
                      
                        while($selectinstitutionrecordcntrow = mysqli_fetch_assoc($selectinstitutionrecord))
                        {



                                $CampusID = $selectinstitutionrecordcntrow['CampusID'];



                               $selecttermcnt = mysqli_query($link," SELECT * FROM `termorsemester` INNER JOIN `termalias` ON  `termorsemester`.`TermOrSemesterID` = `termalias`.`TermOrSemesterID`  WHERE `termalias`.`CampusID`='$CampusID' AND `termorsemester`.`status`='1'");
                               $selecttermcntrow = mysqli_fetch_assoc($selecttermcnt);
                               $selecttermcnt_num = mysqli_num_rows($selecttermcnt);
                       
                               $currntTermOrSemesterID = $selecttermcntrow['TermOrSemesterID'];
                               $current_Term_alisName = $selecttermcntrow['TermAliasName'];




                               $prosloadashboradcontentpaid = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionIn FROM 
                               `transactions` WHERE `InstitutionID`='$InstitutionID' AND `DeleteStatus`='0' AND `Session`='$Currentsession' AND `TermOrSemesterID`='$currntTermOrSemesterID' AND CampusID='$CampusID' AND TuitionType !='Repurchase'");
                               $prosloadashboradcontentpaid_cnt =  mysqli_num_rows($prosloadashboradcontentpaid);
                               $prosloadashboradcontentpaid_cntrows =  mysqli_fetch_assoc($prosloadashboradcontentpaid);

                               if($prosloadashboradcontentpaid_cnt > 0)
                               {
                   
                                          $prosget_totalamountpaid  = $prosloadashboradcontentpaid_cntrows['TransactionIn']; 

                                           $prostotalpaid+=$prosget_totalamountpaid ;
                                        
                   
                               }else
                               {
                                        //    $prosget_totalamountpaid = '0.00';
                               }
                   


                                                    
                                $select_studentfeeherecurrent = mysqli_query($link, "SELECT * FROM `student`
                                INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID`
                                WHERE `classordepartmentstudentallocation`.`CampusID`='$CampusID' AND `classordepartmentstudentallocation`.`Session`='$Currentsession'");

                                $select_studentfeeherecurrentrowcnt = mysqli_num_rows($select_studentfeeherecurrent);
                             


                                if($select_studentfeeherecurrentrowcnt > 0)
                                {


                                        while($select_studentfeeherecurrentrowcntrowdata = mysqli_fetch_assoc($select_studentfeeherecurrent))
                                        {

                                           

                                                    $StudentID = $select_studentfeeherecurrentrowcntrowdata['StudentID'];
                                                   $ClassOrDepartmentID = $select_studentfeeherecurrentrowcntrowdata['ClassOrDepartmentID'];
                                                    $CampusIDnew = $select_studentfeeherecurrentrowcntrowdata['CampusID'];
                                                    $Sessiongotten = $select_studentfeeherecurrentrowcntrowdata['Session'];


                                                    $sql_deactivateuser = mysqli_query($link, "SELECT * FROM deactivateuser WHERE InstitutionIDOrCampusID = '$CampusIDnew' AND UserID = '$StudentID' AND UserType = 'student' AND sessionName = '$Currentsession' AND TermOrSemesterName = '$currntTermOrSemesterID' AND Status IN (0,2)");
                                                    $sql_deactivateuser_cnt = mysqli_num_rows($sql_deactivateuser);
                                                    
                                                    if($sql_deactivateuser_cnt > 0)
                                                    {
                                                        
                                                    }
                                                    else
                                                    {
                                                        
                                                        
                                                     $prosloadashboradcontentpaiddebt = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionIn FROM 
                                                    `transactions` WHERE `InstitutionID`='$InstitutionID' AND `DeleteStatus`='0' AND StudentID='$StudentID' AND ClassOrDepartmentID='$ClassOrDepartmentID' AND CampusID='$CampusID' AND TuitionType !='Repurchase' AND `Session`='$Currentsession' AND `TermOrSemesterID`='$currntTermOrSemesterID'");
                                                    $prosloadashboradcontentpaid_cntdebt =  mysqli_num_rows($prosloadashboradcontentpaiddebt);
                                                    

                                                    if($prosloadashboradcontentpaid_cntdebt > 0)
                                                    {


                                                             $prosloadashboradcontentpaid_cntrowsdebt =  mysqli_fetch_assoc($prosloadashboradcontentpaiddebt);
                                        
                                                                 $prosget_totalamountpaiddebt  = $prosloadashboradcontentpaid_cntrowsdebt['TransactionIn']; 

                                                                 $prostotalbalancecheckverify+=$prosget_totalamountpaiddebt;
                                                                 
                                                                // $prostotalpaid+=$prosget_totalamountpaid ;
                                                                
                                        
                                                    }else
                                                    {
                                                                //    $prosget_totalamountpaid = '0.00';
                                                    }
                                                

            
                                                                $selectcharge = mysqli_query($link,"SELECT  SUM(Amount) AS Amount FROM `chargestructure` WHERE `CampusID`='$CampusIDnew' AND `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `Status`='1' AND `Session`='$Currentsession' AND `TermOrSemesterID`='$currntTermOrSemesterID'");
                                                                $selectchargecnt = mysqli_num_rows($selectcharge);
                                                                $selectchargecntrow = mysqli_fetch_assoc($selectcharge);
            
                                                                 if($selectchargecnt > 0)
                                                                 {
                                                                     
                                                                       
                
                                                                        $Amount = $selectchargecntrow['Amount'];
                                                                        $prostotalbalance+=$Amount;
                                                                   
                                                                     
                                                                 }else
            
                                                                 {
                                                                        
                                                                 }

                                                                $prosselcetoptionalfee = mysqli_query($link, "SELECT * FROM `assignoptionalfees` INNER JOIN `chargestructure` ON  `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID` AND assignoptionalfees.CategoryID = chargestructure.CategoryID AND assignoptionalfees.SubcategoryID = chargestructure.SubcategoryID  WHERE 
                                                                `assignoptionalfees`.`ClassOrDepartmentID`='$ClassOrDepartmentID' AND `assignoptionalfees`.StudentID='$StudentID' AND `chargestructure`.`Status`='0' AND `assignoptionalfees`.`Status`='0'
                                                                AND `assignoptionalfees`.`CampusID`='$CampusIDnew' AND `assignoptionalfees`.`Session`='$Sessiongotten'AND chargestructure.TermOrSemesterID='$currntTermOrSemesterID'");
                                                                
                                                                
        
                                                                 $prosselcetoptionalfeecnt = mysqli_num_rows($prosselcetoptionalfee);
                                                                  $prosselcetoptionalfeecntrow = mysqli_fetch_assoc($prosselcetoptionalfee);
         
        
                                                                      if($prosselcetoptionalfeecnt > 0)
                                                                      {
        
                                                                                        do{
                                                                                            
                                                                                            
                                                                                            $optionalfeeamount = $prosselcetoptionalfeecntrow['Amount'];
        
                                                                                             $prostotalbalance+=$optionalfeeamount;
                                                                                            
                                                                                        }while( $prosselcetoptionalfeecntrow = mysqli_fetch_assoc($prosselcetoptionalfee));
        
        
                                                                      
        
        
                                                                            
                                                                           
        
                                                                      }else
                                                                      {
                                                                        
                                                                      }
                                                                
                                                        
                                                        
                                                        
                                                        
                                
                                
                                                    }


                                                   
                                                    

                                                       


                                        }


                                }else
                                {

                                }




                        }

            }else
            {

            }




      $overalltotalamouncharge =    number_format($prostotalbalance);

       

         $prostotalgranddebt =  number_format($prostotalbalance - $prostotalbalancecheckverify);
         $prostotalgrandtotalpaid = number_format($prostotalpaid);
         
         if($prostotalgranddebt == '0')
         {
            $prostotalgranddebtnew = '0.00'; 
         }else
         {
              $prostotalgranddebtnew =  $prostotalgranddebt; 
         }



          

        echo '<input type="hidden" id="proswalletbalance" value="'.$prosWalletBalance.'">
         <input type="hidden" id="proswallletwithdrapending" value="'.$prosPendingWithdrawal.'">
         <input type="hidden" id="proswallletwithdrawn" value="'.$prosAmountWithdrawn.'">


         <input type="hidden" id="prosamounbalancefinamsummary" value="'.$prostotalgranddebtnew.'">
         <input type="hidden" id="prosamounpaidfinamsummary" value="'.$prostotalgrandtotalpaid.'">
         <input type="hidden" id="prosloadamounttobepaidsummary" value="'.$overalltotalamouncharge.'">
         ';
      


         
        
        

         




?>