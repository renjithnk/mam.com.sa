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
	$sql = "SELECT * FROM about_brief where id=$id";  
	$result = $db->query($sql); 
	$row = $result->fetch_array();
	$imgPath="";
	if(@$row['image'] != "")
	{
		$imgPath=$adminPath . 'uploads/aboutbrief/' . @$row['image'];
	}
	if(@$row['icon_image1'] != "")
	{
		$icon_image1=$adminPath . 'uploads/aboutbrief/' . @$row['icon_image1'];
	}
	if(@$row['icon_image2'] != "")
	{
		$icon_image2=$adminPath . 'uploads/aboutbrief/' . @$row['icon_image2'];
	}
	if(@$row['icon_image3'] != "")
	{
		$icon_image3=$adminPath . 'uploads/aboutbrief/' . @$row['icon_image3'];
	}
}
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit About Brief</h1>
		
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>aboutbrief/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>

						<!-- <h3>Add</h3> -->
						<form name="frmeditaboutbrief" id="frmeditaboutbrief" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Caption</td>
									<td><input type="text" name="caption" id="caption" style="width: 100%;" value="<?php echo $row['caption'];?>" required></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><textarea name="description" id="description" rows="5" cols="50" required><?php echo $row['description'];?></textarea></td>
								</tr>
								<tr>
									<td>Image</td>
									<td><input type="file" id="image" name="image"><img id="imgPath" name="imgPath" src="<?php echo @$imgPath; ?>" /></td>
								</tr>
								<tr>
									<td>Alt</td>
									<td><input type="text" name="alt" id="alt" style="width: 100%;" value="<?php echo $row['alt'];?>" required></td>
								</tr>
								
								<tr>
									<td>Icon Image1</td>
									<td><input type="file" id="icon_image1" name="icon_image1"><img id="imgPath1" name="imgPath1" src="<?php echo @$icon_image1; ?>" /></td>
								</tr>
								<tr>
									<td>Icon Image Alt</td>
									<td><input type="text" name="icon_image1_alt" id="icon_image1_alt" style="width: 100%;" value="<?php echo $row['icon_image1_alt'];?>" required></td>
								</tr>
								
								<tr>
									<td>Description</td>
									<td><textarea name="icon_image1_description" id="icon_image1_description" rows="5" cols="50" required><?php echo $row['icon_image1_description'];?></textarea></td>
								</tr>
								<tr>
									<td>Icon Image2</td>
									<td><input type="file" id="icon_image2" name="icon_image2"><img id="imgPath2" name="imgPath2" src="<?php echo @$icon_image2; ?>" /></td>
								</tr>
								<tr>
									<td>Icon Image Alt</td>
									<td><input type="text" name="icon_image2_alt" id="icon_image2_alt" style="width: 100%;" value="<?php echo $row['icon_image2_alt'];?>" required></td>
								</tr>
								
								<tr>
									<td>Description</td>
									<td><textarea name="icon_image2_description" id="icon_image2_description" rows="5" cols="50" required><?php echo $row['icon_image2_description'];?></textarea></td>
								</tr>
								
								
								<tr>
									<td>Icon Image3</td>
									<td><input type="file" id="icon_image3" name="icon_image3"><img id="imgPath3" name="imgPath3" src="<?php echo @$icon_image3; ?>"/></td>
								</tr>
								<tr>
									<td>Icon Image Alt</td>
									<td><input type="text" name="icon_image3_alt" id="icon_image3_alt" style="width: 100%;" value="<?php echo $row['icon_image3_alt'];?>" required></td>
								</tr>
								
								<tr>
									<td>Description</td>
									<td><textarea name="icon_image3_description" id="icon_image3_description" rows="5" cols="50" required><?php echo $row['icon_image3_description'];?></textarea></td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnaboutbriefupdate" id="btnaboutbriefupdate" onclick="submitUpdateAboutBrief();">Submit</button>
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
include '../js/aboutbrief.js';
include '../templates/footer.php'; 
?>