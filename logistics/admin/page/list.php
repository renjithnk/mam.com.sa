<?php 
global $adminPath;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
/*$sql = "SELECT page.id,page.caption,page.description,service.caption as service FROM page inner join service on page.service_id=service.id where page.status=0 order by service.id desc";
*/
$sql="select * from pages where status=0";
// echo $sql;
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Sub Pages</h1>
		<div class="admin-main-section__content">
		<div class="href_add"><a href="add.php" class="btn-default">Add Sub Page</a></div>

			<div id="msg"></div>
			<form name="frmlistpage" id="frmlistpage" method="post" enctype="multipart/form-data">
				<table style="padding: 0; margin: 0;">
					<tr>
					<!--<th>Service</th>-->
				   	<th>Caption</th>
					<!--<th>Description</th>-->
					<th>Image</th>
					<th>Alt</th>
                                        <th>Action</th>
                                    </tr>
									<?php
									if(@$result->num_rows > 0) 
									{
											while($row = $result->fetch_array()) 
											{
									?>
												<tr>
													<!--<td><?php // echo $row["service"]; ?></td>-->
													<td><?php echo $row["caption"]; ?></td>
													<!--<td><?php // echo $row["description"]; ?></td>-->
													<td><img src="<?php echo $adminPath; ?>/uploads/page/<?php echo $row["image"]; ?>" alt=""></td>
													<td><?php echo $row["alt"]; ?></td>
													<td>
													  <input type="button" class="form__submit btn2" id="btnPageEdit" name="btnPageEdit" value="Edit" onclick="editPage(<?php echo $row["id"]; ?>)">
													  <input type="button" class="form__submit btn2" id="btnPageDelete" name="btnPageDelete" value="Delete" onclick="deletePage(<?php echo $row["id"]; ?>)">
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
include '../js/page.js';
include '../templates/footer.php'; 
?>