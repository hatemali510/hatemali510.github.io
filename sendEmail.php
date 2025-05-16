
<?php
// Adjust paths if needed (depends on where you place the PHPMailer folder)
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Now create and send the email
$mail = new PHPMailer(true);
try {

    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    // SMTP config
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'chehab2008@gmail.com';        // your Gmail
    $mail->Password   = 'laodckdvrzweojxl';     // 16-digit App Password
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Recipients
    $mail->setFrom('chehab2008@gmail.com', 'G-Blast-email');
    $mail->addAddress('chehab2008@gmail.com', $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = 'you have recieve email from ' . $name . ' with email : ' . $email . PHP_EOL. 
    ' message is : '.  $message;

    $mail->send();
    header("Location: index.html");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>