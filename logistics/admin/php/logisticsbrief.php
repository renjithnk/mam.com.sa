<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$title = $_POST["title"];
	$description= $_POST["description"];
	$uploadedFile='';
	$uploadDir =  "../uploads/logisticsbrief/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$alt=$_POST['alt'];
	$short_title = $_POST["short_title"];
	$short_description= $_POST["short_description"];
	

	$sql = "INSERT INTO  logistics_brief (title, description, image,alt,short_title, short_description)  VALUES ('$title', '$description', '$uploadedFile','$alt', '$short_title', '$short_description')";
	
    
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
		$title = $_POST["title"];
		$description= $_POST["description"];
		$uploadedFile='';
		$uploadDir =  "../uploads/logisticsbrief/";  // Specify the directory where you want to store uploaded files
		$uploadedFile = $_FILES["image"]["name"];
		$tempFile = $_FILES["image"]["tmp_name"];
		$targetFile = $uploadDir . $uploadedFile;
		move_uploaded_file($tempFile, $targetFile);
		$alt=$_POST['alt'];
		$short_title = $_POST["short_title"];
		$short_description= $_POST["short_description"];
		
		
		
		
		$sql = "UPDATE logistics_brief set title='$title',description='$description',alt='$alt',short_title='$short_title',
		short_description='$short_description'";
		
		if(@$uploadedFile != "")
		{
			$sql = $sql . ",image='$uploadedFile'";
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
		$sql = "UPDATE  logistics_brief set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>