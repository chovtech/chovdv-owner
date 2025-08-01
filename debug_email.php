<?php
// Debug Email Script - Force test email sending
// Place this in your root directory and run it to test email functionality

// Include database connection
require_once('controller/config/config.php');

echo "<h1>Email Debug Test</h1>";

// Test 1: Check if the subscription reminder log table exists
echo "<h2>1. Checking Database Tables</h2>";
$tableCheck = mysqli_query($link, "SHOW TABLES LIKE 'subscription_reminder_log'");
if (mysqli_num_rows($tableCheck) > 0) {
    echo "<p style='color: green;'>✅ subscription_reminder_log table exists</p>";
} else {
    echo "<p style='color: red;'>❌ subscription_reminder_log table does not exist</p>";
}

// Test 2: Check serverpassword table
$smtpCheck = mysqli_query($link, "SHOW TABLES LIKE 'serverpassword'");
if (mysqli_num_rows($smtpCheck) > 0) {
    echo "<p style='color: green;'>✅ serverpassword table exists</p>";
    
    $smtpData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM serverpassword LIMIT 1"));
    if ($smtpData) {
        echo "<p><strong>SMTP Host:</strong> " . ($smtpData['Host'] ?: 'Not set') . "</p>";
        echo "<p><strong>SMTP User:</strong> " . ($smtpData['ServerName'] ?: 'Not set') . "</p>";
        echo "<p><strong>SMTP Password:</strong> " . ($smtpData['ServerPassword'] ? 'Set' : 'Not set') . "</p>";
    } else {
        echo "<p style='color: red;'>❌ No SMTP configuration found in serverpassword table</p>";
    }
} else {
    echo "<p style='color: red;'>❌ serverpassword table does not exist</p>";
}

// Test 3: Check school owner data
echo "<h2>2. Checking School Owner Data</h2>";
$testUserID = 1; // Change this to a valid UserID
$ownerCheck = mysqli_query($link, "
    SELECT * FROM `institution` 
    INNER JOIN `agencyorschoolowner` 
    ON `institution`.`AgencyOrSchoolOwnerID` = `agencyorschoolowner`.`AgencyOrSchoolOwnerID` 
    WHERE `institution`.`AgencyOrSchoolOwnerID` = '$testUserID'
");

if ($ownerCheck && mysqli_num_rows($ownerCheck) > 0) {
    $ownerData = mysqli_fetch_assoc($ownerCheck);
    echo "<p style='color: green;'>✅ School owner data found</p>";
    echo "<p><strong>Name:</strong> " . $ownerData['AgencyOrSchoolOwnerName'] . "</p>";
    echo "<p><strong>Email:</strong> " . ($ownerData['AgencyOrSchoolOwnerEmail'] ?: 'Not set') . "</p>";
    echo "<p><strong>Phone:</strong> " . ($ownerData['AgencyOrSchoolOwnerMainPhone'] ?: 'Not set') . "</p>";
    echo "<p><strong>Institution:</strong> " . $ownerData['InstitutionGeneralName'] . "</p>";
} else {
    echo "<p style='color: red;'>❌ No school owner data found for UserID: $testUserID</p>";
}

// Test 4: Force email sending test
echo "<h2>3. Force Email Test</h2>";
echo "<form method='post'>";
echo "<p><strong>Test Email Address:</strong> <input type='email' name='test_email' value='test@example.com' required></p>";
echo "<p><input type='submit' name='send_test_email' value='Send Test Email' style='background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'></p>";
echo "</form>";

if (isset($_POST['send_test_email'])) {
    $testEmail = $_POST['test_email'];
    
    // Include PHPMailer
    $phpmailerPath = 'controller/scripts/PHPMailer-master/';
    require_once($phpmailerPath . 'PHPMailer.php');
    require_once($phpmailerPath . 'Exception.php');
    require_once($phpmailerPath . 'SMTP.php');
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    try {
        $mail = new PHPMailer(true);
        
        // Get SMTP settings
        $smtpData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM serverpassword LIMIT 1"));
        if (!$smtpData) {
            throw new Exception("No SMTP configuration found");
        }
        
        $mail->isSMTP();
        $mail->Host = $smtpData['Host'];
        $mail->SMTPAuth = true;
        $mail->Username = $smtpData['ServerName'];
        $mail->Password = $smtpData['ServerPassword'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->Timeout = 30;
        
        $mail->setFrom($smtpData['ServerName'], 'EduMESS Test');
        $mail->addAddress($testEmail, 'Test User');
        $mail->isHTML(true);
        $mail->Subject = 'EduMESS Email Test - ' . date('Y-m-d H:i:s');
        $mail->Body = '<h1>Email Test Successful!</h1><p>This is a test email from EduMESS system sent at ' . date('Y-m-d H:i:s') . '</p>';
        $mail->AltBody = 'Email test successful from EduMESS system.';
        
        $result = $mail->send();
        
        if ($result) {
            echo "<p style='color: green;'>✅ Test email sent successfully to $testEmail!</p>";
        } else {
            echo "<p style='color: red;'>❌ Test email failed to send</p>";
        }
        
    } catch (Exception $e) {
        echo "<p style='color: red;'>❌ Email test failed: " . $e->getMessage() . "</p>";
    }
}

// Test 5: Check current session and term data
echo "<h2>4. Current Session/Term Data</h2>";
$sessionQuery = mysqli_query($link, "SELECT * FROM session WHERE sessionStatus = '1'");
$sessionData = mysqli_fetch_assoc($sessionQuery);
echo "<p><strong>Current Session:</strong> " . ($sessionData['sessionName'] ?? 'Not set') . "</p>";

$termQuery = mysqli_query($link, "SELECT * FROM termorsemester WHERE status = '1'");
$termData = mysqli_fetch_assoc($termQuery);
echo "<p><strong>Current Term:</strong> " . ($termData['TermOrSemesterName'] ?? 'Not set') . "</p>";

// Test 6: Check resumption data
if ($sessionData && $termData) {
    $resumptionQuery = mysqli_query($link, "
        SELECT * FROM default_resumption 
        WHERE Session = '{$sessionData['sessionName']}' 
        AND Term_id = '{$termData['TermOrSemesterID']}'
    ");
    $resumptionData = mysqli_fetch_assoc($resumptionQuery);
    
    if ($resumptionData) {
        echo "<p><strong>Resumption Date:</strong> " . $resumptionData['Resumption_date'] . "</p>";
        echo "<p><strong>Days to Count:</strong> " . $resumptionData['num_days_count'] . "</p>";
    } else {
        echo "<p style='color: red;'>❌ No resumption data found for current session/term</p>";
    }
}

echo "<hr>";
echo "<p><em>Debug test completed. Check the output above for any issues.</em></p>";
?> 