<?php

        include('../../config/config.php');

        $IntitutionID = $_POST['IntitutionID'];
        $UserID = $_POST['UserID'];
        $campusID = $_POST['campusID'];
        $totalamount = $_POST['totalamount'];
        $Paymentamountgotten = $_POST['Paymentamountgotten'];
        $admissionprefix = $_POST['admissionprefix'];

      


        
        $totalamountnew = explode(',',$totalamount);
        $ClassID = explode(',',$_POST['ClassID']);
        $ClassName = explode(',',$_POST['ClassName']);

         

        if($totalamount == '')
        {


            foreach($ClassID as $key => $ClassIDnew)
            {
     
                $ClassIDnew;
                $ClassNamearr =  $ClassName[$key];


                    $selectclass = mysqli_query($link,"SELECT * FROM `admissionclass` WHERE `CampusID`='$campusID' AND `AdmissionDefaultClassID`='$ClassIDnew'");
                    $selectclasscnt = mysqli_num_rows($selectclass);


                   if( $selectclasscnt > 0)
                   {

                    $insertsqli = mysqli_query($link,"UPDATE `admissionclass` SET `AdmissionDefaultClassID`='$ClassIDnew',`PaymentStatus`='$Paymentamountgotten',`PaymentAmount`='0' WHERE `CampusID`='$campusID' AND `AdmissionDefaultClassID`='$ClassIDnew'");
                       
                      
                           
                   }else
                   {

                      $insertsqli = mysqli_query($link,"INSERT INTO `admissionclass`(`CampusID`, `AdmissionDefaultClassID`, `PaymentStatus`, `PaymentAmount`) VALUES ('$campusID','$ClassIDnew','$Paymentamountgotten', '0')");
                       
                   }
              
     
            }

               
        }else
        {

            foreach($ClassID as $key => $ClassIDnew)
            {

     
                $ClassIDnew;
                $ClassNamearr =  $ClassName[$key];
                $amount_arr =   $totalamountnew[$key];

                 $selectclass = mysqli_query($link,"SELECT * FROM `admissionclass` WHERE `CampusID`='$campusID' AND `AdmissionDefaultClassID`='$ClassIDnew'");
                 $selectclasscnt = mysqli_num_rows($selectclass);


                    if( $selectclasscnt > 0)
                    {

                        $insertsqli = mysqli_query($link,"UPDATE `admissionclass` SET `AdmissionDefaultClassID`='$ClassIDnew',`PaymentStatus`='$Paymentamountgotten',`PaymentAmount`='$amount_arr' WHERE `CampusID`='$campusID' AND `AdmissionDefaultClassID`='$ClassIDnew'");
                        
                        
                    }else
                    {


                        $insertsqli = mysqli_query($link,"INSERT INTO `admissionclass`(`CampusID`, `AdmissionDefaultClassID`, `PaymentStatus`, `PaymentAmount`) VALUES ('$campusID','$ClassIDnew','$Paymentamountgotten', '$amount_arr')");
                            
                        
                    }
     
            }

            
        }

        $selectprefix =  mysqli_query($link,"SELECT * FROM `admissionregnumberprifix` WHERE CampusID='$campusID'");
        $selectprefixrowcnt = mysqli_num_rows($selectprefix);

        if($selectprefixrowcnt > 0)
        {

            $insertadminprefix =   mysqli_query($link,"UPDATE `admissionregnumberprifix` SET `RegNumberPrifix`='$admissionprefix',`Slidestatus`='1' WHERE `CampusID`='$campusID'");
           
        }else
        {


            $insertadminprefix = mysqli_query($link,"INSERT INTO `admissionregnumberprifix`(`CampusID`, `RegNumberPrifix`, `Slidestatus`) VALUES ('$campusID','$admissionprefix','1')");

            
        }
       
        


         if($insertsqli == true)
         {
                echo 'success';

         }else
         {
                    echo 'fail';
         }
      
       
                  

        
        




?>