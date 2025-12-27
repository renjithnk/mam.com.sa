<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
$sql = "SELECT * FROM landingpage where status=0 order by id desc";
$db = new Database();
$landingPageList = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Stress Free move</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>streefreemove/list.php" class="btn-default">Back</a></div>

					<div id="msg"></div>
<form name="frmaddstreefreemove" id="frmaddstreefreemove" method="post" enctype="multipart/form-data">
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
								<option value="<?php echo $landingPageListRow['id'];?>"> <?php echo $landingPageListRow['pagename'];?></option>
							 <?php 
						}
					 }
				 ?>
				  </select>
				</td>
		</tr>
		<tr>
			<td>Caption</td>
			<td><input type="text" id="caption" name="caption" class="cls_txt" required></td>
		</tr>
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
			<button class="form__submit btn1" type="submit" name="btnStreeFreeMoveAdd" id="btnStreeFreeMoveAdd" onclick="submitStreeFreeMove();">Submit</button></td>
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
include '../js/streefreemove.js';
include '../templates/footer.php'; 
?>