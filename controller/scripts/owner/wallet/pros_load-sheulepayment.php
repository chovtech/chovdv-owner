
<?php
        error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../../config/config.php');

        $UserID = $_POST['UserID'];
        $UserType = $_POST['UserType'];



        $selectect_staff = mysqli_query($link,"SELECT * FROM `staff` INNER JOIN `institution` ON `staff`.`InstitutionID` = `institution`.`InstitutionID` WHERE 
        `institution`.`AgencyOrSchoolOwnerID`='$UserID' AND `staff`.`StaffTrashStatus`='0'");
  
         $selectect_staffcnt = mysqli_num_rows($selectect_staff);
          $selectect_staffcnt_row = mysqli_fetch_assoc($selectect_staff);

        $staffsalrycountamount = 0;

  
          if($selectect_staffcnt > 0)
          {
  
    
  
                   $select_ownerwalletamount = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$UserID'");
                   $select_ownerwalletamount_row = mysqli_num_rows($select_ownerwalletamount);
                   $select_ownerwalletamount_row_cnt = mysqli_fetch_assoc($select_ownerwalletamount);
  
                   $wallet_balanceamount =  $select_ownerwalletamount_row_cnt['WalletBalance'];
  
  
              
                  do{
  
  
  
                                      $StaffID = $selectect_staffcnt_row['StaffID'];
  
                                    
                                      $SalaryStatus = $selectect_staffcnt_row['SalaryStatus'];
                                      $WalletBank = $selectect_staffcnt_row['WalletBank'];
                                      $WalletBalance = $selectect_staffcnt_row['WalletBalance'];
                                      $WalletAccountName = $selectect_staffcnt_row['WalletAccountName'];
                                      $WalletAccountNumber = $selectect_staffcnt_row['WalletAccountNumber'];
                                      $WalletAccountReference = $selectect_staffcnt_row['WalletAccountReference'];
  
                                       $InstitutionID = $selectect_staffcnt_row['InstitutionID'];
                                       $SalaryStatus = $selectect_staffcnt_row['SalaryStatus'];
                                       $StaffSalary = $selectect_staffcnt_row['StaffSalary'];
  
  
  
                                      $select_deciplinary = mysqli_query($link, "SELECT SUM(DisciplinaryAmount) AS DisciplinaryAmount FROM `staffdisciplinarylist` WHERE  InstitutionID='$InstitutionID' AND `StaffID`='$StaffID' AND DisciplinaryStatus='0'");
                                      $select_deciplinarycnt = mysqli_num_rows($select_deciplinary);
                                      $select_deciplinarycnt_row = mysqli_fetch_assoc($select_deciplinary);
  


                                      if($SalaryStatus  == '1')
                                      {



                                        $fulllfeecontentamount =  0;



                                      }else
                                      {



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

                                                            $DisciplinaryAmount_two =  number_format($DisciplinaryAmount);

            
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

                                      }
                                      

                                        $staffsalrycountamount +=$fulllfeecontentamount;
  
  
                  }while($selectect_staffcnt_row = mysqli_fetch_assoc($selectect_staff));
  
  
  
         
          }else
          {
  
          }
  

         echo  $staffsalrycountamount;



    ?>