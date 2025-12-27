<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
$sql = "SELECT * FROM submenu where status=0 order by id desc";
$db = new Database();
$subMenuList = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Sub Page Testimonial</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>subpagestestimonial/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>


					
						<form name="frmaddsubpagestestimonial" id="frmaddsubpagestestimonial" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
							<tr>
								<td>Sub Page</td>
								<td>
								 <select name="sub_menu_id" id="sub_menu_id" class="form-control" required autofocus>
									<option value="">-- Select Sub Page --</option>
									<?php 
									if(@$subMenuList->num_rows > 0) 
									{
										// Output data of each row
										while($subMenuRow = $subMenuList->fetch_array()) 
										{
											 ?>
												<option value="<?php echo $subMenuRow['id'];?>"> <?php echo $subMenuRow['name'];?></option>
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
									<button class="form__submit btn1" type="submit" name="btnsubPagestestimonialadd" id="btnsubPagestestimonialadd" onclick="submitSubPagesTestimonial();">Submit</button>
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
include '../js/subpagestestimonial.js';
include '../templates/footer.php'; 
?>