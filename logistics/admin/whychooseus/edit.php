<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
$sql = "SELECT * FROM landingpage where status=0 order by id desc";
$db = new Database();
$landingPageList = $db->query($sql);

		if(isset($_GET["id"]))
		{
		  $id=$_GET["id"];
		}
		if(@$id != "")
		{
					$sql = "SELECT * FROM whychooseus where id=$id and status=0";  
					$result = $db->query($sql); 
					$row = $result->fetch_array();
					$imgPath="";
					if(@$row['image'] != "")
					{
						$imgPath=$adminPath . 'uploads/whychooseus/' . @$row['image'];
					}
		}
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit Why Choose Us</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>whychooseus/list.php" class="btn-default">Back</a></div>

					<div id="msg"></div>
					<form name="frmeditwhychooseus" id="frmeditwhychooseus" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
									<table style="padding: 0; margin: 0;">
									    <tr>
											<td>Page</td>
											<td>
											 <select name="landingpage_id" id="landingpage_id" class="form-control" required autofocus>
												<option value="">-- Select Landing Page --</option>
												<?php 
												if(@$landingPageList->num_rows > 0) 
												{
													// Output data of each row
													while ($landingPageListRow = $landingPageList->fetch_array()) 
													{
														 ?>
															<option value="<?php echo $landingPageListRow['id'];?>" <?=(@$row['page_id'] == @$landingPageListRow['id']) ? 'selected' : ''?>><?php echo $landingPageListRow['pagename'];?></option>
														 <?php 
													}
												 }
											 ?>
											  </select>
											</td>
										</tr>
										<tr>
											<td>Caption</td>
											<td><input type="text" id="caption" name="caption" class="cls_txt" required value="<?php echo @$row['caption'];?>"></td>
										</tr>
										<tr>
											<td>Image</td>
											<td><input type="file" id="image" name="image"><img id="imgPath" name="imgPath" src="<?php echo @$imgPath; ?>" /></td>
										</tr>
										<tr>
											<td>Alt</td>
											<td><input type="text" id="alt" name="alt" class="cls_txt" required value="<?php echo @$row['alt'];?>" /></td>
										</tr>
										<tr>
											<td colspan="2" class="cls_btn"><input class="form__submit btn1" type="submit" onclick="submitEditWhyChooseUs();" value="Submit" name="btnWhyChooseUsAdd" id="btnWhyChooseUsAdd"></td>
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
include '../js/whychooseus.js';
include '../templates/footer.php'; 
?>