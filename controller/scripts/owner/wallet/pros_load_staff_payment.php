
<?php
        error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../../config/config.php');

    $UserID = $_POST['user_id'];
    $UserType = $_POST['user_type'];
    $dateforsalrypaid = $_POST['dateforsalrypaid'];

    $prostag_data = $_POST['prostag_data'];

   

    



    if($prostag_data  == 'datapay')
    {

                                $selectect_staff = mysqli_query($link,"SELECT * FROM `staff` INNER JOIN `institution` ON `staff`.`InstitutionID` = `institution`.`InstitutionID` WHERE 
                                `institution`.`AgencyOrSchoolOwnerID`='$UserID' AND `staff`.`StaffTrashStatus`='0' ORDER BY `staff`.`StaffFirstName` ASC ");
                        
                                $selectect_staffcnt = mysqli_num_rows($selectect_staff);
                                $selectect_staffcnt_row = mysqli_fetch_assoc($selectect_staff);
                        
                                if($selectect_staffcnt > 0)
                                {
                        
                        
                        
                                        $select_ownerwalletamount = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$UserID'   ");
                                        $select_ownerwalletamount_row = mysqli_num_rows($select_ownerwalletamount);
                                        $select_ownerwalletamount_row_cnt = mysqli_fetch_assoc($select_ownerwalletamount);
                        
                                        $wallet_balanceamount =  $select_ownerwalletamount_row_cnt['WalletBalance'];
                        
                        
                                        echo '<input type="hidden" class="prosgetwallet_amount_school" value="'.$wallet_balanceamount.'">';
                        
                                echo '<table class="table" >
                                <thead style="border:none;">
                                        <tr>
                                        <th scope="col">
                                                <input class="form-check-input prosselectallcheckedall" type="checkbox" value="" >
                                                <label class="form-check-label" for="flexCheckDefault">All</label>
                                        </th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Penalty </th>
                                        <th scope="col">Status </th>
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
                                                        $SalaryStatus = $selectect_staffcnt_row['SalaryStatus'];
                        
                                                        $SalaryPaidDate = $selectect_staffcnt_row['SalaryPaidDate'];
                        
                        
                                                        
                        
                                                        if($SalaryPaidDate == $dateforsalrypaid )  
                                                        {
                        
                        
                                                                                $color = '#009751';
                                                                                $background = "#bdffe0";
                                                                                $border = "#01df77";
                                                                                $title = "Paid";
                                                                                $disabledchecked = 'disabled';
                                                                                $disablecolor = 'gray';
                                                                                $classname = '';
                        
                        
                                                        }else
                                                        {
                        
                        
                        
                                                                        if($SalaryStatus  == '1')
                                                                        {
                        
                        
                                                                                $color = '#ff0000';
                                                                                $background = "#ffbdbd";
                                                                                $border = "#f74141";
                                                                                $title = "Withheld";
                                                                                $disabledchecked = 'disabled';
                                                                                $disablecolor = 'gray';
                                                                                $classname = '';
                        
                        
                                                                                
                                                                        }else
                                                                        {
                        
                        
                                                                                $color = '#f78a41';
                                                                                $background = "#fff3bd";
                                                                                $border = "#f78a41"; 
                                                                                $title = "Pending";
                                                                                $disabledchecked = '';
                                                                                $disablecolor = '';
                                                                                $classname = 'proscheckedainputnamesalaryeach';
                        
                        
                        
                                                                        }
                        
                                                        }
                        
                        
                                                
                                                        
                        
                                                        $select_deciplinary = mysqli_query($link, "SELECT SUM(DisciplinaryAmount) AS DisciplinaryAmount FROM `staffdisciplinarylist` WHERE  InstitutionID='$InstitutionID' AND `StaffID`='$StaffID' AND DisciplinaryStatus=''");
                                                        $select_deciplinarycnt = mysqli_num_rows($select_deciplinary);
                                                        $select_deciplinarycnt_row = mysqli_fetch_assoc($select_deciplinary);
                        
                        
                        
                                                                if( $select_deciplinarycnt > 0)
                                                                {
                        
                        
                                                                        $DisciplinaryAmount =  $select_deciplinarycnt_row['DisciplinaryAmount'];
                        
                        
                                                                        if($StaffSalary  == '0')
                                                                        {
                                                                                $staff_fullamount = '0.00';
                                                                        }else
                                                                        {
                                                                                $staff_fullamount =  number_format($StaffSalary -  $DisciplinaryAmount);
                                                                        }
                                                                
                        
                        
                                                                        $fulllfeecontentamount =  $StaffSalary -  $DisciplinaryAmount;


                                                                        if($DisciplinaryAmount == 'null' || $DisciplinaryAmount == '' || $DisciplinaryAmount == '0')
                                                                        {
                                                                                $DisciplinaryAmount_two =  '0.00';
                                                                        }else{
                                                                                $DisciplinaryAmount_two =  number_format($DisciplinaryAmount);
                                                                        }
                        
                                                                       
                        
                        
                                                                }else
                                                                {
                                                                        if($StaffSalary  == '0')
                                                                        {
                                                                                $staff_fullamount = '0.00';
                                                                        }else
                                                                        {
                                                                                $staff_fullamount = number_format($StaffSalary);
                                                                        }
                        
                                                                        
                                                                        $fulllfeecontentamount =  $StaffSalary;
                        
                        
                        
                                                                        $DisciplinaryAmount_two  = '0.00';
                        
                                                                }
                        
                        
                        
                        
                                                                
                        
                                                        
                                                        
                        
                                                        echo' <tr>
                                                                <td><input '.$disabledchecked.'  style="background:'.$disablecolor.';" class="form-check-input '.$classname.'" type="checkbox" data-staffid="'.$StaffID.'" value="'.$WalletBank .'" data-inst="'.$InstitutionID.'" data-amount="'.$fulllfeecontentamount.'" data-accname="'.$WalletAccountName.'" data-accnum="'.$WalletAccountName.'" data-ref="'.$WalletAccountReference.'"></td>
                                                                <td>'.$StaffFirstName.' '.$StaffLastName.'</td>
                                                                <td>₦'.$staff_fullamount.'</td>
                                                                <td>₦'.$DisciplinaryAmount_two.'</td>
                                                                <td><span class="prossalystsuscont" style="color:'.$color.';background:'.$background.';border:'.$border.';">'.$title.'</span></td>
                                                                
                                                        </tr>';
                        
                                                        
                                                        
                                        
                        
                                        }while($selectect_staffcnt_row = mysqli_fetch_assoc($selectect_staff));
                        
                        
                        
                                echo '</tbody>
                                </table>';



                                }else
                                {





                                        
                        
                                }
                        




    }else{

                                $selectect_staff = mysqli_query($link,"SELECT * FROM `staff` INNER JOIN `institution` ON `staff`.`InstitutionID` = `institution`.`InstitutionID` WHERE 
                                `institution`.`AgencyOrSchoolOwnerID`='$UserID' AND `staff`.`StaffTrashStatus`='0' ORDER BY `staff`.`StaffFirstName` ASC ");
                        
                                $selectect_staffcnt = mysqli_num_rows($selectect_staff);
                                $selectect_staffcnt_row = mysqli_fetch_assoc($selectect_staff);
                        
                                if($selectect_staffcnt > 0)
                                {
                        
                        
                        
                                        $select_ownerwalletamount = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$UserID'   ");
                                        $select_ownerwalletamount_row = mysqli_num_rows($select_ownerwalletamount);
                                        $select_ownerwalletamount_row_cnt = mysqli_fetch_assoc($select_ownerwalletamount);
                        
                                        $wallet_balanceamount =  $select_ownerwalletamount_row_cnt['WalletBalance'];
                        
                        
                                        echo '<input type="hidden" class="prosgetwallet_amount_schoolschedule" value="'.$wallet_balanceamount.'">';
                        
                                echo '<table class="table" >
                                <thead style="border:none;">
                                        <tr>
                                        <th scope="col">
                                                <input class="form-check-input prosselectallcheckedallshedule" type="checkbox" value="" >
                                                <label class="form-check-label" for="flexCheckDefaultshedule">All</label>
                                        </th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Penalty </th>
                                        <th scope="col">Status </th>
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
                                                        $SalaryStatus = $selectect_staffcnt_row['SalaryStatus'];
                        
                                                        $SalaryPaidDate = $selectect_staffcnt_row['SalaryPaidDate'];
                        
                        
                                                        
                        
                                                        if($SalaryPaidDate == $dateforsalrypaid )  
                                                        {
                        
                        
                                                                                $color = '#009751';
                                                                                $background = "#bdffe0";
                                                                                $border = "#01df77";
                                                                                $title = "Paid";
                                                                                $disabledchecked = 'disabled';
                                                                                $disablecolor = 'gray';
                                                                                $classname = '';
                        
                        
                                                        }else
                                                        {
                        
                        
                        
                                                                        if($SalaryStatus  == '1')
                                                                        {
                        
                        
                                                                                $color = '#ff0000';
                                                                                $background = "#ffbdbd";
                                                                                $border = "#f74141";
                                                                                $title = "Withheld";
                                                                                $disabledchecked = 'disabled';
                                                                                $disablecolor = 'gray';
                                                                                $classname = '';
                        
                        
                                                                                
                                                                        }else
                                                                        {
                        
                        
                                                                                $color = '#f78a41';
                                                                                $background = "#fff3bd";
                                                                                $border = "#f78a41"; 
                                                                                $title = "Pending";
                                                                                $disabledchecked = '';
                                                                                $disablecolor = '';
                                                                                $classname = 'proscheckedainputnamesalaryeachshedule';
                        
                        
                        
                                                                        }
                        
                                                        }
                        
                        
                                                
                                                        
                        
                                                        $select_deciplinary = mysqli_query($link, "SELECT SUM(DisciplinaryAmount) AS DisciplinaryAmount FROM `staffdisciplinarylist` WHERE  InstitutionID='$InstitutionID' AND `StaffID`='$StaffID' AND DisciplinaryStatus=''");
                                                        $select_deciplinarycnt = mysqli_num_rows($select_deciplinary);
                                                        $select_deciplinarycnt_row = mysqli_fetch_assoc($select_deciplinary);
                        
                        
                        
                                                                if( $select_deciplinarycnt > 0)
                                                                {
                        
                        
                                                                        $DisciplinaryAmount =  $select_deciplinarycnt_row['DisciplinaryAmount'];
                        
                        
                                                                        if($StaffSalary  == '0')
                                                                        {
                                                                                $staff_fullamount = '0.00';
                                                                        }else
                                                                        {
                                                                                $staff_fullamount =  number_format($StaffSalary -  $DisciplinaryAmount);
                                                                        }
                                                                
                        
                        
                                                                        $fulllfeecontentamount =  $StaffSalary -  $DisciplinaryAmount;
                        
                                                                        if($DisciplinaryAmount == 'null' || $DisciplinaryAmount == '' || $DisciplinaryAmount == '0')
                                                                        {
                                                                                $DisciplinaryAmount_two =  '0.00';
                                                                        }else{
                                                                                $DisciplinaryAmount_two =  number_format($DisciplinaryAmount);
                                                                        }
                        
                        
                        
                                                                }else
                                                                {
                                                                        if($StaffSalary  == '0')
                                                                        {
                                                                                $staff_fullamount = '0.00';
                                                                        }else
                                                                        {
                                                                                $staff_fullamount = number_format($StaffSalary);
                                                                        }
                        
                                                                        
                                                                        $fulllfeecontentamount =  $StaffSalary;
                        
                        
                        
                                                                        $DisciplinaryAmount_two  = '0.00';
                        
                                                                }
                        
                        
                        
                        
                                                                
                        
                                                        
                                                        
                        
                                                        echo' <tr>
                                                                <td><input '.$disabledchecked.'  style="background:'.$disablecolor.';" class="form-check-input '.$classname.'" type="checkbox" data-staffid="'.$StaffID.'" value="'.$WalletBank .'" data-inst="'.$InstitutionID.'" data-amount="'.$fulllfeecontentamount.'" data-accname="'.$WalletAccountName.'" data-accnum="'.$WalletAccountName.'" data-ref="'.$WalletAccountReference.'"></td>
                                                                <td>'.$StaffFirstName.' '.$StaffLastName.'</td>
                                                                <td>₦'.$staff_fullamount.'</td>
                                                                <td>₦'.$DisciplinaryAmount_two.'</td>
                                                                <td><span class="prossalystsuscont" style="color:'.$color.';background:'.$background.';border:'.$border.';">'.$title.'</span></td>
                                                                
                                                        </tr>';
                        
                                                        
                                                        
                                        
                        
                                        }while($selectect_staffcnt_row = mysqli_fetch_assoc($selectect_staff));
                        
                        
                        
                                echo '</tbody>
                                </table>';
                                }else
                                {
                        
                                }
                        

    }


      




?>