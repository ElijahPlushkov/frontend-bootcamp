<?php

require_once __DIR__ . '/validateForm.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = validateForm($_POST);

    if (array_filter($errors)) {
        header('Location: form-error.html');
        exit;
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '#;
        $mail->Password = '#';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('plushabeststyle@gmail.com', 'Your Website');
        $mail->addAddress('plushabeststyle@gmail.com', 'Recipient Name');

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "<h2>Contact Form Submission</h2>
                       <p><strong>First Name:</strong> $firstName</p>
                       <p><strong>Last Name:</strong> $lastName</p>
                       <p><strong>Email:</strong> $email</p>
                       <p><strong>Phone:</strong> $phone</p>";

        if ($mail->send()) {
            header("Location: thank-you.html");
            exit();
        } else {
            echo "Message could not be sent.";
        }
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}

