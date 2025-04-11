
<?php


        include('../../../config/config.php');
                    
        $campusID = $_POST['campusID'];
        $InstitutionID = $_POST['abba_get_stored_institution_id'];
        $session = $_POST['session'];
        $term = $_POST['term'];




        if($campusID != 'NULL')
        {



            $pros_get_cinstiutionrecordhere = mysqli_query($link, "SELECT * FROM `institution` 
            INNER JOIN `campus` ON `institution`.`InstitutionID` = `campus`.`InstitutionID`
             WHERE `institution`.`InstitutionID`='$InstitutionID' AND  `campus`.`CampusID`='$campusID'");
            $pros_get_cinstiutionrecordhere_row = mysqli_num_rows($pros_get_cinstiutionrecordhere);
            $pros_get_cinstiutionrecordhere_row_cnt = mysqli_fetch_assoc($pros_get_cinstiutionrecordhere);

            if($pros_get_cinstiutionrecordhere_row  > 0)
            {
                $fullschooolname =  $pros_get_cinstiutionrecordhere_row_cnt['InstitutionGeneralName'].' ('.$pros_get_cinstiutionrecordhere_row_cnt['CampusName'].')';
            }else
            {
                $fullschooolname =  '';
            }


        }else
        {


                $pros_get_cinstiutionrecordhere = mysqli_query($link, " SELECT * FROM `institution` WHERE InstitutionID='$InstitutionID'");
                $pros_get_cinstiutionrecordhere_row = mysqli_num_rows($pros_get_cinstiutionrecordhere);
                $pros_get_cinstiutionrecordhere_row_cnt = mysqli_fetch_assoc($pros_get_cinstiutionrecordhere);

                $fullschooolname =  $pros_get_cinstiutionrecordhere_row_cnt['InstitutionGeneralName'];

        

        }


    //     $totalCompFee = 0;
    //     $totalOptionalfeeFee = 0;


    //     $prosgetcompulsoryharge = mysqli_query($link,"SELECT * FROM `chargestructure` WHERE InstitutionID='$InstitutionID' AND (CampusID =$campusID OR  $campusID IS NULL) AND
    //      `Session`='$session' AND (`TermOrSemesterID`=$term OR  $term IS NULL) AND `Status`='1' AND CategoryID NOT IN(16,4)");

    //    $prosgetcompulsoryharge_cnt = mysqli_num_rows($prosgetcompulsoryharge);
    //    $prosgetcompulsoryharge_cnt_row = mysqli_fetch_assoc($prosgetcompulsoryharge);


    //    if($prosgetcompulsoryharge_cnt > 0)
    //    {
    //           do{



    //                $CategoryIDnew = $prosgetcompulsoryharge_cnt_row['CategoryID'];
    //              $SubcategoryIDnew = $prosgetcompulsoryharge_cnt_row['SubcategoryID'];
    //               $ClassOrDepartmentIDcomp = $prosgetcompulsoryharge_cnt_row['ClassOrDepartmentID'];
    //               $TermOrSemesterIDnew = $prosgetcompulsoryharge_cnt_row['TermOrSemesterID'];
    //               $CampusIDnew = $prosgetcompulsoryharge_cnt_row['CampusID'];




    //               $prosgetcompfeetotal_query = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionIncomfee FROM `transactions` WHERE `InstitutionID`='$InstitutionID' AND `CampusID`='$CampusIDnew' 
    //               AND `CategoryID`='$CategoryIDnew' AND `SubcategoryID`='$SubcategoryIDnew'
    //                 AND `ClassOrDepartmentID`='$ClassOrDepartmentIDcomp' AND `Session`='$session' AND `TermOrSemesterID`='$TermOrSemesterIDnew'");
    //                 $prosgetcompfeetotal_query_cnt = mysqli_num_rows($prosgetcompfeetotal_query);
    //                 $prosgetcompfeetotal_query_cnt_row = mysqli_fetch_assoc($prosgetcompfeetotal_query);


    //                 $prostotalcomfee = $prosgetcompfeetotal_query_cnt_row['TransactionIncomfee'];

    //                 $totalCompFee+=$prostotalcomfee ;

                           
    //           }while($prosgetcompulsoryharge_cnt_row = mysqli_fetch_assoc($prosgetcompulsoryharge));

    //    }else
    //    {

    //    }



    //    $prosgetcompulsoryharge_optional = mysqli_query($link,"SELECT * FROM `chargestructure` WHERE InstitutionID='$InstitutionID' AND (CampusID =$campusID OR  $campusID IS NULL) AND
    //    `Session`='$session' AND (`TermOrSemesterID`=$term OR  $term IS NULL) AND `Status`='0' AND CategoryID NOT IN(16,4)");

    //     $prosgetcompulsoryharge_cnt_optional = mysqli_num_rows($prosgetcompulsoryharge_optional);
    //     $prosgetcompulsoryharge_cnt_row_optional = mysqli_fetch_assoc($prosgetcompulsoryharge_optional);


    //     if( $prosgetcompulsoryharge_cnt_optional > 0)
    //     {
    //             do{



    //                     $CategoryIDnew_optional = $prosgetcompulsoryharge_cnt_row_optional['CategoryID'];
    //                     $SubcategoryIDnew_optional = $prosgetcompulsoryharge_cnt_row_optional['SubcategoryID'];
    //                     $ClassOrDepartmentIDcomp_optional = $prosgetcompulsoryharge_cnt_row_optional['ClassOrDepartmentID'];
    //                     $TermOrSemesterIDnew_optional = $prosgetcompulsoryharge_cnt_row_optional['TermOrSemesterID'];
    //                   $CampusIDnew_optional = $prosgetcompulsoryharge_cnt_row_optional['CampusID'];
   
   
   
   
    //                  $prosgetcompfeetotal_query_optional = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionIncomfee FROM `transactions` WHERE `InstitutionID`='$InstitutionID' AND `CampusID`='$CampusIDnew_optional' 
    //                  AND `CategoryID`='$CategoryIDnew_optional' AND `SubcategoryID`='$SubcategoryIDnew_optional'
    //                    AND `ClassOrDepartmentID`='$ClassOrDepartmentIDcomp_optional' AND `Session`='$session' AND `TermOrSemesterID`='$TermOrSemesterIDnew_optional'");
    //                    $prosgetcompfeetotal_query_cnt_optional = mysqli_num_rows($prosgetcompfeetotal_query_optional);
    //                    $prosgetcompfeetotal_query_cnt_row_optional = mysqli_fetch_assoc($prosgetcompfeetotal_query_optional);
   
   
    //                    $prostotalcomfee_optional = $prosgetcompfeetotal_query_cnt_row_optional['TransactionIncomfee'];
   
    //                    $totalOptionalfeeFee+=$prostotalcomfee_optional ;

    //             }while($prosgetcompulsoryharge_cnt_row_optional = mysqli_fetch_assoc($prosgetcompulsoryharge_optional));  
    //     }






    $totalCompFee = 0;
    $totalOptionalfeeFee = 0;

     $prosgecompulfee = mysqli_query($link, "SELECT * FROM `transactions` WHERE 
    `InstitutionID`='$InstitutionID' AND (`CampusID`= $campusID  OR  $campusID  IS NULL)
      AND (`TermOrSemesterID`=$term OR $term IS NULL) AND `Session`='$session' AND  `DeleteStatus`='0' AND CategoryID NOT IN(16,4,17,22,23,24)");
      $prosgecompulfeecnt = mysqli_num_rows($prosgecompulfee);
    


       $prosgeoptionalfee = mysqli_query($link, "SELECT * FROM `transactions` WHERE 
      `InstitutionID`='$InstitutionID' AND (`CampusID`= $campusID  OR  $campusID  IS NULL)
        AND (`TermOrSemesterID`=$term OR $term IS NULL) AND `Session`='$session' AND `DeleteStatus`='0' AND    CategoryID NOT IN(16,4,17,22,23,24)");
        $prosgeoptionalfeecnt = mysqli_num_rows($prosgeoptionalfee);
      
      
     
      if($prosgecompulfeecnt > 0)
      {
           while( $prosgecompulfeecntrow = mysqli_fetch_assoc ($prosgecompulfee))
           {

           
            $SubcategoryID =    $prosgecompulfeecntrow['SubcategoryID'];

            $chargeprofilecomp = mysqli_query($link,"SELECT * FROM `chargestructure` WHERE `InstitutionID`='$InstitutionID' AND (`CampusID`= $campusID  OR  $campusID  IS NULL)
            AND (`TermOrSemesterID`=$term OR $term IS NULL) AND `Session`='$session' AND SubcategoryID='$SubcategoryID' AND `Status`='1'");
                $chargeprofilecomprow = mysqli_num_rows($chargeprofilecomp);

                if($chargeprofilecomprow > 0)
                {
                    $TransactionInnew =    $prosgecompulfeecntrow['TransactionIn'];
                    $totalCompFee+=$TransactionInnew;

                }else{

                }
                

           
           }

          
             
      }else
      {

      }


      
      if($prosgeoptionalfeecnt > 0)
      {
           while( $prosgeoptionalfeecntrow = mysqli_fetch_assoc ($prosgeoptionalfee))
           {

           
            $SubcategoryID =    $prosgeoptionalfeecntrow['SubcategoryID'];

            $chargeprofilecompnew = mysqli_query($link,"SELECT * FROM `chargestructure` WHERE `InstitutionID`='$InstitutionID' AND (`CampusID`= $campusID  OR  $campusID  IS NULL)
            AND (`TermOrSemesterID`=$term OR $term IS NULL) AND `Session`='$session' AND SubcategoryID='$SubcategoryID' AND `Status`='0'");
                $chargeprofilecomprownew = mysqli_num_rows($chargeprofilecompnew);

                if($chargeprofilecomprownew > 0)
                {

                    $TransactionInnew =  $prosgeoptionalfeecntrow['TransactionIn'];
                   $totalOptionalfeeFee+=$TransactionInnew;

                }else{

                }
                

           
           }

          
             
      }else
      {

      }

        

        $select_goods_sold = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionInt FROM `transactions` WHERE InstitutionID='$InstitutionID' AND CategoryID IN(4,16) AND
        (CampusID=$campusID OR $campusID IS NULL) AND (TermOrSemesterID = $term OR $term IS NULL) AND `Session`='$session'");
         $select_goods_sold_cnt = mysqli_num_rows($select_goods_sold);
         $select_goods_sold_cnt_rows = mysqli_fetch_assoc($select_goods_sold);


         $TransactionInAmount_suply =  $select_goods_sold_cnt_rows['TransactionInt'];

         if($TransactionInAmount_suply == '')
         {

            $totalgoods_solds = '0.00';
         }else
         {
            $totalgoods_solds = number_format($TransactionInAmount_suply);
         }




            $select_expenditure1 = mysqli_query($link,"SELECT SUM(TransactionOut) AS TransactionOut FROM `transactions` WHERE InstitutionID='$InstitutionID' AND CategoryID ='17' AND
            (CampusID=$campusID OR $campusID IS NULL) AND (TermOrSemesterID = $term OR $term IS NULL) AND `Session`='$session'");
            $select_expenditure1_cnt = mysqli_num_rows($select_expenditure1);
            $select_expenditure1_cnt_rows = mysqli_fetch_assoc($select_expenditure1);


            
            $select_expenditure2 = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionInt FROM `transactions` WHERE InstitutionID='$InstitutionID' AND CategoryID ='22' AND
            (CampusID = $campusID OR $campusID IS NULL) AND (TermOrSemesterID=$term OR $term IS NULL) AND `Session`='$session'");
            $select_expenditure2_cnt = mysqli_num_rows($select_expenditure2);
            $select_expenditure2_cnt_rows = mysqli_fetch_assoc($select_expenditure2);


               
            $select_expenditure3 = mysqli_query($link,"SELECT SUM(TransactionIn) AS TransactionInt FROM `transactions` WHERE InstitutionID='$InstitutionID' AND CategoryID ='23' AND
            (CampusID = $campusID OR $campusID IS NULL) AND (TermOrSemesterID = $term OR $term IS NULL) AND `Session`='$session'");
            $select_expenditure3_cnt = mysqli_num_rows($select_expenditure3);
            $select_expenditure3_cnt_rows = mysqli_fetch_assoc($select_expenditure3);


                    
            $select_expenditure4 = mysqli_query($link,"SELECT SUM(TransactionOut) AS TransactionOut FROM `transactions` WHERE InstitutionID='$InstitutionID' AND CategoryID ='24' AND
            (CampusID= $campusID OR $campusID IS NULL) AND (TermOrSemesterID = $term OR $term IS NULL) AND `Session`='$session'");
            $select_expenditure4_cnt = mysqli_num_rows($select_expenditure4);
            $select_expenditure4_cnt_rows = mysqli_fetch_assoc($select_expenditure4);

            //pros get staff salary here
 
              $prosget_staff_ssalary = mysqli_query($link, "SELECT SUM(Amountpaid) AS staffsalary FROM `staffsalary` WHERE InstitutionID='$InstitutionID'");
              $prosget_staff_ssalary_cnt = mysqli_num_rows($prosget_staff_ssalary);
              $prosget_staff_ssalary_cnt_row = mysqli_fetch_assoc($prosget_staff_ssalary);


              $pros_assvalue = mysqli_query($link,"SELECT SUM(InitialValue) AS InitialValue FROM `assetitemlog` WHERE InstitutionID='$InstitutionID' AND  (CampusID = $campusID OR $campusID IS NULL)");

              $pros_assvalue_cnt = mysqli_num_rows($pros_assvalue);
              $pros_assvalue_cnt_row = mysqli_fetch_assoc($pros_assvalue);

             $InitialValueAmount_amount =  $pros_assvalue_cnt_row['InitialValue'];



             $pros_other_expensesamount = $select_expenditure1_cnt_rows['TransactionOut'];
             $pros_rentamount = $select_expenditure2_cnt_rows['TransactionOut'];
             $pros_utilitiesamount = $select_expenditure3_cnt_rows['TransactionInt'];
             $pros_maintainanceamount = $select_expenditure4_cnt_rows['TransactionOut'];
             $prosstaff_salary = $prosget_staff_ssalary_cnt_row ['staffsalary'];


              

           


             




                if($pros_rentamount == '')
                {
                    $pros_rentamountnew = '0.00';
                }else
                {
                    $pros_rentamountnew =  number_format($pros_rentamount);

                }

                if($pros_utilitiesamount == '')
                {
                    $pros_utilityamountnew = '0.00';
                }else
                {
                    $pros_utilityamountnew =  number_format($pros_utilitiesamount);

                }


                if($pros_maintainanceamount == '')
                {
                    $pros_maintainanceamountnew = '0.00';
                }else
                {
                    $pros_maintainanceamountnew =  number_format($pros_maintainanceamount);

                }


                if($pros_other_expensesamount == '')
                {

                    $pros_other_expensesamountnew = '0.00';

                }else
                {
                    $pros_other_expensesamountnew =  number_format($pros_other_expensesamount);

                }

        
        
                if($prosstaff_salary == '')
                {

                    $prosstaff_salarynew = '0.00';

                }else
                {
                    $prosstaff_salarynew = number_format($prosstaff_salary);

                }


                if($InitialValueAmount_amount == '')
                {
                                    
                    $InitialValueAmount_amountnew = '0.00';
                }else
                {

                    $InitialValueAmount_amountnew = number_format($InitialValueAmount_amount);

                }


                $prostotalnumberexpenses = number_format(intval($pros_other_expensesamount + $pros_rentamount + $pros_utilitiesamount + $pros_maintainanceamount + $prosstaff_salary));



    echo '
    <button type="button" style="background-color: #696969;" class="btn btn-sm text-white float-end m-2 rounded-3  prosprint-printcontent-profitlossbnt mb-2 tari_edit_setting"  style="font-size:11px; ">
        Print/Download <i class="fas fa-print" id="emma_edit_icon"></i>
       </button>
    
    <table class="table table-borderless " id="profitlossstatementcontent">

    <thead style="background-color:#007ffb;height:2px;">
        <tr>
        <th scope="col" class="text-light">'.$fullschooolname.'<br>Income Statement<br>(N)</th>
        
        <th scope="col" class="text-light"></th>
        </tr>
    </thead>
    <thead style="background-color:#007ffb;height:2px;">
        <tr>
        <th scope="col"></th>
        
        <th scope="col" class="text-light">SESSION</th>
        </tr>
    </thead>
    <tbody>';


   
    echo   '<tr>
       <th scope="row">Revenue</th>
       <td class="text-primary"></td>
     
       </tr>

       <tr >
       <td scope="row">Compulsory Fee</td>
       <td class="text-primary">₦'.number_format($totalCompFee).'</td>
     
       </tr>

       <tr >
       <td scope="row">Optional  Fee</td>
      
       <td class="text-primary">₦'.number_format($totalOptionalfeeFee).'</td>
       
       </tr>

       
      
       <tr style="border-top: 1px solid black;">
       <th >Total Revenue</th>
      
       <th>₦'.number_format($totalCompFee + $totalOptionalfeeFee).'</th>
       
       </tr>




       <tr>
       <td scope="row"></td>
       <td class="text-primary"></td>
       </tr>

       <!-- good sold here -->    
       
       <tr >
           <th scope="row">Cost of goods sold</th>
           <td class="text-primary"></td>
       </tr>


       <tr >
       <td scope="row">Cost of goods</td>
       <td class="text-primary">₦'.$totalgoods_solds.'</td>
       </tr>

    

       <tr style="border-top: 1px solid black;">
        <th >Total Cost of goods sold</th>
        
        <th>₦'.$totalgoods_solds.'</th>
        
       </tr>



       
       <tr>
       <td scope="row"></td>
       <td class="text-primary"></td>
       </tr>

       <!-- Gross profit here -->

       <tr >
           <td scope="row"></td>
           <td class="text-primary"></td>
       </tr>


       <tr style="border-top: 1px solid black;">
           <th >Gross Profit</th>
       
           <th>₦'.number_format($totalCompFee + $totalOptionalfeeFee + intval($totalgoods_solds )).'</th>
       
       </tr>

        

       <tr>
       <td scope="row"></td>
       <td class="text-primary"></td>
       </tr>

       <tr >
       <th scope="row">Expenses</th>
       <td class="text-primary"></td>
     
       </tr>

       <tr>
       <td scope="row">Rent</td>
          <td class="text-primary">₦'.$pros_rentamountnew.' </td>
       </tr>

       <tr>
       <td scope="row">Utilities</td>
       <td class="text-primary">₦'.$pros_utilityamountnew.' </td>
       </tr>
       

       <tr>
       <td scope="row">Repairs & Maintenance </td>
      
       <td class="text-primary">₦'.$pros_maintainanceamountnew.'</td>
      
       </tr>


       <tr>
       <td scope="row">Other Operating Expenses </td>
      
       <td class="text-primary">₦'.$pros_other_expensesamountnew .'</td>
      
       </tr>

       <tr>
        <td scope="row">Salaries</td>
        <td class="text-primary">₦'.$prosstaff_salarynew.'</td>
       </tr>

       
       <tr>
            <td scope="row">Depreciation  </td>
            <td class="text-primary">₦'.$InitialValueAmount_amountnew.'</td>
       </tr>


      
       <tr style="border-top: 1px solid black;">
       <th >Total Expenses</th>
      
       <th>₦';
       
             if(number_format($pros_other_expensesamount + $pros_rentamount + $pros_utilitiesamount + $pros_maintainanceamount + $prosstaff_salary) == '0')
             {
                    echo '0.00';
             }else
             {
               echo number_format($pros_other_expensesamount + $pros_rentamount + $pros_utilitiesamount + $pros_maintainanceamount + $prosstaff_salary);
             }
       echo '</th>
       
       </tr>

      

       <tr>
       <th scope="row"></th>
       <td class="text-primary"></td>
     
       </tr>


       <tr >
       <th scope="row">Net Income</th>
       <td class="text-primary"></td>
     
       </tr>



       <tr style="border-top: 1px solid black;">
       <th >Net Income(Profit)</th>
      
       <th>₦'.number_format( $totalCompFee + $totalOptionalfeeFee + intval($totalgoods_solds ) - $pros_other_expensesamount + $pros_rentamount + $pros_utilitiesamount + $pros_maintainanceamount + $prosstaff_salary).'</th>
       
       </tr>

   </tbody>
</table>';

?>





