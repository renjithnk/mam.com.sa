<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
if(isset($_GET["id"]))
{
  $id=$_GET["id"];
}
if(@$id != "")
{
	$sql = "SELECT * FROM seo_settings where id=$id and status=0";  
	$result = $db->query($sql); 
	if($result)
	{
		$row = $result->fetch_array();
		$imgPath="";
		if(@$row['logo'] != "")
		{
			$imgPath=$adminPath . 'uploads/seosettingss/' . @$row['logo'];
		}
	}
}
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit Seo Settings</h1>
		
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>/seo_settings/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>

						<!-- <h3>Add</h3> -->
						<form name="frmeditseosettingss" id="frmeditseosettingss" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Page Title</td>
									<td><input type="text" name="page_title" id="page_title" style="width: 100%;" value="<?php echo $row['page_title'];?>"></td>
								</tr>
								<tr>
									<td>Canonical Link</td>
									<td><input type="text" name="canonical_link" id="canonical_link" style="width: 100%;" value="<?php echo $row['canonical_link'];?>"></td>
								</tr>
								<tr>
									<td>Page Name</td>
									<td><input type="text" name="page_name" id="page_name" value="<?php echo $row['page_name'];?>" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Page URL</td>
									<td><input type="text" name="page_url" id="page_url" value="<?php echo $row['page_url'];?>" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Slug</td>
									<td><input type="text" name="slug" id="slug" value="<?php echo $row['slug'];?>"  style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Meta Content</td>
									<td><input type="text" name="meta_content" id="meta_content" value="<?php echo $row['meta_content'];?>"  style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Meta Description</td>
									<td><input type="text" name="meta_description" id="meta_description" value="<?php echo $row['meta_description'];?>" style="width: 100%;" ></td>
								</tr>
								<tr>
									<td>Meta Keywords</td>
									<td><input type="text" name="meta_keywords" id="meta_keywords" value="<?php echo $row['meta_keywords'];?>" style="width: 100%;"></td>
								</tr>
								
								
								<tr>
									<td>Og Title</td>
									<td><input type="text" name="og_title" id="og_title" value="<?php echo $row['og_title'];?>" style="width: 100%;"></td>
								</tr>
								
								
								<tr>
									<td>Og URL</td>
									<td><input type="text" name="og_url" id="og_url" value="<?php echo $row['og_url'];?>" style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Og Type</td>
									<td><input type="text" name="og_type" id="og_type" value="<?php echo $row['og_type'];?>" style="width: 100%;"></td>
								</tr>
								
								
								<tr>
									<td>Og Description</td>
									<td><input type="text" name="og_description" id="og_description" value="<?php echo $row['og_description'];?>"  style="width: 100%;"></td>
								</tr>
								<tr>
									<td>Og Image</td>
									<td><input type="text" id="og_image" name="og_image" value="<?php echo $row['og_image'];?>"></td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnseosettingssadd" id="btnseosettingssadd" onclick="submitUpdateSeoSettings();">Submit</button>
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