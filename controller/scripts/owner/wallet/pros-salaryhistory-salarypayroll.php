<?php




        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');

        $UserID = $_POST['UserID'];
        $UserType = $_POST['UserType'];



        $select_staffsalry = mysqli_query($link,"SELECT * FROM `wallettransactions` INNER JOIN `staff` ON `wallettransactions`.`UserID` = `staff`.`StaffID` INNER JOIN `institution` ON `staff`.`InstitutionID` = `institution`.`InstitutionID` 
        WHERE `Status`='1' AND `institution`.`AgencyOrSchoolOwnerID`='$UserID' AND `wallettransactions`.UserType IN ('admin','schoolhead','teacher') ORDER BY `wallettransactions`.WalletTransactionID DESC");


        $selectect_staffcnt = mysqli_num_rows($select_staffsalry);
        $selectect_staffcnt_row = mysqli_fetch_assoc($select_staffsalry);



        if($selectect_staffcnt > 0)
        {

            echo '<table class="table" >
            <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Penalty </th>
                    <th scope="col">Ref</th>
                    <th scope="col">Month</th>
                    </tr>
            </thead>
            <tbody>';



                do{

                         
                    $StaffID = $selectect_staffcnt_row['StaffID'];
                        
                    $StaffFirstName = $selectect_staffcnt_row['StaffFirstName'];
                    $StaffLastName = $selectect_staffcnt_row['StaffLastName'];
                    $StaffSalary = $selectect_staffcnt_row['StaffSalary'];
                    $SalaryStatus = $selectect_staffcnt_row['SalaryStatus'];
                    $WalletBank = $selectect_staffcnt_row['WalletBank'];
                    $WalletBalance = $selectect_staffcnt_row['WalletBalance'];
                    $WalletAccountName = $selectect_staffcnt_row['WalletAccountName'];
                    $WalletAccountNumber = $selectect_staffcnt_row['WalletAccountNumber'];
                    $WalletAccountReference = $selectect_staffcnt_row['WalletAccountReference'];

                    $InstitutionID = $selectect_staffcnt_row['InstitutionID'];
                  
                    $SalaryPaidDate = $selectect_staffcnt_row['SalaryPaidDate'];
                    $paymenamout = $selectect_staffcnt_row['Amount'];

              
                    $Reference = $selectect_staffcnt_row['Reference'];
                    $MonthPaid = $selectect_staffcnt_row['MonthPaid'];
                         


                        echo' <tr>
                                    
                                    <td>'.$StaffLastName.' '.$StaffFirstName.'</td>
                                    <td>₦'. $paymenamout.'</td>
                                    <td>₦</td>
                                    <td>'.$Reference.'</td>
                                    <td>'.$MonthPaid.'</td>
                                    
                            </tr>';


                    }while($selectect_staffcnt_row = mysqli_fetch_assoc($select_staffsalry));
                        
                        
                        
                    echo '</tbody>
                    </table>';

        }else{
              echo '<tr><td colspan=5 align="center"><i class="fas fa-exclamation-circle"></i> No Records Found.</td></tr>';

        }



                






    ?>