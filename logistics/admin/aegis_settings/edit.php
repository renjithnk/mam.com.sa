<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
if(isset($_GET["id"]))
{
  $id=$_GET["id"];
}
if(@$id != "")
{
	$sql = "SELECT * FROM aegis_settings where id=$id and status=0";  
	$result = $db->query($sql); 
	if($result)
	{
		$row = $result->fetch_array();
		$imgPath="";
		if(@$row['logo'] != "")
		{
			$imgPath=$adminPath . 'uploads/aegissettings/' . @$row['logo'];
		}
	}
}
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit Aegis Settings</h1>
		
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>aegis_settings/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>

						<!-- <h3>Add</h3> -->
						<form name="frmeditaegissettings" id="frmeditaegissettings" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Caption</td>
									<td><input type="text" name="caption" id="caption" style="width: 100%;" value="<?php echo $row['caption'];?>" required></td>
								</tr>
								<tr>
									<td>Address1</td>
									<td><input type="text" name="address1" id="address1" style="width: 100%;" value="<?php echo $row['address1'];?>" required></td>
								</tr>
								<tr>
									<td>Address2</td>
									<td><input type="text" name="address2" id="address2" style="width: 100%;" value="<?php echo $row['address2'];?>" required></td>
								</tr>
								<tr>
									<td>Address3</td>
									<td><input type="text" name="address3" id="address3" style="width: 100%;" value="<?php echo $row['address3'];?>" required></td>
								</tr>
								<tr>
									<td>Address4</td>
									<td><input type="text" name="address4" id="address4" style="width: 100%;" value="<?php echo $row['address4'];?>" required></td>
								</tr>
								
								
								<tr>
									<td>Country</td>
									<td><input type="text" name="country" id="country" style="width: 100%;" value="<?php echo $row['country'];?>" required></td>
								</tr>
								
								
								<tr>
									<td>Email1</td>
									<td><input type="email" name="email1" id="email1" style="width: 100%;" value="<?php echo $row['email1'];?>" required></td>
								</tr>
								<tr>
									<td>Email2</td>
									<td><input type="email" name="email2" id="email2" style="width: 100%;" value="<?php echo $row['email2'];?>" required></td>
								</tr>
								
								
								<tr>
									<td>Contact No1</td>
									<td><input type="text" name="contactno1" id="contactno1" style="width: 100%;" value="<?php echo $row['contactno1'];?>" required></td>
								</tr>
								<tr>
									<td>Contact No2</td>
									<td><input type="text" name="contactno2" id="contactno2" style="width: 100%;" value="<?php echo $row['contactno2'];?>"></td>
								</tr>
								<tr>
									<td>Description</td>
									<td>
										<textarea name="description" id="description" rows="5" cols="50"><?php echo $row['description'];?></textarea>
									</td>
									
								</tr>
								
								<tr>
									<td>Branch 1</td>
									<td><input type="text" name="branch1" id="branch1" style="width: 100%;" value="<?php echo $row['branch1'];?>" required></td>
								</tr>
								<tr>
									<td>Branch 2</td>
									<td><input type="text" name="branch2" id="branch2" style="width: 100%;" value="<?php echo $row['branch2'];?>"></td>
								</tr>
								
								
								<tr>
									<td>Insta Link</td>
									<td><input type="text" name="insta_link" id="insta_link" style="width: 100%;" value="<?php echo $row['insta_link'];?>" required></td>
								</tr>
								<tr>
									<td>Facebook Link</td>
									<td><input type="text" name="fb_link" id="fb_link" style="width: 100%;" value="<?php echo $row['fb_link'];?>" required></td>
								</tr>
								<tr>
									<td>Linkedin Link</td>
									<td><input type="text" name="linkedin_link" id="linkedin_link" style="width: 100%;" value="<?php echo $row['linkedin_link'];?>" required></td>
								</tr>
								
								<tr>
									<td>Google Review Link</td>
									<td><input type="text" name="google_review_link" id="google_review_link" style="width: 100%;" value="<?php echo $row['google_review_link'];?>" required></td>
								</tr>
								
								<tr>
									<td>Location Map</td>
									<td>
										<textarea name="location_map" id="location_map" rows="5" cols="50"><?php echo $row['location_map'];?></textarea>
									</td>
									
								</tr>
								<tr>
									<td>Logo</td>
									<td><input type="file" id="logo" name="logo"><img id="imgPath" name="imgPath" src="<?php echo @$imgPath; ?>" /></td>
								</tr>
								<tr>
									<td>Logo Alt</td>
									<td><input type="text" name="logo_alt" id="logo_alt" style="width: 100%;" value="<?php echo $row['logo_alt'];?>" required></td>
								</tr>
								<tr>
									<td>Copyright</td>
									<td><input type="text" name="copyright" id="copyright" style="width: 100%;" <?php echo $row['copyright'];?>></td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnaegissettingsadd" id="btnaegissettingsadd" onclick="submitUpdateAegisSettings();">Submit</button>
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
include '../js/aegis_settings.js';
include '../templates/footer.php'; 
?>