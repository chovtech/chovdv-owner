<?php
include('../../../config/config.php');

$campusID = $_POST['campusID'];
$IntitutionID = $_POST['abba_get_stored_institution_id'];
$session = $_POST['session'];
$term = $_POST['term'];



$selectcomppusinfo = mysqli_query($link, "SELECT * FROM `institution` INNER JOIN `campus`
   ON `institution`.`InstitutionID` = `campus`.`InstitutionID` WHERE
   `institution`.`InstitutionID`='$IntitutionID' AND (`campus`.`CampusID`= $campusID OR $campusID IS NULL) ORDER BY `campus`.CampusName ASC");
$selectcomppusinfocnt = mysqli_num_rows($selectcomppusinfo);

if ($selectcomppusinfocnt > 0) {
    // Output the Print/Download button
    echo '<button type="button" style="background-color: #696969;" class="btn btn-sm text-white float-end m-2 rounded-3  mb-2 Prosprintschoolproceedcontentinfo-bnt" style="font-size:11px; ">
            Print/Download <i class="fas fa-print" ></i>
          </button>';

    while ($selectcomppusinforow = mysqli_fetch_assoc($selectcomppusinfo)) {
        $num = 1;
        $InstitutionGeneralName =  $selectcomppusinforow['InstitutionGeneralName'];
        $CampusName =  $selectcomppusinforow['CampusName'];
        $CampusIDneew =  $selectcomppusinforow['CampusID'];

        echo '<table class="table " id="prosloadschoolproceedcontent">
                <thead style="background-color:#007ffb;height:2px;">
                    <tr>
                        <th scope="col" class="text-light" style="border:none;" colspan="4">'. $InstitutionGeneralName.'('.$CampusName.') > '.$session.' </th>
                        <th scope="col" class="text-light" style="border:none;"></th>
                        <th scope="col" class="text-light" style="border:none;"></th>
                        <th scope="col" class="text-light" style="border:none;"></th>
                        <th scope="col" class="text-light" style="border:none;"></th>
                        <th scope="col" class="text-light" style="border:none;" colspan="5"></th>
                        <th scope="col" class="text-light" style="border:none;" colspan="5"></th>
                    </tr>
                    <tr style="border:none;">
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <thead style="height:2px;">
                    <tr style="background-color:#007ffb;">
                        <th scope="col" class="text-light">S/N</th>
                        <th scope="col" class="text-light">Class</th>
                        <th scope="col" class="text-light">Overall Paid</th>
                        <th scope="col" class="text-light">Overall Debt</th>
                        <th scope="col" class="text-light" colspan="5">Compulsory</th>
                        <th scope="col" class="text-light" colspan="5">Optional</th>
                        <th scope="col" class="text-light">Action</th>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Total</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Debt</th>
                        <th scope="col"></th>

                        <th scope="col">Total</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Debt</th>

                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>';

        $selectclass = mysqli_query($link, "SELECT * FROM `classordepartment` WHERE CampusID='$CampusIDneew' ORDER BY ClassOrDepartmentName ASC");
        $selectclasscnt = mysqli_num_rows($selectclass);
        $selectclassrow = mysqli_fetch_assoc($selectclass);

        if ($selectclasscnt > 0) {
            do {
                $ClassOrDepartmentID = $selectclassrow['ClassOrDepartmentID'];
                $totalcomtraction = 0;
             


               

                $grtotalstudentcont = mysqli_query($link,"SELECT * FROM `classordepartmentstudentallocation` WHERE
                 CampusID='$CampusIDneew' AND ClassOrDepartmentID='$ClassOrDepartmentID' AND `session`='$session'");
                   $grtotalstudentcontrow = mysqli_num_rows($grtotalstudentcont);
                

                $totaltransactionchargecompulsory = mysqli_query($link,"SELECT SUM(Amount) AS  chargeamountcomp FROM `chargestructure`
                WHERE CampusID='$CampusIDneew' AND ClassOrDepartmentID='$ClassOrDepartmentID' AND Session='$session' AND (TermOrSemesterID= $term OR  $term IS NULL) AND `Status`='1'");
                $totaltransactioncntrowchargecompulsory =  mysqli_fetch_assoc($totaltransactionchargecompulsory);

                $compulsorytotal = $totaltransactioncntrowchargecompulsory['chargeamountcomp'];

                $totalcomchargegoten =  $grtotalstudentcontrow *  $compulsorytotal;

               
                 
                $totaltransactiontotal = mysqli_query($link," SELECT SUM(`transactions`.`TransactionIn`) AS TransactionInamounttotal  FROM `transactions`
                INNER JOIN `chargestructure` ON `transactions`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID` AND
                  `transactions`.`CategoryID` = `chargestructure`.`CategoryID` AND `transactions`.`SubcategoryID` = `chargestructure`.`SubcategoryID`
                   AND `transactions`.`CampusID` = `chargestructure`.`CampusID` WHERE  `chargestructure`.`Status`='1' AND `transactions`.`InstitutionID`='$IntitutionID' AND `transactions`.`CampusID`='$CampusIDneew' AND `transactions`.ClassOrDepartmentID='$ClassOrDepartmentID' AND `transactions`.`DeleteStatus`='0' 
                  AND `transactions`.`Session`='$session' AND (`transactions`.`TermOrSemesterID`=$term OR $term IS NULL)");

                $totaltransactiontotal =  mysqli_fetch_assoc($totaltransactiontotal);

                $TransactionInamounttotalcom =  $totaltransactiontotal ['TransactionInamounttotal'];


                if($TransactionInamounttotalcom >=  $totalcomchargegoten)
                {
                      $totlacompdebt  = '0.00';

                }else
                {
                       $totlacompdebt  = $totalcomchargegoten - $TransactionInamounttotalcom ;
                }

                
               
                if ($compulsorytotal =='0') {

                     $compulsorytotalgrand = '0.00';

                } else {
                      $compulsorytotalgrand = number_format($totalcomchargegoten);
                }


              if ($TransactionInamounttotalcom   =='0') {

                        $totaltransactiontotalgrandcomp = '0.00';
              } else {
                        $totaltransactiontotalgrandcomp = number_format($TransactionInamounttotalcom );
              }


              
              if ($totlacompdebt   =='0') {

                $totaldebtgrandall = '0.00';
              } else {
                $totaldebtgrandall = number_format($totlacompdebt);
              }

            


              //optional fee content here 



              $totaltransactiontotaloptional = mysqli_query($link," SELECT SUM(`transactions`.`TransactionIn`) AS TransactionInamounttotal  FROM `transactions`
              INNER JOIN `chargestructure` ON `transactions`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID` AND
                `transactions`.`CategoryID` = `chargestructure`.`CategoryID` AND `transactions`.`SubcategoryID` = `chargestructure`.`SubcategoryID`
                 AND `transactions`.`CampusID` = `chargestructure`.`CampusID` WHERE  `chargestructure`.`Status`='0' AND `transactions`.`InstitutionID`='$IntitutionID' AND `transactions`.`CampusID`='$CampusIDneew' AND `transactions`.ClassOrDepartmentID='$ClassOrDepartmentID' AND `transactions`.`DeleteStatus`='0' 
                AND `transactions`.`Session`='$session' AND (`transactions`.`TermOrSemesterID`=$term OR $term IS NULL)");

              $totaltransactiontotaloptional =  mysqli_fetch_assoc($totaltransactiontotaloptional);

              $TransactionInamounttotaloptional =  $totaltransactiontotaloptional['TransactionInamounttotal'];

           

              if ($TransactionInamounttotaloptional   =='0' || $TransactionInamounttotaloptional   == '' || $TransactionInamounttotaloptional   == 'NULL') {

                        $totaltransactiontotalgrandoptional = '0.00';
              } else {
                        $totaltransactiontotalgrandoptional = number_format($TransactionInamounttotaloptional);
              }


              $optionalcharge = mysqli_query($link, "SELECT SUM(`chargestructure`.`Amount`) AS optionalcharge FROM `assignoptionalfees` INNER JOIN `chargestructure` ON  
              `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID`  WHERE `chargestructure`.`Status`='0' 
              AND `assignoptionalfees`.`CampusID`='$CampusIDneew' AND `assignoptionalfees`.`InstitutionID`='$IntitutionID'
              AND `assignoptionalfees`.`ClassOrDepartmentID`='$ClassOrDepartmentID'   AND `assignoptionalfees`.`Session`='$session'
               AND (`assignoptionalfees`.`TermOrSemesterID`=$term OR $term IS NULL) 
               AND `assignoptionalfees`.`Status`='0'");

              $optionalchargerow =  mysqli_fetch_assoc($optionalcharge);



                $optionalchargetotal =   $optionalchargerow['optionalcharge'];

               


                if($TransactionInamounttotaloptional >= $optionalchargetotal)
                {
                   $totaldebtionoptional = '0.00';
                }else
                {
                    $totaldebtionoptional =  $optionalchargetotal -  $TransactionInamounttotaloptional;
                }

                if($totaldebtionoptional == '0' ||  $totaldebtionoptional == '' ||  $totaldebtionoptional == 'NULL')
                {
                  $totaldebtionoptionalgrand =  '0.00';
                }else
                {
                  $totaldebtionoptionalgrand =  number_format($totaldebtionoptional);
                }
             


                if ($optionalchargetotal   == '0' || $optionalchargetotal   == '' || $optionalchargetotal   == 'NULL' ) {

                  $optionalchargetotalfee = '0.00';
                } else {
                    $optionalchargetotalfee  = number_format($optionalchargetotal);
                }



                        $prosloadgrandtotalaalfor  =   $TransactionInamounttotalcom  +  $TransactionInamounttotaloptional;

                        if($prosloadgrandtotalaalfor == '0' ||  $prosloadgrandtotalaalfor == 'NULL' ||  $prosloadgrandtotalaalfor == '')
                        {
                          $prosloadgrandtotalaalforall = '0.00';

                        }else
                        {
                            $prosloadgrandtotalaalforall = number_format($prosloadgrandtotalaalfor);
 
                        }



                       $grandtotalalldebtcontentall =   $totaldebtionoptional +  $totlacompdebt;

                      

                      if($grandtotalalldebtcontentall == '0' || $grandtotalalldebtcontentall == 'NULL'  || $grandtotalalldebtcontentall == '')
                      {

                             $grandtotalalldebtcontentalltotal = '0.00';
                      }else
                      {
                             $grandtotalalldebtcontentalltotal = number_format($grandtotalalldebtcontentall);
                      }


                echo   '<tr>
                            <td>'. $num++.'</td>
                            <td>'.$selectclassrow['ClassOrDepartmentName'].'</td>
                            <td class="text-primary">₦'.$prosloadgrandtotalaalforall.'</td>
                            <td class="text-primary">₦'.$grandtotalalldebtcontentalltotal.'</td>
                            <td class="text-primary"></td>
                            <td class="text-primary"></td>
                            <td class="text-primary">₦'.$compulsorytotalgrand.'</td>
                            <td class="text-primary">₦'.$totaltransactiontotalgrandcomp.'</td>
                            <td class="text-primary">₦'.$totaldebtgrandall.'</td>
                            <td class="text-primary"></td>
                            <td class="text-primary">₦'.$optionalchargetotalfee.'</td>
                            <td class="text-primary">₦'.$totaltransactiontotalgrandoptional.'</td>
                            <td class="text-primary">₦'.$totaldebtionoptionalgrand.'</td>

                              
                            <td class="text-primary"></td>
                            <td class="text-primary">
                                <button type="button" class="btn btn-sm text-white  m-2 rounded-3 btn-primary mb-2 prosloadschoolproceedbtnviewetails" 
                                       data-bs-toggle="modal" data-bs-target="#prosloadmodalforschoolproced" style="font-size:11px;" 
                                       data-camp="'.$CampusIDneew.'" data-class="'.$ClassOrDepartmentID.'" data-inst="'.$IntitutionID.'" data-term="'.$term .'" data-session="'.$session.'">
                                       <i class="fas fa-eye" ></i>
                                </button>

                            </td>

                          
                           
                        </tr>';

            } while ($selectclassrow = mysqli_fetch_assoc($selectclass));
        }else
        {

                $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                if ($pros_select_record_not_found_count > 0) {
                

                    $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                    echo '<tr><td colspan="12"><center><img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                    <p>No record found for this campus.</p></center></td></tr>';
                }
        }

        echo '</tbody>
            </table><br>';
    }
} else {
    // Handle case when no data is found
}
?>
