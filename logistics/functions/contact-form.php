<?php
require_once '../includes/database.php';
$db = new Database();
$url = $_SERVER['SERVER_NAME'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

// --- CONFIGURATION ---
$enableRecaptcha = true; // Set to true to test on localhost

// Detect Environment and Set Keys for reCAPTCHA
if ($url === "localhost" || $url === "127.0.0.1") {
    $siteKey = "6Lc74lIsAAAAAGehDtc9u4j_rOKRn8ERT9jwdZiQ";
    $secretKey = "6Lc74lIsAAAAAAYDhJil3d8bD_pQqyDjOnqOmnds";
} else {
    $siteKey = "6Lc74lIsAAAAAGehDtc9u4j_rOKRn8ERT9jwdZiQ";
    $secretKey = "6Lc74lIsAAAAAAYDhJil3d8bD_pQqyDjOnqOmnds";
}
// ---------------------

$isValid = true;
$msg = "";

// 1. reCAPTCHA Verification
if ($enableRecaptcha) {
    $captchaResponse = $_POST['g-recaptcha-response'] ?? '';
    $verifyUrl = "https://www.google.com/recaptcha/api/siteverify";

    $opts = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query([
                'secret' => $secretKey,
                'response' => $captchaResponse
            ])
        ]
    ];
    $context = stream_context_create($opts);
    $response = file_get_contents($verifyUrl, false, $context);
    $responseData = json_decode($response);

    if (!$responseData || !$responseData->success) {
        $isValid = false;
        $msg = "reCAPTCHA verification failed.";
    }
}

// 2. Input Validation (only runs if reCAPTCHA passed)
if ($isValid) {
    $name = strip_tags(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $mobileno = preg_replace('/[^0-9+]/', '', $_POST['mobileno'] ?? '');
    $message = strip_tags(trim($_POST['message'] ?? ''));

    if (empty($name)) {
        $msg = "Name is mandatory";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format";
    } elseif (empty($mobileno)) {
        $msg = "Contact No is mandatory";
    }

    if ($msg !== "") {
        $isValid = false;
    }
}

// 3. Execution
if ($isValid) {
    // Database Insert
    $sql = "INSERT INTO enquiries (name, email, mobileno, message) VALUES ('$name', '$email', '$mobileno', '$message')";
    $db->query($sql);

    // Email Sending Logic
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "sales@mam.com.sa";
        $mail->Password = "bxgb kwyn qvll vnxn";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom("sales@mam.com.sa", "MAM Website Enquiry");
        $mail->addReplyTo($email, $name);

        // ALWAYS send to both addresses
        $mail->addAddress("sales@mam.com.sa");
        $mail->addAddress("rates@mam.com.sa");
        $mail->addAddress("renjithnks@gmail.com");

        $mail->isHTML(true);
        $mail->Subject = "Enquiry from Contact Page";
        $mail->Body = '
<h3>Enquiry Details</h3>
<table cellpadding="2" cellspacing="0" width="70%"
       style="border-collapse:collapse; border:1px solid #ddd;">
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Name</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $name . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Email</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $email . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Mobile</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $mobileno . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Message</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . nl2br($message) . '</td>
    </tr>
</table>';


        if ($mail->send()) {
            echo "Success";
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    echo $msg;
}
?>