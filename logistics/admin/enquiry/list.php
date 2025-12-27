<?php 
global $adminPath;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT * FROM enquiries where status=0 order by id desc";
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Enquiry</h1>
		<div class="admin-main-section__content">
		<!--<div class="href_add"><a href="add.php" class="btn-default">Add Enquiry</a></div>-->
			<div id="msg"></div>
			<form name="frmlistenquiry" id="frmlistenquiry" method="post" enctype="multipart/form-data">
						<table style="padding: 0; margin: 0;">
									<tr>
										<th>Name</th>
                                        <th>Email</th>
										<th>Mobileno</th>
										<th>Date</th>
                                        <th>Message</th>
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
												<td><?php echo $row["name"]; ?></td>
												<td><?php echo $row["email"]; ?></td>
												<td><?php echo $row["mobileno"]; ?></td>
												<td>
												<?php 
												if($row["enquiry_date"] != "")
												{
													   $enquiryTime=strtotime($row["enquiry_date"]);
													   $enquiryDate = date("d M Y", $enquiryTime);  
													   echo $enquiryDate;
												}
												else
												{
												?>
												      &nbsp;&nbsp;&nbsp;
												<?php   
												}
												?>
												</td>
												<td><?php echo $row["message"]; ?></td>
												<td>
												 
												  <input type="button" class="form__submit btn2" id="btnEnquiryDelete" name="btnEnquiryDelete" value="Delete" onclick="deleteEnquiry(<?php echo $row["id"]; ?>)">
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
include '../js/enquiry.js';
include '../templates/footer.php'; 
?>