<?php 
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
$sql = "SELECT * FROM testimonial where status=0 order by id desc";
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Testimonial</h1>
		<div class="admin-main-section__content">
		<div class="href_add"><a href="add.php" class="btn-default">Add Testimonial</a></div>
					<div id="msg"></div>
<form name="frmlisttestimonial" id="frmlisttestimonial" method="post" enctype="multipart/form-data">
<!-- <h3>List</h3> -->
<table style="padding: 0; margin: 0;">
	<tr>
		<th>Name</th>
		<th>Location</th>
		<th>Comment</th>
		<th>Action</th>
	</tr>
	<?php
	if(@$result->num_rows > 0) 
	{
		// Output data of each row
		while ($row = $result->fetch_array()) 
		{
		?>
			<tr>
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["location"]; ?></td>
				<td><?php echo $row["comment"]; ?></td>
				<td>
				  <input type="button" class="form__submit btn2" id="btnEdit" name="btnEdit" value="Edit" onclick="editTestimonial(<?php echo $row["id"]; ?>)">
				  <input type="button" class="form__submit btn2" id="btnDelete" name="btnDelete" value="Delete" onclick="deleteTestimonial(<?php echo $row["id"]; ?>)">
				</td>
			</tr>
		<?php
		}
	}
	else 
	{
	?>
		   <tr><td colspan="4" style="text-align:center;">No results to show</td></tr>
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
include '../js/testimonial.js';
include '../templates/footer.php'; 	
?>
