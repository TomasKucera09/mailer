<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';  // zde SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@example.com'; // SMTP uživatel
    $mail->Password = 'your_password';          // SMTP heslo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('recipient@example.com', 'Joe User');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Testovací email z Railway';
    $mail->Body    = 'Toto je <b>testovací</b> email poslaný pomocí PHPMailer.';

    $mail->send();
    echo 'Email byl úspěšně odeslán';
} catch (Exception $e) {
    echo "Email nemohl být odeslán. Chyba: {$mail->ErrorInfo}";
}
