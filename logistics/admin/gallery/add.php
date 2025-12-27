<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Gallery</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>gallery/list.php" class="btn-default">Back</a></div>

					<div id="msg"></div>
<form name="frmaddgallery" id="frmaddgallery" method="post" enctype="multipart/form-data">
	<table style="padding: 0; margin: 0;">
		<tr>
			<td>Image</td>
			<td><input type="file" id="image" name="image" required></td>
		</tr>
		<tr>
			<td>Alt</td>
			<td><input type="text" id="alt" name="alt" class="cls_txt" required></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center;">
			<button class="form__submit btn1" type="submit" name="btnGalleryAdd" id="btnGalleryAdd" onclick="submitGallery();">Submit</button></td>
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
include '../js/gallery.js';
include '../templates/footer.php'; 
?>