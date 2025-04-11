<?php

           include('../../../config/config.php');
            
             $studentID = $_POST['studentID'];
             $classID = $_POST['classID'];
             $sessionID = $_POST['sessionID'];
             $term = $_POST['term'];
             $institutionID = $_POST['institutionID'];
             $CampusID = $_POST['CampusID'];



             $prosgetcurrenttermhere = mysqli_query($link,"SELECT * FROM `termorsemester` WHERE status='1'");
             $prosgetcurrenttermhere_cnt = mysqli_num_rows($prosgetcurrenttermhere);
             $prosgetcurrenttermhere_cnt_row = mysqli_fetch_assoc($prosgetcurrenttermhere);

             $TermOrSemesterID = $prosgetcurrenttermhere_cnt_row['TermOrSemesterID'];

             if($term == 'NULL')
             {
                        $prosterm = $TermOrSemesterID;
             }else
             {
                         $prosterm = $term;
             }


             $pros_gettermname = mysqli_query($link,"SELECT * FROM `termalias` WHERE 
             `CampusID`='$CampusID' AND TermOrSemesterID='$prosterm'");
             $pros_gettermname_cnt = mysqli_num_rows($pros_gettermname);
             $pros_gettermname_rows = mysqli_fetch_assoc($pros_gettermname);

             if($pros_gettermname_cnt > 0)
             {

                $TermAliasName = $pros_gettermname_rows['TermAliasName'];

             }else
             {
                $TermAliasName = '';
             }
             



             

            $pros_select_campus_info = mysqli_query($link,"SELECT * FROM `campus` INNER JOIN `institution` ON `campus`.`InstitutionID` = `institution`.`InstitutionID`
            WHERE  `campus`.`CampusID`='$CampusID' AND  `campus`.`InstitutionID`='$institutionID'");
            $pros_select_campus_info_row = mysqli_num_rows($pros_select_campus_info);
            $pros_select_campus_info_row_info = mysqli_fetch_assoc($pros_select_campus_info);


           $CampusName = $pros_select_campus_info_row_info['CampusName'];
           $InstitutionGeneralName = $pros_select_campus_info_row_info['InstitutionGeneralName'];
           $InstitutionMotto = $pros_select_campus_info_row_info['InstitutionMotto'];


           $select_student = mysqli_query($link,"SELECT * FROM `student` WHERE StudentID='$studentID' AND CampusID='$CampusID'");
            $select_student_cnt_row = mysqli_num_rows($select_student);
           $select_student_cnt_row_data = mysqli_fetch_assoc($select_student);

          $studentfullname =  $select_student_cnt_row_data['StudentFirstName'].' '.$select_student_cnt_row_data['StudentLastName'];

          


            echo '<div class="row g-2 pt-5">
             <div class="col-md-2 col-lg-2">
                 <div align="center">
                     <img src="../../assets/images/icon.png" width="100"
                         style="margin-top: -10px;" alt="">
                 </div>
             </div>
             <div class="col-md-8 col-lg-8">
                 <h5 align="center"
                     style="Times, serif;">
                     '.$InstitutionGeneralName.'('. $CampusName.')
                 </h5>
                 <p class="chi_SchMoto" align="center">
                     <strong>Motto:</strong> '.$InstitutionMotto .'
                     <br>
                     
                 </p>
             </div>
             <div class="col-md-2 col-lg-2">
                 <div align="center">
                     <img src="../../assets/images/child1.jpg" width="80"
                         style="border-radius: 10px; margin-top: 0px;" alt="">
                 </div>
             </div>
         </div>
         <div class="row g-2 pt-4">
             <div class="col-md-2 col-lg-2">

             </div>
             <div class="col-md-8 col-lg-8">
                 <h5 class="chi_SchName" align="center"
                     style="font-weight: 600; font-size: 19px;">
                     School Fees Bill For '.$studentfullname.',
                     <br>
                    '.$TermAliasName.' Term '.$sessionID.' Session
                 </h5>

             </div>
             <div class="col-md-2 col-lg-2">

             </div>
         </div>

         <div style="margin-top: 50px; padding: 0px 10px 10px 10px;">
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th scope="col">Items</th>
                         <th scope="col">Cost</th>
                         <th scope="col">Discount</th>
                         <th scope="col">Scholarship</th>
                         <th scope="col">Total Payable</th>
                     </tr>
                 </thead>
                 <tbody style="color: #707070;">';

                

                   $prosgetstudentoptionalfee = mysqli_query($link,"SELECT * FROM `chargestructure` INNER JOIN `subcategory` ON `chargestructure`.`SubcategoryID` = `subcategory`.`SubcategoryID` WHERE `chargestructure`.`CampusID`='$CampusID'
                    AND `chargestructure`.`InstitutionID`='$institutionID' AND `chargestructure`.`Session`='$sessionID'
                    AND `chargestructure`.`ClassOrDepartmentID`='$classID'  AND `chargestructure`.`TermOrSemesterID`='$prosterm' AND `chargestructure`.`Status`='1'");

                   $prosgetstudentoptionalfee_cnt_row = mysqli_num_rows($prosgetstudentoptionalfee);
                   
                   
                   
                //   $transportcompusoryfee = mysqli_query($link,"SELECT * FROM `chargestructure`
                //   INNER JOIN `transportationtable` ON `chargestructure`.`SubcategoryID` = `transportationtable`.`RouteID` WHERE `chargestructure`.`Status`='1'
                //   AND `chargestructure`.`TermOrSemesterID`='$prosterm'  
                //   AND `chargestructure`.`Session`='$sessionID' AND `transportationtable`.`InstitutionID`='$institutionID' AND `chargestructure`.`ClassOrDepartmentID`='$classID'");
                   




                   if($prosgetstudentoptionalfee_cnt_row > 0)
                   {


                            while($prosgetstudentoptionalfee_cnt_row_assoc = mysqli_fetch_assoc($prosgetstudentoptionalfee))
                            {

                               $Session = $prosgetstudentoptionalfee_cnt_row_assoc['Session'];
                               $Amount = $prosgetstudentoptionalfee_cnt_row_assoc['Amount'];
                               $SubcategoryTitle = $prosgetstudentoptionalfee_cnt_row_assoc['SubcategoryTitle'];
                               


                                    echo '<tr>
                                        <th style="font-weight: 400;">'.$SubcategoryTitle.'</th>
                                        <td>₦ '.number_format($Amount).'</td>
                                        <td>₦0</td>
                                        <td>₦0</td>
                                        <td>₦ '.number_format($Amount).'</td>
                                    </tr>';


                            }

                   }else
                   {

                   }

                        $select_optional = mysqli_query($link,"SELECT * FROM `assignoptionalfees` INNER JOIN `chargestructure` ON 
                        `assignoptionalfees`.`CategoryID` = `chargestructure`.`CategoryID` AND
                         `assignoptionalfees`.`SubcategoryID` = `chargestructure`.`SubcategoryID` AND
                          `assignoptionalfees`.`CampusID` = `chargestructure`.`CampusID` INNER JOIN `subcategory` ON 
                          `assignoptionalfees`.`SubcategoryID` = `subcategory`.`SubcategoryID` WHERE `assignoptionalfees`.`CampusID`='$CampusID' 
                          AND `assignoptionalfees`.`ClassOrDepartmentID`='$classID' AND `assignoptionalfees`.`StudentID`='$studentID' 
                          AND `assignoptionalfees`.`Session`='$sessionID'
                         AND `assignoptionalfees`.`TermOrSemesterID`='$prosterm' AND `chargestructure`.`Status`='0'");

                        $select_optional_cnt = mysqli_num_rows($select_optional);
                       

                        if($select_optional_cnt > 0)
                        {

                                  while($select_optional_cnt_row = mysqli_fetch_assoc($select_optional)){

                                    $Amountoptional = $select_optional_cnt_row['Amount'];
                                    $SubcategoryTitleoptional = $select_optional_cnt_row['SubcategoryTitle'];


                                        echo '<tr>
                                            <th style="font-weight: 400;">Test Books</th>
                                            <td>₦ '.number_format($SubcategoryTitleoptional).'</td>
                                            <td>₦0</td>
                                            <td>₦0</td>
                                            <td>₦ '.number_format($SubcategoryTitleoptional).'</td>
                                        </tr>';
                                   


                                  }
                        }else
                        {

                        }


                             $prosselectstudentwallet =  mysqli_query($link,"SELECT * FROM `student`
                             WHERE CampusID='$CampusID' AND StudentID='$studentID'");
                             $prosselectstudentwallet_cnt = mysqli_num_rows($prosselectstudentwallet);
                             $prosselectstudentwallet_cnt_row = mysqli_fetch_assoc($prosselectstudentwallet);


                             $WalletBank = $prosselectstudentwallet_cnt_row['WalletBank'];
                             $WalletAccountName = $prosselectstudentwallet_cnt_row['WalletAccountName'];
                             $WalletAccountNumber = $prosselectstudentwallet_cnt_row['WalletAccountNumber'];

                  
                    
                 echo '</tbody>
             </table>
             

             <div class="row">
                 <div class="col-10">
                     Note:
                     <br>
                     No Cash Payment...
                     <br>
                     <strong>Bank Name -'.$WalletBank.'</strong>
                     <br>
                     <strong> Acc Name -'.$WalletAccountName.'</strong>
                     <br>
                     <strong> Acc No -'.$WalletAccountNumber.' </strong>
                    
                 </div>
                 <div class="col-2"></div>
             </div>
         </div>';



        //  <br>
        //  <strong> Bank Name -Union bank</strong>
        //  <br>
        //  <strong> Acc Name -Oaks international School</strong>
        //  <br>
        //  <strong> Acc No -1234567891</strong>

      
?>