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
	$sql = "SELECT * FROM cards where id=$id and status=0";  
	$result = $db->query($sql); 
	if($result)
	{
		$row = $result->fetch_array();
		$imgPath1="";
		$imgPath2="";
		$imgPath3="";
		if(@$row['image1'] != "")
		{
			$imgPath1=$adminPath . 'uploads/cards/' . @$row['image1'];
		}
		if(@$row['image2'] != "")
		{
			$imgPath2=$adminPath . 'uploads/cards/' . @$row['image2'];
		}
		if(@$row['image3'] != "")
		{
			$imgPath3=$adminPath . 'uploads/cards/' . @$row['image3'];
		}
	}
}
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Edit Cards</h1>
		
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>cards/list.php" class="btn-default">Back</a></div>
					<div id="msg"></div>

						<!-- <h3>Add</h3> -->
						<form name="frmeditcards" id="frmeditcards" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
							<table style="padding: 0; margin: 0;">
								<tr>
									<td>Heading</td>
									<td><input type="text" name="heading" id="heading" style="width: 100%;" value="<?php echo $row['heading']; ?>" required></td>
								</tr>
								<tr>
									<td>Title 1</td>
									<td><input type="text" name="title1" id="title1" style="width: 100%;" value="<?php echo $row['title1']; ?>" required></td>
								</tr>
								<tr>
									<td>Description 1</td>
									<td><textarea name="description1" id="description1" rows="5" cols="50" required><?php echo $row['description1']; ?></textarea></td>
								</tr>
								<tr>
									<td>Image 1</td>
									<td><input type="file" id="image1" name="image1"><img id="imgPath1" name="imgPath1" src="<?php echo @$imgPath1; ?>" /></td>
								</tr>
								<tr>
									<td>Alt 1</td>
									<td><input type="text" name="alt1" id="alt1" style="width: 100%;" required value="<?php echo $row['alt1']; ?>"></td>
								</tr>
								
								<tr>
									<td>Title 2</td>
									<td><input type="text" name="title2" id="title2" style="width: 100%;" required value="<?php echo $row['title2']; ?>"></td>
								</tr>
								<tr>
									<td>Description 2</td>
									<td><textarea name="description2" id="description2" rows="5" cols="50" required><?php echo $row['description2']; ?></textarea></td>
								</tr>
								<tr>
									<td>Image 2</td>
									<td><input type="file" id="image2" name="image2"><img id="imgPath2" name="imgPath2" src="<?php echo @$imgPath2; ?>" /></td>
								</tr>
								<tr>
									<td>Alt 2</td>
									<td><input type="text" name="alt2" id="alt2" style="width: 100%;" required value="<?php echo $row['alt2']; ?>"></td>
								</tr>
								
								<tr>
									<td>Title 3</td>
									<td><input type="text" name="title3" id="title3" style="width: 100%;" required value="<?php echo $row['title3']; ?>"></td>
								</tr>
								<tr>
									<td>Description 3</td>
									<td><textarea name="description3" id="description3" rows="5" cols="50" required><?php echo $row['description3']; ?></textarea></td>
								</tr>
								<tr>
									<td>Image 3</td>
									<td><input type="file" id="image3" name="image3"><img id="imgPath3" name="imgPath3" src="<?php echo @$imgPath3; ?>"</td>
								</tr>
								<tr>
									<td>Alt 3</td>
									<td><input type="text" name="alt3" id="alt3" style="width: 100%;" required value="<?php echo $row['alt3']; ?>"></td>
								</tr>
								<tr>	
									<td colspan="2" class="cls_btn"><input class="form__submit btn1" type="submit"  value="Submit" name="btnCardsEdit" id="btnCardsEdit"></td>
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