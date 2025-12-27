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
					$sql = "SELECT * FROM submenu where id=$id and status=0";  
					$result = $db->query($sql); 
					$row = $result->fetch_array();
					$imgPath="";
					if(@$row['image'] != "")
					{
						$imgPath=$adminPath . 'uploads/submenu/' . @$row['image'];
					}
		}
$sql = "SELECT * FROM service where status=0 order by id desc";
$serviceList = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit SubMenu</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>submenu/list.php" class="btn-default">Back</a></div>

					<div id="msg"></div>
					<form name="frmeditsubmenu" id="frmeditsubmenu" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
									<table style="padding: 0; margin: 0;">
									<tr>
											<td>Service</td>
											<td>
											 <select name="service_id" id="service_id" class="form-control" required autofocus>
												<option value="">-- Select Service --</option>
												<?php 
												if(@$serviceList->num_rows > 0) 
												{
													// Output data of each row
													while ($serviceRow = $serviceList->fetch_array()) 
													{
														 ?>
															<option value="<?php echo $serviceRow['id'];?>"  <?=(@$row['service_id'] == @$serviceRow['id']) ? 'selected' : ''?>> <?php echo $serviceRow['caption'];?></option>
														 <?php 
													}
												 }
											 ?>
											  </select></td>
		 								</tr>
										<tr>
											<td>Name</td>
											<td><input type="text" name="name" id="name" class="cls_txt" style="width:910px" value="<?php echo @$row['name'];?>" required></td>
										 </tr>
										<tr>
											<td colspan="2" class="cls_btn"><input class="form__submit btn1" type="submit" onclick="submitEditSubMenu();" value="Submit" name="btnSubMenuAdd" id="btnSubMenuAdd"></td>
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
include '../js/submenu.js';
include '../templates/footer.php'; 
?>