
  <?php




            include('../../../config/config.php');

        
           $userID = $_POST['userID'];
         
            $date_time = date('Y-m-d');
            
            $prosmakepaymenthere = mysqli_query($link, "SELECT * FROM `institution` WHERE AgencyOrSchoolOwnerID='$userID'");

            $prosmakepaymentherecnt = mysqli_num_rows($prosmakepaymenthere);
            $prosmakepaymenthererow = mysqli_fetch_assoc($prosmakepaymenthere);
           
            $PlanPercentage = $prosmakepaymenthererow['PlanPercentage'];
            $ActualPlan = $prosmakepaymenthererow['ActualPlan'];
            $InstitutionID = $prosmakepaymenthererow['InstitutionID'];
            
            
            $updateinstitution = mysqli_query($link,"UPDATE `institution` SET SubscriptionStatus='free' WHERE InstitutionID='$InstitutionID'");
            
            if($updateinstitution == true)
            {
            
                echo 'success';
                
            }else
            {
            
                 echo 'failed';
                
            }
            
            
            
  ?>