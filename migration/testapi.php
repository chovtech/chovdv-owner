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
        <meta property="og:title" content="Your Title">
      <meta property="og:description" content="Your Description">
      <meta property="og:image" content="URL_to_your_image">

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
      
                      <div class="col-md-2 col-lg-2">
                            <button type="button"
                                style="margin-left: 10px; border-radius: 5px;"
                                class="btn btn-primary btn-lg prossharetofacebookbtn">Upload</button>
                        </div>
                        
                        <div id="fb-root"></div>
                         
                        <div id="custom-share-button">Share on Facebook</div>
                        
                        <button onclick="shareOnWhatsApp()">Share on WhatsApp</button>
                        
                        
                        <!--<div class="fb-share-button" id="custom-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="" data-size=""></div>-->
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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v19.0&appId=233900439118859" nonce="cDONKfNf"></script>
    
    
    <script>
    
    
                //                   document.getElementById('custom-share-button').addEventListener('click', function() {
                //                 // Image URL for the post (optional)
                //                 var imageUrl = 'https://example.com/image.jpg';
                            
                //                 // Text content for the post
                //                 var message = 'Check out this awesome image!';
                            
                //                 // Encode the message
                //                 var encodedMessage = encodeURIComponent(message);
                            
                //                 // Construct the Facebook Graph API endpoint URL for creating a post
                //                 var apiEndpoint = 'https://graph.facebook.com/me/feed';
                            
                //                 // Construct the post data
                //                 var postData = {
                //                   message: message,
                //                   link: window.location.href // URL to be attached to the post
                //                 };
                            
                //                 // Add image URL to post data if available
                //                 if (imageUrl) {
                //                   postData.picture = imageUrl;
                //                 }
                            
                //                 // Make a POST request to the Graph API endpoint
                //                 fetch(apiEndpoint, {
                //                   method: 'POST',
                //                   headers: {
                //                     'Content-Type': 'application/json',
                //                     'Authorization': 'Bearer EAAQJYsqgui4BO2qws2OazoyZAZCZAQrJCQnEDjhoax8sFCZBvAZBqo0GcsjUgTVLIcIXNgc3WyTXFZAmLnZAubqLxitAdSzH9JY1C8PO4zDIlph0GBkZAMdWAZCsZAjb47WhUBAkGYja8V7tEisp7qnsYPwwCgW5oEbXQVoRmPjHUuzq5f3NaBz4HKtuPBiFLIbUX2Ju5MzDZBVjc7bstGZCSVZCiBuU982qjYrGg6gZDZD'
                //                   },
                //                   body: JSON.stringify(postData)
                //                 })
                //                 .then(response => response.json())
                //                 .then(data => {
                //                   console.log('Post created:', data);
                //                   alert('Post created successfully!');
                //                 })
                //                 .catch(error => {
                //                   console.error('Error creating post:', error);
                //                   alert('Error occurred while creating post. Please try again later.');
                //                 });
                //   });
                    

                      // Define the fbAsyncInit function outside of the click event handler
                    window.fbAsyncInit = function() {
                        // Initialize the Facebook SDK
                        FB.init({
                            appId      : '1136219817818670',
                            cookie     : true,
                            xfbml      : true,
                            version    : 'v19.0'
                        });
                        
                        // Log page view event
                        FB.AppEvents.logPageView();
                    };





                 
                // Load the Facebook SDK asynchronously
                (function(d, s, id){
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.id = id;
                    js.src = "https://connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                
                // When the button is clicked
                $('body').on('click', '.prossharetofacebookbtn', function() {
                    // Call the postToFacebook function
                
                
                
                                        // Replace 'YOUR_ACCESS_TOKEN' with the user access token you generated
                                    // var accessToken = 'EAANFFQKQGj0BOw9NxmW7Y7ykQ9IaG4baRoNJZApNArqxW93kfbIZBja8KKKzHQX1ZAS3IwX62OMPwMyZBrmAUIJjcyfjWm1kkZCcEVJo9cHeAzsDtVG4VG3s7vquaZCMlzbaKQlWmjrZCzAmIqQMOMZBKbzrfko7ig8quYrZAgkuZAcetlPAWKMLkv6mxYnfvUxh8vpYmViLJPJq7hZBaUXdTt0YB84t887GT2FUQZDZD';
                
                                    // // Make a request to the Facebook Graph API to fetch the user's profile information
                                    // FB.api('/1439131856980126', { access_token: accessToken }, function(response) {
                                    // if (response && !response.error) {
                                    //     console.log('User name:', response.name);
                                    //     console.log('User ID:', response.id);
                
                                    //     alert(response.name);
                                    //     // You can access other user profile fields here
                                    // } else {
                                    //     console.error('Error occurred while fetching user profile:', response.error);
                                    // }
                
                
                                    // "1439131856980126",
                                    // });
                
                
                                 // Check if the URL contains an access token
                                    // const urlParams = new URLSearchParams(window.location.search);
                                    // const accessToken = urlParams.get('EAANFFQKQGj0BOw9NxmW7Y7ykQ9IaG4baRoNJZApNArqxW93kfbIZBja8KKKzHQX1ZAS3IwX62OMPwMyZBrmAUIJjcyfjWm1kkZCcEVJo9cHeAzsDtVG4VG3s7vquaZCMlzbaKQlWmjrZCzAmIqQMOMZBKbzrfko7ig8quYrZAgkuZAcetlPAWKMLkv6mxYnfvUxh8vpYmViLJPJq7hZBaUXdTt0YB84t887GT2FUQZDZD');
                
                                    // if (accessToken) {
                                    // // Access token is present, user has granted permission
                                    // // Use the access token to make API requests
                                    //      alert('Access token:', accessToken);
                                    // } else {
                                    // // Access token is not present, user may not have granted permission
                                    //       alert('Access token not found. User may have denied permission.');
                                    //  }
                
                
                
                
                
                
                
                    postToFacebook();
                });
                
                
                

                // Function to post to Facebook
                function postToFacebook() {


                    
                    // 1136219817818670
                    
                    
                      // Replace 'YOUR_ACCESS_TOKEN' with the user access token you generated
                    // var accessToken = 'EAANFFQKQGj0BOw9NxmW7Y7ykQ9IaG4baRoNJZApNArqxW93kfbIZBja8KKKzHQX1ZAS3IwX62OMPwMyZBrmAUIJjcyfjWm1kkZCcEVJo9cHeAzsDtVG4VG3s7vquaZCMlzbaKQlWmjrZCzAmIqQMOMZBKbzrfko7ig8quYrZAgkuZAcetlPAWKMLkv6mxYnfvUxh8vpYmViLJPJq7hZBaUXdTt0YB84t887GT2FUQZDZD';

                    // Make a request to the Facebook Graph API to fetch the user's profile information
                  
              
                    
                    
                    FB.api(
                        '/me/feed',
                        'POST',
                        { 
                            message: 'Hello, Facebook! This is a test post from my website.'
                        },
                        function(response) {
                            if (!response || response.error) {
                                alert('Error occurred while posting to Facebook. Please try again later.');
                                console.error('Error occurred while posting to Facebook:', response.error);
                            } else {
                                alert('Post successful! Post ID: ' + response.id);
                                console.log('Post successful! Post ID:', response.id);
                            }
                        }
                    );
                }
                
                
                
                
                
                
                function shareOnWhatsApp() {
                    
                        var title = encodeURIComponent(document.querySelector('meta[property="og:title"]').getAttribute('content'));
                        var description = encodeURIComponent(document.querySelector('meta[property="og:description"]').getAttribute('content'));
                        var imageUrl = encodeURIComponent(document.querySelector('meta[property="og:image"]').getAttribute('content'));
                    
                        var shareUrl = 'whatsapp://send?text=' + title + '%0A' + description + '%0A' + imageUrl;
                    
                        // Open WhatsApp app with the share URL
                        window.location.href = shareUrl;
              }
                            
                        
        
    </script>

 

</body>

</html>