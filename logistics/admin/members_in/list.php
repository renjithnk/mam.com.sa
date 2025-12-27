<?php 
global $adminPath;
$adminPath=@$_SESSION['adminPath'];
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT * FROM members_in where status=0 order by id desc";
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Members In</h1>
		
		<div class="admin-main-section__content">
		<!--<div class="href_add"><a href="add.php" class="btn-default">Add Members In</a></div>-->
					<div id="msg"></div>
							<form name="frmlistmembers_in" id="frmlistmembers_in" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
								<tr>
									<th>Title</th>
									<th>Description</th>
									<th>Image1</th>
									<th>Alt</th>
									<th>Image2</th>
									<th>Alt</th>
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
											<td><?php echo $row["title"]; ?></td>
											<td><?php echo $row["description"]; ?></td>
											<td><img src="<?php echo $adminPath; ?>/uploads/members_in/<?php echo $row["image1"]; ?>"></td>
											<td><?php echo $row["image1_alt"]; ?></td>
											<td><img src="<?php echo $adminPath; ?>/uploads/members_in/<?php echo $row["image2"]; ?>"></td>
											<td><?php echo $row["image2_alt"]; ?></td>
											<td>
											  <input type="button" class="form__submit btn2" id="btnEdit" name="btnEdit" value="Edit" onclick="editMembersIn(<?php echo $row["id"]; ?>)">
											  <input type="button" class="form__submit btn2" id="btnDelete" name="btnDelete" value="Delete" onclick="deleteMembersIn(<?php echo $row["id"]; ?>)">
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
include '../js/members_in.js';
include '../templates/footer.php'; 	
?>