<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$title = $_POST["title"];
	$description= $_POST["description"];
	$uploadedFile='';
	$uploadDir =  "../uploads/seafreightbrief/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$alt=$_POST['alt'];
	
	$uploadedFile1='';
	$uploadedFile1 = $_FILES["icon_image1"]["name"];
	$tempFile1 = $_FILES["icon_image1"]["tmp_name"];
	$targetFile1 = $uploadDir . $uploadedFile1;
	move_uploaded_file($tempFile1, $targetFile1);
	$icon_image1_alt=$_POST["icon_image1_alt"];
	$icon_image1_description=$_POST["icon_image1_description"];
	

	$sql = "INSERT INTO seafreight_brief (title, description, image,alt,icon_image1, icon_image1_alt,icon_image1_description)  VALUES ('$title', '$description', '$uploadedFile','$alt', '$uploadedFile1', '$icon_image1_alt','$icon_image1_description')";
	
    
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
		$uploadDir =  "../uploads/seafreightbrief/";  // Specify the directory where you want to store uploaded files
		$uploadedFile = $_FILES["image"]["name"];
		$tempFile = $_FILES["image"]["tmp_name"];
		$targetFile = $uploadDir . $uploadedFile;
		move_uploaded_file($tempFile, $targetFile);
		$alt=$_POST['alt'];
		
		$uploadedFile1='';
		$uploadedFile1 = $_FILES["icon_image1"]["name"];
		$tempFile1 = $_FILES["icon_image1"]["tmp_name"];
		$targetFile1 = $uploadDir . $uploadedFile1;
		move_uploaded_file($tempFile1, $targetFile1);
		$icon_image1_alt=$_POST["icon_image1_alt"];
		$icon_image1_description=$_POST["icon_image1_description"];
		
		
		
		
		$sql = "UPDATE seafreight_brief set title='$title',description='$description',alt='$alt',icon_image1_alt='$icon_image1_alt',
		icon_image1_description='$icon_image1_description'";
		
		if(@$uploadedFile != "")
		{
			$sql = $sql . ",image='$uploadedFile'";
		}
		
		if(@$uploadedFile1 != "")
		{
			$sql = $sql . ",icon_image1='$uploadedFile1'";
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
		$sql = "UPDATE  seafreight_brief set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>