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
		<h1 class="admin-main-section__heading">Add Sub Pages Faq</h1>
		<div class="admin-main-section__content">
		<div class="href_back"><a href="<?php echo $adminPath;?>subpagesfaq/list.php" class="btn-default">Back</a></div>

					<div id="msg"></div>
<form name="frmaddsubpagesfaq" id="frmaddsubpagesfaq" method="post" enctype="multipart/form-data">
	<table style="padding: 0; margin: 0;">
	
	  	  <tr>
		    <td>Page</td>
			<td>
			 <select name="sub_menu_id" id="sub_menu_id" class="form-control" required autofocus>
                <option value="">-- Select Page --</option>
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
			<td>Caption</td>
			<td><input type="text" name="caption" id="caption" class="cls_txt" style="width:910px" required></td>
		 </tr>
		 <tr>
			<td> Description</td>
			<td><textarea name="description" id="description" rows="5" cols="50" required>&nbsp;</textarea></td>
		 </tr>
		<tr>
			<td colspan="2" style="text-align:center;">
			<button class="form__submit btn1" type="submit" name="btnSubPageFaqAdd" id="btnSubPageFaqAdd" onclick="submitSubPagesFaq();">Submit</button></td>
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
include '../js/subpagesfaq.js';
include '../templates/footer.php'; 
?>