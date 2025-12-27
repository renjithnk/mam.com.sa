<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
$sql = "SELECT * FROM submenu where status=0 order by id desc";
$db = new Database();
$subMenuList = $db->query($sql);

		if(isset($_GET["id"]))
		{
		  $id=$_GET["id"];
		}
		if(@$id != "")
		{
					$sql = "SELECT * FROM sub_pages_videos where id=$id and status=0";  
					$result = $db->query($sql); 
					$row = $result->fetch_array();
					/*$imgPath="";
					if(@$row['image'] != "")
					{
						$imgPath=$adminPath . 'uploads/videos/' . @$row['image'];
					}*/
		}
$sql = "SELECT * FROM service where status=0 order by id desc";
$serviceList = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit Sub Page Videos</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>subpagevideos/list.php" class="btn-default">Back</a></div>
		
					<div id="msg"></div>
					<form name="frmeditvideos" id="frmeditvideos" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
									
									
									<table style="padding: 0; margin: 0;">
									  <tr>
											<td>Page</td>
											<td>
											 <select name="sub_menu_id" id="sub_menu_id" class="form-control" required autofocus>
												<option value="">-- Select Page --</option>
												<?php 
												if(@$subMenuList->num_rows > 0) 
												{
													// Output data of each row
													while($subMenuRow = $subMenuList->fetch_array()) 
													{
														 ?>
															<option value="<?php echo $subMenuRow['id'];?>" <?=(@$row['sub_menu_id'] == @$subMenuRow['id']) ? 'selected' : ''?>> <?php echo $subMenuRow['name'];?></option>
														 <?php 
													}
												 }
											 ?>
											  </select></td>
										 </tr>
										 <tr>
											<td>Video URL</td>
											<td><input type="text" name="video_url" id="video_url" class="cls_txt" style="width:910px" value="<?php echo @$row['video_url'];?>" required></td>
										 </tr>
										<tr>
											<td colspan="2" class="cls_btn"><input class="form__submit btn1" type="submit" onclick="submitEditVideos();" value="Submit" name="btnVideosAdd" id="btnVideosAdd"></td>
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
include '../js/subpagesvideos.js';
include '../templates/footer.php'; 
?>