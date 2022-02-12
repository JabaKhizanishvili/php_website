<?php
session_start();
print_r($_POST);

$name = $_POST['txtName'];
$email = $_POST['txtEmail'];
$phone = $_POST['txtPhone'];
$msg = $_POST['txtMsg'];


require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Username = 'jabakhizanishvili@itvet.ge';
$mail->Password = 'itvet2021';

$mail->Subject = 'tickets.ge';

$mail->setFrom('jabakhizanishvili@itvet.ge', 'Mailer');
$mail->Body    = "name: '$name' mail: '$email' phone: '$phone' massage: '$msg'";


// amit igzavneba

$mail->addAddress('jabakhizanishvili@itvet.ge');

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

$mail->smtpClose();

$_SESSION['emailsend'] = true;

return header('location:index.php?mailsuccsess');
