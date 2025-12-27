<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Slider</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>slider/list.php" class="btn-default">Back</a></div>

					<div id="msg"></div>

						<!-- <h3>Add</h3> -->
						<form name="frmaddslider" id="frmaddslider" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Slider Image</td>
									<td><input type="file" id="image" name="image" required></td>
								</tr>
								<tr>
									<td>Slider Caption</td>
									<td><input type="text" name="caption" id="caption" style="width: 100%;" value="" required></td>
								</tr>
								<tr>
									<td>Alt</td>
									<td><input type="text" name="alt" id="alt" style="width: 100%;" value="" required></td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnslideradd" id="btnslideradd" onclick="submitSlider();">Submit</button>
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
include '../js/slider.js';
include '../templates/footer.php'; 
?>