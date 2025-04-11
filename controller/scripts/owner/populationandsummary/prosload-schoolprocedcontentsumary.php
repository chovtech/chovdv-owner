<?php
                    include('../../../config/config.php');

                    $campusID = $_POST['CampusID'];
                    $IntitutionID = $_POST['institutionID'];
                    $session = $_POST['session'];
                    $term = $_POST['term'];
                    $classID = $_POST['classname'];




                   

                    $selectstudentforsummary = mysqli_query($link,"SELECT * FROM `student` INNER JOIN classordepartmentstudentallocation ON
                     `student`.`StudentID` = classordepartmentstudentallocation.StudentID 
                     WHERE classordepartmentstudentallocation.ClassOrDepartmentID='$classID'  
                     AND classordepartmentstudentallocation.Session='$session' 
                     AND classordepartmentstudentallocation.CampusID='$campusID'");
                    $selectstudentforsummarycnt = mysqli_num_rows($selectstudentforsummary);
                    $selectstudentforsummarycntrow = mysqli_fetch_assoc($selectstudentforsummary);


                    if($selectstudentforsummarycnt > 0)
                    {



                            $prosgetclass_records =  mysqli_query($link,"SELECT * FROM `classordepartment` WHERE ClassOrDepartmentID='$classID'
                                AND CampusID='$campusID'");
                            $prosgetclass_recordscnt = mysqli_num_rows($prosgetclass_records);
                            $prosgetclass_recordsrow = mysqli_fetch_assoc($prosgetclass_records);
                                                
                            $className =  $prosgetclass_recordsrow['ClassOrDepartmentName'];
   

                          $num = 1;
                                                    
                        echo '<div class="abba_table-box prosprintclassfeesummary-schoolproceed"  style="color: black;">
                        <table cellpadding="0" cellspacing="0" style="margin-top: 10px;">
                            <tbody>
                               
                            <tr class="abba_item" style="background-color: lightgrey;">
                            <td colspan="6" style="font-size: larger;padding: 10px;font-weight: 600;">'.strtoupper($className).' FEE SUMMARY</td>
                            <td colspan="6" style="font-size: larger;padding: 10px;font-weight: 600;"></td>
                            
                             </tr>
                                <tr class="abba_heading">
                                    <td>S/N</td>
                                    <td>NAME</td>
                                    <td>OVERALL PAID</td>
                                    <td>OVERALL DEBT</td>
                                    <td colspan="3">COMPULSORY FEE</td>
                                    <td colspan="3">OPTIONAL FEE</td>
                                </tr>
                                
                                <tr >
                                    <td</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                

                                   
                                    <th scope="col">Total</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Debt</th>
                                   
            
                                    <th scope="col">Total</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Debt</th>
                                </tr>
                                
                                ';


                                 do{


                                    $studentfullname = $selectstudentforsummarycntrow['StudentFirstName'].' '.$selectstudentforsummarycntrow['StudentLastName'];
                                    $studentID =   $selectstudentforsummarycntrow['StudentID'];



                                     //COMPULSORY FEE CONTENT HERE   
                                    $totaltransactionchargecompulsory = mysqli_query($link,"SELECT SUM(Amount) AS  chargeamountcomp FROM `chargestructure`
                                    WHERE CampusID='$campusID' AND ClassOrDepartmentID='$classID' AND Session='$session' AND (TermOrSemesterID= $term OR  $term IS NULL) AND `Status`='1'");
                                    $totaltransactioncntrowchargecompulsory =  mysqli_fetch_assoc($totaltransactionchargecompulsory);
                    
                                    $compulsorytotal = $totaltransactioncntrowchargecompulsory['chargeamountcomp'];

                                  
                                
                    
                                 
                                     
                                    $totaltransactiontotal = mysqli_query($link," SELECT SUM(`transactions`.`TransactionIn`) AS TransactionInamounttotal  FROM `transactions`
                                    INNER JOIN `chargestructure` ON `transactions`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID` AND
                                      `transactions`.`CategoryID` = `chargestructure`.`CategoryID` AND `transactions`.`SubcategoryID` = `chargestructure`.`SubcategoryID`
                                       AND `transactions`.`CampusID` = `chargestructure`.`CampusID` WHERE  `chargestructure`.`Status`='1' AND `transactions`.`InstitutionID`='$IntitutionID' AND `transactions`.`CampusID`='$campusID' AND `transactions`.ClassOrDepartmentID='$classID' AND `transactions`.`DeleteStatus`='0' 
                                      AND `transactions`.`Session`='$session' AND (`transactions`.`TermOrSemesterID`=$term OR $term IS NULL) AND `transactions`.StudentID='$studentID'");
                    
                                    $totaltransactiontotalcom =  mysqli_fetch_assoc($totaltransactiontotal);
                    
                                    $TransactionInamounttotalcom =  $totaltransactiontotalcom['TransactionInamounttotal'];
                                  
                                    
                                    if($TransactionInamounttotalcom >=  $compulsorytotal)
                                    {
                                        $totaldebtcomp = '0.00';
                                    }else
                                    {
                                        $totaldebtcomp =  number_format($compulsorytotal - $TransactionInamounttotalcom);
                                       
                                    }



                                    

                                  
                                    if ($TransactionInamounttotalcom   =='0' ||  $TransactionInamounttotalcom   == '' || $TransactionInamounttotalcom   == 'NULL') {

                                                $compulsorytotalpaid = '0.00';
                                    } else {
                                        $compulsorytotalpaid = number_format($TransactionInamounttotalcom);
                                    }



                                    if ($compulsorytotal   =='0' ||  $compulsorytotal   == '' ||  $compulsorytotal   == 'NULL') {

                                                $totalcomcharge = '0.00';
                                    } else {
                                        $totalcomcharge = number_format($compulsorytotal);
                                    }
                                     //COMPULSORY FEE CONTENT HERE   

                                   


                                      //OPTIONAL FEE CONTENT HERE   
                                    $totaltransactionchargeoptional = mysqli_query($link,"SELECT SUM(`chargestructure`.`Amount`) AS optionalcharge FROM `assignoptionalfees` INNER JOIN `chargestructure` ON  
                                    `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID`  WHERE `chargestructure`.`Status`='0' 
                                    AND `assignoptionalfees`.`CampusID`='$campusID' AND `assignoptionalfees`.`InstitutionID`='$IntitutionID'
                                    AND `assignoptionalfees`.`ClassOrDepartmentID`='$classID' AND `assignoptionalfees`.`Session`='$session'
                                     AND (`assignoptionalfees`.`TermOrSemesterID`=$term OR $term IS NULL) 
                                     AND `assignoptionalfees`.`Status`='0' AND `assignoptionalfees`.`StudentID`='$studentID'");
                                    $totaltransactioncntrowchargeoptional=  mysqli_fetch_assoc($totaltransactionchargeoptional);
                    
                                    $optionaltotal = $totaltransactioncntrowchargeoptional['optionalcharge'];
                    
                                
                                    if ($optionaltotal   =='0' ||   $optionaltotal   == '' ||   $optionaltotal   == 'NULL') {

                                                $totaloptionalcharge = '0.00';
                                    } else {
                                        $totaloptionalcharge = number_format($optionaltotal);
                                    }



                                               
                                    $totaltransactiontotal_optional = mysqli_query($link," SELECT SUM(`transactions`.`TransactionIn`) AS TransactionInamounttotaloptional  FROM `transactions`
                                    INNER JOIN `chargestructure` ON `transactions`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID` AND
                                      `transactions`.`CategoryID` = `chargestructure`.`CategoryID` AND `transactions`.`SubcategoryID` = `chargestructure`.`SubcategoryID`
                                       AND `transactions`.`CampusID` = `chargestructure`.`CampusID` WHERE  `chargestructure`.`Status`='0' AND `transactions`.`InstitutionID`='$IntitutionID' AND `transactions`.`CampusID`='$campusID' AND `transactions`.ClassOrDepartmentID='$classID' AND `transactions`.`DeleteStatus`='0' 
                                      AND `transactions`.`Session`='$session' AND (`transactions`.`TermOrSemesterID`=$term OR $term IS NULL) AND `transactions`.StudentID='$studentID'");
                    
                                    $totaltransactiontotal_optional =  mysqli_fetch_assoc($totaltransactiontotal_optional);
                    
                                    $TransactionInamounttotal_optional =  $totaltransactiontotal_optional['TransactionInamounttotaloptional'];


                                    
                                    if ($TransactionInamounttotal_optional   =='0' ||   $TransactionInamounttotal_optional   == '' ||   $TransactionInamounttotal_optional   == 'NULL') {

                                        $optionaltotalpaid = '0.00';
                                    } else {
                                        $optionaltotalpaid = number_format($TransactionInamounttotal_optional);
                                    }
                

                                    if($TransactionInamounttotal_optional >=   $optionaltotal)
                                    {
                                        $totaldebtoptional = 0;
                                    }else
                                    {
                                        $totaldebtoptional = $optionaltotal - $TransactionInamounttotal_optional; 
                                    }


                                    if ($totaldebtoptional   =='0' ||   $totaldebtoptional   == '' ||   $totaldebtoptional   == 'NULL') {

                                        $totaldebtoptionalgrand = '0.00';
                                    } else {
                                        $totaldebtoptionalgrand = number_format($totaldebtoptional);
                                    }
                                     //OPTIONAL FEE CONTENT HERE   


                                     //OVERALL PAID AND  DEBT HERE   
                                     $totaltransactioncontent = $TransactionInamounttotal_optional + $TransactionInamounttotalcom;
                                     $totalchargeall =  $optionaltotal  + $compulsorytotal;


                                     if($totaltransactioncontent >=  $totalchargeall)
                                     {
                                        $grandtotalover_alldebt = '0.00';
                                     }else
                                     {
                                        $grandtotalover_alldebt =   number_format($totalchargeall- $totaltransactioncontent);
                                     }

                                     if ($totaltransactioncontent   =='0' ||   $totaltransactioncontent   == '' ||    $totaltransactioncontent   == 'NULL') {

                                        $totaltransactioncontenttotal = '0.00';
                                    } else {
                                        $totaltransactioncontenttotal = number_format($totaltransactioncontent);
                                    }

                                   

                                    echo '<tr class="abba_item">
                                    <td>'.$num++.'</td>
                                    <td >'.$studentfullname.'</td>
                                    <td >₦'.$totaltransactioncontenttotal.'</td>
                                    <td >₦'.$grandtotalover_alldebt.'</td>
                                   
                                   

                                    <td >₦'.$totalcomcharge.'</td>
                                    <td >₦'.$compulsorytotalpaid.'</td>
                                    <td >₦'.$totaldebtcomp.'</td>
  
                                 
                                  
                                    <td >₦'.$totaloptionalcharge.'</td>
                                    <td >₦'.$optionaltotalpaid.'</td>
                                    <td >₦'.$totaldebtoptionalgrand.'</td>


                                   
                                </tr>';



                                 }while($selectstudentforsummarycntrow = mysqli_fetch_assoc($selectstudentforsummary));
                                 
                                 
                                 echo '</table>
                                 </tbody>
                                 </div>';

                    }else{
                        
                        
                        
                         echo '<div align="center" id="pros-loadnofield-selectedoptionalfee-content">';
                               

                                            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                                            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                            if ($pros_select_record_not_found_count > 0) {
                                            

                                                $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                                                echo '<img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                                                <p>No record found for this class.</p>';
                                            }

                               
                            echo '</div>';

                    }



                 
                    


?>