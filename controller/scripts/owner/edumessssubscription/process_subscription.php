<?php




            include('../../../config/config.php');

        
           $userID = $_POST['userID'];
           $total = $_POST['total'];
           $session = $_POST['session'];
           $term = $_POST['term'];
           $paymentmethod = $_POST['paymentmethod'];


            $date_time = date('Y-m-d');
            
            
            $prosmakepaymenthere = mysqli_query($link, "SELECT * FROM `institution` WHERE AgencyOrSchoolOwnerID='$userID'");

            $prosmakepaymentherecnt = mysqli_num_rows($prosmakepaymenthere);
            $prosmakepaymenthererow = mysqli_fetch_assoc($prosmakepaymenthere);
           
            $PlanPercentage = $prosmakepaymenthererow['PlanPercentage'];
            $ActualPlan = $prosmakepaymenthererow['ActualPlan'];
            $InstitutionID = $prosmakepaymenthererow['InstitutionID'];
            
            
            // $prosterm = mysqli_query($link, "SELECT * FROM `termorsemester` WHERE `TermOrSemesterName`='$term'");
            
            // $prostermcnt = mysqli_num_rows($prosterm);
            // $prostermrow = mysqli_fetch_assoc($prosterm);
            
            // $TermOrSemesterID = $prostermrow['TermOrSemesterID'];
            
            
           
            
            
            
           $insertsql = mysqli_query($link, "INSERT INTO `plantransaction`(`InstitutionID`, `PlanID`, `SessionName`, `TermOrSemesterName`, `ActualAmount`, `DiscountedAmount`, `DatePaid`) 
            VALUES ('$InstitutionID','$ActualPlan','$session','$term','$total','0','$date_time')");
            
            
            if($insertsql == true)
            {
                
                 $updateinstitution = mysqli_query($link,"UPDATE `institution` SET SubscriptionStatus='2' WHERE InstitutionID='$InstitutionID'");
                
                
                  echo 'success';
                  
            }else
            {
                
                  echo 'failed';
                
            }
            
            
           
            



     ?>