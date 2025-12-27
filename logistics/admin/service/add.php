<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Service</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>service/list.php" class="btn-default">Back</a></div>

					<div id="msg"></div>
<form name="frmaddservice" id="frmaddservice" method="post" enctype="multipart/form-data">
	<table style="padding: 0; margin: 0;">
		<tr>
			<td>Service Caption</td>
			<td><input type="text" name="caption" id="caption" class="cls_txt" required></td>
		 </tr>
		 <tr>
		 <td>Service Short Description</td>
	 	 <td>
				<textarea id="short_description" name="short_description" rows="4" cols="100" required></textarea>
		 </td>
		</tr>
		 <tr>
		 <td>Service Description</td>
	 	 <td>
				<textarea name="description" id="description" rows="5" cols="50" required>
						&nbsp;
				</textarea>
				
		 </td>
		</tr>
		 
		<tr>
			<td>Service Image</td>
			<td><input type="file" id="image" name="image" required></td>
		</tr>
		<tr>
			<td>Alt</td>
			<td><input type="text" id="alt" name="alt" class="cls_txt" required></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center;">
			<button class="form__submit btn1" type="submit" name="btnServiceAdd" id="btnServiceAdd" onclick="submitService();">Submit</button></td>
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
include '../js/service.js';
include '../templates/footer.php'; 
?>