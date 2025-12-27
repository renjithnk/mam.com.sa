<?php 
global $adminPath;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT landingpagesservice.id,landingpagesservice.page_id,landingpagesservice.caption,landingpagesservice.description,landingpagesservice.image,landingpagesservice.alt,landingpagesservice.status, landingpage.pagename,landingpage.status FROM `landingpagesservice` inner join landingpage on landingpagesservice.page_id=landingpage.id where landingpage.status=0 and landingpagesservice.status=0 order by landingpagesservice.id desc";
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Service</h1>
		<div class="admin-main-section__content">
		<div class="href_add"><a href="add.php" class="btn-default">Add Service</a></div>

			<div id="msg"></div>
			<form name="frmlistservice" id="frmlistservice" method="post" enctype="multipart/form-data">
				<table style="padding: 0; margin: 0;">
					<tr>
				   	<th>Service Caption</th>
					<!--<th>Service Description</th>-->
					 				    <th>Page</th>
                                        <th>Service Image</th>
                                        <th>Alt</th>
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
											    <td><?php echo $row["pagename"]; ?></td>
												<td><?php echo $row["caption"]; ?></td>
												<!--<td><?php // echo $row["description"]; ?></td>-->
												<td><img src="<?php echo $adminPath; ?>/uploads/landingpagesservice/<?php echo $row["image"]; ?>" alt=""></td>
												<td><?php echo $row["alt"]; ?></td>
											
												<td>
												  <input type="button" class="form__submit btn2" id="btnServiceEdit" name="btnServiceEdit" value="Edit" onclick="editService(<?php echo $row["id"]; ?>)">
												  <input type="button" class="form__submit btn2" id="btnServiceDelete" name="btnServiceDelete" value="Delete" onclick="deleteService(<?php echo $row["id"]; ?>)">
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
include '../js/landingpagesservice.js';
include '../templates/footer.php'; 
?>