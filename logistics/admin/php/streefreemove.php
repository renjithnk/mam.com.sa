<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	$landingpage_id=$_POST["landingpage_id"];
	// File Upload Handling
	$uploadDir =  "../uploads/streefreemove/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$caption = $_POST["caption"];
	$alt = $_POST["alt"]; 
	$sql = "INSERT INTO streefreemove (caption,image,alt,page_id) VALUES ('$caption','$uploadedFile','$alt','$landingpage_id')";
    
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
		$sql = "UPDATE streefreemove set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	$caption = $_POST["caption"];
	$landingpage_id=$_POST["landingpage_id"];
	if($id != "")
	{
		if(isset($_FILES["image"]["name"]))
		{
			$uploadDir = "../uploads/streefreemove/"; 
			$uploadedFile = $_FILES["image"]["name"];
			$tempFile = $_FILES["image"]["tmp_name"];
			$targetFile = $uploadDir . $uploadedFile;
			move_uploaded_file($tempFile, $targetFile);
		}
		$alt = $_POST["alt"];
		if(@$uploadedFile != "")
		{
		  $sql = "UPDATE streefreemove set caption='$caption',image='$uploadedFile', alt='$alt', page_id='$landingpage_id' where id=$id";
		}
		else
		{
			$sql = "UPDATE streefreemove set caption='$caption',alt='$alt',page_id='$landingpage_id' where id=$id";
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