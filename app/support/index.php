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

        .support-info {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 16px;
            padding: 3rem 2rem;
            text-align: center;
            color: white;
            margin: 2rem auto;
            max-width: 800px;
            position: relative;
            overflow: hidden;
        }

        .support-image {
            margin-bottom: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .support-image img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            display: block;
            margin: 0 auto;
        }

        .support-image img:hover {
            transform: scale(1.05);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .support-info h3 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .support-info p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .support-contact {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
            position: relative;
            z-index: 1;
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
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem 2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .whatsapp-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            color: white;
        }

        .whatsapp-button i {
            font-size: 1.5rem;
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
            background-color: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(1px);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .support-section {
                padding: 2rem 1rem;
            }

            .meeting-options {
                grid-template-columns: 1fr;
            }

            .support-info {
                margin: 1rem;
                padding: 2rem 1rem;
            }

            .support-image img {
                width: 100px;
                height: 100px;
            }

            .support-contact {
                flex-direction: column;
                gap: 1rem;
            }
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

                <div class="support-info">
                    <div class="support-image">
                        <img src="https://edumess.com/assets/images/users/edusupport.png" alt="Customer Support Team">
                    </div>
                    <h3>Need Immediate Assistance?</h3>
                    <p>Our support team is available on WhatsApp for quick responses to your queries.</p>
                    <div class="support-contact">
                        <a href="https://wa.me/<?php echo $consultant_whats_appno; ?>" class="whatsapp-button" target="_blank">
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
</body>
</html>