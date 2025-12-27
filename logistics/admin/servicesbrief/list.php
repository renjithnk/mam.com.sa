<?php 
global $adminPath;
$adminPath=@$_SESSION['adminPath'];
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT * FROM services_brief where status=0 order by id desc";
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Services Brief</h1>
		
		<div class="admin-main-section__content">
		<!--<div class="href_add"><a href="add.php" class="btn-default">Add Services Brief</a></div>-->
					<div id="msg"></div>
							<form name="frmlistservicesbrief" id="frmlistservicesbrief" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
								<tr>
									<th>Caption</th>
									<th>Description</th>
									<th>Image</th>
									<th>Alt</th>
									<th>Icon Image1</th>
									<th>Icon Image1 Alt</th>
									<th>Icon Image1 Description</th>
									<!--<th>Icon Image2</th>
									<th>Icon Image2 Alt</th>
									<th>Icon Image2 Description</th>
									<th>Icon Image3</th>
									<th>Icon Image3 Alt</th>
									<th>Icon Image3 Description</th>-->
									<th>Action</th>
								</tr>
								<?php
								if(@$result->num_rows > 0) 
								{
									// Output data of each row
									while ($row = $result->fetch_array()) 
									{
									?>
										<tr>
											<td><?php echo $row["caption"]; ?></td>
											<td><?php echo $row["description"]; ?></td>
											<td><img src="<?php echo $adminPath; ?>/uploads/servicesbrief/<?php echo $row["image"]; ?>"></td>
											<td><?php echo $row["alt"]; ?></td>
											<td><img src="<?php echo $adminPath; ?>/uploads/servicesbrief/<?php echo $row["icon_image1"]; ?>" /></td>
											<td><?php echo $row["icon_image1_alt"]; ?></td>
											<td><?php echo $row["icon_image1_description"]; ?></td>
											<!--<td><img src="<?php // echo $adminPath; ?>/uploads/servicesbrief/<?php // echo $row["icon_image2"]; ?>" /></td>
											<td><?php // echo $row["icon_image2_alt"]; ?></td>
											<td><?php // echo $row["icon_image2_description"]; ?></td>
											<td><img src="<?php // echo $adminPath; ?>/uploads/servicesbrief/<?php // echo $row["icon_image3"]; ?>" /></td>
											<td><?php // echo $row["icon_image3_alt"]; ?></td>
											<td><?php // echo $row["icon_image3_description"]; ?></td>-->
											<td>
											  <input type="button" class="form__submit btn2" id="btnEdit" name="btnEdit" value="Edit" onclick="editServicesBrief(<?php echo $row["id"]; ?>)">
											  <input type="button" class="form__submit btn2" id="btnDelete" name="btnDelete" value="Delete" onclick="deleteServicesBrief(<?php echo $row["id"]; ?>)">
											</td>
										</tr>
									<?php
									}
								}
								else 
								{
								?>
									   <tr><td colspan="14" style="text-align:center;">No results to show</td></tr>
								<?php
								}
								?>
							  
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
include '../js/servicesbrief.js';
include '../templates/footer.php'; 	
?>