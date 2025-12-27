<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Testimonial</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>testimonial/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>


					
						<form name="frmaddtestimonial" id="frmaddtestimonial" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
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
									<button class="form__submit btn1" type="submit" name="btntestimonialadd" id="btntestimonialadd" onclick="submitTestimonial();">Submit</button>
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
include '../js/testimonial.js';
include '../templates/footer.php'; 
?>