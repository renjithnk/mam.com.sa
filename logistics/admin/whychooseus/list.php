<?php 
global $adminPath;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT whychooseus.id,whychooseus.page_id,whychooseus.caption,whychooseus.image,whychooseus.alt,whychooseus.status, landingpage.pagename,landingpage.status FROM `whychooseus` inner join landingpage on whychooseus.page_id=landingpage.id where landingpage.status=0 and whychooseus.status=0 order by whychooseus.id desc";
// $sql = "SELECT * FROM whychooseus where status=0 order by id desc";
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Why Choose Us</h1>
		<div class="admin-main-section__content">
		<div class="href_add"><a href="add.php" class="btn-default">Add Why Choose Us</a></div>
			<div id="msg"></div>
			<form name="frmlistwhychooseus" id="frmlistwhychooseus" method="post" enctype="multipart/form-data">
				<table style="padding: 0; margin: 0;">
									<tr>
										<th>Page</th>
										<th>Caption</th>
                                        <th>Image</th>
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
												<td><img src="<?php echo $adminPath; ?>/uploads/whychooseus/<?php echo $row["image"]; ?>" alt=""></td>
												<td><?php echo $row["alt"]; ?></td>
											
												<td>
												  <input type="button" class="form__submit btn2" id="btnWhyChooseUsEdit" name="btnWhyChooseUsEdit" value="Edit" onclick="editWhyChooseUs(<?php echo $row["id"]; ?>)">
												  <input type="button" class="form__submit btn2" id="btnWhyChooseUsDelete" name="btnWhyChooseUsDelete" value="Delete" onclick="deleteWhyChooseUs(<?php echo $row["id"]; ?>)">
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
include '../js/whychooseus.js';
include '../templates/footer.php'; 
?>