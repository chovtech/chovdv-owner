<?php
    include('../../controller/session/session-checker-owner.php');
    if ($DefaultLanguage == '') {
        include('../../lang/english.php');
    } else {
        include('../../lang/' . $DefaultLanguage . '.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EduMESS" />
    <meta name="description" content="EduMESS (Education Management and E-Learning Software Solution) is a leading school management, automation and elearning solution." />
    <meta name="keywords" content="Best, School, Management, Best School, Best School Management, Best School Management Software, Free School Management Software, Portal, School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator">
    <title>EduMESS - Support System</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" href="../../assets/images/website_images/favicon.png">

    <!-- Core CSS -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">
    <link rel="stylesheet" href="../../css/app_css/schemework.css">
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    
        <!-- Calendly link widget begin -->
        <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
        <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>

    <style>
        :root {
            --primary-color: #0066FF;
            --secondary-color: #1e00c9;
            --text-color: #2D3748;
            --light-text: #718096;
            --border-color: #E2E8F0;
            --success-color: #48BB78;
            --background-light: #F7FAFC;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            background-color: var(--background-light);
        }

        .support-section {
            padding: 4rem 2rem;
            background: var(--background-light);
        }

        .support-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .support-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1rem;
        }

        .support-header p {
            color: var(--light-text);
            max-width: 600px;
            margin: 0 auto;
        }

        .meeting-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .meeting-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
        }

        .meeting-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .meeting-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--background-light);
        }

        .meeting-icon i {
            font-size: 2.5rem;
            color: var(--primary-color);
        }

        .meeting-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .meeting-card p {
            color: var(--light-text);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .meeting-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--primary-color);
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .meeting-button:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .schedule-form {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-top: 3rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
        }

        .submit-button {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-button:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .support-info {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 16px;
            padding: 3rem 2rem;
            text-align: center;
            color: white;
            margin: 2rem auto;
            max-width: 800px;
        }

        .support-info h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .support-info p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }

        .support-contact {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem 2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .contact-item i {
            font-size: 1.5rem;
        }

        .contact-item span {
            font-weight: 500;
        }

        .whatsapp-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: white;
        }

        .whatsapp-button i {
            font-size: 1.5rem;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }

        .form-control.error {
            border-color: #dc3545;
        }

        .form-control.error:focus {
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }

        .form-control.success {
            border-color: var(--success-color);
        }

        .form-control.success:focus {
            box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.1);
        }

        @media (max-width: 768px) {
            .support-section {
                padding: 2rem 1rem;
            }

            .meeting-options {
                grid-template-columns: 1fr;
            }

            .schedule-form {
                margin: 2rem 1rem;
            }

            .support-info {
                margin: 1rem;
                padding: 2rem 1rem;
            }

            .support-contact {
                flex-direction: column;
                gap: 1rem;
            }
        }



        .coming_soon {
            position: relative;
        }
        
        .coming_soon::after {
            content: "Coming Soon...";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7); /* White with transparency */
            backdrop-filter: blur(1px); /* Apply blur effect */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="grid-container">
        <!-- Header -->
        <?php include('../../includes/app-header.php'); ?>
        
        <!-- Sidebar -->
        <?php include('../../includes/app-menu.php'); ?>
        
        <!-- Floating Button -->
        <?php include('../../includes/floating-btn.php'); ?>
        
        <!-- Settings Menu -->
        <?php include('../../includes/setting-menu.php'); ?>

        <!-- Main Content -->
        <main class="main-container">
            <div class="support-section">
                <div class="support-header">
                    <h2>Get Support</h2>
                    <p>Schedule a meeting with our support team for personalized assistance. Choose your preferred platform and find a time that works for you.</p>
                </div>

                <div class="meeting-options">
                    <div class="meeting-card">
                        <div class="meeting-icon">
                            <i class='bx bxl-google'></i>
                        </div>
                        <h3>Google Meet</h3>
                        <p>Schedule a meeting with our support team using Google Meet. Perfect for quick consultations and technical support.</p>
                        <a style="cursor:pointer;" class="meeting-button" data-platform="google" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/d/cncj-9ny-28b/edumess-support'});return false;">Schedule Google Meet</a>
                        <!-- <a href="#"   onclick="Calendly.initPopupWidget({url: https://calendly.com/d/cncj-9ny-28b/edumess-support'}); return false;" data-platform="google">Schedule Google Meet</a> -->
                    </div>

                    <div class="meeting-card coming_soon">
                        <div class="meeting-icon">
                            <i class='bx bxl-zoom'></i>
                        </div>
                        <h3>Zoom Meeting</h3>
                        <p>Connect with our support team via Zoom for in-depth discussions and detailed technical assistance.</p>
                        <a href="#" class="meeting-button" data-platform="zoom">Schedule Zoom Call</a>
                    </div>
                </div>

                <!-- <div class="schedule-form" style="display: none;">
                    <h3 class="text-center mb-4">Schedule Your Meeting</h3>
                    <form id="meetingForm" novalidate>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" required 
                                   pattern="[A-Za-z\s]{2,50}" 
                                   title="Please enter a valid name (2-50 characters, letters only)">
                            <div class="error-message" id="nameError">Please enter a valid name (2-50 characters, letters only)</div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="error-message" id="emailError">Please enter a valid email address</div>
                        </div>
                        <div class="form-group">
                            <label for="date">Preferred Date</label>
                            <input type="date" class="form-control" id="date" required 
                                   min="<?php echo date('Y-m-d'); ?>">
                            <div class="error-message" id="dateError">Please select a valid date</div>
                        </div>
                        <div class="form-group">
                            <label for="time">Preferred Time</label>
                            <input type="time" class="form-control" id="time" required>
                            <div class="error-message" id="timeError">Please select a valid time</div>
                        </div>
                        <div class="form-group">
                            <label for="topic">Meeting Topic</label>
                            <textarea class="form-control" id="topic" rows="3" required 
                                      minlength="10" maxlength="500"></textarea>
                            <div class="error-message" id="topicError">Please enter a topic (10-500 characters)</div>
                        </div>
                        <button type="submit" class="submit-button">Schedule Meeting</button>
                    </form>
                </div> -->

                <div class="support-info">
                    <h3>Need Immediate Assistance?</h3>
                    <p>Our support team is available on WhatsApp for quick responses to your queries.</p>
                    <div class="support-contact">
                        <a href="https://wa.me/2347045277801" class="whatsapp-button" target="_blank">
                            <i class='bx bxl-whatsapp'></i>
                            <span>Chat on WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>
    <script src="../../assets/plugins/notify/wnoty.js"></script>
    <script src="../../js/admin_js/adminScript.js"></script>

    <script>

        // $(document).ready(function() {
        //     // Initialize knob
        //     $('[data-plugin="knob"]').knob();

        //     // Form validation functions
        //     function validateName(name) {
        //         const regex = /^[A-Za-z\s]{2,50}$/;
        //         return regex.test(name);
        //     }

        //     function validateEmail(email) {
        //         const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        //         return regex.test(email);
        //     }

        //     function validateDate(date) {
        //         const selectedDate = new Date(date);
        //         const today = new Date();
        //         today.setHours(0, 0, 0, 0);
        //         return selectedDate >= today;
        //     }

        //     function validateTime(time) {
        //         return time !== '';
        //     }

        //     function validateTopic(topic) {
        //         return topic.length >= 10 && topic.length <= 500;
        //     }

        //     // Real-time validation
        //     $('#name').on('input', function() {
        //         const isValid = validateName(this.value);
        //         $(this).toggleClass('error', !isValid).toggleClass('success', isValid);
        //         $('#nameError').toggle(!isValid);
        //     });

        //     $('#email').on('input', function() {
        //         const isValid = validateEmail(this.value);
        //         $(this).toggleClass('error', !isValid).toggleClass('success', isValid);
        //         $('#emailError').toggle(!isValid);
        //     });

        //     $('#date').on('change', function() {
        //         const isValid = validateDate(this.value);
        //         $(this).toggleClass('error', !isValid).toggleClass('success', isValid);
        //         $('#dateError').toggle(!isValid);
        //     });

        //     $('#time').on('change', function() {
        //         const isValid = validateTime(this.value);
        //         $(this).toggleClass('error', !isValid).toggleClass('success', isValid);
        //         $('#timeError').toggle(!isValid);
        //     });

        //     $('#topic').on('input', function() {
        //         const isValid = validateTopic(this.value);
        //         $(this).toggleClass('error', !isValid).toggleClass('success', isValid);
        //         $('#topicError').toggle(!isValid);
        //     });

        //     // Support System Code
        //     $('.meeting-button').click(function(e) {
        //         e.preventDefault();
        //         const platform = $(this).data('platform');
        //         $('.schedule-form').slideDown();
        //         $('#meetingForm').data('platform', platform);
        //     });

        //     $('#meetingForm').submit(function(e) {
        //         e.preventDefault();
                
        //         // Validate all fields
        //         const name = $('#name').val();
        //         const email = $('#email').val();
        //         const date = $('#date').val();
        //         const time = $('#time').val();
        //         const topic = $('#topic').val();

        //         const isNameValid = validateName(name);
        //         const isEmailValid = validateEmail(email);
        //         const isDateValid = validateDate(date);
        //         const isTimeValid = validateTime(time);
        //         const isTopicValid = validateTopic(topic);

        //         // Show/hide error messages
        //         $('#nameError').toggle(!isNameValid);
        //         $('#emailError').toggle(!isEmailValid);
        //         $('#dateError').toggle(!isDateValid);
        //         $('#timeError').toggle(!isTimeValid);
        //         $('#topicError').toggle(!isTopicValid);

        //         // Update input classes
        //         $('#name').toggleClass('error', !isNameValid).toggleClass('success', isNameValid);
        //         $('#email').toggleClass('error', !isEmailValid).toggleClass('success', isEmailValid);
        //         $('#date').toggleClass('error', !isDateValid).toggleClass('success', isDateValid);
        //         $('#time').toggleClass('error', !isTimeValid).toggleClass('success', isTimeValid);
        //         $('#topic').toggleClass('error', !isTopicValid).toggleClass('success', isTopicValid);

        //         if (isNameValid && isEmailValid && isDateValid && isTimeValid && isTopicValid) {
        //             const platform = $(this).data('platform');
                    
        //             const formDatanew = {
        //                 'name': name,
        //                 'email': email,
        //                 'date': date,
        //                 'time': time,
        //                 'topic': topic,
        //                 'platform': platform
        //             };

        //             // console.log('Meeting scheduled:', formDatanew);



        //             // Send AJAX request to backend
        //             $.ajax({
        //                 url: '../../controller/scripts/support/schedule-meeting.php',
        //                 type: 'POST',
        //                 data: { 
        //                     ...formDatanew},
        //                 // dataType: 'json',
        //                 // processData: false,
        //                 // contentType: false,
        //                 beforeSend: function() {
        //                     // Show loading state
        //                     $('.submit-button').prop('disabled', true).html('<i class="bx bx-loader-alt bx-spin"></i> Scheduling...');
        //                 },
        //                 success: function(response) {

        //                     alert(response.message);
        //                     // if (response.status === 'success') {
        //                     //     // Show success message
        //                     //     $.notify({
        //                     //         message: response.message || 'Meeting scheduled successfully! We will contact you shortly.'
        //                     //     }, {
        //                     //         type: 'success',
        //                     //         placement: {
        //                     //             from: 'top',
        //                     //             align: 'right'
        //                     //         }
        //                     //     });

        //                     //     // Reset form and hide it
        //                     //     $('#meetingForm')[0].reset();
        //                     //     $('.schedule-form').slideUp();
        //                     // } else {
        //                     //     // Show error message
        //                     //     $.notify({
        //                     //         message: response.message || 'Failed to schedule meeting. Please try again.'
        //                     //     }, {
        //                     //         type: 'danger',
        //                     //         placement: {
        //                     //             from: 'top',
        //                     //             align: 'right'
        //                     //         }
        //                     //     });
        //                     // }
        //                 },
        //                 error: function(xhr, status, error) {
        //                     // Show error message
        //                     // $.notify({
        //                     //     message: 'An error occurred. Please try again later.'
        //                     // }, {
        //                     //     type: 'danger',
        //                     //     placement: {
        //                     //         from: 'top',
        //                     //         align: 'right'
        //                     //     }
        //                     // });
        //                     alert('Error:', error);
        //                     console.error('Error:', error);
        //                 },
        //                 complete: function() {
        //                     // Reset button state
        //                     $('.submit-button').prop('disabled', false).html('Schedule Meeting');
        //                 }
        //             });
                    
        //             // Show success message
        //             // $.notify({
        //             //     message: 'Meeting scheduled successfully! We will contact you shortly.'
        //             // }, {
        //             //     type: 'success',
        //             //     placement: {
        //             //         from: 'top',
        //             //         align: 'right'
        //             //     }
        //             // });

        //             // // Reset form
        //             // this.reset();
        //             // $('.schedule-form').slideUp();
        //         }
        //     });
        // });
    </script>
</body>
</html>