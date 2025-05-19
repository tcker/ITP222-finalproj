<?php
// Load PHPMailer classes
// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ramchrist20@gmail.com';                 // Your Gmail address
    $mail->Password   = 'rgds txca wnnm dywi';                    // Your Gmail App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
    $mail->Port       = 587;                                    // TCP port to connect to

    // Sender and recipient settings
    $mail->setFrom('ramchrist20@gmail.com', 'From Compass');
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = '<h1>This is a test email</h1><p>Sent using PHPMailer!</p>';
    $mail->AltBody = 'This is a plain-text version of the email content.';

    $mail->send();
    echo 'Message has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>  