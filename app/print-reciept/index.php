<?php include('../../controller/config/config.php'); ?>
<?php
      $PaymentRefNo = $_GET['ref'];
       $institution = $_GET['inst'];
        $studid = $_GET['stud'];
        $CampusID =  $_GET['camp'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EduMESS" />
    <meta name="description"
        content="EduMESS (Education Management and E-Learning Software Solution) 
        is a leading school management, automation and elearning solution. Since its 
        launch, EduMESS has grown to become a leader. Our clients say that the simplicity 
        of our interface, ease of use, cost effectiveness and excellent customer care is 
        the reason they prefare EduMESS. We have watched schools move from softwares they 
        are using to EduMESS." />
    <meta name="keywords"
        content="Best, School, Management, Best School, Best School Management, 
        Best School Management Software, Free School Management Software, Portal, 
        School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator ">
    <title>EduMESS</title>
        <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" href="../../assets/images/website_images/favicon.png">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    

     <!-- notification css-->
     <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

   


    <style type="text/css">
        body {
            margin-top: 10px;
            background: #eee;
        }
        @media print {
            #non-printable-content {
                display: none;
            }
        }
    </style>

  
</head>

<body>

        <?php
        
                        //PROS LOAD CHARGES PER STUDENT HERE 
                        
                        
                           $select_amounteach_student_classs =   mysqli_query($link,"SELECT * FROM `student` INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID` 
                        WHERE `student`.`StudentID`='$studid' AND `student`.`CampusID`='$CampusI'");
                        
                        $select_amounteach_student_classscnt = mysqli_num_rows($select_amounteach_student_classs);
                        $select_amounteach_student_classscntrow = mysqli_fetch_assoc($select_amounteach_student_classs);
                        
                     
                        
                        
                        
                        
                        //PROS LOAD CHARGES PER STUDENT HERE
                      
                      


                    $getinst = mysqli_query($link,"SELECT * FROM `institution` WHERE `InstitutionID`='$institution'");
                    $fetchinstdet = mysqli_fetch_assoc($getinst);


                    $getinst_campus = mysqli_query($link,"SELECT * FROM `campus` WHERE `InstitutionID`='$institution' AND `CampusID`='$CampusID'");
                    $fetchinstdet_campus = mysqli_fetch_assoc($getinst_campus);


                    $CampusAddress =  $fetchinstdet_campus['CampusAddress'];




                    $getstudent = mysqli_query($link," SELECT * FROM `student` INNER JOIN `userlogin` ON `student`.`StudentID` 
                    = `userlogin`.`UserID` WHERE `student`.`CampusID`='$CampusID' AND `student`.`StudentID`='$studid'");
                    $fetchstudent = mysqli_fetch_assoc($getstudent);

                    $institutionname = $fetchinstdet['InstitutionGeneralName'];
                    $institutitonlogo = $fetchinstdet['InstitutionLogo'];
                    $institutitonWebsite = $fetchinstdet['InstitutionWebsite'];



                    if($institutionname == '')
                    {
                        $institutionnamenew = 'No Institution Name Found';
                    }
                    else
                    {
                    $institutionnamenew = $fetchinstdet['InstitutionGeneralName']; 
                    }
                    
                    if($institutitonWebsite == '')
                    {
                        $institutitonWebsitenew = 'No Institution Website Found';
                    }
                    else
                    {
                    $institutitonWebsitenew = $fetchinstdet['InstitutionWebsite']; 
                    }

                    if($institutitonlogo == '')
                    {
                        $institutitonlogonew = 'No_Photo.png';
                    }
                    else
                    {
                    $institutitonlogonew = $fetchinstdet['InstitutionLogo']; 
                    }

                    $institutionaddress =  $CampusAddress;

                    if($institutionaddress == '')
                    {
                        $institutionaddressnew = 'School Address not Available';
                    }
                    else
                    {
                        $institutionaddressnew =  $CampusAddress;   
                    }

                    $institutionphone = $fetchinstdet['InstitutionPhone'];

                    if($institutionphone == '')
                    {
                    $institutionphone = 'School phone not available'; 
                    }
                    else
                    {
                    $institutionphone = $fetchinstdet['InstitutionPhone'];   
                    }
                    if($fetchstudent['StudentPhoto'] == '' || $fetchstudent['StudentPhoto'] == 0)
                    {
                        $studphoto = 'No_Photo.png'; 
                    }
                    else
                    {

                        $studphoto = $fetchstudent['StudentPhoto']; 
                    }


                if($PaymentRefNo == 'noref')
                {

               


                                    
                        $selectsessionpros = mysqli_query($link, "SELECT * FROM `session` WHERE  sessionStatus='1'");
                        $selectsessionproscnt = mysqli_num_rows($selectsessionpros);
                        $selectsessionproscnt_row = mysqli_fetch_assoc($selectsessionpros);

                        $session = $selectsessionproscnt_row['sessionName'];


                        $selecttermcnt = mysqli_query($link," SELECT * FROM `termorsemester` INNER JOIN `termalias` ON  `termorsemester`.`TermOrSemesterID` = `termalias`.`TermOrSemesterID`  WHERE `termalias`.`CampusID`='$CampusID' AND `termorsemester`.`status`='1'");
                        $gettermaliasname_row = mysqli_fetch_assoc($selecttermcnt);
                        $selecttermcnt_num = mysqli_num_rows($selecttermcnt);

                        $term = $gettermaliasname_row['TermOrSemesterID'];
                        $TermAliasName = $gettermaliasname_row['TermAliasName'];


                         
                        $select_studentfeeherecurrent = mysqli_query($link, "SELECT * FROM `student`
                        INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID`
                        WHERE `classordepartmentstudentallocation`.`CampusID`='$CampusID' AND `student`.`StudentID`='$studid' AND `Session`='$session'");

                        $select_studentfeeherecurrentrowcnt = mysqli_num_rows($select_studentfeeherecurrent);
                        $select_studentfeeherecurrentrowcntrowdata = mysqli_fetch_assoc($select_studentfeeherecurrent);


                        $classid = $select_studentfeeherecurrentrowcntrowdata['ClassOrDepartmentID'];
                        $date = '';
                        // $time = $rowcategory['timeCreated'];
                        $datetime = $date;


                        $sql_get_student_class = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `CampusID`='$CampusID' AND `ClassOrDepartmentID`='$classid'");
                        $row_get_student_class = mysqli_fetch_assoc($sql_get_student_class);
                        $cnt_get_student_class = mysqli_num_rows($sql_get_student_class);
                        
                        if($cnt_get_student_class > 0)
                        {
                            $class_name = $row_get_student_class['ClassOrDepartmentName'];
                        }
                        else
                        {
                            $class_name = 'Invalid Class';
                        }






            }else
            {


                                
                    $sqlcategory = mysqli_query($link,"SELECT * FROM `transactions` WHERE `StudentID`='$studid' AND `TransactionReference`='$PaymentRefNo' AND `CampusID`='$CampusID' AND `DeleteStatus`='0'");
               
                    $rowcategory = mysqli_fetch_assoc($sqlcategory);
                    $cntcategory = mysqli_num_rows($sqlcategory);



                    

                        
                if($cntcategory > 0)
                {

                    $classid = $rowcategory['ClassOrDepartmentID'];
                    $session = $rowcategory['Session'];
                    $term = $rowcategory['TermOrSemesterID'];
                    $date = $rowcategory['Date'];
                    // $time = $rowcategory['timeCreated'];
                    $datetime = $date;

                    $gettermaliasname = mysqli_query($link, "SELECT * FROM `termalias` WHERE `CampusID`='$CampusID' AND `TermOrSemesterID`='$term'");
                    $gettermaliasname_row = mysqli_fetch_assoc($gettermaliasname);
                    $TermAliasName = $gettermaliasname_row['TermAliasName'];

                    
                    $sql_get_student_class = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `CampusID`='$CampusID' AND `ClassOrDepartmentID`='$classid'");
                    $row_get_student_class = mysqli_fetch_assoc($sql_get_student_class);
                    $cnt_get_student_class = mysqli_num_rows($sql_get_student_class);
                    
                    if($cnt_get_student_class > 0)
                    {
                        $class_name = $row_get_student_class['ClassOrDepartmentName'];
                    }
                    else
                    {
                        $class_name = 'Invalid Class';
                    }

                }else
                {

                }   
            


            }



        ?>

        <div class="container bootdey">
                <div class="row invoice row-printable">
                    
                    <div class="col-md-2">
                        
                    </div>
                    
                    <div class="col-md-8 justify-content-center">

                        <div class="panel panel-default plain" id="invoice">

                            <div class="panel-body">
                                <div class="row">

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="left">

                                        <div class="invoice-logo"><img width="80"
                                                src="<?php echo $institutitonlogonew; ?>" alt="School logo">
                                        </div><br>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <div class="invoice-from" align="center">
                                            <ul class="list-unstyled">
                                                <li style="font-size:18px;font-weight:600;"><?php echo $institutionnamenew; ?></li>
                                                <li style="font-size:15px;font-weight:550;"><?php echo $institutionaddressnew.' <span>'.$institutionphone.'</span>'; ?></li>
                                                <li style="font-size:13px;font-weight:500;"><?php echo $institutitonWebsitenew; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="right">

                                        <div class="invoice-logo"><img width="80"
                                                src="<?php echo $studphoto; ?>" alt="Invoice logo">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row well print-bg-color" style="font-size:12px;">

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="left">
                                                <ul class="list-unstyled">
                                                    <li><strong>Name </strong> <?php echo $fetchstudent['StudentLastName'].' '.$fetchstudent['StudentMiddleName'].' '.$fetchstudent['StudentFirstName'].' ('.$fetchstudent['UserRegNumberOrUsername'];?>)</li>
                                                    <li><strong>Class:</strong> <?php echo $class_name;?></li>
                                                    <li><strong>Session/Term:</strong> <?php echo $session.' > '.$TermAliasName;?></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="right">
                                             
                                                            <?php

                                                                if($PaymentRefNo == 'noref')
                                                                {

                                                               
                
                                                            ?>
                                                            <?php
                                                                }else
                                                                {

                                                              
                                                            ?>
                                                                <ul class="list-unstyled">
                                                                    <li><strong>Ref. No.</strong> <?php echo $PaymentRefNo;?></li>
                                                                    <li><strong>Date:</strong> <?php echo date("M jS, Y", strtotime($rowcategory['Date']));?> </li>
                                                                </ul>

                                                            <?php
                                                               
                                                                    
                                                                }
                                                            ?>
                                                  
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                                                <span style="font-size:13px;font-weight:500;"><u>Receipt</u></span>
                                            </div>
                                        </div>
                                        <div class="invoice-items">
                                            <div class="table-responsive" style="outline: none;" tabindex="0">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>

                                                            <?php

                                                                if($PaymentRefNo == 'noref')
                                                                {
                                                            ?>      
                                                            
                                                                     <th class="per5 text-center" style="font-size:13px;">Ref No.</th>
                                                                    <th class="per5 text-center" style="font-size:13px;">Initial Amt.</th>
                                                                    <th class="per5 text-center" style="font-size:13px;">Scholarship</th>
                                                                    <th class="per25 text-center" style="font-size:13px;">Discount</th>

                                                                    <th class="per25 text-center" style="font-size:13px;">Paid Amt.</th>
                                                                    <th class="per5 text-center" style="font-size:13px;">Balance</th>


                                                             <?php                 

                                                                }else
                                                                {
                                                            ?>


                                                            
                                                                    <th class="per5 text-center" style="font-size:13px;">Initial Amt.</th>
                                                                    <th class="per5 text-center" style="font-size:13px;">Scholarship</th>
                                                                    <th class="per25 text-center" style="font-size:13px;">Discount</th>

                                                                    <th class="per25 text-center" style="font-size:13px;">Paid Amt.</th>
                                                                    <th class="per5 text-center" style="font-size:13px;">Balance</th>


                                                            <?php
                                                              }    
                                                            ?>

                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size:12px;">

                                                              <?php


                                                                    if($PaymentRefNo == 'noref')
                                                                    {



                                                                        $select_charger_transaction = mysqli_query($link, "SELECT DISTINCT `transactions`.`TransactionReference`, `transactions`.`TransactionIn` AS `TransactionIn`, `chargestructure`.`Amount` AS `Amount` 
                                                                        FROM `chargestructure` 
                                                                        INNER JOIN `transactions` ON `chargestructure`.`CategoryID` = `transactions`.`CategoryID` 
                                                                                                AND `chargestructure`.`SubcategoryID` = `transactions`.`SubcategoryID` 
                                                                        WHERE `transactions`.`CampusID`='$CampusID'
                                                                          AND `transactions`.`StudentID`='$studid' 
                                                                          AND `transactions`.`ClassOrDepartmentID`='$classid' 
                                                                          AND `transactions`.`Session`='$session' 
                                                                          AND `transactions`.`TermOrSemesterID`='$term'");
                                                                        
                                                                        $select_charger_transactioncnt = mysqli_num_rows($select_charger_transaction);
                                                                        
                                                                       
                                                                        if ($select_charger_transactioncnt > 0) {
                                                                            while ($select_charger_transactioncntrow = mysqli_fetch_assoc($select_charger_transaction)) {
                                                                                
                                                                                // You can access transaction data here if needed
                                                                                // echo $TransactionIn = $select_charger_transactioncntrow['TransactionIn'];
                                                                                // echo $TransactionReference = $select_charger_transactioncntrow['TransactionReference'].'<br>';
                                                                            }
                                                                        } else {
                                                                            // Handle the case when there are no results
                                                                        }


                                                                        
                                                                        
                                                                    }else
                                                                    {
                                                                        
                                                                        
                                                                        
                                                                        
                                                                            $getchargersforstud =  mysqli_query($link,"SELECT SUM(Amount) AS chargeamount FROM `chargestructure` 
                                                                            WHERE CampusID='$CampusID' AND ClassOrDepartmentID='$classid' AND `Status`='1'");
                                                                            $getchargersforstudcnt = mysqli_num_rows($getchargersforstud);
                                                                            $getchargersforstudcntrow = mysqli_fetch_assoc($getchargersforstud);
                                                                            
                                                                            $chargecompul_Amount =   $getchargersforstudcntrow['chargeamount'];
                                                                            
                                                                            if($chargecompul_Amount == 'NULL' || $chargecompul_Amount == '' || $chargecompul_Amount == '0' )
                                                                            {
                                                                                
                                                                                $chargecompul_Amountnew = 0;
                                                                                
                                                                            }else
                                                                            {
                                                                                 $chargecompul_Amountnew = $chargecompul_Amount;
                                                                                
                                                                            }
                                                                            
                                                                               $chargeamountoptional = mysqli_query($link,"SELECT SUM(`chargestructure`.`Amount`) AS OptionalAmount FROM `chargestructure` 
                                                                               INNER JOIN assignoptionalfees ON `chargestructure`.`CampusID` = `assignoptionalfees`.`CampusID` AND
                                                                                `chargestructure`.`CategoryID` = `assignoptionalfees`.`CategoryID` AND `chargestructure`.`SubcategoryID` = `assignoptionalfees`.`SubcategoryID`
                                                                                AND `chargestructure`.`Session` = `assignoptionalfees`.`Session` AND `chargestructure`.`TermOrSemesterID` = `assignoptionalfees`.`TermOrSemesterID` AND
                                                                                `chargestructure`.`ClassOrDepartmentID` = `assignoptionalfees`.`ClassOrDepartmentID` WHERE `chargestructure`.`ClassOrDepartmentID`='$classid' AND 
                                                                                `assignoptionalfees`.`StudentID`='$studid'  AND `assignoptionalfees`.`Session`='$session' AND `chargestructure`.`Status`='0'"); 
                                                                          
                                                                            
                                                                            
                                                                            
                                                                             
                                                                            
                                                                                                        
                                                                                                        
                                                                            $chargeamountoptionalcnt = mysqli_num_rows($chargeamountoptional);
                                                                            $chargeamountoptionalcntrow = mysqli_fetch_assoc($chargeamountoptional);
                                                                            
                                                                            $optionalAmount = $chargeamountoptionalcntrow['OptionalAmount'];
                                                                           
                                                                           
                                                                              if($optionalAmount == 'NULL' ||  $optionalAmount == '' ||  $optionalAmount == '0' )
                                                                            {
                                                                                
                                                                                 $optionalAmountnew = 0;
                                                                                 
                                                                            }else
                                                                            {
                                                                                  $optionalAmountnew =  $optionalAmount;
                                                                                
                                                                            }
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            // PROSLOAD THIS TERM FEE ALONE
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            $getchargersforstud_current =  mysqli_query($link,"SELECT SUM(Amount) AS chargeamount FROM `chargestructure` 
                                                                            WHERE CampusID='$CampusID' AND ClassOrDepartmentID='$classid' AND `Status`='1' AND TermOrSemesterID='$term'");
                                                                            $getchargersforstudcnt_current = mysqli_num_rows($getchargersforstud_current);
                                                                            $getchargersforstudcntrow_current = mysqli_fetch_assoc($getchargersforstud_current);
                                                                            
                                                                            $chargecompul_Amount_current =   $getchargersforstudcntrow_current['chargeamount'];
                                                                            
                                                                            if($chargecompul_Amount_current == 'NULL' || $chargecompul_Amount_current == '' || $chargecompul_Amount_current == '0' )
                                                                            {
                                                                                
                                                                                $chargecompul_Amountnew_current = 0;
                                                                                
                                                                            }else
                                                                            {
                                                                                 $chargecompul_Amountnew_current = $chargecompul_Amount_current;
                                                                                
                                                                            }
                                                                            
                                                                            
                                                                            
                                                                            
                                                                               $chargeamountoptional_current = mysqli_query($link,"SELECT SUM(`chargestructure`.`Amount`) AS OptionalAmount FROM `chargestructure` 
                                                                               INNER JOIN assignoptionalfees ON `chargestructure`.`CampusID` = `assignoptionalfees`.`CampusID` AND
                                                                                `chargestructure`.`CategoryID` = `assignoptionalfees`.`CategoryID` AND `chargestructure`.`SubcategoryID` = `assignoptionalfees`.`SubcategoryID`
                                                                                AND `chargestructure`.`Session` = `assignoptionalfees`.`Session` AND `chargestructure`.`TermOrSemesterID` = `assignoptionalfees`.`TermOrSemesterID` AND
                                                                                `chargestructure`.`ClassOrDepartmentID` = `assignoptionalfees`.`ClassOrDepartmentID` WHERE `chargestructure`.`ClassOrDepartmentID`='$classid' AND 
                                                                                `assignoptionalfees`.`StudentID`='$studid'  AND `assignoptionalfees`.`Session`='$session' AND `chargestructure`.`Status`='0'  AND `assignoptionalfees`.TermOrSemesterID='$term'"); 
                                                                          
                                                                            
                                                                           
                                                                            
                                                                             
                                                                            
                                                                                                        
                                                                                                        
                                                                            $chargeamountoptionalcnt_current = mysqli_num_rows($chargeamountoptional_current);
                                                                            $chargeamountoptionalcntrow_current = mysqli_fetch_assoc($chargeamountoptional_current);
                                                                            
                                                                            $optionalAmount_current = $chargeamountoptionalcntrow_current['OptionalAmount'];
                                                                           
                                                                           
                                                                              if($optionalAmount_current == 'NULL' ||  $optionalAmount_current == '' ||  $optionalAmount_current == '0' )
                                                                            {
                                                                                
                                                                                 $optionalAmountnew_current = 0;
                                                                                 
                                                                            }else
                                                                            {
                                                                                  $optionalAmountnew_current =  $optionalAmount_current;
                                                                                
                                                                            }
                                                                            
                                                                             $charge_amount_current =   $chargecompul_Amountnew_current + $optionalAmountnew_current;
                                                                            
                                                                        // PROSLOAD THIS TERM FEE ALONE
                                                                             
                                                                        
                                                                          $datefordeduction =  mysqli_query($link,"SELECT * FROM `transactions` WHERE TransactionReference='$PaymentRefNo' AND StudentID='$studid' AND CampusID='$CampusID'");
                                                                          $datefordeduction_cnt = mysqli_num_rows($datefordeduction);
                                                                          $datefordeduction_cntrow = mysqli_fetch_assoc($datefordeduction);
                                                                          
                                                                          $datetransaction = $datefordeduction_cntrow['Date'];
                                                                          $ClassOrDepartmentIDnew = $datefordeduction_cntrow['ClassOrDepartmentID'];
                                                                          $Sessionnew = $datefordeduction_cntrow['Session'];
                                                                          $TermOrSemesterIDnew = $datefordeduction_cntrow['TermOrSemesterID'];
                                                                           
                                                                           
                                                                           
                                                                         //   DeleteStatus

                                                                        $select_charger_transaction = mysqli_query($link,"SELECT SUM(TransactionIn)AS TransactionIn FROM `transactions` 
                                                                           WHERE `CampusID`='$CampusID'
                                                                        AND `ClassOrDepartmentID`='$ClassOrDepartmentIDnew' AND `Session`='$Sessionnew'  AND `TermOrSemesterID`='$TermOrSemesterIDnew'  AND  StudentID='$studid' AND `Date` <= '$datetransaction'");	

                                                                        $select_charger_transactioncnt = mysqli_num_rows($select_charger_transaction);
                                                                        
                                                                        
                                                                        
                                                                       
                                                                            


                                                                            if($select_charger_transactioncnt  > 0)
                                                                            {


                                                                                       $select_charger_transactioncntrow = mysqli_fetch_assoc($select_charger_transaction);
                                                                                       
                                                                                        $charge_amount =   $optionalAmountnew + $chargecompul_Amountnew;
                                                                                        
                                                                                        $TuitionType = $datefordeduction_cntrow['TuitionType'];
                                                                                        $TransactionIn = $select_charger_transactioncntrow['TransactionIn'];

                                                                                        


                                                                                        if($TuitionType == 'Schoolarship')
                                                                                        {

                                                                                                $scholarshipamount = $TransactionIn;
                                                                                                $discountamount = 0;



                                                                                        }else if($TuitionType == 'Discount')
                                                                                        {


                                                                                                $scholarshipamount = 0.00;
                                                                                                $discountamount = $TransactionIn;

                                                                                        }else
                                                                                        {

                                                                                                $scholarshipamount = 0.00;
                                                                                                $discountamount = 0.00;

                                                                                        }
                                                                                        

                                                                                        $total_discounted =  $TransactionIn;
                                                                                        
                                                                                       
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                         $select_charger_transaction_all = mysqli_query($link,"SELECT SUM(TransactionIn)AS TransactionIn FROM `transactions` 
                                                                                           WHERE `CampusID`='$CampusID'
                                                                                          AND `ClassOrDepartmentID`='$ClassOrDepartmentIDnew' AND `Session`='$Sessionnew'   AND  StudentID='$studid'");	
            
                                                                                          $select_charger_transactioncnt_all = mysqli_num_rows($select_charger_transaction_all);
                                                                                          
                                                                                          $select_charger_transactioncnt_all_fectch = mysqli_fetch_assoc($select_charger_transaction_all);
                                                                                        
                                                                                          $TransactionInall = $select_charger_transactioncnt_all_fectch['TransactionIn'];
                                                                                          
                                                                                          
                                                                                           $prosamount_deducted_balance = $charge_amount - $TransactionInall;
                                                                                        



                                                                                        echo '<td class="text-center">₦ '.number_format($charge_amount_current).'</td>
                                                                                        <td class="text-center">₦ ';

                                                                                            if($scholarshipamount == '0')
                                                                                            {
                                                                                                    echo '0.00';
                                                                                            }else
                                                                                            {
                                                                                                echo  number_format($scholarshipamount);
                                                                                            }
                                                                                            
                                                                                            
                                                                                            echo '</td>
                                                                                        <td class="text-center">₦'; 

                                                                                                
                                                                                            if($discountamount == '0')
                                                                                            {
                                                                                                    echo '0.00';
                                                                                            }else
                                                                                            {
                                                                                                echo  number_format($discountamount);
                                                                                            }
                                                                                            
                                                                                            
                                                                                        echo '</td>
                                                                                        
                                                                                        <td class="text-center">₦ '.number_format($TransactionIn).'</td>
                                                                                        <td class="text-center">₦  '.number_format($prosamount_deducted_balance).'</td>';

                                                                            }


                                                                    }   
                                                                    
                                                               ?>





                                                       
                                                </table>
                                            </div>
                                        </div>
                                        <div class="invoice-footer" align="center">
                                            <p>
                                                <a href="<?php echo $defaultUrl; ?>" class="btn-download" style="font-size:11px;text-decoration:none;color:black;">Powered by <span style="color:blue;font-size:12px;font-weight:600;">EduMESS</span></a>
                        
                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            
                        </div>
                        
                        <div id="non-printable-content">
                            <p>
                                <!-- <a href="#"class="btn btn-default ml15" onclick="printContent()"><i class="fa fa-print mr5"></i> Print</a> -->
                                <a href="#" class="btn btn-info ml15 btn-download"><i class="fa fa-print mr5"></i> Download PDF</a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        
                    </div>
                </div>
            </div>

        <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
        <!-- notification js -->
        <script src="../../assets/plugins/notify/wnoty.js"></script>
    
        <!-- image cropper js -->
        <script src="../../assets/plugins/Croppie/croppie.js"></script>
        <script src="../../assets/plugins/Croppie/croppie.min.js"></script>

    


        <script src="../../js/app_js/printtables/waves.js"></script>
        <script src="../../js/app_js/printtables/jspdf.debug.js"></script>
        <script src="../../js/app_js/printtables/html2canvas.min.js"></script>
        <script src="../../js/app_js/printtables/html2pdf.min.js"></script>
    
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <script type="text/javascript">
        function printContent() {
              // Get the HTML content you want to print
              var content = document.documentElement.innerHTML;
        
              // Open a new window
              var printWindow = window.open('', '_self');
        
              // Write the content to the new window
              printWindow.document.open();
              printWindow.document.write(content);
              printWindow.document.close();
        
              // Print the window
              printWindow.print();
        }
    </script>
    
    <script>
        const options = {
            margin: 0.5,
            filename: '<?php echo $fetchstudent['StudentFirstName'].'-'.$fetchstudent['UserRegNumberOrUsername'].'-'.$row_get_student_class['ClassOrDepartmentName'].'-'.$gettermaliasname_row['TermAliasName'].' Term'; ?>',
            image: { 
                type: 'png', 
                quality: 1080
            },
            html2canvas: { 
                scale: 1 
            },
            jsPDF: { 
                unit: 'in', 
                format: 'letter', 
                orientation: 'portrait' 
            }
        }
        
        $('.btn-download').click(function(e){
            // e.preventDefault();
            const element = document.getElementById('invoice');
            html2pdf().from(element).set(options).save();
        });
    
    </script>
</body>

</html>