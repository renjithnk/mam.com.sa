<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
$sql = "SELECT * FROM service where status=0 order by id desc";
$db = new Database();
$serviceList = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Service Page Testimonial</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>servicetestimonial/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>


					
						<form name="frmaddservicetestimonial" id="frmaddservicetestimonial" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
							<tr>
								 <td>Service Page</td>
									<td>
									 <select name="service_id" id="service_id" class="form-control" required autofocus>
										<option value="">-- Select Service --</option>
										<?php 
										if(@$serviceList->num_rows > 0) 
										{
											// Output data of each row
											while ($serviceRow = $serviceList->fetch_array()) 
											{
												 ?>
													<option value="<?php echo $serviceRow['id'];?>"> <?php echo $serviceRow['caption'];?></option>
												 <?php 
											}
										 }
									 ?>
									  </select></td>
								 </tr>
								<tr>
									<td>Name</td>
									<td><input type="text" name="name" id="name"  value="" required></td>
								</tr>
								<tr>
									<td>Location</td>
									<td><input type="text" name="location" id="location" style="width: 100%;"></td>
								</tr>
								<!--<tr>
									<td>Comment</td>
									<td><textarea name="comment" id="comment" rows="5" cols="50" required>&nbsp;</textarea></td>
								</tr>
								-->
								
								
								<tr>
									 <td>Comment</td>
									 <td>
											<textarea name="comment" id="comment" rows="5" cols="50" required>
													&nbsp;
											</textarea>
											
									 </td>
								</tr>
								
								
								
								
								
								
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnservicetestimonialadd" id="btnservicetestimonialadd" onclick="submitServiceTestimonial();">Submit</button>
									</td>
								</tr>
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
include '../js/servicetestimonial.js';
include '../templates/footer.php'; 
?>