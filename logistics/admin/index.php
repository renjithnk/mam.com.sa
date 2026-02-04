<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/database.php';
$db = new Database();
$sql = "SELECT * FROM aegis_settings where id=1 and status=0";
$aegisSettingsResult = $db->query($sql);
$aegisSettingsResultRow = $aegisSettingsResult->fetch_array();
$logoImgPath = $adminPath . "/uploads/aegissettings/" . $aegisSettingsResultRow['logo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin Login</title>
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>


	<div class="container admin-login">

		<form class="form-container" id="frmlogin" name="frmlogin" method="post" action="php/login.php">
			<h2 class="h2 admin-login__logo-container"><img src="<?php echo $logoImgPath; ?>" alt=""></h2>
			<div class="input-container">
				<input type="text" name="username" id="username" placeholder="Username" required>
			</div>

			<div class="input-container">
				<input type="password" placeholder="Password" name="password" id="password" required>
			</div>
			<!--<input type="submit" class="btn1" value="Submit" name="btnLogin" id="btnLogin" onClick="submitLogin();">-->
			<button class="btn1" type="submit" name="btnLogin" id="btnLogin" onClick="submitLogin();">Submit</button>
		</form>
		<div class="form-validation" id="errmsg">
			<?php
			if (isset($_SESSION['errmsg']) != "") {
				echo $_SESSION['errmsg'];
			}
			?>
		</div>
		<div class="form-loading" id="loading" style="display:none;">
			<div class="form-loader enable-form-loader">
				<div class="form-loader-wrapper">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
		<div class="form-error" id="msgstatus" style="display:none;"></div>
	</div>
	<!--<script src="assets/js/script.js"></script>-->
	<?php
	include 'js/login.js';
	?>
</body>

</html>