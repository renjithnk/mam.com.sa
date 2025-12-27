<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	$caption = $_POST["caption"];
	$description = $_POST["description"];
	// File Upload Handling
	$uploadDir =  "../uploads/ourservice/";  // Specify the directory where you want to store uploaded files
	
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$alt = $_POST["alt"];
	
	$uploadedFile1 = $_FILES["ads_image"]["name"];
	$tempFile1 = $_FILES["ads_image"]["tmp_name"];
	$targetFile1 = $uploadDir . $uploadedFile1;
	move_uploaded_file($tempFile1, $targetFile1);
	$ads_image_alt = $_POST["ads_image_alt"];
	
	$sql = "INSERT INTO ourservice (caption, description, image,alt,ads_image,ads_image_alt) VALUES ('$caption', '$description', '$uploadedFile','$alt','$uploadedFile1','$ads_image_alt')";
	
    
    if($db->query($sql) === TRUE) 
	{
        echo "New record created successfully.";
    }
	else
	{
       echo "Error: " . $sql . "<br>";
    }
}


if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE ourservice set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$caption = $_POST["caption"];
		$description = $_POST["description"];
		$uploadDir = "../uploads/ourservice/"; 
		if(isset($_FILES["image"]["name"]))
		{
			$uploadedFile = $_FILES["image"]["name"];
			$tempFile = $_FILES["image"]["tmp_name"];
			$targetFile = $uploadDir . $uploadedFile;
			move_uploaded_file($tempFile, $targetFile);
		}
		$alt = $_POST["alt"];
		
		if(isset($_FILES["ads_image"]["name"]))
		{
			$uploadedFile1 = $_FILES["ads_image"]["name"];
			$tempFile1 = $_FILES["ads_image"]["tmp_name"];
			$targetFile1 = $uploadDir . $uploadedFile1;
			move_uploaded_file($tempFile1, $targetFile1);
		}
		$ads_image_alt = $_POST["ads_image_alt"];
	
	
		
		
		$sql = "UPDATE ourservice set caption='$caption',description='$description',alt='$alt',ads_image_alt='$ads_image_alt'";
		
		if(@$uploadedFile != "")
		{
			$sql = $sql . ",image='$uploadedFile'";
		}
		
		if(@$uploadedFile1 != "")
		{
			$sql = $sql . ",ads_image='$uploadedFile1'";
		}
		
		$sql = $sql . " where id=$id and status=0";
		
		$db->query($sql);
		if($db->query($sql) === TRUE) 
		{
			$msg="Updated successfully.";
		}
		else
		{
		   $msg="Error: " . $sql . "<br>";
		}
		echo $msg;
	}
}
?>