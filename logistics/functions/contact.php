<?php
require_once '../includes/database.php'; 
$db = new Database();
$url =  $_SERVER['SERVER_NAME'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';


 $secret = "6LcgQEMsAAAAADrXMnRVm3alJHP-4FZiMzFQFsg1"; // Replace with your secret key
 $token  = $_POST['token'];
 $action = "login";

 // $captchaResponse = $_POST['g-recaptcha-response'];
// Verify reCAPTCHA response
 $verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
 $response = file_get_contents($verifyUrl . "?secret=" . $secret . "&response=" . $token);
 $responseData = json_decode($response);
 if($responseData->success && $responseData->score >= 0.5 && $responseData->action === $action) 
 { 
			$name =  $_POST['name'];
			$name = preg_replace('/[^A-Za-z\s]/', '', $name); 
			$email =  $_POST['email'];
			$mobileno = $_POST['mobileno'];
			$message =  $_POST['message'];
			$message = preg_replace('/[^A-Za-z\s]/', '', $message); 
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
			if($mobileno == "")
			{
				  $msg="Contact No is mandatory";
			}
			/*else
			{
				if(!valid_phone($mobileno))
				{
					$msg="Mobile Number is not valid.";
				} 
			}*/

			if($msg == "")
			{
					$sql = "INSERT INTO enquiries (name, email, mobileno, message) VALUES ('$name', '$email', '$mobileno','$message')";
					$db->query($sql);
					
					$subject="Enquiry";	
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
								<title>Enquiry</title>
								</head>
								<body>
								<p>Enquiry from: https://mam.com.sa/logistics</p>
								<table cellspacing='0' cellpadding='0'>
								<tr>
								<td style='min-width:90px;border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Name</th>
								<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;padding-right:10px;'>" . $name . "</th>
								</tr>
								<tr>
								<td style='min-width:90px;border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Email</td>
								<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;padding-right:10px;'>" . $email . "</td>
								</tr>
								<tr>
								<td style='min-width:90px;border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Mobile No</td>
								<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;padding-right:10px;'>" . $mobileno . "</td>
								</tr>
								<tr>
								<td style='min-width:90px;border:1px solid #cdcdcd;border-right:0;padding:3px;padding-left:10px;'>Message</td>
								<td style='border:1px solid #cdcdcd;padding-left:10px;padding-right:10px;'>" . $message . "</td>
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
} 
else 
{
   echo "reCAPTCHA verification failed. Please try again.";
} 
?>