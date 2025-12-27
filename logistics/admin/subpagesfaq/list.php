<?php 
global $adminPath;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT sub_pages_faq.id,sub_pages_faq.caption,sub_pages_faq.description, submenu.name as submenu FROM sub_pages_faq inner join submenu on sub_pages_faq.sub_menu_id=submenu.id where sub_pages_faq.status=0 order by submenu.id desc";
// echo $sql;
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Sub Pages Faq</h1>
		<div class="admin-main-section__content">
		<div class="href_add"><a href="add.php" class="btn-default">Add Sub Pages Faq</a></div>

			<div id="msg"></div>
			<form name="frmlistsubpagesfaq" id="frmlistsubpagesfaq" method="post" enctype="multipart/form-data">
				<table style="padding: 0; margin: 0;">
					<tr>
				   	<th>Caption</th>
					<th>Description</th>
                                        <th>Action</th>
                                    </tr>
									<?php
									if (@$result->num_rows > 0) 
									{
										$submenuName="";
										while ($row = $result->fetch_array()) 
										{
												if($submenuName!=$row["submenu"])
													{
														$submenuName=ucwords(str_replace("-"," ",$row["submenu"]));
												?>
														<tr><td colspan="3"><b><?php echo $submenuName; ?></b></td>
												<?php	
													}
													$submenuName=$row["submenu"];
										?>
										 	<tr>
												<td><?php echo $row["caption"]; ?></td>
												<td><?php echo $row["description"]; ?></td>
												<td>
												  <input type="button" class="form__submit btn2" id="btnSubPagesFaqEdit" name="btnSubPagesFaqEdit" value="Edit" onclick="editSubPagesFaq(<?php echo $row["id"]; ?>)">
												  <input type="button" class="form__submit btn2" id="btnSubPagesFaqDelete" name="btnSubPagesFaqDelete" value="Delete" onclick="deleteSubPagesFaq(<?php echo $row["id"]; ?>)">
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
include '../js/subpagesfaq.js';
include '../templates/footer.php'; 
?>