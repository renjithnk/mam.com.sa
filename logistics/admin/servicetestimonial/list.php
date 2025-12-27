<?php 
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();
// $sql = "SELECT * FROM service_pages_testimonial where status=0 order by id desc";
$sql = "SELECT service_pages_testimonial.id,service_pages_testimonial.name,service_pages_testimonial.comment,service_pages_testimonial.location, service.caption as service FROM service_pages_testimonial inner join service on service_pages_testimonial.service_id=service.id where service_pages_testimonial.status=0 order by service.id desc";
// echo $sql;
$result = $db->query($sql);
?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Service Page Testimonial</h1>
		<div class="admin-main-section__content">
		<div class="href_add"><a href="add.php" class="btn-default">Add Service Page Testimonial</a></div>
					<div id="msg"></div>
<form name="frmlistservicetestimonial" id="frmlistservicetestimonial" method="post" enctype="multipart/form-data">
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
	    $servicemenuName="";
		// Output data of each row
		while ($row = $result->fetch_array()) 
		{
			if($servicemenuName!=$row["service"])
			{
				$servicemenuName=ucwords(str_replace("-"," ",$row["service"]));
		?>
				<tr><td colspan="3"><b><?php echo $servicemenuName; ?></b></td>
		<?php	
			}
			$servicemenuName=$row["service"];
		?>
			<tr>
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["location"]; ?></td>
				<td><?php echo $row["comment"]; ?></td>
				<td>
				  <input type="button" class="form__submit btn2" id="btnEdit" name="btnEdit" value="Edit" onclick="editServiceTestimonial(<?php echo $row["id"]; ?>)">
				  <input type="button" class="form__submit btn2" id="btnDelete" name="btnDelete" value="Delete" onclick="deleteServiceTestimonial(<?php echo $row["id"]; ?>)">
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
include '../js/servicetestimonial.js';
include '../templates/footer.php'; 	
?>
