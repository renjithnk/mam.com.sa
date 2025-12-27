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
	$sql = "SELECT * FROM logistics_brief where id=$id and status=0";  
	$result = $db->query($sql); 
	if($result)
	{
		$row = $result->fetch_array();
		$imgPath="";
		if(@$row['image'] != "")
		{
			$imgPath=$adminPath . 'uploads/logisticsbrief/' . @$row['image'];
		}
	}
}
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit Logistics Brief</h1>
		
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>logisticsbrief/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>

						<!-- <h3>Add</h3> -->
						<form name="frmeditlogistics" id="frmeditlogistics" method="post" enctype="multipart/form-data">
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
									<td>Image</td>
									<td><input type="file" id="image" name="image"><img id="imgPath" name="imgPath" src="<?php echo @$imgPath; ?>" /></td>
								</tr>
								<tr>
									<td>Alt</td>
									<td><input type="text" name="alt" id="alt" style="width: 100%;" value="<?php echo @$row['alt']; ?>" required></td>
								</tr>
								<tr>
									<td>Short Title</td>
									<td><input type="text" name="short_title" id="short_title" style="width: 100%;" value="<?php echo $row['short_title']; ?>" required></td>
								</tr>
								
								<tr>
									<td>Short Description</td>
									<td><textarea name="short_description" id="short_description" rows="5" cols="50" required><?php echo $row['short_description']; ?></textarea></td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnlogisticsadd" id="btnlogisticsadd" onclick="submitUpdateLogistics();">Submit</button>
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
include '../js/logisticsbrief.js';
include '../templates/footer.php'; 
?>