<?php
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
global $adminPath;
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Add Cards</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>cards/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>
						<form name="frmaddCards" id="frmaddCard" method="post" enctype="multipart/form-data">
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Heading</td>
									<td><input type="text" name="heading" id="heading" style="width: 100%;" required></td>
								</tr>
								<tr>
									<td>Title 1</td>
									<td><input type="text" name="title1" id="title1" style="width: 100%;" required></td>
								</tr>
								<tr>
									<td>Description 1</td>
									<td><textarea name="description1" id="description1" rows="5" cols="50" required></textarea></td>
								</tr>
								<tr>
									<td>Image 1</td>
									<td><input type="file" id="image1" name="image1" required></td>
								</tr>
								<tr>
									<td>Alt 1</td>
									<td><input type="text" name="alt1" id="alt1" style="width: 100%;" required></td>
								</tr>
								
								<tr>
									<td>Title 2</td>
									<td><input type="text" name="title2" id="title2" style="width: 100%;" required></td>
								</tr>
								<tr>
									<td>Description 2</td>
									<td><textarea name="description2" id="description2" rows="5" cols="50" required></textarea></td>
								</tr>
								<tr>
									<td>Image 2</td>
									<td><input type="file" id="image2" name="image2" required></td>
								</tr>
								<tr>
									<td>Alt 2</td>
									<td><input type="text" name="alt2" id="alt2" style="width: 100%;" required></td>
								</tr>
								
								<tr>
									<td>Title 3</td>
									<td><input type="text" name="title3" id="title3" style="width: 100%;" required></td>
								</tr>
								<tr>
									<td>Description 3</td>
									<td><textarea name="description3" id="description3" rows="5" cols="50" required></textarea></td>
								</tr>
								<tr>
									<td>Image 3</td>
									<td><input type="file" id="image3" name="image3" required></td>
								</tr>
								<tr>
									<td>Alt 3</td>
									<td><input type="text" name="alt3" id="alt3" style="width: 100%;" required></td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align:center;">
									<button class="form__submit btn1" type="submit" name="btnCardsadd" id="btncardsadd" onclick="submitCards();">Submit</button>
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
include '../js/cards.js';
include '../templates/footer.php'; 
?>