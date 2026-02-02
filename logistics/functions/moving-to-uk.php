<?php
require_once '../includes/database.php';
$db = new Database();
$url = $_SERVER['SERVER_NAME'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

/* ---------------- CONFIG ---------------- */
$enableRecaptcha = true;

if ($url === "localhost" || $url === "127.0.0.1") {
	$siteKey = "6Lc74lIsAAAAAGehDtc9u4j_rOKRn8ERT9jwdZiQ";
	$secretKey = "6Lc74lIsAAAAAAYDhJil3d8bD_pQqyDjOnqOmnds";
} else {
	$siteKey = "6Lc74lIsAAAAAGehDtc9u4j_rOKRn8ERT9jwdZiQ";
	$secretKey = "6Lc74lIsAAAAAAYDhJil3d8bD_pQqyDjOnqOmnds";
}
/* ---------------------------------------- */

$isValid = true;
$msg = "";

/* ---------- 1. reCAPTCHA ---------- */
if ($enableRecaptcha) {
	$captchaResponse = $_POST['g-recaptcha-response'] ?? '';

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
	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify", false, $context);
	$responseData = json_decode($response);

	if (!$responseData || !$responseData->success) {
		$isValid = false;
		$msg = "reCAPTCHA verification failed. Please try again.";
	}
}

/* ---------- 2. Input Validation ---------- */
if ($isValid) {
	$name = strip_tags(trim($_POST['name'] ?? ''));
	$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
	$country_code = trim($_POST['country_code'] ?? '');
	$phoneno = preg_replace('/[^0-9+]/', '', $_POST['phoneno'] ?? '');
	$moving_from_country = preg_replace('/[^A-Za-z\s]/', '', trim($_POST['moving_from_country'] ?? ''));
	$moving_to_country = preg_replace('/[^A-Za-z\s]/', '', trim($_POST['moving_to_country'] ?? ''));
	$estimated_date = trim($_POST['estimated_date'] ?? '');

	// Validation messages
	if (empty($name)) {
		$msg = "Name is mandatory";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$msg = "Invalid email format";
	} elseif (empty($country_code)) {
		$msg = "Country Code is mandatory";
	} elseif (empty($phoneno)) {
		$msg = "Phone No is mandatory";
	} elseif (empty($moving_from_country)) {
		$msg = "Moving From Country is mandatory";
	} elseif (empty($moving_to_country)) {
		$msg = "Moving To Country is mandatory";
	} elseif (empty($estimated_date)) {
		$msg = "Estimated Date is mandatory";
	}

	if ($msg !== "") {
		$isValid = false;
	}
}

/* ---------- 3. Execution ---------- */
if ($isValid) {

	/* DB Insert */
	$sql = "INSERT INTO moving_to_uk (name, email, country_code, phoneno, moving_from_country, moving_to_country, estimated_date)
            VALUES ('$name', '$email', '$country_code', '$phoneno', '$moving_from_country', '$moving_to_country', '$estimated_date')";
	$db->query($sql);

	/* Email */
	$mail = new PHPMailer(true);

	try {
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "sales@mam.com.sa";
		$mail->Password = "bxgb kwyn qvll vnxn";
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port = 587;

		$mail->setFrom("sales@mam.com.sa", "MAM Quote Request");
		$mail->addReplyTo($email, $name);

		// Always send to both
		$mail->addAddress("sales@mam.com.sa");
		$mail->addAddress("renjithnks@gmail.com");

		$mail->isHTML(true);
		$mail->Subject = "Moving To UK Request from $url";
		$mail->Body = '
<html>
<head><title>Moving To UK Request</title></head>
<body>
<p>Moving To UK from: https://mam.com.sa/logistics</p>
<table cellpadding="2" cellspacing="0" width="70%" style="border-collapse:collapse; border:1px solid #ddd;">
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Name</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $name . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Email</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $email . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Country Code</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $country_code . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Phone No</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $phoneno . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Moving From Country</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $moving_from_country . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Moving To Country</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $moving_to_country . '</td>
    </tr>
    <tr>
        <td style="padding-left:8px; border:1px solid #ddd;"><b>Estimated Date</b></td>
        <td style="padding-left:8px; border:1px solid #ddd;">' . $estimated_date . '</td>
    </tr>
</table>
</body>
</html>';

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