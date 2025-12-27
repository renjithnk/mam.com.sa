<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$page_title = mysqli_real_escape_string($db->conn,$_POST["page_title"]);
	$canonical_link = mysqli_real_escape_string($db->conn,$_POST["canonical_link"]);
	$page_name = mysqli_real_escape_string($db->conn,$_POST["page_name"]);
	$page_url = mysqli_real_escape_string($db->conn,$_POST["page_url"]);
	$slug = mysqli_real_escape_string($db->conn,$_POST["slug"]);
	$meta_content = mysqli_real_escape_string($db->conn,$_POST["meta_content"]);
	$meta_description =  mysqli_real_escape_string($db->conn,$_POST["meta_description"]);
	$meta_keywords = mysqli_real_escape_string($db->conn,$_POST["meta_keywords"]);
	$og_title = mysqli_real_escape_string($db->conn,$_POST["og_title"]);
	$og_url = mysqli_real_escape_string($db->conn,$_POST["og_url"]);
	$og_type = mysqli_real_escape_string($db->conn,$_POST["og_type"]);
	$og_description = mysqli_real_escape_string($db->conn,$_POST["og_description"]);
	$og_image = mysqli_real_escape_string($db->conn,$_POST["og_image"]);
	
	
	
	
	$sql = "INSERT INTO seo_settings (page_title,canonical_link,page_name,page_url,slug,meta_content,meta_description,meta_keywords,og_title,og_url,og_type,og_description,og_image)  VALUES ('$page_title','$canonical_link','$page_name', '$page_url', '$slug','$meta_content','$meta_description', '$meta_keywords','$og_title', '$og_url','$og_type','$og_description', '$og_image')";
    
    if($db->query($sql) === TRUE) 
	{
        echo "New Record Added Successfully.";
    }
	else
	{
       echo "Error: " . $sql . "<br>";
    }
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$page_title = mysqli_real_escape_string($db->conn,$_POST["page_title"]);
		$canonical_link = mysqli_real_escape_string($db->conn,$_POST["canonical_link"]);
		$page_name = mysqli_real_escape_string($db->conn,$_POST["page_name"]);
		$page_url = mysqli_real_escape_string($db->conn,$_POST["page_url"]);
		$slug = mysqli_real_escape_string($db->conn,$_POST["slug"]);
		$meta_content = mysqli_real_escape_string($db->conn,$_POST["meta_content"]);
		$meta_description =  mysqli_real_escape_string($db->conn,$_POST["meta_description"]);
		$meta_keywords = mysqli_real_escape_string($db->conn,$_POST["meta_keywords"]);
		$og_title = mysqli_real_escape_string($db->conn,$_POST["og_title"]);
		$og_url = mysqli_real_escape_string($db->conn,$_POST["og_url"]);
		$og_type = mysqli_real_escape_string($db->conn,$_POST["og_type"]);
		$og_description = mysqli_real_escape_string($db->conn,$_POST["og_description"]);
		$og_image = mysqli_real_escape_string($db->conn,$_POST["og_image"]);		
		
		
		$sql = "UPDATE seo_settings set page_title='$page_title',canonical_link='$canonical_link',page_name='$page_name',page_url='$page_url',slug='$slug',meta_content='$meta_content',meta_description='$meta_description', meta_keywords='$meta_keywords',og_title='$og_title',og_url='$og_url',og_type='$og_type',og_description='$og_description',og_image='$og_image'";
		
		if(@$uploadedFile != "")
		{
			$sql = $sql . ",og_image='$uploadedFile'";
		}
		
		$sql = $sql . " where id=$id and status=0";
		
		$db->query($sql);
		if($db->query($sql) === TRUE) 
		{
			$msg="Updated successfully.";
		}
		else
		{
		   $msg="Error: " . $sql;
		}
		echo $msg;
	}
}

if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE  seo_settings set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>