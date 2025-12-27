<?php 
global $adminPath;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT * from videos where status=0 order by videos.id desc";
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Videos</h1>
		<div class="admin-main-section__content">
		<div class="href_add"><a href="add.php" class="btn-default">Add videos</a></div>

			<div id="msg"></div>
			<form name="frmlistvideos" id="frmlistvideos" method="post" enctype="multipart/form-data">
				<table style="padding: 0; margin: 0;">
					<tr>
					<!--<th>Service</th>-->
				   	<th>Page</th>
					<th>Video URL</th>
                                        <th>Action</th>
                                    </tr>
									<?php
									if (@$result->num_rows > 0) 
									{
										// Output data of each row
										$serviceName="";
										while ($row = $result->fetch_array()) 
										{
										?>
										 	<tr>
												<!--<td><?php // echo $row["service"]; ?></td>-->
												<td><?php echo $row["page_name"]; ?></td>
												<td><?php echo $row["video_url"]; ?></td>
												<td>
												  <input type="button" class="form__submit btn2" id="btnVideosEdit" name="btnVideosEdit" value="Edit" onclick="editVideos(<?php echo $row["id"]; ?>)">
												  <input type="button" class="form__submit btn2" id="btnVideosDelete" name="btnVideosDelete" value="Delete" onclick="deleteVideos(<?php echo $row["id"]; ?>)">
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
include '../js/videos.js';
include '../templates/footer.php'; 
?>