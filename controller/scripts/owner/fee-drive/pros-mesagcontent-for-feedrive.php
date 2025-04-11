
<?php

            
                include('../../../config/config.php');

                            
                 $studentID = $_POST['studentID'];
                 $institutionID = $_POST['institutionID'];
                 $CampusID = $_POST['CampusID'];




                $select_parent_info = mysqli_query($link,"SELECT * FROM `student` 
                INNER JOIN `parent` ON `student`.`ParentID` = `parent`.`ParentID` 
                WHERE `parent`.`InstitutionID`='$institutionID' AND `student`.`StudentID`='$studentID' AND  `student`.`CampusID`='$CampusID'");

                $select_parent_info_cntt = mysqli_num_rows($select_parent_info);
                $select_parent_info_cnttrow = mysqli_fetch_assoc($select_parent_info);

                if($select_parent_info_cntt > 0)
                {

                      $ParentMainPhoneNumber =  $select_parent_info_cnttrow ['ParentMainPhoneNumber'];

                      $ParentEmail =  $select_parent_info_cnttrow ['ParentEmail'];
                      $ParentFirstName=  $select_parent_info_cnttrow ['ParentFirstName'];
                      $ParentLastName=  $select_parent_info_cnttrow ['ParentLastName'];
                      $ParentID=  $select_parent_info_cnttrow ['ParentID'];


                      $parentfullname = $ParentFirstName.' '.$ParentLastName;
                      $studentfullname =  $select_parent_info_cnttrow ['StudentFirstName'].' '.$select_parent_info_cnttrow ['StudentLastName'];

 

                        
                }else
                {

                    
                    $ParentMainPhoneNumber =  'NULL';
                    $ParentEmail =   'NULL';
                    $ParentFirstName=  'NULL';
                    $ParentLastName=   'NULL';
                    $parentfullname =  'NULL';



                }
                
                
                
                  //pros select student fee
                  
                  
                            $proscharegtotal = 0;
                            $prostotaltransaction = 0;
                   
                  
                         $prosgetstudentclasses = mysqli_query($link,"SELECT * FROM `classordepartmentstudentallocation` WHERE `StudentID`='$studentID' AND CampusID='$CampusID'");
                         $prosgetstudentclassescnt = mysqli_num_rows($prosgetstudentclasses);
                         $prosgetstudentclassescntrow = mysqli_fetch_assoc($prosgetstudentclasses);
                         
                         
                           if($prosgetstudentclassescnt > 0)
                           {
                               
                                  do{
                                      
                                      
                                                $prosclassID =  $prosgetstudentclassescntrow['ClassOrDepartmentID'];
                                                $CampusIDnew =  $prosgetstudentclassescntrow['CampusID'];
                                                $Sessionnew =  $prosgetstudentclassescntrow['Session'];
                                                
                                                
                                                
                                                 $pros_select_optional_fee = mysqli_query($link,"SELECT SUM(`chargestructure`.`Amount`) AS Prosoptionalfee FROM `chargestructure` INNER JOIN assignoptionalfees ON `chargestructure`.`CampusID` = `assignoptionalfees`.`CampusID` AND
                                                    `chargestructure`.`ClassOrDepartmentID` = `assignoptionalfees`.`ClassOrDepartmentID` 
                                                    AND `chargestructure`.`Session` = `assignoptionalfees`.`Session` WHERE `chargestructure`.`ClassOrDepartmentID`='$prosclassID' AND 
                                                    `assignoptionalfees`.`StudentID`='$studentID'  AND `assignoptionalfees`.`Session`='$Sessionnew'");
          
                                                 $pros_select_optional_fee_cnt = mysqli_num_rows($pros_select_optional_fee);
                                                 $pros_select_optional_fee_cnt_row = mysqli_fetch_assoc($pros_select_optional_fee);
                                                 
                                                 
                                                  $optionalfeetotal =  $pros_select_optional_fee_cnt_row['Prosoptionalfee'];
                                                  
                                                  
                                                  if($optionalfeetotal == 'NULL'|| $optionalfeetotal == '0' || $optionalfeetotal == '' || $optionalfeetotal == 'Null')
                                                  {
                                                            $newoptionalcharge = 0;
                                                  }else{
                                                      
                                                           $newoptionalcharge =  $optionalfeetotal;
                                                  }
                                                  
                                                  
                                                  
                                                  $select_compulsoryfee_here = mysqli_query($link,"SELECT * FROM `chargestructure` WHERE InstitutionID='$institutionID'
                                                  AND ClassOrDepartmentID='$prosclassID' AND `Session`='$Sessionnew' AND `Status`='1'");
                                                  $select_compulsoryfee_here_cnt = mysqli_num_rows($select_compulsoryfee_here);
                                                  $select_compulsoryfee_here_cnt_row = mysqli_fetch_assoc($select_compulsoryfee_here);
              
              
                                               
              
                                                  $compusamount = $select_compulsoryfee_here_cnt_row['Amount'];
                                                  
                                                  
                                                  
                                                  
                                                   if($compusamount == 'NULL'|| $compusamount == '0' || $compusamount == '' || $compusamount == 'Null')
                                                  {
                                                            $compusamountcharge = 0;
                                                  }else{
                                                      
                                                           $compusamountcharge =  $compusamount;
                                                  }
                                                  
              
                                                  
              
                                                 
                                                $proscharegtotal+=$compusamountcharge+$newoptionalcharge;
                                                
                                                
                                                
                                              
                                                     $select_pros_transaction_here = mysqli_query($link,"  SELECT SUM(TransactionIn) AS TransactionInPaid FROM `transactions`
                                                         WHERE InstitutionID='$InstitutionID' AND (`CampusID`= $CampusIDnew  OR $CampusIDnew  IS NULL) 
                                                        AND `Session`='$Sessionnew'  AND  StudentID='$studentID'");
                  
                                                         $select_pros_transaction_here_cnt = mysqli_num_rows($select_pros_transaction_here);
                                                         $select_pros_transaction_here_cnt_row = mysqli_fetch_assoc($select_pros_transaction_here);
                  
                                                       
                                                            $TransactionInamountal =   $select_pros_transaction_here_cnt_row['TransactionInPaid'];
                                                         
                                                         
                                                         
                                                         
                                                           if($TransactionInamountal == 'NULL'|| $TransactionInamountal == '0' || $TransactionInamountal == '' || $TransactionInamountal == 'Null')
                                                           {
                                                                    $TransactionInamountaltransaction = 0;
                                                           }else{
                                                              
                                                                   $TransactionInamountaltransaction =  $TransactionInamountal;
                                                           }
                                                          
                                                
                                                
                                                        $prostotaltransaction+=$TransactionInamountaltransaction;
                                                
                                                  
                                       
                                  }while($prosgetstudentclassescntrow = mysqli_fetch_assoc($prosgetstudentclasses));
                                   
                           }else
                           
                           {
                               
                           }
                         
                         
                        
                            
                            if($prostotaltransaction >= $proscharegtotal)
                            {
                                  $prostotaldebt = 0;
                            }else
                            {
                                 $prostotaldebt = number_format($proscharegtotal - $prostotaltransaction);
                            }
                        


                 echo '<input type="hidden" id="prosgetparentforsingle-number" value="'.$ParentMainPhoneNumber.'">
                  <input type="hidden" id="prosgetparentforsingle-fullname" value="'.$parentfullname.'">
                   <input type="hidden" id="prosgetstudentforsingle-fullname" value="'.$studentfullname.'">
                  <input type="hidden" id="prosloadstudemail" value="'.$ParentEmail.'">
                  <input type="hidden" id="prosloadparentid-formessage" value="'.$ParentID.'">
                   <input type="hidden" id="prosloaddebtamount" value="'.$prostotaldebt.'">
                  ';
                   
                  

                 






?>