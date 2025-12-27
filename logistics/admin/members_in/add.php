<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Members In</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>members_in/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>
						<form name="frmaddmembers_in" id="frmaddmembers_in" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Title</td>
									<td><input type="text" name="title" id="title" style="width: 100%;" value="" required></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><textarea name="description" id="description" rows="5" cols="50" required></textarea></td>
								</tr>
								<tr>
									<td>Image1</td>
									<td><input type="file" id="image1" name="image1" required></td>
								</tr>
								<tr>
									<td>Image1 Alt</td>
									<td><input type="text" name="image1_alt" id="image1_alt" style="width: 100%;" required></td>
								</tr>
								<tr>
									<td>Image2</td>
									<td><input type="file" id="image2" name="image2" required></td>
								</tr>
								<tr>
									<td>Image2 Alt</td>
									<td><input type="text" name="image2_alt" id="image2_alt" style="width: 100%;" required></td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnmembers_inadd" id="btnmembers_inadd" onclick="submitMembersIn();">Submit</button>
									</td>
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
include '../js/members_in.js';
include '../templates/footer.php'; 
?>