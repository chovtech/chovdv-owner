<?php include('../controller/config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EduMESS" />
    <meta name="description" content="EduMESS (Education Management and E-Learning Software Solution) 
        is a leading school management, automation and elearning solution. Since its 
        launch, EduMESS has grown to become a leader. Our clients say that the simplicity 
        of our interface, ease of use, cost effectiveness and excellent customer care is 
        the reason they prefare EduMESS. We have watched schools move from softwares they 
        are using to EduMESS." />
    <meta name="keywords" content="Best, School, Management, Best School, Best School Management, 
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

    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-..." crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha3/css/bootstrap.min.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <!-- html2pdf CDN link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <div class="grid-container">
        
        
        
        <?php
        
        
                        $prosverifycbt_content = mysqli_query($link, "SELECT * FROM `questionbank` WHERE QuestionBankID > 988"); 
                            
                            
                            
                            
                            
                               $prosverifycbt_content_fetch = mysqli_fetch_assoc($prosverifycbt_content);
                               $prosverifycbt_contentcnt = mysqli_num_rows($prosverifycbt_content);
                               
                               
                               
                               if( $prosverifycbt_contentcnt > 0)
                               {
                                   
                                      do{
                                          
                                                                      
                                                                      
                                                                      
                                                      $CampusID = $prosverifycbt_content_fetch['CampusID'];
                                                       $ClassOrDepartmentID = $prosverifycbt_content_fetch['ClassOrDepartmentID'].'<br>';
                                                       $QuestionBankID = $prosverifycbt_content_fetch['QuestionBankID'];
                                                      
                                                      
                                                      
                                                       
                                                      
                                                      $prosgetsection = mysqli_query($link, "SELECT * FROM `classordepartment` 
                                                      WHERE CampusID='$CampusID' AND ClassOrDepartmentID='$ClassOrDepartmentID'");
                                                      
                                                          $prosgetsection_cntrow = mysqli_fetch_assoc($prosgetsection);
                                                         $prosgetsectioncnt  = mysqli_num_rows($prosgetsection);
                                                           
                                                      
                                                        if($prosgetsectioncnt > 0)
                                                        {
                                                            
                                                            
                                                            
                                                            
                                                            
                                                                     $ClassTemplateID =  $prosgetsection_cntrow['ClassTemplateID'];
                                                                     
                                                                     
                                                                     $updatesettings = mysqli_query($link,"UPDATE `questionbank` SET ClassOrDepartmentID='$ClassTemplateID' WHERE ClassOrDepartmentID='$ClassOrDepartmentID' AND CampusID='$CampusID' AND QuestionBankID ='$QuestionBankID'");
                                                                     
                                                                
                                                              
                                                              
                                                              
                                                              if($updatesettings == true)
                                                              {
                                                                    echo 'hello';
                                                              }else
                                                              {
                                                                  echo 'failed';
                                                              }
                                                            
                                                        }else
                                                        {
                                                            
                                                        }
                                               
                                              
                                              
                                      }while($prosverifycbt_content_fetch = mysqli_fetch_assoc($prosverifycbt_content));      
                                              
                              }else
                              {
                                    echo 'not found';
                              }
        ?>



                

                            
      

    </div>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="../../js/app_js/printtables/waves.js"></script>
    <script src="../../js/app_js/printtables/jspdf.debug.js"></script>
    <script src="../../js/app_js/printtables/html2canvas.min.js"></script>
    <script src="../../js/app_js/printtables/html2pdf.min.js"></script>

    <!--Custom JS--->
    <script src="../../js/app_js/appScript.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- onboarding js -->
    <script src="../../controller/js/app/finance-onboarding.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

 

</body>

</html>