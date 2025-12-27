<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	$caption = $_POST["caption"];
	$description = $_POST["description"];
	// File Upload Handling
	$uploadDir =  "../uploads/aboutus/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$alt = $_POST["alt"];
	$sql = "INSERT INTO aboutus (caption, description, image,alt) VALUES ('$caption', '$description', '$uploadedFile','$alt')";
    
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
		$sql = "UPDATE aboutus set status=2 where id=$id";
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
		if(isset($_FILES["image"]["name"]))
		{
			$uploadDir = "../uploads/aboutus/"; 
			$uploadedFile = $_FILES["image"]["name"];
			$tempFile = $_FILES["image"]["tmp_name"];
			$targetFile = $uploadDir . $uploadedFile;
			move_uploaded_file($tempFile, $targetFile);
		}
		$alt = $_POST["alt"];
		if(@$uploadedFile != "")
		{
		  $sql = "UPDATE aboutus set caption='$caption',description='$description',image='$uploadedFile', alt='$alt' where id=$id";
		}
		else
		{
			$sql = "UPDATE aboutus set caption='$caption',description='$description', alt='$alt' where id=$id";
		}
		
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