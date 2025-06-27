<?php include('../../controller/session/session-checker-franchise.php'); ?>
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
        <title>EduMESS | Affiliates</title>
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
    
    <link href='https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css' rel='stylesheet'>

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- phone number country code -->
    <link href="../../assets/plugins/intlTelInput.min.css" rel="stylesheet"/>
    <script src="../../assets/plugins/intlTelInput.min.js"></script>

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <!-- image Croppie -->
    <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css"></link>
    
    <!-- Bootstrap Tagsinput CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

     <!-- Bootstrap Tagsinput JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script src="../../assets/plugins/dselect.js"></script>
    <script src="../../assets/plugins/sweetalert2@11.js"></script>
    
    <style>
        /* .qr-code {
            max-width: 200px;
            margin: 10px;
        } */
    </style>
</head>
<body>

    <!-- Loader -->
    <div id="gx-overlay">
    	<div class="gx-ellipsis">
    		<div></div>
    		<div></div>
    		<div></div>
    		<div></div>
    	</div>
    </div>

    <div class="grid-container" >
         <?php include('../../includes/affiliate-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/affiliate-menu.php'); ?>
        <!-- End Sidebar -->
      



        <!----Main----->
        <main class="main-container">

          
          
            <div class="main-cards" style="margin-top: 50px;">

                 <!-- Navbar pills -->
                 <div class="row">
                    <div class="col-sm-12">
                        <div style="background-color:#fff;padding: 35px 35px 35px 35px;margin-top:15px;">
                                <div class="row">
                                     <div class="col-md-10 col-lg-10"> </div>
                                     <div class="col-md-2 col-lg-2">
                                        <button type="button" style="float: right;font-size:10px;border:none;font-weight:500;"
                                            class="btn btn-sm btn-primary text-light " data-bs-toggle="modal"
                                            data-bs-target="#pros_create_owner_Modal"> <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19 17v2H7v-2s0-4 6-4s6 4 6 4m-3-9a3 3 0 1 0-3 3a3 3 0 0 0 3-3m3.2 5.06A5.6 5.6 0 0 1 21 17v2h3v-2s0-3.45-4.8-3.94M18 5a2.91 2.91 0 0 0-.89.14a5 5 0 0 1 0 5.72A2.91 2.91 0 0 0 18 11a3 3 0 0 0 0-6M8 10H5V7H3v3H0v2h3v3h2v-3h3Z" />
                                            </svg> Register School Owner</button>
                                           
                                      </div>
                                    </div>
                                     <br>
                                <div class="row">
                                    <!-- School Owners -->
                                    
                                    
                                    <div class="col-lg-3 mb-3">
                                        <div class="card h-100" style="border-radius: 0.1rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);">
                                            <div class="card-header fw-bold">School Owners</div>
                                            
                                            
                                            <ul class="list-group list-group-flush" id="ownerList">
                                               
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Schools and Summary -->
                                    <div class="col-lg-9 mb-3">
                                        <!-- 
                                      <div class="row">
                                            <div class="col-md-12 col-lg-4">
                                                <select style="color: #666666;" class="form-select form-select-sm mb-2"
                                                    aria-label=".form-select-sm example" id="pros_load_term_basesession">
                                                    <option value="NULL">Select Term</option>
                                                </select>
                                            </div>
                                      </div> -->

                                      <div class="card mb-3">
                                            <div class="card-header d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2">
                                                <span class="fw-bold">Schools</span>
                                                <input type="text" id="schoolSearch" class="form-control form-control-sm w-100 w-sm-auto" placeholder="Search school...">
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table mb-0" id="schoolsTable">
                                                    <thead>
                                                        <tr>
                                                            <th>School</th>
                                                            <th>Campuses</th>
                                                            <th>Students</th>
                                                            <th>Login URL</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Dynamic rows here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <!-- Summary -->
                                        <div class="card">
                                            <div class="card-body d-flex flex-wrap justify-content-around text-center pros_loaddash_boradcont">
                                               
                                                <!-- <div class="p-2 flex-fill"><i class="fas fa-wallet me-1"></i><strong>900</strong> Paid</div> -->
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                

                       
                            
                         </div>
                    
                    </div>
                </div>
                <!--/ Navbar pills -->
                    
        
            </div>


          
        </main>
        <!-- End Main -->


    </div>





        <!-- create owner -->
        <div class="modal fade modalshow modalfade" id="pros_create_owner_Modal" tabindex="-1"
            aria-labelledby="pros_create_owner_ModalLabel" aria-hidden="true">
            <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
                <div class="modal-content modalcontent" style="background-color:#ffffff; ">
        
                    <div class="modal-header">
                        <h5 class="modal-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M19 17v2H7v-2s0-4 6-4s6 4 6 4m-3-9a3 3 0 1 0-3 3a3 3 0 0 0 3-3m3.2 5.06A5.6 5.6 0 0 1 21 17v2h3v-2s0-3.45-4.8-3.94M18 5a2.91 2.91 0 0 0-.89.14a5 5 0 0 1 0 5.72A2.91 2.91 0 0 0 18 11a3 3 0 0 0 0-6M8 10H5V7H3v3H0v2h3v3h2v-3h3Z" />
                            </svg> Invite School Owner
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div style="position: fixed; margin-left: -10px; margin-top: -30px;">
                            
                        </div>
                        <!-- Navbar pills -->
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Nav tabs -->
                                <div class="col-sm-12">
                                    <ul class="nav nav-tabs mb-3 customtab" id="abba_ex1" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a
                                            class="nav-link active"
                                            id="abba_ex1-tab-10"
                                            data-bs-toggle="tab"
                                            href="#abba_ex1-tabs-10"
                                            role="tab"
                                            aria-controls="abba_ex1-tabs-10"
                                            aria-selected="true">Register School Owner</a>
                                        </li>
                                        <!-- <li class="nav-item" role="presentation">
                                            <a
                                            class="nav-link"
                                            id="abba_ex1-tab-20"
                                            data-bs-toggle="tab"
                                            href="#abba_ex1-tabs-20"
                                            role="tab"
                                            aria-controls="abba_ex1-tabs-20"
                                            aria-selected="false">Invite Via Email</a
                                            >
                                        </li> -->
                                    </ul>
                                    <div class="tab-content" id="ex1-content">
                                        <div class="tab-pane fade show active" id="abba_ex1-tabs-10" role="tabpanel" aria-labelledby="abba_ex1-tab-10">
                                            <input type="text" id="pros-text-to-copy" value="<?php echo $defaultUrl ?>signup?ref=<?php echo $referral_code; ?>" readonly style="border:none;width:100%;"><br><br>
                                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-file" id="copy-button"> Copy</i></button>
                                             <!-- Open Link in New Tab Button -->
                                                <a href="<?php echo $defaultUrl ?>signup?ref=<?php echo $referral_code; ?>" target="_blank" class="btn btn-info btn-sm">
                                                    <i class="fas fa-external-link-alt"></i> Open 
                                                </a>
                                                    <!-- Action Buttons -->
                                                <a href="whatsapp://send?text=<?php echo $defaultUrl ?>signup?ref=<?php echo $referral_code; ?>"  type="button" class="btn btn-success btn-sm" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"> Share via WhatsApp</i></a>

                                                <button type="button" class="btn btn-warning btn-sm" onclick="generateLeadSwal()">
                                                    <i class="fas fa-link"></i> Generate Lead Link
                                                </button>
                                        </div>
                                        
                                       
                                    </div>
                                    <!-- Tab panes -->
                                </div>
                            </div>
                        </div>
                        <!-- Navbar pills -->
                    </div>
                </div>
            </div>
        </div>

        <?php
            $affiliates = [];
            $sql = mysqli_query($link, "SELECT AffiliateID, AffiliateFName, 
            referral_code FROM affiliate WHERE AffiliateID != '$AffiliateID'");
            while ($row = mysqli_fetch_assoc($sql)) {
                $affiliates[] = [
                    'id' => $row['AffiliateID'],
                    'name' => $row['AffiliateFName'],
                    'ref' => $row['referral_code']
                ];
            }
            echo '<script>const allAffiliates = ' . json_encode($affiliates) . ';</script>';
        ?>


    <!--Script-->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
     <!--jquery knob -->
     <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <!--Custom JS--->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>

    <script src="../../js/admin_js/adminScript.js"></script>
    
    <!-- pagination js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>
    
    
      
    
    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>
    <?php include('../../controller/js/affiliate/schools.php'); ?>

    <script>

        function generateLeadSwal() {
            const leadReferralCode = "<?php echo $referral_code; ?>";
            const baseSignupUrl = "<?php echo $defaultUrl; ?>signup";
            
            let options = '<option value="">-- Select Main Affiliate --</option>';
            allAffiliates.forEach(aff => {
                options += `<option value="${aff.ref}">${aff.name}</option>`;
                // alert(aff.ref);
            });

            Swal.fire({
                title: 'Generate as Lead',
                html: `
                    <select id="mainAffiliateSelect" class="swal2-input" style="width:100%;">
                        ${options}
                    </select>
                    <input type="text" id="generatedLeadLink" class="swal2-input" placeholder="Generated link will appear here" readonly />
                `,
                confirmButtonText: 'Copy Link',
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                didOpen: () => {
                    const select = Swal.getPopup().querySelector('#mainAffiliateSelect');
                    const output = Swal.getPopup().querySelector('#generatedLeadLink');

                    select.addEventListener('change', () => {
                        const selectedRef = select.value;
                        if (selectedRef) {
                            const fullLink = `${baseSignupUrl}?ref=${selectedRef}&lead=${leadReferralCode}`;
                            output.value = fullLink;
                        } else {
                            output.value = '';
                        }
                    });
                },
                preConfirm: () => {
                    const link = Swal.getPopup().querySelector('#generatedLeadLink').value;
                    if (!link) {
                        Swal.showValidationMessage('Please select an affiliate first');
                        return false;
                    }
                    navigator.clipboard.writeText(link);
                    return Swal.fire('Copied!', 'Referral link copied to clipboard.', 'success');
                }
            });
        }
        
    </script>



    
    

    
    
    
    
</body>

</html>