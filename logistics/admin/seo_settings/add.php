<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Seo Settings</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>/seo_settings/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>
						<form name="frmaddseosettingss" id="frmaddseosettingss" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Page Title</td>
									<td><input type="text" name="page_title" id="page_title" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Canonical Link</td>
									<td><input type="text" name="canonical_link" id="canonical_link" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Page Name</td>
									<td><input type="text" name="page_name" id="page_name" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Page URL</td>
									<td><input type="text" name="page_url" id="page_url" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Slug</td>
									<td><input type="text" name="slug" id="slug" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Meta Content</td>
									<td><input type="text" name="meta_content" id="meta_content" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Meta Description</td>
									<td><input type="text" name="meta_description" id="meta_description" style="width: 100%;" ></td>
								</tr>
								<tr>
									<td>Meta Keywords</td>
									<td><input type="text" name="meta_keywords" id="meta_keywords" style="width: 100%;"></td>
								</tr>
								
								
								<tr>
									<td>Og Title</td>
									<td><input type="text" name="og_title" id="og_title" style="width: 100%;"></td>
								</tr>
								
								
								<tr>
									<td>Og URL</td>
									<td><input type="text" name="og_url" id="og_url" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Og Type</td>
									<td><input type="text" name="og_type" id="og_type" style="width: 100%;"></td>
								</tr>
								
								
								<tr>
									<td>Og Description</td>
									<td><input type="text" name="og_description" id="og_description" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Og Image</td>
									<td><input type="text" id="og_image" name="og_image"></td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnseosettingssadd" id="btnseosettingssadd" onclick="submitSeoSettings();">Submit</button>
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
include '../js/seo_settings.js';
include '../templates/footer.php'; 
?>