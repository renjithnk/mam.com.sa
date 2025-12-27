<?php 
global $adminPath;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT * FROM ourservice where status=0 order by id desc";
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Our Service</h1>
		<div class="admin-main-section__content">
		<div class="href_add"><a href="add.php" class="btn-default">Add Our Service</a></div>

			<div id="msg"></div>
			<form name="frmlistourservice" id="frmlistourservice" method="post" enctype="multipart/form-data">
				<table style="padding: 0; margin: 0;">
					<tr>
				   	<th>Caption</th>
					<th>Description</th>
                                        <th>Image</th>
                                        <th>Alt</th>
										<th>Ads Image</th>
										<th>Ads Image Alt</th>
                                        <th>Action</th>
                                    </tr>
									<?php
									if (@$result->num_rows > 0) 
									{
										// Output data of each row
										while ($row = $result->fetch_array()) 
										{
										?>
										 	<tr>
												<td><?php echo $row["caption"]; ?></td>
												<td><?php echo $row["description"]; ?></td>
												<td><img src="<?php echo $adminPath; ?>/uploads/ourservice/<?php echo $row["image"]; ?>" alt=""></td>
												<td><?php echo $row["alt"]; ?></td>
												<td><img src="<?php echo $adminPath; ?>/uploads/ourservice/<?php echo $row["ads_image"]; ?>" alt=""></td>
												<td><?php echo $row["ads_image_alt"]; ?></td>
											
												<td>
												  <input type="button" class="form__submit btn2" id="btnOurserviceEdit" name="btnOurserviceEdit" value="Edit" onclick="editOurservice(<?php echo $row["id"]; ?>)">
												  <input type="button" class="form__submit btn2" id="btnOurserviceDelete" name="btnOurserviceDelete" value="Delete" onclick="deleteOurservice(<?php echo $row["id"]; ?>)">
												</td>
											</tr>
										<?php
										}
									}
									else 
									{
									?>
										   <tr><td colspan="5" style="text-align:center;">No results to show</td></tr>
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
include '../js/ourservice.js';
include '../templates/footer.php'; 
?>