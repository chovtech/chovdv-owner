<?php



                    include('../../../config/config.php');

                    $campusID = $_POST['campusID'];
                    $IntitutionID = $_POST['abba_get_stored_institution_id'];
                    $session = $_POST['session'];
                    $term = $_POST['term'];
                    $categoryID = $_POST['categoryID'];
                    $classID = $_POST['classID'];
                    


                    $pros_load_category_summary = mysqli_query($link,"SELECT DISTINCT(`transactions`.`SubcategoryID`), `subcategory`.SubcategoryTitle FROM `transactions` INNER JOIN `subcategory`  ON `transactions`.`SubcategoryID` = `subcategory`.`SubcategoryID` WHERE
                     `transactions`.InstitutionID='$IntitutionID' AND `transactions`.CampusID='$campusID' AND `transactions`.CategoryID='$categoryID' AND `transactions`.`session`='$session' 
                     AND (`transactions`.TermOrSemesterID = $term  OR $term IS NULL) AND `transactions`.`DeleteStatus`='0' AND (`transactions`.ClassOrDepartmentID = $classID  OR $classID IS NULL)");

                  $pros_load_category_summary_cnt = mysqli_num_rows($pros_load_category_summary);
                  $pros_load_category_summary_cnt_row = mysqli_fetch_assoc($pros_load_category_summary);
                 

                  

                  

                  if( $pros_load_category_summary_cnt > 0)
                  {



                          echo '<div class="prosloadcategorysummarycontent">';
                                  $grandtotal = 0;
                                    do{


                                        $SubcategoryID = $pros_load_category_summary_cnt_row ['SubcategoryID'];
                                        $SubcategoryTitle = $pros_load_category_summary_cnt_row ['SubcategoryTitle'];

                                        $totalamounteach = 0;

                                        
                                                    
                                    echo '<br></br><div class="abba_table-box "  style="color: black;">
                                    <table cellpadding="0" cellspacing="0" style="margin-top: 10px;">
                                        <tbody>
                                            <tr class="abba_item" style="background-color: lightgrey;">
                                                <td colspan="5" style="font-size: larger;padding: 10px;font-weight: 600;">'.$SubcategoryTitle.'</td>
                                            </tr>

                                            <tr class="abba_heading">
                                                <td>DATE</td>
                                                <td>DEPOSITOR</td>
                                                <td>SESSION</td>
                                                <td>TERM</td>
                                                <td>AMOUNT</td>
                                            </tr>';
    
                                          

                                                    $pros_select_transaction_total = mysqli_query($link,"SELECT * FROM `transactions` 
                                                    WHERE `InstitutionID`='$IntitutionID' 
                                                    AND `CampusID`='$campusID' AND (`TermOrSemesterID`=$term OR $term IS NULL) AND `Session`='$session' AND `CategoryID`='$categoryID' AND `SubcategoryID`='$SubcategoryID'  AND (`transactions`.ClassOrDepartmentID = $classID  OR $classID IS NULL)");
                                                    $pros_select_transaction_total_cnt = mysqli_num_rows($pros_select_transaction_total);
                                                    $pros_select_transaction_total_cnt_row = mysqli_fetch_assoc($pros_select_transaction_total);

                                                    if( $pros_select_transaction_total_cnt > 0)
                                                    {

                                                            do{


                                                                $Date =  $pros_select_transaction_total_cnt_row['Date'];
                                                                $TermOrSemesterID =  $pros_select_transaction_total_cnt_row['TermOrSemesterID'];
                                                                $TransactionInnew =  $pros_select_transaction_total_cnt_row['TransactionIn'];
                                                                $StudentID =  $pros_select_transaction_total_cnt_row['StudentID'];



                                                                $select_termalias = mysqli_query($link,"SELECT * FROM `termalias` WHERE TermOrSemesterID='$TermOrSemesterID' AND CampusID='$campusID'");
                                                                $select_termalias_cnt = mysqli_num_rows($select_termalias);
                                                                $select_termalias_cntrows = mysqli_fetch_assoc($select_termalias);

                                                                if($select_termalias_cnt > 0)
                                                                {
                                                                        $TermAliasName =   $select_termalias_cntrows['TermAliasName'];
                                                                }else
                                                                {
                                                                    $TermAliasName ='NULL';
                                                                }

                                                                $select_student =  mysqli_query($link,"SELECT * FROM `student` WHERE CampusID='$campusID' AND StudentID='$StudentID'");
                                                                $select_student_cnt = mysqli_num_rows($select_student);
                                                                $select_student_cntrow =  mysqli_fetch_assoc($select_student);

                                                                if($select_student_cnt > 0)
                                                                {
                                                                  $studfullname = $select_student_cntrow['StudentLastName'] .' ' .$select_student_cntrow['StudentFirstName'];
                                                                }else
                                                                {
                                                                    $studfullname = 'NULL';
                                                                }




                                                        echo '<tr class="abba_item">
                                                                <td>'.$Date.'</td>
                                                                <td >'.$studfullname.'</td>
                                                                <td >'.$session.'</td>
                                                                <td >'.$TermAliasName.'</td>
                                                                <td >₦'.number_format($TransactionInnew) .'</td>
                                                            </tr>';

                                                            $totalamounteach+=$TransactionInnew;


                                                            }while($pros_select_transaction_total_cnt_row = mysqli_fetch_assoc($pros_select_transaction_total));
                                                              
                                                    }else
                                                    {

                                                    }





                                            echo '</table>
                                            </tbody>

                                                
                                            </div>


                                            <br><div class="row" align="right">
                                                  <div class="col-2"></div>
                                                    <div class="col-10" style="font-weight:bold;">
                                                      <span>Total: </span>₦'.number_format($totalamounteach).'
                                                    </div>
                                            </div>';
                                            
                                            
                                            
                                            $grandtotal+=$totalamounteach;

                                    }while($pros_load_category_summary_cnt_row = mysqli_fetch_assoc($pros_load_category_summary));


                            echo '<br><div class="row" align="right">
                                    <div class="col-3"></div>
                                    <div class="col-9" style="font-weight:bold;">
                                      <span>Grand Total: </span>₦ '.number_format($grandtotal).'
                                    </div>
                                      
                              </div>
                          </div>
                          ';




                  }else
                  {



                        $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                        $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                        $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                        if ($pros_select_record_not_found_count > 0) {
                        

                            $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                            echo '<center><img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                            <p>No record found.</p></center>';
                        }


                  }





    ?>