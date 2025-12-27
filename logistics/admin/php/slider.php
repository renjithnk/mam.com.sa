<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$caption = $_POST["caption"];
	$alt=$_POST["alt"];
	$uploadedFile='';
	// File Upload Handling
	$uploadDir =  "../uploads/slider/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$sql = "INSERT INTO slider (caption, image,alt) VALUES ('$caption','$uploadedFile','$alt')";
    
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
		$caption = $_POST["caption"];
		$alt=$_POST["alt"];
		if(isset($_FILES["image"]["name"]))
		{
			$uploadDir = "../uploads/slider/";
			$uploadedFile = $_FILES["image"]["name"];
			$tempFile = $_FILES["image"]["tmp_name"];
			$targetFile = $uploadDir . $uploadedFile;
			move_uploaded_file($tempFile, $targetFile);
		}
		if(@$uploadedFile != "")
		{
			$sql = "UPDATE slider set caption='$caption',image='$uploadedFile',alt='$alt' where id=$id";
		}
		else
		{
			$sql = "UPDATE slider set caption='$caption',alt='$alt' where id=$id";
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

if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE slider set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>