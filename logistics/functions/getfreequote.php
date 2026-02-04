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

/* --------- 1. reCAPTCHA CHECK --------- */
if ($enableRecaptcha) {
	$captchaResponse = $_POST['g-recaptcha-response'] ?? '';
	$verifyUrl = "https://www.google.com/recaptcha/api/siteverify";

	$response = file_get_contents(
		$verifyUrl . "?secret=" . $secretKey . "&response=" . $captchaResponse
	);
	$responseData = json_decode($response);

	if (!$responseData || !$responseData->success) {
		$isValid = false;
		$msg = "reCAPTCHA verification failed.";
	}
}

/* --------- 2. INPUT VALIDATION --------- */
if ($isValid) {
	$name = strip_tags(trim($_POST['name'] ?? ''));
	$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
	$phone = preg_replace('/[^0-9+]/', '', $_POST['phone'] ?? '');
	$moving_from_country = strip_tags(trim($_POST['moving_from_country'] ?? ''));
	$moving_to_country = strip_tags(trim($_POST['moving_to_country'] ?? ''));
	$estimated_date = strip_tags(trim($_POST['estimated_date'] ?? ''));

	if ($name === "") {
		$msg = "Name is mandatory";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$msg = "Invalid email format";
	} elseif ($phone === "") {
		$msg = "Phone No is mandatory";
	} elseif ($moving_from_country === "") {
		$msg = "Moving From Country is mandatory";
	} elseif ($moving_to_country === "") {
		$msg = "Moving To Country is mandatory";
	}

	if ($msg !== "") {
		$isValid = false;
	}
}

/* --------- 3. EXECUTION --------- */
if ($isValid) {

	/* DB INSERT */
	$sql = "
        INSERT INTO quote_requests
        (name, email, phone, moving_from_country, moving_to_country, estimated_date)
        VALUES
        ('$name', '$email', '$phone', '$moving_from_country', '$moving_to_country', '$estimated_date')
    ";
	$db->query($sql);

	/* EMAIL */
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
		$mail->Subject = "Request A Quote";
		$mail->Body = '
<h3>Request A Quote Details</h3>
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
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Phone</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $phone . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Moving From</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $moving_from_country . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Moving To</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $moving_to_country . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Estimated Date</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $estimated_date . '</td>
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