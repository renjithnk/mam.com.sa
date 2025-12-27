<?php 
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriSegment=$uriSegments[2];
include '../templates/header.php'; 
include '../templates/sidebar.php';
$db = new Database();

$blogDBCconn = new mysqli($blogHost, $blogDBUsername, $blogDBPassword, $blogDBName);
$blogCategorySql="select * from wp_terms inner join  wp_term_taxonomy on wp_terms.term_id=wp_term_taxonomy.term_id where wp_term_taxonomy.taxonomy ='category'";
$blogCategoryResult=$blogDBCconn->query($blogCategorySql);

?>
<div class="admin-main-section dashboard">
		<h1 class="admin-main-section__heading">Blog</h1>
		<div class="admin-main-section__content">
		<div id="msg"></div>
<form name="frmlistblog" id="frmlistblog" method="post" enctype="multipart/form-data">
<!-- <h3>List</h3> -->
<table style="padding: 0; margin: 0;">
	<tr>
		<th>Title</th>
		<th>Action</th>
	</tr>
	<?php
	if(@$blogCategoryResult->num_rows > 0) 
	{
	    $blogCategoryName="";
		// Output data of each row
		while ($row = $blogCategoryResult->fetch_array()) 
		{
		
			/*if($blogCategoryName!=$row["name"])
			{*/
				$blogCategoryName=ucwords(str_replace("-"," ",$row["name"]));
				$term_taxonomy_id=$row["term_taxonomy_id"];
				$blogSql="select * from wp_term_relationships inner join wp_posts on wp_term_relationships.object_id=wp_posts.ID where term_taxonomy_id=$term_taxonomy_id";
				$blogResult=$blogDBCconn->query($blogSql);
		?>
				<tr><td colspan="3"><b><?php echo $blogCategoryName; ?></b></td>
		<?php	
				while($blogRow = $blogResult->fetch_array()) 
				{
				?>
						<tr>
							<td><?php echo $blogRow["post_title"]; ?></td>
							<td>
							<?php
							   $checked="";
							   if($blogRow["wp_posts_dispay"] == 1)
							   {
							       $checked="checked";
							   }
							?>
									<input type="checkbox" name="chkBlog[]" <?php echo $checked; ?> value="<?php echo $blogRow['ID']; ?>" class="form-control" />
							
							</td>
							<!--<td>
							  <input type="button" class="form__submit btn2" id="btnEdit" name="btnEdit" value="Edit" onclick="editBlog(<?php // echo $blogRow["ID"]; ?>)">
							  <input type="button" class="form__submit btn2" id="btnDelete" name="btnDelete" value="Delete" onclick="deleteBlog(<?php // echo $blogRow["ID"]; ?>)">
							</td>-->
						</tr>
				<?php
				}
			/*}*/
			$blogCategoryName=$row["name"];
		?>
			
		<?php
		}
		?>
			<tr>	
				<td colspan="2" style="text-align:center;">
				<button class="form__submit btn1" type="submit" name="btnblogupdate" id="btnblogupdate">Submit</button>
				</td>
			</tr>
	<?php
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
include '../js/blog.js';
include '../templates/footer.php'; 	
?>
