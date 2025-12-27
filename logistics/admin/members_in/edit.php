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
	$sql = "SELECT * FROM members_in where id=$id and status=0";  
	$result = $db->query($sql); 
	if($result)
	{
		$row = $result->fetch_array();
		$imgPath="";
		if(@$row['image1'] != "")
		{
			$img1Path=$adminPath . 'uploads/members_in/' . @$row['image1'];
		}
		if(@$row['image2'] != "")
		{
			$img2Path=$adminPath . 'uploads/members_in/' . @$row['image2'];
		}
		
	}
}
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit Members In</h1>
		
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>members_in/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>

						<!-- <h3>Add</h3> -->
						<form name="frmeditmembers_in" id="frmeditmembers_in" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Title</td>
									<td><input type="text" name="title" id="title" style="width: 100%;" value="<?php echo $row['title']; ?>" required></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><textarea name="description" id="description" rows="5" cols="50" required><?php echo $row['description']; ?></textarea></td>
								</tr>
								<tr>
									<td>Image1</td>
									<td><input type="file" id="image1" name="image1"><img id="img1Path" name="img1Path" src="<?php echo @$img1Path; ?>" /></td>
								</tr>
								<tr>
									<td>Image1 Alt</td>
									<td><input type="text" name="image1_alt" id="image1_alt" style="width: 100%;" value="<?php echo @$row['image1_alt']; ?>" required></td>
								</tr>
								<tr>
									<td>Image2</td>
									<td><input type="file" id="image2" name="image2"><img id="img2Path" name="img2Path" src="<?php echo @$img2Path; ?>" /></td>
								</tr>
								<tr>
									<td>Image2 Alt</td>
									<td><input type="text" name="image2_alt" id="image2_alt" style="width: 100%;" value="<?php echo @$row['image2_alt']; ?>" required></td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnmembers_inadd" id="btnmembers_inadd" onclick="submitUpdatemembers_in();">Submit</button>
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