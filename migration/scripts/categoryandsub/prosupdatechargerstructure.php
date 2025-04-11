<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../controller/config/config.php');
    
    include('../../../controller/config/config2.php');

    /* Getting file name */
    if (!empty($_FILES['file']['name'])) 
    {
        $abba_campus = $_POST['abba_campus'];
        $abba_term = $_POST['abba_term'];
        $abba_session = $_POST['abba_session'];
        $currentDate = date("Y-m-d");
        
        $select_institution = mysqli_query($link,"SELECT * FROM `campus` WHERE CampusID='$abba_campus'");
        $select_institution_cnt = mysqli_num_rows($select_institution);
        $select_institution_cnt_row = mysqli_fetch_assoc($select_institution);
        
        
            
                $InstitutionIDgotten =  $select_institution_cnt_row['InstitutionID'];
            
        
         
        
        

        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        // Validate whether selected file is part of the group of CSV file above, if it is, then upload
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) 
        {
            $filename = $_FILES['file']['name'];
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            
            $insertructure = 0;
            $inserrtransaction  = 0;

            // Skip the first line
            fgetcsv($csvFile);
            //echo count($linecount);
            while (($line = fgetcsv($csvFile)) !== FALSE) 
            {
                
                 $subcategoryIDOLD = $line[0];
                 $CategoryIDOLD = $line[1];
                 $InstitutionID = $line[2];
                 $SubcategoryIDNew = $line[4];
                 $CategoryIDNew = $line[5];
                 
                 
                  
                 

                    //charge structure start here
                  
                  $select_chargeold = mysqli_query($link_abba, "SELECT * FROM `chargestructure` WHERE InstitutionID='$abba_campus' 
                  AND categoryID='$CategoryIDOLD' AND subCategoryID='$subcategoryIDOLD' AND termOrSemesterName='$abba_term' AND sessionName='$abba_session'");
                  $select_chargeold_cnt = mysqli_num_rows($select_chargeold);
                   
                  $select_chargeold_cnt_rows = mysqli_fetch_assoc($select_chargeold);
                   
                   
                  if($select_chargeold_cnt_rows > 0)
                  {
                       
                                do{
                                    
                                    
                                    
                                    
                                        $ClassOrDepartmentID = $select_chargeold_cnt_rows['ClassOrDepartmentID'];
                                        $termOrSemesterNamegotten = $select_chargeold_cnt_rows['termOrSemesterName'];
                                        $sessionNamenew = $select_chargeold_cnt_rows['sessionName'];
                                        $amount = $select_chargeold_cnt_rows['amount'];
                                        $date = $select_chargeold_cnt_rows['date'];
                                        
                                        $status = $select_chargeold_cnt_rows['status'];
                                        
                                        if($termOrSemesterNamegotten == 'First')
                                        {
                                            $termOrSemesterNamegotennew  = 1; 
                                        }else if($termOrSemesterNamegotten == 'Second')
                                        {
                                          $termOrSemesterNamegotennew  = 2;  
                                        }else if($termOrSemesterNamegotten == 'Third')
                                        {
                                            $termOrSemesterNamegotennew  = 3; 
                                        }
                                        
                                      
                                        $verifycharegstructurebf4insert = mysqli_query($link," SELECT * FROM `chargestructure` WHERE InstitutionID='$InstitutionIDgotten' AND CampusID='$abba_campus' 
                                        AND Session='$sessionNamenew' AND TermOrSemesterID='$termOrSemesterNamegotennew' AND ClassOrDepartmentID='$ClassOrDepartmentID'
                                        AND CategoryID='$CategoryIDNew' AND SubcategoryID='$SubcategoryIDNew' AND Status='$status'");
                                        
                                        $verifycharegstructurebf4insert_cnt =  mysqli_num_rows($verifycharegstructurebf4insert);
                                        
                                        
                                        if($verifycharegstructurebf4insert_cnt > 0)
                                        {
                                            
                                        }else
                                        {
                                            
                                            
                                       
                                                $insertchargestructure = mysqli_query($link,"INSERT INTO `chargestructure`(`InstitutionID`, `CampusID`, `CategoryID`, `SubcategoryID`, `Session`, `TermOrSemesterID`, `ClassOrDepartmentID`, `Amount`, `Status`) 
                                                VALUES ('$InstitutionIDgotten','$abba_campus','$CategoryIDNew','$SubcategoryIDNew','$sessionNamenew','$termOrSemesterNamegotennew','$ClassOrDepartmentID','$amount','$status')") ; 
                                                
                                                
                                                
                                                   if($insertchargestructure == true)
                                                   {
                                                        $insertructure+=+1;
                                                   }else
                                                   {
                                                       
                                                   }
                                                
                                                
                                           
                                                
                                                
                                                
                                                
                                            
                                        }
                                        
                                        
                                        
                                    
                                }while($select_chargeold_cnt_rows = mysqli_fetch_assoc($select_chargeold));  
                  }else
                  {
                       
                  }
                   //charge structure end here
                   
                   
                   
                   //transaction start here
                   
                
                 
                
                   
                       $selectoldtransaction = mysqli_query($link_abba, "SELECT * FROM `transaction` WHERE 
                       InstitutionID='$abba_campus' AND categoryID='$CategoryIDOLD' AND subCategoryID='$subcategoryIDOLD' AND sessionName='$abba_session' AND termOrSemesterName='$abba_term'");
                        $selectoldtransaction_row = mysqli_num_rows($selectoldtransaction);
                        $selectoldtransaction_row_cnt = mysqli_fetch_assoc($selectoldtransaction);
                       
                       if($selectoldtransaction_row > 0)
                       {
                           
                             do{
                                 
                                 $PaymentRefNo = $selectoldtransaction_row_cnt['PaymentRefNo'];
                                 $InstitutionIDtransaction = $selectoldtransaction_row_cnt['InstitutionID'];
                                 $ClassOrDepartmentIDtransact = $selectoldtransaction_row_cnt['ClassOrDepartmentID'];
                                 $amountPaid = $selectoldtransaction_row_cnt['amountPaid'];
                                 $termOrSemesterNametransaction = $selectoldtransaction_row_cnt['termOrSemesterName'];
                                 $sessionNametransaction = $selectoldtransaction_row_cnt['sessionName'];
                                 $dateCreated = $selectoldtransaction_row_cnt['dateCreated'];
                                 $studentIDtransaction = $selectoldtransaction_row_cnt['studentID'];
                                 
                                  $statustransaction = $selectoldtransaction_row_cnt['status'];
                                  $deleteStatustransaction = $selectoldtransaction_row_cnt['deleteStatus'];
                                  
                                  
                                  
                                  if($termOrSemesterNametransaction == 'First')
                                {
                                    $termOrSemesterNamegotennewtransaction  = 1; 
                                }else if($termOrSemesterNametransaction == 'Second')
                                {
                                  $termOrSemesterNametransaction  = 2;  
                                }else if($termOrSemesterNamegotten == 'Third')
                                {
                                    $termOrSemesterNamegotennewtransaction  = 3; 
                                }
                                  
                                  
                                   
                                   
                                   $select_transaction_verification = mysqli_query($link,"SELECT * FROM `transactions` WHERE InstitutionID='$InstitutionIDgotten' 
                                   AND CampusID='$abba_campus' AND TransactionReference='$PaymentRefNo' AND ClassOrDepartmentID='$ClassOrDepartmentIDtransact' AND TermOrSemesterID='$termOrSemesterNamegotennewtransaction'
                                   AND Session='$sessionNametransaction' AND Date='$dateCreated' AND StudentID='$studentIDtransaction' AND `CategoryID`='$CategoryIDNew' AND `SubcategoryID`='$SubcategoryIDNew'");
                                 
                                    $select_transaction_verification_cnt = mysqli_num_rows($select_transaction_verification);
                                    
                                    if($select_transaction_verification_cnt > 0)
                                    {
                                        
                                        
                                    }else
                                    {
                                        
                                       
                                       
                                                $inserttransaction = mysqli_query($link,"INSERT INTO `transactions`(`InstitutionID`, `CampusID`, `TransactionReference`, `TransactionType`, `ModeofTransaction`, 
                                                `CategoryID`, `SubcategoryID`, `TuitionType`, `StudentID`,
                                                `ClassOrDepartmentID`, `Session`, `TermOrSemesterID`, `TransactionIn`,
                                                 `Date`, `DeleteStatus`)
                                                VALUES ('$InstitutionIDgotten','$abba_campus','$PaymentRefNo',
                                                'income','Normal','$CategoryIDNew','$SubcategoryIDNew','Normal','$studentIDtransaction',
                                                '$ClassOrDepartmentIDtransact','$sessionNametransaction','$termOrSemesterNamegotennewtransaction','$amountPaid','$dateCreated','$deleteStatustransaction')");  
                                                
                                                if($inserttransaction == true)
                                                {
                                                  $inserrtransaction+=+1;  
                                                }
                                                
                                                 
                                        
                                    }
                                 
                             }while($selectoldtransaction_row_cnt = mysqli_fetch_assoc($selectoldtransaction));
                           
                           
                       }else
                       {
                           
                       }
                       
                       
                       
                   //transaction start here
                   
                   
                   //FEEWAVER HERE
                   
                   
                   
             
                   
                       $prosgetfeewaver = mysqli_query($link_abba,"SELECT * FROM `feewaver` WHERE InstitutionID='$abba_campus'
                        AND categoryID='$CategoryIDOLD' AND subCategoryID='$subcategoryIDOLD'
                        AND sessionName='$abba_session' AND 
                       termOrSemesterName='$abba_term'");
                       
                       $prosgetfeewavercnt = mysqli_num_rows($prosgetfeewaver);
                       $prosgetfeewavercntrow = mysqli_fetch_assoc($prosgetfeewaver);
                       
                       if($prosgetfeewavercnt > 0)
                       {
                           
                                 do{
                                     
                                             $WaverRefNo =  $prosgetfeewavercntrow['WaverRefNo']; 
                                             $ClassOrDepartmentIDwaveamount =  $prosgetfeewavercntrow['ClassOrDepartmentID']; 
                                              $studentIDwave =  $prosgetfeewavercntrow['studentID']; 
                                              $WaverAmount =  $prosgetfeewavercntrow['WaverAmount'];
                                              $termOrSemesterNamewav =  $prosgetfeewavercntrow['termOrSemesterName'];
                                              $sessionNamewave =  $prosgetfeewavercntrow['sessionName'];
                                              $sdateCreatedwave =  $prosgetfeewavercntrow['dateCreated'];
                                               $statuswave =  $prosgetfeewavercntrow['status'];
                                               $deletestatuswav=  $prosgetfeewavercntrow['deletestatus'];
                                               
                                               
                                               if($termOrSemesterNamewav == 'First')
                                                {
                                                    $termOrSemesterNamegotennewtransactionwave  = 1; 
                                                }else if($termOrSemesterNamewav == 'Second')
                                                {
                                                  $termOrSemesterNamegotennewtransactionwave  = 2;  
                                                }else if($termOrSemesterNamewav == 'Third')
                                                {
                                                    $termOrSemesterNamegotennewtransactionwave  = 3; 
                                                }
                                                
                                                if($statuswave == '1')
                                                {
                                                       $wavenewstatype = 'Scholarship';
                                                }else if($statuswave == '2')
                                                {
                                                     $wavenewstatype = 'Discount';
                                                }
                                               
                                               
                                                
                                               
                                               
                                                $select_transaction_verificationwave = mysqli_query($link,"SELECT * FROM `transactions` WHERE InstitutionID='$InstitutionIDgotten' 
                                           AND CampusID='$abba_campus' AND TransactionReference='$WaverRefNo' AND ClassOrDepartmentID='$ClassOrDepartmentIDwaveamount' AND TermOrSemesterID='$termOrSemesterNamewav'
                                           AND Session='$sessionNamewave' AND Date='$sdateCreatedwave' AND StudentID='$studentIDwave' AND `CategoryID`='$CategoryIDNew' AND `SubcategoryID`='$SubcategoryIDNew'");
                                         
                                            $select_transaction_verification_cntwave = mysqli_num_rows($select_transaction_verificationwave);
                                            
                                            if($select_transaction_verification_cntwave > 0)
                                            {
                                                            
                                                
                                            }else
                                            {
                                                
                                                         $inserttransactionwaave = mysqli_query($link,"INSERT INTO `transactions`(`InstitutionID`, `CampusID`, `TransactionReference`, `TransactionType`, `ModeofTransaction`, 
                                                        `CategoryID`, `SubcategoryID`, `TuitionType`, `StudentID`,
                                                        `ClassOrDepartmentID`, `Session`, `TermOrSemesterID`, `TransactionIn`,
                                                         `Date`, `DeleteStatus`)
                                                        VALUES ('$InstitutionIDgotten','$abba_campus','$WaverRefNo',
                                                        'income','Normal','$CategoryIDNew','$SubcategoryIDNew','$wavenewstatype','$studentIDwave',
                                                        '$ClassOrDepartmentIDwaveamount','$sessionNamewave','$termOrSemesterNamegotennewtransactionwave','$WaverAmount','$sdateCreatedwave','$deletestatuswav')");
                                             }
                                               
                                
                               
                                }while($prosgetfeewavercntrow = mysqli_fetch_assoc($prosgetfeewaver));
                           
                       }else
                       {
                           
                       }
                       
                   
                   //FEEWAVER HERE
                   
                   
                  
                 
                   
                   
                   //OPTIONAL FEE HERE 
                            $prosgetoptionalfeehere = mysqli_query($link_abba,"SELECT * FROM `optionalfeeassign` WHERE InstitutionID='$abba_campus' AND SessionName='$abba_session' 
                            AND TermOrSemester='$abba_term' AND categoryID='$CategoryIDOLD' AND subCategoryID='$subcategoryIDOLD'");
                            $prosgetoptionalfeehere_cnt = mysqli_num_rows($prosgetoptionalfeehere);
                            
                            $prosgetoptionalfeehere_cnt_row = mysqli_fetch_assoc($prosgetoptionalfeehere);
                            
                            if($prosgetoptionalfeehere_cnt > 0)
                            {
                                                do{
                                                   
                                                   
                                                    
                                                   $StudentIDoptional =  $prosgetoptionalfeehere_cnt_row['StudentID'];
                                                   $SessionNameoptional =  $prosgetoptionalfeehere_cnt_row['SessionName'];
                                                   $TermOrSemesteroptional =  $prosgetoptionalfeehere_cnt_row['TermOrSemester'];
                                                   $ClassOrDepartmentIDoptional =  $prosgetoptionalfeehere_cnt_row['ClassOrDepartmentID'];
                                                   $Status =  $prosgetoptionalfeehere_cnt_row['Status'];
                                                   
                                                   
                                                   
                                                   if($TermOrSemesteroptional == 'First')
                                                {
                                                    $prosoptionalfeeterm  = 1; 
                                                }else if($TermOrSemesteroptional == 'Second')
                                                {
                                                  $prosoptionalfeeterm  = 2;  
                                                }else if($TermOrSemesteroptional == 'Third')
                                                {
                                                    $prosoptionalfeeterm  = 3; 
                                                }
                                                   
                                                   
                                                
                                                   $verifyoptionalfee = mysqli_query($link,"SELECT * FROM `assignoptionalfees` WHERE InstitutionID='$InstitutionIDgotten' AND CampusID='$abba_campus' AND
                                                   ClassOrDepartmentID='$ClassOrDepartmentIDoptional' AND TermOrSemesterID='$prosoptionalfeeterm' AND  Session='$SessionNameoptional' 
                                                   AND CategoryID='$CategoryIDNew' AND SubcategoryID='$SubcategoryIDNew' AND StudentID='$StudentIDoptional'");
                                                   $verifyoptionalfee_cnt = mysqli_num_rows($verifyoptionalfee);
                                                   
                                                   
                                                   if($verifyoptionalfee_cnt > 0)
                                                   {
                                                       
                                                   }else
                                                   {
                                                       
                                                       
                                                       
                                                       $insertoptionalfee = mysqli_query($link,"INSERT INTO `assignoptionalfees`(`InstitutionID`, `CampusID`, `ClassOrDepartmentID`, `Session`, 
                                                       `TermOrSemesterID`, `CategoryID`, `SubcategoryID`, `StudentID`, `Status`, `Date`)
                                                       VALUES ('$InstitutionIDgotten','$abba_campus','$ClassOrDepartmentIDoptional','$SessionNameoptional', '$prosoptionalfeeterm', '$CategoryIDNew','$SubcategoryIDNew','$StudentIDoptional','$Status','$currentDate')");
                                                       
                                                   }
                                                   
                                                   
                                                    
                                                }while($prosgetoptionalfeehere_cnt_row = mysqli_fetch_assoc($prosgetoptionalfeehere));  
                            }else
                            {
                                
                            }
                            
                            
                            
                            
                            
                   //OPTIONAL FEE HERE 
                   
                
                
               
            }
            
            
            
            if($insertructure > 0 || $inserrtransaction > 0)
            {
                    echo 'success';    
            }else
            {
                echo 'failed';    
            }
            
            
           
            
            
        }
        else
        {
            echo 'nothing found';
        }
        
         
        
        
        
    } 
    else 
    {
        echo 'nothing found';

    }
    
           
    
       
?>