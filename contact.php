
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
    exit;
}

if (!empty($_POST['website_url'])) {
    http_response_code(200);
    exit('Thank you for your enquiry.');
}

// SMTP configuration: replace with your actual settings.
$smtpHost = 'kaiser.int3rnet.net';
$smtpUser = 'info@ittaruinnovations.co.in';
$smtpPass = 'w!BBnop8Y[&e';

$to = 'info@ittaruinnovations.co.in'; // Where you want enquiries delivered.

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$company = trim($_POST['company'] ?? '');
$service = trim($_POST['service'] ?? '');
$message = trim($_POST['message'] ?? '');

$allowedServices = [
    'WordPress theme development',
    'Shopware storefront development',
    'Magento theme development',
    'Custom-tailored website design',
    'Performance optimisation',
    'Something else'
];

if (
    $name === '' ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    $service === '' ||
    !in_array($service, $allowedServices, true) ||
    $message === '' ||
    preg_match('/[\r\n]/', $email)
) {
    http_response_code(400);
    exit('Please check the form and try again.');
}

$mail = new PHPMailer(true);

try {
    // SMTP connection
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser;
    $mail->Password   = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Email sender and recipient
    $mail->CharSet = 'UTF-8';
    $mail->setFrom($smtpUser, 'Website Project Enquiry');
    $mail->addAddress($to);
    $mail->addReplyTo($email, $name);

    // Email content
    $mail->Subject = 'New Project Enquiry: ' . $service;

    $mail->Body =
        "New project enquiry received\n\n" .
        "Name: $name\n" .
        "Email: $email\n" .
        "Company / Website: $company\n" .
        "Service: $service\n\n" .
        "Project Details:\n$message\n";

    $mail->send();

    header('Location: /success.html', true, 303);
    exit;

} catch (Exception $e) {
    error_log('Contact form email failed: ' . $mail->ErrorInfo);

    http_response_code(500);
    echo 'Sorry, your enquiry could not be sent. Please try again later.';
}
