<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Logistics Solutions</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>logisticssolutions/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>
						<form name="frmaddlogisticssolutions" id="frmaddlogisticssolutions" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Caption</td>
									<td><input type="text" name="caption" id="caption" style="width: 100%;" value="" required></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><textarea name="description" id="description" rows="5" cols="50" required></textarea></td>
								</tr>
								<tr>
									<td>Icon Image1</td>
									<td><input type="file" id="icon_image1" name="icon_image1" required></td>
								</tr>
								<tr>
									<td>Icon Image Alt</td>
									<td><input type="text" name="icon_image1_alt" id="icon_image1_alt" style="width: 100%;" value="" required></td>
								</tr>
								
								<tr>
									<td>Description</td>
									<td><textarea name="icon_image1_description" id="icon_image1_description" rows="5" cols="50" required></textarea></td>
								</tr>
								<tr>
									<td>Icon Image2</td>
									<td><input type="file" id="icon_image2" name="icon_image2" required></td>
								</tr>
								<tr>
									<td>Icon Image Alt</td>
									<td><input type="text" name="icon_image2_alt" id="icon_image2_alt" style="width: 100%;" value="" required></td>
								</tr>
								
								<tr>
									<td>Description</td>
									<td><textarea name="icon_image2_description" id="icon_image2_description" rows="5" cols="50" required></textarea></td>
								</tr>
								
								
								<tr>
									<td>Icon Image3</td>
									<td><input type="file" id="icon_image3" name="icon_image3" required></td>
								</tr>
								<tr>
									<td>Icon Image Alt</td>
									<td><input type="text" name="icon_image3_alt" id="icon_image3_alt" style="width: 100%;" value="" required></td>
								</tr>
								
								<tr>
									<td>Description</td>
									<td><textarea name="icon_image3_description" id="icon_image3_description" rows="5" cols="50" required></textarea></td>
								</tr>
								
								
								<tr>
									<td>Icon Image4</td>
									<td><input type="file" id="icon_image4" name="icon_image4" required></td>
								</tr>
								<tr>
									<td>Icon Image Alt</td>
									<td><input type="text" name="icon_image4_alt" id="icon_image4_alt" style="width: 100%;" value="" required></td>
								</tr>
								
								<tr>
									<td>Description</td>
									<td><textarea name="icon_image4_description" id="icon_image4_description" rows="5" cols="50" required></textarea></td>
								</tr>
								
								
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnlogisticssolutionsadd" id="btnlogisticssolutionsadd" onclick="submitLogisticsSolutions();">Submit</button>
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
include '../js/logisticssolutions.js';
include '../templates/footer.php'; 
?>