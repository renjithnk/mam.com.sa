<?php 
global $adminPath;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT * FROM moving_to_uk where status=0 order by id desc";
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Quotations Received</h1>
		<div class="admin-main-section__content">
		<!--<div class="href_add"><a href="add.php" class="btn-default">Add Request A Quote</a></div>-->
			<div id="msg"></div>
			<form name="frmlistquoterequests" id="frmlistquoterequests" method="post" enctype="multipart/form-data">
						<table style="padding: 0; margin: 0;">
									<tr>
										<th width="5">Name</th>
                                        <th width="5">Email</th>
										<th width="5">Country Code</th>
										<th width="5">Phoneno</th>
                                        <th width="10">Moving From Country</th>
										<th width="10">Moving To Country</th>
										<th width="10">Date</th>
										<th width="10">Preffered Moving Date</th>
                                        <th width="10">Action</th>
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
												<td><?php echo $row["country_code"]; ?></td>
												<td><?php echo $row["phoneno"]; ?></td>
												<td><?php echo $row["moving_from_country"]; ?></td>
												<td><?php echo $row["moving_to_country"]; ?></td>
												<td><?php 
												$createdDateTime = strtotime($row["created_at"]); 
												$createdDate = date("d M Y", $createdDateTime); 
												echo $createdDate; ?></td>
												<td><?php 
												$estimatedTime=strtotime($row["estimated_date"]);
												$estimatedDate = date("d M Y", $estimatedTime);  
												echo $estimatedDate;
												?></td>
												<td>
												  <input type="button" class="form__submit btn2" id="btnQuoteRequestDelete" name="btnQuoteRequestDelete" value="Delete" onclick="deleteQuoteRequest(<?php echo $row["id"]; ?>)">
												</td>
											</tr>
										<?php
										}
									}
									else 
									{
									?>
										   <tr><td colspan="11" style="text-align:center;">No results to show</td></tr>
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
include '../js/movingtoukquoterequests.js';
include '../templates/footer.php'; 
?>