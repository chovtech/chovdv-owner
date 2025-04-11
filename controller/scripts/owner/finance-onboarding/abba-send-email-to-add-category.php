<?php
    include('../../../config/config.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer-master/Exception.php';
    require '../PHPMailer-master/PHPMailer.php';
    require '../PHPMailer-master/SMTP.php';

    $category_id = $_POST['category_id'];
    $item_old = $_POST['items'];

    $items = explode(',',$_POST['items']);

    $list = '';

    foreach($items as $item){

        $item;

        $list .= '<li>'.$item.'</li>';

    }

    $list_new = $list;

    $campus_id = $_POST['campus_id'];

    $abba_instituion_id = $_POST['abba_instituion_id'];
    
    $user_id = $_POST['user_id'];

    $user_type = $_POST['user_type'];

    $sql_campus = mysqli_query($link, "SELECT * FROM `campus` WHERE CampusID = '$campus_id'");
    $sql_campus_fetch = mysqli_fetch_assoc($sql_campus);

    $CampusName = $sql_campus_fetch['CampusName'];

    $sql_campus = mysqli_query($link, "SELECT * FROM `campus` WHERE CampusID = '$campus_id'");
    $sql_campus_fetch = mysqli_fetch_assoc($sql_campus);

    $CampusName = $sql_campus_fetch['CampusName'];

    $sql_category = mysqli_query($link, "SELECT * FROM `category` WHERE CategoryID = '$category_id'");
    $sql_category_fetch = mysqli_fetch_assoc($sql_category);

    $CategoryName = $sql_category_fetch['CategoryTitle'];

    $selectserveretails = mysqli_query($link, "SELECT * FROM `serverpassword`");
    $selectserveretailscnt = mysqli_fetch_assoc($selectserveretails);

    $servername = $selectserveretailscnt['ServerName'];
    $serverpwd = $selectserveretailscnt['ServerPassword'];

    
    $email_to = 'support@edumess.com'; // Replace with the recipient's email address
    $delivery = 'hello@edumess.com'; // Replace with the sender's email address
    $subject = 'Request for Addition of Subcategories/Items'; // Email subject
    $subject_encoded = mb_encode_mimeheader($subject, 'UTF-8'); // Encode subject if needed

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Enable or disable debugging as needed
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'chovgroup.com'; // SMTP server
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = $servername; // SMTP username
        $mail->Password = $serverpwd; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Implicit TLS encryption
        $mail->Port = 465; // SMTP port; use 587 for STARTTLS if needed

        // Recipients
        $mail->setFrom($delivery, $schoolname);
        $mail->addAddress($email_to); // Recipient's email address (support@edumess.com)
        $mail->addReplyTo($delivery, $schoolname); // Reply-to address

        // Email content
        $message = '
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    /* Add your inline CSS styles here */
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                    }
                    .header {
                        background-color: #007ffb;
                        color: #fff;
                        padding: 10px;
                        text-align: center;
                    }
                    .content {
                        padding: 20px;
                    }
                    .message {
                        font-size: 16px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h1>Request for Addition of Subcategories/Items ('.$CampusName.')</h1>
                    </div>
                    <div class="content">
                        <p class="message">I am writing to request the addition of the following subcategories/items under Category ID "'.$category_id.'":</p>
                        <ul>

                            '.$list_new.'
                        </ul>
                        <p class="message">Your prompt attention to this matter is greatly appreciated.</p>
                    </div>
                </div>
            </body>
            </html>';

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject_encoded;
        $mail->Body = $message;

        // Send the email
        $mail->send();
        
        $discription = 'Sent a request for addition of subcategories ('.$item_old.') under the category ('.$CategoryName.')';

        date_default_timezone_set("Africa/Lagos");

        $date = date("Y-m-d H:i:s");

        $insert_activity_log = mysqli_query($link,"INSERT INTO `activitylog`(`ActitvityLogID`, `InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) VALUES (NULL,'$abba_instituion_id','$user_id','$user_type','0','0','0','0','$discription','$date')");

        // Email sent successfully
        echo 1;

    } 
    catch (Exception $e) {
        // Email sending failed
        echo 0;
    }
?>