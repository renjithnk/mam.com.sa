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
			$email =  $_POST['email'];
			//$confirm_email=$_POST['confirm_email'];
			$country_code=$_POST['country_code'];
			$phoneno = $_POST['phoneno'];
			$moving_from_country =  $_POST['moving_from_country'];
			$moving_from_country = preg_replace('/[^A-Za-z\s]/', '', $moving_from_country);
			$moving_to_country =  $_POST['moving_to_country'];
			$moving_to_country = preg_replace('/[^A-Za-z\s]/', '', $moving_to_country);
			$estimated_date =  $_POST['estimated_date'];
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
			if($country_code == "")
			{
			      $msg="Country Code is mandatory";
			}
			if($phoneno == "")
			{
				  $msg="Phone No is mandatory";
			}
			if($moving_from_country == "")
			{
				$msg="Moving From Country is mandatory";
			}
			if($moving_to_country == "")
			{
				$msg="Moving To Country is mandatory";
			}
			
			if($msg == "")
			{
							
							$sql = "INSERT INTO moving_to_uk (name, email, country_code, phoneno, moving_from_country, moving_to_country, estimated_date) VALUES ('$name', '$email', '$country_code', '$phoneno','$moving_from_country','$moving_to_country','$estimated_date')";
							$db->query($sql);
							// echo 'Message has been sent';
							// exit;
							
							
							$subject="Moving To UK";
							if(($url === "mam.com.sa") || ($url === "www.mam.com.sa"))
							{
								$to="prince.ezone@gmail.com";
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
									<title>Moving To UK</title>
										</head>
										<body>
										<p>Moving To UK from: https://mam.com.sa/logistics</p>
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
										<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Country Code</td>
										<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;padding-right:10px;' >" . $country_code . "</td>
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
										<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Moving To Country</td>
										<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;'>" . $moving_to_country . "</td>
										</tr>
										<tr>
										<td style='border:1px solid #cdcdcd;border-bottom:1px solid #cdcdcd;border-right:0;padding:3px;padding-left:10px;'>Estimated Date</td>
										<td style='border:1px solid #cdcdcd;border-bottom:1px solid #cdcdcd;padding-left:10px;'>" . $estimated_date . "</td>
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
											$mail->AddCC("prince.ezone@gmail.com");
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