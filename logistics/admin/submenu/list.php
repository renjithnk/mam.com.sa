<?php 
global $adminPath;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT submenu.id,submenu.name,service.caption as service FROM submenu inner join service on submenu.service_id=service.id where submenu.status=0 order by service.id desc";
// echo $sql;
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Sub Menu</h1>
		<div class="admin-main-section__content">
		<div class="href_add"><a href="add.php" class="btn-default">Add Sub Menu</a></div>

			<div id="msg"></div>
			<form name="frmlistsubmenu" id="frmlistsubmenu" method="post" enctype="multipart/form-data">
				<table style="padding: 0; margin: 0;">
					<tr>
					<!--<th>Service</th>-->
				   	<th>Name</th>
                                        <th>Action</th>
                                    </tr>
									<?php
									if (@$result->num_rows > 0) 
									{
										// Output data of each row
										$serviceName="";
										while ($row = $result->fetch_array()) 
										{
										    if($serviceName!=$row["service"])
											{
											    $service=ucwords(str_replace("-"," ",$row["service"]));
										?>
												<tr><td colspan="3"><b><?php echo $service; ?></b></td>
										<?php	
											}
											$serviceName=$row["service"];
										?>
										 	<tr>
												<!--<td><?php // echo $row["service"]; ?></td>-->
												<td><?php echo $row["name"]; ?></td>
												<!--<td><?php // echo $row["description"]; ?></td>-->
												<td>
												  <input type="button" class="form__submit btn2" id="btnSubMenuEdit" name="btnSubMenuEdit" value="Edit" onclick="editSubMenu(<?php echo $row["id"]; ?>)">
												  <input type="button" class="form__submit btn2" id="btnSubMenuDelete" name="btnSubMenuDelete" value="Delete" onclick="deleteSubMenu(<?php echo $row["id"]; ?>)">
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
include '../js/submenu.js';
include '../templates/footer.php'; 
?>