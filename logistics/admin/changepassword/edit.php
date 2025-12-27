<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit Password</h1>
		<div class="admin-main-section__content">
					<div id="msg"></div>
					<form name="frmeditpassword" id="frmeditpassword" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
									<table style="padding: 0; margin: 0;">
										<tr>
											<td>Password</td>
											<td><input type="password" name="password" id="password" class="cls_txt" required></td>
										</tr>
										<tr>
											<td>New Password</td>
											<td><input type="password" name="new_password" id="new_password" class="cls_txt" required></td>
										</tr>
										<tr>
											<td>Confirm Password</td>
											<td><input type="password" name="confirm_password" id="confirm_password" class="cls_txt" required></td>
										</tr>
										<tr>
											<td colspan="2" class="cls_btn"><input class="form__submit btn1" type="submit" onclick="submitEditPassword();" value="Submit" name="btnPasswordAdd" id="btnPasswordAdd"></td>
										</tr>
													
									
									</table>
									<div class="form-validation" id="errmsg"></div>
									<div class="form-loading" id="loading"  style="display:none;">
									<div class="form-loader enable-form-loader">
									<div class="form-loader-wrapper"> 
									<span></span>
									<span></span>
									<span></span>
									</div>
									</div>
									</div>
									<div class="form-success" id="msgstatus" style="display:none;"></div>
						</form>
	 	</div>
</div>

<?php
include '../js/password.js';
include '../templates/footer.php'; 
?>