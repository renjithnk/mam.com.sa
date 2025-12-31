<?php
require_once '../includes/database.php'; 
$db = new Database();
$url =  $_SERVER['SERVER_NAME'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';


/* $secretKey = "6Ld9RLwqAAAAANqn1a49r9nnLv8mmT7xf_Cbzuoz"; // Replace with your secret key
$captchaResponse = $_POST['g-recaptcha-response'];
// Verify reCAPTCHA response
$verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
$response = file_get_contents($verifyUrl . "?secret=" . $secretKey . "&response=" . $captchaResponse);
$responseData = json_decode($response);
if ($responseData->success) 
{ */
		$name =  $_POST['name'];
		$name = preg_replace('/[^A-Za-z\s]/', '', $name); 
		$email =  $_POST['email'];
		$confirm_email=$_POST['confirm_email'];
		$phoneno = $_POST['phoneno'];
		$moving_from_country =  $_POST['moving_from_country'];
		$moving_from_country = preg_replace('/[^A-Za-z\s]/', '', $moving_from_country);
		$moving_from_city =  $_POST['moving_from_city'];
		$moving_from_city = preg_replace('/[^A-Za-z\s]/', '', $moving_from_city);
		$moving_to_country =  $_POST['moving_to_country'];
		$moving_to_country = preg_replace('/[^A-Za-z\s]/', '', $moving_to_country);
		$moving_to_city =  $_POST['moving_to_city'];
		$moving_to_city = preg_replace('/[^A-Za-z\s]/', '', $moving_to_city);
		$estimated_date =  $_POST['estimated_date'];
		$delivery_date =  $_POST['delivery_date'];
		
		
		$msg="";
		if($name == "")
		{
			 $msg="Name is mandatory";
		}
		if($email == "")
		{
			  $msg="Email is mandatory";
		}
		else
		{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
			   $msg="$email is not a valid email address";
			} 
		}
		/*if($confirm_email == "")
		{
			  $msg="Confirm Email is mandatory";
		}
		else
		{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
			   $msg="$confirm_email is not a valid email address";
			} 
		}
		if($email != $confirm_email)
		{
			$msg="Email addresses do not match. Please make sure your email addresses match.";
		}*/
		
		if($phoneno == "")
		{
			  $msg="Phone No is mandatory";
		}
		if($moving_from_city == "")
		{
		   $msg="Moving From City is mandatory";
		}
		if($moving_to_city == "")
		{
			$msg="Moving To City is mandatory";
		}
		
		/*else
		{
			if(!valid_phone($phoneno))
			{
				$msg="Phone Number is not valid";
			} 
		}*/
		
		if($msg == "")
		{
						
						$sql = "INSERT INTO quote_requests (name, email, phoneno, moving_from_country,moving_from_city,moving_to_country,moving_to_city,estimated_date,delivery_date) VALUES ('$name', '$email', '$phoneno','$moving_from_country',
						'$moving_from_city','$moving_to_country','$moving_to_city','$estimated_date','$delivery_date')";
						$db->query($sql);
						
						
						$subject="Request A Quote";
						if(($url === "mam.com.sa") || ($url === "www.mam.com.sa"))
						{
							$to="sales@mam.com.sa";
						}
						else
						{
							 $to="regibright027@gmail.com";
							// $to = "renjithnks@gmail.com";
						}
						if($to != "")
						{
						$message = "
							<html>
							<head>
								<title>Request A Quote</title>
									</head>
									<body>
									<p>Request A Quote from: www.mam.com.sa/logistics</p>
									<table cellspacing='0' cellpadding='0'>
									<tr>
									<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Name</th>
									<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;'>" . $name . "</th>
									</tr>
									<tr>
									<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Email</td>
									<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;padding-right:10px;' >" . $email . "</td>
									</tr>
									<tr>
									<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Phone No</td>
									<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;'>" . $phoneno . "</td>
									</tr>
									<tr>
									<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-right:10px;padding-left:10px;'>Moving From Country</td>
									<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;'>" . $moving_from_country . "</td>
									</tr>
									<tr>
									<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Moving From City</td>
									<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;'>" . $moving_from_city . "</td>
									</tr>
									<tr>
									<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Moving To Country</td>
									<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;'>" . $moving_to_country . "</td>
									</tr>
									<tr>
									<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Moving To City</td>
									<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;'>" . $moving_to_city . "</td>
									</tr>
									<tr>
									<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Estimated Date</td>
									<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;'>" . $estimated_date . "</td>
									</tr>
									<tr>
									<td style='border:1px solid #cdcdcd;border-right:0;padding:3px;padding-left:10px;'>Delivery Date</td>
									<td style='border:1px solid #cdcdcd;padding-left:10px;'>" . $delivery_date . "</td>
									</tr>
									</table>
									</body>
									</html>";
								
								
								
								   $mail = new PHPMailer();
								   $mail->IsSMTP();  // telling the class to use SMTP
							   //  $mail->SMTPDebug = 2;
								   $mail->Mailer = "smtp";
								   $mail->Host = "smtp.gmail.com";
								   $mail->Port = 587;
								   $mail->SMTPAuth = true; // turn on SMTP authentication
								   $mail->Username = "aegisalim@gmail.com"; // SMTP username
								   $mail->Password = "heou yhwe toaj dhpr "; // App password contains 16 digits
								   $mail->Priority = 1;
								   
								   
								   $mail->AddAddress($to,"");
								   if(($url === "mam.com.sa") || ($url === "www.mam.com.sa"))
								   {
										$mail->AddCC("rates@mam.com.sa");
								   }
								   
								   //$mail->AddCC("renjithnks@gmail.com");  // Please remove after testing
								   
								   $mail->SetFrom($email, $name);
								   $mail->AddReplyTo($to,"");
								   $mail->Subject  = $subject;
								   $mail->Body     = $message; // $user_message;
								   $mail->WordWrap = 50;
								   $mail->isHTML(true);
								  // $mail->Send();
								   if(!$mail->Send()) 
								   {
									   echo 'Mailer error: ' . $mail->ErrorInfo;
								   } 
								   else 
								   {
									   echo 'Message has been sent';
								   }
					}
		}
		else
		{
			echo $msg;
		}
/* } 
else 
{
	 echo "reCAPTCHA verification failed. Please try again.";
} */
?>