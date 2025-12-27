<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
$sql = "SELECT * FROM service where status=0 order by id desc";
$db = new Database();
$serviceList = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Videos</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>videos/list.php" class="btn-default">Back</a></div>

					<div id="msg"></div>
<form name="frmaddvideos" id="frmaddvideos" method="post" enctype="multipart/form-data">
	<table style="padding: 0; margin: 0;">
	
	  	  <tr>
		    <td>Service</td>
			<td>
			 <select name="service_id" id="service_id" class="form-control" required autofocus>
                <option value="">-- Select --</option>
				<option value="0">Landing Page</option>
                <?php 
				if(@$serviceList->num_rows > 0) 
				{
					// Output data of each row
					while ($serviceRow = $serviceList->fetch_array()) 
					{
						 ?>
							<option value="<?php echo $serviceRow['id'];?>"> <?php echo $serviceRow['caption'];?></option>
						 <?php 
					}
			     }
			 ?>
              </select></td>
		 </tr>
	
	
		<!--<tr>
			<td>Page Name</td>
			<td><input type="text" name="page_name" id="page_name" class="cls_txt" style="width:910px" required></td>
		 </tr>-->
		 <tr>
			<td>Video URL</td>
			<td><input type="text" name="video_url" id="video_url" class="cls_txt" style="width:910px" required></td>
		 </tr>
		<tr>
			<td colspan="2" style="text-align:center;">
			<button class="form__submit btn1" type="submit" name="btnVideosAdd" id="btnVideosAdd" onclick="submitVideos();">Submit</button></td>
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
include '../js/videos.js';
include '../templates/footer.php'; 
?>