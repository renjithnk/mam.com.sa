<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	// File Upload Handling
	$uploadDir =  "../uploads/gallery/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$alt = $_POST["alt"];
	$sql = "INSERT INTO gallery (image,alt) VALUES ('$uploadedFile','$alt')";
    
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
		$sql = "UPDATE gallery set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
		if(isset($_FILES["image"]["name"]))
		{
			$uploadDir = "../uploads/gallery/"; 
			$uploadedFile = $_FILES["image"]["name"];
			$tempFile = $_FILES["image"]["tmp_name"];
			$targetFile = $uploadDir . $uploadedFile;
			move_uploaded_file($tempFile, $targetFile);
		}
		$alt = $_POST["alt"];
		if(@$uploadedFile != "")
		{
		  $sql = "UPDATE gallery set image='$uploadedFile', alt='$alt' where id=$id";
		}
		else
		{
			$sql = "UPDATE gallery set alt='$alt' where id=$id";
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