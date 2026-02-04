<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

/* ------------------ CONFIG ------------------ */
$enableRecaptcha = true;

$url = $_SERVER['SERVER_NAME'];
if ($url === "localhost" || $url === "127.0.0.1") {
	$siteKey = "6Lc74lIsAAAAAGehDtc9u4j_rOKRn8ERT9jwdZiQ";
	$secretKey = "6Lc74lIsAAAAAAYDhJil3d8bD_pQqyDjOnqOmnds";
} else {
	$siteKey = "6Lc74lIsAAAAAGehDtc9u4j_rOKRn8ERT9jwdZiQ";
	$secretKey = "6Lc74lIsAAAAAAYDhJil3d8bD_pQqyDjOnqOmnds";
}
/* -------------------------------------------- */

$msg = "";
$isValid = true;

/* ---------- 1. reCAPTCHA VALIDATION ---------- */
if ($enableRecaptcha) {
	$captchaResponse = $_POST['g-recaptcha-response'] ?? '';

	if (empty($captchaResponse)) {
		$isValid = false;
		$msg = "Please verify that you are not a robot.";
	} else {
		$verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
		$response = file_get_contents($verifyUrl . "?secret=" . $secretKey . "&response=" . $captchaResponse);
		$responseData = json_decode($response);

		if (!$responseData || !$responseData->success) {
			$isValid = false;
			$msg = "reCAPTCHA verification failed.";
		}
	}
}

/* ---------- 2. INPUT VALIDATION ---------- */
if ($isValid) {
	$name = trim($_POST['name'] ?? '');
	$email = trim($_POST['email'] ?? '');
	$mobileno = trim($_POST['mobileno'] ?? '');
	$message = trim($_POST['message'] ?? '');

	if ($name === "") {
		$msg = "Name is mandatory";
	} elseif ($email === "") {
		$msg = "Email is mandatory";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$msg = "Invalid email address";
	} elseif ($mobileno === "") {
		$msg = "Contact No is mandatory";
	}

	if ($msg !== "") {
		$isValid = false;
	}
}

/* ---------- 3. SEND MAIL ---------- */
if ($isValid) {

	$emailBody = '
    <html>
    <body>
    <p>Enquiry from: www.mam.com.sa/tours-and-travels</p>
    <table cellpadding="2" cellspacing="0" width="60%"
       style="border-collapse:collapse; border:1px solid #ddd;">
		  <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Name</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $name . '</td>
    </tr>
        <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>E-mail</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $email . '</td>
    </tr>
         <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Mobile</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $mobileno . '</td>
    </tr>
              <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Message</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $message . '</td>
    </tr>
    </table>
    </body>
    </html>';

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

		$mail->addAddress("reservation@mam.com.sa");
		$mail->addAddress("renjithnks@gmail.com");

		$mail->isHTML(true);
		$mail->Subject = "Enquiry from Contact Page";
		$mail->Body = $emailBody;

		$mail->send();
		echo "Message has been sent";

	} catch (Exception $e) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	}

} else {
	echo $msg;
}
?>