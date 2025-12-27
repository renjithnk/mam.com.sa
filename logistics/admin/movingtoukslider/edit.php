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
	$sql = "SELECT * FROM landingpageslider where id=$id";  
	$result = $db->query($sql); 
	$row = $result->fetch_array();
	$imgPath="";
	if(@$row['image'] != "")
	{
		$imgPath=$adminPath . 'uploads/landingpageslider/' . @$row['image'];
	}
}
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit Moving To UK Slider</h1>
		
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>landingpageslider/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>

						<!-- <h3>Add</h3> -->
						<form name="frmeditlandingpageslider" id="frmeditlandingpageslider" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Caption</td>
									<td><input type="text" name="caption" id="caption" style="width: 100%;" value="<?php echo @$row['caption']; ?>" required></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><textarea name="description" id="description" rows="5" cols="50" required><?php echo @$row['description']; ?></textarea></td>
								</tr>
								<tr>
									<td>Image</td>
									<td><input type="file" id="image" name="image"><img id="imgPath" name="imgPath" src="<?php echo @$imgPath; ?>" /></td>
								</tr>
								<tr>
									<td>Alt</td>
									<td><input type="text" name="alt" id="alt" style="width: 100%;" value="<?php echo @$row['alt']; ?>" required></td>
								</tr>
								<tr>
									<td>Caption</td>
									<td><input type="text" name="caption" id="caption" style="width: 100%;" value="<?php echo @$row['caption']; ?>" required></td>
								</tr>
								<tr>	
									<td colspan="2" class="cls_btn"><input type="submit" class="form__submit btn1" value="Submit" name="btnupdate" id="btnupdate" onclick="submitEditLandingPageSlider();"></td>
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
include '../js/landingpageslider.js';
include '../templates/footer.php'; 
?>