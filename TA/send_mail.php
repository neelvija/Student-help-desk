<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
function send_email($email , $confirmation_code) {
    $sendTo = $email;
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ubtaavailability@gmail.com';                     // SMTP username
    $mail->Password   = 'najy_sec123';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ubtaavailability@gmail.com');
    $mail->addAddress($sendTo, 'Joe User');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Verify your email" ;
    $mail->Body    = "Your verification code:<br/><center><h2>".$confirmation_code."</h2></center><br/>Please enter above code to verify email section to get your account activated";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    return '1';
} catch (Exception $e) {
    return '0';
}
}
?>