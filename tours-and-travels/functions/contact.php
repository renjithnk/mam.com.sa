<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

$name =  $_POST['name'];
$email =  $_POST['email'];
$mobileno = $_POST['mobileno'];
$message =  $_POST['message'];
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
				$subject="New Enquiry";
				$to="operations@alimarabia.com";
				if($to != "")
				{
							$message = "
							<html>
							<head>
							<title>Enquiry</title>
							</head>
							<body>
							<p>Enquiry from: www.alimarabia.com/tours-and-travels</p>
							<table cellspacing='0' cellpadding='0'>
							<tr>
							<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Name</th>
							<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;padding-right:10px;'>" . $name . "</th>
							</tr>
							<tr>
							<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Email</td>
							<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;padding-right:10px;'>" . $email . "</td>
							</tr>
							<tr>
							<td style='border:1px solid #cdcdcd;border-bottom:0;border-right:0;padding:3px;padding-left:10px;'>Mobile No</td>
							<td style='border:1px solid #cdcdcd;border-bottom:0;padding-left:10px;padding-right:10px;'>" . $mobileno . "</td>
							</tr>
							<tr>
							<td style='border:1px solid #cdcdcd;border-right:0;padding:3px;padding-left:10px;'>Message</td>
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
						   $mail->AddAddress("reservations@alimarabia.com");
						   
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

/*function valid_phone($contactno)
{
    return preg_match ('/^[0-9]{10}+$/', $contactno);
}
*/?>