<?php
// Email Test Script - Place this in your root directory
// Run this script to test email functionality

// Include database connection
require_once('controller/config/config.php');

// Include PHPMailer classes
$phpmailerPath = 'controller/scripts/PHPMailer-master/';
require_once($phpmailerPath . 'PHPMailer.php');
require_once($phpmailerPath . 'Exception.php');
require_once($phpmailerPath . 'SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Test SMTP Configuration
echo "<h2>SMTP Configuration Test</h2>";

$smtpResult = mysqli_query($link, "SELECT * FROM `serverpassword` LIMIT 1");
if (!$smtpResult) {
    echo "<p style='color: red;'>❌ Failed to query serverpassword table: " . mysqli_error($link) . "</p>";
    exit;
}

$smtpConfig = mysqli_fetch_assoc($smtpResult);
$smtpUser = $smtpConfig['ServerName'] ?? '';
$smtpPass = $smtpConfig['ServerPassword'] ?? '';
$smtpHost = $smtpConfig['Host'] ?? '';

echo "<p><strong>SMTP Host:</strong> " . ($smtpHost ?: 'Not set') . "</p>";
echo "<p><strong>SMTP User:</strong> " . ($smtpUser ?: 'Not set') . "</p>";
echo "<p><strong>SMTP Password:</strong> " . ($smtpPass ? 'Set' : 'Not set') . "</p>";

if (empty($smtpHost) || empty($smtpUser) || empty($smtpPass)) {
    echo "<p style='color: red;'>❌ Incomplete SMTP configuration</p>";
    exit;
}

// Test PHPMailer Files
echo "<h2>PHPMailer Files Test</h2>";

$requiredFiles = ['PHPMailer.php', 'Exception.php', 'SMTP.php'];

foreach ($requiredFiles as $file) {
    $filePath = $phpmailerPath . $file;
    if (file_exists($filePath)) {
        echo "<p style='color: green;'>✅ $file found</p>";
    } else {
        echo "<p style='color: red;'>❌ $file not found at: $filePath</p>";
    }
}

// Test Email Sending
echo "<h2>Email Sending Test</h2>";

try {
    $mail = new PHPMailer(true);
    
    // Enable debug output
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {
        echo "<p style='font-family: monospace; font-size: 12px;'>$str</p>";
    };
    
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->Timeout = 30;
    
    $mail->setFrom($smtpUser, 'EduMESS Test');
    $mail->addAddress('test@example.com', 'Test User'); // Change this to your test email
    $mail->isHTML(true);
    $mail->Subject = 'EduMESS Email Test';
    $mail->Body = '<h1>Email Test</h1><p>This is a test email from EduMESS system.</p>';
    $mail->AltBody = 'This is a test email from EduMESS system.';
    
    echo "<p>Attempting to send test email...</p>";
    $result = $mail->send();
    
    if ($result) {
        echo "<p style='color: green;'>✅ Test email sent successfully!</p>";
    } else {
        echo "<p style='color: red;'>❌ Test email failed to send</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Email test failed: " . $e->getMessage() . "</p>";
}

// Test Database Connection
echo "<h2>Database Connection Test</h2>";
if ($link) {
    echo "<p style='color: green;'>✅ Database connection successful</p>";
} else {
    echo "<p style='color: red;'>❌ Database connection failed</p>";
}

// Test School Owner Data
echo "<h2>School Owner Data Test</h2>";
$testUserID = 1; // Change this to a valid UserID for testing
$select_schoolowner = mysqli_query($link, "
    SELECT * FROM `institution` 
    INNER JOIN `agencyorschoolowner` 
    ON `institution`.`AgencyOrSchoolOwnerID` = `agencyorschoolowner`.`AgencyOrSchoolOwnerID` 
    WHERE `institution`.`AgencyOrSchoolOwnerID` = '$testUserID'
");

if ($select_schoolowner && mysqli_num_rows($select_schoolowner) > 0) {
    $ownerData = mysqli_fetch_assoc($select_schoolowner);
    echo "<p style='color: green;'>✅ School owner data found</p>";
    echo "<p><strong>Name:</strong> " . $ownerData['AgencyOrSchoolOwnerName'] . "</p>";
    echo "<p><strong>Email:</strong> " . ($ownerData['AgencyOrSchoolOwnerEmail'] ?: 'Not set') . "</p>";
    echo "<p><strong>Phone:</strong> " . ($ownerData['AgencyOrSchoolOwnerMainPhone'] ?: 'Not set') . "</p>";
} else {
    echo "<p style='color: red;'>❌ No school owner data found for UserID: $testUserID</p>";
}

echo "<hr>";
echo "<p><em>Test completed. Check the output above for any issues.</em></p>";
?> 