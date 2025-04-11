<?php 
      include('../controller/config/config.php'); 

     include('../controller/config/config2.php');

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
    <link href="../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <!-- html2pdf CDN link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
        
    
</head>

<body>

    <div class="grid-container" >

       
       
        <!----Main----->
        <main class="main-container">

            
                     <div class="main-cards" style="margin-top: 50px;">
                <div class="container">
                    <h1>Upload File</h1>
                    <div class="row g-2 mt-3">
                        <div class="col-md-2 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm pros_get_campus"
                                aria-label=".form-select-sm example">
                                <option value="NULL">CAMPUS</option>

                              <?php
                                $pros_sql_campus = ("SELECT * FROM `campus` WHERE CampusName != 'Virtual campus' ORDER BY CampusName ASC");
                                $pros_query_link_campus = mysqli_query($link, $pros_sql_campus);
                                $pros_get_details_campus = mysqli_fetch_assoc($pros_query_link_campus);
                                $pros_row_cnt_campus = mysqli_num_rows($pros_query_link_campus);

                                echo '<option value="NULL">Select Campus</option>';

                                if ($pros_row_cnt_campus > 0) {
                                    $cnt = 0;

                                    do {
                                        $cnt++;

                                        $pros_campus_id = $pros_get_details_campus['CampusID'];

                                        $pros_campus_name = $pros_get_details_campus['CampusName'];

                                        echo '<option value="' . $pros_campus_id . '">' . $pros_campus_name . '</option>';

                                    } while ($pros_get_details_campus = mysqli_fetch_assoc($pros_query_link_campus));
                                } else {
                                    echo '<option value="NULL">No Records Found</option>';
                                }
                                ?>

                            </select>
                        </div>


                       
                        
                    </div>
                    
                    <div class="row g-2 mt-3 hide_me">
                        <!--<div class="col-md-5 col-lg-5">-->
                        <!--    <input type="file" class="csv_file">-->
                        <!--</div>-->


                        <div class="col-md-2 col-lg-2">
                            <button type="button"
                                style="margin-left: 10px; border-radius: 5px;"
                                class="btn btn-primary btn-lg pros_final_upload">Upload</button>
                        </div>

                    </div>
                </div>

            </div>
            
                   <?php 
                   
                   
                   
                   
                   
                   
                   
                   
                        //  $password = trim(md5($_POST['pwd']));
                        //  $password = mysqli_real_escape_string($link, $password);
                                         
                                    
                                
                                 $pros_sql_conveertstudentimage = ("SELECT * FROM `userlogin` WHERE UserType='student'");
                                $pros_query_link_conveertstudentimage = mysqli_query($link_abba, $pros_sql_conveertstudentimage);
                                $pros_get_details_conveertstudentimage = mysqli_fetch_assoc($pros_query_link_conveertstudentimage);
                                $pros_row_cnt_conveertstudentimage = mysqli_num_rows($pros_query_link_conveertstudentimage);
                                
                               
                                
                                   
                                if( $pros_row_cnt_conveertstudentimage > 0)
                                {
                                        do{
                                            

                                        
                                        
                                            $UserPassword = $pros_get_details_conveertstudentimage['UserPassword'];    
                                            $UserID = $pros_get_details_conveertstudentimage['UserID']; 
                                            $UserRegNumberOrUsername = $pros_get_details_conveertstudentimage['UserRegNumberOrUsername']; 
                                            
                                            
                                            
                                                               
                                                 $password = trim(md5($UserPassword ));
                                                 $password = mysqli_real_escape_string($link, $password);
                                                 
                                                 
                                                 $upateuserulogin = mysqli_query($link,"UPDATE `userlogin` SET `UserRegNumberOrUsername`='$UserRegNumberOrUsername', `UserPassword`='$password' WHERE `UserType`='student'  AND UserID='$UserID'");
                                            
                                            
                                            
                                            
                                            
                                        }while($pros_get_details_conveertstudentimage = mysqli_fetch_assoc($pros_query_link_conveertstudentimage));
                                }else
                                {
                                    
                                }
                                
                                
                                
                                

                   
                   ?>   
            
            
                    

        </main>
        <!-- End Main -->

    </div>

        </main>
        <!-- End Main -->

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
    <script src="../assets/plugins/notify/wnoty.js"></script>
    
    <script>
        
        
        
        
     $('body').on('click', '.pros_final_upload', function () {
         
         
         
         
         
         
         
         $(".prosgetstaffimageandupdatecontent").each(function () {
    var imageUrl = $(this).val();
    var staffid = $(this).data('stud');

    function resizeAndConvertToBase64(url, maxWidth, maxHeight, callback) {
        var img = new Image();

        img.onload = function () {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var width = img.width;
            var height = img.height;

            if (width > height) {
                if (width > maxWidth) {
                    height *= maxWidth / width;
                    width = maxWidth;
                }
            } else {
                if (height > maxHeight) {
                    width *= maxHeight / height;
                    height = maxHeight;
                }
            }

            canvas.width = width;
            canvas.height = height;
            ctx.drawImage(img, 0, 0, width, height);

            var base64Image = canvas.toDataURL('image/jpeg'); // Adjust the type if needed

            // Callback with the resized and base64-encoded image
            callback(base64Image);
        };

        img.onerror = function () {
            console.error('Error loading image:', url);
            // Handle the error here, such as displaying a placeholder or skipping further processing
            // Example: callback(null);
        };

        img.src = url;
    }

    // Set your desired maxWidth and maxHeight
    var maxWidth = 300;
    var maxHeight = 300;

    // Check if the URL is not empty
    if (imageUrl) {
        // Usage
        resizeAndConvertToBase64(imageUrl, maxWidth, maxHeight, function (base64String) {
            if (base64String) {
                loadbasecontent(base64String, staffid);
                console.log(base64String);
            } else {
                console.log('Image not found or could not be loaded:', imageUrl);
            }
        });
    } else {
        console.log('Empty image URL for staff ID:', staffid);
    }
});

function loadbasecontent(base64String, staffid) {
    // Your code to handle the resized and base64-encoded image
    // alert(base64String);
                    
               
                
                
                
                
                
                // $.ajax({
                //         type: "POST",
                //         url: "scripts/categoryandsub/prosupdatestudentimage.php",
                //         data: {
                //             base64String: base64String,staffid:staffid
                //         },
                //         //cache: false,
                //         success: function (output) {
                //                 alert(output);
                //         }
                        
                // });
            // alert(output);

    
    
    
    
    
    
}

           
                
           
        });
        
    </script>
    

</body>

</html>